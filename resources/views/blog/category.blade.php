@extends('layouts.website')

@section('title', ucfirst($category) . ' Articles | VanTroZ Blog')
@section('description', 'Explore ' . $category . ' articles from VanTroZ — practical insights on software, technology, and digital products.')
@section('keywords', $category . ', VanTroZ blog, software development articles')

@section('content')

<x-page-hero
    variant="blog"
    badge="Blog Category"
    :title="ucfirst($category)"
    :subtitle="'Articles and insights about ' . $category"
/>

<section class="py-4 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-social-share :title="ucfirst($category).' Articles | VanTroZ'" :description="'Explore '.$category.' insights from VanTroZ.'" />
    </div>
</section>

<!-- Breadcrumb -->
<section class="py-4 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-4">
                <li>
                    <a href="{{ route('home') }}" class="text-gray-500 hover:text-gray-700">Home</a>
                </li>
                <li>
                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg>
                </li>
                <li>
                    <a href="{{ route('blog.index') }}" class="text-gray-500 hover:text-gray-700">Blog</a>
                </li>
                <li>
                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg>
                </li>
                <li>
                    <span class="text-gray-700 font-medium">{{ ucfirst($category) }}</span>
                </li>
            </ol>
        </nav>
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
                <h3 class="text-xl font-semibold text-gray-600 mb-2">No articles in this category</h3>
                <p class="text-gray-500 mb-6">We're working on adding more content in this area.</p>
                <a href="{{ route('blog.index') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                    View All Articles
                </a>
            </div>
        @endif
    </div>
</section>

<!-- Other Categories -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Explore Other Categories</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Discover more articles in different areas
            </p>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
            <a href="{{ route('blog.category', 'software') }}" class="bg-white rounded-lg p-6 text-center shadow-md hover:shadow-lg transition-shadow {{ $category === 'software' ? 'ring-2 ring-blue-500' : '' }}">
                <div class="text-3xl mb-2">💻</div>
                <div class="font-semibold text-gray-700">Software</div>
            </a>
            <a href="{{ route('blog.category', 'mobile') }}" class="bg-white rounded-lg p-6 text-center shadow-md hover:shadow-lg transition-shadow {{ $category === 'mobile' ? 'ring-2 ring-blue-500' : '' }}">
                <div class="text-3xl mb-2">📱</div>
                <div class="font-semibold text-gray-700">Mobile</div>
            </a>
            <a href="{{ route('blog.category', 'web-dev') }}" class="bg-white rounded-lg p-6 text-center shadow-md hover:shadow-lg transition-shadow {{ $category === 'web-dev' ? 'ring-2 ring-blue-500' : '' }}">
                <div class="text-3xl mb-2">🌐</div>
                <div class="font-semibold text-gray-700">Web Dev</div>
            </a>
            <a href="{{ route('blog.category', 'ai-iot') }}" class="bg-white rounded-lg p-6 text-center shadow-md hover:shadow-lg transition-shadow {{ $category === 'ai-iot' ? 'ring-2 ring-blue-500' : '' }}">
                <div class="text-3xl mb-2">🤖</div>
                <div class="font-semibold text-gray-700">AI & IoT</div>
            </a>
            <a href="{{ route('blog.category', 'ecommerce') }}" class="bg-white rounded-lg p-6 text-center shadow-md hover:shadow-lg transition-shadow {{ $category === 'ecommerce' ? 'ring-2 ring-blue-500' : '' }}">
                <div class="text-3xl mb-2">🛒</div>
                <div class="font-semibold text-gray-700">E-commerce</div>
            </a>
            <a href="{{ route('blog.category', 'qa') }}" class="bg-white rounded-lg p-6 text-center shadow-md hover:shadow-lg transition-shadow {{ $category === 'qa' ? 'ring-2 ring-blue-500' : '' }}">
                <div class="text-3xl mb-2">🔍</div>
                <div class="font-semibold text-gray-700">QA</div>
            </a>
        </div>
    </div>
</section>
@endsection
