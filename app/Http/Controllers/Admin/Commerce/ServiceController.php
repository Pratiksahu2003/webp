<?php

namespace App\Http\Controllers\Admin\Commerce;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServiceRequest;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Traits\HandlesUploads;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    use HandlesUploads;

    public function index(Request $request)
    {
        $services = Service::with('category')
            ->when($request->search, fn ($q, $s) => $q->where('title', 'like', "%{$s}%"))
            ->when($request->status !== null && $request->status !== '', fn ($q) => $q->where('status', (bool) $request->status))
            ->orderBy('sort_order')
            ->paginate(15)
            ->withQueryString();

        return view('admin.commerce.services.index', compact('services'));
    }

    public function create()
    {
        $categories = ServiceCategory::ordered()->get();

        return view('admin.commerce.services.create', compact('categories'));
    }

    public function store(ServiceRequest $request)
    {
        $data = $this->prepareData($request);
        $data['icon'] = $this->uploadFile($request->file('icon'), 'services/icons');
        $data['banner_image'] = $this->uploadFile($request->file('banner_image'), 'services/banners');

        Service::create($data);

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
    }

    public function edit(Service $service)
    {
        $categories = ServiceCategory::ordered()->get();

        return view('admin.commerce.services.edit', compact('service', 'categories'));
    }

    public function update(ServiceRequest $request, Service $service)
    {
        $data = $this->prepareData($request);
        $data['icon'] = $this->uploadFile($request->file('icon'), 'services/icons', $service->icon);
        $data['banner_image'] = $this->uploadFile($request->file('banner_image'), 'services/banners', $service->banner_image);

        $service->update($data);

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        $this->deleteFile($service->icon);
        $this->deleteFile($service->banner_image);
        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
    }

    public function toggleStatus(Service $service)
    {
        $service->update(['status' => ! $service->status]);

        return response()->json(['success' => true, 'status' => $service->status]);
    }

    protected function prepareData(ServiceRequest $request): array
    {
        $data = $request->validated();
        $data['slug'] = $data['slug'] ?? Str::slug($data['title']);
        $data['status'] = $request->boolean('status');

        return $data;
    }
}
