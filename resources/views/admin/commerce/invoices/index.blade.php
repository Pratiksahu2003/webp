@extends('layouts.admin')
@section('title', 'Invoices - VanTroZ Admin')
@section('page-title', 'Invoices')
@section('content')
<div class="admin-page-wide">
    <div class="admin-page-header">
        <div>
            <h1>Invoices</h1>
            <p>Create, send, and track tax invoices with payment links</p>
        </div>
        <a href="{{ route('admin.invoices.create') }}" class="admin-btn admin-btn-primary">Create Invoice</a>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-5">
        @foreach(['pending' => 'Pending', 'processing' => 'Processing', 'paid' => 'Paid', 'failed' => 'Failed'] as $key => $label)
            <div class="admin-card px-4 py-3">
                <p class="text-xs text-slate-500 uppercase tracking-wide">{{ $label }}</p>
                <p class="text-2xl font-bold text-slate-900 mt-1">{{ $stats[$key] ?? 0 }}</p>
            </div>
        @endforeach
    </div>

    <div class="admin-card mb-5">
        <div class="admin-card-body">
            <form class="grid grid-cols-1 md:grid-cols-12 gap-3 items-end">
                <div class="md:col-span-6 admin-field">
                    <label>Search</label>
                    <input type="text" name="search" placeholder="Invoice number, client..." value="{{ request('search') }}">
                </div>
                <div class="md:col-span-4 admin-field">
                    <label>Status</label>
                    <select name="payment_status">
                        <option value="">All statuses</option>
                        @foreach(\App\Models\Order::PAYMENT_STATUSES as $s)
                            <option value="{{ $s }}" @selected(request('payment_status')==$s)>{{ ucfirst($s) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="md:col-span-2">
                    <button class="admin-btn admin-btn-primary w-full">Filter</button>
                </div>
            </form>
        </div>
    </div>

    <div class="admin-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="border-b border-slate-200">
                        <th class="px-5 py-3 text-left text-xs font-semibold uppercase">Invoice</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold uppercase">Client</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold uppercase">Title</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold uppercase">Amount</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold uppercase">Status</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold uppercase">Sent</th>
                        <th class="px-5 py-3"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($invoices as $invoice)
                    <tr class="hover:bg-slate-50/80">
                        <td class="px-5 py-4 font-semibold text-slate-900">{{ $invoice->order_number }}</td>
                        <td class="px-5 py-4">
                            <div class="font-medium text-slate-800">{{ $invoice->user->name }}</div>
                            <div class="text-sm text-slate-500">{{ $invoice->user->email }}</div>
                        </td>
                        <td class="px-5 py-4 text-sm text-slate-600">{{ $invoice->displayTitle() }}</td>
                        <td class="px-5 py-4 text-sm font-semibold">₹{{ number_format($invoice->amount, 2) }}</td>
                        <td class="px-5 py-4">
                            <span class="inline-flex px-2.5 py-1 text-xs font-semibold rounded-full
                                @if($invoice->payment_status === 'paid') bg-emerald-50 text-emerald-700
                                @elseif($invoice->payment_status === 'pending') bg-amber-50 text-amber-700
                                @elseif($invoice->payment_status === 'failed') bg-rose-50 text-rose-700
                                @else bg-slate-100 text-slate-600 @endif">
                                {{ ucfirst($invoice->payment_status) }}
                            </span>
                        </td>
                        <td class="px-5 py-4 text-sm text-slate-500">{{ $invoice->invoice_sent_at?->format('M d, Y') ?? '—' }}</td>
                        <td class="px-5 py-4 text-right">
                            <a href="{{ route('admin.invoices.show', $invoice) }}" class="text-sm font-semibold text-[#ff6b35] hover:text-[#f7931e]">View</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-5 py-12 text-center text-slate-500">
                            No invoices yet. <a href="{{ route('admin.invoices.create') }}" class="text-[#ff6b35] font-semibold">Create one</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($invoices->hasPages())
            <div class="px-5 py-4 border-t border-slate-100">{{ $invoices->links() }}</div>
        @endif
    </div>
</div>
@endsection
