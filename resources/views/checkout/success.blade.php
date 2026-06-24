@extends('layouts.website')
@section('title', 'Payment Successful')
@section('content')
<section class="py-20"><div class="max-w-xl mx-auto px-4 text-center">
<div class="text-green-500 text-6xl mb-4">✓</div>
<h1 class="text-3xl font-bold mb-4">Payment Successful</h1>
<p class="text-gray-600 mb-2">Order Number: <strong>{{ $order->order_number }}</strong></p>
<p class="text-gray-600 mb-8">Amount Paid: <strong>₹{{ number_format($order->amount, 2) }}</strong></p>
<a href="{{ route('customer.dashboard') }}" class="bg-orange-500 text-white px-6 py-3 rounded-lg font-semibold">View My Orders</a>
</div></section>
@endsection
