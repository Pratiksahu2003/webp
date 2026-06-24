@extends('layouts.admin')

@section('title', 'Dashboard - VanTroZ Admin')
@section('page-title', 'Dashboard')

@section('content')
@php
    $maxRevenue = max($monthlyRevenue->max('revenue'), 1);
@endphp

<div class="p-8 bg-gray-50 min-h-full">
    {{-- Header --}}
    <div class="mb-8">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Welcome back, {{ auth()->user()->name }}</h1>
                <p class="text-gray-600">Overview of your content, commerce, and orders.</p>
            </div>
            <div class="flex flex-wrap items-center gap-3">
                <a href="{{ route('admin.orders.export') }}" class="zoho-btn zoho-btn-outline">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Export Orders
                </a>
                <a href="{{ route('admin.pages.create') }}" class="zoho-btn zoho-btn-primary">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    New Page
                </a>
            </div>
        </div>
    </div>

    {{-- Stats --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4 mb-8">
        <div class="zoho-stat-card">
            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mb-3">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            </div>
            <h3 class="zoho-metric">{{ $stats['pages'] }}</h3>
            <p class="text-gray-600 font-medium mt-1">Pages</p>
            <p class="text-sm text-gray-500 mt-1">{{ $stats['pagesThisWeek'] }} added this week</p>
        </div>

        <div class="zoho-stat-card">
            <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center mb-3">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
            </div>
            <h3 class="zoho-metric">{{ $stats['blogPosts'] }}</h3>
            <p class="text-gray-600 font-medium mt-1">Blog Posts</p>
            <p class="text-sm text-gray-500 mt-1">{{ $stats['publishedPosts'] }} published · {{ $stats['draftPosts'] }} drafts</p>
        </div>

        <div class="zoho-stat-card">
            <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-xl flex items-center justify-center mb-3">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2V6"></path></svg>
            </div>
            <h3 class="zoho-metric">{{ $stats['services'] }}</h3>
            <p class="text-gray-600 font-medium mt-1">Services</p>
            <p class="text-sm text-gray-500 mt-1">{{ $stats['subServices'] }} sub-services · {{ $stats['packages'] }} packages</p>
        </div>

        <div class="zoho-stat-card">
            <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center mb-3">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
            </div>
            <h3 class="zoho-metric">{{ $orderStats['total'] }}</h3>
            <p class="text-gray-600 font-medium mt-1">Orders</p>
            <p class="text-sm text-gray-500 mt-1">{{ $orderStats['pending'] }} pending · {{ $orderStats['paid'] }} paid</p>
        </div>

        <div class="zoho-stat-card">
            <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center mb-3">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <h3 class="zoho-metric">₹{{ number_format($orderStats['totalRevenue'], 0) }}</h3>
            <p class="text-gray-600 font-medium mt-1">Total Revenue</p>
            <p class="text-sm text-gray-500 mt-1">₹{{ number_format($orderStats['revenueThisMonth'], 0) }} this month</p>
        </div>

        <div class="zoho-stat-card">
            <div class="w-12 h-12 bg-gradient-to-br from-teal-500 to-teal-600 rounded-xl flex items-center justify-center mb-3">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            </div>
            <h3 class="zoho-metric">{{ $stats['customers'] }}</h3>
            <p class="text-gray-600 font-medium mt-1">Customers</p>
            <p class="text-sm text-gray-500 mt-1">{{ $stats['technologies'] }} technologies · {{ $stats['media'] }} media files</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        {{-- Left column --}}
        <div class="lg:col-span-2 space-y-8">
            {{-- Revenue chart --}}
            <div class="zoho-card">
                <div class="p-6 border-b border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-xl font-bold text-gray-900">Orders & Revenue</h3>
                            <p class="text-gray-600 mt-1">Last 12 months from your database</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm text-gray-600">This month</p>
                            <p class="text-lg font-bold text-gray-900">{{ $orderStats['ordersThisMonth'] }} orders</p>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-8 mb-6">
                        <div>
                            <p class="text-sm text-gray-600">Paid Revenue (12 mo.)</p>
                            <p class="text-2xl font-bold text-gray-900">₹{{ number_format($monthlyRevenue->sum('revenue'), 0) }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Total Orders (12 mo.)</p>
                            <p class="text-2xl font-bold text-gray-900">{{ number_format($monthlyRevenue->sum('orders')) }}</p>
                        </div>
                    </div>

                    @if($monthlyRevenue->sum('revenue') === 0.0 && $monthlyRevenue->sum('orders') === 0)
                        <div class="h-48 flex items-center justify-center bg-gray-50 rounded-lg text-gray-500">
                            No order data yet. Revenue will appear here once orders are placed.
                        </div>
                    @else
                        <div class="flex items-end justify-between h-56 gap-2 px-2">
                            @foreach($monthlyRevenue as $month)
                                @php $barHeight = $month['revenue'] > 0 ? max(12, ($month['revenue'] / $maxRevenue) * 200) : 4; @endphp
                                <div class="flex flex-col items-center flex-1 h-full justify-end group">
                                    <div class="chart-bar w-full max-w-[2.5rem] bg-gradient-to-t from-blue-600 to-blue-400 rounded-t-lg transition-all duration-300 group-hover:from-blue-700 group-hover:to-blue-500"
                                         style="height: {{ $barHeight }}px"
                                         data-value="₹{{ number_format($month['revenue'], 0) }}"
                                         title="{{ $month['label'] }} {{ $month['year'] }}: ₹{{ number_format($month['revenue'], 0) }} ({{ $month['orders'] }} orders)"></div>
                                    <span class="text-xs text-gray-500 mt-2">{{ $month['label'] }}</span>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            {{-- Recent orders --}}
            <div class="zoho-card">
                <div class="p-6 border-b border-gray-100 flex items-center justify-between">
                    <div>
                        <h3 class="text-xl font-bold text-gray-900">Recent Orders</h3>
                        <p class="text-gray-600 mt-1">Latest customer purchases</p>
                    </div>
                    <a href="{{ route('admin.orders.index') }}" class="zoho-btn zoho-btn-outline text-sm">View All</a>
                </div>
                <div class="overflow-x-auto">
                    @if($recentOrders->isEmpty())
                        <div class="p-8 text-center text-gray-500">No orders yet.</div>
                    @else
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Order</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Customer</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Amount</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach($recentOrders as $order)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        <a href="{{ route('admin.orders.show', $order) }}" class="font-medium text-blue-600 hover:text-blue-800">{{ $order->order_number }}</a>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $order->user->name }}</div>
                                        <div class="text-sm text-gray-500">{{ $order->user->email }}</div>
                                    </td>
                                    <td class="px-6 py-4 text-sm">₹{{ number_format($order->amount, 2) }}</td>
                                    <td class="px-6 py-4">
                                        <span class="px-2 py-1 text-xs rounded-full
                                            @if($order->payment_status === 'paid') bg-green-100 text-green-800
                                            @elseif($order->payment_status === 'pending') bg-yellow-100 text-yellow-800
                                            @elseif($order->payment_status === 'failed') bg-red-100 text-red-800
                                            @else bg-gray-100 text-gray-800 @endif">
                                            {{ ucfirst($order->payment_status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">{{ $order->created_at->format('M d, Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>

            {{-- Activity feed --}}
            <div class="zoho-card">
                <div class="p-6 border-b border-gray-100">
                    <h3 class="text-xl font-bold text-gray-900">Recent Activity</h3>
                    <p class="text-gray-600 mt-1">Latest updates across your site</p>
                </div>
                <div class="p-6">
                    @if($recentActivity->isEmpty())
                        <p class="text-gray-500 text-center py-6">No activity yet. Create pages, posts, or services to see updates here.</p>
                    @else
                        <div class="space-y-4">
                            @foreach($recentActivity as $activity)
                            <a href="{{ $activity['url'] }}" data-activity-item
                               class="flex items-start gap-4 p-4 rounded-xl hover:bg-gray-50 transition-all group {{ $activity['url'] === '#' ? 'pointer-events-none' : '' }}">
                                <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0
                                    @if($activity['color'] === 'blue') bg-blue-100 text-blue-600
                                    @elseif($activity['color'] === 'purple') bg-purple-100 text-purple-600
                                    @elseif($activity['color'] === 'emerald') bg-emerald-100 text-emerald-600
                                    @elseif($activity['color'] === 'orange') bg-orange-100 text-orange-600
                                    @else bg-pink-100 text-pink-600 @endif">
                                    @if($activity['type'] === 'order')
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                                    @elseif($activity['type'] === 'blog')
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    @elseif($activity['type'] === 'service')
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2V6"></path></svg>
                                    @elseif($activity['type'] === 'media')
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    @else
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                    @endif
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="font-medium text-gray-900 truncate">{{ $activity['title'] }}</p>
                                    <p class="text-sm text-gray-600">{{ $activity['description'] }}</p>
                                    <p class="text-xs text-gray-400 mt-1">{{ $activity['time']->diffForHumans() }}</p>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Right column --}}
        <div class="space-y-8">
            {{-- Quick actions --}}
            <div class="zoho-card">
                <div class="p-6 border-b border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900">Quick Actions</h3>
                </div>
                <div class="p-6 space-y-3">
                    <a href="{{ route('admin.pages.create') }}" class="flex items-center p-3 bg-blue-50 rounded-xl hover:bg-blue-100 transition-colors">
                        <span class="font-medium text-gray-900">Create Page</span>
                    </a>
                    <a href="{{ route('admin.blog-posts.create') }}" class="flex items-center p-3 bg-purple-50 rounded-xl hover:bg-purple-100 transition-colors">
                        <span class="font-medium text-gray-900">Write Blog Post</span>
                    </a>
                    <a href="{{ route('admin.services.create') }}" class="flex items-center p-3 bg-indigo-50 rounded-xl hover:bg-indigo-100 transition-colors">
                        <span class="font-medium text-gray-900">Add Service</span>
                    </a>
                    <a href="{{ route('admin.orders.index') }}" class="flex items-center p-3 bg-emerald-50 rounded-xl hover:bg-emerald-100 transition-colors">
                        <span class="font-medium text-gray-900">Manage Orders</span>
                    </a>
                </div>
            </div>

            {{-- Action items --}}
            <div class="zoho-card">
                <div class="p-6 border-b border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900">Needs Attention</h3>
                    <p class="text-gray-600 mt-1 text-sm">{{ $actionItems->count() }} item{{ $actionItems->count() !== 1 ? 's' : '' }}</p>
                </div>
                <div class="p-6">
                    @if($actionItems->isEmpty())
                        <p class="text-gray-500 text-sm">All caught up — no pending drafts or orders.</p>
                    @else
                        <div class="space-y-3">
                            @foreach($actionItems as $item)
                            <a href="{{ $item['url'] }}" class="block p-3 rounded-xl border border-gray-100 hover:border-gray-200 hover:bg-gray-50 transition-all">
                                <p class="text-sm font-medium text-gray-900">{{ $item['label'] }}</p>
                                @if(!empty($item['due']))
                                    <p class="text-xs text-gray-500 mt-1">Due {{ $item['due'] }}</p>
                                @endif
                                <span class="inline-block mt-2 px-2 py-0.5 text-xs rounded-full
                                    @if($item['priority'] === 'high') bg-red-100 text-red-700
                                    @elseif($item['priority'] === 'medium') bg-yellow-100 text-yellow-700
                                    @else bg-green-100 text-green-700 @endif">
                                    {{ ucfirst($item['priority']) }}
                                </span>
                            </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            {{-- Order status breakdown --}}
            <div class="zoho-card">
                <div class="p-6 border-b border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900">Order Status</h3>
                </div>
                <div class="p-6 space-y-3">
                    @if($orderStats['total'] === 0)
                        <p class="text-gray-500 text-sm">No orders recorded yet.</p>
                    @else
                        @foreach(['paid', 'pending', 'processing', 'failed', 'cancelled', 'refunded'] as $status)
                            @if(($orderStats[$status] ?? 0) > 0)
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-700 capitalize">{{ $status }}</span>
                                <span class="text-sm font-bold text-gray-900">{{ $orderStats[$status] }}</span>
                            </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>

            {{-- Recent blog posts --}}
            <div class="zoho-card">
                <div class="p-6 border-b border-gray-100 flex items-center justify-between">
                    <h3 class="text-lg font-bold text-gray-900">Recent Blog Posts</h3>
                    <a href="{{ route('admin.blog-posts.index') }}" class="text-sm text-blue-600 hover:text-blue-800">View All</a>
                </div>
                <div class="p-6">
                    @if($recentBlogPosts->isEmpty())
                        <p class="text-gray-500 text-sm">No blog posts yet.</p>
                    @else
                        <div class="space-y-4">
                            @foreach($recentBlogPosts as $post)
                            <a href="{{ route('admin.blog-posts.edit', $post) }}" class="block hover:bg-gray-50 p-2 rounded-lg -mx-2 transition-colors">
                                <p class="font-medium text-gray-900 text-sm truncate">{{ $post->title }}</p>
                                <div class="flex items-center gap-2 mt-1">
                                    <span class="text-xs px-2 py-0.5 rounded-full
                                        @if($post->status === 'published') bg-green-100 text-green-800
                                        @elseif($post->status === 'draft') bg-yellow-100 text-yellow-800
                                        @elseif($post->status === 'scheduled') bg-blue-100 text-blue-800
                                        @else bg-gray-100 text-gray-800 @endif">
                                        {{ $post->status_label }}
                                    </span>
                                    <span class="text-xs text-gray-400">{{ $post->updated_at->diffForHumans() }}</span>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
