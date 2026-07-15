<x-mail::message>
# Invoice Ready

Hi {{ $order->user->name }},

You have a new invoice from **{{ config('company.name') }}**.

**Invoice {{ $order->order_number }}**
@if($order->invoice_title)
- **Title:** {{ $order->invoice_title }}
@endif
- **Amount due:** ₹{{ number_format($order->amount, 2) }}

@foreach($order->lineItemsForDisplay() as $item)
- {{ $item['title'] }} × {{ $item['quantity'] }} — ₹{{ number_format($item['amount'], 2) }}
@endforeach

@if($order->notes)
**Note:** {{ $order->notes }}
@endif

<x-mail::button :url="$paymentUrl">
Pay Now
</x-mail::button>

<x-mail::button :url="$invoiceUrl" color="secondary">
View Invoice
</x-mail::button>

If you have any questions, reply to this email or contact us at {{ config('company.contact.email') }}.

Thanks,<br>
{{ config('company.name') }}
</x-mail::message>
