<?php

namespace App\Services;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Barryvdh\DomPDF\PDF as DomPdf;
use Illuminate\Http\Response;

class InvoicePdfService
{
    public function __construct(
        protected CompanyProfileService $companyProfile,
    ) {}

    public function make(Order $order): DomPdf
    {
        $order->loadMissing(['user', 'service', 'subService', 'package', 'transactions']);

        $company = $this->companyProfile->all();

        return Pdf::loadView('invoices.order', [
            'order' => $order,
            'company' => $company,
            'companyAddress' => $this->companyProfile->fullAddress(),
            'logoPath' => $this->resolveLogoDataUri(),
            'items' => $order->lineItemsForDisplay(),
        ])
            ->setPaper('a4', 'portrait')
            ->setOption('isHtml5ParserEnabled', true)
            ->setOption('defaultFont', 'DejaVu Sans');
    }

    public function download(Order $order): Response
    {
        return $this->make($order)->download($this->filename($order));
    }

    public function stream(Order $order): Response
    {
        return $this->make($order)->stream($this->filename($order));
    }

    public function filename(Order $order): string
    {
        $number = preg_replace('/[^A-Za-z0-9\-]/', '-', (string) $order->order_number) ?: 'invoice';

        return "Invoice-{$number}.pdf";
    }

    protected function resolveLogoDataUri(): ?string
    {
        $candidates = [
            public_path('logo/logo.png'),
            public_path(ltrim((string) config('company.branding.logo.light'), '/')),
            public_path('android-chrome-192x192.png'),
        ];

        foreach ($candidates as $path) {
            if (! is_string($path) || $path === '' || ! is_file($path)) {
                continue;
            }

            $mime = mime_content_type($path) ?: 'image/png';
            $data = base64_encode((string) file_get_contents($path));

            return "data:{$mime};base64,{$data}";
        }

        return null;
    }
}
