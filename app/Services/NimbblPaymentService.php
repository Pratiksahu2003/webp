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

        $order->loadMissing(['package', 'subService']);

        $payload = [
            'invoice_id' => $order->order_number,
            'total_amount' => (float) $order->amount,
            'currency' => config('nimbbl.currency', 'INR'),
            'user' => [
                'email' => $customer['email'],
                'first_name' => $this->firstName($customer['name']),
                'last_name' => $this->lastName($customer['name']),
                'mobile_number' => $customer['phone'] ?? '',
                'country_code' => '+91',
            ],
            'order_line_items' => [[
                'title' => $order->package->package_name ?? 'Service Package',
                'description' => $order->subService->title ?? '',
                'quantity' => 1,
                'rate' => (float) $order->amount,
            ]],
            'callback_url' => route('payment.callback'),
            'redirect_url' => route('payment.callback'),
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
        $status = strtolower((string) ($payload['status'] ?? $payload['payment_status'] ?? ''));

        if (in_array($status, ['success', 'paid', 'completed', 'succeeded'], true)) {
            return true;
        }

        $transactionStatus = strtolower((string) ($payload['transaction']['status'] ?? ''));

        return in_array($transactionStatus, ['success', 'paid', 'completed', 'succeeded'], true);
    }

    public function parseCallbackRequest(?string $encodedResponse): array
    {
        if (! $encodedResponse || ! $this->isConfigured()) {
            return [];
        }

        try {
            $payload = Nimbbl::parseCallbackPayload($encodedResponse);
            $verification = Nimbbl::verifyCallbackSignature($payload);

            if ($verification['success'] ?? false) {
                return $payload;
            }
        } catch (\Throwable $e) {
            Log::warning('Nimbbl callback verification failed', ['error' => $e->getMessage()]);
        }

        return [];
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
}
