@extends('layouts.admin')

@section('page-title', 'System Information')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">System Information</h1>
            <p class="text-gray-600 mt-1">View system status and configuration details</p>
        </div>
        <div class="flex items-center space-x-3">
            <button onclick="location.reload()" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                </svg>
                Refresh
            </button>
        </div>
    </div>

    <!-- System Overview -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600">PHP Version</p>
                    <p class="text-2xl font-bold text-gray-900">{{ PHP_VERSION }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600">Laravel Version</p>
                    <p class="text-2xl font-bold text-gray-900">{{ app()->version() }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600">Database</p>
                    <p class="text-2xl font-bold text-gray-900">{{ config('database.default') }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mr-4">
                    <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600">Environment</p>
                    <p class="text-2xl font-bold text-gray-900">{{ app()->environment() }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Detailed System Info -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- PHP Configuration -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">PHP Configuration</h3>
            </div>
            <div class="p-6">
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Memory Limit</span>
                        <span class="font-medium">{{ ini_get('memory_limit') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Max Execution Time</span>
                        <span class="font-medium">{{ ini_get('max_execution_time') }}s</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Upload Max Filesize</span>
                        <span class="font-medium">{{ ini_get('upload_max_filesize') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Post Max Size</span>
                        <span class="font-medium">{{ ini_get('post_max_size') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Max Input Vars</span>
                        <span class="font-medium">{{ ini_get('max_input_vars') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Laravel Configuration -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">Laravel Configuration</h3>
            </div>
            <div class="p-6">
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Debug Mode</span>
                        <span class="font-medium">
                            @if(config('app.debug'))
                                <span class="text-red-600">Enabled</span>
                            @else
                                <span class="text-green-600">Disabled</span>
                            @endif
                        </span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Cache Driver</span>
                        <span class="font-medium">{{ config('cache.default') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Session Driver</span>
                        <span class="font-medium">{{ config('session.driver') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Queue Driver</span>
                        <span class="font-medium">{{ config('queue.default') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Mail Driver</span>
                        <span class="font-medium">{{ config('mail.default') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Server Information -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">Server Information</h3>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Server Software</span>
                        <span class="font-medium">{{ $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Server OS</span>
                        <span class="font-medium">{{ PHP_OS }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Server IP</span>
                        <span class="font-medium">{{ $_SERVER['SERVER_ADDR'] ?? 'Unknown' }}</span>
                    </div>
                </div>
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Document Root</span>
                        <span class="font-medium text-right text-sm">{{ $_SERVER['DOCUMENT_ROOT'] ?? 'Unknown' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Current Time</span>
                        <span class="font-medium">{{ now()->format('Y-m-d H:i:s T') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Timezone</span>
                        <span class="font-medium">{{ config('app.timezone') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- PHP Extensions -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">PHP Extensions</h3>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
                @php
                    $extensions = get_loaded_extensions();
                    $requiredExtensions = ['bcmath', 'ctype', 'curl', 'dom', 'fileinfo', 'filter', 'hash', 'mbstring', 'openssl', 'pcre', 'pdo', 'tokenizer', 'xml'];
                @endphp
                @foreach($extensions as $extension)
                    <div class="flex items-center space-x-2">
                        @if(in_array($extension, $requiredExtensions))
                            <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                        @else
                            <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                        @endif
                        <span class="text-sm text-gray-700">{{ $extension }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
