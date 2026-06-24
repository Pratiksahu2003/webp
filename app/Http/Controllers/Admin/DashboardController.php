<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\BlogPost;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'pages' => Page::count(),
            'blogPosts' => BlogPost::count(),
            'publishedPosts' => BlogPost::published()->count(),
        ];

        $recentBlogPosts = BlogPost::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentBlogPosts'));
    }
}
