<x-home.section id="process" tone="muted" animate="process">
    <x-home.section-header
        badge="How We Work"
        title="Our development process"
        subtitle="A proven path from discovery to delivery — crafted for clarity, speed, and quality."
    />

    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
        @foreach([
            ['step' => '01', 'title' => 'Discovery', 'desc' => 'Understanding goals, users, and technical requirements.'],
            ['step' => '02', 'title' => 'UX/UI Design', 'desc' => 'Crafting intuitive interfaces and seamless experiences.'],
            ['step' => '03', 'title' => 'Development', 'desc' => 'Building robust, scalable web and backend systems.'],
            ['step' => '04', 'title' => 'Launch & Scale', 'desc' => 'Deploying, optimizing, and supporting growth.'],
        ] as $index => $step)
        <div class="relative text-center group">
            @if($index < 3)
            <div class="home-process-line hidden lg:block absolute top-10 left-[60%] w-[80%] h-px bg-gradient-to-r from-orange-200 to-transparent origin-left"></div>
            @endif
            <div class="w-16 h-16 mx-auto mb-5 rounded-2xl bg-orange-500 text-white font-bold text-lg flex items-center justify-center shadow-lg shadow-orange-500/20 group-hover:scale-105 transition-transform">
                {{ $step['step'] }}
            </div>
            <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $step['title'] }}</h3>
            <p class="text-sm text-gray-600 leading-relaxed">{{ $step['desc'] }}</p>
        </div>
        @endforeach
    </div>
</x-home.section>
