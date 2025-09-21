@extends('layouts.admin')

@section('title', 'Data Import - WEZOM Admin')
@section('page-title', 'Import Tools')

@section('content')
<div class="p-8 bg-gray-50 min-h-full">
    <!-- Header -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Data Import Center</h1>
                <p class="text-gray-600">Import data from various sources and formats</p>
            </div>
            <div class="flex items-center space-x-3">
                <button class="zoho-btn zoho-btn-outline" onclick="showImportTemplates()">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Download Templates
                </button>
                <button class="zoho-btn zoho-btn-primary" onclick="openFileDialog()">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path>
                    </svg>
                    Upload File
                </button>
            </div>
        </div>
    </div>

    <!-- Import Statistics -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Imports -->
        <div class="zoho-stat-card animate-fade-in">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path>
                    </svg>
                </div>
                <div class="text-right">
                    <div class="flex items-center text-green-600 text-sm font-medium">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                        </svg>
                        +25%
                    </div>
                </div>
            </div>
            <div>
                <h3 class="zoho-metric">32</h3>
                <p class="text-gray-600 font-medium mt-1">Total Imports</p>
                <p class="text-sm text-gray-500 mt-1">This month</p>
            </div>
        </div>

        <!-- Records Imported -->
        <div class="zoho-stat-card animate-fade-in" style="animation-delay: 0.1s">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                    </svg>
                </div>
                <div class="text-right">
                    <div class="flex items-center text-blue-600 text-sm font-medium">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                        Growing
                    </div>
                </div>
            </div>
            <div>
                <h3 class="zoho-metric">2,847</h3>
                <p class="text-gray-600 font-medium mt-1">Records Imported</p>
                <p class="text-sm text-gray-500 mt-1">Total records</p>
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
                <h3 class="zoho-metric">97.2%</h3>
                <p class="text-gray-600 font-medium mt-1">Success Rate</p>
                <p class="text-sm text-gray-500 mt-1">Import completion</p>
            </div>
        </div>

        <!-- Last Import -->
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
                <h3 class="zoho-metric">4h</h3>
                <p class="text-gray-600 font-medium mt-1">Last Import</p>
                <p class="text-sm text-gray-500 mt-1">4 hours ago</p>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Import Section -->
        <div class="lg:col-span-2 space-y-8">
            <!-- File Upload -->
            <div class="zoho-card animate-slide-up">
                <div class="p-6 border-b border-gray-100">
                    <h3 class="text-xl font-bold text-gray-900">Upload Data File</h3>
                    <p class="text-gray-600 mt-1">Select a file to import data into your system</p>
                </div>
                <div class="p-6">
                    <!-- Drag & Drop Area -->
                    <div class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center hover:border-blue-400 transition-colors" 
                         ondrop="handleDrop(event)" ondragover="handleDragOver(event)" ondragleave="handleDragLeave(event)">
                        <div class="mx-auto w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path>
                            </svg>
                        </div>
                        <h4 class="text-lg font-semibold text-gray-900 mb-2">Drop your file here</h4>
                        <p class="text-gray-600 mb-4">or click to browse files</p>
                        <input type="file" id="import-file" class="hidden" accept=".csv,.json,.sql,.xlsx" onchange="handleFileSelect(event)">
                        <button type="button" class="zoho-btn zoho-btn-primary" onclick="document.getElementById('import-file').click()">
                            Choose File
                        </button>
                        <p class="text-sm text-gray-500 mt-3">
                            Supported formats: CSV, JSON, SQL, Excel (.xlsx)
                        </p>
                    </div>

                    <!-- File Info (Hidden by default) -->
                    <div id="file-info" class="mt-6 p-4 bg-blue-50 rounded-lg border border-blue-200" style="display: none;">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900" id="file-name">filename.csv</p>
                                    <p class="text-sm text-gray-600" id="file-size">2.4 MB</p>
                                </div>
                            </div>
                            <button type="button" class="text-red-600 hover:text-red-700" onclick="removeFile()">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Import Configuration -->
            <div class="zoho-card animate-slide-up" style="animation-delay: 0.2s">
                <div class="p-6 border-b border-gray-100">
                    <h3 class="text-xl font-bold text-gray-900">Import Configuration</h3>
                    <p class="text-gray-600 mt-1">Configure how your data should be imported</p>
                </div>
                <div class="p-6">
                    <form class="space-y-6" onsubmit="startImport(event)">
                        <!-- Data Type Selection -->
                        <div>
                            <label class="text-base font-semibold text-gray-900">Data Type</label>
                            <p class="text-sm text-gray-600 mb-4">Select what type of data you're importing</p>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <label class="flex items-center p-4 border-2 border-gray-200 rounded-lg hover:border-blue-300 cursor-pointer">
                                    <input type="radio" name="data_type" value="users" class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500" checked>
                                    <div class="ml-3 flex items-center">
                                        <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-900">Users</p>
                                            <p class="text-sm text-gray-500">User accounts</p>
                                        </div>
                                    </div>
                                </label>

                                <label class="flex items-center p-4 border-2 border-gray-200 rounded-lg hover:border-blue-300 cursor-pointer">
                                    <input type="radio" name="data_type" value="products" class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                                    <div class="ml-3 flex items-center">
                                        <div class="w-8 h-8 bg-emerald-100 rounded-lg flex items-center justify-center mr-3">
                                            <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-900">Products</p>
                                            <p class="text-sm text-gray-500">Product catalog</p>
                                        </div>
                                    </div>
                                </label>

                                <label class="flex items-center p-4 border-2 border-gray-200 rounded-lg hover:border-blue-300 cursor-pointer">
                                    <input type="radio" name="data_type" value="content" class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                                    <div class="ml-3 flex items-center">
                                        <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                                            <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-900">Content</p>
                                            <p class="text-sm text-gray-500">Pages & posts</p>
                                        </div>
                                    </div>
                                </label>

                                <label class="flex items-center p-4 border-2 border-gray-200 rounded-lg hover:border-blue-300 cursor-pointer">
                                    <input type="radio" name="data_type" value="custom" class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                                    <div class="ml-3 flex items-center">
                                        <div class="w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center mr-3">
                                            <svg class="w-4 h-4 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-900">Custom</p>
                                            <p class="text-sm text-gray-500">Other data</p>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <!-- Import Options -->
                        <div>
                            <label class="text-base font-semibold text-gray-900">Import Options</label>
                            <div class="mt-4 space-y-3">
                                <label class="flex items-center">
                                    <input type="checkbox" name="skip_duplicates" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" checked>
                                    <span class="ml-2 text-sm text-gray-700">Skip duplicate records</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="validate_data" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" checked>
                                    <span class="ml-2 text-sm text-gray-700">Validate data before import</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="create_backup" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                    <span class="ml-2 text-sm text-gray-700">Create backup before import</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="send_notification" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                    <span class="ml-2 text-sm text-gray-700">Send notification when complete</span>
                                </label>
                            </div>
                        </div>

                        <!-- Import Actions -->
                        <div class="flex justify-end space-x-3">
                            <button type="button" class="zoho-btn zoho-btn-outline">
                                Preview Data
                            </button>
                            <button type="submit" class="zoho-btn zoho-btn-primary">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path>
                                </svg>
                                Start Import
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-8">
            <!-- Import Status -->
            <div class="zoho-card animate-slide-up" style="animation-delay: 0.4s">
                <div class="p-6 border-b border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900">Import Status</h3>
                    <p class="text-gray-600 mt-1">Current import operations</p>
                </div>
                <div class="p-6">
                    <div class="text-center py-8">
                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path>
                            </svg>
                        </div>
                        <p class="text-gray-600">No active imports</p>
                        <p class="text-sm text-gray-500 mt-1">Upload a file to start importing</p>
                    </div>
                </div>
            </div>

            <!-- Import Templates -->
            <div class="zoho-card animate-slide-up" style="animation-delay: 0.5s">
                <div class="p-6 border-b border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900">Import Templates</h3>
                    <p class="text-gray-600 mt-1">Download sample formats</p>
                </div>
                <div class="p-6">
                    <div class="space-y-3">
                        @foreach([
                            ['name' => 'Users Template', 'format' => 'CSV', 'description' => 'User account format'],
                            ['name' => 'Products Template', 'format' => 'Excel', 'description' => 'Product catalog format'],
                            ['name' => 'Content Template', 'format' => 'JSON', 'description' => 'Page/post format'],
                        ] as $template)
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-900">{{ $template['name'] }}</p>
                                    <p class="text-xs text-gray-500">{{ $template['format'] }} • {{ $template['description'] }}</p>
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

            <!-- Recent Imports -->
            <div class="zoho-card animate-slide-up" style="animation-delay: 0.6s">
                <div class="p-6 border-b border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900">Recent Imports</h3>
                    <p class="text-gray-600 mt-1">Latest import history</p>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        @foreach([
                            ['file' => 'users_data.csv', 'records' => '247', 'status' => 'completed', 'time' => '4 hours ago'],
                            ['file' => 'products.xlsx', 'records' => '156', 'status' => 'completed', 'time' => '1 day ago'],
                            ['file' => 'content_backup.json', 'records' => '89', 'status' => 'failed', 'time' => '2 days ago'],
                        ] as $import)
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-{{ $import['status'] === 'completed' ? 'green' : 'red' }}-100 rounded-lg flex items-center justify-center mr-3">
                                    @if($import['status'] === 'completed')
                                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    @else
                                        <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    @endif
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-900">{{ $import['file'] }}</p>
                                    <p class="text-xs text-gray-500">{{ $import['records'] }} records • {{ $import['time'] }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function openFileDialog() {
    document.getElementById('import-file').click();
}

function handleFileSelect(event) {
    const file = event.target.files[0];
    if (file) {
        displayFileInfo(file);
    }
}

function handleDrop(event) {
    event.preventDefault();
    const file = event.dataTransfer.files[0];
    if (file) {
        displayFileInfo(file);
    }
}

function handleDragOver(event) {
    event.preventDefault();
    event.currentTarget.style.borderColor = '#3B82F6';
    event.currentTarget.style.backgroundColor = '#EFF6FF';
}

function handleDragLeave(event) {
    event.currentTarget.style.borderColor = '#D1D5DB';
    event.currentTarget.style.backgroundColor = 'transparent';
}

function displayFileInfo(file) {
    document.getElementById('file-name').textContent = file.name;
    document.getElementById('file-size').textContent = formatFileSize(file.size);
    document.getElementById('file-info').style.display = 'block';
    showNotification(`File "${file.name}" selected successfully`, 'success');
}

function removeFile() {
    document.getElementById('file-info').style.display = 'none';
    document.getElementById('import-file').value = '';
    showNotification('File removed', 'info');
}

function formatFileSize(bytes) {
    if (bytes === 0) return '0 Bytes';
    const k = 1024;
    const sizes = ['Bytes', 'KB', 'MB', 'GB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
}

function startImport(event) {
    event.preventDefault();
    const fileInput = document.getElementById('import-file');
    
    if (!fileInput.files.length) {
        showNotification('Please select a file to import', 'warning');
        return;
    }
    
    const formData = new FormData(event.target);
    const dataType = formData.get('data_type');
    
    showNotification(`Starting import of ${dataType} data...`, 'info');
    
    // Simulate import progress
    setTimeout(() => {
        showNotification('Import completed successfully!', 'success');
    }, 4000);
}

function showImportTemplates() {
    showNotification('Downloading import templates...', 'info');
}
</script>
@endsection
