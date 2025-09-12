@extends('layouts.website')

@section('title', $blogPost->title . ' - WEZOM Blog')
@section('description', $blogPost->excerpt)

@section('content')
<!-- Hero Section -->
<section class="hero-gradient text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <div class="flex items-center justify-center mb-4">
                <span class="bg-blue-100 text-blue-800 text-sm font-semibold px-3 py-1 rounded">{{ $blogPost->category }}</span>
                <span class="text-gray-300 text-sm ml-4">{{ $blogPost->published_at->format('M d, Y') }}</span>
            </div>
            <h1 class="text-4xl md:text-6xl font-bold mb-6">{{ $blogPost->title }}</h1>
            <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto">{{ $blogPost->excerpt }}</p>
            <div class="flex items-center justify-center text-gray-300">
                <span>By {{ $blogPost->author }}</span>
                <span class="mx-4">•</span>
                <span>{{ $blogPost->views }} views</span>
            </div>
        </div>
    </div>
</section>

<!-- Article Content -->
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <article class="prose prose-lg max-w-none">
            @if($blogPost->featured_image)
                <img src="{{ $blogPost->featured_image }}" alt="{{ $blogPost->title }}" class="w-full h-64 object-cover rounded-lg mb-8">
            @endif
            
            <div class="text-gray-700 leading-relaxed">
                {!! nl2br(e($blogPost->content)) !!}
            </div>
            
            @if($blogPost->tags)
                <div class="mt-8 pt-8 border-t border-gray-200">
                    <h3 class="text-lg font-semibold mb-4">Tags</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach(json_decode($blogPost->tags, true) as $tag)
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
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Related Articles</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                You might also be interested in these articles
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($relatedPosts as $relatedPost)
            <article class="bg-white rounded-lg shadow-lg overflow-hidden">
                @if($relatedPost->featured_image)
                    <img src="{{ $relatedPost->featured_image }}" alt="{{ $relatedPost->title }}" class="w-full h-48 object-cover">
                @endif
                <div class="p-6">
                    <div class="flex items-center mb-2">
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">{{ $relatedPost->category }}</span>
                        <span class="text-gray-500 text-xs ml-2">{{ $relatedPost->published_at->format('M d, Y') }}</span>
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

<!-- CTA Section -->
<section class="py-20 hero-gradient text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Work With Us?</h2>
        <p class="text-xl mb-8 max-w-3xl mx-auto">
            Let's discuss your project and see how we can help you achieve your goals
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact') }}" class="bg-yellow-400 text-gray-900 px-8 py-3 rounded-lg font-semibold hover:bg-yellow-300 transition-colors">
                Get Started
            </a>
            <a href="{{ route('blog.index') }}" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-gray-900 transition-colors">
                Read More Articles
            </a>
        </div>
    </div>
</section>
@endsection
