<?php

namespace App\Services;

use App\Mail\InvoiceReadyMail;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use Throwable;

class InvoiceService
{
    public function __construct(
        protected SmtpSettingsService $smtpSettings,
    ) {}

    public function send(Order $order): Order
    {
        $order->loadMissing('user');

        if (blank($order->user?->email)) {
            throw new \RuntimeException('This client has no email address.');
        }

        $this->smtpSettings->assertReadyToSend();

        $paymentUrl = $order->signedPaymentUrl();
        $invoiceUrl = $order->signedInvoiceUrl();

        try {
            Mail::mailer('smtp')->to($order->user->email)->send(
                new InvoiceReadyMail($order, $paymentUrl, $invoiceUrl)
            );
        } catch (Throwable $e) {
            report($e);

            throw new \RuntimeException(
                'Failed to send invoice email to '.$order->user->email.': '.$e->getMessage(),
                previous: $e
            );
        }

        $order->update(['invoice_sent_at' => now()]);

        return $order->fresh();
    }
}
