<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Company Information
    |--------------------------------------------------------------------------
    |
    | This file contains all company contact information and branding details
    | that are used throughout the application.
    |
    */

    'name' => 'VanTroZ',
    'legal_name' => 'Vantroz Technology Private Limited',
    'tagline' => 'Your Trusted Technology Partner',

    'contact' => [
        'email' => 'support@vantroz.com',
        'phone' => '+91 9205668819',
        'country_code' => '+91',
        'country_flag' => '🇮🇳',
        'flag_image' => 'images/flags/india.svg',
    ],

    'address' => [
        'primary' => [
            'name' => 'Head Office',
            'line1' => 'JMD MEGAPOLIS',
            'city' => 'Gurugram',
            'state' => 'Haryana',
            'postal_code' => '122018',
            'country' => 'India',
            'full' => 'JMD MEGAPOLIS, Gurugram, Haryana, India',
        ],
    ],

    'geo' => [
        'latitude' => 28.4128,
        'longitude' => 77.0425,
    ],

    'branding' => [
        'logo' => [
            'light' => '/logo/logo.png',
            'dark' => '/logo/logo.png',
            'favicon' => '/favicon.ico',
        ],
        'colors' => [
            'primary' => '#f97316', // orange-500
            'secondary' => '#1f2937', // gray-800
        ],
    ],

    'social' => [
        'facebook' => 'https://www.facebook.com/profile.php?id=61581048286092',
        'twitter' => 'https://x.com/Vantroz_IT',
        'linkedin' => 'https://www.linkedin.com/in/vantroz-technology-133474398/',
        'instagram' => 'https://www.instagram.com/vantroz.technology/',
    ],

    'seo' => [
        'default_title' => 'VanTroZ - Software Development Company in Gurugram',
        'default_description' => 'VanTroZ is a Gurugram-based software development company offering web development, mobile apps, custom software, and digital transformation for growing businesses.',
        'default_image' => '/logo/logo.png',
        'locale' => 'en_IN',
        'twitter_handle' => '@Vantroz_IT',
    ],
];