@extends('layouts.admin')
@section('title', 'Packages - VanTroZ Admin')
@section('page-title', 'Packages')
@section('content')
<div class="max-w-7xl mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <div><h1 class="text-2xl font-bold text-gray-900">Packages</h1></div>
        <a href="{{ route('admin.packages.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Add Package</a>
    </div>
    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50"><tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Package</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Sub Service</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Price</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Badge</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
            </tr></thead>
            <tbody class="divide-y divide-gray-200">@foreach($packages as $package)<tr class="hover:bg-gray-50">
                <td class="px-6 py-4 font-medium">{{ $package->package_name }}</td>
                <td class="px-6 py-4 text-sm">{{ $package->subService->title }}</td>
                <td class="px-6 py-4 text-sm">@if($package->hasDiscount())<span class="line-through text-gray-400">₹{{ number_format($package->price,2) }}</span> ₹{{ number_format($package->sale_price,2) }}@else ₹{{ number_format($package->price,2) }}@endif</td>
                <td class="px-6 py-4">@if($package->badge)<span class="px-2 py-1 text-xs bg-blue-100 text-blue-800 rounded-full">{{ $package->badge }}</span>@endif</td>
                <td class="px-6 py-4"><input type="checkbox" class="status-toggle rounded border-gray-300 text-blue-600" @checked($package->status) data-url="{{ route('admin.packages.toggle-status', $package) }}"></td>
                <td class="px-6 py-4 flex gap-2"><a href="{{ route('admin.packages.edit', $package) }}" class="text-indigo-600">Edit</a><form action="{{ route('admin.packages.destroy', $package) }}" method="POST" onsubmit="return confirm('Delete?')">@csrf @method('DELETE')<button class="text-red-600">Delete</button></form></td>
            </tr>@endforeach</tbody>
        </table>
        <div class="px-6 py-4 border-t">{{ $packages->links() }}</div>
    </div>
</div>
@push('scripts')<script>document.querySelectorAll('.status-toggle').forEach(t=>t.addEventListener('change',function(){fetch(this.dataset.url,{method:'POST',headers:{'X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]').content,'Accept':'application/json'}})}));</script>@endpush
@endsection
