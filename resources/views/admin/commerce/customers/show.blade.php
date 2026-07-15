@extends('layouts.admin')
@section('title', $customer->name.' - VanTroZ Admin')
@section('page-title', 'Client Details')
@section('content')
<div class="max-w-7xl mx-auto p-6">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">{{ $customer->name }}</h1>
            <p class="text-gray-600 mt-1">{{ $customer->email }}</p>
        </div>
        <div class="flex flex-wrap gap-2">
            <a href="{{ route('admin.customers.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">← Clients</a>
            <a href="{{ route('admin.customers.edit', $customer) }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">Edit</a>
            <a href="{{ route('admin.invoices.create', ['customer_id' => $customer->id]) }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Create Invoice</a>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-4 rounded-lg bg-green-50 border border-green-200 text-green-800 px-4 py-3">{{ session('success') }}</div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="bg-white rounded-xl border border-gray-200 p-6 space-y-2">
            <h2 class="font-semibold text-lg mb-3">Profile</h2>
            <p><span class="text-gray-500">Phone:</span> {{ $customer->phone ?? '—' }}</p>
            <p><span class="text-gray-500">Company:</span> {{ $customer->company_name ?? '—' }}</p>
            <p><span class="text-gray-500">Address:</span><br>{{ $customer->fullAddress() ?: '—' }}</p>
            <p class="text-sm text-gray-500 pt-2">Onboarded {{ $customer->created_at->format('M d, Y') }}</p>
        </div>

        <div class="lg:col-span-2 bg-white rounded-xl border border-gray-200 overflow-hidden">
            <div class="px-6 py-4 border-b flex justify-between items-center">
                <h2 class="font-semibold text-lg">Recent Invoices / Orders</h2>
            </div>
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Number</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Amount</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($customer->orders as $order)
                    <tr>
                        <td class="px-6 py-3 font-medium">{{ $order->order_number }}</td>
                        <td class="px-6 py-3">{{ $order->displayTitle() }}</td>
                        <td class="px-6 py-3">₹{{ number_format($order->amount, 2) }}</td>
                        <td class="px-6 py-3">{{ ucfirst($order->payment_status) }}</td>
                        <td class="px-6 py-3 text-right">
                            @if($order->source === 'admin')
                                <a href="{{ route('admin.invoices.show', $order) }}" class="text-blue-600">View</a>
                            @else
                                <a href="{{ route('admin.orders.show', $order) }}" class="text-blue-600">View</a>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-gray-500">No invoices yet.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
