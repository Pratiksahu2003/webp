<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>Invoice {{ $order->order_number }}</title>
<style>body{font-family:Arial,sans-serif;color:#111;max-width:800px;margin:40px auto;padding:20px}table{width:100%;border-collapse:collapse;margin-top:20px}th,td{border:1px solid #ddd;padding:10px;text-align:left}.header{display:flex;justify-content:space-between;align-items:flex-start}.right{text-align:right}</style></head>
<body onload="window.print()">
@php $items = $order->lineItemsForDisplay(); @endphp
<div class="header">
    <div>
        <h1>{{ config('company.name') }}</h1>
        <p>{{ config('company.address.primary.full') }}</p>
    </div>
    <div class="right">
        <h2>INVOICE</h2>
        <p>{{ $order->order_number }}</p>
        <p>{{ $order->created_at->format('M d, Y') }}</p>
        <p>Status: {{ ucfirst($order->payment_status) }}</p>
    </div>
</div>
<p><strong>Bill To:</strong><br>
{{ $order->user->name }}<br>
{{ $order->user->email }}<br>
{{ $order->user->phone }}<br>
@if($order->user->company_name){{ $order->user->company_name }}<br>@endif
{{ $order->user->fullAddress() }}
</p>
@if($order->invoice_title)<p><strong>{{ $order->invoice_title }}</strong></p>@endif
<table>
    <thead>
        <tr>
            <th>Description</th>
            <th>Qty</th>
            <th>Rate</th>
            <th>Amount</th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
        <tr>
            <td>
                {{ $item['title'] }}
                @if($item['description'])<br><small>{{ $item['description'] }}</small>@endif
            </td>
            <td>{{ $item['quantity'] }}</td>
            <td>₹{{ number_format($item['rate'], 2) }}</td>
            <td>₹{{ number_format($item['amount'], 2) }}</td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th colspan="3">{{ $order->isPaid() ? 'Total Paid' : 'Total Due' }}</th>
            <th>₹{{ number_format($order->amount, 2) }}</th>
        </tr>
    </tfoot>
</table>
@if($order->notes)<p><strong>Notes:</strong><br>{{ $order->notes }}</p>@endif
@if($order->transaction_id)<p>Transaction ID: {{ $order->transaction_id }}</p>@endif
</body>
</html>
