@extends('layouts.admin')

@section('title', 'Blog Posts Management - WEZOM Admin')
@section('page-title', 'Blog Posts')

@section('content')
<div class="p-8 bg-gray-50 min-h-full">
    <!-- Enhanced Header -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
        <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Blog Management</h1>
                <p class="text-gray-600">Create, manage, and optimize your blog content with advanced SEO features</p>
        </div>
            <div class="flex items-center space-x-3">
                <button class="zoho-btn zoho-btn-outline" onclick="showBulkActions()">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                    </svg>
                    Bulk Actions
                </button>
                <a href="{{ route('admin.blog-posts.create') }}" class="zoho-btn zoho-btn-primary">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                    Create New Post
            </a>
            </div>
        </div>
    </div>

    <!-- Enhanced Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">
        <!-- Total Posts -->
        <div class="zoho-stat-card animate-fade-in">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                </div>
                <div class="text-right">
                    <div class="flex items-center text-blue-600 text-sm font-medium">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                        All
                </div>
                </div>
            </div>
            <div>
                <h3 class="zoho-metric">{{ $stats['total'] ?? 0 }}</h3>
                <p class="text-gray-600 font-medium mt-1">Total Posts</p>
                <p class="text-sm text-gray-500 mt-1">All blog posts</p>
            </div>
        </div>
        
        <!-- Published -->
        <div class="zoho-stat-card animate-fade-in" style="animation-delay: 0.1s">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="text-right">
                    <div class="flex items-center text-green-600 text-sm font-medium">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Live
                </div>
                </div>
            </div>
            <div>
                <h3 class="zoho-metric">{{ $stats['published'] ?? 0 }}</h3>
                <p class="text-gray-600 font-medium mt-1">Published</p>
                <p class="text-sm text-gray-500 mt-1">Live content</p>
            </div>
        </div>
        
        <!-- Drafts -->
        <div class="zoho-stat-card animate-fade-in" style="animation-delay: 0.2s">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="text-right">
                    <div class="flex items-center text-yellow-600 text-sm font-medium">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Draft
                    </div>
                </div>
            </div>
            <div>
                <h3 class="zoho-metric">{{ $stats['draft'] ?? 0 }}</h3>
                <p class="text-gray-600 font-medium mt-1">Drafts</p>
                <p class="text-sm text-gray-500 mt-1">Work in progress</p>
            </div>
        </div>

        <!-- Scheduled -->
        <div class="zoho-stat-card animate-fade-in" style="animation-delay: 0.3s">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <div class="text-right">
                    <div class="flex items-center text-purple-600 text-sm font-medium">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Future
                </div>
                </div>
            </div>
            <div>
                <h3 class="zoho-metric">{{ $stats['scheduled'] ?? 0 }}</h3>
                <p class="text-gray-600 font-medium mt-1">Scheduled</p>
                <p class="text-sm text-gray-500 mt-1">Future posts</p>
            </div>
        </div>
        
        <!-- Total Views -->
        <div class="zoho-stat-card animate-fade-in" style="animation-delay: 0.4s">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-gradient-to-br from-pink-500 to-pink-600 rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                </div>
                <div class="text-right">
                    <div class="flex items-center text-pink-600 text-sm font-medium">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                        </svg>
                        Growing
                </div>
                </div>
            </div>
            <div>
                <h3 class="zoho-metric">{{ number_format($stats['total_views'] ?? 0) }}</h3>
                <p class="text-gray-600 font-medium mt-1">Total Views</p>
                <p class="text-sm text-gray-500 mt-1">All time views</p>
            </div>
        </div>
    </div>

    <!-- Enhanced Search and Filters -->
    <div class="zoho-card animate-slide-up mb-8">
        <div class="p-6">
            <form method="GET" action="{{ route('admin.blog-posts.index') }}" class="space-y-4">
                <div class="flex flex-col lg:flex-row gap-4">
                    <!-- Search Input -->
            <div class="flex-1">
                <label for="search" class="sr-only">Search posts</label>
                <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="text" 
                           id="search" 
                           name="search" 
                                   placeholder="Search by title, content, author..." 
                           value="{{ request('search') }}"
                                   class="block w-full pl-12 pr-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 hover:bg-white transition-colors">
                </div>
            </div>

                    <!-- Filter Controls -->
                    <div class="flex flex-wrap items-center gap-3">
                        <!-- Status Filter -->
                        <select name="status" class="border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50 hover:bg-white transition-colors">
                    <option value="">All Status</option>
                            <option value="published" {{ request('status') === 'published' ? 'selected' : '' }}>Published</option>
                            <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="scheduled" {{ request('status') === 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                </select>

                        <!-- Category Filter -->
                        <select name="category" class="border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50 hover:bg-white transition-colors">
                    <option value="">All Categories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category }}" {{ request('category') === $category ? 'selected' : '' }}>{{ $category }}</option>
                            @endforeach
                        </select>

                        <!-- Featured Filter -->
                        <select name="featured" class="border border-gray-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50 hover:bg-white transition-colors">
                            <option value="">All Posts</option>
                            <option value="1" {{ request('featured') === '1' ? 'selected' : '' }}>Featured Only</option>
                            <option value="0" {{ request('featured') === '0' ? 'selected' : '' }}>Not Featured</option>
                </select>

                        <!-- Filter Button -->
                        <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-colors font-medium">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.207A1 1 0 013 6.5V4z"></path>
                            </svg>
                    Filter
                </button>

                        <!-- Clear Filters -->
                        @if(request()->hasAny(['search', 'status', 'category', 'featured']))
                            <a href="{{ route('admin.blog-posts.index') }}" class="px-4 py-3 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition-colors">
                                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                Clear
                            </a>
                        @endif
            </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Enhanced Blog Posts Table -->
    <div class="zoho-card animate-slide-up" style="animation-delay: 0.2s">
        <div class="p-6 border-b border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-xl font-bold text-gray-900">Blog Posts ({{ $blogPosts->total() }})</h3>
                    <p class="text-gray-600 mt-1">Manage and optimize your blog content</p>
                </div>
                <div class="flex items-center space-x-3">
                    <!-- Bulk Actions (hidden by default) -->
                    <div id="bulk-actions" class="hidden items-center space-x-2 bg-blue-50 px-4 py-2 rounded-lg">
                        <span class="text-sm text-blue-700" id="selected-count">0 selected</span>
                        <select id="bulk-action-select" class="border border-blue-200 rounded px-2 py-1 text-sm">
                            <option value="">Choose action...</option>
                            <option value="publish">Publish</option>
                            <option value="draft">Move to Draft</option>
                            <option value="feature">Mark as Featured</option>
                            <option value="unfeature">Remove Featured</option>
                            <option value="delete">Delete</option>
                        </select>
                        <button onclick="executeBulkAction()" class="bg-blue-600 text-white px-3 py-1 rounded text-sm hover:bg-blue-700">
                            Apply
                        </button>
                    </div>
                    
                    <!-- View Toggle -->
                    <div class="flex border border-gray-200 rounded-lg">
                        <button class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-50 rounded-l-lg" onclick="toggleTableView('list')" id="list-view">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                        </svg>
                    </button>
                        <button class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-50 rounded-r-lg" onclick="toggleTableView('grid')" id="grid-view">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2"></path>
                        </svg>
                    </button>
                    </div>
                </div>
            </div>
        </div>

@include('admin.blog-posts.index_table')
