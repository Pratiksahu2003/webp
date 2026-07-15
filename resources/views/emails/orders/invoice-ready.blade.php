<x-mail::message>
# Invoice Ready

Hi {{ $order->user->name }},

You have a new tax invoice from **{{ app(\App\Services\CompanyProfileService::class)->get('legal_name', config('company.name')) }}**.

**Invoice {{ $order->order_number }}**
@if($order->invoice_title)
- **Title:** {{ $order->invoice_title }}
@endif
- **Taxable value:** ₹{{ number_format($order->taxableSubtotal(), 2) }}
- **GST:** ₹{{ number_format((float) ($order->tax_amount ?? 0), 2) }}
- **Amount due:** ₹{{ number_format($order->amount, 2) }}

@foreach($order->lineItemsForDisplay() as $item)
- {{ $item['title'] }}@if($item['hsn']) (HSN {{ $item['hsn'] }})@endif × {{ $item['quantity'] }} @ ₹{{ number_format($item['rate'], 2) }} + {{ number_format($item['gst_rate'], 2) }}% GST = ₹{{ number_format($item['amount'], 2) }}
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

If you have any questions, reply to this email or contact us at {{ app(\App\Services\CompanyProfileService::class)->get('email', config('company.contact.email')) }}.

Thanks,<br>
{{ app(\App\Services\CompanyProfileService::class)->get('legal_name', config('company.name')) }}
</x-mail::message>
