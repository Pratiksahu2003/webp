@extends('layouts.admin')
@section('title', 'Company Profile - VanTroZ Admin')
@section('page-title', 'Company Profile')
@section('content')
<div class="admin-page">
    <div class="admin-page-header">
        <div>
            <h1>Company Profile</h1>
            <p>Legal, GST, bank and Udyam details used on tax invoices</p>
        </div>
    </div>

    <form method="POST" action="{{ route('admin.settings.company-profile.update') }}" class="space-y-4">
        @csrf
        @method('PUT')

        @if($errors->any())
            <div class="admin-card"><div class="admin-card-body">
                <div class="rounded-xl bg-rose-50 border border-rose-200 text-rose-700 px-4 py-3 text-sm">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                    </ul>
                </div>
            </div></div>
        @endif

        <div class="admin-card">
            <div class="admin-card-header"><div><h2>Business identity</h2></div></div>
            <div class="admin-card-body">
                <div class="admin-grid-2">
                    <div class="admin-field"><label>Legal name *</label><input type="text" name="legal_name" value="{{ old('legal_name', $profile['legal_name']) }}" required></div>
                    <div class="admin-field"><label>Trade name</label><input type="text" name="trade_name" value="{{ old('trade_name', $profile['trade_name']) }}"></div>
                    <div class="admin-field"><label>Email</label><input type="email" name="email" value="{{ old('email', $profile['email']) }}"></div>
                    <div class="admin-field"><label>Phone</label><input type="text" name="phone" value="{{ old('phone', $profile['phone']) }}"></div>
                </div>
            </div>
        </div>

        <div class="admin-card">
            <div class="admin-card-header"><div><h2>Registered address</h2></div></div>
            <div class="admin-card-body">
                <div class="admin-grid-2">
                    <div class="admin-field span-2"><label>Address line 1 *</label><input type="text" name="address_line_1" value="{{ old('address_line_1', $profile['address_line_1']) }}" required></div>
                    <div class="admin-field span-2"><label>Address line 2</label><input type="text" name="address_line_2" value="{{ old('address_line_2', $profile['address_line_2']) }}"></div>
                    <div class="admin-field"><label>City *</label><input type="text" name="city" value="{{ old('city', $profile['city']) }}" required></div>
                    <div class="contents" x-data="{
                        state: @js(\App\Support\IndianGstStates::canonicalName(old('state', $profile['state'])) ?? old('state', $profile['state'])),
                        codes: @js(\App\Support\IndianGstStates::all()),
                        get code() {
                            const entry = Object.entries(this.codes).find(([, name]) => name === this.state);
                            return entry ? entry[0] : '';
                        }
                    }">
                        <x-admin.india-state-select
                            name="state"
                            :value="old('state', $profile['state'])"
                            label="State"
                            x-model="state"
                        />
                        <div class="admin-field">
                            <label for="state_code">GST state code</label>
                            <input id="state_code" type="text" name="state_code" :value="code" value="{{ old('state_code', $profile['state_code']) }}" maxlength="2" readonly>
                            <p class="admin-help">Auto-filled from GST state mapping</p>
                        </div>
                    </div>
                    <div class="admin-field"><label>PIN code</label><input type="text" name="postal_code" value="{{ old('postal_code', $profile['postal_code']) }}"></div>
                    <div class="admin-field"><label>Country *</label><input type="text" name="country" value="{{ old('country', $profile['country']) }}" required></div>
                </div>
            </div>
        </div>

        <div class="admin-card">
            <div class="admin-card-header"><div><h2>Tax & registrations</h2></div></div>
            <div class="admin-card-body">
                <div class="admin-grid-2">
                    <div class="admin-field"><label>PAN</label><input type="text" name="pan" value="{{ old('pan', $profile['pan']) }}" maxlength="10"></div>
                    <div class="admin-field"><label>GSTIN</label><input type="text" name="gstin" value="{{ old('gstin', $profile['gstin']) }}" maxlength="15"></div>
                    <div class="admin-field"><label>Udyam registration</label><input type="text" name="udyam" value="{{ old('udyam', $profile['udyam']) }}"></div>
                    <div class="admin-field"><label>CIN</label><input type="text" name="cin" value="{{ old('cin', $profile['cin']) }}"></div>
                    <div class="admin-field"><label>Default GST %</label><input type="number" step="0.01" min="0" max="100" name="default_gst_rate" value="{{ old('default_gst_rate', $profile['default_gst_rate']) }}" required><p class="admin-help">Example: 18 → final = price + 18% GST</p></div>
                    <div class="admin-field"><label>Default HSN / SAC</label><input type="text" name="default_hsn_sac" value="{{ old('default_hsn_sac', $profile['default_hsn_sac']) }}"></div>
                    <x-admin.india-state-select
                        name="place_of_supply_default"
                        :value="old('place_of_supply_default', $profile['place_of_supply_default'])"
                        label="Default place of supply"
                        :required="false"
                        placeholder="Same as company state if empty"
                    />
                    <div class="admin-field"><label>Invoice prefix</label><input type="text" name="invoice_prefix" value="{{ old('invoice_prefix', $profile['invoice_prefix']) }}"></div>
                </div>
            </div>
        </div>

        <div class="admin-card">
            <div class="admin-card-header"><div><h2>Bank details</h2><p>Shown on tax invoices</p></div></div>
            <div class="admin-card-body">
                <div class="admin-grid-2">
                    <div class="admin-field"><label>Bank name</label><input type="text" name="bank_name" value="{{ old('bank_name', $profile['bank_name']) }}"></div>
                    <div class="admin-field"><label>Account holder name</label><input type="text" name="bank_account_name" value="{{ old('bank_account_name', $profile['bank_account_name']) }}"></div>
                    <div class="admin-field"><label>Account number</label><input type="text" name="bank_account_number" value="{{ old('bank_account_number', $profile['bank_account_number']) }}"></div>
                    <div class="admin-field"><label>IFSC</label><input type="text" name="bank_ifsc" value="{{ old('bank_ifsc', $profile['bank_ifsc']) }}"></div>
                    <div class="admin-field span-2"><label>Branch</label><input type="text" name="bank_branch" value="{{ old('bank_branch', $profile['bank_branch']) }}"></div>
                </div>
            </div>
        </div>

        <div class="admin-card">
            <div class="admin-card-header"><div><h2>Invoice terms & jurisdiction</h2><div class="text-sm text-slate-500 font-normal mt-1">Shown on every tax invoice PDF</div></div></div>
            <div class="admin-card-body space-y-4">
                <div class="admin-field">
                    <label>Invoice terms</label>
                    <textarea name="invoice_terms" rows="4">{{ old('invoice_terms', $profile['invoice_terms']) }}</textarea>
                </div>
                <div class="admin-field">
                    <label>Registered court / jurisdiction</label>
                    <input type="text" name="jurisdiction_court" value="{{ old('jurisdiction_court', $profile['jurisdiction_court'] ?? trim(($profile['city'] ?? '').', '.($profile['state'] ?? ''), ' ,')) }}" placeholder="e.g. Gurugram, Haryana">
                    <p class="admin-help">All legal &amp; judicial disputes on invoices are subject only to this local registered court.</p>
                </div>
                <div class="admin-actions"><button type="submit" class="admin-btn admin-btn-primary">Save Company Profile</button></div>
            </div>
        </div>
    </form>
</div>
@endsection
