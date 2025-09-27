@extends('layouts.website')

@section('title', 'Web Development Services - ' . config('company.name'))
@section('description', 'Professional web development services including custom websites, web applications, e-commerce solutions, and responsive design by ' . config('company.name'))

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-blue-600 to-blue-700 text-white py-20 overflow-hidden">
    <!-- Background Video -->
    <video autoplay muted loop class="absolute inset-0 w-full h-full object-cover z-0">
        <source src="{{ asset('banner/common.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    
    <!-- Overlay -->
    <div class="absolute inset-0 bg-blue-900 bg-opacity-60 z-10"></div>
    
    <!-- Content -->
    <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">Web Development Services</h1>
            <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto">
                Build powerful, scalable, and user-friendly web applications that drive business growth
            </p>
            <a href="{{ route('contact') }}" class="bg-orange-500 text-white px-8 py-3 rounded-lg font-semibold hover:bg-orange-600 transition-colors">
                Start Your Project
            </a>
        </div>
    </div>
</section>

<!-- Services Overview -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Our Web Development Expertise</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                From simple websites to complex web applications, we deliver solutions that meet your business needs
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-gray-50 p-8 rounded-lg">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Custom Web Applications</h3>
                <p class="text-gray-600">Tailored web applications built with modern frameworks like Laravel, React, and Vue.js to meet your specific business requirements.</p>
            </div>

            <div class="bg-gray-50 p-8 rounded-lg">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">E-commerce Solutions</h3>
                <p class="text-gray-600">Complete e-commerce platforms with payment integration, inventory management, and user-friendly shopping experiences.</p>
            </div>

            <div class="bg-gray-50 p-8 rounded-lg">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Responsive Design</h3>
                <p class="text-gray-600">Mobile-first responsive websites that provide optimal viewing experience across all devices and screen sizes.</p>
            </div>

            <div class="bg-gray-50 p-8 rounded-lg">
                <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Performance Optimization</h3>
                <p class="text-gray-600">Fast-loading websites optimized for search engines and user experience with advanced caching and optimization techniques.</p>
            </div>

            <div class="bg-gray-50 p-8 rounded-lg">
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Security & Maintenance</h3>
                <p class="text-gray-600">Secure web applications with regular updates, security patches, and ongoing maintenance support.</p>
            </div>

            <div class="bg-gray-50 p-8 rounded-lg">
                <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">API Integration</h3>
                <p class="text-gray-600">Seamless integration with third-party APIs, payment gateways, and external services to enhance functionality.</p>
            </div>
        </div>
    </div>
</section>

<!-- Technologies -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Technologies We Use</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                We leverage cutting-edge technologies to build robust and scalable web solutions
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8">
            <div class="text-center">
                <div class="bg-white p-4 rounded-lg shadow-sm mb-4">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-plain.svg" alt="Laravel" class="w-12 h-12 mx-auto">
                </div>
                <p class="font-medium text-gray-900">Laravel</p>
            </div>
            <div class="text-center">
                <div class="bg-white p-4 rounded-lg shadow-sm mb-4">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/react/react-original.svg" alt="React" class="w-12 h-12 mx-auto">
                </div>
                <p class="font-medium text-gray-900">React</p>
            </div>
            <div class="text-center">
                <div class="bg-white p-4 rounded-lg shadow-sm mb-4">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/vuejs/vuejs-original.svg" alt="Vue.js" class="w-12 h-12 mx-auto">
                </div>
                <p class="font-medium text-gray-900">Vue.js</p>
            </div>
            <div class="text-center">
                <div class="bg-white p-4 rounded-lg shadow-sm mb-4">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/nodejs/nodejs-original.svg" alt="Node.js" class="w-12 h-12 mx-auto">
                </div>
                <p class="font-medium text-gray-900">Node.js</p>
            </div>
            <div class="text-center">
                <div class="bg-white p-4 rounded-lg shadow-sm mb-4">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" alt="PHP" class="w-12 h-12 mx-auto">
                </div>
                <p class="font-medium text-gray-900">PHP</p>
            </div>
            <div class="text-center">
                <div class="bg-white p-4 rounded-lg shadow-sm mb-4">
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg" alt="MySQL" class="w-12 h-12 mx-auto">
                </div>
                <p class="font-medium text-gray-900">MySQL</p>
            </div>
        </div>
    </div>
</section>

<!-- Process -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Our Development Process</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                A proven methodology that ensures successful project delivery
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-2xl font-bold text-blue-600">1</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Discovery & Planning</h3>
                <p class="text-gray-600">We analyze your requirements, define project scope, and create a detailed development roadmap.</p>
            </div>

            <div class="text-center">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-2xl font-bold text-green-600">2</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Design & Prototyping</h3>
                <p class="text-gray-600">Create wireframes, mockups, and interactive prototypes to visualize the final product.</p>
            </div>

            <div class="text-center">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-2xl font-bold text-purple-600">3</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Development & Testing</h3>
                <p class="text-gray-600">Build your web application using best practices with continuous testing and quality assurance.</p>
            </div>

            <div class="text-center">
                <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-2xl font-bold text-orange-600">4</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Launch & Support</h3>
                <p class="text-gray-600">Deploy your application and provide ongoing maintenance and support services.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-blue-600 to-blue-700 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Build Your Web Application?</h2>
        <p class="text-xl mb-8 max-w-3xl mx-auto">
            Let's discuss your project requirements and create a solution that drives your business forward
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact') }}" class="bg-orange-500 text-white px-8 py-3 rounded-lg font-semibold hover:bg-orange-600 transition-colors">
                Get Free Consultation
            </a>
            <a href="tel:{{ config('company.contact.phone') }}" class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                Call {{ config('company.contact.phone') }}
            </a>
        </div>
    </div>
</section>
@endsection