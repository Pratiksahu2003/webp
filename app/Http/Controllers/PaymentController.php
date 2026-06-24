<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\NimbblPaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function __construct(
        protected NimbblPaymentService $nimbbl
    ) {}

    public function callback(Request $request)
    {
        $payload = $request->all();

        if ($request->filled('response')) {
            $payload = array_merge($payload, $this->nimbbl->decodeCallbackResponse($request->input('response')));
        }

        $orderNumber = $payload['order'] ?? $payload['invoice_id'] ?? $payload['order_id'] ?? null;
        $order = Order::where('order_number', $orderNumber)->first();

        if (! $order) {
            return redirect()->route('checkout.failure')->with('error', 'Order not found.');
        }

        $transactionId = $payload['transaction_id'] ?? $payload['nimbbl_transaction_id'] ?? 'TXN-'.strtoupper(uniqid());

        if ($this->nimbbl->verifyCallbackPayload($payload) || $request->input('status') === 'success') {
            $order->markAsPaid($transactionId, $payload);

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
        $order = Order::where('order_number', $orderNumber)->first();

        if (! $order) {
            return response()->json(['error' => 'Order not found'], 404);
        }

        $transactionId = $payload['transaction_id'] ?? $payload['nimbbl_transaction_id'] ?? null;

        if ($this->nimbbl->verifyCallbackPayload($payload)) {
            $order->markAsPaid($transactionId ?? 'WH-'.uniqid(), $payload);
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
}
