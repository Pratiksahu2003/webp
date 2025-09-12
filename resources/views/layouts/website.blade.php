<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'WEZOM - IT Partner')</title>
    <meta name="description" content="@yield('description', 'WEZOM - Your trusted IT partner for software development, web development, mobile app development, and more.')">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- WEZOM UI System - CSS modules loaded via Vite -->
</head>
<body class="font-sans antialiased wezom-dark-bg text-white">
    <!-- Navigation -->
    <nav class="wezom-dark-bg fixed w-full top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex-shrink-0">
                        <span class="text-3xl font-bold text-white">WEZOM</span>
                    </a>
                </div>
                
                <!-- Desktop Navigation -->
                <div class="hidden lg:flex items-center space-x-8">
                    <div class="relative group">
                        <a href="{{ route('services') }}" class="text-white hover:text-orange-400 px-3 py-2 text-sm font-medium flex items-center">
                            Services
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </a>
                    </div>
                    
                    <div class="relative group">
                        <a href="#" class="text-white hover:text-orange-400 px-3 py-2 text-sm font-medium flex items-center">
                            Industries & Solutions
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </a>
                    </div>
                    
                    <a href="{{ route('case-studies') }}" class="text-white hover:text-orange-400 px-3 py-2 text-sm font-medium">Case Studies</a>
                    <a href="{{ route('about') }}" class="text-white hover:text-orange-400 px-3 py-2 text-sm font-medium">About Us</a>
                    <a href="{{ route('blog.index') }}" class="text-white hover:text-orange-400 px-3 py-2 text-sm font-medium">Blog</a>
                    <a href="{{ route('contact') }}" class="text-white hover:text-orange-400 px-3 py-2 text-sm font-medium">Contacts</a>
                </div>

                <!-- Contact Info & CTA -->
                <div class="hidden lg:flex items-center space-x-6">
                    <div class="flex items-center text-white text-sm">
                        <span class="text-lg mr-2">🇺🇸</span>
                        +1 872 225 3074
                    </div>
                    <a href="{{ route('contact') }}" class="btn-animated border-2 border-white text-white px-6 py-2 rounded-full text-sm font-medium uppercase hover:bg-white hover:text-black transition-all duration-300 glow-effect">
                        CONTACT US
                    </a>
                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="bg-orange-400 text-black px-4 py-2 rounded-md text-sm font-medium hover:bg-orange-500">Admin</a>
                    @endauth
                </div>

                <!-- Mobile menu button -->
                <div class="lg:hidden flex items-center">
                    <button type="button" class="mobile-menu-button text-white hover:text-orange-400 focus:outline-none focus:text-orange-400">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class="mobile-menu hidden lg:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 wezom-gray-bg border-t border-gray-800">
                <a href="{{ route('services') }}" class="text-white hover:text-orange-400 block px-3 py-2 text-base font-medium">Services</a>
                <a href="#" class="text-white hover:text-orange-400 block px-3 py-2 text-base font-medium">Industries & Solutions</a>
                <a href="{{ route('case-studies') }}" class="text-white hover:text-orange-400 block px-3 py-2 text-base font-medium">Case Studies</a>
                <a href="{{ route('about') }}" class="text-white hover:text-orange-400 block px-3 py-2 text-base font-medium">About Us</a>
                <a href="{{ route('blog.index') }}" class="text-white hover:text-orange-400 block px-3 py-2 text-base font-medium">Blog</a>
                <a href="{{ route('contact') }}" class="text-white hover:text-orange-400 block px-3 py-2 text-base font-medium">Contacts</a>
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="bg-orange-400 text-black block px-3 py-2 text-base font-medium rounded-md">Admin</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-20">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="wezom-dark-bg border-t border-gray-800">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-4 text-white">WEZOM</h3>
                    <p class="text-gray-400">Your trusted IT partner for software development, web development, mobile app development, and more.</p>
                </div>
                <div>
                    <h4 class="text-md font-semibold mb-4 text-white">Services</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-orange-400">Software Development</a></li>
                        <li><a href="#" class="hover:text-orange-400">Web Development</a></li>
                        <li><a href="#" class="hover:text-orange-400">Mobile App Development</a></li>
                        <li><a href="#" class="hover:text-orange-400">Data Science & AI</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-md font-semibold mb-4 text-white">Company</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="{{ route('about') }}" class="hover:text-orange-400">About Us</a></li>
                        <li><a href="{{ route('case-studies') }}" class="hover:text-orange-400">Case Studies</a></li>
                        <li><a href="{{ route('blog.index') }}" class="hover:text-orange-400">Blog</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-orange-400">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-md font-semibold mb-4 text-white">Software development locations</h4>
                    <div class="text-gray-400 space-y-2">
                        <p>New York</p>
                        <p>Houston</p>
                        <p>Chicago</p>
                        <p>Schaumburg, Illinois</p>
                        <p>1821 Walden Office Square, 406</p>
                        <p>New York, 112 W. 34th Street</p>
                        <p>17th and 18th Floors</p>
                        <p class="mt-4">info@wezom.com</p>
                        <p>+1 872 225 3074</p>
                    </div>
                </div>
            </div>
            <div class="mt-8 pt-8 border-t border-gray-800 text-center text-gray-400">
                <p>&copy; 2000-2025 Wezom IT-Company</p>
                <div class="mt-4 space-x-4">
                    <a href="#" class="text-gray-400 hover:text-orange-400">Sitemap</a>
                    <a href="#" class="text-gray-400 hover:text-orange-400">Privacy Policy</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- WEZOM UI System - JavaScript modules loaded via Vite -->
</body>
</html>
