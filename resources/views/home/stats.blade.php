<x-home.section tone="white" class="!py-8 lg:!py-10 border-b border-gray-100" animate="stats">
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 lg:gap-4">
        @foreach([
            ['count' => 500, 'suffix' => '+', 'comma' => false, 'label' => 'Projects Delivered'],
            ['count' => 250, 'suffix' => '+', 'comma' => false, 'label' => 'Expert Developers'],
            ['count' => 98, 'suffix' => '%', 'comma' => false, 'label' => 'Client Satisfaction'],
            ['count' => 5, 'suffix' => '+', 'comma' => false, 'label' => 'Years Experience'],
        ] as $stat)
        <div class="text-center p-3 lg:p-4 rounded-xl bg-gray-50/80 border border-gray-100 hover:border-orange-100 hover:bg-orange-50/30 transition-colors home-stat-card">
            <div
                class="text-xl sm:text-2xl lg:text-3xl font-bold text-orange-600 mb-0.5"
                data-count="{{ $stat['count'] }}"
                data-count-suffix="{{ $stat['suffix'] }}"
                @if($stat['comma']) data-count-comma="true" @endif
            >0{{ $stat['suffix'] === '%' ? '%' : '' }}</div>
            <div class="text-[11px] sm:text-xs font-medium text-gray-600">{{ $stat['label'] }}</div>
        </div>
        @endforeach
    </div>
</x-home.section>
