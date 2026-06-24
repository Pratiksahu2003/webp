@php
    $industries = [
        ['title' => 'Oil & Gas', 'desc' => 'Custom asset management systems, drilling optimization tools, and remote monitoring platforms.', 'icon' => 'M13 10V3L4 14h7v7l9-11h-7z'],
        ['title' => 'Energy & Utilities', 'desc' => 'Smart grid management, renewable energy analytics, and efficiency optimization tools.', 'icon' => 'M13 10V3L4 14h7v7l9-11h-7z'],
        ['title' => 'Logistics', 'desc' => 'Route optimization, fleet management, and supply chain tracking platforms.', 'icon' => 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4'],
        ['title' => 'eCommerce', 'desc' => 'Online storefronts, inventory systems, and conversion-focused commerce experiences.', 'icon' => 'M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z'],
        ['title' => 'Healthcare', 'desc' => 'EHR systems, telemedicine platforms, and HIPAA-aware patient experiences.', 'icon' => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z'],
        ['title' => 'FinTech', 'desc' => 'Secure, scalable financial technology for banking and digital finance.', 'icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
    ];
@endphp

<x-home.section id="industries" tone="accent">
    <x-home.section-header
        badge="Industries"
        title="Digital transformation for industries"
        highlight="industries"
        subtitle="Full-range software services tailored to your field — from discovery through launch and scale."
    />

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-6">
        @foreach($industries as $industry)
        <article class="group bg-white/90 backdrop-blur-sm rounded-2xl p-6 lg:p-7 border border-white shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-orange-500 to-orange-600 flex items-center justify-center mb-5 group-hover:scale-105 transition-transform">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $industry['icon'] }}"/></svg>
            </div>
            <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $industry['title'] }}</h3>
            <p class="text-sm text-gray-600 leading-relaxed mb-4">{{ $industry['desc'] }}</p>
            <a href="{{ route('contact') }}" class="inline-flex items-center text-sm font-semibold text-orange-600 hover:text-orange-700">
                Learn more
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </article>
        @endforeach
    </div>
</x-home.section>
