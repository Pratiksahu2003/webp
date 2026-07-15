<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\CheckoutService;
use Illuminate\Support\Facades\Log;

class PaymentLinkController extends Controller
{
    public function __construct(
        protected CheckoutService $checkoutService
    ) {}

    public function show(Order $order)
    {
        if ($order->isPaid()) {
            return redirect()->route('checkout.success', $order);
        }

        if (! $order->canAcceptPayment()) {
            return redirect()
                ->route('checkout.failure', $order)
                ->with('error', 'This invoice is no longer payable.')
                ->with('error_type', 'expired');
        }

        try {
            $payment = $this->checkoutService->initiatePayment($order);
            $checkout = $this->checkoutService->checkoutCredentials($payment);

            return view('checkout.payment', [
                'order' => $order->fresh()->load(['user', 'package', 'subService', 'service']),
                'checkout' => $checkout,
                'isMock' => ! empty($checkout['mock']),
                'paymentRetryUrl' => $order->signedPaymentUrl(),
            ]);
        } catch (\Throwable $e) {
            Log::error('Payment link initiation failed', [
                'order' => $order->order_number,
                'error' => $e->getMessage(),
            ]);

            // Always keep a retry path on the signed payment link when unpaid.
            return redirect()
                ->route('checkout.failure', $order)
                ->with('error', $e->getMessage() ?: 'Unable to start payment. Please try again.')
                ->with('error_type', 'failed')
                ->with('payment_retry_url', $order->signedPaymentUrl());
        }
    }
}
