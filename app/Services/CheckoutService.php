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
        protected NimbblPaymentService $nimbbl
    ) {}

    public function createOrder(ServicePackage $package, array $data): Order
    {
        return DB::transaction(function () use ($package, $data) {
            $user = $this->resolveUser($data);
            $package->load(['subService.service']);

            return Order::create([
                'user_id' => $user->id,
                'service_id' => $package->subService->service_id,
                'sub_service_id' => $package->sub_service_id,
                'package_id' => $package->id,
                'amount' => $package->final_price,
                'payment_gateway' => 'nimbbl',
                'payment_status' => 'pending',
                'customer_message' => $data['customer_message'] ?? null,
                'billing_details' => $this->billingDetails($data),
            ]);
        });
    }

    public function initiatePayment(Order $order): array
    {
        $order->load(['user', 'package', 'subService', 'service']);
        $order->update(['payment_status' => 'processing']);

        return $this->nimbbl->createOrder($order, [
            'name' => $order->user->name,
            'email' => $order->user->email,
            'phone' => $order->user->phone,
        ]);
    }

    public function checkoutCredentials(array $paymentResponse): array
    {
        return $this->nimbbl->checkoutCredentials($paymentResponse);
    }

    protected function resolveUser(array $data): User
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

    protected function billingDetails(array $data): array
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
}
