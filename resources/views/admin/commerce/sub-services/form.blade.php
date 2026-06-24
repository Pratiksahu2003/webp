@extends('layouts.admin')
@section('title', (isset($subService) ? 'Edit Sub Service' : 'Add Sub Service') . ' - VanTroZ Admin')
@section('page-title', isset($subService) ? 'Edit Sub Service' : 'Add Sub Service')
@section('content')
<div class="max-w-7xl mx-auto p-6">
    <div class="flex justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-900">{{ isset($subService) ? 'Edit Sub Service' : 'Add Sub Service' }}</h1>
        <a href="{{ route('admin.sub-services.index') }}" class="text-gray-600 hover:text-gray-900">← Back</a>
    </div>
    <form method="POST" enctype="multipart/form-data" action="{{ isset($subService) ? route('admin.sub-services.update', $subService) : route('admin.sub-services.store') }}">
        @csrf @if(isset($subService)) @method('PUT') @endif
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-xl border border-gray-200 p-6 space-y-4">
                    <div><label class="block text-sm font-medium mb-1">Parent Service *</label>
                        <select name="service_id" class="select2 w-full border border-gray-300 rounded-lg" required>@foreach($services as $s)<option value="{{ $s->id }}" @selected(old('service_id', $subService->service_id ?? '')==$s->id)>{{ $s->title }}</option>@endforeach</select></div>
                    <div><label class="block text-sm font-medium mb-1">Title *</label><input name="title" class="w-full border border-gray-300 rounded-lg px-3 py-2" value="{{ old('title', $subService->title ?? '') }}" required></div>
                    <div><label class="block text-sm font-medium mb-1">Slug</label><input name="slug" class="w-full border border-gray-300 rounded-lg px-3 py-2" value="{{ old('slug', $subService->slug ?? '') }}"></div>
                    <div><label class="block text-sm font-medium mb-1">Short Description</label><textarea name="short_description" rows="2" class="w-full border border-gray-300 rounded-lg px-3 py-2">{{ old('short_description', $subService->short_description ?? '') }}</textarea></div>
                    <div><label class="block text-sm font-medium mb-1">Description</label><textarea name="description" class="ckeditor w-full border border-gray-300 rounded-lg">{{ old('description', $subService->description ?? '') }}</textarea></div>
                    <div class="grid grid-cols-2 gap-4">
                        <div><label class="block text-sm font-medium mb-1">Starting Price</label><input type="number" step="0.01" name="starting_price" class="w-full border border-gray-300 rounded-lg px-3 py-2" value="{{ old('starting_price', $subService->starting_price ?? 0) }}"></div>
                        <div><label class="block text-sm font-medium mb-1">Delivery Days</label><input type="number" name="delivery_days" class="w-full border border-gray-300 rounded-lg px-3 py-2" value="{{ old('delivery_days', $subService->delivery_days ?? 7) }}"></div>
                    </div>
                    <div><label class="block text-sm font-medium mb-1">Technologies</label>
                        <select name="technology_ids[]" class="select2 w-full border border-gray-300 rounded-lg" multiple>@foreach($technologies as $tech)<option value="{{ $tech->id }}" @selected(collect(old('technology_ids', isset($subService)?$subService->technologies->pluck('id'):[]))->contains($tech->id))>{{ $tech->name }}</option>@endforeach</select></div>
                </div>
                <div class="bg-white rounded-xl border border-gray-200 p-6">
                    <div class="flex justify-between mb-4"><h2 class="font-semibold">FAQs</h2><button type="button" onclick="addDynamicRow('#faq-container', faqTemplate)" class="text-sm text-blue-600">+ Add FAQ</button></div>
                    <div id="faq-container" class="space-y-3">@php $faqs = old('faqs', isset($subService) ? $subService->faqs->toArray() : [['question'=>'','answer'=>'']]); @endphp
                    @foreach($faqs as $i => $faq)<div class="p-4 bg-gray-50 rounded-lg space-y-2"><input name="faqs[{{ $i }}][question]" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Question" value="{{ $faq['question'] ?? '' }}"><textarea name="faqs[{{ $i }}][answer]" rows="2" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Answer">{{ $faq['answer'] ?? '' }}</textarea></div>@endforeach</div>
                </div>
                <div class="bg-white rounded-xl border border-gray-200 p-6">
                    <div class="flex justify-between mb-4"><h2 class="font-semibold">Why Choose Us</h2><button type="button" onclick="addDynamicRow('#why-container', whyTemplate)" class="text-sm text-blue-600">+ Add Point</button></div>
                    <div id="why-container" class="space-y-3">@php $whys = old('why_choose_us', isset($subService) ? $subService->whyChooseUs->toArray() : [['title'=>'']]); @endphp
                    @foreach($whys as $i => $why)<div class="p-4 bg-gray-50 rounded-lg"><input name="why_choose_us[{{ $i }}][title]" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Point title" value="{{ $why['title'] ?? '' }}"></div>@endforeach</div>
                </div>
            </div>
            <div class="bg-white rounded-xl border border-gray-200 p-6 h-fit space-y-4">
                <div><label class="block text-sm font-medium mb-1">Sort Order</label><input type="number" name="sort_order" class="w-full border border-gray-300 rounded-lg px-3 py-2" value="{{ old('sort_order', $subService->sort_order ?? 0) }}"></div>
                <label class="flex items-center gap-2"><input type="checkbox" name="status" value="1" @checked(old('status', $subService->status ?? true)) class="rounded border-gray-300 text-blue-600"><span class="text-sm">Active</span></label>
                @if(!empty($subService?->image))<img src="{{ Storage::url($subService->image) }}" class="max-h-32 rounded-lg">@endif
                <input type="file" name="image" class="image-input w-full text-sm" data-preview="#sub-image-preview">
                <img id="sub-image-preview" class="max-h-32 rounded-lg hidden">
                <button class="w-full px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Save Sub Service</button>
            </div>
        </div>
    </form>
</div>
@include('admin.commerce.partials.form-scripts')
@push('scripts')<script>const faqTemplate='<div class="p-4 bg-gray-50 rounded-lg space-y-2"><input name="faqs[__INDEX__][question]" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Question"><textarea name="faqs[__INDEX__][answer]" rows="2" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Answer"></textarea></div>';const whyTemplate='<div class="p-4 bg-gray-50 rounded-lg"><input name="why_choose_us[__INDEX__][title]" class="w-full border border-gray-300 rounded-lg px-3 py-2" placeholder="Point title"></div>';</script>@endpush
@endsection
