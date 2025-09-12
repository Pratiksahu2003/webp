@extends('layouts.admin')

@section('page-title', 'Site Settings')

@section('content')
<div x-data="settingsManager()" class="max-w-4xl">
    <!-- Settings Navigation -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-6">
        <div class="border-b border-gray-200">
            <nav class="flex space-x-8 px-6" aria-label="Tabs">
                <button @click="activeTab = 'general'" :class="activeTab === 'general' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                    General
                </button>
                <button @click="activeTab = 'branding'" :class="activeTab === 'branding' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                    Branding
                </button>
                <button @click="activeTab = 'colors'" :class="activeTab === 'colors' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                    Colors & Theme
                </button>
                <button @click="activeTab = 'seo'" :class="activeTab === 'seo' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                    SEO
                </button>
                <button @click="activeTab = 'contact'" :class="activeTab === 'contact' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                    Contact Info
                </button>
                <button @click="activeTab = 'social'" :class="activeTab === 'social' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                    Social Media
                </button>
            </nav>
        </div>
    </div>

    <!-- Settings Content -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <form @submit.prevent="saveSettings()" class="p-6">
            <!-- General Settings -->
            <div x-show="activeTab === 'general'" class="space-y-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">General Settings</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Site Title</label>
                        <input x-model="settings.site_title" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Your Site Title">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Site Tagline</label>
                        <input x-model="settings.site_tagline" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Your site tagline">
                    </div>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Site Description</label>
                    <textarea x-model="settings.site_description" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Describe your website..."></textarea>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Admin Email</label>
                        <input x-model="settings.admin_email" type="email" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="admin@example.com">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Timezone</label>
                        <select x-model="settings.timezone" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="UTC">UTC</option>
                            <option value="America/New_York">Eastern Time</option>
                            <option value="America/Chicago">Central Time</option>
                            <option value="America/Denver">Mountain Time</option>
                            <option value="America/Los_Angeles">Pacific Time</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Branding Settings -->
            <div x-show="activeTab === 'branding'" class="space-y-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Branding</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Logo URL</label>
                        <div class="flex">
                            <input x-model="settings.logo_url" type="url" class="flex-1 px-3 py-2 border border-gray-300 rounded-l-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="https://example.com/logo.png">
                            <button type="button" class="px-4 py-2 bg-gray-100 border border-l-0 border-gray-300 rounded-r-lg hover:bg-gray-200">
                                Upload
                            </button>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Favicon URL</label>
                        <div class="flex">
                            <input x-model="settings.favicon_url" type="url" class="flex-1 px-3 py-2 border border-gray-300 rounded-l-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="https://example.com/favicon.ico">
                            <button type="button" class="px-4 py-2 bg-gray-100 border border-l-0 border-gray-300 rounded-r-lg hover:bg-gray-200">
                                Upload
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Logo Preview -->
                <div x-show="settings.logo_url" class="p-4 border border-gray-200 rounded-lg bg-gray-50">
                    <p class="text-sm text-gray-600 mb-2">Logo Preview:</p>
                    <img :src="settings.logo_url" class="max-h-16 object-contain" alt="Logo preview">
                </div>
            </div>

            <!-- Colors & Theme Settings -->
            <div x-show="activeTab === 'colors'" class="space-y-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Colors & Theme</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Primary Color</label>
                        <div class="flex items-center space-x-3">
                            <input x-model="settings.primary_color" type="color" class="w-12 h-10 border border-gray-300 rounded cursor-pointer">
                            <input x-model="settings.primary_color" type="text" class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="#ff6b35">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Secondary Color</label>
                        <div class="flex items-center space-x-3">
                            <input x-model="settings.secondary_color" type="color" class="w-12 h-10 border border-gray-300 rounded cursor-pointer">
                            <input x-model="settings.secondary_color" type="text" class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="#f7931e">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Accent Color</label>
                        <div class="flex items-center space-x-3">
                            <input x-model="settings.accent_color" type="color" class="w-12 h-10 border border-gray-300 rounded cursor-pointer">
                            <input x-model="settings.accent_color" type="text" class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="#ff8c42">
                        </div>
                    </div>
                </div>

                <!-- Color Preview -->
                <div class="p-6 border border-gray-200 rounded-lg bg-gray-50">
                    <p class="text-sm text-gray-600 mb-4">Color Preview:</p>
                    <div class="flex space-x-4">
                        <div class="flex-1 p-4 rounded-lg text-white text-center" :style="`background-color: ${settings.primary_color}`">
                            <p class="font-medium">Primary</p>
                            <p class="text-sm opacity-90">Button, Links</p>
                        </div>
                        <div class="flex-1 p-4 rounded-lg text-white text-center" :style="`background-color: ${settings.secondary_color}`">
                            <p class="font-medium">Secondary</p>
                            <p class="text-sm opacity-90">Highlights</p>
                        </div>
                        <div class="flex-1 p-4 rounded-lg text-white text-center" :style="`background-color: ${settings.accent_color}`">
                            <p class="font-medium">Accent</p>
                            <p class="text-sm opacity-90">Call-to-action</p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Font Family</label>
                        <select x-model="settings.font_family" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="Inter">Inter</option>
                            <option value="Roboto">Roboto</option>
                            <option value="Open Sans">Open Sans</option>
                            <option value="Lato">Lato</option>
                            <option value="Poppins">Poppins</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Theme Mode</label>
                        <select x-model="settings.theme_mode" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="light">Light</option>
                            <option value="dark">Dark</option>
                            <option value="auto">Auto (System)</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- SEO Settings -->
            <div x-show="activeTab === 'seo'" class="space-y-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">SEO Settings</h3>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Meta Title</label>
                    <input x-model="settings.meta_title" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Default meta title for your site">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Meta Description</label>
                    <textarea x-model="settings.meta_description" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Default meta description for your site..."></textarea>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Meta Keywords</label>
                    <input x-model="settings.meta_keywords" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="keyword1, keyword2, keyword3">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Google Analytics ID</label>
                        <input x-model="settings.google_analytics_id" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="GA-XXXXXXXXX-X">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Google Search Console</label>
                        <input x-model="settings.google_search_console" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Verification code">
                    </div>
                </div>
            </div>

            <!-- Contact Info Settings -->
            <div x-show="activeTab === 'contact'" class="space-y-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Contact Information</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                        <input x-model="settings.phone" type="tel" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="+1 (555) 123-4567">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                        <input x-model="settings.email" type="email" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="info@example.com">
                    </div>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                    <textarea x-model="settings.address" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="123 Main St, City, State 12345"></textarea>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Business Hours</label>
                        <textarea x-model="settings.business_hours" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Mon-Fri: 9AM-5PM&#10;Sat: 10AM-2PM&#10;Sun: Closed"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Map Embed Code</label>
                        <textarea x-model="settings.map_embed" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="<iframe src='...'></iframe>"></textarea>
                    </div>
                </div>
            </div>

            <!-- Social Media Settings -->
            <div x-show="activeTab === 'social'" class="space-y-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Social Media Links</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Facebook</label>
                        <input x-model="settings.facebook_url" type="url" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="https://facebook.com/yourpage">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Twitter</label>
                        <input x-model="settings.twitter_url" type="url" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="https://twitter.com/youraccount">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">LinkedIn</label>
                        <input x-model="settings.linkedin_url" type="url" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="https://linkedin.com/company/yourcompany">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Instagram</label>
                        <input x-model="settings.instagram_url" type="url" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="https://instagram.com/youraccount">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">YouTube</label>
                        <input x-model="settings.youtube_url" type="url" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="https://youtube.com/c/yourchannel">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">GitHub</label>
                        <input x-model="settings.github_url" type="url" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="https://github.com/youraccount">
                    </div>
                </div>
            </div>

            <!-- Save Button -->
            <div class="flex justify-end pt-6 border-t border-gray-200">
                <button type="submit" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors">
                    <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3-3m0 0l-3 3m3-3v12"></path>
                    </svg>
                    Save All Settings
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function settingsManager() {
    return {
        activeTab: 'general',
        settings: {
            // General
            site_title: 'WEZOM - IT Partner',
            site_tagline: 'Software Development Company',
            site_description: 'Professional IT services and software development solutions',
            admin_email: 'admin@wezom.com',
            timezone: 'UTC',
            
            // Branding
            logo_url: '',
            favicon_url: '',
            
            // Colors
            primary_color: '#ff6b35',
            secondary_color: '#f7931e',
            accent_color: '#ff8c42',
            font_family: 'Inter',
            theme_mode: 'light',
            
            // SEO
            meta_title: 'WEZOM - Professional IT Services & Software Development',
            meta_description: 'Leading IT company providing software development, web development, mobile apps, and digital solutions.',
            meta_keywords: 'software development, web development, mobile apps, IT services',
            google_analytics_id: '',
            google_search_console: '',
            
            // Contact
            phone: '+1 872 225 3074',
            email: 'info@wezom.com',
            address: 'Schaumburg, Illinois, 1821 Walden Office Square, 406\nNew York, 112 W. 34th Street, 17th and 18th Floors',
            business_hours: 'Mon-Fri: 9AM-6PM\nSat-Sun: Closed',
            map_embed: '',
            
            // Social
            facebook_url: '',
            twitter_url: '',
            linkedin_url: '',
            instagram_url: '',
            youtube_url: '',
            github_url: ''
        },
        
        saveSettings() {
            // Here you would send the settings to your Laravel backend
            console.log('Saving settings:', this.settings);
            
            // Simulate API call
            alert('Settings saved successfully!');
        }
    }
}
</script>
@endsection
