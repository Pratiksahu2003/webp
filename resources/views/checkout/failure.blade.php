@extends('layouts.website')

@section('title', 'Payment Failed')
@section('description', 'Your payment could not be completed.')
@section('robots', 'noindex, nofollow')

@section('content')
@php
    $service = $order?->service;
    $subService = $order?->subService;
    $package = $order?->package;
    $paymentRetryUrl = $paymentRetryUrl
        ?? (($order && $order->canAcceptPayment()) ? $order->rememberPaymentRetry() : null);

    $states = [
        'failed' => [
            'title' => 'Payment Failed',
            'icon' => '✕',
            'iconClass' => 'text-red-500 bg-red-50 border-red-100',
            'default' => 'Your payment could not be processed. Please try again or use a different payment method.',
        ],
        'cancelled' => [
            'title' => 'Payment Cancelled',
            'icon' => '!',
            'iconClass' => 'text-amber-600 bg-amber-50 border-amber-100',
            'default' => 'You cancelled the payment. No amount has been charged to your account.',
        ],
        'not_found' => [
            'title' => 'Order Not Found',
            'icon' => '?',
            'iconClass' => 'text-gray-600 bg-gray-50 border-gray-200',
            'default' => 'We could not find your order. If money was deducted, please contact support with your transaction reference.',
        ],
        'pending' => [
            'title' => 'Payment Processing',
            'icon' => '…',
            'iconClass' => 'text-blue-600 bg-blue-50 border-blue-100',
            'default' => 'Your payment is being processed. We will send a confirmation email once it is complete.',
        ],
        'expired' => [
            'title' => 'Payment Session Expired',
            'icon' => '⏱',
            'iconClass' => 'text-orange-600 bg-orange-50 border-orange-100',
            'default' => 'Your payment session has expired. Please start checkout again.',
        ],
    ];

    $state = $states[$errorType ?? 'failed'] ?? $states['failed'];
    $errorMessage = $message ?: session('error', $state['default']);
@endphp

<section class="py-16 bg-gray-50 min-h-screen">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-catalog-breadcrumbs :items="array_filter([
            ['label' => 'Home', 'url' => route('home')],
            ['label' => 'Services', 'url' => route('catalog.services')],
            $service ? ['label' => $service->title, 'url' => route('catalog.services.show', $service)] : null,
            $subService ? ['label' => $subService->title, 'url' => route('services.sub-service', [$service, $subService])] : null,
            ['label' => 'Payment Failed'],
        ])" />

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-8 md:p-12 text-center border-b border-gray-100">
                <div class="inline-flex items-center justify-center w-20 h-20 rounded-full border text-3xl font-bold mb-6 {{ $state['iconClass'] }}">
                    {{ $state['icon'] }}
                </div>

                <h1 class="text-3xl font-bold mb-3">{{ $state['title'] }}</h1>
                <p class="text-gray-600 max-w-xl mx-auto">{{ $errorMessage }}</p>
            </div>

            @if($order)
                <div class="px-8 md:px-12 py-6 bg-gray-50 border-b border-gray-100">
                    <h2 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-4">Order Details</h2>
                    <div class="grid sm:grid-cols-2 gap-4 text-sm">
                        <div>
                            <p class="text-gray-500">Order Number</p>
                            <p class="font-semibold text-gray-900">{{ $order->order_number }}</p>
                        </div>
                        <div>
                            <p class="text-gray-500">Amount</p>
                            <p class="font-semibold text-orange-600">₹{{ number_format($order->amount, 2) }}</p>
                        </div>
                        @if($package)
                            <div>
                                <p class="text-gray-500">Package</p>
                                <p class="font-semibold text-gray-900">{{ $package->package_name }}</p>
                            </div>
                        @elseif($order)
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
                        @if($order->user?->email)
                            <div class="sm:col-span-2">
                                <p class="text-gray-500">Email</p>
                                <p class="font-semibold text-gray-900">{{ $order->user->email }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            @endif

            <div class="p-8 md:p-12">
                @if(($errorType ?? 'failed') === 'pending')
                    <div class="mb-6 rounded-xl border border-blue-200 bg-blue-50 px-4 py-3 text-sm text-blue-800">
                        Do not retry payment immediately. If confirmation is not received within 30 minutes, contact our support team.
                    </div>
                @elseif(($errorType ?? 'failed') === 'not_found')
                    <div class="mb-6 rounded-xl border border-amber-200 bg-amber-50 px-4 py-3 text-sm text-amber-800">
                        If your bank or UPI app shows a successful debit, save the transaction ID and reach out to us — we will verify and resolve it.
                    </div>
                @else
                    <div class="mb-6 rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm text-gray-700">
                        Common fixes: check your card/UPI limit, ensure stable internet, or try another payment method.
                    </div>
                @endif

                <div class="flex flex-col sm:flex-row gap-3 justify-center">
                    @if($paymentRetryUrl && ($errorType ?? 'failed') !== 'pending')
                        <a href="{{ $paymentRetryUrl }}" class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-lg font-semibold transition-colors text-center shadow-lg shadow-orange-500/20">
                            Try Payment Again
                        </a>
                    @elseif($order && $order->canAcceptPayment() && ($errorType ?? 'failed') !== 'pending')
                        <a href="{{ route('checkout.retry', $order) }}" class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-lg font-semibold transition-colors text-center shadow-lg shadow-orange-500/20">
                            Try Payment Again
                        </a>
                    @elseif($order && $package && ($errorType ?? 'failed') !== 'pending')
                        <a href="{{ route('checkout.show', $package) }}" class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-lg font-semibold transition-colors text-center">
                            Try Payment Again
                        </a>
                    @endif

                    @if($service && $subService)
                        <a href="{{ route('services.sub-service', [$service, $subService]) }}#packages" class="border border-orange-500 text-orange-600 hover:bg-orange-50 px-6 py-3 rounded-lg font-semibold transition-colors text-center">
                            Choose Another Package
                        </a>
                    @endif

                    <a href="{{ route('contact') }}" class="border border-gray-300 text-gray-700 hover:bg-gray-50 px-6 py-3 rounded-lg font-semibold transition-colors text-center">
                        Contact Support
                    </a>

                    <a href="{{ route('home') }}" class="border border-gray-300 text-gray-700 hover:bg-gray-50 px-6 py-3 rounded-lg font-semibold transition-colors text-center">
                        Back to Home
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
