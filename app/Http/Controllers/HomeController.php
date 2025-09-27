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

    public function careers()
    {
        return view('careers');
    }

    public function portfolio()
    {
        return view('portfolio');
    }

    // Service Pages
    public function softwareDevelopment()
    {
        return view('services.software-development');
    }

    public function webDevelopment()
    {
        return view('services.web-development');
    }

    public function mobileDevelopment()
    {
        return view('services.mobile-development');
    }

    public function customSoftware()
    {
        return view('services.custom-software');
    }

    public function uiUxDesign()
    {
        return view('services.ui-ux-design');
    }

    public function dataScience()
    {
        return view('services.data-science');
    }

    public function qaTesting()
    {
        return view('services.qa-testing');
    }

    // Industry Pages
    public function healthcare()
    {
        return view('industries.healthcare');
    }

    public function fintech()
    {
        return view('industries.fintech');
    }

    public function ecommerce()
    {
        return view('industries.ecommerce');
    }

    public function education()
    {
        return view('industries.education');
    }

    public function realEstate()
    {
        return view('industries.real-estate');
    }

    public function logistics()
    {
        return view('industries.logistics');
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
}
