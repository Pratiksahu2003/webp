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
            'webDevelopmentService' => $this->webDevelopmentService($catalogServices),
        ]);
    }

    protected function webDevelopmentService(Collection $catalogServices): ?Service
    {
        return $catalogServices->first(fn (Service $service) => $service->slug === 'web-development')
            ?? $catalogServices->first(fn (Service $service) => strcasecmp($service->title, 'Web Development') === 0);
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
