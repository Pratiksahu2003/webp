@extends('layouts.admin')

@section('title', 'Create New Blog Post - WEZOM Admin')
@section('page-title', 'Create New Blog Post')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50">
    <!-- Header -->
    <div class="bg-white shadow-sm border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">Create New Blog Post</h1>
                    <p class="text-gray-600">Write and publish your blog content with advanced SEO features</p>
                </div>
                <a href="{{ route('admin.blog-posts.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Posts
                </a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">


        <!-- Main Form -->
        <form action="{{ route('admin.blog-posts.store') }}" method="POST" enctype="multipart/form-data" id="blog-form" class="space-y-8">
            @csrf
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Basic Information Card -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 px-6 py-4 border-b border-gray-200">
                            <h3 class="text-xl font-bold text-gray-900 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                Basic Information
                            </h3>
                            <p class="text-gray-600 mt-1">Essential details for your blog post</p>
                        </div>
                        <div class="p-6 space-y-6">
                            <!-- Title -->
                            <div>
                                <label for="title" class="block text-sm font-semibold text-gray-900 mb-2">
                                    Post Title <span class="text-red-500">*</span>
                                </label>
                                <input type="text"
                                    id="title"
                                    name="title"
                                    value="{{ old('title') }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-900 placeholder-gray-500 transition-colors duration-200"
                                    placeholder="Enter your blog post title..."
                                    required>
                                @error('title')
                                <p class="text-red-500 text-sm mt-2 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                    
                            <!-- Slug -->
                            <div>
                                <label for="slug" class="block text-sm font-semibold text-gray-900 mb-2">URL Slug</label>
                                <div class="flex">
                                    <span class="inline-flex items-center px-3 rounded-l-lg border border-r-0 border-gray-300 bg-gray-50 text-gray-600 text-sm font-medium">
                                        {{ url('/blog/') }}/
                                    </span>
                                    <input type="text"
                                        id="slug"
                                        name="slug"
                                        value="{{ old('slug') }}"
                                        class="flex-1 px-4 py-3 border border-gray-300 rounded-r-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-900 placeholder-gray-500 transition-colors duration-200"
                                        placeholder="url-friendly-slug">
                                </div>
                                <p class="text-sm text-gray-600 mt-2 flex items-center">
                                    <svg class="w-4 h-4 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Leave empty to auto-generate from title
                                </p>
                                @error('slug')
                                <p class="text-red-500 text-sm mt-2 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <!-- Excerpt -->
                            <div>
                                <label for="excerpt" class="block text-sm font-semibold text-gray-900 mb-2">Excerpt</label>
                                <textarea id="excerpt"
                                    name="excerpt"
                                    rows="3"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-900 placeholder-gray-500 transition-colors duration-200"
                                    placeholder="Brief description of your post...">{{ old('excerpt') }}</textarea>
                                <p class="text-sm text-gray-600 mt-2 flex items-center">
                                    <svg class="w-4 h-4 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Short description that appears in listings and search results
                                </p>
                                @error('excerpt')
                                <p class="text-red-500 text-sm mt-2 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <!-- Content -->
                            <div>
                                <label for="content" class="block text-sm font-semibold text-gray-900 mb-2">
                                    Content <span class="text-red-500">*</span>
                                </label>
                                <div id="content-wrapper">
                                    <textarea id="content"
                                        name="content"
                                        rows="25"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-900 placeholder-gray-500 transition-colors duration-200"
                                        placeholder="Write your blog post content here..."
                                        required>{{ old('content') }}</textarea>
                                </div>
                                @error('content')
                                <p class="text-red-500 text-sm mt-2 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
            </div>
        </div>

                    <!-- SEO Settings Card -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                        <div class="bg-gradient-to-r from-green-50 to-emerald-50 px-6 py-4 border-b border-gray-200">
                            <h3 class="text-xl font-bold text-gray-900 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                SEO Settings
                            </h3>
                            <p class="text-gray-600 mt-1">Optimize your post for search engines</p>
                        </div>
                        <div class="p-6 space-y-6">
                        <!-- Meta Title -->
                        <div>
                            <label for="meta_title" class="block text-sm font-medium text-black mb-2">Meta Title</label>
                            <input type="text"
                                id="meta_title"
                                name="meta_title"
                                value="{{ old('meta_title') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-black"
                                placeholder="SEO optimized title (50-60 characters)"
                                maxlength="60">
                            <div class="flex justify-between text-sm text-gray-600 mt-1">
                                <span>Recommended: 50-60 characters</span>
                                <span id="meta_title_count" class="font-medium">0/60</span>
                            </div>
                            @error('meta_title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Meta Description -->
                <div>
                            <label for="meta_description" class="block text-sm font-medium text-black mb-2">Meta Description</label>
                            <textarea id="meta_description"
                                name="meta_description"
                                rows="3"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-black"
                                placeholder="SEO description for search results (120-160 characters)"
                                maxlength="160">{{ old('meta_description') }}</textarea>
                            <div class="flex justify-between text-sm text-gray-600 mt-1">
                                <span>Recommended: 120-160 characters</span>
                                <span id="meta_description_count" class="font-medium">0/160</span>
                            </div>
                            @error('meta_description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                </div>
                
                        <!-- Focus Keywords -->
                    <div>
                            <label for="focus_keywords" class="block text-sm font-medium text-black mb-2">Focus Keywords</label>
                            <input type="text"
                                id="focus_keywords"
                                name="focus_keywords"
                                value="{{ old('focus_keywords') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-black"
                                placeholder="Enter keywords separated by commas">
                            <p class="text-sm text-gray-600 mt-1">Main keywords you want to rank for</p>
                            @error('focus_keywords')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                    </div>

                    <!-- Meta Keywords -->
                    <div>
                        <label for="meta_keywords" class="block text-sm font-medium text-black mb-2">Meta Keywords</label>
                        <input type="text"
                            id="meta_keywords"
                            name="meta_keywords"
                            value="{{ old('meta_keywords') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-black"
                            placeholder="Enter meta keywords separated by commas">
                        <p class="text-sm text-gray-600 mt-1">Additional keywords for meta tags</p>
                        @error('meta_keywords')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Canonical URL -->
                    <div>
                        <label for="canonical_url" class="block text-sm font-medium text-black mb-2">Canonical URL</label>
                        <input type="url"
                            id="canonical_url"
                            name="canonical_url"
                            value="{{ old('canonical_url') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-black"
                            placeholder="https://example.com/canonical-url">
                        <p class="text-sm text-gray-600 mt-1">Canonical URL for SEO (optional)</p>
                        @error('canonical_url')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    </div>
                </div>

                <!-- Social Media Card -->
                <div class="zoho-card animate-slide-up mb-8" style="animation-delay: 0.4s">
                    <div class="p-6 border-b border-gray-100">
                        <h3 class="text-xl font-bold text-black">Social Media</h3>
                        <p class="text-gray-700 mt-1">Customize how your post appears on social platforms</p>
                    </div>
                    <div class="p-6 space-y-6">
                        <!-- Open Graph Title -->
                        <div>
                            <label for="og_title" class="block text-sm font-medium text-black mb-2">Open Graph Title</label>
                            <input type="text"
                                id="og_title"
                                name="og_title"
                                value="{{ old('og_title') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-black"
                                placeholder="Title for Facebook, LinkedIn sharing">
                            @error('og_title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Open Graph Description -->
                        <div>
                            <label for="og_description" class="block text-sm font-medium text-black mb-2">Open Graph Description</label>
                            <textarea id="og_description"
                                name="og_description"
                                rows="2"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-black"
                                placeholder="Description for social media sharing">{{ old('og_description') }}</textarea>
                            @error('og_description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Twitter Title -->
                        <div>
                            <label for="twitter_title" class="block text-sm font-medium text-black mb-2">Twitter Title</label>
                            <input type="text"
                                id="twitter_title"
                                name="twitter_title"
                                value="{{ old('twitter_title') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-black"
                                placeholder="Title for Twitter sharing">
                            @error('twitter_title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Twitter Description -->
                <div>
                            <label for="twitter_description" class="block text-sm font-medium text-black mb-2">Twitter Description</label>
                            <textarea id="twitter_description"
                                name="twitter_description"
                                rows="2"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-black"
                                placeholder="Description for Twitter sharing">{{ old('twitter_description') }}</textarea>
                            @error('twitter_description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                </div>

                <!-- Open Graph Type -->
                <div>
                    <label for="og_type" class="block text-sm font-medium text-black mb-2">Open Graph Type</label>
                    <select id="og_type" name="og_type" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 text-black">
                        <option value="article" {{ old('og_type', 'article') === 'article' ? 'selected' : '' }}>Article</option>
                        <option value="website" {{ old('og_type') === 'website' ? 'selected' : '' }}>Website</option>
                    </select>
                    @error('og_type')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Twitter Card Type -->
                <div>
                    <label for="twitter_card" class="block text-sm font-medium text-black mb-2">Twitter Card Type</label>
                    <select id="twitter_card" name="twitter_card" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 text-black">
                        <option value="summary" {{ old('twitter_card', 'summary') === 'summary' ? 'selected' : '' }}>Summary</option>
                        <option value="summary_large_image" {{ old('twitter_card') === 'summary_large_image' ? 'selected' : '' }}>Summary Large Image</option>
                        <option value="app" {{ old('twitter_card') === 'app' ? 'selected' : '' }}>App</option>
                        <option value="player" {{ old('twitter_card') === 'player' ? 'selected' : '' }}>Player</option>
                    </select>
                    @error('twitter_card')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Open Graph Image -->
                <div>
                    <label for="og_image" class="block text-sm font-medium text-black mb-2">Open Graph Image</label>
                    <input type="file"
                        id="og_image"
                        name="og_image"
                        accept="image/*"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 text-black">
                    <p class="text-sm text-gray-600 mt-1">Image for social media sharing (1200x630px recommended)</p>
                    @error('og_image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Twitter Image -->
                <div>
                    <label for="twitter_image" class="block text-sm font-medium text-black mb-2">Twitter Image</label>
                    <input type="file"
                        id="twitter_image"
                        name="twitter_image"
                        accept="image/*"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 text-black">
                    <p class="text-sm text-gray-600 mt-1">Image for Twitter sharing (1200x600px recommended)</p>
                    @error('twitter_image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
                </div>
            </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <!-- Publish Settings -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                        <div class="bg-gradient-to-r from-purple-50 to-pink-50 px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-bold text-gray-900 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"></path>
                                </svg>
                                Publish Settings
                            </h3>
                        </div>
                        <div class="p-6 space-y-4">
                    <!-- Status -->
                    <div>
                        <label for="status" class="block text-sm font-medium text-black mb-2">Status</label>
                        <select id="status" name="status" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 text-black">
                            <option value="draft" {{ old('status', 'draft') === 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>Published</option>
                            <option value="scheduled" {{ old('status') === 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                        </select>
                        @error('status')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Scheduled Date -->
                    <div id="scheduled_date" style="display: none;">
                        <label for="scheduled_at" class="block text-sm font-medium text-black mb-2">Schedule Date</label>
                        <input type="datetime-local"
                            id="scheduled_at"
                            name="scheduled_at"
                            value="{{ old('scheduled_at') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 text-black">
                        @error('scheduled_at')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Author -->
                    <div>
                        <label for="author" class="block text-sm font-medium text-black mb-2">Author</label>
                        <select id="author" name="author" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 text-black">
                            @if(isset($authors) && count($authors) > 0)
                            @foreach($authors as $key => $author)
                            <option value="{{ $key }}" {{ old('author', auth()->user()->name) === $key ? 'selected' : '' }}>{{ $author }}</option>
                            @endforeach
                            @else
                            <option value="{{ auth()->user()->name }}" selected>{{ auth()->user()->name }}</option>
                            @endif
                        </select>
                        @error('author')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Category -->
                    <div>
                        <label for="category" class="block text-sm font-medium text-black mb-2">Category</label>
                        <select id="category" name="category" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 text-black">
                            <option value="">Select Category</option>
                            @if(isset($categories) && count($categories) > 0)
                            @foreach($categories as $key => $category)
                            <option value="{{ $key }}" {{ old('category') === $key ? 'selected' : '' }}>{{ $category }}</option>
                            @endforeach
                            @endif
                        </select>
                        @error('category')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
        </div>

                    <!-- Tags -->
                    <div>
                        <label for="tags" class="block text-sm font-medium text-black mb-2">Tags</label>
                        <input type="text"
                            id="tags"
                            name="tags"
                            value="{{ old('tags') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-black"
                            placeholder="Enter tags separated by commas">
                        <p class="text-sm text-gray-600 mt-1">Separate multiple tags with commas</p>
                        @error('tags')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Featured Image -->
                    <div>
                        <label for="featured_image" class="block text-sm font-medium text-black mb-2">Featured Image</label>
                        <input type="file"
                            id="featured_image"
                            name="featured_image"
                            accept="image/*"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 text-black">
                        <p class="text-sm text-gray-600 mt-1">Upload an image for your blog post</p>
                        @error('featured_image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                </div>

                    <!-- Banner Image -->
                    <div>
                        <label for="banner_image" class="block text-sm font-medium text-black mb-2">Banner Image</label>
                        <input type="file"
                            id="banner_image"
                            name="banner_image"
                            accept="image/*"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 text-black">
                        <p class="text-sm text-gray-600 mt-1">Upload a banner image for the top of your blog post (1920x600px recommended)</p>
                        @error('banner_image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                </div>
                
                    <!-- Options -->
                    <div class="space-y-3">
                        <label class="flex items-center">
                            <input type="checkbox"
                                name="is_featured"
                                value="1"
                                {{ old('is_featured') ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <span class="ml-2 text-sm text-black">Mark as Featured</span>
                        </label>

                        <label class="flex items-center">
                            <input type="checkbox"
                                name="allow_comments"
                                value="1"
                                {{ old('allow_comments', true) ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <span class="ml-2 text-sm text-black">Allow Comments</span>
                        </label>
                </div>
                
                            <!-- Action Buttons -->
                            <div class="pt-6 space-y-3">
                                <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold py-3 px-4 rounded-lg transition-all duration-200 flex items-center justify-center shadow-lg hover:shadow-xl">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Create Post
                                </button>
                                
                                <button type="button" onclick="saveDraft()" class="w-full bg-white hover:bg-gray-50 text-gray-700 font-semibold py-3 px-4 rounded-lg border border-gray-300 transition-all duration-200 flex items-center justify-center shadow-sm hover:shadow-md">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                                    </svg>
                                    Save as Draft
                                </button>
                            </div>
            </div>
        </div>
        </div>
    </form>
</div>

<!-- CKEditor CDN -->
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

<!-- Enhanced CKEditor Styles -->
<style>
    .ck-editor {
        min-height: 600px !important;
    }

    .ck-editor__editable {
        color: #111827 !important;
        background-color: #ffffff !important;
        min-height: 600px !important;
        height: 600px !important;
        border-radius: 0.5rem !important;
        border: 1px solid #d1d5db !important;
        padding: 1rem !important;
    }

    .ck-editor__editable:focus {
        border-color: #3b82f6 !important;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1) !important;
    }

    .ck-editor__editable p {
        color: #111827 !important;
        line-height: 1.6 !important;
    }

    .ck-editor__editable h1,
    .ck-editor__editable h2,
    .ck-editor__editable h3,
    .ck-editor__editable h4,
    .ck-editor__editable h5,
    .ck-editor__editable h6 {
        color: #111827 !important;
        font-weight: 600 !important;
    }

    .ck-editor__editable ul,
    .ck-editor__editable ol {
        color: #111827 !important;
    }

    .ck-editor__editable blockquote {
        color: #111827 !important;
        border-left: 4px solid #3b82f6 !important;
        padding-left: 1rem !important;
        margin: 1rem 0 !important;
        background-color: #f8fafc !important;
    }

    .ck-editor__editable code {
        color: #111827 !important;
        background-color: #f1f5f9 !important;
        padding: 0.25rem 0.5rem !important;
        border-radius: 0.25rem !important;
        font-family: 'Monaco', 'Menlo', 'Ubuntu Mono', monospace !important;
    }

    .ck-editor__editable pre {
        color: #111827 !important;
        background-color: #f1f5f9 !important;
        padding: 1rem !important;
        border-radius: 0.5rem !important;
        overflow-x: auto !important;
    }

    .ck-editor__editable table {
        color: #111827 !important;
        border-collapse: collapse !important;
        width: 100% !important;
    }

    .ck-editor__editable table td,
    .ck-editor__editable table th {
        color: #111827 !important;
        border: 1px solid #d1d5db !important;
        padding: 0.5rem !important;
    }

    .ck-editor__editable table th {
        background-color: #f8fafc !important;
        font-weight: 600 !important;
    }

    /* Responsive height adjustments */
    @media (max-width: 768px) {
        .ck-editor__editable {
            min-height: 400px !important;
            height: 400px !important;
        }
    }

    /* Success message styles */
    .success-message {
        position: fixed;
        top: 20px;
        right: 20px;
        background: linear-gradient(135deg, #10b981, #059669);
        color: white;
        padding: 1rem 1.5rem;
        border-radius: 0.5rem;
        box-shadow: 0 10px 25px rgba(16, 185, 129, 0.3);
        z-index: 1000;
        transform: translateX(100%);
        transition: transform 0.3s ease-in-out;
    }

    .success-message.show {
        transform: translateX(0);
    }

    /* Loading state */
    .btn-loading {
        position: relative;
        color: transparent !important;
    }

    .btn-loading::after {
        content: "";
        position: absolute;
        width: 16px;
        height: 16px;
        top: 50%;
        left: 50%;
        margin-left: -8px;
        margin-top: -8px;
        border: 2px solid transparent;
        border-top-color: currentColor;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize CKEditor with enhanced configuration
        const textarea = document.querySelector('#content');
        
        ClassicEditor
            .create(textarea, {
                toolbar: {
                    items: [
                        'heading', '|',
                        'bold', 'italic', 'underline', 'strikethrough', '|',
                        'link', 'bulletedList', 'numberedList', '|',
                        'outdent', 'indent', '|',
                        'blockQuote', 'insertTable', 'codeBlock', '|',
                        'imageUpload', 'mediaEmbed', '|',
                        'undo', 'redo', '|',
                        'findAndReplace', 'selectAll', '|',
                        'horizontalLine', 'specialCharacters', '|',
                        'removeFormat'
                    ]
                },
                language: 'en',
                placeholder: 'Write your blog post content here...',
                image: {
                    toolbar: [
                        'imageTextAlternative', 'imageStyle:full', 'imageStyle:side',
                        'imageStyle:alignLeft', 'imageStyle:center', 'imageStyle:alignRight'
                    ]
                },
                table: {
                    contentToolbar: [
                        'tableColumn', 'tableRow', 'mergeTableCells',
                        'tableProperties', 'tableCellProperties'
                    ]
                },
                link: {
                    decorators: {
                        openInNewTab: {
                            mode: 'manual',
                            label: 'Open in a new tab',
                            attributes: {
                                target: '_blank',
                                rel: 'noopener noreferrer'
                            }
                        }
                    }
                }
            })
            .then(editor => {
                console.log('CKEditor initialized successfully');
                window.editor = editor;

                // Update word count
                editor.model.document.on('change:data', () => {
                    updateWordCount();
                });

                // Auto-save functionality
                let autoSaveTimeout;
                editor.model.document.on('change:data', () => {
                    clearTimeout(autoSaveTimeout);
                    autoSaveTimeout = setTimeout(() => {
                        autoSave();
                    }, 30000); // Auto-save every 30 seconds
                });

                // Fix form validation issue
                editor.model.document.on('change:data', () => {
                    // Update the hidden textarea with CKEditor content
                    textarea.value = editor.getData();
                    
                    // Trigger validation
                    textarea.dispatchEvent(new Event('input', { bubbles: true }));
                });

                // Ensure content is set before form submission
                editor.model.document.on('change:data', () => {
                    textarea.value = editor.getData();
                });

                // Handle form validation errors
                editor.editing.view.document.on('focus', () => {
                    // Clear any validation errors when user focuses on editor
                    const errorElement = document.querySelector('#content').parentNode.querySelector('.text-red-500');
                    if (errorElement) {
                        errorElement.style.display = 'none';
                    }
                });
            })
            .catch(error => {
                console.error('Error initializing CKEditor:', error);
                showNotification('Error initializing editor. Please refresh the page.', 'error');
                
                // Fallback: Show the textarea if CKEditor fails
                const textarea = document.querySelector('#content');
                textarea.style.display = 'block';
                textarea.style.height = '600px';
                textarea.style.resize = 'vertical';
            });

        // Status change handler
        document.getElementById('status').addEventListener('change', function() {
            const scheduledDate = document.getElementById('scheduled_date');
            if (this.value === 'scheduled') {
                scheduledDate.style.display = 'block';
                // Set minimum date to now
                const now = new Date();
                const localDateTime = new Date(now.getTime() - now.getTimezoneOffset() * 60000).toISOString().slice(0, 16);
                document.getElementById('scheduled_at').min = localDateTime;
            } else {
                scheduledDate.style.display = 'none';
            }
        });

        // Character counters with enhanced styling
        document.getElementById('meta_title').addEventListener('input', function() {
            const count = this.value.length;
            const countElement = document.getElementById('meta_title_count');
            countElement.textContent = count + '/60';
            
            // Color coding for character count
            if (count > 60) {
                countElement.className = 'font-semibold text-red-500';
            } else if (count > 50) {
                countElement.className = 'font-semibold text-yellow-500';
            } else {
                countElement.className = 'font-semibold text-green-500';
            }
        });

        document.getElementById('meta_description').addEventListener('input', function() {
            const count = this.value.length;
            const countElement = document.getElementById('meta_description_count');
            countElement.textContent = count + '/160';
            
            // Color coding for character count
            if (count > 160) {
                countElement.className = 'font-semibold text-red-500';
            } else if (count < 120) {
                countElement.className = 'font-semibold text-yellow-500';
            } else {
                countElement.className = 'font-semibold text-green-500';
            }
        });

        // Auto-generate slug from title
        document.getElementById('title').addEventListener('input', function() {
            const slug = this.value.toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-')
                .trim('-');
            
            if (!document.getElementById('slug').value) {
                document.getElementById('slug').value = slug;
            }
        });

        // Form submission with loading state
        document.getElementById('blog-form').addEventListener('submit', function(e) {
            // Validate all required fields
            if (!validateForm()) {
                e.preventDefault();
                return false;
            }
            
            // Ensure CKEditor content is synced before submission
            if (window.editor) {
                textarea.value = window.editor.getData();
                
                // Validate content is not empty
                if (!textarea.value.trim()) {
                    e.preventDefault();
                    showNotification('Please enter some content for your blog post.', 'error');
                    window.editor.focus();
                    return false;
                }
            }
            
            const submitBtn = this.querySelector('button[type="submit"]');
            submitBtn.classList.add('btn-loading');
            submitBtn.disabled = true;
        });

        // Initialize character counts
        document.getElementById('meta_title').dispatchEvent(new Event('input'));
        document.getElementById('meta_description').dispatchEvent(new Event('input'));
    });

    function updateWordCount() {
        if (window.editor) {
            const wordCount = window.editor.getData().replace(/<[^>]*>/g, '').split(/\s+/).filter(word => word.length > 0).length;
            console.log('Word count:', wordCount);
            // You can display this in the UI if needed
        }
    }

    function validateForm() {
        let isValid = true;
        const errors = [];

        // Validate title
        const title = document.getElementById('title').value.trim();
        if (!title) {
            errors.push('Title is required');
            isValid = false;
        }

        // Validate content
        let content = '';
        if (window.editor) {
            content = window.editor.getData().trim();
        } else {
            content = document.getElementById('content').value.trim();
        }
        
        if (!content) {
            errors.push('Content is required');
            isValid = false;
        }

        // Validate status
        const status = document.getElementById('status').value;
        if (!status) {
            errors.push('Status is required');
            isValid = false;
        }

        // Validate scheduled date if status is scheduled
        if (status === 'scheduled') {
            const scheduledAt = document.getElementById('scheduled_at').value;
            if (!scheduledAt) {
                errors.push('Scheduled date is required when status is set to scheduled');
                isValid = false;
            }
        }

        // Show errors if any
        if (!isValid) {
            showNotification(errors.join(', '), 'error');
        }

        return isValid;
    }

    function autoSave() {
        // Auto-save functionality - could be implemented with AJAX
        console.log('Auto-saving...');
    }

    function saveDraft() {
        // Ensure CKEditor content is synced before submission
        if (window.editor) {
            const textarea = document.querySelector('#content');
            textarea.value = window.editor.getData();
        }
        
        // Set status to draft
        document.getElementById('status').value = 'draft';
        
        // Validate basic fields (title is still required even for drafts)
        const title = document.getElementById('title').value.trim();
        if (!title) {
            showNotification('Title is required even for drafts.', 'error');
            document.getElementById('title').focus();
            return false;
        }
        
        const submitBtn = document.querySelector('button[type="submit"]');
        submitBtn.classList.add('btn-loading');
        submitBtn.disabled = true;
        document.getElementById('blog-form').submit();
    }

    function showNotification(message, type = 'success') {
        const notification = document.createElement('div');
        notification.className = `success-message ${type === 'error' ? 'bg-red-500' : ''}`;
        notification.innerHTML = `
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    ${type === 'error' ? 
                        '<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>' :
                        '<path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>'
                    }
                </svg>
                ${message}
            </div>
        `;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.classList.add('show');
        }, 100);
        
        setTimeout(() => {
            notification.classList.remove('show');
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 5000);
    }
</script>

@if(session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        showNotification('Blog post created successfully!', 'success');
    });
</script>
@endif

@if($errors->any())
<script>
    document.addEventListener('DOMContentLoaded', function() {
        showNotification('Please fix the errors below and try again.', 'error');
    });
</script>
@endif

@endsection
