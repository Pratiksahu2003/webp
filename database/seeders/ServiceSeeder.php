<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'Software Development',
                'description' => 'Custom software solutions tailored to your business needs',
                'content' => 'We develop robust, scalable software applications using modern technologies and best practices.',
                'features' => json_encode([
                    'Custom CRM Development',
                    'ERP Software Solutions',
                    'SaaS Applications',
                    'API Development',
                    'Database Design'
                ]),
                'category' => 'Software',
                'sort_order' => 1
            ],
            [
                'title' => 'Web Development',
                'description' => 'Modern web applications and websites',
                'content' => 'We create responsive, fast, and user-friendly web applications.',
                'features' => json_encode([
                    'Front-End Development',
                    'Progressive Web Applications',
                    'Single Page Applications',
                    'Web Portals',
                    'Corporate Websites'
                ]),
                'category' => 'Web Development',
                'sort_order' => 2
            ],
            [
                'title' => 'Mobile App Development',
                'description' => 'Native and cross-platform mobile applications',
                'content' => 'We build feature-rich mobile apps for iOS and Android platforms.',
                'features' => json_encode([
                    'iOS App Development',
                    'Android App Development',
                    'Flutter Development',
                    'Cross-platform Solutions',
                    'AR/VR App Development'
                ]),
                'category' => 'Mobile Development',
                'sort_order' => 3
            ],
            [
                'title' => 'Data Science & AI',
                'description' => 'AI-powered solutions and data analytics',
                'content' => 'We help businesses leverage data and AI for better decision making.',
                'features' => json_encode([
                    'AWS & Cloud Solutions',
                    'Big Data Analytics',
                    'IoT Development',
                    'Artificial Intelligence',
                    'Machine Learning'
                ]),
                'category' => 'Data Science & AI',
                'sort_order' => 4
            ],
            [
                'title' => 'QA & Software Testing',
                'description' => 'Comprehensive testing services',
                'content' => 'We ensure your software meets the highest quality standards.',
                'features' => json_encode([
                    'Test Automation',
                    'Cybersecurity Testing',
                    'Functional Testing',
                    'Performance Testing',
                    'Mobile App Testing'
                ]),
                'category' => 'QA & Testing',
                'sort_order' => 5
            ],
            [
                'title' => 'UX/UI Design',
                'description' => 'User-centered design solutions',
                'content' => 'We create intuitive and engaging user experiences.',
                'features' => json_encode([
                    'UX Review',
                    'Product Design',
                    'Rapid Prototyping',
                    'Mobile App Design',
                    'Web Design Services'
                ]),
                'category' => 'Design',
                'sort_order' => 6
            ]
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
