@php $c = $customer; @endphp
<form method="POST" action="{{ $action }}" class="space-y-5">
    @csrf
    @if(($method ?? 'POST') !== 'POST')
        @method($method)
    @endif

    @if($errors->any())
        <div class="rounded-xl bg-rose-50 border border-rose-200 text-rose-700 px-4 py-3 text-sm">
            <ul class="list-disc list-inside space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="admin-grid-2">
        <div class="admin-field">
            <label>Name *</label>
            <input type="text" name="name" value="{{ old('name', $c->name ?? '') }}" required>
        </div>
        <div class="admin-field">
            <label>Email *</label>
            <input type="email" name="email" value="{{ old('email', $c->email ?? '') }}" required>
        </div>
        <div class="admin-field">
            <label>Phone *</label>
            <input type="text" name="phone" value="{{ old('phone', $c->phone ?? '') }}" required>
        </div>
        <div class="admin-field">
            <label>Company</label>
            <input type="text" name="company_name" value="{{ old('company_name', $c->company_name ?? '') }}">
        </div>
        <div class="admin-field span-2">
            <label>Address line 1 *</label>
            <input type="text" name="address_line_1" value="{{ old('address_line_1', $c->address_line_1 ?? '') }}" required>
        </div>
        <div class="admin-field span-2">
            <label>Address line 2</label>
            <input type="text" name="address_line_2" value="{{ old('address_line_2', $c->address_line_2 ?? '') }}">
        </div>
        <div class="admin-field">
            <label>City *</label>
            <input type="text" name="city" value="{{ old('city', $c->city ?? '') }}" required>
        </div>
        <x-admin.india-state-select
            name="state"
            :value="old('state', $c->state ?? '')"
            label="State"
            :required="true"
        />
        <div class="admin-field">
            <label>Country *</label>
            <input type="text" name="country" value="{{ old('country', $c->country ?? 'India') }}" required>
        </div>
        <div class="admin-field">
            <label>Postal code *</label>
            <input type="text" name="postal_code" value="{{ old('postal_code', $c->postal_code ?? '') }}" required>
        </div>
    </div>

    <div class="admin-actions">
        <a href="{{ route('admin.customers.index') }}" class="admin-btn admin-btn-secondary">Cancel</a>
        <button type="submit" class="admin-btn admin-btn-primary">
            {{ $c ? 'Save Changes' : 'Onboard Client' }}
        </button>
    </div>
</form>
