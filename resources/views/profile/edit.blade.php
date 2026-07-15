@extends('layouts.admin')

@section('title', 'Profile Settings - VanTroZ Admin')
@section('page-title', 'Profile Settings')

@section('content')
<div class="admin-page">
    <div class="admin-page-header">
        <div>
            <h1>Profile Settings</h1>
            <p>Manage your photo, account details, and two-factor authentication</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
        <div class="lg:col-span-2 space-y-5">
            <div class="admin-card">
                <div class="admin-card-header">
                    <div>
                        <h2>Profile information</h2>
                        <p>Photo, name, email, and phone</p>
                    </div>
                </div>
                <div class="admin-card-body">
                    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                        @csrf
                        @method('PATCH')

                        <div class="flex flex-col sm:flex-row sm:items-center gap-4 pb-2">
                            <img src="{{ $user->avatarUrl() }}" alt="{{ $user->name }}" class="h-20 w-20 rounded-full object-cover ring-2 ring-slate-200">
                            <div class="space-y-2 flex-1">
                                <div class="admin-field !mb-0">
                                    <label for="avatar">Profile image</label>
                                    <input id="avatar" type="file" name="avatar" accept="image/png,image/jpeg,image/webp,image/jpg">
                                    <p class="admin-help">JPG, PNG, or WebP · max 2 MB</p>
                                    @error('avatar')
                                        <p class="admin-help text-rose-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                @if($user->avatar)
                                    <label class="inline-flex items-center gap-2 text-sm text-slate-600">
                                        <input type="checkbox" name="remove_avatar" value="1" class="rounded border-slate-300 text-[#ff6b35]">
                                        Remove current image
                                    </label>
                                @endif
                            </div>
                        </div>

                        <div class="admin-grid-2">
                            <div class="admin-field">
                                <label for="name">Full name *</label>
                                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name">
                                @error('name')
                                    <p class="admin-help text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="admin-field">
                                <label for="email">Email address *</label>
                                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required autocomplete="username">
                                @error('email')
                                    <p class="admin-help text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="admin-field span-2">
                                <label for="phone">Phone number</label>
                                <input type="tel" id="phone" name="phone" value="{{ old('phone', $user->phone) }}" autocomplete="tel">
                                @error('phone')
                                    <p class="admin-help text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="admin-actions">
                            <button type="submit" class="admin-btn admin-btn-primary">Save profile</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="admin-card">
                <div class="admin-card-header">
                    <div>
                        <h2>Two-factor authentication</h2>
                        <p>Protect your admin login with an authenticator app</p>
                    </div>
                </div>
                <div class="admin-card-body space-y-4">
                    @if($twoFactorEnabled)
                        <div class="rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">
                            2FA is <strong>enabled</strong> on this account.
                        </div>

                        @if(!empty($recoveryCodes))
                            <div class="rounded-xl border border-amber-200 bg-amber-50 px-4 py-3">
                                <p class="text-sm font-semibold text-amber-900 mb-2">Save these recovery codes now — they won’t be shown again.</p>
                                <div class="grid grid-cols-2 gap-2 font-mono text-sm text-amber-950">
                                    @foreach($recoveryCodes as $code)
                                        <div class="bg-white/70 rounded-lg px-3 py-2 border border-amber-100">{{ $code }}</div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('admin.profile.two-factor.recovery-codes') }}" class="space-y-3">
                            @csrf
                            <div class="admin-field">
                                <label for="regen_password">Password to regenerate recovery codes</label>
                                <input id="regen_password" type="password" name="password" required autocomplete="current-password">
                                @error('password')
                                    <p class="admin-help text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="admin-btn admin-btn-secondary">Regenerate recovery codes</button>
                        </form>

                        <form method="POST" action="{{ route('admin.profile.two-factor.disable') }}" class="space-y-3 pt-2 border-t border-slate-100"
                              onsubmit="return confirm('Disable two-factor authentication?');">
                            @csrf
                            @method('DELETE')
                            <div class="admin-field">
                                <label for="disable_2fa_password">Password to disable 2FA</label>
                                <input id="disable_2fa_password" type="password" name="password" required autocomplete="current-password">
                            </div>
                            <button type="submit" class="admin-btn" style="background:#e11d48;color:#fff;">Disable 2FA</button>
                        </form>
                    @elseif($twoFactorPending)
                        <p class="text-sm text-slate-600">Scan this QR code in Google Authenticator, Authy, or 1Password, then enter a code to confirm.</p>

                        @if($twoFactorQrSvg)
                            <div class="inline-block rounded-xl border border-slate-200 bg-white p-3">
                                {!! $twoFactorQrSvg !!}
                            </div>
                        @endif

                        @if($twoFactorSecret)
                            <p class="text-xs text-slate-500">
                                Manual key:
                                <code class="font-mono text-slate-800 bg-slate-100 px-2 py-1 rounded">{{ $twoFactorSecret }}</code>
                            </p>
                        @endif

                        <form method="POST" action="{{ route('admin.profile.two-factor.confirm') }}" class="space-y-3">
                            @csrf
                            <div class="admin-field">
                                <label for="code">6-digit code *</label>
                                <input id="code" type="text" name="code" inputmode="numeric" autocomplete="one-time-code" required placeholder="123456">
                                @error('code')
                                    <p class="admin-help text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="admin-btn admin-btn-primary">Confirm & enable 2FA</button>
                        </form>
                    @else
                        <p class="text-sm text-slate-600">Add an extra login step with a one-time code from your phone.</p>
                        <form method="POST" action="{{ route('admin.profile.two-factor.enable') }}">
                            @csrf
                            <button type="submit" class="admin-btn admin-btn-primary">Enable 2FA</button>
                        </form>
                    @endif
                </div>
            </div>

            <div class="admin-card">
                <div class="admin-card-header">
                    <div>
                        <h2>Change password</h2>
                        <p>Use a strong password you do not reuse elsewhere</p>
                    </div>
                </div>
                <div class="admin-card-body">
                    <form action="{{ route('password.update') }}" method="POST" class="space-y-5">
                        @csrf
                        @method('PUT')

                        <div class="admin-field">
                            <label for="current_password">Current password *</label>
                            <input type="password" id="current_password" name="current_password" required autocomplete="current-password">
                            @error('current_password', 'updatePassword')
                                <p class="admin-help text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="admin-grid-2">
                            <div class="admin-field">
                                <label for="password">New password *</label>
                                <input type="password" id="password" name="password" required autocomplete="new-password">
                                @error('password', 'updatePassword')
                                    <p class="admin-help text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="admin-field">
                                <label for="password_confirmation">Confirm password *</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="admin-actions">
                            <button type="submit" class="admin-btn admin-btn-primary">Update password</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="admin-card border-rose-200">
                <div class="admin-card-header">
                    <div>
                        <h2 class="text-rose-700">Delete account</h2>
                        <p>Permanently remove your account and related data</p>
                    </div>
                </div>
                <div class="admin-card-body">
                    <form action="{{ route('admin.profile.destroy') }}" method="POST" class="space-y-5"
                          onsubmit="return confirm('Are you sure you want to delete your account? This cannot be undone.');">
                        @csrf
                        @method('DELETE')

                        <div class="admin-field">
                            <label for="delete_password">Confirm with your password *</label>
                            <input type="password" id="delete_password" name="password" required autocomplete="current-password">
                            @error('password', 'userDeletion')
                                <p class="admin-help text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="admin-actions">
                            <button type="submit" class="admin-btn" style="background:#e11d48;color:#fff;">Delete account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="space-y-5">
            <div class="admin-card">
                <div class="admin-card-body text-center">
                    <img src="{{ $user->avatarUrl() }}" alt="{{ $user->name }}" class="mx-auto h-20 w-20 rounded-full object-cover ring-2 ring-slate-200 mb-3">
                    <p class="font-semibold text-slate-900">{{ $user->name }}</p>
                    <p class="text-sm text-slate-500 mt-1">{{ $user->email }}</p>
                    <p class="mt-3">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-900">
                            {{ ucfirst($user->role ?? 'admin') }}
                        </span>
                    </p>
                </div>
            </div>

            <div class="admin-card">
                <div class="admin-card-header">
                    <div>
                        <h2>Account</h2>
                    </div>
                </div>
                <div class="admin-card-body space-y-3 text-sm">
                    <div class="flex items-center justify-between gap-3">
                        <span class="text-slate-500">Member since</span>
                        <span class="font-medium text-slate-900">{{ $user->created_at->format('M Y') }}</span>
                    </div>
                    <div class="flex items-center justify-between gap-3">
                        <span class="text-slate-500">Email status</span>
                        <span class="font-medium {{ $user->email_verified_at ? 'text-emerald-600' : 'text-amber-600' }}">
                            {{ $user->email_verified_at ? 'Verified' : 'Pending' }}
                        </span>
                    </div>
                    <div class="flex items-center justify-between gap-3">
                        <span class="text-slate-500">2FA</span>
                        <span class="font-medium {{ $twoFactorEnabled ? 'text-emerald-600' : 'text-slate-500' }}">
                            {{ $twoFactorEnabled ? 'Enabled' : 'Off' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
