@extends('layouts.admin')
@section('title', 'Company Profile - VanTroZ Admin')
@section('page-title', 'Company Profile')
@section('content')
<div class="max-w-4xl mx-auto p-6">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Company Profile</h1>
        <p class="text-gray-600 mt-1">Legal, GST, bank and Udyam details used on tax invoices</p>
    </div>

    @if(session('success'))
        <div class="mb-4 rounded-lg bg-green-50 border border-green-200 text-green-800 px-4 py-3">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.settings.company-profile.update') }}" class="space-y-6">
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

        <div class="bg-white rounded-xl border border-gray-200 p-6 space-y-4">
            <h2 class="font-semibold text-lg">Business identity</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Legal name *</label>
                    <input type="text" name="legal_name" value="{{ old('legal_name', $profile['legal_name']) }}" required class="w-full border border-gray-300 rounded-lg px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Trade name</label>
                    <input type="text" name="trade_name" value="{{ old('trade_name', $profile['trade_name']) }}" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email', $profile['email']) }}" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                    <input type="text" name="phone" value="{{ old('phone', $profile['phone']) }}" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 p-6 space-y-4">
            <h2 class="font-semibold text-lg">Registered address</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Address line 1 *</label>
                    <input type="text" name="address_line_1" value="{{ old('address_line_1', $profile['address_line_1']) }}" required class="w-full border border-gray-300 rounded-lg px-3 py-2">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Address line 2</label>
                    <input type="text" name="address_line_2" value="{{ old('address_line_2', $profile['address_line_2']) }}" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">City *</label>
                    <input type="text" name="city" value="{{ old('city', $profile['city']) }}" required class="w-full border border-gray-300 rounded-lg px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">State *</label>
                    <input type="text" name="state" value="{{ old('state', $profile['state']) }}" required class="w-full border border-gray-300 rounded-lg px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">GST state code</label>
                    <input type="text" name="state_code" value="{{ old('state_code', $profile['state_code']) }}" maxlength="2" placeholder="06" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">PIN code</label>
                    <input type="text" name="postal_code" value="{{ old('postal_code', $profile['postal_code']) }}" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Country *</label>
                    <input type="text" name="country" value="{{ old('country', $profile['country']) }}" required class="w-full border border-gray-300 rounded-lg px-3 py-2">
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 p-6 space-y-4">
            <h2 class="font-semibold text-lg">Tax & registrations</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">PAN</label>
                    <input type="text" name="pan" value="{{ old('pan', $profile['pan']) }}" maxlength="10" class="w-full border border-gray-300 rounded-lg px-3 py-2 uppercase">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">GSTIN</label>
                    <input type="text" name="gstin" value="{{ old('gstin', $profile['gstin']) }}" maxlength="15" class="w-full border border-gray-300 rounded-lg px-3 py-2 uppercase">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Udyam registration</label>
                    <input type="text" name="udyam" value="{{ old('udyam', $profile['udyam']) }}" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">CIN</label>
                    <input type="text" name="cin" value="{{ old('cin', $profile['cin']) }}" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Default GST %</label>
                    <input type="number" step="0.01" min="0" max="100" name="default_gst_rate" value="{{ old('default_gst_rate', $profile['default_gst_rate']) }}" required class="w-full border border-gray-300 rounded-lg px-3 py-2">
                    <p class="text-xs text-gray-500 mt-1">Example: 18 → final = price + 18% GST</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Default HSN / SAC</label>
                    <input type="text" name="default_hsn_sac" value="{{ old('default_hsn_sac', $profile['default_hsn_sac']) }}" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Default place of supply</label>
                    <input type="text" name="place_of_supply_default" value="{{ old('place_of_supply_default', $profile['place_of_supply_default']) }}" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Invoice prefix</label>
                    <input type="text" name="invoice_prefix" value="{{ old('invoice_prefix', $profile['invoice_prefix']) }}" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 p-6 space-y-4">
            <h2 class="font-semibold text-lg">Bank details (shown on invoice)</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Bank name</label>
                    <input type="text" name="bank_name" value="{{ old('bank_name', $profile['bank_name']) }}" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Account holder name</label>
                    <input type="text" name="bank_account_name" value="{{ old('bank_account_name', $profile['bank_account_name']) }}" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Account number</label>
                    <input type="text" name="bank_account_number" value="{{ old('bank_account_number', $profile['bank_account_number']) }}" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">IFSC</label>
                    <input type="text" name="bank_ifsc" value="{{ old('bank_ifsc', $profile['bank_ifsc']) }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 uppercase">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Branch</label>
                    <input type="text" name="bank_branch" value="{{ old('bank_branch', $profile['bank_branch']) }}" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 p-6 space-y-4">
            <h2 class="font-semibold text-lg">Invoice terms</h2>
            <textarea name="invoice_terms" rows="4" class="w-full border border-gray-300 rounded-lg px-3 py-2">{{ old('invoice_terms', $profile['invoice_terms']) }}</textarea>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Save Company Profile</button>
        </div>
    </form>
</div>
@endsection
