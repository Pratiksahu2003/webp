@extends('layouts.admin')

@section('title', 'Sections Management - VanTroZ Admin')
@section('page-title', 'Sections Management')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Sections Management</h1>
            <p class="text-gray-600 mt-1">Manage website sections and content blocks</p>
        </div>
        <div class="flex items-center space-x-3 mt-4 sm:mt-0">
            <a href="{{ route('admin.sections.create') }}" 
               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                New Section
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse(range(1, 6) as $i)
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow">
            <div class="h-32 bg-gradient-to-br {{ ['from-blue-500 to-purple-600', 'from-green-500 to-teal-600', 'from-orange-500 to-red-600', 'from-purple-500 to-pink-600', 'from-indigo-500 to-blue-600', 'from-yellow-500 to-orange-600'][($i-1) % 6] }} relative">
                <div class="absolute inset-0 bg-black bg-opacity-20"></div>
                <div class="absolute top-4 right-4">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-white/20 text-white">
                        {{ ['Hero', 'About', 'Services', 'Team', 'Contact', 'Footer'][($i-1) % 6] }}
                    </span>
                </div>
                <div class="absolute bottom-4 left-4 text-white">
                    <h3 class="text-lg font-bold">
                        {{ ['Hero Section', 'About Us Section', 'Services Overview', 'Team Members', 'Contact Form', 'Footer Content'][($i-1) % 6] }}
                    </h3>
                    <p class="text-white/80 text-sm">Page section content</p>
                </div>
            </div>

            <div class="p-6">
                <div class="flex items-center justify-between mb-3">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                        {{ ['Home', 'About', 'Services', 'Team', 'Contact', 'Global'][($i-1) % 6] }} Page
                    </span>
                    <span class="text-sm text-gray-500">Order: {{ $i }}</span>
                </div>

                <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                    {{ [
                        'Main hero section with call-to-action and hero image',
                        'Company introduction and mission statement section',
                        'Overview of all services offered by the company',
                        'Team member profiles and company culture',
                        'Contact form and location information',
                        'Footer with links and company information'
                    ][($i-1) % 6] }}
                </p>

                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center text-sm text-gray-500">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        {{ $i % 2 === 0 ? 'Visible' : 'Hidden' }}
                    </div>
                    <div class="text-sm text-gray-500">
                        Updated {{ now()->subDays(rand(1, 10))->diffForHumans() }}
                    </div>
                </div>

                <div class="flex items-center space-x-2">
                    <a href="{{ route('admin.sections.show', $i) }}" 
                       class="flex-1 text-center px-3 py-2 text-blue-600 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors text-sm font-medium">
                        View
                    </a>
                    <a href="{{ route('admin.sections.edit', $i) }}" 
                       class="flex-1 text-center px-3 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm font-medium">
                        Edit
                    </a>
                    <form action="{{ route('admin.sections.destroy', $i) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                onclick="return confirm('Are you sure you want to delete this section?')"
                                class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors">
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
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                </svg>
                <h3 class="text-lg font-medium text-gray-900 mb-2">No sections found</h3>
                <p class="text-gray-500 mb-6">Start by creating your first section.</p>
                <a href="{{ route('admin.sections.create') }}" 
                   class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Create First Section
                </a>
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection
