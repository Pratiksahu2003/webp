@extends('layouts.admin')
@section('title', 'Technologies - VanTroZ Admin')
@section('page-title', 'Technologies')
@section('content')
<div class="max-w-7xl mx-auto p-6">
    <div class="flex justify-between items-center mb-6"><h1 class="text-2xl font-bold">Technologies</h1><a href="{{ route('admin.technologies.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Add Technology</a></div>
    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200"><thead class="bg-gray-50"><tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Logo</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Type</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
        </tr></thead><tbody class="divide-y divide-gray-200">@foreach($technologies as $tech)<tr class="hover:bg-gray-50">
            <td class="px-6 py-4">
                @if($tech->displayIconUrl())
                    <img src="{{ $tech->displayIconUrl() }}" alt="{{ $tech->name }}" class="w-10 h-10 rounded-lg object-contain border border-gray-100 bg-white">
                @elseif($tech->icon)
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-lg bg-gray-100 text-xl">{{ $tech->icon }}</span>
                @else
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-lg bg-gray-100 text-gray-400 text-xs">—</span>
                @endif
            </td>
            <td class="px-6 py-4"><span class="font-medium">{{ $tech->name }}</span></td>
            <td class="px-6 py-4 text-sm">{{ $tech->technology_type ?? $tech->category }}</td>
            <td class="px-6 py-4"><input type="checkbox" class="status-toggle rounded border-gray-300 text-blue-600" @checked($tech->status ?? $tech->is_active) data-url="{{ route('admin.technologies.toggle-status', $tech) }}"></td>
            <td class="px-6 py-4 flex gap-2"><a href="{{ route('admin.technologies.edit', $tech) }}" class="text-indigo-600">Edit</a><form action="{{ route('admin.technologies.destroy', $tech) }}" method="POST" onsubmit="return confirm('Delete?')">@csrf @method('DELETE')<button class="text-red-600">Delete</button></form></td>
        </tr>@endforeach</tbody></table>
        <div class="px-6 py-4 border-t">{{ $technologies->links() }}</div>
    </div>
</div>
@push('scripts')<script>document.querySelectorAll('.status-toggle').forEach(t=>t.addEventListener('change',function(){fetch(this.dataset.url,{method:'POST',headers:{'X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]').content,'Accept':'application/json'}})}));</script>@endpush
@endsection
