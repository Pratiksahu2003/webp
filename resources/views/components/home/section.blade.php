@props([
    'id' => null,
    'tone' => 'white',
    'class' => '',
    'containerClass' => '',
    'animate' => null,
])

@php
    $tones = [
        'white' => 'bg-white',
        'muted' => 'bg-[#fbfbfd]',
        'soft' => 'bg-gradient-to-b from-gray-50/80 to-white',
        'accent' => 'bg-gradient-to-br from-orange-50/40 via-white to-slate-50',
    ];
@endphp

<section
    @if($id) id="{{ $id }}" @endif
    @if($animate) data-section-animate="{{ $animate }}" @endif
    class="home-section {{ $tones[$tone] ?? $tones['white'] }} py-16 sm:py-20 lg:py-24 {{ $class }}"
>
    @if($animate)
    <div class="home-section-ambient" aria-hidden="true">
        <span class="home-ambient-orb home-ambient-orb--1"></span>
        <span class="home-ambient-orb home-ambient-orb--2"></span>
    </div>
    @endif
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 {{ $containerClass }} relative z-[1]">
        {{ $slot }}
    </div>
</section>
