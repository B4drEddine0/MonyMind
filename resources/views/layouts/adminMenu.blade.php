<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Admin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased" x-data="adminMenu">
    <div class="min-h-screen bg-[#f8fafc]">
        <aside class="fixed left-0 top-0 z-40 h-screen w-72 bg-white shadow-lg border-r border-gray-100">
            <div class="h-full px-4 py-5 overflow-y-auto flex flex-col justify-between">
                <div>
                    <div class="flex items-center mb-8 px-2">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-emerald-500 to-teal-600 p-0.5">
                            <div class="w-full h-full rounded-[10px] bg-white flex items-center justify-center">
                                <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                        </div>
                        <span class="text-xl font-bold bg-gradient-to-r from-emerald-600 to-teal-600 bg-clip-text text-transparent ml-3">Admin Panel</span>
                    </div>

                    <nav class="space-y-1.5">
                        <a href="{{route('admin.index')}}" 
                           class="flex items-center px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-gradient-to-r from-emerald-500/10 to-teal-500/10 text-emerald-700' : 'text-gray-600 hover:bg-gray-50' }}">
                            <svg class="w-5 h-5 {{ request()->routeIs('admin.dashboard') ? 'text-emerald-600' : 'text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                            <span class="text-sm font-medium ml-3">Dashboard</span>
                        </a>
                        <div class="space-y-1.5">
                            <a href="{{route('categories.index')}}" 
                             class="flex items-center px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.categories.*') ? 'bg-gradient-to-r from-emerald-500/10 to-teal-500/10 text-emerald-700' : 'text-gray-600 hover:bg-gray-50' }}">
                             <svg class="w-5 h-5 {{ request()->routeIs('admin.categories.*') ? 'text-emerald-600' : 'text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                </svg>
                                <span class="flex-1 text-sm font-medium ml-3">Categories</span>
                            </a>
                        </div>
                    </nav>
                </div>

                <div class="mt-6">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" 
                                class="flex w-full items-center px-4 py-3 text-gray-600 rounded-xl hover:bg-red-50 hover:text-red-600 transition-all group">
                            <svg class="w-5 h-5 text-gray-500 group-hover:text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                            </svg>
                            <span class="text-sm font-medium ml-3">Déconnexion</span>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <main class="pl-72">
            <div class="sticky top-0 z-30 bg-white border-b border-gray-100">
                <div class="px-6 py-4">
                    <h2 class="text-xl font-bold bg-gradient-to-r from-emerald-600 to-teal-600 bg-clip-text text-transparent">
                        @yield('header')
                    </h2>
                </div>
            </div>

            <div class="py-6 px-6">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
