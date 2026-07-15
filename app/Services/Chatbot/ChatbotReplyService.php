<?php

namespace App\Services\Chatbot;

use App\Models\ContactLead;
use Illuminate\Support\Str;

class ChatbotReplyService
{
    public function __construct(
        protected ChatbotKnowledgeService $knowledge,
    ) {}

    /**
     * @param  array{step?: string|null, name?: string|null, email?: string|null, phone?: string|null, service?: string|null, message?: string|null}  $leadState
     * @return array{reply: string, links: list<array{label: string, url: string}>, quick_replies: list<array{id: string, label: string}>, lead: array, done?: bool}
     */
    public function reply(string $message, array $leadState = []): array
    {
        $knowledge = $this->knowledge->get();
        $company = $knowledge['company'];
        $text = trim($message);
        $normalized = Str::lower(Str::ascii($text));
        $leadState = $this->normalizeLeadState($leadState);

        if ($this->isLeadActive($leadState) || $this->wantsQuote($normalized)) {
            return $this->handleLeadFlow($text, $normalized, $leadState, $knowledge);
        }

        $chip = $this->matchChip($normalized);
        if ($chip !== null) {
            return $this->handleChip($chip, $knowledge);
        }

        if ($this->matchesAny($normalized, ['hello', 'hi', 'hey', 'namaste', 'good morning', 'good evening', 'start'])) {
            return $this->payload(
                $knowledge['welcome'],
                [
                    ['label' => 'All services', 'url' => $company['services_url']],
                    ['label' => 'Contact us', 'url' => $company['contact_url']],
                ],
                $knowledge['quick_replies'],
                $leadState,
            );
        }

        if ($this->matchesAny($normalized, ['contact', 'phone', 'email', 'call', 'address', 'office', 'location', 'whatsapp'])) {
            return $this->handleChip('contact', $knowledge);
        }

        if ($this->matchesAny($normalized, ['about', 'who are you', 'company', 'vantroz'])) {
            return $this->payload(
                "{$company['name']} — {$company['tagline']}. We help businesses with software, web, mobile, design, cloud, data, and QA. Based in {$company['address']}.",
                [
                    ['label' => 'About us', 'url' => $company['about_url']],
                    ['label' => 'Services', 'url' => $company['services_url']],
                ],
                $knowledge['quick_replies'],
                $leadState,
            );
        }

        $searchHits = $this->searchKnowledge($normalized, $knowledge);
        if ($searchHits['best'] !== null) {
            return $this->payload(
                $searchHits['reply'],
                $searchHits['links'],
                $knowledge['quick_replies'],
                $leadState,
            );
        }

        return $this->payload(
            "I couldn't find an exact match for that. Try Services, Packages, Technologies, Blog — or tap Get a quote and I'll take your details.",
            [
                ['label' => 'Browse services', 'url' => $company['services_url']],
                ['label' => 'Contact page', 'url' => $company['contact_url']],
            ],
            $knowledge['quick_replies'],
            $leadState,
        );
    }

    /**
     * @return array{step?: string|null, name?: string|null, email?: string|null, phone?: string|null, service?: string|null, message?: string|null}
     */
    public function normalizeLeadState(array $leadState): array
    {
        return [
            'step' => $leadState['step'] ?? null,
            'name' => $leadState['name'] ?? null,
            'email' => $leadState['email'] ?? null,
            'phone' => $leadState['phone'] ?? null,
            'service' => $leadState['service'] ?? null,
            'message' => $leadState['message'] ?? null,
        ];
    }

    public function bootstrap(): array
    {
        $knowledge = $this->knowledge->get();

        return [
            'welcome' => $knowledge['welcome'],
            'quick_replies' => $knowledge['quick_replies'],
            'company' => [
                'name' => $knowledge['company']['name'],
                'phone' => $knowledge['company']['phone'],
                'email' => $knowledge['company']['email'],
            ],
            'service_options' => collect(ContactLead::SERVICES)
                ->map(fn ($label, $key) => ['id' => $key, 'label' => $label])
                ->values()
                ->all(),
        ];
    }

    protected function isLeadActive(array $leadState): bool
    {
        return filled($leadState['step']);
    }

    protected function wantsQuote(string $normalized): bool
    {
        return $this->matchesAny($normalized, [
            'quote', 'get a quote', 'pricing', 'price', 'cost', 'hire', 'proposal',
            'inquiry', 'enquiry', 'lead', 'talk to sales', 'book a call', 'consultation',
        ]);
    }

    protected function matchChip(string $normalized): ?string
    {
        return match (true) {
            $normalized === 'services' || str_starts_with($normalized, 'service') => 'services',
            $normalized === 'packages' || str_contains($normalized, 'package') || str_contains($normalized, 'pricing plan') => 'packages',
            $normalized === 'technologies' || str_contains($normalized, 'technolog') || str_contains($normalized, 'tech stack') => 'technologies',
            $normalized === 'blog' || str_contains($normalized, 'article') || str_contains($normalized, 'news') => 'blog',
            $normalized === 'quote' || $normalized === 'get a quote' => 'quote',
            $normalized === 'contact' => 'contact',
            default => null,
        };
    }

    protected function handleChip(string $chip, array $knowledge): array
    {
        $company = $knowledge['company'];
        $emptyLead = $this->normalizeLeadState([]);

        return match ($chip) {
            'services' => $this->payload(
                $this->listServicesText($knowledge['services']),
                array_merge(
                    [['label' => 'All services', 'url' => $company['services_url']]],
                    collect($knowledge['services'])->take(4)->map(fn ($s) => [
                        'label' => $s['title'],
                        'url' => $s['url'],
                    ])->all()
                ),
                $knowledge['quick_replies'],
                $emptyLead,
            ),
            'packages' => $this->payload(
                $this->listPackagesText($knowledge['packages']),
                array_merge(
                    [['label' => 'Browse services', 'url' => $company['services_url']]],
                    collect($knowledge['packages'])->take(4)->map(fn ($p) => [
                        'label' => Str::limit($p['title'], 28),
                        'url' => $p['checkout_url'] ?? $p['url'],
                    ])->all()
                ),
                $knowledge['quick_replies'],
                $emptyLead,
            ),
            'technologies' => $this->payload(
                $this->listTechnologiesText($knowledge['technologies']),
                array_merge(
                    [['label' => 'All technologies', 'url' => $company['technologies_url']]],
                    collect($knowledge['technologies'])->take(4)->map(fn ($t) => [
                        'label' => $t['name'],
                        'url' => $t['url'],
                    ])->all()
                ),
                $knowledge['quick_replies'],
                $emptyLead,
            ),
            'blog' => $this->payload(
                $this->listBlogText($knowledge['posts']),
                array_merge(
                    [['label' => 'All posts', 'url' => $company['blog_url']]],
                    collect($knowledge['posts'])->take(4)->map(fn ($p) => [
                        'label' => Str::limit($p['title'], 32),
                        'url' => $p['url'],
                    ])->all()
                ),
                $knowledge['quick_replies'],
                $emptyLead,
            ),
            'contact' => $this->payload(
                "You can reach {$company['name']} at {$company['phone']} or {$company['email']}. Office: {$company['address']}.",
                [
                    ['label' => 'Contact page', 'url' => $company['contact_url']],
                    ['label' => 'Call now', 'url' => 'tel:'.preg_replace('/[^\d+]/', '', $company['phone'])],
                ],
                $knowledge['quick_replies'],
                $emptyLead,
            ),
            'quote' => $this->handleLeadFlow('quote', 'quote', ['step' => 'name'], $knowledge),
            default => $this->payload($knowledge['welcome'], [], $knowledge['quick_replies'], $emptyLead),
        };
    }

    /**
     * @param  array{step?: string|null, name?: string|null, email?: string|null, phone?: string|null, service?: string|null, message?: string|null}  $leadState
     */
    protected function handleLeadFlow(string $text, string $normalized, array $leadState, array $knowledge): array
    {
        $quick = [
            ['id' => 'contact', 'label' => 'Contact'],
            ['id' => 'services', 'label' => 'Services'],
        ];

        if ($this->matchesAny($normalized, ['cancel', 'stop', 'never mind', 'nevermind', 'exit'])) {
            return $this->payload(
                'No problem — lead capture cancelled. Ask me anything about our services, or tap Get a quote when you are ready.',
                [],
                $knowledge['quick_replies'],
                $this->normalizeLeadState([]),
            );
        }

        $step = $leadState['step'] ?? null;

        if ($step === null || $step === '') {
            $leadState['step'] = 'name';

            return $this->payload(
                "Great — let's get a quote started. What's your name?",
                [],
                [['id' => 'cancel', 'label' => 'Cancel']],
                $leadState,
            );
        }

        if ($step === 'name') {
            if ($this->wantsQuote($normalized) || strlen($text) < 2) {
                $leadState['step'] = 'name';

                return $this->payload(
                    "What's your name?",
                    [],
                    [['id' => 'cancel', 'label' => 'Cancel']],
                    $leadState,
                );
            }

            $leadState['name'] = Str::limit(strip_tags($text), 100);
            $leadState['step'] = 'email';

            return $this->payload(
                "Thanks, {$leadState['name']}! What's the best email to reach you?",
                [],
                [['id' => 'cancel', 'label' => 'Cancel']],
                $leadState,
            );
        }

        if ($step === 'email') {
            if (! filter_var($text, FILTER_VALIDATE_EMAIL)) {
                return $this->payload(
                    'Please share a valid email address (example: you@company.com).',
                    [],
                    [['id' => 'cancel', 'label' => 'Cancel']],
                    $leadState,
                );
            }

            $leadState['email'] = Str::lower(trim($text));
            $leadState['step'] = 'phone';

            return $this->payload(
                'Got it. What is your phone number? (or type skip)',
                [],
                [
                    ['id' => 'skip', 'label' => 'Skip'],
                    ['id' => 'cancel', 'label' => 'Cancel'],
                ],
                $leadState,
            );
        }

        if ($step === 'phone') {
            if (! $this->matchesAny($normalized, ['skip', 'no', 'none', 'na'])) {
                $leadState['phone'] = Str::limit(preg_replace('/[^\d+\-\s()]/', '', $text) ?: $text, 30);
            }
            $leadState['step'] = 'service';

            $options = collect(ContactLead::SERVICES)
                ->map(fn ($label, $key) => ['id' => 'service:'.$key, 'label' => $label])
                ->values()
                ->all();
            $options[] = ['id' => 'cancel', 'label' => 'Cancel'];

            return $this->payload(
                'Which service are you most interested in? Pick one below or type the name.',
                [],
                $options,
                $leadState,
            );
        }

        if ($step === 'service') {
            $serviceKey = $this->resolveServiceKey($text, $normalized);
            if ($serviceKey === null) {
                $options = collect(ContactLead::SERVICES)
                    ->map(fn ($label, $key) => ['id' => 'service:'.$key, 'label' => $label])
                    ->values()
                    ->all();
                $options[] = ['id' => 'cancel', 'label' => 'Cancel'];

                return $this->payload(
                    'Please choose a service from the list (or type one of the service names).',
                    [],
                    $options,
                    $leadState,
                );
            }

            $leadState['service'] = $serviceKey;
            $leadState['step'] = 'message';

            return $this->payload(
                'Briefly tell us about your project (or type skip).',
                [],
                [
                    ['id' => 'skip', 'label' => 'Skip'],
                    ['id' => 'cancel', 'label' => 'Cancel'],
                ],
                $leadState,
            );
        }

        if ($step === 'message') {
            if (! $this->matchesAny($normalized, ['skip', 'no', 'none', 'na'])) {
                $leadState['message'] = Str::limit(strip_tags($text), 2000);
            }

            return $this->payload(
                'Perfect — submit your details and our team will follow up soon.',
                [],
                $quick,
                array_merge($leadState, ['step' => 'ready']),
                done: false,
                submitLead: true,
            );
        }

        if ($step === 'ready') {
            return $this->payload(
                'Your details are ready. Submitting now…',
                [],
                $knowledge['quick_replies'],
                $leadState,
                submitLead: true,
            );
        }

        return $this->payload(
            "Let's start over. What's your name?",
            [],
            [['id' => 'cancel', 'label' => 'Cancel']],
            ['step' => 'name'],
        );
    }

    protected function resolveServiceKey(string $text, string $normalized): ?string
    {
        if (str_starts_with($normalized, 'service:')) {
            $key = substr($normalized, strlen('service:'));

            return array_key_exists($key, ContactLead::SERVICES) ? $key : null;
        }

        foreach (ContactLead::SERVICES as $key => $label) {
            $labelNorm = Str::lower(Str::ascii($label));
            if ($normalized === $key || $normalized === $labelNorm || str_contains($normalized, $labelNorm) || str_contains($labelNorm, $normalized)) {
                return $key;
            }
        }

        $map = [
            'web' => 'web-development',
            'website' => 'web-development',
            'software' => 'software-development',
            'mobile' => 'mobile-development',
            'app' => 'mobile-development',
            'design' => 'ux-ui-design',
            'ui' => 'ux-ui-design',
            'ux' => 'ux-ui-design',
            'data' => 'data-science',
            'ai' => 'data-science',
            'qa' => 'qa-testing',
            'testing' => 'qa-testing',
            'consult' => 'consulting',
        ];

        foreach ($map as $needle => $key) {
            if (str_contains($normalized, $needle)) {
                return $key;
            }
        }

        return null;
    }

    /**
     * @return array{best: mixed, reply: string, links: list<array{label: string, url: string}>}
     */
    protected function searchKnowledge(string $normalized, array $knowledge): array
    {
        $queryTokens = $this->knowledge->tokenize($normalized);
        if ($queryTokens === []) {
            return ['best' => null, 'reply' => '', 'links' => []];
        }

        $candidates = [];

        foreach ($knowledge['services'] as $service) {
            $score = $this->scoreTokens($queryTokens, $service['keywords'] ?? [], $service['title']);
            if ($score > 0) {
                $candidates[] = [
                    'score' => $score + 2,
                    'type' => 'service',
                    'item' => $service,
                ];
            }

            foreach ($service['sub_services'] ?? [] as $sub) {
                $subTokens = $this->knowledge->tokenize($sub['title'].' '.($sub['summary'] ?? ''));
                $subScore = $this->scoreTokens($queryTokens, $subTokens, $sub['title']);
                if ($subScore > 0) {
                    $candidates[] = [
                        'score' => $subScore + 1,
                        'type' => 'sub_service',
                        'item' => $sub,
                        'parent' => $service['title'],
                    ];
                }
            }
        }

        foreach ($knowledge['packages'] as $package) {
            $score = $this->scoreTokens($queryTokens, $package['keywords'] ?? [], $package['title']);
            if ($score > 0) {
                $candidates[] = [
                    'score' => $score + 1,
                    'type' => 'package',
                    'item' => $package,
                ];
            }
        }

        foreach ($knowledge['technologies'] as $tech) {
            $score = $this->scoreTokens($queryTokens, $tech['keywords'] ?? [], $tech['name']);
            if ($score > 0) {
                $candidates[] = [
                    'score' => $score,
                    'type' => 'technology',
                    'item' => $tech,
                ];
            }
        }

        foreach ($knowledge['posts'] as $post) {
            $score = $this->scoreTokens($queryTokens, $post['keywords'] ?? [], $post['title']);
            if ($score > 0) {
                $candidates[] = [
                    'score' => $score,
                    'type' => 'blog',
                    'item' => $post,
                ];
            }
        }

        usort($candidates, fn ($a, $b) => $b['score'] <=> $a['score']);

        if ($candidates === [] || $candidates[0]['score'] < 2) {
            return ['best' => null, 'reply' => '', 'links' => []];
        }

        $top = array_slice($candidates, 0, 3);
        $best = $top[0];
        $lines = ['Here is what I found in our knowledge base:'];
        $links = [];

        foreach ($top as $hit) {
            $item = $hit['item'];
            switch ($hit['type']) {
                case 'service':
                    $lines[] = "• Service: {$item['title']} — ".($item['summary'] ?: 'Explore offerings and related packages.');
                    $links[] = ['label' => $item['title'], 'url' => $item['url']];
                    break;
                case 'sub_service':
                    $parent = $hit['parent'] ?? 'Services';
                    $lines[] = "• {$item['title']} ({$parent}) — ".($item['summary'] ?: 'View details on our site.');
                    $links[] = ['label' => $item['title'], 'url' => $item['url']];
                    break;
                case 'package':
                    $price = $item['price_label'] ? " from {$item['price_label']}" : '';
                    $lines[] = "• Package: {$item['title']}{$price} — ".($item['summary'] ?: 'Available for checkout.');
                    $links[] = ['label' => Str::limit($item['title'], 28), 'url' => $item['checkout_url'] ?? $item['url']];
                    break;
                case 'technology':
                    $cat = $item['category'] ? " ({$item['category']})" : '';
                    $lines[] = "• Technology: {$item['name']}{$cat}";
                    $links[] = ['label' => $item['name'], 'url' => $item['url']];
                    break;
                case 'blog':
                    $lines[] = "• Blog: {$item['title']} — ".($item['summary'] ?: 'Read on our blog.');
                    $links[] = ['label' => Str::limit($item['title'], 32), 'url' => $item['url']];
                    break;
            }
        }

        $lines[] = 'Want a tailored proposal? Tap Get a quote.';

        return [
            'best' => $best,
            'reply' => implode("\n", $lines),
            'links' => $links,
        ];
    }

    /**
     * @param  list<string>  $queryTokens
     * @param  list<string>  $docTokens
     */
    protected function scoreTokens(array $queryTokens, array $docTokens, string $title): int
    {
        $docSet = array_fill_keys($docTokens, true);
        $titleNorm = Str::lower(Str::ascii($title));
        $score = 0;

        foreach ($queryTokens as $token) {
            if (isset($docSet[$token])) {
                $score += 2;
            }
            if (str_contains($titleNorm, $token)) {
                $score += 3;
            }
        }

        return $score;
    }

    protected function listServicesText(array $services): string
    {
        if ($services === []) {
            return 'Our service catalog is updating. Please visit the services page or leave your details via Get a quote.';
        }

        $lines = ['Here are our main services:'];
        foreach (array_slice($services, 0, 8) as $service) {
            $lines[] = '• '.$service['title'].($service['summary'] ? ' — '.$service['summary'] : '');
        }
        $lines[] = 'Ask about any service by name, or open a link below.';

        return implode("\n", $lines);
    }

    protected function listPackagesText(array $packages): string
    {
        if ($packages === []) {
            return 'Packages are managed per service. Browse a service page to see current pricing packages.';
        }

        $lines = ['Popular packages from our catalog:'];
        foreach (array_slice($packages, 0, 8) as $package) {
            $price = $package['price_label'] ? " — {$package['price_label']}" : '';
            $svc = $package['service_title'] ? " ({$package['service_title']})" : '';
            $lines[] = "• {$package['title']}{$svc}{$price}";
        }
        $lines[] = 'Tap a package link to view or check out.';

        return implode("\n", $lines);
    }

    protected function listTechnologiesText(array $technologies): string
    {
        if ($technologies === []) {
            return 'Our technology list is updating. Visit the Technologies page for the full stack.';
        }

        $grouped = [];
        foreach ($technologies as $tech) {
            $cat = $tech['category'] ?: 'Other';
            $grouped[$cat][] = $tech['name'];
        }

        $lines = ['We work with these technologies:'];
        $count = 0;
        foreach ($grouped as $cat => $names) {
            $lines[] = '• '.$cat.': '.implode(', ', array_slice($names, 0, 6));
            $count++;
            if ($count >= 6) {
                break;
            }
        }
        $lines[] = 'Ask about a specific tech (e.g. Laravel, React) for details.';

        return implode("\n", $lines);
    }

    protected function listBlogText(array $posts): string
    {
        if ($posts === []) {
            return 'No published posts right now. Check back soon on our blog.';
        }

        $lines = ['Latest from our blog:'];
        foreach (array_slice($posts, 0, 6) as $post) {
            $cat = $post['category'] ? " [{$post['category']}]" : '';
            $lines[] = "• {$post['title']}{$cat}";
        }

        return implode("\n", $lines);
    }

    /**
     * @param  list<string>  $needles
     */
    protected function matchesAny(string $normalized, array $needles): bool
    {
        foreach ($needles as $needle) {
            if ($normalized === $needle || str_contains($normalized, $needle)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param  list<array{label: string, url: string}>  $links
     * @param  list<array{id: string, label: string}>  $quickReplies
     * @param  array{step?: string|null, name?: string|null, email?: string|null, phone?: string|null, service?: string|null, message?: string|null}  $lead
     * @return array{reply: string, links: list<array{label: string, url: string}>, quick_replies: list<array{id: string, label: string}>, lead: array, submit_lead: bool}
     */
    protected function payload(
        string $reply,
        array $links,
        array $quickReplies,
        array $lead,
        bool $done = false,
        bool $submitLead = false,
    ): array {
        return [
            'reply' => $reply,
            'links' => array_values($links),
            'quick_replies' => array_values($quickReplies),
            'lead' => $this->normalizeLeadState($lead),
            'submit_lead' => $submitLead,
            'done' => $done,
        ];
    }
}
