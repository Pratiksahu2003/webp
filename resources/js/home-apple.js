/**
 * Apple-grade homepage animation engine — scroll-scrub + entrance sequences.
 */
class HomeAppleAnimations {
    constructor() {
        this.root = document.getElementById('home-page');
        if (!this.root) return;

        this.reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        this.scrollTicking = false;
        this.parallaxTicking = false;
        this.fxItems = [];
        this.init();
    }

    init() {
        this.injectScrollProgress();

        if (this.reducedMotion) {
            this.revealAll();
            this.initHeroVideo();
            this.root.querySelectorAll('[data-count]').forEach(el => this.setCounterFinal(el));
            return;
        }

        this.initHeroVideo();
        this.splitHeroTitle();
        this.registerSectionEffects();
        this.initHeroSequence();
        this.setupScrollRevealEngine();
        this.setupSectionParallax();
        this.setupHeroScrollEffects();
        this.setupCardTilt();
        this.setupMagneticButtons();

        setTimeout(() => this.revealStuckElements(), 4500);
    }

    injectScrollProgress() {
        if (document.querySelector('.home-scroll-progress')) return;
        const bar = document.createElement('div');
        bar.className = 'home-scroll-progress';
        bar.setAttribute('aria-hidden', 'true');
        document.body.appendChild(bar);
    }

    easeOutCubic(t) {
        return 1 - Math.pow(1 - Math.max(0, Math.min(1, t)), 3);
    }

    easeOutQuart(t) {
        return 1 - Math.pow(1 - Math.max(0, Math.min(1, t)), 4);
    }

    revealAll() {
        this.root.querySelectorAll('.home-fx, .apple-reveal, .apple-hero-in, .testimonials-reveal').forEach(el => {
            el.classList.add('is-revealed');
            el.style.setProperty('--reveal-opacity', '1');
        });
        this.root.querySelectorAll('.testimonials-card').forEach(el => {
            el.classList.add('is-visible', 'is-revealed');
            el.style.setProperty('--reveal-opacity', '1');
        });
        this.root.querySelectorAll('.home-process-step').forEach(el => el.classList.add('is-active'));
        this.root.querySelectorAll('.home-hero-float-target').forEach(el => el.classList.add('is-float-ready'));
    }

    revealStuckElements() {
        this.fxItems.forEach(item => {
            if (parseFloat(item.el.style.getPropertyValue('--reveal-opacity') || '0') < 0.5) {
                item.el.style.setProperty('--reveal-opacity', '1');
                item.el.classList.add('is-revealed');
            }
        });
    }

    fx(el, effect, delay = 0) {
        if (!el || el.classList.contains('home-fx')) return;
        el.classList.add('home-fx', `home-fx--${effect}`);
        el.style.setProperty('--reveal-delay', `${delay}ms`);
        this.fxItems.push({ el, delay, effect });
    }

    fxHeader(section, effect = 'up') {
        const header = section.querySelector('.home-section-header, .text-center.mb-12, .text-center.mb-16');
        if (!header) return;

        this.fx(header, effect, 0);
        header.querySelectorAll(':scope > p, :scope > h2, :scope > a, :scope > div').forEach((el, i) => {
            this.fx(el, effect, i * 90);
        });
    }

    fxChildren(section, selector, effect, stagger = 100, max = 600) {
        section.querySelectorAll(selector).forEach((el, i) => {
            this.fx(el, effect, Math.min(i * stagger, max));
        });
    }

    fxAlternate(section, selector, stagger = 140) {
        section.querySelectorAll(selector).forEach((el, i) => {
            this.fx(el, i % 2 === 0 ? 'left' : 'right', Math.min(i * stagger, 560));
        });
    }

    registerSectionEffects() {
        this.root.querySelectorAll('[data-section-animate]').forEach(section => {
            const type = section.dataset.sectionAnimate;

            switch (type) {
                case 'stats':
                    this.fxHeader(section, 'blur');
                    this.fxChildren(section, '.grid > div', 'scale', 120);
                    break;

                case 'clients':
                    this.fxHeader(section, 'up');
                    this.fx(section.querySelector('[data-apple-parallax], .relative.overflow-hidden'), 'clip', 250);
                    break;

                case 'services':
                    this.fxHeader(section, 'up');
                    this.fxAlternate(section, 'article', 150);
                    this.fx(section.querySelector('.mt-12'), 'bounce', 500);
                    section.querySelectorAll('article').forEach(el => el.setAttribute('data-tilt', ''));
                    break;

                case 'cases':
                    this.fxHeader(section, 'up');
                    this.fxChildren(section, '.home-filter-btn', 'pop', 70, 350);
                    this.fxChildren(section, '.home-case-study-item', 'rise', 160);
                    this.fx(section.querySelector('.mt-10'), 'fade', 550);
                    break;

                case 'about':
                    this.fx(section.querySelector('.home-about-text'), 'left', 0);
                    section.querySelectorAll('.home-about-text .home-section-header > *').forEach((el, i) => {
                        this.fx(el, 'left', i * 80);
                    });
                    this.fx(section.querySelector('.home-about-text a'), 'left', 320);
                    this.fxChildren(section, '.grid.grid-cols-2 > div', 'pop', 110);
                    this.fx(section.querySelector('.home-about-badge'), 'bounce', 500);
                    break;

                case 'process':
                    this.fxHeader(section, 'up');
                    section.querySelectorAll('.grid > .relative').forEach((el, i) => {
                        el.classList.add('home-process-step');
                        this.fx(el, 'bounce', i * 200);
                    });
                    break;

                case 'industries':
                    this.fxHeader(section, 'up');
                    this.fxChildren(section, 'article', 'rotate', 100);
                    section.querySelectorAll('article').forEach(el => el.setAttribute('data-tilt', ''));
                    break;

                case 'awards':
                    this.fxHeader(section, 'up');
                    this.fxChildren(section, '.grid > div', 'flip', 85, 480);
                    break;

                case 'blog':
                    this.fxHeader(section, 'up');
                    section.querySelectorAll('article').forEach((el, i) => {
                        this.fx(el, 'rise', i * 150);
                        const img = el.querySelector('img');
                        if (img) img.classList.add('home-fx-img');
                    });
                    this.fx(section.querySelector('.mt-10'), 'fade', 500);
                    break;

                default:
                    this.fxHeader(section, 'up');
                    this.fxChildren(section, 'article, .grid > div', 'up', 90);
            }
        });

        const testimonials = document.getElementById('testimonials-showcase');
        if (testimonials) {
            testimonials.dataset.sectionAnimate = 'testimonials';
            this.fxHeader(testimonials, 'blur');
            testimonials.querySelectorAll('.testimonials-reveal').forEach((el, i) => {
                el.classList.add('apple-reveal');
                this.fxItems.push({ el, delay: i * 120, effect: 'up', isReveal: true });
            });
            this.fxChildren(testimonials, '.testimonials-card', 'slide-up', 120);
        }

        const tech = document.getElementById('technology-stack');
        if (tech) {
            tech.dataset.sectionAnimate = 'tech';
            const techHeader = tech.querySelector('.text-center.mb-12, .text-center.mb-16');
            if (techHeader) {
                this.fx(techHeader, 'scale', 0);
                techHeader.querySelectorAll('p, h2, a').forEach((el, i) => this.fx(el, 'scale', i * 80));
            }
            this.fxChildren(tech, '.tech-stack-tab', 'pop', 60, 360);
            this.fxChildren(tech, '.tech-stack-item', 'fade-scale', 90, 450);
        }
    }

    splitHeroTitle() {
        const hero = document.getElementById('home-hero-section');
        if (!hero) return;

        hero.querySelectorAll('.hero-title-line').forEach(line => {
            if (line.querySelector('.hero-char')) return;
            const text = line.textContent.trim();
            line.textContent = '';
            text.split('').forEach((char, i) => {
                const span = document.createElement('span');
                span.className = 'hero-char';
                span.style.setProperty('--char-i', String(i));
                span.textContent = char === ' ' ? '\u00a0' : char;
                line.appendChild(span);
            });
        });
    }

    initHeroSequence() {
        const hero = document.getElementById('home-hero-section');
        if (!hero) return;

        requestAnimationFrame(() => {
            requestAnimationFrame(() => {
                hero.querySelectorAll('.apple-hero-in').forEach(el => {
                    el.classList.add('is-revealed');
                });
            });
        });

        hero.querySelectorAll('.home-hero-float-target').forEach(el => {
            el.addEventListener('animationend', (e) => {
                if (e.animationName === 'apple-hero-enter') {
                    el.classList.add('is-float-ready');
                }
            }, { once: true });
        });

        const counterDelay = 900;
        hero.querySelectorAll('[data-count]').forEach((el, i) => {
            setTimeout(() => this.animateCounter(el), counterDelay + i * 150);
        });
    }

    setupScrollRevealEngine() {
        const revealEls = [
            ...this.fxItems.map(item => item.el),
            ...this.root.querySelectorAll('.apple-reveal:not(.home-fx)'),
        ];

        const update = () => {
            const vh = window.innerHeight;
            const scrollMax = document.documentElement.scrollHeight - vh;
            const scrollPct = scrollMax > 0 ? window.scrollY / scrollMax : 0;
            document.documentElement.style.setProperty('--page-scroll', scrollPct.toFixed(4));

            revealEls.forEach(el => {
                if (el.classList.contains('home-fx--bounce') && el.classList.contains('is-revealed')) {
                    return;
                }

                const rect = el.getBoundingClientRect();
                const delayMs = parseFloat(el.style.getPropertyValue('--reveal-delay') || '0');
                const delayFactor = delayMs / 1200;

                const start = vh * 0.92;
                const end = vh * 0.25;
                const raw = 1 - (rect.top - end) / (start - end);
                const adjusted = Math.max(0, Math.min(1, (raw - delayFactor * 0.35) / (1 - delayFactor * 0.35)));
                const opacity = this.easeOutQuart(adjusted);

                el.style.setProperty('--reveal-opacity', opacity.toFixed(4));

                if (opacity >= 0.97) {
                    if (!el.classList.contains('is-revealed')) {
                        el.classList.add('is-revealed');

                        if (el.classList.contains('home-process-step')) {
                            el.classList.add('is-active');
                        }

                        const counter = el.matches('[data-count]')
                            ? el
                            : el.querySelector('[data-count]');
                        if (counter) {
                            this.animateCounter(counter);
                        }
                    }
                }
            });

            this.root.querySelectorAll('.home-section[data-section-animate]').forEach(section => {
                const rect = section.getBoundingClientRect();
                const inView = rect.top < vh * 0.85 && rect.bottom > vh * 0.1;
                section.classList.toggle('is-in-view', inView);
            });

            this.scrollTicking = false;
        };

        window.addEventListener('scroll', () => {
            if (!this.scrollTicking) {
                requestAnimationFrame(update);
                this.scrollTicking = true;
            }
        }, { passive: true });

        update();
    }

    setupHeroScrollEffects() {
        const hero = document.getElementById('home-hero-section');
        const content = hero?.querySelector('.hero-content-wrapper');
        const video = document.getElementById('hero-video');
        const overlay = hero?.querySelector('.hero-video-overlay');
        if (!hero || !content) return;

        content.classList.add('hero-scroll-content');
        if (video) video.classList.add('hero-scroll-video');

        let ticking = false;

        const update = () => {
            const rect = hero.getBoundingClientRect();
            const progress = Math.min(Math.max(-rect.top / (rect.height * 0.8), 0), 1);
            const eased = this.easeOutCubic(progress);

            hero.classList.toggle('is-scrolling', progress > 0.02);
            hero.style.setProperty('--hero-scroll-progress', eased.toFixed(4));
            content.style.setProperty('--hero-scroll-progress', eased.toFixed(4));

            if (video) {
                video.style.setProperty('--hero-video-scale', (1 + eased * 0.14).toFixed(4));
            }

            if (overlay) {
                overlay.style.opacity = String(1 + eased * 0.2);
            }

            ticking = false;
        };

        window.addEventListener('scroll', () => {
            if (!ticking) {
                requestAnimationFrame(update);
                ticking = true;
            }
        }, { passive: true });

        update();
    }

    setupMagneticButtons() {
        this.root.querySelectorAll('.home-magnetic, #home-hero-section a[class*="bg-gradient"]').forEach(btn => {
            btn.classList.add('home-magnetic');

            btn.addEventListener('mousemove', (e) => {
                const rect = btn.getBoundingClientRect();
                const x = (e.clientX - rect.left - rect.width / 2) * 0.18;
                const y = (e.clientY - rect.top - rect.height / 2) * 0.18;
                btn.style.transform = `translate(${x}px, ${y}px)`;
            });

            btn.addEventListener('mouseleave', () => {
                btn.style.transform = '';
            });
        });
    }

    setCounterFinal(el) {
        const target = parseFloat(el.dataset.count);
        const suffix = el.dataset.countSuffix || '';
        const prefix = el.dataset.countPrefix || '';
        const decimals = parseInt(el.dataset.countDecimals || '0', 10);

        const format = (value) => {
            const fixed = decimals > 0 ? value.toFixed(decimals) : Math.round(value).toString();
            if (el.dataset.countComma === 'true') {
                const parts = fixed.split('.');
                parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                return parts.join('.');
            }
            return fixed;
        };

        el.textContent = `${prefix}${format(target)}${suffix}`;
    }

    animateCounter(el) {
        if (el.dataset.counted === 'true') return;
        el.dataset.counted = 'true';

        const target = parseFloat(el.dataset.count);
        const suffix = el.dataset.countSuffix || '';
        const prefix = el.dataset.countPrefix || '';
        const decimals = parseInt(el.dataset.countDecimals || '0', 10);
        const duration = 2200;
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
            const eased = 1 - Math.pow(1 - progress, 5);
            el.textContent = `${prefix}${format(target * eased)}${suffix}`;

            if (progress < 1) {
                requestAnimationFrame(tick);
            } else {
                this.setCounterFinal(el);
            }
        };

        requestAnimationFrame(tick);
    }

    setupCardTilt() {
        const cards = this.root.querySelectorAll('[data-tilt]');

        cards.forEach(card => {
            card.addEventListener('mousemove', (e) => {
                if (!card.classList.contains('is-revealed')) return;
                const rect = card.getBoundingClientRect();
                const x = (e.clientX - rect.left) / rect.width - 0.5;
                const y = (e.clientY - rect.top) / rect.height - 0.5;
                card.style.transform = `perspective(900px) rotateY(${x * 10}deg) rotateX(${-y * 10}deg) translateY(-6px) scale(1.02)`;
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

                const speed = parseFloat(layer.dataset.appleParallax) || 0.1;
                const centerOffset = (rect.top + rect.height / 2) - viewH / 2;
                const y = centerOffset * speed;
                const opacity = Math.min(1, Math.max(0.4, 1 - Math.abs(centerOffset) / viewH));

                layer.style.transform = `translate3d(0, ${y}px, 0)`;
                layer.style.setProperty('--reveal-opacity', opacity.toFixed(3));
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
}

document.addEventListener('DOMContentLoaded', () => {
    window.homeAppleAnimations = new HomeAppleAnimations();
});

export default HomeAppleAnimations;
