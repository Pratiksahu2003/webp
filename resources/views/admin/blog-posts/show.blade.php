@extends('layouts.admin')

@section('title', 'View Blog Post - WEZOM Admin')
@section('page-title', 'View Blog Post')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Advanced Web Development Techniques</h1>
            <p class="text-gray-600 mt-1">Blog post details and preview</p>
        </div>
        <div class="flex items-center space-x-3">
            <a href="{{ route('admin.blog-posts.edit', 1) }}" 
               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                Edit Post
            </a>
            <a href="{{ route('admin.blog-posts.index') }}" 
               class="inline-flex items-center px-4 py-2 text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
                Back to Posts
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Post Content</h3>
                
                <div class="prose max-w-none">
                    <div class="mb-6">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 mb-4">
                            Technology
                        </span>
                        <h1 class="text-3xl font-bold text-gray-900 mb-4">Advanced Web Development Techniques</h1>
                        <p class="text-lg text-gray-600 mb-6">Learn about the latest techniques and best practices in modern web development.</p>
                    </div>
                    
                    <div class="bg-gray-50 p-6 rounded-lg border">
                        <p class="text-gray-800 leading-relaxed">
                            This is the full content of the blog post about advanced web development techniques. 
                            It covers modern frameworks, best practices, and emerging technologies in the field.
                            <br><br>
                            The content would include detailed explanations, code examples, and practical tips 
                            for developers looking to improve their skills and stay current with industry trends.
                            <br><br>
                            Topics covered include React, Vue.js, Node.js, TypeScript, and modern CSS techniques.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Post Details</h3>
                
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Status</span>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            Published
                        </span>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Category</span>
                        <span class="text-sm font-medium text-gray-900">Technology</span>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Author</span>
                        <span class="text-sm font-medium text-gray-900">{{ auth()->user()->name }}</span>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Views</span>
                        <span class="text-sm font-medium text-gray-900">{{ rand(500, 2000) }}</span>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Comments</span>
                        <span class="text-sm font-medium text-gray-900">{{ rand(5, 25) }}</span>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Published</span>
                        <span class="text-sm font-medium text-gray-900">{{ now()->subDays(rand(1, 30))->format('M d, Y') }}</span>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Updated</span>
                        <span class="text-sm font-medium text-gray-900">{{ now()->subDays(rand(1, 5))->format('M d, Y') }}</span>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
                
                <div class="space-y-3">
                    <a href="{{ route('admin.blog-posts.edit', 1) }}" 
                       class="w-full inline-flex items-center justify-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                        Edit Post
                    </a>
                    
                    <button type="button" 
                            class="w-full inline-flex items-center justify-center px-4 py-2 text-green-600 bg-green-50 rounded-lg hover:bg-green-100 transition-colors">
                        View Live
                    </button>
                    
                    <a href="{{ route('admin.blog-posts.create') }}" 
                       class="w-full inline-flex items-center justify-center px-4 py-2 text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
                        Create New Post
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">SEO Preview</h3>
                
                <div class="border border-gray-200 rounded-lg p-4 bg-gray-50">
                    <div class="text-blue-600 text-lg font-medium mb-1">Advanced Web Development Techniques</div>
                    <div class="text-green-600 text-sm mb-2">https://wezom.com/blog/advanced-web-development</div>
                    <div class="text-gray-600 text-sm">Learn about the latest techniques and best practices in modern web development. Topics include React, Vue.js, Node.js...</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
