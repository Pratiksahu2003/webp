@props([
    'badge' => null,
    'title',
    'highlight' => null,
    'subtitle' => null,
    'align' => 'center',
])

@php
    $alignClass = $align === 'left' ? 'text-left' : 'text-center mx-auto';
    $maxWidth = $align === 'left' ? 'max-w-3xl' : 'max-w-3xl mx-auto';
@endphp

<div class="home-section-header mb-12 lg:mb-16 {{ $alignClass }}">
    @if($badge)
    <p class="home-badge-shimmer inline-flex items-center px-3.5 py-1.5 rounded-full text-xs font-semibold uppercase tracking-[0.18em] text-orange-600 bg-orange-50 border border-orange-100 mb-5">
        {{ $badge }}
    </p>
    @endif

    <h2 class="text-3xl sm:text-4xl lg:text-[2.75rem] font-bold text-gray-900 tracking-tight leading-tight">
        @if($highlight)
            {!! str_replace($highlight, '<span class="text-orange-600">'.$highlight.'</span>', e($title)) !!}
        @else
            {{ $title }}
        @endif
    </h2>

    @if($subtitle)
    <p class="mt-4 text-base sm:text-lg text-gray-600 leading-relaxed {{ $maxWidth }}">
        {{ $subtitle }}
    </p>
    @endif

    @isset($actions)
    <div class="mt-8 flex flex-wrap gap-3 {{ $align === 'center' ? 'justify-center' : '' }}">
        {{ $actions }}
    </div>
    @endisset
</div>
