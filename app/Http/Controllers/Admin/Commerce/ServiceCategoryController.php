<?php

namespace App\Http\Controllers\Admin\Commerce;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceCategoryController extends Controller
{
    public function index()
    {
        $categories = ServiceCategory::withCount('services')->ordered()->paginate(15);

        return view('admin.commerce.service-categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
        ]);

        ServiceCategory::create([
            ...$data,
            'slug' => Str::slug($data['title']),
            'status' => $request->boolean('status', true),
        ]);

        return redirect()->back()->with('success', 'Category created.');
    }

    public function update(Request $request, ServiceCategory $serviceCategory)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
        ]);

        $serviceCategory->update([
            ...$data,
            'status' => $request->boolean('status'),
        ]);

        return redirect()->back()->with('success', 'Category updated.');
    }

    public function destroy(ServiceCategory $serviceCategory)
    {
        $serviceCategory->delete();

        return redirect()->back()->with('success', 'Category deleted.');
    }
}
