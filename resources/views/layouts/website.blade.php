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

    <x-favicon />

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
    <nav id="navbar" class="fixed w-full top-0 bg-white border-b border-gray-200 transition-all duration-200 ios-fixed font-sans">
        <div class="navbar-container">
            <div class="navbar-shell">
                <!-- Logo -->
                <div class="navbar-brand">
                    <a href="{{ route('home') }}" class="navbar-brand-link" aria-label="{{ config('company.name') }} home">
                        <img src="{{ asset('logo/logo.png') }}" alt="{{ config('company.name') }} Logo" width="160" height="40">
                    </a>
                </div>

                <!-- Desktop / large-tablet navigation -->
                <div class="navbar-center">
                    @if(isset($catalogServices) && $catalogServices->isNotEmpty())
                    <div class="relative group navbar-mega-menu">
                        <button type="button" class="navbar-link flex items-center gap-1">
                            Services
                            <svg class="w-3 h-3 transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
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

                    <x-nav-service-menu :service="$webDevelopmentService" label="Website Development" short-label="Website" />

                    <x-nav-service-menu :service="$softwareDevelopmentService" label="Software Development" short-label="Software" />

                    <x-nav-service-menu :service="$designService" label="Design" all-label="All Design" />

                    <x-nav-service-menu :service="$digitalMarketingService" label="Digital Marketing" short-label="Marketing" />

                    <a href="{{ route('about') }}" class="navbar-link whitespace-nowrap">
                        <span class="navbar-link-short">About</span>
                        <span class="navbar-link-full">About Us</span>
                    </a>
                </div>

                <!-- Desktop actions -->
                <div class="navbar-actions">
                    <a href="tel:{{ preg_replace('/[^\d+]/', '', config('company.contact.phone')) }}" id="navbar-phone" class="navbar-phone" aria-label="Call {{ config('company.contact.phone') }}">
                        <x-country-flag />
                        <span class="navbar-phone-number">{{ config('company.contact.phone') }}</span>
                    </a>

                    <a href="{{ route('contact') }}" class="navbar-cta">Contact Us</a>

                    @auth
                    @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" class="navbar-admin-link">Admin</a>
                    @endif
                    @endauth
                </div>

                <!-- Mobile / tablet actions -->
                <div class="navbar-mobile-actions">
                    <a href="tel:{{ preg_replace('/[^\d+]/', '', config('company.contact.phone')) }}" class="navbar-phone navbar-phone--compact" aria-label="Call {{ config('company.contact.phone') }}">
                        <x-country-flag />
                        <span class="navbar-phone-number">{{ config('company.contact.phone') }}</span>
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
    </nav>

    <!-- Mobile menu — portal at body level so it stacks above page content -->
    <div id="mobile-menu" class="mobile-menu" aria-hidden="true">
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

            <x-nav-service-menu-mobile :service="$webDevelopmentService" label="Website Development" />

            <x-nav-service-menu-mobile :service="$softwareDevelopmentService" label="Software Development" />

            <x-nav-service-menu-mobile :service="$designService" label="Design" all-label="View All Design" />

            <x-nav-service-menu-mobile :service="$digitalMarketingService" label="Digital Marketing" />

            <div class="mobile-menu-section">
                <a href="{{ route('about') }}" class="mobile-nav-link">About Us</a>
            </div>

            <div class="mobile-menu-section mobile-menu-footer">
                <a href="tel:{{ preg_replace('/[^\d+]/', '', config('company.contact.phone')) }}" class="mobile-nav-phone navbar-phone">
                    <x-country-flag />
                    <span class="navbar-phone-number">{{ config('company.contact.phone') }}</span>
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

    <!-- Compressed Main Content -->
    <main class="pt-16 ios-main-content" style="padding-top: calc(4rem + env(safe-area-inset-top));">
        @yield('content')
    </main>

    <!-- Footer -->
    <x-footer />

    <x-chatbot-widget />

    <!-- VanTroZ UI System - JavaScript modules loaded via Vite -->
    
    @stack('scripts')
</body>

</html>