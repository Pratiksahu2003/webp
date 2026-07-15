<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdatePaymentGatewayRequest;
use App\Services\PaymentGatewaySettingsService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PaymentGatewayController extends Controller
{
    public function __construct(
        protected PaymentGatewaySettingsService $gatewaySettings
    ) {}

    public function edit(): View
    {
        $settings = $this->gatewaySettings->current();

        return view('admin.settings.payment-gateway', compact('settings'));
    }

    public function update(UpdatePaymentGatewayRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if (! filled($data['access_key'] ?? null) && ! filled(config('nimbbl.access_key'))) {
            return back()
                ->withInput()
                ->withErrors(['access_key' => 'Access key is required when no key is configured yet.']);
        }

        if (! filled($data['access_secret'] ?? null) && ! filled(config('nimbbl.access_secret'))) {
            return back()
                ->withInput()
                ->withErrors(['access_secret' => 'Access secret is required when no secret is configured yet.']);
        }

        $this->gatewaySettings->save($data);

        return redirect()
            ->route('admin.settings.payment-gateway.edit')
            ->with('success', 'Payment gateway settings saved.');
    }

    public function destroy(): RedirectResponse
    {
        $this->gatewaySettings->clearCredentials();

        return redirect()
            ->route('admin.settings.payment-gateway.edit')
            ->with('success', 'Dashboard payment credentials cleared. Environment values will be used if set.');
    }
}
