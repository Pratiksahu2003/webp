@extends('layouts.website')
@section('title', 'Payment')
@section('content')
<section class="py-20 text-center"><div class="max-w-xl mx-auto px-4">
<h1 class="text-3xl font-bold mb-4">Complete Your Payment</h1>
<p class="text-gray-600 mb-8">Order {{ $order->order_number }} — ₹{{ number_format($order->amount, 2) }}</p>
@if($paymentToken)
<button id="pay-btn" class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-3 rounded-lg font-semibold">Pay with Nimbbl</button>
@else
<p class="text-red-600">Payment could not be initialized. Please contact support.</p>
@endif
</div></section>
@endsection
@push('scripts')
<script src="{{ $nimbblScript }}"></script>
<script>
document.getElementById('pay-btn')?.addEventListener('click', function () {
    if (typeof NimbblCheckout !== 'undefined') {
        new NimbblCheckout({ token: @json($paymentToken), callback_url: @json(route('payment.callback')) }).open();
    } else {
        window.location.href = @json(route('payment.callback', ['order' => $order->order_number, 'status' => 'success']));
    }
});
</script>
@endpush
