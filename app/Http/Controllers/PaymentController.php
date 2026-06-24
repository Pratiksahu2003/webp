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
        $payload = $request->all();

        if ($request->filled('response')) {
            $parsed = $this->nimbbl->parseCallbackRequest($request->input('response'));
            if ($parsed !== []) {
                $payload = array_merge($payload, $parsed);
            }
        }

        $orderNumber = $payload['invoice_id']
            ?? $payload['order']
            ?? $payload['order_id']
            ?? null;

        $order = $orderNumber
            ? Order::where('order_number', $orderNumber)->first()
            : null;

        if (! $order) {
            return redirect()->route('checkout.failure')->with('error', 'Order not found.');
        }

        $transactionId = $payload['transaction_id']
            ?? $payload['nimbbl_transaction_id']
            ?? ($payload['transaction']['transaction_id'] ?? null)
            ?? 'TXN-'.strtoupper(uniqid());

        if ($this->nimbbl->verifyCallbackPayload($payload) || $request->input('status') === 'success') {
            $this->completePayment($order, $transactionId, $payload);

            return redirect()->route('checkout.success', $order)->with('success', 'Payment completed successfully.');
        }

        $order->markAsFailed($payload);

        return redirect()->route('checkout.failure', $order)->with('error', 'Payment failed. Please try again.');
    }

    public function webhook(Request $request)
    {
        $rawBody = $request->getContent();
        $signature = $request->header('X-Nimbbl-Signature') ?? $request->header('x-nimbbl-signature');

        if (! $this->nimbbl->verifyWebhookSignature($rawBody, $signature)) {
            Log::warning('Invalid Nimbbl webhook signature');

            return response()->json(['error' => 'Invalid signature'], 403);
        }

        $payload = $request->json()->all();
        $orderNumber = $payload['invoice_id'] ?? $payload['order_id'] ?? null;
        $order = $orderNumber ? Order::where('order_number', $orderNumber)->first() : null;

        if (! $order) {
            return response()->json(['error' => 'Order not found'], 404);
        }

        $transactionId = $payload['transaction_id']
            ?? $payload['nimbbl_transaction_id']
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

        return view('checkout.success', compact('order'));
    }

    public function failure(?Order $order = null)
    {
        return view('checkout.failure', compact('order'));
    }

    public function downloadInvoice(Request $request, Order $order)
    {
        abort_unless($order->payment_status === 'paid', 404);

        $order->load(['user', 'service', 'subService', 'package', 'transactions']);

        return view('customer.orders.invoice', compact('order'));
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
}
