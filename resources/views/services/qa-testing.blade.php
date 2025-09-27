@extends('layouts.website')

@section('title', 'QA & Software Testing Services - ' . config('company.name'))
@section('description', 'Comprehensive quality assurance and software testing services to ensure your applications are bug-free and perform optimally by ' . config('company.name'))

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-emerald-600 to-emerald-700 text-white py-20 overflow-hidden">
    <!-- Background Video -->
    <video autoplay muted loop class="absolute inset-0 w-full h-full object-cover z-0">
        <source src="{{ asset('banner/common.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    
    <!-- Overlay -->
    <div class="absolute inset-0 bg-emerald-900 bg-opacity-60 z-10"></div>
    
    <!-- Content -->
    <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">QA & Software Testing</h1>
            <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto">
                Ensure your software is reliable, secure, and performs flawlessly with our comprehensive testing services
            </p>
            <a href="{{ route('contact') }}" class="bg-orange-500 text-white px-8 py-3 rounded-lg font-semibold hover:bg-orange-600 transition-colors">
                Get Testing Services
            </a>
        </div>
    </div>
</section>

<!-- Services Overview -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Testing Services</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Comprehensive quality assurance to deliver bug-free, high-performance software
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-gray-50 p-8 rounded-lg">
                <div class="w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Functional Testing</h3>
                <p class="text-gray-600">Comprehensive testing of all software functions to ensure they work as expected and meet requirements.</p>
            </div>

            <div class="bg-gray-50 p-8 rounded-lg">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Performance Testing</h3>
                <p class="text-gray-600">Load, stress, and performance testing to ensure your application handles high traffic and performs optimally.</p>
            </div>

            <div class="bg-gray-50 p-8 rounded-lg">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Security Testing</h3>
                <p class="text-gray-600">Vulnerability assessment and penetration testing to identify and fix security weaknesses.</p>
            </div>

            <div class="bg-gray-50 p-8 rounded-lg">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Mobile Testing</h3>
                <p class="text-gray-600">Specialized testing for mobile applications across different devices, platforms, and operating systems.</p>
            </div>

            <div class="bg-gray-50 p-8 rounded-lg">
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Automation Testing</h3>
                <p class="text-gray-600">Automated test scripts and frameworks for efficient regression testing and continuous integration.</p>
            </div>

            <div class="bg-gray-50 p-8 rounded-lg">
                <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Usability Testing</h3>
                <p class="text-gray-600">User experience testing to ensure your application is intuitive and user-friendly.</p>
            </div>
        </div>
    </div>
</section>

<!-- Testing Process -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Our Testing Process</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                A systematic approach to ensure comprehensive quality assurance
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="w-16 h-16 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-2xl font-bold text-emerald-600">1</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Test Planning</h3>
                <p class="text-gray-600">Analyze requirements and create comprehensive test plans and strategies.</p>
            </div>

            <div class="text-center">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-2xl font-bold text-blue-600">2</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Test Design</h3>
                <p class="text-gray-600">Design test cases and scenarios covering all functional and non-functional requirements.</p>
            </div>

            <div class="text-center">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-2xl font-bold text-purple-600">3</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Test Execution</h3>
                <p class="text-gray-600">Execute test cases systematically and document all findings and defects.</p>
            </div>

            <div class="text-center">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-2xl font-bold text-green-600">4</span>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Reporting & Analysis</h3>
                <p class="text-gray-600">Provide detailed reports and recommendations for quality improvement.</p>
            </div>
        </div>
    </div>
</section>

<!-- Testing Tools -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Testing Tools & Technologies</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                We use industry-leading tools for comprehensive testing coverage
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8">
            <div class="text-center">
                <div class="bg-gray-50 p-4 rounded-lg shadow-sm mb-4">
                    <div class="w-12 h-12 bg-emerald-100 rounded-lg flex items-center justify-center mx-auto">
                        <span class="text-emerald-600 font-bold text-sm">Selenium</span>
                    </div>
                </div>
                <p class="font-medium text-gray-900">Selenium</p>
            </div>
            <div class="text-center">
                <div class="bg-gray-50 p-4 rounded-lg shadow-sm mb-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mx-auto">
                        <span class="text-blue-600 font-bold text-sm">Jest</span>
                    </div>
                </div>
                <p class="font-medium text-gray-900">Jest</p>
            </div>
            <div class="text-center">
                <div class="bg-gray-50 p-4 rounded-lg shadow-sm mb-4">
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mx-auto">
                        <span class="text-purple-600 font-bold text-sm">Cypress</span>
                    </div>
                </div>
                <p class="font-medium text-gray-900">Cypress</p>
            </div>
            <div class="text-center">
                <div class="bg-gray-50 p-4 rounded-lg shadow-sm mb-4">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mx-auto">
                        <span class="text-green-600 font-bold text-sm">JMeter</span>
                    </div>
                </div>
                <p class="font-medium text-gray-900">JMeter</p>
            </div>
            <div class="text-center">
                <div class="bg-gray-50 p-4 rounded-lg shadow-sm mb-4">
                    <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center mx-auto">
                        <span class="text-yellow-600 font-bold text-sm">Postman</span>
                    </div>
                </div>
                <p class="font-medium text-gray-900">Postman</p>
            </div>
            <div class="text-center">
                <div class="bg-gray-50 p-4 rounded-lg shadow-sm mb-4">
                    <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mx-auto">
                        <span class="text-red-600 font-bold text-sm">OWASP</span>
                    </div>
                </div>
                <p class="font-medium text-gray-900">OWASP ZAP</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-emerald-600 to-emerald-700 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Ensure Quality Software?</h2>
        <p class="text-xl mb-8 max-w-3xl mx-auto">
            Let's help you deliver bug-free, high-performance software that exceeds user expectations
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact') }}" class="bg-orange-500 text-white px-8 py-3 rounded-lg font-semibold hover:bg-orange-600 transition-colors">
                Get Testing Services
            </a>
            <a href="tel:{{ config('company.contact.phone') }}" class="bg-white text-emerald-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                Call {{ config('company.contact.phone') }}
            </a>
        </div>
    </div>
</section>
@endsection