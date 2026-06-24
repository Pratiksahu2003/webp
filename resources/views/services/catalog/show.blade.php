@extends('layouts.website')
@section('title', $service->title)
@section('content')
<section class="py-16 bg-gray-50 min-h-screen"><div class="max-w-7xl mx-auto px-4">
<a href="{{ route('catalog.services') }}" class="text-orange-600 mb-6 inline-block">← All Services</a>
<h1 class="text-4xl font-bold mb-4">{{ $service->title }}</h1>
<p class="text-gray-600 mb-10">{{ $service->short_description }}</p>
<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">@foreach($service->activeSubServices as $sub)
<a href="{{ route('services.sub-service', [$service, $sub]) }}" class="bg-white rounded-2xl shadow p-6 hover:shadow-lg transition">
<h2 class="text-xl font-bold mb-2">{{ $sub->title }}</h2>
<p class="text-gray-600 text-sm mb-4">{{ $sub->short_description }}</p>
<p class="text-orange-600 font-bold">From ₹{{ number_format($sub->starting_price) }}</p>
</a>@endforeach</div>
</div></section>
@endsection
