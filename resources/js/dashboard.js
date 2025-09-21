/**
 * ZOHO-Style Dashboard JavaScript
 * Enhanced interactivity and animations
 */

// Dashboard initialization
document.addEventListener('DOMContentLoaded', function() {
    initializeDashboard();
});

/**
 * Initialize all dashboard components
 */
function initializeDashboard() {
    initializeCounters();
    initializeCharts();
    initializeActivityFeed();
    initializeTaskManagement();
    initializeSearchFunctionality();
    initializeNotifications();
    initializePerformanceMetrics();
    initializeKeyboardShortcuts();
}

/**
 * Animated counters for statistics
 */
function initializeCounters() {
    const counters = document.querySelectorAll('.zoho-metric');
    
    const observerOptions = {
        threshold: 0.5,
        rootMargin: '0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    counters.forEach(counter => {
        observer.observe(counter);
    });
}

/**
 * Animate individual counter
 */
function animateCounter(element) {
    const target = parseInt(element.textContent.replace(/[^0-9]/g, ''));
    const duration = 2000;
    const start = 0;
    const increment = target / (duration / 16);
    let current = start;
    
    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            element.textContent = formatNumber(target);
            clearInterval(timer);
        } else {
            element.textContent = formatNumber(Math.floor(current));
        }
    }, 16);
}

/**
 * Format numbers with commas
 */
function formatNumber(num) {
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
}

/**
 * Enhanced chart interactions
 */
function initializeCharts() {
    const chartBars = document.querySelectorAll('.chart-bar, [style*="height:"]');
    
    chartBars.forEach(bar => {
        // Add data attributes for tooltips
        const height = bar.style.height;
        const value = Math.floor(Math.random() * 50000) + 10000;
        bar.setAttribute('data-value', `$${formatNumber(value)}`);
        
        // Add hover effects
        bar.addEventListener('mouseenter', function() {
            this.style.filter = 'brightness(1.1) saturate(1.2)';
            this.style.transform = 'scaleY(1.05) translateY(-2px)';
        });
        
        bar.addEventListener('mouseleave', function() {
            this.style.filter = '';
            this.style.transform = '';
        });
        
        // Add click effects
        bar.addEventListener('click', function() {
            showChartDetails(value);
        });
    });
}

/**
 * Show detailed chart information
 */
function showChartDetails(value) {
    // Create modal or detailed view
    const modal = document.createElement('div');
    modal.className = 'fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50';
    modal.innerHTML = `
        <div class="bg-white rounded-xl p-6 max-w-md mx-4 transform scale-95 opacity-0 transition-all duration-300">
            <h3 class="text-lg font-bold text-gray-900 mb-4">Revenue Details</h3>
            <p class="text-gray-600 mb-4">Revenue for this period: <span class="font-bold text-blue-600">$${formatNumber(value)}</span></p>
            <div class="flex justify-end">
                <button class="zoho-btn zoho-btn-primary" onclick="this.closest('.fixed').remove()">Close</button>
            </div>
        </div>
    `;
    
    document.body.appendChild(modal);
    
    // Animate in
    setTimeout(() => {
        const content = modal.querySelector('div');
        content.style.transform = 'scale(1)';
        content.style.opacity = '1';
    }, 10);
    
    // Close on backdrop click
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            modal.remove();
        }
    });
}





/**
 * Task management functionality
 */
function initializeTaskManagement() {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const taskItem = this.closest('.flex');
            const taskText = taskItem.querySelector('p');
            
            if (this.checked) {
                taskItem.style.opacity = '0.6';
                taskText.style.textDecoration = 'line-through';
                showNotification('Task completed! 🎉', 'success');
            } else {
                taskItem.style.opacity = '1';
                taskText.style.textDecoration = 'none';
            }
            
            updateTaskProgress();
        });
    });
}

/**
 * Update task progress
 */
function updateTaskProgress() {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    const completed = Array.from(checkboxes).filter(cb => cb.checked).length;
    const total = checkboxes.length;
    const percentage = Math.round((completed / total) * 100);
    
    const progressBar = document.querySelector('.task-progress');
    if (progressBar) {
        progressBar.style.width = `${percentage}%`;
    }
}

/**
 * Enhanced search functionality
 */
function initializeSearchFunctionality() {
    const searchInput = document.querySelector('input[placeholder*="Search"]');
    if (!searchInput) return;
    
    let searchTimeout;
    
    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => {
            performSearch(this.value);
        }, 300);
    });
    
    searchInput.addEventListener('focus', function() {
        this.parentElement.style.transform = 'scale(1.02)';
        this.parentElement.style.boxShadow = '0 4px 20px rgba(44, 90, 160, 0.15)';
    });
    
    searchInput.addEventListener('blur', function() {
        this.parentElement.style.transform = '';
        this.parentElement.style.boxShadow = '';
    });
}

/**
 * Perform search with suggestions
 */
function performSearch(query) {
    if (query.length < 2) return;
    
    const suggestions = [
        'Create new page', 'Add blog post', 'Upload media', 'View analytics',
        'System settings', 'User management', 'Export data', 'Performance metrics'
    ];
    
    const matches = suggestions.filter(item => 
        item.toLowerCase().includes(query.toLowerCase())
    );
    
    showSearchSuggestions(matches);
}

/**
 * Show search suggestions
 */
function showSearchSuggestions(suggestions) {
    // Remove existing suggestions
    const existing = document.querySelector('.search-suggestions');
    if (existing) existing.remove();
    
    if (suggestions.length === 0) return;
    
    const searchContainer = document.querySelector('input[placeholder*="Search"]').parentElement;
    const suggestionsDiv = document.createElement('div');
    suggestionsDiv.className = 'search-suggestions absolute top-full left-0 right-0 bg-white border border-gray-200 rounded-lg shadow-lg mt-2 py-2 z-50';
    
    suggestions.forEach(suggestion => {
        const item = document.createElement('div');
        item.className = 'px-4 py-2 hover:bg-gray-50 cursor-pointer text-sm text-gray-700';
        item.textContent = suggestion;
        item.addEventListener('click', () => {
            showNotification(`Searching for: ${suggestion}`, 'info');
            suggestionsDiv.remove();
        });
        suggestionsDiv.appendChild(item);
    });
    
    searchContainer.style.position = 'relative';
    searchContainer.appendChild(suggestionsDiv);
}

/**
 * Notification system
 */
function initializeNotifications() {
    // Create notification container
    const container = document.createElement('div');
    container.id = 'notification-container';
    container.className = 'fixed top-4 right-4 space-y-2 z-50';
    document.body.appendChild(container);
}

/**
 * Show notification
 */
function showNotification(message, type = 'info', duration = 5000) {
    const container = document.getElementById('notification-container');
    const notification = document.createElement('div');
    
    const colors = {
        success: 'bg-green-500 text-white',
        error: 'bg-red-500 text-white',
        warning: 'bg-yellow-500 text-black',
        info: 'bg-blue-500 text-white'
    };
    
    notification.className = `${colors[type]} px-4 py-3 rounded-lg shadow-lg transform translate-x-full transition-transform duration-300 max-w-sm`;
    notification.innerHTML = `
        <div class="flex items-center justify-between">
            <span class="text-sm font-medium">${message}</span>
            <button class="ml-4 text-current opacity-70 hover:opacity-100" onclick="this.parentElement.parentElement.remove()">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    `;
    
    container.appendChild(notification);
    
    // Animate in
    setTimeout(() => {
        notification.style.transform = 'translateX(0)';
    }, 100);
    
    // Auto remove
    setTimeout(() => {
        notification.style.transform = 'translateX(full)';
        setTimeout(() => {
            if (notification.parentElement) {
                notification.remove();
            }
        }, 300);
    }, duration);
}

/**
 * Performance metrics animation
 */
function initializePerformanceMetrics() {
    const circles = document.querySelectorAll('.performance-circle svg path[stroke-dasharray]');
    
    circles.forEach(circle => {
        const dashArray = circle.getAttribute('stroke-dasharray');
        const [filled] = dashArray.split(',').map(Number);
        
        // Start from 0 and animate to actual value
        circle.setAttribute('stroke-dasharray', '0, 100');
        
        setTimeout(() => {
            circle.style.transition = 'stroke-dasharray 1.5s ease-in-out';
            circle.setAttribute('stroke-dasharray', dashArray);
        }, 500);
    });
}

/**
 * Keyboard shortcuts
 */
function initializeKeyboardShortcuts() {
    document.addEventListener('keydown', function(e) {
        // Ctrl/Cmd + K for search
        if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
            e.preventDefault();
            const searchInput = document.querySelector('input[placeholder*="Search"]');
            if (searchInput) {
                searchInput.focus();
                showNotification('Search focused (Ctrl+K)', 'info', 2000);
            }
        }
        
        // Ctrl/Cmd + N for new content
        if ((e.ctrlKey || e.metaKey) && e.key === 'n') {
            e.preventDefault();
            showNotification('Quick actions: Ctrl+N', 'info', 2000);
        }
        
        // Esc to close modals
        if (e.key === 'Escape') {
            const modals = document.querySelectorAll('.fixed.inset-0');
            modals.forEach(modal => modal.remove());
        }
    });
}

/**
 * Utility function to debounce events
 */
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

/**
 * Theme switching (for future enhancement)
 */
function switchTheme(theme) {
    document.documentElement.setAttribute('data-theme', theme);
    localStorage.setItem('dashboard-theme', theme);
    showNotification(`Switched to ${theme} theme`, 'success');
}

/**
 * Export dashboard data
 */
function exportDashboardData() {
    const data = {
        timestamp: new Date().toISOString(),
        metrics: {
            pages: 24,
            services: 18,
            blogPosts: 42,
            clients: 156
        },
        performance: {
            speed: 92,
            seo: 78,
            security: 96
        }
    };
    
    const blob = new Blob([JSON.stringify(data, null, 2)], { type: 'application/json' });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = `dashboard-data-${new Date().toISOString().split('T')[0]}.json`;
    a.click();
    URL.revokeObjectURL(url);
    
    showNotification('Dashboard data exported successfully!', 'success');
}

// Make functions globally accessible
window.showNotification = showNotification;
window.exportDashboardData = exportDashboardData;
window.switchTheme = switchTheme;
