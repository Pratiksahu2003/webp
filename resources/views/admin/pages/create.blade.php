@extends('layouts.admin')

@section('title', 'Create New Page - Modern Page Builder')
@section('page-title', 'Create New Page')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Create New Page</h1>
            <p class="text-gray-600 mt-1">Use our modern page builder to create stunning pages</p>
        </div>
        <a href="{{ route('admin.pages.index') }}" 
           class="inline-flex items-center px-4 py-2 text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Back to Pages
        </a>
    </div>

    <!-- Modern Page Builder Redirect -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8 text-center">
        <div class="w-20 h-20 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full mx-auto mb-6 flex items-center justify-center">
            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
            </svg>
        </div>
        
        <h2 class="text-2xl font-bold text-gray-900 mb-4">Welcome to the Modern Page Builder</h2>
        <p class="text-gray-600 mb-8 max-w-2xl mx-auto">
            Create stunning pages with our drag-and-drop page builder. Add components, customize layouts, 
            and preview your changes in real-time across different devices.
        </p>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="text-center">
                <div class="w-12 h-12 bg-blue-100 rounded-lg mx-auto mb-3 flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Hero Sections</h3>
                <p class="text-sm text-gray-600">Create compelling hero sections with videos, images, and animations</p>
            </div>
            
            <div class="text-center">
                <div class="w-12 h-12 bg-green-100 rounded-lg mx-auto mb-3 flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Rich Content</h3>
                <p class="text-sm text-gray-600">Add text blocks, images, galleries, and more with CKEditor integration</p>
            </div>
            
            <div class="text-center">
                <div class="w-12 h-12 bg-purple-100 rounded-lg mx-auto mb-3 flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Drag & Drop</h3>
                <p class="text-sm text-gray-600">Easily reorder components with intuitive drag-and-drop functionality</p>
            </div>
        </div>
        
        <div class="flex items-center justify-center space-x-4">
            <a href="{{ route('admin.pages.builder') }}" 
               class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold rounded-lg transition-all duration-200 shadow-lg hover:shadow-xl">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Start Building
            </a>
            
            <a href="{{ route('admin.pages.index') }}" 
               class="inline-flex items-center px-6 py-3 text-gray-600 bg-gray-100 hover:bg-gray-200 font-semibold rounded-lg transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Pages
            </a>
        </div>
    </div>
</div>

<script>
// Auto-redirect to page builder after 3 seconds
setTimeout(() => {
    window.location.href = '{{ route("admin.pages.builder") }}';
}, 3000);

// Show countdown
let countdown = 3;
const countdownElement = document.createElement('div');
countdownElement.className = 'mt-4 text-sm text-gray-500';
countdownElement.innerHTML = `Redirecting to page builder in <span class="font-semibold text-blue-600">${countdown}</span> seconds...`;
document.querySelector('.bg-white.rounded-xl').appendChild(countdownElement);

const countdownInterval = setInterval(() => {
    countdown--;
    countdownElement.innerHTML = `Redirecting to page builder in <span class="font-semibold text-blue-600">${countdown}</span> seconds...`;
    
    if (countdown <= 0) {
        clearInterval(countdownInterval);
        countdownElement.innerHTML = 'Redirecting now...';
    }
}, 1000);
</script>
@endsection
