@extends('layouts.website')
@section('title', 'My Orders')
@section('content')
<section class="py-16 bg-gray-50 min-h-screen"><div class="max-w-6xl mx-auto px-4">
<h1 class="text-3xl font-bold mb-8">My Orders</h1>
<div class="bg-white rounded-2xl shadow overflow-hidden">
<table class="min-w-full"><thead class="bg-gray-50"><tr><th class="px-6 py-3 text-left text-sm font-semibold">Order</th><th class="px-6 py-3 text-left text-sm font-semibold">Service</th><th class="px-6 py-3 text-left text-sm font-semibold">Amount</th><th class="px-6 py-3 text-left text-sm font-semibold">Status</th><th class="px-6 py-3"></th></tr></thead>
<tbody>@forelse($orders as $order)<tr class="border-t">
<td class="px-6 py-4">{{ $order->order_number }}</td>
<td class="px-6 py-4">{{ $order->subService->title }} / {{ $order->package->package_name }}</td>
<td class="px-6 py-4">₹{{ number_format($order->amount,2) }}</td>
<td class="px-6 py-4"><span class="px-2 py-1 rounded-full text-xs bg-gray-100">{{ ucfirst($order->payment_status) }}</span></td>
<td class="px-6 py-4"><a href="{{ route('customer.orders.show', $order) }}" class="text-orange-600 font-semibold">View</a> @if($order->payment_status==='paid') | <a href="{{ route('customer.orders.invoice', $order) }}" class="text-orange-600 font-semibold">Invoice</a>@endif</td>
</tr>@empty<tr><td colspan="5" class="px-6 py-12 text-center text-gray-500">No orders yet.</td></tr>@endforelse</tbody></table>
</div>{{ $orders->links() }}</div></section>
@endsection
