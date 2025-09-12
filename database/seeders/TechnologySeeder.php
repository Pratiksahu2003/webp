<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = [
            // Front-End Technologies
            ['name' => 'React.js', 'category' => 'Front-End', 'icon' => '⚛️', 'sort_order' => 1],
            ['name' => 'TypeScript', 'category' => 'Front-End', 'icon' => '📘', 'sort_order' => 2],
            ['name' => 'GraphQL', 'category' => 'Front-End', 'icon' => '🔷', 'sort_order' => 3],
            ['name' => 'Apollo Client', 'category' => 'Front-End', 'icon' => '🚀', 'sort_order' => 4],
            ['name' => 'Material UI', 'category' => 'Front-End', 'icon' => '🎨', 'sort_order' => 5],
            ['name' => 'Ant Design', 'category' => 'Front-End', 'icon' => '🐜', 'sort_order' => 6],
            ['name' => 'React Hook Form', 'category' => 'Front-End', 'icon' => '📝', 'sort_order' => 7],
            ['name' => 'Turborepo', 'category' => 'Front-End', 'icon' => '⚡', 'sort_order' => 8],
            
            // Back-End Technologies
            ['name' => 'Python', 'category' => 'Back-End', 'icon' => '🐍', 'sort_order' => 1],
            ['name' => 'Scala', 'category' => 'Back-End', 'icon' => '🔺', 'sort_order' => 2],
            ['name' => 'Java', 'category' => 'Back-End', 'icon' => '☕', 'sort_order' => 3],
            ['name' => 'Node.js', 'category' => 'Back-End', 'icon' => '🟢', 'sort_order' => 4],
            ['name' => 'PHP', 'category' => 'Back-End', 'icon' => '🐘', 'sort_order' => 5],
            ['name' => 'REST API', 'category' => 'Back-End', 'icon' => '🔗', 'sort_order' => 6],
            
            // Database Technologies
            ['name' => 'MySQL', 'category' => 'Database', 'icon' => '🗄️', 'sort_order' => 1],
            ['name' => 'PostgreSQL', 'category' => 'Database', 'icon' => '🐘', 'sort_order' => 2],
            ['name' => 'MongoDB', 'category' => 'Database', 'icon' => '🍃', 'sort_order' => 3],
            ['name' => 'Redis', 'category' => 'Database', 'icon' => '🔴', 'sort_order' => 4],
            
            // Cloud & DevOps
            ['name' => 'AWS', 'category' => 'Cloud & DevOps', 'icon' => '☁️', 'sort_order' => 1],
            ['name' => 'Google Cloud', 'category' => 'Cloud & DevOps', 'icon' => '🌩️', 'sort_order' => 2],
            ['name' => 'Docker', 'category' => 'Cloud & DevOps', 'icon' => '🐳', 'sort_order' => 3],
            ['name' => 'Kubernetes', 'category' => 'Cloud & DevOps', 'icon' => '⚙️', 'sort_order' => 4],
            
            // Mobile Technologies
            ['name' => 'Swift', 'category' => 'Mobile apps', 'icon' => '🍎', 'sort_order' => 1],
            ['name' => 'Kotlin', 'category' => 'Mobile apps', 'icon' => '🤖', 'sort_order' => 2],
            ['name' => 'Flutter', 'category' => 'Mobile apps', 'icon' => '🦋', 'sort_order' => 3],
            ['name' => 'React Native', 'category' => 'Mobile apps', 'icon' => '📱', 'sort_order' => 4],
        ];

        foreach ($technologies as $tech) {
            Technology::create($tech);
        }
    }
}
