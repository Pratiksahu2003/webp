@extends('layouts.admin')

@section('page-title', 'Simple Page Builder')

@section('content')
<div x-data="simplePageBuilder()" class="h-full bg-gray-50">
    <!-- Simple Header -->
    <div class="bg-white border-b border-gray-200 px-6 py-4">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-xl font-semibold text-gray-900">Page Builder</h1>
                <p class="text-sm text-gray-600">Create your page easily</p>
            </div>
            <div class="flex items-center space-x-3">
                <button @click="previewMode = !previewMode" class="px-4 py-2 text-sm bg-gray-100 hover:bg-gray-200 rounded-lg transition-colors">
                    <span x-text="previewMode ? 'Edit' : 'Preview'"></span>
                </button>
                <button @click="clearSample()" x-show="pageComponents.length > 0" class="px-4 py-2 text-sm bg-orange-100 hover:bg-orange-200 text-orange-700 rounded-lg transition-colors">
                    Clear Sample
                </button>
                <button @click="loadSamplePage()" x-show="pageComponents.length === 0" class="px-4 py-2 text-sm bg-green-100 hover:bg-green-200 text-green-700 rounded-lg transition-colors">
                    Load Sample
                </button>
                <button @click="savePage()" :disabled="saving" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors">
                    <span x-text="saving ? 'Saving...' : 'Save'"></span>
                </button>
            </div>
        </div>
    </div>

    <div class="flex h-full">
        <!-- Simple Components Sidebar -->
        <div x-show="!previewMode" class="w-64 bg-white border-r border-gray-200 overflow-y-auto">
            <div class="p-4">
                <h3 class="text-sm font-medium text-gray-700 mb-4">Add Components</h3>
                
                <!-- Simple Component Grid -->
                <div class="space-y-3">
                    <!-- Hero Section -->
                    <div @click="addComponent('hero')" class="cursor-pointer p-3 border border-gray-200 rounded-lg hover:border-blue-300 hover:bg-blue-50 transition-colors">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">Hero Section</p>
                                <p class="text-xs text-gray-500">Title + subtitle</p>
                            </div>
                        </div>
                    </div>

                    <!-- Text Block -->
                    <div @click="addComponent('text')" class="cursor-pointer p-3 border border-gray-200 rounded-lg hover:border-blue-300 hover:bg-blue-50 transition-colors">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">Text Block</p>
                                <p class="text-xs text-gray-500">Rich text content</p>
                            </div>
                        </div>
                    </div>

                    <!-- Image -->
                    <div @click="addComponent('image')" class="cursor-pointer p-3 border border-gray-200 rounded-lg hover:border-blue-300 hover:bg-blue-50 transition-colors">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">Image</p>
                                <p class="text-xs text-gray-500">Single image</p>
                            </div>
                        </div>
                    </div>

                    <!-- Services -->
                    <div @click="addComponent('services')" class="cursor-pointer p-3 border border-gray-200 rounded-lg hover:border-blue-300 hover:bg-blue-50 transition-colors">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-yellow-100 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">Services</p>
                                <p class="text-xs text-gray-500">Service cards</p>
                            </div>
                        </div>
                    </div>

                    <!-- Main Content -->
                    <div @click="addComponent('main-content')" class="cursor-pointer p-3 border border-gray-200 rounded-lg hover:border-blue-300 hover:bg-blue-50 transition-colors">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-indigo-100 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v12a2 2 0 01-2 2zM8 8h8M8 12h8M8 16h5"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">Main Content</p>
                                <p class="text-xs text-gray-500">Dynamic content area</p>
                            </div>
                        </div>
                    </div>

                    <!-- Dynamic Section -->
                    <div @click="addComponent('dynamic-section')" class="cursor-pointer p-3 border border-gray-200 rounded-lg hover:border-blue-300 hover:bg-blue-50 transition-colors">
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">Dynamic Section</p>
                                <p class="text-xs text-gray-500">Flexible content block</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Simple Page Canvas -->
        <div class="flex-1 bg-gray-50 overflow-y-auto">
            <div class="max-w-4xl mx-auto p-6">
                <!-- Page Settings -->
                <div x-show="!previewMode" class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 mb-6">
                    <h3 class="text-sm font-medium text-gray-700 mb-3">Page Settings</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-medium text-gray-700 mb-1">Page Title</label>
                            <input x-model="pageData.title" type="text" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter page title">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-700 mb-1">Page URL</label>
                            <input x-model="pageData.slug" type="text" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="page-url">
                        </div>
                    </div>
                </div>

                <!-- Page Content -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 min-h-96">
                    <div class="p-6">
                        <!-- Empty State -->
                        <div x-show="pageComponents.length === 0" class="text-center py-16">
                            <div class="w-16 h-16 bg-gray-100 rounded-full mx-auto mb-4 flex items-center justify-center">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Start Building Your Page</h3>
                            <p class="text-gray-600 mb-4">Click on components from the sidebar to add them to your page, or load a sample page to get started</p>
                            <div class="mt-4">
                                <button @click="loadSamplePage()" class="px-4 py-2 bg-green-100 hover:bg-green-200 text-green-700 rounded-lg transition-colors">
                                    Load Sample Page
                                </button>
                            </div>
                        </div>

                        <!-- Components List -->
                        <div x-show="pageComponents.length > 0" class="space-y-4">
                            <template x-for="(component, index) in pageComponents" :key="component.id">
                                <div class="border border-gray-200 rounded-lg p-4 bg-gray-50 relative group">
                                    <!-- Component Header -->
                                    <div class="flex items-center justify-between mb-3">
                                        <div class="flex items-center space-x-2">
                                            <div class="w-6 h-6 bg-gray-200 rounded flex items-center justify-center">
                                                <svg class="w-3 h-3 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                                                </svg>
                                            </div>
                                            <h4 class="text-sm font-medium text-gray-900" x-text="component.name"></h4>
                                        </div>
                                        <div class="flex items-center space-x-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                            <button @click="moveComponentUp(index)" :disabled="index === 0" class="text-gray-400 hover:text-blue-600 p-1" :class="{'opacity-50 cursor-not-allowed': index === 0}">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                                </svg>
                                            </button>
                                            <button @click="moveComponentDown(index)" :disabled="index === pageComponents.length - 1" class="text-gray-400 hover:text-blue-600 p-1" :class="{'opacity-50 cursor-not-allowed': index === pageComponents.length - 1}">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                </svg>
                                            </button>
                                            <button @click="duplicateComponent(index)" class="text-gray-400 hover:text-green-600 p-1">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                                </svg>
                                            </button>
                                            <button @click="editComponent(index)" class="text-blue-600 hover:text-blue-800 p-1">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                            </button>
                                            <button @click="removeComponent(index)" class="text-red-600 hover:text-red-800 p-1">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <!-- Component Preview -->
                                    <div class="bg-white rounded p-3 border">
                                        <!-- Hero Component -->
                                        <div x-show="component.type === 'hero'">
                                            <div class="bg-gradient-to-r from-blue-500 to-purple-600 text-white p-6 rounded-lg text-center">
                                                <h2 class="text-xl font-bold mb-2" x-text="component.settings.title || 'Your Title'"></h2>
                                                <p class="text-sm opacity-90" x-text="component.settings.subtitle || 'Your subtitle'"></p>
                                            </div>
                                        </div>
                                        
                                        <!-- Text Component -->
                                        <div x-show="component.type === 'text'">
                                            <div class="prose max-w-none">
                                                <h3 class="text-lg font-semibold mb-2" x-text="component.settings.title || 'Section Title'"></h3>
                                                <div class="text-gray-700" x-html="component.settings.content || '<p>Your content goes here...</p>'"></div>
                                            </div>
                                        </div>
                                        
                                        <!-- Image Component -->
                                        <div x-show="component.type === 'image'">
                                            <div class="text-center">
                                                <div class="w-full h-32 bg-gray-200 rounded-lg flex items-center justify-center">
                                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                    </svg>
                                                </div>
                                                <p class="text-sm text-gray-600 mt-2" x-text="component.settings.caption || 'Image caption'"></p>
                                            </div>
                                        </div>
                                        
                                        <!-- Services Component -->
                                        <div x-show="component.type === 'services'">
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
                                        
                                        <!-- Main Content Component -->
                                        <div x-show="component.type === 'main-content'">
                                            <div class="space-y-3">
                                                <h3 class="text-lg font-semibold" x-text="component.settings.title || 'Main Content'"></h3>
                                                <div class="prose max-w-none">
                                                    <div class="text-gray-700" x-html="component.settings.content || '<p>This is your main content area. Add your primary content here...</p>'"></div>
                                                </div>
                                                <div class="flex items-center space-x-2 text-xs text-gray-500">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    <span>Dynamic content area</span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Dynamic Section Component -->
                                        <div x-show="component.type === 'dynamic-section'">
                                            <div class="space-y-3">
                                                <h3 class="text-lg font-semibold" x-text="component.settings.title || 'Dynamic Section'"></h3>
                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                    <div class="p-3 bg-gray-50 rounded-lg">
                                                        <h4 class="text-sm font-medium mb-2" x-text="component.settings.leftTitle || 'Left Content'"></h4>
                                                        <p class="text-xs text-gray-600" x-text="component.settings.leftContent || 'Left side content...'"></p>
                                                    </div>
                                                    <div class="p-3 bg-gray-50 rounded-lg">
                                                        <h4 class="text-sm font-medium mb-2" x-text="component.settings.rightTitle || 'Right Content'"></h4>
                                                        <p class="text-xs text-gray-600" x-text="component.settings.rightContent || 'Right side content...'"></p>
                                                    </div>
                                                </div>
                                                <div class="flex items-center space-x-2 text-xs text-gray-500">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                                    </svg>
                                                    <span>Flexible content block</span>
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

        <!-- Simple Settings Panel -->
        <div x-show="editingComponent !== null && !previewMode" class="w-80 bg-white border-l border-gray-200 p-4 overflow-y-auto">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-sm font-medium text-gray-900">Edit Component</h3>
                <button @click="editingComponent = null" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <div x-show="editingComponent !== null">
                <div class="space-y-4">
                    <!-- Title Field -->
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">Title</label>
                        <input 
                            x-model="pageComponents[editingComponent]?.settings.title" 
                            type="text" 
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter title"
                        >
                    </div>
                    
                    <!-- Subtitle Field -->
                    <div x-show="pageComponents[editingComponent]?.type === 'hero'">
                        <label class="block text-xs font-medium text-gray-700 mb-1">Subtitle</label>
                        <input 
                            x-model="pageComponents[editingComponent]?.settings.subtitle" 
                            type="text" 
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter subtitle"
                        >
                    </div>
                    
                    <!-- Content Field -->
                    <div x-show="['text', 'main-content'].includes(pageComponents[editingComponent]?.type)">
                        <label class="block text-xs font-medium text-gray-700 mb-1">Content</label>
                        <textarea 
                            x-model="pageComponents[editingComponent]?.settings.content" 
                            rows="4" 
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter your content..."
                        ></textarea>
                    </div>
                    
                    <!-- Main Content Fields -->
                    <div x-show="pageComponents[editingComponent]?.type === 'main-content'">
                        <div class="space-y-3">
                            <div>
                                <label class="block text-xs font-medium text-gray-700 mb-1">Content Type</label>
                                <select x-model="pageComponents[editingComponent]?.settings.contentType" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="text">Text Content</option>
                                    <option value="html">HTML Content</option>
                                    <option value="markdown">Markdown</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-700 mb-1">Background Color</label>
                                <select x-model="pageComponents[editingComponent]?.settings.backgroundColor" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="white">White</option>
                                    <option value="gray-50">Light Gray</option>
                                    <option value="blue-50">Light Blue</option>
                                    <option value="green-50">Light Green</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Dynamic Section Fields -->
                    <div x-show="pageComponents[editingComponent]?.type === 'dynamic-section'">
                        <div class="space-y-3">
                            <div>
                                <label class="block text-xs font-medium text-gray-700 mb-1">Left Title</label>
                                <input 
                                    x-model="pageComponents[editingComponent]?.settings.leftTitle" 
                                    type="text" 
                                    class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Left side title"
                                >
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-700 mb-1">Left Content</label>
                                <textarea 
                                    x-model="pageComponents[editingComponent]?.settings.leftContent" 
                                    rows="3" 
                                    class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Left side content..."
                                ></textarea>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-700 mb-1">Right Title</label>
                                <input 
                                    x-model="pageComponents[editingComponent]?.settings.rightTitle" 
                                    type="text" 
                                    class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Right side title"
                                >
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-700 mb-1">Right Content</label>
                                <textarea 
                                    x-model="pageComponents[editingComponent]?.settings.rightContent" 
                                    rows="3" 
                                    class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Right side content..."
                                ></textarea>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-700 mb-1">Layout</label>
                                <select x-model="pageComponents[editingComponent]?.settings.layout" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="side-by-side">Side by Side</option>
                                    <option value="stacked">Stacked</option>
                                    <option value="left-wide">Left Wide</option>
                                    <option value="right-wide">Right Wide</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Image URL Field -->
                    <div x-show="pageComponents[editingComponent]?.type === 'image'">
                        <label class="block text-xs font-medium text-gray-700 mb-1">Image URL</label>
                        <input 
                            x-model="pageComponents[editingComponent]?.settings.imageUrl" 
                            type="url" 
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="https://example.com/image.jpg"
                        >
                    </div>
                    
                    <!-- Caption Field -->
                    <div x-show="pageComponents[editingComponent]?.type === 'image'">
                        <label class="block text-xs font-medium text-gray-700 mb-1">Caption</label>
                        <input 
                            x-model="pageComponents[editingComponent]?.settings.caption" 
                            type="text" 
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Image caption"
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function simplePageBuilder() {
    return {
        previewMode: false,
        editingComponent: null,
        saving: false,
        
        pageData: {
            title: '',
            slug: '',
            template: 'default',
            isDynamic: true,
            autoSave: true
        },
        
        pageComponents: [],
        
        init() {
            // Auto-generate slug from title
            this.$watch('pageData.title', (value) => {
                if (value && !this.pageData.slug) {
                    this.pageData.slug = value.toLowerCase()
                        .replace(/[^a-z0-9 -]/g, '')
                        .replace(/\s+/g, '-')
                        .replace(/-+/g, '-')
                        .trim('-');
                }
            });
            
            // Auto-save functionality
            if (this.pageData.autoSave) {
                setInterval(() => {
                    if (this.pageComponents.length > 0) {
                        this.autoSave();
                    }
                }, 30000); // Auto-save every 30 seconds
            }
            
            // Load sample page if no components exist
            this.loadSamplePage();
        },
        
        loadSamplePage() {
            // Only load sample if no components exist and no page title is set
            if (this.pageComponents.length === 0 && !this.pageData.title) {
                this.pageData.title = 'Sample Page - Welcome to Our Website';
                this.pageData.slug = 'sample-page-welcome';
                
                // Add sample components
                this.addSampleComponent('hero', {
                    title: 'Welcome to Our Amazing Website',
                    subtitle: 'We create beautiful, dynamic pages that engage your audience'
                });
                
                this.addSampleComponent('main-content', {
                    title: 'About Our Company',
                    content: '<p>We are a leading company in the industry, dedicated to providing exceptional services and innovative solutions. Our team of experts works tirelessly to deliver the best results for our clients.</p><p>With years of experience and a passion for excellence, we have built a reputation for quality and reliability that speaks for itself.</p>',
                    contentType: 'html',
                    backgroundColor: 'white'
                });
                
                this.addSampleComponent('services', {
                    title: 'Our Services'
                });
                
                this.addSampleComponent('dynamic-section', {
                    title: 'Why Choose Us',
                    leftTitle: 'Innovation',
                    leftContent: 'We use cutting-edge technology and innovative approaches to solve complex problems and deliver outstanding results.',
                    rightTitle: 'Experience',
                    rightContent: 'With over 10 years of experience in the industry, we have the knowledge and expertise to handle any project.',
                    layout: 'side-by-side'
                });
                
                this.addSampleComponent('text', {
                    title: 'Our Mission',
                    content: '<p>Our mission is to empower businesses with innovative solutions that drive growth and success. We believe in building long-term partnerships based on trust, quality, and mutual success.</p>'
                });
                
                this.addSampleComponent('image', {
                    imageUrl: 'https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80',
                    caption: 'Our amazing team working together'
                });
            }
        },
        
        addSampleComponent(type, customSettings = {}) {
            const componentId = Date.now() + Math.random();
            const componentTemplates = {
                'hero': {
                    id: componentId,
                    type: 'hero',
                    name: 'Hero Section',
                    settings: {
                        title: 'Welcome to Our Website',
                        subtitle: 'We create amazing experiences',
                        ...customSettings
                    }
                },
                'text': {
                    id: componentId,
                    type: 'text',
                    name: 'Text Block',
                    settings: {
                        title: 'About Us',
                        content: '<p>Your content goes here...</p>',
                        ...customSettings
                    }
                },
                'image': {
                    id: componentId,
                    type: 'image',
                    name: 'Image',
                    settings: {
                        imageUrl: '',
                        caption: 'Image caption',
                        ...customSettings
                    }
                },
                'services': {
                    id: componentId,
                    type: 'services',
                    name: 'Services',
                    settings: {
                        title: 'Our Services',
                        ...customSettings
                    }
                },
                'main-content': {
                    id: componentId,
                    type: 'main-content',
                    name: 'Main Content',
                    settings: {
                        title: 'Main Content',
                        content: '<p>This is your main content area. Add your primary content here...</p>',
                        contentType: 'text',
                        backgroundColor: 'white',
                        ...customSettings
                    }
                },
                'dynamic-section': {
                    id: componentId,
                    type: 'dynamic-section',
                    name: 'Dynamic Section',
                    settings: {
                        title: 'Dynamic Section',
                        leftTitle: 'Left Content',
                        leftContent: 'Left side content...',
                        rightTitle: 'Right Content',
                        rightContent: 'Right side content...',
                        layout: 'side-by-side',
                        ...customSettings
                    }
                }
            };
            
            if (componentTemplates[type]) {
                this.pageComponents.push(componentTemplates[type]);
            }
        },
        
        clearSample() {
            if (confirm('Are you sure you want to clear all components and start fresh?')) {
                this.pageComponents = [];
                this.pageData.title = '';
                this.pageData.slug = '';
                this.editingComponent = null;
            }
        },
        
        autoSave() {
            // Silent auto-save without user notification
            const pageData = {
                ...this.pageData,
                page_builder_data: this.pageComponents,
                _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            };
            
            fetch('{{ route("admin.pages.save-builder") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': pageData._token,
                    'Accept': 'application/json'
                },
                body: JSON.stringify(pageData)
            }).catch(error => {
                console.log('Auto-save failed:', error);
            });
        },
        
        duplicateComponent(index) {
            const originalComponent = this.pageComponents[index];
            const duplicatedComponent = {
                ...originalComponent,
                id: Date.now() + Math.random(),
                settings: { ...originalComponent.settings }
            };
            
            this.pageComponents.splice(index + 1, 0, duplicatedComponent);
        },
        
        moveComponentUp(index) {
            if (index > 0) {
                const component = this.pageComponents.splice(index, 1)[0];
                this.pageComponents.splice(index - 1, 0, component);
            }
        },
        
        moveComponentDown(index) {
            if (index < this.pageComponents.length - 1) {
                const component = this.pageComponents.splice(index, 1)[0];
                this.pageComponents.splice(index + 1, 0, component);
            }
        },
        
        addComponent(type) {
            const componentId = Date.now() + Math.random();
            const componentTemplates = {
                'hero': {
                    id: componentId,
                    type: 'hero',
                    name: 'Hero Section',
                    settings: {
                        title: 'Welcome to Our Website',
                        subtitle: 'We create amazing experiences'
                    }
                },
                'text': {
                    id: componentId,
                    type: 'text',
                    name: 'Text Block',
                    settings: {
                        title: 'About Us',
                        content: '<p>Your content goes here...</p>'
                    }
                },
                'image': {
                    id: componentId,
                    type: 'image',
                    name: 'Image',
                    settings: {
                        imageUrl: '',
                        caption: 'Image caption'
                    }
                },
                'services': {
                    id: componentId,
                    type: 'services',
                    name: 'Services',
                    settings: {
                        title: 'Our Services'
                    }
                },
                'main-content': {
                    id: componentId,
                    type: 'main-content',
                    name: 'Main Content',
                    settings: {
                        title: 'Main Content',
                        content: '<p>This is your main content area. Add your primary content here...</p>',
                        contentType: 'text',
                        backgroundColor: 'white'
                    }
                },
                'dynamic-section': {
                    id: componentId,
                    type: 'dynamic-section',
                    name: 'Dynamic Section',
                    settings: {
                        title: 'Dynamic Section',
                        leftTitle: 'Left Content',
                        leftContent: 'Left side content...',
                        rightTitle: 'Right Content',
                        rightContent: 'Right side content...',
                        layout: 'side-by-side'
                    }
                }
            };
            
            if (componentTemplates[type]) {
                this.pageComponents.push(componentTemplates[type]);
            }
        },
        
        removeComponent(index) {
            if (confirm('Remove this component?')) {
                this.pageComponents.splice(index, 1);
                this.editingComponent = null;
            }
        },
        
        editComponent(index) {
            this.editingComponent = index;
        },
        
        async savePage() {
            if (this.saving) return;
            
            this.saving = true;
            
            try {
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
                    alert('Page saved successfully!');
                } else {
                    throw new Error(result.message || 'Failed to save page');
                }
            } catch (error) {
                console.error('Save error:', error);
                alert('Failed to save page: ' + error.message);
            } finally {
                this.saving = false;
            }
        }
    }
}
</script>
@endsection