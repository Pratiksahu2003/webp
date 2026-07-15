<?php

namespace App\Services;

class InvoiceTaxCalculator
{
    /**
     * Build taxed line items and totals.
     * Rates are GST-exclusive. Final payable = taxable + GST.
     *
     * @param  list<array{title?: string, description?: string, hsn?: string, quantity?: float|int|string, rate?: float|int|string, gst_rate?: float|int|string}>  $items
     * @return array{
     *   line_items: list<array<string, mixed>>,
     *   subtotal: float,
     *   tax_amount: float,
     *   cgst_amount: float,
     *   sgst_amount: float,
     *   igst_amount: float,
     *   amount: float,
     *   is_interstate: bool
     * }
     */
    public function calculate(array $items, bool $isInterstate = false, ?float $defaultGstRate = 18.0): array
    {
        $lineItems = [];
        $subtotal = 0.0;
        $taxAmount = 0.0;

        foreach ($items as $item) {
            $title = trim((string) ($item['title'] ?? ''));
            if ($title === '') {
                continue;
            }

            $quantity = round((float) ($item['quantity'] ?? 1), 2);
            $rate = round((float) ($item['rate'] ?? 0), 2);
            $gstRate = round((float) ($item['gst_rate'] ?? $defaultGstRate ?? 0), 2);
            $taxable = round($quantity * $rate, 2);
            $tax = round($taxable * ($gstRate / 100), 2);

            $lineItems[] = [
                'title' => $title,
                'description' => trim((string) ($item['description'] ?? '')),
                'hsn' => trim((string) ($item['hsn'] ?? '')),
                'quantity' => $quantity,
                'rate' => $rate,
                'gst_rate' => $gstRate,
                'taxable_amount' => $taxable,
                'tax_amount' => $tax,
                'amount' => round($taxable + $tax, 2),
            ];

            $subtotal += $taxable;
            $taxAmount += $tax;
        }

        $subtotal = round($subtotal, 2);
        $taxAmount = round($taxAmount, 2);

        if ($isInterstate) {
            $cgst = 0.0;
            $sgst = 0.0;
            $igst = $taxAmount;
        } else {
            $cgst = round($taxAmount / 2, 2);
            $sgst = round($taxAmount - $cgst, 2);
            $igst = 0.0;
        }

        return [
            'line_items' => $lineItems,
            'subtotal' => $subtotal,
            'tax_amount' => $taxAmount,
            'cgst_amount' => $cgst,
            'sgst_amount' => $sgst,
            'igst_amount' => $igst,
            'amount' => round($subtotal + $taxAmount, 2),
            'is_interstate' => $isInterstate,
        ];
    }

    public function isInterstate(?string $sellerState, ?string $buyerState): bool
    {
        $seller = $this->normalizeState($sellerState);
        $buyer = $this->normalizeState($buyerState);

        if ($seller === '' || $buyer === '') {
            return false;
        }

        return $seller !== $buyer;
    }

    protected function normalizeState(?string $state): string
    {
        return strtolower(trim(preg_replace('/\s+/', ' ', (string) $state) ?? ''));
    }
}
