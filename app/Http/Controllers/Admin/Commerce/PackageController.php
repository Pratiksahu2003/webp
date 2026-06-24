<?php

namespace App\Http\Controllers\Admin\Commerce;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PackageRequest;
use App\Models\PackageFeature;
use App\Models\ServicePackage;
use App\Models\SubService;
use App\Traits\HandlesUploads;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PackageController extends Controller
{
    use HandlesUploads;

    public function index(Request $request)
    {
        $packages = ServicePackage::with('subService.service')
            ->when($request->search, fn ($q, $s) => $q->where('package_name', 'like', "%{$s}%"))
            ->when($request->sub_service_id, fn ($q) => $q->where('sub_service_id', $request->sub_service_id))
            ->orderBy('sort_order')
            ->paginate(15)
            ->withQueryString();

        $subServices = SubService::with('service')->ordered()->get();

        return view('admin.commerce.packages.index', compact('packages', 'subServices'));
    }

    public function create()
    {
        $subServices = SubService::with('service')->ordered()->get();

        return view('admin.commerce.packages.create', compact('subServices'));
    }

    public function store(PackageRequest $request)
    {
        $data = $this->prepareData($request);
        $package = ServicePackage::create($data);
        $this->syncFeatures($package, $request->input('features', []));

        return redirect()->route('admin.packages.index')->with('success', 'Package created successfully.');
    }

    public function edit(ServicePackage $package)
    {
        $package->load('features');
        $subServices = SubService::with('service')->ordered()->get();

        return view('admin.commerce.packages.edit', compact('package', 'subServices'));
    }

    public function update(PackageRequest $request, ServicePackage $package)
    {
        $data = $this->prepareData($request);
        $package->update($data);
        $this->syncFeatures($package, $request->input('features', []));

        return redirect()->route('admin.packages.index')->with('success', 'Package updated successfully.');
    }

    public function destroy(ServicePackage $package)
    {
        $package->delete();

        return redirect()->route('admin.packages.index')->with('success', 'Package deleted successfully.');
    }

    public function toggleStatus(ServicePackage $package)
    {
        $package->update(['status' => ! $package->status]);

        return response()->json(['success' => true, 'status' => $package->status]);
    }

    protected function prepareData(PackageRequest $request): array
    {
        $data = $request->validated();
        unset($data['features']);
        $data['slug'] = $data['slug'] ?? Str::slug($data['package_name']);
        $data['status'] = $request->boolean('status');

        return $data;
    }

    protected function syncFeatures(ServicePackage $package, array $features): void
    {
        $package->features()->delete();

        foreach ($features as $index => $feature) {
            if (empty($feature['feature_title'])) {
                continue;
            }

            PackageFeature::create([
                'package_id' => $package->id,
                'feature_title' => $feature['feature_title'],
                'sort_order' => $feature['sort_order'] ?? $index,
                'status' => isset($feature['status']) ? (bool) $feature['status'] : true,
            ]);
        }
    }
}
