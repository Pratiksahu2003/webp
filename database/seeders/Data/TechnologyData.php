<?php

namespace Database\Seeders\Data;

class TechnologyData
{
    /**
     * @return array<int, array{name: string, slug: string, category: string, technology_type: string, icon: string, website_url: string, sort_order: int}>
     */
    public static function all(): array
    {
        $technologies = [
            // Programming Languages
            ['name' => 'PHP', 'category' => 'Back-End', 'technology_type' => 'Programming Language', 'icon' => '🐘', 'website_url' => 'https://www.php.net', 'sort_order' => 1],
            ['name' => 'JavaScript', 'category' => 'Front-End', 'technology_type' => 'Programming Language', 'icon' => '🟨', 'website_url' => 'https://developer.mozilla.org/en-US/docs/Web/JavaScript', 'sort_order' => 2],
            ['name' => 'TypeScript', 'category' => 'Front-End', 'technology_type' => 'Programming Language', 'icon' => '📘', 'website_url' => 'https://www.typescriptlang.org', 'sort_order' => 3],
            ['name' => 'Python', 'category' => 'Back-End', 'technology_type' => 'Programming Language', 'icon' => '🐍', 'website_url' => 'https://www.python.org', 'sort_order' => 4],
            ['name' => 'Java', 'category' => 'Back-End', 'technology_type' => 'Programming Language', 'icon' => '☕', 'website_url' => 'https://www.java.com', 'sort_order' => 5],
            ['name' => 'Kotlin', 'category' => 'Mobile apps', 'technology_type' => 'Programming Language', 'icon' => '🤖', 'website_url' => 'https://kotlinlang.org', 'sort_order' => 6],
            ['name' => 'Swift', 'category' => 'Mobile apps', 'technology_type' => 'Programming Language', 'icon' => '🍎', 'website_url' => 'https://swift.org', 'sort_order' => 7],
            ['name' => 'Go', 'category' => 'Back-End', 'technology_type' => 'Programming Language', 'icon' => '🔵', 'website_url' => 'https://go.dev', 'sort_order' => 8],
            ['name' => 'Ruby', 'category' => 'Back-End', 'technology_type' => 'Programming Language', 'icon' => '💎', 'website_url' => 'https://www.ruby-lang.org', 'sort_order' => 9],
            ['name' => 'C#', 'category' => 'Back-End', 'technology_type' => 'Programming Language', 'icon' => '🟣', 'website_url' => 'https://dotnet.microsoft.com', 'sort_order' => 10],
            ['name' => 'Rust', 'category' => 'Back-End', 'technology_type' => 'Programming Language', 'icon' => '🦀', 'website_url' => 'https://www.rust-lang.org', 'sort_order' => 11],
            ['name' => 'Scala', 'category' => 'Back-End', 'technology_type' => 'Programming Language', 'icon' => '🔺', 'website_url' => 'https://www.scala-lang.org', 'sort_order' => 12],

            // Frameworks & Backend
            ['name' => 'Laravel', 'category' => 'Back-End', 'technology_type' => 'Framework', 'icon' => '🔴', 'website_url' => 'https://laravel.com', 'sort_order' => 13],
            ['name' => 'Symfony', 'category' => 'Back-End', 'technology_type' => 'Framework', 'icon' => '🟤', 'website_url' => 'https://symfony.com', 'sort_order' => 14],
            ['name' => 'Node.js', 'category' => 'Back-End', 'technology_type' => 'Backend', 'icon' => '🟢', 'website_url' => 'https://nodejs.org', 'sort_order' => 15],
            ['name' => 'Express.js', 'category' => 'Back-End', 'technology_type' => 'Framework', 'icon' => '⚡', 'website_url' => 'https://expressjs.com', 'sort_order' => 16],
            ['name' => 'NestJS', 'category' => 'Back-End', 'technology_type' => 'Framework', 'icon' => '🪺', 'website_url' => 'https://nestjs.com', 'sort_order' => 17],
            ['name' => 'Django', 'category' => 'Back-End', 'technology_type' => 'Framework', 'icon' => '🎸', 'website_url' => 'https://www.djangoproject.com', 'sort_order' => 18],
            ['name' => 'Flask', 'category' => 'Back-End', 'technology_type' => 'Framework', 'icon' => '🧪', 'website_url' => 'https://flask.palletsprojects.com', 'sort_order' => 19],
            ['name' => 'Spring Boot', 'category' => 'Back-End', 'technology_type' => 'Framework', 'icon' => '🌱', 'website_url' => 'https://spring.io/projects/spring-boot', 'sort_order' => 20],
            ['name' => 'Ruby on Rails', 'category' => 'Back-End', 'technology_type' => 'Framework', 'icon' => '🚂', 'website_url' => 'https://rubyonrails.org', 'sort_order' => 21],
            ['name' => 'ASP.NET Core', 'category' => 'Back-End', 'technology_type' => 'Framework', 'icon' => '🟦', 'website_url' => 'https://dotnet.microsoft.com/apps/aspnet', 'sort_order' => 22],
            ['name' => 'WordPress', 'category' => 'Back-End', 'technology_type' => 'Framework', 'icon' => '📝', 'website_url' => 'https://wordpress.org', 'sort_order' => 23],
            ['name' => 'Shopify', 'category' => 'Back-End', 'technology_type' => 'Framework', 'icon' => '🛒', 'website_url' => 'https://www.shopify.com', 'sort_order' => 24],
            ['name' => 'WooCommerce', 'category' => 'Back-End', 'technology_type' => 'Framework', 'icon' => '🛍️', 'website_url' => 'https://woocommerce.com', 'sort_order' => 25],

            // Front-End
            ['name' => 'React.js', 'category' => 'Front-End', 'technology_type' => 'Frontend', 'icon' => '⚛️', 'website_url' => 'https://react.dev', 'sort_order' => 26],
            ['name' => 'Next.js', 'category' => 'Front-End', 'technology_type' => 'Frontend', 'icon' => '▲', 'website_url' => 'https://nextjs.org', 'sort_order' => 27],
            ['name' => 'Vue.js', 'category' => 'Front-End', 'technology_type' => 'Frontend', 'icon' => '💚', 'website_url' => 'https://vuejs.org', 'sort_order' => 28],
            ['name' => 'Nuxt.js', 'category' => 'Front-End', 'technology_type' => 'Frontend', 'icon' => '💚', 'website_url' => 'https://nuxt.com', 'sort_order' => 29],
            ['name' => 'Angular', 'category' => 'Front-End', 'technology_type' => 'Frontend', 'icon' => '🅰️', 'website_url' => 'https://angular.io', 'sort_order' => 30],
            ['name' => 'Svelte', 'category' => 'Front-End', 'technology_type' => 'Frontend', 'icon' => '🧡', 'website_url' => 'https://svelte.dev', 'sort_order' => 31],
            ['name' => 'Tailwind CSS', 'category' => 'Front-End', 'technology_type' => 'Frontend', 'icon' => '🎨', 'website_url' => 'https://tailwindcss.com', 'sort_order' => 32],
            ['name' => 'Bootstrap', 'category' => 'Front-End', 'technology_type' => 'Frontend', 'icon' => '🅱️', 'website_url' => 'https://getbootstrap.com', 'sort_order' => 33],
            ['name' => 'Material UI', 'category' => 'Front-End', 'technology_type' => 'Frontend', 'icon' => '🎨', 'website_url' => 'https://mui.com', 'sort_order' => 34],
            ['name' => 'Ant Design', 'category' => 'Front-End', 'technology_type' => 'Frontend', 'icon' => '🐜', 'website_url' => 'https://ant.design', 'sort_order' => 35],
            ['name' => 'GraphQL', 'category' => 'Front-End', 'technology_type' => 'Frontend', 'icon' => '🔷', 'website_url' => 'https://graphql.org', 'sort_order' => 36],
            ['name' => 'REST API', 'category' => 'Back-End', 'technology_type' => 'Backend', 'icon' => '🔗', 'website_url' => 'https://restfulapi.net', 'sort_order' => 37],

            // Databases
            ['name' => 'MySQL', 'category' => 'Database', 'technology_type' => 'Database', 'icon' => '🗄️', 'website_url' => 'https://www.mysql.com', 'sort_order' => 38],
            ['name' => 'PostgreSQL', 'category' => 'Database', 'technology_type' => 'Database', 'icon' => '🐘', 'website_url' => 'https://www.postgresql.org', 'sort_order' => 39],
            ['name' => 'MongoDB', 'category' => 'Database', 'technology_type' => 'Database', 'icon' => '🍃', 'website_url' => 'https://www.mongodb.com', 'sort_order' => 40],
            ['name' => 'Redis', 'category' => 'Database', 'technology_type' => 'Database', 'icon' => '🔴', 'website_url' => 'https://redis.io', 'sort_order' => 41],
            ['name' => 'SQLite', 'category' => 'Database', 'technology_type' => 'Database', 'icon' => '📦', 'website_url' => 'https://www.sqlite.org', 'sort_order' => 42],
            ['name' => 'MariaDB', 'category' => 'Database', 'technology_type' => 'Database', 'icon' => '🗃️', 'website_url' => 'https://mariadb.org', 'sort_order' => 43],
            ['name' => 'Elasticsearch', 'category' => 'Database', 'technology_type' => 'Database', 'icon' => '🔍', 'website_url' => 'https://www.elastic.co', 'sort_order' => 44],

            // Mobile
            ['name' => 'Flutter', 'category' => 'Mobile apps', 'technology_type' => 'Mobile', 'icon' => '🦋', 'website_url' => 'https://flutter.dev', 'sort_order' => 45],
            ['name' => 'React Native', 'category' => 'Mobile apps', 'technology_type' => 'Mobile', 'icon' => '📱', 'website_url' => 'https://reactnative.dev', 'sort_order' => 46],
            ['name' => 'Ionic', 'category' => 'Mobile apps', 'technology_type' => 'Mobile', 'icon' => '⚡', 'website_url' => 'https://ionicframework.com', 'sort_order' => 47],
            ['name' => 'Xamarin', 'category' => 'Mobile apps', 'technology_type' => 'Mobile', 'icon' => '📲', 'website_url' => 'https://dotnet.microsoft.com/apps/xamarin', 'sort_order' => 48],
            ['name' => 'Firebase', 'category' => 'Mobile apps', 'technology_type' => 'Mobile', 'icon' => '🔥', 'website_url' => 'https://firebase.google.com', 'sort_order' => 49],

            // Cloud
            ['name' => 'AWS', 'category' => 'Cloud & DevOps', 'technology_type' => 'Cloud', 'icon' => '☁️', 'website_url' => 'https://aws.amazon.com', 'sort_order' => 50],
            ['name' => 'Google Cloud', 'category' => 'Cloud & DevOps', 'technology_type' => 'Cloud', 'icon' => '🌩️', 'website_url' => 'https://cloud.google.com', 'sort_order' => 51],
            ['name' => 'Microsoft Azure', 'category' => 'Cloud & DevOps', 'technology_type' => 'Cloud', 'icon' => '🔷', 'website_url' => 'https://azure.microsoft.com', 'sort_order' => 52],
            ['name' => 'DigitalOcean', 'category' => 'Cloud & DevOps', 'technology_type' => 'Cloud', 'icon' => '🌊', 'website_url' => 'https://www.digitalocean.com', 'sort_order' => 53],
            ['name' => 'Vercel', 'category' => 'Cloud & DevOps', 'technology_type' => 'Cloud', 'icon' => '▲', 'website_url' => 'https://vercel.com', 'sort_order' => 54],

            // DevOps
            ['name' => 'Docker', 'category' => 'Cloud & DevOps', 'technology_type' => 'DevOps', 'icon' => '🐳', 'website_url' => 'https://www.docker.com', 'sort_order' => 55],
            ['name' => 'Kubernetes', 'category' => 'Cloud & DevOps', 'technology_type' => 'DevOps', 'icon' => '⚙️', 'website_url' => 'https://kubernetes.io', 'sort_order' => 56],
            ['name' => 'Jenkins', 'category' => 'Cloud & DevOps', 'technology_type' => 'DevOps', 'icon' => '🔧', 'website_url' => 'https://www.jenkins.io', 'sort_order' => 57],
            ['name' => 'GitHub Actions', 'category' => 'Cloud & DevOps', 'technology_type' => 'DevOps', 'icon' => '🔄', 'website_url' => 'https://github.com/features/actions', 'sort_order' => 58],
            ['name' => 'GitLab CI', 'category' => 'Cloud & DevOps', 'technology_type' => 'DevOps', 'icon' => '🦊', 'website_url' => 'https://about.gitlab.com/stages-devops-lifecycle/continuous-integration', 'sort_order' => 59],
            ['name' => 'Terraform', 'category' => 'Cloud & DevOps', 'technology_type' => 'DevOps', 'icon' => '🏗️', 'website_url' => 'https://www.terraform.io', 'sort_order' => 60],
            ['name' => 'Ansible', 'category' => 'Cloud & DevOps', 'technology_type' => 'DevOps', 'icon' => '📋', 'website_url' => 'https://www.ansible.com', 'sort_order' => 61],
            ['name' => 'Nginx', 'category' => 'Cloud & DevOps', 'technology_type' => 'DevOps', 'icon' => '🌐', 'website_url' => 'https://nginx.org', 'sort_order' => 62],
            ['name' => 'Git', 'category' => 'Cloud & DevOps', 'technology_type' => 'DevOps', 'icon' => '📂', 'website_url' => 'https://git-scm.com', 'sort_order' => 63],

            // AI/ML
            ['name' => 'TensorFlow', 'category' => 'Data Science', 'technology_type' => 'AI/ML', 'icon' => '🧠', 'website_url' => 'https://www.tensorflow.org', 'sort_order' => 64],
            ['name' => 'PyTorch', 'category' => 'Data Science', 'technology_type' => 'AI/ML', 'icon' => '🔥', 'website_url' => 'https://pytorch.org', 'sort_order' => 65],
            ['name' => 'OpenAI API', 'category' => 'Data Science', 'technology_type' => 'AI/ML', 'icon' => '🤖', 'website_url' => 'https://openai.com/api', 'sort_order' => 66],
            ['name' => 'LangChain', 'category' => 'Data Science', 'technology_type' => 'AI/ML', 'icon' => '🔗', 'website_url' => 'https://www.langchain.com', 'sort_order' => 67],
            ['name' => 'Scikit-learn', 'category' => 'Data Science', 'technology_type' => 'AI/ML', 'icon' => '📊', 'website_url' => 'https://scikit-learn.org', 'sort_order' => 68],
            ['name' => 'Pandas', 'category' => 'Data Science', 'technology_type' => 'AI/ML', 'icon' => '🐼', 'website_url' => 'https://pandas.pydata.org', 'sort_order' => 69],
            ['name' => 'Apache Spark', 'category' => 'Data Science', 'technology_type' => 'AI/ML', 'icon' => '⚡', 'website_url' => 'https://spark.apache.org', 'sort_order' => 70],

            // Testing & QA
            ['name' => 'Selenium', 'category' => 'QA & Testing', 'technology_type' => 'DevOps', 'icon' => '🧪', 'website_url' => 'https://www.selenium.dev', 'sort_order' => 71],
            ['name' => 'Cypress', 'category' => 'QA & Testing', 'technology_type' => 'DevOps', 'icon' => '🌲', 'website_url' => 'https://www.cypress.io', 'sort_order' => 72],
            ['name' => 'Jest', 'category' => 'QA & Testing', 'technology_type' => 'DevOps', 'icon' => '✅', 'website_url' => 'https://jestjs.io', 'sort_order' => 73],
            ['name' => 'PHPUnit', 'category' => 'QA & Testing', 'technology_type' => 'DevOps', 'icon' => '🧪', 'website_url' => 'https://phpunit.de', 'sort_order' => 74],
            ['name' => 'Postman', 'category' => 'QA & Testing', 'technology_type' => 'DevOps', 'icon' => '📮', 'website_url' => 'https://www.postman.com', 'sort_order' => 75],

            // Design
            ['name' => 'Figma', 'category' => 'Design', 'technology_type' => 'Frontend', 'icon' => '🎨', 'website_url' => 'https://www.figma.com', 'sort_order' => 76],
            ['name' => 'Adobe XD', 'category' => 'Design', 'technology_type' => 'Frontend', 'icon' => '🖌️', 'website_url' => 'https://helpx.adobe.com/xd/get-started.html', 'sort_order' => 77],
            ['name' => 'Sketch', 'category' => 'Design', 'technology_type' => 'Frontend', 'icon' => '💎', 'website_url' => 'https://www.sketch.com', 'sort_order' => 78],
            ['name' => 'Dart', 'category' => 'Mobile apps', 'technology_type' => 'Programming Language', 'icon' => '🎯', 'website_url' => 'https://dart.dev', 'sort_order' => 79],
            ['name' => 'Helm', 'category' => 'Cloud & DevOps', 'technology_type' => 'DevOps', 'icon' => '⎈', 'website_url' => 'https://helm.sh', 'sort_order' => 80],
            ['name' => 'Stripe', 'category' => 'Back-End', 'technology_type' => 'Framework', 'icon' => '💳', 'website_url' => 'https://stripe.com', 'sort_order' => 81],
            ['name' => 'Google Analytics', 'category' => 'Digital Marketing', 'technology_type' => 'DevOps', 'icon' => '📈', 'website_url' => 'https://analytics.google.com', 'sort_order' => 82],
            ['name' => 'Google Ads', 'category' => 'Digital Marketing', 'technology_type' => 'DevOps', 'icon' => '📢', 'website_url' => 'https://ads.google.com', 'sort_order' => 83],
            ['name' => 'Meta Ads', 'category' => 'Digital Marketing', 'technology_type' => 'DevOps', 'icon' => '📱', 'website_url' => 'https://www.facebook.com/business/ads', 'sort_order' => 84],
            ['name' => 'Jira', 'category' => 'QA & Testing', 'technology_type' => 'DevOps', 'icon' => '📋', 'website_url' => 'https://www.atlassian.com/software/jira', 'sort_order' => 85],
            ['name' => 'BrowserStack', 'category' => 'QA & Testing', 'technology_type' => 'DevOps', 'icon' => '🌐', 'website_url' => 'https://www.browserstack.com', 'sort_order' => 86],
        ];

        return array_map(function (array $tech) {
            $tech['slug'] = \Illuminate\Support\Str::slug($tech['name']);

            return $tech;
        }, $technologies);
    }
}
