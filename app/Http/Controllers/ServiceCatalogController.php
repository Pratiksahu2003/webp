<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\SubService;
use Illuminate\Http\Request;

class ServiceCatalogController extends Controller
{
    public function index()
    {
        $services = Service::with(['category', 'activeSubServices'])
            ->active()
            ->ordered()
            ->get();

        return view('services.catalog.index', compact('services'));
    }

    public function show(Service $service)
    {
        $service->load(['activeSubServices.activePackages.features', 'category']);

        return view('services.catalog.show', compact('service'));
    }

    public function subService(Service $service, SubService $subService)
    {
        abort_unless($subService->service_id === $service->id && $subService->status, 404);

        $subService->load([
            'activePackages.activeFeatures',
            'technologies' => fn ($q) => $q->active()->ordered(),
            'faqs' => fn ($q) => $q->where('status', true)->orderBy('sort_order'),
            'whyChooseUs' => fn ($q) => $q->where('status', true)->orderBy('sort_order'),
            'service',
        ]);

        $relatedSubServices = SubService::where('service_id', $service->id)
            ->where('id', '!=', $subService->id)
            ->active()
            ->ordered()
            ->limit(4)
            ->get();

        return view('services.catalog.detail', compact('service', 'subService', 'relatedSubServices'));
    }
}
