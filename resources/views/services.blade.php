@extends('layouts.website')

@section('title', 'Services - VanTroZ')
@section('description', 'Comprehensive IT services including software development, web development, mobile app development, and more.')

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
            <h1 class="text-4xl md:text-6xl font-bold mb-6">Our Services</h1>
            <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto">
                Comprehensive IT solutions tailored to your business needs
            </p>
        </div>
    </div>
</section>

<!-- Services Grid -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services as $index => $service)
            <div class="service-card bg-white rounded-lg p-8 shadow-lg border">
                <div class="text-blue-600 text-4xl font-bold mb-4">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}/</div>
                <h3 class="text-xl font-semibold mb-4">{{ $service->title }}</h3>
                <p class="text-gray-600 mb-6">{{ $service->description }}</p>
                
                @if($service->features)
                <div class="space-y-2 mb-6">
                    @foreach(json_decode($service->features, true) as $feature)
                        <div class="flex items-center text-sm text-gray-600">
                            <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $feature }}
                        </div>
                    @endforeach
                </div>
                @endif
                
                <a href="{{ route('contact') }}" class="inline-block text-blue-600 hover:text-blue-800 font-semibold">
                    Learn more →
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Industries Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Industries We Serve</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                We provide specialized solutions for various industries
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white rounded-lg p-6 shadow-md">
                <h3 class="text-lg font-semibold mb-3">Oil & Gas</h3>
                <p class="text-gray-600">Custom asset management systems, drilling optimization tools, and remote monitoring platforms.</p>
            </div>
            
            <div class="bg-white rounded-lg p-6 shadow-md">
                <h3 class="text-lg font-semibold mb-3">Healthcare</h3>
                <p class="text-gray-600">Electronic health record systems, telemedicine platforms, and patient engagement applications.</p>
            </div>
            
            <div class="bg-white rounded-lg p-6 shadow-md">
                <h3 class="text-lg font-semibold mb-3">Fintech</h3>
                <p class="text-gray-600">Digital banking solutions, payment processing systems, and robo-advisory platforms.</p>
            </div>
            
            <div class="bg-white rounded-lg p-6 shadow-md">
                <h3 class="text-lg font-semibold mb-3">eCommerce</h3>
                <p class="text-gray-600">Online storefronts, inventory management systems, and personalized marketing automation.</p>
            </div>
            
            <div class="bg-white rounded-lg p-6 shadow-md">
                <h3 class="text-lg font-semibold mb-3">Manufacturing</h3>
                <p class="text-gray-600">ERP systems, inventory management solutions, and predictive maintenance tools.</p>
            </div>
            
            <div class="bg-white rounded-lg p-6 shadow-md">
                <h3 class="text-lg font-semibold mb-3">Education</h3>
                <p class="text-gray-600">Learning management systems, student information hubs, and virtual classrooms.</p>
            </div>
        </div>
    </div>
</section>

<!-- Process Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Development Process</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                We follow a proven methodology to ensure successful project delivery
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="bg-orange-500 text-white w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">1</div>
                <h3 class="text-lg font-semibold mb-3">Discovery</h3>
                <p class="text-gray-600">Understanding your requirements and creating a detailed project plan</p>
            </div>
            
            <div class="text-center">
                <div class="bg-orange-500 text-white w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">2</div>
                <h3 class="text-lg font-semibold mb-3">Design</h3>
                <p class="text-gray-600">Creating intuitive user interfaces and user experiences</p>
            </div>
            
            <div class="text-center">
                <div class="bg-orange-500 text-white w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">3</div>
                <h3 class="text-lg font-semibold mb-3">Development</h3>
                <p class="text-gray-600">Building robust solutions using modern technologies</p>
            </div>
            
            <div class="text-center">
                <div class="bg-orange-500 text-white w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">4</div>
                <h3 class="text-lg font-semibold mb-3">Testing</h3>
                <p class="text-gray-600">Comprehensive testing to ensure quality and performance</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-orange-500 to-orange-600 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Start Your Project?</h2>
        <p class="text-xl mb-8 max-w-3xl mx-auto">
            Let's discuss your requirements and see how we can help you achieve your goals
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact') }}" class="bg-yellow-400 text-gray-900 px-8 py-3 rounded-lg font-semibold hover:bg-yellow-300 transition-colors">
                Get Started
            </a>
            <a href="{{ route('case-studies') }}" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-orange-600 transition-colors">
                View Our Work
            </a>
        </div>
    </div>
</section>
@endsection
