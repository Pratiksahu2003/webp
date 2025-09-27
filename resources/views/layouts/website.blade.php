<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'VanTroZ - IT Partner')</title>
    <meta name="description" content="@yield('description', 'VanTroZ - Your trusted IT partner for software development, web development, mobile app development, and more.')">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- VanTroZ UI System - CSS modules loaded via Vite -->
</head>
<body class="font-sans antialiased text-gray-900 bg-white">
    <!-- Modern Navigation -->
    <nav id="navbar" class="fixed w-full top-0 z-50 bg-white/80 backdrop-blur-xl border-b border-slate-200/60 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-10">
            <div class="flex justify-between items-center h-20">
                <!-- Modern Logo -->
                <div class="flex items-center flex-shrink-0">
                    <a href="{{ route('home') }}" class="flex items-center space-x-2">
                        <div class="w-8 h-8 bg-gradient-to-br from-indigo-600 to-cyan-500 rounded-lg flex items-center justify-center">
                            <span class="text-white font-bold text-sm">V</span>
                        </div>
                        <span class="text-2xl font-bold text-slate-900">VanTroZ</span>
                    </a>
                </div>
                
                <!-- Desktop Navigation - Enhanced -->
                <div class="hidden xl:flex items-center space-x-8 flex-1 justify-center">
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
                                        <a href="{{ route('services') }}" class="block text-gray-900 hover:text-orange-500 font-medium transition-colors duration-200 text-sm">Web Development</a>
                                        <a href="{{ route('services') }}" class="block text-gray-900 hover:text-orange-500 font-medium transition-colors duration-200 text-sm">Mobile Development</a>
                                        <a href="{{ route('services') }}" class="block text-gray-900 hover:text-orange-500 font-medium transition-colors duration-200 text-sm">Custom Software</a>
                                        <a href="{{ route('services') }}" class="block text-gray-900 hover:text-orange-500 font-medium transition-colors duration-200 text-sm">UI/UX Design</a>
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
                                        <a href="#" class="block text-gray-900 hover:text-orange-500 font-medium transition-colors duration-200 text-sm">Healthcare</a>
                                        <a href="#" class="block text-gray-900 hover:text-orange-500 font-medium transition-colors duration-200 text-sm">FinTech</a>
                                        <a href="#" class="block text-gray-900 hover:text-orange-500 font-medium transition-colors duration-200 text-sm">E-commerce</a>
                                        <a href="#" class="block text-gray-900 hover:text-orange-500 font-medium transition-colors duration-200 text-sm">Education</a>
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

                <!-- Contact Info & CTA - Enhanced -->
                <div class="hidden xl:flex items-center space-x-6 flex-shrink-0">
                    <!-- Country Flag & Phone -->
                    <div id="navbar-phone" class="flex items-center text-base font-medium transition-colors duration-300">
                        <span class="mr-2 text-lg">🇺🇸</span>
                        <span class="font-semibold whitespace-nowrap">+1 312 340 0872</span>
                    </div>
                    
                    <!-- Modern Contact Button -->
                    <a href="{{ route('contact') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-indigo-700 text-white font-semibold rounded-xl hover:from-indigo-700 hover:to-indigo-800 transition-all duration-300 shadow-lg hover:shadow-xl hover:shadow-indigo-500/25 transform hover:-translate-y-0.5">
                        Get Started
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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

    <!-- Main Content -->
    <main class="pt-20">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200">
        <div class="max-w-7xl mx-auto py-16 px-6 sm:px-8 lg:px-10">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                <div>
                    <h3 class="text-xl font-bold mb-6 text-gray-900">VanTroZ</h3>
                    <p class="text-gray-600 leading-relaxed">Your trusted IT partner for software development, web development, mobile app development, and more.</p>
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
                    <h4 class="text-lg font-semibold mb-6 text-gray-900">Software development locations</h4>
                    <div class="text-gray-600 space-y-3">
                        <p>New York</p>
                        <p>Houston</p>
                        <p>Chicago</p>
                        <p>Schaumburg, Illinois</p>
                        <p>1821 Walden Office Square, 406</p>
                        <p>New York, 112 W. 34th Street</p>
                        <p>17th and 18th Floors</p>
                        <p class="mt-6 text-orange-500 font-semibold">info@wezom.com</p>
                        <p class="text-orange-500 font-semibold">+1 872 225 3074</p>
                    </div>
                </div>
            </div>
            <div class="mt-12 pt-8 border-t border-gray-200 text-center text-gray-600">
                <p class="text-lg">&copy; 2000-2025 Wezom IT-Company</p>
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
