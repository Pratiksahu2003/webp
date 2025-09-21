@extends('layouts.admin')

@section('page-title', 'Modern Page Builder')

@section('content')
<div x-data="modernPageBuilder()" class="h-full bg-gray-50">
    <!-- Modern Page Builder Header -->
    <div class="bg-white border-b border-gray-200 px-6 py-4 shadow-sm">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Modern Page Builder</h1>
                    <p class="text-gray-600 mt-1">Create stunning pages with drag & drop components</p>
                </div>
                <div class="flex items-center space-x-2">
                    <div class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-medium">
                        <span x-show="!hasUnsavedChanges">Saved</span>
                        <span x-show="hasUnsavedChanges">Unsaved Changes</span>
                    </div>
                </div>
            </div>
            <div class="flex items-center space-x-3">
                <!-- Responsive Preview Toggle -->
                <div class="flex items-center space-x-1 bg-gray-100 rounded-lg p-1">
                    <button @click="previewMode = 'desktop'" :class="previewMode === 'desktop' ? 'bg-white shadow-sm' : ''" class="px-3 py-1 text-sm font-medium text-gray-700 rounded-md transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </button>
                    <button @click="previewMode = 'tablet'" :class="previewMode === 'tablet' ? 'bg-white shadow-sm' : ''" class="px-3 py-1 text-sm font-medium text-gray-700 rounded-md transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                    </button>
                    <button @click="previewMode = 'mobile'" :class="previewMode === 'mobile' ? 'bg-white shadow-sm' : ''" class="px-3 py-1 text-sm font-medium text-gray-700 rounded-md transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                    </button>
                </div>
                
                <button @click="previewMode = previewMode === 'preview' ? 'desktop' : 'preview'" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition-colors">
                    <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                    <span x-text="previewMode === 'preview' ? 'Edit' : 'Preview'"></span>
                </button>
                
                <button @click="savePage()" :disabled="saving" class="px-6 py-2 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white rounded-lg transition-all duration-200 flex items-center shadow-lg hover:shadow-xl">
                    <svg x-show="!saving" class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3-3m0 0l-3 3m3-3v12"></path>
                    </svg>
                    <svg x-show="saving" class="w-4 h-4 mr-2 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                    <span x-text="saving ? 'Saving...' : 'Save Page'"></span>
                </button>
            </div>
        </div>
    </div>

    <div class="flex h-full">
        <!-- Enhanced Components Sidebar -->
        <div x-show="previewMode !== 'preview'" class="w-80 bg-white border-r border-gray-200 overflow-y-auto shadow-sm">
            <div class="p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-900">Components</h3>
                    <div class="flex items-center space-x-2">
                        <button @click="showComponentCategories = !showComponentCategories" class="text-gray-400 hover:text-gray-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                
                <!-- Search Components -->
                <div class="mb-6">
                    <div class="relative">
                        <input x-model="componentSearch" type="text" placeholder="Search components..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>

                <!-- Hero Components -->
                <div class="mb-6">
                    <h4 class="text-sm font-medium text-gray-700 mb-3 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        Hero Sections
                    </h4>
                    <div class="grid grid-cols-2 gap-3">
                        <div @click="addComponent('hero-default')" class="cursor-pointer p-3 border border-gray-200 rounded-lg hover:border-blue-300 hover:bg-blue-50 transition-all duration-200 group">
                            <div class="w-full h-12 bg-gradient-to-r from-blue-500 to-purple-600 rounded mb-2 flex items-center justify-center">
                                <svg class="w-6 h-6 text-white opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </div>
                            <p class="text-xs text-gray-600 text-center font-medium">Default Hero</p>
                        </div>
                        <div @click="addComponent('hero-video')" class="cursor-pointer p-3 border border-gray-200 rounded-lg hover:border-blue-300 hover:bg-blue-50 transition-all duration-200 group">
                            <div class="w-full h-12 bg-gradient-to-r from-gray-800 to-gray-600 rounded mb-2 flex items-center justify-center">
                                <svg class="w-6 h-6 text-white opacity-0 group-hover:opacity-100 transition-opacity" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </div>
                            <p class="text-xs text-gray-600 text-center font-medium">Video Hero</p>
                        </div>
                        <div @click="addComponent('hero-parallax')" class="cursor-pointer p-3 border border-gray-200 rounded-lg hover:border-blue-300 hover:bg-blue-50 transition-all duration-200 group">
                            <div class="w-full h-12 bg-gradient-to-r from-green-500 to-blue-600 rounded mb-2 flex items-center justify-center">
                                <svg class="w-6 h-6 text-white opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path>
                                </svg>
                            </div>
                            <p class="text-xs text-gray-600 text-center font-medium">Parallax Hero</p>
                        </div>
                        <div @click="addComponent('hero-minimal')" class="cursor-pointer p-3 border border-gray-200 rounded-lg hover:border-blue-300 hover:bg-blue-50 transition-all duration-200 group">
                            <div class="w-full h-12 bg-gradient-to-r from-gray-100 to-gray-200 rounded mb-2 flex items-center justify-center">
                                <svg class="w-6 h-6 text-gray-600 opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                                </svg>
                            </div>
                            <p class="text-xs text-gray-600 text-center font-medium">Minimal Hero</p>
                        </div>
                    </div>
                </div>

                <!-- Content Components -->
                <div class="mb-6">
                    <h4 class="text-sm font-medium text-gray-700 mb-3 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Content Blocks
                    </h4>
                    <div class="space-y-3">
                        <div @click="addComponent('text-block')" class="cursor-pointer p-3 border border-gray-200 rounded-lg hover:border-blue-300 hover:bg-blue-50 transition-all duration-200 group">
                            <div class="space-y-2">
                                <div class="w-3/4 h-2 bg-gray-300 rounded"></div>
                                <div class="w-full h-2 bg-gray-200 rounded"></div>
                                <div class="w-2/3 h-2 bg-gray-200 rounded"></div>
                            </div>
                            <p class="text-xs text-gray-600 mt-2 font-medium">Rich Text Block</p>
                        </div>
                        <div @click="addComponent('image-text')" class="cursor-pointer p-3 border border-gray-200 rounded-lg hover:border-blue-300 hover:bg-blue-50 transition-all duration-200 group">
                            <div class="flex space-x-2">
                                <div class="w-1/3 h-8 bg-gray-300 rounded"></div>
                                <div class="w-2/3 space-y-1">
                                    <div class="w-full h-1 bg-gray-200 rounded"></div>
                                    <div class="w-3/4 h-1 bg-gray-200 rounded"></div>
                                </div>
                            </div>
                            <p class="text-xs text-gray-600 mt-2 font-medium">Image + Text</p>
                        </div>
                        <div @click="addComponent('image-gallery')" class="cursor-pointer p-3 border border-gray-200 rounded-lg hover:border-blue-300 hover:bg-blue-50 transition-all duration-200 group">
                            <div class="grid grid-cols-3 gap-1">
                                <div class="h-6 bg-gray-300 rounded"></div>
                                <div class="h-6 bg-gray-300 rounded"></div>
                                <div class="h-6 bg-gray-300 rounded"></div>
                                <div class="h-6 bg-gray-300 rounded"></div>
                                <div class="h-6 bg-gray-300 rounded"></div>
                                <div class="h-6 bg-gray-300 rounded"></div>
                            </div>
                            <p class="text-xs text-gray-600 mt-2 font-medium">Image Gallery</p>
                        </div>
                        <div @click="addComponent('video-section')" class="cursor-pointer p-3 border border-gray-200 rounded-lg hover:border-blue-300 hover:bg-blue-50 transition-all duration-200 group">
                            <div class="w-full h-8 bg-gray-800 rounded flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </div>
                            <p class="text-xs text-gray-600 mt-2 font-medium">Video Section</p>
                        </div>
                    </div>
                </div>

                <!-- Service Components -->
                <div class="mb-6">
                    <h4 class="text-sm font-medium text-gray-700 mb-3 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        Services & Features
                    </h4>
                    <div class="space-y-3">
                        <div @click="addComponent('services-grid')" class="cursor-pointer p-3 border border-gray-200 rounded-lg hover:border-blue-300 hover:bg-blue-50 transition-all duration-200 group">
                            <div class="grid grid-cols-2 gap-1">
                                <div class="h-6 bg-blue-100 rounded"></div>
                                <div class="h-6 bg-blue-100 rounded"></div>
                                <div class="h-6 bg-blue-100 rounded"></div>
                                <div class="h-6 bg-blue-100 rounded"></div>
                            </div>
                            <p class="text-xs text-gray-600 mt-2 font-medium">Services Grid</p>
                        </div>
                        <div @click="addComponent('services-carousel')" class="cursor-pointer p-3 border border-gray-200 rounded-lg hover:border-blue-300 hover:bg-blue-50 transition-all duration-200 group">
                            <div class="flex space-x-1 overflow-hidden">
                                <div class="w-8 h-6 bg-green-100 rounded flex-shrink-0"></div>
                                <div class="w-8 h-6 bg-green-100 rounded flex-shrink-0"></div>
                                <div class="w-8 h-6 bg-green-100 rounded flex-shrink-0"></div>
                            </div>
                            <p class="text-xs text-gray-600 mt-2 font-medium">Services Carousel</p>
                        </div>
                        <div @click="addComponent('pricing-table')" class="cursor-pointer p-3 border border-gray-200 rounded-lg hover:border-blue-300 hover:bg-blue-50 transition-all duration-200 group">
                            <div class="space-y-1">
                                <div class="w-full h-2 bg-gray-200 rounded"></div>
                                <div class="grid grid-cols-3 gap-1">
                                    <div class="h-4 bg-gray-100 rounded"></div>
                                    <div class="h-4 bg-blue-200 rounded"></div>
                                    <div class="h-4 bg-gray-100 rounded"></div>
                                </div>
                            </div>
                            <p class="text-xs text-gray-600 mt-2 font-medium">Pricing Table</p>
                        </div>
                        <div @click="addComponent('features-list')" class="cursor-pointer p-3 border border-gray-200 rounded-lg hover:border-blue-300 hover:bg-blue-50 transition-all duration-200 group">
                            <div class="space-y-1">
                                <div class="flex items-center space-x-2">
                                    <div class="w-2 h-2 bg-green-400 rounded-full"></div>
                                    <div class="w-3/4 h-1 bg-gray-200 rounded"></div>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <div class="w-2 h-2 bg-green-400 rounded-full"></div>
                                    <div class="w-2/3 h-1 bg-gray-200 rounded"></div>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <div class="w-2 h-2 bg-green-400 rounded-full"></div>
                                    <div class="w-4/5 h-1 bg-gray-200 rounded"></div>
                                </div>
                            </div>
                            <p class="text-xs text-gray-600 mt-2 font-medium">Features List</p>
                        </div>
                    </div>
                </div>

                <!-- Team & Testimonials -->
                <div class="mb-6">
                    <h4 class="text-sm font-medium text-gray-700 mb-3 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        Team & Reviews
                    </h4>
                    <div class="space-y-3">
                        <div @click="addComponent('team-grid')" class="cursor-pointer p-3 border border-gray-200 rounded-lg hover:border-blue-300 hover:bg-blue-50 transition-all duration-200 group">
                            <div class="grid grid-cols-3 gap-1">
                                <div class="w-full h-4 bg-purple-100 rounded-full"></div>
                                <div class="w-full h-4 bg-purple-100 rounded-full"></div>
                                <div class="w-full h-4 bg-purple-100 rounded-full"></div>
                            </div>
                            <p class="text-xs text-gray-600 mt-2 font-medium">Team Grid</p>
                        </div>
                        <div @click="addComponent('testimonials')" class="cursor-pointer p-3 border border-gray-200 rounded-lg hover:border-blue-300 hover:bg-blue-50 transition-all duration-200 group">
                            <div class="space-y-1">
                                <div class="w-full h-1 bg-yellow-200 rounded"></div>
                                <div class="w-3/4 h-1 bg-yellow-200 rounded"></div>
                                <div class="flex items-center space-x-1 mt-2">
                                    <div class="w-3 h-3 bg-yellow-300 rounded-full"></div>
                                    <div class="w-2/3 h-1 bg-gray-200 rounded"></div>
                                </div>
                            </div>
                            <p class="text-xs text-gray-600 mt-2 font-medium">Testimonials</p>
                        </div>
                        <div @click="addComponent('stats-counter')" class="cursor-pointer p-3 border border-gray-200 rounded-lg hover:border-blue-300 hover:bg-blue-50 transition-all duration-200 group">
                            <div class="grid grid-cols-2 gap-2">
                                <div class="text-center">
                                    <div class="w-6 h-4 bg-blue-200 rounded mb-1"></div>
                                    <div class="w-8 h-1 bg-gray-200 rounded"></div>
                                </div>
                                <div class="text-center">
                                    <div class="w-6 h-4 bg-green-200 rounded mb-1"></div>
                                    <div class="w-8 h-1 bg-gray-200 rounded"></div>
                                </div>
                            </div>
                            <p class="text-xs text-gray-600 mt-2 font-medium">Stats Counter</p>
                        </div>
                    </div>
                </div>

                <!-- Contact Components -->
                <div class="mb-6">
                    <h4 class="text-sm font-medium text-gray-700 mb-3 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        Contact & Forms
                    </h4>
                    <div class="space-y-3">
                        <div @click="addComponent('contact-form')" class="cursor-pointer p-3 border border-gray-200 rounded-lg hover:border-blue-300 hover:bg-blue-50 transition-all duration-200 group">
                            <div class="space-y-1">
                                <div class="w-full h-2 bg-gray-200 rounded"></div>
                                <div class="w-full h-2 bg-gray-200 rounded"></div>
                                <div class="w-full h-4 bg-gray-200 rounded"></div>
                                <div class="w-1/3 h-2 bg-blue-300 rounded"></div>
                            </div>
                            <p class="text-xs text-gray-600 mt-2 font-medium">Contact Form</p>
                        </div>
                        <div @click="addComponent('map-section')" class="cursor-pointer p-3 border border-gray-200 rounded-lg hover:border-blue-300 hover:bg-blue-50 transition-all duration-200 group">
                            <div class="w-full h-8 bg-green-200 rounded"></div>
                            <p class="text-xs text-gray-600 mt-2 font-medium">Map Section</p>
                        </div>
                        <div @click="addComponent('newsletter-signup')" class="cursor-pointer p-3 border border-gray-200 rounded-lg hover:border-blue-300 hover:bg-blue-50 transition-all duration-200 group">
                            <div class="space-y-1">
                                <div class="w-full h-1 bg-gray-200 rounded"></div>
                                <div class="w-full h-2 bg-gray-200 rounded"></div>
                                <div class="w-1/2 h-2 bg-blue-300 rounded"></div>
                            </div>
                            <p class="text-xs text-gray-600 mt-2 font-medium">Newsletter Signup</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enhanced Page Canvas -->
        <div class="flex-1 bg-gray-50 overflow-y-auto">
            <div class="max-w-7xl mx-auto p-6">
                <!-- Page Settings Panel -->
                <div x-show="previewMode !== 'preview'" class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold text-gray-900">Page Settings</h3>
                        <div class="flex items-center space-x-2">
                            <label class="flex items-center">
                                <input x-model="pageData.is_published" type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                <span class="ml-2 text-sm text-gray-700">Publish Page</span>
                            </label>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Page Title</label>
                            <input x-model="pageData.title" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter page title">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Page Slug</label>
                            <input x-model="pageData.slug" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="page-url">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Template</label>
                            <select x-model="pageData.template" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="default">Default</option>
                                <option value="full-width">Full Width</option>
                                <option value="landing">Landing Page</option>
                                <option value="blog">Blog Style</option>
                                <option value="minimal">Minimal</option>
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Meta Title</label>
                            <input x-model="pageData.meta_title" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="SEO title">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Meta Description</label>
                            <textarea x-model="pageData.meta_description" rows="2" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="SEO description"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Responsive Preview Container -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 min-h-96">
                    <!-- Preview Mode Indicator -->
                    <div x-show="previewMode === 'preview'" class="bg-blue-50 border-b border-blue-200 px-6 py-3">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                <span class="text-blue-800 font-medium">Preview Mode</span>
                            </div>
                            <button @click="previewMode = 'desktop'" class="text-blue-600 hover:text-blue-800 text-sm font-medium">Exit Preview</button>
                        </div>
                    </div>
                    
                    <!-- Responsive Preview Frame -->
                    <div class="p-6">
                        <div :class="{
                            'max-w-full': previewMode === 'mobile',
                            'max-w-2xl mx-auto': previewMode === 'tablet',
                            'max-w-4xl mx-auto': previewMode === 'desktop',
                            'max-w-6xl mx-auto': previewMode === 'preview'
                        }">
                            
                            <!-- Empty State -->
                            <div x-show="pageComponents.length === 0" class="text-center py-16">
                                <div class="w-20 h-20 bg-gray-100 rounded-full mx-auto mb-6 flex items-center justify-center">
                                    <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-semibold text-gray-900 mb-2">Start Building Your Page</h3>
                                <p class="text-gray-600 mb-6 max-w-md mx-auto">Drag components from the sidebar to start building your page. Each component is fully customizable.</p>
                                <div class="flex items-center justify-center space-x-4 text-sm text-gray-500">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                        </svg>
                                        Hero Sections
                                    </div>
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                        Content Blocks
                                    </div>
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                        Forms
                                    </div>
                                </div>
                            </div>

                            <!-- Drag & Drop Components List -->
                            <div x-show="pageComponents.length > 0" class="space-y-6">
                                <template x-for="(component, index) in pageComponents" :key="component.id">
                                    <div 
                                        class="border border-gray-200 rounded-xl p-4 bg-white relative group hover:shadow-lg transition-all duration-200"
                                        :class="{
                                            'ring-2 ring-blue-500 border-blue-300': editingComponent === index,
                                            'hover:border-blue-300': editingComponent !== index
                                        }"
                                        @click="editComponent(index)"
                                        draggable="true"
                                        @dragstart="dragStart($event, index)"
                                        @dragover.prevent
                                        @drop="drop($event, index)"
                                    >
                                        <!-- Component Header -->
                                        <div class="flex items-center justify-between mb-4">
                                            <div class="flex items-center space-x-3">
                                                <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center">
                                                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                                                    </svg>
                                                </div>
                                                <div>
                                                    <h4 class="text-sm font-semibold text-gray-900" x-text="component.name"></h4>
                                                    <p class="text-xs text-gray-500" x-text="component.type"></p>
                                                </div>
                                            </div>
                                            <div class="flex items-center space-x-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                                <button @click.stop="duplicateComponent(index)" class="text-gray-400 hover:text-blue-600 p-1 rounded">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                                    </svg>
                                                </button>
                                                <button @click.stop="editComponent(index)" class="text-gray-400 hover:text-blue-600 p-1 rounded">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                    </svg>
                                                </button>
                                                <button @click.stop="removeComponent(index)" class="text-gray-400 hover:text-red-600 p-1 rounded">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        <!-- Component Preview -->
                                        <div class="bg-gray-50 rounded-lg p-4 border">
                                            <!-- Hero Default -->
                                            <div x-show="component.type === 'hero-default'">
                                                <div class="bg-gradient-to-r from-blue-500 to-purple-600 text-white p-6 rounded-lg text-center">
                                                    <h2 class="text-xl font-bold mb-2" x-text="component.settings.title || 'Hero Title'"></h2>
                                                    <p class="text-sm opacity-90" x-text="component.settings.subtitle || 'Hero subtitle text here'"></p>
                                                </div>
                                            </div>
                                            
                                            <!-- Hero Video -->
                                            <div x-show="component.type === 'hero-video'">
                                                <div class="bg-gradient-to-r from-gray-800 to-gray-600 text-white p-6 rounded-lg text-center relative">
                                                    <div class="w-12 h-12 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-3">
                                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M8 5v14l11-7z"/>
                                                        </svg>
                                                    </div>
                                                    <h2 class="text-xl font-bold mb-2" x-text="component.settings.title || 'Video Hero'"></h2>
                                                    <p class="text-sm opacity-90" x-text="component.settings.subtitle || 'Watch our story'"></p>
                                                </div>
                                            </div>
                                            
                                            <!-- Text Block -->
                                            <div x-show="component.type === 'text-block'">
                                                <div class="prose max-w-none">
                                                    <h3 class="text-lg font-semibold mb-2" x-text="component.settings.title || 'Section Title'"></h3>
                                                    <div class="text-gray-700" x-html="component.settings.content || '<p>Section content goes here...</p>'"></div>
                                                </div>
                                            </div>
                                            
                                            <!-- Services Grid -->
                                            <div x-show="component.type === 'services-grid'">
                                                <div class="text-center mb-4">
                                                    <h3 class="text-lg font-semibold" x-text="component.settings.title || 'Our Services'"></h3>
                                                </div>
                                                <div class="grid grid-cols-2 gap-3">
                                                    <div class="p-3 border rounded-lg text-center">
                                                        <div class="w-8 h-8 bg-blue-100 rounded-lg mx-auto mb-2"></div>
                                                        <h4 class="text-sm font-medium">Service 1</h4>
                                                    </div>
                                                    <div class="p-3 border rounded-lg text-center">
                                                        <div class="w-8 h-8 bg-green-100 rounded-lg mx-auto mb-2"></div>
                                                        <h4 class="text-sm font-medium">Service 2</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- Contact Form -->
                                            <div x-show="component.type === 'contact-form'">
                                                <div class="space-y-3">
                                                    <h3 class="text-lg font-semibold" x-text="component.settings.title || 'Contact Us'"></h3>
                                                    <div class="space-y-2">
                                                        <div class="w-full h-8 bg-gray-200 rounded"></div>
                                                        <div class="w-full h-8 bg-gray-200 rounded"></div>
                                                        <div class="w-full h-16 bg-gray-200 rounded"></div>
                                                        <div class="w-20 h-8 bg-blue-300 rounded"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enhanced Component Settings Panel -->
        <div x-show="editingComponent !== null && previewMode !== 'preview'" class="w-96 bg-white border-l border-gray-200 p-6 overflow-y-auto shadow-lg">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-gray-900">Component Settings</h3>
                <button @click="editingComponent = null" class="text-gray-400 hover:text-gray-600 p-1 rounded-lg hover:bg-gray-100">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <div x-show="editingComponent !== null">
                <!-- Component Type Indicator -->
                <div class="mb-6 p-3 bg-gray-50 rounded-lg">
                    <div class="flex items-center space-x-2">
                        <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-semibold text-gray-900" x-text="pageComponents[editingComponent]?.name"></h4>
                            <p class="text-xs text-gray-500" x-text="pageComponents[editingComponent]?.type"></p>
                        </div>
                    </div>
                </div>
                
                <!-- Dynamic Settings -->
                <div class="space-y-6">
                    <!-- Title Field -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                        <input 
                            x-model="pageComponents[editingComponent]?.settings.title" 
                            type="text" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter component title"
                        >
                    </div>
                    
                    <!-- Subtitle Field -->
                    <div x-show="['hero-default', 'hero-video', 'hero-parallax', 'hero-minimal', 'services-grid', 'services-carousel'].includes(pageComponents[editingComponent]?.type)">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Subtitle</label>
                        <input 
                            x-model="pageComponents[editingComponent]?.settings.subtitle" 
                            type="text" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter subtitle"
                        >
                    </div>
                    
                    <!-- Rich Text Content Field with CKEditor -->
                    <div x-show="['text-block', 'hero-default', 'hero-video', 'hero-parallax', 'hero-minimal'].includes(pageComponents[editingComponent]?.type)">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Content</label>
                        <div class="border border-gray-300 rounded-lg">
                            <textarea 
                                x-model="pageComponents[editingComponent]?.settings.content" 
                                :id="'ckeditor-' + editingComponent"
                                rows="6" 
                                class="w-full px-3 py-2 border-0 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 resize-none"
                                placeholder="Enter your content here..."
                            ></textarea>
                        </div>
                    </div>
                    
                    <!-- Background Color -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Background Color</label>
                        <select x-model="pageComponents[editingComponent]?.settings.backgroundColor" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="transparent">Transparent</option>
                            <option value="white">White</option>
                            <option value="gray-50">Light Gray</option>
                            <option value="blue-50">Light Blue</option>
                            <option value="green-50">Light Green</option>
                            <option value="purple-50">Light Purple</option>
                            <option value="yellow-50">Light Yellow</option>
                        </select>
                    </div>
                    
                    <!-- Text Color -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Text Color</label>
                        <select x-model="pageComponents[editingComponent]?.settings.textColor" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="gray-900">Dark Gray</option>
                            <option value="white">White</option>
                            <option value="blue-600">Blue</option>
                            <option value="green-600">Green</option>
                            <option value="purple-600">Purple</option>
                            <option value="red-600">Red</option>
                        </select>
                    </div>
                    
                    <!-- Padding Settings -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Padding</label>
                        <select x-model="pageComponents[editingComponent]?.settings.padding" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="p-4">Small (16px)</option>
                            <option value="p-6">Medium (24px)</option>
                            <option value="p-8">Large (32px)</option>
                            <option value="p-12">Extra Large (48px)</option>
                            <option value="p-16">Huge (64px)</option>
                        </select>
                    </div>
                    
                    <!-- Margin Settings -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Margin</label>
                        <select x-model="pageComponents[editingComponent]?.settings.margin" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="m-0">No Margin</option>
                            <option value="m-4">Small (16px)</option>
                            <option value="m-6">Medium (24px)</option>
                            <option value="m-8">Large (32px)</option>
                            <option value="m-12">Extra Large (48px)</option>
                        </select>
                    </div>
                    
                    <!-- Animation Settings -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Animation</label>
                        <select x-model="pageComponents[editingComponent]?.settings.animation" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="none">None</option>
                            <option value="fade-in">Fade In</option>
                            <option value="slide-up">Slide Up</option>
                            <option value="slide-down">Slide Down</option>
                            <option value="slide-left">Slide Left</option>
                            <option value="slide-right">Slide Right</option>
                            <option value="zoom-in">Zoom In</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CKEditor CDN -->
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

<!-- Enhanced Page Builder Styles -->
<style>
    .ck-editor {
        min-height: 200px !important;
    }
    
    .ck-editor__editable {
        color: #111827 !important;
        background-color: #ffffff !important;
        min-height: 200px !important;
        border-radius: 0.5rem !important;
    }
    
    .ck-editor__editable:focus {
        border-color: #3b82f6 !important;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1) !important;
    }
    
    .drag-over {
        border-color: #3b82f6 !important;
        background-color: #eff6ff !important;
    }
    
    .component-preview {
        transition: all 0.2s ease-in-out;
    }
    
    .component-preview:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }
    
    .preview-frame {
        transition: all 0.3s ease-in-out;
    }
    
    .animate-fade-in {
        animation: fadeIn 0.5s ease-in-out;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .animate-slide-up {
        animation: slideUp 0.5s ease-in-out;
    }
    
    @keyframes slideUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<script>
function modernPageBuilder() {
    return {
        previewMode: 'desktop',
        editingComponent: null,
        saving: false,
        hasUnsavedChanges: false,
        componentSearch: '',
        showComponentCategories: true,
        draggedIndex: null,
        ckEditors: {},
        
        pageData: {
            title: '',
            slug: '',
            template: 'default',
            meta_title: '',
            meta_description: '',
            is_published: false
        },
        
        pageComponents: [],
        
        init() {
            // Initialize CKEditor for existing components
            this.$nextTick(() => {
                this.initializeCKEditors();
            });
            
            // Auto-save functionality
            setInterval(() => {
                if (this.hasUnsavedChanges) {
                    this.autoSave();
                }
            }, 30000); // Auto-save every 30 seconds
        },
        
        initializeCKEditors() {
            // Initialize CKEditor for all text areas
            document.querySelectorAll('textarea[id^="ckeditor-"]').forEach(textarea => {
                const editorId = textarea.id;
                if (!this.ckEditors[editorId]) {
                    ClassicEditor
                        .create(textarea, {
                            toolbar: {
                                items: [
                                    'heading', '|',
                                    'bold', 'italic', 'underline', '|',
                                    'link', 'bulletedList', 'numberedList', '|',
                                    'outdent', 'indent', '|',
                                    'blockQuote', 'insertTable', '|',
                                    'undo', 'redo', '|',
                                    'removeFormat'
                                ]
                            },
                            language: 'en',
                            placeholder: 'Enter your content here...'
                        })
                        .then(editor => {
                            this.ckEditors[editorId] = editor;
                            
                            // Update component data when content changes
                            editor.model.document.on('change:data', () => {
                                const componentIndex = parseInt(editorId.split('-')[1]);
                                if (this.pageComponents[componentIndex]) {
                                    this.pageComponents[componentIndex].settings.content = editor.getData();
                                    this.hasUnsavedChanges = true;
                                }
                            });
                        })
                        .catch(error => {
                            console.error('CKEditor initialization failed:', error);
                        });
                }
            });
        },
        
        addComponent(type) {
            const componentId = Date.now() + Math.random();
            const componentTemplates = {
                'hero-default': {
                    id: componentId,
                    type: 'hero-default',
                    name: 'Default Hero',
                    settings: {
                        title: 'Welcome to Our Website',
                        subtitle: 'We create amazing digital experiences',
                        content: '<p>Your hero content goes here...</p>',
                        backgroundColor: 'transparent',
                        textColor: 'white',
                        padding: 'p-8',
                        margin: 'm-0',
                        animation: 'fade-in'
                    }
                },
                'hero-video': {
                    id: componentId,
                    type: 'hero-video',
                    name: 'Video Hero',
                    settings: {
                        title: 'Watch Our Story',
                        subtitle: 'Discover what makes us different',
                        content: '<p>Video hero content...</p>',
                        backgroundColor: 'transparent',
                        textColor: 'white',
                        padding: 'p-8',
                        margin: 'm-0',
                        animation: 'slide-up'
                    }
                },
                'hero-parallax': {
                    id: componentId,
                    type: 'hero-parallax',
                    name: 'Parallax Hero',
                    settings: {
                        title: 'Experience the Difference',
                        subtitle: 'Scroll to see the magic',
                        content: '<p>Parallax hero content...</p>',
                        backgroundColor: 'transparent',
                        textColor: 'white',
                        padding: 'p-12',
                        margin: 'm-0',
                        animation: 'zoom-in'
                    }
                },
                'hero-minimal': {
                    id: componentId,
                    type: 'hero-minimal',
                    name: 'Minimal Hero',
                    settings: {
                        title: 'Simple & Clean',
                        subtitle: 'Less is more',
                        content: '<p>Minimal hero content...</p>',
                        backgroundColor: 'white',
                        textColor: 'gray-900',
                        padding: 'p-6',
                        margin: 'm-0',
                        animation: 'fade-in'
                    }
                },
                'text-block': {
                    id: componentId,
                    type: 'text-block',
                    name: 'Rich Text Block',
                    settings: {
                        title: 'About Us',
                        content: '<p>Tell your story here...</p>',
                        backgroundColor: 'white',
                        textColor: 'gray-900',
                        padding: 'p-6',
                        margin: 'm-0',
                        animation: 'slide-up'
                    }
                },
                'image-text': {
                    id: componentId,
                    type: 'image-text',
                    name: 'Image + Text',
                    settings: {
                        title: 'Image & Text Section',
                        content: '<p>Your content with image...</p>',
                        backgroundColor: 'white',
                        textColor: 'gray-900',
                        padding: 'p-6',
                        margin: 'm-0',
                        animation: 'slide-up'
                    }
                },
                'image-gallery': {
                    id: componentId,
                    type: 'image-gallery',
                    name: 'Image Gallery',
                    settings: {
                        title: 'Our Gallery',
                        backgroundColor: 'white',
                        textColor: 'gray-900',
                        padding: 'p-6',
                        margin: 'm-0',
                        animation: 'fade-in'
                    }
                },
                'video-section': {
                    id: componentId,
                    type: 'video-section',
                    name: 'Video Section',
                    settings: {
                        title: 'Watch Our Video',
                        backgroundColor: 'gray-50',
                        textColor: 'gray-900',
                        padding: 'p-8',
                        margin: 'm-0',
                        animation: 'slide-up'
                    }
                },
                'services-grid': {
                    id: componentId,
                    type: 'services-grid',
                    name: 'Services Grid',
                    settings: {
                        title: 'Our Services',
                        subtitle: 'What we offer',
                        backgroundColor: 'gray-50',
                        textColor: 'gray-900',
                        padding: 'p-8',
                        margin: 'm-0',
                        animation: 'slide-up',
                        columns: 3
                    }
                },
                'services-carousel': {
                    id: componentId,
                    type: 'services-carousel',
                    name: 'Services Carousel',
                    settings: {
                        title: 'Our Services',
                        subtitle: 'What we offer',
                        backgroundColor: 'white',
                        textColor: 'gray-900',
                        padding: 'p-6',
                        margin: 'm-0',
                        animation: 'slide-up'
                    }
                },
                'pricing-table': {
                    id: componentId,
                    type: 'pricing-table',
                    name: 'Pricing Table',
                    settings: {
                        title: 'Choose Your Plan',
                        backgroundColor: 'white',
                        textColor: 'gray-900',
                        padding: 'p-8',
                        margin: 'm-0',
                        animation: 'slide-up'
                    }
                },
                'features-list': {
                    id: componentId,
                    type: 'features-list',
                    name: 'Features List',
                    settings: {
                        title: 'Key Features',
                        backgroundColor: 'white',
                        textColor: 'gray-900',
                        padding: 'p-6',
                        margin: 'm-0',
                        animation: 'slide-up'
                    }
                },
                'team-grid': {
                    id: componentId,
                    type: 'team-grid',
                    name: 'Team Grid',
                    settings: {
                        title: 'Meet Our Team',
                        backgroundColor: 'white',
                        textColor: 'gray-900',
                        padding: 'p-8',
                        margin: 'm-0',
                        animation: 'slide-up'
                    }
                },
                'testimonials': {
                    id: componentId,
                    type: 'testimonials',
                    name: 'Testimonials',
                    settings: {
                        title: 'What Our Clients Say',
                        backgroundColor: 'gray-50',
                        textColor: 'gray-900',
                        padding: 'p-8',
                        margin: 'm-0',
                        animation: 'fade-in'
                    }
                },
                'stats-counter': {
                    id: componentId,
                    type: 'stats-counter',
                    name: 'Stats Counter',
                    settings: {
                        title: 'Our Numbers',
                        backgroundColor: 'blue-50',
                        textColor: 'gray-900',
                        padding: 'p-8',
                        margin: 'm-0',
                        animation: 'slide-up'
                    }
                },
                'contact-form': {
                    id: componentId,
                    type: 'contact-form',
                    name: 'Contact Form',
                    settings: {
                        title: 'Contact Us',
                        backgroundColor: 'white',
                        textColor: 'gray-900',
                        padding: 'p-8',
                        margin: 'm-0',
                        animation: 'slide-up'
                    }
                },
                'map-section': {
                    id: componentId,
                    type: 'map-section',
                    name: 'Map Section',
                    settings: {
                        title: 'Find Us',
                        backgroundColor: 'white',
                        textColor: 'gray-900',
                        padding: 'p-0',
                        margin: 'm-0',
                        animation: 'fade-in'
                    }
                },
                'newsletter-signup': {
                    id: componentId,
                    type: 'newsletter-signup',
                    name: 'Newsletter Signup',
                    settings: {
                        title: 'Stay Updated',
                        backgroundColor: 'blue-50',
                        textColor: 'gray-900',
                        padding: 'p-8',
                        margin: 'm-0',
                        animation: 'slide-up'
                    }
                }
            };
            
            if (componentTemplates[type]) {
                this.pageComponents.push(componentTemplates[type]);
                this.hasUnsavedChanges = true;
                
                // Initialize CKEditor for new component
                this.$nextTick(() => {
                    this.initializeCKEditors();
                });
            }
        },
        
        removeComponent(index) {
            if (confirm('Are you sure you want to remove this component?')) {
                // Destroy CKEditor if it exists
                const editorId = `ckeditor-${index}`;
                if (this.ckEditors[editorId]) {
                    this.ckEditors[editorId].destroy();
                    delete this.ckEditors[editorId];
                }
                
                this.pageComponents.splice(index, 1);
                this.editingComponent = null;
                this.hasUnsavedChanges = true;
                
                // Reinitialize CKEditors for remaining components
                this.$nextTick(() => {
                    this.initializeCKEditors();
                });
            }
        },
        
        duplicateComponent(index) {
            const originalComponent = this.pageComponents[index];
            const duplicatedComponent = {
                ...originalComponent,
                id: Date.now() + Math.random(),
                settings: { ...originalComponent.settings }
            };
            
            this.pageComponents.splice(index + 1, 0, duplicatedComponent);
            this.hasUnsavedChanges = true;
            
            // Initialize CKEditor for duplicated component
            this.$nextTick(() => {
                this.initializeCKEditors();
            });
        },
        
        editComponent(index) {
            this.editingComponent = index;
            
            // Initialize CKEditor for the component being edited
            this.$nextTick(() => {
                this.initializeCKEditors();
            });
        },
        
        // Drag and Drop functionality
        dragStart(event, index) {
            this.draggedIndex = index;
            event.dataTransfer.effectAllowed = 'move';
            event.dataTransfer.setData('text/html', event.target.outerHTML);
        },
        
        drop(event, dropIndex) {
            event.preventDefault();
            
            if (this.draggedIndex !== null && this.draggedIndex !== dropIndex) {
                const draggedComponent = this.pageComponents[this.draggedIndex];
                this.pageComponents.splice(this.draggedIndex, 1);
                this.pageComponents.splice(dropIndex, 0, draggedComponent);
                this.hasUnsavedChanges = true;
            }
            
            this.draggedIndex = null;
        },
        
        async savePage() {
            if (this.saving) return;
            
            this.saving = true;
            
            try {
                // Update CKEditor content before saving
                Object.keys(this.ckEditors).forEach(editorId => {
                    const editor = this.ckEditors[editorId];
                    const componentIndex = parseInt(editorId.split('-')[1]);
                    if (this.pageComponents[componentIndex]) {
                        this.pageComponents[componentIndex].settings.content = editor.getData();
                    }
                });
                
                const pageData = {
                    ...this.pageData,
                    page_builder_data: this.pageComponents,
                    _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                };
                
                const response = await fetch('{{ route("admin.pages.save-builder") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': pageData._token,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(pageData)
                });
                
                const result = await response.json();
                
                if (result.success) {
                    this.hasUnsavedChanges = false;
                    
                    // Show success notification
                    this.showNotification('Page saved successfully!', 'success');
                    
                    // Redirect if needed
                    if (result.redirect) {
                        window.location.href = result.redirect;
                    }
                } else {
                    throw new Error(result.message || 'Failed to save page');
                }
            } catch (error) {
                console.error('Save error:', error);
                this.showNotification('Failed to save page: ' + error.message, 'error');
            } finally {
                this.saving = false;
            }
        },
        
        async autoSave() {
            if (this.saving || !this.hasUnsavedChanges) return;
            
            try {
                // Update CKEditor content before auto-saving
                Object.keys(this.ckEditors).forEach(editorId => {
                    const editor = this.ckEditors[editorId];
                    const componentIndex = parseInt(editorId.split('-')[1]);
                    if (this.pageComponents[componentIndex]) {
                        this.pageComponents[componentIndex].settings.content = editor.getData();
                    }
                });
                
                const pageData = {
                    ...this.pageData,
                    page_builder_data: this.pageComponents,
                    _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                };
                
                const response = await fetch('{{ route("admin.pages.save-builder") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': pageData._token,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(pageData)
                });
                
                const result = await response.json();
                
                if (result.success) {
                    this.hasUnsavedChanges = false;
                    console.log('Auto-saved successfully');
                }
            } catch (error) {
                console.error('Auto-save error:', error);
            }
        },
        
        showNotification(message, type = 'info') {
            // Create notification element
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 p-4 rounded-lg shadow-lg z-50 ${
                type === 'success' ? 'bg-green-500 text-white' :
                type === 'error' ? 'bg-red-500 text-white' :
                'bg-blue-500 text-white'
            }`;
            notification.textContent = message;
            
            document.body.appendChild(notification);
            
            // Remove notification after 3 seconds
            setTimeout(() => {
                notification.remove();
            }, 3000);
        }
    }
}
</script>
@endsection
