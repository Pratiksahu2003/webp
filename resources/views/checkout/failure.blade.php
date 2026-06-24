@extends('layouts.website')
@section('title', 'Payment Failed')
@section('content')
<section class="py-20"><div class="max-w-xl mx-auto px-4 text-center">
<div class="text-red-500 text-6xl mb-4">✕</div>
<h1 class="text-3xl font-bold mb-4">Payment Failed</h1>
<p class="text-gray-600 mb-8">{{ session('error', 'Your payment could not be processed. Please try again.') }}</p>
@if($order)<a href="{{ route('checkout.show', $order->package) }}" class="bg-orange-500 text-white px-6 py-3 rounded-lg font-semibold">Try Again</a>@endif
</div></section>
@endsection
