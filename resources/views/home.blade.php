@extends('layouts.website')

@section('title', 'VanTroZ - Software Development Company')
@section('description', 'VanTroZ - IT partner. Driving Business Growth. Partner with dedicated IT experts who get your business.')

@section('content')
<!-- Advanced Hero Section with Video Background - 100% Responsive for All Devices & iOS -->
<section id="home-hero-section" class="hero-section relative flex items-center overflow-hidden ios-hardware-acceleration ios-viewport-height ios-hero-fixed hero-responsive">

    <!-- Video Background - Fully Responsive -->
    <div class="absolute inset-0 w-full h-full hero-video-wrapper" id="hero-video-container" style="height: calc(100vh - 64px - env(safe-area-inset-top)); height: calc((var(--ios-vh, 1vh) * 100) - 64px - env(safe-area-inset-top)); position: absolute; top: 0; left: 0; right: 0; bottom: 0;">
        <video
            id="hero-video"
            autoplay
            muted
            loop
            playsinline
            webkit-playsinline="true"
            class="absolute inset-0 w-full h-full object-cover ios-hardware-acceleration hero-video-responsive"
            style="width: 100%; height: 100%; object-fit: cover; position: absolute; top: 0; left: 0;"
            poster="{{ asset('banner/home-poster.jpg') }}">
            <source src="{{ asset('banner/home.webm') }}" type="video/webm">
            <source src="{{ asset('banner/common.mp4') }}" type="video/mp4">
            <!-- Fallback for browsers that don't support video -->
            <div class="absolute inset-0 bg-gradient-to-br from-orange-600 via-orange-700 to-orange-800"></div>
        </video>
    </div>

    <!-- Animated Background Elements - Responsive -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none hero-particles">
        <!-- Floating Particles - Hidden on very small screens -->
        <div class="absolute top-1/4 left-1/4 w-1.5 h-1.5 sm:w-2 sm:h-2 bg-orange-400/30 rounded-full animate-pulse"></div>
        <div class="absolute top-1/3 right-1/3 w-1 h-1 sm:w-1.5 sm:h-1.5 bg-orange-400/40 rounded-full animate-ping"></div>
        <div class="absolute bottom-1/4 left-1/3 w-1 h-1 sm:w-1.5 sm:h-1.5 bg-orange-300/20 rounded-full animate-pulse" style="animation-delay: 1s;"></div>
        <div class="absolute top-1/2 right-1/4 w-1 h-1 sm:w-1.5 sm:h-1.5 bg-orange-300/30 rounded-full animate-ping" style="animation-delay: 2s;"></div>

        <!-- Geometric Shapes - Responsive Sizing -->
        <div class="hidden sm:block absolute top-10 right-10 sm:top-20 sm:right-20 w-16 h-16 sm:w-24 sm:h-24 lg:w-32 lg:h-32 border border-white/10 rounded-full animate-spin" style="animation-duration: 20s;"></div>
        <div class="hidden sm:block absolute bottom-10 left-10 sm:bottom-20 sm:left-20 w-12 h-12 sm:w-20 sm:h-20 lg:w-24 lg:h-24 border border-orange-400/20 rounded-lg rotate-45 animate-pulse"></div>
    </div>

    <!-- Advanced Content Container - Fully Responsive -->
    <div class="container mx-auto px-3 sm:px-4 md:px-5 lg:px-6 xl:px-8 relative z-20 w-full hero-content-wrapper">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 sm:gap-6 md:gap-8 lg:gap-10 xl:gap-12 items-center py-4 sm:py-6 md:py-8 lg:py-12 xl:py-16">

            <!-- Advanced Left Content - Fully Responsive -->
            <div class="lg:col-span-7 space-y-3 sm:space-y-4 md:space-y-5 lg:space-y-6 xl:space-y-10 relative z-30 hero-left-content">

                <!-- Advanced Hero Badge - Responsive -->
                <div class="flex justify-start animate-fade-in-up">
                    <div class="group relative inline-flex items-center px-3 py-1.5 sm:px-4 sm:py-2 bg-gradient-to-r from-white/10 to-white/5 backdrop-blur-md border border-white/20 rounded-full text-white text-xs sm:text-sm font-medium shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105 hero-badge">
                        <div class="absolute inset-0 bg-gradient-to-r from-orange-500/20 to-orange-600/20 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="relative flex items-center">
                            <div class="w-1.5 h-1.5 sm:w-2 sm:h-2 bg-gradient-to-r from-orange-400 to-orange-500 rounded-full mr-1.5 sm:mr-2 animate-pulse"></div>
                            <span class="bg-gradient-to-r from-white to-slate-200 bg-clip-text text-transparent whitespace-nowrap">Available for new projects</span>
                        </div>
                    </div>
                </div>

                <!-- Advanced Hero Headlines - Fully Responsive -->
                <div class="space-y-2 sm:space-y-3 md:space-y-4 lg:space-y-5 xl:space-y-6 animate-fade-in-up" style="animation-delay: 0.2s;">
                    <h1 class="text-xl xs:text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-black text-white leading-tight tracking-tight hero-title-responsive">
                        <span class="block">Build the</span>
                        <span class="block bg-gradient-to-r from-orange-400 via-orange-500 to-orange-600 bg-clip-text text-transparent animate-gradient-x">Future</span>
                        <span class="block">of Business</span>
                    </h1>

                    <!-- Advanced Hero Subtitle - Fully Responsive -->
                    <div class="max-w-2xl">
                        <p class="text-sm xs:text-base sm:text-lg md:text-xl lg:text-2xl text-slate-200 leading-relaxed font-light animate-fade-in-up hero-subtitle-responsive" style="animation-delay: 0.4s;">
                            We craft <span class="text-white font-semibold">exceptional digital experiences</span> that transform ideas into powerful, scalable solutions that drive real business growth.
                        </p>
                    </div>

                    <!-- Advanced Feature Pills - Responsive -->
                    <div class="flex flex-wrap gap-2 sm:gap-3 animate-fade-in-up hero-pills" style="animation-delay: 0.6s;">
                        <div class="px-3 py-1.5 sm:px-4 sm:py-2 bg-white/10 backdrop-blur-sm rounded-full text-xs sm:text-sm text-slate-200 border border-white/20 whitespace-nowrap">
                            âš¡ Lightning Fast
                        </div>
                        <div class="px-3 py-1.5 sm:px-4 sm:py-2 bg-white/10 backdrop-blur-sm rounded-full text-xs sm:text-sm text-slate-200 border border-white/20 whitespace-nowrap">
                            ðŸš€ Scalable Solutions
                        </div>
                        <div class="px-3 py-1.5 sm:px-4 sm:py-2 bg-white/10 backdrop-blur-sm rounded-full text-xs sm:text-sm text-slate-200 border border-white/20 whitespace-nowrap">
                            ðŸŽ¯ Results Driven
                        </div>
                    </div>

                    <!-- Advanced CTA Buttons - Fully Responsive -->
                    <div class="flex flex-col xs:flex-row gap-2 sm:gap-3 md:gap-4 pt-2 sm:pt-3 md:pt-4 animate-fade-in-up hero-buttons" style="animation-delay: 0.8s;">
                        <a href="{{ route('contact') }}" class="group relative inline-flex items-center justify-center px-4 py-2.5 sm:px-5 sm:py-3 md:px-6 md:py-3 lg:px-8 lg:py-4 bg-gradient-to-r from-white to-slate-100 text-slate-900 font-bold rounded-lg sm:rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 hover:scale-105 ios-touch-target ios-hardware-acceleration w-full xs:w-auto text-sm sm:text-base hero-btn-primary">
                            <div class="absolute inset-0 bg-gradient-to-r from-orange-500 to-orange-600 opacity-0 group-hover:opacity-10 transition-opacity duration-300"></div>
                            <span class="relative">Start Your Project</span>
                            <svg class="relative w-4 h-4 sm:w-5 sm:h-5 ml-1.5 sm:ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </a>
                        <a href="{{ route('portfolio') }}" class="group relative inline-flex items-center justify-center px-4 py-2.5 sm:px-5 sm:py-3 md:px-6 md:py-3 lg:px-8 lg:py-4 border-2 border-white/30 text-white font-semibold rounded-lg sm:rounded-xl backdrop-blur-sm overflow-hidden transition-all duration-300 hover:border-white/50 hover:bg-white/10 transform hover:-translate-y-1 ios-touch-target ios-hardware-acceleration w-full xs:w-auto text-sm sm:text-base hero-btn-secondary">
                            <div class="absolute inset-0 bg-gradient-to-r from-orange-500/20 to-orange-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <span class="relative">View Our Work</span>
                            <svg class="relative w-4 h-4 sm:w-5 sm:h-5 ml-1.5 sm:ml-2 group-hover:rotate-45 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Advanced Right Content - Interactive Stats - Fully Responsive -->
            <div class="lg:col-span-5 relative h-full flex flex-col justify-center space-y-4 sm:space-y-6 md:space-y-8 hero-stats-wrapper">

                <!-- Main Achievement Card - Responsive -->
                <div class="group relative bg-gradient-to-br from-white/15 to-white/5 backdrop-blur-xl rounded-2xl sm:rounded-3xl p-4 sm:p-6 md:p-8 border border-white/20 shadow-lg hover:shadow-xl transition-all duration-500 hover:-translate-y-2 animate-fade-in-up hero-main-card" style="animation-delay: 1s;">
                    <div class="absolute inset-0 bg-gradient-to-br from-orange-500/10 to-orange-600/10 rounded-2xl sm:rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="relative text-center">
                        <div class="text-4xl sm:text-5xl md:text-6xl font-black bg-gradient-to-r from-white via-orange-200 to-orange-300 bg-clip-text text-transparent mb-2 sm:mb-3 animate-pulse hero-main-number">
                            24+
                        </div>
                        <div class="text-white text-base sm:text-lg md:text-xl font-bold mb-1 sm:mb-2">Years of Excellence</div>
                        <div class="text-slate-300 text-xs sm:text-sm">Trusted by Fortune 500 companies worldwide</div>
                        <div class="absolute -top-1 -right-1 sm:-top-2 sm:-right-2 w-4 h-4 sm:w-5 sm:h-6 sm:h-6 bg-gradient-to-r from-orange-400 to-orange-500 rounded-full animate-ping"></div>
                    </div>
                </div>

                <!-- Stats Grid - Fully Responsive -->
                <div class="grid grid-cols-2 gap-2 sm:gap-3 md:gap-4 hero-stats-grid">
                    <div class="group relative bg-gradient-to-br from-white/10 to-white/5 backdrop-blur-lg rounded-xl sm:rounded-2xl p-3 sm:p-4 md:p-6 border border-white/20 text-center hover:bg-white/15 transition-all duration-300 hover:-translate-y-1 animate-fade-in-up hero-stat-card" style="animation-delay: 1.2s;">
                        <div class="absolute inset-0 bg-gradient-to-br from-orange-500/20 to-orange-600/20 rounded-xl sm:rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="relative">
                            <div class="text-2xl sm:text-3xl md:text-4xl font-bold bg-gradient-to-r from-orange-300 to-orange-400 bg-clip-text text-transparent mb-1 sm:mb-2 hero-stat-number">3500+</div>
                            <div class="text-slate-300 text-xs sm:text-sm font-medium">Projects Delivered</div>
                        </div>
                    </div>
                    <div class="group relative bg-gradient-to-br from-white/10 to-white/5 backdrop-blur-lg rounded-xl sm:rounded-2xl p-3 sm:p-4 md:p-6 border border-white/20 text-center hover:bg-white/15 transition-all duration-300 hover:-translate-y-1 animate-fade-in-up hero-stat-card" style="animation-delay: 1.4s;">
                        <div class="absolute inset-0 bg-gradient-to-br from-orange-500/20 to-orange-600/20 rounded-xl sm:rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="relative">
                            <div class="text-2xl sm:text-3xl md:text-4xl font-bold bg-gradient-to-r from-orange-300 to-orange-400 bg-clip-text text-transparent mb-1 sm:mb-2 hero-stat-number">250+</div>
                            <div class="text-slate-300 text-xs sm:text-sm font-medium">Expert Developers</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('home.stats')
@include('home.clients')
@include('home.services')
@include('home.case-studies')
@include('home.about')
@include('home.process')
@include('home.industries')

<x-testimonials-showcase :testimonials="$testimonials" />

<x-technology-stack-section :technologies="$technologies" />

@include('home.awards')
@include('home.blog')
@include('home.cta')
@include('home.scripts')

<!-- Immediate Hero Section Fix for iOS/Mobile -->
<script>
    (function() {
        'use strict';
        
        const fixHeroImmediate = () => {
            const heroSection = document.getElementById('home-hero-section');
            const videoContainer = document.getElementById('hero-video-container');
            const video = document.getElementById('hero-video');
            
            if (!heroSection) return;
            
            // Get actual viewport height
            const windowHeight = window.innerHeight;
            const visualHeight = window.visualViewport ? window.visualViewport.height : windowHeight;
            const actualHeight = Math.max(windowHeight, visualHeight);
            const vh = actualHeight * 0.01;
            
            // Set CSS variable
            document.documentElement.style.setProperty('--ios-vh', `${vh}px`);
            
            // Fix hero section
            heroSection.style.height = `${actualHeight}px`;
            heroSection.style.minHeight = `${actualHeight}px`;
            
            // Fix video container
            if (videoContainer) {
                videoContainer.style.height = `${actualHeight}px`;
                videoContainer.style.minHeight = `${actualHeight}px`;
            }
            
            // Fix video
            if (video) {
                video.style.height = `${actualHeight}px`;
                video.style.minHeight = `${actualHeight}px`;
            }
        };
        
        // Run immediately
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', fixHeroImmediate);
        } else {
            fixHeroImmediate();
        }
        
        // Run on resize
        let resizeTimeout;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(fixHeroImmediate, 50);
        }, { passive: true });
        
        // Run on orientation change
        window.addEventListener('orientationchange', () => {
            setTimeout(fixHeroImmediate, 200);
        });
        
        // Run on visual viewport changes (iOS Safari)
        if (window.visualViewport) {
            window.visualViewport.addEventListener('resize', fixHeroImmediate, { passive: true });
        }
    })();
</script>

@endsection
