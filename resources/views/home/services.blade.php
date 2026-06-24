<x-home.section id="services" tone="white">
    <x-home.section-header
        badge="Our Expertise"
        title="What We Create"
        highlight="Create"
        subtitle="Transforming innovative ideas into exceptional digital experiences that drive business growth."
    />

    @if(isset($catalogServices) && $catalogServices->isNotEmpty())
    @php
        $featuredServices = $catalogServices->take(3);
        $additionalServices = $catalogServices->skip(3);
    @endphp

    @if($featuredServices->isNotEmpty())
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 mb-10 lg:mb-12">
        @foreach($featuredServices as $service)
        <article class="group relative bg-white rounded-2xl p-7 lg:p-8 border border-gray-100 shadow-sm hover:shadow-xl hover:shadow-orange-500/5 hover:-translate-y-1 transition-all duration-300">
            <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center mb-5 overflow-hidden">
                @if($service->icon)
                    <img src="{{ Storage::url($service->icon) }}" alt="" class="w-7 h-7 object-contain">
                @else
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                @endif
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $service->title }}</h3>
            <p class="text-gray-600 text-sm leading-relaxed mb-5">
                {{ $service->short_description ?? Str::limit(strip_tags($service->description), 120) }}
            </p>
            @if($service->activeSubServices->isNotEmpty())
            <div class="flex flex-wrap gap-2 mb-5">
                @foreach($service->activeSubServices->take(3) as $subService)
                <a href="{{ route('services.sub-service', [$service, $subService]) }}" class="px-2.5 py-1 bg-orange-50 text-orange-700 text-xs font-medium rounded-full hover:bg-orange-100 transition-colors">
                    {{ $subService->title }}
                </a>
                @endforeach
            </div>
            @endif
            <a href="{{ route('catalog.services.show', $service) }}" class="inline-flex items-center text-sm font-semibold text-orange-600 hover:text-orange-700">
                Learn more
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </article>
        @endforeach
    </div>
    @endif

    @if($additionalServices->isNotEmpty())
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
        @foreach($additionalServices as $index => $service)
        <article class="bg-white rounded-2xl p-7 border border-gray-100 hover:border-orange-100 hover:shadow-md transition-all duration-300">
            <div class="flex items-start gap-3 mb-5">
                <span class="text-lg font-bold text-orange-500">{{ str_pad($index + 4, 2, '0', STR_PAD_LEFT) }}</span>
                <h3 class="text-lg font-bold text-gray-900">{{ $service->title }}</h3>
            </div>
            @if($service->activeSubServices->isNotEmpty())
            <ul class="space-y-2 mb-5">
                @foreach($service->activeSubServices->take(4) as $subService)
                <li><a href="{{ route('services.sub-service', [$service, $subService]) }}" class="text-sm text-gray-600 hover:text-orange-600 transition-colors">{{ $subService->title }}</a></li>
                @endforeach
            </ul>
            @endif
            <a href="{{ route('catalog.services.show', $service) }}" class="text-sm font-semibold text-orange-600 hover:text-orange-700">Learn more →</a>
        </article>
        @endforeach
    </div>
    @endif

    <div class="mt-12 text-center">
        <a href="{{ route('catalog.services') }}" class="inline-flex items-center px-6 py-3 bg-orange-500 hover:bg-orange-600 text-white font-semibold rounded-xl transition-colors">
            View All Services
            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        </a>
    </div>
    @endif
</x-home.section>
