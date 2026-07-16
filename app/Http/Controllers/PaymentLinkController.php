<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\CheckoutService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class PaymentLinkController extends Controller
{
    public function __construct(
        protected CheckoutService $checkoutService
    ) {}

    public function retry(Order $order): View|RedirectResponse
    {
        if (! Order::canRetryFromSession($order) && ! request()->hasValidSignature()) {
            return redirect()
                ->route('checkout.failure', $order)
                ->with('error', 'This payment retry link has expired. Please use the button on the failure page to try again.')
                ->with('error_type', 'expired');
        }

        return $this->startPayment($order);
    }

    public function show(Order $order): View|RedirectResponse
    {
        return $this->startPayment($order);
    }

    protected function startPayment(Order $order): View|RedirectResponse
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
            $paymentRetryUrl = $order->rememberPaymentRetry();

            return view('checkout.payment', [
                'order' => $order->fresh()->load(['user', 'package', 'subService', 'service']),
                'checkout' => $checkout,
                'isMock' => ! empty($checkout['mock']),
                'paymentRetryUrl' => $paymentRetryUrl,
            ]);
        } catch (\Throwable $e) {
            Log::error('Payment link initiation failed', [
                'order' => $order->order_number,
                'error' => $e->getMessage(),
            ]);

            $order->rememberPaymentRetry();

            return redirect()
                ->route('checkout.failure', $order)
                ->with('error', $e->getMessage() ?: 'Unable to start payment. Please try again.')
                ->with('error_type', 'failed');
        }
    }
}
