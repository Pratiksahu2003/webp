@extends('layouts.admin')
@section('title', 'Create Invoice - VanTroZ Admin')
@section('page-title', 'Create Invoice')
@section('content')
@php
    $defaultGst = (float) old('default_gst_rate', $company['default_gst_rate'] ?? 18);
    $defaultHsn = old('default_hsn', $company['default_hsn_sac'] ?? '');
@endphp
<div class="admin-page"
     x-data="invoiceForm({
        type: @js(old('type', 'custom')),
        defaultGst: @js((float) $defaultGst),
        lineItems: @js(old('line_items', [['title' => '', 'description' => '', 'hsn' => $defaultHsn, 'quantity' => 1, 'rate' => '', 'gst_rate' => $defaultGst]]))
     })">
    <div class="admin-page-header">
        <div>
            <h1>Create Tax Invoice</h1>
            <p>Rates are GST-exclusive. Payable amount = taxable value + GST.</p>
        </div>
        <a href="{{ route('admin.invoices.index') }}" class="admin-btn admin-btn-secondary">← Back to invoices</a>
    </div>

    <form method="POST" action="{{ route('admin.invoices.store') }}" class="space-y-4">
        @csrf

        @if($errors->any())
            <div class="admin-card">
                <div class="admin-card-body">
                    <div class="rounded-xl bg-rose-50 border border-rose-200 text-rose-700 px-4 py-3 text-sm">
                        <ul class="list-disc list-inside space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <div class="admin-card">
            <div class="admin-card-header">
                <div>
                    <h2>Client & tax details</h2>
                    <p>Buyer info, place of supply, and default GST / HSN</p>
                </div>
            </div>
            <div class="admin-card-body space-y-5">
                <div class="admin-field">
                    <label for="customer_id">Client *</label>
                    <select id="customer_id" name="customer_id" required>
                        <option value="">Select client</option>
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}" @selected(old('customer_id', $selectedCustomerId) == $customer->id)>
                                {{ $customer->name }} — {{ $customer->email }}@if($customer->company_name) ({{ $customer->company_name }})@endif
                            </option>
                        @endforeach
                    </select>
                    @if($customers->isEmpty())
                        <p class="admin-help">No clients yet. <a href="{{ route('admin.customers.create') }}" class="text-teal-700 underline">Onboard a client</a> first.</p>
                    @endif
                </div>

                <div class="admin-grid-2">
                    <div class="admin-field">
                        <label for="place_of_supply">Place of supply</label>
                        <input id="place_of_supply" type="text" name="place_of_supply" value="{{ old('place_of_supply', $company['place_of_supply_default'] ?? '') }}" placeholder="State">
                    </div>
                    <div class="admin-field">
                        <label for="buyer_gstin">Buyer GSTIN</label>
                        <input id="buyer_gstin" type="text" name="buyer_gstin" value="{{ old('buyer_gstin') }}" maxlength="15" class="uppercase">
                    </div>
                    <div class="admin-field">
                        <label for="default_gst_rate">Default GST %</label>
                        <input id="default_gst_rate" type="number" step="0.01" min="0" max="100" name="default_gst_rate" x-model.number="defaultGst" @change="applyDefaultGst()">
                        <p class="admin-help">Example: 18 → final = price + 18% GST</p>
                    </div>
                    <div class="admin-field">
                        <label for="default_hsn">Default HSN / SAC</label>
                        <input id="default_hsn" type="text" name="default_hsn" value="{{ $defaultHsn }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="admin-card">
            <div class="admin-card-header">
                <div>
                    <h2>Invoice setup</h2>
                    <p>Choose custom lines or a catalog package</p>
                </div>
            </div>
            <div class="admin-card-body space-y-5">
                <div>
                    <label class="mb-2">Invoice type *</label>
                    <div class="admin-segmented">
                        <label>
                            <input type="radio" name="type" value="custom" x-model="type">
                            <span>Custom line items</span>
                        </label>
                        <label>
                            <input type="radio" name="type" value="package" x-model="type">
                            <span>Catalog package</span>
                        </label>
                    </div>
                </div>

                <div class="admin-field">
                    <label for="invoice_title">Invoice title</label>
                    <input id="invoice_title" type="text" name="invoice_title" value="{{ old('invoice_title') }}" placeholder="Optional summary title">
                </div>

                <div x-show="type === 'package'" x-cloak class="admin-field">
                    <label for="package_id">Package *</label>
                    <select id="package_id" name="package_id" :disabled="type !== 'package'">
                        <option value="">Select package</option>
                        @foreach($packages as $package)
                            <option value="{{ $package->id }}" @selected(old('package_id') == $package->id)>
                                {{ $package->subService->service->title ?? '' }} / {{ $package->subService->title ?? '' }} — {{ $package->package_name }} (₹{{ number_format($package->final_price, 2) }} + GST)
                            </option>
                        @endforeach
                    </select>
                    <p class="admin-help">Default GST % above is added to the package price.</p>
                </div>
            </div>
        </div>

        <div class="admin-card" x-show="type === 'custom'" x-cloak>
            <div class="admin-card-header">
                <div>
                    <h2>Line items</h2>
                    <p>Add HSN/SAC, quantity, ex-GST rate, and GST %</p>
                </div>
                <button type="button" @click="addItem()" class="admin-btn admin-btn-secondary text-sm py-2">+ Add item</button>
            </div>
            <div class="admin-card-body space-y-4">
                <template x-for="(item, index) in lineItems" :key="index">
                    <div class="admin-line-item space-y-3">
                        <div class="flex items-center justify-between">
                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-400" x-text="'Item ' + (index + 1)"></p>
                            <button type="button" @click="removeItem(index)" class="text-sm text-rose-600 hover:text-rose-700 disabled:opacity-40" :disabled="lineItems.length === 1">Remove</button>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-12 gap-3">
                            <div class="md:col-span-4 admin-field">
                                <label>Title</label>
                                <input type="text" :name="`line_items[${index}][title]`" x-model="item.title" :required="type === 'custom'">
                            </div>
                            <div class="md:col-span-5 admin-field">
                                <label>Description</label>
                                <input type="text" :name="`line_items[${index}][description]`" x-model="item.description">
                            </div>
                            <div class="md:col-span-3 admin-field">
                                <label>HSN / SAC</label>
                                <input type="text" :name="`line_items[${index}][hsn]`" x-model="item.hsn">
                            </div>
                        </div>
                        <div class="grid grid-cols-2 md:grid-cols-5 gap-3">
                            <div class="admin-field">
                                <label>Qty</label>
                                <input type="number" step="0.01" min="0.01" :name="`line_items[${index}][quantity]`" x-model.number="item.quantity">
                            </div>
                            <div class="admin-field">
                                <label>Rate (ex-GST)</label>
                                <input type="number" step="0.01" min="0" :name="`line_items[${index}][rate]`" x-model.number="item.rate">
                            </div>
                            <div class="admin-field">
                                <label>GST %</label>
                                <input type="number" step="0.01" min="0" max="100" :name="`line_items[${index}][gst_rate]`" x-model.number="item.gst_rate">
                            </div>
                            <div class="admin-field">
                                <label>Taxable</label>
                                <div class="h-[46px] flex items-center px-3 rounded-[10px] bg-slate-50 border border-slate-200 text-sm font-semibold text-slate-700" x-text="'₹' + lineTaxable(item).toFixed(2)"></div>
                            </div>
                            <div class="admin-field">
                                <label>Line total</label>
                                <div class="h-[46px] flex items-center px-3 rounded-[10px] bg-teal-50 border border-teal-200 text-sm font-bold text-teal-800" x-text="'₹' + lineTotal(item).toFixed(2)"></div>
                            </div>
                        </div>
                    </div>
                </template>

                <div class="admin-total-box">
                    <div class="row"><span>Taxable value</span><span x-text="'₹' + subtotal.toFixed(2)"></span></div>
                    <div class="row"><span>GST</span><span x-text="'₹' + taxTotal.toFixed(2)"></span></div>
                    <div class="row grand"><span>Grand total (payable)</span><span x-text="'₹' + grandTotal.toFixed(2)"></span></div>
                </div>
            </div>
        </div>

        <div class="admin-card">
            <div class="admin-card-header">
                <div>
                    <h2>Notes & delivery</h2>
                    <p>Optional notes and email send</p>
                </div>
            </div>
            <div class="admin-card-body space-y-4">
                <div class="admin-field">
                    <label for="notes">Notes</label>
                    <textarea id="notes" name="notes" rows="3" placeholder="Shown on invoice email">{{ old('notes') }}</textarea>
                </div>
                <label class="inline-flex items-center gap-2.5 !mb-0 cursor-pointer">
                    <input type="checkbox" name="send_now" value="1" @checked(old('send_now')) class="rounded border-slate-300 text-teal-700">
                    <span class="text-sm font-medium text-slate-700">Email invoice with payment link now</span>
                </label>
                <div class="admin-actions pt-2">
                    <a href="{{ route('admin.invoices.index') }}" class="admin-btn admin-btn-secondary">Cancel</a>
                    <button type="submit" class="admin-btn admin-btn-primary">Create Invoice</button>
                </div>
            </div>
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
@endpush
@endsection
