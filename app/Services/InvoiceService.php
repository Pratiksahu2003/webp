<?php

namespace App\Services;

use App\Mail\InvoiceReadyMail;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;

class InvoiceService
{
    public function send(Order $order): Order
    {
        $order->loadMissing('user');

        $paymentUrl = $order->signedPaymentUrl();
        $invoiceUrl = $order->signedInvoiceUrl();

        Mail::to($order->user->email)->send(new InvoiceReadyMail($order, $paymentUrl, $invoiceUrl));

        $order->update(['invoice_sent_at' => now()]);

        return $order->fresh();
    }
}
