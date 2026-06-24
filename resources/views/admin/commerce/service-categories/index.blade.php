@extends('layouts.admin')
@section('title', 'Service Categories - VanTroZ Admin')
@section('page-title', 'Service Categories')
@section('content')
<div class="max-w-7xl mx-auto p-6">
    <h1 class="text-2xl font-bold text-gray-900 mb-6">Service Categories</h1>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="bg-white rounded-xl border border-gray-200 p-6 h-fit">
            <h2 class="font-semibold mb-4">Add Category</h2>
            <form method="POST" action="{{ route('admin.service-categories.store') }}" class="space-y-4">@csrf
                <div><label class="block text-sm font-medium mb-1">Title</label><input name="title" class="w-full border border-gray-300 rounded-lg px-3 py-2" required></div>
                <div><label class="block text-sm font-medium mb-1">Description</label><textarea name="description" rows="3" class="w-full border border-gray-300 rounded-lg px-3 py-2"></textarea></div>
                <div><label class="block text-sm font-medium mb-1">Sort Order</label><input type="number" name="sort_order" value="0" class="w-full border border-gray-300 rounded-lg px-3 py-2"></div>
                <label class="flex items-center gap-2"><input type="checkbox" name="status" value="1" checked class="rounded border-gray-300 text-blue-600"><span class="text-sm">Active</span></label>
                <button class="w-full px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Create Category</button>
            </form>
        </div>
        <div class="lg:col-span-2 bg-white rounded-xl border border-gray-200 overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200"><thead class="bg-gray-50"><tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Services</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
            </tr></thead><tbody class="divide-y divide-gray-200">@foreach($categories as $category)<tr class="hover:bg-gray-50">
                <td class="px-6 py-4"><div class="font-medium">{{ $category->title }}</div><div class="text-sm text-gray-500">/{{ $category->slug }}</div></td>
                <td class="px-6 py-4">{{ $category->services_count }}</td>
                <td class="px-6 py-4">@if($category->status)<span class="px-2 py-1 text-xs bg-green-100 text-green-800 rounded-full">Active</span>@else<span class="px-2 py-1 text-xs bg-gray-100 text-gray-800 rounded-full">Inactive</span>@endif</td>
                <td class="px-6 py-4"><form action="{{ route('admin.service-categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Delete?')">@csrf @method('DELETE')<button class="text-red-600 text-sm">Delete</button></form></td>
            </tr>@endforeach</tbody></table>
            <div class="px-6 py-4 border-t">{{ $categories->links() }}</div>
        </div>
    </div>
</div>
@endsection
