<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tax Invoice {{ $order->order_number }}</title>
    <style>
        @page { margin: 16px 18px 18px; size: A4 portrait; }
        * { box-sizing: border-box; }
        body {
            font-family: DejaVu Sans, sans-serif;
            color: #111827;
            font-size: 9px;
            line-height: 1.3;
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
            height: 3px;
            background: #ff6b35;
            margin-bottom: 8px;
        }
        .header-logo { width: 78px; height: auto; display: block; margin-bottom: 4px; }
        .title-block h1 {
            margin: 0;
            font-size: 15px;
            letter-spacing: 0.4px;
            color: #111827;
            text-transform: uppercase;
        }
        .title-block .inv-no {
            margin-top: 2px;
            font-size: 10px;
            font-weight: 700;
            color: #ff6b35;
        }
        .meta td { padding: 1px 0; vertical-align: top; }
        .meta .label { color: #6b7280; width: 88px; }
        .party-box {
            border: 1px solid #e5e7eb;
            padding: 6px 8px;
            vertical-align: top;
        }
        .party-box .heading {
            font-size: 8px;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: #ff6b35;
            font-weight: 700;
            margin-bottom: 3px;
        }
        .items th {
            background: #111827;
            color: #ffffff;
            font-size: 7.5px;
            text-transform: uppercase;
            letter-spacing: 0.03em;
            padding: 4px 4px;
            border: 1px solid #111827;
            text-align: left;
        }
        .items th.num, .items td.num { text-align: right; }
        .items th.center, .items td.center { text-align: center; }
        .items td {
            border: 1px solid #e5e7eb;
            padding: 4px;
            vertical-align: top;
            font-size: 8.5px;
        }
        .items tr:nth-child(even) td { background: #fafafa; }
        .desc-sub { display: block; color: #6b7280; font-size: 7.5px; margin-top: 1px; }
        .totals {
            width: 240px;
            margin-left: auto;
            margin-top: 6px;
        }
        .totals td {
            padding: 2px 0;
            border: none;
            font-size: 9px;
        }
        .totals .grand td {
            border-top: 1.5px solid #111827;
            padding-top: 4px;
            font-size: 11px;
            font-weight: 700;
        }
        .totals .grand .amount { color: #ff6b35; }
        .legal-wrap {
            margin-top: 8px;
            border-top: 1px solid #e5e7eb;
            padding-top: 6px;
        }
        .legal-box {
            border: 1px solid #e5e7eb;
            padding: 5px 7px;
            vertical-align: top;
        }
        .legal-box .heading {
            font-size: 7.5px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #111827;
            font-weight: 700;
            margin-bottom: 2px;
        }
        .footer-note {
            margin-top: 8px;
            border-top: 1px dashed #d1d5db;
            padding-top: 6px;
            text-align: center;
        }
        .footer-note .system {
            font-size: 8px;
            color: #374151;
            font-weight: 600;
        }
        .footer-note .hint {
            margin-top: 2px;
            font-size: 7.5px;
            color: #9ca3af;
        }
        .badge {
            display: inline-block;
            padding: 1px 6px;
            border-radius: 999px;
            font-size: 7.5px;
            font-weight: 700;
            text-transform: uppercase;
        }
        .badge-paid { background: #ecfdf5; color: #047857; }
        .badge-pending { background: #fff7ed; color: #c2410c; }
        .badge-failed { background: #fff1f2; color: #be123c; }
        .badge-default { background: #f3f4f6; color: #374151; }
        .no-break { page-break-inside: avoid; }
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
    $notesText = filled($order->notes) ? \Illuminate\Support\Str::limit(trim((string) $order->notes), 220) : null;
    $termsText = ! empty($company['invoice_terms'])
        ? \Illuminate\Support\Str::limit(trim((string) $company['invoice_terms']), 260)
        : null;
    $hasBank = ! empty($company['bank_name']) || ! empty($company['bank_account_number']);
@endphp

<div class="no-break">
<div class="brand-bar"></div>

<table>
    <tr>
        <td style="width: 58%; vertical-align: top;">
            @if(!empty($logoPath))
                <img src="{{ $logoPath }}" alt="{{ $companyName }}" class="header-logo">
            @endif
            <div style="font-size: 12px; font-weight: 700; color: #111827;">{{ $companyName }}</div>
            @if($tradeName && $tradeName !== $companyName)
                <div class="text-muted" style="margin-top: 1px; font-size: 8px;">{{ $tradeName }}</div>
            @endif
            <div class="text-muted" style="margin-top: 3px; font-size: 8px;">{{ $companyAddress }}</div>
            <div class="text-muted" style="margin-top: 2px; font-size: 7.5px;">
                @if(!empty($company['gstin']))GSTIN: {{ $company['gstin'] }}@endif
                @if(!empty($company['pan'])) @if(!empty($company['gstin'])) · @endif PAN: {{ $company['pan'] }}@endif
                @if(!empty($company['udyam'])) · Udyam: {{ $company['udyam'] }}@endif
                @if(!empty($company['cin'])) · CIN: {{ $company['cin'] }}@endif
            </div>
            <div class="text-muted" style="margin-top: 1px; font-size: 7.5px;">
                @if(!empty($company['email'])){{ $company['email'] }}@endif
                @if(!empty($company['phone'])) @if(!empty($company['email'])) · @endif {{ $company['phone'] }}@endif
            </div>
        </td>
        <td style="width: 42%; vertical-align: top;" class="text-right title-block">
            <h1>Tax Invoice</h1>
            <div class="inv-no">{{ $order->order_number }}</div>
            <table class="meta" style="width: 100%; margin-top: 4px;">
                <tr>
                    <td class="label text-right">Date</td>
                    <td class="text-right fw-600">{{ $order->invoiceDate()->format('d M Y') }}</td>
                </tr>
                <tr>
                    <td class="label text-right">Status</td>
                    <td class="text-right"><span class="badge {{ $badgeClass }}">{{ ucfirst($order->payment_status) }}</span></td>
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
                @if($order->invoice_title)
                <tr>
                    <td class="label text-right">Title</td>
                    <td class="text-right fw-600">{{ \Illuminate\Support\Str::limit($order->invoice_title, 40) }}</td>
                </tr>
                @endif
            </table>
        </td>
    </tr>
</table>

<table style="margin-top: 8px;">
    <tr>
        <td class="party-box" style="width: 100%;">
            <div class="heading">Bill To</div>
            <div class="fw-700" style="font-size: 10px;">
                {{ $order->user->name }}
                @if($order->user->company_name)
                    <span class="text-muted fw-600"> · {{ $order->user->company_name }}</span>
                @endif
            </div>
            <div class="text-muted" style="margin-top: 2px; font-size: 8px;">
                {{ $order->user->email }}
                @if($order->user->phone) · {{ $order->user->phone }}@endif
                @if($order->buyer_gstin) · GSTIN: <span class="fw-600" style="color:#111827">{{ $order->buyer_gstin }}</span>@endif
            </div>
            <div style="margin-top: 2px; font-size: 8px;">{{ $order->user->fullAddress() }}</div>
        </td>
    </tr>
</table>

<table class="items" style="margin-top: 8px;">
    <thead>
        <tr>
            <th style="width: 4%;" class="center">#</th>
            <th style="width: 34%;">Description</th>
            <th style="width: 10%;" class="center">HSN/SAC</th>
            <th style="width: 7%;" class="center">Qty</th>
            <th style="width: 11%;" class="num">Rate</th>
            <th style="width: 8%;" class="center">GST%</th>
            <th style="width: 12%;" class="num">Taxable</th>
            <th style="width: 14%;" class="num">Amount</th>
        </tr>
    </thead>
    <tbody>
        @forelse($items as $i => $item)
            <tr>
                <td class="center">{{ $i + 1 }}</td>
                <td>
                    {{ $item['title'] }}
                    @if(!empty($item['description']))
                        <span class="desc-sub">{{ \Illuminate\Support\Str::limit($item['description'], 90) }}</span>
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

<div class="legal-wrap">
    <table>
        <tr>
            @if($hasBank)
            <td class="legal-box" style="width: {{ ($termsText || $notesText) ? '48%' : '100%' }};">
                <div class="heading">Bank details</div>
                <div class="text-muted" style="font-size: 7.5px; line-height: 1.35;">
                    @if(!empty($company['bank_name'])){{ $company['bank_name'] }}@endif
                    @if(!empty($company['bank_account_name'])) · {{ $company['bank_account_name'] }}@endif
                    @if(!empty($company['bank_account_number'])) · A/c {{ $company['bank_account_number'] }}@endif
                    @if(!empty($company['bank_ifsc'])) · IFSC {{ $company['bank_ifsc'] }}@endif
                    @if(!empty($company['bank_branch'])) · {{ $company['bank_branch'] }}@endif
                </div>
            </td>
            @if($termsText || $notesText)
            <td style="width: 2%;"></td>
            @endif
            @endif

            @if($termsText || $notesText)
            <td class="legal-box" style="width: {{ $hasBank ? '50%' : '100%' }};">
                @if($notesText)
                    <div class="heading">Notes</div>
                    <div class="text-muted" style="font-size: 7.5px; margin-bottom: {{ $termsText ? '4px' : '0' }};">{{ $notesText }}</div>
                @endif
                @if($termsText)
                    <div class="heading">Terms</div>
                    <div class="text-muted" style="font-size: 7.5px;">{{ $termsText }}</div>
                @endif
            </td>
            @endif
        </tr>
    </table>

    <div class="legal-box" style="margin-top: 5px;">
        <div class="heading">Jurisdiction</div>
        <div class="text-muted" style="font-size: 7.5px;">
            {{ $jurisdictionClause }}
            @if(!empty($jurisdictionCourt))
                <strong style="color:#111827"> Subject to {{ $jurisdictionCourt }} courts only.</strong>
            @endif
        </div>
    </div>

    @if($order->transaction_id)
        <div class="text-muted" style="margin-top: 4px; font-size: 7.5px;">Transaction ID: {{ $order->transaction_id }}</div>
    @endif
</div>

<div class="footer-note">
    <div class="system">This is a system-generated invoice. No signature or stamp is required.</div>
    <div class="hint">Generated digitally by {{ $companyName }} · {{ now()->format('d M Y, H:i') }} IST</div>
</div>
</div>
</body>
</html>
