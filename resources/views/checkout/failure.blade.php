@extends('layouts.website')

@section('title', 'Payment Failed')
@section('description', 'Your payment could not be processed.')

@section('content')
@php
    $service = $order?->service;
    $subService = $order?->subService;
@endphp
<section class="py-20 bg-gray-50 min-h-screen">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 md:p-12 text-center">
            <div class="text-red-500 text-6xl mb-4">✕</div>
            <h1 class="text-3xl font-bold mb-4">Payment Failed</h1>
            <p class="text-gray-600 mb-8">{{ session('error', 'Your payment could not be processed. Please try again.') }}</p>

            <div class="flex flex-col sm:flex-row gap-3 justify-center">
                @if($order && $order->package)
                    <a href="{{ route('checkout.show', $order->package) }}" class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                        Try Again
                    </a>
                @endif
                @if($service && $subService)
                    <a href="{{ route('services.sub-service', [$service, $subService]) }}#packages" class="border border-orange-500 text-orange-600 hover:bg-orange-50 px-6 py-3 rounded-lg font-semibold transition-colors">
                        Choose Another Package
                    </a>
                @endif
                <a href="{{ route('contact') }}" class="border border-gray-300 text-gray-700 hover:bg-gray-50 px-6 py-3 rounded-lg font-semibold transition-colors">
                    Contact Support
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
