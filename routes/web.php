<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/case-studies', [HomeController::class, 'caseStudies'])->name('case-studies');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/technologies', [HomeController::class, 'technologies'])->name('technologies');

// Service Routes
Route::get('/services/web-development', [HomeController::class, 'webDevelopment'])->name('services.web-development');
Route::get('/services/mobile-development', [HomeController::class, 'mobileDevelopment'])->name('services.mobile-development');
Route::get('/services/custom-software', [HomeController::class, 'customSoftware'])->name('services.custom-software');
Route::get('/services/ui-ux-design', [HomeController::class, 'uiUxDesign'])->name('services.ui-ux-design');
Route::get('/services/data-science', [HomeController::class, 'dataScience'])->name('services.data-science');
Route::get('/services/qa-testing', [HomeController::class, 'qaTesting'])->name('services.qa-testing');

// Industry Routes
Route::get('/industries/healthcare', [HomeController::class, 'healthcare'])->name('industries.healthcare');
Route::get('/industries/fintech', [HomeController::class, 'fintech'])->name('industries.fintech');
Route::get('/industries/ecommerce', [HomeController::class, 'ecommerce'])->name('industries.ecommerce');
Route::get('/industries/education', [HomeController::class, 'education'])->name('industries.education');
Route::get('/industries/real-estate', [HomeController::class, 'realEstate'])->name('industries.real-estate');
Route::get('/industries/logistics', [HomeController::class, 'logistics'])->name('industries.logistics');

// Legal Pages
Route::get('/privacy-policy', [HomeController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/terms-conditions', [HomeController::class, 'termsConditions'])->name('terms-conditions');
Route::get('/refund-policy', [HomeController::class, 'refundPolicy'])->name('refund-policy');

// Blog Routes
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{blogPost:slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/blog/category/{category}', [BlogController::class, 'category'])->name('blog.category');

// Admin Routes - Registered in bootstrap/app.php

// Admin Profile Routes (moved to admin routes in bootstrap/app.php)

require __DIR__.'/auth.php';
