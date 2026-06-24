<?php

return [
    'access_key' => env('NIMBBL_ACCESS_KEY'),
    'access_secret' => env('NIMBBL_ACCESS_SECRET'),
    'base_url' => env('NIMBBL_BASE_URL', 'https://api.nimbbl.tech'),
    'checkout_script' => env('NIMBBL_CHECKOUT_SCRIPT', 'https://checkout.nimbbl.tech/v3/checkout.js'),
    'webhook_secret' => env('NIMBBL_WEBHOOK_SECRET'),
    'callback_url' => env('NIMBBL_CALLBACK_URL'),
    'currency' => env('NIMBBL_CURRENCY', 'INR'),
];
