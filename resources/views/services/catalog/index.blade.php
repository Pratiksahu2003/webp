@extends('layouts.website')

@section('title', 'IT Services & Packages | VanTroZ Service Catalog')
@section('description', 'Browse VanTroZ service catalog for web development, software, mobile apps, and digital packages tailored for growing businesses.')
@section('keywords', 'VanTroZ services, software packages, web development packages, IT services Gurugram')

@section('content')

<x-page-hero
    variant="brand"
    badge="Service Catalog"
    title="Our Services"
    subtitle="Browse our service catalog, explore sub-services, and purchase packages online with secure payment."
    align="left"
>
    <x-slot:breadcrumbs>
        <x-catalog-breadcrumbs light :items="[
            ['label' => 'Home', 'url' => route('home')],
            ['label' => 'Services'],
        ]" />
    </x-slot:breadcrumbs>
</x-page-hero>

<section class="py-4 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-social-share title="VanTroZ Services" description="Browse IT services and packages from VanTroZ." />
    </div>
</section>

<section class="py-10 lg:py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($services->isEmpty())
            <div class="bg-white rounded-2xl shadow-sm p-12 text-center">
                <p class="text-gray-500">Services are being updated. Please check back soon or <a href="{{ route('contact') }}" class="text-orange-600 font-semibold">contact us</a>.</p>
            </div>
        @else
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($services as $service)
                <a href="{{ route('catalog.services.show', $service) }}" class="group bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-lg hover:border-orange-200 transition-all duration-300">
                    <h2 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-orange-600 transition-colors">{{ $service->title }}</h2>
                    <p class="text-gray-600 text-sm mb-4">{{ $service->short_description ?? Str::limit(strip_tags($service->description), 120) }}</p>
                    <span class="text-orange-600 font-semibold">{{ $service->activeSubServices->count() }} sub-services →</span>
                </a>
                @endforeach
            </div>
        @endif
    </div>
</section>
@endsection
