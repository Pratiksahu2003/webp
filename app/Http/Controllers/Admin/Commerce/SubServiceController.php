<?php

namespace App\Http\Controllers\Admin\Commerce;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SubServiceRequest;
use App\Models\Service;
use App\Models\SubService;
use App\Models\SubServiceFaq;
use App\Models\SubServiceWhyChooseUs;
use App\Models\Technology;
use App\Traits\HandlesUploads;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubServiceController extends Controller
{
    use HandlesUploads;

    public function index(Request $request)
    {
        $subServices = SubService::with('service')
            ->when($request->search, fn ($q, $s) => $q->where('title', 'like', "%{$s}%"))
            ->when($request->service_id, fn ($q) => $q->where('service_id', $request->service_id))
            ->orderBy('sort_order')
            ->paginate(15)
            ->withQueryString();

        $services = Service::ordered()->get();

        return view('admin.commerce.sub-services.index', compact('subServices', 'services'));
    }

    public function create()
    {
        $services = Service::ordered()->get();
        $technologies = Technology::active()->ordered()->get();

        return view('admin.commerce.sub-services.create', compact('services', 'technologies'));
    }

    public function store(SubServiceRequest $request)
    {
        $data = $this->prepareData($request);
        $data['image'] = $this->uploadFile($request->file('image'), 'sub-services');

        $subService = SubService::create($data);
        $subService->technologies()->sync($request->input('technology_ids', []));
        $this->syncFaqs($subService, $request->input('faqs', []));
        $this->syncWhyChooseUs($subService, $request->input('why_choose_us', []));

        return redirect()->route('admin.sub-services.index')->with('success', 'Sub service created successfully.');
    }

    public function edit(SubService $subService)
    {
        $subService->load(['technologies', 'faqs', 'whyChooseUs']);
        $services = Service::ordered()->get();
        $technologies = Technology::active()->ordered()->get();

        return view('admin.commerce.sub-services.edit', compact('subService', 'services', 'technologies'));
    }

    public function update(SubServiceRequest $request, SubService $subService)
    {
        $data = $this->prepareData($request);
        $data['image'] = $this->uploadFile($request->file('image'), 'sub-services', $subService->image);

        $subService->update($data);
        $subService->technologies()->sync($request->input('technology_ids', []));
        $this->syncFaqs($subService, $request->input('faqs', []));
        $this->syncWhyChooseUs($subService, $request->input('why_choose_us', []));

        return redirect()->route('admin.sub-services.index')->with('success', 'Sub service updated successfully.');
    }

    public function destroy(SubService $subService)
    {
        $this->deleteFile($subService->image);
        $subService->delete();

        return redirect()->route('admin.sub-services.index')->with('success', 'Sub service deleted successfully.');
    }

    public function toggleStatus(SubService $subService)
    {
        $subService->update(['status' => ! $subService->status]);

        return response()->json(['success' => true, 'status' => $subService->status]);
    }

    protected function prepareData(SubServiceRequest $request): array
    {
        $data = $request->validated();
        unset($data['technology_ids']);
        $data['slug'] = $data['slug'] ?? Str::slug($data['title']);
        $data['status'] = $request->boolean('status');

        return $data;
    }

    protected function syncFaqs(SubService $subService, array $faqs): void
    {
        $subService->faqs()->delete();

        foreach ($faqs as $index => $faq) {
            if (empty($faq['question'])) {
                continue;
            }

            SubServiceFaq::create([
                'sub_service_id' => $subService->id,
                'question' => $faq['question'],
                'answer' => $faq['answer'] ?? '',
                'sort_order' => $faq['sort_order'] ?? $index,
                'status' => isset($faq['status']) ? (bool) $faq['status'] : true,
            ]);
        }
    }

    protected function syncWhyChooseUs(SubService $subService, array $items): void
    {
        $subService->whyChooseUs()->delete();

        foreach ($items as $index => $item) {
            if (empty($item['title'])) {
                continue;
            }

            SubServiceWhyChooseUs::create([
                'sub_service_id' => $subService->id,
                'title' => $item['title'],
                'sort_order' => $item['sort_order'] ?? $index,
                'status' => isset($item['status']) ? (bool) $item['status'] : true,
            ]);
        }
    }
}
