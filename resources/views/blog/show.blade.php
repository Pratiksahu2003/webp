@extends('layouts.website')

@section('title', $blogPost->title . ' - VanTroZ Blog')
@section('description', $blogPost->excerpt)

@section('content')
<!-- Modern Hero Section -->
<section class="relative overflow-hidden min-h-[500px] bg-gradient-to-br from-slate-900 via-indigo-900 to-slate-900">
    @if($blogPost->banner_image)
    <!-- Background Image -->
    <div class="absolute inset-0">
        <img src="{{ asset('storage/' . $blogPost->banner_image) }}"
            alt="{{ $blogPost->title }}"
            class="w-full h-full object-cover opacity-30"
            onerror="this.style.display='none'">
    </div>
    @endif

    <!-- Modern Gradient Overlay -->
    <div class="absolute inset-0 bg-gradient-to-br from-indigo-900/80 via-slate-900/60 to-indigo-900/80"></div>

    <!-- Modern Content -->
    <div class="relative z-10 py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 pt-20">
            <div class="text-center text-white">
                <div class="flex items-center justify-center mb-6">
                    @if($blogPost->category)
                    <span class="bg-indigo-500/20 backdrop-blur-sm text-indigo-200 text-sm font-medium px-4 py-2 rounded-full border border-indigo-400/30">{{ $blogPost->category }}</span>
                    @endif
                    @if($blogPost->published_at)
                    <span class="text-slate-300 text-sm ml-4 bg-slate-800/40 backdrop-blur-sm px-4 py-2 rounded-full">{{ $blogPost->published_at->format('M d, Y') }}</span>
                    @else
                    <span class="text-slate-300 text-sm ml-4 bg-slate-800/40 backdrop-blur-sm px-4 py-2 rounded-full">{{ $blogPost->created_at->format('M d, Y') }}</span>
                    @endif
                </div>
                <h1 class="text-4xl md:text-5xl font-bold mb-6 text-white leading-tight">{{ $blogPost->title }}</h1>
                <p class="text-xl mb-8 max-w-2xl mx-auto text-slate-200 leading-relaxed">{{ $blogPost->excerpt }}</p>
                <div class="flex items-center justify-center text-white/90 space-x-6">
                    <div class="flex items-center bg-white/10 backdrop-blur-sm px-4 py-2 rounded-full shadow-lg">
                        <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center mr-3 shadow-md">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <span class="font-medium" style="text-shadow: 0 1px 2px rgba(0,0,0,0.5);">By {{ $blogPost->author }}</span>
                    </div>
                    <div class="flex items-center bg-white/10 backdrop-blur-sm px-4 py-2 rounded-full shadow-lg">
                        <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center mr-3 shadow-md">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <span class="font-medium" style="text-shadow: 0 1px 2px rgba(0,0,0,0.5);">{{ $blogPost->views }} views</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modern Article Content -->
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <article class="prose prose-lg prose-slate max-w-none prose-headings:text-slate-900 prose-p:text-slate-700 prose-a:text-indigo-600 prose-strong:text-slate-900">
            @if($blogPost->featured_image)
            <img src="{{ asset('storage/' . $blogPost->featured_image) }}"
                alt="{{ $blogPost->title }}"
                class="w-full h-64 object-cover rounded-lg mb-8"
                onerror="this.style.display='none'">
            @else
            <div class="w-full h-64 bg-gray-200 rounded-lg mb-8 flex items-center justify-center">
                <span class="text-gray-500">No featured image</span>
            </div>
            @endif

            <div class="text-gray-700 leading-relaxed">
                {!! $blogPost->content !!}
            </div>

            @if($blogPost->tags && is_array($blogPost->tags) && count($blogPost->tags) > 0)
            <div class="mt-8 pt-8 border-t border-gray-200">
                <h3 class="text-lg font-semibold mb-4">Tags</h3>
                <div class="flex flex-wrap gap-2">
                    @foreach($blogPost->tags as $tag)
                    <span class="bg-gray-100 text-gray-600 text-sm px-3 py-1 rounded-full">{{ $tag }}</span>
                    @endforeach
                </div>
            </div>
            @endif
        </article>
    </div>
</section>

<!-- Related Posts -->
@if($relatedPosts->count() > 0)
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Related Articles</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                You might also be interested in these articles
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($relatedPosts as $relatedPost)
            <article class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                @if($relatedPost->featured_image)
                <img src="{{ asset('storage/' . $relatedPost->featured_image) }}"
                    alt="{{ $relatedPost->title }}"
                    class="w-full h-48 object-cover">
                @else
                <div class="h-48 bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-500">No image</span>
                </div>
                @endif
                <div class="p-6">
                    <div class="flex items-center mb-2">
                        @if($relatedPost->category)
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">{{ $relatedPost->category }}</span>
                        @endif
                        @if($relatedPost->published_at)
                        <span class="text-gray-500 text-xs ml-2">{{ $relatedPost->published_at->format('M d, Y') }}</span>
                        @else
                        <span class="text-gray-500 text-xs ml-2">{{ $relatedPost->created_at->format('M d, Y') }}</span>
                        @endif
                    </div>
                    <h3 class="text-xl font-semibold mb-3">
                        <a href="{{ route('blog.show', $relatedPost) }}" class="hover:text-blue-600">{{ $relatedPost->title }}</a>
                    </h3>
                    <p class="text-gray-600 mb-4">{{ $relatedPost->excerpt }}</p>
                    <a href="{{ route('blog.show', $relatedPost) }}" class="text-blue-600 hover:text-blue-800 font-semibold">
                        Read more →
                    </a>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Modern CTA Section -->
<section class="py-20 bg-gradient-to-br from-indigo-600 via-indigo-700 to-cyan-600">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Ready to Transform Your Ideas?</h2>
        <p class="text-xl text-indigo-100 mb-8 max-w-2xl mx-auto">
            Let's collaborate to build something extraordinary together
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact') }}"
                class="inline-flex items-center px-8 py-4 bg-white text-indigo-600 font-semibold rounded-xl hover:bg-indigo-50 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                Start Your Project
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>
            <a href="{{ route('services') }}"
                class="inline-flex items-center px-8 py-4 border-2 border-white/30 text-white font-semibold rounded-xl hover:bg-white/10 transition-all duration-300">
                View Services
            </a>
        </div>
    </div>
</section>
@endsection