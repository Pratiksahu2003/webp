@props([
    'service' => null,
    'label' => null,
    'allLabel' => null,
])

@if($service && $service->activeSubServices->isNotEmpty())
@php
    $menuLabel = $label ?? $service->title;
    $allLinkLabel = $allLabel ?? 'All ' . $menuLabel;
@endphp
<div class="relative group">
    <button type="button" class="navbar-link px-3 py-2 text-base font-medium flex items-center transition-colors duration-200 hover:text-orange-600 whitespace-nowrap">
        {{ $menuLabel }}
        <svg class="w-3 h-3 ml-1 transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
    </button>
    <div class="absolute top-full left-0 w-64 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 z-50 pointer-events-none group-hover:pointer-events-auto">
        <div class="bg-white rounded-xl shadow-xl border border-gray-200 py-4 mt-2">
            <div class="px-4 pb-2 mb-2 border-b border-gray-100">
                <a href="{{ route('catalog.services.show', $service) }}" class="text-xs font-semibold text-orange-600 hover:text-orange-700 uppercase tracking-wide">
                    {{ $allLinkLabel }} →
                </a>
            </div>
            <div class="px-2 space-y-0.5">
                @foreach($service->activeSubServices as $subService)
                <a href="{{ route('services.sub-service', [$service, $subService]) }}" class="block px-3 py-2.5 text-sm text-gray-700 hover:text-orange-600 hover:bg-orange-50 rounded-lg transition-colors">
                    {{ $subService->title }}
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif
