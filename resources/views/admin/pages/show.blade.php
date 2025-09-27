@extends('layouts.admin')

@section('title', 'View Page - VanTroZ Admin')
@section('page-title', 'View Page')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">{{ $page->title ?? 'Page Title' }}</h1>
            <p class="text-gray-600 mt-1">Page details and content preview</p>
        </div>
        <div class="flex items-center space-x-3">
            <a href="#" 
               target="_blank"
               class="inline-flex items-center px-4 py-2 text-blue-600 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                </svg>
                View Live
            </a>
            <a href="{{ route('admin.pages.edit', $page->id ?? 1) }}" 
               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
                Edit Page
            </a>
            <a href="{{ route('admin.pages.index') }}" 
               class="inline-flex items-center px-4 py-2 text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Pages
            </a>
        </div>
    </div>

    <!-- Page Status -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <div class="flex items-center">
                    @if($page->is_published ?? false)
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                            <span class="w-2 h-2 bg-green-400 rounded-full mr-2"></span>
                            Published
                        </span>
                    @else
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                            <span class="w-2 h-2 bg-yellow-400 rounded-full mr-2"></span>
                            Draft
                        </span>
                    @endif
                </div>
                
                <div class="text-sm text-gray-500">
                    URL: <span class="font-mono text-blue-600">/{{ $page->slug ?? 'page-slug' }}</span>
                </div>
            </div>
            
            <div class="text-sm text-gray-500">
                Template: <span class="font-medium">{{ ucfirst($page->template ?? 'default') }}</span>
            </div>
        </div>
    </div>

    <!-- Page Information -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        <!-- Basic Info -->
        <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Page Information</h3>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Page Title</label>
                    <div class="p-3 bg-gray-50 rounded-lg">
                        <p class="text-gray-900">{{ $page->title ?? 'Untitled Page' }}</p>
                    </div>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">URL Slug</label>
                    <div class="p-3 bg-gray-50 rounded-lg">
                        <p class="text-gray-900 font-mono">{{ $page->slug ?? 'page-slug' }}</p>
                    </div>
                </div>
                
                @if($page->meta_title ?? '')
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Meta Title</label>
                    <div class="p-3 bg-gray-50 rounded-lg">
                        <p class="text-gray-900">{{ $page->meta_title }}</p>
                        <p class="text-xs text-gray-500 mt-1">{{ strlen($page->meta_title) }} characters</p>
                    </div>
                </div>
                @endif
                
                @if($page->meta_description ?? '')
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Meta Description</label>
                    <div class="p-3 bg-gray-50 rounded-lg">
                        <p class="text-gray-900">{{ $page->meta_description }}</p>
                        <p class="text-xs text-gray-500 mt-1">{{ strlen($page->meta_description) }} characters</p>
                    </div>
                </div>
                @endif
            </div>
        </div>

        <!-- Page Stats -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Statistics</h3>
            
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">Status</span>
                    @if($page->is_published ?? false)
                        <span class="text-sm font-medium text-green-600">Published</span>
                    @else
                        <span class="text-sm font-medium text-yellow-600">Draft</span>
                    @endif
                </div>
                
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">Active</span>
                    <span class="text-sm font-medium {{ ($page->is_active ?? true) ? 'text-green-600' : 'text-red-600' }}">
                        {{ ($page->is_active ?? true) ? 'Yes' : 'No' }}
                    </span>
                </div>
                
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">Template</span>
                    <span class="text-sm font-medium text-gray-900">{{ ucfirst($page->template ?? 'default') }}</span>
                </div>
                
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">Created</span>
                    <span class="text-sm font-medium text-gray-900">{{ ($page->created_at ?? now())->format('M d, Y') }}</span>
                </div>
                
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">Updated</span>
                    <span class="text-sm font-medium text-gray-900">{{ ($page->updated_at ?? now())->format('M d, Y') }}</span>
                </div>
                
                @if($page->published_at ?? '')
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">Published</span>
                    <span class="text-sm font-medium text-gray-900">{{ $page->published_at->format('M d, Y') }}</span>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Featured Image -->
    @if($page->featured_image ?? '')
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Featured Image</h3>
        <div class="rounded-lg overflow-hidden">
            <img src="{{ $page->featured_image }}" 
                 alt="{{ $page->title }}" 
                 class="w-full h-64 object-cover">
        </div>
    </div>
    @endif

    <!-- Page Content -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Page Content</h3>
        
        @if($page->content ?? '')
            <div class="prose max-w-none">
                <div class="p-4 bg-gray-50 rounded-lg border">
                    {!! nl2br(e($page->content)) !!}
                </div>
            </div>
        @else
            <div class="text-center py-8">
                <svg class="w-12 h-12 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <p class="text-gray-500">No content available for this page.</p>
                <a href="{{ route('admin.pages.edit', $page->id ?? 1) }}" 
                   class="inline-flex items-center mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                    Add Content
                </a>
            </div>
        @endif
    </div>

    <!-- Page Builder Data -->
    @if($page->page_builder_data ?? '')
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mt-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Page Builder Data</h3>
        <div class="bg-gray-50 p-4 rounded-lg">
            <pre class="text-sm text-gray-800 overflow-x-auto"><code>{{ json_encode(json_decode($page->page_builder_data), JSON_PRETTY_PRINT) }}</code></pre>
        </div>
    </div>
    @endif

    <!-- Action Buttons -->
    <div class="flex items-center justify-center space-x-4 mt-8 pt-6 border-t border-gray-200">
        <a href="{{ route('admin.pages.edit', $page->id ?? 1) }}" 
           class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
            </svg>
            Edit This Page
        </a>
        
        <a href="{{ route('admin.pages.create') }}" 
           class="inline-flex items-center px-6 py-3 text-gray-600 bg-gray-100 font-semibold rounded-lg hover:bg-gray-200 transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Create New Page
        </a>
    </div>
</div>
@endsection
