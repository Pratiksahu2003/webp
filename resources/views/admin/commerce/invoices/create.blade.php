@extends('layouts.admin')
@section('title', 'Create Invoice - VanTroZ Admin')
@section('page-title', 'Create Invoice')
@section('content')
@php
    $customerOptions = $customers->map(fn ($c) => [
        'id' => $c->id,
        'name' => $c->name,
        'email' => $c->email,
        'company_name' => $c->company_name,
        'phone' => $c->phone,
        'state' => $c->state,
        'city' => $c->city,
        'label' => $c->name.' — '.$c->email.($c->company_name ? ' ('.$c->company_name.')' : ''),
    ])->values();
@endphp
<div class="admin-page"
     x-data="invoiceStudio({
        type: @js(old('type', 'custom')),
        customerId: @js(old('customer_id', $selectedCustomerId)),
        customers: @js($customerOptions),
        tax: @js($taxPreview),
        sendNow: @js((bool) old('send_now', true)),
        lineItems: @js(old('line_items', [['title' => '', 'description' => '', 'quantity' => 1, 'rate' => '']])),
        selectedPackageId: @js(old('package_id')),
        packages: @js($packages->map(fn ($p) => [
            'id' => $p->id,
            'name' => $p->package_name,
            'price' => (float) $p->final_price,
            'label' => trim(($p->subService->service->title ?? '').' / '.($p->subService->title ?? '').' — '.$p->package_name),
        ])->values()),
     })">
    <div class="admin-page-header">
        <div>
            <h1>Create tax invoice</h1>
            <p>Pick a client, add items — HSN, GST, and place of supply are applied automatically.</p>
        </div>
        <a href="{{ route('admin.invoices.index') }}" class="admin-btn admin-btn-secondary">← Back</a>
    </div>

    <form method="POST"
          action="{{ route('admin.invoices.store') }}"
          class="space-y-4"
          x-ref="invoiceForm"
          @submit.prevent="submitInvoice()">
        <input type="hidden" name="_token" :value="csrfToken" value="{{ csrf_token() }}">

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

        <div class="grid grid-cols-1 xl:grid-cols-3 gap-4">
            <div class="xl:col-span-2 space-y-4">
                <div class="admin-card">
                    <div class="admin-card-header">
                        <div>
                            <h2>1. Client</h2>
                            <p>Billing details come from the client profile</p>
                        </div>
                    </div>
                    <div class="admin-card-body space-y-4">
                        <div class="admin-field">
                            <label for="customer_id">Client *</label>
                            <select id="customer_id" name="customer_id" required x-model="customerId">
                                <option value="">Select client</option>
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}" @selected((string) old('customer_id', $selectedCustomerId) === (string) $customer->id)>
                                        {{ $customer->name }} — {{ $customer->email }}@if($customer->company_name) ({{ $customer->company_name }})@endif
                                    </option>
                                @endforeach
                            </select>
                            @if($customers->isEmpty())
                                <p class="admin-help">No clients yet. <a href="{{ route('admin.customers.create') }}" class="text-[#ff6b35] underline">Onboard a client</a> first.</p>
                            @endif
                        </div>

                        <div x-show="selectedCustomer" x-cloak class="rounded-xl border border-orange-100 bg-orange-50/60 px-4 py-3 text-sm">
                            <div class="flex flex-wrap gap-x-6 gap-y-1 text-slate-700">
                                <span><span class="text-slate-500">Email:</span> <span x-text="selectedCustomer?.email"></span></span>
                                <span x-show="selectedCustomer?.phone"><span class="text-slate-500">Phone:</span> <span x-text="selectedCustomer?.phone"></span></span>
                                <span x-show="selectedCustomer?.company_name"><span class="text-slate-500">Company:</span> <span x-text="selectedCustomer?.company_name"></span></span>
                                <span><span class="text-slate-500">Place of supply:</span> <strong class="text-[#ff6b35]" x-text="placeOfSupply || '—'"></strong></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="admin-card">
                    <div class="admin-card-header">
                        <div>
                            <h2>2. Invoice type</h2>
                            <p>Custom lines or a catalog package</p>
                        </div>
                    </div>
                    <div class="admin-card-body space-y-5">
                        <div class="admin-segmented">
                            <label>
                                <input type="radio" name="type" value="custom" x-model="type">
                                <span>Custom items</span>
                            </label>
                            <label>
                                <input type="radio" name="type" value="package" x-model="type">
                                <span>Catalog package</span>
                            </label>
                        </div>

                        <div class="admin-field">
                            <label for="invoice_title">Invoice title <span class="font-normal text-slate-400">(optional)</span></label>
                            <input id="invoice_title" type="text" name="invoice_title" value="{{ old('invoice_title') }}" placeholder="Auto-uses first item or package name">
                        </div>

                        <div x-show="type === 'package'" x-cloak class="admin-field">
                            <label for="package_id">Package *</label>
                            <select id="package_id" name="package_id" x-model="selectedPackageId" :disabled="type !== 'package'" :required="type === 'package'">
                                <option value="">Select package</option>
                                @foreach($packages as $package)
                                    <option value="{{ $package->id }}"
                                            data-price="{{ (float) $package->final_price }}"
                                            @selected((string) old('package_id') === (string) $package->id)>
                                        {{ $package->subService->service->title ?? '' }} / {{ $package->subService->title ?? '' }} — {{ $package->package_name }} (₹{{ number_format($package->final_price, 2) }} + GST)
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="admin-card" x-show="type === 'custom'" x-cloak>
                    <div class="admin-card-header">
                        <div>
                            <h2>3. Line items</h2>
                            <p>Only title, qty, and rate — tax codes fill in automatically</p>
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
                                    <div class="md:col-span-5 admin-field">
                                        <label>Title *</label>
                                        <input type="text" :name="`line_items[${index}][title]`" x-model="item.title" :required="type === 'custom'" placeholder="e.g. Website redesign">
                                    </div>
                                    <div class="md:col-span-4 admin-field">
                                        <label>Description</label>
                                        <input type="text" :name="`line_items[${index}][description]`" x-model="item.description" placeholder="Optional detail">
                                    </div>
                                    <div class="md:col-span-1 admin-field">
                                        <label>Qty</label>
                                        <input type="number" step="0.01" min="0.01" :name="`line_items[${index}][quantity]`" x-model.number="item.quantity">
                                    </div>
                                    <div class="md:col-span-2 admin-field">
                                        <label>Rate (ex-GST)</label>
                                        <input type="number" step="0.01" min="0" :name="`line_items[${index}][rate]`" x-model.number="item.rate" placeholder="0.00">
                                    </div>
                                </div>
                                <div class="flex flex-wrap items-center gap-3 text-xs text-slate-500">
                                    <span class="inline-flex items-center gap-1 rounded-full bg-slate-100 px-2.5 py-1">Taxable <strong class="text-slate-800" x-text="'₹' + lineTaxable(item).toFixed(2)"></strong></span>
                                    <span class="inline-flex items-center gap-1 rounded-full bg-orange-50 text-[#ff6b35] px-2.5 py-1">Line total <strong x-text="'₹' + lineTotal(item).toFixed(2)"></strong></span>
                                    <span class="text-slate-400">HSN {{ $taxPreview['hsn'] }} · GST {{ number_format($taxPreview['gst_rate'], 0) }}%</span>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>

                <div class="admin-card">
                    <div class="admin-card-header">
                        <div>
                            <h2>Notes & delivery</h2>
                            <p>Optional note for the client email</p>
                        </div>
                    </div>
                    <div class="admin-card-body space-y-4">
                        <div class="admin-field">
                            <label for="notes">Notes</label>
                            <textarea id="notes" name="notes" rows="3" placeholder="Payment terms, scope notes…">{{ old('notes') }}</textarea>
                        </div>
                        <label class="inline-flex items-center gap-2.5 !mb-0 cursor-pointer">
                            <input type="checkbox" name="send_now" value="1" x-model="sendNow" class="rounded border-slate-300 text-[#ff6b35]">
                            <span class="text-sm font-medium text-slate-700">Email invoice with payment link now</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="space-y-4">
                <div class="admin-card xl:sticky xl:top-4">
                    <div class="admin-card-header">
                        <div>
                            <h2>Summary</h2>
                            <p>Auto tax preview</p>
                        </div>
                    </div>
                    <div class="admin-card-body space-y-4">
                        <div class="rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm space-y-2">
                            <div class="flex justify-between gap-3"><span class="text-slate-500">GST rate</span><span class="font-semibold">{{ number_format($taxPreview['gst_rate'], 2) }}%</span></div>
                            <div class="flex justify-between gap-3"><span class="text-slate-500">HSN / SAC</span><span class="font-semibold">{{ $taxPreview['hsn'] }}</span></div>
                            <div class="flex justify-between gap-3"><span class="text-slate-500">Seller state</span><span class="font-semibold">{{ $taxPreview['seller_state'] ?: '—' }}</span></div>
                            <div class="flex justify-between gap-3"><span class="text-slate-500">Supply</span><span class="font-semibold text-[#ff6b35]" x-text="placeOfSupply || '—'"></span></div>
                            <div class="flex justify-between gap-3"><span class="text-slate-500">Tax mode</span><span class="font-semibold" x-text="isInterstate ? 'IGST' : 'CGST + SGST'"></span></div>
                        </div>

                        <div class="admin-total-box">
                            <div class="row"><span>Taxable value</span><span x-text="'₹' + subtotal.toFixed(2)"></span></div>
                            <div class="row"><span>GST</span><span x-text="'₹' + taxTotal.toFixed(2)"></span></div>
                            <div class="row grand"><span>Payable total</span><span x-text="'₹' + grandTotal.toFixed(2)"></span></div>
                        </div>

                        <p class="text-xs text-slate-500 leading-relaxed">
                            HSN, GST %, and place of supply are taken from <a href="{{ route('admin.settings.company-profile.edit') }}" class="text-[#ff6b35] underline">Company Profile</a> and the selected client’s state. Change defaults there — not on every invoice.
                        </p>

                        <div class="admin-actions !justify-stretch">
                            <button type="submit" class="admin-btn admin-btn-primary w-full" :disabled="preparing || !canSubmit">
                                <span x-show="!preparing" x-text="sendNow ? 'Create & email invoice' : 'Create invoice'"></span>
                                <span x-show="preparing" x-cloak>Creating…</span>
                            </button>
                            <a href="{{ route('admin.invoices.index') }}" class="admin-btn admin-btn-secondary w-full">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@push('scripts')
<script>
function invoiceStudio(initial) {
    return {
        type: initial.type || 'custom',
        customerId: initial.customerId ? String(initial.customerId) : '',
        customers: initial.customers || [],
        packages: initial.packages || [],
        selectedPackageId: initial.selectedPackageId ? String(initial.selectedPackageId) : '',
        tax: initial.tax || { gst_rate: 18, hsn: '998314', seller_state: '', place_of_supply_default: '' },
        sendNow: Boolean(initial.sendNow),
        preparing: false,
        csrfToken: document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '',
        lineItems: (initial.lineItems && initial.lineItems.length ? initial.lineItems : [{}]).map((i) => ({
            title: i.title || '',
            description: i.description || '',
            quantity: Number(i.quantity || 1),
            rate: i.rate === '' || i.rate === null || typeof i.rate === 'undefined' ? '' : Number(i.rate),
        })),
        init() {
            this.refreshCsrf();
        },
        refreshCsrf() {
            this.csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || this.csrfToken;
        },
        get selectedCustomer() {
            return this.customers.find((c) => String(c.id) === String(this.customerId)) || null;
        },
        get placeOfSupply() {
            return (this.selectedCustomer?.state || this.tax.place_of_supply_default || '').trim();
        },
        get isInterstate() {
            const seller = (this.tax.seller_state || '').trim().toLowerCase();
            const buyer = (this.placeOfSupply || '').trim().toLowerCase();
            return Boolean(seller && buyer && seller !== buyer);
        },
        get selectedPackage() {
            return this.packages.find((p) => String(p.id) === String(this.selectedPackageId)) || null;
        },
        get canSubmit() {
            if (!this.customerId) return false;
            if (this.type === 'package') return Boolean(this.selectedPackageId);
            return this.lineItems.some((item) => item.title && Number(item.rate) > 0);
        },
        addItem() {
            this.lineItems.push({ title: '', description: '', quantity: 1, rate: '' });
        },
        removeItem(index) {
            if (this.lineItems.length > 1) this.lineItems.splice(index, 1);
        },
        lineTaxable(item) {
            return Number(item.quantity || 0) * Number(item.rate || 0);
        },
        lineTax(item) {
            return this.lineTaxable(item) * (Number(this.tax.gst_rate || 0) / 100);
        },
        lineTotal(item) {
            return this.lineTaxable(item) + this.lineTax(item);
        },
        get subtotal() {
            if (this.type === 'package') {
                return Number(this.selectedPackage?.price || 0);
            }
            return this.lineItems.reduce((sum, item) => sum + this.lineTaxable(item), 0);
        },
        get taxTotal() {
            return this.subtotal * (Number(this.tax.gst_rate || 0) / 100);
        },
        get grandTotal() {
            return this.subtotal + this.taxTotal;
        },
        submitInvoice() {
            if (!this.canSubmit || this.preparing) return;
            this.refreshCsrf();

            const form = this.$refs.invoiceForm;
            if (!form) return;

            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            const packageSelect = form.querySelector('#package_id');
            if (packageSelect && this.type === 'package') {
                packageSelect.disabled = false;
            }

            this.preparing = true;
            form.submit();
        },
    };
}
</script>
@endpush
@endsection
