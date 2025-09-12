@extends('layouts.website')

@section('title', 'Blog - WEZOM')
@section('description', 'Stay updated with the latest insights, trends, and news in software development and technology.')

@section('content')
<!-- Hero Section -->
<section class="hero-gradient text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">INSIGHTS</h1>
            <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto">
                Stay updated with the latest trends and insights in technology
            </p>
        </div>
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
                        <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                    @endif
                    <div class="p-6">
                        <div class="flex items-center mb-2">
                            <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">{{ $post->category }}</span>
                            <span class="text-gray-500 text-xs ml-2">{{ $post->published_at->format('M d, Y') }}</span>
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
        <div class="bg-blue-600 rounded-lg p-8 text-center text-white">
            <h2 class="text-3xl font-bold mb-4">Stay Updated</h2>
            <p class="text-xl mb-6">Subscribe to our newsletter for the latest insights and updates</p>
            <form class="max-w-md mx-auto flex gap-4">
                <input type="email" placeholder="Enter your email" class="flex-1 px-4 py-3 rounded-lg text-gray-900">
                <button type="submit" class="bg-yellow-400 text-gray-900 px-6 py-3 rounded-lg font-semibold hover:bg-yellow-300 transition-colors">
                    Subscribe
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
