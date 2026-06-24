@extends('layouts.website')
@section('title', 'Service Catalog')
@section('content')
<section class="py-16 bg-gray-50 min-h-screen"><div class="max-w-7xl mx-auto px-4">
<h1 class="text-4xl font-bold mb-4">Our Services</h1>
<p class="text-gray-600 mb-10">Browse our service catalog and choose the right package for your business.</p>
<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">@foreach($services as $service)
<a href="{{ route('catalog.services.show', $service) }}" class="bg-white rounded-2xl shadow p-6 hover:shadow-lg transition">
<h2 class="text-xl font-bold mb-2">{{ $service->title }}</h2>
<p class="text-gray-600 text-sm mb-4">{{ $service->short_description ?? Str::limit(strip_tags($service->description), 120) }}</p>
<span class="text-orange-600 font-semibold">{{ $service->activeSubServices->count() }} offerings →</span>
</a>@endforeach</div>
</div></section>
@endsection
