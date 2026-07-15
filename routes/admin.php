<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register 
admin routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "admin" middleware group.
|
*/

// Admin Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Admin Profile Routes
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

// Page Builder Routes
Route::prefix('pages')->name('pages.')->group(function () {
    Route::get('builder/{page?}', [PageController::class, 'builder'])->name('builder');
    Route::post('builder/{page?}', [PageController::class, 'saveBuilder'])->name('save-builder');
    Route::post('{page}/duplicate', [PageController::class, 'duplicate'])->name('duplicate');
    Route::post('{page}/toggle-status', [PageController::class, 'toggleStatus'])->name('toggle-status');
    Route::post('bulk-action', [PageController::class, 'bulkAction'])->name('bulk-action');
});

// Content Management - Resource Routes
Route::resources([
    'pages' => PageController::class,
    'blog-posts' => BlogPostController::class,
]);

// Blog Posts additional routes
Route::prefix('blog-posts')->name('blog-posts.')->group(function () {
    Route::post('bulk-action', [BlogPostController::class, 'bulkAction'])->name('bulk-action');
    Route::post('{blogPost}/duplicate', [BlogPostController::class, 'duplicate'])->name('duplicate');
    Route::get('{blogPost}/preview', [BlogPostController::class, 'preview'])->name('preview');
    Route::get('{blogPost}/seo-analysis', [BlogPostController::class, 'seoAnalysis'])->name('seo-analysis');
});

// Commerce Module Routes
Route::resource('service-categories', \App\Http\Controllers\Admin\Commerce\ServiceCategoryController::class)->except(['create', 'edit', 'show']);
Route::post('services/{service}/toggle-status', [\App\Http\Controllers\Admin\Commerce\ServiceController::class, 'toggleStatus'])->name('services.toggle-status');
Route::resource('services', \App\Http\Controllers\Admin\Commerce\ServiceController::class)->except(['show']);
Route::post('sub-services/{sub_service}/toggle-status', [\App\Http\Controllers\Admin\Commerce\SubServiceController::class, 'toggleStatus'])->name('sub-services.toggle-status');
Route::resource('sub-services', \App\Http\Controllers\Admin\Commerce\SubServiceController::class)->except(['show']);
Route::post('packages/{package}/toggle-status', [\App\Http\Controllers\Admin\Commerce\PackageController::class, 'toggleStatus'])->name('packages.toggle-status');
Route::resource('packages', \App\Http\Controllers\Admin\Commerce\PackageController::class)->except(['show']);
Route::post('technologies/{technology}/toggle-status', [\App\Http\Controllers\Admin\Commerce\TechnologyController::class, 'toggleStatus'])->name('technologies.toggle-status');
Route::resource('technologies', \App\Http\Controllers\Admin\Commerce\TechnologyController::class)->except(['show']);
Route::get('contact-leads/export', [\App\Http\Controllers\Admin\ContactLeadController::class, 'export'])->name('contact-leads.export');
Route::patch('contact-leads/{contactLead}/status', [\App\Http\Controllers\Admin\ContactLeadController::class, 'updateStatus'])->name('contact-leads.update-status');
Route::resource('contact-leads', \App\Http\Controllers\Admin\ContactLeadController::class)->only(['index', 'show']);

Route::get('orders/export', [\App\Http\Controllers\Admin\Commerce\OrderController::class, 'export'])->name('orders.export');
Route::patch('orders/{order}/status', [\App\Http\Controllers\Admin\Commerce\OrderController::class, 'updateStatus'])->name('orders.update-status');
Route::resource('orders', \App\Http\Controllers\Admin\Commerce\OrderController::class)->only(['index', 'show']);

Route::resource('customers', \App\Http\Controllers\Admin\Commerce\CustomerController::class);
Route::post('invoices/{invoice}/send', [\App\Http\Controllers\Admin\Commerce\InvoiceController::class, 'send'])->name('invoices.send');
Route::resource('invoices', \App\Http\Controllers\Admin\Commerce\InvoiceController::class)->only(['index', 'create', 'store', 'show']);

Route::get('settings/payment-gateway', [\App\Http\Controllers\Admin\PaymentGatewayController::class, 'edit'])->name('settings.payment-gateway.edit');
Route::put('settings/payment-gateway', [\App\Http\Controllers\Admin\PaymentGatewayController::class, 'update'])->name('settings.payment-gateway.update');
Route::delete('settings/payment-gateway', [\App\Http\Controllers\Admin\PaymentGatewayController::class, 'destroy'])->name('settings.payment-gateway.destroy');

// API Routes for AJAX requests
Route::prefix('api')->name('api.')->group(function () {
    // Quick actions
    Route::post('quick-stats', [DashboardController::class, 'quickStats'])->name('quick-stats');
    Route::post('recent-activity', [DashboardController::class, 'recentActivity'])->name('recent-activity');
    
    // Search functionality
    Route::get('search', function () {
        $query = request('q');
        $results = collect();
        
        if ($query) {
            $pages = \App\Models\Page::where('title', 'like', "%{$query}%")->limit(5)->get();
            $posts = \App\Models\BlogPost::where('title', 'like', "%{$query}%")->limit(5)->get();
            
            $results = $results->merge($pages->map(function ($item) {
                return [
                    'type' => 'page',
                    'title' => $item->title,
                    'url' => route('admin.pages.edit', $item)
                ];
            }));
            
            $results = $results->merge($posts->map(function ($item) {
                return [
                    'type' => 'blog',
                    'title' => $item->title,
                    'url' => route('admin.blog-posts.edit', $item)
                ];
            }));
        }
        
        return response()->json([
            'results' => $results->take(15)
        ]);
    })->name('search');
});
