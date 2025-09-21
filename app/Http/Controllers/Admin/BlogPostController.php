<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogPostRequest;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = BlogPost::query();

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%")
                  ->orWhere('author', 'like', "%{$search}%");
            });
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by category
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Filter by featured
        if ($request->filled('featured')) {
            $query->where('is_featured', $request->boolean('featured'));
        }

        // Order by latest
        $query->orderBy('created_at', 'desc');

        $blogPosts = $query->paginate(15)->withQueryString();

        // Get statistics
        $stats = [
            'total' => BlogPost::count(),
            'published' => BlogPost::where('status', 'published')->count(),
            'draft' => BlogPost::where('status', 'draft')->count(),
            'scheduled' => BlogPost::where('status', 'scheduled')->count(),
            'featured' => BlogPost::where('is_featured', true)->count(),
            'total_views' => BlogPost::sum('views'),
        ];

        // Get categories for filter
        $categories = BlogPost::distinct('category')
            ->whereNotNull('category')
            ->pluck('category')
            ->sort();

        return view('admin.blog-posts.index', compact('blogPosts', 'stats', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->getCategories();
        $authors = $this->getAuthors();
        
        return view('admin.blog-posts.create', compact('categories', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogPostRequest $request)
    {
        $data = $request->validated();
        
        // Set author if not provided
        if (!isset($data['author'])) {
            $data['author'] = auth()->user()->name;
        }

        // Handle slug generation
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        // Set published_at based on status
        if ($data['status'] === 'published' && !isset($data['published_at'])) {
            $data['published_at'] = now();
        }

        // Create the blog post
        $blogPost = BlogPost::create($data);

        return redirect()
            ->route('admin.blog-posts.edit', $blogPost)
            ->with('success', 'Blog post created successfully! You can continue editing or add SEO details.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogPost $blogPost)
    {
        return view('admin.blog-posts.show', compact('blogPost'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogPost $blogPost)
    {
        $categories = $this->getCategories();
        $authors = $this->getAuthors();
        
        return view('admin.blog-posts.edit', compact('blogPost', 'categories', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogPostRequest $request, BlogPost $blogPost)
    {
        $data = $request->validated();

        // Set published_at when status changes to published
        if ($data['status'] === 'published' && $blogPost->status !== 'published' && !isset($data['published_at'])) {
            $data['published_at'] = now();
        }

        // Update the blog post
        $blogPost->update($data);

        return redirect()
            ->route('admin.blog-posts.edit', $blogPost)
            ->with('success', 'Blog post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogPost $blogPost)
    {
        // Delete associated images if they exist
        if ($blogPost->featured_image && Storage::exists($blogPost->featured_image)) {
            Storage::delete($blogPost->featured_image);
        }

        if ($blogPost->og_image && Storage::exists($blogPost->og_image)) {
            Storage::delete($blogPost->og_image);
        }

        if ($blogPost->twitter_image && Storage::exists($blogPost->twitter_image)) {
            Storage::delete($blogPost->twitter_image);
        }

        $blogPost->delete();

        return redirect()
            ->route('admin.blog-posts.index')
            ->with('success', 'Blog post deleted successfully!');
    }

    /**
     * Bulk actions for multiple blog posts
     */
    public function bulkAction(Request $request)
    {
        $request->validate([
            'action' => 'required|in:delete,publish,draft,feature,unfeature',
            'selected_posts' => 'required|array|min:1',
            'selected_posts.*' => 'exists:blog_posts,id'
        ]);

        $posts = BlogPost::whereIn('id', $request->selected_posts);
        $count = $posts->count();

        switch ($request->action) {
            case 'delete':
                $posts->delete();
                $message = "{$count} blog posts deleted successfully!";
                break;
            
            case 'publish':
                $posts->update([
                    'status' => 'published',
                    'published_at' => now()
                ]);
                $message = "{$count} blog posts published successfully!";
                break;
            
            case 'draft':
                $posts->update(['status' => 'draft']);
                $message = "{$count} blog posts moved to draft!";
                break;
            
            case 'feature':
                $posts->update(['is_featured' => true]);
                $message = "{$count} blog posts marked as featured!";
                break;
            
            case 'unfeature':
                $posts->update(['is_featured' => false]);
                $message = "{$count} blog posts unmarked as featured!";
                break;
        }

        return redirect()
            ->route('admin.blog-posts.index')
            ->with('success', $message);
    }

    /**
     * Duplicate a blog post
     */
    public function duplicate(BlogPost $blogPost)
    {
        $newPost = $blogPost->replicate();
        $newPost->title = $newPost->title . ' (Copy)';
        $newPost->slug = $newPost->slug . '-copy';
        $newPost->status = 'draft';
        $newPost->published_at = null;
        $newPost->views = 0;
        $newPost->save();

        return redirect()
            ->route('admin.blog-posts.edit', $newPost)
            ->with('success', 'Blog post duplicated successfully!');
    }

    /**
     * Preview blog post
     */
    public function preview(BlogPost $blogPost)
    {
        return view('blog.show', compact('blogPost'));
    }

    /**
     * Get SEO analysis for a blog post
     */
    public function seoAnalysis(BlogPost $blogPost)
    {
        $analysis = [
            'seo_score' => $blogPost->seo_score,
            'word_count' => $blogPost->word_count,
            'reading_time' => $blogPost->reading_time_formatted,
            'focus_keywords' => $blogPost->focus_keywords ?? [],
            'recommendations' => $this->generateSeoRecommendations($blogPost),
        ];

        return response()->json($analysis);
    }

    /**
     * Generate SEO recommendations
     */
    private function generateSeoRecommendations(BlogPost $blogPost)
    {
        $recommendations = [];

        // Title recommendations
        if (!$blogPost->meta_title) {
            $recommendations[] = [
                'type' => 'warning',
                'message' => 'Add an SEO title (meta title) for better search engine optimization.'
            ];
        } elseif (strlen($blogPost->meta_title) > 60) {
            $recommendations[] = [
                'type' => 'error',
                'message' => 'SEO title is too long. Keep it under 60 characters.'
            ];
        }

        // Description recommendations
        if (!$blogPost->meta_description) {
            $recommendations[] = [
                'type' => 'warning',
                'message' => 'Add a meta description to improve search engine snippets.'
            ];
        } elseif (strlen($blogPost->meta_description) < 120 || strlen($blogPost->meta_description) > 160) {
            $recommendations[] = [
                'type' => 'warning',
                'message' => 'Meta description should be between 120-160 characters for optimal SEO.'
            ];
        }

        // Content recommendations
        if ($blogPost->word_count < 300) {
            $recommendations[] = [
                'type' => 'warning',
                'message' => 'Content is quite short. Consider adding more detailed information (300+ words recommended).'
            ];
        }

        // Image recommendations
        if (!$blogPost->featured_image) {
            $recommendations[] = [
                'type' => 'info',
                'message' => 'Add a featured image to improve social media sharing and user engagement.'
            ];
        }

        // Focus keywords
        if (!$blogPost->focus_keywords || count($blogPost->focus_keywords) === 0) {
            $recommendations[] = [
                'type' => 'info',
                'message' => 'Add focus keywords to track SEO performance for specific terms.'
            ];
        }

        return $recommendations;
    }

    /**
     * Get available categories
     */
    private function getCategories()
    {
        return [
            'Technology' => 'Technology',
            'Design' => 'Design',
            'Business' => 'Business',
            'Marketing' => 'Marketing',
            'Development' => 'Development',
            'Tutorials' => 'Tutorials',
            'News' => 'News',
            'Tips' => 'Tips',
            'Reviews' => 'Reviews',
            'Case Studies' => 'Case Studies',
        ];
    }

    /**
     * Get available authors
     */
    private function getAuthors()
    {
        return \App\Models\User::where('role', 'admin')
            ->orWhere('role', 'editor')
            ->pluck('name', 'name')
            ->toArray();
    }
}
