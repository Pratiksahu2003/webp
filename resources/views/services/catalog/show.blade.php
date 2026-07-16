@extends('layouts.website')

@php
    $serviceTitle = $service->getEffectiveSeoTitle();
    $serviceDescription = $service->getEffectiveSeoDescription();
    $serviceImage = $service->getSeoImage();
    $serviceSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Service',
        'name' => $service->title,
        'description' => $serviceDescription,
        'provider' => ['@id' => url('/').'#localbusiness'],
        'url' => route('catalog.services.show', $service),
        'areaServed' => 'IN',
        'serviceType' => $service->title,
    ];
@endphp

@section('title', $serviceTitle)
@section('description', $serviceDescription)
@section('keywords', $service->seo_keywords ?: ($service->title.', VanTroZ services, software development Gurugram'))
@section('og_image', $serviceImage ? Storage::url($serviceImage) : '')
@section('canonical', route('catalog.services.show', $service))

@push('schema')
<script type="application/ld+json">{!! json_encode($serviceSchema, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_HEX_TAG|JSON_HEX_AMP) !!}</script>
@endpush

@section('content')

<x-page-hero
    variant="brand"
    badge="Services"
    :title="$service->title"
    :subtitle="$service->short_description ?? Str::limit(strip_tags($service->description), 160)"
    :background="$service->banner_image ? Storage::url($service->banner_image) : null"
    align="left"
>
    <x-slot:breadcrumbs>
        <x-catalog-breadcrumbs light :items="[
            ['label' => 'Home', 'url' => route('home')],
            ['label' => 'Services', 'url' => route('catalog.services')],
            ['label' => $service->title],
        ]" />
    </x-slot:breadcrumbs>
</x-page-hero>

<section class="py-4 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-social-share :title="$service->title" :description="$serviceDescription" />
    </div>
</section>

<section class="py-10 lg:py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($service->activeSubServices->isEmpty())
            <div class="bg-white rounded-2xl shadow-sm p-12 text-center">
                <p class="text-gray-500">No sub-services available yet. <a href="{{ route('contact') }}" class="text-orange-600 font-semibold">Contact us</a> for a custom quote.</p>
            </div>
        @else
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($service->activeSubServices as $subService)
                <a href="{{ route('services.sub-service', [$service, $subService]) }}" class="group bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-lg hover:border-orange-200 transition-all duration-300">
                    <h2 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-orange-600 transition-colors">{{ $subService->title }}</h2>
                    <p class="text-gray-600 text-sm mb-4">{{ $subService->short_description }}</p>
                    <div class="flex items-center justify-between">
                        <p class="text-orange-600 font-bold">From ₹{{ number_format($subService->starting_price) }}</p>
                        <span class="text-sm text-gray-400">{{ $subService->delivery_days }} days</span>
                    </div>
                </a>
                @endforeach
            </div>
        @endif
    </div>
</section>
@endsection
