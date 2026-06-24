<x-home.section id="case-studies" tone="soft">
    <x-home.section-header
        badge="Success Stories"
        title="Case Studies"
        subtitle="Real outcomes from products we've designed, built, and scaled."
    />

    @php
        $categories = $caseStudies->pluck('category')->filter()->unique()->values();
    @endphp

    @if($categories->isNotEmpty())
    <div class="flex flex-wrap justify-center gap-2 sm:gap-3 mb-10 lg:mb-12">
        <button type="button" class="home-filter-btn active px-4 sm:px-5 py-2 rounded-full text-sm font-semibold bg-orange-500 text-white" data-filter="all">All</button>
        @foreach($categories as $category)
        <button type="button" class="home-filter-btn px-4 sm:px-5 py-2 rounded-full text-sm font-medium bg-white text-gray-700 border border-gray-200 hover:border-orange-200" data-filter="{{ Str::slug($category) }}">{{ $category }}</button>
        @endforeach
    </div>
    @endif

    @if($caseStudies->isNotEmpty())
    <div class="grid md:grid-cols-2 gap-6 lg:gap-8">
        @foreach($caseStudies as $study)
        <article class="home-case-study-item group bg-white rounded-2xl p-7 lg:p-8 border border-gray-100 shadow-sm hover:shadow-lg hover:border-orange-100 transition-all duration-300" data-category="{{ Str::slug($study->category ?? 'general') }}">
            @if($study->industry)
            <span class="inline-flex px-3 py-1 bg-orange-50 text-orange-700 text-xs font-semibold rounded-full mb-4">{{ $study->industry }}</span>
            @endif
            <h3 class="text-xl font-bold text-gray-900 mb-4 leading-snug group-hover:text-orange-600 transition-colors">{{ $study->title }}</h3>
            @if($study->description)
            <p class="text-gray-600 text-sm leading-relaxed mb-5">{{ Str::limit($study->description, 160) }}</p>
            @endif
            @if(is_array($study->metrics) && count($study->metrics))
            <div class="grid grid-cols-2 gap-4 mb-5">
                @foreach(array_slice($study->metrics, 0, 4) as $metric)
                <div class="text-center p-3 rounded-xl bg-gray-50">
                    <div class="text-sm font-bold text-orange-600 leading-tight">{{ $metric }}</div>
                </div>
                @endforeach
            </div>
            @endif
            @if(is_array($study->technologies) && count($study->technologies))
            <div class="flex flex-wrap gap-2">
                @foreach(array_slice($study->technologies, 0, 4) as $tech)
                <span class="px-2.5 py-1 bg-gray-100 text-gray-600 text-xs rounded-full">{{ $tech }}</span>
                @endforeach
            </div>
            @endif
        </article>
        @endforeach
    </div>
    <div class="mt-10 text-center">
        <a href="{{ route('case-studies') }}" class="inline-flex items-center text-sm font-semibold text-orange-600 hover:text-orange-700">
            View all case studies
            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        </a>
    </div>
    @else
    <p class="text-center text-gray-500">Case studies coming soon.</p>
    @endif
</x-home.section>
