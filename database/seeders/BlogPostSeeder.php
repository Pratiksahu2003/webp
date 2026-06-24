<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Database\Seeders\Data\BlogPostData;
use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder
{
    /**
     * Seed 20 published blog posts with rich HTML content.
     */
    public function run(): void
    {
        $posts = BlogPostData::posts();

        foreach ($posts as $post) {
            BlogPost::updateOrCreate(
                ['slug' => $post['slug']],
                $post
            );
        }

        if ($this->command) {
            $this->command->info('Seeded '.count($posts).' blog posts with tables and internal links.');
        }
    }
}
