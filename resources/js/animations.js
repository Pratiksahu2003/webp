/**
 * ========================================
 * WEZOM - Animation Controller
 * ========================================
 */

class AnimationController {
    constructor() {
        this.init();
    }

    init() {
        this.setupScrollAnimations();
        this.setupCounterAnimations();
        this.setupParallaxEffects();
        this.setupFloatingElements();
        this.setupStaggerAnimations();
    }

    /**
     * Scroll-based Animations using Intersection Observer
     */
    setupScrollAnimations() {
        const elements = document.querySelectorAll('.animate-on-scroll');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animated');
                    observer.unobserve(entry.target);
                }
            });
        }, { 
            threshold: 0.1,
            rootMargin: '50px 0px -50px 0px'
        });
        
        elements.forEach(el => observer.observe(el));
    }

    /**
     * Animated Counter Numbers
     */
    setupCounterAnimations() {
        const counters = document.querySelectorAll('.counter-number');
        
        counters.forEach(counter => {
            const target = parseInt(counter.getAttribute('data-count'));
            const duration = parseInt(counter.getAttribute('data-duration')) || 2000;
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        this.animateCounter(counter, target, duration);
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });
            
            observer.observe(counter);
        });
    }

    /**
     * Individual Counter Animation
     */
    animateCounter(element, target, duration) {
        const start = 0;
        const startTime = Date.now();
        
        const updateCounter = () => {
            const elapsed = Date.now() - startTime;
            const progress = Math.min(elapsed / duration, 1);
            
            // Easing function (ease-out cubic)
            const easeOut = 1 - Math.pow(1 - progress, 3);
            const current = Math.floor(start + (target - start) * easeOut);
            
            element.textContent = current.toLocaleString() + '+';
            
            if (progress < 1) {
                requestAnimationFrame(updateCounter);
            }
        };
        
        updateCounter();
    }

    /**
     * Parallax Scrolling Effects
     */
    setupParallaxEffects() {
        const parallaxElements = document.querySelectorAll('.parallax-element');
        
        if (parallaxElements.length === 0) return;

        let ticking = false;

        const updateParallax = () => {
            const scrolled = window.pageYOffset;
            
            parallaxElements.forEach(element => {
                const speed = parseFloat(element.getAttribute('data-speed')) || 0.5;
                const yPos = -(scrolled * speed);
                element.style.transform = `translate3d(0, ${yPos}px, 0)`;
            });
            
            ticking = false;
        };

        const requestTick = () => {
            if (!ticking) {
                requestAnimationFrame(updateParallax);
                ticking = true;
            }
        };

        window.addEventListener('scroll', requestTick, { passive: true });
    }

    /**
     * Enhanced Floating Elements
     */
    setupFloatingElements() {
        const floatingElements = document.querySelectorAll('.floating-element');
        
        floatingElements.forEach((element, index) => {
            // Add random delay for more natural movement
            const delay = (index * 0.5) + Math.random() * 2;
            element.style.animationDelay = `${delay}s`;

            // Pause animation on hover for better UX
            element.addEventListener('mouseenter', () => {
                element.style.animationPlayState = 'paused';
                element.style.transform = 'translateY(-30px) scale(1.05)';
                element.style.transition = 'transform 0.3s ease';
            });

            element.addEventListener('mouseleave', () => {
                element.style.animationPlayState = 'running';
                element.style.transform = '';
                element.style.transition = '';
            });
        });
    }

    /**
     * Stagger Animations for Card Groups
     */
    setupStaggerAnimations() {
        const cardGroups = document.querySelectorAll('[data-stagger]');
        
        cardGroups.forEach(group => {
            const cards = group.querySelectorAll('.interactive-card, .service-card, .blog-card');
            const delay = parseFloat(group.getAttribute('data-stagger-delay')) || 0.1;
            
            cards.forEach((card, index) => {
                card.style.animationDelay = `${index * delay}s`;
                card.classList.add('fade-in-up');
            });
        });
    }

    /**
     * Text Reveal Animation
     */
    animateTextReveal(element, delay = 0) {
        const text = element.textContent;
        const words = text.split(' ');
        
        element.innerHTML = words.map((word, index) => 
            `<span class="inline-block" style="animation-delay: ${delay + (index * 0.1)}s; opacity: 0;">${word}</span>`
        ).join(' ');

        const spans = element.querySelectorAll('span');
        spans.forEach(span => {
            span.style.animation = 'text-reveal 0.8s ease-out forwards';
        });
    }

    /**
     * Morphing Shapes Animation
     */
    animateMorphingShapes() {
        const shapes = document.querySelectorAll('.morphing-shape');
        
        shapes.forEach(shape => {
            let currentIndex = 0;
            const paths = shape.querySelectorAll('path');
            
            setInterval(() => {
                paths[currentIndex].style.opacity = '0';
                currentIndex = (currentIndex + 1) % paths.length;
                paths[currentIndex].style.opacity = '1';
            }, 3000);
        });
    }

    /**
     * Progress Bar Animation
     */
    animateProgressBars() {
        const progressBars = document.querySelectorAll('.progress-bar');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const progressFill = entry.target.querySelector('.progress-fill');
                    const percentage = entry.target.getAttribute('data-percentage') || '0';
                    
                    setTimeout(() => {
                        progressFill.style.width = `${percentage}%`;
                    }, 300);
                    
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.3 });
        
        progressBars.forEach(bar => observer.observe(bar));
    }

    /**
     * Typewriter Effect
     */
    typewriterEffect(element, text, speed = 100) {
        element.textContent = '';
        let i = 0;
        
        const timer = setInterval(() => {
            if (i < text.length) {
                element.textContent += text.charAt(i);
                i++;
            } else {
                clearInterval(timer);
            }
        }, speed);
    }

    /**
     * Particle System
     */
    createParticleSystem(container, count = 50) {
        for (let i = 0; i < count; i++) {
            const particle = document.createElement('div');
            particle.className = 'particle';
            particle.style.cssText = `
                position: absolute;
                width: 2px;
                height: 2px;
                background: rgba(255, 107, 53, 0.5);
                border-radius: 50%;
                animation: float ${3 + Math.random() * 4}s ease-in-out infinite;
                animation-delay: ${Math.random() * 2}s;
                left: ${Math.random() * 100}%;
                top: ${Math.random() * 100}%;
            `;
            container.appendChild(particle);
        }
    }

    /**
     * Cleanup method
     */
    destroy() {
        // Remove event listeners and cleanup
        window.removeEventListener('scroll', this.handleScroll);
        // Clear any intervals or timeouts
    }
}

// Auto-initialize when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    window.animationController = new AnimationController();
});

// Export for use in other modules
export default AnimationController;
