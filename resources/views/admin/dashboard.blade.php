@extends('layouts.admin')

@section('title', 'Dashboard - VanTroZ Admin')
@section('page-title', 'Dashboard')

@section('content')
@php
    $greeting = now()->hour < 12 ? 'Good morning' : (now()->hour < 17 ? 'Good afternoon' : 'Good evening');
@endphp

<div class="p-6 lg:p-8 bg-slate-50 min-h-full">
    <div class="mb-8 flex flex-col xl:flex-row xl:items-end xl:justify-between gap-4">
        <div>
            <p class="text-sm font-medium text-slate-500 mb-1">{{ now()->format('l, d M Y') }}</p>
            <h1 class="text-3xl font-bold text-slate-900">{{ $greeting }}, {{ auth()->user()->name }}</h1>
            <p class="text-slate-600 mt-1">Sales, invoices, clients, and site health in one place.</p>
        </div>
        <div class="flex flex-wrap gap-2">
            <a href="{{ route('admin.customers.create') }}" class="inline-flex items-center px-4 py-2 rounded-lg border border-slate-200 bg-white text-slate-700 text-sm font-medium hover:bg-slate-50">
                Onboard Client
            </a>
            <a href="{{ route('admin.invoices.create') }}" class="inline-flex items-center px-4 py-2 rounded-lg bg-blue-600 text-white text-sm font-medium hover:bg-blue-700">
                Create Invoice
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">
            <div class="flex items-start justify-between mb-4">
                <div>
                    <p class="text-sm text-slate-500">Revenue this month</p>
                    <p class="text-2xl font-bold text-slate-900 mt-1">₹{{ number_format($orderStats['revenueThisMonth'], 0) }}</p>
                </div>
                <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/></svg>
                </div>
            </div>
            <div class="flex items-center gap-2 text-sm">
                @if($salesInsights['revenueTrend'] === 'up')
                    <span class="text-emerald-600 font-medium">↑ {{ abs($salesInsights['revenueChangePct']) }}%</span>
                @else
                    <span class="text-rose-600 font-medium">↓ {{ abs($salesInsights['revenueChangePct']) }}%</span>
                @endif
                <span class="text-slate-400">vs last month</span>
            </div>
            <p class="text-xs text-slate-500 mt-2">GST collected: ₹{{ number_format($orderStats['gstCollectedThisMonth'], 0) }}</p>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">
            <div class="flex items-start justify-between mb-4">
                <div>
                    <p class="text-sm text-slate-500">Outstanding invoices</p>
                    <p class="text-2xl font-bold text-slate-900 mt-1">₹{{ number_format($invoiceStats['outstandingAmount'], 0) }}</p>
                </div>
                <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2z"/></svg>
                </div>
            </div>
            <p class="text-sm text-slate-600">{{ $invoiceStats['unpaid'] }} unpaid · {{ $invoiceStats['sentUnpaid'] }} sent</p>
            <a href="{{ route('admin.invoices.index') }}" class="inline-block text-xs text-blue-600 mt-2 hover:underline">Review receivables →</a>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">
            <div class="flex items-start justify-between mb-4">
                <div>
                    <p class="text-sm text-slate-500">Clients</p>
                    <p class="text-2xl font-bold text-slate-900 mt-1">{{ $stats['customers'] }}</p>
                </div>
                <div class="w-10 h-10 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
            </div>
            <p class="text-sm text-slate-600">+{{ $stats['customersThisMonth'] }} this month</p>
            <p class="text-xs text-slate-500 mt-2">Avg order value ₹{{ number_format($salesInsights['avgOrderValue'], 0) }}</p>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200 p-5 shadow-sm">
            <div class="flex items-start justify-between mb-4">
                <div>
                    <p class="text-sm text-slate-500">Collection rate</p>
                    <p class="text-2xl font-bold text-slate-900 mt-1">{{ $salesInsights['collectionRate'] }}%</p>
                </div>
                <div class="w-10 h-10 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                </div>
            </div>
            <p class="text-sm text-slate-600">{{ $orderStats['paid'] }} paid / {{ $orderStats['total'] }} total</p>
            <p class="text-xs text-slate-500 mt-2">{{ $stats['newContactLeads'] }} new contact leads</p>
        </div>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-6 gap-3 mb-8">
        <div class="bg-white rounded-xl border border-slate-200 px-4 py-3">
            <p class="text-xs text-slate-500">Orders (month)</p>
            <p class="text-lg font-semibold text-slate-900">{{ $orderStats['ordersThisMonth'] }}</p>
        </div>
        <div class="bg-white rounded-xl border border-slate-200 px-4 py-3">
            <p class="text-xs text-slate-500">Invoices</p>
            <p class="text-lg font-semibold text-slate-900">{{ $invoiceStats['total'] }}</p>
        </div>
        <div class="bg-white rounded-xl border border-slate-200 px-4 py-3">
            <p class="text-xs text-slate-500">Revenue lifetime</p>
            <p class="text-lg font-semibold text-slate-900">₹{{ number_format($orderStats['totalRevenue'], 0) }}</p>
        </div>
        <div class="bg-white rounded-xl border border-slate-200 px-4 py-3">
            <p class="text-xs text-slate-500">Services</p>
            <p class="text-lg font-semibold text-slate-900">{{ $stats['activeServices'] }}/{{ $stats['services'] }}</p>
        </div>
        <div class="bg-white rounded-xl border border-slate-200 px-4 py-3">
            <p class="text-xs text-slate-500">Blog posts</p>
            <p class="text-lg font-semibold text-slate-900">{{ $stats['publishedPosts'] }} live</p>
        </div>
        <div class="bg-white rounded-xl border border-slate-200 px-4 py-3">
            <p class="text-xs text-slate-500">Payment gateway</p>
            <p class="text-lg font-semibold {{ $gateway['is_configured'] ? 'text-emerald-600' : 'text-amber-600' }}">
                {{ $gateway['is_configured'] ? 'Live' : 'Mock' }}
            </p>
        </div>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
        <div class="xl:col-span-2 space-y-6">
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="px-6 py-5 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                    <div>
                        <h2 class="text-lg font-bold text-slate-900">Revenue trend</h2>
                        <p class="text-sm text-slate-500">Paid revenue & order volume · last 12 months</p>
                    </div>
                    <div class="flex gap-4 text-sm">
                        <div>
                            <p class="text-slate-500">12 mo revenue</p>
                            <p class="font-semibold text-slate-900">₹{{ number_format($monthlyRevenue->sum('revenue'), 0) }}</p>
                        </div>
                        <div>
                            <p class="text-slate-500">12 mo GST</p>
                            <p class="font-semibold text-slate-900">₹{{ number_format($monthlyRevenue->sum('gst'), 0) }}</p>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <div class="h-72">
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="px-5 py-4 border-b border-slate-100 flex items-center justify-between">
                        <h2 class="font-bold text-slate-900">Recent invoices</h2>
                        <a href="{{ route('admin.invoices.index') }}" class="text-sm text-blue-600 hover:underline">View all</a>
                    </div>
                    <div class="divide-y divide-slate-100">
                        @forelse($recentInvoices as $invoice)
                            <a href="{{ route('admin.invoices.show', $invoice) }}" class="block px-5 py-3.5 hover:bg-slate-50 transition-colors">
                                <div class="flex items-start justify-between gap-3">
                                    <div class="min-w-0">
                                        <p class="font-medium text-slate-900 truncate">{{ $invoice->order_number }}</p>
                                        <p class="text-sm text-slate-500 truncate">{{ $invoice->user->name }} · {{ $invoice->displayTitle() }}</p>
                                    </div>
                                    <div class="text-right flex-shrink-0">
                                        <p class="text-sm font-semibold text-slate-900">₹{{ number_format($invoice->amount, 0) }}</p>
                                        <span class="inline-block mt-1 text-[11px] px-2 py-0.5 rounded-full
                                            @if($invoice->payment_status === 'paid') bg-emerald-50 text-emerald-700
                                            @elseif($invoice->payment_status === 'pending') bg-amber-50 text-amber-700
                                            @else bg-slate-100 text-slate-600 @endif">
                                            {{ ucfirst($invoice->payment_status) }}
                                        </span>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <div class="px-5 py-8 text-center text-sm text-slate-500">
                                No invoices yet.
                                <a href="{{ route('admin.invoices.create') }}" class="text-blue-600 hover:underline">Create one</a>
                            </div>
                        @endforelse
                    </div>
                </div>

                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="px-5 py-4 border-b border-slate-100 flex items-center justify-between">
                        <h2 class="font-bold text-slate-900">Recent orders</h2>
                        <a href="{{ route('admin.orders.index') }}" class="text-sm text-blue-600 hover:underline">View all</a>
                    </div>
                    <div class="divide-y divide-slate-100">
                        @forelse($recentOrders as $order)
                            <a href="{{ $order->source === 'admin' ? route('admin.invoices.show', $order) : route('admin.orders.show', $order) }}"
                               class="block px-5 py-3.5 hover:bg-slate-50 transition-colors">
                                <div class="flex items-start justify-between gap-3">
                                    <div class="min-w-0">
                                        <p class="font-medium text-slate-900 truncate">{{ $order->order_number }}</p>
                                        <p class="text-sm text-slate-500 truncate">{{ $order->user->name }} · {{ $order->created_at->diffForHumans() }}</p>
                                    </div>
                                    <div class="text-right flex-shrink-0">
                                        <p class="text-sm font-semibold text-slate-900">₹{{ number_format($order->amount, 0) }}</p>
                                        <span class="inline-block mt-1 text-[11px] px-2 py-0.5 rounded-full
                                            @if($order->payment_status === 'paid') bg-emerald-50 text-emerald-700
                                            @elseif($order->payment_status === 'pending') bg-amber-50 text-amber-700
                                            @elseif($order->payment_status === 'failed') bg-rose-50 text-rose-700
                                            @else bg-slate-100 text-slate-600 @endif">
                                            {{ ucfirst($order->payment_status) }}
                                        </span>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <div class="px-5 py-8 text-center text-sm text-slate-500">No orders yet.</div>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm">
                <div class="px-6 py-5 border-b border-slate-100">
                    <h2 class="text-lg font-bold text-slate-900">Live activity</h2>
                    <p class="text-sm text-slate-500">Invoices, clients, leads, and content updates</p>
                </div>
                <div class="p-4">
                    @forelse($recentActivity as $activity)
                        <a href="{{ $activity['url'] }}"
                           class="flex items-start gap-3 px-3 py-3 rounded-xl hover:bg-slate-50 transition-colors {{ $activity['url'] === '#' ? 'pointer-events-none' : '' }}">
                            <div class="w-9 h-9 rounded-lg flex items-center justify-center flex-shrink-0
                                @if($activity['color'] === 'blue') bg-blue-50 text-blue-600
                                @elseif($activity['color'] === 'emerald') bg-emerald-50 text-emerald-600
                                @elseif($activity['color'] === 'orange') bg-orange-50 text-orange-600
                                @elseif($activity['color'] === 'teal') bg-teal-50 text-teal-600
                                @elseif($activity['color'] === 'purple') bg-violet-50 text-violet-600
                                @else bg-slate-100 text-slate-600 @endif">
                                @if(in_array($activity['type'], ['invoice', 'order']))
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2z"/></svg>
                                @elseif($activity['type'] === 'lead')
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                @elseif($activity['type'] === 'client')
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                @else
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                @endif
                            </div>
                            <div class="min-w-0 flex-1">
                                <p class="text-sm font-medium text-slate-900 truncate">{{ $activity['title'] }}</p>
                                <p class="text-xs text-slate-500 truncate">{{ $activity['description'] }}</p>
                            </div>
                            <span class="text-[11px] text-slate-400 flex-shrink-0">{{ $activity['time']->diffForHumans() }}</span>
                        </a>
                    @empty
                        <p class="text-center text-sm text-slate-500 py-8">No recent activity.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5">
                <h2 class="font-bold text-slate-900 mb-4">Quick actions</h2>
                <div class="space-y-2">
                    <a href="{{ route('admin.invoices.create') }}" class="flex items-center justify-between px-3 py-2.5 rounded-xl bg-blue-50 hover:bg-blue-100 text-sm font-medium text-slate-900">
                        Create tax invoice
                        <span class="text-blue-600">→</span>
                    </a>
                    <a href="{{ route('admin.customers.create') }}" class="flex items-center justify-between px-3 py-2.5 rounded-xl bg-sky-50 hover:bg-sky-100 text-sm font-medium text-slate-900">
                        Onboard client
                        <span class="text-sky-600">→</span>
                    </a>
                    <a href="{{ route('admin.contact-leads.index') }}" class="flex items-center justify-between px-3 py-2.5 rounded-xl bg-orange-50 hover:bg-orange-100 text-sm font-medium text-slate-900">
                        Contact leads
                        @if($stats['newContactLeads'] > 0)
                            <span class="text-xs bg-rose-500 text-white px-2 py-0.5 rounded-full">{{ $stats['newContactLeads'] }}</span>
                        @else
                            <span class="text-orange-600">→</span>
                        @endif
                    </a>
                    <a href="{{ route('admin.settings.company-profile.edit') }}" class="flex items-center justify-between px-3 py-2.5 rounded-xl bg-slate-50 hover:bg-slate-100 text-sm font-medium text-slate-900">
                        Company / GST profile
                        <span class="text-slate-500">→</span>
                    </a>
                    <a href="{{ route('admin.settings.payment-gateway.edit') }}" class="flex items-center justify-between px-3 py-2.5 rounded-xl bg-slate-50 hover:bg-slate-100 text-sm font-medium text-slate-900">
                        Payment gateway
                        <span class="text-xs {{ $gateway['is_configured'] ? 'text-emerald-600' : 'text-amber-600' }}">{{ $gateway['is_configured'] ? 'Configured' : 'Setup' }}</span>
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="px-5 py-4 border-b border-slate-100">
                    <h2 class="font-bold text-slate-900">Needs attention</h2>
                    <p class="text-xs text-slate-500 mt-0.5">{{ $actionItems->count() }} open item{{ $actionItems->count() === 1 ? '' : 's' }}</p>
                </div>
                <div class="p-3 max-h-80 overflow-y-auto">
                    @forelse($actionItems as $item)
                        <a href="{{ $item['url'] }}" class="block px-3 py-2.5 rounded-xl hover:bg-slate-50">
                            <p class="text-sm font-medium text-slate-900">{{ $item['label'] }}</p>
                            <span class="inline-block mt-1 text-[11px] px-2 py-0.5 rounded-full
                                @if($item['priority'] === 'high') bg-rose-50 text-rose-700
                                @elseif($item['priority'] === 'medium') bg-amber-50 text-amber-700
                                @else bg-emerald-50 text-emerald-700 @endif">
                                {{ ucfirst($item['priority']) }}
                            </span>
                        </a>
                    @empty
                        <p class="px-3 py-6 text-sm text-slate-500 text-center">You're all caught up.</p>
                    @endforelse
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5">
                <h2 class="font-bold text-slate-900 mb-4">Payment status mix</h2>
                <div class="h-44 mb-4">
                    <canvas id="statusChart"></canvas>
                </div>
                <div class="space-y-2">
                    @foreach(['paid', 'pending', 'processing', 'failed'] as $status)
                        <div class="flex items-center justify-between text-sm">
                            <span class="capitalize text-slate-600">{{ $status }}</span>
                            <span class="font-semibold text-slate-900">{{ $orderStats[$status] ?? 0 }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="bg-gradient-to-br from-slate-900 to-slate-800 rounded-2xl p-5 text-white">
                <p class="text-xs uppercase tracking-wider text-slate-400 mb-2">Invoice seller</p>
                <p class="font-semibold text-lg">{{ $company['legal_name'] ?? config('company.name') }}</p>
                <p class="text-sm text-slate-300 mt-1">
                    @if(!empty($company['gstin'])) GSTIN {{ $company['gstin'] }} @else GST not set @endif
                </p>
                <p class="text-sm text-slate-300">Default GST {{ number_format((float) ($company['default_gst_rate'] ?? 18), 0) }}%</p>
                <a href="{{ route('admin.settings.company-profile.edit') }}" class="inline-block mt-4 text-sm text-sky-300 hover:text-sky-200">Edit company profile →</a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const monthly = @json($monthlyRevenue->values());
    const orderStats = @json($orderStats);

    const revenueCtx = document.getElementById('revenueChart');
    if (revenueCtx && window.Chart) {
        new Chart(revenueCtx, {
            type: 'bar',
            data: {
                labels: monthly.map(m => m.label),
                datasets: [
                    {
                        type: 'bar',
                        label: 'Revenue (₹)',
                        data: monthly.map(m => m.revenue),
                        backgroundColor: 'rgba(37, 99, 235, 0.75)',
                        borderRadius: 6,
                        yAxisID: 'y',
                        order: 2,
                    },
                    {
                        type: 'line',
                        label: 'Orders',
                        data: monthly.map(m => m.orders),
                        borderColor: '#0d9488',
                        backgroundColor: 'rgba(13, 148, 136, 0.15)',
                        tension: 0.35,
                        fill: false,
                        yAxisID: 'y1',
                        order: 1,
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: { mode: 'index', intersect: false },
                plugins: {
                    legend: { position: 'bottom' },
                    tooltip: {
                        callbacks: {
                            label: function (ctx) {
                                if (ctx.dataset.label.includes('Revenue')) {
                                    return ' Revenue: ₹' + Number(ctx.raw).toLocaleString('en-IN');
                                }
                                return ' Orders: ' + ctx.raw;
                            },
                        },
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: (v) => '₹' + Number(v).toLocaleString('en-IN'),
                        },
                        grid: { color: 'rgba(148,163,184,0.2)' },
                    },
                    y1: {
                        beginAtZero: true,
                        position: 'right',
                        grid: { drawOnChartArea: false },
                        ticks: { precision: 0 },
                    },
                    x: { grid: { display: false } },
                },
            },
        });
    }

    const statusCtx = document.getElementById('statusChart');
    if (statusCtx && window.Chart) {
        const labels = ['Paid', 'Pending', 'Processing', 'Failed'];
        const values = [
            orderStats.paid || 0,
            orderStats.pending || 0,
            orderStats.processing || 0,
            orderStats.failed || 0,
        ];
        const total = values.reduce((a, b) => a + b, 0);

        new Chart(statusCtx, {
            type: 'doughnut',
            data: {
                labels,
                datasets: [{
                    data: total ? values : [1],
                    backgroundColor: total
                        ? ['#10b981', '#f59e0b', '#0ea5e9', '#f43f5e']
                        : ['#e2e8f0'],
                    borderWidth: 0,
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '68%',
                plugins: {
                    legend: { display: false },
                    tooltip: { enabled: total > 0 },
                },
            },
        });
    }
});
</script>
@endpush
