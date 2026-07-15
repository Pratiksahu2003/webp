<?php

namespace App\Mail;

use App\Models\Order;
use App\Services\CompanyProfileService;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderPaymentSuccessMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Order $order,
        public string $invoiceUrl,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Payment Successful — Invoice '.$this->order->order_number,
        );
    }

    public function content(): Content
    {
        $companyProfile = app(CompanyProfileService::class);
        $company = $companyProfile->all();

        return new Content(
            view: 'emails.orders.payment-success',
            with: [
                'company' => $company,
                'companyName' => $company['legal_name'] ?? config('company.name'),
                'supportEmail' => $company['email'] ?? config('company.contact.email'),
                'supportPhone' => $company['phone'] ?? config('company.contact.phone'),
                'logoUrl' => url('/logo/logo.png'),
            ],
        );
    }
}
