@extends('layouts.admin')
@section('title', 'Orders - VanTroZ Admin')
@section('page-title', 'Orders')
@section('content')
<div class="max-w-7xl mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <div><h1 class="text-2xl font-bold text-gray-900">Orders</h1><p class="text-gray-600 mt-1">Manage customer orders and payments</p></div>
        <a href="{{ route('admin.orders.export', request()->query()) }}" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">Export CSV</a>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mb-6">
        @foreach(['pending'=>'yellow','paid'=>'green','failed'=>'red','refunded'=>'blue','cancelled'=>'gray'] as $status => $color)
        <div class="zoho-stat-card"><div class="text-sm text-gray-500 uppercase">{{ $status }}</div><div class="text-2xl font-bold">{{ $stats[$status] ?? 0 }}</div></div>
        @endforeach
    </div>
    <div class="bg-white rounded-xl border border-gray-200 p-6 mb-6">
        <form class="flex flex-col md:flex-row gap-4">
            <input type="text" name="search" placeholder="Search order, customer..." value="{{ request('search') }}" class="flex-1 border border-gray-300 rounded-lg px-3 py-2">
            <select name="payment_status" class="border border-gray-300 rounded-lg px-3 py-2">
                <option value="">All statuses</option>
                @foreach(\App\Models\Order::PAYMENT_STATUSES as $s)
                <option value="{{ $s }}" @selected(request('payment_status')==$s)>{{ ucfirst($s) }}</option>
                @endforeach
            </select>
            <button class="px-4 py-2 bg-blue-600 text-white rounded-lg">Filter</button>
        </form>
    </div>
    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200"><thead class="bg-gray-50"><tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Order</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Customer</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Package</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Amount</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
            <th class="px-6 py-3"></th>
        </tr></thead><tbody class="divide-y divide-gray-200">@foreach($orders as $order)<tr class="hover:bg-gray-50">
            <td class="px-6 py-4 font-medium">{{ $order->order_number }}</td>
            <td class="px-6 py-4"><div>{{ $order->user->name }}</div><div class="text-sm text-gray-500">{{ $order->user->email }}</div></td>
            <td class="px-6 py-4 text-sm">{{ $order->subService->title }} / {{ $order->package->package_name }}</td>
            <td class="px-6 py-4 text-sm">₹{{ number_format($order->amount,2) }}</td>
            <td class="px-6 py-4"><span class="px-2 py-1 text-xs rounded-full bg-gray-100">{{ ucfirst($order->payment_status) }}</span></td>
            <td class="px-6 py-4 text-sm">{{ $order->created_at->format('M d, Y') }}</td>
            <td class="px-6 py-4"><a href="{{ route('admin.orders.show', $order) }}" class="text-blue-600">View</a></td>
        </tr>@endforeach</tbody></table>
        <div class="px-6 py-4 border-t">{{ $orders->links() }}</div>
    </div>
</div>
@endsection
