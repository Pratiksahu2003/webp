<?php

namespace Database\Seeders;

use App\Models\Technology;
use Database\Seeders\Data\TechnologyData;
use Database\Seeders\Support\DescriptionBuilder;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    public function run(): void
    {
        Technology::query()->forceDelete();

        foreach (TechnologyData::all() as $tech) {
            Technology::create([
                'name' => $tech['name'],
                'slug' => $tech['slug'],
                'category' => $tech['category'],
                'technology_type' => $tech['technology_type'],
                'icon' => $tech['icon'],
                'website_url' => $tech['website_url'],
                'description' => DescriptionBuilder::forTechnology(
                    $tech['name'],
                    $tech['technology_type'],
                    $tech['category'],
                ),
                'sort_order' => $tech['sort_order'],
                'status' => true,
                'is_active' => true,
            ]);
        }

        $this->command->info('Seeded '.Technology::count().' technologies.');
    }
}
