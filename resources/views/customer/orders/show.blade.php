@extends('layouts.website')
@section('title', 'Order '.$order->order_number)
@section('content')
<section class="py-16 bg-gray-50 min-h-screen"><div class="max-w-4xl mx-auto px-4">
<div class="bg-white rounded-2xl shadow p-8">
<h1 class="text-2xl font-bold mb-6">Order {{ $order->order_number }}</h1>
<p><strong>Status:</strong> {{ ucfirst($order->payment_status) }}</p>
<p><strong>Service:</strong> {{ $order->service->title }}</p>
<p><strong>Sub Service:</strong> {{ $order->subService->title }}</p>
<p><strong>Package:</strong> {{ $order->package->package_name }}</p>
<p><strong>Amount:</strong> ₹{{ number_format($order->amount,2) }}</p>
@if($order->customer_message)<p class="mt-4"><strong>Message:</strong><br>{{ $order->customer_message }}</p>@endif
<div class="mt-6 flex gap-4">@if($order->payment_status==='paid')<a href="{{ route('customer.orders.invoice', $order) }}" class="bg-orange-500 text-white px-5 py-2 rounded-lg">Download Invoice</a>@endif<a href="{{ route('customer.dashboard') }}" class="border px-5 py-2 rounded-lg">Back to Orders</a></div>
</div></div></section>
@endsection
