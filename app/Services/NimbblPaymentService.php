<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Facades\Log;
use Nimbbl\Laravel\Facades\Nimbbl;

class NimbblPaymentService
{
    public function isConfigured(): bool
    {
        return filled(config('nimbbl.access_key')) && filled(config('nimbbl.access_secret'));
    }

    public function createOrder(Order $order, array $customer): array
    {
        if (! $this->isConfigured()) {
            return $this->mockCreateOrder($order);
        }

        $order->loadMissing(['package', 'subService', 'user']);
        $address = $this->resolveAddress($order, $customer);

        $payload = [
            'invoice_id' => $order->nimbblInvoiceId(),
            'total_amount' => (float) $order->amount,
            'currency' => config('nimbbl.currency', 'INR'),
            'user' => [
                'email' => $customer['email'],
                'first_name' => $this->firstName($customer['name']),
                'last_name' => $this->lastName($customer['name']),
                'mobile_number' => $this->normalizePhone($customer['phone'] ?? ''),
                'country_code' => '+91',
            ],
            'shipping_address' => $this->nimbblAddress($address, 'Home'),
            'billing_address' => $this->nimbblAddress($address, 'Other'),
            'order_line_items' => $this->lineItemsPayload($order),
            'callback_url' => route('payment.callback', ['order' => $order->order_number]),
            'redirect_url' => route('payment.callback', ['order' => $order->order_number]),
        ];

        $response = Nimbbl::createOrder($payload, $order->user_id, $order);

        if (! empty($response['error'])) {
            Log::error('Nimbbl create order failed', [
                'order' => $order->order_number,
                'response' => $response,
            ]);

            throw new \RuntimeException(
                $response['nimbbl_consumer_message']
                    ?? $response['message']
                    ?? 'Unable to initiate payment. Please try again.'
            );
        }

        if (empty($response['token'])) {
            throw new \RuntimeException('Payment gateway did not return a checkout token.');
        }

        return $response;
    }

    public function checkoutCredentials(array $orderResponse): array
    {
        if (! empty($orderResponse['mock'])) {
            return [
                'token' => $orderResponse['token'],
                'order_id' => $orderResponse['order_id'] ?? null,
                'mock' => true,
            ];
        }

        return Nimbbl::checkoutCredentials($orderResponse);
    }

    public function verifyCallbackPayload(array $payload): bool
    {
        $payload = $this->normalizeCallbackPayload($payload);

        $status = strtolower((string) ($payload['status'] ?? $payload['payment_status'] ?? ''));

        if (in_array($status, ['success', 'paid', 'completed', 'succeeded', 'successful'], true)) {
            return true;
        }

        $transactionStatus = strtolower((string) ($payload['transaction']['status'] ?? ''));

        return in_array($transactionStatus, ['success', 'paid', 'completed', 'succeeded'], true);
    }

    public function normalizeCallbackPayload(array $payload): array
    {
        if (isset($payload['payload']) && is_array($payload['payload'])) {
            $payload = array_merge($payload, $payload['payload']);
        }

        if (isset($payload['callback']) && is_array($payload['callback'])) {
            return $this->normalizeCallbackPayload($payload['callback']);
        }

        return $payload;
    }

    public function decodeCallbackResponse(?string $encoded): array
    {
        if (! $encoded) {
            return [];
        }

        $decoded = base64_decode($encoded, true);

        if ($decoded === false) {
            $decoded = $encoded;
        }

        $data = json_decode($decoded, true);

        if (! is_array($data)) {
            return [];
        }

        return $this->normalizeCallbackPayload($data);
    }

    public function resolveOrderNumber(array $payload): ?string
    {
        $payload = $this->normalizeCallbackPayload($payload);

        $candidates = [
            $payload['invoice_id'] ?? null,
            $payload['order']['invoice_id'] ?? null,
            $payload['merchant_order_id'] ?? null,
            $payload['order_id'] ?? null,
        ];

        foreach ($candidates as $candidate) {
            if (! is_string($candidate) || $candidate === '') {
                continue;
            }

            $orderNumber = $this->normalizeMerchantInvoiceId($candidate);

            if ($orderNumber !== null) {
                return $orderNumber;
            }
        }

        return null;
    }

    protected function normalizeMerchantInvoiceId(string $candidate): ?string
    {
        if (! str_starts_with($candidate, 'ORD-')) {
            return null;
        }

        return preg_replace('/-(?:R)?\d+$/', '', $candidate) ?: null;
    }

    public function parseCallbackRequest(?string $encodedResponse): array
    {
        if (! $encodedResponse) {
            return [];
        }

        $decoded = $this->decodeCallbackResponse($encodedResponse);

        if ($decoded === []) {
            return [];
        }

        if (! $this->isConfigured()) {
            return $decoded;
        }

        try {
            $payload = Nimbbl::parseCallbackPayload($encodedResponse);
            $verification = Nimbbl::verifyCallbackSignature($payload);

            if ($verification['success'] ?? false) {
                return $this->normalizeCallbackPayload($payload);
            }

            Log::warning('Nimbbl callback signature verification failed, using decoded payload', [
                'invoice_id' => $this->resolveOrderNumber($decoded),
            ]);
        } catch (\Throwable $e) {
            Log::warning('Nimbbl callback verification failed', ['error' => $e->getMessage()]);
        }

        return $decoded;
    }

    public function verifyWebhookSignature(string $rawBody, ?string $signature): bool
    {
        if (! $this->isConfigured()) {
            return app()->environment('local', 'testing');
        }

        if (! $signature) {
            return false;
        }

        $secret = config('nimbbl.webhook_secret') ?: config('nimbbl.access_secret');
        $expected = hash_hmac('sha256', $rawBody, $secret);

        return hash_equals($expected, $signature);
    }

    protected function lineItemsPayload(Order $order): array
    {
        return collect($order->lineItemsForDisplay())->map(function (array $item) {
            $quantity = max((float) $item['quantity'], 0.01);
            $lineTotal = (float) ($item['amount'] ?? 0);

            return [
                'title' => $item['title'],
                'description' => trim(($item['description'] ?? '').(filled($item['hsn'] ?? null) ? ' HSN: '.$item['hsn'] : '')),
                'quantity' => $quantity,
                'rate' => round($lineTotal / $quantity, 2),
            ];
        })->values()->all();
    }

    protected function mockCreateOrder(Order $order): array
    {
        return [
            'token' => 'mock_token_'.$order->order_number,
            'order_id' => $order->order_number,
            'status' => 'created',
            'mock' => true,
        ];
    }

    protected function firstName(string $name): string
    {
        return explode(' ', trim($name))[0] ?: $name;
    }

    protected function lastName(string $name): string
    {
        $parts = explode(' ', trim($name));

        return count($parts) > 1 ? (string) end($parts) : '';
    }

    protected function resolveAddress(Order $order, array $customer): array
    {
        $billing = $order->billing_details ?? [];
        $user = $order->user;

        return [
            'address_line_1' => $billing['address_line_1'] ?? $user?->address_line_1 ?? '',
            'address_line_2' => $billing['address_line_2'] ?? $user?->address_line_2 ?? null,
            'city' => $billing['city'] ?? $user?->city ?? '',
            'state' => $billing['state'] ?? $user?->state ?? '',
            'country' => $billing['country'] ?? $user?->country ?? 'India',
            'postal_code' => $billing['postal_code'] ?? $user?->postal_code ?? '',
        ];
    }

    protected function nimbblAddress(array $address, string $addressType): array
    {
        $line1 = trim((string) ($address['address_line_1'] ?? ''));
        $line2 = trim((string) ($address['address_line_2'] ?? ''));
        $city = trim((string) ($address['city'] ?? ''));

        return [
            'address_1' => $line1,
            'street' => $line2 !== '' ? $line2 : $line1,
            'landmark' => $line2 !== '' ? $line2 : $city,
            'area' => $city !== '' ? $city : $line1,
            'city' => $city,
            'state' => trim((string) ($address['state'] ?? '')),
            'pincode' => trim((string) ($address['postal_code'] ?? '')),
            'address_type' => $addressType,
        ];
    }

    protected function normalizePhone(string $phone): string
    {
        $digits = preg_replace('/\D+/', '', $phone) ?? '';

        if (str_starts_with($digits, '91') && strlen($digits) > 10) {
            $digits = substr($digits, 2);
        }

        if (str_starts_with($digits, '0') && strlen($digits) === 11) {
            $digits = substr($digits, 1);
        }

        return $digits;
    }
}
