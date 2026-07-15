@extends('layouts.admin')
@section('title', 'Create Invoice - VanTroZ Admin')
@section('page-title', 'Create Invoice')
@section('content')
@php
    $defaultGst = (float) old('default_gst_rate', $company['default_gst_rate'] ?? 18);
    $defaultHsn = old('default_hsn', $company['default_hsn_sac'] ?? '');
@endphp
<div class="max-w-5xl mx-auto p-6"
     x-data="invoiceForm({
        type: @js(old('type', 'custom')),
        defaultGst: @js((float) $defaultGst),
        lineItems: @js(old('line_items', [['title' => '', 'description' => '', 'hsn' => $defaultHsn, 'quantity' => 1, 'rate' => '', 'gst_rate' => $defaultGst]]))
     })">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Create Tax Invoice</h1>
            <p class="text-gray-600 mt-1">HSN / SAC, GST exclusive rates — final payable = price + GST</p>
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

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Client *</label>
                <select name="customer_id" required class="w-full border border-gray-300 rounded-lg px-3 py-2">
                    <option value="">Select client</option>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}" @selected(old('customer_id', $selectedCustomerId) == $customer->id)>
                            {{ $customer->name }} — {{ $customer->email }}@if($customer->company_name) ({{ $customer->company_name }})@endif
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Place of supply</label>
                <input type="text" name="place_of_supply" value="{{ old('place_of_supply', $company['place_of_supply_default'] ?? '') }}" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="State">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Buyer GSTIN</label>
                <input type="text" name="buyer_gstin" value="{{ old('buyer_gstin') }}" maxlength="15" class="w-full border border-gray-300 rounded-lg px-3 py-2 uppercase">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Default GST %</label>
                <input type="number" step="0.01" min="0" max="100" name="default_gst_rate" x-model.number="defaultGst" @change="applyDefaultGst()" class="w-full border border-gray-300 rounded-lg px-3 py-2">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Default HSN / SAC</label>
                <input type="text" name="default_hsn" value="{{ $defaultHsn }}" class="w-full border border-gray-300 rounded-lg px-3 py-2">
            </div>
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
            <input type="text" name="invoice_title" value="{{ old('invoice_title') }}" class="w-full border border-gray-300 rounded-lg px-3 py-2">
        </div>

        <div x-show="type === 'package'" x-cloak>
            <label class="block text-sm font-medium text-gray-700 mb-1">Package *</label>
            <select name="package_id" class="w-full border border-gray-300 rounded-lg px-3 py-2" :disabled="type !== 'package'">
                <option value="">Select package</option>
                @foreach($packages as $package)
                    <option value="{{ $package->id }}" @selected(old('package_id') == $package->id)>
                        {{ $package->subService->service->title ?? '' }} / {{ $package->subService->title ?? '' }} — {{ $package->package_name }} (₹{{ number_format($package->final_price, 2) }} + GST)
                    </option>
                @endforeach
            </select>
            <p class="text-xs text-gray-500 mt-1">GST from default rate above will be added to package price.</p>
        </div>

        <div x-show="type === 'custom'" x-cloak class="space-y-4">
            <div class="flex justify-between items-center">
                <label class="block text-sm font-medium text-gray-700">Line items *</label>
                <button type="button" @click="addItem()" class="text-sm text-blue-600 hover:underline">+ Add item</button>
            </div>
            <template x-for="(item, index) in lineItems" :key="index">
                <div class="border border-gray-200 rounded-lg p-4 space-y-3">
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-3">
                        <div class="md:col-span-4">
                            <label class="block text-xs text-gray-500 mb-1">Title</label>
                            <input type="text" :name="`line_items[${index}][title]`" x-model="item.title" class="w-full border border-gray-300 rounded-lg px-3 py-2" :required="type === 'custom'">
                        </div>
                        <div class="md:col-span-4">
                            <label class="block text-xs text-gray-500 mb-1">Description</label>
                            <input type="text" :name="`line_items[${index}][description]`" x-model="item.description" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                        </div>
                        <div class="md:col-span-3">
                            <label class="block text-xs text-gray-500 mb-1">HSN / SAC</label>
                            <input type="text" :name="`line_items[${index}][hsn]`" x-model="item.hsn" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                        </div>
                        <div class="md:col-span-1 flex items-end">
                            <button type="button" @click="removeItem(index)" class="w-full px-2 py-2 text-red-600 border border-red-200 rounded-lg hover:bg-red-50" :disabled="lineItems.length === 1">×</button>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-5 gap-3">
                        <div>
                            <label class="block text-xs text-gray-500 mb-1">Qty</label>
                            <input type="number" step="0.01" min="0.01" :name="`line_items[${index}][quantity]`" x-model.number="item.quantity" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                        </div>
                        <div>
                            <label class="block text-xs text-gray-500 mb-1">Rate (ex-GST)</label>
                            <input type="number" step="0.01" min="0" :name="`line_items[${index}][rate]`" x-model.number="item.rate" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                        </div>
                        <div>
                            <label class="block text-xs text-gray-500 mb-1">GST %</label>
                            <input type="number" step="0.01" min="0" max="100" :name="`line_items[${index}][gst_rate]`" x-model.number="item.gst_rate" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                        </div>
                        <div>
                            <label class="block text-xs text-gray-500 mb-1">Taxable</label>
                            <p class="py-2 text-sm font-medium" x-text="'₹' + lineTaxable(item).toFixed(2)"></p>
                        </div>
                        <div>
                            <label class="block text-xs text-gray-500 mb-1">Line total</label>
                            <p class="py-2 text-sm font-semibold text-blue-700" x-text="'₹' + lineTotal(item).toFixed(2)"></p>
                        </div>
                    </div>
                </div>
            </template>

            <div class="rounded-lg bg-gray-50 border border-gray-200 p-4 text-sm space-y-1">
                <div class="flex justify-between"><span>Taxable value</span><strong x-text="'₹' + subtotal.toFixed(2)"></strong></div>
                <div class="flex justify-between"><span>GST</span><strong x-text="'₹' + taxTotal.toFixed(2)"></strong></div>
                <div class="flex justify-between text-base border-t pt-2 mt-2"><span>Grand total (payable)</span><strong class="text-blue-700" x-text="'₹' + grandTotal.toFixed(2)"></strong></div>
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Notes</label>
            <textarea name="notes" rows="3" class="w-full border border-gray-300 rounded-lg px-3 py-2">{{ old('notes') }}</textarea>
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
        defaultGst: Number(initial.defaultGst || 18),
        lineItems: (initial.lineItems && initial.lineItems.length ? initial.lineItems : [{}]).map(i => ({
            title: i.title || '',
            description: i.description || '',
            hsn: i.hsn || '',
            quantity: Number(i.quantity || 1),
            rate: i.rate === '' || i.rate === null ? '' : Number(i.rate),
            gst_rate: i.gst_rate === '' || i.gst_rate === null ? Number(initial.defaultGst || 18) : Number(i.gst_rate),
        })),
        addItem() {
            this.lineItems.push({ title: '', description: '', hsn: '', quantity: 1, rate: '', gst_rate: this.defaultGst });
        },
        removeItem(index) {
            if (this.lineItems.length > 1) this.lineItems.splice(index, 1);
        },
        applyDefaultGst() {
            this.lineItems.forEach(item => { item.gst_rate = this.defaultGst; });
        },
        lineTaxable(item) {
            return Number(item.quantity || 0) * Number(item.rate || 0);
        },
        lineTax(item) {
            return this.lineTaxable(item) * (Number(item.gst_rate || 0) / 100);
        },
        lineTotal(item) {
            return this.lineTaxable(item) + this.lineTax(item);
        },
        get subtotal() {
            return this.lineItems.reduce((sum, item) => sum + this.lineTaxable(item), 0);
        },
        get taxTotal() {
            return this.lineItems.reduce((sum, item) => sum + this.lineTax(item), 0);
        },
        get grandTotal() {
            return this.subtotal + this.taxTotal;
        },
    };
}
</script>
<style>[x-cloak]{display:none!important}</style>
@endpush
@endsection
