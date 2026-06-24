<x-mail::message>
# Payment Successful

Hi {{ $order->user->name }},

Thank you for your payment. Your order **{{ $order->order_number }}** has been confirmed.

**Order details**
- **Service:** {{ $order->service->title ?? 'N/A' }} — {{ $order->subService->title ?? 'N/A' }}
- **Package:** {{ $order->package->package_name ?? 'N/A' }}
- **Amount paid:** ₹{{ number_format($order->amount, 2) }}
@if($order->transaction_id)
- **Transaction ID:** {{ $order->transaction_id }}
@endif

<x-mail::button :url="$invoiceUrl">
Download Invoice
</x-mail::button>

If you have any questions, reply to this email or contact us at {{ config('company.contact.email') }}.

Thanks,<br>
{{ config('company.name') }}
</x-mail::message>
