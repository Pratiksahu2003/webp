@extends('emails.layouts.brand')

@section('title', 'Invoice '.$order->order_number)

@section('content')
@php
    $status = strtolower((string) $order->payment_status);
    $statusLabel = ucfirst($status);
    $statusColor = match ($status) {
        'paid' => '#059669',
        'pending', 'processing' => '#d97706',
        default => '#6b7280',
    };
@endphp

<p style="margin:0 0 6px;font-size:12px;font-weight:700;letter-spacing:0.08em;text-transform:uppercase;color:#ff6b35;">
    Tax Invoice
</p>
<h1 style="margin:0 0 16px;font-size:24px;line-height:1.25;color:#111827;font-weight:800;">
    Invoice ready
</h1>

<p style="margin:0 0 18px;font-size:15px;line-height:1.6;color:#374151;">
    Hi {{ $order->user->name }},
</p>
<p style="margin:0 0 22px;font-size:15px;line-height:1.6;color:#374151;">
    You have a new tax invoice from <strong style="color:#111827;">{{ $companyName }}</strong>.
    Pay securely online, or use the bank details below.
</p>

{{-- Invoice meta card --}}
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#fff7f2;border:1px solid #ffd4c2;border-radius:12px;margin-bottom:20px;">
    <tr>
        <td style="padding:16px 18px;">
            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td style="padding:0 0 10px;">
                        <p style="margin:0;font-size:12px;color:#9a3412;font-weight:700;letter-spacing:0.04em;text-transform:uppercase;">Invoice number</p>
                        <p style="margin:4px 0 0;font-size:18px;font-weight:800;color:#111827;">{{ $order->order_number }}</p>
                    </td>
                    <td align="right" style="padding:0 0 10px;vertical-align:top;">
                        <span style="display:inline-block;padding:4px 10px;border-radius:999px;background-color:#ffffff;border:1px solid #ffd4c2;font-size:11px;font-weight:700;color:{{ $statusColor }};">
                            {{ $statusLabel }}
                        </span>
                    </td>
                </tr>
                @if($order->invoice_title)
                <tr>
                    <td colspan="2" style="padding:0 0 8px;">
                        <p style="margin:0;font-size:13px;color:#6b7280;">Title</p>
                        <p style="margin:2px 0 0;font-size:14px;font-weight:600;color:#111827;">{{ $order->invoice_title }}</p>
                    </td>
                </tr>
                @endif
                <tr>
                    <td style="padding-top:4px;">
                        <p style="margin:0;font-size:12px;color:#6b7280;">Invoice date</p>
                        <p style="margin:2px 0 0;font-size:14px;font-weight:600;color:#111827;">{{ $order->invoiceDate()->format('d M Y') }}</p>
                    </td>
                    <td align="right" style="padding-top:4px;">
                        <p style="margin:0;font-size:12px;color:#6b7280;">Amount due</p>
                        <p style="margin:2px 0 0;font-size:20px;font-weight:800;color:#ff6b35;">₹{{ number_format($order->amount, 2) }}</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

{{-- Totals --}}
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="border:1px solid #e5e7eb;border-radius:12px;margin-bottom:18px;">
    <tr>
        <td style="padding:14px 16px;">
            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td style="padding:4px 0;font-size:14px;color:#6b7280;">Taxable value</td>
                    <td align="right" style="padding:4px 0;font-size:14px;font-weight:600;color:#111827;">₹{{ number_format($order->taxableSubtotal(), 2) }}</td>
                </tr>
                <tr>
                    <td style="padding:4px 0;font-size:14px;color:#6b7280;">GST</td>
                    <td align="right" style="padding:4px 0;font-size:14px;font-weight:600;color:#111827;">₹{{ number_format((float) ($order->tax_amount ?? 0), 2) }}</td>
                </tr>
                <tr>
                    <td style="padding:10px 0 0;border-top:1px solid #e5e7eb;font-size:15px;font-weight:800;color:#111827;">Total due</td>
                    <td align="right" style="padding:10px 0 0;border-top:1px solid #e5e7eb;font-size:15px;font-weight:800;color:#ff6b35;">₹{{ number_format($order->amount, 2) }}</td>
                </tr>
            </table>
        </td>
    </tr>
</table>

{{-- Line items --}}
@if(count($items))
<p style="margin:0 0 8px;font-size:12px;font-weight:700;letter-spacing:0.06em;text-transform:uppercase;color:#9ca3af;">Line items</p>
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-bottom:20px;border-collapse:collapse;">
    @foreach($items as $item)
        <tr>
            <td style="padding:10px 0;border-bottom:1px solid #f3f4f6;vertical-align:top;">
                <p style="margin:0;font-size:14px;font-weight:700;color:#111827;">{{ $item['title'] }}</p>
                <p style="margin:3px 0 0;font-size:12px;color:#6b7280;">
                    @if(!empty($item['hsn']))HSN {{ $item['hsn'] }} · @endif
                    Qty {{ $item['quantity'] }} · ₹{{ number_format($item['rate'], 2) }} + {{ number_format($item['gst_rate'], 2) }}% GST
                </p>
            </td>
            <td align="right" style="padding:10px 0;border-bottom:1px solid #f3f4f6;vertical-align:top;white-space:nowrap;">
                <p style="margin:0;font-size:14px;font-weight:700;color:#111827;">₹{{ number_format($item['amount'], 2) }}</p>
            </td>
        </tr>
    @endforeach
</table>
@endif

@if($order->notes)
<div style="margin:0 0 20px;padding:12px 14px;background:#f9fafb;border-radius:10px;border:1px solid #e5e7eb;">
    <p style="margin:0 0 4px;font-size:11px;font-weight:700;letter-spacing:0.05em;text-transform:uppercase;color:#9ca3af;">Note</p>
    <p style="margin:0;font-size:13px;line-height:1.5;color:#374151;">{{ $order->notes }}</p>
</div>
@endif

{{-- CTAs --}}
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="margin:8px 0 22px;">
    <tr>
        <td align="center" style="padding:0 0 10px;">
            <a href="{{ $paymentUrl }}"
               style="display:inline-block;background:linear-gradient(135deg,#ff6b35 0%,#f7931e 100%);background-color:#ff6b35;color:#ffffff;font-size:15px;font-weight:700;text-decoration:none;padding:14px 28px;border-radius:10px;box-shadow:0 8px 18px rgba(255,107,53,0.28);">
                Pay Now
            </a>
        </td>
    </tr>
    <tr>
        <td align="center">
            <a href="{{ $invoiceUrl }}"
               style="display:inline-block;background-color:#111827;color:#ffffff;font-size:14px;font-weight:700;text-decoration:none;padding:12px 24px;border-radius:10px;">
                Download Invoice PDF
            </a>
        </td>
    </tr>
</table>

{{-- Bank details --}}
@if($hasBank)
<p style="margin:0 0 8px;font-size:12px;font-weight:700;letter-spacing:0.06em;text-transform:uppercase;color:#9ca3af;">Or pay by bank transfer</p>
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#111827;border-radius:12px;margin-bottom:8px;">
    <tr>
        <td style="padding:16px 18px;">
            <p style="margin:0 0 12px;font-size:11px;font-weight:800;letter-spacing:0.08em;text-transform:uppercase;color:#ff8c42;">
                Bank details for payment
            </p>
            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                @if(!empty($company['bank_name']))
                <tr>
                    <td style="padding:4px 0;font-size:12px;color:#9ca3af;width:38%;">Bank</td>
                    <td style="padding:4px 0;font-size:13px;font-weight:700;color:#ffffff;">{{ $company['bank_name'] }}</td>
                </tr>
                @endif
                @if(!empty($company['bank_account_name']))
                <tr>
                    <td style="padding:4px 0;font-size:12px;color:#9ca3af;">Account holder</td>
                    <td style="padding:4px 0;font-size:13px;font-weight:700;color:#ffffff;">{{ $company['bank_account_name'] }}</td>
                </tr>
                @endif
                @if(!empty($company['bank_account_number']))
                <tr>
                    <td style="padding:4px 0;font-size:12px;color:#9ca3af;">Account number</td>
                    <td style="padding:4px 0;font-size:13px;font-weight:700;color:#ffffff;">{{ $company['bank_account_number'] }}</td>
                </tr>
                @endif
                @if(!empty($company['bank_ifsc']))
                <tr>
                    <td style="padding:4px 0;font-size:12px;color:#9ca3af;">IFSC</td>
                    <td style="padding:4px 0;font-size:13px;font-weight:700;color:#ffffff;">{{ $company['bank_ifsc'] }}</td>
                </tr>
                @endif
                @if(!empty($company['bank_branch']))
                <tr>
                    <td style="padding:4px 0;font-size:12px;color:#9ca3af;">Branch</td>
                    <td style="padding:4px 0;font-size:13px;font-weight:700;color:#ffffff;">{{ $company['bank_branch'] }}</td>
                </tr>
                @endif
            </table>
            <p style="margin:12px 0 0;font-size:12px;line-height:1.45;color:#d1d5db;">
                Please mention invoice <strong style="color:#ff8c42;">{{ $order->order_number }}</strong> in the payment reference.
            </p>
        </td>
    </tr>
</table>
@endif
@endsection
