@extends('layouts.website')

@section('title', 'Case Studies - WEZOM')
@section('description', 'Explore our successful projects and see how we help businesses achieve their goals.')

@section('content')
<!-- Hero Section -->
<section class="hero-gradient text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
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
            <button class="filter-btn active bg-blue-600 text-white px-6 py-2 rounded-lg font-semibold" data-filter="all">
                All Cases
            </button>
            <button class="filter-btn bg-gray-200 text-gray-700 px-6 py-2 rounded-lg font-semibold hover:bg-gray-300" data-filter="ecommerce">
                eCommerce
            </button>
            <button class="filter-btn bg-gray-200 text-gray-700 px-6 py-2 rounded-lg font-semibold hover:bg-gray-300" data-filter="manufacturing">
                Manufacturing
            </button>
            <button class="filter-btn bg-gray-200 text-gray-700 px-6 py-2 rounded-lg font-semibold hover:bg-gray-300" data-filter="fintech">
                Fintech
            </button>
            <button class="filter-btn bg-gray-200 text-gray-700 px-6 py-2 rounded-lg font-semibold hover:bg-gray-300" data-filter="logistics">
                Logistics
            </button>
        </div>
    </div>
</section>

<!-- Case Studies Grid -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($caseStudies as $caseStudy)
            <div class="case-study-item bg-white rounded-lg shadow-lg overflow-hidden" data-category="{{ strtolower($caseStudy->industry) }}">
                @if($caseStudy->image)
                    <img src="{{ $caseStudy->image }}" alt="{{ $caseStudy->title }}" class="w-full h-48 object-cover">
                @endif
                <div class="p-6">
                    <div class="flex items-center mb-2">
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">{{ $caseStudy->category }}</span>
                        <span class="bg-gray-100 text-gray-800 text-xs font-semibold px-2.5 py-0.5 rounded ml-2">{{ $caseStudy->industry }}</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-3">{{ $caseStudy->title }}</h3>
                    <p class="text-gray-600 mb-4">{{ $caseStudy->description }}</p>
                    
                    @if($caseStudy->metrics)
                        <div class="space-y-2 mb-4">
                            @foreach(json_decode($caseStudy->metrics, true) as $metric)
                                <div class="text-sm">
                                    <span class="font-semibold text-blue-600">{{ $metric['value'] }}</span>
                                    <span class="text-gray-600">{{ $metric['description'] }}</span>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    
                    @if($caseStudy->technologies)
                        <div class="mb-4">
                            <h4 class="text-sm font-semibold text-gray-700 mb-2">Technologies Used:</h4>
                            <div class="flex flex-wrap gap-1">
                                @foreach(json_decode($caseStudy->technologies, true) as $tech)
                                    <span class="bg-gray-100 text-gray-600 text-xs px-2 py-1 rounded">{{ $tech }}</span>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    
                    <a href="{{ route('contact') }}" class="inline-block text-blue-600 hover:text-blue-800 font-semibold">
                        Learn more →
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        
        @if($caseStudies->isEmpty())
        <div class="text-center py-12">
            <div class="text-gray-400 text-6xl mb-4">📁</div>
            <h3 class="text-xl font-semibold text-gray-600 mb-2">No case studies available</h3>
            <p class="text-gray-500">Check back later for our latest projects and success stories.</p>
        </div>
        @endif
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
                <div class="text-4xl font-bold text-blue-600 mb-2">3500+</div>
                <div class="text-gray-600">Projects Completed</div>
            </div>
            <div class="bg-white rounded-lg p-8 shadow-md">
                <div class="text-4xl font-bold text-blue-600 mb-2">250+</div>
                <div class="text-gray-600">Satisfied Clients</div>
            </div>
            <div class="text-4xl font-bold text-blue-600 mb-2">24+</div>
                <div class="text-gray-600">Years Experience</div>
            </div>
            <div class="bg-white rounded-lg p-8 shadow-md">
                <div class="text-4xl font-bold text-blue-600 mb-2">275+</div>
                <div class="text-gray-600">Team Members</div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 hero-gradient text-white">
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
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');
            
            // Update active button
            filterButtons.forEach(btn => {
                btn.classList.remove('active', 'bg-blue-600', 'text-white');
                btn.classList.add('bg-gray-200', 'text-gray-700');
            });
            this.classList.remove('bg-gray-200', 'text-gray-700');
            this.classList.add('active', 'bg-blue-600', 'text-white');
            
            // Filter case studies
            caseStudyItems.forEach(item => {
                if (filter === 'all' || item.getAttribute('data-category') === filter) {
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
