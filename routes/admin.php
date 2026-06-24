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
