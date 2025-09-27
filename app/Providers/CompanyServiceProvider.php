<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Helpers\CompanyHelper;

class CompanyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Share company data with all views
        View::share('company', [
            'name' => CompanyHelper::name(),
            'tagline' => CompanyHelper::tagline(),
            'email' => CompanyHelper::email(),
            'phone' => CompanyHelper::phone(),
            'address' => CompanyHelper::address(),
            'fullAddress' => CompanyHelper::fullAddress(),
            'countryFlag' => CompanyHelper::countryFlag(),
            'logo' => CompanyHelper::logo(),
            'social' => CompanyHelper::social(),
        ]);
    }
}