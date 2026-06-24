<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/case-studies', [HomeController::class, 'caseStudies'])->name('case-studies');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/technologies', [HomeController::class, 'technologies'])->name('technologies');
Route::get('/careers', [HomeController::class, 'careers'])->name('careers');
Route::get('/portfolio', [HomeController::class, 'portfolio'])->name('portfolio');

// Legal Pages
Route::get('/privacy-policy', [HomeController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/terms-conditions', [HomeController::class, 'termsConditions'])->name('terms-conditions');
Route::get('/refund-policy', [HomeController::class, 'refundPolicy'])->name('refund-policy');
Route::get('/cookie-policy', [HomeController::class, 'cookiePolicy'])->name('legal.cookie-policy');
Route::get('/sitemap', [HomeController::class, 'sitemap'])->name('sitemap');

// Blog Routes
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{blogPost:slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/blog/category/{category}', [BlogController::class, 'category'])->name('blog.category');

// Service Catalog & Checkout
Route::get('/catalog/services', [\App\Http\Controllers\ServiceCatalogController::class, 'index'])->name('catalog.services');
Route::get('/catalog/services/{service:slug}', [\App\Http\Controllers\ServiceCatalogController::class, 'show'])->name('catalog.services.show');
Route::get('/services/{service:slug}/{subService:slug}', [\App\Http\Controllers\ServiceCatalogController::class, 'subService'])->name('services.sub-service');

Route::get('/checkout/{package}', [\App\Http\Controllers\CheckoutController::class, 'show'])->name('checkout.show');
Route::post('/checkout/{package}', [\App\Http\Controllers\CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/payment/callback', [\App\Http\Controllers\PaymentController::class, 'callback'])->name('payment.callback');
Route::post('/payment/webhook', [\App\Http\Controllers\PaymentController::class, 'webhook'])->name('payment.webhook');
Route::get('/checkout/success/{order}', [\App\Http\Controllers\PaymentController::class, 'success'])->name('checkout.success');
Route::get('/checkout/failure/{order?}', [\App\Http\Controllers\PaymentController::class, 'failure'])->name('checkout.failure');

Route::middleware('auth')->prefix('my-account')->name('customer.')->group(function () {
    Route::get('/orders', [\App\Http\Controllers\CustomerDashboardController::class, 'index'])->name('dashboard');
    Route::get('/orders/{order}', [\App\Http\Controllers\CustomerDashboardController::class, 'show'])->name('orders.show');
    Route::get('/orders/{order}/invoice', [\App\Http\Controllers\CustomerDashboardController::class, 'invoice'])->name('orders.invoice');
});

// Admin Routes - Registered in bootstrap/app.php

// Admin Profile Routes (moved to admin routes in bootstrap/app.php)

require __DIR__.'/auth.php';
