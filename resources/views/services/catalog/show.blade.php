@extends('layouts.website')

@section('title', $service->title . ' - ' . config('company.name'))
@section('description', $service->short_description ?? Str::limit(strip_tags($service->description), 160))

@section('content')
<section class="py-10 lg:py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-catalog-breadcrumbs :items="[
            ['label' => 'Home', 'url' => route('home')],
            ['label' => 'Services', 'url' => route('catalog.services')],
            ['label' => $service->title],
        ]" />

        <div class="mb-10">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $service->title }}</h1>
            @if($service->short_description)
                <p class="text-gray-600 text-lg max-w-3xl">{{ $service->short_description }}</p>
            @endif
        </div>

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
