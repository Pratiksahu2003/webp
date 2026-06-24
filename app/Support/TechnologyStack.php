<?php

namespace App\Support;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class TechnologyStack
{
    /**
     * @return array<string, array{label: string, categories: array<int, string>, description: string, icon: string}>
     */
    public static function all(): array
    {
        return [
            'front-end' => [
                'label' => 'Front-End',
                'categories' => ['Front-End'],
                'description' => 'Modern frameworks and libraries for responsive, high-performance user interfaces.',
                'icon' => '⚛️',
            ],
            'back-end' => [
                'label' => 'Back-End',
                'categories' => ['Back-End'],
                'description' => 'Robust server-side technologies, APIs, and application frameworks.',
                'icon' => '🖥️',
            ],
            'mobile' => [
                'label' => 'Mobile',
                'categories' => ['Mobile apps'],
                'description' => 'Native and cross-platform mobile development tools and runtimes.',
                'icon' => '📱',
            ],
            'database' => [
                'label' => 'Database',
                'categories' => ['Database'],
                'description' => 'Relational, document, and in-memory data stores for scalable applications.',
                'icon' => '🗄️',
            ],
            'cloud-devops' => [
                'label' => 'Cloud & DevOps',
                'categories' => ['Cloud & DevOps'],
                'description' => 'Cloud infrastructure, containers, CI/CD, and deployment automation.',
                'icon' => '☁️',
            ],
            'data-science' => [
                'label' => 'Data Science & AI',
                'categories' => ['Data Science'],
                'description' => 'Machine learning, AI integrations, and data engineering platforms.',
                'icon' => '🧠',
            ],
        ];
    }

    public static function find(string $slug): ?array
    {
        $stack = self::all()[$slug] ?? null;

        if ($stack === null) {
            return null;
        }

        return array_merge($stack, ['slug' => $slug]);
    }

    public static function slugForCategory(string $category): ?string
    {
        foreach (self::all() as $slug => $stack) {
            if (in_array($category, $stack['categories'], true)) {
                return $slug;
            }
        }

        return Str::slug($category);
    }

    /**
     * @param  Collection<int, \App\Models\Technology>  $technologies
     * @return array<string, Collection<int, \App\Models\Technology>>
     */
    public static function groupByStack(Collection $technologies): array
    {
        $grouped = [];

        foreach (self::all() as $slug => $stack) {
            $grouped[$slug] = $technologies
                ->filter(fn ($tech) => in_array($tech->category, $stack['categories'], true))
                ->values();
        }

        return $grouped;
    }
}
