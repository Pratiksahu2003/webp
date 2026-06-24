@extends('layouts.website')

@section('title', 'Payment Successful')
@section('description', 'Your payment was completed successfully.')

@section('content')
@php
    $service = $order->service;
    $subService = $order->subService;
@endphp
<section class="py-20 bg-gray-50 min-h-screen">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 md:p-12 text-center">
            <div class="text-green-500 text-6xl mb-4">✓</div>
            <h1 class="text-3xl font-bold mb-4">Payment Successful</h1>
            <p class="text-gray-600 mb-2">Order Number: <strong>{{ $order->order_number }}</strong></p>
            <p class="text-gray-600 mb-2">Amount Paid: <strong>₹{{ number_format($order->amount, 2) }}</strong></p>
            @if($subService)
                <p class="text-gray-600 mb-8">{{ $subService->title }} — {{ $order->package->package_name ?? 'Package' }}</p>
            @endif

            <div class="flex flex-col sm:flex-row gap-3 justify-center">
                <a href="{{ route('customer.dashboard') }}" class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                    View My Orders
                </a>
                @if($service && $subService)
                <a href="{{ route('services.sub-service', [$service, $subService]) }}" class="border border-orange-500 text-orange-600 hover:bg-orange-50 px-6 py-3 rounded-lg font-semibold transition-colors">
                    Back to Service
                </a>
                @endif
                <a href="{{ route('catalog.services') }}" class="border border-gray-300 text-gray-700 hover:bg-gray-50 px-6 py-3 rounded-lg font-semibold transition-colors">
                    Browse More Services
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
