@extends('layouts.website')

@section('title', 'WEZOM - IT Partner')
@section('description', 'WEZOM - Your trusted IT partner for software development, web development, mobile app development, and more.')

@section('content')
<!-- Hero Section -->
<section class="wezom-dark-bg min-h-screen flex items-center relative overflow-hidden">
    <!-- Enhanced 3D Geometric Mesh Background - Exact match from image -->
    <div class="absolute right-0 top-0 w-3/5 h-full flex items-center justify-center">
        <div class="relative w-full h-full">
            <!-- Advanced 3D Mesh Pattern -->
            <svg class="absolute inset-0 w-full h-full" viewBox="0 0 800 600" fill="none" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <!-- Enhanced Gradients for 3D Effect -->
                    <linearGradient id="meshOrange1" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#ff6b35;stop-opacity:0.9" />
                        <stop offset="50%" style="stop-color:#ff8c42;stop-opacity:0.7" />
                        <stop offset="100%" style="stop-color:#d2691e;stop-opacity:0.5" />
                    </linearGradient>
                    <linearGradient id="meshOrange2" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#ff8c42;stop-opacity:0.8" />
                        <stop offset="50%" style="stop-color:#ff6b35;stop-opacity:0.6" />
                        <stop offset="100%" style="stop-color:#f7931e;stop-opacity:0.4" />
                    </linearGradient>
                    <linearGradient id="meshDark1" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#1a0f08;stop-opacity:0.9" />
                        <stop offset="100%" style="stop-color:#2d1810;stop-opacity:0.7" />
                    </linearGradient>
                    <linearGradient id="meshDark2" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#0a0a0a;stop-opacity:0.8" />
                        <stop offset="100%" style="stop-color:#1a1a1a;stop-opacity:0.6" />
                    </linearGradient>
                </defs>
                
                <!-- Complex 3D Mesh Structure -->
                <!-- Main triangular network -->
                <polygon points="300,80 400,160 250,180" fill="url(#meshOrange1)" stroke="#ff6b35" stroke-width="1.5" opacity="0.8"/>
                <polygon points="400,160 500,240 350,260" fill="url(#meshOrange2)" stroke="#ff6b35" stroke-width="1.5" opacity="0.7"/>
                <polygon points="250,180 350,260 200,280" fill="url(#meshDark1)" stroke="#ff6b35" stroke-width="1" opacity="0.6"/>
                
                <!-- Central complex structure -->
                <polygon points="350,260 450,340 300,360" fill="url(#meshOrange1)" stroke="#ff6b35" stroke-width="1.5" opacity="0.9"/>
                <polygon points="450,340 550,420 400,440" fill="url(#meshDark2)" stroke="#ff6b35" stroke-width="1" opacity="0.5"/>
                <polygon points="300,360 400,440 250,460" fill="url(#meshOrange2)" stroke="#ff6b35" stroke-width="1.5" opacity="0.8"/>
                
                <!-- Right side extensions -->
                <polygon points="500,240 600,320 450,340" fill="url(#meshOrange2)" stroke="#ff6b35" stroke-width="1.5" opacity="0.7"/>
                <polygon points="600,320 700,400 550,420" fill="url(#meshDark1)" stroke="#ff6b35" stroke-width="1" opacity="0.6"/>
                <polygon points="700,400 750,480 650,500" fill="url(#meshOrange1)" stroke="#ff6b35" stroke-width="1" opacity="0.4"/>
                
                <!-- Upper network -->
                <polygon points="400,60 500,140 350,160" fill="url(#meshOrange2)" stroke="#ff6b35" stroke-width="1.5" opacity="0.8"/>
                <polygon points="500,140 600,220 450,240" fill="url(#meshDark2)" stroke="#ff6b35" stroke-width="1" opacity="0.5"/>
                <polygon points="600,220 700,300 550,320" fill="url(#meshOrange1)" stroke="#ff6b35" stroke-width="1.5" opacity="0.7"/>
                
                <!-- Lower extensions -->
                <polygon points="250,460 350,540 200,560" fill="url(#meshDark1)" stroke="#ff6b35" stroke-width="1" opacity="0.5"/>
                <polygon points="400,440 500,520 350,540" fill="url(#meshOrange2)" stroke="#ff6b35" stroke-width="1.5" opacity="0.6"/>
                <polygon points="550,420 650,500 500,520" fill="url(#meshOrange1)" stroke="#ff6b35" stroke-width="1" opacity="0.7"/>
                
                <!-- Connection nodes with glow -->
                <circle cx="300" cy="80" r="3" fill="#ff6b35" opacity="1">
                    <animate attributeName="r" values="3;5;3" dur="3s" repeatCount="indefinite"/>
                </circle>
                <circle cx="400" cy="160" r="3" fill="#ff6b35" opacity="1">
                    <animate attributeName="r" values="3;4;3" dur="2s" repeatCount="indefinite"/>
                </circle>
                <circle cx="500" cy="240" r="3" fill="#ff6b35" opacity="1">
                    <animate attributeName="r" values="3;5;3" dur="2.5s" repeatCount="indefinite"/>
                </circle>
                <circle cx="350" cy="260" r="4" fill="#ff8c42" opacity="1">
                    <animate attributeName="r" values="4;6;4" dur="3s" repeatCount="indefinite"/>
                </circle>
                <circle cx="450" cy="340" r="4" fill="#ff6b35" opacity="1">
                    <animate attributeName="r" values="4;6;4" dur="2.8s" repeatCount="indefinite"/>
                </circle>
                <circle cx="600" cy="320" r="3" fill="#ff6b35" opacity="1"/>
                <circle cx="700" cy="400" r="3" fill="#ff6b35" opacity="0.8"/>
                <circle cx="300" cy="360" r="3" fill="#ff8c42" opacity="1"/>
                <circle cx="400" cy="440" r="3" fill="#ff6b35" opacity="1"/>
                <circle cx="500" cy="520" r="3" fill="#ff6b35" opacity="0.8"/>
                
                <!-- Dynamic connecting lines -->
                <line x1="300" y1="80" x2="400" y2="160" stroke="#ff6b35" stroke-width="1.5" opacity="0.7">
                    <animate attributeName="opacity" values="0.7;1;0.7" dur="2s" repeatCount="indefinite"/>
                </line>
                <line x1="400" y1="160" x2="500" y2="240" stroke="#ff6b35" stroke-width="1.5" opacity="0.6">
                    <animate attributeName="opacity" values="0.6;0.9;0.6" dur="2.5s" repeatCount="indefinite"/>
                </line>
                <line x1="350" y1="260" x2="450" y2="340" stroke="#ff8c42" stroke-width="2" opacity="0.8">
                    <animate attributeName="opacity" values="0.8;1;0.8" dur="3s" repeatCount="indefinite"/>
                </line>
                <line x1="500" y1="240" x2="600" y2="320" stroke="#ff6b35" stroke-width="1.5" opacity="0.5"/>
                <line x1="600" y1="320" x2="700" y2="400" stroke="#ff6b35" stroke-width="1" opacity="0.4"/>
                <line x1="250" y1="180" x2="350" y2="260" stroke="#ff6b35" stroke-width="1" opacity="0.5"/>
                <line x1="300" y1="360" x2="400" y2="440" stroke="#ff6b35" stroke-width="1" opacity="0.6"/>
                <line x1="400" y1="440" x2="500" y2="520" stroke="#ff6b35" stroke-width="1" opacity="0.5"/>
            </svg>
        </div>
    </div>
    
    <!-- Showreel Button -->
    <div class="absolute top-28 left-8 z-20 floating-element">
        <div class="flex items-center space-x-3 cursor-pointer group">
            <div class="w-14 h-14 rounded-full border-2 border-orange-400 flex items-center justify-center hover:bg-orange-400 hover:border-orange-500 transition-all duration-300 glow-effect group-hover:scale-110">
                <svg class="w-6 h-6 text-orange-400 group-hover:text-white ml-1 transition-colors duration-300" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M8 5v14l11-7z"/>
                </svg>
            </div>
            <span class="text-white font-medium text-sm tracking-wider uppercase group-hover:text-orange-400 transition-colors duration-300">SHOWREEL</span>
        </div>
    </div>

    <!-- Main Content -->
    <div class="relative z-10 w-full h-full flex items-center">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center min-h-screen">
                <!-- Left Content - Text -->
                <div class="lg:col-span-7 space-y-8 animate-on-scroll">
                    <div>
                        <h1 class="text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-bold text-white leading-tight">
                            <span class="inline-block" style="animation: text-reveal 0.8s ease-out forwards; animation-delay: 0.2s; opacity: 0;">Software Delivery</span><br>
                            <span class="wezom-orange-text inline-block" style="animation: text-reveal 0.8s ease-out forwards; animation-delay: 0.6s; opacity: 0;">Driving Business</span><br>
                            <span class="wezom-orange-text inline-block" style="animation: text-reveal 0.8s ease-out forwards; animation-delay: 0.8s; opacity: 0;">Growth</span>
                        </h1>
                    </div>
                    
                    <p class="text-lg md:text-xl text-gray-300 max-w-xl leading-relaxed uppercase tracking-wide font-medium" style="animation: text-reveal 0.8s ease-out forwards; animation-delay: 1.2s; opacity: 0;">
                        PARTNER WITH DEDICATED IT EXPERTS WHO 'GET' YOUR BUSINESS
                    </p>
                </div>

                <!-- Right Content - Stats & Get Started Button -->
                <div class="lg:col-span-5 flex flex-col items-end space-y-8">
                    <!-- Stats Badge -->
                    <div class="floating-element" style="animation: scale-in 0.8s ease-out forwards; animation-delay: 1.0s; opacity: 0;">
                        <div class="bg-gradient-to-r from-orange-500 to-orange-600 text-white px-6 py-3 rounded-full shadow-lg">
                            <div class="text-center">
                                <div class="text-2xl md:text-3xl font-bold">250+</div>
                                <div class="text-xs md:text-sm uppercase tracking-wider">full-time professionals on staff</div>
                            </div>
                        </div>
                    </div>

                    <!-- Get Started Button -->
                    <div class="text-center floating-element" style="animation: scale-in 0.8s ease-out forwards; animation-delay: 1.4s; opacity: 0;">
                        <a href="{{ route('contact') }}" class="inline-block group">
                            <div class="w-32 h-32 md:w-36 md:h-36 rounded-full wezom-gradient flex items-center justify-center mb-4 shadow-2xl group-hover:scale-110 transition-all duration-300 glow-effect">
                                <svg class="w-8 h-8 text-white group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </div>
                            <span class="text-white font-bold text-sm tracking-widest uppercase group-hover:text-orange-400 transition-colors duration-300">GET STARTED</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Key Clients Indicator -->
    <div class="absolute bottom-8 left-8 z-20 floating-element">
        <div class="flex items-center space-x-3 cursor-pointer group">
            <div class="w-3 h-3 bg-white rounded-full glow-effect group-hover:scale-150 transition-transform duration-300"></div>
            <span class="text-white text-sm tracking-wider font-medium uppercase group-hover:text-orange-400 transition-colors duration-300">KEY CLIENTS</span>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="wezom-dark-bg py-20 relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="geometric-bg h-full w-full"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
            <div class="interactive-card p-6 rounded-lg animate-on-scroll">
                <div class="text-5xl font-bold wezom-orange-text mb-2 counter-number" data-count="3500">0+</div>
                <div class="text-gray-300 uppercase tracking-wider text-sm">Implemented projects in IT</div>
            </div>
            <div class="interactive-card p-6 rounded-lg animate-on-scroll">
                <div class="text-5xl font-bold wezom-orange-text mb-2 counter-number" data-count="24">0+</div>
                <div class="text-gray-300 uppercase tracking-wider text-sm">years of experience</div>
            </div>
            <div class="interactive-card p-6 rounded-lg animate-on-scroll">
                <div class="text-5xl font-bold wezom-orange-text mb-2 counter-number" data-count="250">0+</div>
                <div class="text-gray-300 uppercase tracking-wider text-sm">full-time professionals on staff</div>
            </div>
            <div class="interactive-card p-6 rounded-lg animate-on-scroll">
                <div class="text-5xl font-bold wezom-orange-text mb-2 counter-number" data-count="3500">0+</div>
                <div class="text-gray-300 uppercase tracking-wider text-sm">Implemented projects in IT</div>
            </div>
        </div>
    </div>
</section>

<!-- Key Clients Section -->
<section class="wezom-dark-bg py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Key clients</h2>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8 items-center">
            @foreach($clients as $client)
            <div class="text-center">
                @if($client->logo)
                    <img src="{{ $client->logo }}" alt="{{ $client->name }}" class="h-12 mx-auto opacity-60 hover:opacity-100 transition-opacity">
                @else
                    <div class="text-gray-400 font-semibold text-sm">{{ $client->name }}</div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Our Expertise Section -->
<section class="wezom-dark-bg py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Our Expertise</h2>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services as $index => $service)
            <div class="service-card wezom-gray-bg rounded-lg p-8 border border-gray-700">
                <div class="text-orange-400 text-4xl font-bold mb-4">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}/</div>
                <h3 class="text-xl font-semibold mb-4 text-white">{{ $service->title }}</h3>
                <p class="text-gray-300 mb-6">{{ $service->description }}</p>
                <div class="space-y-2">
                    @if($service->features)
                        @foreach(json_decode($service->features, true) as $feature)
                            <div class="flex items-center text-sm text-gray-300">
                                <svg class="w-4 h-4 text-orange-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $feature }}
                            </div>
                        @endforeach
                    @endif
                </div>
                <a href="{{ route('services') }}" class="inline-block mt-6 text-orange-400 hover:text-orange-300 font-semibold">
                    Learn more →
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Case Studies Section -->
<section class="wezom-dark-bg py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Case Studies</h2>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($caseStudies as $caseStudy)
            <div class="wezom-gray-bg rounded-lg shadow-lg overflow-hidden border border-gray-700">
                @if($caseStudy->image)
                    <img src="{{ $caseStudy->image }}" alt="{{ $caseStudy->title }}" class="w-full h-48 object-cover">
                @endif
                <div class="p-6">
                    <div class="flex items-center mb-2">
                        <span class="bg-orange-100 text-orange-800 text-xs font-semibold px-2.5 py-0.5 rounded">{{ $caseStudy->category }}</span>
                        <span class="bg-gray-100 text-gray-800 text-xs font-semibold px-2.5 py-0.5 rounded ml-2">{{ $caseStudy->industry }}</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-white">{{ $caseStudy->title }}</h3>
                    <p class="text-gray-300 mb-4">{{ $caseStudy->description }}</p>
                    @if($caseStudy->metrics)
                        <div class="space-y-2">
                            @foreach(json_decode($caseStudy->metrics, true) as $metric)
                                <div class="text-sm">
                                    <span class="font-semibold text-orange-400">{{ $metric['value'] }}</span>
                                    <span class="text-gray-300">{{ $metric['description'] }}</span>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="wezom-dark-bg py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Why choose us?</h2>
            <h3 class="text-2xl font-semibold text-white mb-4">Software Company WEZOM</h3>
            <p class="text-xl text-gray-300 max-w-4xl mx-auto">
                Our objective is to develop a profitable and effective solution that helps clients to expand their businesses and overcome financial constraints. We are committed to exceptional service and utilizing all resources to bring the finest products & services.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
            <div>
                <div class="text-4xl font-bold wezom-orange-text mb-2">25+</div>
                <div class="text-gray-300 mb-2">Experience</div>
                <div class="text-sm text-gray-400">years of active, market-driven experience under our belt.</div>
            </div>
            <div>
                <div class="text-4xl font-bold wezom-orange-text mb-2">250+</div>
                <div class="text-gray-300 mb-2">Clients</div>
                <div class="text-sm text-gray-400">satisfied clients with at least a 3-year collaboration record.</div>
            </div>
            <div>
                <div class="text-4xl font-bold wezom-orange-text mb-2">275+</div>
                <div class="text-gray-300 mb-2">Team</div>
                <div class="text-sm text-gray-400">certified full-time pros with field experience on board.</div>
            </div>
            <div>
                <div class="text-4xl font-bold wezom-orange-text mb-2">3,500+</div>
                <div class="text-gray-300 mb-2">Projects</div>
                <div class="text-sm text-gray-400">projects finished with at least an x2 average annual revenue boost.</div>
            </div>
        </div>
    </div>
</section>

<!-- Digital Transformation Section -->
<section class="wezom-dark-bg py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">We Will Help You</h2>
            <h3 class="text-2xl font-semibold text-white mb-4">Digital transformation for industries</h3>
            <p class="text-xl text-gray-300 max-w-4xl mx-auto">
                Wezom is your one-stop software development company, offering a full range of services for all industries. We drive your business progress with smart tech decisions tailored to a specific field.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="wezom-gray-bg rounded-lg p-6 border border-gray-700">
                <h3 class="text-lg font-semibold mb-3 text-white">Oil & Gas</h3>
                <p class="text-gray-300 text-sm">For the oil and gas industry, we create custom asset management systems, drilling optimization tools, remote monitoring platforms, and other solutions that enhance safety and maximize productivity through digitization and automation.</p>
                <a href="#" class="text-orange-400 hover:text-orange-300 text-sm font-semibold mt-4 inline-block">Learn more</a>
            </div>
            
            <div class="wezom-gray-bg rounded-lg p-6 border border-gray-700">
                <h3 class="text-lg font-semibold mb-3 text-white">Healthcare</h3>
                <p class="text-gray-300 text-sm">Power healthcare service provision with advanced software solutions, like electronic health record (EHR) systems, telemedicine platforms, and patient engagement applications for improved clinical workflows and enhanced patient outcomes.</p>
                <a href="#" class="text-orange-400 hover:text-orange-300 text-sm font-semibold mt-4 inline-block">Learn more</a>
            </div>
            
            <div class="wezom-gray-bg rounded-lg p-6 border border-gray-700">
                <h3 class="text-lg font-semibold mb-3 text-white">Fintech</h3>
                <p class="text-gray-300 text-sm">Get tailored software solutions for high-performance digital banking, payment processing, and robo-advisory purposes (e.g., chatbots and data analytics systems) — everything you need to organize a finance-based workflow.</p>
                <a href="#" class="text-orange-400 hover:text-orange-300 text-sm font-semibold mt-4 inline-block">Learn more</a>
            </div>
            
            <div class="wezom-gray-bg rounded-lg p-6 border border-gray-700">
                <h3 class="text-lg font-semibold mb-3 text-white">eCommerce</h3>
                <p class="text-gray-300 text-sm">Get tailored commerce-tuned software solutions, including online storefronts, inventory management systems, and personalized marketing automation tools, to help grab customers' attention and boost sales.</p>
                <a href="#" class="text-orange-400 hover:text-orange-300 text-sm font-semibold mt-4 inline-block">Learn more</a>
            </div>
            
            <div class="wezom-gray-bg rounded-lg p-6 border border-gray-700">
                <h3 class="text-lg font-semibold mb-3 text-white">Manufacturing</h3>
                <p class="text-gray-300 text-sm">Improve manufacturing processes across the board with tailored software like ERP systems, inventory management solutions, and predictive maintenance tools that optimize production and reduce downtime.</p>
                <a href="#" class="text-orange-400 hover:text-orange-300 text-sm font-semibold mt-4 inline-block">Learn more</a>
            </div>
            
            <div class="wezom-gray-bg rounded-lg p-6 border border-gray-700">
                <h3 class="text-lg font-semibold mb-3 text-white">Education</h3>
                <p class="text-gray-300 text-sm">Digitize educative workflows and content delivery efficiency with custom learning management solutions, student information hubs, and virtual classrooms that grant more student engagement and personalized learning experiences.</p>
                <a href="#" class="text-orange-400 hover:text-orange-300 text-sm font-semibold mt-4 inline-block">Learn more</a>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="wezom-dark-bg py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">contributing to the success</h2>
            <h3 class="text-2xl font-semibold text-white mb-4">What clients say</h3>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($testimonials as $testimonial)
            <div class="wezom-gray-bg rounded-lg p-8 border border-gray-700">
                <div class="flex items-center mb-4">
                    @for($i = 1; $i <= 5; $i++)
                        <svg class="w-5 h-5 {{ $i <= $testimonial->rating ? 'text-orange-400' : 'text-gray-600' }}" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    @endfor
                </div>
                <p class="text-gray-300 mb-6">"{{ $testimonial->testimonial }}"</p>
                <div class="flex items-center">
                    @if($testimonial->client_image)
                        <img src="{{ $testimonial->client_image }}" alt="{{ $testimonial->client_name }}" class="w-12 h-12 rounded-full mr-4">
                    @endif
                    <div>
                        <div class="font-semibold text-white">{{ $testimonial->client_name }}</div>
                        <div class="text-sm text-gray-400">{{ $testimonial->client_position }}, {{ $testimonial->client_company }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Technology Stack Section -->
<section class="wezom-dark-bg py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Technologies We Use</h2>
            <h3 class="text-2xl font-semibold text-white mb-4">Technology stack</h3>
        </div>
        
        @php
            $techCategories = $technologies->groupBy('category');
        @endphp
        
        @foreach($techCategories as $category => $techs)
        <div class="mb-12">
            <h3 class="text-2xl font-semibold mb-6 text-center text-white">{{ $category }}</h3>
            <div class="text-center mb-4">
                <span class="text-orange-400 font-semibold">{{ $techs->count() }} Developers</span>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                @foreach($techs as $tech)
                <div class="tech-item wezom-gray-bg rounded-lg p-4 text-center border border-gray-700">
                    <div class="text-2xl mb-2">{{ $tech->icon }}</div>
                    <div class="text-sm font-medium text-white">{{ $tech->name }}</div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</section>

<!-- Blog Section -->
<section class="wezom-dark-bg py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">The Blog</h2>
            <h3 class="text-2xl font-semibold text-white mb-4">INSIGHTS</h3>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($blogPosts as $post)
            <article class="wezom-gray-bg rounded-lg shadow-lg overflow-hidden border border-gray-700">
                @if($post->featured_image)
                    <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                @endif
                <div class="p-6">
                    <div class="flex items-center mb-2">
                        <span class="bg-orange-100 text-orange-800 text-xs font-semibold px-2.5 py-0.5 rounded">{{ $post->category }}</span>
                        <span class="text-gray-400 text-xs ml-2">{{ $post->published_at->format('M d, Y') }}</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-white">
                        <a href="{{ route('blog.show', $post) }}" class="hover:text-orange-400">{{ $post->title }}</a>
                    </h3>
                    <p class="text-gray-300 mb-4">{{ $post->excerpt }}</p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-400">By {{ $post->author }}</span>
                        <a href="{{ route('blog.show', $post) }}" class="text-orange-400 hover:text-orange-300 font-semibold">
                            Read more →
                        </a>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="wezom-dark-bg py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Check out some of the most common questions asked by the clients</h2>
            <h3 class="text-2xl font-semibold text-white mb-4">Questions about our Software Development Services</h3>
        </div>
        
        <div class="max-w-4xl mx-auto space-y-6">
            <div class="wezom-gray-bg rounded-lg p-6 border border-gray-700">
                <h4 class="text-lg font-semibold text-white mb-3">Does Wezom cover all software development life-cycle (SDLC) phases?</h4>
                <p class="text-gray-300">Providing end-to-end workflows with full SDLC handling is one of the main takeaways of our software development company. With over 275 highly skilled IT specialists — consultants, architects, programmers, data experts, cybersecurity specialists, DevOps experts, and QA professionals — we can safely and flexibly manage each project aspect, from discovery and requirements forming to software design, development, deployment, and ongoing support.</p>
            </div>
            
            <div class="wezom-gray-bg rounded-lg p-6 border border-gray-700">
                <h4 class="text-lg font-semibold text-white mb-3">How quickly can Wezom deliver a custom software solution?</h4>
                <p class="text-gray-300">The exact timeline for developing custom software is shaped by your project's complexity and scope of requirements. On average, we take: 2–3 months for the simplest solutions (e.g., one-pagers), 3–6 months for average-complexity projects (e.g., SMB ecommerce), 9+ months or more for complex projects (e.g., a feature-rich web app or an online marketplace).</p>
            </div>
            
            <div class="wezom-gray-bg rounded-lg p-6 border border-gray-700">
                <h4 class="text-lg font-semibold text-white mb-3">How does Wezom guarantee the quality of new software products?</h4>
                <p class="text-gray-300">We reserve quality assurance (QA) as a basic part of each and every product testing routine. For this, we adopt a proactive shift-left approach to QA, stick to international coding standards, and uphold a quality management system that complies with ISO 9001 standards.</p>
            </div>
        </div>
        
        <div class="text-center mt-12">
            <a href="{{ route('contact') }}" class="wezom-gradient text-white px-8 py-3 rounded-lg font-semibold hover:opacity-90 transition-opacity">
                Get in Touch
            </a>
        </div>
    </div>
</section>
@endsection