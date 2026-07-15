@php
    $navLink = 'zoho-nav-item flex items-center px-3 py-2.5 text-sm font-medium rounded-md';
@endphp

{{-- Dashboard --}}
<a href="{{ route('admin.dashboard') }}"
    class="{{ $navLink }} {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
    <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-4 0a1 1 0 01-1-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 01-1 1h-2z"></path>
    </svg>
    Dashboard
</a>

{{-- Sales --}}
<div class="pt-5">
    <p class="px-3 mb-2 text-[11px] font-semibold text-gray-400 uppercase tracking-wider">Sales</p>
    <div class="space-y-0.5">
        <a href="{{ route('admin.customers.index') }}"
            class="{{ $navLink }} {{ request()->routeIs('admin.customers.*') ? 'active' : '' }}">
            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
            Clients
        </a>
        <a href="{{ route('admin.invoices.index') }}"
            class="{{ $navLink }} {{ request()->routeIs('admin.invoices.*') ? 'active' : '' }}">
            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2z"></path>
            </svg>
            Invoices
        </a>
        <a href="{{ route('admin.orders.index') }}"
            class="{{ $navLink }} {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
            </svg>
            Orders
        </a>
        <a href="{{ route('admin.contact-leads.index') }}"
            class="{{ $navLink }} {{ request()->routeIs('admin.contact-leads.*') ? 'active' : '' }}">
            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
            Contact Leads
        </a>
    </div>
</div>

{{-- Catalog --}}
<div class="pt-5">
    <p class="px-3 mb-2 text-[11px] font-semibold text-gray-400 uppercase tracking-wider">Catalog</p>
    <div class="space-y-0.5">
        <a href="{{ route('admin.services.index') }}"
            class="{{ $navLink }} {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m8 0H8m8 0v2a2 2 0 01-2 2H10a2 2 0 01-2-2V6"></path>
            </svg>
            Services
        </a>
        <a href="{{ route('admin.sub-services.index') }}"
            class="{{ $navLink }} {{ request()->routeIs('admin.sub-services.*') ? 'active' : '' }}">
            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
            </svg>
            Sub Services
        </a>
        <a href="{{ route('admin.packages.index') }}"
            class="{{ $navLink }} {{ request()->routeIs('admin.packages.*') ? 'active' : '' }}">
            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
            </svg>
            Packages
        </a>
        <a href="{{ route('admin.technologies.index') }}"
            class="{{ $navLink }} {{ request()->routeIs('admin.technologies.*') ? 'active' : '' }}">
            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
            Technologies
        </a>
    </div>
</div>

{{-- Content --}}
<div class="pt-5">
    <p class="px-3 mb-2 text-[11px] font-semibold text-gray-400 uppercase tracking-wider">Content</p>
    <div class="space-y-0.5">
        <a href="{{ route('admin.pages.index') }}"
            class="{{ $navLink }} {{ request()->routeIs('admin.pages.*') ? 'active' : '' }}">
            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            Pages
        </a>
        <a href="{{ route('admin.blog-posts.index') }}"
            class="{{ $navLink }} {{ request()->routeIs('admin.blog-posts.*') ? 'active' : '' }}">
            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
            </svg>
            Blog Posts
        </a>
    </div>
</div>

{{-- Settings --}}
<div class="pt-5 pb-4">
    <p class="px-3 mb-2 text-[11px] font-semibold text-gray-400 uppercase tracking-wider">Settings</p>
    <div class="space-y-0.5">
        <a href="{{ route('admin.settings.payment-gateway.edit') }}"
            class="{{ $navLink }} {{ request()->routeIs('admin.settings.payment-gateway.*') ? 'active' : '' }}">
            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
            </svg>
            Payment Gateway
        </a>
        <a href="{{ route('admin.profile.edit') }}"
            class="{{ $navLink }} {{ request()->routeIs('admin.profile.*') ? 'active' : '' }}">
            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
            Profile
        </a>
    </div>
</div>
