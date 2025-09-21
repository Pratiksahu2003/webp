@extends('layouts.admin')

@section('title', 'Create New Blog Post - WEZOM Admin')
@section('page-title', 'Create New Blog Post')

@section('content')
<div class="p-8 bg-gray-50 min-h-full">
    <!-- Header -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Create New Blog Post</h1>
                <p class="text-gray-600">Write and publish your blog content with advanced SEO features</p>
            </div>
            <a href="{{ route('admin.blog-posts.index') }}" class="zoho-btn zoho-btn-outline">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Posts
            </a>
        </div>
    </div>

    <!-- Main Form -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-2">
            <form action="{{ route('admin.blog-posts.store') }}" method="POST" enctype="multipart/form-data" id="blog-form">
                @csrf
                
                <!-- Basic Information Card -->
                <div class="zoho-card animate-slide-up mb-8">
                    <div class="p-6 border-b border-gray-100">
                        <h3 class="text-xl font-bold text-gray-900">Basic Information</h3>
                        <p class="text-gray-600 mt-1">Essential details for your blog post</p>
                    </div>
                    <div class="p-6 space-y-6">
                        <!-- Title -->
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Post Title *</label>
                            <input type="text" 
                                   id="title" 
                                   name="title" 
                                   value="{{ old('title') }}"
                                   class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                   placeholder="Enter your blog post title..."
                                   required>
                            @error('title')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Slug -->
                        <div>
                            <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">URL Slug</label>
                            <div class="flex">
                                <span class="inline-flex items-center px-3 rounded-l-xl border border-r-0 border-gray-200 bg-gray-50 text-gray-500 text-sm">
                                    {{ url('/blog/') }}/
                                </span>
                                <input type="text" 
                                       id="slug" 
                                       name="slug" 
                                       value="{{ old('slug') }}"
                                       class="flex-1 px-4 py-3 border border-gray-200 rounded-r-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                       placeholder="url-friendly-slug">
                            </div>
                            <p class="text-sm text-gray-500 mt-1">Leave empty to auto-generate from title</p>
                            @error('slug')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Excerpt -->
                        <div>
                            <label for="excerpt" class="block text-sm font-medium text-gray-700 mb-2">Excerpt</label>
                            <textarea id="excerpt" 
                                      name="excerpt" 
                                      rows="3"
                                      class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                      placeholder="Brief description of your post...">{{ old('excerpt') }}</textarea>
                            <p class="text-sm text-gray-500 mt-1">Short description that appears in listings and search results</p>
                            @error('excerpt')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Content -->
                        <div>
                            <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Content *</label>
                            <textarea id="content" 
                                      name="content" 
                                      rows="15"
                                      class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                      placeholder="Write your blog post content here..."
                                      required>{{ old('content') }}</textarea>
                            @error('content')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- SEO Settings Card -->
                <div class="zoho-card animate-slide-up mb-8" style="animation-delay: 0.2s">
                    <div class="p-6 border-b border-gray-100">
                        <h3 class="text-xl font-bold text-gray-900">SEO Settings</h3>
                        <p class="text-gray-600 mt-1">Optimize your post for search engines</p>
                    </div>
                    <div class="p-6 space-y-6">
                        <!-- Meta Title -->
                        <div>
                            <label for="meta_title" class="block text-sm font-medium text-gray-700 mb-2">Meta Title</label>
                            <input type="text" 
                                   id="meta_title" 
                                   name="meta_title" 
                                   value="{{ old('meta_title') }}"
                                   class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                   placeholder="SEO optimized title (50-60 characters)"
                                   maxlength="60">
                            <div class="flex justify-between text-sm text-gray-500 mt-1">
                                <span>Recommended: 50-60 characters</span>
                                <span id="meta_title_count">0/60</span>
                            </div>
                            @error('meta_title')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Meta Description -->
                        <div>
                            <label for="meta_description" class="block text-sm font-medium text-gray-700 mb-2">Meta Description</label>
                            <textarea id="meta_description" 
                                      name="meta_description" 
                                      rows="3"
                                      class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                      placeholder="SEO description for search results (120-160 characters)"
                                      maxlength="160">{{ old('meta_description') }}</textarea>
                            <div class="flex justify-between text-sm text-gray-500 mt-1">
                                <span>Recommended: 120-160 characters</span>
                                <span id="meta_description_count">0/160</span>
                            </div>
                            @error('meta_description')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Focus Keywords -->
                        <div>
                            <label for="focus_keywords" class="block text-sm font-medium text-gray-700 mb-2">Focus Keywords</label>
                            <input type="text" 
                                   id="focus_keywords" 
                                   name="focus_keywords" 
                                   value="{{ old('focus_keywords') }}"
                                   class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                   placeholder="Enter keywords separated by commas">
                            <p class="text-sm text-gray-500 mt-1">Main keywords you want to rank for</p>
                            @error('focus_keywords')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Canonical URL -->
                        <div>
                            <label for="canonical_url" class="block text-sm font-medium text-gray-700 mb-2">Canonical URL</label>
                            <input type="url" 
                                   id="canonical_url" 
                                   name="canonical_url" 
                                   value="{{ old('canonical_url') }}"
                                   class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                   placeholder="https://example.com/canonical-url">
                            <p class="text-sm text-gray-500 mt-1">Prevent duplicate content issues</p>
                            @error('canonical_url')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Social Media Card -->
                <div class="zoho-card animate-slide-up mb-8" style="animation-delay: 0.4s">
                    <div class="p-6 border-b border-gray-100">
                        <h3 class="text-xl font-bold text-gray-900">Social Media</h3>
                        <p class="text-gray-600 mt-1">Customize how your post appears on social platforms</p>
                    </div>
                    <div class="p-6 space-y-6">
                        <!-- Open Graph Title -->
                        <div>
                            <label for="og_title" class="block text-sm font-medium text-gray-700 mb-2">Open Graph Title</label>
                            <input type="text" 
                                   id="og_title" 
                                   name="og_title" 
                                   value="{{ old('og_title') }}"
                                   class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                   placeholder="Title for Facebook, LinkedIn sharing">
                            @error('og_title')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Open Graph Description -->
                        <div>
                            <label for="og_description" class="block text-sm font-medium text-gray-700 mb-2">Open Graph Description</label>
                            <textarea id="og_description" 
                                      name="og_description" 
                                      rows="2"
                                      class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                      placeholder="Description for social media sharing">{{ old('og_description') }}</textarea>
                            @error('og_description')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Twitter Title -->
                        <div>
                            <label for="twitter_title" class="block text-sm font-medium text-gray-700 mb-2">Twitter Title</label>
                            <input type="text" 
                                   id="twitter_title" 
                                   name="twitter_title" 
                                   value="{{ old('twitter_title') }}"
                                   class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                   placeholder="Title for Twitter sharing">
                            @error('twitter_title')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Twitter Description -->
                        <div>
                            <label for="twitter_description" class="block text-sm font-medium text-gray-700 mb-2">Twitter Description</label>
                            <textarea id="twitter_description" 
                                      name="twitter_description" 
                                      rows="2"
                                      class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                      placeholder="Description for Twitter sharing">{{ old('twitter_description') }}</textarea>
                            @error('twitter_description')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Sidebar -->
        <div class="space-y-8">
            <!-- Publish Settings -->
            <div class="zoho-card animate-slide-up" style="animation-delay: 0.6s">
                <div class="p-6 border-b border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900">Publish Settings</h3>
                </div>
                <div class="p-6 space-y-4">
                    <!-- Status -->
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <select id="status" name="status" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="draft" {{ old('status', 'draft') === 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>Published</option>
                            <option value="scheduled" {{ old('status') === 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                        </select>
                    </div>

                    <!-- Scheduled Date -->
                    <div id="scheduled_date" style="display: none;">
                        <label for="scheduled_at" class="block text-sm font-medium text-gray-700 mb-2">Schedule Date</label>
                        <input type="datetime-local" 
                               id="scheduled_at" 
                               name="scheduled_at" 
                               value="{{ old('scheduled_at') }}"
                               class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <!-- Author -->
                    <div>
                        <label for="author" class="block text-sm font-medium text-gray-700 mb-2">Author</label>
                        <select id="author" name="author" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @foreach($authors as $key => $author)
                                <option value="{{ $key }}" {{ old('author', auth()->user()->name) === $key ? 'selected' : '' }}>{{ $author }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Category -->
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                        <select id="category" name="category" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Select Category</option>
                            @foreach($categories as $key => $category)
                                <option value="{{ $key }}" {{ old('category') === $key ? 'selected' : '' }}>{{ $category }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Tags -->
                    <div>
                        <label for="tags" class="block text-sm font-medium text-gray-700 mb-2">Tags</label>
                        <input type="text" 
                               id="tags" 
                               name="tags" 
                               value="{{ old('tags') }}"
                               class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                               placeholder="Enter tags separated by commas">
                    </div>

                    <!-- Featured Image -->
                    <div>
                        <label for="featured_image" class="block text-sm font-medium text-gray-700 mb-2">Featured Image</label>
                        <input type="file" 
                               id="featured_image" 
                               name="featured_image" 
                               accept="image/*"
                               class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <!-- Options -->
                    <div class="space-y-3">
                        <label class="flex items-center">
                            <input type="checkbox" 
                                   name="is_featured" 
                                   value="1" 
                                   {{ old('is_featured') ? 'checked' : '' }}
                                   class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <span class="ml-2 text-sm text-gray-700">Mark as Featured</span>
                        </label>

                        <label class="flex items-center">
                            <input type="checkbox" 
                                   name="allow_comments" 
                                   value="1" 
                                   {{ old('allow_comments', true) ? 'checked' : '' }}
                                   class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <span class="ml-2 text-sm text-gray-700">Allow Comments</span>
                        </label>
                    </div>

                    <!-- Action Buttons -->
                    <div class="pt-4 space-y-3">
                        <button type="submit" class="w-full zoho-btn zoho-btn-primary">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Create Post
                        </button>
                        
                        <button type="button" onclick="saveDraft()" class="w-full zoho-btn zoho-btn-outline">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                            </svg>
                            Save as Draft
                        </button>
                    </div>
                </div>
            </div>

            <!-- SEO Preview -->
            <div class="zoho-card animate-slide-up" style="animation-delay: 0.8s">
                <div class="p-6 border-b border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900">SEO Preview</h3>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <!-- Google Preview -->
                        <div>
                            <h4 class="text-sm font-medium text-gray-700 mb-2">Google Search Preview</h4>
                            <div class="border border-gray-200 rounded-lg p-3 bg-gray-50">
                                <div id="google_title" class="text-blue-600 text-sm font-medium mb-1">Your meta title will appear here</div>
                                <div id="google_url" class="text-green-600 text-xs mb-1">{{ url('/blog/') }}/your-slug</div>
                                <div id="google_description" class="text-gray-600 text-sm">Your meta description will appear here</div>
                            </div>
                        </div>

                        <!-- Social Preview -->
                        <div>
                            <h4 class="text-sm font-medium text-gray-700 mb-2">Social Media Preview</h4>
                            <div class="border border-gray-200 rounded-lg p-3 bg-gray-50">
                                <div class="flex items-start space-x-3">
                                    <div class="w-10 h-10 bg-gray-300 rounded"></div>
                                    <div class="flex-1">
                                        <div id="social_title" class="text-sm font-medium text-gray-900">Your social title</div>
                                        <div id="social_description" class="text-sm text-gray-600 mt-1">Your social description</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CKEditor CDN -->
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize CKEditor
    ClassicEditor
        .create(document.querySelector('#content'), {
            toolbar: {
                items: [
                    'heading', '|',
                    'bold', 'italic', 'underline', 'strikethrough', '|',
                    'link', 'bulletedList', 'numberedList', '|',
                    'outdent', 'indent', '|',
                    'blockQuote', 'insertTable', '|',
                    'undo', 'redo', '|',
                    'codeBlock', 'htmlEmbed'
                ]
            },
            language: 'en',
            image: {
                toolbar: [
                    'imageTextAlternative', 'imageStyle:full', 'imageStyle:side'
                ]
            },
            table: {
                contentToolbar: [
                    'tableColumn', 'tableRow', 'mergeTableCells'
                ]
            }
        })
        .then(editor => {
            console.log('CKEditor initialized successfully');
            
            // Update word count
            editor.model.document.on('change:data', () => {
                updateWordCount();
            });
        })
        .catch(error => {
            console.error('Error initializing CKEditor:', error);
        });

    // Status change handler
    document.getElementById('status').addEventListener('change', function() {
        const scheduledDate = document.getElementById('scheduled_date');
        if (this.value === 'scheduled') {
            scheduledDate.style.display = 'block';
        } else {
            scheduledDate.style.display = 'none';
        }
    });

    // Character counters
    document.getElementById('meta_title').addEventListener('input', function() {
        const count = this.value.length;
        document.getElementById('meta_title_count').textContent = count + '/60';
        document.getElementById('google_title').textContent = this.value || 'Your meta title will appear here';
    });

    document.getElementById('meta_description').addEventListener('input', function() {
        const count = this.value.length;
        document.getElementById('meta_description_count').textContent = count + '/160';
        document.getElementById('google_description').textContent = this.value || 'Your meta description will appear here';
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
        
        // Update preview URL
        document.getElementById('google_url').textContent = '{{ url("/blog/") }}/' + (document.getElementById('slug').value || 'your-slug');
    });

    // Social media preview updates
    document.getElementById('og_title').addEventListener('input', function() {
        document.getElementById('social_title').textContent = this.value || 'Your social title';
    });

    document.getElementById('og_description').addEventListener('input', function() {
        document.getElementById('social_description').textContent = this.value || 'Your social description';
    });
});

function updateWordCount() {
    // This would be implemented to show word count in real-time
    console.log('Word count updated');
}

function saveDraft() {
    document.getElementById('status').value = 'draft';
    document.getElementById('blog-form').submit();
}
</script>
@endsection