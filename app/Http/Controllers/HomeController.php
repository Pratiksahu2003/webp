<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Service;
use App\Models\CaseStudy;
use App\Models\Technology;
use App\Models\Testimonial;
use App\Models\Client;
use App\Models\BlogPost;

class HomeController extends Controller
{
    public function index()
    {
        $sections = Section::active()->ordered()->get();
        $caseStudies = CaseStudy::active()->ordered()->take(4)->get();
        $technologies = Technology::active()->ordered()->get();
        $testimonials = Testimonial::active()->ordered()->get();
        $clients = Client::active()->ordered()->get();
        $blogPosts = BlogPost::published()->orderBy('published_at', 'desc')->take(6)->get();
        
        return view('home', compact('sections', 'caseStudies', 'technologies', 'testimonials', 'clients', 'blogPosts'));
    }

    public function about()
    {
        $sections = Section::active()->ordered()->get();
        return view('about', compact('sections'));
    }

    public function caseStudies()
    {
        $caseStudies = CaseStudy::active()->ordered()->get();
        $sections = Section::active()->ordered()->get();
        return view('case-studies', compact('caseStudies', 'sections'));
    }

    public function contact()
    {
        $sections = Section::active()->ordered()->get();
        return view('contact', compact('sections'));
    }

    public function technologies()
    {
        $technologies = Technology::active()->ordered()->get();
        $sections = Section::active()->ordered()->get();
        return view('technologies', compact('technologies', 'sections'));
    }

    public function careers()
    {
        return view('careers');
    }

    public function portfolio()
    {
        return view('portfolio');
    }

    // Legal Pages
    public function privacyPolicy()
    {
        return view('legal.privacy-policy');
    }

    public function termsConditions()
    {
        return view('legal.terms-conditions');
    }

    public function refundPolicy()
    {
        return view('legal.refund-policy');
    }

    public function cookiePolicy()
    {
        return view('legal.cookie-policy');
    }

    public function sitemap()
    {
        $catalogServices = Service::query()
            ->with(['activeSubServices' => fn ($query) => $query->ordered()])
            ->active()
            ->ordered()
            ->whereHas('subServices', fn ($query) => $query->where('status', true))
            ->get();

        return view('sitemap', compact('catalogServices'));
    }
}
