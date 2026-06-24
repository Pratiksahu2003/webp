/**
 * Home page scroll, entrance, and section-specific animations.
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
            this.initHeroVideo();
            return;
        }

        this.initHeroVideo();
        this.registerSectionEffects();
        this.setupRevealObserver();
        this.setupSectionParallax();
        this.setupCardTilt();
    }

    initHeroVideo() {
        const video = document.getElementById('hero-video');
        const container = document.getElementById('hero-video-container');
        if (!video || !container) return;

        video.muted = true;
        video.defaultMuted = true;
        video.setAttribute('playsinline', '');
        video.setAttribute('webkit-playsinline', 'true');
        container.classList.add('is-ready');

        const play = () => {
            const attempt = video.play();
            if (attempt && typeof attempt.catch === 'function') {
                attempt.catch(() => {});
            }
        };

        if (video.readyState >= 2) {
            play();
        } else {
            video.addEventListener('canplay', play, { once: true });
            video.addEventListener('loadeddata', play, { once: true });
        }

        document.addEventListener('visibilitychange', () => {
            if (!document.hidden && video.paused) {
                play();
            }
        });
    }

    revealAll() {
        this.root.querySelectorAll('.home-fx, .apple-reveal, .apple-hero-in, .testimonials-reveal').forEach(el => {
            el.classList.add('is-revealed');
        });
        this.root.querySelectorAll('.testimonials-card').forEach(el => el.classList.add('is-visible'));
        this.root.querySelectorAll('.home-process-step').forEach(el => el.classList.add('is-active'));
    }

    fx(el, effect, delay = 0) {
        if (!el || el.classList.contains('home-fx')) return;
        el.classList.add('home-fx', `home-fx--${effect}`);
        el.style.setProperty('--reveal-delay', `${delay}ms`);
    }

    fxHeader(section, effect = 'up') {
        const header = section.querySelector('.home-section-header, .text-center.mb-12, .text-center.mb-16');
        if (!header) return;

        this.fx(header, effect, 0);
        header.querySelectorAll(':scope > p, :scope > h2, :scope > a').forEach((el, i) => {
            this.fx(el, effect, i * 80);
        });
    }

    fxChildren(section, selector, effect, stagger = 90, max = 500) {
        section.querySelectorAll(selector).forEach((el, i) => {
            this.fx(el, effect, Math.min(i * stagger, max));
        });
    }

    fxAlternate(section, selector, stagger = 120) {
        section.querySelectorAll(selector).forEach((el, i) => {
            this.fx(el, i % 2 === 0 ? 'left' : 'right', Math.min(i * stagger, 480));
        });
    }

    registerSectionEffects() {
        this.root.querySelectorAll('[data-section-animate]').forEach(section => {
            const type = section.dataset.sectionAnimate;

            switch (type) {
                case 'stats':
                    this.fxHeader(section, 'blur');
                    this.fxChildren(section, '.grid > div', 'scale', 110);
                    break;

                case 'clients':
                    this.fxHeader(section, 'up');
                    this.fx(section.querySelector('[data-apple-parallax], .relative.overflow-hidden'), 'fade', 200);
                    break;

                case 'services':
                    this.fxHeader(section, 'up');
                    this.fxAlternate(section, 'article', 130);
                    this.fx(section.querySelector('.mt-12'), 'bounce', 400);
                    section.querySelectorAll('article').forEach(el => el.setAttribute('data-tilt', ''));
                    break;

                case 'cases':
                    this.fxHeader(section, 'up');
                    this.fxChildren(section, '.home-filter-btn', 'pop', 60, 300);
                    this.fxChildren(section, '.home-case-study-item', 'up', 140);
                    this.fx(section.querySelector('.mt-10'), 'fade', 500);
                    break;

                case 'about':
                    this.fx(section.querySelector('.home-about-text'), 'left', 0);
                    section.querySelectorAll('.home-about-text .home-section-header > *').forEach((el, i) => {
                        this.fx(el, 'left', i * 70);
                    });
                    this.fx(section.querySelector('.home-about-text a'), 'left', 280);
                    this.fxChildren(section, '.grid.grid-cols-2 > div', 'pop', 100);
                    this.fx(section.querySelector('.home-about-badge'), 'bounce', 450);
                    break;

                case 'process':
                    this.fxHeader(section, 'up');
                    section.querySelectorAll('.grid > .relative').forEach((el, i) => {
                        el.classList.add('home-process-step');
                        this.fx(el, 'bounce', i * 180);
                    });
                    break;

                case 'industries':
                    this.fxHeader(section, 'up');
                    this.fxChildren(section, 'article', 'rotate', 95);
                    section.querySelectorAll('article').forEach(el => el.setAttribute('data-tilt', ''));
                    break;

                case 'awards':
                    this.fxHeader(section, 'up');
                    this.fxChildren(section, '.grid > div', 'flip', 75, 420);
                    break;

                case 'blog':
                    this.fxHeader(section, 'up');
                    section.querySelectorAll('article').forEach((el, i) => {
                        this.fx(el, 'rise', i * 130);
                        const img = el.querySelector('img');
                        if (img) img.classList.add('home-fx-img');
                    });
                    this.fx(section.querySelector('.mt-10'), 'fade', 450);
                    break;

                default:
                    this.fxHeader(section, 'up');
                    this.fxChildren(section, 'article, .grid > div', 'up', 80);
            }
        });

        const testimonials = document.getElementById('testimonials-showcase');
        if (testimonials) {
            testimonials.dataset.sectionAnimate = 'testimonials';
            this.fxHeader(testimonials, 'blur');
            testimonials.querySelectorAll('.testimonials-reveal').forEach((el, i) => {
                this.fx(el, 'up', i * 100);
            });
            this.fxChildren(testimonials, '.testimonials-card', 'slide-up', 100);
        }

        const tech = document.getElementById('technology-stack');
        if (tech) {
            tech.dataset.sectionAnimate = 'tech';
            const techHeader = tech.querySelector('.text-center.mb-12, .text-center.mb-16');
            if (techHeader) {
                this.fx(techHeader, 'scale', 0);
                techHeader.querySelectorAll('p, h2, a').forEach((el, i) => this.fx(el, 'scale', i * 70));
            }
            this.fxChildren(tech, '.tech-stack-tab', 'pop', 55, 330);
            this.fxChildren(tech, '.tech-stack-item', 'fade-scale', 85, 400);
        }

        this.root.querySelectorAll('.testimonials-reveal:not(.home-fx)').forEach(el => {
            el.classList.add('apple-reveal');
        });
    }

    initHeroSequence() {
        /* Hero animations disabled — static hero content */
    }

    setupRevealObserver() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (!entry.isIntersecting) return;

                entry.target.classList.add('is-revealed');

                if (entry.target.classList.contains('home-process-step')) {
                    entry.target.classList.add('is-active');
                }

                const counter = entry.target.matches('[data-count]')
                    ? entry.target
                    : entry.target.querySelector('[data-count]');
                if (counter) {
                    this.animateCounter(counter);
                }

                observer.unobserve(entry.target);
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -5% 0px',
        });

        this.root.querySelectorAll('.home-fx, .apple-reveal').forEach(el => observer.observe(el));

        const sectionObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (!entry.isIntersecting) return;

                entry.target.querySelectorAll('.home-fx:not(.is-revealed), .apple-reveal:not(.is-revealed)').forEach(el => {
                    el.classList.add('is-revealed');
                    observer.unobserve(el);
                });

                sectionObserver.unobserve(entry.target);
            });
        }, {
            threshold: 0.08,
            rootMargin: '0px 0px -5% 0px',
        });

        this.root.querySelectorAll('.home-section[data-section-animate], #testimonials-showcase, #technology-stack').forEach(section => {
            sectionObserver.observe(section);
        });
    }

    animateCounter(el) {
        if (el.dataset.counted === 'true') return;
        el.dataset.counted = 'true';

        const target = parseFloat(el.dataset.count);
        const suffix = el.dataset.countSuffix || '';
        const prefix = el.dataset.countPrefix || '';
        const decimals = parseInt(el.dataset.countDecimals || '0', 10);
        const duration = 1800;
        const start = performance.now();

        const format = (value) => {
            const fixed = decimals > 0 ? value.toFixed(decimals) : Math.round(value).toString();
            if (el.dataset.countComma === 'true') {
                const parts = fixed.split('.');
                parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                return parts.join('.');
            }
            return fixed;
        };

        const tick = (now) => {
            const progress = Math.min((now - start) / duration, 1);
            const eased = 1 - Math.pow(1 - progress, 4);
            const current = target * eased;
            el.textContent = `${prefix}${format(current)}${suffix}`;

            if (progress < 1) {
                requestAnimationFrame(tick);
            } else {
                el.textContent = `${prefix}${format(target)}${suffix}`;
            }
        };

        requestAnimationFrame(tick);
    }

    setupCardTilt() {
        const cards = this.root.querySelectorAll('[data-tilt]');
        if (!cards.length) return;

        cards.forEach(card => {
            card.addEventListener('mousemove', (e) => {
                const rect = card.getBoundingClientRect();
                const x = (e.clientX - rect.left) / rect.width - 0.5;
                const y = (e.clientY - rect.top) / rect.height - 0.5;
                card.style.transform = `perspective(800px) rotateY(${x * 8}deg) rotateX(${-y * 8}deg) translateY(-4px)`;
            });

            card.addEventListener('mouseleave', () => {
                card.style.transform = '';
            });
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
}

document.addEventListener('DOMContentLoaded', () => {
    window.homeAppleAnimations = new HomeAppleAnimations();
});

export default HomeAppleAnimations;
