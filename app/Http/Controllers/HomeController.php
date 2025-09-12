<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Service;
use App\Models\CaseStudy;
use App\Models\Technology;
use App\Models\Testimonial;
use App\Models\Client;
use App\Models\BlogPost;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        $sections = Section::active()->ordered()->get();
        $services = Service::active()->ordered()->get();
        $caseStudies = CaseStudy::active()->ordered()->take(4)->get();
        $technologies = Technology::active()->ordered()->get();
        $testimonials = Testimonial::active()->ordered()->get();
        $clients = Client::active()->ordered()->get();
        $blogPosts = BlogPost::published()->orderBy('published_at', 'desc')->take(6)->get();
        
        return view('home', compact('sections', 'services', 'caseStudies', 'technologies', 'testimonials', 'clients', 'blogPosts'));
    }

    public function about()
    {
        $sections = Section::active()->ordered()->get();
        return view('about', compact('sections'));
    }

    public function services()
    {
        $services = Service::active()->ordered()->get();
        $sections = Section::active()->ordered()->get();
        return view('services', compact('services', 'sections'));
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
}
