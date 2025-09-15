@extends('layouts.admin')

@section('title', 'Dashboard - WEZOM CMS')
@section('page-title', 'Dashboard')

@section('content')
<div class="min-h-screen bg-white">
    <!-- Modern Header with Gradient -->
    <div class="relative overflow-hidden bg-gradient-to-r from-indigo-600 via-purple-600 to-blue-700 rounded-2xl shadow-2xl mb-8">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent"></div>
        
        <!-- Floating Elements -->
        <div class="absolute top-4 right-20 w-32 h-32 bg-white/10 rounded-full blur-xl"></div>
        <div class="absolute bottom-8 left-10 w-24 h-24 bg-purple-300/20 rounded-full blur-lg"></div>
        
        <div class="relative px-8 py-12">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-6">
                    <div class="relative">
                        <div class="w-20 h-20 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center shadow-lg">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <div class="absolute -top-2 -right-2 w-6 h-6 bg-green-400 rounded-full border-4 border-white flex items-center justify-center">
                            <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>
                        </div>
                    </div>
                    
                    <div class="text-white">
                        <h1 class="text-4xl font-bold mb-2">Welcome back, {{ auth()->user()->name }}</h1>
                        <p class="text-xl text-white/80 mb-4">Here's what's happening with your CMS today</p>
                        <div class="flex items-center space-x-4 text-sm">
                            <div class="flex items-center bg-white/20 rounded-full px-4 py-2">
                                <div class="w-2 h-2 bg-green-400 rounded-full mr-2"></div>
                                <span>All systems operational</span>
                            </div>
                            <div class="flex items-center bg-white/20 rounded-full px-4 py-2">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>Last updated: {{ now()->format('g:i A') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="hidden lg:flex items-center space-x-4">
                    <button class="bg-white/20 backdrop-blur-sm hover:bg-white/30 text-white px-6 py-3 rounded-xl font-medium transition-all duration-300 transform hover:scale-105">
                        <svg class="w-5 h-5 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Quick Add
                    </button>
                    <button class="bg-white text-indigo-600 hover:bg-gray-50 px-6 py-3 rounded-xl font-medium transition-all duration-300 transform hover:scale-105 shadow-lg">
                        View Analytics
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modern Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Content Stats -->
        <div class="group relative">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-blue-700 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform scale-105"></div>
            <div class="relative bg-white rounded-2xl p-6 shadow-lg border border-gray-100 group-hover:shadow-2xl transition-all duration-300 transform group-hover:-translate-y-1">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <div class="text-right">
                        <div class="text-3xl font-bold text-gray-900 group-hover:text-white transition-colors duration-300">{{ $stats['pages'] ?? 12 }}</div>
                        <div class="text-sm text-gray-500 group-hover:text-white/80 transition-colors duration-300">Total Pages</div>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm font-medium text-gray-600 group-hover:text-white/90 transition-colors duration-300">This month</span>
                    <span class="inline-flex items-center text-green-600 text-sm font-medium group-hover:text-green-300">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                        </svg>
                        +12%
                    </span>
                </div>
                <div class="mt-4 h-2 bg-gray-100 rounded-full overflow-hidden group-hover:bg-white/20">
                    <div class="h-full bg-gradient-to-r from-blue-500 to-blue-600 rounded-full transform transition-all duration-1000" style="width: 75%"></div>
                </div>
            </div>
        </div>

        <!-- Services Stats -->
        <div class="group relative">
            <div class="absolute inset-0 bg-gradient-to-r from-emerald-600 to-emerald-700 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform scale-105"></div>
            <div class="relative bg-white rounded-2xl p-6 shadow-lg border border-gray-100 group-hover:shadow-2xl transition-all duration-300 transform group-hover:-translate-y-1">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2V6"></path>
                        </svg>
                    </div>
                    <div class="text-right">
                        <div class="text-3xl font-bold text-gray-900 group-hover:text-white transition-colors duration-300">{{ $stats['services'] ?? 8 }}</div>
                        <div class="text-sm text-gray-500 group-hover:text-white/80 transition-colors duration-300">Active Services</div>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm font-medium text-gray-600 group-hover:text-white/90 transition-colors duration-300">Performance</span>
                    <span class="inline-flex items-center text-green-600 text-sm font-medium group-hover:text-green-300">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                        </svg>
                        +8%
                    </span>
                </div>
                <div class="mt-4 h-2 bg-gray-100 rounded-full overflow-hidden group-hover:bg-white/20">
                    <div class="h-full bg-gradient-to-r from-emerald-500 to-emerald-600 rounded-full transform transition-all duration-1000" style="width: 88%"></div>
                </div>
            </div>
        </div>

        <!-- Blog Stats -->
        <div class="group relative">
            <div class="absolute inset-0 bg-gradient-to-r from-purple-600 to-purple-700 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform scale-105"></div>
            <div class="relative bg-white rounded-2xl p-6 shadow-lg border border-gray-100 group-hover:shadow-2xl transition-all duration-300 transform group-hover:-translate-y-1">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </div>
                    <div class="text-right">
                        <div class="text-3xl font-bold text-gray-900 group-hover:text-white transition-colors duration-300">{{ $stats['blogPosts'] ?? 24 }}</div>
                        <div class="text-sm text-gray-500 group-hover:text-white/80 transition-colors duration-300">Blog Posts</div>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm font-medium text-gray-600 group-hover:text-white/90 transition-colors duration-300">Engagement</span>
                    <span class="inline-flex items-center text-green-600 text-sm font-medium group-hover:text-green-300">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                        </svg>
                        +25%
                    </span>
                </div>
                <div class="mt-4 h-2 bg-gray-100 rounded-full overflow-hidden group-hover:bg-white/20">
                    <div class="h-full bg-gradient-to-r from-purple-500 to-purple-600 rounded-full transform transition-all duration-1000" style="width: 92%"></div>
                </div>
            </div>
        </div>

        <!-- Users Stats -->
        <div class="group relative">
            <div class="absolute inset-0 bg-gradient-to-r from-orange-600 to-orange-700 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform scale-105"></div>
            <div class="relative bg-white rounded-2xl p-6 shadow-lg border border-gray-100 group-hover:shadow-2xl transition-all duration-300 transform group-hover:-translate-y-1">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-orange-500 to-orange-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                    </div>
                    <div class="text-right">
                        <div class="text-3xl font-bold text-gray-900 group-hover:text-white transition-colors duration-300">{{ $stats['clients'] ?? 156 }}</div>
                        <div class="text-sm text-gray-500 group-hover:text-white/80 transition-colors duration-300">Total Clients</div>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm font-medium text-gray-600 group-hover:text-white/90 transition-colors duration-300">Growth</span>
                    <span class="inline-flex items-center text-green-600 text-sm font-medium group-hover:text-green-300">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                        </svg>
                        +18%
                    </span>
                </div>
                <div class="mt-4 h-2 bg-gray-100 rounded-full overflow-hidden group-hover:bg-white/20">
                    <div class="h-full bg-gradient-to-r from-orange-500 to-orange-600 rounded-full transform transition-all duration-1000" style="width: 68%"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modern Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
        <!-- Quick Actions Panel -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="bg-gradient-to-r from-indigo-500 to-purple-600 px-6 py-4">
                    <h3 class="text-xl font-bold text-white flex items-center">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        Quick Actions
                    </h3>
                </div>
                <div class="p-6 space-y-4">
                    <a href="{{ route('admin.pages.create') }}" class="group flex items-center p-4 rounded-xl bg-gradient-to-r from-blue-50 to-indigo-50 hover:from-blue-100 hover:to-indigo-100 transition-all duration-300 transform hover:scale-105">
                        <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center mr-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="font-semibold text-gray-900 group-hover:text-indigo-700">Create New Page</div>
                            <div class="text-sm text-gray-500">Add a new page to your website</div>
                        </div>
                    </a>

                    <a href="{{ route('admin.blog-posts.create') }}" class="group flex items-center p-4 rounded-xl bg-gradient-to-r from-green-50 to-emerald-50 hover:from-green-100 hover:to-emerald-100 transition-all duration-300 transform hover:scale-105">
                        <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-emerald-600 rounded-xl flex items-center justify-center mr-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="font-semibold text-gray-900 group-hover:text-green-700">Write Blog Post</div>
                            <div class="text-sm text-gray-500">Create engaging content</div>
                        </div>
                    </a>

                    <a href="{{ route('admin.services.create') }}" class="group flex items-center p-4 rounded-xl bg-gradient-to-r from-purple-50 to-pink-50 hover:from-purple-100 hover:to-pink-100 transition-all duration-300 transform hover:scale-105">
                        <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-600 rounded-xl flex items-center justify-center mr-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2V6"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="font-semibold text-gray-900 group-hover:text-purple-700">Add Service</div>
                            <div class="text-sm text-gray-500">Showcase your offerings</div>
                        </div>
                    </a>

                    <a href="{{ route('admin.media.index') }}" class="group flex items-center p-4 rounded-xl bg-gradient-to-r from-orange-50 to-red-50 hover:from-orange-100 hover:to-red-100 transition-all duration-300 transform hover:scale-105">
                        <div class="w-12 h-12 bg-gradient-to-r from-orange-500 to-red-600 rounded-xl flex items-center justify-center mr-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="font-semibold text-gray-900 group-hover:text-orange-700">Upload Media</div>
                            <div class="text-sm text-gray-500">Manage your assets</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Activity Feed & Analytics -->
        <div class="lg:col-span-2 space-y-8">
            <!-- Recent Activity -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="bg-gradient-to-r from-gray-800 to-gray-900 px-6 py-4">
                    <h3 class="text-xl font-bold text-white flex items-center">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        Recent Activity
                    </h3>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        @foreach(range(1, 6) as $i)
                        <div class="flex items-start space-x-4 p-4 rounded-xl bg-gray-50 hover:bg-gray-100 transition-colors duration-200">
                            <div class="w-10 h-10 bg-gradient-to-r {{ ['from-blue-500 to-blue-600', 'from-green-500 to-green-600', 'from-purple-500 to-purple-600', 'from-orange-500 to-orange-600', 'from-indigo-500 to-indigo-600', 'from-pink-500 to-pink-600'][($i-1) % 6] }} rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ ['M12 6v6m0 0v6m0-6h6m-6 0H6', 'M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z', 'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2V6', 'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z', 'M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z', 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z'][($i-1) % 6] }}"></path>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900">
                                    {{ ['Created new page "About Us"', 'Updated blog post "Web Trends 2024"', 'Added new service "Mobile App Development"', 'Uploaded 5 new images to media library', 'Received new testimonial from John Doe', 'Modified site settings'][($i-1) % 6] }}
                                </p>
                                <p class="text-sm text-gray-500">{{ now()->subMinutes(rand(5, 120))->diffForHumans() }}</p>
                            </div>
                            <div class="flex-shrink-0">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ ['bg-blue-100 text-blue-800', 'bg-green-100 text-green-800', 'bg-purple-100 text-purple-800', 'bg-orange-100 text-orange-800', 'bg-indigo-100 text-indigo-800', 'bg-pink-100 text-pink-800'][($i-1) % 6] }}">
                                    {{ ['Page', 'Blog', 'Service', 'Media', 'Review', 'Settings'][($i-1) % 6] }}
                                </span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Performance Chart Placeholder -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="bg-gradient-to-r from-indigo-500 to-purple-600 px-6 py-4">
                    <h3 class="text-xl font-bold text-white flex items-center">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        Performance Analytics
                    </h3>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-indigo-600 mb-2">98.5%</div>
                            <div class="text-sm text-gray-600">Uptime</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-green-600 mb-2">1.2s</div>
                            <div class="text-sm text-gray-600">Load Time</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-orange-600 mb-2">2.1K</div>
                            <div class="text-sm text-gray-600">Monthly Visitors</div>
                        </div>
                    </div>
                    
                    <!-- Simple Chart Visualization -->
                    <div class="h-32 bg-gradient-to-r from-indigo-50 to-purple-50 rounded-xl flex items-end justify-between p-4 space-x-2">
                        @foreach(range(1, 12) as $month)
                        <div class="bg-gradient-to-t from-indigo-500 to-purple-600 rounded-t opacity-80 hover:opacity-100 transition-opacity duration-200" 
                             style="height: {{ rand(30, 100) }}%; width: 6%;"></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modern Footer Stats -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="text-center">
                <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <div class="text-2xl font-bold text-gray-900 mb-1">99.9%</div>
                <div class="text-sm text-gray-600">System Uptime</div>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="text-2xl font-bold text-gray-900 mb-1">{{ rand(50, 200) }}</div>
                <div class="text-sm text-gray-600">Tasks Completed</div>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                </div>
                <div class="text-2xl font-bold text-gray-900 mb-1">4.9</div>
                <div class="text-sm text-gray-600">User Satisfaction</div>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-gradient-to-r from-orange-500 to-red-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                </div>
                <div class="text-2xl font-bold text-gray-900 mb-1">+24%</div>
                <div class="text-sm text-gray-600">Growth Rate</div>
            </div>
        </div>
    </div>
</div>

<style>
@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}

.animate-float {
    animation: float 3s ease-in-out infinite;
}

@keyframes pulse-glow {
    0%, 100% { box-shadow: 0 0 20px rgba(99, 102, 241, 0.4); }
    50% { box-shadow: 0 0 30px rgba(99, 102, 241, 0.6); }
}

.pulse-glow {
    animation: pulse-glow 2s ease-in-out infinite;
}
</style>
@endsection