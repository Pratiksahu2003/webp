@extends('layouts.website')

@section('title', $stackData['label'] . ' Stack | VanTroZ Technologies')
@section('description', $stackData['description'])
@section('keywords', $stackData['label'] . ', VanTroZ technologies, software development stack')

@section('content')

<x-page-hero
    variant="tech"
    badge="Tech Stack"
    :title="$stackData['label']"
    :subtitle="$stackData['description']"
    align="left"
>
    <x-slot:breadcrumbs>
        <x-catalog-breadcrumbs light :items="[
            ['label' => 'Home', 'url' => route('home')],
            ['label' => 'Technologies', 'url' => route('technologies')],
            ['label' => $stackData['label']],
        ]" />
    </x-slot:breadcrumbs>

    <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm border border-white/10 rounded-lg px-4 py-2.5">
        <span class="text-2xl" aria-hidden="true">{{ $stackData['icon'] }}</span>
        <span class="text-lg font-bold text-white">{{ $technologies->count() }} Technologies</span>
    </div>
</x-page-hero>

<section class="py-4 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-social-share :title="$stackData['label'].' Stack | VanTroZ'" :description="$stackData['description']" />
    </div>
</section>

<section class="py-12 lg:py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($technologies->isEmpty())
        <div class="text-center py-16 bg-white rounded-2xl border border-gray-100">
            <p class="text-gray-500 mb-4">No technologies listed for this stack yet.</p>
            <a href="{{ route('technologies') }}" class="text-orange-600 font-semibold hover:text-orange-700">← Back to all stacks</a>
        </div>
        @else
        @foreach($groupedByType as $type => $techs)
        <div class="mb-12 last:mb-0">
            <div class="flex items-center gap-3 mb-6">
                <h2 class="text-2xl font-bold text-gray-900">{{ $type ?: 'General' }}</h2>
                <span class="text-sm font-medium text-gray-400">{{ $techs->count() }} {{ Str::plural('tool', $techs->count()) }}</span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach($techs as $tech)
                <a
                    href="{{ route('technologies.show', $tech) }}"
                    class="group bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-lg hover:border-orange-100 hover:-translate-y-0.5 transition-all duration-300"
                >
                    <div class="flex items-start gap-4">
                        <div class="w-14 h-14 flex-shrink-0 flex items-center justify-center rounded-xl bg-gray-50 group-hover:bg-orange-50 transition-colors">
                            @if($tech->displayIconUrl())
                                <img src="{{ $tech->displayIconUrl() }}" alt="{{ $tech->name }}" class="w-8 h-8 object-contain">
                            @elseif($tech->icon)
                                <span class="text-2xl">{{ $tech->icon }}</span>
                            @endif
                        </div>
                        <div class="min-w-0 flex-1">
                            <h3 class="font-bold text-gray-900 group-hover:text-orange-600 transition-colors">{{ $tech->name }}</h3>
                            @if($tech->description)
                            <p class="mt-1 text-sm text-gray-500 line-clamp-2">{{ Str::limit(strip_tags($tech->description), 120) }}</p>
                            @endif
                            @if($tech->technology_type)
                            <span class="inline-block mt-2 text-xs font-medium text-orange-600 bg-orange-50 px-2 py-0.5 rounded">{{ $tech->technology_type }}</span>
                            @endif
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endforeach
        @endif
    </div>
</section>

<section class="py-12 bg-white border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-xl font-bold text-gray-900 mb-6">Other Stacks</h2>
        <div class="flex flex-wrap gap-3">
            @foreach(\App\Support\TechnologyStack::all() as $slug => $stack)
            @if($slug !== $stackData['slug'])
            <a href="{{ route('technologies.stack', $slug) }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-gray-50 border border-gray-200 text-sm font-medium text-gray-700 hover:border-orange-200 hover:text-orange-600 transition-colors">
                <span>{{ $stack['icon'] }}</span>
                {{ $stack['label'] }}
            </a>
            @endif
            @endforeach
        </div>
    </div>
</section>

<section class="py-16 bg-gradient-to-r from-orange-500 to-orange-600 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-2xl md:text-3xl font-bold mb-4">Need {{ $stackData['label'] }} expertise?</h2>
        <p class="text-lg mb-8 opacity-90 max-w-2xl mx-auto">Tell us about your project and we'll recommend the right stack and team.</p>
        <a href="{{ route('contact') }}" class="inline-flex items-center px-8 py-3 bg-white text-orange-600 rounded-lg font-semibold hover:bg-orange-50 transition-colors">
            Get in Touch
        </a>
    </div>
</section>
@endsection
