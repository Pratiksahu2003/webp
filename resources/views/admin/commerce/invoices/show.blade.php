@extends('layouts.admin')
@section('title', 'Invoice '.$invoice->order_number.' - VanTroZ Admin')
@section('page-title', 'Invoice Details')
@section('content')
<div class="max-w-7xl mx-auto p-6">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Invoice {{ $invoice->order_number }}</h1>
            <p class="text-gray-600 mt-1">{{ $invoice->displayTitle() }}</p>
        </div>
        <a href="{{ route('admin.invoices.index') }}" class="text-gray-600">← Back to Invoices</a>
    </div>

    @if(session('success'))
        <div class="mb-4 rounded-lg bg-green-50 border border-green-200 text-green-800 px-4 py-3">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="mb-4 rounded-lg bg-red-50 border border-red-200 text-red-800 px-4 py-3">{{ session('error') }}</div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-xl border border-gray-200 p-6">
                <h2 class="font-semibold text-lg mb-4">Line Items</h2>
                <table class="min-w-full text-sm">
                    <thead>
                        <tr class="border-b text-left text-gray-500">
                            <th class="py-2 pr-3">Description</th>
                            <th class="py-2 pr-3">HSN</th>
                            <th class="py-2 pr-3">Qty</th>
                            <th class="py-2 pr-3">Rate</th>
                            <th class="py-2 pr-3">GST%</th>
                            <th class="py-2">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($invoice->lineItemsForDisplay() as $item)
                        <tr class="border-b">
                            <td class="py-3 pr-3">
                                <div class="font-medium">{{ $item['title'] }}</div>
                                @if($item['description'])
                                    <div class="text-gray-500">{{ $item['description'] }}</div>
                                @endif
                            </td>
                            <td class="py-3 pr-3">{{ $item['hsn'] ?: '—' }}</td>
                            <td class="py-3 pr-3">{{ $item['quantity'] }}</td>
                            <td class="py-3 pr-3">₹{{ number_format($item['rate'], 2) }}</td>
                            <td class="py-3 pr-3">{{ number_format($item['gst_rate'], 2) }}%</td>
                            <td class="py-3">₹{{ number_format($item['amount'], 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="5" class="pt-3 text-left font-normal text-gray-500">Taxable</th>
                            <th class="pt-3 text-left">₹{{ number_format($invoice->taxableSubtotal(), 2) }}</th>
                        </tr>
                        @if($invoice->is_interstate)
                        <tr>
                            <th colspan="5" class="text-left font-normal text-gray-500">IGST</th>
                            <th class="text-left">₹{{ number_format((float) $invoice->igst_amount, 2) }}</th>
                        </tr>
                        @else
                        <tr>
                            <th colspan="5" class="text-left font-normal text-gray-500">CGST</th>
                            <th class="text-left">₹{{ number_format((float) $invoice->cgst_amount, 2) }}</th>
                        </tr>
                        <tr>
                            <th colspan="5" class="text-left font-normal text-gray-500">SGST</th>
                            <th class="text-left">₹{{ number_format((float) $invoice->sgst_amount, 2) }}</th>
                        </tr>
                        @endif
                        <tr>
                            <th colspan="5" class="pt-2 text-left">Grand total</th>
                            <th class="pt-2 text-left">₹{{ number_format($invoice->amount, 2) }}</th>
                        </tr>
                    </tfoot>
                </table>
                @if($invoice->notes)
                    <div class="mt-4 pt-4 border-t">
                        <p class="text-sm text-gray-500 mb-1">Notes</p>
                        <p class="text-sm whitespace-pre-line">{{ $invoice->notes }}</p>
                    </div>
                @endif
            </div>

            <div class="bg-white rounded-xl border border-gray-200 p-6">
                <h2 class="font-semibold text-lg mb-4">Payment Transactions</h2>
                @if($invoice->transactions->isEmpty())
                    <p class="text-gray-500">No transactions yet.</p>
                @else
                    <table class="min-w-full text-sm">
                        <thead>
                            <tr class="border-b">
                                <th class="text-left py-2">Transaction ID</th>
                                <th class="text-left py-2">Status</th>
                                <th class="text-left py-2">Amount</th>
                                <th class="text-left py-2">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($invoice->transactions as $txn)
                            <tr class="border-b">
                                <td class="py-2">{{ $txn->transaction_id ?? '—' }}</td>
                                <td class="py-2">{{ ucfirst($txn->payment_status) }}</td>
                                <td class="py-2">₹{{ number_format($txn->amount, 2) }}</td>
                                <td class="py-2">{{ $txn->created_at->format('M d, Y H:i') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-white rounded-xl border border-gray-200 p-6 space-y-2">
                <h2 class="font-semibold mb-3">Status</h2>
                <p><span class="text-gray-500">Payment:</span> <strong>{{ ucfirst($invoice->payment_status) }}</strong></p>
                <p><span class="text-gray-500">Created:</span> {{ $invoice->created_at->format('M d, Y H:i') }}</p>
                <p><span class="text-gray-500">Sent:</span> {{ $invoice->invoice_sent_at?->format('M d, Y H:i') ?? 'Not sent' }}</p>
                <p><span class="text-gray-500">Paid at:</span> {{ $invoice->paid_at?->format('M d, Y H:i') ?? '—' }}</p>
                <p><span class="text-gray-500">Transaction:</span> {{ $invoice->transaction_id ?? '—' }}</p>
            </div>

            <div class="bg-white rounded-xl border border-gray-200 p-6">
                <h2 class="font-semibold mb-3">Client</h2>
                <p class="font-medium">{{ $invoice->user->name }}</p>
                <p class="text-sm text-gray-600">{{ $invoice->user->email }}</p>
                <p class="text-sm text-gray-600">{{ $invoice->user->phone }}</p>
                <a href="{{ route('admin.customers.show', $invoice->user) }}" class="inline-block mt-3 text-sm text-blue-600">View client →</a>
            </div>

            <div class="bg-white rounded-xl border border-gray-200 p-6 space-y-3">
                <h2 class="font-semibold mb-1">Actions</h2>
                <a href="{{ $invoiceUrl }}" target="_blank" class="block w-full text-center px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">View Invoice</a>

                @if($paymentUrl)
                    <div>
                        <label class="block text-xs text-gray-500 mb-1">Payment link</label>
                        <input type="text" readonly value="{{ $paymentUrl }}" class="w-full text-xs border border-gray-300 rounded-lg px-2 py-2 bg-gray-50" onclick="this.select()">
                    </div>
                    <form method="POST" action="{{ route('admin.invoices.send', $invoice) }}">
                        @csrf
                        <button class="w-full px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                            {{ $invoice->invoice_sent_at ? 'Resend Invoice Email' : 'Send Invoice Email' }}
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
