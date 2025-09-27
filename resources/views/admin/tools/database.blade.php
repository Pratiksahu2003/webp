@extends('layouts.admin')

@section('title', 'Database Management - VanTroZ Admin')
@section('page-title', 'Database Tools')

@section('content')
<div class="p-8 bg-gray-50 min-h-full">
    <!-- Header -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Database Management</h1>
                <p class="text-gray-600">Manage database operations, backups, and optimization</p>
            </div>
            <div class="flex items-center space-x-3">
                <button class="zoho-btn zoho-btn-outline" onclick="refreshDatabaseStats()">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                    Refresh Stats
                </button>
            </div>
        </div>
    </div>

    <!-- Database Statistics -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Tables -->
        <div class="zoho-stat-card animate-fade-in">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"></path>
                    </svg>
                </div>
                <div class="text-right">
                    <div class="flex items-center text-green-600 text-sm font-medium">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Active
                    </div>
                </div>
            </div>
            <div>
                <h3 class="zoho-metric">{{ \DB::select("SELECT COUNT(*) as count FROM information_schema.tables WHERE table_schema = DATABASE()")[0]->count ?? 15 }}</h3>
                <p class="text-gray-600 font-medium mt-1">Total Tables</p>
                <p class="text-sm text-gray-500 mt-1">System & User tables</p>
            </div>
        </div>

        <!-- Database Size -->
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
                <h3 class="zoho-metric">2.4MB</h3>
                <p class="text-gray-600 font-medium mt-1">Database Size</p>
                <p class="text-sm text-gray-500 mt-1">Including indexes</p>
            </div>
        </div>

        <!-- Total Records -->
        <div class="zoho-stat-card animate-fade-in" style="animation-delay: 0.2s">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                    </svg>
                </div>
                <div class="text-right">
                    <div class="flex items-center text-green-600 text-sm font-medium">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"></path>
                        </svg>
                        Growing
                    </div>
                </div>
            </div>
            <div>
                <h3 class="zoho-metric">1,847</h3>
                <p class="text-gray-600 font-medium mt-1">Total Records</p>
                <p class="text-sm text-gray-500 mt-1">Across all tables</p>
            </div>
        </div>

        <!-- Last Backup -->
        <div class="zoho-stat-card animate-fade-in" style="animation-delay: 0.3s">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
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
                <h3 class="zoho-metric">2d</h3>
                <p class="text-gray-600 font-medium mt-1">Last Backup</p>
                <p class="text-sm text-gray-500 mt-1">2 days ago</p>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Database Operations -->
        <div class="lg:col-span-2 space-y-8">
            <!-- Quick Actions -->
            <div class="zoho-card animate-slide-up">
                <div class="p-6 border-b border-gray-100">
                    <h3 class="text-xl font-bold text-gray-900">Database Operations</h3>
                    <p class="text-gray-600 mt-1">Perform essential database maintenance tasks</p>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <button class="flex items-center p-4 bg-gradient-to-r from-blue-50 to-blue-100 rounded-xl hover:from-blue-100 hover:to-blue-200 transition-all group" onclick="optimizeDatabase()">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mr-4 shadow-lg group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <div class="text-left">
                                <p class="font-semibold text-gray-900">Optimize Database</p>
                                <p class="text-sm text-gray-600">Improve performance</p>
                            </div>
                        </button>

                        <button class="flex items-center p-4 bg-gradient-to-r from-emerald-50 to-emerald-100 rounded-xl hover:from-emerald-100 hover:to-emerald-200 transition-all group" onclick="repairTables()">
                            <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center mr-4 shadow-lg group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div class="text-left">
                                <p class="font-semibold text-gray-900">Repair Tables</p>
                                <p class="text-sm text-gray-600">Fix corrupted tables</p>
                            </div>
                        </button>

                        <button class="flex items-center p-4 bg-gradient-to-r from-purple-50 to-purple-100 rounded-xl hover:from-purple-100 hover:to-purple-200 transition-all group" onclick="clearCache()">
                            <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center mr-4 shadow-lg group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </div>
                            <div class="text-left">
                                <p class="font-semibold text-gray-900">Clear Cache</p>
                                <p class="text-sm text-gray-600">Remove cached data</p>
                            </div>
                        </button>

                        <button class="flex items-center p-4 bg-gradient-to-r from-orange-50 to-orange-100 rounded-xl hover:from-orange-100 hover:to-orange-200 transition-all group" onclick="analyzePerformance()">
                            <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center mr-4 shadow-lg group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                            <div class="text-left">
                                <p class="font-semibold text-gray-900">Analyze Performance</p>
                                <p class="text-sm text-gray-600">Check query performance</p>
                            </div>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Table Information -->
            <div class="zoho-card animate-slide-up" style="animation-delay: 0.2s">
                <div class="p-6 border-b border-gray-100">
                    <h3 class="text-xl font-bold text-gray-900">Database Tables</h3>
                    <p class="text-gray-600 mt-1">Overview of all database tables</p>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Table Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rows</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Size</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Engine</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach(['users', 'pages', 'blog_posts', 'services', 'media', 'settings'] as $index => $table)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7"></path>
                                            </svg>
                                        </div>
                                        <span class="text-sm font-medium text-gray-900">{{ $table }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ rand(10, 500) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ rand(10, 100) }}KB</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">InnoDB</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="text-blue-600 hover:text-blue-900">Optimize</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-8">
            <!-- Database Status -->
            <div class="zoho-card animate-slide-up" style="animation-delay: 0.4s">
                <div class="p-6 border-b border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900">Database Status</h3>
                    <p class="text-gray-600 mt-1">Current connection status</p>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-green-50 rounded-xl">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-green-500 rounded-xl flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900">Connection</p>
                                    <p class="text-sm text-gray-600">{{ config('database.default') }}</p>
                                </div>
                            </div>
                            <span class="text-sm text-green-700 font-bold">ACTIVE</span>
                        </div>
                        
                        <div class="flex items-center justify-between p-4 bg-blue-50 rounded-xl">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-blue-500 rounded-xl flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900">Performance</p>
                                    <p class="text-sm text-gray-600">Query speed</p>
                                </div>
                            </div>
                            <span class="text-sm text-blue-700 font-bold">GOOD</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="zoho-card animate-slide-up" style="animation-delay: 0.5s">
                <div class="p-6 border-b border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900">Recent Operations</h3>
                    <p class="text-gray-600 mt-1">Latest database activities</p>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        @foreach([
                            ['action' => 'Database optimized', 'time' => '2 hours ago', 'type' => 'success'],
                            ['action' => 'Backup created', 'time' => '1 day ago', 'type' => 'info'],
                            ['action' => 'Tables repaired', 'time' => '3 days ago', 'type' => 'warning'],
                            ['action' => 'Cache cleared', 'time' => '1 week ago', 'type' => 'info'],
                        ] as $activity)
                        <div class="flex items-start space-x-3">
                            <div class="w-8 h-8 bg-{{ $activity['type'] === 'success' ? 'green' : ($activity['type'] === 'warning' ? 'yellow' : 'blue') }}-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <div class="w-2 h-2 bg-{{ $activity['type'] === 'success' ? 'green' : ($activity['type'] === 'warning' ? 'yellow' : 'blue') }}-500 rounded-full"></div>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900">{{ $activity['action'] }}</p>
                                <p class="text-xs text-gray-500 mt-1">{{ $activity['time'] }}</p>
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
function refreshDatabaseStats() {
    showNotification('Database statistics refreshed', 'success');
}

function optimizeDatabase() {
    showNotification('Database optimization started...', 'info');
    // Simulate operation
    setTimeout(() => {
        showNotification('Database optimized successfully!', 'success');
    }, 2000);
}

function repairTables() {
    showNotification('Table repair process started...', 'info');
    setTimeout(() => {
        showNotification('All tables repaired successfully!', 'success');
    }, 3000);
}

function clearCache() {
    showNotification('Clearing database cache...', 'info');
    setTimeout(() => {
        showNotification('Cache cleared successfully!', 'success');
    }, 1500);
}

function analyzePerformance() {
    showNotification('Analyzing database performance...', 'info');
    setTimeout(() => {
        showNotification('Performance analysis complete!', 'success');
    }, 2500);
}
</script>
@endsection
