<?php

namespace App\Services\Chatbot;

use App\Models\BlogPost;
use App\Models\Service;
use App\Models\ServicePackage;
use App\Models\Technology;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class ChatbotKnowledgeService
{
    public const CACHE_KEY = 'chatbot.knowledge.v3';

    public const CACHE_TTL_SECONDS = 900;

    public function get(): array
    {
        return Cache::remember(self::CACHE_KEY, self::CACHE_TTL_SECONDS, function () {
            return $this->build();
        });
    }

    public function forget(): void
    {
        Cache::forget(self::CACHE_KEY);
    }

    protected function build(): array
    {
        $companyName = 'Vantroz';
        $phone = (string) config('company.contact.phone', '');
        $email = (string) config('company.contact.email', '');
        $address = (string) config('company.address.primary.full', '');
        $tagline = (string) config('company.tagline', '');

        $services = Service::query()
            ->active()
            ->ordered()
            ->with(['activeSubServices' => fn ($q) => $q->orderBy('sort_order')])
            ->get()
            ->map(function (Service $service) {
                $summary = Str::limit(strip_tags((string) ($service->short_description ?: $service->description ?: '')), 180);

                return [
                    'id' => $service->id,
                    'title' => $service->title,
                    'slug' => $service->slug,
                    'summary' => $summary,
                    'url' => route('catalog.services.show', $service),
                    'keywords' => $this->tokenize($service->title.' '.$summary.' '.$service->slug),
                    'sub_services' => $service->activeSubServices->map(fn ($sub) => [
                        'title' => $sub->title,
                        'slug' => $sub->slug,
                        'summary' => Str::limit(strip_tags((string) ($sub->short_description ?: $sub->description ?: '')), 120),
                        'url' => route('services.sub-service', [$service, $sub]),
                    ])->values()->all(),
                ];
            })
            ->values()
            ->all();

        $packages = ServicePackage::query()
            ->active()
            ->with(['activeFeatures', 'subService.service'])
            ->orderBy('sort_order')
            ->limit(40)
            ->get()
            ->map(function (ServicePackage $package) {
                $service = $package->subService?->service;
                $features = $package->activeFeatures->pluck('feature_title')->filter()->take(5)->values()->all();
                $price = $package->final_price;
                $summary = Str::limit(strip_tags((string) ($package->description ?: '')), 140);
                $label = trim($package->package_name.($package->badge ? ' ('.$package->badge.')' : ''));

                return [
                    'id' => $package->id,
                    'title' => $label,
                    'price' => $price,
                    'price_label' => $price > 0 ? '₹'.number_format((float) $price, 0) : null,
                    'delivery_days' => $package->delivery_days,
                    'summary' => $summary,
                    'features' => $features,
                    'service_title' => $service?->title,
                    'url' => $service && $package->subService
                        ? route('services.sub-service', [$service, $package->subService])
                        : route('catalog.services'),
                    'checkout_url' => route('checkout.show', $package),
                    'keywords' => $this->tokenize($label.' '.$summary.' '.implode(' ', $features).' '.($service?->title ?? '')),
                ];
            })
            ->values()
            ->all();

        $technologies = Technology::query()
            ->active()
            ->ordered()
            ->limit(80)
            ->get()
            ->map(function (Technology $tech) {
                $summary = Str::limit(strip_tags((string) ($tech->description ?: '')), 120);

                return [
                    'id' => $tech->id,
                    'name' => $tech->name,
                    'category' => $tech->category ?: $tech->technology_type,
                    'summary' => $summary,
                    'url' => route('technologies.show', $tech),
                    'keywords' => $this->tokenize($tech->name.' '.$tech->category.' '.$tech->technology_type.' '.$summary),
                ];
            })
            ->values()
            ->all();

        $posts = BlogPost::query()
            ->published()
            ->orderByDesc('published_at')
            ->limit(20)
            ->get()
            ->map(function (BlogPost $post) {
                $summary = Str::limit(strip_tags((string) ($post->excerpt ?: $post->meta_description ?: '')), 160);

                return [
                    'id' => $post->id,
                    'title' => $post->title,
                    'category' => $post->category,
                    'summary' => $summary,
                    'url' => route('blog.show', $post),
                    'keywords' => $this->tokenize($post->title.' '.$post->category.' '.$summary),
                ];
            })
            ->values()
            ->all();

        return [
            'company' => [
                'name' => $companyName,
                'tagline' => $tagline,
                'phone' => $phone,
                'email' => $email,
                'address' => $address,
                'about_url' => route('about'),
                'contact_url' => route('contact'),
                'services_url' => route('catalog.services'),
                'technologies_url' => route('technologies'),
                'blog_url' => route('blog.index'),
            ],
            'services' => $services,
            'packages' => $packages,
            'technologies' => $technologies,
            'posts' => $posts,
            'quick_replies' => [
                ['id' => 'services', 'label' => 'Services'],
                ['id' => 'packages', 'label' => 'Packages'],
                ['id' => 'technologies', 'label' => 'Technologies'],
                ['id' => 'blog', 'label' => 'Blog'],
                ['id' => 'quote', 'label' => 'Get a quote'],
                ['id' => 'contact', 'label' => 'Contact'],
            ],
            'welcome' => "Hi! I'm the {$companyName} assistant. I can help with our services, packages, technologies, and blog — or connect you with our team.",
        ];
    }

    /**
     * @return list<string>
     */
    public function tokenize(string $text): array
    {
        $text = Str::lower(Str::ascii($text));
        $parts = preg_split('/[^a-z0-9+#]+/', $text, -1, PREG_SPLIT_NO_EMPTY) ?: [];

        return array_values(array_unique(array_filter($parts, fn ($p) => strlen($p) > 1)));
    }
}
