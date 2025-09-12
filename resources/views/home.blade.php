@extends('layouts.website')

@section('title', 'WEZOM - Software Development Company')
@section('description', 'WEZOM - IT partner. Driving Business Growth. Partner with dedicated IT experts who get your business.')

@section('content')
<!-- Hero Section - Improved Organization -->
<section class="relative min-h-screen flex items-center overflow-hidden bg-black">
    
    <!-- Main Content Container -->
    <div class="container mx-auto px-4 lg:px-8 relative z-20">
        <div class="grid lg:grid-cols-12 gap-8 items-center min-h-screen py-20">
            
            <!-- Left Content Area -->
            <div class="lg:col-span-7 space-y-12 relative z-30">
                
                <!-- Top Section: Showreel Button -->
                <div class="flex justify-start">
                    <button class="group flex items-center space-x-4 text-white hover:text-orange-400 transition-all duration-500">
                        <div class="w-14 h-14 rounded-full border-2 border-orange-500 flex items-center justify-center group-hover:bg-orange-500 group-hover:scale-110 transition-all duration-300 shadow-lg group-hover:shadow-orange-500/50">
                            <svg class="w-6 h-6 ml-1" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/>
                            </svg>
                        </div>
                        <span class="text-xl font-semibold tracking-wider">SHOWREEL</span>
                    </button>
                </div>
                
                <!-- Main Content: Headlines & Description -->
                <div class="space-y-8">
                    <!-- Main Headlines -->
                    <div class="space-y-2">
                        <h1 class="text-5xl md:text-6xl lg:text-7xl xl:text-8xl font-extrabold leading-none tracking-tight">
                            <div class="text-white mb-1 animate-fade-in-up" style="animation-delay: 0.2s;">Software Delivery</div>
                            <div class="text-white mb-1 animate-fade-in-up" style="animation-delay: 0.4s;">Driving Business</div>
                            <div class="text-white animate-fade-in-up" style="animation-delay: 0.6s;">Growth</div>
                        </h1>
                    </div>
                    
                    <!-- Subtitle/Description -->
                    <div class="max-w-3xl">
                        <p class="text-xl md:text-2xl text-gray-200 font-medium leading-relaxed tracking-wide animate-fade-in-up" style="animation-delay: 0.8s;">
                            PARTNER WITH DEDICATED IT EXPERTS WHO <span class="text-orange-400">'GET'</span> YOUR BUSINESS
                        </p>
                    </div>
                    
                    <!-- Additional Context -->
                    <div class="flex flex-wrap items-center space-x-8 text-gray-400 animate-fade-in-up" style="animation-delay: 1s;">
                        <div class="flex items-center space-x-2">
                            <div class="w-2 h-2 bg-orange-500 rounded-full"></div>
                            <span class="text-sm font-medium">Custom Software Solutions</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-2 h-2 bg-orange-500 rounded-full"></div>
                            <span class="text-sm font-medium">24/7 Expert Support</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-2 h-2 bg-orange-500 rounded-full"></div>
                            <span class="text-sm font-medium">Proven Track Record</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Right Content Area - Stats & CTA -->
            <div class="lg:col-span-5 relative h-full flex flex-col justify-between">
                
                <!-- Top Section: Experience Badge -->
                <div class="flex justify-end mb-8">
                    <div class="text-right animate-fade-in-up" style="animation-delay: 1.2s;">
                        <div class="text-6xl md:text-7xl font-black text-orange-500 leading-none bg-gradient-to-br from-orange-400 to-orange-600 bg-clip-text text-transparent">
                            24+
                        </div>
                        <div class="text-white text-lg md:text-xl font-medium tracking-wide mt-2">
                            years of experience
                        </div>
                        <div class="text-gray-400 text-sm mt-1">
                            Trusted by Fortune 500 companies
                        </div>
                    </div>
                </div>
                
                <!-- Center Section: Additional Stats -->
                <div class="hidden lg:flex justify-center my-8">
                    <div class="grid grid-cols-2 gap-8 text-center animate-fade-in-up" style="animation-delay: 1.4s;">
                        <div>
                            <div class="text-3xl font-bold text-orange-500">3500+</div>
                            <div class="text-gray-400 text-sm">Projects Delivered</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-orange-500">250+</div>
                            <div class="text-gray-400 text-sm">Expert Developers</div>
                        </div>
                    </div>
                </div>
                
                <!-- Bottom Section: CTA Button -->
                <div class="flex justify-end">
                    <button class="group w-36 h-36 rounded-full bg-gradient-to-br from-orange-500 to-orange-600 flex flex-col items-center justify-center text-black font-bold text-sm uppercase tracking-widest hover:scale-110 transition-all duration-500 shadow-2xl hover:shadow-orange-500/50 animate-bounce-slow" style="animation-delay: 1.6s;">
                        <svg class="w-8 h-8 mb-2 group-hover:translate-x-1 transition-transform duration-300" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-xs leading-tight">GET<br>STARTED</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- 3D Orange Mesh Background -->
    <div class="absolute inset-0 z-10">
        <div class="absolute right-0 top-0 w-2/3 h-full">
            <svg class="w-full h-full" viewBox="0 0 800 600" fill="none" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <!-- Gradients for 3D effect -->
                    <linearGradient id="meshGrad1" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#ff6b35;stop-opacity:0.9" />
                        <stop offset="50%" style="stop-color:#ff8c42;stop-opacity:0.7" />
                        <stop offset="100%" style="stop-color:#d2691e;stop-opacity:0.5" />
                    </linearGradient>
                    <linearGradient id="meshGrad2" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#ff8c42;stop-opacity:0.8" />
                        <stop offset="100%" style="stop-color:#f7931e;stop-opacity:0.6" />
                    </linearGradient>
                </defs>
                
                <!-- Complex 3D Mesh Pattern -->
                <!-- Main triangular structures -->
                <polygon points="400,50 500,150 350,180" fill="url(#meshGrad1)" opacity="0.8"/>
                <polygon points="500,150 600,250 450,280" fill="url(#meshGrad2)" opacity="0.7"/>
                <polygon points="350,180 450,280 300,310" fill="url(#meshGrad1)" opacity="0.6"/>
                
                <!-- Central complex -->
                <polygon points="450,280 550,380 400,410" fill="url(#meshGrad2)" opacity="0.9"/>
                <polygon points="550,380 650,480 500,510" fill="url(#meshGrad1)" opacity="0.7"/>
                <polygon points="400,410 500,510 350,540" fill="url(#meshGrad2)" opacity="0.8"/>
                
                <!-- Right extensions -->
                <polygon points="600,250 700,350 550,380" fill="url(#meshGrad1)" opacity="0.6"/>
                <polygon points="700,350 750,450 650,480" fill="url(#meshGrad2)" opacity="0.5"/>
                
                <!-- Additional geometric elements -->
                <circle cx="680" cy="120" r="25" fill="#ff6b35" opacity="0.4"/>
                <circle cx="720" cy="280" r="20" fill="#f7931e" opacity="0.3"/>
                <circle cx="620" cy="450" r="30" fill="#ff8c42" opacity="0.5"/>
                
                <!-- Connecting lines -->
                <line x1="400" y1="50" x2="680" y2="120" stroke="#ff6b35" stroke-width="2" opacity="0.3"/>
                <line x1="500" y1="150" x2="720" y2="280" stroke="#f7931e" stroke-width="1.5" opacity="0.4"/>
                <line x1="550" y1="380" x2="620" y2="450" stroke="#ff8c42" stroke-width="2" opacity="0.3"/>
                
                <!-- Small accent dots -->
                <circle cx="480" cy="200" r="8" fill="#ff6b35" opacity="0.6"/>
                <circle cx="580" cy="320" r="6" fill="#f7931e" opacity="0.7"/>
                <circle cx="420" cy="360" r="10" fill="#ff8c42" opacity="0.5"/>
                <circle cx="650" cy="180" r="7" fill="#ff6b35" opacity="0.6"/>
                <circle cx="520" cy="440" r="9" fill="#f7931e" opacity="0.5"/>
            </svg>
        </div>
    </div>
    
    <!-- Cookie Notice (Bottom Left) -->
    <div class="absolute bottom-8 left-8 z-30 max-w-xs">
        <div class="bg-black/80 backdrop-blur-md rounded-lg p-4 border border-gray-800">
            <div class="flex items-start space-x-3">
                <div class="text-orange-500 text-xl">🍪</div>
                <div>
                    <p class="text-white text-sm mb-3">
                        We use cookies to improve your experience on our website. You can find out more in our policy.
                    </p>
                    <button class="bg-orange-500 hover:bg-orange-600 text-black px-4 py-2 rounded-md text-sm font-medium transition-colors duration-300">
                        OK
                    </button>
                </div>
            </div>
        </div>
    </div>
    
</section>

<!-- Stats Section -->
<section class="py-16 bg-gray-900/50">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 text-center">
            <div class="space-y-2">
                <div class="wezom-stat-number">3500+</div>
                <div class="wezom-stat-label">Implemented projects in IT</div>
            </div>
            <div class="space-y-2">
                <div class="wezom-stat-number">24+</div>
                <div class="wezom-stat-label">years of experience</div>
            </div>
            <div class="space-y-2">
                <div class="wezom-stat-number">250+</div>
                <div class="wezom-stat-label">full-time professionals on staff</div>
            </div>
            <div class="space-y-2">
                <div class="wezom-stat-number">3500+</div>
                <div class="wezom-stat-label">Implemented projects in IT</div>
            </div>
        </div>
    </div>
</section>

<!-- Key Clients Section -->
<section class="py-16">
    <div class="container mx-auto px-4 lg:px-8">
        <h2 class="text-center text-2xl font-semibold text-gray-400 mb-12">Key clients</h2>
        
        <!-- Scrolling clients strip -->
        <div class="relative overflow-hidden">
            <div class="flex animate-scroll space-x-12 items-center">
                <!-- Client logos -->
                <div class="flex-shrink-0 text-gray-400 font-semibold text-lg">H2H Movers</div>
                <div class="flex-shrink-0 text-gray-400 font-semibold text-lg">Selfreliance</div>
                <div class="flex-shrink-0 text-gray-400 font-semibold text-lg">UGL HOLDING</div>
                <div class="flex-shrink-0 text-gray-400 font-semibold text-lg">NVA TRANSPORTATION</div>
                <div class="flex-shrink-0 text-gray-400 font-semibold text-lg">BIKERENT.NYC</div>
                <div class="flex-shrink-0 text-gray-400 font-semibold text-lg">INTERPIPE</div>
                <div class="flex-shrink-0 text-gray-400 font-semibold text-lg">SCHWARZ LOGISTICS</div>
                <div class="flex-shrink-0 text-gray-400 font-semibold text-lg">AUTO TRANSPORT CHICAGO TRAILERS</div>
                <div class="flex-shrink-0 text-gray-400 font-semibold text-lg">Metinvest</div>
                <div class="flex-shrink-0 text-gray-400 font-semibold text-lg">Aptiv PLC</div>
                <div class="flex-shrink-0 text-gray-400 font-semibold text-lg">Toyota Material Handling</div>
                <div class="flex-shrink-0 text-gray-400 font-semibold text-lg">Cooper&Hunter</div>
                <div class="flex-shrink-0 text-gray-400 font-semibold text-lg">EasyLoad</div>
                <div class="flex-shrink-0 text-gray-400 font-semibold text-lg">Loadaza</div>
                <div class="flex-shrink-0 text-gray-400 font-semibold text-lg">Darkstore</div>
                <div class="flex-shrink-0 text-gray-400 font-semibold text-lg">Makeit.io</div>
            </div>
        </div>
    </div>
</section>

<!-- Our Expertise Section -->
<section class="py-20">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl lg:text-5xl font-bold text-white mb-4">Our Expertise</h2>
        </div>
        
        <div class="grid lg:grid-cols-2 xl:grid-cols-3 gap-8">
            <!-- Service Card 1: Software -->
            <div class="service-card group">
                <div class="flex items-start space-x-4 mb-6">
                    <div class="flex-shrink-0">
                        <span class="text-2xl font-bold text-orange-500">01/</span>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-white mb-2">Software</h3>
                        <div class="space-y-1 text-sm text-gray-400">
                            <div>Chicago</div>
                            <div>New York</div>
                            <div>Houston</div>
                        </div>
                    </div>
                </div>
                
                <div class="space-y-3 mb-6">
                    <div class="text-gray-300">IT Consulting</div>
                    <div class="text-gray-300">Scoping Session</div>
                    <div class="text-gray-300">Product Development</div>
                    <div class="text-gray-300">Product Management</div>
                    <div class="text-gray-300">MVP Development</div>
                    <div class="text-gray-300">Maintenance & Support</div>
                    <div class="text-gray-300">SaaS</div>
                </div>
                
                <p class="text-gray-400 text-sm mb-6">
                    Streamline all your interactions with customers through the launch of an individual CRM system made by WEZOM.
                </p>
                
                <a href="#" class="text-orange-500 font-medium text-sm hover:text-orange-400 transition-colors">
                    Learn more
                </a>
            </div>
            
            <!-- Service Card 2: Web Development -->
            <div class="service-card group">
                <div class="flex items-start space-x-4 mb-6">
                    <div class="flex-shrink-0">
                        <span class="text-2xl font-bold text-orange-500">02/</span>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-white mb-2">Web Development</h3>
                    </div>
                </div>
                
                <div class="space-y-3 mb-6">
                    <div class="text-gray-300">Web Applications</div>
                    <div class="text-gray-300">Front-End Development</div>
                    <div class="text-gray-300">Progressive Web Applications</div>
                    <div class="text-gray-300">Single Page Application</div>
                    <div class="text-gray-300">Web Portals</div>
                    <div class="text-gray-300">Corporate Websites</div>
                </div>
                
                <p class="text-gray-400 text-sm mb-6">
                    Leverage next-generation expertise to develop and app, complete a startup foundation, or build a new solution from scratch
                </p>
                
                <a href="#" class="text-orange-500 font-medium text-sm hover:text-orange-400 transition-colors">
                    Learn more
                </a>
            </div>
            
            <!-- Service Card 3: Mobile App Development -->
            <div class="service-card group">
                <div class="flex items-start space-x-4 mb-6">
                    <div class="flex-shrink-0">
                        <span class="text-2xl font-bold text-orange-500">03/</span>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-white mb-2">Mobile App Development</h3>
                    </div>
                </div>
                
                <div class="space-y-3 mb-6">
                    <div class="text-gray-300">iOS App</div>
                    <div class="text-gray-300">Android App</div>
                    <div class="text-gray-300">Flutter</div>
                    <div class="text-gray-300">Cross-platform</div>
                    <div class="text-gray-300">AR/VR App Development</div>
                    <div class="text-gray-300">Wearable Solutions</div>
                </div>
                
                <p class="text-gray-400 text-sm mb-6">
                    Create a feature-rich mobile app that runs on clean code and integrates with the most appropriate additions and plugins.
                </p>
                
                <a href="#" class="text-orange-500 font-medium text-sm hover:text-orange-400 transition-colors">
                    Learn more
                </a>
            </div>
            
            <!-- Service Card 4: Data Science & AI -->
            <div class="service-card group">
                <div class="flex items-start space-x-4 mb-6">
                    <div class="flex-shrink-0">
                        <span class="text-2xl font-bold text-orange-500">04/</span>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-white mb-2">Data Science & AI</h3>
                    </div>
                </div>
                
                <div class="space-y-3 mb-6">
                    <div class="text-gray-300">AWS & Cloud</div>
                    <div class="text-gray-300">Big Data Solutions</div>
                    <div class="text-gray-300">IoT Development</div>
                    <div class="text-gray-300">NFT marketplace</div>
                    <div class="text-gray-300">Artificial Intelligence</div>
                    <div class="text-gray-300">DevOps Services</div>
                    <div class="text-gray-300">AI ChatBot</div>
                    <div class="text-gray-300">Generative AI</div>
                </div>
                
                <p class="text-gray-400 text-sm mb-6">
                    Make every business decision a data-driven one with stats, insights and analysis that positions you ahead of the competition
                </p>
                
                <a href="#" class="text-orange-500 font-medium text-sm hover:text-orange-400 transition-colors">
                    Learn more
                </a>
            </div>
            
            <!-- Service Card 5: QA & Software Testing -->
            <div class="service-card group">
                <div class="flex items-start space-x-4 mb-6">
                    <div class="flex-shrink-0">
                        <span class="text-2xl font-bold text-orange-500">05/</span>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-white mb-2">QA & Software Testing</h3>
                    </div>
                </div>
                
                <div class="space-y-3 mb-6">
                    <div class="text-gray-300">Test Automation</div>
                    <div class="text-gray-300">Cybersecurity</div>
                    <div class="text-gray-300">Functional Testing</div>
                    <div class="text-gray-300">Performance Testing</div>
                    <div class="text-gray-300">Mobile App Testing</div>
                    <div class="text-gray-300">QA Consulting</div>
                    <div class="text-gray-300">Load Testing Services</div>
                </div>
                
                <p class="text-gray-400 text-sm mb-6">
                    Ensure the fault tolerance, stability, and correct operation of your digital solution with software QA testing services by WEZOM
                </p>
                
                <a href="#" class="text-orange-500 font-medium text-sm hover:text-orange-400 transition-colors">
                    Learn more
                </a>
            </div>
            
            <!-- Service Card 6: UX/UI Design -->
            <div class="service-card group">
                <div class="flex items-start space-x-4 mb-6">
                    <div class="flex-shrink-0">
                        <span class="text-2xl font-bold text-orange-500">06/</span>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-white mb-2">UX/UI Design</h3>
                    </div>
                </div>
                
                <div class="space-y-3 mb-6">
                    <div class="text-gray-300">UX Review</div>
                    <div class="text-gray-300">Product Design</div>
                    <div class="text-gray-300">Rapid UX Prototyping</div>
                    <div class="text-gray-300">Mobile App Design</div>
                    <div class="text-gray-300">Web Design Services</div>
                </div>
                
                <p class="text-gray-400 text-sm mb-6">
                    Get a UI/UX design inspired by the desires and needs of your users by entrusting its implementation to WEZOM experts.
                </p>
                
                <a href="#" class="text-orange-500 font-medium text-sm hover:text-orange-400 transition-colors">
                    Learn more
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Case Studies Section -->
<section class="py-20 bg-gray-900/30">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl lg:text-5xl font-bold text-white mb-8">Case Studies</h2>
            
            <!-- Filter Tags -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                <span class="px-4 py-2 bg-orange-500 text-white rounded-full text-sm font-medium">All cases</span>
                <span class="px-4 py-2 bg-gray-800 text-gray-300 rounded-full text-sm font-medium hover:bg-gray-700 cursor-pointer">QA & Software Testing</span>
                <span class="px-4 py-2 bg-gray-800 text-gray-300 rounded-full text-sm font-medium hover:bg-gray-700 cursor-pointer">Web & Mobile Development</span>
                <span class="px-4 py-2 bg-gray-800 text-gray-300 rounded-full text-sm font-medium hover:bg-gray-700 cursor-pointer">Custom Software</span>
                <span class="px-4 py-2 bg-gray-800 text-gray-300 rounded-full text-sm font-medium hover:bg-gray-700 cursor-pointer">AI/GenAI</span>
                <span class="px-4 py-2 bg-gray-800 text-gray-300 rounded-full text-sm font-medium hover:bg-gray-700 cursor-pointer">Product design</span>
                <span class="px-4 py-2 bg-gray-800 text-gray-300 rounded-full text-sm font-medium hover:bg-gray-700 cursor-pointer">UX/UI Design</span>
            </div>
        </div>
        
        <div class="grid lg:grid-cols-2 gap-8">
            <!-- Case Study 1 -->
            <div class="wezom-card-bg rounded-2xl p-8 group hover:transform hover:scale-105 transition-all duration-300">
                <div class="flex flex-wrap gap-2 mb-4">
                    <span class="px-3 py-1 bg-blue-500/20 text-blue-400 rounded-full text-xs font-medium">eCommerce</span>
                </div>
                
                <h3 class="text-xl font-bold text-white mb-4">
                    KSD: new eCommerce platform for the largest Ukrainian bookstore
                </h3>
                
                <div class="grid grid-cols-2 gap-6 mb-6">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-orange-500 mb-1">50 thousand</div>
                        <div class="text-sm text-gray-400">iOS app downloads in 3 months</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-orange-500 mb-1">40+</div>
                        <div class="text-sm text-gray-400">physical KSD bookstores full synced with online sales</div>
                    </div>
                </div>
                
                <div class="flex flex-wrap gap-2">
                    <span class="px-3 py-1 bg-gray-700 text-gray-300 rounded-full text-xs">Custom Software</span>
                    <span class="px-3 py-1 bg-gray-700 text-gray-300 rounded-full text-xs">Web & Mobile Development</span>
                </div>
            </div>
            
            <!-- Case Study 2 -->
            <div class="wezom-card-bg rounded-2xl p-8 group hover:transform hover:scale-105 transition-all duration-300">
                <div class="flex flex-wrap gap-2 mb-4">
                    <span class="px-3 py-1 bg-purple-500/20 text-purple-400 rounded-full text-xs font-medium">Manufacturing</span>
                </div>
                
                <h3 class="text-xl font-bold text-white mb-4">
                    AeroIntel AI: Analytical software solution for UAV operators
                </h3>
                
                <div class="grid grid-cols-3 gap-4 mb-6">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-orange-500 mb-1">0.3 s/image</div>
                        <div class="text-sm text-gray-400">inference speed</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-orange-500 mb-1">90%</div>
                        <div class="text-sm text-gray-400">automation analyst effort reduced through AI</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-orange-500 mb-1">Full adaptation</div>
                        <div class="text-sm text-gray-400">of the model to new datasets</div>
                    </div>
                </div>
                
                <div class="flex flex-wrap gap-2">
                    <span class="px-3 py-1 bg-gray-700 text-gray-300 rounded-full text-xs">AI/GenAI</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="py-20">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <!-- Left Content -->
            <div>
                <h2 class="text-4xl lg:text-5xl font-bold text-white mb-6">
                    Software Company WEZOM
                </h2>
                <p class="text-xl text-gray-300 mb-8">
                    Our objective is to develop a profitable and effective solution that helps clients to expand their businesses and overcome financial constraints. We are committed to exceptional service and utilizing all resources to bring the finest products & services.
                </p>
                <a href="#" class="wezom-btn-primary inline-block">About us</a>
            </div>
            
            <!-- Right Stats -->
            <div class="grid grid-cols-2 gap-8">
                <div class="text-center">
                    <div class="text-4xl font-bold text-orange-500 mb-2">25+</div>
                    <div class="text-gray-400 font-medium">Experience</div>
                    <div class="text-sm text-gray-500">years of active, market-driven experience under our belt.</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-orange-500 mb-2">250+</div>
                    <div class="text-gray-400 font-medium">Clients</div>
                    <div class="text-sm text-gray-500">satisfied clients with at least a 3-year collaboration record.</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-orange-500 mb-2">275+</div>
                    <div class="text-gray-400 font-medium">Team</div>
                    <div class="text-sm text-gray-500">certified full-time pros with field experience on board.</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-orange-500 mb-2">3,500+</div>
                    <div class="text-gray-400 font-medium">Projects</div>
                    <div class="text-sm text-gray-500">projects finished with at least an x2 average annual revenue boost.</div>
                </div>
            </div>
        </div>
        
        <!-- Certifications -->
        <div class="mt-16 text-center">
            <div class="inline-flex items-center px-6 py-3 bg-gray-800 rounded-lg">
                <span class="text-green-400 mr-2">✓</span>
                <span class="text-white font-medium">ISO 27001-certified</span>
            </div>
            <p class="text-gray-400 mt-4">IT designs that protect data and enable secure internal management</p>
        </div>
    </div>
</section>

<!-- Digital Transformation Section -->
<section class="py-20 bg-gray-900/30">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl lg:text-5xl font-bold text-white mb-4">
                Digital transformation for industries
            </h2>
            <p class="text-xl text-gray-300 max-w-3xl mx-auto mb-8">
                Wezom is your one-stop software development company, offering a full range of services for all industries. We drive your business progress with smart tech decisions tailored to a specific field.
            </p>
            <a href="#" class="wezom-btn-primary">Discover More</a>
        </div>
        
        <!-- Industries Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6">
            <!-- Industry items -->
            <div class="interactive-card text-center group">
                <h3 class="font-semibold text-white mb-2">Oil & Gas</h3>
                <p class="text-sm text-gray-400 mb-4">For the oil and gas industry, we create custom asset management systems, drilling optimization tools, remote monitoring platforms...</p>
                <a href="#" class="text-orange-500 text-sm font-medium">Learn more</a>
            </div>
            
            <div class="interactive-card text-center group">
                <h3 class="font-semibold text-white mb-2">Energy and Utilities</h3>
                <p class="text-sm text-gray-400 mb-4">We build smart grid management systems, renewable energy analytics platforms, and energy efficiency optimization tools...</p>
                <a href="#" class="text-orange-500 text-sm font-medium">Learn more</a>
            </div>
            
            <div class="interactive-card text-center group">
                <h3 class="font-semibold text-white mb-2">Logistics</h3>
                <p class="text-sm text-gray-400 mb-4">From route optimization algorithms and fleet management systems to supply chain tracking platforms...</p>
                <a href="#" class="text-orange-500 text-sm font-medium">Learn more</a>
            </div>
            
            <div class="interactive-card text-center group">
                <h3 class="font-semibold text-white mb-2">eCommerce</h3>
                <p class="text-sm text-gray-400 mb-4">Get tailored commerce-tuned software solutions, including online storefronts, inventory management systems...</p>
                <a href="#" class="text-orange-500 text-sm font-medium">Learn more</a>
            </div>
            
            <div class="interactive-card text-center group">
                <h3 class="font-semibold text-white mb-2">Healthcare</h3>
                <p class="text-sm text-gray-400 mb-4">Power healthcare service provision with advanced software solutions, like electronic health record (EHR) systems...</p>
                <a href="#" class="text-orange-500 text-sm font-medium">Learn more</a>
            </div>
        </div>
    </div>
</section>

<!-- Process Section -->
<section class="py-20">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl lg:text-5xl font-bold text-white mb-4">
                How we build the software development process
            </h2>
            <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                We'll turn your custom tech solutions into powerful brands by crafting unique customer experiences at every digital touchpoint with:
            </p>
        </div>
        
        <!-- Process Steps -->
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center group">
                <div class="w-16 h-16 bg-orange-500 rounded-full flex items-center justify-center text-white font-bold text-xl mx-auto mb-4">01</div>
                <h3 class="text-lg font-semibold text-white mb-2">Discovery Phase</h3>
            </div>
            <div class="text-center group">
                <div class="w-16 h-16 bg-orange-500 rounded-full flex items-center justify-center text-white font-bold text-xl mx-auto mb-4">02</div>
                <h3 class="text-lg font-semibold text-white mb-2">UX/UI Design</h3>
            </div>
            <div class="text-center group">
                <div class="w-16 h-16 bg-orange-500 rounded-full flex items-center justify-center text-white font-bold text-xl mx-auto mb-4">03</div>
                <h3 class="text-lg font-semibold text-white mb-2">Web development</h3>
            </div>
            <div class="text-center group">
                <div class="w-16 h-16 bg-orange-500 rounded-full flex items-center justify-center text-white font-bold text-xl mx-auto mb-4">04</div>
                <h3 class="text-lg font-semibold text-white mb-2">Mobile Development</h3>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-20 bg-gray-900/30">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl lg:text-5xl font-bold text-white mb-4">What clients say</h2>
            <div class="flex justify-center space-x-8 mb-8">
                <div class="text-center">
                    <div class="text-orange-500 font-bold mb-2">Top Rated</div>
                    <div class="text-sm text-gray-400">The highest quality results and client satisfaction</div>
                </div>
                <div class="text-center">
                    <div class="text-orange-500 font-bold mb-2">Excellent mobile</div>
                    <div class="text-sm text-gray-400">Top App Development Companies in Ukraine 2021</div>
                </div>
            </div>
        </div>
        
        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Testimonial 1 -->
            <div class="wezom-card-bg rounded-2xl p-8">
                <div class="mb-6">
                    <h4 class="text-white font-semibold mb-2">Peter Sachse</h4>
                    <div class="text-gray-400 text-sm mb-4">Peter Sachse</div>
                    <p class="text-gray-300 text-sm">
                        We chose WEZOM amongst other companies because they provided prototypes of future systems and we had a clear understanding of what the finished product would look like. We worked with the team on several projects, including the development of a CRM with adaptation for desktop and mobile versions, as well as the creation of a suite of server applications that are available on iOS, Android, and online. We are very pleased with the results and the flexibility of the WEZOM team.
                    </p>
                </div>
                <a href="#" class="text-orange-500 text-sm font-medium">Read more</a>
            </div>
            
            <!-- Testimonial 2 -->
            <div class="wezom-card-bg rounded-2xl p-8">
                <div class="mb-6">
                    <h4 class="text-white font-semibold mb-2">Kyle</h4>
                    <div class="text-gray-400 text-sm mb-4">DRAGI</div>
                    <p class="text-gray-300 text-sm">
                        I am very satisfied wit the work process and project management. Everything was clear, on time and I had nothing specific to add. Yes, we are satisfied with the result of the work and the product meets the goals set. I can't wait to continue our work on the app.
                    </p>
                </div>
                <a href="#" class="text-orange-500 text-sm font-medium">Read more</a>
            </div>
            
            <!-- Testimonial 3 -->
            <div class="wezom-card-bg rounded-2xl p-8">
                <div class="mb-6">
                    <h4 class="text-white font-semibold mb-2">Daniel Mailovsky</h4>
                    <div class="text-gray-400 text-sm mb-4">Daniel Mailovsky</div>
                    <p class="text-gray-300 text-sm">
                        Thanks to WEZOM, our sales increased by 65% and conversions increased by 150%. The team fully developed an online store for us, with 1C and amoCRM integrations. The guys conducted a market analysis, created a mind map with all the functions of the future site, and argued for each element of development. Everything was transparent, and the quality was high.
                    </p>
                </div>
                <a href="#" class="text-orange-500 text-sm font-medium">Read more</a>
            </div>
        </div>
    </div>
</section>

<!-- Awards Section -->
<section class="py-16">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold text-white mb-4">We've Been Awarded Plenty for the Milestones We Have Achieved</h2>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8 items-center">
            <div class="text-center">
                <div class="text-gray-400 font-semibold text-sm">Top 100 EdTech Software Developers 2025</div>
            </div>
            <div class="text-center">
                <div class="text-gray-400 font-semibold text-sm">2023 Award-winning company</div>
            </div>
            <div class="text-center">
                <div class="text-gray-400 font-semibold text-sm">Inc. 5000 2024</div>
            </div>
            <div class="text-center">
                <div class="text-gray-400 font-semibold text-sm">Best of 2024 Software Company Schaumburg, IL</div>
            </div>
            <div class="text-center">
                <div class="text-gray-400 font-semibold text-sm">Forbes Council</div>
            </div>
            <div class="text-center">
                <div class="text-gray-400 font-semibold text-sm">TOP USA awards</div>
            </div>
        </div>
    </div>
</section>

<!-- Technology Stack Section -->
<section class="py-20 bg-gray-900/30">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl lg:text-5xl font-bold text-white mb-8">Technology stack</h2>
            <a href="#" class="wezom-btn-primary">Discover More</a>
        </div>
        
        <div class="grid lg:grid-cols-2 gap-12">
            <!-- Front-End Technologies -->
            <div class="wezom-card-bg rounded-2xl p-8">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-bold text-white">Front-End</h3>
                    <span class="text-orange-500 font-semibold">44 Developers</span>
                </div>
                <div class="grid grid-cols-3 gap-4">
                    <div class="text-center p-3 bg-gray-800/50 rounded-lg">
                        <div class="text-white font-medium text-sm">Turborepo</div>
                    </div>
                    <div class="text-center p-3 bg-gray-800/50 rounded-lg">
                        <div class="text-white font-medium text-sm">GraphQL</div>
                    </div>
                    <div class="text-center p-3 bg-gray-800/50 rounded-lg">
                        <div class="text-white font-medium text-sm">React hook form</div>
                    </div>
                    <div class="text-center p-3 bg-gray-800/50 rounded-lg">
                        <div class="text-white font-medium text-sm">Ant Design</div>
                    </div>
                    <div class="text-center p-3 bg-gray-800/50 rounded-lg">
                        <div class="text-white font-medium text-sm">Material UI</div>
                    </div>
                    <div class="text-center p-3 bg-gray-800/50 rounded-lg">
                        <div class="text-white font-medium text-sm">Apollo Client</div>
                    </div>
                    <div class="text-center p-3 bg-gray-800/50 rounded-lg">
                        <div class="text-white font-medium text-sm">React.js</div>
                    </div>
                    <div class="text-center p-3 bg-gray-800/50 rounded-lg">
                        <div class="text-white font-medium text-sm">REST API</div>
                    </div>
                    <div class="text-center p-3 bg-gray-800/50 rounded-lg">
                        <div class="text-white font-medium text-sm">TypeScript</div>
                    </div>
                </div>
            </div>
            
            <!-- Back-End Technologies -->
            <div class="wezom-card-bg rounded-2xl p-8">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-bold text-white">Back-End</h3>
                    <span class="text-orange-500 font-semibold">55 Developers</span>
                </div>
                <div class="grid grid-cols-3 gap-4">
                    <div class="text-center p-3 bg-gray-800/50 rounded-lg">
                        <div class="text-white font-medium text-sm">Python</div>
                    </div>
                    <div class="text-center p-3 bg-gray-800/50 rounded-lg">
                        <div class="text-white font-medium text-sm">Scala</div>
                    </div>
                    <div class="text-center p-3 bg-gray-800/50 rounded-lg">
                        <div class="text-white font-medium text-sm">Java</div>
                    </div>
                    <div class="text-center p-3 bg-gray-800/50 rounded-lg">
                        <div class="text-white font-medium text-sm">Node.js</div>
                    </div>
                    <div class="text-center p-3 bg-gray-800/50 rounded-lg">
                        <div class="text-white font-medium text-sm">PHP</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection