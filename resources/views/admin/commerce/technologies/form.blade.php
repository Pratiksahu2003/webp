@extends('layouts.admin')
@section('title', (isset($technology) ? 'Edit Technology' : 'Add Technology') . ' - VanTroZ Admin')
@section('page-title', isset($technology) ? 'Edit Technology' : 'Add Technology')
@section('content')
<div class="max-w-4xl mx-auto p-6">
    <div class="flex justify-between mb-6"><h1 class="text-2xl font-bold">{{ isset($technology) ? 'Edit Technology' : 'Add Technology' }}</h1><a href="{{ route('admin.technologies.index') }}" class="text-gray-600">← Back</a></div>
    <form method="POST" enctype="multipart/form-data" action="{{ isset($technology) ? route('admin.technologies.update', $technology) : route('admin.technologies.store') }}" class="bg-white rounded-xl border border-gray-200 p-6 space-y-4">@csrf @if(isset($technology)) @method('PUT') @endif
        <div><label class="block text-sm font-medium mb-1">Name *</label><input name="name" class="w-full border border-gray-300 rounded-lg px-3 py-2" value="{{ old('name', $technology->name ?? '') }}" required></div>
        <div><label class="block text-sm font-medium mb-1">Slug</label><input name="slug" class="w-full border border-gray-300 rounded-lg px-3 py-2" value="{{ old('slug', $technology->slug ?? '') }}"></div>
        <div><label class="block text-sm font-medium mb-1">Technology Type</label><select name="technology_type" class="w-full border border-gray-300 rounded-lg px-3 py-2">@foreach(\App\Models\Technology::TYPES as $type)<option value="{{ $type }}" @selected(old('technology_type', $technology->technology_type ?? '')==$type)>{{ $type }}</option>@endforeach</select></div>
        <div><label class="block text-sm font-medium mb-1">Website URL</label><input name="website_url" class="w-full border border-gray-300 rounded-lg px-3 py-2" value="{{ old('website_url', $technology->website_url ?? '') }}"></div>
        <div><label class="block text-sm font-medium mb-1">Description</label><textarea name="description" rows="4" class="w-full border border-gray-300 rounded-lg px-3 py-2">{{ old('description', $technology->description ?? '') }}</textarea></div>
        @if(!empty($technology?->logo))<img src="{{ Storage::url($technology->logo) }}" class="max-h-20 rounded">@endif
        <div><label class="block text-sm font-medium mb-1">Logo</label><input type="file" name="logo" class="image-input w-full text-sm" data-preview="#logo-preview"><img id="logo-preview" class="max-h-20 rounded hidden mt-2"></div>
        <div><label class="block text-sm font-medium mb-1">Sort Order</label><input type="number" name="sort_order" class="w-full border border-gray-300 rounded-lg px-3 py-2" value="{{ old('sort_order', $technology->sort_order ?? 0) }}"></div>
        <label class="flex items-center gap-2"><input type="checkbox" name="status" value="1" @checked(old('status', $technology->status ?? true)) class="rounded border-gray-300 text-blue-600"><span class="text-sm">Active</span></label>
        <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Save Technology</button>
    </form>
</div>
@include('admin.commerce.partials.form-scripts')
@endsection
