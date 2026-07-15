<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tax Invoice {{ $order->order_number }}</title>
    <style>
        @page { margin: 28px 32px 36px; }
        * { box-sizing: border-box; }
        body {
            font-family: DejaVu Sans, sans-serif;
            color: #111827;
            font-size: 11px;
            line-height: 1.45;
            margin: 0;
            padding: 0;
        }
        table { width: 100%; border-collapse: collapse; }
        .text-muted { color: #6b7280; }
        .text-right { text-align: right; }
        .text-center { text-align: center; }
        .fw-700 { font-weight: 700; }
        .fw-600 { font-weight: 600; }
        .accent { color: #ff6b35; }
        .brand-bar {
            height: 4px;
            background: #ff6b35;
            margin-bottom: 18px;
        }
        .header-logo { width: 120px; height: auto; display: block; margin-bottom: 8px; }
        .title-block h1 {
            margin: 0;
            font-size: 22px;
            letter-spacing: 0.5px;
            color: #111827;
            text-transform: uppercase;
        }
        .title-block .inv-no {
            margin-top: 6px;
            font-size: 13px;
            font-weight: 700;
            color: #ff6b35;
        }
        .meta td { padding: 2px 0; vertical-align: top; }
        .meta .label { color: #6b7280; width: 110px; }
        .section-gap { margin-top: 16px; }
        .party-box {
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            padding: 10px 12px;
            vertical-align: top;
        }
        .party-box .heading {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #ff6b35;
            font-weight: 700;
            margin-bottom: 6px;
        }
        .items th {
            background: #111827;
            color: #ffffff;
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            padding: 8px 6px;
            border: 1px solid #111827;
            text-align: left;
        }
        .items th.num, .items td.num { text-align: right; }
        .items th.center, .items td.center { text-align: center; }
        .items td {
            border: 1px solid #e5e7eb;
            padding: 7px 6px;
            vertical-align: top;
        }
        .items tr:nth-child(even) td { background: #fafafa; }
        .desc-sub { display: block; color: #6b7280; font-size: 9px; margin-top: 2px; }
        .totals {
            width: 280px;
            margin-left: auto;
            margin-top: 12px;
        }
        .totals td {
            padding: 5px 0;
            border: none;
        }
        .totals .grand td {
            border-top: 2px solid #111827;
            padding-top: 8px;
            font-size: 13px;
            font-weight: 700;
        }
        .totals .grand .amount { color: #ff6b35; }
        .box {
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            padding: 10px 12px;
            margin-top: 14px;
        }
        .box .heading {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: #111827;
            font-weight: 700;
            margin-bottom: 4px;
        }
        .footer-note {
            margin-top: 22px;
            border-top: 1px dashed #d1d5db;
            padding-top: 12px;
            text-align: center;
        }
        .footer-note .system {
            font-size: 10px;
            color: #374151;
            font-weight: 600;
        }
        .footer-note .hint {
            margin-top: 4px;
            font-size: 9px;
            color: #9ca3af;
        }
        .badge {
            display: inline-block;
            padding: 2px 8px;
            border-radius: 999px;
            font-size: 9px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }
        .badge-paid { background: #ecfdf5; color: #047857; }
        .badge-pending { background: #fff7ed; color: #c2410c; }
        .badge-failed { background: #fff1f2; color: #be123c; }
        .badge-default { background: #f3f4f6; color: #374151; }
    </style>
</head>
<body>
@php
    $companyName = $company['legal_name'] ?? config('company.name');
    $tradeName = $company['trade_name'] ?? null;
    $status = strtolower((string) $order->payment_status);
    $badgeClass = match ($status) {
        'paid' => 'badge-paid',
        'pending', 'processing' => 'badge-pending',
        'failed', 'cancelled' => 'badge-failed',
        default => 'badge-default',
    };
@endphp

<div class="brand-bar"></div>

<table>
    <tr>
        <td style="width: 58%; vertical-align: top;">
            @if(!empty($logoPath))
                <img src="{{ $logoPath }}" alt="{{ $companyName }}" class="header-logo">
            @endif
            <div style="font-size: 15px; font-weight: 700; color: #111827;">{{ $companyName }}</div>
            @if($tradeName && $tradeName !== $companyName)
                <div class="text-muted" style="margin-top: 2px;">{{ $tradeName }}</div>
            @endif
            <div class="text-muted" style="margin-top: 6px; font-size: 10px;">
                {{ $companyAddress }}
            </div>
            <div class="text-muted" style="margin-top: 4px; font-size: 9px;">
                @if(!empty($company['gstin']))GSTIN: {{ $company['gstin'] }}@endif
                @if(!empty($company['pan'])) @if(!empty($company['gstin']))·@endif PAN: {{ $company['pan'] }}@endif
                @if(!empty($company['udyam'])) · Udyam: {{ $company['udyam'] }}@endif
                @if(!empty($company['cin'])) · CIN: {{ $company['cin'] }}@endif
            </div>
            <div class="text-muted" style="margin-top: 3px; font-size: 9px;">
                @if(!empty($company['email'])){{ $company['email'] }}@endif
                @if(!empty($company['phone'])) @if(!empty($company['email']))·@endif {{ $company['phone'] }}@endif
            </div>
        </td>
        <td style="width: 42%; vertical-align: top;" class="text-right title-block">
            <h1>Tax Invoice</h1>
            <div class="inv-no">{{ $order->order_number }}</div>
            <table class="meta" style="width: 100%; margin-top: 10px;">
                <tr>
                    <td class="label text-right">Date</td>
                    <td class="text-right fw-600">{{ $order->created_at->format('d M Y') }}</td>
                </tr>
                <tr>
                    <td class="label text-right">Status</td>
                    <td class="text-right">
                        <span class="badge {{ $badgeClass }}">{{ ucfirst($order->payment_status) }}</span>
                    </td>
                </tr>
                @if($order->place_of_supply)
                <tr>
                    <td class="label text-right">Supply</td>
                    <td class="text-right fw-600">{{ $order->place_of_supply }}</td>
                </tr>
                @endif
                <tr>
                    <td class="label text-right">Tax type</td>
                    <td class="text-right fw-600">{{ $order->is_interstate ? 'IGST' : 'CGST + SGST' }}</td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<table class="section-gap" style="margin-top: 18px;">
    <tr>
        <td class="party-box" style="width: 49%;">
            <div class="heading">Bill To</div>
            <div class="fw-700" style="font-size: 12px;">{{ $order->user->name }}</div>
            @if($order->user->company_name)
                <div>{{ $order->user->company_name }}</div>
            @endif
            <div class="text-muted" style="margin-top: 4px;">
                {{ $order->user->email }}<br>
                {{ $order->user->phone }}
            </div>
            <div style="margin-top: 4px;">{{ $order->user->fullAddress() }}</div>
            @if($order->buyer_gstin)
                <div style="margin-top: 4px;" class="fw-600">GSTIN: {{ $order->buyer_gstin }}</div>
            @endif
        </td>
        <td style="width: 2%;"></td>
        <td class="party-box" style="width: 49%;">
            <div class="heading">Invoice Summary</div>
            @if($order->invoice_title)
                <div class="fw-600" style="margin-bottom: 6px;">{{ $order->invoice_title }}</div>
            @endif
            <table class="meta" style="width: 100%;">
                <tr>
                    <td class="label">Taxable value</td>
                    <td class="text-right">Rs. {{ number_format($order->taxableSubtotal(), 2) }}</td>
                </tr>
                <tr>
                    <td class="label">GST</td>
                    <td class="text-right">Rs. {{ number_format((float) ($order->tax_amount ?? 0), 2) }}</td>
                </tr>
                <tr>
                    <td class="label fw-700" style="color:#111827;">{{ $order->isPaid() ? 'Total paid' : 'Total due' }}</td>
                    <td class="text-right fw-700 accent">Rs. {{ number_format($order->amount, 2) }}</td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<table class="items section-gap" style="margin-top: 18px;">
    <thead>
        <tr>
            <th style="width: 4%;" class="center">#</th>
            <th style="width: 32%;">Description</th>
            <th style="width: 10%;" class="center">HSN/SAC</th>
            <th style="width: 7%;" class="center">Qty</th>
            <th style="width: 11%;" class="num">Rate</th>
            <th style="width: 8%;" class="center">GST%</th>
            <th style="width: 12%;" class="num">Taxable</th>
            <th style="width: 16%;" class="num">Amount</th>
        </tr>
    </thead>
    <tbody>
        @forelse($items as $i => $item)
            <tr>
                <td class="center">{{ $i + 1 }}</td>
                <td>
                    {{ $item['title'] }}
                    @if(!empty($item['description']))
                        <span class="desc-sub">{{ $item['description'] }}</span>
                    @endif
                </td>
                <td class="center">{{ $item['hsn'] ?: '—' }}</td>
                <td class="center">{{ $item['quantity'] }}</td>
                <td class="num">{{ number_format($item['rate'], 2) }}</td>
                <td class="center">{{ number_format($item['gst_rate'], 2) }}%</td>
                <td class="num">{{ number_format($item['taxable_amount'], 2) }}</td>
                <td class="num fw-600">{{ number_format($item['amount'], 2) }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="8" class="text-center text-muted">No line items</td>
            </tr>
        @endforelse
    </tbody>
</table>

<table class="totals">
    <tr>
        <td class="text-muted">Taxable value</td>
        <td class="text-right">Rs. {{ number_format($order->taxableSubtotal(), 2) }}</td>
    </tr>
    @if($order->is_interstate)
        <tr>
            <td class="text-muted">IGST</td>
            <td class="text-right">Rs. {{ number_format((float) $order->igst_amount, 2) }}</td>
        </tr>
    @else
        <tr>
            <td class="text-muted">CGST</td>
            <td class="text-right">Rs. {{ number_format((float) $order->cgst_amount, 2) }}</td>
        </tr>
        <tr>
            <td class="text-muted">SGST</td>
            <td class="text-right">Rs. {{ number_format((float) $order->sgst_amount, 2) }}</td>
        </tr>
    @endif
    <tr class="grand">
        <td>{{ $order->isPaid() ? 'Total paid' : 'Total due' }}</td>
        <td class="text-right amount">Rs. {{ number_format($order->amount, 2) }}</td>
    </tr>
</table>

@if(!empty($company['bank_name']) || !empty($company['bank_account_number']))
<div class="box">
    <div class="heading">Bank details</div>
    <table class="meta">
        @if(!empty($company['bank_name']))
            <tr><td class="label">Bank</td><td>{{ $company['bank_name'] }}</td></tr>
        @endif
        @if(!empty($company['bank_account_name']))
            <tr><td class="label">A/c name</td><td>{{ $company['bank_account_name'] }}</td></tr>
        @endif
        @if(!empty($company['bank_account_number']))
            <tr><td class="label">A/c number</td><td>{{ $company['bank_account_number'] }}</td></tr>
        @endif
        @if(!empty($company['bank_ifsc']))
            <tr><td class="label">IFSC</td><td>{{ $company['bank_ifsc'] }}</td></tr>
        @endif
        @if(!empty($company['bank_branch']))
            <tr><td class="label">Branch</td><td>{{ $company['bank_branch'] }}</td></tr>
        @endif
    </table>
</div>
@endif

@if($order->notes)
<div class="box">
    <div class="heading">Notes</div>
    <div>{!! nl2br(e($order->notes)) !!}</div>
</div>
@endif

@if(!empty($company['invoice_terms']))
<div class="box">
    <div class="heading">Terms</div>
    <div class="text-muted">{{ $company['invoice_terms'] }}</div>
</div>
@endif

@if($order->transaction_id)
<p class="text-muted" style="margin-top: 10px; font-size: 9px;">Transaction ID: {{ $order->transaction_id }}</p>
@endif

<div class="footer-note">
    <div class="system">This is a system-generated invoice. No signature or stamp is required.</div>
    <div class="hint">Generated digitally by {{ $companyName }} · {{ now()->format('d M Y, H:i') }} IST</div>
</div>
</body>
</html>
