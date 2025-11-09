@extends('layouts.website')

@section('title', 'Sitemap - ' . config('company.name'))
@section('description', 'Navigate through all pages and sections of ' . config('company.name') . ' website with our comprehensive sitemap.')

@section('content')
<!-- Hero Section -->
<section class="relative py-20 bg-gradient-to-br from-gray-50 via-white to-orange-50">
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-20 right-20 w-72 h-72 bg-gradient-to-br from-orange-100/30 to-orange-100/30 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 left-20 w-96 h-96 bg-gradient-to-br from-orange-100/20 to-orange-100/20 rounded-full blur-3xl"></div>
    </div>
    
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                Website <span class="text-orange-600">Sitemap</span>
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                Find all pages and sections of {{ config('company.name') }} website organized for easy navigation.
            </p>
        </div>
    </div>
</section>

<!-- Sitemap Content -->
<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Main Pages -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Main Pages</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-gray-50 rounded-lg p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                        <svg class="w-6 h-6 text-orange-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        Home & Company
                    </h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-gray-600 hover:text-orange-600 transition-colors">Home</a></li>
                        <li><a href="{{ route('about') }}" class="text-gray-600 hover:text-orange-600 transition-colors">About Us</a></li>
                        <li><a href="{{ route('contact') }}" class="text-gray-600 hover:text-orange-600 transition-colors">Contact Us</a></li>
                        <li><a href="{{ route('careers') }}" class="text-gray-600 hover:text-orange-600 transition-colors">Careers</a></li>
                    </ul>
                </div>
                
                <div class="bg-gray-50 rounded-lg p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                        <svg class="w-6 h-6 text-orange-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                        </svg>
                        Services
                    </h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('services') }}" class="text-gray-600 hover:text-orange-600 transition-colors">All Services</a></li>
                        <li><a href="{{ route('services.custom-software') }}" class="text-gray-600 hover:text-orange-600 transition-colors">Custom Software</a></li>
                        <li><a href="{{ route('services.web-development') }}" class="text-gray-600 hover:text-orange-600 transition-colors">Web Development</a></li>
                        <li><a href="{{ route('services.mobile-development') }}" class="text-gray-600 hover:text-orange-600 transition-colors">Mobile Development</a></li>
                        <li><a href="{{ route('services.data-science') }}" class="text-gray-600 hover:text-orange-600 transition-colors">Data Science & AI</a></li>
                        <li><a href="{{ route('services.qa-testing') }}" class="text-gray-600 hover:text-orange-600 transition-colors">QA & Testing</a></li>
                        <li><a href="{{ route('services.ui-ux-design') }}" class="text-gray-600 hover:text-orange-600 transition-colors">UX/UI Design</a></li>
                    </ul>
                </div>
                
                <div class="bg-gray-50 rounded-lg p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                        <svg class="w-6 h-6 text-orange-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                        Industries
                    </h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('industries.healthcare') }}" class="text-gray-600 hover:text-orange-600 transition-colors">Healthcare</a></li>
                        <li><a href="{{ route('industries.fintech') }}" class="text-gray-600 hover:text-orange-600 transition-colors">FinTech</a></li>
                        <li><a href="{{ route('industries.ecommerce') }}" class="text-gray-600 hover:text-orange-600 transition-colors">eCommerce</a></li>
                        <li><a href="{{ route('industries.logistics') }}" class="text-gray-600 hover:text-orange-600 transition-colors">Logistics</a></li>
                        <li><a href="{{ route('industries.education') }}" class="text-gray-600 hover:text-orange-600 transition-colors">Education</a></li>
                        <li><a href="{{ route('industries.real-estate') }}" class="text-gray-600 hover:text-orange-600 transition-colors">Real Estate</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Portfolio & Case Studies -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Portfolio & Case Studies</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="bg-gray-50 rounded-lg p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                        <svg class="w-6 h-6 text-orange-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                        </svg>
                        Portfolio
                    </h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('portfolio') }}" class="text-gray-600 hover:text-orange-600 transition-colors">Our Portfolio</a></li>
                        <li><a href="{{ route('case-studies') }}" class="text-gray-600 hover:text-orange-600 transition-colors">Case Studies</a></li>
                        <li><a href="{{ route('technologies') }}" class="text-gray-600 hover:text-orange-600 transition-colors">Technologies</a></li>
                    </ul>
                </div>
                
                <div class="bg-gray-50 rounded-lg p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                        <svg class="w-6 h-6 text-orange-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                        </svg>
                        Blog & Resources
                    </h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('blog.index') }}" class="text-gray-600 hover:text-orange-600 transition-colors">Blog</a></li>
                        <li><a href="{{ route('blog.category', 'technology') }}" class="text-gray-600 hover:text-orange-600 transition-colors">Technology</a></li>
                        <li><a href="{{ route('blog.category', 'industry') }}" class="text-gray-600 hover:text-orange-600 transition-colors">Industry Insights</a></li>
                        <li><a href="{{ route('blog.category', 'development') }}" class="text-gray-600 hover:text-orange-600 transition-colors">Development</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Legal & Policy Pages -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Legal & Policy Pages</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-gray-50 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Privacy & Security</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('privacy-policy') }}" class="text-gray-600 hover:text-orange-600 transition-colors">Privacy Policy</a></li>
                        <li><a href="{{ route('legal.cookie-policy') }}" class="text-gray-600 hover:text-orange-600 transition-colors">Cookie Policy</a></li>
                    </ul>
                </div>
                
                <div class="bg-gray-50 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Terms & Conditions</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('terms-conditions') }}" class="text-gray-600 hover:text-orange-600 transition-colors">Terms & Conditions</a></li>
                        <li><a href="{{ route('refund-policy') }}" class="text-gray-600 hover:text-orange-600 transition-colors">Refund Policy</a></li>
                    </ul>
                </div>
                
                <div class="bg-gray-50 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Website Info</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('sitemap') }}" class="text-gray-600 hover:text-orange-600 transition-colors">Sitemap</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-orange-600 transition-colors">Accessibility</a></li>
                    </ul>
                </div>
                
                <div class="bg-gray-50 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Support</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('contact') }}" class="text-gray-600 hover:text-orange-600 transition-colors">Contact Support</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-orange-600 transition-colors">FAQ</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Quick Links -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Quick Links</h2>
            <div class="bg-gradient-to-r from-orange-50 to-orange-100 rounded-lg p-8">
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-orange-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Get Started</h3>
                        <p class="text-gray-600 text-sm mb-4">Ready to start your project?</p>
                        <a href="{{ route('contact') }}" class="inline-block bg-orange-500 text-white px-6 py-2 rounded-lg hover:bg-orange-600 transition-colors">
                            Contact Us
                        </a>
                    </div>
                    
                    <div class="text-center">
                        <div class="w-16 h-16 bg-orange-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Our Work</h3>
                        <p class="text-gray-600 text-sm mb-4">See our latest projects</p>
                        <a href="{{ route('portfolio') }}" class="inline-block bg-orange-500 text-white px-6 py-2 rounded-lg hover:bg-orange-600 transition-colors">
                            View Portfolio
                        </a>
                    </div>
                    
                    <div class="text-center">
                        <div class="w-16 h-16 bg-orange-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Learn More</h3>
                        <p class="text-gray-600 text-sm mb-4">Read our latest insights</p>
                        <a href="{{ route('blog.index') }}" class="inline-block bg-orange-500 text-white px-6 py-2 rounded-lg hover:bg-orange-600 transition-colors">
                            Read Blog
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
