@extends('layouts.admin')

@section('title', (isset($technology) ? 'Edit Technology' : 'Add Technology') . ' - VanTroZ Admin')
@section('page-title', isset($technology) ? 'Edit Technology' : 'Add Technology')

@section('content')
<div class="max-w-7xl mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900">{{ isset($technology) ? 'Edit Technology' : 'Add Technology' }}</h1>
        <a href="{{ route('admin.technologies.index') }}" class="text-gray-600 hover:text-gray-900">← Back to Technologies</a>
    </div>

    <form method="POST" enctype="multipart/form-data"
          action="{{ isset($technology) ? route('admin.technologies.update', $technology) : route('admin.technologies.store') }}">
        @csrf
        @if(isset($technology)) @method('PUT') @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-xl border border-gray-200 p-6 space-y-4">
                    <h2 class="text-lg font-semibold text-gray-900">Basic Information</h2>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Name *</label>
                        <input name="name" value="{{ old('name', $technology->name ?? '') }}" required
                               class="w-full border border-gray-300 rounded-lg px-3 py-2">
                        @error('name')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Slug</label>
                        <input name="slug" value="{{ old('slug', $technology->slug ?? '') }}"
                               class="w-full border border-gray-300 rounded-lg px-3 py-2">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Technology Type</label>
                        <select name="technology_type" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                            <option value="">Select type</option>
                            @foreach(\App\Models\Technology::TYPES as $type)
                                <option value="{{ $type }}" @selected(old('technology_type', $technology->technology_type ?? '') == $type)>{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Website URL</label>
                        <input name="website_url" value="{{ old('website_url', $technology->website_url ?? '') }}"
                               class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="https://">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea name="description" rows="4" class="w-full border border-gray-300 rounded-lg px-3 py-2">{{ old('description', $technology->description ?? '') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-white rounded-xl border border-gray-200 p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Publish</h2>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Sort Order</label>
                            <input type="number" name="sort_order" value="{{ old('sort_order', $technology->sort_order ?? 0) }}"
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2">
                        </div>
                        <label class="flex items-center gap-2">
                            <input type="checkbox" name="status" value="1" @checked(old('status', $technology->status ?? true))
                                   class="rounded border-gray-300 text-blue-600">
                            <span class="text-sm text-gray-700">Active</span>
                        </label>
                        <button type="submit" class="w-full px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700">
                            Save Technology
                        </button>
                    </div>
                </div>

                <div class="bg-white rounded-xl border border-gray-200 p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-1">Logo</h2>
                    <p class="text-sm text-gray-500 mb-3">Small logo shown in lists and tags</p>
                    @if(!empty($technology?->logo))
                        <img src="{{ Storage::url($technology->logo) }}" alt="Current logo" class="max-h-20 rounded-lg mb-3 border border-gray-100">
                    @endif
                    <input type="file" name="logo" accept="image/*" class="image-input w-full text-sm" data-preview="#logo-preview">
                    <img id="logo-preview" class="max-h-20 rounded-lg mt-3 hidden border border-gray-100">
                    @error('logo')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="bg-white rounded-xl border border-gray-200 p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-1">Icon Image</h2>
                    <p class="text-sm text-gray-500 mb-3">Square icon image (PNG, SVG, JPG)</p>
                    @if(!empty($technology) && $technology->iconIsImage())
                        <img src="{{ Storage::url($technology->icon) }}" alt="Current icon" class="max-h-20 rounded-lg mb-3 border border-gray-100">
                    @elseif(!empty($technology?->icon))
                        <div class="mb-3 p-3 bg-gray-50 rounded-lg text-center text-3xl">{{ $technology->icon }}</div>
                    @endif
                    <input type="file" name="icon" accept="image/*" class="image-input w-full text-sm" data-preview="#icon-preview">
                    <img id="icon-preview" class="max-h-20 rounded-lg mt-3 hidden border border-gray-100">
                    @error('icon')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Or emoji / text icon</label>
                        <input name="icon_text" value="{{ old('icon_text', (!$technology?->iconIsImage() ? $technology?->icon : '') ?? '') }}"
                               class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="e.g. ⚛️ or fa-react">
                        <p class="text-xs text-gray-400 mt-1">Used when no icon image is uploaded</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl border border-gray-200 p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-1">Banner Image</h2>
                    <p class="text-sm text-gray-500 mb-3">Larger image for detail pages</p>
                    @if(!empty($technology?->image))
                        <img src="{{ Storage::url($technology->image) }}" alt="Current banner" class="max-h-32 rounded-lg mb-3 w-full object-cover border border-gray-100">
                    @endif
                    <input type="file" name="image" accept="image/*" class="image-input w-full text-sm" data-preview="#image-preview">
                    <img id="image-preview" class="max-h-32 rounded-lg mt-3 hidden w-full object-cover border border-gray-100">
                    @error('image')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                </div>
            </div>
        </div>
    </form>
</div>

@include('admin.commerce.partials.form-scripts')
@endsection
