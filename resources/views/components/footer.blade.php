<footer class="bg-gradient-to-br from-gray-900 via-gray-800 to-black relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 1px 1px, rgba(255, 107, 53, 0.3) 1px, transparent 0); background-size: 20px 20px;"></div>
    </div>
    
    <!-- Gradient Bar -->
    <div class="h-1 bg-gradient-to-r from-orange-500 via-orange-600 to-orange-700"></div>
    
    <!-- Main Content Area -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 relative z-10">
        
        <!-- Top Section: Company Branding -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 mb-16">
            <!-- Company Info -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Logo and Company Name -->
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center">
                        <span class="text-white font-bold text-xl">V</span>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-white">{{ config('company.name') }}</h2>
                        <p class="text-orange-400 text-sm font-medium">Software Development Company</p>
                    </div>
                </div>
                
                <!-- Company Description -->
                <div class="max-w-2xl">
                    <p class="text-gray-300 leading-relaxed">
                        {{ config('company.name') }} is your trusted IT partner driving business growth. We specialize in custom software development, 
                        web applications, mobile apps, and digital transformation solutions. With 24+ years of experience and 3500+ successful projects, 
                        we deliver exceptional results that scale with your business.
                    </p>
                </div>
                
                <!-- Key Stats -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-orange-500">24+</div>
                        <div class="text-gray-400 text-sm">Years Experience</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-orange-500">3500+</div>
                        <div class="text-gray-400 text-sm">Projects Delivered</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-orange-500">250+</div>
                        <div class="text-gray-400 text-sm">Expert Developers</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-orange-500">98%</div>
                        <div class="text-gray-400 text-sm">Client Satisfaction</div>
                    </div>
                </div>
            </div>
            
            <!-- Newsletter Subscription -->
            <div class="space-y-6">
                <div>
                    <h3 class="text-xl font-bold text-white mb-3">Stay Updated</h3>
                    <p class="text-gray-300 text-sm mb-4">Get the latest insights on software development, technology trends, and industry updates.</p>
                </div>
                
                <form class="space-y-3">
                    <div>
                        <input type="email" placeholder="Enter your email address" 
                               class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-400 focus:border-orange-500 focus:ring-1 focus:ring-orange-500 transition-colors">
                    </div>
                    <button type="submit" 
                            class="w-full bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold py-3 rounded-lg hover:from-orange-600 hover:to-orange-700 transition-all duration-300 transform hover:scale-105">
                        Subscribe Now
                    </button>
                </form>
                
                <div class="text-xs text-gray-400">
                    <p>We respect your privacy. Unsubscribe at any time.</p>
                </div>
            </div>
        </div>
        
        <!-- Main Footer Content -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8 mb-12">
            
            <!-- Services -->
            <div class="space-y-4">
                <h3 class="text-lg font-bold text-white">Services</h3>
                <div class="space-y-2">
                    <a href="{{ route('services.custom-software') }}" class="block text-gray-300 hover:text-orange-400 transition-colors text-sm">Custom Software Development</a>
                    <a href="{{ route('services.web-development') }}" class="block text-gray-300 hover:text-orange-400 transition-colors text-sm">Web Development</a>
                    <a href="{{ route('services.mobile-development') }}" class="block text-gray-300 hover:text-orange-400 transition-colors text-sm">Mobile App Development</a>
                    <a href="{{ route('services.data-science') }}" class="block text-gray-300 hover:text-orange-400 transition-colors text-sm">Data Science & AI</a>
                    <a href="{{ route('services.qa-testing') }}" class="block text-gray-300 hover:text-orange-400 transition-colors text-sm">QA & Testing</a>
                    <a href="{{ route('services.ui-ux-design') }}" class="block text-gray-300 hover:text-orange-400 transition-colors text-sm">UX/UI Design</a>
                </div>
                </div>
                
            <!-- Solutions -->
            <div class="space-y-4">
                <h3 class="text-lg font-bold text-white">Solutions</h3>
                <div class="space-y-2">
                    <a href="{{ route('industries.healthcare') }}" class="block text-gray-300 hover:text-orange-400 transition-colors text-sm">Healthcare Solutions</a>
                    <a href="{{ route('industries.fintech') }}" class="block text-gray-300 hover:text-orange-400 transition-colors text-sm">FinTech Solutions</a>
                    <a href="{{ route('industries.ecommerce') }}" class="block text-gray-300 hover:text-orange-400 transition-colors text-sm">eCommerce Platforms</a>
                    <a href="{{ route('industries.logistics') }}" class="block text-gray-300 hover:text-orange-400 transition-colors text-sm">Logistics Software</a>
                    <a href="#" class="block text-gray-300 hover:text-orange-400 transition-colors text-sm">Enterprise Software</a>
                    <a href="#" class="block text-gray-300 hover:text-orange-400 transition-colors text-sm">Cloud Solutions</a>
                </div>
            </div>
            
            <!-- Company -->
            <div class="space-y-4">
                <h3 class="text-lg font-bold text-white">Company</h3>
            <div class="space-y-2">
                    <a href="{{ route('about') }}" class="block text-gray-300 hover:text-orange-400 transition-colors text-sm">About Us</a>
                    <a href="{{ route('case-studies') }}" class="block text-gray-300 hover:text-orange-400 transition-colors text-sm">Case Studies</a>
                    <a href="{{ route('blog.index') }}" class="block text-gray-300 hover:text-orange-400 transition-colors text-sm">Blog & Insights</a>
                    <a href="{{ route('careers') }}" class="block text-gray-300 hover:text-orange-400 transition-colors text-sm">Careers</a>
                    <a href="{{ route('contact') }}" class="block text-gray-300 hover:text-orange-400 transition-colors text-sm">Contact Us</a>
                    <a href="{{ route('portfolio') }}" class="block text-gray-300 hover:text-orange-400 transition-colors text-sm">Portfolio</a>
                </div>
            </div>
            
            <!-- Contact Information -->
            <div class="space-y-4">
                <h3 class="text-lg font-bold text-white">Contact Info</h3>
                <div class="space-y-3">
                    <div class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-orange-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <div class="text-gray-300 text-sm">
                            <p>{{ config('company.address.primary.street') }}</p>
                            <p>{{ config('company.address.primary.city') }}, {{ config('company.address.primary.state') }}</p>
                            <p>{{ config('company.address.primary.country') }} {{ config('company.address.primary.zip') }}</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-3">
                        <svg class="w-5 h-5 text-orange-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <a href="tel:{{ config('company.contact.phone') }}" class="text-gray-300 hover:text-orange-400 transition-colors text-sm">
                            {{ config('company.contact.phone') }}
                    </a>
                </div>
                
                    <div class="flex items-center space-x-3">
                        <svg class="w-5 h-5 text-orange-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <a href="mailto:{{ config('company.contact.email') }}" class="text-gray-300 hover:text-orange-400 transition-colors text-sm">
                            {{ config('company.contact.email') }}
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Social Media & Follow Us -->
            <div class="space-y-4">
                <h3 class="text-lg font-bold text-white">Follow Us</h3>
                <div class="space-y-3">
                    <div class="flex space-x-3">
                        <a href="{{ config('company.social.linkedin') }}" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-orange-500 transition-colors group">
                            <svg class="w-5 h-5 text-gray-300 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </a>
                        <a href="{{ config('company.social.twitter') }}" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-orange-500 transition-colors group">
                            <svg class="w-5 h-5 text-gray-300 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </a>
                        <a href="{{ config('company.social.facebook') }}" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-orange-500 transition-colors group">
                            <svg class="w-5 h-5 text-gray-300 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="{{ config('company.social.instagram') }}" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-orange-500 transition-colors group">
                            <svg class="w-5 h-5 text-gray-300 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                    </div>
                    
                    <div class="text-gray-300 text-sm">
                        <p>Follow us for updates on:</p>
                        <ul class="mt-2 space-y-1 text-xs">
                            <li>• Latest technology trends</li>
                            <li>• Project showcases</li>
                            <li>• Industry insights</li>
                            <li>• Company news</li>
                        </ul>
                    </div>
                </div>
            </div>
                </div>
                
        <!-- Certifications & Awards -->
        <div class="border-t border-gray-700 pt-8 mb-8">
            <div class="text-center mb-6">
                <h3 class="text-lg font-bold text-white mb-4">Certifications & Awards</h3>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
                <div class="text-center">
                    <div class="w-16 h-16 bg-gray-800 rounded-lg flex items-center justify-center mx-auto mb-2">
                        <span class="text-orange-400 font-bold text-xs">ISO 27001</span>
                    </div>
                    <p class="text-gray-400 text-xs">Information Security</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-gray-800 rounded-lg flex items-center justify-center mx-auto mb-2">
                        <span class="text-orange-400 font-bold text-xs">AWS</span>
                    </div>
                    <p class="text-gray-400 text-xs">Cloud Partner</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-gray-800 rounded-lg flex items-center justify-center mx-auto mb-2">
                        <span class="text-orange-400 font-bold text-xs">Microsoft</span>
                    </div>
                    <p class="text-gray-400 text-xs">Gold Partner</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-gray-800 rounded-lg flex items-center justify-center mx-auto mb-2">
                        <span class="text-orange-400 font-bold text-xs">Inc 5000</span>
                    </div>
                    <p class="text-gray-400 text-xs">2024 Winner</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-gray-800 rounded-lg flex items-center justify-center mx-auto mb-2">
                        <span class="text-orange-400 font-bold text-xs">Forbes</span>
                    </div>
                    <p class="text-gray-400 text-xs">Council Member</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-gray-800 rounded-lg flex items-center justify-center mx-auto mb-2">
                        <span class="text-orange-400 font-bold text-xs">Clutch</span>
                    </div>
                    <p class="text-gray-400 text-xs">Top Developer</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bottom Bar -->
    <div class="border-t border-gray-700 bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex flex-col lg:flex-row justify-between items-center space-y-4 lg:space-y-0">
                
                <!-- Left: Copyright -->
                <div class="text-center lg:text-left">
                    <p class="text-gray-400 text-sm">
                        © {{ date('Y') }} {{ config('company.name') }}. All rights reserved.
                    </p>
                    <p class="text-gray-500 text-xs mt-1">
                        Proudly serving clients worldwide since 2000
                    </p>
                </div>
                
                <!-- Middle: Quick Actions -->
                <div class="flex items-center space-x-6">
                    <button onclick="scrollToTop()" class="flex items-center space-x-2 text-gray-400 hover:text-orange-400 transition-colors group">
                        <svg class="w-4 h-4 group-hover:-translate-y-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
                        </svg>
                        <span class="text-sm font-medium">Back to Top</span>
                    </button>
                    
                    <a href="{{ route('contact') }}" class="flex items-center space-x-2 text-gray-400 hover:text-orange-400 transition-colors group">
                        <svg class="w-4 h-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                        <span class="text-sm font-medium">Get Quote</span>
                    </a>
                </div>
                
                <!-- Right: Legal Links -->
                <div class="flex flex-wrap justify-center lg:justify-end space-x-6 text-sm">
                    <a href="{{ route('privacy-policy') }}" target="_blank" class="text-gray-400 hover:text-orange-400 transition-colors">Privacy Policy</a>
                    <a href="{{ route('terms-conditions') }}" target="_blank" class="text-gray-400 hover:text-orange-400 transition-colors">Terms & Conditions</a>
                    <a href="{{ route('legal.cookie-policy') }}" target="_blank" class="text-gray-400 hover:text-orange-400 transition-colors">Cookie Policy</a>
                    <a href="{{ route('sitemap') }}" target="_blank" class="text-gray-400 hover:text-orange-400 transition-colors">Sitemap</a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Floating Chat Icon -->
    <div class="fixed bottom-6 right-6 z-50">
        <button onclick="openWhatsApp()" class="group relative w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-full flex items-center justify-center shadow-2xl hover:shadow-orange-500/25 transition-all duration-300 transform hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-br from-orange-600 to-orange-700 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            <svg class="w-7 h-7 text-white relative group-hover:scale-110 transition-transform duration-300" fill="currentColor" viewBox="0 0 24 24">
                <path d="M20 2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h4l4 4 4-4h4c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2 12H6v-2h12v2zm0-3H6V9h12v2zm0-3H6V6h12v2z"/>
            </svg>
            
            <!-- Notification Badge -->
            <div class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 rounded-full flex items-center justify-center">
                <span class="text-white text-xs font-bold">1</span>
            </div>
        </button>
        
        <!-- Chat Tooltip -->
        <div class="absolute bottom-20 right-0 bg-gray-900 text-white px-4 py-2 rounded-lg shadow-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">
            <span class="text-sm">Chat with us on WhatsApp!</span>
            <div class="absolute bottom-0 right-4 w-0 h-0 border-l-4 border-r-4 border-t-4 border-transparent border-t-gray-900"></div>
        </div>
    </div>
</footer>

<script>
function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

function openWhatsApp() {
    // Get phone number from config and format it for WhatsApp
    const phoneNumber = '{{ config("company.contact.phone") }}';
    // Remove any non-numeric characters (spaces, dashes, etc.)
    const cleanPhone = phoneNumber.replace(/\D/g, '');
    
    // Default message for WhatsApp
    const message = encodeURIComponent('Hello! I would like to get in touch with {{ config("company.name") }}. I found your website and I\'m interested in your services.');
    
    // Create WhatsApp URL
    const whatsappUrl = `https://wa.me/${cleanPhone}?text=${message}`;
    
    // Open WhatsApp in new tab
    window.open(whatsappUrl, '_blank');
}

// Newsletter subscription
document.addEventListener('DOMContentLoaded', function() {
    const newsletterForm = document.querySelector('form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const email = this.querySelector('input[type="email"]').value;
            if (email) {
                // Add your newsletter subscription logic here
                alert('Thank you for subscribing! We\'ll keep you updated.');
                this.querySelector('input[type="email"]').value = '';
            }
        });
    }
});
</script>