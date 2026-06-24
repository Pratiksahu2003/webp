<section id="apple-finale" class="apple-finale relative min-h-[100svh] flex items-center justify-center overflow-hidden bg-[#000]">
    <div class="apple-finale__orb apple-finale__orb--1" data-parallax="0.15" aria-hidden="true"></div>
    <div class="apple-finale__orb apple-finale__orb--2" data-parallax="0.25" aria-hidden="true"></div>
    <div class="apple-finale__orb apple-finale__orb--3" data-parallax="0.1" aria-hidden="true"></div>
    <div class="apple-finale__grid absolute inset-0 opacity-[0.07]" aria-hidden="true" style="background-image: linear-gradient(rgba(255,255,255,.08) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,.08) 1px, transparent 1px); background-size: 64px 64px;"></div>

    <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-24 text-center">
        <p class="apple-reveal apple-reveal--finale text-orange-400 text-xs sm:text-sm font-semibold uppercase tracking-[0.35em] mb-8">
            {{ config('company.name') }}
        </p>

        <h2 class="apple-finale__headline mb-6 sm:mb-8">
            <span class="apple-reveal apple-reveal--finale apple-finale__line block text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold text-white tracking-tight leading-[1.05]" style="--reveal-delay: 0.1s">Design.</span>
            <span class="apple-reveal apple-reveal--finale apple-finale__line block text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold tracking-tight leading-[1.05] bg-gradient-to-r from-orange-400 via-orange-500 to-amber-400 bg-clip-text text-transparent" style="--reveal-delay: 0.22s">Build.</span>
            <span class="apple-reveal apple-reveal--finale apple-finale__line block text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold text-white tracking-tight leading-[1.05]" style="--reveal-delay: 0.34s">Scale.</span>
        </h2>

        <p class="apple-reveal apple-reveal--finale text-base sm:text-lg md:text-xl text-gray-400 max-w-2xl mx-auto leading-relaxed mb-10 sm:mb-12" style="--reveal-delay: 0.46s">
            From first sketch to production launch — we craft digital products with the precision and polish your business deserves.
        </p>

        <div class="apple-reveal apple-reveal--finale flex flex-col sm:flex-row items-center justify-center gap-6 sm:gap-10" style="--reveal-delay: 0.58s">
            <a href="{{ route('contact') }}" class="group inline-flex items-center text-lg sm:text-xl font-medium text-orange-400 hover:text-orange-300 transition-colors">
                Start a project
                <svg class="w-5 h-5 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
            <a href="{{ route('catalog.services') }}" class="group inline-flex items-center text-lg sm:text-xl font-medium text-gray-400 hover:text-white transition-colors">
                Explore services
                <svg class="w-5 h-5 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>
    </div>

    <div class="apple-finale__scroll-hint absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 opacity-40" aria-hidden="true">
        <span class="text-[10px] uppercase tracking-[0.2em] text-white">Scroll</span>
        <div class="w-px h-8 bg-gradient-to-b from-white to-transparent animate-pulse"></div>
    </div>
</section>
