@extends('layouts.admin')

@section('title', 'Create New Service - WEZOM Admin')
@section('page-title', 'Create New Service')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Create New Service</h1>
            <p class="text-gray-600 mt-1">Add a new service to your offerings</p>
        </div>
        <a href="{{ route('admin.services.index') }}" 
           class="inline-flex items-center px-4 py-2 text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Back to Services
        </a>
    </div>

    <form action="{{ route('admin.services.store') }}" method="POST" class="space-y-6">
        @csrf
        
        <!-- Basic Information -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Basic Information</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Service Name *</label>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           value="{{ old('name') }}"
                           required
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-500 @enderror"
                           placeholder="Enter service name">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                    <select id="category" 
                            name="category"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('category') border-red-500 @enderror">
                        <option value="">Select Category</option>
                        <option value="web-development" {{ old('category') === 'web-development' ? 'selected' : '' }}>Web Development</option>
                        <option value="mobile-development" {{ old('category') === 'mobile-development' ? 'selected' : '' }}>Mobile Development</option>
                        <option value="ui-ux-design" {{ old('category') === 'ui-ux-design' ? 'selected' : '' }}>UI/UX Design</option>
                        <option value="digital-marketing" {{ old('category') === 'digital-marketing' ? 'selected' : '' }}>Digital Marketing</option>
                        <option value="consulting" {{ old('category') === 'consulting' ? 'selected' : '' }}>Consulting</option>
                    </select>
                    @error('category')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-6">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Service Description</label>
                <textarea id="description" 
                          name="description" 
                          rows="6"
                          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('description') border-red-500 @enderror"
                          placeholder="Describe your service in detail...">{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Pricing & Features -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Pricing & Features</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label for="price_from" class="block text-sm font-medium text-gray-700 mb-2">Starting Price</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-500 sm:text-sm">$</span>
                        </div>
                        <input type="number" 
                               id="price_from" 
                               name="price_from" 
                               value="{{ old('price_from') }}"
                               min="0"
                               step="0.01"
                               class="w-full pl-7 pr-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('price_from') border-red-500 @enderror"
                               placeholder="0.00">
                    </div>
                    @error('price_from')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="price_to" class="block text-sm font-medium text-gray-700 mb-2">Price Up To</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-500 sm:text-sm">$</span>
                        </div>
                        <input type="number" 
                               id="price_to" 
                               name="price_to" 
                               value="{{ old('price_to') }}"
                               min="0"
                               step="0.01"
                               class="w-full pl-7 pr-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('price_to') border-red-500 @enderror"
                               placeholder="0.00">
                    </div>
                    @error('price_to')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="duration" class="block text-sm font-medium text-gray-700 mb-2">Duration</label>
                    <input type="text" 
                           id="duration" 
                           name="duration" 
                           value="{{ old('duration') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('duration') border-red-500 @enderror"
                           placeholder="e.g., 2-4 weeks">
                    @error('duration')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-6">
                <label for="features" class="block text-sm font-medium text-gray-700 mb-2">Key Features</label>
                <textarea id="features" 
                          name="features" 
                          rows="4"
                          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('features') border-red-500 @enderror"
                          placeholder="List the key features or deliverables (one per line)...">{{ old('features') }}</textarea>
                @error('features')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-xs text-gray-500">Enter each feature on a new line</p>
            </div>
        </div>

        <!-- Media & SEO -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Media & SEO</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="icon" class="block text-sm font-medium text-gray-700 mb-2">Service Icon</label>
                    <input type="text" 
                           id="icon" 
                           name="icon" 
                           value="{{ old('icon') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('icon') border-red-500 @enderror"
                           placeholder="FontAwesome class or SVG">
                    @error('icon')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Featured Image URL</label>
                    <input type="url" 
                           id="image" 
                           name="image" 
                           value="{{ old('image') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('image') border-red-500 @enderror"
                           placeholder="https://example.com/image.jpg">
                    @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-6 space-y-4">
                <div>
                    <label for="meta_title" class="block text-sm font-medium text-gray-700 mb-2">Meta Title</label>
                    <input type="text" 
                           id="meta_title" 
                           name="meta_title" 
                           value="{{ old('meta_title') }}"
                           maxlength="60"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('meta_title') border-red-500 @enderror"
                           placeholder="SEO title for search engines">
                    @error('meta_title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-xs text-gray-500">0/60 characters</p>
                </div>
                
                <div>
                    <label for="meta_description" class="block text-sm font-medium text-gray-700 mb-2">Meta Description</label>
                    <textarea id="meta_description" 
                              name="meta_description" 
                              rows="3"
                              maxlength="160"
                              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('meta_description') border-red-500 @enderror"
                              placeholder="Brief description for search engines">{{ old('meta_description') }}</textarea>
                    @error('meta_description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-xs text-gray-500">0/160 characters</p>
                </div>
            </div>
        </div>

        <!-- Service Settings -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Service Settings</h3>
            
            <div class="space-y-4">
                <div class="flex items-center">
                    <input type="hidden" name="is_featured" value="0">
                    <input type="checkbox" 
                           id="is_featured" 
                           name="is_featured" 
                           value="1"
                           {{ old('is_featured') ? 'checked' : '' }}
                           class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="is_featured" class="ml-2 block text-sm text-gray-700">
                        Featured service (display prominently)
                    </label>
                </div>
                
                <div class="flex items-center">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" 
                           id="is_active" 
                           name="is_active" 
                           value="1"
                           {{ old('is_active', true) ? 'checked' : '' }}
                           class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="is_active" class="ml-2 block text-sm text-gray-700">
                        Active (visible to customers)
                    </label>
                </div>
                
                <div class="flex items-center">
                    <input type="hidden" name="is_popular" value="0">
                    <input type="checkbox" 
                           id="is_popular" 
                           name="is_popular" 
                           value="1"
                           {{ old('is_popular') ? 'checked' : '' }}
                           class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="is_popular" class="ml-2 block text-sm text-gray-700">
                        Popular service (show badge)
                    </label>
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="flex items-center justify-between pt-6">
            <button type="button" 
                    onclick="history.back()"
                    class="px-6 py-2 text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
                Cancel
            </button>
            
            <div class="flex items-center space-x-3">
                <button type="submit" 
                        name="action" 
                        value="draft"
                        class="px-6 py-2 text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 transition-colors">
                    Save as Draft
                </button>
                <button type="submit" 
                        name="action" 
                        value="publish"
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                    Create & Publish
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
