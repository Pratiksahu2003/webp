@extends('layouts.admin')
@section('title', 'Payment Gateway - VanTroZ Admin')
@section('page-title', 'Payment Gateway')
@section('content')
<div class="admin-page">
    <div class="admin-page-header">
        <div>
            <h1>Payment Gateway</h1>
            <p>Configure Nimbbl access key and secret from the dashboard</p>
        </div>
    </div>

    <div class="admin-card mb-4">
        <div class="admin-card-body flex flex-wrap items-center justify-between gap-3">
            <div>
                <p class="text-xs uppercase tracking-wide text-slate-500">Status</p>
                <p class="text-lg font-bold {{ $settings['is_configured'] ? 'text-emerald-600' : 'text-amber-600' }}">
                    {{ $settings['is_configured'] ? 'Configured' : 'Not configured (mock mode)' }}
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
                <form method="POST" action="{{ route('admin.settings.payment-gateway.destroy') }}" onsubmit="return confirm('Clear dashboard credentials?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="admin-btn admin-btn-secondary text-rose-600 border-rose-200">Clear keys</button>
                </form>
            @endif
        </div>
    </div>

    <form method="POST" action="{{ route('admin.settings.payment-gateway.update') }}" class="admin-card">
        @csrf
        @method('PUT')
        <div class="admin-card-header"><div><h2>Nimbbl credentials</h2><p>Leave secret blank to keep the current value</p></div></div>
        <div class="admin-card-body space-y-4">
            @if($errors->any())
                <div class="rounded-xl bg-rose-50 border border-rose-200 text-rose-700 px-4 py-3 text-sm">
                    <ul class="list-disc list-inside">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                </div>
            @endif
            <div class="admin-field"><label>Access Key</label><input type="text" name="access_key" value="{{ old('access_key', $settings['access_key']) }}" autocomplete="off" placeholder="NIMBBL_ACCESS_KEY"></div>
            <div class="admin-field"><label>Access Secret</label><input type="password" name="access_secret" value="" autocomplete="new-password" placeholder="{{ filled($settings['access_secret']) ? '••••••••  (leave blank to keep)' : 'NIMBBL_ACCESS_SECRET' }}"></div>
            <div class="admin-field"><label>Webhook Secret <span class="font-normal text-slate-400">(optional)</span></label><input type="password" name="webhook_secret" value="" autocomplete="new-password" placeholder="{{ filled($settings['webhook_secret']) ? '••••••••  (leave blank to keep)' : 'Optional' }}"></div>
            <div class="admin-field" style="max-width:10rem"><label>Currency</label><input type="text" name="currency" value="{{ old('currency', $settings['currency'] ?? 'INR') }}" maxlength="3" required></div>
            <div class="admin-actions"><button type="submit" class="admin-btn admin-btn-primary">Save Gateway Settings</button></div>
        </div>
    </form>
</div>
@endsection
