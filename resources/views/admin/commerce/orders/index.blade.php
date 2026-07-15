@extends('layouts.admin')
@section('title', 'Orders - VanTroZ Admin')
@section('page-title', 'Orders')
@section('content')
@php
    $statusMeta = [
        'pending' => ['label' => 'Pending', 'tone' => 'amber'],
        'paid' => ['label' => 'Paid', 'tone' => 'emerald'],
        'failed' => ['label' => 'Failed', 'tone' => 'rose'],
        'refunded' => ['label' => 'Refunded', 'tone' => 'sky'],
        'cancelled' => ['label' => 'Cancelled', 'tone' => 'slate'],
    ];
@endphp
<div class="admin-page-wide">
    <div class="admin-page-header">
        <div>
            <h1>Orders</h1>
            <p>Track checkout orders and payment status</p>
        </div>
        <a href="{{ route('admin.orders.export', request()->query()) }}" class="admin-btn admin-btn-ink">Export CSV</a>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-5 gap-3 mb-5">
        @foreach($statusMeta as $key => $meta)
            <div class="admin-stat">
                <p class="admin-stat-label">{{ $meta['label'] }}</p>
                <p class="admin-stat-value">{{ $stats[$key] ?? 0 }}</p>
            </div>
        @endforeach
    </div>

    <div class="admin-card mb-5">
        <div class="admin-card-body">
            <form method="GET" class="admin-filter-grid">
                <div class="admin-field">
                    <label for="order-search">Search</label>
                    <input id="order-search" type="text" name="search" placeholder="Order number, customer name or email…" value="{{ request('search') }}">
                </div>
                <div class="admin-field">
                    <label for="order-status">Status</label>
                    <select id="order-status" name="payment_status">
                        <option value="">All statuses</option>
                        @foreach(\App\Models\Order::PAYMENT_STATUSES as $s)
                            <option value="{{ $s }}" @selected(request('payment_status') == $s)>{{ ucfirst($s) }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="admin-btn admin-btn-primary">Filter</button>
            </form>
        </div>
    </div>

    <div class="admin-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="border-b border-slate-200">
                        <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wide">Order</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wide">Customer</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wide">Package</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wide">Amount</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wide">Status</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wide">Date</th>
                        <th class="px-5 py-3"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($orders as $order)
                        <tr class="hover:bg-orange-50/40">
                            <td class="px-5 py-4 font-semibold text-slate-900">{{ $order->order_number }}</td>
                            <td class="px-5 py-4">
                                <div class="font-medium text-slate-800">{{ $order->user->name }}</div>
                                <div class="text-sm text-slate-500">{{ $order->user->email }}</div>
                            </td>
                            <td class="px-5 py-4 text-sm text-slate-600">{{ $order->displayTitle() }}</td>
                            <td class="px-5 py-4 text-sm font-semibold text-slate-900">₹{{ number_format($order->amount, 2) }}</td>
                            <td class="px-5 py-4">
                                <span @class([
                                    'inline-flex px-2.5 py-1 text-xs font-semibold rounded-full',
                                    'bg-emerald-50 text-emerald-700' => $order->payment_status === 'paid',
                                    'bg-amber-50 text-amber-700' => $order->payment_status === 'pending',
                                    'bg-rose-50 text-rose-700' => $order->payment_status === 'failed',
                                    'bg-sky-50 text-sky-700' => $order->payment_status === 'refunded',
                                    'bg-slate-100 text-slate-600' => ! in_array($order->payment_status, ['paid', 'pending', 'failed', 'refunded'], true),
                                ])>
                                    {{ ucfirst($order->payment_status) }}
                                </span>
                            </td>
                            <td class="px-5 py-4 text-sm text-slate-500">{{ $order->created_at->format('M d, Y') }}</td>
                            <td class="px-5 py-4 text-right">
                                <a href="{{ route('admin.orders.show', $order) }}" class="text-sm font-semibold text-[#ff6b35] hover:text-[#ea580c]">View</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">
                                <div class="admin-empty">
                                    No orders yet. Checkout packages will appear here.
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($orders->hasPages())
            <div class="px-5 py-4 border-t border-slate-100">{{ $orders->links() }}</div>
        @endif
    </div>
</div>
@endsection
