<?php

namespace App\Mail;

use App\Models\Order;
use App\Services\CompanyProfileService;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InvoiceReadyMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Order $order,
        public string $paymentUrl,
        public string $invoiceUrl,
    ) {}

    public function envelope(): Envelope
    {
        $company = app(CompanyProfileService::class)->get('legal_name', config('company.name'));

        return new Envelope(
            subject: 'Invoice '.$this->order->order_number.' from '.$company,
        );
    }

    public function content(): Content
    {
        $companyProfile = app(CompanyProfileService::class);
        $company = $companyProfile->all();

        return new Content(
            view: 'emails.orders.invoice-ready',
            with: [
                'company' => $company,
                'companyName' => $company['legal_name'] ?? config('company.name'),
                'supportEmail' => $company['email'] ?? config('company.contact.email'),
                'supportPhone' => $company['phone'] ?? config('company.contact.phone'),
                'logoUrl' => url('/logo/logo.png'),
                'items' => $this->order->lineItemsForDisplay(),
                'hasBank' => filled($company['bank_name'] ?? null)
                    || filled($company['bank_account_number'] ?? null)
                    || filled($company['bank_ifsc'] ?? null),
            ],
        );
    }
}
