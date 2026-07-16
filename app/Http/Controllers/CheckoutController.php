<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Models\ServicePackage;
use App\Services\CheckoutService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    public function __construct(
        protected CheckoutService $checkoutService
    ) {}

    public function show(ServicePackage $package)
    {
        abort_unless($package->status, 404);

        $package->load(['subService.service', 'activeFeatures']);

        return view('checkout.show', compact('package'));
    }

    public function store(CheckoutRequest $request, ServicePackage $package)
    {
        abort_unless($package->status, 404);

        try {
            $order = $this->checkoutService->createOrder($package, $request->validated());
            Auth::login($order->user);
            $order->rememberPaymentRetry();

            $payment = $this->checkoutService->initiatePayment($order);
            $checkout = $this->checkoutService->checkoutCredentials($payment);

            return view('checkout.payment', [
                'order' => $order->load(['package', 'subService', 'service']),
                'checkout' => $checkout,
                'isMock' => ! empty($checkout['mock']),
                'paymentRetryUrl' => $order->rememberPaymentRetry(),
            ]);
        } catch (\Throwable $e) {
            Log::error('Checkout payment initiation failed', [
                'package_id' => $package->id,
                'error' => $e->getMessage(),
            ]);

            return back()
                ->withInput()
                ->withErrors(['payment' => $e->getMessage() ?: 'Unable to start payment. Please try again.']);
        }
    }
}
