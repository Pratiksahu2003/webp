@extends('layouts.admin')
@section('title', 'Order '.$order->order_number.' - VanTroZ Admin')
@section('page-title', 'Order Details')
@section('content')
<div class="max-w-7xl mx-auto p-6">
    <div class="flex justify-between mb-6"><h1 class="text-2xl font-bold">Order {{ $order->order_number }}</h1><a href="{{ route('admin.orders.index') }}" class="text-gray-600">← Back to Orders</a></div>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-xl border border-gray-200 p-6 space-y-3">
                <h2 class="font-semibold text-lg mb-2">Order Details</h2>
                <p><span class="text-gray-500">Title:</span> {{ $order->displayTitle() }}</p>
                @if($order->service)
                <p><span class="text-gray-500">Service:</span> {{ $order->service->title }}</p>
                @endif
                @if($order->subService)
                <p><span class="text-gray-500">Sub Service:</span> {{ $order->subService->title }}</p>
                @endif
                @if($order->package)
                <p><span class="text-gray-500">Package:</span> {{ $order->package->package_name }}</p>
                @endif
                <p><span class="text-gray-500">Amount:</span> <strong>₹{{ number_format($order->amount,2) }}</strong></p>
                <p><span class="text-gray-500">Transaction ID:</span> {{ $order->transaction_id ?? '—' }}</p>
                <p><span class="text-gray-500">Customer Message:</span><br>{{ $order->customer_message ?? '—' }}</p>
            </div>
            <div class="bg-white rounded-xl border border-gray-200 p-6">
                <h2 class="font-semibold text-lg mb-4">Payment Transactions</h2>
                @if($order->transactions->isEmpty())<p class="text-gray-500">No transactions yet.</p>@else
                <table class="min-w-full text-sm"><thead><tr class="border-b"><th class="text-left py-2">Transaction ID</th><th class="text-left py-2">Status</th><th class="text-left py-2">Amount</th><th class="text-left py-2">Date</th></tr></thead>
                <tbody>@foreach($order->transactions as $txn)<tr class="border-b"><td class="py-2">{{ $txn->transaction_id ?? '—' }}</td><td class="py-2">{{ ucfirst($txn->payment_status) }}</td><td class="py-2">₹{{ number_format($txn->amount,2) }}</td><td class="py-2">{{ $txn->created_at->format('M d, Y H:i') }}</td></tr>@endforeach</tbody></table>@endif
            </div>
        </div>
        <div class="space-y-6">
            <div class="bg-white rounded-xl border border-gray-200 p-6">
                <h2 class="font-semibold mb-3">Customer</h2>
                <p class="font-medium">{{ $order->user->name }}</p>
                <p class="text-sm text-gray-600">{{ $order->user->email }}</p>
                <p class="text-sm text-gray-600">{{ $order->user->phone }}</p>
                <p class="text-sm text-gray-500 mt-2">{{ $order->user->fullAddress() }}</p>
            </div>
            <div class="bg-white rounded-xl border border-gray-200 p-6">
                <h2 class="font-semibold mb-3">Update Status</h2>
                <form method="POST" action="{{ route('admin.orders.update-status', $order) }}">@csrf @method('PATCH')
                    <select name="payment_status" class="w-full border border-gray-300 rounded-lg px-3 py-2 mb-3">@foreach(\App\Models\Order::PAYMENT_STATUSES as $s)<option value="{{ $s }}" @selected($order->payment_status==$s)>{{ ucfirst($s) }}</option>@endforeach</select>
                    <button class="w-full px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Update Status</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
