@extends('layouts.admin')
@section('title', (isset($package) ? 'Edit Package' : 'Add Package') . ' - VanTroZ Admin')
@section('page-title', isset($package) ? 'Edit Package' : 'Add Package')
@section('content')
<div class="max-w-7xl mx-auto p-6">
    <div class="flex justify-between mb-6"><h1 class="text-2xl font-bold">{{ isset($package) ? 'Edit Package' : 'Add Package' }}</h1><a href="{{ route('admin.packages.index') }}" class="text-gray-600">← Back</a></div>
    <form method="POST" action="{{ isset($package) ? route('admin.packages.update', $package) : route('admin.packages.store') }}">@csrf @if(isset($package)) @method('PUT') @endif
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-xl border border-gray-200 p-6 space-y-4">
                <div><label class="block text-sm font-medium mb-1">Sub Service *</label><select name="sub_service_id" class="select2 w-full border border-gray-300 rounded-lg" required>@foreach($subServices as $s)<option value="{{ $s->id }}" @selected(old('sub_service_id', $package->sub_service_id ?? '')==$s->id)>{{ $s->service->title ?? '' }} / {{ $s->title }}</option>@endforeach</select></div>
                <div><label class="block text-sm font-medium mb-1">Package Name *</label><input name="package_name" class="w-full border border-gray-300 rounded-lg px-3 py-2" value="{{ old('package_name', $package->package_name ?? '') }}" required></div>
                <div class="grid grid-cols-3 gap-4">
                    <div><label class="block text-sm font-medium mb-1">Price *</label><input type="number" step="0.01" name="price" class="w-full border border-gray-300 rounded-lg px-3 py-2" value="{{ old('price', $package->price ?? '') }}" required></div>
                    <div><label class="block text-sm font-medium mb-1">Sale Price</label><input type="number" step="0.01" name="sale_price" class="w-full border border-gray-300 rounded-lg px-3 py-2" value="{{ old('sale_price', $package->sale_price ?? '') }}"></div>
                    <div><label class="block text-sm font-medium mb-1">Delivery Days</label><input type="number" name="delivery_days" class="w-full border border-gray-300 rounded-lg px-3 py-2" value="{{ old('delivery_days', $package->delivery_days ?? 7) }}"></div>
                </div>
                <div class="grid grid-cols-3 gap-4">
                    <div><label class="block text-sm font-medium mb-1">Revisions</label><input type="number" name="revisions" class="w-full border border-gray-300 rounded-lg px-3 py-2" value="{{ old('revisions', $package->revisions ?? 1) }}"></div>
                    <div><label class="block text-sm font-medium mb-1">Support Period</label><input name="support_period" class="w-full border border-gray-300 rounded-lg px-3 py-2" value="{{ old('support_period', $package->support_period ?? '') }}"></div>
                    <div><label class="block text-sm font-medium mb-1">Badge</label><select name="badge" class="w-full border border-gray-300 rounded-lg px-3 py-2"><option value="">None</option>@foreach(\App\Models\ServicePackage::BADGES as $badge)<option value="{{ $badge }}" @selected(old('badge', $package->badge ?? '')==$badge)>{{ $badge }}</option>@endforeach</select></div>
                </div>
                <div><label class="block text-sm font-medium mb-1">Description</label><textarea name="description" class="ckeditor w-full border border-gray-300 rounded-lg">{{ old('description', $package->description ?? '') }}</textarea></div>
            </div>
            <div class="bg-white rounded-xl border border-gray-200 p-6">
                <div class="flex justify-between mb-4"><h2 class="font-semibold">Package Features</h2><button type="button" onclick="addDynamicRow('#features-container', featureTemplate)" class="text-sm text-blue-600">+ Add Feature</button></div>
                <div id="features-container" class="space-y-2">@php $features = old('features', isset($package) ? $package->features->toArray() : [['feature_title'=>'']]); @endphp
                @foreach($features as $i => $feature)<div class="p-3 bg-gray-50 rounded-lg"><input name="features[{{ $i }}][feature_title]" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Feature title" value="{{ $feature['feature_title'] ?? '' }}"></div>@endforeach</div>
            </div>
        </div>
        <div class="bg-white rounded-xl border border-gray-200 p-6 h-fit space-y-4">
            <div><label class="block text-sm font-medium mb-1">Sort Order</label><input type="number" name="sort_order" class="w-full border border-gray-300 rounded-lg px-3 py-2" value="{{ old('sort_order', $package->sort_order ?? 0) }}"></div>
            <label class="flex items-center gap-2"><input type="checkbox" name="status" value="1" @checked(old('status', $package->status ?? true)) class="rounded border-gray-300 text-blue-600"><span class="text-sm">Active</span></label>
            <button class="w-full px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Save Package</button>
        </div>
    </div></form>
</div>
@include('admin.commerce.partials.form-scripts')
@push('scripts')<script>const featureTemplate='<div class="p-3 bg-gray-50 rounded-lg"><input name="features[__INDEX__][feature_title]" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Feature title"></div>';</script>@endpush
@endsection
