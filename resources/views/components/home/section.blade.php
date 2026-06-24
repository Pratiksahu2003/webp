@props([
    'id' => null,
    'tone' => 'white',
    'class' => '',
    'containerClass' => '',
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
    class="home-section {{ $tones[$tone] ?? $tones['white'] }} py-16 sm:py-20 lg:py-24 {{ $class }}"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 {{ $containerClass }}">
        {{ $slot }}
    </div>
</section>
