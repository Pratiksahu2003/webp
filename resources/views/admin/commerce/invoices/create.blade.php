@extends('layouts.admin')
@section('title', 'Create Invoice - VanTroZ Admin')
@section('page-title', 'Create Invoice')
@section('content')
<div class="max-w-4xl mx-auto p-6"
     x-data="invoiceForm({
        type: @js(old('type', 'custom')),
        lineItems: @js(old('line_items', [['title' => '', 'description' => '', 'quantity' => 1, 'rate' => '']]))
     })">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Create Invoice</h1>
            <p class="text-gray-600 mt-1">Catalog package or custom line items</p>
        </div>
        <a href="{{ route('admin.invoices.index') }}" class="text-gray-600">← Back</a>
    </div>

    <form method="POST" action="{{ route('admin.invoices.store') }}" class="bg-white rounded-xl border border-gray-200 p-6 space-y-6">
        @csrf

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
            <label class="block text-sm font-medium text-gray-700 mb-1">Client *</label>
            <select name="customer_id" required class="w-full border border-gray-300 rounded-lg px-3 py-2">
                <option value="">Select client</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}" @selected(old('customer_id', $selectedCustomerId) == $customer->id)>
                        {{ $customer->name }} — {{ $customer->email }}@if($customer->company_name) ({{ $customer->company_name }})@endif
                    </option>
                @endforeach
            </select>
            @if($customers->isEmpty())
                <p class="text-sm text-amber-700 mt-2">No clients yet. <a href="{{ route('admin.customers.create') }}" class="underline">Onboard a client</a> first.</p>
            @endif
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Invoice type *</label>
            <div class="flex gap-4">
                <label class="inline-flex items-center gap-2">
                    <input type="radio" name="type" value="custom" x-model="type" class="text-blue-600">
                    <span>Custom line items</span>
                </label>
                <label class="inline-flex items-center gap-2">
                    <input type="radio" name="type" value="package" x-model="type" class="text-blue-600">
                    <span>Catalog package</span>
                </label>
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Invoice title</label>
            <input type="text" name="invoice_title" value="{{ old('invoice_title') }}" placeholder="Optional" class="w-full border border-gray-300 rounded-lg px-3 py-2">
        </div>

        <div x-show="type === 'package'" x-cloak>
            <label class="block text-sm font-medium text-gray-700 mb-1">Package *</label>
            <select name="package_id" class="w-full border border-gray-300 rounded-lg px-3 py-2" :disabled="type !== 'package'">
                <option value="">Select package</option>
                @foreach($packages as $package)
                    <option value="{{ $package->id }}" @selected(old('package_id') == $package->id)>
                        {{ $package->subService->service->title ?? '' }} / {{ $package->subService->title ?? '' }} — {{ $package->package_name }} (₹{{ number_format($package->final_price, 2) }})
                    </option>
                @endforeach
            </select>
        </div>

        <div x-show="type === 'custom'" x-cloak class="space-y-4">
            <div class="flex justify-between items-center">
                <label class="block text-sm font-medium text-gray-700">Line items *</label>
                <button type="button" @click="addItem()" class="text-sm text-blue-600 hover:underline">+ Add item</button>
            </div>
            <template x-for="(item, index) in lineItems" :key="index">
                <div class="grid grid-cols-1 md:grid-cols-12 gap-3 border border-gray-200 rounded-lg p-4">
                    <div class="md:col-span-4">
                        <label class="block text-xs text-gray-500 mb-1">Title</label>
                        <input type="text" :name="`line_items[${index}][title]`" x-model="item.title" class="w-full border border-gray-300 rounded-lg px-3 py-2" :required="type === 'custom'">
                    </div>
                    <div class="md:col-span-3">
                        <label class="block text-xs text-gray-500 mb-1">Description</label>
                        <input type="text" :name="`line_items[${index}][description]`" x-model="item.description" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs text-gray-500 mb-1">Qty</label>
                        <input type="number" step="0.01" min="0.01" :name="`line_items[${index}][quantity]`" x-model.number="item.quantity" class="w-full border border-gray-300 rounded-lg px-3 py-2" :required="type === 'custom'">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs text-gray-500 mb-1">Rate (₹)</label>
                        <input type="number" step="0.01" min="0" :name="`line_items[${index}][rate]`" x-model.number="item.rate" class="w-full border border-gray-300 rounded-lg px-3 py-2" :required="type === 'custom'">
                    </div>
                    <div class="md:col-span-1 flex items-end">
                        <button type="button" @click="removeItem(index)" class="w-full px-2 py-2 text-red-600 border border-red-200 rounded-lg hover:bg-red-50" :disabled="lineItems.length === 1">×</button>
                    </div>
                </div>
            </template>
            <p class="text-sm text-gray-600">Estimated total: <strong>₹<span x-text="total.toFixed(2)"></span></strong></p>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Notes</label>
            <textarea name="notes" rows="3" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Optional note included on the invoice email">{{ old('notes') }}</textarea>
        </div>

        <label class="inline-flex items-center gap-2">
            <input type="checkbox" name="send_now" value="1" @checked(old('send_now')) class="rounded border-gray-300 text-blue-600">
            <span class="text-sm text-gray-700">Email invoice with payment link now</span>
        </label>

        <div class="flex justify-end gap-3 pt-2">
            <a href="{{ route('admin.invoices.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">Cancel</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Create Invoice</button>
        </div>
    </form>
</div>

@push('scripts')
<script>
function invoiceForm(initial) {
    return {
        type: initial.type || 'custom',
        lineItems: initial.lineItems && initial.lineItems.length
            ? initial.lineItems.map(i => ({
                title: i.title || '',
                description: i.description || '',
                quantity: Number(i.quantity || 1),
                rate: i.rate === '' || i.rate === null ? '' : Number(i.rate),
            }))
            : [{ title: '', description: '', quantity: 1, rate: '' }],
        addItem() {
            this.lineItems.push({ title: '', description: '', quantity: 1, rate: '' });
        },
        removeItem(index) {
            if (this.lineItems.length > 1) {
                this.lineItems.splice(index, 1);
            }
        },
        get total() {
            return this.lineItems.reduce((sum, item) => {
                return sum + (Number(item.quantity || 0) * Number(item.rate || 0));
            }, 0);
        },
    };
}
</script>
<style>[x-cloak]{display:none!important}</style>
@endpush
@endsection
