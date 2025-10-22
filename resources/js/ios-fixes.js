/* ========================================
   iOS Safari Specific JavaScript Fixes
   ======================================== */

// Detect iOS Safari
const isIOSSafari = () => {
    const ua = navigator.userAgent;
    const iOS = /iPad|iPhone|iPod/.test(ua);
    const webkit = /WebKit/.test(ua);
    const standalone = window.navigator.standalone;
    return iOS && webkit && !standalone;
};

// Detect iOS version
const getIOSVersion = () => {
    const ua = navigator.userAgent;
    const match = ua.match(/OS (\d+)_(\d+)_?(\d+)?/);
    if (match) {
        return {
            major: parseInt(match[1], 10),
            minor: parseInt(match[2], 10),
            patch: parseInt(match[3] || 0, 10)
        };
    }
    return null;
};

// iOS Safari specific fixes
if (isIOSSafari()) {
    console.log('iOS Safari detected, applying fixes...');
    
    // Fix viewport height issues
    const setViewportHeight = () => {
        const vh = window.innerHeight * 0.01;
        document.documentElement.style.setProperty('--vh', `${vh}px`);
    };
    
    // Set initial viewport height
    setViewportHeight();
    
    // Update on orientation change
    window.addEventListener('orientationchange', () => {
        setTimeout(setViewportHeight, 100);
    });
    
    // Update on resize
    window.addEventListener('resize', setViewportHeight);
    
    // Fix video autoplay issues
    const videos = document.querySelectorAll('video');
    videos.forEach(video => {
        // Add iOS specific attributes
        video.setAttribute('webkit-playsinline', 'true');
        video.setAttribute('playsinline', 'true');
        
        // Handle video loading
        video.addEventListener('loadedmetadata', () => {
            video.play().catch(e => {
                console.log('Video autoplay failed:', e);
                // Fallback: show poster image
                video.style.display = 'none';
                const poster = video.parentElement.querySelector('.video-poster');
                if (poster) {
                    poster.style.display = 'block';
                }
            });
        });
        
        // Handle video errors
        video.addEventListener('error', () => {
            console.log('Video error, showing fallback');
            video.style.display = 'none';
            const fallback = video.parentElement.querySelector('.video-fallback');
            if (fallback) {
                fallback.style.display = 'block';
            }
        });
    });
    
    // Fix touch target sizes
    const touchTargets = document.querySelectorAll('button, .btn, a, input[type="button"], input[type="submit"]');
    touchTargets.forEach(target => {
        const rect = target.getBoundingClientRect();
        if (rect.height < 44 || rect.width < 44) {
            target.classList.add('ios-touch-target');
        }
    });
    
    // Fix scroll behavior
    document.body.style.webkitOverflowScrolling = 'touch';
    
    // Fix form input zoom
    const inputs = document.querySelectorAll('input[type="text"], input[type="email"], input[type="password"], input[type="tel"], input[type="url"], textarea');
    inputs.forEach(input => {
        // Prevent zoom on focus
        if (input.style.fontSize === '' || parseInt(input.style.fontSize) < 16) {
            input.style.fontSize = '16px';
        }
    });
    
    // Fix navbar positioning
    const navbar = document.getElementById('navbar');
    if (navbar) {
        // Add iOS specific classes
        navbar.classList.add('ios-fixed', 'ios-hardware-acceleration');
        
        // Handle safe area insets
        const safeAreaTop = getComputedStyle(document.documentElement).getPropertyValue('--ios-safe-top');
        if (safeAreaTop) {
            navbar.style.paddingTop = safeAreaTop;
        }
    }
    
    // Fix hero section height
    const heroSections = document.querySelectorAll('.hero-section, section[class*="hero"]');
    heroSections.forEach(section => {
        section.classList.add('ios-viewport-height', 'ios-hardware-acceleration');
        
        // Set height using JavaScript
        const setHeroHeight = () => {
            const vh = window.innerHeight * 0.01;
            section.style.height = `${window.innerHeight}px`;
        };
        
        setHeroHeight();
        window.addEventListener('resize', setHeroHeight);
        window.addEventListener('orientationchange', () => {
            setTimeout(setHeroHeight, 100);
        });
    });
    
    // Fix animation performance
    const animatedElements = document.querySelectorAll('.animate-pulse, .animate-ping, .animate-spin, .animate-bounce');
    animatedElements.forEach(element => {
        element.style.webkitTransform = 'translateZ(0)';
        element.style.transform = 'translateZ(0)';
        element.style.webkitBackfaceVisibility = 'hidden';
        element.style.backfaceVisibility = 'hidden';
    });
    
    // Fix backdrop filter
    const backdropElements = document.querySelectorAll('.backdrop-blur-sm, .backdrop-blur-md, .backdrop-blur-lg');
    backdropElements.forEach(element => {
        element.style.webkitBackdropFilter = element.style.backdropFilter;
    });
    
    // Fix gradient rendering
    const gradientElements = document.querySelectorAll('.bg-gradient-to-r, .bg-gradient-to-br, .bg-gradient-to-b');
    gradientElements.forEach(element => {
        const computedStyle = getComputedStyle(element);
        const background = computedStyle.background;
        if (background && background.includes('gradient')) {
            element.style.webkitBackground = background;
        }
    });
    
    // Fix flexbox issues
    const flexElements = document.querySelectorAll('.flex, .flex-col, .items-center, .justify-center');
    flexElements.forEach(element => {
        element.style.webkitDisplay = element.style.display;
    });
    
    // Fix border radius
    const roundedElements = document.querySelectorAll('.rounded-lg, .rounded-xl, .rounded-full');
    roundedElements.forEach(element => {
        element.style.webkitBorderRadius = element.style.borderRadius;
    });
    
    // Fix shadow rendering
    const shadowElements = document.querySelectorAll('.shadow-lg, .shadow-xl, .shadow-2xl');
    shadowElements.forEach(element => {
        element.style.webkitBoxShadow = element.style.boxShadow;
    });
    
    // Fix transform issues
    const transformElements = document.querySelectorAll('.transform, .translate-y-0, .scale-105');
    transformElements.forEach(element => {
        element.style.webkitTransform = element.style.transform;
    });
    
    // Fix opacity issues
    const opacityElements = document.querySelectorAll('.opacity-0, .opacity-100');
    opacityElements.forEach(element => {
        element.style.webkitOpacity = element.style.opacity;
    });
    
    // Fix z-index issues
    const zIndexElements = document.querySelectorAll('.z-10, .z-20, .z-30, .z-50');
    zIndexElements.forEach(element => {
        element.style.webkitZIndex = element.style.zIndex;
    });
    
    // Fix overflow issues
    const overflowElements = document.querySelectorAll('.overflow-hidden, .overflow-x-hidden, .overflow-y-hidden');
    overflowElements.forEach(element => {
        element.style.webkitOverflow = element.style.overflow;
    });
    
    // Fix position issues
    const positionElements = document.querySelectorAll('.absolute, .relative, .fixed');
    positionElements.forEach(element => {
        element.style.webkitPosition = element.style.position;
    });
    
    // Fix width/height issues
    const dimensionElements = document.querySelectorAll('.w-full, .h-full, .min-h-screen');
    dimensionElements.forEach(element => {
        element.style.webkitWidth = element.style.width;
        element.style.webkitHeight = element.style.height;
    });
    
    // Fix margin/padding issues
    const spacingElements = document.querySelectorAll('.mx-auto, .px-4');
    spacingElements.forEach(element => {
        element.style.webkitMarginLeft = element.style.marginLeft;
        element.style.webkitMarginRight = element.style.marginRight;
        element.style.webkitPaddingLeft = element.style.paddingLeft;
        element.style.webkitPaddingRight = element.style.paddingRight;
    });
    
    // Fix text issues
    const textElements = document.querySelectorAll('.text-center, .text-white, .font-bold');
    textElements.forEach(element => {
        element.style.webkitTextAlign = element.style.textAlign;
        element.style.webkitColor = element.style.color;
        element.style.webkitFontWeight = element.style.fontWeight;
    });
    
    // Fix border issues
    const borderElements = document.querySelectorAll('.border, .border-white');
    borderElements.forEach(element => {
        element.style.webkitBorder = element.style.border;
        element.style.webkitBorderColor = element.style.borderColor;
    });
    
    // Fix background issues
    const backgroundElements = document.querySelectorAll('.bg-white, .bg-transparent');
    backgroundElements.forEach(element => {
        element.style.webkitBackgroundColor = element.style.backgroundColor;
    });
    
    // Fix display issues
    const displayElements = document.querySelectorAll('.hidden, .block, .inline-block');
    displayElements.forEach(element => {
        element.style.webkitDisplay = element.style.display;
    });
    
    // Add iOS specific event listeners
    document.addEventListener('touchstart', function(e) {
        // Prevent double-tap zoom
        if (e.touches.length > 1) {
            e.preventDefault();
        }
    }, { passive: false });
    
    // Prevent pull-to-refresh
    document.addEventListener('touchmove', function(e) {
        if (e.touches.length > 1) {
            e.preventDefault();
        }
    }, { passive: false });
    
    // Fix scroll momentum
    document.addEventListener('touchstart', function() {
        document.body.style.webkitOverflowScrolling = 'touch';
    });
    
    console.log('iOS Safari fixes applied successfully');
}

// iOS specific utility functions
window.iOSUtils = {
    isIOSSafari,
    getIOSVersion,
    
    // Fix viewport height
    fixViewportHeight: () => {
        const vh = window.innerHeight * 0.01;
        document.documentElement.style.setProperty('--vh', `${vh}px`);
    },
    
    // Fix video autoplay
    fixVideoAutoplay: (video) => {
        if (video) {
            video.setAttribute('webkit-playsinline', 'true');
            video.setAttribute('playsinline', 'true');
            video.play().catch(e => console.log('Video autoplay failed:', e));
        }
    },
    
    // Fix touch targets
    fixTouchTargets: () => {
        const touchTargets = document.querySelectorAll('button, .btn, a, input[type="button"], input[type="submit"]');
        touchTargets.forEach(target => {
            const rect = target.getBoundingClientRect();
            if (rect.height < 44 || rect.width < 44) {
                target.classList.add('ios-touch-target');
            }
        });
    },
    
    // Fix form input zoom
    fixFormInputs: () => {
        const inputs = document.querySelectorAll('input[type="text"], input[type="email"], input[type="password"], input[type="tel"], input[type="url"], textarea');
        inputs.forEach(input => {
            if (input.style.fontSize === '' || parseInt(input.style.fontSize) < 16) {
                input.style.fontSize = '16px';
            }
        });
    }
};

// Apply fixes on DOM ready
document.addEventListener('DOMContentLoaded', () => {
    if (isIOSSafari()) {
        window.iOSUtils.fixViewportHeight();
        window.iOSUtils.fixTouchTargets();
        window.iOSUtils.fixFormInputs();
        
        // Fix videos
        const videos = document.querySelectorAll('video');
        videos.forEach(video => {
            window.iOSUtils.fixVideoAutoplay(video);
        });
    }
});

// Export for use in other modules
export { isIOSSafari, getIOSVersion };
