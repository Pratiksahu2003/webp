<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        Testimonial::query()->delete();

        $testimonials = [
            [
                'client_name' => 'Rajesh Kumar',
                'client_position' => 'CEO',
                'client_company' => 'RetailMax India',
                'testimonial' => 'VanTroZ transformed our e-commerce platform from a bottleneck into a competitive advantage. Their Laravel team delivered ahead of schedule, and our conversion rates have never been higher. Truly a partner, not just a vendor.',
                'rating' => 5,
                'project_type' => 'Web Development',
                'sort_order' => 1,
            ],
            [
                'client_name' => 'Priya Sharma',
                'client_position' => 'CTO',
                'client_company' => 'FinSecure Technologies',
                'testimonial' => 'The AI chatbot VanTroZ built handles over 60% of our support volume flawlessly. Their understanding of fintech compliance and LLM integration was impressive. We expanded the engagement within two months.',
                'rating' => 5,
                'project_type' => 'AI Development',
                'sort_order' => 2,
            ],
            [
                'client_name' => 'Michael Chen',
                'client_position' => 'Product Director',
                'client_company' => 'HealthTrack Global',
                'testimonial' => 'From wireframes to App Store launch in 8 weeks—VanTroZ exceeded our expectations. The Flutter app is polished, performant, and our users love the experience. Highly recommend their mobile team.',
                'rating' => 5,
                'project_type' => 'Mobile App Development',
                'sort_order' => 3,
            ],
            [
                'client_name' => 'Anita Desai',
                'client_position' => 'Operations Head',
                'client_company' => 'Apex Manufacturing',
                'testimonial' => 'Replacing our 15-year-old ERP seemed impossible until VanTroZ mapped a phased migration plan. The new system unified 12 plants under one dashboard. ROI achieved in 18 months as promised.',
                'rating' => 5,
                'project_type' => 'ERP Development',
                'sort_order' => 4,
            ],
            [
                'client_name' => 'David Williams',
                'client_position' => 'Marketing Director',
                'client_company' => 'EduLearn',
                'testimonial' => 'Our organic traffic tripled in six months thanks to VanTroZ SEO team. They did not just optimize pages—they built a sustainable content strategy that keeps delivering month after month.',
                'rating' => 5,
                'project_type' => 'Digital Marketing',
                'sort_order' => 5,
            ],
            [
                'client_name' => 'Sarah Johnson',
                'client_position' => 'Founder',
                'client_company' => 'StartupHub',
                'testimonial' => 'As a non-technical founder, I needed a team that could translate my vision into a working SaaS product. VanTroZ nailed the MVP, helped us iterate based on user feedback, and scaled the platform as we grew.',
                'rating' => 5,
                'project_type' => 'SaaS Development',
                'sort_order' => 6,
            ],
            [
                'client_name' => 'Vikram Patel',
                'client_position' => 'IT Manager',
                'client_company' => 'LogiFlow Solutions',
                'testimonial' => 'VanTroZ DevOps team migrated our entire infrastructure to AWS with zero downtime. CI/CD pipelines, Docker containers, and monitoring were set up professionally. Our deployment frequency went from monthly to daily.',
                'rating' => 5,
                'project_type' => 'Cloud & DevOps',
                'sort_order' => 7,
            ],
            [
                'client_name' => 'Emily Rodriguez',
                'client_position' => 'UX Lead',
                'client_company' => 'DesignFirst Agency',
                'testimonial' => 'We partnered with VanTroZ for development while handling design in-house. Their engineers implemented our Figma designs pixel-perfectly and suggested smart UX improvements we had not considered.',
                'rating' => 5,
                'project_type' => 'Web Development',
                'sort_order' => 8,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create(array_merge($testimonial, ['is_active' => true]));
        }

        $this->command->info('Seeded '.count($testimonials).' testimonials.');
    }
}
