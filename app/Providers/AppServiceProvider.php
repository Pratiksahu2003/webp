<?php

namespace App\Providers;

use App\View\Composers\CatalogNavigationComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \Illuminate\Support\Facades\Route::bind('package', function ($value) {
            return \App\Models\ServicePackage::findOrFail($value);
        });

        \Illuminate\Support\Facades\Route::bind('invoice', function ($value) {
            return \App\Models\Order::where('source', 'admin')->findOrFail($value);
        });

        \Illuminate\Support\Facades\Route::bind('customer', function ($value) {
            return \App\Models\User::where('role', 'user')->findOrFail($value);
        });

        View::composer(['layouts.website', 'components.footer', 'home'], CatalogNavigationComposer::class);

        try {
            app(\App\Services\PaymentGatewaySettingsService::class)->applyToConfig();
        } catch (\Throwable) {
            // Settings table may not exist during early installs / migrations.
        }
    }
}
