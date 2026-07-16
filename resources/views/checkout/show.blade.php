@extends('layouts.website')

@section('title', 'Checkout - ' . $package->package_name)
@section('description', 'Complete your order for ' . $package->subService->title)
@section('robots', 'noindex, nofollow')

@section('content')
@php
    $service = $package->subService->service;
    $subService = $package->subService;
@endphp
<section class="py-16 bg-gray-50 min-h-screen">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-catalog-breadcrumbs :items="[
            ['label' => 'Home', 'url' => route('home')],
            ['label' => 'Services', 'url' => route('catalog.services')],
            ['label' => $service->title, 'url' => route('catalog.services.show', $service)],
            ['label' => $subService->title, 'url' => route('services.sub-service', [$service, $subService])],
            ['label' => 'Checkout'],
        ]" />

        <h1 class="text-3xl font-bold mb-8">Checkout</h1>

        <div class="grid lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                <form method="POST" action="{{ route('checkout.store', $package) }}">
                    @csrf
                    <h2 class="text-xl font-bold mb-6">Customer Details</h2>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">Full Name *</label>
                            <input name="name" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500 focus:border-orange-500" value="{{ old('name', auth()->user()->name ?? '') }}" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Email *</label>
                            <input type="email" name="email" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500 focus:border-orange-500" value="{{ old('email', auth()->user()->email ?? '') }}" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Phone *</label>
                            <input name="phone" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500 focus:border-orange-500" value="{{ old('phone', auth()->user()->phone ?? '') }}" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Company Name</label>
                            <input name="company_name" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500 focus:border-orange-500" value="{{ old('company_name', auth()->user()->company_name ?? '') }}">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium mb-1">Address Line 1 *</label>
                            <input name="address_line_1" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500 focus:border-orange-500" value="{{ old('address_line_1', auth()->user()->address_line_1 ?? '') }}" required>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium mb-1">Address Line 2</label>
                            <input name="address_line_2" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500 focus:border-orange-500" value="{{ old('address_line_2', auth()->user()->address_line_2 ?? '') }}">
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">City *</label>
                            <input name="city" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500 focus:border-orange-500" value="{{ old('city', auth()->user()->city ?? '') }}" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">State *</label>
                            <input name="state" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500 focus:border-orange-500" value="{{ old('state', auth()->user()->state ?? '') }}" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Country *</label>
                            <input name="country" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500 focus:border-orange-500" value="{{ old('country', auth()->user()->country ?? 'India') }}" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Postal Code *</label>
                            <input name="postal_code" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500 focus:border-orange-500" value="{{ old('postal_code', auth()->user()->postal_code ?? '') }}" required>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium mb-1">Project Requirements</label>
                            <textarea name="customer_message" rows="4" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-orange-500 focus:border-orange-500">{{ old('customer_message') }}</textarea>
                        </div>
                    </div>

                    @php
                        $formErrors = collect($errors->getMessages())
                            ->except('payment')
                            ->flatten();
                    @endphp
                    @if($formErrors->isNotEmpty())
                        <div class="mt-4 p-4 bg-red-50 border border-red-200 rounded-lg text-red-600 text-sm">
                            <ul class="list-disc list-inside">@foreach($formErrors as $error)<li>{{ $error }}</li>@endforeach</ul>
                        </div>
                    @endif

                    @error('payment')
                        <div class="mt-4 p-4 bg-red-50 border border-red-200 rounded-lg text-red-600 text-sm">
                            {{ $message }}
                        </div>
                    @enderror

                    <button type="submit" class="mt-6 w-full bg-orange-500 hover:bg-orange-600 text-white py-3 rounded-lg font-semibold transition-colors">
                        Proceed to Payment
                    </button>
                </form>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 h-fit">
                <h2 class="text-xl font-bold mb-6">Order Summary</h2>
                <p class="text-sm text-gray-500">Service</p>
                <p class="font-semibold mb-1">
                    <a href="{{ route('catalog.services.show', $service) }}" class="hover:text-orange-600">{{ $service->title }}</a>
                </p>
                <p class="text-sm text-gray-500 mt-3">Sub-Service</p>
                <p class="font-semibold mb-1">
                    <a href="{{ route('services.sub-service', [$service, $subService]) }}" class="hover:text-orange-600">{{ $subService->title }}</a>
                </p>
                <p class="text-sm text-gray-500 mt-3">Package</p>
                <p class="font-semibold mb-3">{{ $package->package_name }}</p>

                @if($package->activeFeatures->isNotEmpty())
                    <ul class="text-sm text-gray-600 space-y-1 mb-4 border-t border-gray-100 pt-4">
                        @foreach($package->activeFeatures->take(5) as $feature)
                            <li>✓ {{ $feature->feature_title }}</li>
                        @endforeach
                    </ul>
                @endif

                <div class="border-t border-gray-100 pt-4 flex justify-between items-center">
                    <span class="font-semibold">Total</span>
                    <span class="text-2xl font-bold text-orange-600">₹{{ number_format($package->final_price, 2) }}</span>
                </div>

                <a href="{{ route('services.sub-service', [$service, $subService]) }}#packages" class="block mt-6 text-center text-sm text-orange-600 hover:text-orange-700 font-medium">
                    ← Change package
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
