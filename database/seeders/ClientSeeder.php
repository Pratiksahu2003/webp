<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        Client::query()->delete();

        $clients = [
            ['name' => 'RetailMax', 'industry' => 'E-Commerce', 'description' => 'Leading online retail platform with 2M+ monthly visitors.', 'sort_order' => 1],
            ['name' => 'FinSecure', 'industry' => 'FinTech', 'description' => 'Digital banking and payment solutions for SMBs.', 'sort_order' => 2],
            ['name' => 'HealthTrack', 'industry' => 'Healthcare', 'description' => 'Telemedicine platform connecting patients with specialists.', 'sort_order' => 3],
            ['name' => 'Apex Manufacturing', 'industry' => 'Manufacturing', 'description' => 'Industrial equipment manufacturer with 12 global plants.', 'sort_order' => 4],
            ['name' => 'EduLearn', 'industry' => 'EdTech', 'description' => 'Online learning platform with 500+ courses.', 'sort_order' => 5],
            ['name' => 'LogiFlow', 'industry' => 'Logistics', 'description' => 'Supply chain management and last-mile delivery solutions.', 'sort_order' => 6],
            ['name' => 'PropTech Solutions', 'industry' => 'Real Estate', 'description' => 'Property management and tenant portal platform.', 'sort_order' => 7],
            ['name' => 'GreenEnergy Corp', 'industry' => 'Energy', 'description' => 'Renewable energy monitoring and analytics dashboard.', 'sort_order' => 8],
            ['name' => 'FoodHub', 'industry' => 'Food & Beverage', 'description' => 'Multi-restaurant ordering and delivery aggregator.', 'sort_order' => 9],
            ['name' => 'TravelWise', 'industry' => 'Travel', 'description' => 'Travel booking platform with AI-powered recommendations.', 'sort_order' => 10],
            ['name' => 'MediCare Plus', 'industry' => 'Healthcare', 'description' => 'Hospital management and patient records system.', 'sort_order' => 11],
            ['name' => 'AutoDrive', 'industry' => 'Automotive', 'description' => 'Connected vehicle telematics and fleet management.', 'sort_order' => 12],
        ];

        foreach ($clients as $client) {
            Client::create(array_merge($client, ['is_active' => true]));
        }

        $this->command->info('Seeded '.count($clients).' clients.');
    }
}
