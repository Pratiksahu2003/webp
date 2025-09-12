<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;
use App\Models\Section;

class BlogController extends Controller
{
    public function index()
    {
        $blogPosts = BlogPost::published()->orderBy('published_at', 'desc')->paginate(9);
        $sections = Section::active()->ordered()->get();
        return view('blog.index', compact('blogPosts', 'sections'));
    }

    public function show(BlogPost $blogPost)
    {
        $blogPost->incrementViews();
        $sections = Section::active()->ordered()->get();
        $relatedPosts = BlogPost::published()
            ->where('category', $blogPost->category)
            ->where('id', '!=', $blogPost->id)
            ->take(3)
            ->get();
        
        return view('blog.show', compact('blogPost', 'sections', 'relatedPosts'));
    }

    public function category($category)
    {
        $blogPosts = BlogPost::published()
            ->where('category', $category)
            ->orderBy('published_at', 'desc')
            ->paginate(9);
        $sections = Section::active()->ordered()->get();
        
        return view('blog.category', compact('blogPosts', 'sections', 'category'));
    }
}
