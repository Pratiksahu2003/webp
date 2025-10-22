<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/css/dashboard.css', 'resources/js/app.js', 'resources/js/dashboard.js'])

    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Chart.js for enhanced charts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        * {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }
        
        /* ZOHO White Theme */
        .zoho-sidebar {
            background: #ffffff;
            border-right: 1px solid #e8e8e8;
            box-shadow: 2px 0 10px rgba(0,0,0,0.05);
        }
        
        .zoho-nav-item {
            color: #5a6c7d;
            border-radius: 8px;
            margin: 2px 8px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }
        
        .zoho-nav-item:hover {
            background-color: #f8f9fb;
            color: #2c5aa0;
            transform: translateX(4px);
        }
        
        .zoho-nav-item.active {
            background-color: #eef4ff;
            color: #2c5aa0;
            font-weight: 600;
            box-shadow: 0 2px 8px rgba(44, 90, 160, 0.15);
        }
        
        .zoho-nav-item.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 3px;
            background: #2c5aa0;
            border-radius: 0 3px 3px 0;
        }
        
        .zoho-content {
            background: #ffffff;
        }
        
        .zoho-header {
            background: #ffffff;
            border-bottom: 1px solid #f0f0f0;
            box-shadow: 0 1px 4px rgba(0,0,0,0.04);
        }
        
        .zoho-card {
            background: #ffffff;
            border: 1px solid #f0f0f0;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .zoho-card:hover {
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            transform: translateY(-2px);
        }
        
        .zoho-primary {
            background: linear-gradient(135deg, #2c5aa0 0%, #1e4080 100%);
            color: #ffffff;
        }
        
        .zoho-secondary {
            background: linear-gradient(135deg, #6c757d 0%, #5a6268 100%);
            color: #ffffff;
        }
        
        .zoho-success {
            background: linear-gradient(135deg, #28a745 0%, #20a83a 100%);
            color: #ffffff;
        }
        
        .zoho-info {
            background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
            color: #ffffff;
        }
        
        .zoho-warning {
            background: linear-gradient(135deg, #ffc107 0%, #e0a800 100%);
            color: #212529;
        }
        
        .zoho-danger {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            color: #ffffff;
        }
        
        .zoho-sidebar-scroll::-webkit-scrollbar {
            width: 6px;
        }
        
        .zoho-sidebar-scroll::-webkit-scrollbar-track {
            background: #f8f9fa;
        }
        
        .zoho-sidebar-scroll::-webkit-scrollbar-thumb {
            background: #d1d5db;
            border-radius: 3px;
        }
        
        .zoho-sidebar-scroll::-webkit-scrollbar-thumb:hover {
            background: #9ca3af;
        }
        
        /* Enhanced ZOHO Components */
        .zoho-stat-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fb 100%);
            border: 1px solid #e8e8e8;
            border-radius: 16px;
            padding: 24px;
            position: relative;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .zoho-stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #2c5aa0, #1e4080);
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .zoho-stat-card:hover::before {
            opacity: 1;
        }
        
        .zoho-stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 30px rgba(44, 90, 160, 0.15);
        }
        
        .zoho-metric {
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, #2c5aa0, #1e4080);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            line-height: 1;
        }
        
        .zoho-section-header {
            color: #374151;
            font-weight: 600;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            opacity: 0.8;
            margin-bottom: 16px;
        }
        
        .zoho-btn {
            display: inline-flex;
            align-items: center;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 500;
            font-size: 14px;
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: none;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }
        
        .zoho-btn-primary {
            background: linear-gradient(135deg, #2c5aa0 0%, #1e4080 100%);
            color: white;
            box-shadow: 0 4px 14px rgba(44, 90, 160, 0.3);
        }
        
        .zoho-btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(44, 90, 160, 0.4);
        }
        
        .zoho-btn-outline {
            background: transparent;
            color: #2c5aa0;
            border: 2px solid #2c5aa0;
        }
        
        .zoho-btn-outline:hover {
            background: #2c5aa0;
            color: white;
            transform: translateY(-1px);
        }
        
        /* Animation Classes */
        .animate-fade-in {
            animation: fadeIn 0.6s ease-out;
        }
        
        .animate-slide-up {
            animation: slideUp 0.6s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes slideUp {
            from { 
                opacity: 0;
                transform: translateY(20px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body class="h-full overflow-hidden" x-data="{ sidebarOpen: false }">
    <div class="flex h-full">
        <!-- Zoho-Style Sidebar -->
        <div class="zoho-sidebar w-64 flex-shrink-0 hidden lg:flex lg:flex-col">
            <!-- Sidebar Header -->
            <div class="flex items-center h-16 px-6 border-b border-gray-100">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-orange-600 to-orange-700 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                        </svg>
                    </div>
                    <div class="flex items-center">
                        <img src="{{ asset('logo/logo.png') }}" alt="VanTroZ Logo" class="h-8 w-auto mr-2">
                        <div>
                            <h1 class="text-gray-800 font-bold text-xl">VanTroZ</h1>
                            <p class="text-gray-500 text-xs font-medium">Admin Panel</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 px-4 py-4 space-y-1 overflow-y-auto zoho-sidebar-scroll">
                <!-- Dashboard -->
                <a href="{{ route('admin.dashboard') }}" 
                   class="zoho-nav-item flex items-center px-3 py-2.5 text-sm font-medium rounded-md {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z"></path>
                    </svg>
                    Home
                </a>

                <!-- Content Management -->
                <div class="pt-4">
                    <p class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">Content</p>
                    <div class="mt-2 space-y-1">
                        <a href="{{ route('admin.pages.index') }}" 
                           class="zoho-nav-item flex items-center px-3 py-2.5 text-sm font-medium rounded-md {{ request()->routeIs('admin.pages.*') ? 'active' : '' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Pages
                        </a>

                        <a href="{{ route('admin.blog-posts.index') }}" 
                           class="zoho-nav-item flex items-center px-3 py-2.5 text-sm font-medium rounded-md {{ request()->routeIs('admin.blog-posts.*') ? 'active' : '' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Blog Posts
                        </a>

                        <a href="{{ route('admin.services.index') }}" 
                           class="zoho-nav-item flex items-center px-3 py-2.5 text-sm font-medium rounded-md {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2V6"></path>
                            </svg>
                            Services
                        </a>

                        <a href="{{ route('admin.sections.index') }}" 
                           class="zoho-nav-item flex items-center px-3 py-2.5 text-sm font-medium rounded-md {{ request()->routeIs('admin.sections.*') ? 'active' : '' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                            </svg>
                            Sections
                        </a>

                        <a href="{{ route('admin.case-studies.index') }}" 
                           class="zoho-nav-item flex items-center px-3 py-2.5 text-sm font-medium rounded-md {{ request()->routeIs('admin.case-studies.*') ? 'active' : '' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                            Case Studies
                        </a>

                        <a href="{{ route('admin.testimonials.index') }}" 
                           class="zoho-nav-item flex items-center px-3 py-2.5 text-sm font-medium rounded-md {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                            Testimonials
                        </a>

                        <a href="{{ route('admin.clients.index') }}" 
                           class="zoho-nav-item flex items-center px-3 py-2.5 text-sm font-medium rounded-md {{ request()->routeIs('admin.clients.*') ? 'active' : '' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H2v-2a3 3 0 015.356-1.857M17 20v-2c0-.653-.146-1.28-.423-1.857M7 20v-2c0-.653.146-1.28.423-1.857M11 16a3 3 0 10-6 0 3 3 0 006 0zm3.5-7.5a3 3 0 10-6 0 3 3 0 006 0z"></path>
                            </svg>
                            Clients
                        </a>

                        <a href="{{ route('admin.technologies.index') }}" 
                           class="zoho-nav-item flex items-center px-3 py-2.5 text-sm font-medium rounded-md {{ request()->routeIs('admin.technologies.*') ? 'active' : '' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-2-1m0 0l-2 1m2-1V9a2 2 0 012-2h2a2 2 0 012 2v3m-2 0h2m-2 0h-2m9-2V9a2 2 0 00-2-2H7a2 2 0 00-2 2v5a2 2 0 002 2h2m-2 0h2m-2 0h-2m9-2V9a2 2 0 00-2-2H7a2 2 0 00-2 2v5a2 2 0 002 2h2m-2 0h2m-2 0h-2"></path>
                            </svg>
                            Technologies
                        </a>
                    </div>
                </div>

                <!-- Media -->
                <div class="pt-4">
                    <p class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">Media</p>
                    <div class="mt-2 space-y-1">
                        <a href="{{ route('admin.media.index') }}" 
                           class="zoho-nav-item flex items-center px-3 py-2.5 text-sm font-medium rounded-md {{ request()->routeIs('admin.media.*') ? 'active' : '' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Media Library
                        </a>
                    </div>
                </div>

                <!-- Tools -->
                <div class="pt-4">
                    <p class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">Tools</p>
                    <div class="mt-2 space-y-1">
                        <a href="{{ route('admin.tools.system-info') }}" 
                           class="zoho-nav-item flex items-center px-3 py-2.5 text-sm font-medium rounded-md {{ request()->routeIs('admin.tools.system-info') ? 'active' : '' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                            System Info
                        </a>

                        <a href="{{ route('admin.tools.database') }}" 
                           class="zoho-nav-item flex items-center px-3 py-2.5 text-sm font-medium rounded-md {{ request()->routeIs('admin.tools.database') ? 'active' : '' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10a2 2 0 002 2h12a2 2 0 002-2V7m-4 0V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v2M9 20h6"></path>
                            </svg>
                            Database
                        </a>

                        <a href="{{ route('admin.tools.export') }}" 
                           class="zoho-nav-item flex items-center px-3 py-2.5 text-sm font-medium rounded-md {{ request()->routeIs('admin.tools.export') ? 'active' : '' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                            </svg>
                            Export
                        </a>

                        <a href="{{ route('admin.tools.import') }}" 
                           class="zoho-nav-item flex items-center px-3 py-2.5 text-sm font-medium rounded-md {{ request()->routeIs('admin.tools.import') ? 'active' : '' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                            </svg>
                            Import
                        </a>
                    </div>
                </div>

                <!-- Settings -->
                <div class="pt-4 pb-4">
                    <p class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">Settings</p>
                    <div class="mt-2 space-y-1">
                        <a href="{{ route('admin.settings.index') }}" 
                           class="zoho-nav-item flex items-center px-3 py-2.5 text-sm font-medium rounded-md {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Settings
                        </a>

                        <a href="{{ route('admin.profile.edit') }}" 
                           class="zoho-nav-item flex items-center px-3 py-2.5 text-sm font-medium rounded-md {{ request()->routeIs('admin.profile.*') ? 'active' : '' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Profile
                        </a>
                    </div>
                </div>
            </nav>
        </div>

        <!-- Mobile Sidebar -->
        <div x-show="sidebarOpen" class="lg:hidden fixed inset-0 z-50">
            <div class="fixed inset-0 bg-black bg-opacity-50" @click="sidebarOpen = false"></div>
            <div class="zoho-sidebar w-64 h-full overflow-y-auto">
                <!-- Mobile Sidebar Content (same as desktop) -->
                <div class="flex items-center h-16 px-4 border-b border-gray-100">
                    <div class="flex items-center justify-between w-full">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-orange-600 to-orange-700 rounded-xl flex items-center justify-center shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                                </svg>
                            </div>
                            <div class="flex items-center">
                                <img src="{{ asset('logo/logo.png') }}" alt="VanTroZ Logo" class="h-8 w-auto mr-2">
                                <div>
                                    <h1 class="text-gray-800 font-bold text-xl">VanTroZ</h1>
                                    <p class="text-gray-500 text-xs font-medium">Admin Panel</p>
                                </div>
                            </div>
                        </div>
                        <button @click="sidebarOpen = false" class="text-gray-600 hover:text-gray-800 p-1 rounded-md hover:bg-gray-100">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <nav class="flex-1 px-4 py-4 space-y-1">
                    <!-- Same navigation as desktop -->
                    <a href="{{ route('admin.dashboard') }}" 
                       class="zoho-nav-item flex items-center px-3 py-2.5 text-sm font-medium rounded-md {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z"></path>
                        </svg>
                        Home
                    </a>
                    <!-- Add other mobile nav items here -->
                </nav>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Zoho Header -->
            <header class="zoho-header h-16 flex items-center justify-between px-6">
                <div class="flex items-center space-x-4">
                    <button @click="sidebarOpen = true" class="lg:hidden p-2 rounded-md text-gray-500 hover:text-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                    <div>
                        <h1 class="text-xl font-semibold text-gray-900">@yield('page-title', 'Dashboard')</h1>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <!-- Search -->
                    <div class="relative hidden md:block">
                        <input type="text" placeholder="Search everything..." 
                               class="w-80 pl-11 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent focus:bg-white transition-all duration-200">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- User Menu -->
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" 
                                class="flex items-center space-x-3 p-2 rounded-md hover:bg-gray-100">
                            <img class="w-8 h-8 rounded-full" 
                                 src="https://www.gravatar.com/avatar/{{ md5(auth()->user()->email) }}?d=mp" 
                                 alt="User Avatar">
                            <span class="hidden md:block text-sm font-medium text-gray-700">{{ auth()->user()->name }}</span>
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <div x-show="open" @click.away="open = false" 
                             class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg border border-gray-200 z-50">
                            <div class="py-1">
                                <a href="{{ route('admin.profile.edit') }}" 
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                                <a href="{{ route('admin.settings.index') }}" 
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                                <div class="border-t border-gray-100"></div>
                                <form method="POST" action="{{ route('admin.logout') }}">
                                    @csrf
                                    <button type="submit" 
                                            class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Sign out
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Content Area -->
            <main class="flex-1 overflow-auto zoho-content">
                <!-- Flash Messages -->
                @if(session('success'))
                    <div class="mx-6 mt-4 mb-4 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-md">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-3 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span>{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mx-6 mt-4 mb-4 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-md">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-3 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                            </svg>
                            <span>{{ session('error') }}</span>
                        </div>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>