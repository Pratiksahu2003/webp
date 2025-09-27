@extends('layouts.website')

@section('title', 'Mobile App Development Services - ' . config('company.name'))
@section('description', 'Professional mobile app development for iOS and Android platforms. Native and cross-platform solutions by ' . config('company.name'))

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-purple-600 to-purple-700 text-white py-20 overflow-hidden">
    <!-- Background Video -->
    <video autoplay muted loop class="absolute inset-0 w-full h-full object-cover z-0">
        <source src="{{ asset('banner/common.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    
    <!-- Overlay -->
    <div class="absolute inset-0 bg-purple-900 bg-opacity-60 z-10"></div>
    
    <!-- Content -->
    <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">Mobile App Development</h1>
            <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto">
                Create powerful mobile applications for iOS and Android that engage users and drive business growth
            </p>
            <a href="{{ route('contact') }}" class="bg-orange-500 text-white px-8 py-3 rounded-lg font-semibold hover:bg-orange-600 transition-colors">
                Start Your App Project
            </a>
        </div>
    </div>
</section>

<!-- Services Overview -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Mobile Development Solutions</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                From concept to app store, we deliver mobile applications that users love
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-gray-50 p-8 rounded-lg">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Native iOS Development</h3>
                <p class="text-gray-600">High-performance iOS apps built with Swift and Objective-C, optimized for iPhone and iPad devices.</p>
            </div>

            <div class="bg-gray-50 p-8 rounded-lg">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Native Android Development</h3>
                <p class="text-gray-600">Feature-rich Android applications using Kotlin and Java, designed for optimal performance across Android devices.</p>
            </div>

            <div class="bg-gray-50 p-8 rounded-lg">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Cross-Platform Development</h3>
                <p class="text-gray-600">Cost-effective solutions using React Native and Flutter to deploy on both iOS and Android platforms.</p>
            </div>

            <div class="bg-gray-50 p-8 rounded-lg">
                <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">UI/UX Design</h3>
                <p class="text-gray-600">Intuitive and engaging user interfaces designed following platform-specific guidelines and best practices.</p>
            </div>

            <div class="bg-gray-50 p-8 rounded-lg">
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Performance Optimization</h3>
                <p class="text-gray-600">Fast, responsive apps optimized for battery life, memory usage, and smooth user experience.</p>
            </div>

            <div class="bg-gray-50 p-8 rounded-lg">
                <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">App Store Deployment</h3>
                <p class="text-gray-600">Complete app store submission process including optimization, compliance, and ongoing updates.</p>
            </div>
        </div>
    </div>
</section>

<!-- Technologies -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Mobile Technologies</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                We use the latest mobile development technologies and frameworks
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8">
            <div class="text-center">
                <div class="bg-white p-4 rounded-lg shadow-sm mb-4">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/swift/swift-original.svg" alt="Swift" class="w-12 h-12 mx-auto">
                </div>
                <p class="font-medium text-gray-900">Swift</p>
            </div>
            <div class="text-center">
                <div class="bg-white p-4 rounded-lg shadow-sm mb-4">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/kotlin/kotlin-original.svg" alt="Kotlin" class="w-12 h-12 mx-auto">
                </div>
                <p class="font-medium text-gray-900">Kotlin</p>
            </div>
            <div class="text-center">
                <div class="bg-white p-4 rounded-lg shadow-sm mb-4">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/react/react-original.svg" alt="React Native" class="w-12 h-12 mx-auto">
                </div>
                <p class="font-medium text-gray-900">React Native</p>
            </div>
            <div class="text-center">
                <div class="bg-white p-4 rounded-lg shadow-sm mb-4">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/flutter/flutter-original.svg" alt="Flutter" class="w-12 h-12 mx-auto">
                </div>
                <p class="font-medium text-gray-900">Flutter</p>
            </div>
            <div class="text-center">
                <div class="bg-white p-4 rounded-lg shadow-sm mb-4">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/java/java-original.svg" alt="Java" class="w-12 h-12 mx-auto">
                </div>
                <p class="font-medium text-gray-900">Java</p>
            </div>
            <div class="text-center">
                <div class="bg-white p-4 rounded-lg shadow-sm mb-4">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/firebase/firebase-plain.svg" alt="Firebase" class="w-12 h-12 mx-auto">
                </div>
                <p class="font-medium text-gray-900">Firebase</p>
            </div>
        </div>
    </div>
</section>

<!-- App Types -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Types of Apps We Build</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                From simple utility apps to complex enterprise solutions
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center p-6 border border-gray-200 rounded-lg hover:shadow-lg transition-shadow">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">E-commerce Apps</h3>
                <p class="text-gray-600 text-sm">Shopping apps with payment integration and inventory management</p>
            </div>

            <div class="text-center p-6 border border-gray-200 rounded-lg hover:shadow-lg transition-shadow">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Social Apps</h3>
                <p class="text-gray-600 text-sm">Social networking and communication platforms</p>
            </div>

            <div class="text-center p-6 border border-gray-200 rounded-lg hover:shadow-lg transition-shadow">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Business Apps</h3>
                <p class="text-gray-600 text-sm">Enterprise solutions and productivity applications</p>
            </div>

            <div class="text-center p-6 border border-gray-200 rounded-lg hover:shadow-lg transition-shadow">
                <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Healthcare Apps</h3>
                <p class="text-gray-600 text-sm">Medical and wellness applications with secure data handling</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-purple-600 to-purple-700 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Build Your Mobile App?</h2>
        <p class="text-xl mb-8 max-w-3xl mx-auto">
            Transform your idea into a successful mobile application that users will love
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact') }}" class="bg-orange-500 text-white px-8 py-3 rounded-lg font-semibold hover:bg-orange-600 transition-colors">
                Discuss Your App Idea
            </a>
            <a href="tel:{{ config('company.contact.phone') }}" class="bg-white text-purple-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                Call {{ config('company.contact.phone') }}
            </a>
        </div>
    </div>
</section>
@endsection