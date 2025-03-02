@extends('layouts.app')

@section('content')
<!-- Main Content -->
<main class="flex-1">


    <!-- Page Content -->
    <div class="p-4 md:p-6 pb-16">
        <!-- Welcome Section -->
        <div class="mb-8">
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Bonjour, Mohammed 👋</h1>
            <p class="text-gray-600 mt-1">Voici l'état de vos finances ce mois-ci</p>
        </div>

        <!-- Financial Overview -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 mb-8">
            <!-- Current Balance -->
            <div class="bg-white rounded-2xl shadow-sm p-6 border-l-4 border-secondary">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-sm font-medium text-gray-500">Solde mensuel</h3>
                    <span class="text-xs text-gray-400">Ce mois</span>
                </div>
                <div class="flex items-end">
                    <p class="text-2xl font-bold text-gray-800">{{$user->salaire}} DH</p>
                </div>
            </div>

            <!-- Total Revenue -->
            <div class="bg-white rounded-2xl shadow-sm p-6 border-l-4 border-accent">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-sm font-medium text-gray-500">Epargne totale</h3>
                    <span class="text-xs text-gray-400">Ce mois</span>
                </div>
                <div class="flex items-end">
                    <p class="text-2xl font-bold text-gray-800">{{$totalEpargne}} DH</p>
                </div>
            </div>

            <!-- Total Expenses -->
            <div class="bg-white rounded-2xl shadow-sm p-6 border-l-4 border-danger">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-sm font-medium text-gray-500">Dépenses totales</h3>
                    <span class="text-xs text-gray-400">Ce mois</span>
                </div>
                <div class="flex items-end">
                    <p class="text-2xl font-bold text-gray-800">{{$totalDepences}} DH</p>
                </div>
            </div>

            <!-- Budget Status -->
            <div class="bg-white rounded-2xl shadow-sm p-6 border-l-4 border-primary">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-sm font-medium text-gray-500">Budget restant</h3>
                    <span class="text-xs text-gray-400">Ce mois</span>
                </div>
                <div>
                    <p class="text-2xl font-bold text-gray-800">{{$user->salaire - $totalDepences}} DH</p>
                    <div class="w-full h-2 bg-gray-200 rounded-full mt-2">
                        <div class="h-full bg-gradient-to-r from-secondary to-accent rounded-full" style="width: {{$user->resteProgress}}%"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- AI Suggestion Banner -->
        <div class="bg-gradient-to-r from-primary to-primary/80 text-white rounded-2xl shadow-sm p-6 mb-8">
            <div class="flex items-start">
                <div class="mr-4 p-3 bg-white/20 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                    </svg>
                </div>
                <div>
                    <h3 class="font-semibold text-xl mb-2">Suggestion de MoneyMind AI</h3>
                    <p class="opacity-90 mb-4">D'après votre historique, vous pourriez économiser jusqu'à 300 DH par mois en réduisant vos dépenses en divertissement. Cela pourrait accélérer l'atteinte de votre objectif "Voyage à Paris" de 2 mois.</p>
                    <div class="flex items-center space-x-2">
                        <button class="px-4 py-2 bg-white/20 hover:bg-white/30 rounded-lg transition-colors text-sm font-medium">Voir les détails</button>
                        <button class="px-4 py-2 bg-white/10 hover:bg-white/20 rounded-lg transition-colors text-sm">Ignorer</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Dashboard Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-4 md:gap-6">
            <!-- Charts Section -->
            <div class="lg:col-span-2 space-y-4 md:space-y-6">
                <!-- Spending Distribution -->
                <div class="bg-white rounded-2xl shadow-sm p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="font-semibold text-gray-800">Répartition des dépenses</h3>
                        <select class="text-sm bg-gray-100 border-0 rounded-lg px-3 py-2">
                            <option>Ce mois</option>
                            <option>3 derniers mois</option>
                            <option>Cette année</option>
                        </select>
                    </div>
                    <div class="flex flex-col md:flex-row items-center">
                        <div class="w-full md:w-1/2 mb-6 md:mb-0">
                            <div class="relative h-56">
                                <canvas id="spendingChart"></canvas>
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 md:pl-6">
                            <ul class="space-y-4">
                                <li class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <span class="w-3 h-3 bg-indigo-500 rounded-full mr-2"></span>
                                        <span class="text-sm text-gray-600">Nourriture</span>
                                    </div>
                                    <span class="text-sm font-medium">30%</span>
                                </li>
                                <li class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <span class="w-3 h-3 bg-teal-500 rounded-full mr-2"></span>
                                        <span class="text-sm text-gray-600">Transport</span>
                                    </div>
                                    <span class="text-sm font-medium">20%</span>
                                </li>
                                <li class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <span class="w-3 h-3 bg-amber-500 rounded-full mr-2"></span>
                                        <span class="text-sm text-gray-600">Logement</span>
                                    </div>
                                    <span class="text-sm font-medium">35%</span>
                                </li>
                                <li class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <span class="w-3 h-3 bg-rose-500 rounded-full mr-2"></span>
                                        <span class="text-sm text-gray-600">Divertissement</span>
                                    </div>
                                    <span class="text-sm font-medium">15%</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Monthly Spending Trends -->
                <div class="bg-white rounded-2xl shadow-sm p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="font-semibold text-gray-800">Tendances mensuelles</h3>
                        <select class="text-sm bg-gray-100 border-0 rounded-lg px-3 py-2">
                            <option>6 derniers mois</option>
                            <option>Cette année</option>
                        </select>
                    </div>
                    <div class="h-64">
                        <canvas id="trendsChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Recent Expenses & Savings Goals -->
            <div class="lg:col-span-2 space-y-4 md:space-y-6">
                <!-- Recent Expenses -->
                <div class="bg-white rounded-2xl shadow-sm p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="font-semibold text-gray-800">Dépenses récentes</h3>
                        <a href="/depences" class="text-secondary hover:text-secondary/80 text-sm font-medium">Voir tout</a>
                    </div>

                    <!-- Recent Expenses table -->
                    <table class="min-w-full text-sm">
                        <thead>
                            <tr class="text-left text-gray-500 border-b">
                                <th class="pb-3 font-medium">Description</th>
                                <th class="pb-3 font-medium">Catégorie</th>
                                <th class="pb-3 font-medium">Date</th>
                                <th class="pb-3 font-medium text-right">Montant</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($depences as $depence)
                            <tr class="border-b border-gray-100">
                                <td class="py-3">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 rounded-full bg-red-100 flex items-center justify-center mr-3">
                                            <i class="fas fa-{{ 
                                                match($depence->category) {
                                                    'Nourriture' => 'utensils',
                                                    'Restaurant' => 'hamburger',
                                                    'Courses' => 'shopping-cart',
                                                    'Transport' => 'bus',
                                                    'Carburant' => 'gas-pump',
                                                    'Logement' => 'home',
                                                    'Factures' => 'file-invoice',
                                                    'Internet' => 'wifi',
                                                    'Telephone' => 'mobile-alt',
                                                    'Abonnements' => 'tv',
                                                    'Divertissement' => 'gamepad',
                                                    'Shopping' => 'shopping-bag',
                                                    'Sante' => 'heartbeat',
                                                    'Education' => 'graduation-cap',
                                                    'Assurance' => 'shield-alt',
                                                    'Services' => 'wrench',
                                                    default => 'box'
                                                }
                                            }} text-red-500"></i>
                                        </div>
                                        <span>{{$depence->description}}</span>
                                    </div>
                                </td>
                                <td class="py-3 text-gray-500">{{$depence->category}}</td>
                                <td class="py-3 text-gray-500">{{$depence->date->format('d M')}}</td>
                                <td class="py-3 text-right font-medium">-{{$depence->amount}} DH</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Wishlist Section -->
                <div class="bg-white rounded-2xl shadow-sm p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="font-semibold text-gray-800">Liste de souhaits</h3>
                        <a href="{{ route('souhait.index') }}" class="text-white bg-secondary hover:bg-secondary/90 transition-colors text-xs px-3 py-1.5 rounded-full">
                            <i class="fas fa-plus mr-1"></i> Ajouter
                        </a>
                    </div>
                    
                    <div class="space-y-5">
                        @foreach ($souhaits as $souhait)
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 rounded-lg bg-gray-100 flex items-center justify-center mr-3">
                                        <i class="fas fa-{{ 
                                            match($souhait->categorie) {
                                                'Électronique' => 'laptop',
                                                'Véhicules' => 'car',
                                                'Immobilier' => 'home',
                                                'Voyage' => 'plane',
                                                'Mode & Accessoires' => 'tshirt',
                                                'Sport & Loisirs' => 'futbol',
                                                'Machines & Outils' => 'tools',
                                                'Éducation' => 'graduation-cap',
                                                'Divertissement' => 'gamepad',
                                                'Santé & Bien-être' => 'heart',
                                                default => 'star'
                                            }
                                        }} text-gray-500"></i>
                                    </div>
                                    <div>
                                        <h4 class="text-sm font-medium">{{$souhait->titre}}</h4>
                                        <p class="text-xs text-gray-500">{{$souhait->montant_estime}} DH</p>
                                    </div>
                                </div>
                                <span class="text-xs font-medium bg-blue-100 text-blue-700 px-2 py-1 rounded-full">{{ min(round(($totalEpargne / $souhait->montant_estime) * 100, 2), 100) }}%</span>
                            </div>
                            <div class="h-1.5 bg-gray-200 rounded-full">
                                <div class="h-full rounded-full bg-blue-500" style="width:{{ min(round(($totalEpargne / $souhait->montant_estime) * 100, 2), 100) }}%"></div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Recurring Expenses Preview -->
            <div class="bg-white rounded-2xl shadow-sm p-6 col-span-1 lg:col-span-4">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="font-semibold text-gray-800">Dépenses récurrentes à venir</h3>
                    <a href="/depences" class="text-secondary hover:text-secondary/80 text-sm font-medium">Gérer</a>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($reccurents as $reccurent)
                    <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded-lg bg-amber-100 flex items-center justify-center">
                                    <i class="fas fa-{{ 
                                        match($reccurent->category) {
                                            'Nourriture' => 'utensils',
                                            'Restaurant' => 'hamburger',
                                            'Courses' => 'shopping-cart',
                                            'Transport' => 'bus',
                                            'Carburant' => 'gas-pump',
                                            'Logement' => 'home',
                                            'Factures' => 'file-invoice',
                                            'Internet' => 'wifi',
                                            'Telephone' => 'mobile-alt',
                                            'Abonnements' => 'tv',
                                            'Divertissement' => 'gamepad',
                                            'Shopping' => 'shopping-bag',
                                            'Sante' => 'heartbeat',
                                            'Education' => 'graduation-cap',
                                            'Assurance' => 'shield-alt',
                                            'Services' => 'wrench',
                                            default => 'circle'
                                        }
                                    }} text-amber-600"></i>
                                </div>
                                <div class="ml-3">
                                    <h4 class="font-medium text-sm">{{$reccurent->category}}</h4>
                                    <p class="text-xs text-gray-500">{{$reccurent->date->format('d M')}}</p>
                                </div>
                            </div>
                            <span class="bg-amber-50 text-amber-700 text-xs font-medium px-2 py-1 rounded-full">{{$reccurent->amount}} DH</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</main>

@push('scripts')
<script>
    document.getElementById('openSidebar').addEventListener('click', function() {
        document.getElementById('sidebar').classList.toggle('-translate-x-full');
    });

    const spendingChartCtx = document.getElementById('spendingChart').getContext('2d');
    const spendingChart = new Chart(spendingChartCtx, {
        type: 'doughnut',
        data: {
            labels: ['Nourriture', 'Transport', 'Logement', 'Divertissement'],
            datasets: [{
                data: [30, 20, 35, 15],
                backgroundColor: ['#6366F1', '#14B8A6', '#F59E0B', '#F43F5E'],
                hoverBackgroundColor: ['#4F46E5', '#0D9488', '#D97706', '#E11D48'],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });

    const trendsChartCtx = document.getElementById('trendsChart').getContext('2d');
    const trendsChart = new Chart(trendsChartCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'],
            datasets: [{
                label: 'Dépenses',
                data: [1200, 1500, 1000, 1800, 1300, 1600],
                backgroundColor: 'rgba(20, 184, 166, 0.2)',
                borderColor: '#14B8A6',
                borderWidth: 2,
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                x: {
                    grid: {
                        display: false
                    }
                },
                y: {
                    beginAtZero: true,
                    grid: {
                        color: '#F3F4F6'
                    }
                }
            }
        }
    });
</script>
@endpush
@endsection
