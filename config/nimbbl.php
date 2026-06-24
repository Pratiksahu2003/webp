<?php

return [

    'access_key' => env('NIMBBL_ACCESS_KEY'),
    'access_secret' => env('NIMBBL_ACCESS_SECRET'),

    'base_url' => env('NIMBBL_BASE_URL', 'https://api.nimbbl.tech/api/'),
    'api_version' => env('NIMBBL_API_VERSION', 'v3'),

    'merchant_token_cache_key' => env('NIMBBL_MERCHANT_TOKEN_CACHE_KEY', 'nimbbl.merchant_token'),
    'merchant_token_cache_ttl' => (int) env('NIMBBL_MERCHANT_TOKEN_CACHE_TTL', 1140),

    'encrypt_payload' => (bool) env('NIMBBL_ENCRYPT_PAYLOAD', false),
    'log_file' => env('NIMBBL_LOG_FILE'),

    'register_routes' => (bool) env('NIMBBL_REGISTER_ROUTES', true),
    'webhook_path' => env('NIMBBL_WEBHOOK_PATH', 'nimbbl/webhook'),
    'callback_path' => env('NIMBBL_CALLBACK_PATH', 'nimbbl/callback'),
    'route_middleware' => ['api'],

    'currency' => env('NIMBBL_CURRENCY', 'INR'),

    'checkout_script' => env('NIMBBL_CHECKOUT_SCRIPT', 'https://cdn.jsdelivr.net/npm/nimbbl_sonic@latest'),
    'webhook_secret' => env('NIMBBL_WEBHOOK_SECRET'),

    'database' => [
        'enabled' => (bool) env('NIMBBL_DATABASE_LOGGING', true),
        'payments_table' => env('NIMBBL_PAYMENTS_TABLE', 'nimbbl_payments'),
        'logs_table' => env('NIMBBL_LOGS_TABLE', 'nimbbl_payment_logs'),
        'user_model' => env('NIMBBL_USER_MODEL', 'App\\Models\\User'),
        'user_foreign_key' => env('NIMBBL_USER_FOREIGN_KEY', 'user_id'),
        'auth_guard' => env('NIMBBL_AUTH_GUARD'),
        'hidden_log_keys' => [
            'token', 'order_token', 'access_secret', 'access_key', 'otp', 'card_number', 'cvv',
        ],
    ],

];
