@extends('layouts.admin')
@section('title', 'Payment Gateway - VanTroZ Admin')
@section('page-title', 'Payment Gateway')
@section('content')
<div class="max-w-3xl mx-auto p-6">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Payment Gateway</h1>
        <p class="text-gray-600 mt-1">Configure Nimbbl access key and secret from the dashboard</p>
    </div>

    @if(session('success'))
        <div class="mb-4 rounded-lg bg-green-50 border border-green-200 text-green-800 px-4 py-3">{{ session('success') }}</div>
    @endif

    <div class="mb-6 rounded-xl border border-gray-200 bg-white p-4 flex flex-wrap items-center justify-between gap-3">
        <div>
            <p class="text-sm text-gray-500">Status</p>
            <p class="font-semibold {{ $settings['is_configured'] ? 'text-green-700' : 'text-amber-700' }}">
                {{ $settings['is_configured'] ? 'Configured' : 'Not configured (mock / test mode)' }}
            </p>
            <p class="text-xs text-gray-500 mt-1">
                Source:
                @if($settings['source'] === 'dashboard') Dashboard settings
                @elseif($settings['source'] === 'environment') .env file
                @else None
                @endif
            </p>
        </div>
        @if($settings['source'] === 'dashboard')
            <form method="POST" action="{{ route('admin.settings.payment-gateway.destroy') }}" onsubmit="return confirm('Clear dashboard credentials?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-3 py-2 text-sm border border-red-200 text-red-700 rounded-lg hover:bg-red-50">Clear dashboard keys</button>
            </form>
        @endif
    </div>

    <form method="POST" action="{{ route('admin.settings.payment-gateway.update') }}" class="bg-white rounded-xl border border-gray-200 p-6 space-y-5">
        @csrf
        @method('PUT')

        @if($errors->any())
            <div class="rounded-lg bg-red-50 border border-red-200 text-red-700 px-4 py-3">
                <ul class="list-disc list-inside text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Access Key</label>
            <input type="text" name="access_key" value="{{ old('access_key', $settings['access_key']) }}" autocomplete="off" class="w-full border border-gray-300 rounded-lg px-3 py-2 font-mono text-sm" placeholder="NIMBBL_ACCESS_KEY">
            <p class="text-xs text-gray-500 mt-1">From your Nimbbl merchant dashboard</p>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Access Secret</label>
            <input type="password" name="access_secret" value="" autocomplete="new-password" class="w-full border border-gray-300 rounded-lg px-3 py-2 font-mono text-sm" placeholder="{{ filled($settings['access_secret']) ? '••••••••  (leave blank to keep current)' : 'NIMBBL_ACCESS_SECRET' }}">
            <p class="text-xs text-gray-500 mt-1">Leave blank to keep the existing secret</p>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Webhook Secret <span class="text-gray-400 font-normal">(optional)</span></label>
            <input type="password" name="webhook_secret" value="" autocomplete="new-password" class="w-full border border-gray-300 rounded-lg px-3 py-2 font-mono text-sm" placeholder="{{ filled($settings['webhook_secret']) ? '••••••••  (leave blank to keep current)' : 'Optional webhook signing secret' }}">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Currency</label>
            <input type="text" name="currency" value="{{ old('currency', $settings['currency'] ?? 'INR') }}" maxlength="3" class="w-32 border border-gray-300 rounded-lg px-3 py-2 uppercase" required>
        </div>

        <div class="flex justify-end gap-3 pt-2">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Save Gateway Settings</button>
        </div>
    </form>
</div>
@endsection
