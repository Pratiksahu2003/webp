<?php

require __DIR__.'/vendor/autoload.php';
$app = require __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

try {
    $package = App\Models\ServicePackage::where('status', true)->first();
    if (! $package) {
        echo "NO_PACKAGE\n";
        exit(1);
    }

    $service = app(App\Services\CheckoutService::class);
    $order = $service->createOrder($package, [
        'name' => 'Test User',
        'email' => 'test'.time().'@example.com',
        'phone' => '9876543210',
        'company_name' => null,
        'address_line_1' => '123 Test St',
        'address_line_2' => null,
        'city' => 'Mumbai',
        'state' => 'MH',
        'country' => 'India',
        'postal_code' => '400001',
        'customer_message' => null,
    ]);

    $payment = $service->initiatePayment($order);
    echo "ORDER: {$order->order_number}\n";
    echo json_encode($payment, JSON_PRETTY_PRINT)."\n";
} catch (Throwable $e) {
    echo 'ERROR: '.$e->getMessage()."\n";
    echo $e->getTraceAsString()."\n";
}
