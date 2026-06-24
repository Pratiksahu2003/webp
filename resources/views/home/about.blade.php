<x-home.section id="about" tone="white">
    <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
        <div>
            <x-home.section-header
                badge="Why VanTroZ"
                title="Software Company VanTroZ"
                subtitle="We develop profitable, effective solutions that help clients expand their businesses. Committed to exceptional service and utilizing every resource to deliver the finest products."
                align="left"
            />
            <a href="{{ route('about') }}" class="inline-flex items-center px-6 py-3 bg-orange-500 hover:bg-orange-600 text-white font-semibold rounded-xl transition-colors">
                About us
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-2 gap-4 lg:gap-6">
            @foreach([
                ['value' => '25+', 'label' => 'Years Experience', 'desc' => 'Active, market-driven delivery experience.'],
                ['value' => '250+', 'label' => 'Clients', 'desc' => 'Long-term partnerships with satisfied teams.'],
                ['value' => '275+', 'label' => 'Team Members', 'desc' => 'Certified full-time professionals.'],
                ['value' => '3,500+', 'label' => 'Projects', 'desc' => 'Delivered with measurable business impact.'],
            ] as $stat)
            <div class="p-5 lg:p-6 rounded-2xl bg-gray-50 border border-gray-100 text-center hover:border-orange-100 transition-colors">
                <div class="text-3xl lg:text-4xl font-bold text-orange-600 mb-1">{{ $stat['value'] }}</div>
                <div class="font-semibold text-gray-900 text-sm mb-1">{{ $stat['label'] }}</div>
                <div class="text-xs text-gray-500 leading-relaxed">{{ $stat['desc'] }}</div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="mt-14 lg:mt-16 text-center">
        <div class="inline-flex items-center gap-3 px-6 py-3.5 rounded-2xl bg-emerald-50 border border-emerald-100">
            <span class="flex items-center justify-center w-8 h-8 rounded-full bg-emerald-500 text-white text-sm">✓</span>
            <span class="font-semibold text-gray-900">ISO 27001-certified</span>
        </div>
        <p class="text-gray-600 mt-4 text-sm sm:text-base">IT designs that protect data and enable secure internal management</p>
    </div>
</x-home.section>
