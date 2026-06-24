<?php

namespace Database\Seeders\Support;

class DescriptionBuilder
{
    /**
     * Build a rich HTML description (~1500 words) for a sub-service page.
     */
    public static function forSubService(array $ctx): string
    {
        $company = config('company.name', 'VanTroZ');
        $title = $ctx['title'];
        $service = $ctx['service'];
        $focus = $ctx['focus'] ?? [];
        $benefits = $ctx['benefits'] ?? [];
        $process = $ctx['process'] ?? [];
        $industries = $ctx['industries'] ?? [];
        $tech = $ctx['technologies'] ?? [];
        $deliverables = $ctx['deliverables'] ?? [];

        $focusList = self::listItems($focus);
        $benefitList = self::listItems($benefits);
        $processList = self::orderedList($process);
        $industryList = self::listItems($industries);
        $techList = self::inlineList($tech);
        $deliverableList = self::listItems($deliverables);

        return <<<HTML
<h2>Comprehensive {$title} Services by {$company}</h2>
<p>At {$company}, we deliver enterprise-grade {$title} solutions engineered for performance, scalability, and long-term business growth. Our multidisciplinary team combines deep technical expertise with strategic product thinking to transform your vision into production-ready software that drives measurable results. Whether you are a fast-growing startup validating your first product or an established enterprise modernizing legacy systems, our {$title} practice is designed to meet you where you are and accelerate where you need to go.</p>

<p>In today's hyper-competitive digital landscape, generic development approaches no longer suffice. Businesses require tailored architectures, obsessive attention to user experience, and infrastructure that scales gracefully under real-world load. Our {$title} engagements begin with a thorough discovery phase where we map your business objectives, user personas, technical constraints, and success metrics. This foundation ensures every line of code, every design decision, and every deployment pipeline serves a clear strategic purpose rather than accumulating technical debt.</p>

<p>We specialize in {$service} with a particular focus on {$techList}. Our engineers stay current with industry best practices, security standards, and emerging patterns so your product benefits from modern tooling without unnecessary complexity. From the first architecture diagram to post-launch optimization, {$company} acts as a true technology partner—not merely a vendor executing tickets.</p>

<p>Choosing the right partner for {$title} can determine whether your project launches on time, stays within budget, and continues to perform as your user base grows. Too many organizations have experienced failed engagements where agencies over-promised, under-delivered, and left behind unmaintainable codebases. {$company} was founded to be the antidote to that experience. We invest heavily in engineering culture, code quality standards, and client communication because we know that exceptional {$title} outcomes are built on trust, craftsmanship, and accountability—not shortcuts.</p>

<h3>Understanding Your Business Before Writing Code</h3>
<p>Before any development begins, our business analysts and solution architects work with your stakeholders to understand the problem you are solving, the users you are serving, and the metrics that define success. We map existing workflows, identify pain points, and document functional and non-functional requirements in a shared specification that both teams approve. This upfront investment prevents scope creep, misaligned expectations, and expensive mid-project pivots. For {$title} specifically, we examine competitive landscapes, regulatory requirements, integration dependencies, and growth projections to ensure the architecture we design can support your roadmap for the next three to five years—not just your immediate MVP.</p>

<p>We also assess your internal capabilities: Do you have an in-house team that will maintain the system? What is your preferred deployment environment? Are there legacy systems that must integrate seamlessly? These questions shape our technical recommendations and handoff strategy. Our goal is to deliver a solution that fits your organization—not force your organization to adapt to our preferred way of working.</p>

<h3>What We Deliver</h3>
<p>Every {$title} project includes a clearly defined scope, milestone-based delivery, and transparent communication throughout the engagement. Typical deliverables include:</p>
{$deliverableList}

<p>We document every component we build—API contracts, database schemas, deployment runbooks, and admin guides—so your internal team can maintain and extend the platform confidently after handoff. Knowledge transfer is built into our process, not treated as an afterthought.</p>

<h3>Core Capabilities &amp; Focus Areas</h3>
<p>Our {$title} team excels across the following capability areas, each backed by repeatable playbooks and proven delivery frameworks:</p>
{$focusList}

<p>Each capability area is staffed by senior practitioners who have shipped production systems at scale. We avoid junior-only teams on critical paths and ensure architectural decisions are reviewed by experienced leads before implementation begins. This governance model dramatically reduces rework, security vulnerabilities, and performance bottlenecks that plague under-resourced projects.</p>

<p>Beyond core development, our {$title} practice includes specialized support for third-party integrations (payment gateways, CRM systems, ERP platforms, marketing automation tools), data migration from legacy systems, and multi-language or multi-currency localization for global deployments. We have pre-built integration patterns for popular services that accelerate delivery while maintaining security and reliability standards.</p>

<h3>Why Businesses Choose {$company}</h3>
<p>Clients partner with us because we combine technical depth with business pragmatism. We do not over-engineer for hypothetical scale, nor do we cut corners that create costly problems later. Our track record spans startups, SMBs, and enterprise organizations across multiple industries.</p>
{$benefitList}

<p>Transparency is central to our culture. You receive access to project management tools, regular sprint demos, burndown visibility, and direct communication channels with your delivery lead. We believe trust is earned through consistent delivery, honest timelines, and proactive risk management—not marketing promises.</p>

<h3>Our Proven Delivery Process</h3>
<p>We follow a structured yet agile methodology refined across hundreds of engagements. This process balances speed with quality and gives stakeholders predictable visibility:</p>
{$processList}

<p>Throughout each phase, we conduct code reviews, automated testing, and security checks aligned with OWASP guidelines. Performance benchmarks are established early and validated before launch. Our QA engineers work in parallel with developers—not as a gate at the end—so defects are caught when they are cheapest to fix.</p>

<h3>Quality Assurance &amp; Testing Methodology</h3>
<p>Quality is non-negotiable in every {$title} engagement. Our QA team executes a comprehensive testing matrix covering functional testing, regression testing, cross-browser and cross-device compatibility, API contract validation, accessibility compliance (WCAG 2.1), and performance testing under simulated load. We maintain traceability between requirements, test cases, and defect reports so nothing falls through the cracks. For critical business flows—checkout, authentication, data submission, reporting—we implement automated test suites that run on every code commit, providing continuous confidence as the codebase evolves.</p>

<p>Security testing is integrated throughout the lifecycle, not bolted on at the end. We perform dependency vulnerability scanning, SQL injection and XSS prevention validation, authentication bypass testing, and authorization boundary checks. For clients in regulated industries, we provide audit-ready documentation of our testing activities and remediation records.</p>

<h3>Technology Stack &amp; Engineering Standards</h3>
<p>We architect {$title} solutions using {$techList}, selecting tools based on your requirements rather than forcing a one-size-fits-all stack. Our engineering standards include version-controlled infrastructure, CI/CD automation, environment parity between staging and production, and comprehensive logging and monitoring hooks from day one.</p>

<p>Security is embedded at every layer: input validation, authentication hardening, encrypted data in transit and at rest, role-based access control, and regular dependency audits. For regulated industries, we accommodate compliance frameworks including data residency, audit trails, and privacy-by-design principles.</p>

<h3>Scalability, Performance &amp; Future-Proof Architecture</h3>
<p>We design {$title} systems with growth in mind from day one. This means choosing appropriate database indexing strategies, implementing caching layers where beneficial, designing stateless application tiers that can scale horizontally, and establishing monitoring and alerting before launch—not after an outage. Our architects document scaling paths so you understand when and how to evolve infrastructure as traffic, data volume, and feature complexity increase. We have helped clients grow from hundreds to millions of users without disruptive platform rewrites because the foundational architecture was sound.</p>

<p>Performance optimization is treated as an ongoing discipline. We target industry-standard metrics including sub-second page load times, API response times under 200ms for critical endpoints, and Core Web Vitals scores that support SEO and user satisfaction. Our team profiles applications under realistic load conditions and addresses bottlenecks proactively.</p>

<h3>Industries We Serve</h3>
<p>Our {$title} expertise translates across verticals where digital experience and operational efficiency directly impact revenue:</p>
{$industryList}

<p>We adapt domain-specific workflows, integrations, and reporting to match how your industry actually operates. Whether you need HIPAA-aware healthcare portals, high-throughput fintech transaction engines, or conversion-optimized e-commerce experiences, our team brings relevant context to every engagement.</p>

<h3>Transparent Pricing &amp; Flexible Engagement Models</h3>
<p>Our package-based pricing eliminates the uncertainty that plagues custom software projects. Each tier below includes clearly listed features, defined delivery timelines, specified revision rounds, and post-launch support periods. There are no hidden fees for standard project activities—discovery, development, testing, deployment, and documentation are all included. If your requirements exceed a standard package, we provide detailed custom quotes with itemized scope so you can make informed decisions.</p>

<p>We support multiple engagement models beyond fixed-price packages: time-and-materials for evolving requirements, dedicated team extensions that integrate with your in-house staff, and monthly retainers for ongoing development and maintenance. Many clients begin with a Starter or Professional package to validate the partnership, then expand into larger engagements as trust and results accumulate.</p>

<h3>Post-Launch Support &amp; Continuous Improvement</h3>
<p>Launch day is a milestone, not a finish line. We offer structured post-launch support windows included with every package tier, covering bug fixes, performance tuning, and minor enhancements. For clients requiring ongoing evolution, we provide flexible retainer models with dedicated capacity for feature development, A/B testing, analytics integration, and platform upgrades.</p>

<p>We monitor application health metrics—response times, error rates, uptime, and user engagement—and recommend improvements backed by data. As your business grows, we help you scale infrastructure, refactor bottlenecks, and expand functionality without disruptive rewrites.</p>

<h3>Getting Started with {$company}</h3>
<p>Ready to begin your {$title} project? Select a package below that matches your scope and timeline, or contact our solutions team for a custom proposal. We typically respond to inquiries within one business day and can schedule a discovery call to assess fit, outline approach, and provide a detailed estimate. Partner with {$company} and experience {$title} delivered with precision, transparency, and lasting value.</p>
HTML;
    }

    public static function forService(string $title, string $category, array $highlights): string
    {
        $company = config('company.name', 'VanTroZ');
        $highlightList = self::listItems($highlights);

        return <<<HTML
<p>{$company} offers end-to-end {$title} services designed for organizations that demand reliability, innovation, and measurable ROI. As part of our {$category} portfolio, this practice brings together strategists, designers, engineers, and QA specialists who collaborate as one integrated team.</p>
<p>Our {$title} solutions span the full product lifecycle—from ideation and prototyping through development, deployment, and ongoing optimization. We align every engagement with your business KPIs, ensuring technology investments translate into competitive advantage.</p>
{$highlightList}
<p>Explore our specialized offerings below to find the exact capability your project requires, each backed by transparent pricing, defined deliverables, and expert execution.</p>
HTML;
    }

    public static function forTechnology(string $name, string $type, string $category): string
    {
        $company = config('company.name', 'VanTroZ');

        return <<<HTML
<p>{$name} is a leading {$type} technology in the {$category} ecosystem. At {$company}, our engineers leverage {$name} to build secure, performant, and maintainable solutions tailored to client requirements.</p>
<p>We follow community best practices, keep dependencies current, and architect integrations that scale with your business. Whether greenfield development or modernization of existing systems, {$name} is part of our proven delivery toolkit.</p>
HTML;
    }

    private static function listItems(array $items): string
    {
        if (empty($items)) {
            return '<ul><li>Custom solution architecture and implementation</li><li>Performance optimization and security hardening</li><li>Ongoing support and maintenance options</li></ul>';
        }

        $html = '<ul>';
        foreach ($items as $item) {
            $html .= '<li>'.htmlspecialchars($item, ENT_QUOTES, 'UTF-8').'</li>';
        }
        $html .= '</ul>';

        return $html;
    }

    private static function orderedList(array $items): string
    {
        if (empty($items)) {
            return '<ol><li>Discovery &amp; requirements analysis</li><li>Architecture &amp; UI/UX design</li><li>Agile development sprints</li><li>QA, security &amp; performance testing</li><li>Deployment, training &amp; handoff</li></ol>';
        }

        $html = '<ol>';
        foreach ($items as $item) {
            $html .= '<li>'.htmlspecialchars($item, ENT_QUOTES, 'UTF-8').'</li>';
        }
        $html .= '</ol>';

        return $html;
    }

    private static function inlineList(array $items): string
    {
        if (empty($items)) {
            return 'industry-standard modern technologies';
        }

        return implode(', ', array_slice($items, 0, 8));
    }
}
