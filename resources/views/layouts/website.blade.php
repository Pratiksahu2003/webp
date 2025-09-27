<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('company.name') . ' - IT Partner')</title>
    <meta name="description" content="@yield('description', config('company.name') . ' - ' . config('company.tagline') . ' for software development, web development, mobile app development, and more.')">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- VanTroZ UI System - CSS modules loaded via Vite -->
</head>

<body class="font-sans antialiased text-gray-900 bg-white">
    <!-- Compressed Navigation -->
    <nav id="navbar" class="fixed w-full top-0 z-50 bg-white/90 backdrop-blur-lg border-b border-slate-200/60 transition-all duration-200">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo with Image -->
                <div class="flex items-center flex-shrink-0">
                    <a href="{{ route('home') }}" class="flex items-center space-x-2">
                        <img src="{{ asset('logo/logo.png') }}" alt="{{ config('company.name') }} Logo" class="h-8 w-auto vantroz-logo">
                    </a>
                </div>

                <!-- Compressed Desktop Navigation -->
                <div class="hidden xl:flex items-center space-x-6 flex-1 justify-center">
                    <!-- Services Dropdown -->
                    <div class="relative group">
                        <button class="navbar-link px-3 py-2 text-base font-medium flex items-center transition-colors duration-300 hover:text-orange-500">
                            Services
                            <svg class="w-3 h-3 ml-1 transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <!-- Services Dropdown Menu -->
                        <div class="absolute top-full left-0 w-56 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 z-50">
                            <div class="bg-white rounded-lg shadow-xl border border-gray-200 py-4 mt-2">
                                <div class="px-4">
                                    <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">Our Services</h3>
                                    <div class="space-y-2">
                                        <a href="{{ route('services.web-development') }}" class="block text-gray-900 hover:text-orange-500 font-medium transition-colors duration-200 text-sm">Web Development</a>
                                        <a href="{{ route('services.mobile-development') }}" class="block text-gray-900 hover:text-orange-500 font-medium transition-colors duration-200 text-sm">Mobile Development</a>
                                        <a href="{{ route('services.custom-software') }}" class="block text-gray-900 hover:text-orange-500 font-medium transition-colors duration-200 text-sm">Custom Software</a>
                                        <a href="{{ route('services.ui-ux-design') }}" class="block text-gray-900 hover:text-orange-500 font-medium transition-colors duration-200 text-sm">UI/UX Design</a>
                                        <a href="{{ route('services.data-science') }}" class="block text-gray-900 hover:text-orange-500 font-medium transition-colors duration-200 text-sm">Data Science & AI</a>
                                        <a href="{{ route('services.qa-testing') }}" class="block text-gray-900 hover:text-orange-500 font-medium transition-colors duration-200 text-sm">QA & Testing</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Industries & Solutions Dropdown -->
                    <div class="relative group">
                        <button class="navbar-link px-3 py-2 text-base font-medium flex items-center transition-colors duration-300 hover:text-orange-500 whitespace-nowrap">
                            Industries & Solutions
                            <svg class="w-3 h-3 ml-1 transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <!-- Industries Dropdown Menu -->
                        <div class="absolute top-full left-0 w-56 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 z-50">
                            <div class="bg-white rounded-lg shadow-xl border border-gray-200 py-4 mt-2">
                                <div class="px-4">
                                    <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">Industries</h3>
                                    <div class="space-y-2">
                                        <a href="{{ route('industries.healthcare') }}" class="block text-gray-900 hover:text-orange-500 font-medium transition-colors duration-200 text-sm">Healthcare</a>
                                        <a href="{{ route('industries.fintech') }}" class="block text-gray-900 hover:text-orange-500 font-medium transition-colors duration-200 text-sm">FinTech</a>
                                        <a href="{{ route('industries.ecommerce') }}" class="block text-gray-900 hover:text-orange-500 font-medium transition-colors duration-200 text-sm">E-commerce</a>
                                        <a href="{{ route('industries.education') }}" class="block text-gray-900 hover:text-orange-500 font-medium transition-colors duration-200 text-sm">Education</a>
                                        <a href="{{ route('industries.real-estate') }}" class="block text-gray-900 hover:text-orange-500 font-medium transition-colors duration-200 text-sm">Real Estate</a>
                                        <a href="{{ route('industries.logistics') }}" class="block text-gray-900 hover:text-orange-500 font-medium transition-colors duration-200 text-sm">Logistics</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('case-studies') }}" class="navbar-link px-3 py-2 text-base font-medium transition-colors duration-300 hover:text-orange-500 whitespace-nowrap">Case Studies</a>
                    <a href="{{ route('about') }}" class="navbar-link px-3 py-2 text-base font-medium transition-colors duration-300 hover:text-orange-500 whitespace-nowrap">About Us</a>
                    <a href="{{ route('blog.index') }}" class="navbar-link px-3 py-2 text-base font-medium transition-colors duration-300 hover:text-orange-500">Blog</a>
                    <a href="{{ route('contact') }}" class="navbar-link px-3 py-2 text-base font-medium transition-colors duration-300 hover:text-orange-500">Contacts</a>
                </div>

                <!-- Compressed Contact Info & CTA -->
                <div class="hidden xl:flex items-center space-x-4 flex-shrink-0">
                    <!-- Compressed Phone -->
                    <div id="navbar-phone" class="flex items-center text-sm font-medium transition-colors duration-200">
                        <span class="mr-1.5 text-sm">{{ config('company.contact.country_flag') }}</span>
                        <span class="font-semibold whitespace-nowrap">{{ config('company.contact.phone') }}</span>
                    </div>

                    <!-- Compressed Contact Button -->
                    <a href="{{ route('contact') }}" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-indigo-600 to-indigo-700 text-white font-semibold rounded-lg hover:from-indigo-700 hover:to-indigo-800 transition-all duration-200 shadow-md text-sm">
                        Get Started
                        <svg class="w-3 h-3 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>

                    @auth
                    <a href="{{ route('admin.dashboard') }}" class="bg-gradient-to-r from-orange-400 to-orange-500 text-white px-3 py-2 rounded-lg text-xs font-medium hover:from-orange-500 hover:to-orange-600 transition-all duration-300 transform hover:scale-105 shadow-lg">
                        Admin
                    </a>
                    @endauth
                </div>

                <!-- Mobile menu button -->
                <div class="lg:hidden flex items-center">
                    <button type="button" class="mobile-menu-button navbar-link focus:outline-none transition-colors duration-300 p-2 rounded-lg hover:bg-gray-100">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class="mobile-menu hidden lg:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-gray-50 border-t border-gray-200">
                <a href="{{ route('services') }}" class="text-gray-900 hover:text-orange-400 block px-3 py-2 text-base font-medium">Services</a>
                <a href="#" class="text-gray-900 hover:text-orange-400 block px-3 py-2 text-base font-medium">Industries & Solutions</a>
                <a href="{{ route('case-studies') }}" class="text-gray-900 hover:text-orange-400 block px-3 py-2 text-base font-medium">Case Studies</a>
                <a href="{{ route('about') }}" class="text-gray-900 hover:text-orange-400 block px-3 py-2 text-base font-medium">About Us</a>
                <a href="{{ route('blog.index') }}" class="text-gray-900 hover:text-orange-400 block px-3 py-2 text-base font-medium">Blog</a>
                <a href="{{ route('contact') }}" class="text-gray-900 hover:text-orange-400 block px-3 py-2 text-base font-medium">Contacts</a>
                @auth
                <a href="{{ route('admin.dashboard') }}" class="bg-orange-400 text-black block px-3 py-2 text-base font-medium rounded-md">Admin</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Compressed Main Content -->
    <main class="pt-16">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200">
        <div class="max-w-7xl mx-auto py-16 px-6 sm:px-8 lg:px-10">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                <div>
                    <div class="flex items-center mb-6">
                        <img src="{{ asset('logo/logo.png') }}" alt="{{ config('company.name') }} Logo" class="h-10 w-auto mr-3 vantroz-logo">
                    </div>
                    <p class="text-gray-600 leading-relaxed">{{ config('company.tagline') }} - Your trusted IT partner for software development, web development, mobile app development, and more.</p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-6 text-gray-900">Services</h4>
                    <ul class="space-y-3 text-gray-600">
                        <li><a href="#" class="hover:text-orange-500 transition-colors">Software Development</a></li>
                        <li><a href="#" class="hover:text-orange-500 transition-colors">Web Development</a></li>
                        <li><a href="#" class="hover:text-orange-500 transition-colors">Mobile App Development</a></li>
                        <li><a href="#" class="hover:text-orange-500 transition-colors">Data Science & AI</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-6 text-gray-900">Company</h4>
                    <ul class="space-y-3 text-gray-600">
                        <li><a href="{{ route('about') }}" class="hover:text-orange-500 transition-colors">About Us</a></li>
                        <li><a href="{{ route('case-studies') }}" class="hover:text-orange-500 transition-colors">Case Studies</a></li>
                        <li><a href="{{ route('blog.index') }}" class="hover:text-orange-500 transition-colors">Blog</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-orange-500 transition-colors">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-6 text-gray-900">Contact Information</h4>
                    <div class="text-gray-600 space-y-3">
                        <p class="font-semibold text-gray-900">{{ config('company.address.primary.name') }}</p>
                        <p>{{ config('company.address.primary.full') }}</p>
                        <p class="mt-6 text-orange-500 font-semibold">{{ config('company.contact.email') }}</p>
                        <p class="text-orange-500 font-semibold">{{ config('company.contact.phone') }}</p>
                    </div>
                </div>
            </div>
            <div class="mt-12 pt-8 border-t border-gray-200 text-center text-gray-600">
                <p class="text-lg">&copy; 2000-2025 {{ config('company.name') }} IT-Company</p>
                <div class="mt-6 space-x-8">
                    <a href="#" class="text-gray-600 hover:text-orange-500 transition-colors">Sitemap</a>
                    <a href="#" class="text-gray-600 hover:text-orange-500 transition-colors">Privacy Policy</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- VanTroZ UI System - JavaScript modules loaded via Vite -->
</body>

</html>