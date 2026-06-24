<?php

namespace Database\Seeders\Data;

class CommerceCatalogData
{
    /**
     * @return array<int, array{title: string, slug: string, description: string, sort_order: int}>
     */
    public static function categories(): array
    {
        return [
            [
                'title' => 'Software Development',
                'slug' => 'software-development',
                'description' => 'Custom software, SaaS platforms, CRM, ERP, and enterprise application development.',
                'sort_order' => 1,
            ],
            [
                'title' => 'Web Development',
                'slug' => 'web-development',
                'description' => 'Modern websites, web applications, e-commerce stores, and CMS solutions.',
                'sort_order' => 2,
            ],
            [
                'title' => 'Mobile App Development',
                'slug' => 'mobile-app-development',
                'description' => 'Native and cross-platform iOS, Android, and hybrid mobile applications.',
                'sort_order' => 3,
            ],
            [
                'title' => 'Digital Marketing',
                'slug' => 'digital-marketing',
                'description' => 'SEO, PPC, social media marketing, content strategy, and growth campaigns.',
                'sort_order' => 4,
            ],
            [
                'title' => 'Design & UX',
                'slug' => 'design-ux',
                'description' => 'UI/UX design, product design, branding, and design systems.',
                'sort_order' => 5,
            ],
            [
                'title' => 'Cloud & DevOps',
                'slug' => 'cloud-devops',
                'description' => 'Cloud migration, infrastructure automation, CI/CD, and managed DevOps.',
                'sort_order' => 6,
            ],
            [
                'title' => 'Data Science & AI',
                'slug' => 'data-science-ai',
                'description' => 'Machine learning, AI chatbots, predictive analytics, and data engineering.',
                'sort_order' => 7,
            ],
            [
                'title' => 'QA & Testing',
                'slug' => 'qa-testing',
                'description' => 'Manual testing, test automation, performance testing, and security audits.',
                'sort_order' => 8,
            ],
        ];
    }

    /**
     * Full service catalog with sub-services, packages, FAQs, and technology mappings.
     *
     * @return array<int, array<string, mixed>>
     */
    public static function services(): array
    {
        return [
            // ── Web Development ──────────────────────────────────────────
            self::service('web-development', 'web-development', 'Web Development', 1, [
                'Custom web applications, corporate websites, and e-commerce platforms built for scale.',
                ['Responsive Web Design', 'Progressive Web Apps', 'E-Commerce Solutions', 'CMS Development', 'API Integration'],
            ], [
                self::sub('laravel-development', 'Laravel Development', 49999, 21,
                    'Enterprise Laravel applications with clean architecture, robust APIs, and admin dashboards.',
                    ['laravel', 'php', 'mysql', 'redis', 'vue-js', 'tailwind-css', 'docker', 'git'],
                    49999, ['Laravel', 'PHP', 'MySQL', 'Vue.js'],
                    ['Custom module development', 'REST & GraphQL APIs', 'Multi-tenant SaaS architecture', 'Queue & job processing', 'Third-party integrations'],
                ),
                self::sub('wordpress-development', 'WordPress Development', 24999, 14,
                    'Custom WordPress themes, plugins, and headless CMS implementations.',
                    ['wordpress', 'php', 'mysql', 'javascript', 'woocommerce', 'tailwind-css', 'git'],
                    24999, ['WordPress', 'PHP', 'WooCommerce'],
                    ['Custom theme development', 'Plugin engineering', 'WooCommerce stores', 'Headless WordPress', 'Performance optimization'],
                ),
                self::sub('react-nextjs-development', 'React & Next.js Development', 59999, 21,
                    'High-performance React and Next.js applications with SSR, SSG, and modern UX.',
                    ['react-js', 'next-js', 'typescript', 'nodejs', 'tailwind-css', 'graphql', 'vercel', 'git'],
                    59999, ['React.js', 'Next.js', 'TypeScript'],
                    ['Server-side rendering', 'Static site generation', 'Component libraries', 'State management', 'SEO-optimized SPAs'],
                ),
                self::sub('nodejs-development', 'Node.js Development', 54999, 21,
                    'Scalable Node.js backends, real-time apps, and microservices architecture.',
                    ['nodejs', 'express-js', 'nestjs', 'mongodb', 'redis', 'docker', 'aws', 'git'],
                    54999, ['Node.js', 'Express.js', 'MongoDB'],
                    ['Real-time WebSocket apps', 'Microservices design', 'API gateway patterns', 'Event-driven architecture', 'Cloud-native deployment'],
                ),
                self::sub('shopify-development', 'Shopify Development', 34999, 14,
                    'Custom Shopify themes, app integrations, and conversion-optimized storefronts.',
                    ['shopify', 'javascript', 'react-js', 'tailwind-css', 'graphql', 'git'],
                    34999, ['Shopify', 'React.js', 'GraphQL'],
                    ['Custom Shopify themes', 'App & API integrations', 'Checkout customization', 'Migration from other platforms', 'Conversion rate optimization'],
                ),
                self::sub('woocommerce-development', 'WooCommerce Development', 29999, 14,
                    'Feature-rich WooCommerce stores with custom checkout flows and payment gateways.',
                    ['woocommerce', 'wordpress', 'php', 'mysql', 'javascript', 'tailwind-css', 'git'],
                    29999, ['WooCommerce', 'WordPress', 'PHP'],
                    ['Custom product types', 'Payment gateway integration', 'Subscription commerce', 'Multi-vendor marketplaces', 'Inventory sync systems'],
                ),
            ]),

            // ── Mobile App Development ───────────────────────────────────
            self::service('mobile-app-development', 'mobile-app-development', 'Mobile App Development', 2, [
                'Native and cross-platform mobile apps for iOS and Android with polished UX.',
                ['iOS Development', 'Android Development', 'Cross-Platform Apps', 'App Store Optimization', 'Mobile Backend APIs'],
            ], [
                self::sub('ios-app-development', 'iOS App Development', 79999, 30,
                    'Native iOS applications built with Swift, optimized for App Store success.',
                    ['swift', 'firebase', 'graphql', 'rest-api', 'git', 'aws'],
                    79999, ['Swift', 'Firebase', 'REST API'],
                    ['Native iOS UI/UX', 'Core Data & CloudKit', 'Push notifications', 'In-app purchases', 'App Store submission'],
                ),
                self::sub('android-app-development', 'Android App Development', 74999, 30,
                    'Native Android apps with Kotlin, Material Design, and Google Play optimization.',
                    ['kotlin', 'firebase', 'graphql', 'rest-api', 'git', 'aws'],
                    74999, ['Kotlin', 'Firebase', 'REST API'],
                    ['Material Design 3 UI', 'Room database', 'Google Play services', 'Background processing', 'Play Store deployment'],
                ),
                self::sub('flutter-development', 'Flutter Development', 69999, 28,
                    'Beautiful cross-platform apps from a single Flutter codebase for iOS and Android.',
                    ['flutter', 'dart', 'firebase', 'graphql', 'rest-api', 'git'],
                    69999, ['Flutter', 'Firebase', 'GraphQL'],
                    ['Single codebase deployment', 'Custom animations', 'Platform channels', 'Offline-first architecture', 'App store publishing'],
                ),
                self::sub('react-native-development', 'React Native Development', 64999, 28,
                    'Cross-platform mobile apps leveraging React Native and JavaScript expertise.',
                    ['react-native', 'typescript', 'nodejs', 'firebase', 'graphql', 'git'],
                    64999, ['React Native', 'TypeScript', 'Node.js'],
                    ['Native module integration', 'Over-the-air updates', 'Shared codebase strategy', 'Performance profiling', 'CI/CD for mobile'],
                ),
            ]),

            // ── Software Development ─────────────────────────────────────
            self::service('software-development', 'software-development', 'Software Development', 3, [
                'Bespoke software solutions including CRM, ERP, SaaS, and API platforms.',
                ['Custom CRM Development', 'ERP Solutions', 'SaaS Platforms', 'API Development', 'Legacy Modernization'],
            ], [
                self::sub('custom-crm-development', 'Custom CRM Development', 99999, 45,
                    'Tailored CRM systems with sales pipelines, automation, and analytics dashboards.',
                    ['laravel', 'php', 'postgresql', 'react-js', 'redis', 'docker', 'aws', 'git'],
                    99999, ['Laravel', 'PostgreSQL', 'React.js'],
                    ['Lead & pipeline management', 'Email automation', 'Role-based dashboards', 'Third-party CRM migration', 'Reporting & analytics'],
                ),
                self::sub('erp-software-development', 'ERP Software Development', 149999, 60,
                    'Integrated ERP platforms for inventory, finance, HR, and operations management.',
                    ['java', 'spring-boot', 'postgresql', 'angular', 'redis', 'docker', 'kubernetes', 'aws'],
                    149999, ['Java', 'Spring Boot', 'PostgreSQL'],
                    ['Inventory management', 'Financial accounting modules', 'HR & payroll integration', 'Supply chain tracking', 'Multi-branch support'],
                ),
                self::sub('saas-application-development', 'SaaS Application Development', 129999, 45,
                    'Multi-tenant SaaS platforms with subscription billing, onboarding, and admin portals.',
                    ['laravel', 'react-js', 'postgresql', 'redis', 'stripe', 'docker', 'aws', 'git'],
                    129999, ['Laravel', 'React.js', 'AWS'],
                    ['Multi-tenant architecture', 'Subscription billing', 'Usage metering', 'Admin & tenant portals', 'White-label capabilities'],
                ),
                self::sub('api-development', 'API Development & Integration', 44999, 14,
                    'RESTful and GraphQL APIs with documentation, versioning, and third-party integrations.',
                    ['nodejs', 'laravel', 'postgresql', 'redis', 'graphql', 'docker', 'postman', 'git'],
                    44999, ['Node.js', 'GraphQL', 'PostgreSQL'],
                    ['REST & GraphQL API design', 'OAuth 2.0 authentication', 'Rate limiting & caching', 'Swagger/OpenAPI docs', 'Webhook systems'],
                ),
            ]),

            // ── Digital Marketing ────────────────────────────────────────
            self::service('digital-marketing', 'digital-marketing', 'Digital Marketing', 4, [
                'Data-driven marketing strategies to grow traffic, leads, and revenue.',
                ['Search Engine Optimization', 'Pay-Per-Click Advertising', 'Social Media Marketing', 'Content Marketing', 'Email Campaigns'],
            ], [
                self::sub('seo-services', 'SEO Services', 19999, 30,
                    'Technical SEO, content optimization, and link building for sustainable organic growth.',
                    ['google-analytics', 'google-ads', 'nodejs', 'postgresql'],
                    19999, ['Google Analytics', 'Technical SEO', 'Content Strategy'],
                    ['Technical SEO audit', 'Keyword research & mapping', 'On-page optimization', 'Link building campaigns', 'Monthly ranking reports'],
                    'marketing',
                ),
                self::sub('social-media-marketing', 'Social Media Marketing', 14999, 30,
                    'Strategic social media management across Instagram, LinkedIn, Facebook, and X.',
                    ['meta-ads', 'google-analytics', 'react-js', 'nodejs'],
                    14999, ['Social Media Strategy', 'Content Creation', 'Paid Social'],
                    ['Platform strategy', 'Content calendar creation', 'Community management', 'Paid social campaigns', 'Influencer outreach'],
                    'marketing',
                ),
                self::sub('ppc-advertising', 'PPC Advertising', 24999, 30,
                    'Google Ads and Meta Ads campaigns optimized for maximum ROI and conversion.',
                    ['google-ads', 'meta-ads', 'google-analytics', 'nodejs'],
                    24999, ['Google Ads', 'Meta Ads', 'Conversion Tracking'],
                    ['Campaign setup & structure', 'Keyword & audience targeting', 'A/B ad creative testing', 'Landing page optimization', 'Weekly performance reports'],
                    'marketing',
                ),
                self::sub('content-marketing', 'Content Marketing', 17999, 30,
                    'Blog posts, whitepapers, case studies, and email sequences that convert.',
                    ['wordpress', 'google-analytics', 'nodejs', 'postgresql'],
                    17999, ['Content Strategy', 'Copywriting', 'Email Marketing'],
                    ['Content strategy & calendar', 'Blog & article writing', 'Lead magnet creation', 'Email nurture sequences', 'Content performance analytics'],
                    'marketing',
                ),
            ]),

            // ── Design & UX ──────────────────────────────────────────────
            self::service('design-ux', 'design-ux', 'Design & UX', 5, [
                'User-centered design that drives engagement, retention, and brand loyalty.',
                ['UI/UX Design', 'Mobile App Design', 'Product Design', 'Brand Identity', 'Design Systems'],
            ], [
                self::sub('web-ui-design', 'Web UI/UX Design', 29999, 14,
                    'Conversion-focused web interfaces with wireframes, prototypes, and design systems.',
                    ['figma', 'adobe-xd', 'sketch', 'tailwind-css'],
                    29999, ['Figma', 'UI Design', 'UX Research'],
                    ['User research & personas', 'Wireframing & prototyping', 'High-fidelity UI design', 'Design system creation', 'Developer handoff specs'],
                    'design',
                ),
                self::sub('mobile-app-design', 'Mobile App Design', 34999, 14,
                    'Intuitive mobile app interfaces following iOS HIG and Material Design guidelines.',
                    ['figma', 'adobe-xd', 'sketch', 'tailwind-css'],
                    34999, ['Figma', 'Mobile UX', 'Prototyping'],
                    ['Mobile UX research', 'Interactive prototypes', 'iOS & Android UI kits', 'Micro-interaction design', 'Usability testing'],
                    'design',
                ),
                self::sub('product-design', 'Product Design', 44999, 21,
                    'End-to-end product design from discovery through launch-ready specifications.',
                    ['figma', 'adobe-xd', 'sketch', 'tailwind-css'],
                    44999, ['Product Design', 'UX Strategy', 'Figma'],
                    ['Product discovery workshops', 'User journey mapping', 'Information architecture', 'Usability testing sessions', 'Design sprint facilitation'],
                    'design',
                ),
                self::sub('brand-identity-design', 'Brand Identity Design', 24999, 14,
                    'Complete brand identity including logo, color palette, typography, and guidelines.',
                    ['figma', 'adobe-xd', 'sketch', 'tailwind-css'],
                    24999, ['Brand Strategy', 'Logo Design', 'Visual Identity'],
                    ['Brand strategy workshop', 'Logo & mark design', 'Color & typography system', 'Brand guidelines document', 'Social media brand kit'],
                    'design',
                ),
            ]),

            // ── Cloud & DevOps ───────────────────────────────────────────
            self::service('cloud-devops', 'cloud-devops', 'Cloud & DevOps', 6, [
                'Cloud infrastructure, automation, and DevOps practices for reliable deployments.',
                ['AWS Cloud Solutions', 'CI/CD Pipelines', 'Container Orchestration', 'Infrastructure as Code', 'Monitoring & Alerting'],
            ], [
                self::sub('aws-cloud-solutions', 'AWS Cloud Solutions', 59999, 21,
                    'AWS architecture design, migration, and managed cloud operations.',
                    ['aws', 'terraform', 'docker', 'kubernetes', 'nginx', 'github-actions'],
                    59999, ['AWS', 'Terraform', 'Docker'],
                    ['Cloud architecture design', 'Migration planning & execution', 'EC2, RDS, S3, Lambda setup', 'Cost optimization review', '24/7 monitoring setup'],
                ),
                self::sub('devops-cicd', 'DevOps & CI/CD', 44999, 14,
                    'Automated CI/CD pipelines, infrastructure as code, and deployment automation.',
                    ['docker', 'kubernetes', 'jenkins', 'github-actions', 'gitlab-ci', 'terraform', 'ansible'],
                    44999, ['Docker', 'Kubernetes', 'GitHub Actions'],
                    ['CI/CD pipeline setup', 'Infrastructure as Code', 'Automated testing integration', 'Blue-green deployments', 'Environment provisioning'],
                ),
                self::sub('kubernetes-docker', 'Kubernetes & Docker', 54999, 21,
                    'Containerization strategy, Kubernetes clusters, and microservices deployment.',
                    ['docker', 'kubernetes', 'helm', 'aws', 'terraform', 'nginx'],
                    54999, ['Kubernetes', 'Docker', 'Helm'],
                    ['Containerization strategy', 'K8s cluster setup', 'Helm chart development', 'Service mesh configuration', 'Auto-scaling policies'],
                ),
            ]),

            // ── Data Science & AI ────────────────────────────────────────
            self::service('data-science-ai', 'data-science-ai', 'Data Science & AI', 7, [
                'AI-powered solutions, machine learning models, and intelligent automation.',
                ['Machine Learning', 'AI Chatbots', 'Predictive Analytics', 'Natural Language Processing', 'Computer Vision'],
            ], [
                self::sub('machine-learning-solutions', 'Machine Learning Solutions', 89999, 30,
                    'Custom ML models for prediction, classification, recommendation, and anomaly detection.',
                    ['python', 'tensorflow', 'pytorch', 'scikit-learn', 'pandas', 'postgresql', 'aws'],
                    89999, ['Python', 'TensorFlow', 'PyTorch'],
                    ['Problem framing & data audit', 'Feature engineering', 'Model training & validation', 'MLOps pipeline setup', 'Model monitoring dashboards'],
                ),
                self::sub('ai-chatbot-development', 'AI Chatbot Development', 49999, 21,
                    'Intelligent chatbots powered by LLMs for customer support, sales, and internal tools.',
                    ['python', 'openai-api', 'langchain', 'nodejs', 'react-js', 'postgresql'],
                    49999, ['OpenAI API', 'LangChain', 'Python'],
                    ['Conversational flow design', 'LLM integration & fine-tuning', 'Knowledge base RAG setup', 'Multi-channel deployment', 'Analytics & conversation logs'],
                ),
                self::sub('data-analytics-dashboard', 'Data Analytics & BI Dashboards', 59999, 21,
                    'Business intelligence dashboards, ETL pipelines, and actionable data visualizations.',
                    ['python', 'pandas', 'apache-spark', 'postgresql', 'mongodb', 'aws'],
                    59999, ['Python', 'Apache Spark', 'PostgreSQL'],
                    ['Data pipeline architecture', 'ETL/ELT development', 'Interactive BI dashboards', 'KPI definition & tracking', 'Automated reporting'],
                ),
            ]),

            // ── QA & Testing ─────────────────────────────────────────────
            self::service('qa-testing', 'qa-testing', 'QA & Software Testing', 8, [
                'Comprehensive quality assurance to ensure bug-free, secure, high-performance software.',
                ['Manual Testing', 'Test Automation', 'Performance Testing', 'Security Testing', 'Mobile App Testing'],
            ], [
                self::sub('manual-qa-testing', 'Manual QA Testing', 14999, 7,
                    'Thorough manual testing with detailed bug reports and test case documentation.',
                    ['jira', 'postman', 'browserstack', 'selenium'],
                    14999, ['Manual Testing', 'Test Cases', 'Bug Tracking'],
                    ['Test plan creation', 'Functional & regression testing', 'Cross-browser testing', 'Detailed bug reports', 'UAT support'],
                    'qa',
                ),
                self::sub('test-automation', 'Test Automation', 34999, 14,
                    'Automated test suites with Selenium, Cypress, and Jest for continuous quality.',
                    ['selenium', 'cypress', 'jest', 'phpunit', 'github-actions', 'postman'],
                    34999, ['Selenium', 'Cypress', 'Jest'],
                    ['Automation framework setup', 'UI & API test suites', 'CI/CD test integration', 'Test coverage reporting', 'Maintenance & updates'],
                    'qa',
                ),
                self::sub('performance-security-testing', 'Performance & Security Testing', 39999, 14,
                    'Load testing, penetration testing, and security audits for production readiness.',
                    ['selenium', 'cypress', 'postman', 'docker', 'nginx'],
                    39999, ['Performance Testing', 'Security Audit', 'Load Testing'],
                    ['Load & stress testing', 'OWASP security audit', 'Vulnerability assessment', 'Performance benchmarking', 'Remediation guidance'],
                    'qa',
                ),
            ]),
        ];
    }

    /**
     * Standard 4-tier package definitions scaled from a base price.
     *
     * @return array<int, array<string, mixed>>
     */
    public static function packages(int $basePrice, string $serviceName): array
    {
        $multipliers = [1, 1.8, 3, 5];
        $badges = [null, 'Most Popular', 'Recommended', 'Enterprise'];
        $names = ['Starter', 'Professional', 'Business', 'Enterprise'];
        $days = [7, 14, 21, 45];
        $revisions = [2, 4, 6, 999];
        $support = ['1 month', '3 months', '6 months', '12 months'];

        $allFeatures = self::packageFeatures($serviceName);

        $packages = [];
        foreach ($names as $i => $name) {
            $price = (int) round($basePrice * $multipliers[$i]);
            $featureCount = min(count($allFeatures), 4 + ($i * 3));

            $packages[] = [
                'package_name' => $name,
                'slug' => strtolower($name),
                'price' => $price,
                'sale_price' => $i < 3 ? (int) round($price * (0.92 - ($i * 0.02))) : null,
                'delivery_days' => $days[$i],
                'revisions' => $revisions[$i],
                'support_period' => $support[$i],
                'badge' => $badges[$i],
                'description' => "{$name} tier {$serviceName} package with {$featureCount} included features, {$revisions[$i]} revision rounds, and {$support[$i]} post-launch support.",
                'features' => array_slice($allFeatures, 0, $featureCount),
            ];
        }

        return $packages;
    }

    /**
     * @return array<int, string>
     */
    public static function packageFeatures(string $serviceName): array
    {
        return [
            'Discovery & requirements workshop',
            'Project manager assigned',
            'Responsive design implementation',
            'Cross-browser compatibility testing',
            'Mobile-first development approach',
            'Admin dashboard & CMS panel',
            'REST API development & documentation',
            'Third-party API integrations',
            'Payment gateway integration',
            'User authentication & authorization',
            'Role-based access control (RBAC)',
            'Email notification system',
            'SEO optimization & meta tags',
            'Google Analytics integration',
            'Performance optimization (Core Web Vitals)',
            'Security hardening (OWASP Top 10)',
            'SSL certificate configuration',
            'Database design & optimization',
            'Automated backup system',
            'CI/CD pipeline setup',
            'Docker containerization',
            'Cloud deployment (AWS/GCP/Azure)',
            'Load testing & stress testing',
            'Unit & integration test suite',
            'Source code & documentation handoff',
            'Team training & knowledge transfer',
            '30-day post-launch bug fix warranty',
            'Priority support channel',
            'Monthly maintenance reports',
            'Dedicated senior developer',
            'Architecture review sessions',
            'Scalability planning document',
        ];
    }

    /**
     * @return array<int, array{question: string, answer: string}>
     */
    public static function faqs(string $title): array
    {
        $company = config('company.name', 'VanTroZ');

        return [
            [
                'question' => "How long does {$title} typically take?",
                'answer' => "Timelines depend on scope and package tier. Starter packages typically deliver in 1-2 weeks, Professional in 2-4 weeks, Business in 3-6 weeks, and Enterprise projects in 6-10 weeks. During discovery, {$company} provides a detailed milestone schedule tailored to your requirements.",
            ],
            [
                'question' => "What is included in the {$title} packages?",
                'answer' => "Each package includes clearly defined deliverables listed on the package card—design, development, testing, deployment, documentation, and post-launch support. Higher tiers add more features, revision rounds, extended support, and priority access to senior engineers.",
            ],
            [
                'question' => 'Can I upgrade my package after starting?',
                'answer' => "Yes. You can upgrade to a higher tier at any point during the project. We credit your existing payment toward the upgraded package and adjust the timeline accordingly. Contact your project manager to initiate an upgrade.",
            ],
            [
                'question' => 'Do you sign NDAs and protect intellectual property?',
                'answer' => "Absolutely. {$company} signs NDAs before any confidential discussion. All source code, designs, and assets created during the project are transferred to you upon final payment. We never reuse proprietary client code in other projects.",
            ],
            [
                'question' => 'What happens after the project is delivered?',
                'answer' => 'Every package includes a post-launch support window (1-12 months depending on tier) covering bug fixes and minor adjustments. We also offer flexible monthly retainer plans for ongoing feature development, maintenance, and platform upgrades.',
            ],
            [
                'question' => 'How do you handle project communication?',
                'answer' => "You receive a dedicated project manager, access to our project management portal, weekly status updates, and sprint demo calls. We respond to messages within one business day and escalate urgent issues immediately.",
            ],
        ];
    }

    /**
     * @return array<int, string>
     */
    public static function whyChooseUs(): array
    {
        $company = config('company.name', 'VanTroZ');

        return [
            "Experienced senior engineers—not junior-only teams",
            "Transparent pricing with no hidden fees",
            "Agile delivery with weekly demos & progress reports",
            "Post-launch support included in every package",
            "NDA & full IP ownership transfer",
            "Proven track record across 200+ successful projects",
            "{$company} — your trusted technology partner since day one",
        ];
    }

    // ── Internal helpers ───────────────────────────────────────────────

    private static function service(
        string $categorySlug,
        string $slug,
        string $title,
        int $sortOrder,
        array $meta,
        array $subServices,
    ): array {
        [$shortDesc, $features] = $meta;

        return [
            'category_slug' => $categorySlug,
            'slug' => $slug,
            'title' => $title,
            'short_description' => $shortDesc,
            'features' => $features,
            'sort_order' => $sortOrder,
            'sub_services' => $subServices,
        ];
    }

    private static function sub(
        string $slug,
        string $title,
        int $startingPrice,
        int $deliveryDays,
        string $shortDescription,
        array $technologySlugs,
        int $packageBasePrice,
        array $techNames,
        array $focusAreas,
        string $vertical = 'development',
    ): array {
        return [
            'slug' => $slug,
            'title' => $title,
            'starting_price' => $startingPrice,
            'delivery_days' => $deliveryDays,
            'short_description' => $shortDescription,
            'technology_slugs' => $technologySlugs,
            'package_base_price' => $packageBasePrice,
            'description_context' => [
                'title' => $title,
                'service' => self::verticalLabel($vertical),
                'technologies' => $techNames,
                'focus' => $focusAreas,
                'benefits' => [
                    'Dedicated project manager and single point of contact',
                    'Senior engineers with 5+ years domain experience',
                    'Milestone-based payments tied to deliverables',
                    'Full source code and documentation ownership',
                    'Post-launch support window included with every tier',
                ],
                'process' => [
                    'Discovery call & requirements gathering',
                    'Technical architecture & project plan',
                    'UI/UX design & client approval',
                    'Agile development sprints with weekly demos',
                    'QA testing, security review & performance audit',
                    'Deployment, training & knowledge transfer',
                ],
                'industries' => [
                    'E-Commerce & Retail',
                    'Healthcare & Telemedicine',
                    'FinTech & Banking',
                    'EdTech & E-Learning',
                    'Real Estate & PropTech',
                    'Logistics & Supply Chain',
                    'SaaS & Technology Startups',
                    'Manufacturing & Industry 4.0',
                ],
                'deliverables' => self::deliverablesFor($vertical, $title),
            ],
        ];
    }

    private static function verticalLabel(string $vertical): string
    {
        return match ($vertical) {
            'marketing' => 'digital marketing and growth strategy',
            'design' => 'user experience and visual design',
            'qa' => 'quality assurance and software testing',
            default => 'software engineering and product development',
        };
    }

    private static function deliverablesFor(string $vertical, string $title): array
    {
        return match ($vertical) {
            'marketing' => [
                "Comprehensive {$title} strategy document",
                'Competitive analysis & keyword/audience research',
                'Campaign setup across selected channels',
                'Creative assets & ad copy variations',
                'Conversion tracking & analytics dashboard',
                'Monthly performance reports with recommendations',
            ],
            'design' => [
                "Complete {$title} design files (Figma/XD)",
                'User research summary & persona documents',
                'Wireframes and interactive prototypes',
                'High-fidelity UI screens for all key flows',
                'Design system & component library',
                'Developer handoff specifications',
            ],
            'qa' => [
                "Detailed {$title} test plan & test cases",
                'Bug reports with severity classification',
                'Cross-browser & cross-device test matrix',
                'Performance & load test results',
                'Security vulnerability assessment report',
                'Final QA sign-off certificate',
            ],
            default => [
                "Fully functional {$title} application",
                'Clean, documented source code repository',
                'Technical architecture documentation',
                'Admin panel with role-based access',
                'API documentation (Swagger/OpenAPI)',
                'Deployment guide & environment setup',
            ],
        };
    }
}
