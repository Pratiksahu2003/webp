/**
 * Apple-style scroll & entrance animations for the home page.
 */
class HomeAppleAnimations {
    constructor() {
        this.root = document.getElementById('home-page');
        if (!this.root) return;

        this.reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        this.parallaxTicking = false;
        this.init();
    }

    init() {
        if (this.reducedMotion) {
            this.revealAll();
            return;
        }

        this.initHeroSequence();
        this.registerRevealTargets();
        this.setupRevealObserver();
        this.setupSectionParallax();
        this.setupFinaleParallax();
    }

    revealAll() {
        this.root.querySelectorAll('.apple-reveal, .apple-hero-in, .testimonials-reveal').forEach(el => {
            el.classList.add('is-revealed');
        });
        this.root.querySelectorAll('.testimonials-card').forEach(el => el.classList.add('is-visible'));
    }

    initHeroSequence() {
        const hero = document.getElementById('home-hero-section');
        if (!hero) return;

        const items = hero.querySelectorAll('[data-apple-hero]');
        items.forEach((el, i) => {
            el.classList.add('apple-hero-in');
            el.style.setProperty('--hero-delay', `${i * 120}ms`);
        });

        requestAnimationFrame(() => {
            items.forEach(el => el.classList.add('is-revealed'));
        });
    }

    registerRevealTargets() {
        const blocks = this.root.querySelectorAll(
            '.home-section, #testimonials-showcase, #technology-stack, #apple-finale'
        );

        blocks.forEach(block => {
            if (block.id === 'apple-finale') {
                block.querySelectorAll('.apple-reveal').forEach((el, i) => {
                    if (!el.style.getPropertyValue('--reveal-delay')) {
                        el.style.setProperty('--reveal-delay', `${i * 100}ms`);
                    }
                });
                return;
            }

            const header = block.querySelector('.home-section-header');
            if (header && !header.classList.contains('apple-reveal')) {
                header.classList.add('apple-reveal');
                header.querySelectorAll(':scope > p, :scope > h2').forEach((el, i) => {
                    el.classList.add('apple-reveal');
                    el.style.setProperty('--reveal-delay', `${i * 90}ms`);
                });
            }

            const legacyHeader = block.querySelector('.testimonials-reveal, .text-center.mb-12');
            if (legacyHeader && block.id === 'testimonials-showcase') {
                legacyHeader.classList.add('apple-reveal');
                legacyHeader.querySelectorAll('p, h2').forEach((el, i) => {
                    el.classList.add('apple-reveal');
                    el.style.setProperty('--reveal-delay', `${i * 80}ms`);
                });
            }

            if (block.id === 'technology-stack') {
                const techHeader = block.querySelector('.text-center.mb-12, .text-center.mb-16');
                if (techHeader) {
                    techHeader.classList.add('apple-reveal');
                    techHeader.querySelectorAll('p, h2, a').forEach((el, i) => {
                        el.classList.add('apple-reveal');
                        el.style.setProperty('--reveal-delay', `${i * 80}ms`);
                    });
                }
            }

            const staggerGroups = [
                ...block.querySelectorAll('[data-apple-stagger], .grid, .flex.flex-wrap'),
            ];

            staggerGroups.forEach(group => {
                const children = group.matches('.grid, .flex')
                    ? [...group.children]
                    : group.querySelectorAll(':scope > *');

                children.forEach((child, i) => {
                    if (child.classList.contains('apple-reveal') || child.closest('article')) return;
                    if (child.matches('article, .home-case-study-item, .testimonials-card, .tech-stack-item, .tech-stack-tab, .home-filter-btn, button, a.btn-primary')) {
                        child.classList.add('apple-reveal');
                        child.style.setProperty('--reveal-delay', `${Math.min(i * 75, 400)}ms`);
                    }
                });
            });

            block.querySelectorAll('article, .home-case-study-item').forEach((el, i) => {
                if (!el.classList.contains('apple-reveal')) {
                    el.classList.add('apple-reveal');
                    el.style.setProperty('--reveal-delay', `${Math.min(i * 90, 450)}ms`);
                }
            });

            block.querySelectorAll('.testimonials-card, .tech-stack-item').forEach((el, i) => {
                if (!el.classList.contains('apple-reveal')) {
                    el.classList.add('apple-reveal');
                    el.style.setProperty('--reveal-delay', `${Math.min(i * 80, 400)}ms`);
                }
            });

            block.querySelectorAll('.grid > div').forEach((el, i) => {
                if (el.classList.contains('apple-reveal') || el.closest('article')) return;
                el.classList.add('apple-reveal');
                el.style.setProperty('--reveal-delay', `${Math.min(i * 70, 350)}ms`);
            });
        });

        this.root.querySelectorAll('.testimonials-reveal').forEach(el => {
            el.classList.add('apple-reveal');
        });
    }

    setupRevealObserver() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (!entry.isIntersecting) return;
                entry.target.classList.add('is-revealed');
                observer.unobserve(entry.target);
            });
        }, {
            threshold: 0.08,
            rootMargin: '0px 0px -6% 0px',
        });

        this.root.querySelectorAll('.apple-reveal').forEach(el => observer.observe(el));

        this.root.querySelectorAll('.home-section, #testimonials-showcase, #technology-stack').forEach(section => {
            section.classList.add('apple-reveal-section');
        });
    }

    setupSectionParallax() {
        const layers = this.root.querySelectorAll('[data-apple-parallax]');

        const update = () => {
            const viewH = window.innerHeight;

            layers.forEach(layer => {
                const rect = layer.getBoundingClientRect();
                if (rect.bottom < 0 || rect.top > viewH) return;

                const speed = parseFloat(layer.dataset.appleParallax) || 0.08;
                const centerOffset = (rect.top + rect.height / 2) - viewH / 2;
                const y = centerOffset * speed;

                layer.style.transform = `translate3d(0, ${y}px, 0)`;
            });

            this.parallaxTicking = false;
        };

        window.addEventListener('scroll', () => {
            if (!this.parallaxTicking) {
                requestAnimationFrame(update);
                this.parallaxTicking = true;
            }
        }, { passive: true });

        update();
    }

    setupFinaleParallax() {
        const finale = document.getElementById('apple-finale');
        if (!finale) return;

        const orbs = finale.querySelectorAll('[data-parallax]');

        const update = () => {
            const rect = finale.getBoundingClientRect();
            const viewH = window.innerHeight;
            if (rect.bottom < 0 || rect.top > viewH) return;

            const progress = 1 - (rect.top + rect.height * 0.5) / (viewH + rect.height * 0.5);

            orbs.forEach(orb => {
                const speed = parseFloat(orb.dataset.parallax) || 0.1;
                orb.style.transform = `translate3d(0, ${(progress - 0.5) * 120 * speed}px, 0) scale(${1 + progress * 0.08})`;
            });
        };

        window.addEventListener('scroll', () => requestAnimationFrame(update), { passive: true });
        update();
    }
}

document.addEventListener('DOMContentLoaded', () => {
    window.homeAppleAnimations = new HomeAppleAnimations();
});

export default HomeAppleAnimations;
