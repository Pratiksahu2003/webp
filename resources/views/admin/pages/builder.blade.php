@extends('layouts.admin')

@section('page-title', 'Page Builder')

@section('content')
<div x-data="pageBuilder()" class="h-full">
    <!-- Page Builder Header -->
    <div class="bg-white border-b border-gray-200 px-6 py-4 mb-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Page Builder</h1>
                <p class="text-gray-600 mt-1">Drag and drop components to build your page</p>
            </div>
            <div class="flex items-center space-x-4">
                <button @click="previewMode = !previewMode" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition-colors">
                    <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                    Preview
                </button>
                <button @click="savePage()" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors">
                    <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3-3m0 0l-3 3m3-3v12"></path>
                    </svg>
                    Save Page
                </button>
            </div>
        </div>
    </div>

    <div class="flex h-full">
        <!-- Components Sidebar -->
        <div x-show="!previewMode" class="w-80 bg-white border-r border-gray-200 overflow-y-auto">
            <div class="p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Components</h3>
                
                <!-- Hero Components -->
                <div class="mb-6">
                    <h4 class="text-sm font-medium text-gray-700 mb-3">Hero Sections</h4>
                    <div class="grid grid-cols-2 gap-3">
                        <div @click="addComponent('hero-default')" class="cursor-pointer p-3 border border-gray-200 rounded-lg hover:border-blue-300 hover:bg-blue-50 transition-colors">
                            <div class="w-full h-12 bg-gradient-to-r from-blue-500 to-purple-600 rounded mb-2"></div>
                            <p class="text-xs text-gray-600 text-center">Default Hero</p>
                        </div>
                        <div @click="addComponent('hero-video')" class="cursor-pointer p-3 border border-gray-200 rounded-lg hover:border-blue-300 hover:bg-blue-50 transition-colors">
                            <div class="w-full h-12 bg-gradient-to-r from-gray-800 to-gray-600 rounded mb-2 flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </div>
                            <p class="text-xs text-gray-600 text-center">Video Hero</p>
                        </div>
                    </div>
                </div>

                <!-- Content Components -->
                <div class="mb-6">
                    <h4 class="text-sm font-medium text-gray-700 mb-3">Content Blocks</h4>
                    <div class="space-y-3">
                        <div @click="addComponent('text-block')" class="cursor-pointer p-3 border border-gray-200 rounded-lg hover:border-blue-300 hover:bg-blue-50 transition-colors">
                            <div class="space-y-2">
                                <div class="w-3/4 h-2 bg-gray-300 rounded"></div>
                                <div class="w-full h-2 bg-gray-200 rounded"></div>
                                <div class="w-2/3 h-2 bg-gray-200 rounded"></div>
                            </div>
                            <p class="text-xs text-gray-600 mt-2">Text Block</p>
                        </div>
                        <div @click="addComponent('image-text')" class="cursor-pointer p-3 border border-gray-200 rounded-lg hover:border-blue-300 hover:bg-blue-50 transition-colors">
                            <div class="flex space-x-2">
                                <div class="w-1/3 h-8 bg-gray-300 rounded"></div>
                                <div class="w-2/3 space-y-1">
                                    <div class="w-full h-1 bg-gray-200 rounded"></div>
                                    <div class="w-3/4 h-1 bg-gray-200 rounded"></div>
                                </div>
                            </div>
                            <p class="text-xs text-gray-600 mt-2">Image + Text</p>
                        </div>
                    </div>
                </div>

                <!-- Service Components -->
                <div class="mb-6">
                    <h4 class="text-sm font-medium text-gray-700 mb-3">Services</h4>
                    <div class="space-y-3">
                        <div @click="addComponent('services-grid')" class="cursor-pointer p-3 border border-gray-200 rounded-lg hover:border-blue-300 hover:bg-blue-50 transition-colors">
                            <div class="grid grid-cols-2 gap-1">
                                <div class="h-6 bg-blue-100 rounded"></div>
                                <div class="h-6 bg-blue-100 rounded"></div>
                                <div class="h-6 bg-blue-100 rounded"></div>
                                <div class="h-6 bg-blue-100 rounded"></div>
                            </div>
                            <p class="text-xs text-gray-600 mt-2">Services Grid</p>
                        </div>
                        <div @click="addComponent('services-carousel')" class="cursor-pointer p-3 border border-gray-200 rounded-lg hover:border-blue-300 hover:bg-blue-50 transition-colors">
                            <div class="flex space-x-1 overflow-hidden">
                                <div class="w-8 h-6 bg-green-100 rounded flex-shrink-0"></div>
                                <div class="w-8 h-6 bg-green-100 rounded flex-shrink-0"></div>
                                <div class="w-8 h-6 bg-green-100 rounded flex-shrink-0"></div>
                            </div>
                            <p class="text-xs text-gray-600 mt-2">Services Carousel</p>
                        </div>
                    </div>
                </div>

                <!-- Team & Testimonials -->
                <div class="mb-6">
                    <h4 class="text-sm font-medium text-gray-700 mb-3">Team & Reviews</h4>
                    <div class="space-y-3">
                        <div @click="addComponent('team-grid')" class="cursor-pointer p-3 border border-gray-200 rounded-lg hover:border-blue-300 hover:bg-blue-50 transition-colors">
                            <div class="grid grid-cols-3 gap-1">
                                <div class="w-full h-4 bg-purple-100 rounded-full"></div>
                                <div class="w-full h-4 bg-purple-100 rounded-full"></div>
                                <div class="w-full h-4 bg-purple-100 rounded-full"></div>
                            </div>
                            <p class="text-xs text-gray-600 mt-2">Team Grid</p>
                        </div>
                        <div @click="addComponent('testimonials')" class="cursor-pointer p-3 border border-gray-200 rounded-lg hover:border-blue-300 hover:bg-blue-50 transition-colors">
                            <div class="space-y-1">
                                <div class="w-full h-1 bg-yellow-200 rounded"></div>
                                <div class="w-3/4 h-1 bg-yellow-200 rounded"></div>
                                <div class="flex items-center space-x-1 mt-2">
                                    <div class="w-3 h-3 bg-yellow-300 rounded-full"></div>
                                    <div class="w-2/3 h-1 bg-gray-200 rounded"></div>
                                </div>
                            </div>
                            <p class="text-xs text-gray-600 mt-2">Testimonials</p>
                        </div>
                    </div>
                </div>

                <!-- Contact Components -->
                <div class="mb-6">
                    <h4 class="text-sm font-medium text-gray-700 mb-3">Contact</h4>
                    <div class="space-y-3">
                        <div @click="addComponent('contact-form')" class="cursor-pointer p-3 border border-gray-200 rounded-lg hover:border-blue-300 hover:bg-blue-50 transition-colors">
                            <div class="space-y-1">
                                <div class="w-full h-2 bg-gray-200 rounded"></div>
                                <div class="w-full h-2 bg-gray-200 rounded"></div>
                                <div class="w-full h-4 bg-gray-200 rounded"></div>
                                <div class="w-1/3 h-2 bg-blue-300 rounded"></div>
                            </div>
                            <p class="text-xs text-gray-600 mt-2">Contact Form</p>
                        </div>
                        <div @click="addComponent('map-section')" class="cursor-pointer p-3 border border-gray-200 rounded-lg hover:border-blue-300 hover:bg-blue-50 transition-colors">
                            <div class="w-full h-8 bg-green-200 rounded"></div>
                            <p class="text-xs text-gray-600 mt-2">Map Section</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page Canvas -->
        <div class="flex-1 bg-gray-50 overflow-y-auto">
            <div class="max-w-6xl mx-auto p-6">
                <!-- Page Settings Panel -->
                <div x-show="!previewMode" class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Page Settings</h3>
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
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Page Content Area -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 min-h-96">
                    <div class="p-6">
                        <!-- Sortable Components List -->
                        <div x-show="pageComponents.length === 0" class="text-center py-12">
                            <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Start Building Your Page</h3>
                            <p class="text-gray-600 mb-4">Drag components from the sidebar to start building your page</p>
                        </div>

                        <!-- Component List -->
                        <div x-show="pageComponents.length > 0" class="space-y-4">
                            <template x-for="(component, index) in pageComponents" :key="component.id">
                                <div class="border border-gray-200 rounded-lg p-4 bg-gray-50 relative group">
                                    <!-- Component Header -->
                                    <div class="flex items-center justify-between mb-3">
                                        <h4 class="text-sm font-medium text-gray-900" x-text="component.name"></h4>
                                        <div class="flex items-center space-x-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                            <button @click="editComponent(index)" class="text-blue-600 hover:text-blue-800">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                            </button>
                                            <button @click="removeComponent(index)" class="text-red-600 hover:text-red-800">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <!-- Component Preview -->
                                    <div class="bg-white rounded p-4 border">
                                        <div x-show="component.type === 'hero-default'">
                                            <div class="bg-gradient-to-r from-blue-500 to-purple-600 text-white p-8 rounded-lg text-center">
                                                <h2 class="text-2xl font-bold mb-2" x-text="component.settings.title || 'Hero Title'"></h2>
                                                <p x-text="component.settings.subtitle || 'Hero subtitle text here'"></p>
                                            </div>
                                        </div>
                                        
                                        <div x-show="component.type === 'text-block'">
                                            <div class="prose max-w-none">
                                                <h3 x-text="component.settings.title || 'Section Title'"></h3>
                                                <p x-text="component.settings.content || 'Section content goes here...'"></p>
                                            </div>
                                        </div>
                                        
                                        <div x-show="component.type === 'services-grid'">
                                            <div class="text-center mb-6">
                                                <h3 class="text-xl font-bold" x-text="component.settings.title || 'Our Services'"></h3>
                                            </div>
                                            <div class="grid grid-cols-2 gap-4">
                                                <div class="p-4 border rounded-lg text-center">
                                                    <div class="w-12 h-12 bg-blue-100 rounded-lg mx-auto mb-2"></div>
                                                    <h4 class="font-medium">Service 1</h4>
                                                </div>
                                                <div class="p-4 border rounded-lg text-center">
                                                    <div class="w-12 h-12 bg-green-100 rounded-lg mx-auto mb-2"></div>
                                                    <h4 class="font-medium">Service 2</h4>
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

        <!-- Component Settings Panel -->
        <div x-show="editingComponent !== null && !previewMode" class="w-80 bg-white border-l border-gray-200 p-6 overflow-y-auto">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-gray-900">Component Settings</h3>
                <button @click="editingComponent = null" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <div x-show="editingComponent !== null">
                <!-- Dynamic settings based on component type -->
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                        <input x-model="pageComponents[editingComponent]?.settings.title" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    
                    <div x-show="['hero-default', 'text-block'].includes(pageComponents[editingComponent]?.type)">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Content</label>
                        <textarea x-model="pageComponents[editingComponent]?.settings.content" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Background Color</label>
                        <select x-model="pageComponents[editingComponent]?.settings.backgroundColor" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="transparent">Transparent</option>
                            <option value="white">White</option>
                            <option value="gray-50">Light Gray</option>
                            <option value="blue-50">Light Blue</option>
                            <option value="green-50">Light Green</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function pageBuilder() {
    return {
        previewMode: false,
        editingComponent: null,
        pageData: {
            title: '',
            slug: '',
            template: 'default',
            meta_title: '',
            meta_description: ''
        },
        pageComponents: [],
        
        addComponent(type) {
            const componentId = Date.now();
            const componentTemplates = {
                'hero-default': {
                    id: componentId,
                    type: 'hero-default',
                    name: 'Default Hero',
                    settings: {
                        title: 'Welcome to Our Website',
                        subtitle: 'We create amazing digital experiences',
                        backgroundColor: 'transparent',
                        textColor: 'white'
                    }
                },
                'text-block': {
                    id: componentId,
                    type: 'text-block',
                    name: 'Text Block',
                    settings: {
                        title: 'About Us',
                        content: 'Tell your story here...',
                        backgroundColor: 'white',
                        textColor: 'gray-900'
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
                        columns: 3
                    }
                }
            };
            
            if (componentTemplates[type]) {
                this.pageComponents.push(componentTemplates[type]);
            }
        },
        
        removeComponent(index) {
            if (confirm('Are you sure you want to remove this component?')) {
                this.pageComponents.splice(index, 1);
                this.editingComponent = null;
            }
        },
        
        editComponent(index) {
            this.editingComponent = index;
        },
        
        savePage() {
            const pageData = {
                ...this.pageData,
                page_builder_data: this.pageComponents
            };
            
            // Here you would send the data to your Laravel backend
            console.log('Saving page:', pageData);
            
            // Simulate API call
            alert('Page saved successfully!');
        }
    }
}
</script>
@endsection
