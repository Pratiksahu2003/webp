@extends('layouts.admin')

@section('title', 'Data Export - VanTroZ Admin')
@section('page-title', 'Export Tools')

@section('content')
<div class="p-8 bg-gray-50 min-h-full">
    <!-- Header -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Data Export Center</h1>
                <p class="text-gray-600">Export your data in various formats for backup or migration</p>
            </div>
            <div class="flex items-center space-x-3">
                <button class="zoho-btn zoho-btn-outline" onclick="showExportHistory()">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Export History
                </button>
                <button class="zoho-btn zoho-btn-primary" onclick="startQuickExport()">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Quick Export
                </button>
            </div>
        </div>
    </div>

    <!-- Export Statistics -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Exports -->
        <div class="zoho-stat-card animate-fade-in">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <div class="text-right">
                    <div class="flex items-center text-green-600 text-sm font-medium">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                        </svg>
                        +15%
                    </div>
                </div>
            </div>
            <div>
                <h3 class="zoho-metric">47</h3>
                <p class="text-gray-600 font-medium mt-1">Total Exports</p>
                <p class="text-sm text-gray-500 mt-1">This month</p>
            </div>
        </div>

        <!-- Data Volume -->
        <div class="zoho-stat-card animate-fade-in" style="animation-delay: 0.1s">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                </div>
                <div class="text-right">
                    <div class="flex items-center text-blue-600 text-sm font-medium">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                        Optimized
                    </div>
                </div>
            </div>
            <div>
                <h3 class="zoho-metric">2.4GB</h3>
                <p class="text-gray-600 font-medium mt-1">Data Exported</p>
                <p class="text-sm text-gray-500 mt-1">Total volume</p>
            </div>
        </div>

        <!-- Success Rate -->
        <div class="zoho-stat-card animate-fade-in" style="animation-delay: 0.2s">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="text-right">
                    <div class="flex items-center text-green-600 text-sm font-medium">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Excellent
                    </div>
                </div>
            </div>
            <div>
                <h3 class="zoho-metric">98.5%</h3>
                <p class="text-gray-600 font-medium mt-1">Success Rate</p>
                <p class="text-sm text-gray-500 mt-1">Export completion</p>
            </div>
        </div>

        <!-- Last Export -->
        <div class="zoho-stat-card animate-fade-in" style="animation-delay: 0.3s">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="text-right">
                    <div class="flex items-center text-green-600 text-sm font-medium">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Recent
                    </div>
                </div>
            </div>
            <div>
                <h3 class="zoho-metric">2h</h3>
                <p class="text-gray-600 font-medium mt-1">Last Export</p>
                <p class="text-sm text-gray-500 mt-1">2 hours ago</p>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Export Options -->
        <div class="lg:col-span-2 space-y-8">
            <!-- Export Types -->
            <div class="zoho-card animate-slide-up">
                <div class="p-6 border-b border-gray-100">
                    <h3 class="text-xl font-bold text-gray-900">Export Data</h3>
                    <p class="text-gray-600 mt-1">Choose what data to export and in which format</p>
                </div>
                <div class="p-6">
                    <form class="space-y-6" onsubmit="startExport(event)">
                        <!-- Data Selection -->
                        <div>
                            <label class="text-base font-semibold text-gray-900">Select Data to Export</label>
                            <p class="text-sm text-gray-600 mb-4">Choose which data tables to include in your export</p>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="space-y-3">
                                    <label class="flex items-center p-3 border border-gray-200 rounded-lg hover:bg-gray-50 cursor-pointer">
                                        <input type="checkbox" name="export_data[]" value="users" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" checked>
                                        <div class="ml-3 flex items-center">
                                            <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="font-medium text-gray-900">Users</p>
                                                <p class="text-sm text-gray-500">User accounts and profiles</p>
                                            </div>
                                        </div>
                                    </label>

                                    <label class="flex items-center p-3 border border-gray-200 rounded-lg hover:bg-gray-50 cursor-pointer">
                                        <input type="checkbox" name="export_data[]" value="pages" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" checked>
                                        <div class="ml-3 flex items-center">
                                            <div class="w-8 h-8 bg-emerald-100 rounded-lg flex items-center justify-center mr-3">
                                                <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="font-medium text-gray-900">Pages</p>
                                                <p class="text-sm text-gray-500">Website pages content</p>
                                            </div>
                                        </div>
                                    </label>

                                    <label class="flex items-center p-3 border border-gray-200 rounded-lg hover:bg-gray-50 cursor-pointer">
                                        <input type="checkbox" name="export_data[]" value="blog_posts" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                        <div class="ml-3 flex items-center">
                                            <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                                                <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="font-medium text-gray-900">Blog Posts</p>
                                                <p class="text-sm text-gray-500">Articles and blog content</p>
                                            </div>
                                        </div>
                                    </label>
                                </div>

                                <div class="space-y-3">
                                    <label class="flex items-center p-3 border border-gray-200 rounded-lg hover:bg-gray-50 cursor-pointer">
                                        <input type="checkbox" name="export_data[]" value="services" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                        <div class="ml-3 flex items-center">
                                            <div class="w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center mr-3">
                                                <svg class="w-4 h-4 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2V6"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="font-medium text-gray-900">Services</p>
                                                <p class="text-sm text-gray-500">Service offerings</p>
                                            </div>
                                        </div>
                                    </label>

                                    <label class="flex items-center p-3 border border-gray-200 rounded-lg hover:bg-gray-50 cursor-pointer">
                                        <input type="checkbox" name="export_data[]" value="media" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                        <div class="ml-3 flex items-center">
                                            <div class="w-8 h-8 bg-pink-100 rounded-lg flex items-center justify-center mr-3">
                                                <svg class="w-4 h-4 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="font-medium text-gray-900">Media Files</p>
                                                <p class="text-sm text-gray-500">Images and documents</p>
                                            </div>
                                        </div>
                                    </label>

                                    <label class="flex items-center p-3 border border-gray-200 rounded-lg hover:bg-gray-50 cursor-pointer">
                                        <input type="checkbox" name="export_data[]" value="settings" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                        <div class="ml-3 flex items-center">
                                            <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center mr-3">
                                                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="font-medium text-gray-900">Settings</p>
                                                <p class="text-sm text-gray-500">System configuration</p>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Export Format -->
                        <div>
                            <label class="text-base font-semibold text-gray-900">Export Format</label>
                            <p class="text-sm text-gray-600 mb-4">Choose the format for your exported data</p>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <label class="flex items-center p-4 border-2 border-gray-200 rounded-lg hover:border-blue-300 cursor-pointer">
                                    <input type="radio" name="format" value="csv" class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500" checked>
                                    <div class="ml-3">
                                        <p class="font-medium text-gray-900">CSV</p>
                                        <p class="text-sm text-gray-500">Comma-separated values</p>
                                    </div>
                                </label>

                                <label class="flex items-center p-4 border-2 border-gray-200 rounded-lg hover:border-blue-300 cursor-pointer">
                                    <input type="radio" name="format" value="json" class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                                    <div class="ml-3">
                                        <p class="font-medium text-gray-900">JSON</p>
                                        <p class="text-sm text-gray-500">JavaScript Object Notation</p>
                                    </div>
                                </label>

                                <label class="flex items-center p-4 border-2 border-gray-200 rounded-lg hover:border-blue-300 cursor-pointer">
                                    <input type="radio" name="format" value="sql" class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                                    <div class="ml-3">
                                        <p class="font-medium text-gray-900">SQL</p>
                                        <p class="text-sm text-gray-500">Database dump</p>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <!-- Additional Options -->
                        <div>
                            <label class="text-base font-semibold text-gray-900">Additional Options</label>
                            <div class="mt-4 space-y-3">
                                <label class="flex items-center">
                                    <input type="checkbox" name="include_schema" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                    <span class="ml-2 text-sm text-gray-700">Include database schema</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="compress" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" checked>
                                    <span class="ml-2 text-sm text-gray-700">Compress export file (ZIP)</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="email_notification" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                    <span class="ml-2 text-sm text-gray-700">Send email notification when complete</span>
                                </label>
                            </div>
                        </div>

                        <!-- Export Button -->
                        <div class="flex justify-end space-x-3">
                            <button type="button" class="zoho-btn zoho-btn-outline">
                                Schedule Export
                            </button>
                            <button type="submit" class="zoho-btn zoho-btn-primary">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Start Export
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-8">
            <!-- Export Status -->
            <div class="zoho-card animate-slide-up" style="animation-delay: 0.4s">
                <div class="p-6 border-b border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900">Export Status</h3>
                    <p class="text-gray-600 mt-1">Current export operations</p>
                </div>
                <div class="p-6">
                    <div class="text-center py-8">
                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <p class="text-gray-600">No active exports</p>
                        <p class="text-sm text-gray-500 mt-1">Start an export to see progress here</p>
                    </div>
                </div>
            </div>

            <!-- Recent Exports -->
            <div class="zoho-card animate-slide-up" style="animation-delay: 0.5s">
                <div class="p-6 border-b border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900">Recent Exports</h3>
                    <p class="text-gray-600 mt-1">Download previous exports</p>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        @foreach([
                            ['name' => 'users_export.csv', 'size' => '2.4MB', 'date' => '2 hours ago', 'status' => 'completed'],
                            ['name' => 'full_backup.sql', 'size' => '15.2MB', 'date' => '1 day ago', 'status' => 'completed'],
                            ['name' => 'pages_content.json', 'size' => '847KB', 'date' => '3 days ago', 'status' => 'completed'],
                        ] as $export)
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-900">{{ $export['name'] }}</p>
                                    <p class="text-xs text-gray-500">{{ $export['size'] }} • {{ $export['date'] }}</p>
                                </div>
                            </div>
                            <button class="text-blue-600 hover:text-blue-700 text-sm font-medium">
                                Download
                            </button>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Export Tips -->
            <div class="zoho-card animate-slide-up" style="animation-delay: 0.6s">
                <div class="p-6 border-b border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900">Export Tips</h3>
                </div>
                <div class="p-6">
                    <div class="space-y-3">
                        <div class="flex items-start">
                            <div class="w-6 h-6 bg-blue-100 rounded-full flex items-center justify-center mr-3 mt-0.5">
                                <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                            </div>
                            <p class="text-sm text-gray-700">Use CSV format for spreadsheet compatibility</p>
                        </div>
                        <div class="flex items-start">
                            <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mr-3 mt-0.5">
                                <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                            </div>
                            <p class="text-sm text-gray-700">JSON format preserves data structure</p>
                        </div>
                        <div class="flex items-start">
                            <div class="w-6 h-6 bg-purple-100 rounded-full flex items-center justify-center mr-3 mt-0.5">
                                <div class="w-2 h-2 bg-purple-500 rounded-full"></div>
                            </div>
                            <p class="text-sm text-gray-700">Enable compression for large exports</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function startQuickExport() {
    showNotification('Starting quick export...', 'info');
    // Simulate export process
    setTimeout(() => {
        showNotification('Quick export completed successfully!', 'success');
    }, 3000);
}

function startExport(event) {
    event.preventDefault();
    const formData = new FormData(event.target);
    const selectedData = formData.getAll('export_data[]');
    const format = formData.get('format');
    
    if (selectedData.length === 0) {
        showNotification('Please select at least one data type to export', 'warning');
        return;
    }
    
    showNotification(`Starting export of ${selectedData.join(', ')} as ${format.toUpperCase()}...`, 'info');
    
    // Simulate export progress
    setTimeout(() => {
        showNotification('Export completed successfully!', 'success');
    }, 4000);
}

function showExportHistory() {
    showNotification('Loading export history...', 'info');
}
</script>
@endsection
