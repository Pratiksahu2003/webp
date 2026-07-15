@extends('layouts.admin')
@section('title', 'SMTP / Email - VanTroZ Admin')
@section('page-title', 'SMTP Settings')
@section('content')
<div class="admin-page">
    <div class="admin-page-header">
        <div>
            <h1>SMTP / Email</h1>
            <p>Configure outbound email for invoices and notifications</p>
        </div>
    </div>

    <div class="admin-card mb-4">
        <div class="admin-card-body flex flex-wrap items-center justify-between gap-3">
            <div>
                <p class="text-xs uppercase tracking-wide text-slate-500">Status</p>
                <p class="text-lg font-bold {{ $settings['is_configured'] ? 'text-emerald-600' : 'text-amber-600' }}">
                    @if($settings['enabled'] && $settings['is_configured'])
                        Enabled · ready to send
                    @elseif($settings['enabled'])
                        Enabled · incomplete
                    @elseif($settings['source'] === 'environment')
                        Using .env mailer
                    @else
                        Not configured (log driver)
                    @endif
                </p>
                <p class="text-xs text-slate-500 mt-1">
                    Source:
                    @if($settings['source'] === 'dashboard') Dashboard
                    @elseif($settings['source'] === 'environment') .env
                    @else None
                    @endif
                </p>
            </div>
            @if($settings['source'] === 'dashboard')
                <form method="POST" action="{{ route('admin.settings.smtp.destroy') }}" onsubmit="return confirm('Clear dashboard SMTP settings?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="admin-btn admin-btn-secondary text-rose-600 border-rose-200">Clear SMTP</button>
                </form>
            @endif
        </div>
    </div>

    <form method="POST" action="{{ route('admin.settings.smtp.update') }}" class="admin-card mb-4">
        @csrf
        @method('PUT')
        <div class="admin-card-header">
            <div>
                <h2>SMTP server</h2>
                <p>Leave password blank to keep the current value</p>
            </div>
        </div>
        <div class="admin-card-body space-y-5">
            @if($errors->any())
                <div class="rounded-xl bg-rose-50 border border-rose-200 text-rose-700 px-4 py-3 text-sm">
                    <ul class="list-disc list-inside">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                </div>
            @endif

            <label class="inline-flex items-center gap-2.5 !mb-0 cursor-pointer">
                <input type="checkbox" name="enabled" value="1" @checked(old('enabled', $settings['enabled'])) class="rounded border-slate-300 text-gray-900">
                <span class="text-sm font-medium text-slate-700">Use these SMTP settings for all outbound mail</span>
            </label>

            <div class="admin-grid-2">
                <div class="admin-field">
                    <label for="host">SMTP host *</label>
                    <input id="host" type="text" name="host" value="{{ old('host', $settings['host']) }}" placeholder="smtp.gmail.com" autocomplete="off">
                </div>
                <div class="admin-field">
                    <label for="port">Port *</label>
                    <input id="port" type="number" name="port" value="{{ old('port', $settings['port']) }}" min="1" max="65535" placeholder="587">
                </div>
                <div class="admin-field">
                    <label for="username">Username *</label>
                    <input id="username" type="text" name="username" value="{{ old('username', $settings['username']) }}" autocomplete="off">
                </div>
                <div class="admin-field">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" value="" autocomplete="new-password"
                           placeholder="{{ $settings['has_password'] ? '••••••••  (leave blank to keep)' : 'SMTP password / app password' }}">
                </div>
                <div class="admin-field">
                    <label for="encryption">Encryption</label>
                    <select id="encryption" name="encryption">
                        <option value="tls" @selected(old('encryption', $settings['encryption']) === 'tls')>TLS (port 587)</option>
                        <option value="ssl" @selected(old('encryption', $settings['encryption']) === 'ssl')>SSL (port 465)</option>
                        <option value="none" @selected(old('encryption', $settings['encryption']) === 'none')>None</option>
                    </select>
                </div>
            </div>

            <div class="admin-grid-2">
                <div class="admin-field">
                    <label for="from_address">From email *</label>
                    <input id="from_address" type="email" name="from_address" value="{{ old('from_address', $settings['from_address']) }}" placeholder="billing@yourdomain.com">
                </div>
                <div class="admin-field">
                    <label for="from_name">From name *</label>
                    <input id="from_name" type="text" name="from_name" value="{{ old('from_name', $settings['from_name']) }}" placeholder="VanTroZ Billing">
                </div>
            </div>

            <div class="admin-actions">
                <button type="submit" class="admin-btn admin-btn-primary">Save SMTP settings</button>
            </div>
        </div>
    </form>

    <form method="POST" action="{{ route('admin.settings.smtp.test') }}" class="admin-card">
        @csrf
        <div class="admin-card-header">
            <div>
                <h2>Send test email</h2>
                <p>Verify delivery with the active mail configuration</p>
            </div>
        </div>
        <div class="admin-card-body space-y-4">
            <div class="admin-field">
                <label for="test_email">Recipient email</label>
                <input id="test_email" type="email" name="test_email" value="{{ old('test_email', auth()->user()->email) }}" required>
            </div>
            <div class="admin-actions">
                <button type="submit" class="admin-btn admin-btn-secondary">Send test email</button>
            </div>
        </div>
    </form>
</div>
@endsection
