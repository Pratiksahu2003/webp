/* ========================================
   VanTroZ - Sticky Navbar JavaScript
   ======================================== */

/**
 * Sticky Navbar with Background Change on Scroll
 */
function initStickyNavbar() {
    const navbar = document.getElementById('navbar');
    
    if (!navbar) return;
    
    let scrollTimeout;
    let lastScrollY = window.scrollY;
    
    function handleScroll() {
        const currentScrollY = window.scrollY;
        
        // Clear existing timeout
        if (scrollTimeout) {
            clearTimeout(scrollTimeout);
        }
        
        // Debounce scroll events for better performance
        scrollTimeout = setTimeout(() => {
            // Add or remove scrolled class based on scroll position
            if (currentScrollY > 50) {
                navbar.classList.add('navbar-scrolled');
            } else {
                navbar.classList.remove('navbar-scrolled');
            }
            
            lastScrollY = currentScrollY;
        }, 10);
    }
    
    // Add scroll event listener
    window.addEventListener('scroll', handleScroll, { passive: true });
    
    // Check initial scroll position
    handleScroll();
}

/**
 * Enhanced Mobile Menu Toggle with better animations
 */
function initMobileMenu() {
    const mobileMenuButton = document.querySelector('.mobile-menu-button');
    const mobileMenu = document.querySelector('.mobile-menu');
    const navbar = document.getElementById('navbar');
    
    if (!mobileMenuButton || !mobileMenu) return;
    
    let isMenuOpen = false;
    
    const toggleMenu = () => {
        isMenuOpen = !isMenuOpen;
        
        if (isMenuOpen) {
            // Show menu with smooth animation
            mobileMenu.classList.remove('hidden');
            mobileMenu.style.maxHeight = '0px';
            mobileMenu.style.opacity = '0';
            mobileMenu.style.transform = 'translateY(-10px)';
            
            requestAnimationFrame(() => {
                mobileMenu.style.transition = 'all 0.4s cubic-bezier(0.4, 0, 0.2, 1)';
                mobileMenu.style.maxHeight = mobileMenu.scrollHeight + 'px';
                mobileMenu.style.opacity = '1';
                mobileMenu.style.transform = 'translateY(0)';
            });
            
            // Animate button to X with rotation
            mobileMenuButton.innerHTML = `
                <svg class="h-6 w-6 transform transition-transform duration-300 rotate-90" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            `;
        } else {
            // Hide menu with smooth animation
            mobileMenu.style.transition = 'all 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
            mobileMenu.style.maxHeight = '0px';
            mobileMenu.style.opacity = '0';
            mobileMenu.style.transform = 'translateY(-10px)';
            
            setTimeout(() => {
                mobileMenu.classList.add('hidden');
                mobileMenu.style.transform = '';
            }, 300);
            
            // Animate button back to hamburger
            mobileMenuButton.innerHTML = `
                <svg class="h-6 w-6 transform transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            `;
        }
    };
    
    mobileMenuButton.addEventListener('click', toggleMenu);
    
    // Close mobile menu when clicking outside
    document.addEventListener('click', (e) => {
        if (!navbar.contains(e.target) && isMenuOpen) {
            toggleMenu();
        }
    });
    
    // Close mobile menu on window resize
    window.addEventListener('resize', () => {
        if (window.innerWidth >= 1024 && isMenuOpen) {
            isMenuOpen = false;
            mobileMenu.classList.add('hidden');
            mobileMenu.style.maxHeight = '';
            mobileMenu.style.opacity = '';
            mobileMenu.style.transform = '';
            
            mobileMenuButton.innerHTML = `
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            `;
        }
    });
}

/**
 * Enhanced Dropdown Menu Functionality
 */
function initDropdownMenus() {
    const dropdownGroups = document.querySelectorAll('.group');
    
    dropdownGroups.forEach(group => {
        const dropdown = group.querySelector('.absolute');
        if (!dropdown) return;
        
        let hoverTimer;
        
        // Enhanced hover behavior with delay
        group.addEventListener('mouseenter', () => {
            clearTimeout(hoverTimer);
            dropdown.style.pointerEvents = 'auto';
        });
        
        group.addEventListener('mouseleave', () => {
            hoverTimer = setTimeout(() => {
                dropdown.style.pointerEvents = 'none';
            }, 100);
        });
    });
}

/**
 * Enhanced Navbar Animations
 */
function initNavbarAnimations() {
    const navbarLinks = document.querySelectorAll('.navbar-link');
    const contactBtn = document.querySelector('.navbar-contact-btn');
    
    // Add stagger animation to navbar links on page load
    navbarLinks.forEach((link, index) => {
        link.style.opacity = '0';
        link.style.transform = 'translateY(-20px)';
        
        setTimeout(() => {
            link.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
            link.style.opacity = '1';
            link.style.transform = 'translateY(0)';
        }, 100 + (index * 100));
    });
    
    // Enhanced contact button animation
    if (contactBtn) {
        contactBtn.style.opacity = '0';
        contactBtn.style.transform = 'scale(0.8)';
        
        setTimeout(() => {
            contactBtn.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
            contactBtn.style.opacity = '1';
            contactBtn.style.transform = 'scale(1)';
        }, 800);
    }
}

/**
 * Smooth Scroll for Anchor Links
 */
function initSmoothScroll() {
    const anchorLinks = document.querySelectorAll('a[href^="#"]');
    
    anchorLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            const targetId = link.getAttribute('href');
            
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                e.preventDefault();
                
                const navbarHeight = document.getElementById('navbar')?.offsetHeight || 80;
                const targetPosition = targetElement.offsetTop - navbarHeight - 20;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
}

/**
 * Initialize all navbar functionality
 */
function initNavbar() {
    // Wait for DOM to be ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => {
            initStickyNavbar();
            initMobileMenu();
            initDropdownMenus();
            initSmoothScroll();
            
            // Delay animations slightly for better UX
            setTimeout(() => {
                initNavbarAnimations();
            }, 500);
        });
    } else {
        initStickyNavbar();
        initMobileMenu();
        initDropdownMenus();
        initSmoothScroll();
        
        // Delay animations slightly for better UX
        setTimeout(() => {
            initNavbarAnimations();
        }, 500);
    }
}

// Initialize navbar
initNavbar();

// Export functions for potential external use
export { 
    initStickyNavbar, 
    initMobileMenu, 
    initDropdownMenus, 
    initNavbarAnimations, 
    initSmoothScroll, 
    initNavbar 
};
