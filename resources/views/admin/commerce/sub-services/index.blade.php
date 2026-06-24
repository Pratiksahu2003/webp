@extends('layouts.admin')
@section('title', 'Sub Services - VanTroZ Admin')
@section('page-title', 'Sub Services')
@section('content')
<div class="max-w-7xl mx-auto p-6">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
        <div><h1 class="text-2xl font-bold text-gray-900">Sub Services</h1><p class="text-gray-600 mt-1">Manage sub services under each main service</p></div>
        <a href="{{ route('admin.sub-services.create') }}" class="mt-4 sm:mt-0 inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700">Add Sub Service</a>
    </div>
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50"><tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Service</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Price</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Days</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr></thead>
                <tbody class="divide-y divide-gray-200">
                @foreach($subServices as $item)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4"><div class="font-medium">{{ $item->title }}</div><div class="text-sm text-gray-500">/{{ $item->slug }}</div></td>
                    <td class="px-6 py-4 text-sm">{{ $item->service->title }}</td>
                    <td class="px-6 py-4 text-sm">₹{{ number_format($item->starting_price, 2) }}</td>
                    <td class="px-6 py-4 text-sm">{{ $item->delivery_days }}</td>
                    <td class="px-6 py-4"><input type="checkbox" class="status-toggle rounded border-gray-300 text-blue-600" @checked($item->status) data-url="{{ route('admin.sub-services.toggle-status', $item) }}"></td>
                    <td class="px-6 py-4"><div class="flex gap-2">
                        <a href="{{ route('admin.sub-services.edit', $item) }}" class="text-indigo-600">Edit</a>
                        <form action="{{ route('admin.sub-services.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Delete?')">@csrf @method('DELETE')<button class="text-red-600">Delete</button></form>
                    </div></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 border-t">{{ $subServices->links() }}</div>
    </div>
</div>
@push('scripts')<script>document.querySelectorAll('.status-toggle').forEach(t=>t.addEventListener('change',function(){fetch(this.dataset.url,{method:'POST',headers:{'X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]').content,'Accept':'application/json'}})}));</script>@endpush
@endsection
