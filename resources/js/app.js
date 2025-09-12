import './bootstrap';
import './animations';
import './interactions';
import './navbar';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Initialize custom components when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    console.log('🎨 WEZOM UI System Initialized');
    
    // Add smooth page transitions
    const addPageTransitions = () => {
        const links = document.querySelectorAll('a:not([href^="#"]):not([href^="mailto"]):not([href^="tel"]):not([target="_blank"])');
        
        links.forEach(link => {
            link.addEventListener('click', (e) => {
                const href = link.getAttribute('href');
                
                if (href && !e.metaKey && !e.ctrlKey) {
                    e.preventDefault();
                    
                    // Add page transition effect
                    document.body.style.opacity = '0.8';
                    document.body.style.transform = 'scale(0.98)';
                    document.body.style.transition = 'all 0.3s ease';
                    
                    setTimeout(() => {
                        window.location.href = href;
                    }, 300);
                }
            });
        });
    };
    
    addPageTransitions();
    
    // Add loading states to forms
    const enhanceForms = () => {
        const forms = document.querySelectorAll('form');
        
        forms.forEach(form => {
            form.addEventListener('submit', (e) => {
                const submitBtn = form.querySelector('button[type="submit"]');
                if (submitBtn) {
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<span class="loading-animation">Processing...</span>';
                    
                    // Reset after 3 seconds if no redirect happens
                    setTimeout(() => {
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = submitBtn.getAttribute('data-original-text') || 'Submit';
                    }, 3000);
                }
            });
        });
    };
    
    enhanceForms();
});
