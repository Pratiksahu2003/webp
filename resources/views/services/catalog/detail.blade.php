@extends('layouts.website')

@section('title', $subService->title . ' - ' . $service->title)
@section('description', $subService->short_description)

@section('content')
{{-- Hero --}}
<section class="relative overflow-hidden bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 text-white">
    @if($service->banner_image)
        <div class="absolute inset-0 opacity-15 bg-cover bg-center" style="background-image:url('{{ Storage::url($service->banner_image) }}')"></div>
    @endif
    <div class="absolute inset-0 bg-gradient-to-r from-slate-900/90 via-slate-900/70 to-transparent"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
        <x-catalog-breadcrumbs light :items="[
            ['label' => 'Home', 'url' => route('home')],
            ['label' => 'Services', 'url' => route('catalog.services')],
            ['label' => $service->title, 'url' => route('catalog.services.show', $service)],
            ['label' => $subService->title],
        ]" />

        <div class="grid lg:grid-cols-12 gap-10 items-end">
            <div class="lg:col-span-8">
                <span class="inline-flex items-center px-3 py-1 rounded-full bg-orange-500/20 text-orange-300 text-sm font-medium mb-4">
                    {{ $service->title }}
                </span>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight mb-4">{{ $subService->title }}</h1>
                <p class="text-lg text-slate-300 max-w-2xl leading-relaxed">{{ $subService->short_description }}</p>
                <div class="mt-8 flex flex-wrap gap-3">
                    <a href="#packages" class="inline-flex items-center px-6 py-3 bg-orange-500 hover:bg-orange-600 rounded-lg font-semibold transition-colors">
                        View Packages
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </a>
                    <a href="{{ route('contact') }}" class="inline-flex items-center px-6 py-3 border border-white/30 hover:bg-white/10 rounded-lg font-semibold transition-colors">
                        Get Custom Quote
                    </a>
                </div>
            </div>

            <div class="lg:col-span-4 grid grid-cols-2 lg:grid-cols-1 gap-3">
                <div class="bg-white/10 backdrop-blur-sm border border-white/10 rounded-xl p-5">
                    <p class="text-slate-400 text-sm mb-1">Starting From</p>
                    <p class="text-2xl lg:text-3xl font-bold text-orange-400">₹{{ number_format($subService->starting_price) }}</p>
                </div>
                <div class="bg-white/10 backdrop-blur-sm border border-white/10 rounded-xl p-5">
                    <p class="text-slate-400 text-sm mb-1">Delivery Time</p>
                    <p class="text-2xl lg:text-3xl font-bold text-white">{{ $subService->delivery_days }} <span class="text-lg font-medium text-slate-300">Days</span></p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Overview --}}
<section class="py-16 lg:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-12 gap-12 lg:gap-16 items-start">
            <div class="lg:col-span-7">
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-6">Service Overview</h2>
                <div class="prose prose-gray max-w-none prose-headings:text-gray-900 prose-a:text-orange-600 prose-li:marker:text-orange-500">
                    {!! $subService->description !!}
                </div>
            </div>
            <div class="lg:col-span-5 space-y-4">
                <div class="bg-orange-50 border border-orange-100 rounded-2xl p-6">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 bg-orange-500 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Starting Price</p>
                            <p class="text-xl font-bold text-orange-600">₹{{ number_format($subService->starting_price) }}</p>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600">Transparent pricing with multiple package tiers to fit your budget.</p>
                </div>
                <div class="bg-blue-50 border border-blue-100 rounded-2xl p-6">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Estimated Delivery</p>
                            <p class="text-xl font-bold text-blue-700">{{ $subService->delivery_days }} Days</p>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600">Milestone-based delivery with regular progress updates.</p>
                </div>
                <a href="{{ route('catalog.services.show', $service) }}" class="flex items-center justify-between p-4 bg-gray-50 border border-gray-100 rounded-xl hover:border-orange-200 hover:bg-orange-50/50 transition-all group">
                    <span class="text-sm font-medium text-gray-700 group-hover:text-orange-600">More from {{ $service->title }}</span>
                    <svg class="w-4 h-4 text-gray-400 group-hover:text-orange-500 group-hover:translate-x-0.5 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>
    </div>
</section>

@if($subService->whyChooseUs->count())
<section class="py-16 lg:py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-3">Why Choose Us</h2>
            <p class="text-gray-600">What sets our {{ $subService->title }} service apart from the rest.</p>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($subService->whyChooseUs as $point)
            <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-md hover:border-orange-100 transition-all">
                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                </div>
                <h3 class="font-semibold text-lg text-gray-900">{{ $point->title }}</h3>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@if($subService->technologies->count())
<section class="py-16 lg:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-3">Technologies We Use</h2>
            <p class="text-gray-600">Modern tools and frameworks powering this service.</p>
        </div>
        <div class="flex flex-wrap justify-center gap-3">
            @foreach($subService->technologies as $tech)
            <div class="inline-flex items-center gap-2.5 bg-gray-50 border border-gray-200 rounded-full px-4 py-2.5 hover:border-orange-200 hover:bg-orange-50/50 transition-colors">
                @if($tech->displayIconUrl())
                    <img src="{{ $tech->displayIconUrl() }}" alt="{{ $tech->name }}" class="w-5 h-5 object-contain">
                @elseif($tech->icon)
                    <span class="text-base">{{ $tech->icon }}</span>
                @endif
                <span class="text-sm font-medium text-gray-700">{{ $tech->name }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Packages --}}
<section id="packages" class="py-16 lg:py-20 bg-gray-50 scroll-mt-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-3">Choose Your Package</h2>
            <p class="text-gray-600">Select the plan that best fits your project scope and budget.</p>
        </div>

        @if($subService->activePackages->isEmpty())
            <div class="text-center bg-white rounded-2xl border border-gray-100 p-12">
                <p class="text-gray-500 mb-4">Packages are being configured for this service.</p>
                <a href="{{ route('contact') }}" class="inline-flex items-center px-6 py-3 bg-orange-500 hover:bg-orange-600 text-white rounded-lg font-semibold transition-colors">Request a Quote</a>
            </div>
        @else
            @php
                $packageCount = $subService->activePackages->count();
                $packageGridClass = match (min($packageCount, 4)) {
                    1 => 'sm:grid-cols-1 lg:grid-cols-1 max-w-md mx-auto',
                    2 => 'sm:grid-cols-2 lg:grid-cols-2 max-w-4xl mx-auto',
                    3 => 'sm:grid-cols-2 lg:grid-cols-3',
                    default => 'sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-4',
                };
            @endphp
            <div class="grid {{ $packageGridClass }} gap-6 lg:gap-8">
                @foreach($subService->activePackages as $package)
                <div class="flex flex-col bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden hover:shadow-lg transition-shadow {{ $package->badge ? 'ring-2 ring-orange-400 ring-offset-2' : '' }}">
                    @if($package->badge)
                    <div class="bg-orange-500 text-white text-xs font-bold text-center py-2 uppercase tracking-wide">{{ $package->badge }}</div>
                    @endif
                    <div class="flex flex-col flex-1 p-6 lg:p-8">
                        <h3 class="text-xl font-bold text-gray-900 mb-1">{{ $package->package_name }}</h3>
                        <div class="mb-6">
                            <span class="text-3xl font-bold text-orange-600">₹{{ number_format($package->final_price) }}</span>
                            @if($package->hasDiscount())
                                <span class="text-sm text-gray-400 line-through ml-2">₹{{ number_format($package->price) }}</span>
                            @endif
                        </div>
                        <ul class="space-y-3 mb-8 flex-1">
                            @foreach($package->activeFeatures as $feature)
                            <li class="flex items-start gap-2.5 text-sm text-gray-600">
                                <svg class="w-4 h-4 text-green-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <span>{{ $feature->feature_title }}</span>
                            </li>
                            @endforeach
                        </ul>
                        <a href="{{ route('checkout.show', $package) }}" class="block w-full text-center bg-orange-500 hover:bg-orange-600 text-white py-3 px-4 rounded-xl font-semibold transition-colors mt-auto">
                            Buy Now
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</section>

@if($subService->faqs->count())
<section class="py-16 lg:py-20 bg-white">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-3">Frequently Asked Questions</h2>
            <p class="text-gray-600">Common questions about {{ $subService->title }}.</p>
        </div>
        <div class="space-y-3">
            @foreach($subService->faqs as $faq)
            <details class="group bg-gray-50 border border-gray-100 rounded-xl overflow-hidden">
                <summary class="flex items-center justify-between gap-4 px-5 py-4 font-semibold text-gray-900 cursor-pointer list-none select-none hover:bg-gray-100/80 transition-colors">
                    <span>{{ $faq->question }}</span>
                    <svg class="w-5 h-5 text-gray-400 flex-shrink-0 group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </summary>
                <div class="px-5 pb-5 pt-4 text-gray-600 text-sm leading-relaxed border-t border-gray-100">
                    {{ $faq->answer }}
                </div>
            </details>
            @endforeach
        </div>
    </div>
</section>
@endif

@if($relatedSubServices->count())
<section class="py-16 lg:py-20 bg-gray-50 border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-10">
            <div>
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">Related Sub-Services</h2>
                <p class="text-gray-600 mt-2">Explore more offerings under {{ $service->title }}.</p>
            </div>
            <a href="{{ route('catalog.services.show', $service) }}" class="text-orange-600 hover:text-orange-700 font-semibold text-sm whitespace-nowrap">
                View all →
            </a>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($relatedSubServices as $related)
            <a href="{{ route('services.sub-service', [$service, $related]) }}" class="group flex flex-col bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-md hover:border-orange-200 transition-all h-full">
                <h3 class="font-bold text-gray-900 mb-2 group-hover:text-orange-600 transition-colors">{{ $related->title }}</h3>
                <p class="text-sm text-gray-600 mb-4 flex-1 leading-relaxed">{{ Str::limit($related->short_description, 90) }}</p>
                <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                    <span class="text-orange-600 font-bold text-sm">₹{{ number_format($related->starting_price) }}+</span>
                    <span class="text-gray-400 text-xs group-hover:text-orange-500 transition-colors">Learn more →</span>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
