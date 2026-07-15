@extends('layouts.admin')
@section('title', 'Invoices - VanTroZ Admin')
@section('page-title', 'Invoices')
@section('content')
<div class="max-w-7xl mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Invoices</h1>
            <p class="text-gray-600 mt-1">Create invoices and send payment links to clients</p>
        </div>
        <a href="{{ route('admin.invoices.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Create Invoice</a>
    </div>

    @if(session('success'))
        <div class="mb-4 rounded-lg bg-green-50 border border-green-200 text-green-800 px-4 py-3">{{ session('success') }}</div>
    @endif

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
        @foreach(['pending'=>'yellow','processing'=>'blue','paid'=>'green','failed'=>'red'] as $status => $color)
        <div class="zoho-stat-card">
            <div class="text-sm text-gray-500 uppercase">{{ $status }}</div>
            <div class="text-2xl font-bold">{{ $stats[$status] ?? 0 }}</div>
        </div>
        @endforeach
    </div>

    <div class="bg-white rounded-xl border border-gray-200 p-6 mb-6">
        <form class="flex flex-col md:flex-row gap-4">
            <input type="text" name="search" placeholder="Search invoice, client..." value="{{ request('search') }}" class="flex-1 border border-gray-300 rounded-lg px-3 py-2">
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
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Invoice</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Client</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Amount</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Sent</th>
                    <th class="px-6 py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($invoices as $invoice)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 font-medium">{{ $invoice->order_number }}</td>
                    <td class="px-6 py-4">
                        <div>{{ $invoice->user->name }}</div>
                        <div class="text-sm text-gray-500">{{ $invoice->user->email }}</div>
                    </td>
                    <td class="px-6 py-4 text-sm">{{ $invoice->displayTitle() }}</td>
                    <td class="px-6 py-4 text-sm">₹{{ number_format($invoice->amount, 2) }}</td>
                    <td class="px-6 py-4"><span class="px-2 py-1 text-xs rounded-full bg-gray-100">{{ ucfirst($invoice->payment_status) }}</span></td>
                    <td class="px-6 py-4 text-sm">{{ $invoice->invoice_sent_at?->format('M d, Y') ?? '—' }}</td>
                    <td class="px-6 py-4"><a href="{{ route('admin.invoices.show', $invoice) }}" class="text-blue-600">View</a></td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-10 text-center text-gray-500">No invoices yet. <a href="{{ route('admin.invoices.create') }}" class="text-blue-600">Create one</a>.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="px-6 py-4 border-t">{{ $invoices->links() }}</div>
    </div>
</div>
@endsection
