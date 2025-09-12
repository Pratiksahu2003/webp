@extends('layouts.website')

@section('title', 'About Us - WEZOM')
@section('description', 'Learn about WEZOM - Your trusted IT partner with 24+ years of experience in software development.')

@section('content')
<!-- Hero Section -->
<section class="hero-gradient text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">About WEZOM</h1>
            <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto">
                Your trusted IT partner for over 24 years
            </p>
        </div>
    </div>
</section>

<!-- About Content -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Software Company WEZOM</h2>
                <p class="text-lg text-gray-600 mb-6">
                    Our objective is to develop a profitable and effective solution that helps clients to expand their businesses and overcome financial constraints. We are committed to exceptional service and utilizing all resources to bring the finest products & services.
                </p>
                <p class="text-lg text-gray-600 mb-8">
                    We drive your business progress with smart tech decisions tailored to a specific field. Our team of certified professionals brings years of field experience to every project.
                </p>
                <a href="{{ route('contact') }}" class="bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                    Get in Touch
                </a>
            </div>
            <div class="bg-gray-100 rounded-lg p-8">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Our Numbers</h3>
                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Experience</span>
                        <span class="text-2xl font-bold text-blue-600">25+ years</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Clients</span>
                        <span class="text-2xl font-bold text-blue-600">250+</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Team Members</span>
                        <span class="text-2xl font-bold text-blue-600">275+</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Projects Completed</span>
                        <span class="text-2xl font-bold text-blue-600">3,500+</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Why Choose Us?</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                We deliver exceptional results through our proven approach and expertise
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-4">ISO 27001-certified</h3>
                <p class="text-gray-600">IT designs that protect data and enable secure internal management</p>
            </div>
            
            <div class="text-center">
                <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-4">Agile Methodology</h3>
                <p class="text-gray-600">We follow agile project management principles for efficient delivery</p>
            </div>
            
            <div class="text-center">
                <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-4">Expert Team</h3>
                <p class="text-gray-600">275+ certified full-time professionals with field experience</p>
            </div>
        </div>
    </div>
</section>

<!-- Process Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">How We Work</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Our proven development process ensures successful project delivery
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="bg-blue-600 text-white w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">01</div>
                <h3 class="text-lg font-semibold mb-3">Discovery Phase</h3>
                <p class="text-gray-600">We analyze your requirements and create a detailed project roadmap</p>
            </div>
            
            <div class="text-center">
                <div class="bg-blue-600 text-white w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">02</div>
                <h3 class="text-lg font-semibold mb-3">UX/UI Design</h3>
                <p class="text-gray-600">Creating intuitive and engaging user experiences</p>
            </div>
            
            <div class="text-center">
                <div class="bg-blue-600 text-white w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">03</div>
                <h3 class="text-lg font-semibold mb-3">Development</h3>
                <p class="text-gray-600">Building robust solutions using cutting-edge technologies</p>
            </div>
            
            <div class="text-center">
                <div class="bg-blue-600 text-white w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">04</div>
                <h3 class="text-lg font-semibold mb-3">Launch & Support</h3>
                <p class="text-gray-600">Deploying your solution and providing ongoing support</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 hero-gradient text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Work With Us?</h2>
        <p class="text-xl mb-8 max-w-3xl mx-auto">
            Let's discuss your project and see how we can help you achieve your goals
        </p>
        <a href="{{ route('contact') }}" class="bg-yellow-400 text-gray-900 px-8 py-3 rounded-lg font-semibold hover:bg-yellow-300 transition-colors">
            Get Started Today
        </a>
    </div>
</section>
@endsection
