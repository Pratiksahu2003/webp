@extends('layouts.admin')

@section('title', 'Dashboard - WEZOM Admin')
@section('page-title', 'Dashboard')

@section('content')
<div class="p-8 bg-gray-50 min-h-full">
    <!-- Enhanced Header Section -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Welcome back, {{ auth()->user()->name }}! 👋</h1>
                <p class="text-gray-600">Here's what's happening with your business today.</p>
            </div>
            <div class="flex items-center space-x-3">
                <button class="zoho-btn zoho-btn-outline">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Export Report
                </button>
                <button class="zoho-btn zoho-btn-primary">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Add New
                </button>
            </div>
        </div>
    </div>

    <!-- Enhanced Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Pages -->
        <div class="zoho-stat-card animate-fade-in">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <div class="text-right">
                    <div class="flex items-center text-green-600 text-sm font-medium">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                        </svg>
                        12%
                    </div>
                </div>
            </div>
            <div>
                <h3 class="zoho-metric">{{ $stats['pages'] ?? 24 }}</h3>
                <p class="text-gray-600 font-medium mt-1">Total Pages</p>
                <p class="text-sm text-gray-500 mt-1">↗ 3 new this week</p>
            </div>
        </div>

        <!-- Active Services -->
        <div class="zoho-stat-card animate-fade-in" style="animation-delay: 0.1s">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2V6"></path>
                    </svg>
                </div>
                <div class="text-right">
                    <div class="flex items-center text-green-600 text-sm font-medium">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                        </svg>
                        8%
                    </div>
                </div>
            </div>
            <div>
                <h3 class="zoho-metric">{{ $stats['services'] ?? 18 }}</h3>
                <p class="text-gray-600 font-medium mt-1">Active Services</p>
                <p class="text-sm text-gray-500 mt-1">↗ 2 new this month</p>
            </div>
        </div>

        <!-- Blog Posts -->
        <div class="zoho-stat-card animate-fade-in" style="animation-delay: 0.2s">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                </div>
                <div class="text-right">
                    <div class="flex items-center text-green-600 text-sm font-medium">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                        </svg>
                        24%
                    </div>
                </div>
            </div>
            <div>
                <h3 class="zoho-metric">{{ $stats['blogPosts'] ?? 42 }}</h3>
                <p class="text-gray-600 font-medium mt-1">Blog Posts</p>
                <p class="text-sm text-gray-500 mt-1">↗ 8 published this week</p>
            </div>
        </div>

        <!-- Total Clients -->
        <div class="zoho-stat-card animate-fade-in" style="animation-delay: 0.3s">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H2v-2a3 3 0 015.356-1.857M17 20v-2c0-.653-.146-1.28-.423-1.857M7 20v-2c0-.653.146-1.28.423-1.857M11 16a3 3 0 10-6 0 3 3 0 006 0zm3.5-7.5a3 3 0 10-6 0 3 3 0 006 0z"></path>
                    </svg>
                </div>
                <div class="text-right">
                    <div class="flex items-center text-green-600 text-sm font-medium">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                        </svg>
                        18%
                    </div>
                </div>
            </div>
            <div>
                <h3 class="zoho-metric">{{ $stats['clients'] ?? 156 }}</h3>
                <p class="text-gray-600 font-medium mt-1">Total Clients</p>
                <p class="text-sm text-gray-500 mt-1">↗ 12 new this month</p>
            </div>
        </div>
    </div>

    <!-- Main Dashboard Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Left Column - Enhanced Charts and Analytics -->
        <div class="lg:col-span-2 space-y-8">
            <!-- Revenue & Analytics Card -->
            <div class="zoho-card animate-slide-up">
                <div class="p-6 border-b border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Revenue Analytics</h3>
                            <p class="text-gray-600 mt-1">Track your monthly performance and growth</p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <select class="text-sm border border-gray-200 rounded-lg px-4 py-2 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white">
                                <option>Last 7 days</option>
                                <option>Last 30 days</option>
                                <option>Last 3 months</option>
                                <option>Last year</option>
                            </select>
                            <button class="p-2 text-gray-400 hover:text-blue-600 rounded-lg hover:bg-blue-50 transition-all">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <!-- Enhanced Chart Area -->
                    <div class="mb-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center space-x-8">
                                <div>
                                    <p class="text-sm text-gray-600">Total Revenue</p>
                                    <p class="text-2xl font-bold text-gray-900">$47,281</p>
                                    <span class="text-sm text-green-600 font-medium">↗ +12.5%</span>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600">Orders</p>
                                    <p class="text-2xl font-bold text-gray-900">1,423</p>
                                    <span class="text-sm text-green-600 font-medium">↗ +8.2%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Enhanced Interactive Chart -->
                    <div class="h-80 relative">
                        <div class="absolute top-0 left-0 right-0 flex justify-between text-xs text-gray-400 mb-2">
                            <span>$50k</span>
                            <span>$40k</span>
                            <span>$30k</span>
                            <span>$20k</span>
                            <span>$10k</span>
                            <span>$0</span>
                        </div>
                        <div class="flex items-end justify-between h-64 mt-6 bg-gradient-to-t from-gray-50 to-transparent rounded-lg p-4">
                            @for($i = 1; $i <= 12; $i++)
                            <div class="flex flex-col items-center flex-1 mx-1 group">
                                <div class="w-full bg-gradient-to-t from-blue-500 via-blue-400 to-blue-300 rounded-t-lg hover:from-blue-600 hover:via-blue-500 hover:to-blue-400 transition-all duration-500 cursor-pointer shadow-lg transform group-hover:scale-105" 
                                     style="height: {{ rand(30, 95) }}%; min-height: 20px;"
                                     title="Month {{ $i }}: ${{ number_format(rand(15000, 45000)) }}"></div>
                                <span class="text-xs text-gray-500 mt-3 font-medium">{{ date('M', mktime(0, 0, 0, $i, 1)) }}</span>
                            </div>
                            @endfor
                        </div>
                        
                        <!-- Enhanced Chart Legend -->
                        <div class="flex items-center justify-center space-x-8 pt-6 border-t border-gray-100 mt-4">
                            <div class="flex items-center">
                                <div class="w-4 h-4 bg-gradient-to-r from-blue-500 to-blue-400 rounded-full mr-3"></div>
                                <span class="text-sm text-gray-700 font-medium">Revenue</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-4 h-4 bg-gradient-to-r from-emerald-500 to-emerald-400 rounded-full mr-3"></div>
                                <span class="text-sm text-gray-700 font-medium">Profit</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-4 h-4 bg-gradient-to-r from-purple-500 to-purple-400 rounded-full mr-3"></div>
                                <span class="text-sm text-gray-700 font-medium">Expenses</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Enhanced Recent Activities Feed -->
            <div class="zoho-card animate-slide-up" style="animation-delay: 0.2s">
                <div class="p-6 border-b border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Activity Feed</h3>
                            <p class="text-gray-600 mt-1">Latest updates and activities</p>
                        </div>
                        <a href="#" class="zoho-btn zoho-btn-outline text-sm">View All</a>
                    </div>
                </div>
                <div class="p-6">
                    <div class="space-y-6">
                        @foreach([
                            ['user' => 'Admin User', 'action' => 'created a new page', 'item' => 'About Us', 'time' => '2 minutes ago', 'color' => 'blue', 'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
                            ['user' => 'John Doe', 'action' => 'updated blog post', 'item' => 'Web Design Trends 2024', 'time' => '15 minutes ago', 'color' => 'emerald', 'icon' => 'M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z'],
                            ['user' => 'Sarah Wilson', 'action' => 'added new service', 'item' => 'Mobile App Development', 'time' => '1 hour ago', 'color' => 'purple', 'icon' => 'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2V6'],
                            ['user' => 'Mike Johnson', 'action' => 'uploaded media files', 'item' => '5 new images', 'time' => '2 hours ago', 'color' => 'orange', 'icon' => 'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z'],
                            ['user' => 'Lisa Brown', 'action' => 'received inquiry from', 'item' => 'TechCorp Solutions', 'time' => '3 hours ago', 'color' => 'pink', 'icon' => 'M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
                        ] as $activity)
                        <div class="flex items-start space-x-4 p-4 rounded-xl hover:bg-gray-50 transition-all cursor-pointer group">
                            <div class="w-12 h-12 bg-gradient-to-br from-{{ $activity['color'] }}-500 to-{{ $activity['color'] }}-600 rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $activity['icon'] }}"></path>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-gray-900 font-medium">
                                    <span class="text-gray-700">{{ $activity['user'] }}</span>
                                    <span class="text-gray-600 font-normal">{{ $activity['action'] }}</span>
                                    <span class="text-blue-600 font-semibold">{{ $activity['item'] }}</span>
                                </p>
                                <div class="flex items-center mt-2 space-x-3">
                                    <span class="text-sm text-gray-500">{{ $activity['time'] }}</span>
                                    <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                                    <span class="text-sm text-{{ $activity['color'] }}-600 font-medium">{{ ucfirst($activity['color']) }} Priority</span>
                                </div>
                            </div>
                            <div class="opacity-0 group-hover:opacity-100 transition-opacity">
                                <button class="p-2 text-gray-400 hover:text-gray-600 rounded-lg hover:bg-white">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column - Enhanced Sidebar Widgets -->
        <div class="space-y-8">
            <!-- Enhanced Quick Actions -->
            <div class="zoho-card animate-slide-up" style="animation-delay: 0.3s">
                <div class="p-6 border-b border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900">Quick Actions</h3>
                    <p class="text-gray-600 mt-1">Get things done faster</p>
                </div>
                <div class="p-6">
                    <div class="space-y-3">
                        <a href="{{ route('admin.pages.create') }}" 
                           class="flex items-center p-4 bg-gradient-to-r from-blue-50 to-blue-100 rounded-xl hover:from-blue-100 hover:to-blue-200 transition-all group">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mr-4 shadow-lg group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">Create Page</p>
                                <p class="text-sm text-gray-600">Add new content page</p>
                            </div>
                        </a>

                        <a href="{{ route('admin.blog-posts.create') }}" 
                           class="flex items-center p-4 bg-gradient-to-r from-emerald-50 to-emerald-100 rounded-xl hover:from-emerald-100 hover:to-emerald-200 transition-all group">
                            <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center mr-4 shadow-lg group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">Write Blog</p>
                                <p class="text-sm text-gray-600">Publish new article</p>
                            </div>
                        </a>

                        <a href="{{ route('admin.services.create') }}" 
                           class="flex items-center p-4 bg-gradient-to-r from-purple-50 to-purple-100 rounded-xl hover:from-purple-100 hover:to-purple-200 transition-all group">
                            <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center mr-4 shadow-lg group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2V6"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">Add Service</p>
                                <p class="text-sm text-gray-600">Create new offering</p>
                            </div>
                        </a>

                        <a href="{{ route('admin.media.index') }}" 
                           class="flex items-center p-4 bg-gradient-to-r from-orange-50 to-orange-100 rounded-xl hover:from-orange-100 hover:to-orange-200 transition-all group">
                            <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center mr-4 shadow-lg group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900">Upload Media</p>
                                <p class="text-sm text-gray-600">Manage your files</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Enhanced System Health -->
            <div class="zoho-card animate-slide-up" style="animation-delay: 0.4s">
                <div class="p-6 border-b border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900">System Health</h3>
                    <p class="text-gray-600 mt-1">Real-time system monitoring</p>
                </div>
                <div class="p-6">
                    <div class="space-y-5">
                        <div class="flex items-center justify-between p-4 bg-green-50 rounded-xl">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-green-500 rounded-xl flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900">Server</p>
                                    <p class="text-sm text-gray-600">99.9% uptime</p>
                                </div>
                            </div>
                            <span class="text-sm text-green-700 font-bold">ONLINE</span>
                        </div>
                        
                        <div class="flex items-center justify-between p-4 bg-green-50 rounded-xl">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-green-500 rounded-xl flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10a2 2 0 002 2h12a2 2 0 002-2V7"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900">Database</p>
                                    <p class="text-sm text-gray-600">Fast queries</p>
                                </div>
                            </div>
                            <span class="text-sm text-green-700 font-bold">CONNECTED</span>
                        </div>
                        
                        <div class="flex items-center justify-between p-4 bg-yellow-50 rounded-xl">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-yellow-500 rounded-xl flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900">Storage</p>
                                    <p class="text-sm text-gray-600">2.1GB / 10GB</p>
                                </div>
                            </div>
                            <span class="text-sm text-yellow-700 font-bold">75%</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Enhanced Performance Widget -->
            <div class="zoho-card animate-slide-up" style="animation-delay: 0.5s">
                <div class="p-6 border-b border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900">Performance Score</h3>
                    <p class="text-gray-600 mt-1">Website optimization metrics</p>
                </div>
                <div class="p-6">
                    <!-- Circular Progress Chart -->
                    <div class="flex justify-center mb-6">
                        <div class="relative w-32 h-32">
                            <svg class="w-32 h-32 transform -rotate-90" viewBox="0 0 36 36">
                                <path d="M18 2.0845
                                    a 15.9155 15.9155 0 0 1 0 31.831
                                    a 15.9155 15.9155 0 0 1 0 -31.831"
                                    fill="none" stroke="#F3F4F6" stroke-width="3"/>
                                <path d="M18 2.0845
                                    a 15.9155 15.9155 0 0 1 0 31.831
                                    a 15.9155 15.9155 0 0 1 0 -31.831"
                                    fill="none" stroke="url(#gradient)" stroke-width="3"
                                    stroke-dasharray="85, 100" stroke-linecap="round"/>
                                <defs>
                                    <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="0%">
                                        <stop offset="0%" style="stop-color:#2563EB"/>
                                        <stop offset="100%" style="stop-color:#3B82F6"/>
                                    </linearGradient>
                                </defs>
                            </svg>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="text-center">
                                    <span class="text-2xl font-bold text-gray-900">85</span>
                                    <p class="text-xs text-gray-600">Score</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Performance Metrics -->
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-medium text-gray-700">Speed</span>
                            <span class="text-sm font-bold text-green-600">92%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-gradient-to-r from-green-400 to-green-500 h-2 rounded-full" style="width: 92%"></div>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-medium text-gray-700">SEO</span>
                            <span class="text-sm font-bold text-yellow-600">78%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-gradient-to-r from-yellow-400 to-yellow-500 h-2 rounded-full" style="width: 78%"></div>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-medium text-gray-700">Security</span>
                            <span class="text-sm font-bold text-green-600">96%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-gradient-to-r from-green-400 to-green-500 h-2 rounded-full" style="width: 96%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Enhanced Tasks Widget -->
            <div class="zoho-card animate-slide-up" style="animation-delay: 0.6s">
                <div class="p-6 border-b border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-bold text-gray-900">Today's Tasks</h3>
                            <p class="text-gray-600 mt-1">4 pending tasks</p>
                        </div>
                        <a href="#" class="zoho-btn zoho-btn-outline text-sm">View All</a>
                    </div>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        @foreach([
                            ['task' => 'Review pending blog posts', 'due' => 'Today, 3:00 PM', 'priority' => 'high', 'completed' => false],
                            ['task' => 'Update service descriptions', 'due' => 'Tomorrow, 10:00 AM', 'priority' => 'medium', 'completed' => false],
                            ['task' => 'Client meeting preparation', 'due' => 'Wed, 2:00 PM', 'priority' => 'high', 'completed' => true],
                            ['task' => 'Website backup schedule', 'due' => 'Thu, 9:00 AM', 'priority' => 'low', 'completed' => false],
                        ] as $index => $task)
                        <div class="flex items-start space-x-4 p-4 rounded-xl hover:bg-gray-50 transition-all {{ $task['completed'] ? 'opacity-60' : '' }}">
                            <div class="flex items-center mt-1">
                                <input type="checkbox" {{ $task['completed'] ? 'checked' : '' }} 
                                       class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                            </div>
                            <div class="flex-1">
                                <p class="font-medium text-gray-900 {{ $task['completed'] ? 'line-through' : '' }}">{{ $task['task'] }}</p>
                                <p class="text-sm text-gray-600 mt-1">{{ $task['due'] }}</p>
                            </div>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                                       {{ $task['priority'] === 'high' ? 'bg-red-100 text-red-700' : 
                                          ($task['priority'] === 'medium' ? 'bg-yellow-100 text-yellow-700' : 'bg-green-100 text-green-700') }}">
                                {{ ucfirst($task['priority']) }}
                            </span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection