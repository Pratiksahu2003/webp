@extends('emails.layouts.brand')

@section('title', 'Payment successful — '.$order->order_number)

@section('content')
<p style="margin:0 0 6px;font-size:12px;font-weight:700;letter-spacing:0.08em;text-transform:uppercase;color:#059669;">
    Payment confirmed
</p>
<h1 style="margin:0 0 16px;font-size:24px;line-height:1.25;color:#111827;font-weight:800;">
    Thank you for your payment
</h1>

<p style="margin:0 0 18px;font-size:15px;line-height:1.6;color:#374151;">
    Hi {{ $order->user->name }},
</p>
<p style="margin:0 0 22px;font-size:15px;line-height:1.6;color:#374151;">
    We’ve received your payment for invoice <strong style="color:#111827;">{{ $order->order_number }}</strong>.
    Your tax invoice PDF is ready to download.
</p>

<table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#ecfdf5;border:1px solid #a7f3d0;border-radius:12px;margin-bottom:20px;">
    <tr>
        <td style="padding:16px 18px;">
            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td style="padding:0 0 8px;">
                        <p style="margin:0;font-size:12px;color:#047857;font-weight:700;letter-spacing:0.04em;text-transform:uppercase;">Invoice</p>
                        <p style="margin:4px 0 0;font-size:18px;font-weight:800;color:#111827;">{{ $order->order_number }}</p>
                    </td>
                    <td align="right" style="padding:0 0 8px;vertical-align:top;">
                        <span style="display:inline-block;padding:4px 10px;border-radius:999px;background-color:#ffffff;border:1px solid #a7f3d0;font-size:11px;font-weight:700;color:#059669;">
                            Paid
                        </span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="padding:4px 0;">
                        <p style="margin:0;font-size:13px;color:#6b7280;">Item</p>
                        <p style="margin:2px 0 0;font-size:14px;font-weight:600;color:#111827;">{{ $order->displayTitle() }}</p>
                    </td>
                </tr>
                @if($order->service || $order->subService)
                <tr>
                    <td colspan="2" style="padding:4px 0;">
                        <p style="margin:0;font-size:13px;color:#6b7280;">Service</p>
                        <p style="margin:2px 0 0;font-size:14px;font-weight:600;color:#111827;">
                            {{ $order->service->title ?? 'N/A' }}@if($order->subService) — {{ $order->subService->title }}@endif
                        </p>
                    </td>
                </tr>
                @endif
                <tr>
                    <td style="padding-top:8px;">
                        @if($order->transaction_id)
                            <p style="margin:0;font-size:12px;color:#6b7280;">Transaction ID</p>
                            <p style="margin:2px 0 0;font-size:13px;font-weight:600;color:#111827;">{{ $order->transaction_id }}</p>
                        @endif
                    </td>
                    <td align="right" style="padding-top:8px;">
                        <p style="margin:0;font-size:12px;color:#6b7280;">Amount paid</p>
                        <p style="margin:2px 0 0;font-size:20px;font-weight:800;color:#059669;">₹{{ number_format($order->amount, 2) }}</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="margin:8px 0 8px;">
    <tr>
        <td align="center">
            <a href="{{ $invoiceUrl }}"
               style="display:inline-block;background:linear-gradient(135deg,#ff6b35 0%,#f7931e 100%);background-color:#ff6b35;color:#ffffff;font-size:15px;font-weight:700;text-decoration:none;padding:14px 28px;border-radius:10px;box-shadow:0 8px 18px rgba(255,107,53,0.28);">
                Download Invoice PDF
            </a>
        </td>
    </tr>
</table>
@endsection
