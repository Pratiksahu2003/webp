<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <x-favicon />
    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/css/dashboard.css', 'resources/js/app.js', 'resources/js/dashboard.js'])

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @stack('styles')
</head>
<body class="h-full overflow-hidden" x-data="{ sidebarOpen: false }">
    <div class="admin-shell">
        {{-- Desktop sidebar --}}
        <aside class="admin-sidebar">
            <div class="admin-sidebar-brand">
                <div>
                    <img src="{{ asset('logo/logo.png') }}" alt="VanTroZ" class="h-8 w-auto">
                    <p class="text-[10px] uppercase tracking-[0.14em] text-gray-400 mt-0.5">Admin Console</p>
                </div>
            </div>
            <nav class="admin-sidebar-nav">
                @include('admin.partials.sidebar-nav')
            </nav>
        </aside>

        {{-- Mobile sidebar --}}
        <div x-show="sidebarOpen" class="lg:hidden fixed inset-0 z-50" x-cloak>
            <div class="fixed inset-0 bg-slate-950/60 backdrop-blur-sm" @click="sidebarOpen = false"></div>
            <div class="admin-sidebar admin-sidebar-mobile absolute inset-y-0 left-0 flex flex-col w-[268px]">
                <div class="admin-sidebar-brand justify-between">
                    <img src="{{ asset('logo/logo.png') }}" alt="VanTroZ" class="h-8 w-auto">
                    <button type="button" @click="sidebarOpen = false" class="p-2 rounded-lg text-gray-400 hover:bg-orange-50 hover:text-[#ff6b35]">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
                <nav class="admin-sidebar-nav">
                    @include('admin.partials.sidebar-nav')
                </nav>
            </div>
        </div>

        <div class="admin-main">
            <header class="admin-topbar">
                <div class="flex items-center gap-3 min-w-0">
                    <button type="button" @click="sidebarOpen = true" class="lg:hidden p-2 rounded-xl border border-gray-200 bg-white text-gray-600 hover:bg-orange-50 hover:text-[#ff6b35] hover:border-orange-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                    <div class="min-w-0">
                        <p class="text-[11px] uppercase tracking-[0.12em] text-gray-400 font-semibold hidden sm:block">VanTroZ Control</p>
                        <h1 class="admin-topbar-title truncate">@yield('page-title', 'Dashboard')</h1>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <a href="{{ route('admin.invoices.create') }}" class="hidden md:inline-flex admin-btn admin-btn-primary text-sm py-2 px-3">
                        + Invoice
                    </a>
                    <div x-data="{ open: false }" class="relative">
                        <button type="button" @click="open = !open" class="flex items-center gap-2.5 pl-1.5 pr-2.5 py-1.5 rounded-full border border-gray-200 bg-white hover:bg-orange-50">
                            <img class="w-8 h-8 rounded-full ring-2 ring-orange-100" src="https://www.gravatar.com/avatar/{{ md5(auth()->user()->email) }}?d=mp" alt="">
                            <span class="hidden sm:block text-sm font-semibold text-gray-800 max-w-[120px] truncate">{{ auth()->user()->name }}</span>
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="open" @click.away="open = false" x-cloak
                             class="absolute right-0 mt-2 w-52 bg-white rounded-xl shadow-xl border border-gray-200 overflow-hidden z-50">
                            <div class="px-4 py-3 border-b border-gray-100">
                                <p class="text-sm font-semibold text-gray-900 truncate">{{ auth()->user()->name }}</p>
                                <p class="text-xs text-gray-500 truncate">{{ auth()->user()->email }}</p>
                            </div>
                            <a href="{{ route('admin.profile.edit') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-orange-50 hover:text-[#ff6b35]">Profile settings</a>
                            <a href="{{ route('admin.settings.company-profile.edit') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-orange-50 hover:text-[#ff6b35]">Company profile</a>
                            <form method="POST" action="{{ route('admin.logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2.5 text-sm text-rose-600 hover:bg-rose-50 border-t border-gray-100">Sign out</button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <main class="admin-content">
                @if (session('success'))
                    <div class="admin-alert admin-alert-success flex items-center gap-2">
                        <svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif
                @if (session('error'))
                    <div class="admin-alert admin-alert-error flex items-center gap-2">
                        <svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/></svg>
                        <span>{{ session('error') }}</span>
                    </div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>
    @stack('scripts')
</body>
</html>
