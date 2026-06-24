<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Models\ServicePackage;
use App\Services\CheckoutService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $order = $this->checkoutService->createOrder($package, $request->validated());
        Auth::login($order->user);
        $payment = $this->checkoutService->initiatePayment($order);

        if (! empty($payment['mock'])) {
            return redirect($payment['callback_url']);
        }

        return view('checkout.payment', [
            'order' => $order->load(['package', 'subService', 'service']),
            'paymentToken' => $payment['token'] ?? null,
            'nimbblScript' => config('nimbbl.checkout_script'),
        ]);
    }
}
