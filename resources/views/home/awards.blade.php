<x-home.section id="awards" tone="white" class="border-t border-gray-100">
    <x-home.section-header
        badge="Recognition"
        title="Awards & milestones"
        subtitle="Recognized for delivery excellence and long-term client partnerships."
    />

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 lg:gap-6">
        @foreach([
            'Top 100 EdTech Developers 2025',
            '2023 Award-winning Company',
            'Inc. 5000 2024',
            'Best Software Company 2024',
            'Forbes Council',
            'TOP USA Awards',
        ] as $award)
        <div class="flex items-center justify-center p-4 lg:p-5 rounded-xl bg-gray-50 border border-gray-100 text-center min-h-[5.5rem] hover:border-orange-100 hover:bg-orange-50/40 transition-colors">
            <span class="text-xs sm:text-sm font-semibold text-gray-700 leading-snug">{{ $award }}</span>
        </div>
        @endforeach
    </div>
</x-home.section>
