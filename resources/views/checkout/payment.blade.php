@extends('layouts.website')

@section('title', 'Payment - Order ' . $order->order_number)
@section('description', 'Complete your payment securely.')

@section('content')
@php
    $service = $order->service;
    $subService = $order->subService;
    $paymentToken = $checkout['token'] ?? null;
    $mockCallbackUrl = route('payment.callback', [
        'order' => $order->order_number,
        'status' => 'success',
        'transaction_id' => 'MOCK-' . strtoupper(uniqid()),
    ]);
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

            @if($isMock)
                <div class="mb-6 rounded-xl border border-amber-200 bg-amber-50 px-4 py-3 text-sm text-amber-800">
                    Test mode — Nimbbl credentials are not configured. Use the button below to simulate a successful payment.
                </div>
                <button id="pay-btn" type="button" class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-3 rounded-lg font-semibold transition-colors">
                    Complete Test Payment
                </button>
            @elseif($paymentToken)
                <button id="pay-btn" type="button" class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-3 rounded-lg font-semibold transition-colors">
                    Pay Securely with Nimbbl
                </button>
                <p class="text-xs text-gray-400 mt-4">Secured by Nimbbl. UPI, cards, net banking &amp; more.</p>
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
@if($isMock)
<script>
document.getElementById('pay-btn')?.addEventListener('click', function () {
    this.disabled = true;
    this.textContent = 'Processing...';
    window.location.href = @json($mockCallbackUrl);
});
</script>
@elseif($paymentToken)
<script type="module">
const payBtn = document.getElementById('pay-btn');
const token = @json($paymentToken);
const callbackUrl = @json(route('payment.callback'));

async function openCheckout() {
    payBtn.disabled = true;
    payBtn.textContent = 'Opening secure checkout...';

    try {
        const { default: Checkout } = await import('https://cdn.jsdelivr.net/npm/nimbbl_sonic@latest');
        const checkout = new Checkout({ token });
        checkout.open({ callback_url: callbackUrl });
    } catch (error) {
        console.error('Nimbbl checkout failed:', error);
        payBtn.disabled = false;
        payBtn.textContent = 'Pay Securely with Nimbbl';
        alert('Unable to open payment gateway. Please try again.');
    }
}

payBtn?.addEventListener('click', openCheckout);
</script>
@endif
@endpush
