@extends('layouts.website')

@section('title', 'Payment Successful')
@section('description', 'Your payment was completed successfully.')
@section('robots', 'noindex, nofollow')

@section('content')
@php
    $service = $order->service;
    $subService = $order->subService;
    $package = $order->package;
@endphp

<section class="py-16 bg-gray-50 min-h-screen">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-catalog-breadcrumbs :items="array_filter([
            ['label' => 'Home', 'url' => route('home')],
            ['label' => 'Services', 'url' => route('catalog.services')],
            $service ? ['label' => $service->title, 'url' => route('catalog.services.show', $service)] : null,
            $subService ? ['label' => $subService->title, 'url' => route('services.sub-service', [$service, $subService])] : null,
            ['label' => 'Payment Successful'],
        ])" />

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-8 md:p-12 text-center border-b border-gray-100">
                <div class="inline-flex items-center justify-center w-20 h-20 rounded-full border border-green-100 bg-green-50 text-green-500 text-4xl mb-6">
                    ✓
                </div>

                <h1 class="text-3xl font-bold mb-3">Payment Successful</h1>
                <p class="text-gray-600 max-w-xl mx-auto">
                    {{ session('success', 'Thank you! Your payment has been received and your order is confirmed.') }}
                </p>
            </div>

            <div class="px-8 md:px-12 py-6 bg-gray-50 border-b border-gray-100">
                <h2 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-4">Order Summary</h2>
                <div class="grid sm:grid-cols-2 gap-4 text-sm">
                    <div>
                        <p class="text-gray-500">Order Number</p>
                        <p class="font-semibold text-gray-900">{{ $order->order_number }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Amount Paid</p>
                        <p class="font-semibold text-orange-600">₹{{ number_format($order->amount, 2) }}</p>
                    </div>
                    @if($package)
                        <div>
                            <p class="text-gray-500">Package</p>
                            <p class="font-semibold text-gray-900">{{ $package->package_name }}</p>
                        </div>
                    @else
                        <div>
                            <p class="text-gray-500">Invoice</p>
                            <p class="font-semibold text-gray-900">{{ $order->displayTitle() }}</p>
                        </div>
                    @endif
                    @if($subService)
                        <div>
                            <p class="text-gray-500">Service</p>
                            <p class="font-semibold text-gray-900">{{ $subService->title }}</p>
                        </div>
                    @endif
                    @if($order->transaction_id)
                        <div class="sm:col-span-2">
                            <p class="text-gray-500">Transaction ID</p>
                            <p class="font-semibold text-gray-900 break-all">{{ $order->transaction_id }}</p>
                        </div>
                    @endif
                    @if($order->paid_at)
                        <div>
                            <p class="text-gray-500">Paid On</p>
                            <p class="font-semibold text-gray-900">{{ $order->paid_at->format('M d, Y h:i A') }}</p>
                        </div>
                    @endif
                    @if($order->user?->email)
                        <div>
                            <p class="text-gray-500">Confirmation Sent To</p>
                            <p class="font-semibold text-gray-900">{{ $order->user->email }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="p-8 md:p-12">
                @if($order->user?->email)
                    <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
                        A confirmation email with your invoice download link has been sent to <strong>{{ $order->user->email }}</strong>.
                    </div>
                @endif

                <div class="flex flex-col sm:flex-row gap-3 justify-center">
                    @if($order->payment_status === 'paid')
                        <a href="{{ $order->signedInvoiceUrl() }}" class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-lg font-semibold transition-colors text-center">
                            Download Invoice
                        </a>
                    @endif

                    @if($service && $subService)
                        <a href="{{ route('services.sub-service', [$service, $subService]) }}" class="border border-orange-500 text-orange-600 hover:bg-orange-50 px-6 py-3 rounded-lg font-semibold transition-colors text-center">
                            Back to Service
                        </a>
                    @endif

                    <a href="{{ route('catalog.services') }}" class="border border-gray-300 text-gray-700 hover:bg-gray-50 px-6 py-3 rounded-lg font-semibold transition-colors text-center">
                        Browse More Services
                    </a>

                    <a href="{{ route('contact') }}" class="border border-gray-300 text-gray-700 hover:bg-gray-50 px-6 py-3 rounded-lg font-semibold transition-colors text-center">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
