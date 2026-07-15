<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Tax Invoice {{ $order->order_number }}</title>
<style>
    body{font-family:DejaVu Sans,Arial,sans-serif;color:#111;max-width:900px;margin:24px auto;padding:16px;font-size:13px;line-height:1.45}
    h1,h2,h3{margin:0}
    table{width:100%;border-collapse:collapse;margin-top:14px}
    th,td{border:1px solid #ccc;padding:8px;text-align:left;vertical-align:top}
    th{background:#f5f5f5}
    .muted{color:#555}
    .right{text-align:right}
    .header{display:flex;justify-content:space-between;gap:24px;border-bottom:2px solid #222;padding-bottom:12px}
    .grid-2{display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-top:16px}
    .box{border:1px solid #ddd;padding:10px;border-radius:4px}
    .totals td{border:none;padding:4px 8px}
    .totals tr.grand td{font-weight:bold;border-top:2px solid #222;padding-top:8px}
    .small{font-size:11px}
    @media print{body{margin:0;padding:8px}}
</style>
</head>
<body onload="window.print()">
@php
    $company = $company ?? app(\App\Services\CompanyProfileService::class)->all();
    $items = $order->lineItemsForDisplay();
    $companyName = $company['legal_name'] ?? config('company.name');
    $companyAddress = app(\App\Services\CompanyProfileService::class)->fullAddress();
@endphp

<div class="header">
    <div>
        <h1>{{ $companyName }}</h1>
        @if(!empty($company['trade_name']) && ($company['trade_name'] !== $companyName))
            <p class="muted">{{ $company['trade_name'] }}</p>
        @endif
        <p class="muted">{{ $companyAddress }}</p>
        <p class="small muted">
            @if(!empty($company['gstin'])) GSTIN: {{ $company['gstin'] }} @endif
            @if(!empty($company['pan'])) | PAN: {{ $company['pan'] }} @endif
            @if(!empty($company['udyam'])) | Udyam: {{ $company['udyam'] }} @endif
            @if(!empty($company['cin'])) | CIN: {{ $company['cin'] }} @endif
        </p>
        <p class="small muted">
            @if(!empty($company['email'])) {{ $company['email'] }} @endif
            @if(!empty($company['phone'])) | {{ $company['phone'] }} @endif
        </p>
    </div>
    <div class="right">
        <h2>TAX INVOICE</h2>
        <p><strong>{{ $order->order_number }}</strong></p>
        <p>{{ $order->created_at->format('d M Y') }}</p>
        <p>Status: {{ ucfirst($order->payment_status) }}</p>
        @if($order->place_of_supply)
            <p>Place of supply: {{ $order->place_of_supply }}</p>
        @endif
    </div>
</div>

<div class="grid-2">
    <div class="box">
        <strong>Bill To</strong>
        <p>
            {{ $order->user->name }}<br>
            @if($order->user->company_name){{ $order->user->company_name }}<br>@endif
            {{ $order->user->email }}<br>
            {{ $order->user->phone }}<br>
            {{ $order->user->fullAddress() }}
            @if($order->buyer_gstin)<br>GSTIN: {{ $order->buyer_gstin }}@endif
        </p>
    </div>
    <div class="box">
        <strong>Invoice summary</strong>
        <p>
            @if($order->invoice_title){{ $order->invoice_title }}<br>@endif
            Taxable value: ₹{{ number_format($order->taxableSubtotal(), 2) }}<br>
            GST: ₹{{ number_format((float) ($order->tax_amount ?? 0), 2) }}<br>
            <strong>Total payable: ₹{{ number_format($order->amount, 2) }}</strong>
        </p>
    </div>
</div>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Description</th>
            <th>HSN/SAC</th>
            <th>Qty</th>
            <th>Rate</th>
            <th>GST %</th>
            <th>Taxable</th>
            <th>Tax</th>
            <th>Amount</th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $i => $item)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>
                {{ $item['title'] }}
                @if($item['description'])<br><span class="small muted">{{ $item['description'] }}</span>@endif
            </td>
            <td>{{ $item['hsn'] ?: '—' }}</td>
            <td>{{ $item['quantity'] }}</td>
            <td>₹{{ number_format($item['rate'], 2) }}</td>
            <td>{{ number_format($item['gst_rate'], 2) }}%</td>
            <td>₹{{ number_format($item['taxable_amount'], 2) }}</td>
            <td>₹{{ number_format($item['tax_amount'], 2) }}</td>
            <td>₹{{ number_format($item['amount'], 2) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<table class="totals" style="width:360px;margin-left:auto;margin-top:12px;border:none">
    <tr>
        <td class="right muted">Taxable value</td>
        <td class="right">₹{{ number_format($order->taxableSubtotal(), 2) }}</td>
    </tr>
    @if($order->is_interstate)
        <tr>
            <td class="right muted">IGST</td>
            <td class="right">₹{{ number_format((float) $order->igst_amount, 2) }}</td>
        </tr>
    @else
        <tr>
            <td class="right muted">CGST</td>
            <td class="right">₹{{ number_format((float) $order->cgst_amount, 2) }}</td>
        </tr>
        <tr>
            <td class="right muted">SGST</td>
            <td class="right">₹{{ number_format((float) $order->sgst_amount, 2) }}</td>
        </tr>
    @endif
    <tr class="grand">
        <td class="right">{{ $order->isPaid() ? 'Total paid' : 'Total due' }}</td>
        <td class="right">₹{{ number_format($order->amount, 2) }}</td>
    </tr>
</table>

@if(!empty($company['bank_name']) || !empty($company['bank_account_number']))
<div class="box" style="margin-top:18px">
    <strong>Bank details</strong>
    <p class="small">
        @if(!empty($company['bank_name'])) Bank: {{ $company['bank_name'] }}<br>@endif
        @if(!empty($company['bank_account_name'])) A/c name: {{ $company['bank_account_name'] }}<br>@endif
        @if(!empty($company['bank_account_number'])) A/c no: {{ $company['bank_account_number'] }}<br>@endif
        @if(!empty($company['bank_ifsc'])) IFSC: {{ $company['bank_ifsc'] }}<br>@endif
        @if(!empty($company['bank_branch'])) Branch: {{ $company['bank_branch'] }}@endif
    </p>
</div>
@endif

@if($order->notes)
<p style="margin-top:14px"><strong>Notes:</strong><br>{{ $order->notes }}</p>
@endif

@if(!empty($company['invoice_terms']))
<p class="small muted" style="margin-top:14px"><strong>Terms:</strong> {{ $company['invoice_terms'] }}</p>
@endif

@if($order->transaction_id)
<p class="small muted">Transaction ID: {{ $order->transaction_id }}</p>
@endif
</body>
</html>
