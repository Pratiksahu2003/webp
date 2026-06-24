<?php

namespace App\View\Composers;

use App\Models\Service;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class CatalogNavigationComposer
{
    protected static ?Collection $catalogServices = null;

    public function compose(View $view): void
    {
        $catalogServices = $this->catalogServices();

        $view->with([
            'catalogServices' => $catalogServices,
            'webDevelopmentService' => $this->findService($catalogServices, 'web-development', 'Web Development'),
            'softwareDevelopmentService' => $this->findService($catalogServices, 'software-development', 'Software Development'),
            'designService' => $this->findService($catalogServices, 'design-ux', 'Design & UX'),
            'digitalMarketingService' => $this->findService($catalogServices, 'digital-marketing', 'Digital Marketing'),
        ]);
    }

    protected function findService(Collection $catalogServices, string $slug, string $title): ?Service
    {
        return $catalogServices->first(fn (Service $service) => $service->slug === $slug)
            ?? $catalogServices->first(fn (Service $service) => strcasecmp($service->title, $title) === 0);
    }

    protected function catalogServices(): Collection
    {
        if (self::$catalogServices === null) {
            self::$catalogServices = Service::query()
                ->with(['activeSubServices' => fn ($query) => $query->ordered()])
                ->active()
                ->ordered()
                ->whereHas('subServices', fn ($query) => $query->where('status', true))
                ->get();
        }

        return self::$catalogServices;
    }
}
