@extends('layouts.website')

@section('title', 'Technologies - VanTroZ')
@section('description', 'Explore our technology stack and the cutting-edge tools we use to build robust solutions.')

@section('content')

<x-page-hero
    variant="tech"
    badge="Tech Stack"
    title="Technology Stack"
    subtitle="Cutting-edge technologies and frameworks powering our solutions."
/>

<section class="py-16 lg:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-14">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Browse by Stack</h2>
            <p class="text-lg text-gray-600">Six core technology areas — each with dedicated expertise, tools, and delivery experience.</p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($stacks as $slug => $stack)
            @php $count = ($stackTechnologies[$slug] ?? collect())->count(); @endphp
            <a
                href="{{ route('technologies.stack', $slug) }}"
                class="group relative bg-white rounded-2xl p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:border-orange-100 hover:-translate-y-1 transition-all duration-300"
            >
                <div class="flex items-start justify-between gap-4 mb-5">
                    <span class="text-3xl" aria-hidden="true">{{ $stack['icon'] }}</span>
                    <span class="text-sm font-semibold text-orange-600 bg-orange-50 px-3 py-1 rounded-full">{{ $count }} tools</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-orange-600 transition-colors">{{ $stack['label'] }}</h3>
                <p class="text-gray-600 text-sm leading-relaxed mb-5">{{ $stack['description'] }}</p>
                <span class="inline-flex items-center text-sm font-semibold text-orange-600">
                    Explore stack
                    <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </span>
            </a>
            @endforeach
        </div>
    </div>
</section>

@if($technologies->isNotEmpty())
<section class="py-16 lg:py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">All Technologies</h2>
            <p class="text-gray-600">Quick access to every tool in our delivery toolkit.</p>
        </div>

        @foreach($stacks as $slug => $stack)
        @php $stackTechs = $stackTechnologies[$slug] ?? collect(); @endphp
        @if($stackTechs->isNotEmpty())
        <div class="mb-12 last:mb-0">
            <div class="flex items-center justify-between gap-4 mb-6">
                <h3 class="text-xl font-bold text-gray-900">{{ $stack['label'] }}</h3>
                <a href="{{ route('technologies.stack', $slug) }}" class="text-sm font-semibold text-orange-600 hover:text-orange-700">View all →</a>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                @foreach($stackTechs->take(6) as $tech)
                <a href="{{ route('technologies.show', $tech) }}" class="bg-white rounded-xl p-5 text-center border border-gray-100 shadow-sm hover:shadow-md hover:border-orange-100 transition-all">
                    <div class="h-10 flex items-center justify-center mb-3">
                        @if($tech->displayIconUrl())
                            <img src="{{ $tech->displayIconUrl() }}" alt="{{ $tech->name }}" class="max-h-10 max-w-full object-contain">
                        @elseif($tech->icon)
                            <span class="text-3xl">{{ $tech->icon }}</span>
                        @endif
                    </div>
                    <h4 class="font-semibold text-gray-800 text-sm">{{ $tech->name }}</h4>
                </a>
                @endforeach
            </div>
        </div>
        @endif
        @endforeach
    </div>
</section>
@endif

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Why Our Technology Stack?</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                We choose technologies that deliver performance, scalability, and maintainability
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <h3 class="text-xl font-semibold mb-3">Performance</h3>
                <p class="text-gray-600">Optimized for speed and efficiency to deliver fast user experiences</p>
            </div>
            <div class="text-center">
                <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                </div>
                <h3 class="text-xl font-semibold mb-3">Scalability</h3>
                <p class="text-gray-600">Built to grow with your business and handle increasing demands</p>
            </div>
            <div class="text-center">
                <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="text-xl font-semibold mb-3">Reliability</h3>
                <p class="text-gray-600">Proven technologies with strong community support and documentation</p>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-gradient-to-r from-orange-500 to-orange-600 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Build With Modern Technology?</h2>
        <p class="text-xl mb-8 max-w-3xl mx-auto">
            Let's discuss your project and see how our technology expertise can help you succeed
        </p>
        <a href="{{ route('contact') }}" class="bg-yellow-400 text-gray-900 px-8 py-3 rounded-lg font-semibold hover:bg-yellow-300 transition-colors">
            Start Your Project
        </a>
    </div>
</section>
@endsection
