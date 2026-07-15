<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Services\TwoFactorService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
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
            $this->deleteAvatarFile($user->avatar);
            $data['avatar'] = null;
        }

        if ($request->hasFile('avatar')) {
            if (filled($user->avatar)) {
                $this->deleteAvatarFile($user->avatar);
            }

            $data['avatar'] = $this->storeAvatarInPublic($request->file('avatar'), (int) $user->id);
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
            $this->deleteAvatarFile($user->avatar);
        }

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::route('admin.login');
    }

    protected function storeAvatarInPublic(UploadedFile $file, int $userId): string
    {
        $directory = public_path('avatars');

        if (! File::isDirectory($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        $extension = strtolower($file->getClientOriginalExtension() ?: $file->extension() ?: 'jpg');
        $filename = 'user-'.$userId.'-'.Str::lower(Str::random(12)).'.'.$extension;
        $file->move($directory, $filename);

        return 'avatars/'.$filename;
    }

    protected function deleteAvatarFile(?string $path): void
    {
        if (! filled($path)) {
            return;
        }

        $relative = ltrim(str_replace('\\', '/', $path), '/');
        $publicPath = public_path($relative);

        if (File::isFile($publicPath)) {
            File::delete($publicPath);

            return;
        }

        // Legacy files previously stored on the public disk (storage/app/public).
        if (Storage::disk('public')->exists($relative)) {
            Storage::disk('public')->delete($relative);
        }
    }
}
