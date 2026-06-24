@extends('layouts.admin')

@section('title', 'Services - VanTroZ Admin')
@section('page-title', 'Services')

@section('content')
<div class="max-w-7xl mx-auto p-6">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Services</h1>
            <p class="text-gray-600 mt-1">Manage main service offerings</p>
        </div>
        <a href="{{ route('admin.services.create') }}" class="mt-4 sm:mt-0 inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            Add Service
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
        <form class="flex flex-col sm:flex-row gap-4">
            <input type="text" name="search" placeholder="Search services..." value="{{ request('search') }}" class="flex-1 border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500">
            <select name="status" class="border border-gray-300 rounded-lg px-3 py-2">
                <option value="">All Status</option>
                <option value="1" @selected(request('status')==='1')>Active</option>
                <option value="0" @selected(request('status')==='0')>Inactive</option>
            </select>
            <button class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">Filter</button>
        </form>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Service</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Category</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Sort</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($services as $service)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                @if($service->icon)<img src="{{ Storage::url($service->icon) }}" class="w-8 h-8 rounded" alt="">@endif
                                <div>
                                    <div class="font-medium text-gray-900">{{ $service->title }}</div>
                                    <div class="text-sm text-gray-500">/{{ $service->slug }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $service->category->title ?? '—' }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $service->sort_order }}</td>
                        <td class="px-6 py-4">
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="status-toggle sr-only peer" @checked($service->status) data-url="{{ route('admin.services.toggle-status', $service) }}">
                                <div class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-checked:bg-blue-600 after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:after:translate-x-full"></div>
                            </label>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.services.edit', $service) }}" class="text-indigo-600 hover:text-indigo-900"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg></a>
                                <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="inline" onsubmit="return confirm('Delete this service?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 border-t border-gray-200">{{ $services->links() }}</div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.status-toggle').forEach(function (toggle) {
        toggle.addEventListener('change', function () {
            fetch(this.dataset.url, {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content, 'Accept': 'application/json' },
            }).catch(function () { alert('Failed to update status'); });
        });
    });
});
</script>
@endpush
@endsection
