@extends('layouts.admin')

@section('title', 'Edit Page - WEZOM Admin')
@section('page-title', 'Edit Page')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Edit Page</h1>
            <p class="text-gray-600 mt-1">Update page information and content</p>
        </div>
        <div class="flex items-center space-x-3">
            @if(isset($page))
            <a href="#" 
               target="_blank"
               class="inline-flex items-center px-4 py-2 text-blue-600 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                </svg>
                Preview
            </a>
            @endif
            <a href="{{ route('admin.pages.index') }}" 
               class="inline-flex items-center px-4 py-2 text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Pages
            </a>
        </div>
    </div>

    <form action="{{ route('admin.pages.update', $page->id ?? 1) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')
        
        <!-- Basic Information -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Basic Information</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Page Title *</label>
                    <input type="text" 
                           id="title" 
                           name="title" 
                           value="{{ old('title', $page->title ?? '') }}"
                           required
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('title') border-red-500 @enderror"
                           placeholder="Enter page title">
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">URL Slug</label>
                    <input type="text" 
                           id="slug" 
                           name="slug" 
                           value="{{ old('slug', $page->slug ?? '') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('slug') border-red-500 @enderror"
                           placeholder="page-url-slug">
                    @error('slug')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-xs text-gray-500">URL: /{{ $page->slug ?? 'page-slug' }}</p>
                </div>
            </div>

            <div class="mt-6">
                <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Page Content</label>
                <textarea id="content" 
                          name="content" 
                          rows="10"
                          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('content') border-red-500 @enderror"
                          placeholder="Enter page content...">{{ old('content', $page->content ?? '') }}</textarea>
                @error('content')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- SEO Settings -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">SEO Settings</h3>
            
            <div class="space-y-4">
                <div>
                    <label for="meta_title" class="block text-sm font-medium text-gray-700 mb-2">Meta Title</label>
                    <input type="text" 
                           id="meta_title" 
                           name="meta_title" 
                           value="{{ old('meta_title', $page->meta_title ?? '') }}"
                           maxlength="60"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('meta_title') border-red-500 @enderror"
                           placeholder="SEO title for search engines">
                    @error('meta_title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-xs text-gray-500">{{ strlen($page->meta_title ?? '') }}/60 characters</p>
                </div>
                
                <div>
                    <label for="meta_description" class="block text-sm font-medium text-gray-700 mb-2">Meta Description</label>
                    <textarea id="meta_description" 
                              name="meta_description" 
                              rows="3"
                              maxlength="160"
                              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('meta_description') border-red-500 @enderror"
                              placeholder="Brief description for search engines">{{ old('meta_description', $page->meta_description ?? '') }}</textarea>
                    @error('meta_description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-xs text-gray-500">{{ strlen($page->meta_description ?? '') }}/160 characters</p>
                </div>
            </div>
        </div>

        <!-- Page Settings -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Page Settings</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="template" class="block text-sm font-medium text-gray-700 mb-2">Template</label>
                    <select id="template" 
                            name="template"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('template') border-red-500 @enderror">
                        <option value="default" {{ old('template', $page->template ?? 'default') === 'default' ? 'selected' : '' }}>Default Template</option>
                        <option value="landing" {{ old('template', $page->template ?? '') === 'landing' ? 'selected' : '' }}>Landing Page</option>
                        <option value="full-width" {{ old('template', $page->template ?? '') === 'full-width' ? 'selected' : '' }}>Full Width</option>
                        <option value="blog" {{ old('template', $page->template ?? '') === 'blog' ? 'selected' : '' }}>Blog Layout</option>
                    </select>
                    @error('template')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="featured_image" class="block text-sm font-medium text-gray-700 mb-2">Featured Image URL</label>
                    <input type="url" 
                           id="featured_image" 
                           name="featured_image" 
                           value="{{ old('featured_image', $page->featured_image ?? '') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('featured_image') border-red-500 @enderror"
                           placeholder="https://example.com/image.jpg">
                    @error('featured_image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Status Toggles -->
            <div class="mt-6 space-y-4">
                <div class="flex items-center">
                    <input type="hidden" name="is_published" value="0">
                    <input type="checkbox" 
                           id="is_published" 
                           name="is_published" 
                           value="1"
                           {{ old('is_published', $page->is_published ?? false) ? 'checked' : '' }}
                           class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="is_published" class="ml-2 block text-sm text-gray-700">
                        Publish page
                    </label>
                </div>
                
                <div class="flex items-center">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" 
                           id="is_active" 
                           name="is_active" 
                           value="1"
                           {{ old('is_active', $page->is_active ?? true) ? 'checked' : '' }}
                           class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="is_active" class="ml-2 block text-sm text-gray-700">
                        Enable page (make accessible)
                    </label>
                </div>
            </div>
        </div>

        <!-- Page Stats -->
        @if(isset($page) && isset($page->created_at))
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Page Information</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
                <div>
                    <span class="text-gray-500">Created:</span>
                    <span class="font-medium text-gray-900">{{ $page->created_at->format('M d, Y \a\t g:i A') }}</span>
                </div>
                <div>
                    <span class="text-gray-500">Last Updated:</span>
                    <span class="font-medium text-gray-900">{{ $page->updated_at->format('M d, Y \a\t g:i A') }}</span>
                </div>
                <div>
                    <span class="text-gray-500">Status:</span>
                    @if($page->is_published)
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            Published
                        </span>
                    @else
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                            Draft
                        </span>
                    @endif
                </div>
            </div>
        </div>
        @endif

        <!-- Form Actions -->
        <div class="flex items-center justify-between pt-6">
            <div class="flex items-center space-x-3">
                <button type="button" 
                        onclick="history.back()"
                        class="px-6 py-2 text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
                    Cancel
                </button>
                
                @if(isset($page))
                <form action="{{ route('admin.pages.destroy', $page) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            onclick="return confirm('Are you sure you want to delete this page? This action cannot be undone.')"
                            class="px-6 py-2 text-red-600 bg-red-50 rounded-lg hover:bg-red-100 transition-colors">
                        Delete Page
                    </button>
                </form>
                @endif
            </div>
            
            <div class="flex items-center space-x-3">
                <button type="submit" 
                        name="action" 
                        value="draft"
                        class="px-6 py-2 text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 transition-colors">
                    Save as Draft
                </button>
                <button type="submit" 
                        name="action" 
                        value="update"
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                    Update Page
                </button>
            </div>
        </div>
    </form>
</div>

<script>
// Character counters
document.getElementById('meta_title').addEventListener('input', function() {
    const length = this.value.length;
    const next = this.nextElementSibling?.nextElementSibling;
    if (next) {
        next.textContent = `${length}/60 characters`;
        next.className = length > 60 ? 'mt-1 text-xs text-red-500' : 'mt-1 text-xs text-gray-500';
    }
});

document.getElementById('meta_description').addEventListener('input', function() {
    const length = this.value.length;
    const next = this.nextElementSibling?.nextElementSibling;
    if (next) {
        next.textContent = `${length}/160 characters`;
        next.className = length > 160 ? 'mt-1 text-xs text-red-500' : 'mt-1 text-xs text-gray-500';
    }
});
</script>
@endsection
