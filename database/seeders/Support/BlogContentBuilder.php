<?php

namespace Database\Seeders\Support;

class BlogContentBuilder
{
    public static function article(array $ctx): string
    {
        $company = config('company.name', 'VanTroZ');
        $html = '';

        foreach ($ctx['intro'] ?? [] as $paragraph) {
            $html .= '<p>'.self::inline($paragraph).'</p>';
        }

        foreach ($ctx['sections'] ?? [] as $section) {
            $html .= '<h2>'.htmlspecialchars($section['heading'], ENT_QUOTES, 'UTF-8').'</h2>';

            foreach ($section['paragraphs'] ?? [] as $paragraph) {
                $html .= '<p>'.self::inline($paragraph).'</p>';
            }

            if (! empty($section['list'])) {
                $html .= self::unorderedList($section['list']);
            }
        }

        if (! empty($ctx['table'])) {
            $html .= self::table(
                $ctx['table']['title'] ?? 'Comparison Overview',
                $ctx['table']['headers'],
                $ctx['table']['rows']
            );
        }

        if (! empty($ctx['takeaways'])) {
            $html .= '<h2>Key Takeaways</h2>';
            $html .= self::unorderedList($ctx['takeaways']);
        }

        $html .= '<h2>How '.$company.' Can Help</h2>';
        $html .= '<p>'.self::inline($ctx['closing'] ?? 'Our team helps organizations plan, build, and scale digital products with the right architecture, delivery model, and long-term support.').'</p>';

        $html .= self::relatedLinksBlock($ctx['site_links'] ?? [], $ctx['related_posts'] ?? []);

        return $html;
    }

    public static function siteLinks(): array
    {
        return [
            ['label' => 'service catalog', 'url' => route('catalog.services')],
            ['label' => 'technology stack', 'url' => route('technologies')],
            ['label' => 'case studies', 'url' => route('case-studies')],
            ['label' => 'contact our team', 'url' => route('contact')],
        ];
    }

    public static function blogUrl(string $slug): string
    {
        return url('/blog/'.$slug);
    }

    protected static function inline(string $text): string
    {
        return preg_replace_callback(
            '/\[(.+?)\]\((.+?)\)/',
            static fn (array $matches) => self::anchor($matches[2], $matches[1]),
            htmlspecialchars($text, ENT_QUOTES, 'UTF-8')
        );
    }

    protected static function anchor(string $url, string $label): string
    {
        return '<a href="'.htmlspecialchars($url, ENT_QUOTES, 'UTF-8').'" class="text-orange-600 hover:text-orange-700 font-medium">'
            .htmlspecialchars($label, ENT_QUOTES, 'UTF-8').'</a>';
    }

    protected static function unorderedList(array $items): string
    {
        $html = '<ul>';
        foreach ($items as $item) {
            $html .= '<li>'.self::inline($item).'</li>';
        }
        $html .= '</ul>';

        return $html;
    }

    protected static function table(string $title, array $headers, array $rows): string
    {
        $html = '<h3>'.htmlspecialchars($title, ENT_QUOTES, 'UTF-8').'</h3>';
        $html .= '<div style="overflow-x:auto;margin:1.5rem 0;"><table style="width:100%;border-collapse:collapse;font-size:0.95rem;">';
        $html .= '<thead><tr>';
        foreach ($headers as $header) {
            $html .= '<th style="border:1px solid #e5e7eb;background:#f9fafb;padding:0.75rem 1rem;text-align:left;">'
                .htmlspecialchars($header, ENT_QUOTES, 'UTF-8').'</th>';
        }
        $html .= '</tr></thead><tbody>';
        foreach ($rows as $row) {
            $html .= '<tr>';
            foreach ($row as $cell) {
                $html .= '<td style="border:1px solid #e5e7eb;padding:0.75rem 1rem;vertical-align:top;">'
                    .self::inline($cell).'</td>';
            }
            $html .= '</tr>';
        }
        $html .= '</tbody></table></div>';

        return $html;
    }

    protected static function relatedLinksBlock(array $siteLinks, array $relatedPosts): string
    {
        $html = '<h2>Related Resources</h2><ul>';

        foreach ($siteLinks as $link) {
            $html .= '<li>Explore our '.self::anchor($link['url'], $link['label']).'.</li>';
        }

        foreach ($relatedPosts as $post) {
            $html .= '<li>Read also: '.self::anchor($post['url'], $post['title']).'.</li>';
        }

        $html .= '</ul>';

        return $html;
    }
}
