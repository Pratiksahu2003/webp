@extends('layouts.website')

@section('title', 'Technologies - WEZOM')
@section('description', 'Explore our technology stack and the cutting-edge tools we use to build robust solutions.')

@section('content')
<!-- Hero Section -->
<section class="hero-gradient text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">Technology Stack</h1>
            <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto">
                Cutting-edge technologies powering our solutions
            </p>
        </div>
    </div>
</section>

<!-- Technologies by Category -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @php
            $techCategories = $technologies->groupBy('category');
        @endphp
        
        @foreach($techCategories as $category => $techs)
        <div class="mb-16">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ $category }}</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    {{ $techs->count() }} Developers
                </p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
                @foreach($techs as $tech)
                <div class="tech-item bg-white rounded-lg p-6 text-center shadow-md border hover:shadow-lg transition-shadow">
                    <div class="text-4xl mb-3">{{ $tech->icon }}</div>
                    <h3 class="font-semibold text-gray-700 mb-2">{{ $tech->name }}</h3>
                    @if($tech->description)
                        <p class="text-sm text-gray-500">{{ $tech->description }}</p>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
        
        @if($technologies->isEmpty())
        <div class="text-center py-12">
            <div class="text-gray-400 text-6xl mb-4">⚙️</div>
            <h3 class="text-xl font-semibold text-gray-600 mb-2">No technologies available</h3>
            <p class="text-gray-500">Our technology stack will be updated soon.</p>
        </div>
        @endif
    </div>
</section>

<!-- Technology Categories Overview -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Technology Expertise</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                We leverage the best tools and frameworks to deliver exceptional results
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="bg-white rounded-lg p-8 text-center shadow-md">
                <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-3">Front-End</h3>
                <p class="text-gray-600">Modern frameworks and libraries for responsive user interfaces</p>
            </div>
            
            <div class="bg-white rounded-lg p-8 text-center shadow-md">
                <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-3">Back-End</h3>
                <p class="text-gray-600">Robust server-side technologies and APIs</p>
            </div>
            
            <div class="bg-white rounded-lg p-8 text-center shadow-md">
                <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-3">Database</h3>
                <p class="text-gray-600">Scalable database solutions for data management</p>
            </div>
            
            <div class="bg-white rounded-lg p-8 text-center shadow-md">
                <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-3">Cloud & DevOps</h3>
                <p class="text-gray-600">Cloud infrastructure and deployment automation</p>
            </div>
        </div>
    </div>
</section>

<!-- Why Our Tech Stack -->
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
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-3">Performance</h3>
                <p class="text-gray-600">Optimized for speed and efficiency to deliver fast user experiences</p>
            </div>
            
            <div class="text-center">
                <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-3">Scalability</h3>
                <p class="text-gray-600">Built to grow with your business and handle increasing demands</p>
            </div>
            
            <div class="text-center">
                <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-3">Reliability</h3>
                <p class="text-gray-600">Proven technologies with strong community support and documentation</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 hero-gradient text-white">
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
