@extends('layouts.website')

@section('title', 'Case Studies - VanTroZ')
@section('description', 'Explore our successful projects and see how we help businesses achieve their goals.')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-orange-500 to-orange-600 text-white py-20 overflow-hidden">
    <!-- Background Video -->
    <video autoplay muted loop class="absolute inset-0 w-full h-full object-cover z-0">
        <source src="{{ asset('banner/common.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    
    <!-- Overlay -->
    <div class="absolute inset-0 bg-orange-900 bg-opacity-60 z-10"></div>
    
    <!-- Content -->
    <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">Case Studies</h1>
            <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto">
                Discover how we've helped businesses achieve their goals
            </p>
        </div>
    </div>
</section>

<!-- Filter Section -->
<section class="py-8 bg-white border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap justify-center gap-4">
            <button class="filter-btn active bg-orange-500 text-white px-6 py-3 rounded-full text-sm font-semibold transition-all duration-300 hover:bg-orange-600" data-filter="all">
                All cases
            </button>
            <button class="filter-btn bg-gray-200 text-gray-700 px-6 py-3 rounded-full text-sm font-medium hover:bg-gray-300 transition-all duration-300" data-filter="qa-testing">
                QA & Software Testing
            </button>
            <button class="filter-btn bg-gray-200 text-gray-700 px-6 py-3 rounded-full text-sm font-medium hover:bg-gray-300 transition-all duration-300" data-filter="web-mobile">
                Web & Mobile Development
            </button>
            <button class="filter-btn bg-gray-200 text-gray-700 px-6 py-3 rounded-full text-sm font-medium hover:bg-gray-300 transition-all duration-300" data-filter="custom-software">
                Custom Software
            </button>
            <button class="filter-btn bg-gray-200 text-gray-700 px-6 py-3 rounded-full text-sm font-medium hover:bg-gray-300 transition-all duration-300" data-filter="ai-genai">
                AI/GenAI
            </button>
            <button class="filter-btn bg-gray-200 text-gray-700 px-6 py-3 rounded-full text-sm font-medium hover:bg-gray-300 transition-all duration-300" data-filter="product-design">
                Product design
            </button>
            <button class="filter-btn bg-gray-200 text-gray-700 px-6 py-3 rounded-full text-sm font-medium hover:bg-gray-300 transition-all duration-300" data-filter="ui-ux-design">
                UX/UI Design
            </button>
        </div>
    </div>
</section>

<!-- Case Studies Grid -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Sample Case Study 1: eCommerce -->
            <div class="case-study-item bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-300" data-category="web-mobile">
                <div class="p-8">
                    <div class="flex items-center mb-4">
                        <span class="bg-orange-100 text-orange-800 text-xs font-semibold px-3 py-1 rounded-full">eCommerce</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4 leading-tight">
                        KSD: new eCommerce platform for the largest Ukrainian bookstore
                    </h3>
                    
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center">
                            <span class="text-2xl font-bold text-orange-500 mr-2">50 thousand</span>
                            <span class="text-sm text-gray-600">iOS app downloads in 3 months</span>
                        </div>
                        <div class="flex items-center">
                            <span class="text-2xl font-bold text-orange-500 mr-2">40+</span>
                            <span class="text-sm text-gray-600">physical KSD bookstores full synced with online sales</span>
                        </div>
                    </div>
                    
                    <div class="flex flex-wrap gap-2">
                        <span class="bg-gray-100 text-gray-700 text-xs px-3 py-1 rounded-full">Custom Software</span>
                        <span class="bg-gray-100 text-gray-700 text-xs px-3 py-1 rounded-full">Web & Mobile Development</span>
                    </div>
                </div>
            </div>

            <!-- Sample Case Study 2: Manufacturing AI -->
            <div class="case-study-item bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-300" data-category="ai-genai">
                <div class="p-8">
                    <div class="flex items-center mb-4">
                        <span class="bg-orange-100 text-orange-800 text-xs font-semibold px-3 py-1 rounded-full">Manufacturing</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4 leading-tight">
                        Aerolntel AI: Analytical software solution for UAV operators
                    </h3>
                    
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center">
                            <span class="text-2xl font-bold text-orange-500 mr-2">0.3 s/image</span>
                            <span class="text-sm text-gray-600">inference speed</span>
                        </div>
                        <div class="flex items-center">
                            <span class="text-2xl font-bold text-orange-500 mr-2">90%</span>
                            <span class="text-sm text-gray-600">automation analyst effort reduced through AI</span>
                        </div>
                        <div class="flex items-center">
                            <span class="text-2xl font-bold text-orange-500 mr-2">Full adaptation</span>
                            <span class="text-sm text-gray-600">of the model to new datasets</span>
                        </div>
                    </div>
                    
                    <div class="flex flex-wrap gap-2">
                        <span class="bg-gray-100 text-gray-700 text-xs px-3 py-1 rounded-full">AI/GenAI</span>
                    </div>
                </div>
            </div>

            <!-- Sample Case Study 3: FinTech -->
            <div class="case-study-item bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-300" data-category="custom-software">
                <div class="p-8">
                    <div class="flex items-center mb-4">
                        <span class="bg-orange-100 text-orange-800 text-xs font-semibold px-3 py-1 rounded-full">FinTech</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4 leading-tight">
                        SecurePay: Next-generation payment processing platform
                    </h3>
                    
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center">
                            <span class="text-2xl font-bold text-orange-500 mr-2">99.9%</span>
                            <span class="text-sm text-gray-600">uptime achieved</span>
                        </div>
                        <div class="flex items-center">
                            <span class="text-2xl font-bold text-orange-500 mr-2">2M+</span>
                            <span class="text-sm text-gray-600">transactions processed daily</span>
                        </div>
                        <div class="flex items-center">
                            <span class="text-2xl font-bold text-orange-500 mr-2">50ms</span>
                            <span class="text-sm text-gray-600">average processing time</span>
                        </div>
                    </div>
                    
                    <div class="flex flex-wrap gap-2">
                        <span class="bg-gray-100 text-gray-700 text-xs px-3 py-1 rounded-full">Custom Software</span>
                        <span class="bg-gray-100 text-gray-700 text-xs px-3 py-1 rounded-full">QA & Software Testing</span>
                    </div>
                </div>
            </div>

            <!-- Sample Case Study 4: Healthcare -->
            <div class="case-study-item bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-300" data-category="web-mobile">
                <div class="p-8">
                    <div class="flex items-center mb-4">
                        <span class="bg-orange-100 text-orange-800 text-xs font-semibold px-3 py-1 rounded-full">Healthcare</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4 leading-tight">
                        MedConnect: Telemedicine platform for remote patient care
                    </h3>
                    
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center">
                            <span class="text-2xl font-bold text-orange-500 mr-2">15K+</span>
                            <span class="text-sm text-gray-600">patients served monthly</span>
                        </div>
                        <div class="flex items-center">
                            <span class="text-2xl font-bold text-orange-500 mr-2">95%</span>
                            <span class="text-sm text-gray-600">patient satisfaction rate</span>
                        </div>
                        <div class="flex items-center">
                            <span class="text-2xl font-bold text-orange-500 mr-2">24/7</span>
                            <span class="text-sm text-gray-600">availability</span>
                        </div>
                    </div>
                    
                    <div class="flex flex-wrap gap-2">
                        <span class="bg-gray-100 text-gray-700 text-xs px-3 py-1 rounded-full">Web & Mobile Development</span>
                        <span class="bg-gray-100 text-gray-700 text-xs px-3 py-1 rounded-full">UX/UI Design</span>
                    </div>
                </div>
            </div>

            <!-- Sample Case Study 5: Logistics -->
            <div class="case-study-item bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-300" data-category="custom-software">
                <div class="p-8">
                    <div class="flex items-center mb-4">
                        <span class="bg-orange-100 text-orange-800 text-xs font-semibold px-3 py-1 rounded-full">Logistics</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4 leading-tight">
                        LogiFlow: Smart warehouse management system
                    </h3>
                    
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center">
                            <span class="text-2xl font-bold text-orange-500 mr-2">40%</span>
                            <span class="text-sm text-gray-600">reduction in operational costs</span>
                        </div>
                        <div class="flex items-center">
                            <span class="text-2xl font-bold text-orange-500 mr-2">60%</span>
                            <span class="text-sm text-gray-600">faster order processing</span>
                        </div>
                        <div class="flex items-center">
                            <span class="text-2xl font-bold text-orange-500 mr-2">100%</span>
                            <span class="text-sm text-gray-600">inventory accuracy</span>
                        </div>
                    </div>
                    
                    <div class="flex flex-wrap gap-2">
                        <span class="bg-gray-100 text-gray-700 text-xs px-3 py-1 rounded-full">Custom Software</span>
                        <span class="bg-gray-100 text-gray-700 text-xs px-3 py-1 rounded-full">AI/GenAI</span>
                    </div>
                </div>
            </div>

            <!-- Sample Case Study 6: Product Design -->
            <div class="case-study-item bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-300" data-category="product-design">
                <div class="p-8">
                    <div class="flex items-center mb-4">
                        <span class="bg-orange-100 text-orange-800 text-xs font-semibold px-3 py-1 rounded-full">Product Design</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4 leading-tight">
                        EcoTrack: Sustainable product lifecycle management
                    </h3>
                    
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center">
                            <span class="text-2xl font-bold text-orange-500 mr-2">500+</span>
                            <span class="text-sm text-gray-600">products tracked</span>
                        </div>
                        <div class="flex items-center">
                            <span class="text-2xl font-bold text-orange-500 mr-2">30%</span>
                            <span class="text-sm text-gray-600">carbon footprint reduction</span>
                        </div>
                        <div class="flex items-center">
                            <span class="text-2xl font-bold text-orange-500 mr-2">85%</span>
                            <span class="text-sm text-gray-600">user adoption rate</span>
                        </div>
                    </div>
                    
                    <div class="flex flex-wrap gap-2">
                        <span class="bg-gray-100 text-gray-700 text-xs px-3 py-1 rounded-full">Product design</span>
                        <span class="bg-gray-100 text-gray-700 text-xs px-3 py-1 rounded-full">UX/UI Design</span>
                    </div>
                </div>
            </div>

            <!-- Sample Case Study 7: QA Testing -->
            <div class="case-study-item bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-300" data-category="qa-testing">
                <div class="p-8">
                    <div class="flex items-center mb-4">
                        <span class="bg-orange-100 text-orange-800 text-xs font-semibold px-3 py-1 rounded-full">QA Testing</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4 leading-tight">
                        TestMaster: Automated testing platform for enterprise applications
                    </h3>
                    
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center">
                            <span class="text-2xl font-bold text-orange-500 mr-2">95%</span>
                            <span class="text-sm text-gray-600">test coverage achieved</span>
                        </div>
                        <div class="flex items-center">
                            <span class="text-2xl font-bold text-orange-500 mr-2">70%</span>
                            <span class="text-sm text-gray-600">reduction in testing time</span>
                        </div>
                        <div class="flex items-center">
                            <span class="text-2xl font-bold text-orange-500 mr-2">99.5%</span>
                            <span class="text-sm text-gray-600">bug detection accuracy</span>
                        </div>
                    </div>
                    
                    <div class="flex flex-wrap gap-2">
                        <span class="bg-gray-100 text-gray-700 text-xs px-3 py-1 rounded-full">QA & Software Testing</span>
                        <span class="bg-gray-100 text-gray-700 text-xs px-3 py-1 rounded-full">Custom Software</span>
                    </div>
                </div>
            </div>

            <!-- Sample Case Study 8: UX/UI Design -->
            <div class="case-study-item bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-300" data-category="ui-ux-design">
                <div class="p-8">
                    <div class="flex items-center mb-4">
                        <span class="bg-orange-100 text-orange-800 text-xs font-semibold px-3 py-1 rounded-full">UX/UI Design</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4 leading-tight">
                        DesignFlow: User experience optimization for mobile banking app
                    </h3>
                    
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center">
                            <span class="text-2xl font-bold text-orange-500 mr-2">45%</span>
                            <span class="text-sm text-gray-600">increase in user engagement</span>
                        </div>
                        <div class="flex items-center">
                            <span class="text-2xl font-bold text-orange-500 mr-2">60%</span>
                            <span class="text-sm text-gray-600">faster task completion</span>
                        </div>
                        <div class="flex items-center">
                            <span class="text-2xl font-bold text-orange-500 mr-2">4.8/5</span>
                            <span class="text-sm text-gray-600">user satisfaction rating</span>
                        </div>
                    </div>
                    
                    <div class="flex flex-wrap gap-2">
                        <span class="bg-gray-100 text-gray-700 text-xs px-3 py-1 rounded-full">UX/UI Design</span>
                        <span class="bg-gray-100 text-gray-700 text-xs px-3 py-1 rounded-full">Product design</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Success Metrics -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Success Metrics</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Numbers that speak for our commitment to excellence
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
            <div class="bg-white rounded-lg p-8 shadow-md">
                <div class="text-4xl font-bold text-orange-500 mb-2">3500+</div>
                <div class="text-gray-600">Projects Completed</div>
            </div>
            <div class="bg-white rounded-lg p-8 shadow-md">
                <div class="text-4xl font-bold text-orange-500 mb-2">250+</div>
                <div class="text-gray-600">Satisfied Clients</div>
            </div>
            <div class="bg-white rounded-lg p-8 shadow-md">
                <div class="text-4xl font-bold text-orange-500 mb-2">24+</div>
                <div class="text-gray-600">Years Experience</div>
            </div>
            <div class="bg-white rounded-lg p-8 shadow-md">
                <div class="text-4xl font-bold text-orange-500 mb-2">275+</div>
                <div class="text-gray-600">Team Members</div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-orange-500 to-orange-600 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Create Your Success Story?</h2>
        <p class="text-xl mb-8 max-w-3xl mx-auto">
            Let's discuss your project and see how we can help you achieve similar results
        </p>
        <a href="{{ route('contact') }}" class="bg-yellow-400 text-gray-900 px-8 py-3 rounded-lg font-semibold hover:bg-yellow-300 transition-colors">
            Start Your Project
        </a>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const caseStudyItems = document.querySelectorAll('.case-study-item');
    
    console.log('Filter buttons found:', filterButtons.length);
    console.log('Case study items found:', caseStudyItems.length);
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            const filter = this.getAttribute('data-filter');
            console.log('Filter clicked:', filter);
            
            // Update active button
            filterButtons.forEach(btn => {
                btn.classList.remove('active', 'bg-orange-500', 'text-white');
                btn.classList.add('bg-gray-200', 'text-gray-700');
            });
            
            this.classList.remove('bg-gray-200', 'text-gray-700');
            this.classList.add('active', 'bg-orange-500', 'text-white');
            
            // Filter case studies
            caseStudyItems.forEach(item => {
                const category = item.getAttribute('data-category');
                console.log('Item category:', category, 'Filter:', filter);
                
                if (filter === 'all' || category === filter) {
                    item.style.display = 'block';
                    item.style.opacity = '1';
                    console.log('Showing item:', item);
                } else {
                    item.style.display = 'none';
                    item.style.opacity = '0';
                    console.log('Hiding item:', item);
                }
            });
        });
    });
    
    // Add hover effects for filter buttons
    filterButtons.forEach(button => {
        button.addEventListener('mouseenter', function() {
            if (!this.classList.contains('active')) {
                this.style.transform = 'scale(1.05)';
                this.style.transition = 'all 0.2s ease';
            }
        });
        
        button.addEventListener('mouseleave', function() {
            if (!this.classList.contains('active')) {
                this.style.transform = 'scale(1)';
            }
        });
    });
    
    // Add hover effects for case study cards
    caseStudyItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
            this.style.transition = 'all 0.3s ease';
        });
        
        item.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
});
</script>
@endsection
