<footer class="relative bg-white overflow-hidden border-t border-gray-100">
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-0 left-0 w-96 h-96 bg-orange-50 rounded-full blur-3xl opacity-50"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-orange-100 rounded-full blur-3xl opacity-30"></div>
    </div>

    <div class="relative h-px bg-gradient-to-r from-transparent via-orange-200 to-transparent"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
        {{-- Brand + Stats --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 mb-12 lg:mb-16 items-start">
            <div class="lg:col-span-5 space-y-5">
                <a href="{{ route('home') }}" class="inline-block">
                    <img src="{{ asset('logo/logo.png') }}" alt="{{ config('company.name') }} Logo" class="h-12 w-auto">
                </a>
                <p class="text-gray-600 leading-relaxed text-sm max-w-md">
                    {{ config('company.name') }} is your trusted IT partner driving business growth. We specialize in custom software development, web applications, mobile apps, and digital transformation solutions.
                </p>
                <div class="flex items-center gap-2">
                    @foreach([
                        ['url' => config('company.social.linkedin'), 'label' => 'LinkedIn', 'icon' => 'M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z'],
                        ['url' => config('company.social.twitter'), 'label' => 'X', 'icon' => 'M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z'],
                        ['url' => config('company.social.facebook'), 'label' => 'Facebook', 'icon' => 'M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z'],
                        ['url' => config('company.social.instagram'), 'label' => 'Instagram', 'icon' => 'M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z'],
                    ] as $social)
                    <a href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $social['label'] }}" class="group w-10 h-10 bg-gray-50 border border-gray-200 rounded-lg flex items-center justify-center hover:bg-orange-500 hover:border-orange-500 transition-all duration-300">
                        <svg class="w-5 h-5 text-gray-600 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24"><path d="{{ $social['icon'] }}"/></svg>
                    </a>
                    @endforeach
                </div>
            </div>

            <div class="lg:col-span-7">
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                    @foreach([
                        ['value' => '5+', 'label' => 'Years Experience'],
                        ['value' => '500+', 'label' => 'Projects Delivered'],
                        ['value' => '250+', 'label' => 'Developers'],
                        ['value' => '98%', 'label' => 'Satisfaction'],
                    ] as $stat)
                    <div class="bg-gradient-to-br from-orange-50 to-white border border-orange-100 rounded-xl p-4 text-center hover:border-orange-300 hover:shadow-md transition-all">
                        <div class="text-2xl sm:text-3xl font-black bg-gradient-to-r from-orange-500 to-orange-600 bg-clip-text text-transparent mb-1">{{ $stat['value'] }}</div>
                        <div class="text-gray-600 text-xs font-semibold leading-tight">{{ $stat['label'] }}</div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Dynamic Services --}}
        @if(isset($catalogServices) && $catalogServices->isNotEmpty())
        <div class="mb-12 pb-12 border-b border-gray-100">
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-8">
                <div>
                    <h3 class="text-gray-900 font-bold text-lg">Our Services</h3>
                    <p class="text-gray-500 text-sm mt-1">Explore solutions tailored to your business needs</p>
                </div>
                <a href="{{ route('catalog.services') }}" class="inline-flex items-center text-orange-600 hover:text-orange-700 font-semibold text-sm whitespace-nowrap">
                    View All Services
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-8 gap-y-10">
                @foreach($catalogServices as $service)
                <div class="min-w-0">
                    <a href="{{ route('catalog.services.show', $service) }}" class="text-gray-900 hover:text-orange-600 font-semibold text-sm transition-colors block mb-3 pb-2 border-b border-gray-100">
                        {{ $service->title }}
                    </a>
                    <ul class="space-y-2">
                        @foreach($service->activeSubServices as $subService)
                        <li>
                            <a href="{{ route('services.sub-service', [$service, $subService]) }}" class="text-gray-600 hover:text-orange-500 transition-colors text-sm flex items-start gap-2 group">
                                <span class="w-1 h-1 rounded-full bg-gray-300 mt-2 flex-shrink-0 group-hover:bg-orange-500 transition-colors"></span>
                                <span class="leading-snug">{{ $subService->title }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        {{-- Company / Contact / Certifications --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 lg:gap-12 items-start">
            <div>
                <h3 class="text-gray-900 font-bold text-base mb-4 pb-2 border-b border-orange-100 inline-block">Company</h3>
                <ul class="space-y-2.5 mt-2">
                    @foreach([
                        ['route' => 'about', 'label' => 'About Us'],
                        ['route' => 'case-studies', 'label' => 'Case Studies'],
                        ['route' => 'blog.index', 'label' => 'Blog & Insights'],
                        ['route' => 'careers', 'label' => 'Careers'],
                        ['route' => 'contact', 'label' => 'Contact Us'],
                        ['route' => 'portfolio', 'label' => 'Portfolio'],
                    ] as $link)
                    <li>
                        <a href="{{ route($link['route']) }}" class="text-gray-600 hover:text-orange-500 transition-colors text-sm flex items-center gap-2 group">
                            <span class="w-1 h-1 rounded-full bg-gray-300 group-hover:bg-orange-500 transition-colors"></span>
                            {{ $link['label'] }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h3 class="text-gray-900 font-bold text-base mb-4 pb-2 border-b border-orange-100 inline-block">Contact</h3>
                <ul class="space-y-4 mt-2">
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-orange-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <div class="text-gray-600 text-sm leading-relaxed">
                            <p>{{ config('company.address.primary.street') }}</p>
                            <p>{{ config('company.address.primary.city') }}, {{ config('company.address.primary.state') }}</p>
                            <p>{{ config('company.address.primary.country') }} {{ config('company.address.primary.zip') }}</p>
                        </div>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-orange-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <a href="tel:{{ config('company.contact.phone') }}" class="text-gray-600 hover:text-orange-500 transition-colors text-sm font-medium">{{ config('company.contact.phone') }}</a>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-orange-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <a href="mailto:{{ config('company.contact.email') }}" class="text-gray-600 hover:text-orange-500 transition-colors text-sm font-medium break-all">{{ config('company.contact.email') }}</a>
                    </li>
                </ul>
            </div>

            <div class="sm:col-span-2 lg:col-span-1">
                <h3 class="text-gray-900 font-bold text-base mb-4 pb-2 border-b border-orange-100 inline-block">Certifications</h3>
                <div class="grid grid-cols-2 gap-3 mt-2 max-w-xs sm:max-w-none">
                    @foreach([
                        ['title' => 'ISO 27001', 'sub' => 'Security'],
                        ['title' => 'AWS', 'sub' => 'Partner'],
                        ['title' => 'Microsoft', 'sub' => 'Gold'],
                        ['title' => 'Inc 5000', 'sub' => '2024'],
                    ] as $cert)
                    <div class="bg-orange-50 border border-orange-100 rounded-lg p-3 text-center hover:border-orange-300 transition-all">
                        <div class="text-orange-600 font-bold text-xs">{{ $cert['title'] }}</div>
                        <div class="text-gray-500 text-xs mt-0.5">{{ $cert['sub'] }}</div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- Bottom Bar --}}
    <div class="relative border-t border-gray-200 bg-gray-50/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5 ios-safe-area-padding">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                <div class="text-center lg:text-left">
                    <p class="text-gray-600 text-sm">
                        © {{ date('Y') }} <span class="text-gray-900 font-semibold">{{ config('company.name') }}</span>. All rights reserved.
                    </p>
                    <p class="text-gray-500 text-xs mt-1">Proudly serving clients worldwide since 2000</p>
                </div>

                <div class="flex flex-wrap items-center justify-center gap-4 lg:gap-6">
                    <button type="button" onclick="scrollToTop()" class="flex items-center gap-2 text-gray-600 hover:text-orange-500 transition-colors text-sm font-medium px-2 py-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                        Back to Top
                    </button>
                    <a href="{{ route('contact') }}" class="flex items-center gap-2 text-gray-600 hover:text-orange-500 transition-colors text-sm font-medium px-2 py-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                        Get Quote
                    </a>
                </div>

                <div class="flex flex-wrap items-center justify-center lg:justify-end gap-x-5 gap-y-2 text-sm">
                    <a href="{{ route('privacy-policy') }}" class="text-gray-600 hover:text-orange-500 transition-colors">Privacy</a>
                    <a href="{{ route('terms-conditions') }}" class="text-gray-600 hover:text-orange-500 transition-colors">Terms</a>
                    <a href="{{ route('legal.cookie-policy') }}" class="text-gray-600 hover:text-orange-500 transition-colors">Cookies</a>
                    <a href="{{ route('sitemap') }}" class="text-gray-600 hover:text-orange-500 transition-colors">Sitemap</a>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed bottom-6 right-6 z-40 whatsapp-float" style="margin-bottom: env(safe-area-inset-bottom, 0);">
        <button type="button" onclick="openWhatsApp()" aria-label="Chat on WhatsApp" class="group relative w-14 h-14 sm:w-16 sm:h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-full flex items-center justify-center shadow-xl hover:shadow-orange-500/30 transition-all duration-300 hover:scale-105">
            <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M20 2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h4l4 4 4-4h4c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2 12H6v-2h12v2zm0-3H6V9h12v2zm0-3H6V6h12v2z"/></svg>
        </button>
    </div>
</footer>

<script>
function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function openWhatsApp() {
    const phoneNumber = '{{ config("company.contact.phone") }}';
    const cleanPhone = phoneNumber.replace(/\D/g, '');
    const message = encodeURIComponent('Hello! I would like to get in touch with {{ config("company.name") }}. I found your website and I\'m interested in your services.');
    window.open(`https://wa.me/${cleanPhone}?text=${message}`, '_blank');
}
</script>
