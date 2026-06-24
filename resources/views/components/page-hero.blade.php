@props([
    'title',
    'subtitle' => null,
    'badge' => null,
    'meta' => null,
    'variant' => 'brand',
    'image' => null,
    'background' => null,
    'align' => 'center',
])

@php
    $variants = [
        'brand' => [
            'gradient' => 'from-slate-900 via-slate-800 to-orange-950',
            'overlay' => 'from-slate-900/92 via-slate-900/75 to-orange-950/50',
            'badge' => 'bg-orange-500/20 text-orange-300 border-orange-500/30',
            'accent' => 'text-orange-400',
            'image' => 'images/heroes/hero-brand.svg',
        ],
        'tech' => [
            'gradient' => 'from-slate-950 via-blue-950 to-slate-900',
            'overlay' => 'from-slate-950/92 via-blue-950/70 to-slate-900/80',
            'badge' => 'bg-sky-500/20 text-sky-300 border-sky-500/30',
            'accent' => 'text-sky-400',
            'image' => 'images/heroes/hero-tech.svg',
        ],
        'creative' => [
            'gradient' => 'from-indigo-950 via-purple-900 to-violet-950',
            'overlay' => 'from-indigo-950/90 via-purple-900/70 to-violet-950/80',
            'badge' => 'bg-fuchsia-500/20 text-fuchsia-200 border-fuchsia-500/30',
            'accent' => 'text-fuchsia-300',
            'image' => 'images/heroes/hero-creative.svg',
        ],
        'legal' => [
            'gradient' => 'from-slate-900 via-slate-800 to-slate-700',
            'overlay' => 'from-slate-900/94 via-slate-800/80 to-slate-700/60',
            'badge' => 'bg-slate-500/20 text-slate-300 border-slate-500/30',
            'accent' => 'text-slate-300',
            'image' => 'images/heroes/hero-legal.svg',
        ],
        'blog' => [
            'gradient' => 'from-slate-900 via-indigo-950 to-slate-900',
            'overlay' => 'from-slate-900/90 via-indigo-950/75 to-slate-900/85',
            'badge' => 'bg-indigo-500/20 text-indigo-300 border-indigo-500/30',
            'accent' => 'text-indigo-400',
            'image' => 'images/heroes/hero-blog.svg',
        ],
    ];

    $config = $variants[$variant] ?? $variants['brand'];
    $heroImage = $background ?? ($image ? asset($image) : asset($config['image']));
    $imageOpacity = $background ? 'opacity-30' : 'opacity-40';
    $alignClass = $align === 'left' ? 'text-left' : 'text-center';
    $contentClass = $align === 'left' ? 'max-w-3xl' : 'max-w-4xl mx-auto';
@endphp

<section {{ $attributes->merge(['class' => 'compact-page-header relative overflow-hidden bg-gradient-to-br ' . $config['gradient'] . ' text-white']) }} data-no-viewport-hero>
    <div
        class="absolute inset-0 bg-cover bg-center pointer-events-none {{ $imageOpacity }}"
        style="background-image: url('{{ $heroImage }}')"
        aria-hidden="true"
    ></div>
    <div class="absolute inset-0 bg-gradient-to-r {{ $config['overlay'] }} pointer-events-none" aria-hidden="true"></div>
    <div
        class="absolute inset-0 opacity-[0.06] pointer-events-none"
        style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 28px 28px;"
        aria-hidden="true"
    ></div>
    <div class="absolute -top-24 -right-24 w-72 h-72 bg-orange-500/10 rounded-full blur-3xl pointer-events-none" aria-hidden="true"></div>
    <div class="absolute -bottom-32 -left-24 w-96 h-96 bg-white/5 rounded-full blur-3xl pointer-events-none" aria-hidden="true"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 lg:py-14">
        @isset($breadcrumbs)
            <div class="mb-6">
                {{ $breadcrumbs }}
            </div>
        @endisset

        <div class="{{ $alignClass }} {{ $contentClass }}">
            @if($badge)
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium mb-4 border {{ $config['badge'] }}">
                    {{ $badge }}
                </span>
            @endif

            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold leading-tight mb-3">
                @if(str_contains($title, '|'))
                    @php [$before, $after] = array_pad(explode('|', $title, 2), 2, ''); @endphp
                    {{ trim($before) }} <span class="{{ $config['accent'] }}">{{ trim($after) }}</span>
                @else
                    {{ $title }}
                @endif
            </h1>

            @if($subtitle)
                <p class="text-base sm:text-lg text-slate-300 leading-relaxed max-w-3xl {{ $align === 'center' ? 'mx-auto' : '' }}">
                    {{ $subtitle }}
                </p>
            @endif

            @if($meta)
                <p class="mt-3 text-sm text-slate-400">{{ $meta }}</p>
            @endif

            @if(trim($slot))
                <div class="mt-6 flex flex-wrap gap-3 {{ $align === 'center' ? 'justify-center' : '' }}">
                    {{ $slot }}
                </div>
            @endif
        </div>
    </div>
</section>
