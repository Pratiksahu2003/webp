@extends('layouts.website')

@section('title', $subService->title.' - '.$service->title)
@section('description', $subService->short_description)

@section('content')
<section class="relative bg-gradient-to-br from-slate-900 via-blue-900 to-slate-800 text-white py-20">
    <div class="max-w-7xl mx-auto px-4">
        @if($service->banner_image)
            <div class="absolute inset-0 opacity-20 bg-cover bg-center" style="background-image:url('{{ Storage::url($service->banner_image) }}')"></div>
        @endif
        <div class="relative">
            <p class="text-orange-400 font-semibold mb-2">{{ $service->title }}</p>
            <h1 class="text-4xl md:text-5xl font-bold mb-4">{{ $subService->title }}</h1>
            <p class="text-xl text-slate-200 max-w-3xl">{{ $subService->short_description }}</p>
            <div class="mt-8 flex flex-wrap gap-4">
                <a href="#packages" class="bg-orange-500 hover:bg-orange-600 px-6 py-3 rounded-lg font-semibold">View Packages</a>
                <a href="{{ route('contact') }}" class="border border-white/40 hover:bg-white/10 px-6 py-3 rounded-lg font-semibold">Get Quote</a>
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-white"><div class="max-w-7xl mx-auto px-4 grid lg:grid-cols-2 gap-12 items-center">
    <div><h2 class="text-3xl font-bold mb-4">Service Overview</h2><div class="prose max-w-none text-gray-600">{!! $subService->description !!}</div></div>
    <div class="grid grid-cols-2 gap-4">
        <div class="bg-orange-50 rounded-xl p-6"><div class="text-sm text-gray-500">Starting From</div><div class="text-3xl font-bold text-orange-600">₹{{ number_format($subService->starting_price) }}</div></div>
        <div class="bg-blue-50 rounded-xl p-6"><div class="text-sm text-gray-500">Delivery</div><div class="text-3xl font-bold text-blue-600">{{ $subService->delivery_days }} Days</div></div>
    </div>
</div></section>

@if($subService->whyChooseUs->count())
<section class="py-16 bg-gray-50"><div class="max-w-7xl mx-auto px-4">
    <h2 class="text-3xl font-bold text-center mb-10">Why Choose Us</h2>
    <div class="grid md:grid-cols-3 gap-6">@foreach($subService->whyChooseUs as $point)
        <div class="bg-white rounded-xl p-6 shadow-sm"><div class="text-green-500 text-2xl mb-3">✓</div><h3 class="font-semibold text-lg">{{ $point->title }}</h3></div>
    @endforeach</div>
</div></section>
@endif

@if($subService->technologies->count())
<section class="py-16 bg-white"><div class="max-w-7xl mx-auto px-4">
    <h2 class="text-3xl font-bold text-center mb-10">Technologies We Use</h2>
    <div class="flex flex-wrap justify-center gap-4">@foreach($subService->technologies as $tech)
        <div class="flex items-center gap-2 bg-gray-100 rounded-full px-4 py-2">@if($tech->logo)<img src="{{ Storage::url($tech->logo) }}" class="w-6 h-6">@endif<span>{{ $tech->name }}</span></div>
    @endforeach</div>
</div></section>
@endif

<section id="packages" class="py-16 bg-gray-50"><div class="max-w-7xl mx-auto px-4">
    <h2 class="text-3xl font-bold text-center mb-10">Choose Your Package</h2>
    <div class="grid md:grid-cols-2 xl:grid-cols-4 gap-6">@foreach($subService->activePackages as $package)
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden relative @if($package->badge) ring-2 ring-orange-400 @endif">
            @if($package->badge)<div class="absolute top-4 right-4 bg-orange-500 text-white text-xs font-bold px-3 py-1 rounded-full">{{ $package->badge }}</div>@endif
            <div class="p-6"><h3 class="text-xl font-bold mb-2">{{ $package->package_name }}</h3>
            <div class="text-3xl font-bold text-orange-600 mb-4">₹{{ number_format($package->final_price) }}@if($package->hasDiscount())<span class="text-sm text-gray-400 line-through ml-2">₹{{ number_format($package->price) }}</span>@endif</div>
            <ul class="space-y-2 mb-6 text-sm text-gray-600">@foreach($package->activeFeatures as $feature)<li>✓ {{ $feature->feature_title }}</li>@endforeach</ul>
            <a href="{{ route('checkout.show', $package) }}" class="block text-center bg-orange-500 hover:bg-orange-600 text-white py-3 rounded-lg font-semibold">Buy Now</a>
            </div>
        </div>
    @endforeach</div>
</div></section>

@if($subService->faqs->count())
<section class="py-16 bg-white"><div class="max-w-4xl mx-auto px-4">
    <h2 class="text-3xl font-bold text-center mb-10">Frequently Asked Questions</h2>
    <div class="space-y-4">@foreach($subService->faqs as $faq)
        <details class="bg-gray-50 rounded-xl p-5"><summary class="font-semibold cursor-pointer">{{ $faq->question }}</summary><p class="mt-3 text-gray-600">{{ $faq->answer }}</p></details>
    @endforeach</div>
</div></section>
@endif

@if($relatedSubServices->count())
<section class="py-16 bg-gray-50"><div class="max-w-7xl mx-auto px-4">
    <h2 class="text-3xl font-bold mb-8">Related Services</h2>
    <div class="grid md:grid-cols-4 gap-6">@foreach($relatedSubServices as $related)
        <a href="{{ route('services.sub-service', [$service, $related]) }}" class="bg-white rounded-xl p-6 shadow hover:shadow-lg transition">{{ $related->title }}</a>
    @endforeach</div>
</div></section>
@endif
@endsection
