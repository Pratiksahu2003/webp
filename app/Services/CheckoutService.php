<?php

namespace App\Services;

use App\Models\Order;
use App\Models\ServicePackage;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CheckoutService
{
    public function __construct(
        protected NimbblPaymentService $nimbbl,
        protected InvoiceTaxCalculator $taxCalculator,
        protected CompanyProfileService $companyProfile,
    ) {}

    public function createOrder(ServicePackage $package, array $data): Order
    {
        return DB::transaction(function () use ($package, $data) {
            $user = $this->resolveUser($data);
            $package->load(['subService.service']);
            $profile = $this->companyProfile->all();
            $gstRate = (float) ($profile['default_gst_rate'] ?? 18);
            $hsn = (string) ($profile['default_hsn_sac'] ?? '');

            $isInterstate = $this->taxCalculator->isInterstate(
                $profile['state'] ?? null,
                $data['state'] ?? $user->state
            );

            $taxed = $this->taxCalculator->calculate([[
                'title' => $package->package_name,
                'description' => trim($package->subService->service->title.' — '.$package->subService->title),
                'hsn' => $hsn,
                'quantity' => 1,
                'rate' => (float) $package->final_price,
                'gst_rate' => $gstRate,
            ]], $isInterstate, $gstRate);

            return Order::create([
                'user_id' => $user->id,
                'source' => 'checkout',
                'service_id' => $package->subService->service_id,
                'sub_service_id' => $package->sub_service_id,
                'package_id' => $package->id,
                'amount' => $taxed['amount'],
                'subtotal' => $taxed['subtotal'],
                'tax_amount' => $taxed['tax_amount'],
                'cgst_amount' => $taxed['cgst_amount'],
                'sgst_amount' => $taxed['sgst_amount'],
                'igst_amount' => $taxed['igst_amount'],
                'is_interstate' => $taxed['is_interstate'],
                'place_of_supply' => $data['state'] ?? ($profile['place_of_supply_default'] ?? null),
                'invoice_title' => $package->package_name,
                'invoice_date' => now()->toDateString(),
                'line_items' => $taxed['line_items'],
                'payment_gateway' => 'nimbbl',
                'payment_status' => 'pending',
                'customer_message' => $data['customer_message'] ?? null,
                'billing_details' => $this->billingDetails($data),
            ]);
        });
    }

    public function createAdminInvoice(User $client, array $data): Order
    {
        return DB::transaction(function () use ($client, $data) {
            $type = $data['type'] ?? 'custom';
            $billing = $this->billingDetailsFromUser($client);
            $profile = $this->companyProfile->all();
            $defaultGst = (float) ($profile['default_gst_rate'] ?? 18);
            $defaultHsn = trim((string) ($data['default_hsn'] ?? $profile['default_hsn_sac'] ?? '998314'));
            $placeOfSupply = filled($data['place_of_supply'] ?? null)
                ? trim((string) $data['place_of_supply'])
                : trim((string) ($client->state ?: ($profile['place_of_supply_default'] ?? '')));
            $buyerGstin = filled($data['buyer_gstin'] ?? null)
                ? strtoupper(trim((string) $data['buyer_gstin']))
                : null;

            $isInterstate = $this->taxCalculator->isInterstate(
                $profile['state'] ?? null,
                $placeOfSupply !== '' ? $placeOfSupply : null
            );

            if ($type === 'package') {
                $package = ServicePackage::with(['subService.service'])->findOrFail($data['package_id']);

                $taxed = $this->taxCalculator->calculate([[
                    'title' => $package->package_name,
                    'description' => trim($package->subService->service->title.' — '.$package->subService->title),
                    'hsn' => $defaultHsn,
                    'quantity' => 1,
                    'rate' => (float) $package->final_price,
                    'gst_rate' => $defaultGst,
                ]], $isInterstate, $defaultGst);

                return Order::create([
                    'user_id' => $client->id,
                    'source' => 'admin',
                    'service_id' => $package->subService->service_id,
                    'sub_service_id' => $package->sub_service_id,
                    'package_id' => $package->id,
                    'amount' => $taxed['amount'],
                    'subtotal' => $taxed['subtotal'],
                    'tax_amount' => $taxed['tax_amount'],
                    'cgst_amount' => $taxed['cgst_amount'],
                    'sgst_amount' => $taxed['sgst_amount'],
                    'igst_amount' => $taxed['igst_amount'],
                    'is_interstate' => $taxed['is_interstate'],
                    'place_of_supply' => $placeOfSupply !== '' ? $placeOfSupply : null,
                    'buyer_gstin' => $buyerGstin,
                    'invoice_title' => $data['invoice_title'] ?? $package->package_name,
                    'invoice_date' => $data['invoice_date'] ?? now()->toDateString(),
                    'line_items' => $taxed['line_items'],
                    'payment_gateway' => 'nimbbl',
                    'payment_status' => 'pending',
                    'notes' => $data['notes'] ?? null,
                    'billing_details' => $billing,
                ]);
            }

            $rawItems = collect($data['line_items'] ?? [])
                ->map(function ($item) use ($defaultGst, $defaultHsn) {
                    $hsn = trim((string) ($item['hsn'] ?? ''));

                    return [
                        'title' => trim((string) ($item['title'] ?? '')),
                        'description' => trim((string) ($item['description'] ?? '')),
                        'hsn' => $hsn !== '' ? $hsn : $defaultHsn,
                        'quantity' => (float) ($item['quantity'] ?? 1),
                        'rate' => (float) ($item['rate'] ?? 0),
                        'gst_rate' => (float) ($item['gst_rate'] ?? $defaultGst),
                    ];
                })
                ->filter(fn ($item) => $item['title'] !== '')
                ->values()
                ->all();

            $taxed = $this->taxCalculator->calculate($rawItems, $isInterstate, $defaultGst);

            return Order::create([
                'user_id' => $client->id,
                'source' => 'admin',
                'service_id' => null,
                'sub_service_id' => null,
                'package_id' => null,
                'amount' => $taxed['amount'],
                'subtotal' => $taxed['subtotal'],
                'tax_amount' => $taxed['tax_amount'],
                'cgst_amount' => $taxed['cgst_amount'],
                'sgst_amount' => $taxed['sgst_amount'],
                'igst_amount' => $taxed['igst_amount'],
                'is_interstate' => $taxed['is_interstate'],
                'place_of_supply' => $placeOfSupply !== '' ? $placeOfSupply : null,
                'buyer_gstin' => $buyerGstin,
                'invoice_title' => $data['invoice_title'] ?? ($taxed['line_items'][0]['title'] ?? 'Custom Invoice'),
                'invoice_date' => $data['invoice_date'] ?? now()->toDateString(),
                'line_items' => $taxed['line_items'],
                'payment_gateway' => 'nimbbl',
                'payment_status' => 'pending',
                'notes' => $data['notes'] ?? null,
                'billing_details' => $billing,
            ]);
        });
    }

    public function initiatePayment(Order $order): array
    {
        if ($order->isPaid()) {
            throw new \RuntimeException('This order is already paid.');
        }

        if (! $order->canAcceptPayment()) {
            throw new \RuntimeException('This invoice is no longer payable.');
        }

        $order->load(['user', 'package', 'subService', 'service']);

        try {
            $payment = $this->nimbbl->createOrder($order, [
                'name' => $order->user->name,
                'email' => $order->user->email,
                'phone' => $order->user->phone,
            ]);

            $order->update(['payment_status' => 'processing']);

            return $payment;
        } catch (\Throwable $e) {
            // Keep the order payable so the signed /pay link can be retried.
            if (! $order->isPaid()) {
                $order->update(['payment_status' => 'failed']);
            }

            throw $e;
        }
    }

    public function checkoutCredentials(array $paymentResponse): array
    {
        return $this->nimbbl->checkoutCredentials($paymentResponse);
    }

    public function resolveUser(array $data): User
    {
        $user = User::where('email', $data['email'])->first();

        $profile = [
            'name' => $data['name'],
            'phone' => $data['phone'],
            'company_name' => $data['company_name'] ?? null,
            'address_line_1' => $data['address_line_1'],
            'address_line_2' => $data['address_line_2'] ?? null,
            'city' => $data['city'],
            'state' => $data['state'],
            'country' => $data['country'],
            'postal_code' => $data['postal_code'],
        ];

        if ($user) {
            $user->update($profile);

            return $user;
        }

        return User::create(array_merge($profile, [
            'email' => $data['email'],
            'password' => Hash::make(Str::random(16)),
            'role' => 'user',
            'email_verified_at' => now(),
        ]));
    }

    public function billingDetails(array $data): array
    {
        return [
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'company_name' => $data['company_name'] ?? null,
            'address_line_1' => $data['address_line_1'],
            'address_line_2' => $data['address_line_2'] ?? null,
            'city' => $data['city'],
            'state' => $data['state'],
            'country' => $data['country'],
            'postal_code' => $data['postal_code'],
        ];
    }

    public function billingDetailsFromUser(User $user): array
    {
        return $this->billingDetails([
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone ?? '',
            'company_name' => $user->company_name,
            'address_line_1' => $user->address_line_1 ?? '',
            'address_line_2' => $user->address_line_2,
            'city' => $user->city ?? '',
            'state' => $user->state ?? '',
            'country' => $user->country ?? 'India',
            'postal_code' => $user->postal_code ?? '',
        ]);
    }
}
