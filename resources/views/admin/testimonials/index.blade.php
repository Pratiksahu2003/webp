@extends('layouts.admin')

@section('title', 'Testimonials Management - VanTroZ Admin')
@section('page-title', 'Testimonials Management')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Testimonials Management</h1>
            <p class="text-gray-600 mt-1">Manage customer testimonials and reviews</p>
        </div>
        <div class="flex items-center space-x-3 mt-4 sm:mt-0">
            <a href="{{ route('admin.testimonials.create') }}" 
               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Add Testimonial
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse(range(1, 9) as $i)
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
            <!-- Rating -->
            <div class="flex items-center mb-4">
                @for($star = 1; $star <= 5; $star++)
                    <svg class="w-5 h-5 {{ $star <= (5 - ($i % 2)) ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                @endfor
                <span class="ml-2 text-sm text-gray-600">({{ 5 - ($i % 2) }}.0)</span>
            </div>

            <!-- Testimonial Content -->
            <blockquote class="text-gray-700 mb-4 line-clamp-4">
                "{{ [
                    'VanTroZ delivered an exceptional website that exceeded our expectations. Their attention to detail and professional approach made the entire process seamless.',
                    'The team at VanTroZ transformed our digital presence completely. Their expertise in modern web development is truly impressive and highly recommended.',
                    'Working with VanTroZ was a fantastic experience. They understood our vision and brought it to life with stunning design and flawless functionality.',
                    'Professional, reliable, and creative - VanTroZ delivered exactly what we needed. The project was completed on time and within budget.',
                    'Outstanding service and exceptional results. VanTroZ helped us create a website that truly represents our brand and engages our customers.',
                    'The quality of work from VanTroZ is unmatched. Their technical skills and creative vision resulted in a website we are proud to showcase.',
                    'VanTroZ provided excellent communication throughout the project. The final result was a beautiful, functional website that drives conversions.',
                    'Highly professional team with great expertise. VanTroZ delivered a solution that improved our online presence significantly.',
                    'Exceptional attention to detail and customer service. VanTroZ created a website that perfectly captures our company culture and values.'
                ][($i-1) % 9] }}"
            </blockquote>

            <!-- Author Info -->
            <div class="flex items-center">
                <div class="w-12 h-12 bg-gradient-to-r {{ ['from-blue-500 to-purple-600', 'from-green-500 to-teal-600', 'from-orange-500 to-red-600'][($i-1) % 3] }} rounded-full flex items-center justify-center mr-4">
                    <span class="text-white font-bold text-lg">
                        {{ ['J', 'S', 'M', 'A', 'R', 'K', 'L', 'D', 'T'][($i-1) % 9] }}
                    </span>
                </div>
                <div class="flex-1">
                    <div class="font-semibold text-gray-900">
                        {{ [
                            'John Smith', 'Sarah Johnson', 'Michael Brown', 'Anna Williams', 
                            'Robert Davis', 'Karen Wilson', 'David Lee', 'Lisa Garcia', 'Tom Anderson'
                        ][($i-1) % 9] }}
                    </div>
                    <div class="text-sm text-gray-600">
                        {{ [
                            'CEO, Tech Solutions Inc.', 'Marketing Director, Creative Co.', 'Founder, StartupXYZ',
                            'Project Manager, Digital Agency', 'Business Owner, Local Store', 'VP Marketing, Corp Ltd.',
                            'CTO, Innovation Hub', 'Director, Design Studio', 'Owner, Small Business'
                        ][($i-1) % 9] }}
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-between mt-6 pt-4 border-t border-gray-200">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $i % 3 === 0 ? 'bg-green-100 text-green-800' : ($i % 2 === 0 ? 'bg-yellow-100 text-yellow-800' : 'bg-blue-100 text-blue-800') }}">
                    {{ $i % 3 === 0 ? 'Published' : ($i % 2 === 0 ? 'Pending' : 'Featured') }}
                </span>
                
                <div class="flex items-center space-x-2">
                    <a href="{{ route('admin.testimonials.edit', $i) }}" 
                       class="text-blue-600 hover:text-blue-900 p-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </a>
                    <form action="{{ route('admin.testimonials.destroy', $i) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                onclick="return confirm('Are you sure you want to delete this testimonial?')"
                                class="text-red-600 hover:text-red-900 p-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full">
            <div class="text-center py-12">
                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                </svg>
                <h3 class="text-lg font-medium text-gray-900 mb-2">No testimonials found</h3>
                <p class="text-gray-500 mb-6">Start by adding your first customer testimonial.</p>
                <a href="{{ route('admin.testimonials.create') }}" 
                   class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Add First Testimonial
                </a>
            </div>
        </div>
        @endforelse
    </div>

    <!-- Summary Stats -->
    <div class="mt-8 grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="p-2 bg-blue-100 rounded-lg">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-2xl font-bold text-gray-900">{{ rand(20, 50) }}</p>
                    <p class="text-sm text-gray-600">Total Testimonials</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="p-2 bg-green-100 rounded-lg">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-2xl font-bold text-gray-900">{{ rand(15, 35) }}</p>
                    <p class="text-sm text-gray-600">Published</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="p-2 bg-yellow-100 rounded-lg">
                    <svg class="w-6 h-6 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-2xl font-bold text-gray-900">4.8</p>
                    <p class="text-sm text-gray-600">Average Rating</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="p-2 bg-purple-100 rounded-lg">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-2xl font-bold text-gray-900">{{ rand(5, 15) }}</p>
                    <p class="text-sm text-gray-600">Featured</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
