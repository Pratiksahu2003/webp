<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\TwoFactorService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class TwoFactorChallengeController extends Controller
{
    public function __construct(
        protected TwoFactorService $twoFactor,
    ) {}

    public function create(Request $request): View|RedirectResponse
    {
        if (! $request->session()->has('login.id')) {
            return redirect()->route('admin.login');
        }

        return view('auth.two-factor-challenge');
    }

    public function store(Request $request): RedirectResponse
    {
        $userId = $request->session()->get('login.id');

        if (! $userId) {
            return redirect()->route('admin.login');
        }

        $this->ensureIsNotRateLimited($request);

        /** @var User|null $user */
        $user = User::query()->find($userId);

        if (! $user || ! $user->hasEnabledTwoFactor()) {
            $request->session()->forget(['login.id', 'login.remember']);

            return redirect()->route('admin.login');
        }

        $request->validate([
            'code' => ['nullable', 'string'],
            'recovery_code' => ['nullable', 'string'],
        ]);

        $valid = false;

        if ($request->filled('recovery_code')) {
            $valid = $this->twoFactor->consumeRecoveryCode($user, (string) $request->input('recovery_code'));
        } elseif ($request->filled('code')) {
            $secret = $this->twoFactor->decryptSecret((string) $user->two_factor_secret);
            $valid = $this->twoFactor->verify($secret, (string) $request->input('code'));
        }

        if (! $valid) {
            RateLimiter::hit($this->throttleKey($request));

            throw ValidationException::withMessages([
                'code' => 'The authentication code is invalid.',
            ]);
        }

        RateLimiter::clear($this->throttleKey($request));

        Auth::login($user, (bool) $request->session()->pull('login.remember'));
        $request->session()->forget('login.id');
        $request->session()->regenerate();

        return redirect()->intended(route('admin.dashboard', absolute: false));
    }

    protected function ensureIsNotRateLimited(Request $request): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey($request), 5)) {
            return;
        }

        throw ValidationException::withMessages([
            'code' => 'Too many attempts. Please try again later.',
        ]);
    }

    protected function throttleKey(Request $request): string
    {
        return 'two-factor:'.$request->session()->get('login.id').'|'.$request->ip();
    }
}
