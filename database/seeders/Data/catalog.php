<?php

/**
 * Full commerce catalog: categories → services → sub-services with technology slugs.
 */
return [
    'categories' => [
        [
            'slug' => 'software-development',
            'title' => 'Software Development',
            'description' => 'Custom software, SaaS platforms, CRM, ERP, and enterprise application development.',
            'sort_order' => 1,
        ],
        [
            'slug' => 'web-mobile',
            'title' => 'Web & Mobile',
            'description' => 'Modern websites, web applications, and native or cross-platform mobile apps.',
            'sort_order' => 2,
        ],
        [
            'slug' => 'design-ux',
            'title' => 'Design & UX',
            'description' => 'User research, UI/UX design, design systems, and product prototyping.',
            'sort_order' => 3,
        ],
        [
            'slug' => 'digital-marketing',
            'title' => 'Digital Marketing',
            'description' => 'SEO, paid media, social media marketing, and growth analytics.',
            'sort_order' => 4,
        ],
        [
            'slug' => 'cloud-devops',
            'title' => 'Cloud & DevOps',
            'description' => 'Cloud architecture, CI/CD pipelines, infrastructure as code, and SRE.',
            'sort_order' => 5,
        ],
        [
            'slug' => 'ai-data',
            'title' => 'AI & Data',
            'description' => 'Machine learning, AI chatbots, data engineering, and intelligent automation.',
            'sort_order' => 6,
        ],
    ],

    'services' => [
        // Software Development
        [
            'category' => 'software-development',
            'slug' => 'custom-software-development',
            'title' => 'Custom Software Development',
            'short_description' => 'Tailored business applications, internal tools, and scalable software products.',
            'highlights' => ['Custom CRM & ERP systems', 'SaaS product engineering', 'API-first architecture', 'Legacy modernization', 'Multi-tenant platforms'],
            'seo_keywords' => 'custom software, saas development, crm, erp, enterprise software',
            'sort_order' => 1,
            'sub_services' => [
                ['slug' => 'saas-product-development', 'title' => 'SaaS Product Development', 'starting_price' => 149999, 'delivery_days' => 45, 'technologies' => ['laravel', 'react-js', 'postgresql', 'redis', 'aws', 'docker'], 'highlights' => ['Multi-tenant architecture', 'Subscription billing', 'Admin dashboards', 'Role-based access', 'Analytics & reporting']],
                ['slug' => 'crm-development', 'title' => 'CRM Development', 'starting_price' => 99999, 'delivery_days' => 35, 'technologies' => ['laravel', 'vue-js', 'mysql', 'redis', 'rest-api'], 'highlights' => ['Lead & pipeline management', 'Email integration', 'Custom workflows', 'Sales automation', 'Reporting modules']],
                ['slug' => 'erp-solutions', 'title' => 'ERP Solutions', 'starting_price' => 199999, 'delivery_days' => 60, 'technologies' => ['laravel', 'java', 'postgresql', 'docker', 'kubernetes'], 'highlights' => ['Inventory management', 'Finance modules', 'HR & payroll hooks', 'Supply chain visibility', 'Audit trails']],
                ['slug' => 'api-development', 'title' => 'API Development & Integration', 'starting_price' => 59999, 'delivery_days' => 21, 'technologies' => ['laravel', 'node-js', 'graphql', 'rest-api', 'redis'], 'highlights' => ['REST & GraphQL APIs', 'Third-party integrations', 'Webhook systems', 'API documentation', 'Rate limiting & security']],
            ],
        ],
        // Web & Mobile
        [
            'category' => 'web-mobile',
            'slug' => 'web-development',
            'title' => 'Web Development',
            'short_description' => 'High-performance websites and web applications using modern frameworks.',
            'highlights' => ['Corporate websites', 'Web portals', 'E-commerce platforms', 'Progressive web apps', 'Headless CMS solutions'],
            'seo_keywords' => 'web development, laravel, react, next.js, wordpress',
            'sort_order' => 1,
            'sub_services' => [
                ['slug' => 'laravel-development', 'title' => 'Laravel Development', 'starting_price' => 79999, 'delivery_days' => 30, 'technologies' => ['php', 'laravel', 'mysql', 'redis', 'vue-js', 'docker'], 'highlights' => ['Custom Laravel applications', 'Admin panels', 'Payment integrations', 'Queue & job processing', 'API development']],
                ['slug' => 'react-development', 'title' => 'React.js Development', 'starting_price' => 89999, 'delivery_days' => 30, 'technologies' => ['react-js', 'typescript', 'node-js', 'graphql', 'tailwind-css'], 'highlights' => ['SPA development', 'State management', 'Component libraries', 'SSR-ready architecture', 'Performance optimization']],
                ['slug' => 'nextjs-development', 'title' => 'Next.js Development', 'starting_price' => 99999, 'delivery_days' => 35, 'technologies' => ['next-js', 'react-js', 'typescript', 'tailwind-css', 'aws'], 'highlights' => ['Server-side rendering', 'Static site generation', 'SEO optimization', 'Edge deployment', 'Headless integrations']],
                ['slug' => 'wordpress-development', 'title' => 'WordPress Development', 'starting_price' => 39999, 'delivery_days' => 21, 'technologies' => ['wordpress', 'php', 'mysql', 'javascript', 'woocommerce'], 'highlights' => ['Custom themes', 'Plugin development', 'WooCommerce stores', 'Performance tuning', 'Security hardening']],
                ['slug' => 'ecommerce-development', 'title' => 'E-commerce Development', 'starting_price' => 119999, 'delivery_days' => 40, 'technologies' => ['laravel', 'react-js', 'stripe', 'razorpay', 'mysql', 'redis'], 'highlights' => ['Product catalogs', 'Cart & checkout', 'Payment gateways', 'Order management', 'Inventory sync']],
            ],
        ],
        [
            'category' => 'web-mobile',
            'slug' => 'mobile-app-development',
            'title' => 'Mobile App Development',
            'short_description' => 'Native and cross-platform mobile applications for iOS and Android.',
            'highlights' => ['iOS & Android apps', 'Cross-platform Flutter', 'React Native', 'App store deployment', 'Push notifications'],
            'seo_keywords' => 'mobile app development, flutter, react native, ios, android',
            'sort_order' => 2,
            'sub_services' => [
                ['slug' => 'flutter-app-development', 'title' => 'Flutter App Development', 'starting_price' => 129999, 'delivery_days' => 45, 'technologies' => ['flutter', 'dart', 'firebase', 'rest-api', 'graphql'], 'highlights' => ['Single codebase iOS/Android', 'Custom UI components', 'Offline support', 'Firebase integration', 'App store publishing']],
                ['slug' => 'react-native-development', 'title' => 'React Native Development', 'starting_price' => 119999, 'delivery_days' => 42, 'technologies' => ['react-native', 'typescript', 'node-js', 'firebase', 'rest-api'], 'highlights' => ['Cross-platform apps', 'Native module bridges', 'OTA updates', 'Deep linking', 'Analytics integration']],
                ['slug' => 'ios-app-development', 'title' => 'iOS App Development', 'starting_price' => 149999, 'delivery_days' => 50, 'technologies' => ['swift', 'firebase', 'rest-api', 'graphql'], 'highlights' => ['Native Swift apps', 'Apple Human Interface Guidelines', 'In-app purchases', 'Push notifications', 'TestFlight deployment']],
                ['slug' => 'android-app-development', 'title' => 'Android App Development', 'starting_price' => 129999, 'delivery_days' => 45, 'technologies' => ['kotlin', 'firebase', 'rest-api', 'graphql'], 'highlights' => ['Native Kotlin apps', 'Material Design', 'Google Play deployment', 'Background services', 'Device compatibility testing']],
            ],
        ],
        // Design
        [
            'category' => 'design-ux',
            'slug' => 'ui-ux-design',
            'title' => 'UI/UX Design',
            'short_description' => 'Research-driven design for web, mobile, and enterprise products.',
            'highlights' => ['User research', 'Wireframing', 'High-fidelity UI', 'Design systems', 'Usability testing'],
            'seo_keywords' => 'ui ux design, figma, product design, design system',
            'sort_order' => 1,
            'sub_services' => [
                ['slug' => 'web-ui-ux-design', 'title' => 'Web UI/UX Design', 'starting_price' => 49999, 'delivery_days' => 21, 'technologies' => ['figma', 'adobe-xd', 'sketch', 'tailwind-css'], 'highlights' => ['User journey mapping', 'Responsive layouts', 'Design handoff', 'Accessibility (WCAG)', 'Conversion-focused UX']],
                ['slug' => 'mobile-ui-design', 'title' => 'Mobile App UI Design', 'starting_price' => 59999, 'delivery_days' => 25, 'technologies' => ['figma', 'sketch', 'flutter'], 'highlights' => ['iOS & Android patterns', 'Interactive prototypes', 'Micro-interactions', 'Design specs for dev', 'App store assets']],
                ['slug' => 'design-system-creation', 'title' => 'Design System Creation', 'starting_price' => 89999, 'delivery_days' => 35, 'technologies' => ['figma', 'storybook', 'react-js', 'tailwind-css'], 'highlights' => ['Component libraries', 'Token architecture', 'Documentation', 'Storybook integration', 'Brand consistency']],
            ],
        ],
        // Marketing
        [
            'category' => 'digital-marketing',
            'slug' => 'digital-marketing-services',
            'title' => 'Digital Marketing Services',
            'short_description' => 'Data-driven marketing to grow traffic, leads, and revenue.',
            'highlights' => ['SEO strategy', 'Paid campaigns', 'Social media', 'Content marketing', 'Analytics & CRO'],
            'seo_keywords' => 'digital marketing, seo, google ads, social media marketing',
            'sort_order' => 1,
            'sub_services' => [
                ['slug' => 'seo-services', 'title' => 'SEO Services', 'starting_price' => 29999, 'delivery_days' => 90, 'technologies' => ['google-analytics', 'wordpress', 'javascript'], 'highlights' => ['Technical SEO audit', 'Keyword research', 'On-page optimization', 'Link building strategy', 'Monthly reporting']],
                ['slug' => 'social-media-marketing', 'title' => 'Social Media Marketing', 'starting_price' => 24999, 'delivery_days' => 30, 'technologies' => ['meta-ads', 'google-analytics'], 'highlights' => ['Content calendar', 'Community management', 'Paid social campaigns', 'Influencer coordination', 'Performance dashboards']],
                ['slug' => 'ppc-performance-marketing', 'title' => 'PPC & Performance Marketing', 'starting_price' => 34999, 'delivery_days' => 30, 'technologies' => ['google-ads', 'meta-ads', 'google-analytics'], 'highlights' => ['Campaign setup', 'A/B testing', 'Landing page CRO', 'Conversion tracking', 'ROAS optimization']],
            ],
        ],
        // Cloud
        [
            'category' => 'cloud-devops',
            'slug' => 'cloud-devops-services',
            'title' => 'Cloud & DevOps Services',
            'short_description' => 'Cloud migration, infrastructure automation, and reliable CI/CD pipelines.',
            'highlights' => ['AWS & GCP architecture', 'Docker & Kubernetes', 'CI/CD pipelines', 'Monitoring & alerting', 'Security compliance'],
            'seo_keywords' => 'cloud devops, aws, kubernetes, ci cd, infrastructure',
            'sort_order' => 1,
            'sub_services' => [
                ['slug' => 'aws-cloud-solutions', 'title' => 'AWS Cloud Solutions', 'starting_price' => 99999, 'delivery_days' => 30, 'technologies' => ['aws', 'docker', 'terraform', 'kubernetes'], 'highlights' => ['Cloud architecture', 'Cost optimization', 'Auto-scaling', 'Backup & DR', 'IAM & security']],
                ['slug' => 'devops-cicd', 'title' => 'DevOps & CI/CD', 'starting_price' => 79999, 'delivery_days' => 25, 'technologies' => ['docker', 'kubernetes', 'jenkins', 'github-actions', 'terraform'], 'highlights' => ['Pipeline automation', 'Infrastructure as code', 'Container orchestration', 'Zero-downtime deploys', 'Observability setup']],
            ],
        ],
        // AI
        [
            'category' => 'ai-data',
            'slug' => 'ai-data-services',
            'title' => 'AI & Data Services',
            'short_description' => 'Intelligent automation, ML models, and AI-powered customer experiences.',
            'highlights' => ['AI chatbots', 'Machine learning', 'Data pipelines', 'Predictive analytics', 'LLM integrations'],
            'seo_keywords' => 'ai development, machine learning, chatbot, data engineering',
            'sort_order' => 1,
            'sub_services' => [
                ['slug' => 'ai-chatbot-development', 'title' => 'AI Chatbot Development', 'starting_price' => 69999, 'delivery_days' => 28, 'technologies' => ['python', 'openai', 'langchain', 'node-js', 'react-js'], 'highlights' => ['Custom GPT assistants', 'Knowledge base RAG', 'Multi-channel deployment', 'CRM integration', 'Analytics & training loops']],
                ['slug' => 'machine-learning-solutions', 'title' => 'Machine Learning Solutions', 'starting_price' => 149999, 'delivery_days' => 45, 'technologies' => ['python', 'tensorflow', 'pytorch', 'aws', 'postgresql'], 'highlights' => ['Model development', 'Data preprocessing', 'MLOps pipelines', 'Model monitoring', 'Business intelligence dashboards']],
            ],
        ],
    ],

    'package_tiers' => [
        ['name' => 'Starter', 'slug' => 'starter', 'multiplier' => 1.0, 'sale_discount' => 0.10, 'badge' => null, 'days_offset' => 0, 'revisions' => 2, 'support' => '1 month'],
        ['name' => 'Professional', 'slug' => 'professional', 'multiplier' => 2.0, 'sale_discount' => 0.12, 'badge' => 'Most Popular', 'days_offset' => 7, 'revisions' => 4, 'support' => '3 months'],
        ['name' => 'Business', 'slug' => 'business', 'multiplier' => 3.5, 'sale_discount' => 0.15, 'badge' => 'Recommended', 'days_offset' => 14, 'revisions' => 6, 'support' => '6 months'],
        ['name' => 'Enterprise', 'slug' => 'enterprise', 'multiplier' => 6.0, 'sale_discount' => 0.0, 'badge' => 'Enterprise', 'days_offset' => 21, 'revisions' => 99, 'support' => '12 months'],
    ],

    'base_features' => [
        'Discovery & requirements workshop',
        'Project management & weekly updates',
        'Responsive / cross-platform delivery',
        'Quality assurance & testing',
        'Staging environment setup',
        'Production deployment assistance',
        'Source code handover',
        'Documentation & training session',
        'Post-launch warranty support',
        'Performance optimization',
        'Security best practices',
        'Third-party API integration',
        'Admin dashboard',
        'Analytics & tracking setup',
        'SEO-ready structure',
        'Payment gateway integration',
        'Email & notification system',
        'Role-based access control',
        'Automated backup strategy',
        'CI/CD pipeline setup',
        'Load & stress testing',
        'Dedicated account manager',
        'Priority support SLA',
        'Custom architecture review',
    ],

    'why_choose_us' => [
        'Experienced cross-functional delivery team',
        'Transparent pricing with milestone billing',
        'Agile process with demo-driven validation',
        'Security-first engineering practices',
        'Scalable architecture for future growth',
        'Dedicated post-launch support options',
    ],

    'faq_questions' => [
        'How long does the project typically take?',
        'What is included in each package tier?',
        'Can I upgrade my package during the project?',
        'Do you provide post-launch maintenance?',
        'How do revisions and change requests work?',
        'What technologies will be used for my project?',
    ],
];
