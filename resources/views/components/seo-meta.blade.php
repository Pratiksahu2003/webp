@props([
    'title' => null,
    'description' => null,
    'image' => null,
    'ogImage' => null,
    'canonical' => null,
    'robots' => null,
    'ogType' => 'website',
    'keywords' => null,
    'ogTitle' => null,
    'ogDescription' => null,
    'twitterTitle' => null,
    'twitterDescription' => null,
    'twitterImage' => null,
    'twitterCard' => null,
    'articlePublishedTime' => null,
    'articleModifiedTime' => null,
    'articleAuthor' => null,
    'articleSection' => null,
    'schema' => null,
])

@php
    $companyName = config('company.name');
    $legalName = config('company.legal_name', $companyName);
    $tagline = config('company.tagline');
    $defaultTitle = config('company.seo.default_title', $companyName.' - '.$tagline);
    $defaultDescription = config('company.seo.default_description', $companyName.' - '.$tagline);
    $defaultImagePath = config('company.seo.default_image', '/logo/logo.png');
    $locale = config('company.seo.locale', 'en_IN');
    $twitterHandle = config('company.seo.twitter_handle');

    $title = trim((string) ($title ?? '')) ?: $defaultTitle;
    $description = trim(strip_tags((string) ($description ?? ''))) ?: $defaultDescription;
    $description = \Illuminate\Support\Str::limit($description, 160, '');
    $canonical = filled($canonical) ? $canonical : url()->current();
    $robots = filled($robots) ? $robots : 'index, follow';
    $ogType = filled($ogType) ? $ogType : 'website';
    $ogTitle = trim((string) ($ogTitle ?? '')) ?: $title;
    $ogDescription = trim(strip_tags((string) ($ogDescription ?? ''))) ?: $description;
    $twitterTitle = trim((string) ($twitterTitle ?? '')) ?: $ogTitle;
    $twitterDescription = trim(strip_tags((string) ($twitterDescription ?? ''))) ?: $ogDescription;
    $twitterCard = filled($twitterCard) ? $twitterCard : 'summary_large_image';

    $resolveImage = function (?string $image) use ($defaultImagePath): string {
        if (blank($image)) {
            return url($defaultImagePath);
        }
        if (str_starts_with($image, 'http://') || str_starts_with($image, 'https://')) {
            return $image;
        }
        if (str_starts_with($image, '/storage/') || str_starts_with($image, 'storage/')) {
            return asset(ltrim($image, '/'));
        }
        if (str_starts_with($image, '/')) {
            return url($image);
        }

        return asset('storage/'.$image);
    };

    $image = $resolveImage($image);
    $ogImage = $resolveImage($ogImage ?: $image);
    $twitterImage = $resolveImage($twitterImage ?: $ogImage);

    if (is_array($keywords)) {
        $keywords = implode(', ', array_filter($keywords));
    }

    $address = config('company.address.primary', []);
    $geo = config('company.geo', []);
    $social = array_values(array_filter(config('company.social', [])));
    $phone = config('company.contact.phone');
    $email = config('company.contact.email');

    $localBusinessSchema = array_filter([
        '@context' => 'https://schema.org',
        '@type' => 'ProfessionalService',
        '@id' => url('/').'#localbusiness',
        'name' => $companyName,
        'legalName' => $legalName,
        'description' => $defaultDescription,
        'url' => url('/'),
        'logo' => url(config('company.branding.logo.light', '/logo/logo.png')),
        'image' => url($defaultImagePath),
        'email' => $email,
        'telephone' => $phone,
        'priceRange' => '$$',
        'address' => array_filter([
            '@type' => 'PostalAddress',
            'streetAddress' => $address['line1'] ?? null,
            'addressLocality' => $address['city'] ?? null,
            'addressRegion' => $address['state'] ?? null,
            'postalCode' => $address['postal_code'] ?? null,
            'addressCountry' => 'IN',
        ]),
        'geo' => (! empty($geo['latitude']) && ! empty($geo['longitude'])) ? [
            '@type' => 'GeoCoordinates',
            'latitude' => $geo['latitude'],
            'longitude' => $geo['longitude'],
        ] : null,
        'openingHoursSpecification' => [
            [
                '@type' => 'OpeningHoursSpecification',
                'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                'opens' => '10:00',
                'closes' => '19:00',
            ],
        ],
        'sameAs' => $social ?: null,
        'areaServed' => [
            ['@type' => 'City', 'name' => 'Gurugram'],
            ['@type' => 'Country', 'name' => 'India'],
        ],
        'contactPoint' => [
            '@type' => 'ContactPoint',
            'telephone' => $phone,
            'contactType' => 'customer service',
            'email' => $email,
            'areaServed' => 'IN',
            'availableLanguage' => ['English', 'Hindi'],
        ],
    ], fn ($value) => $value !== null && $value !== []);

    $websiteSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'WebSite',
        '@id' => url('/').'#website',
        'name' => $companyName,
        'url' => url('/'),
        'description' => $defaultDescription,
        'publisher' => ['@id' => url('/').'#localbusiness'],
        'inLanguage' => str_replace('_', '-', $locale),
    ];

    $organizationSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        '@id' => url('/').'#organization',
        'name' => $companyName,
        'legalName' => $legalName,
        'url' => url('/'),
        'logo' => url(config('company.branding.logo.light', '/logo/logo.png')),
        'sameAs' => $social,
        'contactPoint' => [
            '@type' => 'ContactPoint',
            'telephone' => $phone,
            'contactType' => 'sales',
            'email' => $email,
        ],
    ];
@endphp

<title>{{ $title }}</title>
<meta name="description" content="{{ $description }}">
@if(filled($keywords))
<meta name="keywords" content="{{ $keywords }}">
@endif
<meta name="robots" content="{{ $robots }}">
<meta name="author" content="{{ $companyName }}">
<link rel="canonical" href="{{ $canonical }}">

{{-- Open Graph (Facebook, LinkedIn, Instagram link previews) --}}
<meta property="og:site_name" content="{{ $companyName }}">
<meta property="og:locale" content="{{ $locale }}">
<meta property="og:type" content="{{ $ogType }}">
<meta property="og:title" content="{{ $ogTitle }}">
<meta property="og:description" content="{{ $ogDescription }}">
<meta property="og:url" content="{{ $canonical }}">
<meta property="og:image" content="{{ $ogImage }}">
<meta property="og:image:alt" content="{{ $ogTitle }}">
<meta property="og:image:secure_url" content="{{ $ogImage }}">
@if($ogType === 'article')
@if(!empty($articlePublishedTime))
<meta property="article:published_time" content="{{ $articlePublishedTime }}">
@endif
@if(!empty($articleModifiedTime))
<meta property="article:modified_time" content="{{ $articleModifiedTime }}">
@endif
@if(!empty($articleAuthor))
<meta property="article:author" content="{{ $articleAuthor }}">
@endif
@if(!empty($articleSection))
<meta property="article:section" content="{{ $articleSection }}">
@endif
@endif

{{-- Twitter / X --}}
<meta name="twitter:card" content="{{ $twitterCard }}">
<meta name="twitter:title" content="{{ $twitterTitle }}">
<meta name="twitter:description" content="{{ $twitterDescription }}">
<meta name="twitter:image" content="{{ $twitterImage }}">
@if(filled($twitterHandle))
<meta name="twitter:site" content="{{ $twitterHandle }}">
<meta name="twitter:creator" content="{{ $twitterHandle }}">
@endif

<script type="application/ld+json">{!! json_encode($localBusinessSchema, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_HEX_TAG|JSON_HEX_AMP) !!}</script>
<script type="application/ld+json">{!! json_encode($websiteSchema, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_HEX_TAG|JSON_HEX_AMP) !!}</script>
<script type="application/ld+json">{!! json_encode($organizationSchema, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_HEX_TAG|JSON_HEX_AMP) !!}</script>
@isset($schema)
    @foreach((array) $schema as $schemaBlock)
        @if(is_array($schemaBlock))
            <script type="application/ld+json">{!! json_encode($schemaBlock, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_HEX_TAG|JSON_HEX_AMP) !!}</script>
        @endif
    @endforeach
@endisset
