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
    
    <!-- Enhanced Styles with Animations -->
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #000000 0%, #0a0a0a 50%, #000000 100%);
            color: #ffffff;
            overflow-x: hidden;
        }
        
        /* Enhanced Color Palette */
        .wezom-gradient {
            background: linear-gradient(135deg, #ff6b35 0%, #f7931e 50%, #ff8c42 100%);
            box-shadow: 0 10px 30px rgba(255, 107, 53, 0.3);
        }
        .wezom-gradient-hover:hover {
            background: linear-gradient(135deg, #ff8c42 0%, #ff6b35 50%, #f7931e 100%);
            transform: translateY(-2px);
            box-shadow: 0 15px 40px rgba(255, 107, 53, 0.4);
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }
        .wezom-orange {
            background-color: #ff6b35;
        }
        .wezom-orange-text {
            background: linear-gradient(135deg, #ff6b35, #f7931e, #ff8c42);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .wezom-dark-bg {
            background: linear-gradient(135deg, #000000 0%, #0f0f0f 50%, #000000 100%);
            position: relative;
        }
        .wezom-gray-bg {
            background: linear-gradient(135deg, #1f1f1f 0%, #2a2a2a 50%, #1f1f1f 100%);
        }
        
        /* Advanced Animations */
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
        }
        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 20px rgba(255, 107, 53, 0.3); }
            50% { box-shadow: 0 0 40px rgba(255, 107, 53, 0.6); }
        }
        @keyframes mesh-rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        @keyframes text-reveal {
            0% { opacity: 0; transform: translateY(30px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        @keyframes slide-in-left {
            0% { opacity: 0; transform: translateX(-50px); }
            100% { opacity: 1; transform: translateX(0); }
        }
        @keyframes slide-in-right {
            0% { opacity: 0; transform: translateX(50px); }
            100% { opacity: 1; transform: translateX(0); }
        }
        @keyframes scale-in {
            0% { opacity: 0; transform: scale(0.8); }
            100% { opacity: 1; transform: scale(1); }
        }
        @keyframes count-up {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        /* Enhanced Hover Effects */
        .service-card {
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, rgba(255, 107, 53, 0.05) 0%, rgba(247, 147, 30, 0.05) 100%);
            border: 1px solid rgba(255, 107, 53, 0.1);
            backdrop-filter: blur(10px);
        }
        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 107, 53, 0.1), transparent);
            transition: left 0.5s;
        }
        .service-card:hover::before {
            left: 100%;
        }
        .service-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 25px 50px rgba(255, 107, 53, 0.3);
            border-color: rgba(255, 107, 53, 0.3);
        }
        
        .tech-item {
            transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            position: relative;
            overflow: hidden;
        }
        .tech-item::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(45deg, rgba(255, 107, 53, 0.1), rgba(247, 147, 30, 0.1));
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .tech-item:hover::before {
            opacity: 1;
        }
        .tech-item:hover {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 15px 30px rgba(255, 107, 53, 0.2);
        }
        
        /* Animated Buttons */
        .btn-animated {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #ff6b35, #f7931e);
        }
        .btn-animated::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }
        .btn-animated:hover::before {
            left: 100%;
        }
        .btn-animated:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(255, 107, 53, 0.4);
        }
        
        /* Floating Elements */
        .floating-element {
            animation: float 6s ease-in-out infinite;
        }
        .floating-element:nth-child(2n) {
            animation-delay: -2s;
        }
        .floating-element:nth-child(3n) {
            animation-delay: -4s;
        }
        
        /* Glowing Effects */
        .glow-effect {
            animation: pulse-glow 2s ease-in-out infinite;
        }
        
        /* Navigation Enhancements */
        nav {
            backdrop-filter: blur(15px);
            border-bottom: 1px solid rgba(255, 107, 53, 0.1);
        }
        nav a {
            position: relative;
            transition: all 0.3s ease;
        }
        nav a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(135deg, #ff6b35, #f7931e);
            transition: width 0.3s ease;
        }
        nav a:hover::after {
            width: 100%;
        }
        
        /* Smooth Scrolling */
        html {
            scroll-behavior: smooth;
        }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: linear-gradient(135deg, #1a1a1a, #2a2a2a);
        }
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #ff6b35, #f7931e);
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #f7931e, #ff6b35);
        }
        
        /* Animation Classes */
        .animate-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease-out;
        }
        .animate-on-scroll.animated {
            opacity: 1;
            transform: translateY(0);
        }
        
        /* Interactive Cards */
        .interactive-card {
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, rgba(255, 107, 53, 0.03) 0%, rgba(247, 147, 30, 0.03) 100%);
            border: 1px solid rgba(255, 107, 53, 0.1);
            backdrop-filter: blur(10px);
        }
        .interactive-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent, rgba(255, 107, 53, 0.1), transparent);
            transform: translateX(-100%);
            transition: transform 0.6s;
        }
        .interactive-card:hover::before {
            transform: translateX(100%);
        }
        .interactive-card:hover {
            transform: scale(1.02) translateY(-5px);
            box-shadow: 0 25px 50px rgba(255, 107, 53, 0.2);
            border-color: rgba(255, 107, 53, 0.3);
        }
        
        /* Geometric Background */
        .geometric-bg {
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><pattern id="grid" width="50" height="50" patternUnits="userSpaceOnUse"><path d="M 50 0 L 0 0 0 50" fill="none" stroke="%23ff6b35" stroke-width="0.5" opacity="0.3"/></pattern></defs><rect width="100%" height="100%" fill="url(%23grid)"/></svg>');
            position: relative;
        }
        
        /* Loading Animation */
        .loading-animation {
            opacity: 0;
            animation: scale-in 0.6s ease-out forwards;
        }
        
        /* Parallax Effect */
        .parallax-element {
            transition: transform 0.1s ease-out;
        }
        
        /* Counter Animation */
        .counter-number {
            animation: count-up 1s ease-out;
        }
        
        /* Responsive Animations */
        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }
        
        /* Enhanced Typography */
        .text-gradient {
            background: linear-gradient(135deg, #ff6b35, #f7931e, #ff8c42);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Modern Gradients */
        .gradient-bg-1 {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
        }
        .gradient-bg-2 {
            background: linear-gradient(135deg, rgba(240, 147, 251, 0.1) 0%, rgba(245, 87, 108, 0.1) 100%);
        }
        .gradient-bg-3 {
            background: linear-gradient(135deg, rgba(79, 172, 254, 0.1) 0%, rgba(0, 242, 254, 0.1) 100%);
        }
    </style>
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

    <!-- JavaScript for Enhanced Interactions -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile menu functionality
            const mobileMenuButton = document.querySelector('.mobile-menu-button');
            const mobileMenu = document.querySelector('.mobile-menu');
            
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });
            
            // Scroll animations
            const observeElements = () => {
                const elements = document.querySelectorAll('.animate-on-scroll');
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('animated');
                            observer.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.1 });
                
                elements.forEach(el => observer.observe(el));
            };
            
            // Counter animation
            const animateCounters = () => {
                const counters = document.querySelectorAll('.counter-number');
                counters.forEach(counter => {
                    const target = parseInt(counter.getAttribute('data-count'));
                    const duration = 2000;
                    const start = 0;
                    const startTime = Date.now();
                    
                    const updateCounter = () => {
                        const elapsed = Date.now() - startTime;
                        const progress = Math.min(elapsed / duration, 1);
                        const easeOut = 1 - Math.pow(1 - progress, 3);
                        const current = Math.floor(start + (target - start) * easeOut);
                        
                        counter.textContent = current + '+';
                        
                        if (progress < 1) {
                            requestAnimationFrame(updateCounter);
                        }
                    };
                    
                    // Start animation when element is visible
                    const observer = new IntersectionObserver((entries) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                updateCounter();
                                observer.unobserve(entry.target);
                            }
                        });
                    }, { threshold: 0.5 });
                    
                    observer.observe(counter);
                });
            };
            
            // Parallax effect
            const handleParallax = () => {
                const parallaxElements = document.querySelectorAll('.parallax-element');
                window.addEventListener('scroll', () => {
                    const scrolled = window.pageYOffset;
                    parallaxElements.forEach(element => {
                        const rate = scrolled * -0.5;
                        element.style.transform = `translate3d(0, ${rate}px, 0)`;
                    });
                });
            };
            
            // Smooth hover effects for floating elements
            const enhanceFloatingElements = () => {
                const floatingElements = document.querySelectorAll('.floating-element');
                floatingElements.forEach(element => {
                    element.addEventListener('mouseenter', () => {
                        element.style.animationPlayState = 'paused';
                        element.style.transform = 'translateY(-30px) scale(1.05)';
                    });
                    element.addEventListener('mouseleave', () => {
                        element.style.animationPlayState = 'running';
                        element.style.transform = '';
                    });
                });
            };
            
            // Initialize all animations
            observeElements();
            animateCounters();
            handleParallax();
            enhanceFloatingElements();
            
            // Add stagger animation to cards
            const staggerCards = () => {
                const cards = document.querySelectorAll('.interactive-card');
                cards.forEach((card, index) => {
                    card.style.animationDelay = `${index * 0.1}s`;
                });
            };
            staggerCards();
            
            // Enhanced button interactions
            const enhanceButtons = () => {
                const buttons = document.querySelectorAll('.btn-animated');
                buttons.forEach(button => {
                    button.addEventListener('mouseenter', () => {
                        button.style.transform = 'translateY(-3px) scale(1.02)';
                    });
                    button.addEventListener('mouseleave', () => {
                        button.style.transform = '';
                    });
                });
            };
            enhanceButtons();
        });
        
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>
