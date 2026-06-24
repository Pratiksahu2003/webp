/* ========================================
   VanTroZ - Navbar (desktop + mobile)
   ======================================== */

const DESKTOP_NAV_MQ = '(min-width: 1280px)';

function initStickyNavbar() {
    const navbar = document.getElementById('navbar');
    if (!navbar) return;

    let scrollTimeout;

    const handleScroll = () => {
        if (scrollTimeout) clearTimeout(scrollTimeout);

        scrollTimeout = setTimeout(() => {
            navbar.classList.toggle('navbar-scrolled', window.scrollY > 50);
        }, 10);
    };

    window.addEventListener('scroll', handleScroll, { passive: true });
    handleScroll();
}

function initMobileMenu() {
    const mobileMenuButton = document.querySelector('.mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const backdrop = mobileMenu?.querySelector('.mobile-menu-backdrop');
    const openIcon = mobileMenuButton?.querySelector('.mobile-menu-icon--open');
    const closeIcon = mobileMenuButton?.querySelector('.mobile-menu-icon--close');

    if (!mobileMenuButton || !mobileMenu) return;

    let isMenuOpen = false;

    const setMenuOpen = (open) => {
        isMenuOpen = open;

        mobileMenu.classList.toggle('is-open', open);
        mobileMenu.setAttribute('aria-hidden', open ? 'false' : 'true');
        mobileMenuButton.setAttribute('aria-expanded', open ? 'true' : 'false');
        mobileMenuButton.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
        document.body.classList.toggle('mobile-menu-open', open);

        openIcon?.classList.toggle('hidden', open);
        closeIcon?.classList.toggle('hidden', !open);
    };

    const closeMenu = () => {
        if (isMenuOpen) setMenuOpen(false);
    };

    const toggleMenu = (e) => {
        e?.preventDefault();
        e?.stopPropagation();
        setMenuOpen(!isMenuOpen);
    };

    mobileMenuButton.addEventListener('click', toggleMenu);

    backdrop?.addEventListener('click', closeMenu);

    mobileMenu.querySelectorAll('a[href]').forEach(link => {
        link.addEventListener('click', closeMenu);
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeMenu();
    });

    window.addEventListener('resize', () => {
        if (window.matchMedia(DESKTOP_NAV_MQ).matches) {
            closeMenu();
        }
    });
}

function initDropdownMenus() {
    document.querySelectorAll('#navbar .group').forEach(group => {
        const dropdown = group.querySelector('.absolute');
        if (!dropdown) return;

        let hoverTimer;

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

function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(link => {
        link.addEventListener('click', (e) => {
            const targetId = link.getAttribute('href');
            if (targetId === '#') return;

            const targetElement = document.querySelector(targetId);
            if (!targetElement) return;

            e.preventDefault();
            const navbarHeight = document.getElementById('navbar')?.offsetHeight || 64;

            window.scrollTo({
                top: targetElement.offsetTop - navbarHeight - 20,
                behavior: 'smooth',
            });
        });
    });
}

function initNavbar() {
    const boot = () => {
        initStickyNavbar();
        initMobileMenu();
        initDropdownMenus();
        initSmoothScroll();
    };

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', boot);
    } else {
        boot();
    }
}

initNavbar();

export {
    initStickyNavbar,
    initMobileMenu,
    initDropdownMenus,
    initSmoothScroll,
    initNavbar,
};
