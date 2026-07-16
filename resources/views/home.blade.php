@extends('layouts.website')

@section('title', config('company.seo.default_title'))
@section('description', config('company.seo.default_description'))
@section('keywords', 'software development company Gurugram, web development, mobile app development, custom software, VanTroZ, IT partner India')
@section('og_type', 'website')

@section('content')
<div id="home-page" class="home-apple">

<!-- Hero -->
<section id="home-hero-section" class="home-hero relative flex items-center overflow-hidden" aria-label="Welcome">

    <div class="absolute inset-0 w-full h-full hero-video-wrapper is-ready" id="hero-video-container">
        <video
            id="hero-video"
            autoplay
            muted
            loop
            playsinline
            webkit-playsinline="true"
            preload="auto"
            disablepictureinpicture
            class="hero-video hero-video-responsive absolute inset-0 w-full h-full object-cover ios-hardware-acceleration">
            <source src="{{ asset('banner/home.webm') }}" type="video/webm">
            <source src="{{ asset('banner/home.mp4') }}" type="video/mp4">
        </video>
        <div class="video-fallback absolute inset-0 hidden bg-gradient-to-br from-slate-900 via-slate-800 to-orange-950" aria-hidden="true"></div>
        <div class="hero-video-overlay absolute inset-0 pointer-events-none" aria-hidden="true"></div>
    </div>

    <div class="container mx-auto px-3 sm:px-4 md:px-5 lg:px-6 xl:px-8 relative z-10 w-full hero-content-wrapper">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 sm:gap-6 md:gap-8 lg:gap-10 xl:gap-12 items-center py-6 sm:py-8 lg:py-12">

            <div class="lg:col-span-7 space-y-3 sm:space-y-4 md:space-y-5 lg:space-y-6 xl:space-y-8 relative hero-left-content">

                <div class="flex justify-start">
                    <div class="relative inline-flex items-center px-3 py-1.5 sm:px-4 sm:py-2 bg-white/10 backdrop-blur-md border border-white/20 rounded-full text-white text-xs sm:text-sm font-medium shadow-lg apple-hero-in" style="--hero-delay: 0ms">
                        <div class="flex items-center">
                            <div class="home-hero-pulse w-1.5 h-1.5 sm:w-2 sm:h-2 bg-gradient-to-r from-orange-400 to-orange-500 rounded-full mr-1.5 sm:mr-2"></div>
                            <span class="bg-gradient-to-r from-white to-slate-200 bg-clip-text text-transparent whitespace-nowrap">Available for new projects</span>
                        </div>
                    </div>
                </div>

                <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-black text-white leading-tight tracking-tight hero-title-responsive">
                    <span class="block hero-title-line apple-hero-in" style="--hero-delay: 100ms">Build the</span>
                    <span class="block hero-title-line apple-hero-in bg-gradient-to-r from-orange-400 via-orange-500 to-orange-600 bg-clip-text text-transparent" style="--hero-delay: 200ms">Future</span>
                    <span class="block hero-title-line apple-hero-in" style="--hero-delay: 300ms">of Business</span>
                </h1>

                <p class="max-w-2xl text-sm sm:text-base md:text-lg lg:text-xl text-slate-200 leading-relaxed font-light hero-subtitle-responsive apple-hero-in" style="--hero-delay: 420ms">
                    We craft <span class="text-white font-semibold">exceptional digital experiences</span> that transform ideas into powerful, scalable solutions that drive real business growth.
                </p>

                <div class="flex flex-wrap gap-2 sm:gap-3">
                    <div class="apple-hero-in px-3 py-1.5 sm:px-4 sm:py-2 bg-white/10 backdrop-blur-sm rounded-full text-xs sm:text-sm text-slate-200 border border-white/20 whitespace-nowrap" style="--hero-delay: 520ms">
                        Lightning Fast
                    </div>
                    <div class="apple-hero-in px-3 py-1.5 sm:px-4 sm:py-2 bg-white/10 backdrop-blur-sm rounded-full text-xs sm:text-sm text-slate-200 border border-white/20 whitespace-nowrap" style="--hero-delay: 580ms">
                        Scalable Solutions
                    </div>
                    <div class="apple-hero-in px-3 py-1.5 sm:px-4 sm:py-2 bg-white/10 backdrop-blur-sm rounded-full text-xs sm:text-sm text-slate-200 border border-white/20 whitespace-nowrap" style="--hero-delay: 640ms">
                        Results Driven
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-2 sm:gap-3 md:gap-4 pt-1 sm:pt-2">
                    <a href="{{ route('contact') }}" class="apple-hero-in home-magnetic inline-flex items-center justify-center px-4 py-2.5 sm:px-5 sm:py-3 md:px-6 md:py-3 lg:px-8 lg:py-4 bg-gradient-to-r from-white to-slate-100 text-slate-900 font-bold rounded-lg sm:rounded-xl shadow-lg w-full sm:w-auto text-sm sm:text-base" style="--hero-delay: 720ms">
                        <span>Start Your Project</span>
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 ml-1.5 sm:ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                    <a href="{{ route('portfolio') }}" class="apple-hero-in inline-flex items-center justify-center px-4 py-2.5 sm:px-5 sm:py-3 md:px-6 md:py-3 lg:px-8 lg:py-4 border-2 border-white/30 text-white font-semibold rounded-lg sm:rounded-xl backdrop-blur-sm w-full sm:w-auto text-sm sm:text-base" style="--hero-delay: 800ms">
                        <span>View Our Work</span>
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 ml-1.5 sm:ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="hidden lg:flex lg:col-span-5 relative flex-col justify-center space-y-4 sm:space-y-6 hero-stats-wrapper">
                <div class="apple-hero-in home-hero-float-target relative bg-gradient-to-br from-white/15 to-white/5 backdrop-blur-xl rounded-2xl sm:rounded-3xl p-4 sm:p-6 md:p-8 border border-white/20 shadow-lg hero-main-card" style="--hero-delay: 900ms">
                    <div class="text-center">
                        <div
                            class="text-4xl sm:text-5xl md:text-6xl font-black bg-gradient-to-r from-white via-orange-200 to-orange-300 bg-clip-text text-transparent mb-2 sm:mb-3 hero-main-number"
                            data-count="5"
                            data-count-suffix="+"
                        >0</div>
                        <div class="text-white text-base sm:text-lg md:text-xl font-bold mb-1 sm:mb-2">Years Experience</div>
                        <div class="text-slate-300 text-xs sm:text-sm">Trusted by Fortune 500 companies worldwide</div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-2 sm:gap-3 md:gap-4 hero-stats-grid">
                    <div class="apple-hero-in home-hero-float-target relative bg-gradient-to-br from-white/10 to-white/5 backdrop-blur-lg rounded-xl sm:rounded-2xl p-3 sm:p-4 md:p-6 border border-white/20 text-center" style="--hero-delay: 1020ms">
                        <div
                            class="text-2xl sm:text-3xl md:text-4xl font-bold bg-gradient-to-r from-orange-300 to-orange-400 bg-clip-text text-transparent mb-1 sm:mb-2"
                            data-count="500"
                            data-count-suffix="+"
                        >0</div>
                        <div class="text-slate-300 text-xs sm:text-sm font-medium">Projects Delivered</div>
                    </div>
                    <div class="apple-hero-in home-hero-float-target relative bg-gradient-to-br from-white/10 to-white/5 backdrop-blur-lg rounded-xl sm:rounded-2xl p-3 sm:p-4 md:p-6 border border-white/20 text-center" style="--hero-delay: 1100ms">
                        <div
                            class="text-2xl sm:text-3xl md:text-4xl font-bold bg-gradient-to-r from-orange-300 to-orange-400 bg-clip-text text-transparent mb-1 sm:mb-2"
                            data-count="250"
                            data-count-suffix="+"
                        >0</div>
                        <div class="text-slate-300 text-xs sm:text-sm font-medium">Expert Developers</div>
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
@include('home.scripts')

</div>
@endsection
