@extends('layouts.admin')

@section('title', (isset($service) ? 'Edit Service' : 'Add Service') . ' - VanTroZ Admin')
@section('page-title', isset($service) ? 'Edit Service' : 'Add Service')

@section('content')
<div class="max-w-7xl mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">{{ isset($service) ? 'Edit Service' : 'Add Service' }}</h1>
        </div>
        <a href="{{ route('admin.services.index') }}" class="text-gray-600 hover:text-gray-900">← Back to Services</a>
    </div>

    <form action="{{ isset($service) ? route('admin.services.update', $service) : route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($service)) @method('PUT') @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <h2 class="text-lg font-semibold mb-4">Basic Information</h2>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Title *</label>
                            <input type="text" name="title" value="{{ old('title', $service->title ?? '') }}" required class="w-full border border-gray-300 rounded-lg px-3 py-2">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Slug</label>
                            <input type="text" name="slug" value="{{ old('slug', $service->slug ?? '') }}" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Short Description</label>
                            <textarea name="short_description" rows="2" class="w-full border border-gray-300 rounded-lg px-3 py-2">{{ old('short_description', $service->short_description ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                            <textarea name="description" class="ckeditor w-full border border-gray-300 rounded-lg">{{ old('description', $service->description ?? '') }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <h2 class="text-lg font-semibold mb-4">SEO Settings</h2>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">SEO Title</label>
                            <input type="text" name="seo_title" value="{{ old('seo_title', $service->seo_title ?? '') }}" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">SEO Description</label>
                            <textarea name="seo_description" rows="3" class="w-full border border-gray-300 rounded-lg px-3 py-2">{{ old('seo_description', $service->seo_description ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">SEO Keywords</label>
                            <input type="text" name="seo_keywords" value="{{ old('seo_keywords', $service->seo_keywords ?? '') }}" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <h2 class="text-lg font-semibold mb-4">Publish</h2>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Sort Order</label>
                            <input type="number" name="sort_order" value="{{ old('sort_order', $service->sort_order ?? 0) }}" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                        </div>
                        <label class="flex items-center gap-2">
                            <input type="checkbox" name="status" value="1" @checked(old('status', $service->status ?? true)) class="rounded border-gray-300 text-blue-600">
                            <span class="text-sm text-gray-700">Active</span>
                        </label>
                        <button type="submit" class="w-full px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700">Save Service</button>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <h2 class="text-lg font-semibold mb-4">Icon</h2>
                    @if(!empty($service?->icon))<img src="{{ Storage::url($service->icon) }}" class="max-h-24 rounded-lg mb-3">@endif
                    <input type="file" name="icon" class="image-input w-full text-sm" data-preview="#icon-preview">
                    <img id="icon-preview" class="max-h-24 rounded-lg mt-3 hidden">
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <h2 class="text-lg font-semibold mb-4">Banner Image</h2>
                    @if(!empty($service?->banner_image))<img src="{{ Storage::url($service->banner_image) }}" class="max-h-32 rounded-lg mb-3 w-full object-cover">@endif
                    <input type="file" name="banner_image" class="image-input w-full text-sm" data-preview="#banner-preview">
                    <img id="banner-preview" class="max-h-32 rounded-lg mt-3 hidden w-full object-cover">
                </div>
            </div>
        </div>
    </form>
</div>

@include('admin.commerce.partials.form-scripts')
@endsection
