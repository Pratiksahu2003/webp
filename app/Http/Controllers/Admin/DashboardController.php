<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Section;
use App\Models\Service;
use App\Models\CaseStudy;
use App\Models\Technology;
use App\Models\Testimonial;
use App\Models\Client;
use App\Models\BlogPost;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'pages' => Page::count(),
            'sections' => Section::count(),
            'services' => Service::count(),
            'caseStudies' => CaseStudy::count(),
            'technologies' => Technology::count(),
            'testimonials' => Testimonial::count(),
            'clients' => Client::count(),
            'blogPosts' => BlogPost::count(),
            'publishedPosts' => BlogPost::published()->count(),
        ];

        $recentBlogPosts = BlogPost::latest()->take(5)->get();
        $recentCaseStudies = CaseStudy::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentBlogPosts', 'recentCaseStudies'));
    }
}
