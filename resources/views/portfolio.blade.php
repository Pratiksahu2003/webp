@extends('layouts.website')

@section('title', 'Portfolio - Our Work at Vantroz Technology Private Limited')
@section('description', 'Explore our portfolio of successful projects including web applications, mobile apps, and custom software solutions developed by Vantroz Technology Private Limited.')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-indigo-600 via-purple-700 to-pink-800 text-white py-24 overflow-hidden">
    <!-- Background Video -->
    <video autoplay muted loop class="absolute inset-0 w-full h-full object-cover z-0">
        <source src="{{ asset('banner/common.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    
    <!-- Animated Background Elements -->
    <div class="absolute inset-0 z-5">
        <div class="absolute top-20 left-10 w-20 h-20 bg-white bg-opacity-10 rounded-full animate-pulse"></div>
        <div class="absolute top-40 right-20 w-16 h-16 bg-orange-400 bg-opacity-20 rounded-full animate-bounce"></div>
        <div class="absolute bottom-32 left-1/4 w-12 h-12 bg-purple-300 bg-opacity-15 rounded-full animate-ping"></div>
        <div class="absolute bottom-20 right-1/3 w-24 h-24 bg-blue-300 bg-opacity-10 rounded-full animate-pulse"></div>
        <div class="absolute top-1/2 left-1/2 w-32 h-32 bg-gradient-to-r from-purple-400/10 to-pink-400/10 rounded-full blur-3xl"></div>
    </div>
    
    <!-- Overlay -->
    <div class="absolute inset-0 bg-gradient-to-br from-indigo-900/70 via-purple-900/60 to-pink-900/70 z-10"></div>
    
    <!-- Content -->
    <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <div class="inline-flex items-center px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-sm font-medium mb-6 border border-white/20">
                <span class="w-2 h-2 bg-green-400 rounded-full mr-2 animate-pulse"></span>
                150+ Projects Delivered
            </div>
            <h1 class="text-5xl md:text-7xl font-bold mb-6 bg-gradient-to-r from-white via-purple-100 to-pink-100 bg-clip-text text-transparent">
                Our Portfolio
            </h1>
            <p class="text-xl md:text-2xl mb-8 max-w-4xl mx-auto text-orange-100 leading-relaxed">
                Showcasing our successful projects and innovative solutions that have transformed businesses worldwide
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="{{ route('contact') }}" class="group bg-gradient-to-r from-orange-500 to-red-500 text-white px-8 py-4 rounded-xl font-semibold hover:from-orange-600 hover:to-red-600 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                    <span class="flex items-center">
                        Start Your Project
                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </span>
                </a>
                <a href="#portfolio-grid" class="group bg-white/10 backdrop-blur-sm text-white px-8 py-4 rounded-xl font-semibold hover:bg-white/20 transition-all duration-300 border border-white/20">
                    View Our Work
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Portfolio Filter -->
<section class="py-12 bg-gradient-to-r from-gray-50 to-blue-50 border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-2">Filter by Category</h2>
            <p class="text-gray-600">Explore our diverse range of successful projects</p>
        </div>
        <div class="flex flex-wrap justify-center gap-4">
            <button class="portfolio-filter active group px-8 py-3 rounded-full bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105" data-filter="all">
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                    All Projects
                </span>
            </button>
            <button class="portfolio-filter group px-8 py-3 rounded-full bg-white text-gray-700 font-semibold hover:bg-gradient-to-r hover:from-green-500 hover:to-teal-500 hover:text-white transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg border border-gray-200" data-filter="web">
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9v-9m0-9v9"></path>
                    </svg>
                    Web Development
                </span>
            </button>
            <button class="portfolio-filter group px-8 py-3 rounded-full bg-white text-gray-700 font-semibold hover:bg-gradient-to-r hover:from-purple-500 hover:to-pink-500 hover:text-white transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg border border-gray-200" data-filter="mobile">
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a1 1 0 001-1V4a1 1 0 00-1-1H8a1 1 0 00-1 1v16a1 1 0 001 1z"></path>
                    </svg>
                    Mobile Apps
                </span>
            </button>
            <button class="portfolio-filter group px-8 py-3 rounded-full bg-white text-gray-700 font-semibold hover:bg-gradient-to-r hover:from-teal-500 hover:to-cyan-500 hover:text-white transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg border border-gray-200" data-filter="ai">
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                    AI & Data Science
                </span>
            </button>
            <button class="portfolio-filter group px-8 py-3 rounded-full bg-white text-gray-700 font-semibold hover:bg-gradient-to-r hover:from-orange-500 hover:to-red-500 hover:text-white transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg border border-gray-200" data-filter="ecommerce">
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                    E-commerce
                </span>
            </button>
        </div>
    </div>
</section>

<!-- Portfolio Grid -->
<section class="py-24 bg-gradient-to-br from-gray-50 to-blue-50 relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 1px 1px, rgba(99, 102, 241, 0.3) 1px, transparent 0); background-size: 20px 20px;"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="text-center mb-16">
            <div class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-orange-100 to-orange-100 rounded-full text-sm font-medium mb-6 text-orange-700">
                <span class="w-2 h-2 bg-indigo-500 rounded-full mr-2"></span>
                Our Success Stories
            </div>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                Featured <span class="bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">Projects</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                Discover how we've helped businesses transform their ideas into successful digital solutions.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="portfolio-grid">
            
            <!-- E-commerce Platform -->
            <div class="portfolio-item group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-100 hover:border-blue-200 transform hover:-translate-y-2" data-category="web ecommerce">
                <div class="relative h-56 bg-gradient-to-br from-blue-500 via-purple-600 to-pink-600 flex items-center justify-center overflow-hidden">
                    <!-- Animated Background Elements -->
                    <div class="absolute inset-0">
                        <div class="absolute top-4 left-4 w-8 h-8 bg-white/20 rounded-full animate-pulse"></div>
                        <div class="absolute bottom-4 right-4 w-6 h-6 bg-white/30 rounded-full animate-bounce"></div>
                        <div class="absolute top-1/2 left-1/2 w-12 h-12 bg-white/10 rounded-full blur-xl"></div>
                    </div>
                    
                    <div class="text-white text-center relative z-10 group-hover:scale-110 transition-transform duration-300">
                        <div class="w-20 h-20 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mx-auto mb-4 border border-white/30">
                            <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold">E-commerce Platform</h3>
                    </div>
                    
                    <!-- Success Badge -->
                    <div class="absolute top-4 right-4 bg-green-500 text-white px-3 py-1 rounded-full text-xs font-medium">
                        Live Project
                    </div>
                </div>
                
                <div class="p-8">
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-xl font-bold text-gray-900 group-hover:text-orange-600 transition-colors">Multi-Vendor E-commerce Platform</h3>
                        <div class="flex items-center text-yellow-500">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                            </svg>
                            <span class="text-sm text-gray-600 ml-1">4.9</span>
                        </div>
                    </div>
                    
                    <p class="text-gray-600 mb-6 leading-relaxed">A comprehensive e-commerce solution with vendor management, payment integration, advanced analytics, and real-time inventory tracking.</p>
                    
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="px-3 py-1 bg-gradient-to-r from-orange-100 to-orange-200 text-orange-800 rounded-full text-sm font-medium">Laravel</span>
                        <span class="px-3 py-1 bg-gradient-to-r from-green-100 to-green-200 text-green-800 rounded-full text-sm font-medium">Vue.js</span>
                        <span class="px-3 py-1 bg-gradient-to-r from-orange-100 to-orange-200 text-orange-800 rounded-full text-sm font-medium">MySQL</span>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <div class="text-sm text-gray-500">
                            <span class="font-medium">Duration:</span> 6 months
                        </div>
                        <a href="{{ route('contact') }}" class="group inline-flex items-center text-orange-600 font-semibold hover:text-orange-700 transition-colors">
                            View Details
                            <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Healthcare Management System -->
            <div class="portfolio-item bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow" data-category="web">
                <div class="h-48 bg-gradient-to-br from-green-500 to-teal-600 flex items-center justify-center">
                    <div class="text-white text-center">
                        <svg class="w-16 h-16 mx-auto mb-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L13.09 8.26L22 9L13.09 9.74L12 16L10.91 9.74L2 9L10.91 8.26L12 2Z"/>
                        </svg>
                        <h3 class="text-xl font-bold">Healthcare System</h3>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Hospital Management System</h3>
                    <p class="text-gray-600 mb-4">Complete hospital management solution with patient records, appointment scheduling, and billing.</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-2 py-1 bg-green-100 text-green-800 rounded text-sm">React</span>
                        <span class="px-2 py-1 bg-green-100 text-green-800 rounded text-sm">Node.js</span>
                        <span class="px-2 py-1 bg-green-100 text-green-800 rounded text-sm">MongoDB</span>
                    </div>
                    <a href="{{ route('contact') }}" class="text-green-600 font-semibold hover:text-green-700">View Details →</a>
                </div>
            </div>

            <!-- Mobile Banking App -->
            <div class="portfolio-item bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow" data-category="mobile">
                <div class="h-48 bg-gradient-to-br from-purple-500 to-pink-600 flex items-center justify-center">
                    <div class="text-white text-center">
                        <svg class="w-16 h-16 mx-auto mb-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 18H.01M8 21H8A1 1 0 007 20V4A1 1 0 018 3H8A1 1 0 019 4V20A1 1 0 008 21Z"/>
                        </svg>
                        <h3 class="text-xl font-bold">Banking App</h3>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Mobile Banking Application</h3>
                    <p class="text-gray-600 mb-4">Secure mobile banking app with biometric authentication and real-time transactions.</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-2 py-1 bg-orange-100 text-orange-800 rounded text-sm">React Native</span>
                        <span class="px-2 py-1 bg-orange-100 text-orange-800 rounded text-sm">Firebase</span>
                        <span class="px-2 py-1 bg-orange-100 text-orange-800 rounded text-sm">Blockchain</span>
                    </div>
                    <a href="{{ route('contact') }}" class="text-orange-600 font-semibold hover:text-orange-700">View Details →</a>
                </div>
            </div>

            <!-- AI Analytics Dashboard -->
            <div class="portfolio-item bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow" data-category="ai web">
                <div class="h-48 bg-gradient-to-br from-teal-500 to-cyan-600 flex items-center justify-center">
                    <div class="text-white text-center">
                        <svg class="w-16 h-16 mx-auto mb-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 17H7V10H9V17ZM13 17H11V7H13V17ZM17 17H15V13H17V17ZM19.5 19.1H4.5V5H19.5V19.1ZM19.5 3H4.5C3.4 3 2.5 3.9 2.5 5V19.1C2.5 20.2 3.4 21.1 4.5 21.1H19.5C20.6 21.1 21.5 20.2 21.5 19.1V5C21.5 3.9 20.6 3 19.5 3Z"/>
                        </svg>
                        <h3 class="text-xl font-bold">AI Analytics</h3>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">AI-Powered Analytics Dashboard</h3>
                    <p class="text-gray-600 mb-4">Advanced analytics platform with machine learning insights and predictive modeling.</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-2 py-1 bg-teal-100 text-teal-800 rounded text-sm">Python</span>
                        <span class="px-2 py-1 bg-teal-100 text-teal-800 rounded text-sm">TensorFlow</span>
                        <span class="px-2 py-1 bg-teal-100 text-teal-800 rounded text-sm">D3.js</span>
                    </div>
                    <a href="{{ route('contact') }}" class="text-teal-600 font-semibold hover:text-teal-700">View Details →</a>
                </div>
            </div>

            <!-- Food Delivery App -->
            <div class="portfolio-item bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow" data-category="mobile">
                <div class="h-48 bg-gradient-to-br from-orange-500 to-red-600 flex items-center justify-center">
                    <div class="text-white text-center">
                        <svg class="w-16 h-16 mx-auto mb-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18.06 22.99H1.94C1.28 22.99 0.74 22.45 0.74 21.8V2.2C0.74 1.55 1.28 1.01 1.94 1.01H18.06C18.72 1.01 19.26 1.55 19.26 2.2V21.8C19.26 22.45 18.72 22.99 18.06 22.99ZM1.94 2.2V21.8H18.06V2.2H1.94Z"/>
                        </svg>
                        <h3 class="text-xl font-bold">Food Delivery</h3>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Food Delivery Mobile App</h3>
                    <p class="text-gray-600 mb-4">Complete food delivery solution with real-time tracking and payment integration.</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-2 py-1 bg-orange-100 text-orange-800 rounded text-sm">Flutter</span>
                        <span class="px-2 py-1 bg-orange-100 text-orange-800 rounded text-sm">Firebase</span>
                        <span class="px-2 py-1 bg-orange-100 text-orange-800 rounded text-sm">Google Maps</span>
                    </div>
                    <a href="{{ route('contact') }}" class="text-orange-600 font-semibold hover:text-orange-700">View Details →</a>
                </div>
            </div>

            <!-- Real Estate Platform -->
            <div class="portfolio-item bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow" data-category="web">
                <div class="h-48 bg-gradient-to-br from-indigo-500 to-blue-600 flex items-center justify-center">
                    <div class="text-white text-center">
                        <svg class="w-16 h-16 mx-auto mb-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M10 20V14H14V20H19V12H22L12 3L2 12H5V20H10Z"/>
                        </svg>
                        <h3 class="text-xl font-bold">Real Estate</h3>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Real Estate Management Platform</h3>
                    <p class="text-gray-600 mb-4">Comprehensive property management system with virtual tours and CRM integration.</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-2 py-1 bg-orange-100 text-orange-800 rounded text-sm">Angular</span>
                        <span class="px-2 py-1 bg-orange-100 text-orange-800 rounded text-sm">ASP.NET</span>
                        <span class="px-2 py-1 bg-orange-100 text-orange-800 rounded text-sm">SQL Server</span>
                    </div>
                    <a href="{{ route('contact') }}" class="text-orange-600 font-semibold hover:text-orange-700">View Details →</a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Track Record</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Numbers that speak for our commitment to excellence.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold text-orange-600 mb-2">150+</div>
                <p class="text-gray-600 text-lg">Projects Completed</p>
            </div>

            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold text-green-600 mb-2">100+</div>
                <p class="text-gray-600 text-lg">Happy Clients</p>
            </div>

            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold text-orange-600 mb-2">25+</div>
                <p class="text-gray-600 text-lg">Years Experience</p>
            </div>

            <div class="text-center">
                <div class="text-4xl md:text-5xl font-bold text-orange-600 mb-2">50+</div>
                <p class="text-gray-600 text-lg">Team Members</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-blue-600">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Ready to Start Your Project?</h2>
        <p class="text-xl text-orange-100 mb-8 max-w-3xl mx-auto">
            Let's discuss your ideas and create something amazing together.
        </p>
        <a href="{{ route('contact') }}" class="bg-orange-500 text-white px-8 py-3 rounded-lg font-semibold hover:bg-orange-600 transition-colors">
            Get Started Today
        </a>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.portfolio-filter');
    const portfolioItems = document.querySelectorAll('.portfolio-item');

    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');
            
            // Update active button
            filterButtons.forEach(btn => {
                btn.classList.remove('active', 'bg-blue-600', 'text-white');
                btn.classList.add('bg-gray-200', 'text-gray-700');
            });
            this.classList.add('active', 'bg-blue-600', 'text-white');
            this.classList.remove('bg-gray-200', 'text-gray-700');
            
            // Filter items
            portfolioItems.forEach(item => {
                if (filter === 'all' || item.getAttribute('data-category').includes(filter)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
});
</script>
@endsection