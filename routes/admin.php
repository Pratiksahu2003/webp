<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\CaseStudyController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\MediaController;
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

// Media Library Routes
Route::prefix('media')->name('media.')->group(function () {
    Route::get('/', [MediaController::class, 'index'])->name('index');
    Route::post('/', [MediaController::class, 'store'])->name('store');
    Route::get('{media}', [MediaController::class, 'show'])->name('show');
    Route::put('{media}', [MediaController::class, 'update'])->name('update');
    Route::delete('{media}', [MediaController::class, 'destroy'])->name('destroy');
    Route::post('bulk-delete', [MediaController::class, 'bulkDelete'])->name('bulk-delete');
    Route::post('create-folder', [MediaController::class, 'createFolder'])->name('create-folder');
});

// Content Management - Resource Routes
Route::resources([
    'pages' => PageController::class,
    'sections' => SectionController::class,
    'services' => ServiceController::class,
    'case-studies' => CaseStudyController::class,
    'technologies' => TechnologyController::class,
    'testimonials' => TestimonialController::class,
    'blog-posts' => BlogPostController::class,
    'clients' => ClientController::class,
]);

// Blog Posts additional routes
Route::prefix('blog-posts')->name('blog-posts.')->group(function () {
    Route::post('bulk-action', [BlogPostController::class, 'bulkAction'])->name('bulk-action');
    Route::post('{blogPost}/duplicate', [BlogPostController::class, 'duplicate'])->name('duplicate');
    Route::get('{blogPost}/preview', [BlogPostController::class, 'preview'])->name('preview');
    Route::get('{blogPost}/seo-analysis', [BlogPostController::class, 'seoAnalysis'])->name('seo-analysis');
});

// Settings Management
Route::prefix('settings')->name('settings.')->group(function () {
    Route::get('/', [SettingController::class, 'index'])->name('index');
    Route::post('/', [SettingController::class, 'store'])->name('store');
    Route::put('/', [SettingController::class, 'update'])->name('update');
    Route::post('backup', [SettingController::class, 'backup'])->name('backup');
    Route::post('restore', [SettingController::class, 'restore'])->name('restore');
    Route::post('cache-clear', [SettingController::class, 'clearCache'])->name('cache-clear');
});

// Advanced Admin Features
Route::prefix('tools')->name('tools.')->group(function () {
    // System Tools
    Route::get('system-info', function () {
        return view('admin.tools.system-info');
    })->name('system-info');
    
    // Database Tools
    Route::get('database', function () {
        return view('admin.tools.database');
    })->name('database');
    
    // Export/Import Tools
    Route::get('export', function () {
        return view('admin.tools.export');
    })->name('export');
    
    Route::get('import', function () {
        return view('admin.tools.import');
    })->name('import');
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
            // Search across all content types
            $pages = \App\Models\Page::where('title', 'like', "%{$query}%")->limit(5)->get();
            $services = \App\Models\Service::where('name', 'like', "%{$query}%")->limit(5)->get();
            $posts = \App\Models\BlogPost::where('title', 'like', "%{$query}%")->limit(5)->get();
            
            $results = $results->merge($pages->map(function ($item) {
                return [
                    'type' => 'page',
                    'title' => $item->title,
                    'url' => route('admin.pages.edit', $item)
                ];
            }));
            
            $results = $results->merge($services->map(function ($item) {
                return [
                    'type' => 'service',
                    'title' => $item->name,
                    'url' => route('admin.services.edit', $item)
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
