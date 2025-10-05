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
    <!-- Clean Professional Navigation -->
    <nav id="navbar" class="fixed w-full top-0 z-50 bg-white border-b border-gray-200 transition-all duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Clean Logo Section -->
                <div class="flex items-center flex-shrink-0 justify-start">
                    <a href="{{ route('home') }}" class="flex items-center">
                        <img src="{{ asset('logo/logo.png') }}" alt="{{ config('company.name') }} Logo" class="h-8 w-auto mr-3">
                    </a>
                </div>

                <!-- Clean Desktop Navigation -->
                <div class="hidden xl:flex items-center space-x-8 flex-1 justify-center">
                    <!-- Services Dropdown -->
                    <div class="relative group">
                        <button class="navbar-link px-3 py-2 text-base font-medium flex items-center transition-colors duration-200 hover:text-orange-600">
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

                    <!-- Industries Dropdown -->
                    <div class="relative group">
                        <button class="navbar-link px-3 py-2 text-base font-medium flex items-center transition-colors duration-200 hover:text-orange-600 whitespace-nowrap">
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
                    <a href="{{ route('admin.dashboard') }}" class="bg-orange-500 text-white px-3 py-2 rounded-lg text-xs font-medium hover:bg-orange-600 transition-colors duration-200">
                        Admin
                    </a>
                    @endauth
                </div>

                <!-- Mobile menu button -->
                <div class="lg:hidden flex items-center">
                    <button type="button" class="mobile-menu-button text-gray-700 hover:text-orange-600 focus:outline-none transition-colors duration-200 p-2">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class="mobile-menu hidden lg:hidden">
            <div class="px-4 pt-4 pb-6 space-y-2 bg-white border-t border-gray-200">
                <a href="{{ route('services') }}" class="text-gray-900 hover:text-orange-600 block px-3 py-2 text-base font-medium">Services</a>
                <a href="#" class="text-gray-900 hover:text-orange-600 block px-3 py-2 text-base font-medium">Industries & Solutions</a>
                <a href="{{ route('case-studies') }}" class="text-gray-900 hover:text-orange-600 block px-3 py-2 text-base font-medium">Case Studies</a>
                <a href="{{ route('about') }}" class="text-gray-900 hover:text-orange-600 block px-3 py-2 text-base font-medium">About Us</a>
                <a href="{{ route('blog.index') }}" class="text-gray-900 hover:text-orange-600 block px-3 py-2 text-base font-medium">Blog</a>
                <a href="{{ route('contact') }}" class="text-gray-900 hover:text-orange-600 block px-3 py-2 text-base font-medium">Contacts</a>
                
                <!-- Mobile Contact Info -->
                <div class="pt-4 border-t border-gray-200">
                    <div class="flex items-center px-3 py-2 text-sm font-medium text-gray-700">
                        <span class="mr-2 text-lg">{{ config('company.contact.country_flag') }}</span>
                        <span>{{ config('company.contact.phone') }}</span>
                    </div>
                    <a href="{{ route('contact') }}" class="block w-full text-center px-4 py-2 border-2 border-orange-600 text-black font-bold rounded-lg hover:bg-orange-600 hover:text-white transition-all duration-200 text-sm uppercase tracking-wide mt-2">
                        Contact Us
                    </a>
                </div>
                
                @auth
                <div class="pt-2">
                    <a href="{{ route('admin.dashboard') }}" class="bg-orange-500 text-white block px-3 py-2 text-base font-medium rounded-md">Admin</a>
                </div>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Compressed Main Content -->
    <main class="pt-16">
        @yield('content')
    </main>

    <!-- Footer -->
    <x-footer />

    <!-- VanTroZ UI System - JavaScript modules loaded via Vite -->
    
    <!-- Mobile Menu JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM loaded, initializing mobile menu...');
            
            // Mobile menu toggle
            const mobileMenuButton = document.querySelector('.mobile-menu-button');
            const mobileMenu = document.querySelector('.mobile-menu');
            
            console.log('Mobile menu button:', mobileMenuButton);
            console.log('Mobile menu:', mobileMenu);

            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    console.log('Mobile menu button clicked');
                    
                    const isHidden = mobileMenu.classList.contains('hidden');
                    console.log('Menu is hidden:', isHidden);
                    
                    if (isHidden) {
                        mobileMenu.classList.remove('hidden');
                        console.log('Menu opened');
                    } else {
                        mobileMenu.classList.add('hidden');
                        console.log('Menu closed');
                    }
                });

                // Close mobile menu when clicking outside
                document.addEventListener('click', function(e) {
                    if (!mobileMenuButton.contains(e.target) && !mobileMenu.contains(e.target)) {
                        mobileMenu.classList.add('hidden');
                    }
                });
            } else {
                console.error('Mobile menu elements not found!');
            }

            // Dropdown menu functionality
            const dropdownGroups = document.querySelectorAll('.group');
            console.log('Found dropdown groups:', dropdownGroups.length);

            dropdownGroups.forEach(function(group) {
                const button = group.querySelector('button');
                const menu = group.querySelector('.absolute');

                if (button && menu) {
                    // Mouse events for desktop
                    group.addEventListener('mouseenter', function() {
                        console.log('Mouse entered dropdown group');
                        menu.style.opacity = '1';
                        menu.style.visibility = 'visible';
                        menu.style.transform = 'translateY(0)';
                    });

                    group.addEventListener('mouseleave', function() {
                        console.log('Mouse left dropdown group');
                        menu.style.opacity = '0';
                        menu.style.visibility = 'hidden';
                        menu.style.transform = 'translateY(8px)';
                    });

                    // Click events for mobile/touch
                    button.addEventListener('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        
                        console.log('Dropdown button clicked');
                        
                        const isVisible = menu.style.opacity === '1';
                        
                        if (isVisible) {
                            menu.style.opacity = '0';
                            menu.style.visibility = 'hidden';
                            menu.style.transform = 'translateY(8px)';
                        } else {
                            // Close other dropdowns first
                            dropdownGroups.forEach(function(otherGroup) {
                                if (otherGroup !== group) {
                                    const otherMenu = otherGroup.querySelector('.absolute');
                                    if (otherMenu) {
                                        otherMenu.style.opacity = '0';
                                        otherMenu.style.visibility = 'hidden';
                                        otherMenu.style.transform = 'translateY(8px)';
                                    }
                                }
                            });
                            
                            menu.style.opacity = '1';
                            menu.style.visibility = 'visible';
                            menu.style.transform = 'translateY(0)';
                        }
                    });
                }
            });

            // Close dropdowns when clicking outside
            document.addEventListener('click', function(e) {
                if (!e.target.closest('.group')) {
                    dropdownGroups.forEach(function(group) {
                        const menu = group.querySelector('.absolute');
                        if (menu) {
                            menu.style.opacity = '0';
                            menu.style.visibility = 'hidden';
                            menu.style.transform = 'translateY(8px)';
                        }
                    });
                }
            });

            // Navbar scroll effect
            const navbar = document.getElementById('navbar');
            if (navbar) {
                window.addEventListener('scroll', () => {
                    if (window.scrollY > 50) {
                        navbar.classList.add('navbar-scrolled');
                    } else {
                        navbar.classList.remove('navbar-scrolled');
                    }
                });
            }
        });
    </script>
</body>

</html>