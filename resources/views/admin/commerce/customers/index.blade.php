@extends('layouts.admin')
@section('title', 'Clients - VanTroZ Admin')
@section('page-title', 'Clients')
@section('content')
<div class="max-w-7xl mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Clients</h1>
            <p class="text-gray-600 mt-1">Onboard and manage billable clients</p>
        </div>
        <a href="{{ route('admin.customers.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Onboard Client</a>
    </div>

    @if(session('success'))
        <div class="mb-4 rounded-lg bg-green-50 border border-green-200 text-green-800 px-4 py-3">{{ session('success') }}</div>
    @endif

    <div class="bg-white rounded-xl border border-gray-200 p-6 mb-6">
        <form class="flex flex-col md:flex-row gap-4">
            <input type="text" name="search" placeholder="Search name, email, company..." value="{{ request('search') }}" class="flex-1 border border-gray-300 rounded-lg px-3 py-2">
            <button class="px-4 py-2 bg-blue-600 text-white rounded-lg">Search</button>
        </form>
    </div>

    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Client</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Company</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Phone</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Invoices</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Joined</th>
                    <th class="px-6 py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($customers as $customer)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                        <div class="font-medium">{{ $customer->name }}</div>
                        <div class="text-sm text-gray-500">{{ $customer->email }}</div>
                    </td>
                    <td class="px-6 py-4 text-sm">{{ $customer->company_name ?? '—' }}</td>
                    <td class="px-6 py-4 text-sm">{{ $customer->phone ?? '—' }}</td>
                    <td class="px-6 py-4 text-sm">{{ $customer->orders_count }}</td>
                    <td class="px-6 py-4 text-sm">{{ $customer->created_at->format('M d, Y') }}</td>
                    <td class="px-6 py-4 text-right space-x-3">
                        <a href="{{ route('admin.customers.show', $customer) }}" class="text-blue-600">View</a>
                        <a href="{{ route('admin.invoices.create', ['customer_id' => $customer->id]) }}" class="text-green-600">Invoice</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-10 text-center text-gray-500">No clients yet. <a href="{{ route('admin.customers.create') }}" class="text-blue-600">Onboard your first client</a>.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="px-6 py-4 border-t">{{ $customers->links() }}</div>
    </div>
</div>
@endsection
