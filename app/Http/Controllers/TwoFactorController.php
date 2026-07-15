<?php

namespace App\Http\Controllers;

use App\Services\TwoFactorService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class TwoFactorController extends Controller
{
    public function __construct(
        protected TwoFactorService $twoFactor,
    ) {}

    public function enable(Request $request): RedirectResponse
    {
        $user = $request->user();

        if ($user->hasEnabledTwoFactor()) {
            return back()->with('error', 'Two-factor authentication is already enabled.');
        }

        $secret = $this->twoFactor->generateSecret();

        $user->forceFill([
            'two_factor_secret' => $this->twoFactor->encryptSecret($secret),
            'two_factor_recovery_codes' => null,
            'two_factor_confirmed_at' => null,
        ])->save();

        $request->session()->put('two_factor_setup_secret', $secret);

        return redirect()
            ->route('admin.profile.edit')
            ->with('success', 'Scan the QR code, then confirm with a 6-digit code.');
    }

    public function confirm(Request $request): RedirectResponse
    {
        $request->validate([
            'code' => ['required', 'string'],
        ]);

        $user = $request->user();
        $secret = $request->session()->get('two_factor_setup_secret');

        if (! filled($secret) && filled($user->two_factor_secret) && ! $user->two_factor_confirmed_at) {
            $secret = $this->twoFactor->decryptSecret((string) $user->two_factor_secret);
        }

        if (! filled($secret)) {
            return back()->with('error', 'Start two-factor setup again.');
        }

        if (! $this->twoFactor->verify($secret, (string) $request->input('code'))) {
            throw ValidationException::withMessages([
                'code' => 'The authentication code is invalid.',
            ]);
        }

        $recoveryCodes = $this->twoFactor->generateRecoveryCodes();

        $user->forceFill([
            'two_factor_secret' => $this->twoFactor->encryptSecret($secret),
            'two_factor_recovery_codes' => $this->twoFactor->hashRecoveryCodes($recoveryCodes),
            'two_factor_confirmed_at' => now(),
        ])->save();

        $request->session()->forget('two_factor_setup_secret');
        $request->session()->flash('two_factor_recovery_codes', $recoveryCodes);

        return redirect()
            ->route('admin.profile.edit')
            ->with('success', 'Two-factor authentication enabled. Save your recovery codes.');
    }

    public function disable(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'string'],
        ]);

        $user = $request->user();

        if (! Hash::check((string) $request->input('password'), $user->password)) {
            throw ValidationException::withMessages([
                'password' => 'The password is incorrect.',
            ]);
        }

        $user->forceFill([
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'two_factor_confirmed_at' => null,
        ])->save();

        $request->session()->forget('two_factor_setup_secret');

        return redirect()
            ->route('admin.profile.edit')
            ->with('success', 'Two-factor authentication disabled.');
    }

    public function regenerateRecoveryCodes(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'string'],
        ]);

        $user = $request->user();

        if (! $user->hasEnabledTwoFactor()) {
            return back()->with('error', 'Enable two-factor authentication first.');
        }

        if (! Hash::check((string) $request->input('password'), $user->password)) {
            throw ValidationException::withMessages([
                'password' => 'The password is incorrect.',
            ]);
        }

        $recoveryCodes = $this->twoFactor->generateRecoveryCodes();

        $user->forceFill([
            'two_factor_recovery_codes' => $this->twoFactor->hashRecoveryCodes($recoveryCodes),
        ])->save();

        $request->session()->flash('two_factor_recovery_codes', $recoveryCodes);

        return redirect()
            ->route('admin.profile.edit')
            ->with('success', 'Recovery codes regenerated. Store them somewhere safe.');
    }
}
