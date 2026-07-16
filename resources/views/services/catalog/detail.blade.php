@extends('layouts.website')

@php
    $detailTitle = $subService->title.' | '.$service->title.' | '.config('company.name');
    $detailDescription = $subService->short_description
        ?: Str::limit(strip_tags((string) $subService->description), 160)
        ?: ('Get '.$subService->title.' from VanTroZ — professional '.$service->title.' packages.');
    $detailSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Service',
        'name' => $subService->title,
        'description' => $detailDescription,
        'provider' => ['@id' => url('/').'#localbusiness'],
        'url' => route('services.sub-service', [$service, $subService]),
        'offers' => [
            '@type' => 'Offer',
            'priceCurrency' => 'INR',
            'price' => (string) $subService->starting_price,
            'availability' => 'https://schema.org/InStock',
        ],
        'isRelatedTo' => [
            '@type' => 'Service',
            'name' => $service->title,
            'url' => route('catalog.services.show', $service),
        ],
    ];
@endphp

@section('title', $detailTitle)
@section('description', $detailDescription)
@section('keywords', $subService->title.', '.$service->title.', VanTroZ, software packages Gurugram')
@section('og_image', $service->banner_image ? Storage::url($service->banner_image) : '')
@section('canonical', route('services.sub-service', [$service, $subService]))

@push('schema')
<script type="application/ld+json">{!! json_encode($detailSchema, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_HEX_TAG|JSON_HEX_AMP) !!}</script>
@endpush

@section('content')

<x-page-hero
    variant="brand"
    :badge="$service->title"
    :title="$subService->title"
    :subtitle="$subService->short_description"
    :background="$service->banner_image ? Storage::url($service->banner_image) : null"
    align="left"
>
    <x-slot:breadcrumbs>
        <x-catalog-breadcrumbs light :items="[
            ['label' => 'Home', 'url' => route('home')],
            ['label' => 'Services', 'url' => route('catalog.services')],
            ['label' => $service->title, 'url' => route('catalog.services.show', $service)],
            ['label' => $subService->title],
        ]" />
    </x-slot:breadcrumbs>

    <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm border border-white/10 rounded-lg px-4 py-2.5">
        <span class="text-slate-400 text-sm">From</span>
        <span class="text-lg font-bold text-orange-400">₹{{ number_format($subService->starting_price) }}</span>
    </div>
    <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm border border-white/10 rounded-lg px-4 py-2.5">
        <span class="text-slate-400 text-sm">Delivery</span>
        <span class="text-lg font-bold text-white">{{ $subService->delivery_days }} <span class="text-sm font-medium text-slate-300">Days</span></span>
    </div>
    <a href="#packages" class="inline-flex items-center px-5 py-2.5 bg-orange-500 hover:bg-orange-600 rounded-lg font-semibold text-sm transition-colors">
        View Packages
        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
    </a>
    <a href="{{ route('contact') }}" class="inline-flex items-center px-5 py-2.5 border border-white/30 hover:bg-white/10 rounded-lg font-semibold text-sm transition-colors">
        Get Custom Quote
    </a>
</x-page-hero>

<section class="py-4 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-social-share :title="$subService->title" :description="$detailDescription" />
    </div>
</section>

{{-- Overview --}}
<section class="py-10 lg:py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-12 gap-8 lg:gap-12 items-start">
            <div class="lg:col-span-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Service Overview</h2>
                <div class="prose prose-gray max-w-none prose-headings:text-gray-900 prose-a:text-orange-600 prose-li:marker:text-orange-500">
                    {!! $subService->description !!}
                </div>
            </div>
            <div class="lg:col-span-4 space-y-3 lg:sticky lg:top-24">
                <a href="{{ route('catalog.services.show', $service) }}" class="flex items-center justify-between p-4 bg-gray-50 border border-gray-100 rounded-xl hover:border-orange-200 hover:bg-orange-50/50 transition-all group">
                    <span class="text-sm font-medium text-gray-700 group-hover:text-orange-600">More from {{ $service->title }}</span>
                    <svg class="w-4 h-4 text-gray-400 group-hover:text-orange-500 group-hover:translate-x-0.5 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
                <a href="{{ route('contact') }}" class="flex items-center justify-center p-4 bg-orange-500 hover:bg-orange-600 text-white rounded-xl font-semibold text-sm transition-colors">
                    Request Custom Quote
                </a>

                @if($subService->technologies->count())
                <div class="p-4 bg-gray-50 border border-gray-100 rounded-xl">
                    <h3 class="font-bold text-gray-900 text-sm mb-3">Technologies We Use</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach($subService->technologies as $tech)
                        <div class="inline-flex items-center gap-1.5 bg-white border border-gray-200 rounded-full px-2.5 py-1.5">
                            @if($tech->displayIconUrl())
                                <img src="{{ $tech->displayIconUrl() }}" alt="{{ $tech->name }}" class="w-4 h-4 object-contain">
                            @elseif($tech->icon)
                                <span class="text-sm">{{ $tech->icon }}</span>
                            @endif
                            <span class="text-xs font-medium text-gray-700">{{ $tech->name }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                @if($subService->whyChooseUs->count())
                <div class="p-4 bg-gray-50 border border-gray-100 rounded-xl">
                    <h3 class="font-bold text-gray-900 text-sm mb-3">Why Choose Us</h3>
                    <ul class="space-y-2.5">
                        @foreach($subService->whyChooseUs as $point)
                        <li class="flex items-start gap-2 text-sm text-gray-700">
                            <svg class="w-4 h-4 text-green-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span>{{ $point->title }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

{{-- Packages --}}
<section id="packages" class="py-10 lg:py-12 bg-gray-50 scroll-mt-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-2">Choose Your Package</h2>
            <p class="text-gray-600 text-sm">Select the plan that best fits your project scope and budget.</p>
        </div>

        @if($subService->activePackages->isEmpty())
            <div class="text-center bg-white rounded-xl border border-gray-100 p-10">
                <p class="text-gray-500 mb-4">Packages are being configured for this service.</p>
                <a href="{{ route('contact') }}" class="inline-flex items-center px-5 py-2.5 bg-orange-500 hover:bg-orange-600 text-white rounded-lg font-semibold text-sm transition-colors">Request a Quote</a>
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
            <div class="grid {{ $packageGridClass }} gap-5 lg:gap-6">
                @foreach($subService->activePackages as $package)
                <div class="flex flex-col bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden hover:shadow-lg transition-shadow {{ $package->badge ? 'ring-2 ring-orange-400 ring-offset-2' : '' }}">
                    @if($package->badge)
                    <div class="bg-orange-500 text-white text-xs font-bold text-center py-1.5 uppercase tracking-wide">{{ $package->badge }}</div>
                    @endif
                    <div class="flex flex-col flex-1 p-5 lg:p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-1">{{ $package->package_name }}</h3>
                        <div class="mb-5">
                            <span class="text-2xl font-bold text-orange-600">₹{{ number_format($package->final_price) }}</span>
                            @if($package->hasDiscount())
                                <span class="text-sm text-gray-400 line-through ml-2">₹{{ number_format($package->price) }}</span>
                            @endif
                        </div>
                        <ul class="space-y-2.5 mb-6 flex-1">
                            @foreach($package->activeFeatures as $feature)
                            <li class="flex items-start gap-2 text-sm text-gray-600">
                                <svg class="w-4 h-4 text-green-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <span>{{ $feature->feature_title }}</span>
                            </li>
                            @endforeach
                        </ul>
                        <a href="{{ route('checkout.show', $package) }}" class="block w-full text-center bg-orange-500 hover:bg-orange-600 text-white py-2.5 px-4 rounded-lg font-semibold text-sm transition-colors mt-auto">
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
<section class="py-10 lg:py-12 bg-white">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-2">Frequently Asked Questions</h2>
            <p class="text-gray-600 text-sm">Common questions about {{ $subService->title }}.</p>
        </div>
        <div class="space-y-2.5">
            @foreach($subService->faqs as $faq)
            <details class="group bg-gray-50 border border-gray-100 rounded-xl overflow-hidden">
                <summary class="flex items-center justify-between gap-4 px-4 py-3.5 font-semibold text-gray-900 cursor-pointer list-none select-none hover:bg-gray-100/80 transition-colors text-sm">
                    <span>{{ $faq->question }}</span>
                    <svg class="w-5 h-5 text-gray-400 flex-shrink-0 group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </summary>
                <div class="px-4 pb-4 pt-3 text-gray-600 text-sm leading-relaxed border-t border-gray-100">
                    {{ $faq->answer }}
                </div>
            </details>
            @endforeach
        </div>
    </div>
</section>
@endif

@if($relatedSubServices->count())
<section class="py-10 lg:py-12 bg-gray-50 border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-3 mb-8">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Related Sub-Services</h2>
                <p class="text-gray-600 text-sm mt-1">Explore more offerings under {{ $service->title }}.</p>
            </div>
            <a href="{{ route('catalog.services.show', $service) }}" class="text-orange-600 hover:text-orange-700 font-semibold text-sm whitespace-nowrap">
                View all →
            </a>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach($relatedSubServices as $related)
            <a href="{{ route('services.sub-service', [$service, $related]) }}" class="group flex flex-col bg-white rounded-xl p-5 border border-gray-100 shadow-sm hover:shadow-md hover:border-orange-200 transition-all h-full">
                <h3 class="font-bold text-gray-900 mb-2 group-hover:text-orange-600 transition-colors text-sm">{{ $related->title }}</h3>
                <p class="text-sm text-gray-600 mb-3 flex-1 leading-relaxed">{{ Str::limit($related->short_description, 90) }}</p>
                <div class="flex items-center justify-between pt-3 border-t border-gray-100">
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
