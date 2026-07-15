@extends('layouts.admin')

@section('title', 'Profile Settings - VanTroZ Admin')
@section('page-title', 'Profile Settings')

@section('content')
<div class="admin-page">
    <div class="admin-page-header">
        <div>
            <h1>Profile Settings</h1>
            <p>Manage your account information and password</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
        <div class="lg:col-span-2 space-y-5">
            <div class="admin-card">
                <div class="admin-card-header">
                    <div>
                        <h2>Profile information</h2>
                        <p>Your name, email, and phone</p>
                    </div>
                </div>
                <div class="admin-card-body">
                    <form action="{{ route('admin.profile.update') }}" method="POST" class="space-y-5">
                        @csrf
                        @method('PATCH')

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
                    <div class="mx-auto h-20 w-20 rounded-full flex items-center justify-center mb-3"
                         style="background: var(--admin-gradient);">
                        <span class="text-2xl font-bold text-white">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                    </div>
                    <p class="font-semibold text-slate-900">{{ $user->name }}</p>
                    <p class="text-sm text-slate-500 mt-1">{{ $user->email }}</p>
                    <p class="mt-3">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-orange-50 text-[#ff6b35]">
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
