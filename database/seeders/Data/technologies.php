<?php

/**
 * Master technology catalog keyed by slug for sub-service mapping.
 */
return [
    // Programming Languages
    ['slug' => 'php', 'name' => 'PHP', 'type' => 'Programming Language', 'category' => 'Back-End', 'icon' => '🐘', 'url' => 'https://www.php.net'],
    ['slug' => 'javascript', 'name' => 'JavaScript', 'type' => 'Programming Language', 'category' => 'Front-End', 'icon' => '🟨', 'url' => 'https://developer.mozilla.org/en-US/docs/Web/JavaScript'],
    ['slug' => 'typescript', 'name' => 'TypeScript', 'type' => 'Programming Language', 'category' => 'Front-End', 'icon' => '📘', 'url' => 'https://www.typescriptlang.org'],
    ['slug' => 'python', 'name' => 'Python', 'type' => 'Programming Language', 'category' => 'Back-End', 'icon' => '🐍', 'url' => 'https://www.python.org'],
    ['slug' => 'java', 'name' => 'Java', 'type' => 'Programming Language', 'category' => 'Back-End', 'icon' => '☕', 'url' => 'https://www.java.com'],
    ['slug' => 'kotlin', 'name' => 'Kotlin', 'type' => 'Programming Language', 'category' => 'Mobile', 'icon' => '🤖', 'url' => 'https://kotlinlang.org'],
    ['slug' => 'swift', 'name' => 'Swift', 'type' => 'Programming Language', 'category' => 'Mobile', 'icon' => '🍎', 'url' => 'https://swift.org'],
    ['slug' => 'dart', 'name' => 'Dart', 'type' => 'Programming Language', 'category' => 'Mobile', 'icon' => '🎯', 'url' => 'https://dart.dev'],
    ['slug' => 'go', 'name' => 'Go', 'type' => 'Programming Language', 'category' => 'Back-End', 'icon' => '🔵', 'url' => 'https://go.dev'],

    // Frameworks & Libraries
    ['slug' => 'laravel', 'name' => 'Laravel', 'type' => 'Framework', 'category' => 'Back-End', 'icon' => '🔴', 'url' => 'https://laravel.com'],
    ['slug' => 'react-js', 'name' => 'React.js', 'type' => 'Framework', 'category' => 'Front-End', 'icon' => '⚛️', 'url' => 'https://react.dev'],
    ['slug' => 'next-js', 'name' => 'Next.js', 'type' => 'Framework', 'category' => 'Front-End', 'icon' => '▲', 'url' => 'https://nextjs.org'],
    ['slug' => 'vue-js', 'name' => 'Vue.js', 'type' => 'Framework', 'category' => 'Front-End', 'icon' => '💚', 'url' => 'https://vuejs.org'],
    ['slug' => 'angular', 'name' => 'Angular', 'type' => 'Framework', 'category' => 'Front-End', 'icon' => '🅰️', 'url' => 'https://angular.io'],
    ['slug' => 'node-js', 'name' => 'Node.js', 'type' => 'Backend', 'category' => 'Back-End', 'icon' => '🟢', 'url' => 'https://nodejs.org'],
    ['slug' => 'express-js', 'name' => 'Express.js', 'type' => 'Framework', 'category' => 'Back-End', 'icon' => '🚂', 'url' => 'https://expressjs.com'],
    ['slug' => 'django', 'name' => 'Django', 'type' => 'Framework', 'category' => 'Back-End', 'icon' => '🎸', 'url' => 'https://www.djangoproject.com'],
    ['slug' => 'flutter', 'name' => 'Flutter', 'type' => 'Framework', 'category' => 'Mobile', 'icon' => '🦋', 'url' => 'https://flutter.dev'],
    ['slug' => 'react-native', 'name' => 'React Native', 'type' => 'Framework', 'category' => 'Mobile', 'icon' => '📱', 'url' => 'https://reactnative.dev'],
    ['slug' => 'wordpress', 'name' => 'WordPress', 'type' => 'CMS', 'category' => 'Back-End', 'icon' => '📝', 'url' => 'https://wordpress.org'],
    ['slug' => 'woocommerce', 'name' => 'WooCommerce', 'type' => 'E-commerce', 'category' => 'Back-End', 'icon' => '🛒', 'url' => 'https://woocommerce.com'],
    ['slug' => 'shopify', 'name' => 'Shopify', 'type' => 'E-commerce', 'category' => 'Cloud', 'icon' => '🛍️', 'url' => 'https://www.shopify.com'],
    ['slug' => 'tailwind-css', 'name' => 'Tailwind CSS', 'type' => 'Frontend', 'category' => 'Front-End', 'icon' => '🎨', 'url' => 'https://tailwindcss.com'],
    ['slug' => 'bootstrap', 'name' => 'Bootstrap', 'type' => 'Frontend', 'category' => 'Front-End', 'icon' => '🅱️', 'url' => 'https://getbootstrap.com'],
    ['slug' => 'graphql', 'name' => 'GraphQL', 'type' => 'API', 'category' => 'Back-End', 'icon' => '🔷', 'url' => 'https://graphql.org'],
    ['slug' => 'rest-api', 'name' => 'REST API', 'type' => 'API', 'category' => 'Back-End', 'icon' => '🔗', 'url' => null],
    ['slug' => 'langchain', 'name' => 'LangChain', 'type' => 'AI/ML', 'category' => 'AI/ML', 'icon' => '🧠', 'url' => 'https://www.langchain.com'],
    ['slug' => 'tensorflow', 'name' => 'TensorFlow', 'type' => 'AI/ML', 'category' => 'AI/ML', 'icon' => '🤖', 'url' => 'https://www.tensorflow.org'],
    ['slug' => 'pytorch', 'name' => 'PyTorch', 'type' => 'AI/ML', 'category' => 'AI/ML', 'icon' => '🔥', 'url' => 'https://pytorch.org'],
    ['slug' => 'openai', 'name' => 'OpenAI API', 'type' => 'AI/ML', 'category' => 'AI/ML', 'icon' => '✨', 'url' => 'https://openai.com'],

    // Databases
    ['slug' => 'mysql', 'name' => 'MySQL', 'type' => 'Database', 'category' => 'Database', 'icon' => '🗄️', 'url' => 'https://www.mysql.com'],
    ['slug' => 'postgresql', 'name' => 'PostgreSQL', 'type' => 'Database', 'category' => 'Database', 'icon' => '🐘', 'url' => 'https://www.postgresql.org'],
    ['slug' => 'mongodb', 'name' => 'MongoDB', 'type' => 'Database', 'category' => 'Database', 'icon' => '🍃', 'url' => 'https://www.mongodb.com'],
    ['slug' => 'redis', 'name' => 'Redis', 'type' => 'Database', 'category' => 'Database', 'icon' => '🔴', 'url' => 'https://redis.io'],
    ['slug' => 'elasticsearch', 'name' => 'Elasticsearch', 'type' => 'Database', 'category' => 'Database', 'icon' => '🔍', 'url' => 'https://www.elastic.co'],

    // Cloud & DevOps
    ['slug' => 'aws', 'name' => 'Amazon Web Services', 'type' => 'Cloud', 'category' => 'Cloud', 'icon' => '☁️', 'url' => 'https://aws.amazon.com'],
    ['slug' => 'google-cloud', 'name' => 'Google Cloud', 'type' => 'Cloud', 'category' => 'Cloud', 'icon' => '🌩️', 'url' => 'https://cloud.google.com'],
    ['slug' => 'azure', 'name' => 'Microsoft Azure', 'type' => 'Cloud', 'category' => 'Cloud', 'icon' => '🔷', 'url' => 'https://azure.microsoft.com'],
    ['slug' => 'docker', 'name' => 'Docker', 'type' => 'DevOps', 'category' => 'DevOps', 'icon' => '🐳', 'url' => 'https://www.docker.com'],
    ['slug' => 'kubernetes', 'name' => 'Kubernetes', 'type' => 'DevOps', 'category' => 'DevOps', 'icon' => '⚙️', 'url' => 'https://kubernetes.io'],
    ['slug' => 'terraform', 'name' => 'Terraform', 'type' => 'DevOps', 'category' => 'DevOps', 'icon' => '🏗️', 'url' => 'https://www.terraform.io'],
    ['slug' => 'jenkins', 'name' => 'Jenkins', 'type' => 'DevOps', 'category' => 'DevOps', 'icon' => '👨‍💼', 'url' => 'https://www.jenkins.io'],
    ['slug' => 'github-actions', 'name' => 'GitHub Actions', 'type' => 'DevOps', 'category' => 'DevOps', 'icon' => '🐙', 'url' => 'https://github.com/features/actions'],
    ['slug' => 'git', 'name' => 'Git', 'type' => 'DevOps', 'category' => 'DevOps', 'icon' => '📦', 'url' => 'https://git-scm.com'],
    ['slug' => 'firebase', 'name' => 'Firebase', 'type' => 'Cloud', 'category' => 'Mobile', 'icon' => '🔥', 'url' => 'https://firebase.google.com'],

    // Design & Marketing
    ['slug' => 'figma', 'name' => 'Figma', 'type' => 'Design', 'category' => 'Design', 'icon' => '🎨', 'url' => 'https://www.figma.com'],
    ['slug' => 'adobe-xd', 'name' => 'Adobe XD', 'type' => 'Design', 'category' => 'Design', 'icon' => '🅰️', 'url' => 'https://helpx.adobe.com/xd'],
    ['slug' => 'sketch', 'name' => 'Sketch', 'type' => 'Design', 'category' => 'Design', 'icon' => '💎', 'url' => 'https://www.sketch.com'],
    ['slug' => 'storybook', 'name' => 'Storybook', 'type' => 'Design', 'category' => 'Front-End', 'icon' => '📚', 'url' => 'https://storybook.js.org'],
    ['slug' => 'google-analytics', 'name' => 'Google Analytics', 'type' => 'Marketing', 'category' => 'Marketing', 'icon' => '📊', 'url' => 'https://analytics.google.com'],
    ['slug' => 'google-ads', 'name' => 'Google Ads', 'type' => 'Marketing', 'category' => 'Marketing', 'icon' => '📢', 'url' => 'https://ads.google.com'],
    ['slug' => 'meta-ads', 'name' => 'Meta Ads', 'type' => 'Marketing', 'category' => 'Marketing', 'icon' => '📱', 'url' => 'https://www.facebook.com/business/tools/ads-manager'],
    ['slug' => 'stripe', 'name' => 'Stripe', 'type' => 'Payment', 'category' => 'FinTech', 'icon' => '💳', 'url' => 'https://stripe.com'],
    ['slug' => 'razorpay', 'name' => 'Razorpay', 'type' => 'Payment', 'category' => 'FinTech', 'icon' => '💰', 'url' => 'https://razorpay.com'],
];
