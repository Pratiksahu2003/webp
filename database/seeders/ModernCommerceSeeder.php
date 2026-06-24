<?php

namespace Database\Seeders;

use App\Models\PackageFeature;
use App\Models\PaymentTransaction;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ServicePackage;
use App\Models\SubService;
use App\Models\SubServiceFaq;
use App\Models\SubServiceWhyChooseUs;
use App\Models\Technology;
use Database\Seeders\Support\RichContentBuilder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ModernCommerceSeeder extends Seeder
{
    protected array $technologyMap = [];

    public function run(): void
    {
        $this->command?->info('Clearing legacy commerce seed data...');
        $this->clearCommerceData();

        $technologies = require database_path('seeders/data/technologies.php');
        $catalog = require database_path('seeders/data/catalog.php');

        $this->seedTechnologies($technologies);
        $this->seedCatalog($catalog);

        $stats = [
            'categories' => ServiceCategory::count(),
            'services' => Service::count(),
            'sub_services' => SubService::count(),
            'packages' => ServicePackage::count(),
            'features' => PackageFeature::count(),
            'technologies' => Technology::count(),
            'faqs' => SubServiceFaq::count(),
        ];

        $this->command?->info('Modern commerce catalog seeded successfully.');
        $this->command?->table(['Entity', 'Count'], collect($stats)->map(fn ($v, $k) => [str_replace('_', ' ', ucfirst($k)), $v])->values()->all());
    }

    protected function clearCommerceData(): void
    {
        Schema::disableForeignKeyConstraints();

        PaymentTransaction::query()->forceDelete();
        DB::table('orders')->delete();

        PackageFeature::query()->forceDelete();
        ServicePackage::query()->forceDelete();
        SubServiceFaq::query()->forceDelete();
        SubServiceWhyChooseUs::query()->forceDelete();
        DB::table('sub_service_technology')->delete();
        SubService::query()->forceDelete();
        Service::query()->forceDelete();
        ServiceCategory::query()->forceDelete();
        Technology::query()->forceDelete();

        Schema::enableForeignKeyConstraints();
    }

    protected function seedTechnologies(array $technologies): void
    {
        foreach ($technologies as $index => $tech) {
            $model = Technology::create([
                'name' => $tech['name'],
                'slug' => $tech['slug'],
                'category' => $tech['category'],
                'technology_type' => $tech['type'],
                'icon' => $tech['icon'],
                'website_url' => $tech['url'],
                'description' => RichContentBuilder::serviceDescription(
                    $tech['name'],
                    $tech['category'],
                    [
                        "Production-ready {$tech['name']} implementations",
                        'Best practices for performance and security',
                        'Integration with modern development workflows',
                        'Documentation and team enablement',
                    ]
                ),
                'sort_order' => $index + 1,
                'status' => true,
                'is_active' => true,
            ]);

            $this->technologyMap[$tech['slug']] = $model;
        }
    }

    protected function seedCatalog(array $catalog): void
    {
        $categoryMap = [];

        foreach ($catalog['categories'] as $categoryData) {
            $categoryMap[$categoryData['slug']] = ServiceCategory::create([
                'title' => $categoryData['title'],
                'slug' => $categoryData['slug'],
                'description' => RichContentBuilder::serviceDescription(
                    $categoryData['title'],
                    'service category',
                    [
                        'End-to-end delivery with measurable outcomes',
                        'Flexible packages for every business stage',
                        'Dedicated project management and support',
                    ]
                ),
                'sort_order' => $categoryData['sort_order'],
                'status' => true,
            ]);
        }

        foreach ($catalog['services'] as $serviceData) {
            $category = $categoryMap[$serviceData['category']];

            $service = Service::create([
                'service_category_id' => $category->id,
                'title' => $serviceData['title'],
                'slug' => $serviceData['slug'],
                'short_description' => $serviceData['short_description'],
                'description' => RichContentBuilder::serviceDescription(
                    $serviceData['title'],
                    $category->title,
                    $serviceData['highlights']
                ),
                'seo_title' => $serviceData['title'].' | VanTroZ',
                'seo_description' => $serviceData['short_description'],
                'seo_keywords' => $serviceData['seo_keywords'],
                'sort_order' => $serviceData['sort_order'],
                'status' => true,
                'is_active' => true,
            ]);

            foreach ($serviceData['sub_services'] as $subIndex => $subData) {
                $techNames = collect($subData['technologies'])
                    ->map(fn ($slug) => $this->technologyMap[$slug]->name ?? $slug)
                    ->all();

                $subService = SubService::create([
                    'service_id' => $service->id,
                    'title' => $subData['title'],
                    'slug' => $subData['slug'],
                    'short_description' => "Expert {$subData['title']} with transparent packages, agile delivery, and long-term support from VanTroZ.",
                    'description' => RichContentBuilder::subServiceDescription(
                        $subData['title'],
                        $service->title,
                        $category->title,
                        $subData['highlights'],
                        $techNames
                    ),
                    'starting_price' => $subData['starting_price'],
                    'delivery_days' => $subData['delivery_days'],
                    'sort_order' => $subIndex + 1,
                    'status' => true,
                ]);

                $techIds = collect($subData['technologies'])
                    ->map(fn ($slug) => $this->technologyMap[$slug]->id ?? null)
                    ->filter()
                    ->all();
                $subService->technologies()->sync($techIds);

                $this->seedPackages($subService, $subData, $catalog);
                $this->seedFaqs($subService, $subData['title'], $catalog['faq_questions']);
                $this->seedWhyChooseUs($subService, $catalog['why_choose_us']);
            }
        }
    }

    protected function seedPackages(SubService $subService, array $subData, array $catalog): void
    {
        $basePrice = (float) $subData['starting_price'];
        $baseDays = (int) $subData['delivery_days'];
        $baseFeatures = $catalog['base_features'];

        foreach ($catalog['package_tiers'] as $tierIndex => $tier) {
            $price = round($basePrice * $tier['multiplier'], -2);
            $salePrice = $tier['sale_discount'] > 0
                ? round($price * (1 - $tier['sale_discount']), -2)
                : null;

            $package = ServicePackage::create([
                'sub_service_id' => $subService->id,
                'package_name' => $tier['name'],
                'slug' => $tier['slug'],
                'price' => $price,
                'sale_price' => $salePrice,
                'delivery_days' => $baseDays + $tier['days_offset'],
                'revisions' => $tier['revisions'],
                'support_period' => $tier['support'],
                'badge' => $tier['badge'],
                'description' => RichContentBuilder::packageDescription($tier['name'], $subService->title, $tierIndex),
                'sort_order' => $tierIndex + 1,
                'status' => true,
            ]);

            $featureCount = min(count($baseFeatures), 8 + ($tierIndex * 4));
            $features = array_merge(
                array_slice($subData['highlights'], 0, min(count($subData['highlights']), 3 + $tierIndex)),
                array_slice($baseFeatures, 0, $featureCount)
            );
            $features = array_unique($features);

            foreach (array_values($features) as $fi => $featureTitle) {
                PackageFeature::create([
                    'package_id' => $package->id,
                    'feature_title' => $featureTitle,
                    'sort_order' => $fi + 1,
                    'status' => true,
                ]);
            }
        }
    }

    protected function seedFaqs(SubService $subService, string $title, array $questions): void
    {
        foreach ($questions as $index => $question) {
            SubServiceFaq::create([
                'sub_service_id' => $subService->id,
                'question' => $question,
                'answer' => RichContentBuilder::faqAnswer($question, $title),
                'sort_order' => $index + 1,
                'status' => true,
            ]);
        }
    }

    protected function seedWhyChooseUs(SubService $subService, array $points): void
    {
        foreach ($points as $index => $point) {
            SubServiceWhyChooseUs::create([
                'sub_service_id' => $subService->id,
                'title' => $point,
                'sort_order' => $index + 1,
                'status' => true,
            ]);
        }
    }
}
