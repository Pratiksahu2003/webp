<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tax Invoice {{ $order->order_number }}</title>
    <style>
        @page { margin: 14px 16px 16px; size: A4 portrait; }
        * { box-sizing: border-box; }
        body {
            font-family: DejaVu Sans, sans-serif;
            color: #111827;
            font-size: 8.5px;
            line-height: 1.35;
            margin: 0;
            padding: 0;
        }
        table { width: 100%; border-collapse: collapse; }
        .muted { color: #6b7280; }
        .ink { color: #111827; }
        .accent { color: #ff6b35; }
        .right { text-align: right; }
        .center { text-align: center; }
        .bold { font-weight: 700; }
        .semi { font-weight: 600; }
        .logo { height: 42px; width: auto; display: block; }
        .company-name { font-size: 13px; font-weight: 700; color: #111827; margin-top: 2px; }
        .tagline { font-size: 7px; letter-spacing: 0.08em; text-transform: uppercase; color: #9ca3af; margin-top: 1px; }
        .invoice-title {
            margin: 0;
            font-size: 22px;
            letter-spacing: 1px;
            color: #ff6b35;
            font-weight: 800;
            text-transform: uppercase;
            line-height: 1;
        }
        .inv-no { margin-top: 6px; font-size: 12px; font-weight: 800; color: #111827; }
        .meta-line { margin-top: 2px; font-size: 8px; color: #6b7280; }
        .rule {
            height: 2.5px;
            background: #ff6b35;
            margin: 10px 0 8px;
        }
        .box {
            border: 1px solid #e5e7eb;
            padding: 7px 8px;
            vertical-align: top;
        }
        .box-title {
            font-size: 7.5px;
            font-weight: 800;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: #ff6b35;
            margin-bottom: 4px;
        }
        .party-name { font-size: 10px; font-weight: 700; color: #111827; }
        .supply {
            margin-top: 8px;
            border: 1px solid #e5e7eb;
        }
        .supply th {
            background: #fff7f2;
            color: #9a3412;
            font-size: 7px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 5px 6px;
            border: 1px solid #ffd4c2;
            text-align: left;
            font-weight: 700;
        }
        .supply td {
            padding: 5px 6px;
            border: 1px solid #e5e7eb;
            font-weight: 600;
            color: #111827;
            font-size: 8px;
        }
        .items { margin-top: 8px; }
        .items th {
            background: #ff6b35;
            color: #ffffff;
            font-size: 7px;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            padding: 6px 5px;
            border: 1px solid #ea580c;
            text-align: left;
            font-weight: 700;
        }
        .items th.num, .items td.num { text-align: right; }
        .items th.center, .items td.center { text-align: center; }
        .items td {
            border: 1px solid #e5e7eb;
            padding: 5px;
            vertical-align: top;
            font-size: 8px;
        }
        .items tr:nth-child(even) td { background: #fafafa; }
        .sac-note { margin-top: 4px; font-size: 7px; color: #6b7280; }
        .lower { margin-top: 8px; }
        .summary-box {
            border: 1px solid #e5e7eb;
            padding: 8px;
            vertical-align: top;
        }
        .summary-box .label { color: #6b7280; }
        .summary-row td { padding: 2px 0; }
        .grand-row td {
            border-top: 1.5px solid #111827;
            padding-top: 5px;
            margin-top: 3px;
            font-size: 11px;
            font-weight: 800;
        }
        .grand-amt { color: #ff6b35; }
        .footer-box {
            border: 1px solid #e5e7eb;
            padding: 7px 8px;
            vertical-align: top;
            font-size: 7.5px;
        }
        .footer-box .title {
            font-size: 7.5px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #111827;
            margin-bottom: 3px;
        }
        .digital {
            background: #fff7f2;
            border: 1px solid #ffd4c2;
            text-align: center;
            padding: 10px 8px;
        }
        .digital .chip {
            display: inline-block;
            border: 1px solid #ff6b35;
            color: #c2410c;
            font-size: 7px;
            font-weight: 800;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            padding: 3px 8px;
            margin-bottom: 6px;
        }
        .page-foot {
            margin-top: 8px;
            text-align: center;
            font-size: 7px;
            color: #9ca3af;
            border-top: 1px dashed #d1d5db;
            padding-top: 6px;
        }
        .no-break { page-break-inside: avoid; }
    </style>
</head>
<body>
@php
    $companyName = $company['legal_name'] ?? config('company.name');
    $tradeName = $company['trade_name'] ?? null;
    $buyer = $order->user;
    $hsnCodes = collect($items)->pluck('hsn')->filter()->unique()->values();
    $gstRate = (float) (($items[0]['gst_rate'] ?? null) ?: ($company['default_gst_rate'] ?? 18));
    $halfGst = round($gstRate / 2, 2);
@endphp

<div class="no-break">
<table>
    <tr>
        <td style="width: 58%; vertical-align: top;">
            @if(!empty($logoPath))
                <img src="{{ $logoPath }}" alt="{{ $companyName }}" class="logo">
            @endif
            <div class="company-name">{{ $companyName }}</div>
            @if($tradeName && $tradeName !== $companyName)
                <div class="muted" style="font-size: 8px;">{{ $tradeName }}</div>
            @endif
            <div class="tagline">Technology · Solutions · Growth</div>
        </td>
        <td style="width: 42%; vertical-align: top;" class="right">
            <div class="invoice-title">Tax Invoice</div>
            <div class="inv-no">{{ $order->order_number }}</div>
            <div class="meta-line">Date: <span class="ink bold">{{ $invoiceDate->format('d M Y') }}</span></div>
            <div class="meta-line">Due Date: <span class="ink bold">{{ $dueDate->format('d M Y') }}</span></div>
        </td>
    </tr>
</table>

<div class="rule"></div>

<table>
    <tr>
        <td class="box" style="width: 49%;">
            <div class="box-title">Supplier (From)</div>
            <div class="party-name">{{ $companyName }}</div>
            <div class="muted" style="margin-top: 3px;">{{ $companyAddress }}</div>
            <div style="margin-top: 4px;">
                @if(!empty($company['gstin']))
                    <div><span class="muted">GSTIN:</span> <span class="bold">{{ $company['gstin'] }}</span></div>
                @endif
                @if(!empty($company['udyam']))
                    <div><span class="muted">Udyam:</span> {{ $company['udyam'] }}</div>
                @endif
                @if(!empty($company['pan']))
                    <div><span class="muted">PAN:</span> {{ $company['pan'] }}</div>
                @endif
                @if($sellerState || $sellerCode)
                    <div><span class="muted">State Code:</span> {{ $sellerCode ?: '—' }}@if($sellerState) — {{ $sellerState }}@endif</div>
                @endif
                @if(!empty($company['email']))
                    <div><span class="muted">Email:</span> {{ $company['email'] }}</div>
                @endif
                @if(!empty($company['phone']))
                    <div><span class="muted">Phone:</span> {{ $company['phone'] }}</div>
                @endif
            </div>
        </td>
        <td style="width: 2%;"></td>
        <td class="box" style="width: 49%;">
            <div class="box-title">Bill To (Recipient)</div>
            <div class="party-name">{{ $buyer->name }}</div>
            @if($buyer->company_name)
                <div class="semi">{{ $buyer->company_name }}</div>
            @endif
            <div class="muted" style="margin-top: 3px;">{{ $buyer->fullAddress() ?: '—' }}</div>
            <div style="margin-top: 4px;">
                <div>
                    <span class="muted">GSTIN:</span>
                    <span class="bold">{{ $order->buyer_gstin ?: 'Unregistered' }}</span>
                </div>
                @if($buyerState || $buyerCode)
                    <div><span class="muted">State Code:</span> {{ $buyerCode ?: '—' }}@if($buyerState) — {{ $buyerState }}@endif</div>
                @endif
                @if($buyer->email)
                    <div><span class="muted">Email:</span> {{ $buyer->email }}</div>
                @endif
                @if($buyer->phone)
                    <div><span class="muted">Phone:</span> {{ $buyer->phone }}</div>
                @endif
            </div>
        </td>
    </tr>
</table>

<table class="supply">
    <tr>
        <th style="width: 25%;">Place of Supply</th>
        <th style="width: 25%;">Supply Type</th>
        <th style="width: 25%;">Payment Status</th>
        <th style="width: 25%;">Reverse Charge</th>
    </tr>
    <tr>
        <td>{{ $supplyLabel }}</td>
        <td>{{ $supplyType }}</td>
        <td>{{ ucfirst($order->payment_status) }}</td>
        <td>No</td>
    </tr>
</table>

<table class="items">
    <thead>
        <tr>
            <th style="width: 4%;" class="center">#</th>
            <th style="width: 36%;">Description of Services</th>
            <th style="width: 10%;" class="center">HSN/SAC</th>
            <th style="width: 7%;" class="center">Qty</th>
            <th style="width: 13%;" class="num">Rate (INR)</th>
            <th style="width: 14%;" class="num">Taxable Value</th>
            <th style="width: 16%;" class="num">Amount</th>
        </tr>
    </thead>
    <tbody>
        @forelse($items as $i => $item)
            <tr>
                <td class="center">{{ $i + 1 }}</td>
                <td>
                    <span class="semi">{{ $item['title'] }}</span>
                    @if(!empty($item['description']))
                        <div class="muted" style="font-size: 7px; margin-top: 1px;">{{ \Illuminate\Support\Str::limit($item['description'], 80) }}</div>
                    @endif
                </td>
                <td class="center">{{ $item['hsn'] ?: '—' }}</td>
                <td class="center">{{ $item['quantity'] }}</td>
                <td class="num">{{ number_format($item['rate'], 2) }}</td>
                <td class="num">{{ number_format($item['taxable_amount'], 2) }}</td>
                <td class="num bold">{{ number_format($item['amount'], 2) }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="center muted">No line items</td>
            </tr>
        @endforelse
    </tbody>
</table>

@if($hsnCodes->contains('998314'))
    <div class="sac-note">SAC 998314: Information technology (IT) design and development services.</div>
@endif

<table class="lower">
    <tr>
        <td class="summary-box" style="width: 52%;">
            <div class="box-title" style="color:#111827;">Amount in Words</div>
            <div class="bold" style="font-size: 9px; margin-bottom: 6px;">{{ $amountInWords }}</div>
            @if($order->transaction_id)
                <div><span class="muted">Transaction ID:</span> {{ $order->transaction_id }}</div>
            @endif
            <div><span class="muted">Payment Mode:</span> {{ $paymentMode }}</div>
            <div class="bold" style="margin-top: 4px;">
                {{ $order->isPaid() ? 'Paid' : 'Due' }}: INR {{ number_format($order->amount, 2) }}
            </div>
            @if($order->notes)
                <div style="margin-top: 6px;"><span class="muted">Notes:</span> {{ \Illuminate\Support\Str::limit($order->notes, 160) }}</div>
            @endif
        </td>
        <td style="width: 2%;"></td>
        <td class="summary-box" style="width: 46%;">
            <table>
                <tr class="summary-row">
                    <td class="label">Taxable Value</td>
                    <td class="right">{{ number_format($order->taxableSubtotal(), 2) }}</td>
                </tr>
                @if($order->is_interstate)
                    <tr class="summary-row">
                        <td class="label">IGST</td>
                        <td class="right">{{ number_format((float) $order->igst_amount, 2) }}</td>
                    </tr>
                @else
                    <tr class="summary-row">
                        <td class="label">CGST @ {{ number_format($halfGst, 2) }}%</td>
                        <td class="right">{{ number_format((float) $order->cgst_amount, 2) }}</td>
                    </tr>
                    <tr class="summary-row">
                        <td class="label">SGST @ {{ number_format($halfGst, 2) }}%</td>
                        <td class="right">{{ number_format((float) $order->sgst_amount, 2) }}</td>
                    </tr>
                @endif
                <tr class="summary-row">
                    <td class="label">Total Tax</td>
                    <td class="right">{{ number_format((float) ($order->tax_amount ?? 0), 2) }}</td>
                </tr>
                <tr class="grand-row">
                    <td>Grand Total</td>
                    <td class="right grand-amt">INR {{ number_format($order->amount, 2) }}</td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<table style="margin-top: 8px;">
    <tr>
        <td class="footer-box" style="width: 58%;">
            <div class="title">Declaration</div>
            <div class="muted">
                We declare that this invoice shows the actual price of the goods / services described and that all particulars are true and correct.
                This is a computer-generated tax invoice and does not require a physical signature.
            </div>
            @if(!empty($company['invoice_terms']))
                <div style="margin-top: 4px;"><span class="semi ink">Terms:</span> <span class="muted">{{ \Illuminate\Support\Str::limit($company['invoice_terms'], 180) }}</span></div>
            @endif
        </td>
        <td style="width: 2%;"></td>
        <td class="footer-box digital" style="width: 40%;">
            <div class="title" style="text-align:center; margin-bottom: 6px;">Digitally Issued For</div>
            <div class="chip">E-Invoice · No Signature</div>
            <div class="bold" style="font-size: 9px;">{{ $companyName }}</div>
            @if($tradeName && $tradeName !== $companyName)
                <div class="muted">{{ $tradeName }}</div>
            @endif
        </td>
    </tr>
</table>

@if(!empty($company['bank_name']) || !empty($company['bank_account_number']))
<table style="margin-top: 6px;">
    <tr>
        <td class="footer-box">
            <div class="title">Bank Details</div>
            <div class="muted">
                @if(!empty($company['bank_name'])){{ $company['bank_name'] }}@endif
                @if(!empty($company['bank_account_name'])) · {{ $company['bank_account_name'] }}@endif
                @if(!empty($company['bank_account_number'])) · A/c {{ $company['bank_account_number'] }}@endif
                @if(!empty($company['bank_ifsc'])) · IFSC {{ $company['bank_ifsc'] }}@endif
                @if(!empty($company['bank_branch'])) · {{ $company['bank_branch'] }}@endif
            </div>
        </td>
    </tr>
</table>
@endif

<div class="page-foot">
    Subject to {{ $jurisdictionCourt }} jurisdiction.
    @if(!empty($company['gstin'])) GSTIN {{ $company['gstin'] }}.@endif
    Generated by {{ config('company.name', 'VanTroZ') }}.
</div>
</div>
</body>
</html>
