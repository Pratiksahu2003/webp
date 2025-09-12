<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::with('sections')->latest()->paginate(15);
        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:pages',
            'content' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'template' => 'nullable|string|max:100',
            'page_builder_data' => 'nullable|json',
            'seo_settings' => 'nullable|json',
            'page_settings' => 'nullable|json',
            'featured_image' => 'nullable|string',
            'is_published' => 'boolean',
            'is_active' => 'boolean',
        ]);

        // Auto-generate slug if not provided
        if (!$validated['slug']) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Set published_at if publishing
        if ($validated['is_published'] ?? false) {
            $validated['published_at'] = now();
        }

        $page = Page::create($validated);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Page created successfully.',
                'page' => $page
            ]);
        }

        return redirect()->route('admin.pages.index')
            ->with('success', 'Page created successfully.');
    }

    public function show(Page $page)
    {
        $page->load('sections');
        return view('admin.pages.show', compact('page'));
    }

    public function edit(Page $page)
    {
        $page->load('sections');
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:pages,slug,' . $page->id,
            'content' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'template' => 'nullable|string|max:100',
            'page_builder_data' => 'nullable|json',
            'seo_settings' => 'nullable|json',
            'page_settings' => 'nullable|json',
            'featured_image' => 'nullable|string',
            'is_published' => 'boolean',
            'is_active' => 'boolean',
        ]);

        // Handle publishing status
        if ($validated['is_published'] && !$page->is_published) {
            $validated['published_at'] = now();
        } elseif (!$validated['is_published']) {
            $validated['published_at'] = null;
        }

        $page->update($validated);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Page updated successfully.',
                'page' => $page
            ]);
        }

        return redirect()->route('admin.pages.index')
            ->with('success', 'Page updated successfully.');
    }

    public function destroy(Page $page)
    {
        $page->delete();

        if (request()->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Page deleted successfully.'
            ]);
        }

        return redirect()->route('admin.pages.index')
            ->with('success', 'Page deleted successfully.');
    }

    /**
     * Show the page builder interface
     */
    public function builder(Page $page = null)
    {
        if ($page) {
            $page->load('sections');
        }
        
        return view('admin.pages.builder', compact('page'));
    }

    /**
     * Save page builder data
     */
    public function saveBuilder(Request $request, Page $page = null)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'template' => 'nullable|string|max:100',
            'page_builder_data' => 'required|array',
            'seo_settings' => 'nullable|array',
            'page_settings' => 'nullable|array',
            'is_published' => 'boolean',
        ]);

        if ($page) {
            // Update existing page
            $validated['slug'] = $validated['slug'] ?: $page->slug;
            
            if ($validated['is_published'] && !$page->is_published) {
                $validated['published_at'] = now();
            }
            
            $page->update($validated);
        } else {
            // Create new page
            $validated['slug'] = $validated['slug'] ?: Str::slug($validated['title']);
            
            if ($validated['is_published']) {
                $validated['published_at'] = now();
            }
            
            $page = Page::create($validated);
        }

        return response()->json([
            'success' => true,
            'message' => 'Page saved successfully.',
            'page' => $page,
            'redirect' => route('admin.pages.builder', $page)
        ]);
    }

    /**
     * Duplicate a page
     */
    public function duplicate(Page $page)
    {
        $newPage = $page->replicate();
        $newPage->title = $page->title . ' (Copy)';
        $newPage->slug = $page->slug . '-copy-' . time();
        $newPage->is_published = false;
        $newPage->published_at = null;
        $newPage->save();

        return redirect()->route('admin.pages.edit', $newPage)
            ->with('success', 'Page duplicated successfully.');
    }

    /**
     * Toggle page status
     */
    public function toggleStatus(Page $page)
    {
        $page->update([
            'is_active' => !$page->is_active
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Page status updated.',
            'is_active' => $page->is_active
        ]);
    }
}
