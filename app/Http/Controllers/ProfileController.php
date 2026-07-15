<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Services\TwoFactorService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function __construct(
        protected TwoFactorService $twoFactor,
    ) {}

    public function edit(Request $request): View
    {
        $user = $request->user();
        $setupSecret = $request->session()->get('two_factor_setup_secret');
        $qrSvg = null;

        if (
            filled($setupSecret)
            || (filled($user->two_factor_secret) && ! $user->two_factor_confirmed_at)
        ) {
            if (! filled($setupSecret) && filled($user->two_factor_secret)) {
                $setupSecret = $this->twoFactor->decryptSecret((string) $user->two_factor_secret);
                $request->session()->put('two_factor_setup_secret', $setupSecret);
            }

            $qrSvg = $this->twoFactor->qrCodeSvg($user, (string) $setupSecret);
        }

        return view('profile.edit', [
            'user' => $user,
            'twoFactorEnabled' => $user->hasEnabledTwoFactor(),
            'twoFactorPending' => filled($setupSecret) && ! $user->hasEnabledTwoFactor(),
            'twoFactorSecret' => $setupSecret,
            'twoFactorQrSvg' => $qrSvg,
            'recoveryCodes' => $request->session()->get('two_factor_recovery_codes', []),
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $data = $request->safe()->only(['name', 'email', 'phone']);

        if ($request->boolean('remove_avatar') && filled($user->avatar)) {
            Storage::disk('public')->delete($user->avatar);
            $data['avatar'] = null;
        }

        if ($request->hasFile('avatar')) {
            if (filled($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }

            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $user->fill($data);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('admin.profile.edit')->with('success', 'Profile updated successfully.');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        if (filled($user->avatar)) {
            Storage::disk('public')->delete($user->avatar);
        }

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::route('admin.login');
    }
}
