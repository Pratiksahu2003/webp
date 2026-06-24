<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class NimbblPaymentService
{
    protected string $baseUrl;

    protected ?string $accessKey;

    protected ?string $accessSecret;

    public function __construct()
    {
        $this->baseUrl = rtrim(config('nimbbl.base_url'), '/');
        $this->accessKey = config('nimbbl.access_key');
        $this->accessSecret = config('nimbbl.access_secret');
    }

    public function createOrder(Order $order, array $customer): array
    {
        if (! $this->accessKey || ! $this->accessSecret) {
            return $this->mockCreateOrder($order, $customer);
        }

        $payload = [
            'invoice_id' => $order->order_number,
            'total_amount' => (float) $order->amount,
            'currency' => config('nimbbl.currency', 'INR'),
            'user' => [
                'email' => $customer['email'],
                'first_name' => $this->firstName($customer['name']),
                'last_name' => $this->lastName($customer['name']),
                'mobile_number' => $customer['phone'] ?? '',
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

        $response = Http::withHeaders($this->authHeaders())
            ->post("{$this->baseUrl}/api/v3/create-order", $payload);

        if ($response->failed()) {
            Log::error('Nimbbl create order failed', [
                'order' => $order->order_number,
                'response' => $response->json(),
            ]);

            throw new \RuntimeException('Unable to initiate payment. Please try again.');
        }

        return $response->json();
    }

    public function verifyCallbackPayload(array $payload): bool
    {
        $status = strtolower($payload['status'] ?? $payload['payment_status'] ?? '');

        return in_array($status, ['success', 'paid', 'completed', 'succeeded'], true);
    }

    public function verifyWebhookSignature(string $rawBody, ?string $signature): bool
    {
        $secret = config('nimbbl.webhook_secret');

        if (! $secret || ! $signature) {
            return app()->environment('local', 'testing');
        }

        $expected = hash_hmac('sha256', $rawBody, $secret);

        return hash_equals($expected, $signature);
    }

    public function decodeCallbackResponse(?string $encoded): array
    {
        if (! $encoded) {
            return [];
        }

        $decoded = base64_decode($encoded, true);

        if ($decoded === false) {
            return [];
        }

        return json_decode($decoded, true) ?? [];
    }

    protected function authHeaders(): array
    {
        return [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'access_key' => $this->accessKey,
            'access_secret' => $this->accessSecret,
        ];
    }

    protected function mockCreateOrder(Order $order, array $customer): array
    {
        return [
            'token' => 'mock_token_'.$order->order_number,
            'order_id' => $order->order_number,
            'status' => 'created',
            'mock' => true,
            'callback_url' => route('payment.callback', [
                'order' => $order->order_number,
                'status' => 'success',
                'transaction_id' => 'MOCK-'.strtoupper(uniqid()),
            ]),
        ];
    }

    protected function firstName(string $name): string
    {
        return explode(' ', trim($name))[0] ?? $name;
    }

    protected function lastName(string $name): string
    {
        $parts = explode(' ', trim($name));

        return count($parts) > 1 ? end($parts) : '';
    }
}
