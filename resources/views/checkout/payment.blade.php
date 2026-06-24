@extends('layouts.website')

@section('title', 'Payment - Order ' . $order->order_number)
@section('description', 'Complete your payment securely.')

@section('content')
@php
    $service = $order->service;
    $subService = $order->subService;
@endphp
<section class="py-16 bg-gray-50 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($service && $subService)
        <x-catalog-breadcrumbs :items="[
            ['label' => 'Home', 'url' => route('home')],
            ['label' => 'Services', 'url' => route('catalog.services')],
            ['label' => $service->title, 'url' => route('catalog.services.show', $service)],
            ['label' => $subService->title, 'url' => route('services.sub-service', [$service, $subService])],
            ['label' => 'Payment'],
        ]" />
        @endif

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 md:p-12 text-center">
            <h1 class="text-3xl font-bold mb-2">Complete Your Payment</h1>
            <p class="text-gray-600 mb-8">Order <strong>{{ $order->order_number }}</strong></p>

            <div class="max-w-md mx-auto bg-gray-50 rounded-xl p-6 mb-8 text-left">
                <p class="text-sm text-gray-500">Package</p>
                <p class="font-semibold mb-3">{{ $order->package->package_name ?? 'Service Package' }}</p>
                @if($subService)
                    <p class="text-sm text-gray-500">Sub-Service</p>
                    <p class="font-semibold mb-3">{{ $subService->title }}</p>
                @endif
                <div class="border-t border-gray-200 pt-4 flex justify-between items-center">
                    <span class="font-semibold">Amount Due</span>
                    <span class="text-2xl font-bold text-orange-600">₹{{ number_format($order->amount, 2) }}</span>
                </div>
            </div>

            @if($paymentToken)
                <button id="pay-btn" type="button" class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-3 rounded-lg font-semibold transition-colors">
                    Pay Securely with Nimbbl
                </button>
                <p class="text-xs text-gray-400 mt-4">You will be redirected to our secure payment gateway.</p>
            @else
                <p class="text-red-600 mb-4">Payment could not be initialized. Please contact support or try again.</p>
                @if($order->package)
                    <a href="{{ route('checkout.show', $order->package) }}" class="inline-block bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-lg font-semibold">Try Again</a>
                @endif
            @endif
        </div>
    </div>
</section>
@endsection

@push('scripts')
@if($paymentToken)
<script src="{{ $nimbblScript }}"></script>
<script>
document.getElementById('pay-btn')?.addEventListener('click', function () {
    if (typeof NimbblCheckout !== 'undefined') {
        new NimbblCheckout({
            token: @json($paymentToken),
            callback_url: @json(route('payment.callback'))
        }).open();
    } else {
        window.location.href = @json(route('payment.callback', ['order' => $order->order_number, 'status' => 'success']));
    }
});
</script>
@endif
@endpush
