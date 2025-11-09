<footer class="relative bg-white overflow-hidden border-t border-gray-100">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0">
        <div class="absolute top-0 left-0 w-96 h-96 bg-orange-50 rounded-full blur-3xl opacity-50"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-orange-100 rounded-full blur-3xl opacity-30"></div>
    </div>
    
    <!-- Top Accent Line -->
    <div class="relative h-px bg-gradient-to-r from-transparent via-orange-200 to-transparent"></div>
    
    <!-- Main Footer Content -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        
        <!-- Top Section: Logo & Stats -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 mb-12">
            <!-- Left: Logo & Description -->
            <div class="lg:col-span-5 space-y-4">
                <a href="{{ route('home') }}" class="inline-block">
                    <img src="{{ asset('logo/logo.png') }}" alt="{{ config('company.name') }} Logo" class="h-12 w-auto vantroz-logo mb-4">
                </a>
                <p class="text-gray-600 leading-relaxed text-sm max-w-md">
                    {{ config('company.name') }} is your trusted IT partner driving business growth. We specialize in custom software development, web applications, mobile apps, and digital transformation solutions.
                </p>
                
                <!-- Social Media Icons -->
                <div class="flex items-center space-x-2 pt-2">
                    <a href="{{ config('company.social.linkedin') }}" target="_blank" rel="noopener noreferrer" aria-label="Follow us on LinkedIn" class="group w-10 h-10 bg-gray-50 border border-gray-200 rounded-lg flex items-center justify-center hover:bg-orange-500 hover:border-orange-500 transition-all duration-300 hover:scale-110 hover:shadow-lg">
                        <svg class="w-5 h-5 text-gray-600 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                        </svg>
                    </a>
                    <a href="{{ config('company.social.twitter') }}" target="_blank" rel="noopener noreferrer" aria-label="Follow us on X (Twitter)" class="group w-11 h-11 bg-gray-50 border border-gray-200 rounded-xl flex items-center justify-center hover:bg-orange-500 hover:border-orange-500 transition-all duration-300 hover:scale-110 hover:shadow-lg">
                        <svg class="w-5 h-5 text-gray-600 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                        </svg>
                    </a>
                    <a href="{{ config('company.social.facebook') }}" target="_blank" rel="noopener noreferrer" aria-label="Follow us on Facebook" class="group w-11 h-11 bg-gray-50 border border-gray-200 rounded-xl flex items-center justify-center hover:bg-orange-500 hover:border-orange-500 transition-all duration-300 hover:scale-110 hover:shadow-lg">
                        <svg class="w-5 h-5 text-gray-600 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>
                    <a href="{{ config('company.social.instagram') }}" target="_blank" rel="noopener noreferrer" aria-label="Follow us on Instagram" class="group w-11 h-11 bg-gray-50 border border-gray-200 rounded-xl flex items-center justify-center hover:bg-orange-500 hover:border-orange-500 transition-all duration-300 hover:scale-110 hover:shadow-lg">
                        <svg class="w-5 h-5 text-gray-600 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>
                </div>
            </div>
            
            <!-- Right: Stats Cards -->
            <div class="lg:col-span-7">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                    <div class="group relative bg-gradient-to-br from-orange-50 to-white border border-orange-100 rounded-xl p-4 hover:border-orange-300 hover:shadow-md transition-all duration-300 hover:-translate-y-0.5">
                        <div class="absolute inset-0 bg-gradient-to-br from-orange-100/50 to-transparent rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <div class="relative text-center">
                            <div class="text-3xl font-black bg-gradient-to-r from-orange-500 to-orange-600 bg-clip-text text-transparent mb-1">24+</div>
                            <div class="text-gray-600 text-xs font-semibold">Years Experience</div>
                        </div>
                    </div>
                    <div class="group relative bg-gradient-to-br from-orange-50 to-white border border-orange-100 rounded-xl p-4 hover:border-orange-300 hover:shadow-md transition-all duration-300 hover:-translate-y-0.5">
                        <div class="absolute inset-0 bg-gradient-to-br from-orange-100/50 to-transparent rounded-xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <div class="relative text-center">
                            <div class="text-3xl font-black bg-gradient-to-r from-orange-500 to-orange-600 bg-clip-text text-transparent mb-1">3500+</div>
                            <div class="text-gray-600 text-xs font-semibold">Projects</div>
                        </div>
                    </div>
                    <div class="group relative bg-gradient-to-br from-orange-50 to-white border border-orange-100 rounded-xl p-4 hover:border-orange-300 hover:shadow-md transition-all duration-300 hover:-translate-y-0.5">
                        <div class="absolute inset-0 bg-gradient-to-br from-orange-100/50 to-transparent rounded-xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <div class="relative text-center">
                            <div class="text-3xl font-black bg-gradient-to-r from-orange-500 to-orange-600 bg-clip-text text-transparent mb-1">250+</div>
                            <div class="text-gray-600 text-xs font-semibold">Developers</div>
                        </div>
                    </div>
                    <div class="group relative bg-gradient-to-br from-orange-50 to-white border border-orange-100 rounded-xl p-4 hover:border-orange-300 hover:shadow-md transition-all duration-300 hover:-translate-y-0.5">
                        <div class="absolute inset-0 bg-gradient-to-br from-orange-100/50 to-transparent rounded-xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <div class="relative text-center">
                            <div class="text-3xl font-black bg-gradient-to-r from-orange-500 to-orange-600 bg-clip-text text-transparent mb-1">98%</div>
                            <div class="text-gray-600 text-xs font-semibold">Satisfaction</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Main Links Grid -->
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6 mb-10">
            <!-- Services -->
            <div class="space-y-3">
                <h3 class="text-gray-900 font-bold text-base mb-3 relative">
                    <span class="relative z-10">Services</span>
                    <span class="absolute bottom-0 left-0 w-10 h-0.5 bg-gradient-to-r from-orange-500 to-transparent"></span>
                </h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('services.custom-software') }}" class="text-gray-600 hover:text-orange-500 transition-colors text-sm flex items-center group">
                        <span class="w-1.5 h-1.5 bg-gray-300 rounded-full mr-2 group-hover:bg-orange-500 transition-colors"></span>
                        Custom Software
                    </a></li>
                    <li><a href="{{ route('services.web-development') }}" class="text-gray-600 hover:text-orange-500 transition-colors text-sm flex items-center group">
                        <span class="w-1.5 h-1.5 bg-gray-300 rounded-full mr-2 group-hover:bg-orange-500 transition-colors"></span>
                        Web Development
                    </a></li>
                    <li><a href="{{ route('services.mobile-development') }}" class="text-gray-600 hover:text-orange-500 transition-colors text-sm flex items-center group">
                        <span class="w-1.5 h-1.5 bg-gray-300 rounded-full mr-2 group-hover:bg-orange-500 transition-colors"></span>
                        Mobile Apps
                    </a></li>
                    <li><a href="{{ route('services.data-science') }}" class="text-gray-600 hover:text-orange-500 transition-colors text-sm flex items-center group">
                        <span class="w-1.5 h-1.5 bg-gray-300 rounded-full mr-2 group-hover:bg-orange-500 transition-colors"></span>
                        Data Science & AI
                    </a></li>
                    <li><a href="{{ route('services.qa-testing') }}" class="text-gray-600 hover:text-orange-500 transition-colors text-sm flex items-center group">
                        <span class="w-1.5 h-1.5 bg-gray-300 rounded-full mr-2 group-hover:bg-orange-500 transition-colors"></span>
                        QA & Testing
                    </a></li>
                    <li><a href="{{ route('services.ui-ux-design') }}" class="text-gray-600 hover:text-orange-500 transition-colors text-sm flex items-center group">
                        <span class="w-1.5 h-1.5 bg-gray-300 rounded-full mr-2 group-hover:bg-orange-500 transition-colors"></span>
                        UX/UI Design
                    </a></li>
                </ul>
            </div>
            
            <!-- Solutions -->
            <div class="space-y-3">
                <h3 class="text-gray-900 font-bold text-base mb-3 relative">
                    <span class="relative z-10">Solutions</span>
                    <span class="absolute bottom-0 left-0 w-10 h-0.5 bg-gradient-to-r from-orange-500 to-transparent"></span>
                </h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('industries.healthcare') }}" class="text-gray-600 hover:text-orange-500 transition-colors text-sm flex items-center group">
                        <span class="w-1.5 h-1.5 bg-gray-300 rounded-full mr-2 group-hover:bg-orange-500 transition-colors"></span>
                        Healthcare
                    </a></li>
                    <li><a href="{{ route('industries.fintech') }}" class="text-gray-600 hover:text-orange-500 transition-colors text-sm flex items-center group">
                        <span class="w-1.5 h-1.5 bg-gray-300 rounded-full mr-2 group-hover:bg-orange-500 transition-colors"></span>
                        FinTech
                    </a></li>
                    <li><a href="{{ route('industries.ecommerce') }}" class="text-gray-600 hover:text-orange-500 transition-colors text-sm flex items-center group">
                        <span class="w-1.5 h-1.5 bg-gray-300 rounded-full mr-2 group-hover:bg-orange-500 transition-colors"></span>
                        eCommerce
                    </a></li>
                    <li><a href="{{ route('industries.logistics') }}" class="text-gray-600 hover:text-orange-500 transition-colors text-sm flex items-center group">
                        <span class="w-1.5 h-1.5 bg-gray-300 rounded-full mr-2 group-hover:bg-orange-500 transition-colors"></span>
                        Logistics
                    </a></li>
                    <li><a href="#" class="text-gray-600 hover:text-orange-500 transition-colors text-sm flex items-center group">
                        <span class="w-1.5 h-1.5 bg-gray-300 rounded-full mr-2 group-hover:bg-orange-500 transition-colors"></span>
                        Enterprise
                    </a></li>
                    <li><a href="#" class="text-gray-600 hover:text-orange-500 transition-colors text-sm flex items-center group">
                        <span class="w-1.5 h-1.5 bg-gray-300 rounded-full mr-2 group-hover:bg-orange-500 transition-colors"></span>
                        Cloud Solutions
                    </a></li>
                </ul>
            </div>
            
            <!-- Company -->
            <div class="space-y-3">
                <h3 class="text-gray-900 font-bold text-base mb-3 relative">
                    <span class="relative z-10">Company</span>
                    <span class="absolute bottom-0 left-0 w-10 h-0.5 bg-gradient-to-r from-orange-500 to-transparent"></span>
                </h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('about') }}" class="text-gray-600 hover:text-orange-500 transition-colors text-sm flex items-center group">
                        <span class="w-1.5 h-1.5 bg-gray-300 rounded-full mr-2 group-hover:bg-orange-500 transition-colors"></span>
                        About Us
                    </a></li>
                    <li><a href="{{ route('case-studies') }}" class="text-gray-600 hover:text-orange-500 transition-colors text-sm flex items-center group">
                        <span class="w-1.5 h-1.5 bg-gray-300 rounded-full mr-2 group-hover:bg-orange-500 transition-colors"></span>
                        Case Studies
                    </a></li>
                    <li><a href="{{ route('blog.index') }}" class="text-gray-600 hover:text-orange-500 transition-colors text-sm flex items-center group">
                        <span class="w-1.5 h-1.5 bg-gray-300 rounded-full mr-2 group-hover:bg-orange-500 transition-colors"></span>
                        Blog & Insights
                    </a></li>
                    <li><a href="{{ route('careers') }}" class="text-gray-600 hover:text-orange-500 transition-colors text-sm flex items-center group">
                        <span class="w-1.5 h-1.5 bg-gray-300 rounded-full mr-2 group-hover:bg-orange-500 transition-colors"></span>
                        Careers
                    </a></li>
                    <li><a href="{{ route('contact') }}" class="text-gray-600 hover:text-orange-500 transition-colors text-sm flex items-center group">
                        <span class="w-1.5 h-1.5 bg-gray-300 rounded-full mr-2 group-hover:bg-orange-500 transition-colors"></span>
                        Contact Us
                    </a></li>
                    <li><a href="{{ route('portfolio') }}" class="text-gray-600 hover:text-orange-500 transition-colors text-sm flex items-center group">
                        <span class="w-1.5 h-1.5 bg-gray-300 rounded-full mr-2 group-hover:bg-orange-500 transition-colors"></span>
                        Portfolio
                    </a></li>
                </ul>
            </div>
            
            <!-- Contact -->
            <div class="space-y-3">
                <h3 class="text-gray-900 font-bold text-base mb-3 relative">
                    <span class="relative z-10">Contact</span>
                    <span class="absolute bottom-0 left-0 w-10 h-0.5 bg-gradient-to-r from-orange-500 to-transparent"></span>
                </h3>
                <ul class="space-y-2.5">
                    <li class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-orange-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <div class="text-gray-600 text-sm leading-relaxed">
                            <p>{{ config('company.address.primary.street') }}</p>
                            <p>{{ config('company.address.primary.city') }}, {{ config('company.address.primary.state') }}</p>
                            <p>{{ config('company.address.primary.country') }} {{ config('company.address.primary.zip') }}</p>
                        </div>
                    </li>
                    <li class="flex items-center space-x-3">
                        <svg class="w-5 h-5 text-orange-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <a href="tel:{{ config('company.contact.phone') }}" class="text-gray-600 hover:text-orange-500 transition-colors text-sm font-medium">
                            {{ config('company.contact.phone') }}
                        </a>
                    </li>
                    <li class="flex items-center space-x-3">
                        <svg class="w-5 h-5 text-orange-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <a href="mailto:{{ config('company.contact.email') }}" class="text-gray-600 hover:text-orange-500 transition-colors text-sm font-medium">
                            {{ config('company.contact.email') }}
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- Certifications -->
            <div class="space-y-3">
                <h3 class="text-gray-900 font-bold text-base mb-3 relative">
                    <span class="relative z-10">Certifications</span>
                    <span class="absolute bottom-0 left-0 w-10 h-0.5 bg-gradient-to-r from-orange-500 to-transparent"></span>
                </h3>
                <div class="grid grid-cols-2 gap-2">
                    <div class="bg-orange-50 border border-orange-100 rounded-lg p-2 text-center hover:border-orange-300 hover:shadow-sm transition-all">
                        <div class="text-orange-600 font-bold text-xs mb-0.5">ISO 27001</div>
                        <div class="text-gray-500 text-xs">Security</div>
                    </div>
                    <div class="bg-orange-50 border border-orange-100 rounded-lg p-2 text-center hover:border-orange-300 hover:shadow-sm transition-all">
                        <div class="text-orange-600 font-bold text-xs mb-0.5">AWS</div>
                        <div class="text-gray-500 text-xs">Partner</div>
                    </div>
                    <div class="bg-orange-50 border border-orange-100 rounded-lg p-2 text-center hover:border-orange-300 hover:shadow-sm transition-all">
                        <div class="text-orange-600 font-bold text-xs mb-0.5">Microsoft</div>
                        <div class="text-gray-500 text-xs">Gold</div>
                    </div>
                    <div class="bg-orange-50 border border-orange-100 rounded-lg p-2 text-center hover:border-orange-300 hover:shadow-sm transition-all">
                        <div class="text-orange-600 font-bold text-xs mb-0.5">Inc 5000</div>
                        <div class="text-gray-500 text-xs">2024</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bottom Bar -->
    <div class="relative border-t border-gray-200 bg-gray-50/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5 ios-safe-area-padding">
            <div class="flex flex-col lg:flex-row justify-between items-center space-y-4 lg:space-y-0 relative z-20">
                
                <!-- Left: Copyright -->
                <div class="text-center lg:text-left">
                    <p class="text-gray-600 text-sm">
                        © {{ date('Y') }} <span class="text-gray-900 font-semibold">{{ config('company.name') }}</span>. All rights reserved.
                    </p>
                    <p class="text-gray-500 text-xs mt-1">
                        Proudly serving clients worldwide since 2000
                    </p>
                </div>
                
                <!-- Middle: Quick Actions -->
                <div class="flex items-center space-x-6 relative z-10">
                    <button onclick="scrollToTop()" class="group flex items-center space-x-2 text-gray-600 hover:text-orange-500 transition-colors ios-touch-target relative z-10 px-3 py-2">
                        <svg class="w-4 h-4 group-hover:-translate-y-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
                        </svg>
                        <span class="text-sm font-medium">Back to Top</span>
                    </button>
                    
                    <a href="{{ route('contact') }}" class="group flex items-center space-x-2 text-gray-600 hover:text-orange-500 transition-colors ios-touch-target relative z-10 px-3 py-2">
                        <svg class="w-4 h-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                        <span class="text-sm font-medium">Get Quote</span>
                    </a>
                </div>
                
                <!-- Right: Legal Links -->
                <div class="flex flex-wrap justify-center lg:justify-end gap-4 lg:gap-6 text-sm relative z-10">
                    <a href="{{ route('privacy-policy') }}" target="_blank" class="text-gray-600 hover:text-orange-500 transition-colors ios-touch-target relative z-10 px-2 py-2 inline-block">Privacy Policy</a>
                    <a href="{{ route('terms-conditions') }}" target="_blank" class="text-gray-600 hover:text-orange-500 transition-colors ios-touch-target relative z-10 px-2 py-2 inline-block">Terms & Conditions</a>
                    <a href="{{ route('legal.cookie-policy') }}" target="_blank" class="text-gray-600 hover:text-orange-500 transition-colors ios-touch-target relative z-10 px-2 py-2 inline-block">Cookie Policy</a>
                    <a href="{{ route('sitemap') }}" target="_blank" class="text-gray-600 hover:text-orange-500 transition-colors ios-touch-target relative z-10 px-2 py-2 inline-block mr-20 lg:mr-0">Sitemap</a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Floating Chat Icon -->
    <div class="fixed bottom-6 right-6 z-40" style="margin-bottom: env(safe-area-inset-bottom, 0);">
        <button onclick="openWhatsApp()" class="group relative w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-full flex items-center justify-center shadow-2xl hover:shadow-orange-500/25 transition-all duration-300 transform hover:scale-110 ios-touch-target ios-hardware-acceleration">
            <div class="absolute inset-0 bg-gradient-to-br from-orange-600 to-orange-700 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            <svg class="w-7 h-7 text-white relative group-hover:scale-110 transition-transform duration-300" fill="currentColor" viewBox="0 0 24 24">
                <path d="M20 2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h4l4 4 4-4h4c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2 12H6v-2h12v2zm0-3H6V9h12v2zm0-3H6V6h12v2z"/>
            </svg>
            
            <!-- Notification Badge -->
            <div class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 rounded-full flex items-center justify-center">
                <span class="text-white text-xs font-bold">1</span>
            </div>
        </button>
        
        <!-- Chat Tooltip -->
        <div class="absolute bottom-20 right-0 bg-gray-900 text-white px-4 py-2 rounded-lg shadow-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">
            <span class="text-sm">Chat with us on WhatsApp!</span>
            <div class="absolute bottom-0 right-4 w-0 h-0 border-l-4 border-r-4 border-t-4 border-transparent border-t-gray-900"></div>
        </div>
    </div>
</footer>

<script>
function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

function openWhatsApp() {
    const phoneNumber = '{{ config("company.contact.phone") }}';
    const cleanPhone = phoneNumber.replace(/\D/g, '');
    const message = encodeURIComponent('Hello! I would like to get in touch with {{ config("company.name") }}. I found your website and I\'m interested in your services.');
    const whatsappUrl = `https://wa.me/${cleanPhone}?text=${message}`;
    window.open(whatsappUrl, '_blank');
}
</script>
