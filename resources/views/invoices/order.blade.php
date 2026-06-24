<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>Invoice {{ $order->order_number }}</title>
<style>body{font-family:Arial,sans-serif;color:#111;max-width:800px;margin:40px auto;padding:20px}table{width:100%;border-collapse:collapse;margin-top:20px}th,td{border:1px solid #ddd;padding:10px;text-align:left}.header{display:flex;justify-content:space-between;align-items:flex-start}</style></head>
<body onload="window.print()">
<div class="header"><div><h1>{{ config('company.name') }}</h1><p>{{ config('company.address.primary.full') }}</p></div><div><h2>INVOICE</h2><p>{{ $order->order_number }}</p><p>{{ $order->created_at->format('M d, Y') }}</p></div></div>
<p><strong>Bill To:</strong><br>{{ $order->user->name }}<br>{{ $order->user->email }}<br>{{ $order->user->phone }}<br>{{ $order->user->fullAddress() }}</p>
<table><thead><tr><th>Description</th><th>Amount</th></tr></thead>
<tbody><tr><td>{{ $order->service->title }} — {{ $order->subService->title }} ({{ $order->package->package_name }})</td><td>₹{{ number_format($order->amount,2) }}</td></tr></tbody>
<tfoot><tr><th>Total Paid</th><th>₹{{ number_format($order->amount,2) }}</th></tr></tfoot></table>
<p>Transaction ID: {{ $order->transaction_id ?? 'N/A' }}</p>
</body></html>
