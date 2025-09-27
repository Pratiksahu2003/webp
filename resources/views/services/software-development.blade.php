@extends('layouts.website')

@section('title', 'Software Development Services - Vantroz Technology Private Limited')
@section('description', 'Professional software development services including custom applications, enterprise solutions, and system integration by Vantroz Technology Private Limited.')

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
            <h1 class="text-4xl md:text-6xl font-bold mb-6">Software Development Services</h1>
            <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto">
                Comprehensive software development solutions tailored to your business needs
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
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Software Development Services</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                We provide end-to-end software development services to help businesses achieve their digital transformation goals.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Custom Software Development -->
            <div class="bg-white p-8 rounded-lg shadow-lg border border-gray-200 hover:shadow-xl transition-shadow">
                <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Custom Software Development</h3>
                <p class="text-gray-600 mb-6">Tailored software solutions designed specifically for your unique business requirements and workflows.</p>
                <a href="{{ route('services.custom-software') }}" class="text-blue-600 font-semibold hover:text-blue-700">Learn More →</a>
            </div>

            <!-- Web Development -->
            <div class="bg-white p-8 rounded-lg shadow-lg border border-gray-200 hover:shadow-xl transition-shadow">
                <div class="w-16 h-16 bg-green-100 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9v-9m0-9v9"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Web Development</h3>
                <p class="text-gray-600 mb-6">Modern, responsive web applications built with the latest technologies and best practices.</p>
                <a href="{{ route('services.web-development') }}" class="text-green-600 font-semibold hover:text-green-700">Learn More →</a>
            </div>

            <!-- Mobile Development -->
            <div class="bg-white p-8 rounded-lg shadow-lg border border-gray-200 hover:shadow-xl transition-shadow">
                <div class="w-16 h-16 bg-purple-100 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a1 1 0 001-1V4a1 1 0 00-1-1H8a1 1 0 00-1 1v16a1 1 0 001 1z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Mobile App Development</h3>
                <p class="text-gray-600 mb-6">Native and cross-platform mobile applications for iOS and Android devices.</p>
                <a href="{{ route('services.mobile-development') }}" class="text-purple-600 font-semibold hover:text-purple-700">Learn More →</a>
            </div>

            <!-- Data Science & AI -->
            <div class="bg-white p-8 rounded-lg shadow-lg border border-gray-200 hover:shadow-xl transition-shadow">
                <div class="w-16 h-16 bg-teal-100 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Data Science & AI</h3>
                <p class="text-gray-600 mb-6">Advanced analytics, machine learning, and AI solutions to unlock insights from your data.</p>
                <a href="{{ route('services.data-science') }}" class="text-teal-600 font-semibold hover:text-teal-700">Learn More →</a>
            </div>

            <!-- UI/UX Design -->
            <div class="bg-white p-8 rounded-lg shadow-lg border border-gray-200 hover:shadow-xl transition-shadow">
                <div class="w-16 h-16 bg-pink-100 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">UI/UX Design</h3>
                <p class="text-gray-600 mb-6">User-centered design solutions that create exceptional digital experiences.</p>
                <a href="{{ route('services.ui-ux-design') }}" class="text-pink-600 font-semibold hover:text-pink-700">Learn More →</a>
            </div>

            <!-- QA & Testing -->
            <div class="bg-white p-8 rounded-lg shadow-lg border border-gray-200 hover:shadow-xl transition-shadow">
                <div class="w-16 h-16 bg-emerald-100 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">QA & Testing</h3>
                <p class="text-gray-600 mb-6">Comprehensive testing services to ensure your software is reliable and bug-free.</p>
                <a href="{{ route('services.qa-testing') }}" class="text-emerald-600 font-semibold hover:text-emerald-700">Learn More →</a>
            </div>
        </div>
    </div>
</section>

<!-- Development Process -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Development Process</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                We follow a proven development methodology to ensure successful project delivery.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-white font-bold text-xl">1</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Discovery</h3>
                <p class="text-gray-600">Understanding your requirements and business objectives.</p>
            </div>

            <div class="text-center">
                <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-white font-bold text-xl">2</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Planning</h3>
                <p class="text-gray-600">Creating detailed project plans and technical specifications.</p>
            </div>

            <div class="text-center">
                <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-white font-bold text-xl">3</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Development</h3>
                <p class="text-gray-600">Building your solution using agile development practices.</p>
            </div>

            <div class="text-center">
                <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-white font-bold text-xl">4</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Delivery</h3>
                <p class="text-gray-600">Testing, deployment, and ongoing support for your solution.</p>
            </div>
        </div>
    </div>
</section>

<!-- Technologies -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Technologies We Use</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                We leverage cutting-edge technologies to build robust and scalable software solutions.
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8">
            <div class="text-center">
                <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl font-bold text-gray-700">JS</span>
                </div>
                <p class="text-gray-600">JavaScript</p>
            </div>

            <div class="text-center">
                <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl font-bold text-gray-700">PY</span>
                </div>
                <p class="text-gray-600">Python</p>
            </div>

            <div class="text-center">
                <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl font-bold text-gray-700">PHP</span>
                </div>
                <p class="text-gray-600">PHP</p>
            </div>

            <div class="text-center">
                <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl font-bold text-gray-700">C#</span>
                </div>
                <p class="text-gray-600">.NET</p>
            </div>

            <div class="text-center">
                <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl font-bold text-gray-700">☁️</span>
                </div>
                <p class="text-gray-600">Cloud</p>
            </div>

            <div class="text-center">
                <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl font-bold text-gray-700">DB</span>
                </div>
                <p class="text-gray-600">Databases</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-blue-600">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Ready to Start Your Software Project?</h2>
        <p class="text-xl text-blue-100 mb-8 max-w-3xl mx-auto">
            Let's discuss your requirements and create a custom software solution that drives your business forward.
        </p>
        <a href="{{ route('contact') }}" class="bg-orange-500 text-white px-8 py-3 rounded-lg font-semibold hover:bg-orange-600 transition-colors">
            Get Started Today
        </a>
    </div>
</section>
@endsection