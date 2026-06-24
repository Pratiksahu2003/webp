<?php

namespace Database\Seeders;

use App\Models\PackageFeature;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ServicePackage;
use App\Models\SubService;
use App\Models\SubServiceFaq;
use App\Models\SubServiceWhyChooseUs;
use App\Models\Technology;
use Database\Seeders\Data\CommerceCatalogData;
use Database\Seeders\Support\DescriptionBuilder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CommerceSeeder extends Seeder
{
    public function run(): void
    {
        $this->clearCommerceData();

        $categories = [];
        foreach (CommerceCatalogData::categories() as $catData) {
            $categories[$catData['slug']] = ServiceCategory::create([
                'title' => $catData['title'],
                'slug' => $catData['slug'],
                'description' => $catData['description'],
                'sort_order' => $catData['sort_order'],
                'status' => true,
            ]);
        }

        $techBySlug = Technology::pluck('id', 'slug');

        $totalSubServices = 0;
        $totalPackages = 0;
        $totalFeatures = 0;

        foreach (CommerceCatalogData::services() as $serviceData) {
            $category = $categories[$serviceData['category_slug']];

            $service = Service::create([
                'service_category_id' => $category->id,
                'title' => $serviceData['title'],
                'slug' => $serviceData['slug'],
                'short_description' => $serviceData['short_description'],
                'description' => DescriptionBuilder::forService(
                    $serviceData['title'],
                    $category->title,
                    $serviceData['features'],
                ),
                'content' => DescriptionBuilder::forService(
                    $serviceData['title'],
                    $category->title,
                    $serviceData['features'],
                ),
                'features' => $serviceData['features'],
                'category' => $category->title,
                'seo_title' => $serviceData['title'].' Services | '.config('company.name'),
                'seo_description' => Str::limit(strip_tags($serviceData['short_description']), 155),
                'seo_keywords' => implode(', ', array_map('strtolower', $serviceData['features'])),
                'sort_order' => $serviceData['sort_order'],
                'status' => true,
                'is_active' => true,
            ]);

            foreach ($serviceData['sub_services'] as $i => $subData) {
                $description = DescriptionBuilder::forSubService($subData['description_context']);

                $subService = SubService::create([
                    'service_id' => $service->id,
                    'title' => $subData['title'],
                    'slug' => $subData['slug'],
                    'short_description' => $subData['short_description'],
                    'description' => $description,
                    'starting_price' => $subData['starting_price'],
                    'delivery_days' => $subData['delivery_days'],
                    'sort_order' => $i + 1,
                    'status' => true,
                ]);

                $totalSubServices++;

                $techIds = collect($subData['technology_slugs'])
                    ->map(fn (string $slug) => $techBySlug[$slug] ?? null)
                    ->filter()
                    ->values()
                    ->all();

                if (! empty($techIds)) {
                    $subService->technologies()->sync($techIds);
                }

                foreach (CommerceCatalogData::packages($subData['package_base_price'], $subData['title']) as $j => $pkgData) {
                    $package = ServicePackage::create([
                        'sub_service_id' => $subService->id,
                        'package_name' => $pkgData['package_name'],
                        'slug' => $pkgData['slug'],
                        'price' => $pkgData['price'],
                        'sale_price' => $pkgData['sale_price'],
                        'delivery_days' => $pkgData['delivery_days'],
                        'revisions' => $pkgData['revisions'],
                        'support_period' => $pkgData['support_period'],
                        'badge' => $pkgData['badge'],
                        'description' => $pkgData['description'],
                        'sort_order' => $j + 1,
                        'status' => true,
                    ]);

                    $totalPackages++;

                    foreach ($pkgData['features'] as $fi => $featureTitle) {
                        PackageFeature::create([
                            'package_id' => $package->id,
                            'feature_title' => $featureTitle,
                            'sort_order' => $fi + 1,
                            'status' => true,
                        ]);
                        $totalFeatures++;
                    }
                }

                foreach (CommerceCatalogData::faqs($subData['title']) as $fi => $faq) {
                    SubServiceFaq::create([
                        'sub_service_id' => $subService->id,
                        'question' => $faq['question'],
                        'answer' => $faq['answer'],
                        'sort_order' => $fi + 1,
                        'status' => true,
                    ]);
                }

                foreach (CommerceCatalogData::whyChooseUs() as $wi => $point) {
                    SubServiceWhyChooseUs::create([
                        'sub_service_id' => $subService->id,
                        'title' => $point,
                        'sort_order' => $wi + 1,
                        'status' => true,
                    ]);
                }
            }
        }

        $this->command->info("Commerce catalog seeded: {$totalSubServices} sub-services, {$totalPackages} packages, {$totalFeatures} features.");
    }

    private function clearCommerceData(): void
    {
        PackageFeature::query()->forceDelete();
        ServicePackage::query()->forceDelete();
        SubServiceFaq::query()->forceDelete();
        SubServiceWhyChooseUs::query()->forceDelete();
        DB::table('sub_service_technology')->delete();
        SubService::query()->forceDelete();
        Service::query()->forceDelete();
        ServiceCategory::query()->forceDelete();
    }
}
