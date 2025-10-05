@extends('layouts.website')

@section('title', 'VanTroZ - Software Development Company')
@section('description', 'VanTroZ - IT partner. Driving Business Growth. Partner with dedicated IT experts who get your business.')

@section('content')
<!-- Advanced Hero Section with Video Background -->
<section class="relative h-[80vh] flex items-center overflow-hidden">

    <!-- Video Background -->
    <div class="absolute inset-0 w-full h-full">
        <video
            autoplay
            muted
            loop
            playsinline
            class="absolute inset-0 w-full h-full object-cover"
            poster="{{ asset('banner/home-poster.jpg') }}">
            <source src="{{ asset('banner/home.webm') }}" type="video/mp4">
            <!-- Fallback for browsers that don't support video -->
            <div class="absolute inset-0 bg-gradient-to-br from-orange-600 via-orange-700 to-orange-800"></div>
        </video>
    </div>

    <!-- Animated Background Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <!-- Floating Particles -->
        <div class="absolute top-1/4 left-1/4 w-2 h-2 bg-orange-400/30 rounded-full animate-pulse"></div>
        <div class="absolute top-1/3 right-1/3 w-1 h-1 bg-orange-400/40 rounded-full animate-ping"></div>
        <div class="absolute bottom-1/4 left-1/3 w-1.5 h-1.5 bg-orange-300/20 rounded-full animate-pulse" style="animation-delay: 1s;"></div>
        <div class="absolute top-1/2 right-1/4 w-1 h-1 bg-orange-300/30 rounded-full animate-ping" style="animation-delay: 2s;"></div>

        <!-- Geometric Shapes -->
        <div class="absolute top-20 right-20 w-32 h-32 border border-white/10 rounded-full animate-spin" style="animation-duration: 20s;"></div>
        <div class="absolute bottom-20 left-20 w-24 h-24 border border-orange-400/20 rounded-lg rotate-45 animate-pulse"></div>
    </div>

    <!-- Advanced Content Container -->
    <div class="container mx-auto px-4 lg:px-6 relative z-20">
        <div class="grid lg:grid-cols-12 gap-12 items-center py-16">

            <!-- Advanced Left Content -->
            <div class="lg:col-span-7 space-y-10 relative z-30">

                <!-- Advanced Hero Badge -->
                <div class="flex justify-start animate-fade-in-up">
                    <div class="group relative inline-flex items-center px-4 py-2 bg-gradient-to-r from-white/10 to-white/5 backdrop-blur-md border border-white/20 rounded-full text-white text-sm font-medium shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-r from-orange-500/20 to-orange-600/20 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="relative flex items-center">
                            <div class="w-2 h-2 bg-gradient-to-r from-orange-400 to-orange-500 rounded-full mr-2 animate-pulse"></div>
                            <span class="bg-gradient-to-r from-white to-slate-200 bg-clip-text text-transparent">Available for new projects</span>
                        </div>
                    </div>
                </div>

                <!-- Advanced Hero Headlines -->
                <div class="space-y-6 animate-fade-in-up" style="animation-delay: 0.2s;">
                    <h1 class="text-3xl md:text-2xl lg:text-3xl font-black text-white leading-none tracking-tight">
                        <span class="block">Build the</span>
                        <span class="block bg-gradient-to-r from-orange-400 via-orange-500 to-orange-600 bg-clip-text text-transparent animate-gradient-x">Future</span>
                        <span class="block">of Business</span>
                    </h1>

                    <!-- Advanced Hero Subtitle -->
                    <div class="max-w-2xl">
                        <p class="text-xl md:text-2xl text-slate-200 leading-relaxed font-light animate-fade-in-up" style="animation-delay: 0.4s;">
                            We craft <span class="text-white font-semibold">exceptional digital experiences</span> that transform ideas into powerful, scalable solutions that drive real business growth.
                        </p>
                    </div>

                    <!-- Advanced Feature Pills -->
                    <div class="flex flex-wrap gap-3 animate-fade-in-up" style="animation-delay: 0.6s;">
                        <div class="px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-sm text-slate-200 border border-white/20">
                            ⚡ Lightning Fast
                        </div>
                        <div class="px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-sm text-slate-200 border border-white/20">
                            🚀 Scalable Solutions
                        </div>
                        <div class="px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-sm text-slate-200 border border-white/20">
                            🎯 Results Driven
                        </div>
                    </div>

                    <!-- Advanced CTA Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-4 animate-fade-in-up" style="animation-delay: 0.8s;">
                        <button class="group relative inline-flex items-center px-8 py-4 bg-gradient-to-r from-white to-slate-100 text-slate-900 font-bold rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 hover:scale-105">
                            <div class="absolute inset-0 bg-gradient-to-r from-orange-500 to-orange-600 opacity-0 group-hover:opacity-10 transition-opacity duration-300"></div>
                            <span class="relative">Start Your Project</span>
                            <svg class="relative w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </button>
                        <button class="group relative inline-flex items-center px-8 py-4 border-2 border-white/30 text-white font-semibold rounded-xl backdrop-blur-sm overflow-hidden transition-all duration-300 hover:border-white/50 hover:bg-white/10 transform hover:-translate-y-1">
                            <div class="absolute inset-0 bg-gradient-to-r from-orange-500/20 to-orange-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <span class="relative">View Our Work</span>
                            <svg class="relative w-5 h-5 ml-2 group-hover:rotate-45 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Advanced Right Content - Interactive Stats -->
            <div class="lg:col-span-5 relative h-full flex flex-col justify-center space-y-8">

                <!-- Main Achievement Card -->
                <div class="group relative bg-gradient-to-br from-white/15 to-white/5 backdrop-blur-xl rounded-3xl p-8 border border-white/20 shadow-lg hover:shadow-xl transition-all duration-500 hover:-translate-y-2 animate-fade-in-up" style="animation-delay: 1s;">
                    <div class="absolute inset-0 bg-gradient-to-br from-orange-500/10 to-orange-600/10 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="relative text-center">
                        <div class="text-6xl font-black bg-gradient-to-r from-white via-orange-200 to-orange-300 bg-clip-text text-transparent mb-3 animate-pulse">
                            24+
                        </div>
                        <div class="text-white text-xl font-bold mb-2">Years of Excellence</div>
                        <div class="text-slate-300 text-sm">Trusted by Fortune 500 companies worldwide</div>
                        <div class="absolute -top-2 -right-2 w-6 h-6 bg-gradient-to-r from-orange-400 to-orange-500 rounded-full animate-ping"></div>
                    </div>
                </div>

                <!-- Stats Grid -->
                <div class="grid grid-cols-2 gap-4">
                    <div class="group relative bg-gradient-to-br from-white/10 to-white/5 backdrop-blur-lg rounded-2xl p-6 border border-white/20 text-center hover:bg-white/15 transition-all duration-300 hover:-translate-y-1 animate-fade-in-up" style="animation-delay: 1.2s;">
                        <div class="absolute inset-0 bg-gradient-to-br from-orange-500/20 to-orange-600/20 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="relative">
                            <div class="text-3xl font-bold bg-gradient-to-r from-orange-300 to-orange-400 bg-clip-text text-transparent mb-2">3500+</div>
                            <div class="text-slate-300 text-sm font-medium">Projects Delivered</div>
                        </div>
                    </div>
                    <div class="group relative bg-gradient-to-br from-white/10 to-white/5 backdrop-blur-lg rounded-2xl p-6 border border-white/20 text-center hover:bg-white/15 transition-all duration-300 hover:-translate-y-1 animate-fade-in-up" style="animation-delay: 1.4s;">
                        <div class="absolute inset-0 bg-gradient-to-br from-orange-500/20 to-orange-600/20 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="relative">
                            <div class="text-3xl font-bold bg-gradient-to-r from-orange-300 to-orange-400 bg-clip-text text-transparent mb-2">250+</div>
                            <div class="text-slate-300 text-sm font-medium">Expert Developers</div>
                        </div>
                    </div>
                </div>

                <!-- Achievement Badges -->
                <div class="flex justify-center space-x-4 animate-fade-in-up" style="animation-delay: 1.6s;">
                    <div class="flex items-center space-x-2 bg-white/10 backdrop-blur-sm rounded-full px-4 py-2 border border-white/20">
                        <div class="w-3 h-3 bg-green-400 rounded-full animate-pulse"></div>
                        <span class="text-slate-200 text-sm font-medium">99% Success Rate</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Advanced Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-30 animate-fade-in-up" style="animation-delay: 2s;">
        <div class="flex flex-col items-center space-y-2">
            <div class="text-white/70 text-sm font-medium tracking-wider uppercase">Scroll to explore</div>
            <div class="w-6 h-10 border-2 border-white/30 rounded-full flex justify-center">
                <div class="w-1 h-3 bg-white/70 rounded-full mt-2 animate-bounce"></div>
            </div>
        </div>
    </div>

</section>

<!-- Compressed Stats Section -->
<section class="py-12 bg-white">
    <div class="max-w-6xl mx-auto px-4 lg:px-6">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="text-center p-4 rounded-lg bg-gradient-to-br from-indigo-50 to-cyan-50 border border-indigo-100">
                <div class="text-3xl font-bold text-orange-600 mb-1">3500+</div>
                <div class="text-slate-600 text-sm font-medium">Projects</div>
            </div>
            <div class="text-center p-4 rounded-lg bg-gradient-to-br from-cyan-50 to-teal-50 border border-cyan-100">
                <div class="text-3xl font-bold text-orange-600 mb-1">24+</div>
                <div class="text-slate-600 text-sm font-medium">Years</div>
            </div>
            <div class="text-center p-4 rounded-lg bg-gradient-to-br from-teal-50 to-emerald-50 border border-teal-100">
                <div class="text-3xl font-bold text-teal-600 mb-1">250+</div>
                <div class="text-slate-600 text-sm font-medium">Developers</div>
            </div>
            <div class="text-center p-4 rounded-lg bg-gradient-to-br from-emerald-50 to-green-50 border border-emerald-100">
                <div class="text-3xl font-bold text-emerald-600 mb-1">98%</div>
                <div class="text-slate-600 text-sm font-medium">Satisfaction</div>
            </div>
        </div>
    </div>
</section>

<!-- Key Clients Section -->
<section class="section bg-white">
    <div class="container mx-auto px-6 lg:px-8">
        <h2 class="text-center text-3xl font-bold text-gray-900 mb-16">Key clients</h2>

        <!-- Scrolling clients strip -->
        <div class="relative overflow-hidden">
            <div class="flex animate-scroll space-x-16 items-center">
                <!-- Client logos -->
                <div class="flex-shrink-0 text-gray-600 font-semibold text-lg">H2H Movers</div>
                <div class="flex-shrink-0 text-gray-600 font-semibold text-lg">Selfreliance</div>
                <div class="flex-shrink-0 text-gray-600 font-semibold text-lg">UGL HOLDING</div>
                <div class="flex-shrink-0 text-gray-600 font-semibold text-lg">NVA TRANSPORTATION</div>
                <div class="flex-shrink-0 text-gray-600 font-semibold text-lg">BIKERENT.NYC</div>
                <div class="flex-shrink-0 text-gray-600 font-semibold text-lg">INTERPIPE</div>
                <div class="flex-shrink-0 text-gray-600 font-semibold text-lg">SCHWARZ LOGISTICS</div>
                <div class="flex-shrink-0 text-gray-600 font-semibold text-lg">AUTO TRANSPORT CHICAGO TRAILERS</div>
                <div class="flex-shrink-0 text-gray-600 font-semibold text-lg">Metinvest</div>
                <div class="flex-shrink-0 text-gray-600 font-semibold text-lg">Aptiv PLC</div>
                <div class="flex-shrink-0 text-gray-600 font-semibold text-lg">Toyota Material Handling</div>
                <div class="flex-shrink-0 text-gray-600 font-semibold text-lg">Cooper&Hunter</div>
                <div class="flex-shrink-0 text-gray-600 font-semibold text-lg">EasyLoad</div>
                <div class="flex-shrink-0 text-gray-600 font-semibold text-lg">Loadaza</div>
                <div class="flex-shrink-0 text-gray-600 font-semibold text-lg">Darkstore</div>
                <div class="flex-shrink-0 text-gray-600 font-semibold text-lg">Makeit.io</div>
            </div>
        </div>
    </div>
</section>

<!-- What We Create - Perfect Modern Section -->
<section class="py-24 bg-white relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 1px 1px, rgba(255, 107, 53, 0.3) 1px, transparent 0); background-size: 20px 20px;"></div>
    </div>

    <!-- Floating Elements -->
    <div class="absolute top-20 left-10 w-20 h-20 bg-orange-200/20 rounded-full blur-xl animate-pulse"></div>
    <div class="absolute bottom-20 right-10 w-32 h-32 bg-orange-200/20 rounded-full blur-xl animate-pulse" style="animation-delay: 1s;"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <!-- Section Header -->
        <div class="text-center mb-20">
            <div class="inline-flex items-center px-4 py-2 bg-orange-100 border border-orange-200 rounded-full text-sm font-medium mb-6 text-orange-700">
                Our Expertise
            </div>
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6">
                What We <span class="text-orange-600">Create</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                Transforming innovative ideas into exceptional digital experiences that drive business growth and user engagement
            </p>
        </div>

        <!-- Service Cards Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
            <!-- Custom Software Card -->
            <div class="group relative bg-white rounded-2xl p-8 shadow-sm border border-gray-200 hover:shadow-xl hover:shadow-orange-500/10 transition-all duration-500 hover:-translate-y-2">
                <div class="absolute inset-0 bg-gradient-to-br from-orange-50 to-orange-50 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative">
                    <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Custom Software</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Tailored solutions that perfectly fit your business needs, and scale with your growth.
                    </p>
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="px-3 py-1 bg-orange-100 text-orange-700 text-xs font-medium rounded-full">SaaS</span>
                        <span class="px-3 py-1 bg-orange-100 text-orange-700 text-xs font-medium rounded-full">CRM</span>
                        <span class="px-3 py-1 bg-orange-100 text-orange-700 text-xs font-medium rounded-full">ERP</span>
                    </div>
                    <a href="{{ route('services.custom-software') }}" class="inline-flex items-center text-orange-600 font-semibold hover:text-orange-700 transition-colors">
                        Learn more
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Web Development Card -->
            <div class="group relative bg-white rounded-2xl p-8 shadow-sm border border-gray-200 hover:shadow-xl hover:shadow-orange-500/10 transition-all duration-500 hover:-translate-y-2">
                <div class="absolute inset-0 bg-gradient-to-br from-orange-50 to-orange-50 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative">
                    <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Web Development</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Modern, responsive web applications built with cutting-edge technologies and best practices.
                    </p>
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="px-3 py-1 bg-orange-100 text-orange-700 text-xs font-medium rounded-full">React</span>
                        <span class="px-3 py-1 bg-orange-100 text-orange-700 text-xs font-medium rounded-full">PHP</span>
                        <span class="px-3 py-1 bg-orange-100 text-orange-700 text-xs font-medium rounded-full">JS</span>
                    </div>
                    <a href="{{ route('services.web-development') }}" class="inline-flex items-center text-orange-600 font-semibold hover:text-orange-700 transition-colors">
                        Learn more
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Mobile Apps Card -->
            <div class="group relative bg-white rounded-2xl p-8 shadow-sm border border-gray-200 hover:shadow-xl hover:shadow-orange-500/10 transition-all duration-500 hover:-translate-y-2">
                <div class="absolute inset-0 bg-gradient-to-br from-orange-50 to-orange-50 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative">
                    <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Mobile Apps</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Native and cross-platform mobile applications that deliver exceptional user experiences.
                    </p>
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="px-3 py-1 bg-orange-100 text-orange-700 text-xs font-medium rounded-full">iOS</span>
                        <span class="px-3 py-1 bg-orange-100 text-orange-700 text-xs font-medium rounded-full">Android</span>
                        <span class="px-3 py-1 bg-orange-100 text-orange-700 text-xs font-medium rounded-full">Flutter</span>
                    </div>
                    <a href="{{ route('services.mobile-development') }}" class="inline-flex items-center text-orange-600 font-semibold hover:text-orange-700 transition-colors">
                        Learn more
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Additional Services Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Data Science & AI -->
            <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-200 hover:shadow-lg transition-all duration-300">
                <div class="flex items-start space-x-4 mb-6">
                    <div class="flex-shrink-0">
                        <span class="text-2xl font-bold text-orange-600">04/</span>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900">Data Science & AI</h3>
                    </div>
                </div>

                <div class="space-y-3 mb-6">
                    <div class="text-gray-700">AWS & Cloud</div>
                    <div class="text-gray-700">Big Data Solutions</div>
                    <div class="text-gray-700">IoT Development</div>
                    <div class="text-gray-700">NFT marketplace</div>
                    <div class="text-gray-700">Artificial Intelligence</div>
                    <div class="text-gray-700">DevOps Services</div>
                    <div class="text-gray-700">AI ChatBot</div>
                    <div class="text-gray-700">Generative AI</div>
                </div>

                <p class="text-gray-600 mb-6 leading-relaxed">
                    Make every business decision a data-driven one with stats, insights and analysis that positions you ahead of the competition
                </p>

                <a href="{{ route('services.data-science') }}" class="text-orange-600 font-semibold hover:text-orange-700 transition-colors">
                    Learn more →
                </a>
            </div>

            <!-- QA & Software Testing -->
            <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-200 hover:shadow-lg transition-all duration-300">
                <div class="flex items-start space-x-4 mb-6">
                    <div class="flex-shrink-0">
                        <span class="text-2xl font-bold text-orange-600">05/</span>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900">QA & Software Testing</h3>
                    </div>
                </div>

                <div class="space-y-3 mb-6">
                    <div class="text-gray-700">Test Automation</div>
                    <div class="text-gray-700">Cybersecurity</div>
                    <div class="text-gray-700">Functional Testing</div>
                    <div class="text-gray-700">Performance Testing</div>
                    <div class="text-gray-700">Mobile App Testing</div>
                    <div class="text-gray-700">QA Consulting</div>
                    <div class="text-gray-700">Load Testing Services</div>
                </div>

                <p class="text-gray-600 mb-6 leading-relaxed">
                    Ensure the fault tolerance, stability, and correct operation of your digital solution with software QA testing services by VanTroZ
                </p>

                <a href="{{ route('services.qa-testing') }}" class="text-orange-600 font-semibold hover:text-orange-700 transition-colors">
                    Learn more →
                </a>
            </div>

            <!-- UX/UI Design -->
            <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-200 hover:shadow-lg transition-all duration-300">
                <div class="flex items-start space-x-4 mb-6">
                    <div class="flex-shrink-0">
                        <span class="text-2xl font-bold text-orange-600">06/</span>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900">UX/UI Design</h3>
                    </div>
                </div>

                <div class="space-y-3 mb-6">
                    <div class="text-gray-700">UX Review</div>
                    <div class="text-gray-700">Product Design</div>
                    <div class="text-gray-700">Rapid UX Prototyping</div>
                    <div class="text-gray-700">Mobile App Design</div>
                    <div class="text-gray-700">Web Design Services</div>
                </div>

                <p class="text-gray-600 mb-6 leading-relaxed">
                    Get a UX/UI design inspired by the desires and needs of your users by entrusting its implementation to VanTroZ experts.
                </p>

                <a href="{{ route('services.ui-ux-design') }}" class="text-orange-600 font-semibold hover:text-orange-700 transition-colors">
                    Learn more →
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Case Studies Section -->
<section class="section bg-white">
    <div class="container mx-auto px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-3xl lg:text-3xl font-bold text-gray-900 mb-8">Case Studies</h2>

            <!-- Filter Tags -->
            <div class="flex flex-wrap justify-center gap-4 mb-16">
                <button class="home-filter-btn active bg-orange-500 text-white px-6 py-3 rounded-full text-sm font-semibold transition-all duration-300 hover:bg-orange-600" data-filter="all">All cases</button>
                <button class="home-filter-btn bg-gray-200 text-gray-700 px-6 py-3 rounded-full text-sm font-medium hover:bg-gray-300 transition-all duration-300" data-filter="qa-testing">QA & Software Testing</button>
                <button class="home-filter-btn bg-gray-200 text-gray-700 px-6 py-3 rounded-full text-sm font-medium hover:bg-gray-300 transition-all duration-300" data-filter="web-mobile">Web & Mobile Development</button>
                <button class="home-filter-btn bg-gray-200 text-gray-700 px-6 py-3 rounded-full text-sm font-medium hover:bg-gray-300 transition-all duration-300" data-filter="custom-software">Custom Software</button>
                <button class="home-filter-btn bg-gray-200 text-gray-700 px-6 py-3 rounded-full text-sm font-medium hover:bg-gray-300 transition-all duration-300" data-filter="ai-genai">AI/GenAI</button>
                <button class="home-filter-btn bg-gray-200 text-gray-700 px-6 py-3 rounded-full text-sm font-medium hover:bg-gray-300 transition-all duration-300" data-filter="product-design">Product design</button>
                <button class="home-filter-btn bg-gray-200 text-gray-700 px-6 py-3 rounded-full text-sm font-medium hover:bg-gray-300 transition-all duration-300" data-filter="ui-ux-design">UX/UI Design</button>
            </div>
        </div>

        <div class="grid lg:grid-cols-2 gap-12">
            <!-- Case Study 1: eCommerce -->
            <div class="home-case-study-item card group hover:transform hover:scale-105 transition-all duration-300" data-category="web-mobile">
                <div class="flex flex-wrap gap-2 mb-6">
                    <span class="px-4 py-2 bg-orange-100 text-orange-700 rounded-full text-xs font-semibold">eCommerce</span>
                </div>

                <h3 class="text-2xl font-bold text-gray-900 mb-6">
                    KSD: new eCommerce platform for the largest Ukrainian bookstore
                </h3>

                <div class="grid grid-cols-2 gap-8 mb-8">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-orange-500 mb-2">50 thousand</div>
                        <div class="text-sm text-gray-600">iOS app downloads in 3 months</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-orange-500 mb-2">40+</div>
                        <div class="text-sm text-gray-600">physical KSD bookstores full synced with online sales</div>
                    </div>
                </div>

                <div class="flex flex-wrap gap-2">
                    <span class="px-4 py-2 bg-gray-200 text-gray-700 rounded-full text-xs">Custom Software</span>
                    <span class="px-4 py-2 bg-gray-200 text-gray-700 rounded-full text-xs">Web & Mobile Development</span>
                </div>
            </div>

            <!-- Case Study 2: Manufacturing AI -->
            <div class="home-case-study-item card group hover:transform hover:scale-105 transition-all duration-300" data-category="ai-genai">
                <div class="flex flex-wrap gap-2 mb-6">
                    <span class="px-4 py-2 bg-orange-100 text-orange-700 rounded-full text-xs font-semibold">Manufacturing</span>
                </div>

                <h3 class="text-2xl font-bold text-gray-900 mb-6">
                    AeroIntel AI: Analytical software solution for UAV operators
                </h3>

                <div class="grid grid-cols-3 gap-6 mb-8">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-orange-500 mb-2">0.3 s/image</div>
                        <div class="text-sm text-gray-600">inference speed</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-orange-500 mb-2">90%</div>
                        <div class="text-sm text-gray-600">automation analyst effort reduced through AI</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-orange-500 mb-2">Full adaptation</div>
                        <div class="text-sm text-gray-600">of the model to new datasets</div>
                    </div>
                </div>

                <div class="flex flex-wrap gap-2">
                    <span class="px-4 py-2 bg-gray-200 text-gray-700 rounded-full text-xs">AI/GenAI</span>
                </div>
            </div>

            <!-- Case Study 3: FinTech -->
            <div class="home-case-study-item card group hover:transform hover:scale-105 transition-all duration-300" data-category="custom-software">
                <div class="flex flex-wrap gap-2 mb-6">
                    <span class="px-4 py-2 bg-orange-100 text-orange-700 rounded-full text-xs font-semibold">FinTech</span>
                </div>

                <h3 class="text-2xl font-bold text-gray-900 mb-6">
                    SecurePay: Next-generation payment processing platform
                </h3>

                <div class="grid grid-cols-3 gap-6 mb-8">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-orange-500 mb-2">99.9%</div>
                        <div class="text-sm text-gray-600">uptime achieved</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-orange-500 mb-2">2M+</div>
                        <div class="text-sm text-gray-600">transactions processed daily</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-orange-500 mb-2">50ms</div>
                        <div class="text-sm text-gray-600">average processing time</div>
                    </div>
                </div>

                <div class="flex flex-wrap gap-2">
                    <span class="px-4 py-2 bg-gray-200 text-gray-700 rounded-full text-xs">Custom Software</span>
                    <span class="px-4 py-2 bg-gray-200 text-gray-700 rounded-full text-xs">QA & Software Testing</span>
                </div>
            </div>

            <!-- Case Study 4: Healthcare -->
            <div class="home-case-study-item card group hover:transform hover:scale-105 transition-all duration-300" data-category="web-mobile">
                <div class="flex flex-wrap gap-2 mb-6">
                    <span class="px-4 py-2 bg-orange-100 text-orange-700 rounded-full text-xs font-semibold">Healthcare</span>
                </div>

                <h3 class="text-2xl font-bold text-gray-900 mb-6">
                    MedConnect: Telemedicine platform for remote patient care
                </h3>

                <div class="grid grid-cols-3 gap-6 mb-8">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-orange-500 mb-2">15K+</div>
                        <div class="text-sm text-gray-600">patients served monthly</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-orange-500 mb-2">95%</div>
                        <div class="text-sm text-gray-600">patient satisfaction rate</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-orange-500 mb-2">24/7</div>
                        <div class="text-sm text-gray-600">availability</div>
                    </div>
                </div>

                <div class="flex flex-wrap gap-2">
                    <span class="px-4 py-2 bg-gray-200 text-gray-700 rounded-full text-xs">Web & Mobile Development</span>
                    <span class="px-4 py-2 bg-gray-200 text-gray-700 rounded-full text-xs">UX/UI Design</span>
                </div>
            </div>

            <!-- Case Study 5: QA Testing -->
            <div class="home-case-study-item card group hover:transform hover:scale-105 transition-all duration-300" data-category="qa-testing">
                <div class="flex flex-wrap gap-2 mb-6">
                    <span class="px-4 py-2 bg-orange-100 text-orange-700 rounded-full text-xs font-semibold">QA Testing</span>
                </div>

                <h3 class="text-2xl font-bold text-gray-900 mb-6">
                    TestMaster: Automated testing platform for enterprise applications
                </h3>

                <div class="grid grid-cols-3 gap-6 mb-8">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-orange-500 mb-2">95%</div>
                        <div class="text-sm text-gray-600">test coverage achieved</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-orange-500 mb-2">70%</div>
                        <div class="text-sm text-gray-600">reduction in testing time</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-orange-500 mb-2">99.5%</div>
                        <div class="text-sm text-gray-600">bug detection accuracy</div>
                    </div>
                </div>

                <div class="flex flex-wrap gap-2">
                    <span class="px-4 py-2 bg-gray-200 text-gray-700 rounded-full text-xs">QA & Software Testing</span>
                    <span class="px-4 py-2 bg-gray-200 text-gray-700 rounded-full text-xs">Custom Software</span>
                </div>
            </div>

            <!-- Case Study 6: UX/UI Design -->
            <div class="home-case-study-item card group hover:transform hover:scale-105 transition-all duration-300" data-category="ui-ux-design">
                <div class="flex flex-wrap gap-2 mb-6">
                    <span class="px-4 py-2 bg-orange-100 text-orange-700 rounded-full text-xs font-semibold">UX/UI Design</span>
                </div>

                <h3 class="text-2xl font-bold text-gray-900 mb-6">
                    DesignFlow: User experience optimization for mobile banking app
                </h3>

                <div class="grid grid-cols-3 gap-6 mb-8">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-orange-500 mb-2">45%</div>
                        <div class="text-sm text-gray-600">increase in user engagement</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-orange-500 mb-2">60%</div>
                        <div class="text-sm text-gray-600">faster task completion</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-orange-500 mb-2">4.8/5</div>
                        <div class="text-sm text-gray-600">user satisfaction rating</div>
                    </div>
                </div>

                <div class="flex flex-wrap gap-2">
                    <span class="px-4 py-2 bg-gray-200 text-gray-700 rounded-full text-xs">UX/UI Design</span>
                    <span class="px-4 py-2 bg-gray-200 text-gray-700 rounded-full text-xs">Product design</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="section bg-white">
    <div class="container mx-auto px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-20 items-center">
            <!-- Left Content -->
            <div>
                <h2 class="text-3xl lg:text-3xl font-bold text-gray-900 mb-8">
                    Software Company VanTroZ
                </h2>
                <p class="text-xl text-gray-700 mb-10 leading-relaxed">
                    Our objective is to develop a profitable and effective solution that helps clients to expand their businesses and overcome financial constraints. We are committed to exceptional service and utilizing all resources to bring the finest products & services.
                </p>
                <a href="#" class="btn-primary inline-block">About us</a>
            </div>

            <!-- Right Stats -->
            <div class="grid grid-cols-2 gap-12">
                <div class="text-center">
                    <div class="stat-number">25+</div>
                    <div class="stat-label">Experience</div>
                    <div class="text-sm text-gray-500 mt-2">years of active, market-driven experience under our belt.</div>
                </div>
                <div class="text-center">
                    <div class="stat-number">250+</div>
                    <div class="stat-label">Clients</div>
                    <div class="text-sm text-gray-500 mt-2">satisfied clients with at least a 3-year collaboration record.</div>
                </div>
                <div class="text-center">
                    <div class="stat-number">275+</div>
                    <div class="stat-label">Team</div>
                    <div class="text-sm text-gray-500 mt-2">certified full-time pros with field experience on board.</div>
                </div>
                <div class="text-center">
                    <div class="stat-number">3,500+</div>
                    <div class="stat-label">Projects</div>
                    <div class="text-sm text-gray-500 mt-2">projects finished with at least an x2 average annual revenue boost.</div>
                </div>
            </div>
        </div>

        <!-- Certifications -->
        <div class="mt-20 text-center">
            <div class="inline-flex items-center px-8 py-4 bg-gray-200 rounded-xl">
                <span class="text-green-600 mr-3 text-xl">✓</span>
                <span class="text-gray-900 font-semibold text-lg">ISO 27001-certified</span>
            </div>
            <p class="text-gray-600 mt-6 text-lg">IT designs that protect data and enable secure internal management</p>
        </div>
    </div>
</section>

<!-- Enhanced Digital Transformation Section -->
<section class="py-24 bg-gradient-to-br from-slate-50 via-white to-orange-50 relative overflow-hidden">
    <!-- Background Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 right-20 w-72 h-72 bg-gradient-to-br from-orange-100/30 to-orange-100/30 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 left-20 w-96 h-96 bg-gradient-to-br from-orange-100/20 to-orange-100/20 rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Enhanced Header -->
        <div class="text-center mb-20">
            <div class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-orange-100 to-orange-100 rounded-full text-orange-700 text-sm font-semibold mb-6">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
                IT designs that protect data and enable secure internal management
            </div>

            <h2 class="text-2xl md:text-2xl text-3xl font-black text-gray-900 mb-8 leading-tight">
                <span class="block">Digital transformation</span>
                <span class="block bg-gradient-to-r from-orange-600 via-orange-700 to-orange-800 bg-clip-text text-transparent">
                    for industries
                </span>
            </h2>

            <p class="text-xl md:text-2xl text-gray-600 max-w-4xl mx-auto mb-12 leading-relaxed font-light">
                VanTroZ is your one-stop software development company, offering a full range of services for all industries. We drive your business progress with smart tech decisions tailored to a specific field.
            </p>

            <button class="group relative inline-flex items-center px-8 py-4 bg-gradient-to-r from-orange-600 to-orange-700 text-white font-bold rounded-2xl overflow-hidden shadow-2xl hover:shadow-orange-500/25 transition-all duration-300 transform hover:-translate-y-1 hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-r from-orange-700 to-orange-800 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <span class="relative">Discover More</span>
                <svg class="relative w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </button>
        </div>

        <!-- Enhanced Industries Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Oil & Gas -->
            <div class="group relative bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-lg border border-white/20 hover:shadow-2xl hover:shadow-orange-500/10 transition-all duration-500 hover:-translate-y-2">
                <div class="absolute inset-0 bg-gradient-to-br from-orange-50/50 to-red-50/50 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative">
                    <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-red-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Oil & Gas</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed">For the oil and gas industry, we create custom asset management systems, drilling optimization tools, remote monitoring platforms...</p>
                    <a href="{{ route('contact') }}" class="inline-flex items-center text-orange-500 font-semibold hover:text-orange-600 transition-colors group-hover:translate-x-1">
                        Learn more
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Energy and Utilities -->
            <div class="group relative bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-lg border border-white/20 hover:shadow-2xl hover:shadow-orange-500/10 transition-all duration-500 hover:-translate-y-2">
                <div class="absolute inset-0 bg-gradient-to-br from-orange-50/50 to-orange-50/50 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative">
                    <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Energy and Utilities</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed">We build smart grid management systems, renewable energy analytics platforms, and energy efficiency optimization tools...</p>
                    <a href="{{ route('contact') }}" class="inline-flex items-center text-orange-500 font-semibold hover:text-orange-600 transition-colors group-hover:translate-x-1">
                        Learn more
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Logistics -->
            <div class="group relative bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-lg border border-white/20 hover:shadow-2xl hover:shadow-orange-500/10 transition-all duration-500 hover:-translate-y-2">
                <div class="absolute inset-0 bg-gradient-to-br from-orange-50/50 to-orange-50/50 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative">
                    <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Logistics</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed">From route optimization algorithms and fleet management systems to supply chain tracking platforms...</p>
                    <a href="{{ route('industries.logistics') }}" class="inline-flex items-center text-orange-500 font-semibold hover:text-orange-600 transition-colors group-hover:translate-x-1">
                        Learn more
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- eCommerce -->
            <div class="group relative bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-lg border border-white/20 hover:shadow-2xl hover:shadow-orange-500/10 transition-all duration-500 hover:-translate-y-2">
                <div class="absolute inset-0 bg-gradient-to-br from-orange-50/50 to-orange-50/50 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative">
                    <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">eCommerce</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed">Get tailored commerce-tuned software solutions, including online storefronts, inventory management systems...</p>
                    <a href="{{ route('industries.ecommerce') }}" class="inline-flex items-center text-orange-500 font-semibold hover:text-orange-600 transition-colors group-hover:translate-x-1">
                        Learn more
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Healthcare -->
            <div class="group relative bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-lg border border-white/20 hover:shadow-2xl hover:shadow-orange-500/10 transition-all duration-500 hover:-translate-y-2">
                <div class="absolute inset-0 bg-gradient-to-br from-orange-50/50 to-orange-50/50 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative">
                    <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Healthcare</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed">Power healthcare service provision with advanced software solutions, like electronic health record (EHR) systems...</p>
                    <a href="{{ route('industries.healthcare') }}" class="inline-flex items-center text-orange-500 font-semibold hover:text-orange-600 transition-colors group-hover:translate-x-1">
                        Learn more
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- FinTech -->
            <div class="group relative bg-white/80 backdrop-blur-sm rounded-3xl p-8 shadow-lg border border-white/20 hover:shadow-2xl hover:shadow-orange-500/10 transition-all duration-500 hover:-translate-y-2">
                <div class="absolute inset-0 bg-gradient-to-br from-orange-50/50 to-orange-50/50 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative">
                    <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">FinTech</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed">Secure, scalable financial technology solutions that drive innovation in banking and finance sectors...</p>
                    <a href="{{ route('industries.fintech') }}" class="inline-flex items-center text-orange-500 font-semibold hover:text-orange-600 transition-colors group-hover:translate-x-1">
                        Learn more
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Process Section -->
<section class="section bg-white">
    <div class="container mx-auto px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-3xl lg:text-3xl font-bold text-gray-900 mb-6">
                How we build the software development process
            </h2>
            <p class="text-xl text-gray-700 max-w-4xl mx-auto leading-relaxed">
                We'll turn your custom tech solutions into powerful brands by crafting unique customer experiences at every digital touchpoint with:
            </p>
        </div>

        <!-- Process Steps -->
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-12">
            <div class="text-center group">
                <div class="w-20 h-20 bg-orange-500 rounded-full flex items-center justify-center text-white font-bold text-2xl mx-auto mb-6 shadow-lg group-hover:shadow-orange-500/50 transition-all duration-300">01</div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Discovery Phase</h3>
                <p class="text-gray-600">Understanding your business needs and requirements</p>
            </div>
            <div class="text-center group">
                <div class="w-20 h-20 bg-orange-500 rounded-full flex items-center justify-center text-white font-bold text-2xl mx-auto mb-6 shadow-lg group-hover:shadow-orange-500/50 transition-all duration-300">02</div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">UX/UI Design</h3>
                <p class="text-gray-600">Creating intuitive and beautiful user experiences</p>
            </div>
            <div class="text-center group">
                <div class="w-20 h-20 bg-orange-500 rounded-full flex items-center justify-center text-white font-bold text-2xl mx-auto mb-6 shadow-lg group-hover:shadow-orange-500/50 transition-all duration-300">03</div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Web development</h3>
                <p class="text-gray-600">Building robust and scalable web applications</p>
            </div>
            <div class="text-center group">
                <div class="w-20 h-20 bg-orange-500 rounded-full flex items-center justify-center text-white font-bold text-2xl mx-auto mb-6 shadow-lg group-hover:shadow-orange-500/50 transition-all duration-300">04</div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Mobile Development</h3>
                <p class="text-gray-600">Creating native and cross-platform mobile apps</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="section bg-white">
    <div class="container mx-auto px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-3xl lg:text-3xl font-bold text-gray-900 mb-6">What clients say</h2>
            <div class="flex justify-center space-x-12 mb-12">
                <div class="text-center">
                    <div class="text-orange-500 font-bold mb-2 text-lg">Top Rated</div>
                    <div class="text-sm text-gray-600">The highest quality results and client satisfaction</div>
                </div>
                <div class="text-center">
                    <div class="text-orange-500 font-bold mb-2 text-lg">Excellent mobile</div>
                    <div class="text-sm text-gray-600">Top App Development Companies in Ukraine 2021</div>
                </div>
            </div>
        </div>

        <div class="grid lg:grid-cols-3 gap-12">
            <!-- Testimonial 1 -->
            <div class="testimonial-card">
                <div class="mb-8">
                    <h4 class="text-gray-900 font-bold mb-3 text-lg">Peter Sachse</h4>
                    <div class="text-gray-600 text-sm mb-6">Peter Sachse</div>
                    <p class="testimonial-text">
                        We chose VanTroZ amongst other companies because they provided prototypes of future systems and we had a clear understanding of what the finished product would look like. We worked with the team on several projects, including the development of a CRM with adaptation for desktop and mobile versions, as well as the creation of a suite of server applications that are available on iOS, Android, and online. We are very pleased with the results and the flexibility of the VanTroZ team.
                    </p>
                </div>
                <a href="#" class="text-orange-500 text-sm font-semibold hover:text-orange-600 transition-colors">Read more →</a>
            </div>

            <!-- Testimonial 2 -->
            <div class="testimonial-card">
                <div class="mb-8">
                    <h4 class="text-gray-900 font-bold mb-3 text-lg">Kyle</h4>
                    <div class="text-gray-600 text-sm mb-6">DRAGI</div>
                    <p class="testimonial-text">
                        I am very satisfied wit the work process and project management. Everything was clear, on time and I had nothing specific to add. Yes, we are satisfied with the result of the work and the product meets the goals set. I can't wait to continue our work on the app.
                    </p>
                </div>
                <a href="#" class="text-orange-500 text-sm font-semibold hover:text-orange-600 transition-colors">Read more →</a>
            </div>

            <!-- Testimonial 3 -->
            <div class="testimonial-card">
                <div class="mb-8">
                    <h4 class="text-gray-900 font-bold mb-3 text-lg">Daniel Mailovsky</h4>
                    <div class="text-gray-600 text-sm mb-6">Daniel Mailovsky</div>
                    <p class="testimonial-text">
                        Thanks to VanTroZ, our sales increased by 65% and conversions increased by 150%. The team fully developed an online store for us, with 1C and amoCRM integrations. The guys conducted a market analysis, created a mind map with all the functions of the future site, and argued for each element of development. Everything was transparent, and the quality was high.
                    </p>
                </div>
                <a href="#" class="text-orange-500 text-sm font-semibold hover:text-orange-600 transition-colors">Read more →</a>
            </div>
        </div>
    </div>
</section>

<!-- Awards Section -->
<section class="section bg-white">
    <div class="container mx-auto px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-6">We've Been Awarded Plenty for the Milestones We Have Achieved</h2>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-12 items-center">
            <div class="text-center">
                <div class="text-gray-700 font-semibold text-sm">Top 100 EdTech Software Developers 2025</div>
            </div>
            <div class="text-center">
                <div class="text-gray-700 font-semibold text-sm">2023 Award-winning company</div>
            </div>
            <div class="text-center">
                <div class="text-gray-700 font-semibold text-sm">Inc. 5000 2024</div>
            </div>
            <div class="text-center">
                <div class="text-gray-700 font-semibold text-sm">Best of 2024 Software Company Schaumburg, IL</div>
            </div>
            <div class="text-center">
                <div class="text-gray-700 font-semibold text-sm">Forbes Council</div>
            </div>
            <div class="text-center">
                <div class="text-gray-700 font-semibold text-sm">TOP USA awards</div>
            </div>
        </div>
    </div>
</section>



<!-- Why Choose Us Section -->

<section class="section section-alt">
    <div class="container mx-auto px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-20 items-center">
            <!-- Left Content -->

            <div>

                <h2 class="text-3xl lg:text-3xl font-bold text-gray-900 mb-8">
                    Software Company VanTroZ

                </h2>

                <p class="text-xl text-gray-700 mb-10 leading-relaxed">
                    Our objective is to develop a profitable and effective solution that helps clients to expand their businesses and overcome financial constraints. We are committed to exceptional service and utilizing all resources to bring the finest products & services.

                </p>

                <a href="#" class="btn-primary inline-block">About us</a>
            </div>



            <!-- Right Stats -->

            <div class="grid grid-cols-2 gap-12">
                <div class="text-center">

                    <div class="stat-number">25+</div>
                    <div class="stat-label">Experience</div>
                    <div class="text-sm text-gray-500 mt-2">years of active, market-driven experience under our belt.</div>
                </div>

                <div class="text-center">

                    <div class="stat-number">250+</div>
                    <div class="stat-label">Clients</div>
                    <div class="text-sm text-gray-500 mt-2">satisfied clients with at least a 3-year collaboration record.</div>
                </div>

                <div class="text-center">

                    <div class="stat-number">275+</div>
                    <div class="stat-label">Team</div>
                    <div class="text-sm text-gray-500 mt-2">certified full-time pros with field experience on board.</div>
                </div>

                <div class="text-center">

                    <div class="stat-number">3,500+</div>
                    <div class="stat-label">Projects</div>
                    <div class="text-sm text-gray-500 mt-2">projects finished with at least an x2 average annual revenue boost.</div>
                </div>

            </div>

        </div>



        <!-- Certifications -->

        <div class="mt-20 text-center">
            <div class="inline-flex items-center px-8 py-4 bg-gray-200 rounded-xl">
                <span class="text-green-600 mr-3 text-xl">✓</span>
                <span class="text-gray-900 font-semibold text-lg">ISO 27001-certified</span>
            </div>

            <p class="text-gray-600 mt-6 text-lg">IT designs that protect data and enable secure internal management</p>
        </div>

    </div>

</section>



<!-- Digital Transformation Section -->

<section class="section">
    <div class="container mx-auto px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-3xl lg:text-3xl font-bold text-gray-900 mb-6">
                Digital transformation for industries

            </h2>

            <p class="text-xl text-gray-700 max-w-4xl mx-auto mb-10 leading-relaxed">
                VanTroZ is your one-stop software development company, offering a full range of services for all industries. We drive your business progress with smart tech decisions tailored to a specific field.

            </p>

            <a href="#" class="btn-primary">Discover More</a>
        </div>



        <!-- Industries Grid -->

        <div class="grid-perfect-sm">
            <!-- Industry items -->

            <div class="card text-center group">
                <h3 class="font-bold text-gray-900 mb-4 text-lg">Oil & Gas</h3>
                <p class="text-sm text-gray-600 mb-6 leading-relaxed">For the oil and gas industry, we create custom asset management systems, drilling optimization tools, remote monitoring platforms...</p>
                <a href="#" class="text-orange-500 text-sm font-semibold hover:text-orange-600 transition-colors">Learn more →</a>
            </div>



            <div class="card text-center group">
                <h3 class="font-bold text-gray-900 mb-4 text-lg">Energy and Utilities</h3>
                <p class="text-sm text-gray-600 mb-6 leading-relaxed">We build smart grid management systems, renewable energy analytics platforms, and energy efficiency optimization tools...</p>
                <a href="#" class="text-orange-500 text-sm font-semibold hover:text-orange-600 transition-colors">Learn more →</a>
            </div>



            <div class="card text-center group">
                <h3 class="font-bold text-gray-900 mb-4 text-lg">Logistics</h3>
                <p class="text-sm text-gray-600 mb-6 leading-relaxed">From route optimization algorithms and fleet management systems to supply chain tracking platforms...</p>
                <a href="#" class="text-orange-500 text-sm font-semibold hover:text-orange-600 transition-colors">Learn more →</a>
            </div>



            <div class="card text-center group">
                <h3 class="font-bold text-gray-900 mb-4 text-lg">eCommerce</h3>
                <p class="text-sm text-gray-600 mb-6 leading-relaxed">Get tailored commerce-tuned software solutions, including online storefronts, inventory management systems...</p>
                <a href="#" class="text-orange-500 text-sm font-semibold hover:text-orange-600 transition-colors">Learn more →</a>
            </div>



            <div class="card text-center group">
                <h3 class="font-bold text-gray-900 mb-4 text-lg">Healthcare</h3>
                <p class="text-sm text-gray-600 mb-6 leading-relaxed">Power healthcare service provision with advanced software solutions, like electronic health record (EHR) systems...</p>
                <a href="#" class="text-orange-500 text-sm font-semibold hover:text-orange-600 transition-colors">Learn more →</a>
            </div>

        </div>

    </div>

</section>



<!-- Process Section -->

<section class="section section-alt">
    <div class="container mx-auto px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-3xl lg:text-3xl font-bold text-gray-900 mb-6">
                How we build the software development process

            </h2>

            <p class="text-xl text-gray-700 max-w-4xl mx-auto leading-relaxed">
                We'll turn your custom tech solutions into powerful brands by crafting unique customer experiences at every digital touchpoint with:

            </p>

        </div>



        <!-- Process Steps -->

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-12">
            <div class="text-center group">

                <div class="w-20 h-20 bg-orange-500 rounded-full flex items-center justify-center text-white font-bold text-2xl mx-auto mb-6 shadow-lg group-hover:shadow-orange-500/50 transition-all duration-300">01</div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Discovery Phase</h3>
                <p class="text-gray-600">Understanding your business needs and requirements</p>
            </div>

            <div class="text-center group">

                <div class="w-20 h-20 bg-orange-500 rounded-full flex items-center justify-center text-white font-bold text-2xl mx-auto mb-6 shadow-lg group-hover:shadow-orange-500/50 transition-all duration-300">02</div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">UX/UI Design</h3>
                <p class="text-gray-600">Creating intuitive and beautiful user experiences</p>
            </div>

            <div class="text-center group">

                <div class="w-20 h-20 bg-orange-500 rounded-full flex items-center justify-center text-white font-bold text-2xl mx-auto mb-6 shadow-lg group-hover:shadow-orange-500/50 transition-all duration-300">03</div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Web development</h3>
                <p class="text-gray-600">Building robust and scalable web applications</p>
            </div>

            <div class="text-center group">

                <div class="w-20 h-20 bg-orange-500 rounded-full flex items-center justify-center text-white font-bold text-2xl mx-auto mb-6 shadow-lg group-hover:shadow-orange-500/50 transition-all duration-300">04</div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Mobile Development</h3>
                <p class="text-gray-600">Creating native and cross-platform mobile apps</p>
            </div>

        </div>

    </div>

</section>



<!-- Testimonials Section -->

<section class="section">
    <div class="container mx-auto px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-3xl lg:text-3xl font-bold text-gray-900 mb-6">What clients say</h2>
            <div class="flex justify-center space-x-12 mb-12">
                <div class="text-center">

                    <div class="text-orange-500 font-bold mb-2 text-lg">Top Rated</div>
                    <div class="text-sm text-gray-600">The highest quality results and client satisfaction</div>
                </div>

                <div class="text-center">

                    <div class="text-orange-500 font-bold mb-2 text-lg">Excellent mobile</div>
                    <div class="text-sm text-gray-600">Top App Development Companies in Ukraine 2021</div>
                </div>

            </div>

        </div>



        <div class="grid lg:grid-cols-3 gap-12">
            <!-- Testimonial 1 -->

            <div class="testimonial-card">
                <div class="mb-8">
                    <h4 class="text-gray-900 font-bold mb-3 text-lg">Peter Sachse</h4>
                    <div class="text-gray-600 text-sm mb-6">Peter Sachse</div>
                    <p class="testimonial-text">
                        We chose VanTroZ amongst other companies because they provided prototypes of future systems and we had a clear understanding of what the finished product would look like. We worked with the team on several projects, including the development of a CRM with adaptation for desktop and mobile versions, as well as the creation of a suite of server applications that are available on iOS, Android, and online. We are very pleased with the results and the flexibility of the VanTroZ team.

                    </p>

                </div>

                <a href="#" class="text-orange-500 text-sm font-semibold hover:text-orange-600 transition-colors">Read more →</a>
            </div>



            <!-- Testimonial 2 -->

            <div class="testimonial-card">
                <div class="mb-8">
                    <h4 class="text-gray-900 font-bold mb-3 text-lg">Kyle</h4>
                    <div class="text-gray-600 text-sm mb-6">DRAGI</div>
                    <p class="testimonial-text">
                        I am very satisfied wit the work process and project management. Everything was clear, on time and I had nothing specific to add. Yes, we are satisfied with the result of the work and the product meets the goals set. I can't wait to continue our work on the app.

                    </p>

                </div>

                <a href="#" class="text-orange-500 text-sm font-semibold hover:text-orange-600 transition-colors">Read more →</a>
            </div>



            <!-- Testimonial 3 -->

            <div class="testimonial-card">
                <div class="mb-8">
                    <h4 class="text-gray-900 font-bold mb-3 text-lg">Daniel Mailovsky</h4>
                    <div class="text-gray-600 text-sm mb-6">Daniel Mailovsky</div>
                    <p class="testimonial-text">
                        Thanks to VanTroZ, our sales increased by 65% and conversions increased by 150%. The team fully developed an online store for us, with 1C and amoCRM integrations. The guys conducted a market analysis, created a mind map with all the functions of the future site, and argued for each element of development. Everything was transparent, and the quality was high.

                    </p>

                </div>

                <a href="#" class="text-orange-500 text-sm font-semibold hover:text-orange-600 transition-colors">Read more →</a>
            </div>

        </div>

    </div>

</section>



<!-- Awards Section -->

<section class="section section-alt">
    <div class="container mx-auto px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-6">We've Been Awarded Plenty for the Milestones We Have Achieved</h2>
        </div>



        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-12 items-center">
            <div class="text-center">

                <div class="text-gray-700 font-semibold text-sm">Top 100 EdTech Software Developers 2025</div>
            </div>

            <div class="text-center">

                <div class="text-gray-700 font-semibold text-sm">2023 Award-winning company</div>
            </div>

            <div class="text-center">

                <div class="text-gray-700 font-semibold text-sm">Inc. 5000 2024</div>
            </div>

            <div class="text-center">

                <div class="text-gray-700 font-semibold text-sm">Best of 2024 Software Company Schaumburg, IL</div>
            </div>

            <div class="text-center">

                <div class="text-gray-700 font-semibold text-sm">Forbes Council</div>
            </div>

            <div class="text-center">

                <div class="text-gray-700 font-semibold text-sm">TOP USA awards</div>
            </div>

        </div>

    </div>

</section>



<!-- Technology Stack Section -->

<section class="section">
    <div class="container mx-auto px-6 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-3xl lg:text-3xl font-bold text-gray-900 mb-10">Technology stack</h2>
            <a href="#" class="btn-primary">Discover More</a>
        </div>



        <div class="grid lg:grid-cols-2 gap-16">
            <!-- Front-End Technologies -->

            <div class="card">
                <div class="flex items-center justify-between mb-8">
                    <h3 class="text-3xl font-bold text-gray-900">Front-End</h3>
                    <span class="text-orange-500 font-bold text-lg">44 Developers</span>
                </div>

                <div class="grid grid-cols-3 gap-4">

                    <div class="text-center p-4 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
                        <div class="text-gray-900 font-semibold text-sm">Turborepo</div>
                    </div>

                    <div class="text-center p-4 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
                        <div class="text-gray-900 font-semibold text-sm">GraphQL</div>
                    </div>

                    <div class="text-center p-4 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
                        <div class="text-gray-900 font-semibold text-sm">React hook form</div>
                    </div>

                    <div class="text-center p-4 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
                        <div class="text-gray-900 font-semibold text-sm">Ant Design</div>
                    </div>

                    <div class="text-center p-4 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
                        <div class="text-gray-900 font-semibold text-sm">Material UI</div>
                    </div>

                    <div class="text-center p-4 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
                        <div class="text-gray-900 font-semibold text-sm">Apollo Client</div>
                    </div>

                    <div class="text-center p-4 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
                        <div class="text-gray-900 font-semibold text-sm">React.js</div>
                    </div>

                    <div class="text-center p-4 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
                        <div class="text-gray-900 font-semibold text-sm">REST API</div>
                    </div>

                    <div class="text-center p-4 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
                        <div class="text-gray-900 font-semibold text-sm">TypeScript</div>
                    </div>

                </div>

            </div>



            <!-- Back-End Technologies -->

            <div class="card">
                <div class="flex items-center justify-between mb-8">
                    <h3 class="text-3xl font-bold text-gray-900">Back-End</h3>
                    <span class="text-orange-500 font-bold text-lg">55 Developers</span>
                </div>

                <div class="grid grid-cols-3 gap-4">

                    <div class="text-center p-4 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
                        <div class="text-gray-900 font-semibold text-sm">Python</div>
                    </div>

                    <div class="text-center p-4 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
                        <div class="text-gray-900 font-semibold text-sm">Scala</div>
                    </div>

                    <div class="text-center p-4 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
                        <div class="text-gray-900 font-semibold text-sm">Java</div>
                    </div>

                    <div class="text-center p-4 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
                        <div class="text-gray-900 font-semibold text-sm">Node.js</div>
                    </div>

                    <div class="text-center p-4 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
                        <div class="text-gray-900 font-semibold text-sm">PHP</div>
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const homeFilterButtons = document.querySelectorAll('.home-filter-btn');
        const homeCaseStudyItems = document.querySelectorAll('.home-case-study-item');

        console.log('Home filter buttons found:', homeFilterButtons.length);
        console.log('Home case study items found:', homeCaseStudyItems.length);

        homeFilterButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();

                const filter = this.getAttribute('data-filter');
                console.log('Home filter clicked:', filter);

                // Update active button
                homeFilterButtons.forEach(btn => {
                    btn.classList.remove('active', 'bg-orange-500', 'text-white');
                    btn.classList.add('bg-gray-200', 'text-gray-700');
                });

                this.classList.remove('bg-gray-200', 'text-gray-700');
                this.classList.add('active', 'bg-orange-500', 'text-white');

                // Filter case studies
                homeCaseStudyItems.forEach(item => {
                    const category = item.getAttribute('data-category');
                    console.log('Home item category:', category, 'Filter:', filter);

                    if (filter === 'all' || category === filter) {
                        item.style.display = 'block';
                        item.style.opacity = '1';
                        console.log('Showing home item:', item);
                    } else {
                        item.style.display = 'none';
                        item.style.opacity = '0';
                        console.log('Hiding home item:', item);
                    }
                });
            });
        });

        // Add hover effects for filter buttons
        homeFilterButtons.forEach(button => {
            button.addEventListener('mouseenter', function() {
                if (!this.classList.contains('active')) {
                    this.style.transform = 'scale(1.05)';
                    this.style.transition = 'all 0.2s ease';
                }
            });

            button.addEventListener('mouseleave', function() {
                if (!this.classList.contains('active')) {
                    this.style.transform = 'scale(1)';
                }
            });
        });
    });
</script>

@endsection