@extends('layouts.website')

@section('title', $technology->name . ' Development | VanTroZ Technologies')
@section('description', filled($technology->description) ? Str::limit(strip_tags($technology->description), 160) : ('Discover how VanTroZ uses '.$technology->name.' to build scalable software solutions.'))
@section('keywords', $technology->name . ', ' . $technology->name . ' development, VanTroZ')
@section('og_image', $technology->icon ? (str_starts_with($technology->icon, 'http') ? $technology->icon : asset($technology->icon)) : '')

@section('content')

<x-page-hero
    variant="tech"
    :badge="$technology->technology_type ?? 'Technology'"
    :title="$technology->name"
    :subtitle="$technology->category"
    align="left"
>
    <x-slot:breadcrumbs>
        @php
            $techBreadcrumbs = [
                ['label' => 'Home', 'url' => route('home')],
                ['label' => 'Technologies', 'url' => route('technologies')],
            ];
            if ($stackData && $stackSlug) {
                $techBreadcrumbs[] = ['label' => $stackData['label'], 'url' => route('technologies.stack', $stackSlug)];
            }
            $techBreadcrumbs[] = ['label' => $technology->name];
        @endphp
        <x-catalog-breadcrumbs light :items="$techBreadcrumbs" />
    </x-slot:breadcrumbs>

    @if($technology->website_url)
    <a href="{{ $technology->website_url }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center px-5 py-2.5 border border-white/30 hover:bg-white/10 rounded-lg font-semibold text-sm transition-colors">
        Official Website
        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
    </a>
    @endif
</x-page-hero>

<section class="py-4 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-social-share :title="$technology->name.' | VanTroZ'" :description="'How VanTroZ uses '.$technology->name.' in software delivery.'" />
    </div>
</section>

<section class="py-12 lg:py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-3 gap-10 lg:gap-14">
            <div class="lg:col-span-2">
                <div class="flex items-center gap-5 mb-8">
                    <div class="w-20 h-20 flex items-center justify-center rounded-2xl bg-gray-50 border border-gray-100">
                        @if($technology->displayIconUrl())
                            <img src="{{ $technology->displayIconUrl() }}" alt="{{ $technology->name }}" class="w-12 h-12 object-contain">
                        @elseif($technology->icon)
                            <span class="text-4xl">{{ $technology->icon }}</span>
                        @endif
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">{{ $technology->name }}</h2>
                        <div class="flex flex-wrap items-center gap-2 mt-2">
                            @if($technology->technology_type)
                            <span class="text-sm font-medium text-orange-600 bg-orange-50 px-3 py-1 rounded-full">{{ $technology->technology_type }}</span>
                            @endif
                            @if($stackData && $stackSlug)
                            <a href="{{ route('technologies.stack', $stackSlug) }}" class="text-sm font-medium text-gray-500 hover:text-orange-600 transition-colors">{{ $stackData['label'] }} stack →</a>
                            @endif
                        </div>
                    </div>
                </div>

                @if($technology->description)
                <div class="prose prose-gray max-w-none prose-headings:text-gray-900 prose-a:text-orange-600">
                    {!! $technology->description !!}
                </div>
                @else
                <p class="text-gray-600 leading-relaxed">
                    {{ $technology->name }} is part of our {{ strtolower($technology->category) }} delivery toolkit at {{ config('company.name') }}.
                    We use it to build reliable, scalable solutions tailored to your product goals.
                </p>
                @endif
            </div>

            <aside class="space-y-6">
                <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100">
                    <h3 class="font-bold text-gray-900 mb-4">At a Glance</h3>
                    <dl class="space-y-3 text-sm">
                        <div class="flex justify-between gap-4">
                            <dt class="text-gray-500">Stack</dt>
                            <dd class="font-semibold text-gray-900 text-right">{{ $technology->category }}</dd>
                        </div>
                        @if($technology->technology_type)
                        <div class="flex justify-between gap-4">
                            <dt class="text-gray-500">Type</dt>
                            <dd class="font-semibold text-gray-900 text-right">{{ $technology->technology_type }}</dd>
                        </div>
                        @endif
                        @if($technology->subServices->count())
                        <div class="flex justify-between gap-4">
                            <dt class="text-gray-500">Used in</dt>
                            <dd class="font-semibold text-gray-900 text-right">{{ $technology->subServices->count() }} {{ Str::plural('service', $technology->subServices->count()) }}</dd>
                        </div>
                        @endif
                    </dl>
                </div>

                @if($technology->subServices->count())
                <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                    <h3 class="font-bold text-gray-900 mb-4">Services Using {{ $technology->name }}</h3>
                    <ul class="space-y-3">
                        @foreach($technology->subServices->take(8) as $subService)
                        @if($subService->service)
                        <li>
                            <a href="{{ route('services.sub-service', [$subService->service, $subService]) }}" class="text-sm text-gray-700 hover:text-orange-600 transition-colors">
                                {{ $subService->title }}
                            </a>
                            <span class="block text-xs text-gray-400">{{ $subService->service->title }}</span>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>
                @endif

                <a href="{{ route('contact') }}" class="block w-full text-center px-6 py-3 bg-orange-500 hover:bg-orange-600 text-white rounded-xl font-semibold transition-colors">
                    Discuss Your Project
                </a>
            </aside>
        </div>
    </div>
</section>

@if($related->isNotEmpty())
<section class="py-12 lg:py-16 bg-gray-50 border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between gap-4 mb-8">
            <h2 class="text-2xl font-bold text-gray-900">More in {{ $technology->category }}</h2>
            @if($stackSlug)
            <a href="{{ route('technologies.stack', $stackSlug) }}" class="text-sm font-semibold text-orange-600 hover:text-orange-700">View stack →</a>
            @endif
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
            @foreach($related as $tech)
            <a href="{{ route('technologies.show', $tech) }}" class="bg-white rounded-xl p-5 text-center border border-gray-100 hover:border-orange-100 hover:shadow-md transition-all">
                <div class="h-10 flex items-center justify-center mb-2">
                    @if($tech->displayIconUrl())
                        <img src="{{ $tech->displayIconUrl() }}" alt="{{ $tech->name }}" class="max-h-10 object-contain">
                    @elseif($tech->icon)
                        <span class="text-2xl">{{ $tech->icon }}</span>
                    @endif
                </div>
                <span class="text-sm font-semibold text-gray-800">{{ $tech->name }}</span>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
