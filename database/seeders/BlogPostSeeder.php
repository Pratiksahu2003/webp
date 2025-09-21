<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BlogPost;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blogPosts = [
            [
                'title' => 'Welcome to Our Blog',
                'content' => '<p>This is our first blog post! We are excited to share our thoughts and insights with you.</p><p>Stay tuned for more amazing content about technology, development, and innovation.</p><p>Our team is passionate about creating solutions that make a difference in the world.</p>',
                'excerpt' => 'Welcome to our blog! We are excited to share our thoughts and insights with you.',
                'status' => 'published',
                'author' => 'Admin',
                'category' => 'Technology',
                'published_at' => now(),
                'is_featured' => true,
                'meta_title' => 'Welcome to Our Blog - WEZOM',
                'meta_description' => 'Welcome to our blog! We are excited to share our thoughts and insights with you.',
                'tags' => ['welcome', 'blog', 'technology'],
                'focus_keywords' => ['blog', 'welcome', 'technology']
            ],
            [
                'title' => 'The Future of Web Development',
                'content' => '<p>Web development is evolving rapidly with new technologies and frameworks emerging every day.</p><p>In this post, we explore the latest trends and what they mean for developers.</p><p>From AI-powered development tools to new JavaScript frameworks, the future looks bright.</p>',
                'excerpt' => 'Explore the latest trends in web development and what they mean for developers.',
                'status' => 'published',
                'author' => 'Admin',
                'category' => 'Development',
                'published_at' => now()->subDays(1),
                'is_featured' => false,
                'meta_title' => 'The Future of Web Development - WEZOM',
                'meta_description' => 'Explore the latest trends in web development and what they mean for developers.',
                'tags' => ['web development', 'technology', 'trends'],
                'focus_keywords' => ['web development', 'trends', 'future']
            ],
            [
                'title' => 'Mobile App Development Best Practices',
                'content' => '<p>Creating mobile apps that users love requires following best practices and understanding user needs.</p><p>In this comprehensive guide, we cover everything from UI/UX design to performance optimization.</p><p>Learn how to build apps that stand out in the crowded app stores.</p>',
                'excerpt' => 'Learn the best practices for mobile app development and create apps that users love.',
                'status' => 'published',
                'author' => 'Admin',
                'category' => 'Mobile',
                'published_at' => now()->subDays(2),
                'is_featured' => true,
                'meta_title' => 'Mobile App Development Best Practices - WEZOM',
                'meta_description' => 'Learn the best practices for mobile app development and create apps that users love.',
                'tags' => ['mobile development', 'best practices', 'apps'],
                'focus_keywords' => ['mobile development', 'best practices', 'apps']
            ],
            [
                'title' => 'Understanding AI and Machine Learning',
                'content' => '<p>Artificial Intelligence and Machine Learning are transforming industries across the globe.</p><p>In this post, we break down the basics and explore real-world applications.</p><p>From healthcare to finance, AI is making a significant impact.</p>',
                'excerpt' => 'Discover how AI and Machine Learning are transforming industries and creating new opportunities.',
                'status' => 'published',
                'author' => 'Admin',
                'category' => 'AI & IoT',
                'published_at' => now()->subDays(3),
                'is_featured' => false,
                'meta_title' => 'Understanding AI and Machine Learning - WEZOM',
                'meta_description' => 'Discover how AI and Machine Learning are transforming industries and creating new opportunities.',
                'tags' => ['AI', 'machine learning', 'technology'],
                'focus_keywords' => ['AI', 'machine learning', 'technology']
            ],
            [
                'title' => 'E-commerce Trends for 2024',
                'content' => '<p>The e-commerce landscape is constantly evolving with new trends and technologies.</p><p>In 2024, we see exciting developments in personalization, mobile commerce, and sustainability.</p><p>Learn how to stay ahead of the competition in the digital marketplace.</p>',
                'excerpt' => 'Stay ahead of the competition with the latest e-commerce trends and technologies for 2024.',
                'status' => 'published',
                'author' => 'Admin',
                'category' => 'E-commerce',
                'published_at' => now()->subDays(4),
                'is_featured' => false,
                'meta_title' => 'E-commerce Trends for 2024 - WEZOM',
                'meta_description' => 'Stay ahead of the competition with the latest e-commerce trends and technologies for 2024.',
                'tags' => ['e-commerce', 'trends', '2024'],
                'focus_keywords' => ['e-commerce', 'trends', '2024']
            ]
        ];

        foreach ($blogPosts as $postData) {
            BlogPost::create($postData);
        }
    }
}
