@extends('layouts.website')

@section('title', config('company.seo.default_title'))
@section('description', config('company.seo.default_description'))
@section('keywords', 'software development company Gurugram, web development, mobile app development, custom software, VanTroZ, IT partner India')
@section('og_type', 'website')

@section('content')
<div id="home-page" class="home-apple">

<!-- Hero -->
<section id="home-hero-section" class="home-hero hero-static relative flex items-center overflow-hidden" aria-label="Welcome">

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
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-3 sm:gap-4 lg:gap-5 items-center py-3 sm:py-4 lg:py-5">

            <div class="lg:col-span-7 space-y-2 sm:space-y-2.5 md:space-y-3 relative hero-left-content">

                <div class="flex justify-start">
                    <div class="relative inline-flex items-center px-2.5 py-1 sm:px-3 sm:py-1.5 bg-white/10 backdrop-blur-md border border-white/20 rounded-full text-white text-[11px] sm:text-xs font-medium shadow-lg">
                        <div class="flex items-center">
                            <div class="w-1.5 h-1.5 bg-gradient-to-r from-orange-400 to-orange-500 rounded-full mr-1.5"></div>
                            <span class="bg-gradient-to-r from-white to-slate-200 bg-clip-text text-transparent whitespace-nowrap">Available for new projects</span>
                        </div>
                    </div>
                </div>

                <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-[2.75rem] xl:text-5xl font-black text-white leading-[1.08] tracking-tight hero-title-responsive">
                    <span class="inline">Build the </span>
                    <span class="inline bg-gradient-to-r from-orange-400 via-orange-500 to-orange-600 bg-clip-text text-transparent">Future</span>
                    <span class="inline"> of Business</span>
                </h1>

                <p class="max-w-xl text-sm sm:text-base lg:text-lg text-slate-300 leading-snug font-light hero-subtitle-responsive">
                    We craft <span class="text-white font-medium">exceptional digital experiences</span> that transform ideas into scalable solutions for real business growth.
                </p>

                <div class="flex flex-wrap gap-1.5 sm:gap-2">
                    <div class="px-2.5 py-1 sm:px-3 sm:py-1.5 bg-white/10 backdrop-blur-sm rounded-full text-[11px] sm:text-xs text-slate-200 border border-white/20 whitespace-nowrap">
                        Lightning Fast
                    </div>
                    <div class="px-2.5 py-1 sm:px-3 sm:py-1.5 bg-white/10 backdrop-blur-sm rounded-full text-[11px] sm:text-xs text-slate-200 border border-white/20 whitespace-nowrap">
                        Scalable Solutions
                    </div>
                    <div class="px-2.5 py-1 sm:px-3 sm:py-1.5 bg-white/10 backdrop-blur-sm rounded-full text-[11px] sm:text-xs text-slate-200 border border-white/20 whitespace-nowrap">
                        Results Driven
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-2 sm:gap-2.5 pt-0.5">
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-4 py-2 sm:px-5 sm:py-2.5 bg-gradient-to-r from-white to-slate-100 text-slate-900 font-bold rounded-lg shadow-lg w-full sm:w-auto text-sm">
                        <span>Start Your Project</span>
                        <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                    <a href="{{ route('portfolio') }}" class="inline-flex items-center justify-center px-4 py-2 sm:px-5 sm:py-2.5 border border-white/30 text-white font-semibold rounded-lg backdrop-blur-sm w-full sm:w-auto text-sm">
                        <span>View Our Work</span>
                        <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="hidden lg:flex lg:col-span-5 relative flex-col justify-center hero-stats-wrapper">
                <div class="hero-stats-compact space-y-2.5">
                    <div class="bg-gradient-to-br from-white/15 to-white/5 backdrop-blur-xl rounded-xl p-4 border border-white/20 shadow-lg hero-main-card">
                        <div class="flex items-center justify-between gap-4">
                            <div>
                                <div class="text-3xl xl:text-4xl font-black bg-gradient-to-r from-white via-orange-200 to-orange-300 bg-clip-text text-transparent leading-none hero-main-number">5+</div>
                                <div class="text-white text-sm font-semibold mt-1">Years Experience</div>
                            </div>
                            <p class="text-slate-400 text-xs leading-snug max-w-[9rem] text-right">Trusted by growing businesses worldwide</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-2.5 hero-stats-grid">
                        <div class="bg-gradient-to-br from-white/10 to-white/5 backdrop-blur-lg rounded-xl p-3 border border-white/20 text-center">
                            <div class="text-2xl xl:text-3xl font-bold bg-gradient-to-r from-orange-300 to-orange-400 bg-clip-text text-transparent leading-none">500+</div>
                            <div class="text-slate-300 text-[11px] font-medium mt-1">Projects Delivered</div>
                        </div>
                        <div class="bg-gradient-to-br from-white/10 to-white/5 backdrop-blur-lg rounded-xl p-3 border border-white/20 text-center">
                            <div class="text-2xl xl:text-3xl font-bold bg-gradient-to-r from-orange-300 to-orange-400 bg-clip-text text-transparent leading-none">250+</div>
                            <div class="text-slate-300 text-[11px] font-medium mt-1">Expert Developers</div>
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
@include('home.scripts')

</div>
@endsection
