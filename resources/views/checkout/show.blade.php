@extends('layouts.website')
@section('title', 'Checkout - '.$package->package_name)
@section('content')
<section class="py-16 bg-gray-50 min-h-screen"><div class="max-w-6xl mx-auto px-4">
<h1 class="text-3xl font-bold mb-8">Checkout</h1>
<div class="grid lg:grid-cols-3 gap-8">
<div class="lg:col-span-2 bg-white rounded-2xl shadow p-8">
<form method="POST" action="{{ route('checkout.store', $package) }}">@csrf
<h2 class="text-xl font-bold mb-6">Customer Details</h2>
<div class="grid md:grid-cols-2 gap-4">
<div><label class="block text-sm font-medium mb-1">Full Name *</label><input name="name" class="w-full border rounded-lg px-4 py-2" value="{{ old('name', auth()->user()->name ?? '') }}" required></div>
<div><label class="block text-sm font-medium mb-1">Email *</label><input type="email" name="email" class="w-full border rounded-lg px-4 py-2" value="{{ old('email', auth()->user()->email ?? '') }}" required></div>
<div><label class="block text-sm font-medium mb-1">Phone *</label><input name="phone" class="w-full border rounded-lg px-4 py-2" value="{{ old('phone', auth()->user()->phone ?? '') }}" required></div>
<div><label class="block text-sm font-medium mb-1">Company Name</label><input name="company_name" class="w-full border rounded-lg px-4 py-2" value="{{ old('company_name', auth()->user()->company_name ?? '') }}"></div>
<div class="md:col-span-2"><label class="block text-sm font-medium mb-1">Address Line 1 *</label><input name="address_line_1" class="w-full border rounded-lg px-4 py-2" value="{{ old('address_line_1', auth()->user()->address_line_1 ?? '') }}" required></div>
<div class="md:col-span-2"><label class="block text-sm font-medium mb-1">Address Line 2</label><input name="address_line_2" class="w-full border rounded-lg px-4 py-2" value="{{ old('address_line_2', auth()->user()->address_line_2 ?? '') }}"></div>
<div><label class="block text-sm font-medium mb-1">City *</label><input name="city" class="w-full border rounded-lg px-4 py-2" value="{{ old('city', auth()->user()->city ?? '') }}" required></div>
<div><label class="block text-sm font-medium mb-1">State *</label><input name="state" class="w-full border rounded-lg px-4 py-2" value="{{ old('state', auth()->user()->state ?? '') }}" required></div>
<div><label class="block text-sm font-medium mb-1">Country *</label><input name="country" class="w-full border rounded-lg px-4 py-2" value="{{ old('country', auth()->user()->country ?? 'India') }}" required></div>
<div><label class="block text-sm font-medium mb-1">Postal Code *</label><input name="postal_code" class="w-full border rounded-lg px-4 py-2" value="{{ old('postal_code', auth()->user()->postal_code ?? '') }}" required></div>
<div class="md:col-span-2"><label class="block text-sm font-medium mb-1">Project Requirements</label><textarea name="customer_message" rows="4" class="w-full border rounded-lg px-4 py-2">{{ old('customer_message') }}</textarea></div>
</div>
@if($errors->any())<div class="mt-4 text-red-600 text-sm"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
<button class="mt-6 w-full bg-orange-500 hover:bg-orange-600 text-white py-3 rounded-lg font-semibold">Proceed to Payment</button>
</form></div>
<div class="bg-white rounded-2xl shadow p-8 h-fit">
<h2 class="text-xl font-bold mb-6">Order Summary</h2>
<p class="text-sm text-gray-500">Service</p><p class="font-semibold mb-3">{{ $package->subService->service->title }}</p>
<p class="text-sm text-gray-500">Sub Service</p><p class="font-semibold mb-3">{{ $package->subService->title }}</p>
<p class="text-sm text-gray-500">Package</p><p class="font-semibold mb-3">{{ $package->package_name }}</p>
<div class="border-t pt-4 flex justify-between items-center"><span class="font-semibold">Total</span><span class="text-2xl font-bold text-orange-600">₹{{ number_format($package->final_price, 2) }}</span></div>
</div></div></div></section>
@endsection
