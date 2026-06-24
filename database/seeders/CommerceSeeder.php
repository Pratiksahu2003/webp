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
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CommerceSeeder extends Seeder
{
    public function run(): void
    {
        $development = ServiceCategory::firstOrCreate(
            ['slug' => 'development'],
            ['title' => 'Development', 'description' => 'Software development services', 'sort_order' => 1, 'status' => true]
        );

        $marketing = ServiceCategory::firstOrCreate(
            ['slug' => 'marketing'],
            ['title' => 'Marketing', 'description' => 'Digital marketing services', 'sort_order' => 2, 'status' => true]
        );

        $webDev = Service::updateOrCreate(
            ['slug' => 'web-development'],
            [
                'service_category_id' => $development->id,
                'title' => 'Web Development',
                'short_description' => 'Custom web applications and websites built with modern technologies.',
                'description' => '<p>Professional web development services for startups and enterprises.</p>',
                'seo_title' => 'Web Development Services',
                'seo_description' => 'Expert web development services using Laravel, PHP, and modern stacks.',
                'seo_keywords' => 'web development, laravel, php',
                'sort_order' => 1,
                'status' => true,
                'is_active' => true,
            ]
        );

        Service::updateOrCreate(
            ['slug' => 'mobile-app-development'],
            [
                'service_category_id' => $development->id,
                'title' => 'Mobile App Development',
                'short_description' => 'Native and cross-platform mobile applications.',
                'description' => '<p>Build scalable mobile apps for iOS and Android.</p>',
                'sort_order' => 2,
                'status' => true,
                'is_active' => true,
            ]
        );

        Service::updateOrCreate(
            ['slug' => 'digital-marketing'],
            [
                'service_category_id' => $marketing->id,
                'title' => 'Digital Marketing',
                'short_description' => 'SEO, social media, and performance marketing.',
                'description' => '<p>Grow your business with data-driven marketing.</p>',
                'sort_order' => 3,
                'status' => true,
                'is_active' => true,
            ]
        );

        $laravel = SubService::updateOrCreate(
            ['service_id' => $webDev->id, 'slug' => 'laravel-development'],
            [
                'title' => 'Laravel Development',
                'short_description' => 'Enterprise Laravel applications with clean architecture.',
                'description' => '<p>We build secure, scalable Laravel applications tailored to your business.</p>',
                'starting_price' => 49999,
                'delivery_days' => 21,
                'sort_order' => 1,
                'status' => true,
            ]
        );

        $wordpress = SubService::updateOrCreate(
            ['service_id' => $webDev->id, 'slug' => 'wordpress-development'],
            [
                'title' => 'WordPress Development',
                'short_description' => 'Custom WordPress themes and plugins.',
                'description' => '<p>Flexible WordPress solutions for content-driven businesses.</p>',
                'starting_price' => 24999,
                'delivery_days' => 14,
                'sort_order' => 2,
                'status' => true,
            ]
        );

        $techNames = [
            ['name' => 'PHP', 'type' => 'Programming Language'],
            ['name' => 'Laravel', 'type' => 'Framework'],
            ['name' => 'MySQL', 'type' => 'Database'],
            ['name' => 'Bootstrap', 'type' => 'Frontend'],
            ['name' => 'JavaScript', 'type' => 'Programming Language'],
            ['name' => 'Git', 'type' => 'DevOps'],
        ];

        $techIds = [];
        foreach ($techNames as $i => $item) {
            $tech = Technology::updateOrCreate(
                ['slug' => Str::slug($item['name'])],
                [
                    'name' => $item['name'],
                    'technology_type' => $item['type'],
                    'category' => $item['type'],
                    'description' => $item['name'].' technology',
                    'sort_order' => $i + 1,
                    'status' => true,
                    'is_active' => true,
                ]
            );
            $techIds[] = $tech->id;
        }

        $laravel->technologies()->sync($techIds);

        $packages = [
            ['name' => 'Basic', 'price' => 49999, 'sale' => 44999, 'badge' => null, 'days' => 14],
            ['name' => 'Standard', 'price' => 89999, 'sale' => 79999, 'badge' => 'Most Popular', 'days' => 21],
            ['name' => 'Premium', 'price' => 149999, 'sale' => 129999, 'badge' => 'Recommended', 'days' => 30],
            ['name' => 'Enterprise', 'price' => 249999, 'sale' => null, 'badge' => 'Enterprise', 'days' => 45],
        ];

        $features = [
            'Responsive Design', 'Admin Dashboard', 'API Integration',
            'Payment Gateway Integration', 'SEO Optimization', 'Security Hardening',
        ];

        foreach ($packages as $i => $pkg) {
            $package = ServicePackage::updateOrCreate(
                ['sub_service_id' => $laravel->id, 'slug' => Str::slug($pkg['name'])],
                [
                    'package_name' => $pkg['name'],
                    'price' => $pkg['price'],
                    'sale_price' => $pkg['sale'],
                    'delivery_days' => $pkg['days'],
                    'revisions' => $i + 1,
                    'support_period' => ($i + 1).' months',
                    'badge' => $pkg['badge'],
                    'description' => $pkg['name'].' Laravel development package.',
                    'sort_order' => $i + 1,
                    'status' => true,
                ]
            );

            $package->features()->delete();
            foreach (array_slice($features, 0, 3 + $i) as $fi => $feature) {
                PackageFeature::create([
                    'package_id' => $package->id,
                    'feature_title' => $feature,
                    'sort_order' => $fi + 1,
                    'status' => true,
                ]);
            }
        }

        SubServiceFaq::updateOrCreate(
            ['sub_service_id' => $laravel->id, 'question' => 'How long does Laravel development take?'],
            ['answer' => 'Timelines depend on the package selected, typically 2-6 weeks.', 'sort_order' => 1, 'status' => true]
        );

        SubServiceWhyChooseUs::updateOrCreate(
            ['sub_service_id' => $laravel->id, 'title' => 'Experienced Laravel Team'],
            ['sort_order' => 1, 'status' => true]
        );

        SubServiceWhyChooseUs::updateOrCreate(
            ['sub_service_id' => $laravel->id, 'title' => 'Agile Development Process'],
            ['sort_order' => 2, 'status' => true]
        );

        $this->command->info('Commerce module seeded successfully.');
    }
}
