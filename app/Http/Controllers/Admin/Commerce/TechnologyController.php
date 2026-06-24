<?php

namespace App\Http\Controllers\Admin\Commerce;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TechnologyRequest;
use App\Models\Technology;
use App\Traits\HandlesUploads;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TechnologyController extends Controller
{
    use HandlesUploads;

    public function index(Request $request)
    {
        $technologies = Technology::query()
            ->when($request->search, fn ($q, $s) => $q->where('name', 'like', "%{$s}%"))
            ->when($request->technology_type, fn ($q) => $q->where('technology_type', $request->technology_type))
            ->orderBy('sort_order')
            ->paginate(15)
            ->withQueryString();

        return view('admin.commerce.technologies.index', compact('technologies'));
    }

    public function create()
    {
        return view('admin.commerce.technologies.create');
    }

    public function store(TechnologyRequest $request)
    {
        $data = $this->prepareData($request);
        $data['logo'] = $this->uploadFile($request->file('logo'), 'technologies/logos');

        Technology::create($data);

        return redirect()->route('admin.technologies.index')->with('success', 'Technology created successfully.');
    }

    public function edit(Technology $technology)
    {
        return view('admin.commerce.technologies.edit', compact('technology'));
    }

    public function update(TechnologyRequest $request, Technology $technology)
    {
        $data = $this->prepareData($request);
        $data['logo'] = $this->uploadFile($request->file('logo'), 'technologies/logos', $technology->logo);

        $technology->update($data);

        return redirect()->route('admin.technologies.index')->with('success', 'Technology updated successfully.');
    }

    public function destroy(Technology $technology)
    {
        $this->deleteFile($technology->logo);
        $technology->delete();

        return redirect()->route('admin.technologies.index')->with('success', 'Technology deleted successfully.');
    }

    public function toggleStatus(Technology $technology)
    {
        $technology->update(['status' => ! $technology->status]);

        return response()->json(['success' => true, 'status' => $technology->status]);
    }

    protected function prepareData(TechnologyRequest $request): array
    {
        $data = $request->validated();
        $data['slug'] = $data['slug'] ?? Str::slug($data['name']);
        $data['status'] = $request->boolean('status');

        return $data;
    }
}
