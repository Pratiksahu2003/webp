<x-home.section tone="white" class="!py-10 lg:!py-12 border-b border-gray-100" animate="stats">
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6">
        @foreach([
            ['count' => 3500, 'suffix' => '+', 'comma' => true, 'label' => 'Projects Delivered'],
            ['count' => 250, 'suffix' => '+', 'comma' => false, 'label' => 'Expert Developers'],
            ['count' => 98, 'suffix' => '%', 'comma' => false, 'label' => 'Client Satisfaction'],
            ['count' => 24, 'suffix' => '+', 'comma' => false, 'label' => 'Years of Excellence'],
        ] as $stat)
        <div class="text-center p-4 lg:p-6 rounded-2xl bg-gray-50/80 border border-gray-100 hover:border-orange-100 hover:bg-orange-50/30 transition-colors home-stat-card">
            <div
                class="text-2xl sm:text-3xl lg:text-4xl font-bold text-orange-600 mb-1"
                data-count="{{ $stat['count'] }}"
                data-count-suffix="{{ $stat['suffix'] }}"
                @if($stat['comma']) data-count-comma="true" @endif
            >0{{ $stat['suffix'] === '%' ? '%' : '' }}</div>
            <div class="text-xs sm:text-sm font-medium text-gray-600">{{ $stat['label'] }}</div>
        </div>
        @endforeach
    </div>
</x-home.section>
