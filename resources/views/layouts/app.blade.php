<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MoneyMind - @yield('title')</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
        @stack('scripts')
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            primary: '#0D1B2A',
                            secondary: '#2A9D8F',
                            accent: '#E9C46A',
                            danger: '#E76F51',
                            light: '#F8F9FA',
                        },
                        fontFamily: {
                            sans: ['Manrope', 'sans-serif'],
                        },
                    }
                }
            }
        </script>
        @stack('styles')
    </head>
    <body class="bg-gray-50 font-sans" x-data="{ sidebarOpen: false }">
        <!-- Main Container -->
        <div class="flex min-h-screen">
            <!-- Sidebar -->
            <aside 
                id="sidebar" 
                class="fixed inset-y-0 left-0 z-30 w-64 bg-white shadow-lg transition-transform duration-300 transform"
                :class="{'translate-x-0': sidebarOpen || window.innerWidth >= 768, '-translate-x-full': !sidebarOpen && window.innerWidth < 768}"
            >
                <div class="flex flex-col h-full">
                    <!-- Logo -->
                    <div class="p-4 border-b">
                        <div class="flex items-center space-x-2">
                            <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-secondary to-accent flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <span class="text-xl font-bold text-primary">MoneyMind</span>
                        </div>
                    </div>

                    <!-- Navigation -->
                    <nav class="flex-1 px-2 py-4 overflow-y-auto">
                        <ul class="space-y-1">
                            <li>
                                <a href="/dashboard" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 rounded-lg transition-colors {{ request()->is('dashboard') ? 'bg-gray-100 text-gray-900' : '' }}">
                                    <i class="fas fa-home w-5 h-5 {{ request()->is('dashboard') ? 'text-secondary' : 'text-gray-500' }}"></i>
                                    <span class="ml-3 text-sm font-medium">Tableau de bord</span>
                                </a>
                            </li>
                            <li>
                                <a href="/depences" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 rounded-lg transition-colors {{ request()->is('depences') ? 'bg-gray-100 text-gray-900' : '' }}">
                                    <i class="fas fa-coins w-5 h-5 {{ request()->is('depences') ? 'text-secondary' : 'text-gray-500' }}"></i>
                                    <span class="ml-3 text-sm font-medium">Dépenses</span>
                                </a>
                            </li>
                            <li>
                                <a href="/epargner" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 rounded-lg transition-colors {{ request()->is('epargner') ? 'bg-gray-100 text-gray-900' : '' }}">
                                    <i class="fas fa-piggy-bank w-5 h-5 {{ request()->is('epargner') ? 'text-secondary' : 'text-gray-500' }}"></i>
                                    <span class="ml-3 text-sm font-medium">Epargne</span>
                                </a>
                            </li>
                            <li>
                                <a href="/souhait" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 rounded-lg transition-colors {{ request()->is('souhait') ? 'bg-gray-100 text-gray-900' : '' }}">
                                    <i class="fas fa-heart w-5 h-5 {{ request()->is('souhait') ? 'text-secondary' : 'text-gray-500' }}"></i>
                                    <span class="ml-3 text-sm font-medium">Souhait</span>
                                </a>
                            </li>
                        </ul>

                        <hr class="my-6 border-gray-200">

                        <ul class="space-y-1">
                            <li>
                                <a href="/profile" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 rounded-lg transition-colors">
                                    <i class="fas fa-cog w-5 h-5 text-gray-500"></i>
                                    <span class="ml-3 text-sm font-medium">Paramètres</span>
                                </a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}" class="w-full">
                                    @csrf
                                    <button type="submit" class="flex w-full items-center px-4 py-3 text-gray-600 hover:bg-gray-100 rounded-lg transition-colors">
                                        <i class="fas fa-sign-out-alt w-5 h-5 text-gray-500"></i>
                                        <span class="ml-3 text-sm font-medium">Déconnexion</span>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </nav>

                    <!-- User Info -->
                    <div class="p-4 border-t">
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-accent/20 flex items-center justify-center">
                                <span class="text-accent text-lg font-medium">{{substr($user->name, 0, 2)}}</span>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-800">{{$user->name}}</p>
                                <p class="text-xs text-gray-500">{{$user->email}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>

            <!-- Main Content -->
            <main class="flex-1 md:ml-64">
                <!-- Top Bar -->
                <header class="bg-white shadow-sm sticky top-0 z-20">
                    <div class="flex items-center justify-between px-4 py-4">
                        <button id="openSidebar" class="md:hidden text-gray-600 focus:outline-none">
                            <i class="fas fa-bars text-xl"></i>
                        </button>

                        <div class="md:hidden font-semibold text-lg text-primary flex items-center">
                            <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-secondary to-accent flex items-center justify-center mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            MoneyMind
                        </div>

                        <div class="flex items-center space-x-4">
                            <!-- Notifications -->
                            <div class="relative">
                                <a href="/alert">
                                    <button class="text-gray-600 hover:text-gray-800 focus:outline-none">
                                    <i class="fas fa-bell text-xl"></i>
                                    <span class="absolute top-0 right-0 w-2 h-2 bg-accent rounded-full"></span>
                                    </button>
                                </a>
                                
                            </div>
                        </div>
                    </div>
                </header>

                <!-- Page Content -->
                <div class="p-4 md:p-6 pb-16">
                    @yield('content')
                </div>
            </main>
        </div>

        <script>
            document.getElementById('openSidebar').addEventListener('click', function() {
                document.getElementById('sidebar').classList.toggle('-translate-x-full');
            });
        </script>
        @stack('page-scripts')
    </body>
</html>
