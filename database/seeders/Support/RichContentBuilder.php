<?php

namespace Database\Seeders\Support;

class RichContentBuilder
{
    public static function serviceDescription(string $title, string $category, array $highlights): string
    {
        $highlightList = self::listItems($highlights);

        return self::wrap(
            self::heading("About {$title}"),
            self::paragraph("VanTroZ delivers enterprise-grade {$title} solutions engineered for startups, scale-ups, and established organizations that need reliable digital products without compromising speed, security, or long-term maintainability. Our {$category} practice combines strategic discovery, modern engineering standards, and outcome-focused delivery so every engagement moves from concept to production with clarity and measurable business impact."),
            self::paragraph("Whether you are launching a new platform, modernizing legacy systems, or expanding into new markets, our team architect solutions that align with your revenue goals, operational workflows, and customer experience expectations. We treat every project as a partnership—embedding best practices in architecture, documentation, quality assurance, and DevOps from day one."),
            self::heading('What We Deliver'),
            $highlightList,
            self::heading('Our Delivery Philosophy'),
            self::paragraph("We follow an agile, milestone-driven methodology with transparent communication, weekly progress reviews, and staging environments that let stakeholders validate features early. Each sprint includes code reviews, automated testing where applicable, performance checks, and security-conscious development patterns that reduce rework and accelerate time-to-market."),
            self::paragraph("Our engineers work across discovery workshops, technical specification, UI collaboration, backend and frontend implementation, integration testing, deployment, and post-launch support. This end-to-end ownership ensures consistency across modules, APIs, admin panels, analytics, and third-party integrations."),
            self::heading('Why Organizations Choose VanTroZ'),
            self::paragraph("Clients choose us for depth of expertise, predictable delivery, and a product mindset that prioritizes user value over vanity features. We invest time understanding your domain—whether fintech, healthcare, e-commerce, education, or B2B SaaS—so the solution reflects real user journeys, compliance needs, and growth scenarios."),
            self::paragraph("We also emphasize maintainability: clean repository structure, environment-based configuration, logging and monitoring hooks, and handover documentation that empowers your internal team to evolve the product confidently after launch."),
            self::heading('Engagement Models'),
            self::paragraph("Engagements are available as fixed-scope packages, dedicated team extensions, or phased roadmap deliveries. Fixed packages suit well-defined MVPs and marketing sites, while dedicated teams support continuous product evolution. We help you select the model that matches budget, timeline, and risk profile."),
            self::paragraph("Every engagement includes a dedicated project manager, structured communication channels, shared task boards, and demo sessions. Enterprise clients receive additional governance artifacts including RAID logs, SLA-aligned support windows, and optional on-call coverage during critical releases."),
            self::heading('Quality, Security & Performance'),
            self::paragraph("Quality is enforced through peer reviews, coding standards, regression testing, and performance profiling on representative workloads. Security practices include least-privilege access, secrets management, input validation, OWASP-aware patterns, and dependency monitoring. We design for scalability using caching, queue workers, CDN delivery, and cloud-native deployment options when required."),
            self::conclusion($title)
        );
    }

    public static function subServiceDescription(
        string $title,
        string $serviceTitle,
        string $category,
        array $highlights,
        array $technologyNames
    ): string {
        $techSentence = implode(', ', $technologyNames);
        $highlightList = self::listItems($highlights);

        return self::wrap(
            self::heading("Professional {$title} Services"),
            self::paragraph("VanTroZ offers comprehensive {$title} services as part of our {$serviceTitle} portfolio. Organizations partner with us to build production-ready solutions that are secure, scalable, and optimized for real-world usage. Our specialists bring deep experience across {$category} engagements—from greenfield builds to complex migrations—ensuring your product roadmap stays aligned with business priorities."),
            self::paragraph("Every {$title} project begins with structured discovery: stakeholder interviews, requirement mapping, user flow definition, technical feasibility analysis, and success metric identification. This foundation prevents scope drift and creates a shared understanding of must-have features, nice-to-have enhancements, and post-launch iteration plans."),
            self::heading('Scope & Capabilities'),
            $highlightList,
            self::heading('Detailed Delivery Process'),
            self::paragraph("Phase one focuses on planning and design validation. We document functional requirements, non-functional requirements, integration points, and acceptance criteria. Wireframes or high-fidelity designs are reviewed with your team before development begins. Phase two covers iterative implementation in sprints, with demonstrable increments deployed to staging for feedback."),
            self::paragraph("Phase three includes integration testing, cross-browser and cross-device validation, performance tuning, security review, and user acceptance support. Phase four covers production deployment, monitoring setup, knowledge transfer, and warranty support. Optional retainers provide continuous improvements, analytics-driven optimization, and feature expansion."),
            self::heading('Technology Stack'),
            self::paragraph("Our {$title} implementations leverage proven technologies including {$techSentence}. We select tools based on maintainability, community support, hiring ecosystem, and fit for your scalability targets—not hype. Where appropriate, we implement component libraries, API versioning, event-driven workflows, and observability stacks that simplify operations as traffic grows."),
            self::paragraph("For data-heavy applications we design normalized schemas, indexing strategies, and backup policies. For customer-facing experiences we prioritize accessibility, responsive layouts, Core Web Vitals, and conversion-oriented UX patterns. Admin and internal tools receive role-based access control, audit trails, and export capabilities tailored to operational teams."),
            self::heading('Business Outcomes You Can Expect'),
            self::paragraph("Clients typically achieve faster launch cycles, reduced operational friction, improved customer satisfaction, and clearer visibility into product performance. A well-executed {$title} engagement reduces technical debt, improves team velocity for future releases, and creates a platform that supports marketing, sales, support, and analytics functions holistically."),
            self::paragraph("We also help you plan for growth: modular architecture, feature flags, multi-tenant readiness, localization hooks, and payment or subscription models when monetization is part of the roadmap. Our consultants advise on KPIs such as activation rate, retention, support ticket volume, and infrastructure cost per active user."),
            self::heading('Collaboration & Communication'),
            self::paragraph("You receive a single point of contact, shared Slack or Teams channels, weekly status reports, and recorded demo sessions. Decisions and change requests are tracked transparently with impact analysis on timeline and budget. We welcome product owners, designers, and internal developers into ceremonies to maximize alignment."),
            self::heading('Support After Launch'),
            self::paragraph("Post-launch support includes bug fixes within agreed windows, minor configuration adjustments, deployment assistance, and documentation updates. Extended support packages add proactive monitoring, monthly health checks, security patches, and prioritized feature development. We aim to make your team self-sufficient while remaining available as a strategic technology partner."),
            self::paragraph("Choose VanTroZ for {$title} when you need a team that combines engineering excellence with commercial awareness—delivering software that works beautifully today and adapts confidently tomorrow."),
            self::conclusion($title)
        );
    }

    public static function packageDescription(string $packageName, string $subServiceTitle, int $tierIndex): string
    {
        $tiers = [
            'ideal for startups and MVPs requiring essential functionality with rapid deployment',
            'designed for growing businesses that need advanced features, integrations, and polish',
            'built for established companies seeking comprehensive capabilities, automation, and scale',
            ' tailored for enterprise requirements including custom architecture, compliance, and dedicated support',
        ];
        $tierText = $tiers[$tierIndex] ?? $tiers[0];

        return self::wrap(
            self::heading("{$packageName} Package — {$subServiceTitle}"),
            self::paragraph("The {$packageName} package for {$subServiceTitle} is {$tierText}. It includes a clearly defined deliverable set, milestone-based delivery, documented handover, and support coverage aligned with the package tier. VanTroZ ensures transparent scope, predictable timelines, and production-quality output at every level."),
            self::paragraph("This package includes planning sessions, implementation, testing, deployment assistance, and post-launch warranty support. Upgrade paths are available if your requirements expand during the project. Contact our team to map this package against your exact feature list and integration needs.")
        );
    }

    public static function faqAnswer(string $question, string $subServiceTitle): string
    {
        return "For {$subServiceTitle}, {$question} depends on scope, integrations, and content readiness. VanTroZ provides a detailed timeline after discovery. Typical projects include milestone reviews, staging demos, and structured UAT. We align delivery with your internal approval processes and keep you informed of risks early. Packages include defined revision rounds and support windows; enterprise engagements can add dedicated resources and accelerated SLAs.";
    }

    private static function wrap(string ...$parts): string
    {
        return '<div class="seed-content prose max-w-none">'.implode("\n", $parts).'</div>';
    }

    private static function heading(string $text): string
    {
        return "<h2>{$text}</h2>";
    }

    private static function paragraph(string $text): string
    {
        return "<p>{$text}</p>";
    }

    private static function listItems(array $items): string
    {
        $lis = array_map(fn ($item) => "<li>{$item}</li>", $items);

        return '<ul>'.implode('', $lis).'</ul>';
    }

    private static function conclusion(string $title): string
    {
        return self::paragraph("Ready to move forward with {$title}? VanTroZ combines strategic consulting, modern engineering, and dependable delivery to help you launch and scale with confidence. Explore our packages below or request a custom proposal aligned with your roadmap, budget, and timeline.");
    }
}
