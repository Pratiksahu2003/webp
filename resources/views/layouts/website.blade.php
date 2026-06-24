<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <!-- Enhanced iOS Viewport Meta Tag -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0, user-scalable=yes, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Enhanced iOS Safari Specific Meta Tags -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="{{ config('company.name') }}">
    <meta name="format-detection" content="telephone=no">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#ffffff">
    <meta name="apple-touch-fullscreen" content="yes">
    
    <!-- iOS Safari Touch Icons - Enhanced -->
    <link rel="apple-touch-icon" href="{{ asset('logo/logo.png') }}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('logo/logo.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('logo/logo.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('logo/logo.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('logo/logo.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('logo/logo.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('logo/logo.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('logo/logo.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('logo/logo.png') }}">
    <link rel="apple-touch-icon" sizes="167x167" href="{{ asset('logo/logo.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('logo/logo.png') }}">

    <title>@yield('title', config('company.name') . ' - IT Partner')</title>
    <meta name="description" content="@yield('description', config('company.name') . ' - ' . config('company.tagline') . ' for software development, web development, mobile app development, and more.')">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- VanTroZ UI System - CSS modules loaded via Vite -->
</head>

<body class="font-sans antialiased text-gray-900 bg-white ios-smooth-scroll">
    <!-- Clean Professional Navigation -->
    <nav id="navbar" class="fixed w-full top-0 z-50 bg-white border-b border-gray-200 transition-all duration-200 ios-fixed ios-hardware-acceleration">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center ios-safe-area-padding" style="padding-left: max(1rem, env(safe-area-inset-left)); padding-right: max(1rem, env(safe-area-inset-right));">
            <div class="flex justify-between items-center h-16 w-full">
                <!-- Clean Logo Section -->
                <div class="flex items-center flex-shrink-0 justify-start">
                    <a href="{{ route('home') }}" class="flex items-center">
                        <img src="{{ asset('logo/logo.png') }}" alt="{{ config('company.name') }} Logo" class="h-8 w-auto mr-3">
                    </a>
                </div>

                <!-- Clean Desktop Navigation -->
                <div class="hidden xl:flex items-center space-x-8 flex-1 justify-center">
                    @if(isset($catalogServices) && $catalogServices->isNotEmpty())
                    <!-- Dynamic Services Mega Menu -->
                    <div class="relative group">
                        <button type="button" class="navbar-link px-3 py-2 text-base font-medium flex items-center transition-colors duration-200 hover:text-orange-600">
                            Services
                            <svg class="w-3 h-3 ml-1 transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div class="absolute top-full left-1/2 -translate-x-1/2 w-[min(90vw,48rem)] opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 z-50 pointer-events-none group-hover:pointer-events-auto">
                            <div class="bg-white rounded-xl shadow-xl border border-gray-200 py-5 px-6 mt-2">
                                <div class="grid grid-cols-2 lg:grid-cols-3 gap-6">
                                    @foreach($catalogServices as $service)
                                    <div>
                                        <a href="{{ route('catalog.services.show', $service) }}" class="font-semibold text-gray-900 hover:text-orange-600 transition-colors">{{ $service->title }}</a>
                                        <div class="mt-2 space-y-1.5">
                                            @foreach($service->activeSubServices as $subService)
                                            <a href="{{ route('services.sub-service', [$service, $subService]) }}" class="block text-sm text-gray-600 hover:text-orange-500 transition-colors">{{ $subService->title }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="border-t border-gray-100 mt-4 pt-3">
                                    <a href="{{ route('catalog.services') }}" class="text-orange-600 font-semibold text-sm hover:text-orange-700">View All Services →</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if(isset($webDevelopmentService) && $webDevelopmentService->activeSubServices->isNotEmpty())
                    <!-- Web Development Menu -->
                    <div class="relative group">
                        <button type="button" class="navbar-link px-3 py-2 text-base font-medium flex items-center transition-colors duration-200 hover:text-orange-600 whitespace-nowrap">
                            Web Development
                            <svg class="w-3 h-3 ml-1 transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div class="absolute top-full left-0 w-64 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 z-50 pointer-events-none group-hover:pointer-events-auto">
                            <div class="bg-white rounded-xl shadow-xl border border-gray-200 py-4 mt-2">
                                <div class="px-4 pb-2 mb-2 border-b border-gray-100">
                                    <a href="{{ route('catalog.services.show', $webDevelopmentService) }}" class="text-xs font-semibold text-orange-600 hover:text-orange-700 uppercase tracking-wide">
                                        All Web Development →
                                    </a>
                                </div>
                                <div class="px-2 space-y-0.5">
                                    @foreach($webDevelopmentService->activeSubServices as $subService)
                                    <a href="{{ route('services.sub-service', [$webDevelopmentService, $subService]) }}" class="block px-3 py-2.5 text-sm text-gray-700 hover:text-orange-600 hover:bg-orange-50 rounded-lg transition-colors">
                                        {{ $subService->title }}
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Clean Navigation Links -->
                    <a href="{{ route('case-studies') }}" class="navbar-link px-3 py-2 text-base font-medium transition-colors duration-200 hover:text-orange-600 whitespace-nowrap">Case Studies</a>
                    <a href="{{ route('about') }}" class="navbar-link px-3 py-2 text-base font-medium transition-colors duration-200 hover:text-orange-600 whitespace-nowrap">About Us</a>
                    <a href="{{ route('blog.index') }}" class="navbar-link px-3 py-2 text-base font-medium transition-colors duration-200 hover:text-orange-600">Blog</a>
                    <a href="{{ route('contact') }}" class="navbar-link px-3 py-2 text-base font-medium transition-colors duration-200 hover:text-orange-600">Contacts</a>
                </div>

                <!-- Clean Contact Info & CTA -->
                <div class="hidden xl:flex items-center space-x-6 flex-shrink-0">
                    <!-- Contact Info with Flag -->
                    <div class="flex items-center text-sm font-medium text-gray-700">
                        <span class="mr-2 text-lg">{{ config('company.contact.country_flag') }}</span>
                        <span class="font-semibold">{{ config('company.contact.phone') }}</span>
                    </div>

                    <!-- Clean CTA Button -->
                    <a href="{{ route('contact') }}" class="inline-flex items-center px-6 py-2 border-2 border-orange-600 text-black font-bold rounded-lg hover:bg-orange-600 hover:text-white transition-all duration-200 text-sm uppercase tracking-wide">
                        Contact Us
                    </a>

                    @auth
                    @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" class="bg-orange-500 text-white px-3 py-2 rounded-lg text-xs font-medium hover:bg-orange-600 transition-colors duration-200">
                        Admin
                    </a>
                    @endif
                    @endauth
                </div>

                <!-- Mobile menu button -->
                <div class="xl:hidden flex items-center gap-1">
                    <a href="tel:{{ preg_replace('/[^\d+]/', '', config('company.contact.phone')) }}" class="mobile-nav-icon-btn xl:hidden" aria-label="Call {{ config('company.contact.phone') }}">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                    </a>
                    <button type="button" class="mobile-menu-button" aria-controls="mobile-menu" aria-expanded="false" aria-label="Open menu">
                        <svg class="mobile-menu-icon mobile-menu-icon--open h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg class="mobile-menu-icon mobile-menu-icon--close h-6 w-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu — full-height scrollable panel (below xl breakpoint) -->
        <div id="mobile-menu" class="mobile-menu xl:hidden" aria-hidden="true">
            <button type="button" class="mobile-menu-backdrop" aria-label="Close menu" tabindex="-1"></button>
            <div class="mobile-menu-panel ios-safe-area-padding">
                <div class="mobile-menu-scroll">
                @if(isset($catalogServices) && $catalogServices->isNotEmpty())
                <div class="mobile-menu-section">
                    <p class="mobile-menu-label">Services</p>
                    @foreach($catalogServices as $service)
                    <details class="mobile-menu-accordion">
                        <summary class="mobile-nav-link mobile-nav-link--summary">
                            <span>{{ $service->title }}</span>
                            <svg class="mobile-menu-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="mobile-menu-sub">
                            @foreach($service->activeSubServices as $subService)
                            <a href="{{ route('services.sub-service', [$service, $subService]) }}" class="mobile-nav-sublink">{{ $subService->title }}</a>
                            @endforeach
                            <a href="{{ route('catalog.services.show', $service) }}" class="mobile-nav-sublink mobile-nav-sublink--accent">View {{ $service->title }} →</a>
                        </div>
                    </details>
                    @endforeach
                    <a href="{{ route('catalog.services') }}" class="mobile-nav-link mobile-nav-link--accent">Browse All Services</a>
                </div>
                @endif

                @if(isset($webDevelopmentService) && $webDevelopmentService->activeSubServices->isNotEmpty())
                <div class="mobile-menu-section">
                    <details class="mobile-menu-accordion">
                        <summary class="mobile-nav-link mobile-nav-link--summary">
                            <span>Web Development</span>
                            <svg class="mobile-menu-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </summary>
                        <div class="mobile-menu-sub">
                            @foreach($webDevelopmentService->activeSubServices as $subService)
                            <a href="{{ route('services.sub-service', [$webDevelopmentService, $subService]) }}" class="mobile-nav-sublink">{{ $subService->title }}</a>
                            @endforeach
                            <a href="{{ route('catalog.services.show', $webDevelopmentService) }}" class="mobile-nav-sublink mobile-nav-sublink--accent">View All Web Development →</a>
                        </div>
                    </details>
                </div>
                @endif

                <div class="mobile-menu-section">
                    <a href="{{ route('case-studies') }}" class="mobile-nav-link">Case Studies</a>
                    <a href="{{ route('about') }}" class="mobile-nav-link">About Us</a>
                    <a href="{{ route('blog.index') }}" class="mobile-nav-link">Blog</a>
                    <a href="{{ route('contact') }}" class="mobile-nav-link">Contacts</a>
                </div>

                <div class="mobile-menu-section mobile-menu-footer">
                    <a href="tel:{{ preg_replace('/[^\d+]/', '', config('company.contact.phone')) }}" class="mobile-nav-phone">
                        <span class="text-lg" aria-hidden="true">{{ config('company.contact.country_flag') }}</span>
                        <span>{{ config('company.contact.phone') }}</span>
                    </a>
                    <a href="{{ route('contact') }}" class="mobile-nav-cta">Contact Us</a>

                    @auth
                    @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" class="mobile-nav-auth">Admin Dashboard</a>
                    @endif
                    @endauth
                </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Compressed Main Content -->
    <main class="pt-16 ios-main-content" style="padding-top: calc(4rem + env(safe-area-inset-top));">
        @yield('content')
    </main>

    <!-- Footer -->
    <x-footer />

    <!-- VanTroZ UI System - JavaScript modules loaded via Vite -->
    
    @stack('scripts')
</body>

</html>