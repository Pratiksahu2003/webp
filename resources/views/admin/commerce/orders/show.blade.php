@extends('layouts.admin')
@section('title', 'Order '.$order->order_number.' - VanTroZ Admin')
@section('page-title', 'Order Details')
@section('content')
<div class="admin-page-wide">
    <div class="admin-page-header">
        <div>
            <h1>Order {{ $order->order_number }}</h1>
            <p>Payment status, customer, and transaction history</p>
        </div>
        <a href="{{ route('admin.orders.index') }}" class="admin-btn admin-btn-secondary">← Back to Orders</a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
        <div class="lg:col-span-2 space-y-5">
            <div class="admin-card">
                <div class="admin-card-body space-y-3">
                    <h2 class="text-lg font-semibold text-slate-900">Order details</h2>
                    <p><span class="text-slate-500">Title:</span> <span class="font-medium text-slate-900">{{ $order->displayTitle() }}</span></p>
                    @if($order->service)
                        <p><span class="text-slate-500">Service:</span> {{ $order->service->title }}</p>
                    @endif
                    @if($order->subService)
                        <p><span class="text-slate-500">Sub service:</span> {{ $order->subService->title }}</p>
                    @endif
                    @if($order->package)
                        <p><span class="text-slate-500">Package:</span> {{ $order->package->package_name }}</p>
                    @endif
                    <p><span class="text-slate-500">Amount:</span> <strong class="text-slate-900">₹{{ number_format($order->amount, 2) }}</strong></p>
                    <p><span class="text-slate-500">Transaction ID:</span> {{ $order->transaction_id ?? '—' }}</p>
                    <p>
                        <span class="text-slate-500">Customer message:</span><br>
                        <span class="text-slate-700">{{ $order->customer_message ?? '—' }}</span>
                    </p>
                </div>
            </div>

            <div class="admin-card overflow-hidden">
                <div class="admin-card-body border-b border-slate-100">
                    <h2 class="text-lg font-semibold text-slate-900">Payment transactions</h2>
                </div>
                @if($order->transactions->isEmpty())
                    <div class="admin-empty">No transactions yet.</div>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead>
                                <tr class="border-b border-slate-200">
                                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wide">Transaction ID</th>
                                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wide">Status</th>
                                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wide">Amount</th>
                                    <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wide">Date</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                @foreach($order->transactions as $txn)
                                    <tr class="hover:bg-orange-50/40">
                                        <td class="px-5 py-3 text-sm text-slate-800">{{ $txn->transaction_id ?? '—' }}</td>
                                        <td class="px-5 py-3 text-sm font-medium text-slate-700">{{ ucfirst($txn->payment_status) }}</td>
                                        <td class="px-5 py-3 text-sm font-semibold text-slate-900">₹{{ number_format($txn->amount, 2) }}</td>
                                        <td class="px-5 py-3 text-sm text-slate-500">{{ $txn->created_at->format('M d, Y H:i') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>

        <div class="space-y-5">
            <div class="admin-card">
                <div class="admin-card-body">
                    <h2 class="text-lg font-semibold text-slate-900 mb-3">Customer</h2>
                    <p class="font-semibold text-slate-900">{{ $order->user->name }}</p>
                    <p class="text-sm text-slate-600">{{ $order->user->email }}</p>
                    <p class="text-sm text-slate-600">{{ $order->user->phone }}</p>
                    <p class="text-sm text-slate-500 mt-2">{{ $order->user->fullAddress() }}</p>
                </div>
            </div>

            <div class="admin-card">
                <div class="admin-card-body">
                    <h2 class="text-lg font-semibold text-slate-900 mb-3">Update status</h2>
                    <form method="POST" action="{{ route('admin.orders.update-status', $order) }}" class="space-y-3">
                        @csrf
                        @method('PATCH')
                        <div class="admin-field">
                            <label for="payment_status">Payment status</label>
                            <select id="payment_status" name="payment_status">
                                @foreach(\App\Models\Order::PAYMENT_STATUSES as $s)
                                    <option value="{{ $s }}" @selected($order->payment_status == $s)>{{ ucfirst($s) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="admin-btn admin-btn-primary w-full">Update Status</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
