/* ========================================
   iOS Safari Specific JavaScript Fixes
   ======================================== */

// Enhanced iOS Detection
const isIOSSafari = () => {
    const ua = navigator.userAgent;
    const iOS = /iPad|iPhone|iPod/.test(ua);
    const webkit = /WebKit/.test(ua);
    const standalone = window.navigator.standalone;
    const isIOS = iOS && webkit;
    
    // Check if running in iOS Safari (not standalone PWA)
    if (isIOS && !standalone) {
        return true;
    }
    
    // Also detect iOS Chrome (uses WKWebView)
    if (iOS && /CriOS/.test(ua)) {
        return true;
    }
    
    return false;
};

// Detect if device is iPad
const isIPad = () => {
    const ua = navigator.userAgent;
    return /iPad/.test(ua) || (navigator.platform === 'MacIntel' && navigator.maxTouchPoints > 1);
};

// Detect device type
const getIOSDeviceType = () => {
    const ua = navigator.userAgent;
    const width = window.screen.width;
    const height = window.screen.height;
    
    if (isIPad()) {
        if (width >= 1024) return 'ipad-pro';
        return 'ipad';
    }
    
    // iPhone detection based on screen dimensions
    if (width === 375 && height === 667) return 'iphone-se';
    if (width === 390 && height === 844) return 'iphone-12-13-14';
    if (width === 414 && height === 896) return 'iphone-plus';
    if (width === 428 && height === 926) return 'iphone-pro-max';
    
    return 'iphone-unknown';
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

// Enhanced iOS Safari specific fixes
if (isIOSSafari()) {
    const deviceType = getIOSDeviceType();
    console.log('iOS Safari detected:', deviceType, 'applying enhanced fixes...');
    
    // Enhanced viewport height fix
    const setViewportHeight = () => {
        const vh = window.innerHeight * 0.01;
        document.documentElement.style.setProperty('--ios-vh', `${vh}px`);
        
        // Also set CSS custom property for safe areas
        const safeAreaTop = getComputedStyle(document.documentElement)
            .getPropertyValue('--ios-safe-top') || '0px';
        const safeAreaBottom = getComputedStyle(document.documentElement)
            .getPropertyValue('--ios-safe-bottom') || '0px';
        
        document.documentElement.style.setProperty('--ios-safe-top', safeAreaTop);
        document.documentElement.style.setProperty('--ios-safe-bottom', safeAreaBottom);
    };
    
    // Set initial viewport height
    setViewportHeight();
    
    // Enhanced orientation change handler
    let orientationTimeout;
    const handleOrientationChange = () => {
        clearTimeout(orientationTimeout);
        orientationTimeout = setTimeout(() => {
            setViewportHeight();
            
            // Force reflow to ensure proper rendering
            document.body.style.display = 'none';
            document.body.offsetHeight; // Trigger reflow
            document.body.style.display = '';
            
            // Update hero sections
            const heroSections = document.querySelectorAll('.hero-section, section[class*="hero"]');
            heroSections.forEach(section => {
                section.style.height = `${window.innerHeight}px`;
            });
        }, 150);
    };
    
    // Update on orientation change
    window.addEventListener('orientationchange', handleOrientationChange);
    
    // Update on resize with debounce
    let resizeTimeout;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(setViewportHeight, 100);
    });
    
    // Also listen for visual viewport changes (iOS Safari specific)
    if (window.visualViewport) {
        window.visualViewport.addEventListener('resize', setViewportHeight);
        window.visualViewport.addEventListener('scroll', setViewportHeight);
    }
    
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
    
    // Enhanced hero section height fix
    const heroSections = document.querySelectorAll('.hero-section, section[class*="hero"]');
    heroSections.forEach(section => {
        section.classList.add('ios-viewport-height', 'ios-hardware-acceleration');
        
        // Set height using JavaScript with proper calculation
        const setHeroHeight = () => {
            const windowHeight = window.innerHeight;
            const safeAreaTop = parseInt(getComputedStyle(document.documentElement)
                .getPropertyValue('--ios-safe-top') || '0', 10);
            const safeAreaBottom = parseInt(getComputedStyle(document.documentElement)
                .getPropertyValue('--ios-safe-bottom') || '0', 10);
            
            // Calculate actual available height
            const availableHeight = windowHeight - safeAreaTop - safeAreaBottom;
            section.style.height = `${windowHeight}px`;
            section.style.minHeight = `${availableHeight}px`;
        };
        
        setHeroHeight();
        
        // Enhanced resize handler
        let heroResizeTimeout;
        window.addEventListener('resize', () => {
            clearTimeout(heroResizeTimeout);
            heroResizeTimeout = setTimeout(setHeroHeight, 100);
        });
        
        // Enhanced orientation change handler
        window.addEventListener('orientationchange', () => {
            setTimeout(setHeroHeight, 200);
        });
        
        // Visual viewport handler for iOS
        if (window.visualViewport) {
            window.visualViewport.addEventListener('resize', setHeroHeight);
        }
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

// Enhanced iOS specific utility functions
window.iOSUtils = {
    isIOSSafari,
    getIOSVersion,
    isIPad,
    getIOSDeviceType,
    
    // Enhanced viewport height fix
    fixViewportHeight: () => {
        const vh = window.innerHeight * 0.01;
        document.documentElement.style.setProperty('--ios-vh', `${vh}px`);
        
        // Update safe area insets
        const safeAreaTop = getComputedStyle(document.documentElement)
            .getPropertyValue('--ios-safe-top') || '0px';
        const safeAreaBottom = getComputedStyle(document.documentElement)
            .getPropertyValue('--ios-safe-bottom') || '0px';
        
        document.documentElement.style.setProperty('--ios-safe-top', safeAreaTop);
        document.documentElement.style.setProperty('--ios-safe-bottom', safeAreaBottom);
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

// Enhanced application of fixes on DOM ready
document.addEventListener('DOMContentLoaded', () => {
    if (isIOSSafari()) {
        const deviceType = getIOSDeviceType();
        console.log('Applying iOS fixes for:', deviceType);
        
        // Apply all fixes
        window.iOSUtils.fixViewportHeight();
        window.iOSUtils.fixTouchTargets();
        window.iOSUtils.fixFormInputs();
        
        // Fix videos
        const videos = document.querySelectorAll('video');
        videos.forEach(video => {
            window.iOSUtils.fixVideoAutoplay(video);
        });
        
        // Add device-specific class to body
        document.body.classList.add(`ios-device-${deviceType}`);
        
        // Enhanced mobile menu fixes
        const mobileMenu = document.querySelector('.mobile-menu');
        const mobileMenuButton = document.querySelector('.mobile-menu-button');
        
        if (mobileMenu && mobileMenuButton) {
            // Ensure proper touch handling
            mobileMenuButton.addEventListener('touchstart', (e) => {
                e.preventDefault();
                mobileMenuButton.click();
            }, { passive: false });
            
            // Close menu when clicking outside
            document.addEventListener('touchstart', (e) => {
                if (!mobileMenu.contains(e.target) && 
                    !mobileMenuButton.contains(e.target) && 
                    !mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                }
            });
        }
        
        // Prevent pull-to-refresh on iOS
        let touchStartY = 0;
        document.addEventListener('touchstart', (e) => {
            touchStartY = e.touches[0].clientY;
        }, { passive: true });
        
        document.addEventListener('touchmove', (e) => {
            const touchY = e.touches[0].clientY;
            const scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
            
            // Prevent pull-to-refresh when at top of page
            if (scrollTop === 0 && touchY > touchStartY) {
                e.preventDefault();
            }
        }, { passive: false });
        
        console.log('iOS fixes applied successfully');
    }
});

// Export for use in other modules
export { isIOSSafari, getIOSVersion, isIPad, getIOSDeviceType };
