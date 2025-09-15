@extends('layouts.admin')

@section('title', 'Edit Blog Post - WEZOM Admin')
@section('page-title', 'Edit Blog Post')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Edit Blog Post</h1>
            <p class="text-gray-600 mt-1">Update your blog content</p>
        </div>
        <a href="{{ route('admin.blog-posts.index') }}" 
           class="inline-flex items-center px-4 py-2 text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
            Back to Posts
        </a>
    </div>

    <form action="{{ route('admin.blog-posts.update', 1) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Post Details</h3>
            
            <div class="space-y-6">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Post Title *</label>
                    <input type="text" id="title" name="title" value="Advanced Web Development Techniques" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">URL Slug</label>
                        <input type="text" id="slug" name="slug" value="advanced-web-development-techniques"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                        <select id="category" name="category"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="technology" selected>Technology</option>
                            <option value="design">Design</option>
                            <option value="business">Business</option>
                            <option value="tutorials">Tutorials</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label for="excerpt" class="block text-sm font-medium text-gray-700 mb-2">Excerpt</label>
                    <textarea id="excerpt" name="excerpt" rows="3"
                              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">Learn about the latest techniques and best practices in modern web development.</textarea>
                </div>

                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Content *</label>
                    <textarea id="content" name="content" rows="15" required
                              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">This is the full content of the blog post about advanced web development techniques. It covers modern frameworks, best practices, and emerging technologies in the field.</textarea>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Publishing Options</h3>
            
            <div class="space-y-4">
                <div class="flex items-center">
                    <input type="checkbox" id="is_published" name="is_published" value="1" checked
                           class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="is_published" class="ml-2 block text-sm text-gray-700">Published</label>
                </div>
                
                <div class="flex items-center">
                    <input type="checkbox" id="is_featured" name="is_featured" value="1"
                           class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="is_featured" class="ml-2 block text-sm text-gray-700">Featured post</label>
                </div>
                
                <div class="flex items-center">
                    <input type="checkbox" id="allow_comments" name="allow_comments" value="1" checked
                           class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="allow_comments" class="ml-2 block text-sm text-gray-700">Allow comments</label>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-between pt-6">
            <div class="flex items-center space-x-3">
                <button type="button" onclick="history.back()"
                        class="px-6 py-2 text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
                    Cancel
                </button>
                
                <form action="{{ route('admin.blog-posts.destroy', 1) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure?')"
                            class="px-6 py-2 text-red-600 bg-red-50 rounded-lg hover:bg-red-100 transition-colors">
                        Delete Post
                    </button>
                </form>
            </div>
            
            <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                Update Post
            </button>
        </div>
    </form>
</div>
@endsection
