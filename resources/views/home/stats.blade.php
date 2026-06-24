<x-home.section tone="white" class="!py-10 lg:!py-12 border-b border-gray-100">
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6">
        @foreach([
            ['value' => '3,500+', 'label' => 'Projects Delivered'],
            ['value' => '250+', 'label' => 'Expert Developers'],
            ['value' => '98%', 'label' => 'Client Satisfaction'],
            ['value' => '24+', 'label' => 'Years of Excellence'],
        ] as $stat)
        <div class="text-center p-4 lg:p-6 rounded-2xl bg-gray-50/80 border border-gray-100 hover:border-orange-100 hover:bg-orange-50/30 transition-colors">
            <div class="text-2xl sm:text-3xl lg:text-4xl font-bold text-orange-600 mb-1">{{ $stat['value'] }}</div>
            <div class="text-xs sm:text-sm font-medium text-gray-600">{{ $stat['label'] }}</div>
        </div>
        @endforeach
    </div>
</x-home.section>
