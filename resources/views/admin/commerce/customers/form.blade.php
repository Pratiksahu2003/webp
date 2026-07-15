@php $c = $customer; @endphp
<form method="POST" action="{{ $action }}" class="space-y-6">
    @csrf
    @if(($method ?? 'POST') !== 'POST')
        @method($method)
    @endif

    @if($errors->any())
        <div class="rounded-lg bg-red-50 border border-red-200 text-red-700 px-4 py-3">
            <ul class="list-disc list-inside text-sm">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Name *</label>
            <input type="text" name="name" value="{{ old('name', $c->name ?? '') }}" required class="w-full border border-gray-300 rounded-lg px-3 py-2">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
            <input type="email" name="email" value="{{ old('email', $c->email ?? '') }}" required class="w-full border border-gray-300 rounded-lg px-3 py-2">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Phone *</label>
            <input type="text" name="phone" value="{{ old('phone', $c->phone ?? '') }}" required class="w-full border border-gray-300 rounded-lg px-3 py-2">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Company</label>
            <input type="text" name="company_name" value="{{ old('company_name', $c->company_name ?? '') }}" class="w-full border border-gray-300 rounded-lg px-3 py-2">
        </div>
        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-1">Address line 1 *</label>
            <input type="text" name="address_line_1" value="{{ old('address_line_1', $c->address_line_1 ?? '') }}" required class="w-full border border-gray-300 rounded-lg px-3 py-2">
        </div>
        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-1">Address line 2</label>
            <input type="text" name="address_line_2" value="{{ old('address_line_2', $c->address_line_2 ?? '') }}" class="w-full border border-gray-300 rounded-lg px-3 py-2">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">City *</label>
            <input type="text" name="city" value="{{ old('city', $c->city ?? '') }}" required class="w-full border border-gray-300 rounded-lg px-3 py-2">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">State *</label>
            <input type="text" name="state" value="{{ old('state', $c->state ?? '') }}" required class="w-full border border-gray-300 rounded-lg px-3 py-2">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Country *</label>
            <input type="text" name="country" value="{{ old('country', $c->country ?? 'India') }}" required class="w-full border border-gray-300 rounded-lg px-3 py-2">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Postal code *</label>
            <input type="text" name="postal_code" value="{{ old('postal_code', $c->postal_code ?? '') }}" required class="w-full border border-gray-300 rounded-lg px-3 py-2">
        </div>
    </div>

    <div class="flex justify-end gap-3">
        <a href="{{ route('admin.customers.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">Cancel</a>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
            {{ $c ? 'Save Changes' : 'Onboard Client' }}
        </button>
    </div>
</form>
