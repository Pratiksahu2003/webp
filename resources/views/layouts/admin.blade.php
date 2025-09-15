<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-white">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        .sidebar-scroll {
            scrollbar-width: thin;
            scrollbar-color: rgb(156 163 175) transparent;
        }
        
        .sidebar-scroll::-webkit-scrollbar {
            width: 6px;
        }
        
        .sidebar-scroll::-webkit-scrollbar-track {
            background: transparent;
        }
        
        .sidebar-scroll::-webkit-scrollbar-thumb {
            background-color: rgb(156 163 175);
            border-radius: 3px;
        }
        
        .sidebar-scroll::-webkit-scrollbar-thumb:hover {
            background-color: rgb(107 114 128);
        }
    </style>
</head>
<body class="bg-white antialiased" x-data="{ sidebarOpen: false }">
    <div class="flex h-screen">
        <!-- Mobile Overlay -->
        <div x-show="sidebarOpen" 
             x-cloak
             x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-50 lg:hidden"
             @click="sidebarOpen = false">
            <div class="fixed inset-0 bg-black bg-opacity-50"></div>
        </div>

        <!-- Modern White Sidebar -->
        <aside class="w-72 bg-white shadow-xl flex-shrink-0 lg:flex flex-col hidden transform transition-transform duration-300 ease-in-out lg:translate-x-0 h-screen overflow-hidden border-r border-gray-200"
               :class="{ '-translate-x-full': !sidebarOpen, 'translate-x-0': sidebarOpen }">
            
            <!-- Mobile Sidebar -->
            <div x-show="sidebarOpen" 
                 class="lg:hidden fixed inset-y-0 left-0 z-50 w-72 bg-white shadow-2xl flex flex-col transform transition-transform duration-300 ease-in-out overflow-hidden border-r border-gray-200"
                 x-transition:enter="transition-transform ease-in-out duration-300"
                 x-transition:enter-start="-translate-x-full"
                 x-transition:enter-end="translate-x-0"
                 x-transition:leave="transition-transform ease-in-out duration-300"
                 x-transition:leave-start="translate-x-0"
                 x-transition:leave-end="-translate-x-full">
                
                <!-- Brand Header -->
                <div class="flex items-center justify-between h-20 px-6 border-b border-gray-200 bg-gradient-to-r from-gray-50 to-indigo-50">
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <div class="w-12 h-12 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <div class="absolute -top-1 -right-1 w-4 h-4 bg-green-400 rounded-full border-2 border-white"></div>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900">WEZOM</h1>
                            <p class="text-sm text-indigo-600 font-medium">Content Management System</p>
                        </div>
                    </div>
                    <button @click="sidebarOpen = false" class="text-gray-400 hover:text-gray-600 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                
                <!-- Mobile Navigation -->
                <nav class="sidebar-scroll flex-1 px-6 py-8 space-y-2 overflow-y-auto min-h-0">
                    <!-- Dashboard -->
                    <a href="{{ route('admin.dashboard') }}" 
                       class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-indigo-500 to-purple-600 text-white shadow-lg shadow-indigo-500/30' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                        <div class="w-6 h-6 mr-3 flex-shrink-0">
                            <svg class="w-6 h-6 {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-gray-400 group-hover:text-gray-700' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z"></path>
                            </svg>
                        </div>
                        Dashboard
                    </a>
                    
                    <!-- Content Management Section -->
                    <div class="pt-8">
                        <h3 class="px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-4 flex items-center">
                            <span class="w-8 h-px bg-gray-300 mr-3"></span>
                            Content Management
                        </h3>
                        
                        <div class="space-y-1">
                            <a href="{{ route('admin.pages.index') }}" 
                               class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.pages.*') ? 'bg-gradient-to-r from-indigo-500 to-purple-600 text-white shadow-lg shadow-indigo-500/30' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                                <div class="w-6 h-6 mr-3 flex-shrink-0">
                                    <svg class="w-6 h-6 {{ request()->routeIs('admin.pages.*') ? 'text-white' : 'text-gray-400 group-hover:text-gray-700' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                Pages
                            </a>
                            
                            <a href="{{ route('admin.services.index') }}" 
                               class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.services.*') ? 'bg-gradient-to-r from-indigo-500 to-purple-600 text-white shadow-lg shadow-indigo-500/30' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                                <div class="w-6 h-6 mr-3 flex-shrink-0">
                                    <svg class="w-6 h-6 {{ request()->routeIs('admin.services.*') ? 'text-white' : 'text-gray-400 group-hover:text-gray-700' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2V6"></path>
                                    </svg>
                                </div>
                                Services
                            </a>
                            
                            <a href="{{ route('admin.blog-posts.index') }}" 
                               class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.blog-posts.*') ? 'bg-gradient-to-r from-indigo-500 to-purple-600 text-white shadow-lg shadow-indigo-500/30' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                                <div class="w-6 h-6 mr-3 flex-shrink-0">
                                    <svg class="w-6 h-6 {{ request()->routeIs('admin.blog-posts.*') ? 'text-white' : 'text-gray-400 group-hover:text-gray-700' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </div>
                                Blog Posts
                            </a>
                        </div>
                    </div>
                    
                    <!-- Settings Section -->
                    <div class="pt-8">
                        <h3 class="px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-4 flex items-center">
                            <span class="w-8 h-px bg-gray-300 mr-3"></span>
                            Settings
                        </h3>
                        
                        <div class="space-y-1">
                            <a href="{{ route('admin.settings.index') }}" 
                               class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.settings.*') ? 'bg-gradient-to-r from-indigo-500 to-purple-600 text-white shadow-lg shadow-indigo-500/30' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                                <div class="w-6 h-6 mr-3 flex-shrink-0">
                                    <svg class="w-6 h-6 {{ request()->routeIs('admin.settings.*') ? 'text-white' : 'text-gray-400 group-hover:text-gray-700' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                Settings
                            </a>
                            
                            <a href="{{ route('admin.profile.edit') }}" 
                               class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.profile.*') ? 'bg-gradient-to-r from-indigo-500 to-purple-600 text-white shadow-lg shadow-indigo-500/30' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                                <div class="w-6 h-6 mr-3 flex-shrink-0">
                                    <svg class="w-6 h-6 {{ request()->routeIs('admin.profile.*') ? 'text-white' : 'text-gray-400 group-hover:text-gray-700' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                Profile
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            
            <!-- Desktop Brand Header -->
            <div class="flex items-center h-20 px-6 border-b border-gray-200 bg-gradient-to-r from-gray-50 to-indigo-50">
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <div class="w-12 h-12 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <div class="absolute -top-1 -right-1 w-4 h-4 bg-green-400 rounded-full border-2 border-white"></div>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">WEZOM</h1>
                        <p class="text-sm text-indigo-600 font-medium">Content Management System</p>
                    </div>
                </div>
            </div>
            
            <!-- Desktop Navigation -->
            <nav class="sidebar-scroll flex-1 px-6 py-8 space-y-2 overflow-y-auto min-h-0">
                <!-- Dashboard -->
                <a href="{{ route('admin.dashboard') }}" 
                   class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-indigo-500 to-purple-600 text-white shadow-lg shadow-indigo-500/30' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                    <div class="w-6 h-6 mr-3 flex-shrink-0">
                        <svg class="w-6 h-6 {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-gray-400 group-hover:text-gray-700' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z"></path>
                        </svg>
                    </div>
                        Dashboard
                    <div class="ml-auto">
                        <div class="w-2 h-2 bg-green-400 rounded-full {{ request()->routeIs('admin.dashboard') ? 'block' : 'hidden' }}"></div>
                    </div>
                </a>
                
                <!-- Content Management Section -->
                <div class="pt-8">
                    <h3 class="px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-4 flex items-center">
                        <span class="w-8 h-px bg-gray-300 mr-3"></span>
                        Content Management
                    </h3>
                    
                    <div class="space-y-1">
                        <a href="{{ route('admin.pages.index') }}" 
                           class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.pages.*') ? 'bg-gradient-to-r from-indigo-500 to-purple-600 text-white shadow-lg shadow-indigo-500/30' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                            <div class="w-6 h-6 mr-3 flex-shrink-0">
                                <svg class="w-6 h-6 {{ request()->routeIs('admin.pages.*') ? 'text-white' : 'text-gray-400 group-hover:text-gray-700' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                            </div>
                        Pages
                            <div class="ml-auto">
                                <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded-full">12</span>
                            </div>
                        </a>
                        
                        <a href="{{ route('admin.sections.index') }}" 
                           class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.sections.*') ? 'bg-gradient-to-r from-indigo-500 to-purple-600 text-white shadow-lg shadow-indigo-500/30' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                            <div class="w-6 h-6 mr-3 flex-shrink-0">
                                <svg class="w-6 h-6 {{ request()->routeIs('admin.sections.*') ? 'text-white' : 'text-gray-400 group-hover:text-gray-700' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                        </svg>
                            </div>
                        Sections
                    </a>
                        
                        <a href="{{ route('admin.services.index') }}" 
                           class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.services.*') ? 'bg-gradient-to-r from-indigo-500 to-purple-600 text-white shadow-lg shadow-indigo-500/30' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                            <div class="w-6 h-6 mr-3 flex-shrink-0">
                                <svg class="w-6 h-6 {{ request()->routeIs('admin.services.*') ? 'text-white' : 'text-gray-400 group-hover:text-gray-700' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2V6"></path>
                        </svg>
                            </div>
                        Services
                    </a>
                        
                        <a href="{{ route('admin.case-studies.index') }}" 
                           class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.case-studies.*') ? 'bg-gradient-to-r from-indigo-500 to-purple-600 text-white shadow-lg shadow-indigo-500/30' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                            <div class="w-6 h-6 mr-3 flex-shrink-0">
                                <svg class="w-6 h-6 {{ request()->routeIs('admin.case-studies.*') ? 'text-white' : 'text-gray-400 group-hover:text-gray-700' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-2-1m0 0l-2 1m2-1V9a2 2 0 012-2h2a2 2 0 012 2v3m-2 0h2m-2 0h-2m9-2V9a2 2 0 00-2-2H7a2 2 0 00-2 2v5a2 2 0 002 2h2m-2 0h2m-2 0h-2m9-2V9a2 2 0 00-2-2H7a2 2 0 00-2 2v5a2 2 0 002 2h2m-2 0h2m-2 0h-2"></path>
                        </svg>
                            </div>
                        Case Studies
                    </a>
                        
                        <a href="{{ route('admin.technologies.index') }}" 
                           class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.technologies.*') ? 'bg-gradient-to-r from-indigo-500 to-purple-600 text-white shadow-lg shadow-indigo-500/30' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                            <div class="w-6 h-6 mr-3 flex-shrink-0">
                                <svg class="w-6 h-6 {{ request()->routeIs('admin.technologies.*') ? 'text-white' : 'text-gray-400 group-hover:text-gray-700' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>
                            </div>
                            Technologies
                        </a>
                        
                        <a href="{{ route('admin.testimonials.index') }}" 
                           class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.testimonials.*') ? 'bg-gradient-to-r from-indigo-500 to-purple-600 text-white shadow-lg shadow-indigo-500/30' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                            <div class="w-6 h-6 mr-3 flex-shrink-0">
                                <svg class="w-6 h-6 {{ request()->routeIs('admin.testimonials.*') ? 'text-white' : 'text-gray-400 group-hover:text-gray-700' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                            </div>
                            Testimonials
                        </a>
                        
                        <a href="{{ route('admin.blog-posts.index') }}" 
                           class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.blog-posts.*') ? 'bg-gradient-to-r from-indigo-500 to-purple-600 text-white shadow-lg shadow-indigo-500/30' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                            <div class="w-6 h-6 mr-3 flex-shrink-0">
                                <svg class="w-6 h-6 {{ request()->routeIs('admin.blog-posts.*') ? 'text-white' : 'text-gray-400 group-hover:text-gray-700' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                            </div>
                        Blog Posts
                    </a>
                        
                        <a href="{{ route('admin.clients.index') }}" 
                           class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.clients.*') ? 'bg-gradient-to-r from-indigo-500 to-purple-600 text-white shadow-lg shadow-indigo-500/30' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                            <div class="w-6 h-6 mr-3 flex-shrink-0">
                                <svg class="w-6 h-6 {{ request()->routeIs('admin.clients.*') ? 'text-white' : 'text-gray-400 group-hover:text-gray-700' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H2v-2a3 3 0 015.356-1.857M17 20v-2c0-.653-.146-1.28-.423-1.857M7 20v-2c0-.653.146-1.28.423-1.857M11 16a3 3 0 10-6 0 3 3 0 006 0zm3.5-7.5a3 3 0 10-6 0 3 3 0 006 0z"></path>
                                </svg>
                            </div>
                            Clients
                        </a>
                    </div>
                </div>
                
                <!-- Media Library -->
                <div class="pt-8">
                    <h3 class="px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-4 flex items-center">
                        <span class="w-8 h-px bg-gray-300 mr-3"></span>
                        Assets
                    </h3>
                    <a href="{{ route('admin.media.index') }}" 
                       class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.media.*') ? 'bg-gradient-to-r from-indigo-500 to-purple-600 text-white shadow-lg shadow-indigo-500/30' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                        <div class="w-6 h-6 mr-3 flex-shrink-0">
                            <svg class="w-6 h-6 {{ request()->routeIs('admin.media.*') ? 'text-white' : 'text-gray-400 group-hover:text-gray-700' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        </div>
                        Media Library
                    </a>
                </div>
                
                <!-- Tools Section -->
                <div class="pt-8">
                    <h3 class="px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-4 flex items-center">
                        <span class="w-8 h-px bg-gray-300 mr-3"></span>
                        Tools
                    </h3>
                    <div class="space-y-1">
                        <a href="{{ route('admin.tools.system-info') }}" 
                           class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.tools.system-info') ? 'bg-gradient-to-r from-indigo-500 to-purple-600 text-white shadow-lg shadow-indigo-500/30' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                            <div class="w-6 h-6 mr-3 flex-shrink-0">
                                <svg class="w-6 h-6 {{ request()->routeIs('admin.tools.system-info') ? 'text-white' : 'text-gray-400 group-hover:text-gray-700' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-2-1m0 0l-2 1m2-1V9a2 2 0 012-2h2a2 2 0 012 2v3m-2 0h2m-2 0h-2m9-2V9a2 2 0 00-2-2H7a2 2 0 00-2 2v5a2 2 0 002 2h2m-2 0h2m-2 0h-2m9-2V9a2 2 0 00-2-2H7a2 2 0 00-2 2v5a2 2 0 002 2h2m-2 0h2m-2 0h-2"></path>
                                </svg>
                            </div>
                            System Info
                        </a>
                        <a href="{{ route('admin.tools.database') }}" 
                           class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.tools.database') ? 'bg-gradient-to-r from-indigo-500 to-purple-600 text-white shadow-lg shadow-indigo-500/30' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                            <div class="w-6 h-6 mr-3 flex-shrink-0">
                                <svg class="w-6 h-6 {{ request()->routeIs('admin.tools.database') ? 'text-white' : 'text-gray-400 group-hover:text-gray-700' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10a2 2 0 002 2h12a2 2 0 002-2V7m-4 0V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v2M9 20h6"></path>
                        </svg>
                            </div>
                            Database
                        </a>
                        <a href="{{ route('admin.tools.export') }}" 
                           class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.tools.export') ? 'bg-gradient-to-r from-indigo-500 to-purple-600 text-white shadow-lg shadow-indigo-500/30' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                            <div class="w-6 h-6 mr-3 flex-shrink-0">
                                <svg class="w-6 h-6 {{ request()->routeIs('admin.tools.export') ? 'text-white' : 'text-gray-400 group-hover:text-gray-700' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                        </svg>
                            </div>
                            Export Data
                        </a>
                        <a href="{{ route('admin.tools.import') }}" 
                           class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.tools.import') ? 'bg-gradient-to-r from-indigo-500 to-purple-600 text-white shadow-lg shadow-indigo-500/30' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                            <div class="w-6 h-6 mr-3 flex-shrink-0">
                                <svg class="w-6 h-6 {{ request()->routeIs('admin.tools.import') ? 'text-white' : 'text-gray-400 group-hover:text-gray-700' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                        </svg>
                            </div>
                            Import Data
                    </a>
                    </div>
                </div>
                
                <!-- Settings Section -->
                <div class="pt-8">
                    <h3 class="px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-4 flex items-center">
                        <span class="w-8 h-px bg-gray-300 mr-3"></span>
                        Account
                    </h3>
                    
                    <div class="space-y-1">
                        <a href="{{ route('admin.settings.index') }}" 
                           class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.settings.*') ? 'bg-gradient-to-r from-indigo-500 to-purple-600 text-white shadow-lg shadow-indigo-500/30' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                            <div class="w-6 h-6 mr-3 flex-shrink-0">
                                <svg class="w-6 h-6 {{ request()->routeIs('admin.settings.*') ? 'text-white' : 'text-gray-400 group-hover:text-gray-700' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                            </div>
                        Settings
                    </a>
                        
                        <a href="{{ route('admin.profile.edit') }}" 
                           class="group flex items-center px-4 py-3 text-sm font-medium rounded-xl transition-all duration-200 {{ request()->routeIs('admin.profile.*') ? 'bg-gradient-to-r from-indigo-500 to-purple-600 text-white shadow-lg shadow-indigo-500/30' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900' }}">
                            <div class="w-6 h-6 mr-3 flex-shrink-0">
                                <svg class="w-6 h-6 {{ request()->routeIs('admin.profile.*') ? 'text-white' : 'text-gray-400 group-hover:text-gray-700' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            Profile
                        </a>
                    </div>
                </div>
            </nav>
        </aside>

        <!-- Main Content Area -->
        <main class="flex-1 flex flex-col bg-white h-screen overflow-hidden">
            <!-- Top Header Bar -->
            <header class="bg-white border-b border-gray-200 px-4 py-4 lg:px-6 flex items-center justify-between shadow-sm">
                <!-- Mobile Menu Button + Title -->
                <div class="flex items-center space-x-4">
                    <button @click="sidebarOpen = true" 
                            class="lg:hidden p-2 rounded-lg text-gray-600 hover:text-gray-900 hover:bg-gray-100 transition-all">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">@yield('page-title', 'Dashboard')</h1>
                        <p class="text-sm text-gray-600">Welcome back, {{ auth()->user()->name }}</p>
                    </div>
                </div>
                
                <!-- Header Actions -->
                <div class="flex items-center space-x-4">
                    <!-- Search -->
                    <div class="hidden sm:block relative">
                        <input type="text" 
                               placeholder="Search..." 
                               class="w-64 pl-10 pr-4 py-2 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white transition-all">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
        </div>

                    <!-- Notifications -->
                    <button class="p-2 rounded-xl bg-gray-50 text-gray-600 hover:text-gray-900 hover:bg-gray-100 transition-all relative">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5zm-6 0H3l6 5v-5z"></path>
                        </svg>
                        <span class="absolute -top-1 -right-1 w-3 h-3 bg-red-500 rounded-full"></span>
                    </button>
                    
                    <!-- Visit Website -->
                    <a href="{{ route('home') }}" 
                       target="_blank" 
                       class="hidden sm:flex items-center px-4 py-2 bg-gray-50 text-gray-700 rounded-xl hover:bg-gray-100 transition-all">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                        </svg>
                        Visit Site
                    </a>
                    
                    <!-- User Dropdown -->
                    <div x-data="{ dropdownOpen: false }" class="relative">
                        <button @click="dropdownOpen = !dropdownOpen" class="flex items-center space-x-2 p-2 rounded-xl bg-gray-50 hover:bg-gray-100 transition-all">
                            <img class="w-8 h-8 rounded-full" src="https://www.gravatar.com/avatar/{{ md5(auth()->user()->email) }}?d=mp" alt="User Avatar">
                            <span class="font-medium text-gray-800 hidden md:block">{{ auth()->user()->name }}</span>
                            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        
                        <div x-show="dropdownOpen" @click.away="dropdownOpen = false" x-transition class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg border border-gray-200 z-20">
                            <div class="py-1">
                                <a href="{{ route('admin.profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Profile
                                </a>
                                <a href="{{ route('admin.settings.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Settings
                                </a>
                                <form method="POST" action="{{ route('admin.logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                        Log Out
                                    </button>
                                </form>
                                </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content with White Background -->
            <div class="flex-1 overflow-y-auto p-6 bg-white">
                <!-- Flash Messages -->
                @if(session('success'))
                    <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-6 py-4 rounded-xl shadow-sm">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-3 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="font-medium">{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-6 bg-red-50 border border-red-200 text-red-800 px-6 py-4 rounded-xl shadow-sm">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-3 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="font-medium">{{ session('error') }}</span>
                        </div>
                    </div>
                @endif

                @yield('content')
            </div>
            </main>
    </div>
</body>
</html>