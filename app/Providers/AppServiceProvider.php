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

        View::composer(['layouts.website', 'components.footer'], CatalogNavigationComposer::class);
    }
}
