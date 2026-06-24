<?php

namespace Database\Seeders;

use App\Models\CaseStudy;
use Illuminate\Database\Seeder;

class CaseStudySeeder extends Seeder
{
    public function run(): void
    {
        CaseStudy::query()->delete();

        $studies = [
            [
                'title' => 'E-Commerce Platform Scaling for RetailMax',
                'description' => 'How we rebuilt a legacy e-commerce platform handling 10x traffic growth during peak season.',
                'content' => '<p>RetailMax approached VanTroZ with a monolithic PHP application struggling under Black Friday load. We architected a Laravel + React microservices platform with Redis caching, CDN integration, and auto-scaling AWS infrastructure. Result: 99.97% uptime during peak, 45% faster page loads, and 28% increase in conversion rate.</p>',
                'category' => 'Web Development',
                'industry' => 'E-Commerce',
                'metrics' => ['99.97% uptime', '45% faster loads', '28% conversion lift', '10x traffic capacity'],
                'technologies' => ['Laravel', 'React.js', 'AWS', 'Redis', 'Docker'],
                'sort_order' => 1,
            ],
            [
                'title' => 'AI-Powered Customer Support for FinSecure',
                'description' => 'Deploying an intelligent chatbot that reduced support tickets by 62% for a fintech startup.',
                'content' => '<p>FinSecure needed 24/7 customer support without scaling headcount. We built a LangChain-powered chatbot integrated with their knowledge base, CRM, and transaction APIs. The bot handles account inquiries, KYC status, and payment disputes with human handoff for complex cases.</p>',
                'category' => 'Data Science & AI',
                'industry' => 'FinTech',
                'metrics' => ['62% ticket reduction', '4.8/5 CSAT score', '< 3s response time', '24/7 availability'],
                'technologies' => ['Python', 'OpenAI API', 'LangChain', 'Node.js', 'PostgreSQL'],
                'sort_order' => 2,
            ],
            [
                'title' => 'Cross-Platform Mobile App for HealthTrack',
                'description' => 'Flutter app connecting patients with telemedicine providers across iOS and Android.',
                'content' => '<p>HealthTrack required HIPAA-aware telemedicine features including video consultations, prescription management, and health record access. We delivered a Flutter app with end-to-end encryption, biometric authentication, and real-time notifications—published on both App Store and Google Play within 8 weeks.</p>',
                'category' => 'Mobile App Development',
                'industry' => 'Healthcare',
                'metrics' => ['50K+ downloads', '4.7 App Store rating', '8-week delivery', '2 platforms from 1 codebase'],
                'technologies' => ['Flutter', 'Firebase', 'Node.js', 'AWS'],
                'sort_order' => 3,
            ],
            [
                'title' => 'ERP Modernization for Apex Manufacturing',
                'description' => 'Replacing a 15-year-old ERP with a modern Spring Boot platform across 12 factory locations.',
                'content' => '<p>Apex Manufacturing operated on fragmented spreadsheets and a legacy ERP. We delivered an integrated Spring Boot + Angular ERP covering inventory, production planning, quality control, and financial reporting—with real-time dashboards for plant managers and executive leadership.</p>',
                'category' => 'Software Development',
                'industry' => 'Manufacturing',
                'metrics' => ['12 locations unified', '35% inventory cost reduction', 'Real-time reporting', '18-month ROI'],
                'technologies' => ['Java', 'Spring Boot', 'Angular', 'PostgreSQL', 'Kubernetes'],
                'sort_order' => 4,
            ],
            [
                'title' => 'SEO Growth Strategy for EduLearn Platform',
                'description' => 'Organic traffic increased 340% in 6 months through technical SEO and content strategy.',
                'content' => '<p>EduLearn had quality course content but minimal organic visibility. Our SEO team performed a full technical audit, restructured site architecture, optimized 200+ course pages, and executed a content marketing plan targeting high-intent education keywords.</p>',
                'category' => 'Digital Marketing',
                'industry' => 'EdTech',
                'metrics' => ['340% organic traffic growth', 'Top 3 for 45 keywords', '55% lower CPA', '6-month timeline'],
                'technologies' => ['Google Analytics', 'WordPress', 'Technical SEO'],
                'sort_order' => 5,
            ],
        ];

        foreach ($studies as $study) {
            CaseStudy::create(array_merge($study, ['is_active' => true]));
        }

        $this->command->info('Seeded '.count($studies).' case studies.');
    }
}
