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
            'jurisdictionClause' => $this->companyProfile->jurisdictionClause(),
            'jurisdictionCourt' => $this->companyProfile->jurisdictionCourt(),
        ])
            ->setPaper('a4', 'portrait')
            ->setOption('isHtml5ParserEnabled', true)
            ->setOption('defaultFont', 'DejaVu Sans')
            ->setOption('dpi', 96)
            ->setOption('isFontSubsettingEnabled', true);
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

            $resized = $this->resizeImageForPdf($path, 220);

            if ($resized) {
                return $resized;
            }

            $mime = mime_content_type($path) ?: 'image/png';
            $data = base64_encode((string) file_get_contents($path));

            return "data:{$mime};base64,{$data}";
        }

        return null;
    }

    protected function resizeImageForPdf(string $path, int $maxWidth): ?string
    {
        if (! function_exists('imagecreatefromstring')) {
            return null;
        }

        $binary = @file_get_contents($path);
        if ($binary === false) {
            return null;
        }

        $source = @imagecreatefromstring($binary);
        if ($source === false) {
            return null;
        }

        $width = imagesx($source);
        $height = imagesy($source);

        if ($width <= 0 || $height <= 0) {
            imagedestroy($source);

            return null;
        }

        if ($width > $maxWidth) {
            $newWidth = $maxWidth;
            $newHeight = (int) max(1, round($height * ($maxWidth / $width)));
            $canvas = imagecreatetruecolor($newWidth, $newHeight);
            imagealphablending($canvas, false);
            imagesavealpha($canvas, true);
            $transparent = imagecolorallocatealpha($canvas, 0, 0, 0, 127);
            imagefilledrectangle($canvas, 0, 0, $newWidth, $newHeight, $transparent);
            imagecopyresampled($canvas, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
            imagedestroy($source);
            $source = $canvas;
        }

        ob_start();
        imagepng($source, null, 6);
        $png = ob_get_clean();
        imagedestroy($source);

        if ($png === false || $png === '') {
            return null;
        }

        return 'data:image/png;base64,'.base64_encode($png);
    }
}
