@props(['technologies'])

@php
    use App\Support\TechnologyStack;

    $stacks = TechnologyStack::all();
    $stackTechnologies = TechnologyStack::groupByStack($technologies);
    $firstStackSlug = array_key_first($stacks);
@endphp

<section id="technology-stack" class="home-section bg-[#fbfbfd] py-16 sm:py-20 lg:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 lg:mb-16 apple-reveal">
            <p class="text-orange-600 font-semibold text-sm uppercase tracking-[0.2em] mb-4">Our Stack</p>
            <h2 class="text-3xl lg:text-5xl font-bold text-gray-900 tracking-tight mb-6">Technology stack</h2>
            <p class="text-gray-600 max-w-2xl mx-auto mb-8">Six core stacks powering the products we design, build, and scale.</p>
            <a href="{{ route('technologies') }}" class="btn-primary">Discover More</a>
        </div>

        @if($technologies->isNotEmpty())
        <div class="flex flex-wrap justify-center gap-2 sm:gap-3 mb-10" data-apple-stagger>
            @foreach($stacks as $slug => $stack)
            <button
                type="button"
                class="tech-stack-tab px-4 sm:px-5 py-2.5 rounded-full text-sm font-semibold transition-all duration-300 {{ $slug === $firstStackSlug ? 'active bg-orange-500 text-white shadow-md shadow-orange-500/25' : 'bg-white text-gray-700 border border-gray-200 hover:border-orange-200 hover:text-orange-600' }}"
                data-stack-tab="{{ $slug }}"
            >
                {{ $stack['label'] }}
            </button>
            @endforeach
        </div>

        @foreach($stacks as $slug => $stack)
        @php $stackTechs = ($stackTechnologies[$slug] ?? collect())->take(6); @endphp
        <div
            class="tech-stack-panel {{ $slug === $firstStackSlug ? '' : 'hidden' }}"
            data-stack-panel="{{ $slug }}"
        >
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-8">
                <div>
                    <div class="flex items-center gap-3 mb-2">
                        <span class="text-2xl" aria-hidden="true">{{ $stack['icon'] }}</span>
                        <h3 class="text-2xl font-bold text-gray-900">{{ $stack['label'] }}</h3>
                    </div>
                    <p class="text-gray-600 text-sm sm:text-base max-w-xl">{{ $stack['description'] }}</p>
                </div>
                @if($stackTechs->count() > 0)
                <a href="{{ route('technologies.stack', $slug) }}" class="inline-flex items-center text-sm font-semibold text-orange-600 hover:text-orange-700 whitespace-nowrap">
                    View full stack
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
                @endif
            </div>

            @if($stackTechs->isNotEmpty())
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4" data-apple-stagger>
                @foreach($stackTechs as $tech)
                <a
                    href="{{ route('technologies.show', $tech) }}"
                    class="group tech-stack-item flex flex-col items-center justify-center text-center p-4 sm:p-5 bg-white rounded-xl border border-gray-100 shadow-sm hover:shadow-lg hover:border-orange-100 hover:-translate-y-1 transition-all duration-300"
                >
                    <div class="w-12 h-12 flex items-center justify-center mb-3 rounded-lg bg-gray-50 group-hover:bg-orange-50 transition-colors">
                        @if($tech->displayIconUrl())
                            <img src="{{ $tech->displayIconUrl() }}" alt="{{ $tech->name }}" class="w-7 h-7 object-contain">
                        @elseif($tech->icon)
                            <span class="text-2xl leading-none">{{ $tech->icon }}</span>
                        @endif
                    </div>
                    <span class="text-gray-900 font-semibold text-xs sm:text-sm leading-tight line-clamp-2">{{ $tech->name }}</span>
                    @if($tech->technology_type)
                    <span class="mt-1 text-[10px] sm:text-xs text-gray-400 line-clamp-1">{{ $tech->technology_type }}</span>
                    @endif
                </a>
                @endforeach
            </div>
            @else
            <p class="text-center text-gray-500 py-8">Technologies for this stack are being updated.</p>
            @endif
        </div>
        @endforeach
        @else
        <div class="text-center py-12 text-gray-500">
            <p>Our technology stack is being updated. <a href="{{ route('contact') }}" class="text-orange-600 font-semibold">Contact us</a> to learn more.</p>
        </div>
        @endif
    </div>
</section>

@once
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const section = document.getElementById('technology-stack');
    if (!section) return;

    const tabs = section.querySelectorAll('[data-stack-tab]');
    const panels = section.querySelectorAll('[data-stack-panel]');

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            const slug = tab.getAttribute('data-stack-tab');

            tabs.forEach(t => {
                t.classList.remove('active', 'bg-orange-500', 'text-white', 'shadow-md', 'shadow-orange-500/25');
                t.classList.add('bg-white', 'text-gray-700', 'border', 'border-gray-200');
            });
            tab.classList.add('active', 'bg-orange-500', 'text-white', 'shadow-md', 'shadow-orange-500/25');
            tab.classList.remove('bg-white', 'text-gray-700', 'border', 'border-gray-200');

            panels.forEach(panel => {
                panel.classList.toggle('hidden', panel.getAttribute('data-stack-panel') !== slug);
            });
        });
    });
});
</script>
@endpush
@endonce
