@props([
    'service' => null,
    'label' => null,
    'allLabel' => null,
])

@if($service && $service->activeSubServices->isNotEmpty())
@php
    $menuLabel = $label ?? $service->title;
    $allLinkLabel = $allLabel ?? 'View All ' . $menuLabel;
@endphp
<div class="mobile-menu-section">
    <details class="mobile-menu-accordion">
        <summary class="mobile-nav-link mobile-nav-link--summary">
            <span>{{ $menuLabel }}</span>
            <svg class="mobile-menu-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
        </summary>
        <div class="mobile-menu-sub">
            @foreach($service->activeSubServices as $subService)
            <a href="{{ route('services.sub-service', [$service, $subService]) }}" class="mobile-nav-sublink">{{ $subService->title }}</a>
            @endforeach
            <a href="{{ route('catalog.services.show', $service) }}" class="mobile-nav-sublink mobile-nav-sublink--accent">{{ $allLinkLabel }} →</a>
        </div>
    </details>
</div>
@endif
