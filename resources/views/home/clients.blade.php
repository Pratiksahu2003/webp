<x-home.section id="clients" tone="muted" animate="clients">
    <x-home.section-header
        badge="Trusted By"
        title="Key clients"
        subtitle="Teams worldwide rely on us to design, build, and scale digital products."
    />

    @if(isset($clients) && $clients->isNotEmpty())
    <div class="relative overflow-hidden" data-apple-parallax="0.04">
        <div class="absolute left-0 top-0 bottom-0 w-16 bg-gradient-to-r from-[#fbfbfd] to-transparent z-10 pointer-events-none"></div>
        <div class="absolute right-0 top-0 bottom-0 w-16 bg-gradient-to-l from-[#fbfbfd] to-transparent z-10 pointer-events-none"></div>
        <div class="home-clients-track flex items-center gap-12 sm:gap-16 w-max animate-scroll">
            @foreach($clients->concat($clients) as $client)
            <div class="flex-shrink-0 flex items-center justify-center min-w-[8rem] h-12 px-4">
                @if($client->logo)
                <img src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->name }}" class="max-h-10 max-w-[9rem] object-contain opacity-70 hover:opacity-100 transition-opacity grayscale hover:grayscale-0">
                @else
                <span class="text-gray-500 font-semibold text-sm whitespace-nowrap">{{ $client->name }}</span>
                @endif
            </div>
            @endforeach
        </div>
    </div>
    @else
    <div class="relative overflow-hidden">
        <div class="home-clients-track flex items-center gap-12 w-max animate-scroll">
            @foreach(['H2H Movers', 'Selfreliance', 'UGL HOLDING', 'NVA TRANSPORTATION', 'BIKERENT.NYC', 'INTERPIPE', 'Aptiv PLC', 'Toyota Material Handling', 'Cooper&Hunter', 'H2H Movers', 'Selfreliance', 'UGL HOLDING'] as $name)
            <span class="flex-shrink-0 text-gray-500 font-semibold text-sm whitespace-nowrap">{{ $name }}</span>
            @endforeach
        </div>
    </div>
    @endif
</x-home.section>
