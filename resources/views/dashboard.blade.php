@extends('layouts.app')

@section('content')
<!-- Main Content -->
<main class="flex-1">


    <!-- Page Content -->
    <div class="p-4 md:p-6 pb-16">
        <!-- Welcome Section -->
        <div class="mb-8">
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Bonjour, {{$user->name}} 👋</h1>
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
                    <p class="text-2xl font-bold text-gray-800">{{$user->budget}} DH</p>
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
                    <p class="opacity-90 mb-4">{{$aianswer}}</p>
                    <div class="flex items-center space-x-2">
                        <button class="px-4 py-2 bg-white/20 hover:bg-white/30 rounded-lg transition-colors text-sm font-medium">Voir les détails</button>
                        <button class="px-4 py-2 bg-white/10 hover:bg-white/20 rounded-lg transition-colors text-sm">Ignorer</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- First row: Category distribution and Recent expenses -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 md:gap-6 mb-6">
            <!-- Répartition des dépenses par catégorie -->
            <div class="bg-white rounded-2xl shadow-sm p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="font-semibold text-gray-800">Répartition des dépenses par catégorie</h3>
                </div>
                <div class="flex flex-col">
                    <ul class="space-y-4">                
                        @foreach($categoryCounts as $index => $category)
                            <li class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <span class="text-sm text-gray-600">{{ $category['name'] }}</span>
                                </div>
                                <span class="text-sm font-medium">{{ $category['count'] }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

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
        </div>

        <!-- Second row: Wishlist and Recurring expenses -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 md:gap-6">
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
                                    <i class="fas fa-star text-gray-500"></i>
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

            <!-- Recurring Expenses Preview -->
            <div class="bg-white rounded-2xl shadow-sm p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="font-semibold text-gray-800">Dépenses récurrentes à venir</h3>
                    <a href="/depences" class="text-secondary hover:text-secondary/80 text-sm font-medium">Gérer</a>
                </div>
                
                <div class="grid grid-cols-1 gap-4">
                    @foreach ($reccurents as $reccurent)
                    <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center">
                                <div class="ml-3">
                                    <h4 class="font-medium text-sm inline">{{$reccurent->category}}</h4> 
                                    <p class="text-xs text-gray-500 inline">- {{$reccurent->date->format('d M')}}</p>
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

@endsection
