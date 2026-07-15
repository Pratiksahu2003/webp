<?php

namespace App\Http\Controllers;

use App\Mail\OrderPaymentSuccessMail;
use App\Models\Order;
use App\Services\NimbblPaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function __construct(
        protected NimbblPaymentService $nimbbl
    ) {}

    public function callback(Request $request)
    {
        $payload = $this->resolveCallbackPayload($request);

        Log::info('Payment callback received', [
            'method' => $request->method(),
            'order_number' => $this->nimbbl->resolveOrderNumber($payload),
            'status' => $payload['status'] ?? $payload['transaction']['status'] ?? null,
        ]);

        $order = $this->resolveOrder($payload, $request);

        if (! $order) {
            return $this->callbackResponse($request, route('checkout.failure'), [
                'error' => 'We could not find your order. If you were charged, please contact support with your payment reference.',
                'error_type' => 'not_found',
            ]);
        }

        $payload = $this->nimbbl->normalizeCallbackPayload($payload);

        $transactionId = $payload['nimbbl_transaction_id']
            ?? $payload['transaction_id']
            ?? ($payload['transaction']['transaction_id'] ?? null)
            ?? 'TXN-'.strtoupper(uniqid());

        if ($this->isSuccessfulCallback($payload, $request)) {
            $this->completePayment($order, $transactionId, $payload);

            return $this->callbackResponse($request, route('checkout.success', $order), [
                'success' => 'Payment completed successfully.',
            ]);
        }

        $failure = $this->resolveFailureReason($payload, $request);
        $order->markAsFailed($payload);

        return $this->callbackResponse($request, route('checkout.failure', $order), [
            'error' => $failure['message'],
            'error_type' => $failure['type'],
        ]);
    }

    public function webhook(Request $request)
    {
        $rawBody = $request->getContent();
        $signature = $request->header('X-Nimbbl-Signature') ?? $request->header('x-nimbbl-signature');

        if (! $this->nimbbl->verifyWebhookSignature($rawBody, $signature)) {
            Log::warning('Invalid Nimbbl webhook signature');

            return response()->json(['error' => 'Invalid signature'], 403);
        }

        $payload = $this->nimbbl->normalizeCallbackPayload($request->json()->all());
        $orderNumber = $this->nimbbl->resolveOrderNumber($payload);
        $order = $orderNumber ? Order::where('order_number', $orderNumber)->first() : null;

        if (! $order) {
            return response()->json(['error' => 'Order not found'], 404);
        }

        $transactionId = $payload['nimbbl_transaction_id']
            ?? $payload['transaction_id']
            ?? ($payload['transaction']['transaction_id'] ?? null);

        if ($this->nimbbl->verifyCallbackPayload($payload)) {
            $this->completePayment($order, $transactionId ?? 'WH-'.uniqid(), $payload);
        } else {
            $order->markAsFailed($payload);
        }

        return response()->json(['success' => true]);
    }

    public function success(Order $order)
    {
        $order->load(['package', 'subService', 'service', 'user']);

        if ($order->payment_status === 'paid') {
            return view('checkout.success', compact('order'));
        }

        if (in_array($order->payment_status, ['pending', 'processing'], true)) {
            return view('checkout.failure', [
                'order' => $order,
                'errorType' => 'pending',
                'message' => 'Your payment is still being processed. We will email you once it is confirmed.',
            ]);
        }

        return redirect()->route('checkout.failure', $order)
            ->with('error', 'This order has not been paid yet. Please complete payment or try again.')
            ->with('error_type', 'failed');
    }

    public function failure(Request $request, ?Order $order = null)
    {
        $order?->load(['package', 'subService', 'service', 'user']);

        if ($order && $order->payment_status === 'paid') {
            return redirect()->route('checkout.success', $order);
        }

        $errorType = session('error_type', $request->query('reason', 'failed'));
        $message = session('error', $request->query('message'));

        if (! in_array($errorType, ['failed', 'cancelled', 'not_found', 'pending', 'expired'], true)) {
            $errorType = 'failed';
        }

        return view('checkout.failure', compact('order', 'errorType', 'message'));
    }

    public function downloadInvoice(Request $request, Order $order)
    {
        $order->load(['user', 'service', 'subService', 'package', 'transactions']);

        return view('invoices.order', compact('order'));
    }

    protected function resolveCallbackPayload(Request $request): array
    {
        $payload = $request->all();

        if ($request->filled('response')) {
            $parsed = $this->nimbbl->parseCallbackRequest($request->input('response'));
            if ($parsed !== []) {
                return array_merge($payload, $parsed);
            }
        }

        if ($request->filled('callback')) {
            $callback = $request->input('callback');
            if (is_string($callback)) {
                $callback = json_decode($callback, true);
            }

            if (is_array($callback)) {
                return array_merge($payload, $this->nimbbl->normalizeCallbackPayload($callback));
            }
        }

        if ($request->isJson()) {
            $json = $request->json()->all();
            if (isset($json['callback']) && is_array($json['callback'])) {
                return array_merge($json, $this->nimbbl->normalizeCallbackPayload($json['callback']));
            }

            return $this->nimbbl->normalizeCallbackPayload($json);
        }

        return $this->nimbbl->normalizeCallbackPayload($payload);
    }

    protected function resolveOrder(array $payload, Request $request): ?Order
    {
        $orderNumber = $this->nimbbl->resolveOrderNumber($payload) ?? $request->input('order');

        if ($orderNumber) {
            return Order::where('order_number', $orderNumber)->first();
        }

        return null;
    }

    protected function isSuccessfulCallback(array $payload, Request $request): bool
    {
        if ($this->nimbbl->verifyCallbackPayload($payload)) {
            return true;
        }

        return strtolower((string) $request->input('status')) === 'success';
    }

    protected function callbackResponse(Request $request, string $url, array $flash = [])
    {
        if ($request->expectsJson() || $request->ajax() || $request->wantsJson()) {
            return response()->json(array_merge(['redirect' => $url], $flash));
        }

        $redirect = redirect($url);

        foreach ($flash as $key => $value) {
            $redirect->with($key, $value);
        }

        return $redirect;
    }

    protected function completePayment(Order $order, string $transactionId, array $payload): void
    {
        if (! $order->markAsPaid($transactionId, $payload)) {
            return;
        }

        try {
            $order->load(['user', 'service', 'subService', 'package']);

            Mail::to($order->user->email)->send(
                new OrderPaymentSuccessMail($order, $order->signedInvoiceUrl())
            );
        } catch (\Throwable $e) {
            Log::error('Failed to send payment confirmation email', [
                'order' => $order->order_number,
                'email' => $order->user->email ?? null,
                'error' => $e->getMessage(),
            ]);
        }
    }

    protected function resolveFailureReason(array $payload, Request $request): array
    {
        $payload = $this->nimbbl->normalizeCallbackPayload($payload);

        $status = strtolower((string) (
            $payload['status']
            ?? $payload['payment_status']
            ?? $payload['transaction']['status']
            ?? $request->input('status')
            ?? ''
        ));

        if (in_array($status, ['cancelled', 'canceled', 'user_cancelled', 'cancel'], true)) {
            return [
                'type' => 'cancelled',
                'message' => 'Payment was cancelled. No amount has been charged.',
            ];
        }

        if (in_array($status, ['pending', 'processing', 'initiated'], true)) {
            return [
                'type' => 'pending',
                'message' => 'Your payment is still being processed. We will email you once it is confirmed.',
            ];
        }

        $gatewayMessage = $payload['nimbbl_consumer_message']
            ?? $payload['message']
            ?? $payload['error']['nimbbl_consumer_message'] ?? null;

        return [
            'type' => 'failed',
            'message' => $gatewayMessage ?: 'Your payment could not be processed. Please try again.',
        ];
    }
}
