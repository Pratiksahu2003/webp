@extends('layouts.website')

@section('title', 'Service Catalog - ' . config('company.name'))
@section('description', 'Browse our service catalog and choose the right package for your business.')

@section('content')
<section class="py-16 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-catalog-breadcrumbs :items="[
            ['label' => 'Home', 'url' => route('home')],
            ['label' => 'Services'],
        ]" />

        <div class="mb-10">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Our Services</h1>
            <p class="text-gray-600 text-lg max-w-3xl">Browse our service catalog, explore sub-services, and purchase packages online with secure payment.</p>
        </div>

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
