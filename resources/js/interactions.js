/**
 * ========================================
 * VanTroZ - User Interactions Controller
 * ========================================
 */

class InteractionController {
    constructor() {
        this.init();
    }

    init() {
        this.setupMobileMenu();
        this.setupButtonInteractions();
        this.setupCardHovers();
        this.setupSmoothScrolling();
        this.setupFormEnhancements();
        this.setupNavigationEffects();
        this.setupModalInteractions();
    }

    /**
     * Mobile Menu Functionality
     */
    setupMobileMenu() {
        const mobileMenuButton = document.querySelector('.mobile-menu-button');
        const mobileMenu = document.querySelector('.mobile-menu');
        const overlay = document.createElement('div');
        
        if (!mobileMenuButton || !mobileMenu) return;

        overlay.className = 'mobile-menu-overlay fixed inset-0 bg-black bg-opacity-50 z-40 hidden';
        document.body.appendChild(overlay);

        const toggleMenu = () => {
            const isHidden = mobileMenu.classList.contains('hidden');
            
            if (isHidden) {
                mobileMenu.classList.remove('hidden');
                overlay.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
                
                // Animate menu items
                const menuItems = mobileMenu.querySelectorAll('a');
                menuItems.forEach((item, index) => {
                    item.style.opacity = '0';
                    item.style.transform = 'translateX(-20px)';
                    
                    setTimeout(() => {
                        item.style.transition = 'all 0.3s ease';
                        item.style.opacity = '1';
                        item.style.transform = 'translateX(0)';
                    }, index * 100);
                });
            } else {
                mobileMenu.classList.add('hidden');
                overlay.classList.add('hidden');
                document.body.style.overflow = '';
            }
        };

        mobileMenuButton.addEventListener('click', toggleMenu);
        overlay.addEventListener('click', toggleMenu);

        // Close menu on escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !mobileMenu.classList.contains('hidden')) {
                toggleMenu();
            }
        });
    }

    /**
     * Enhanced Button Interactions
     */
    setupButtonInteractions() {
        const buttons = document.querySelectorAll('.btn-animated, .interactive-btn');
        
        buttons.forEach(button => {
            // Ripple effect
            button.addEventListener('click', this.createRippleEffect.bind(this));
            
            // Enhanced hover states
            button.addEventListener('mouseenter', (e) => {
                e.target.style.transform = 'translateY(-3px) scale(1.02)';
                e.target.style.transition = 'all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
            });

            button.addEventListener('mouseleave', (e) => {
                e.target.style.transform = '';
            });

            // Focus states for accessibility
            button.addEventListener('focus', (e) => {
                e.target.style.boxShadow = '0 0 0 3px rgba(255, 107, 53, 0.3)';
            });

            button.addEventListener('blur', (e) => {
                e.target.style.boxShadow = '';
            });
        });
    }

    /**
     * Create Ripple Effect
     */
    createRippleEffect(e) {
        const button = e.currentTarget;
        const rect = button.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height);
        const x = e.clientX - rect.left - size / 2;
        const y = e.clientY - rect.top - size / 2;
        
        const ripple = document.createElement('span');
        ripple.style.cssText = `
            position: absolute;
            width: ${size}px;
            height: ${size}px;
            left: ${x}px;
            top: ${y}px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.3) 0%, transparent 70%);
            border-radius: 50%;
            transform: scale(0);
            animation: ripple 0.6s ease-out;
            pointer-events: none;
        `;

        // Add ripple keyframe if not exists
        if (!document.querySelector('#ripple-keyframes')) {
            const style = document.createElement('style');
            style.id = 'ripple-keyframes';
            style.textContent = `
                @keyframes ripple {
                    to {
                        transform: scale(2);
                        opacity: 0;
                    }
                }
            `;
            document.head.appendChild(style);
        }

        button.style.position = 'relative';
        button.style.overflow = 'hidden';
        button.appendChild(ripple);

        setTimeout(() => {
            ripple.remove();
        }, 600);
    }

    /**
     * Enhanced Card Hover Effects
     */
    setupCardHovers() {
        const cards = document.querySelectorAll('.interactive-card, .service-card, .blog-card');
        
        cards.forEach(card => {
            let hoverTimeout;

            card.addEventListener('mouseenter', (e) => {
                clearTimeout(hoverTimeout);
                
                // Add glow effect
                e.target.style.boxShadow = '0 25px 50px rgba(255, 107, 53, 0.2)';
                
                // Tilt effect
                card.addEventListener('mousemove', this.handleCardTilt);
            });

            card.addEventListener('mouseleave', (e) => {
                // Smooth transition back
                hoverTimeout = setTimeout(() => {
                    e.target.style.transform = '';
                    e.target.style.boxShadow = '';
                }, 100);

                card.removeEventListener('mousemove', this.handleCardTilt);
            });
        });
    }

    /**
     * Card Tilt Effect
     */
    handleCardTilt(e) {
        const card = e.currentTarget;
        const rect = card.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        
        const centerX = rect.width / 2;
        const centerY = rect.height / 2;
        
        const rotateX = (y - centerY) / 10;
        const rotateY = (centerX - x) / 10;
        
        card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1.02)`;
    }

    /**
     * Smooth Scrolling for Anchor Links
     */
    setupSmoothScrolling() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', (e) => {
                e.preventDefault();
                const target = document.querySelector(anchor.getAttribute('href'));
                
                if (target) {
                    const headerOffset = 80;
                    const elementPosition = target.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });
    }

    /**
     * Form Enhancements
     */
    setupFormEnhancements() {
        const inputs = document.querySelectorAll('input, textarea, select');
        
        inputs.forEach(input => {
            // Floating labels
            this.setupFloatingLabel(input);
            
            // Input validation feedback
            input.addEventListener('blur', this.validateInput.bind(this));
            input.addEventListener('input', this.clearValidationErrors.bind(this));
        });
    }

    /**
     * Floating Label Effect
     */
    setupFloatingLabel(input) {
        const wrapper = input.parentElement;
        const label = wrapper.querySelector('label');
        
        if (!label) return;

        const handleFocus = () => {
            label.style.transform = 'translateY(-20px) scale(0.8)';
            label.style.color = 'var(--primary-color)';
        };

        const handleBlur = () => {
            if (!input.value) {
                label.style.transform = '';
                label.style.color = '';
            }
        };

        input.addEventListener('focus', handleFocus);
        input.addEventListener('blur', handleBlur);

        // Initial state
        if (input.value) {
            handleFocus();
        }
    }

    /**
     * Input Validation
     */
    validateInput(e) {
        const input = e.target;
        const value = input.value.trim();
        let isValid = true;
        let message = '';

        // Email validation
        if (input.type === 'email' && value) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            isValid = emailRegex.test(value);
            message = isValid ? '' : 'Please enter a valid email address';
        }

        // Required field validation
        if (input.hasAttribute('required') && !value) {
            isValid = false;
            message = 'This field is required';
        }

        this.showValidationFeedback(input, isValid, message);
    }

    /**
     * Show Validation Feedback
     */
    showValidationFeedback(input, isValid, message) {
        const wrapper = input.parentElement;
        let feedback = wrapper.querySelector('.validation-feedback');

        if (!feedback) {
            feedback = document.createElement('div');
            feedback.className = 'validation-feedback text-sm mt-1 transition-all duration-300';
            wrapper.appendChild(feedback);
        }

        if (isValid) {
            input.style.borderColor = 'rgba(34, 197, 94, 0.5)';
            feedback.style.display = 'none';
        } else {
            input.style.borderColor = 'rgba(239, 68, 68, 0.5)';
            feedback.textContent = message;
            feedback.style.color = 'rgb(239, 68, 68)';
            feedback.style.display = 'block';
        }
    }

    /**
     * Clear Validation Errors
     */
    clearValidationErrors(e) {
        const input = e.target;
        input.style.borderColor = '';
        const feedback = input.parentElement.querySelector('.validation-feedback');
        if (feedback) {
            feedback.style.display = 'none';
        }
    }

    /**
     * Navigation Effects
     */
    setupNavigationEffects() {
        const nav = document.querySelector('nav');
        let lastScrollY = window.scrollY;

        window.addEventListener('scroll', () => {
            const currentScrollY = window.scrollY;
            
            // Hide/show navbar on scroll
            if (currentScrollY > lastScrollY && currentScrollY > 100) {
                nav.style.transform = 'translateY(-100%)';
            } else {
                nav.style.transform = 'translateY(0)';
            }

            // Add/remove backdrop blur based on scroll
            if (currentScrollY > 50) {
                nav.classList.add('backdrop-blur-md');
                nav.style.backgroundColor = '#ffffff';
            } else {
                nav.classList.remove('backdrop-blur-md');
                nav.style.backgroundColor = '#ffffff';
            }

            lastScrollY = currentScrollY;
        }, { passive: true });
    }

    /**
     * Modal Interactions
     */
    setupModalInteractions() {
        const modalTriggers = document.querySelectorAll('[data-modal]');
        
        modalTriggers.forEach(trigger => {
            trigger.addEventListener('click', (e) => {
                e.preventDefault();
                const modalId = trigger.getAttribute('data-modal');
                this.openModal(modalId);
            });
        });

        // Close modal on escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                this.closeModal();
            }
        });
    }

    /**
     * Open Modal
     */
    openModal(modalId) {
        const modal = document.getElementById(modalId);
        if (!modal) return;

        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
        
        // Animate modal
        setTimeout(() => {
            modal.querySelector('.modal-content').style.transform = 'scale(1)';
            modal.querySelector('.modal-content').style.opacity = '1';
        }, 10);
    }

    /**
     * Close Modal
     */
    closeModal() {
        const modals = document.querySelectorAll('.modal:not(.hidden)');
        
        modals.forEach(modal => {
            const content = modal.querySelector('.modal-content');
            content.style.transform = 'scale(0.9)';
            content.style.opacity = '0';
            
            setTimeout(() => {
                modal.classList.add('hidden');
                document.body.style.overflow = '';
            }, 300);
        });
    }

    /**
     * Cleanup method
     */
    destroy() {
        // Remove event listeners
        document.removeEventListener('scroll', this.handleScroll);
        document.removeEventListener('keydown', this.handleKeydown);
    }
}

// Auto-initialize when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    window.interactionController = new InteractionController();
});

// Export for use in other modules
export default InteractionController;
