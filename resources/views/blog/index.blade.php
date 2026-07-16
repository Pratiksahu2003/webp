@extends('layouts.website')

@section('title', 'Blog & Insights | VanTroZ Software Development')
@section('description', 'Stay updated with VanTroZ insights on software development, web technology, mobile apps, and digital growth for businesses.')
@section('keywords', 'VanTroZ blog, software development insights, web technology articles')

@section('content')

<x-page-hero
    variant="blog"
    badge="Insights & News"
    title="Blog"
    subtitle="Stay updated with the latest trends, insights, and news in software development and technology."
/>

<section class="py-4 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-social-share title="VanTroZ Blog" description="Software development insights and technology news." />
    </div>
</section>

<!-- Blog Posts -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($blogPosts->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($blogPosts as $post)
                <article class="bg-white rounded-lg shadow-lg overflow-hidden border">
                    @if($post->featured_image)
                        <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                    @endif
                    <div class="p-6">
                        <div class="flex items-center mb-2">
                            @if($post->category)
                                <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">{{ $post->category }}</span>
                            @endif
                            @if($post->published_at)
                                <span class="text-gray-500 text-xs ml-2">{{ $post->published_at->format('M d, Y') }}</span>
                            @else
                                <span class="text-gray-500 text-xs ml-2">{{ $post->created_at->format('M d, Y') }}</span>
                            @endif
                        </div>
                        <h2 class="text-xl font-semibold mb-3">
                            <a href="{{ route('blog.show', $post) }}" class="hover:text-blue-600">{{ $post->title }}</a>
                        </h2>
                        <p class="text-gray-600 mb-4">{{ $post->excerpt }}</p>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500">By {{ $post->author }}</span>
                            <a href="{{ route('blog.show', $post) }}" class="text-blue-600 hover:text-blue-800 font-semibold">
                                Read more →
                            </a>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
            
            <!-- Pagination -->
            <div class="mt-12">
                {{ $blogPosts->links() }}
            </div>
        @else
            <div class="text-center py-12">
                <div class="text-gray-400 text-6xl mb-4">📝</div>
                <h3 class="text-xl font-semibold text-gray-600 mb-2">No blog posts available</h3>
                <p class="text-gray-500">Check back later for our latest insights and articles.</p>
            </div>
        @endif
    </div>
</section>

<!-- Categories Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Explore by Category</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Find articles that interest you most
            </p>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
            <a href="{{ route('blog.category', 'software') }}" class="bg-white rounded-lg p-6 text-center shadow-md hover:shadow-lg transition-shadow">
                <div class="text-3xl mb-2">💻</div>
                <div class="font-semibold text-gray-700">Software</div>
            </a>
            <a href="{{ route('blog.category', 'mobile') }}" class="bg-white rounded-lg p-6 text-center shadow-md hover:shadow-lg transition-shadow">
                <div class="text-3xl mb-2">📱</div>
                <div class="font-semibold text-gray-700">Mobile</div>
            </a>
            <a href="{{ route('blog.category', 'web-dev') }}" class="bg-white rounded-lg p-6 text-center shadow-md hover:shadow-lg transition-shadow">
                <div class="text-3xl mb-2">🌐</div>
                <div class="font-semibold text-gray-700">Web Dev</div>
            </a>
            <a href="{{ route('blog.category', 'ai-iot') }}" class="bg-white rounded-lg p-6 text-center shadow-md hover:shadow-lg transition-shadow">
                <div class="text-3xl mb-2">🤖</div>
                <div class="font-semibold text-gray-700">AI & IoT</div>
            </a>
            <a href="{{ route('blog.category', 'ecommerce') }}" class="bg-white rounded-lg p-6 text-center shadow-md hover:shadow-lg transition-shadow">
                <div class="text-3xl mb-2">🛒</div>
                <div class="font-semibold text-gray-700">E-commerce</div>
            </a>
            <a href="{{ route('blog.category', 'qa') }}" class="bg-white rounded-lg p-6 text-center shadow-md hover:shadow-lg transition-shadow">
                <div class="text-3xl mb-2">🔍</div>
                <div class="font-semibold text-gray-700">QA</div>
            </a>
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="rounded-2xl p-8 text-center text-white bg-gradient-to-r from-[#ff6b35] to-[#f7931e]">
            <h2 class="text-3xl font-bold mb-4">Stay Updated</h2>
            <p class="text-xl mb-6 text-white/90">Subscribe to our newsletter for the latest insights and updates</p>
            <form class="max-w-md mx-auto flex flex-col sm:flex-row gap-3">
                <input type="email" placeholder="Enter your email" class="flex-1 px-4 py-3 rounded-lg text-gray-900 bg-white border-0 focus:ring-2 focus:ring-black/20">
                <button type="submit" class="bg-[#111827] hover:bg-black text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                    Subscribe
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
