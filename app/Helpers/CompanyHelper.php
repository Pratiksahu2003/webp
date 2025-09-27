<?php

namespace App\Helpers;

class CompanyHelper
{
    /**
     * Get company name
     */
    public static function name(): string
    {
        return config('company.name', 'VanTroZ');
    }

    /**
     * Get company tagline
     */
    public static function tagline(): string
    {
        return config('company.tagline', 'Your Trusted Technology Partner');
    }

    /**
     * Get company email
     */
    public static function email(): string
    {
        return config('company.contact.email', 'support@vantroz.com');
    }

    /**
     * Get company phone
     */
    public static function phone(): string
    {
        return config('company.contact.phone', '+91 9205668819');
    }

    /**
     * Get company address
     */
    public static function address(): array
    {
        return config('company.address.primary', [
            'name' => 'Head Office',
            'line1' => 'JMD MEGAPOLIS',
            'city' => 'Gurugram',
            'state' => 'Haryana',
            'country' => 'India',
            'full' => 'JMD MEGAPOLIS, Gurugram, Haryana, India',
        ]);
    }

    /**
     * Get full address as string
     */
    public static function fullAddress(): string
    {
        return config('company.address.primary.full', 'JMD MEGAPOLIS, Gurugram, Haryana, India');
    }

    /**
     * Get country flag
     */
    public static function countryFlag(): string
    {
        return config('company.contact.country_flag', '🇮🇳');
    }

    /**
     * Get logo path
     */
    public static function logo(string $type = 'light'): string
    {
        return config("company.branding.logo.{$type}", '/images/logo-light.png');
    }

    /**
     * Get social media links
     */
    public static function social(): array
    {
        return config('company.social', [
            'facebook' => '#',
            'twitter' => '#',
            'linkedin' => '#',
            'instagram' => '#',
        ]);
    }
}