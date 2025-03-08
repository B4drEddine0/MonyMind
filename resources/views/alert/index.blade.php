@extends('layouts.app')

@section('content')

@if(session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
        {{ session('success') }}
    </div>
@endif

@if(isset($alert) && $alert->porcentage)
    <div class="max-w-2xl mt-6">
        <div class="bg-blue-50 border-l-4 border-blue-500 text-blue-700 p-4 rounded-md" role="alert">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm">
                        <span class="font-medium">Configuration actuelle :</span> Vous avez déjà configuré une alerte à {{ $alert->porcentage }}% de votre budget.
                    </p>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="max-w-2xl mt-6">
        <div class="bg-blue-50 border-l-4 border-blue-500 text-blue-700 p-4 rounded-md" role="alert">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm">
                        <span class="font-medium">Aucune Configuration pour le moment.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endif

<div class="container mx-auto py-8 px-4">
    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="bg-secondary px-6 py-4">
                <h2 class="text-xl font-bold text-white">Configuration des Alertes Budgétaires</h2>
            </div>
            
            <div class="p-6">
                <p class="text-gray-600 mb-6">Définissez un seuil d'alerte pour être notifié lorsque vous approchez de la limite de votre budget.</p>
                
                <form action="{{ route('alert.store') }}" method="POST">
                    @csrf
                    
                    <div class="bg-secondary bg-opacity-10 border-l-4 border-secondary p-4 mb-6 rounded-md">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-secondary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-secondary">
                                    <span class="font-medium">Information :</span> Cette alerte vous notifiera automatiquement lorsque vos dépenses atteindront le pourcentage sélectionné de votre budget total.
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <label class="block text-gray-700 font-bold mb-4">Seuil d'alerte :</label>
                        
                        <div class="grid grid-cols-3 gap-4">
                            <label class="relative block cursor-pointer">
                                <input type="radio" name="porcentage" value="20" {{ isset($alert) && $alert->porcentage == '20' ? 'checked' : '' }} 
                                       class="peer sr-only">
                                <div class="p-4 rounded-lg border-2 border-gray-200 peer-checked:border-secondary peer-checked:bg-secondary peer-checked:bg-opacity-10 transition-all duration-200 h-full">
                                    <div class="mb-3 bg-gray-200 rounded-full h-2.5">
                                        <div class="bg-green-500 h-2.5 rounded-full" style="width: 20%"></div>
                                    </div>
                                    <div class="text-center">
                                        <span class="font-semibold text-lg text-gray-800 block mb-1">20%</span>
                                        <span class="text-xs text-gray-500">Alerte précoce</span>
                                    </div>
                                    <div class="absolute -top-2 -right-2 h-5 w-5 bg-secondary rounded-full border-2 border-white hidden peer-checked:flex items-center justify-center">
                                        <svg class="h-3 w-3 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </label>
                            
            
                            <label class="relative block cursor-pointer">
                                <input type="radio" name="porcentage" value="50" {{ !isset($alert) || $alert->porcentage == '50' || $alert->porcentage == null ? 'checked' : '' }}
                                       class="peer sr-only">
                                <div class="p-4 rounded-lg border-2 border-gray-200 peer-checked:border-secondary peer-checked:bg-secondary peer-checked:bg-opacity-10 transition-all duration-200 h-full">
                                    <div class="mb-3 bg-gray-200 rounded-full h-2.5">
                                        <div class="bg-yellow-500 h-2.5 rounded-full" style="width: 50%"></div>
                                    </div>
                                    <div class="text-center">
                                        <span class="font-semibold text-lg text-gray-800 block mb-1">50%</span>
                                        <span class="text-xs text-gray-500">Recommandé</span>
                                    </div>
                                    <div class="absolute -top-2 -right-2 h-5 w-5 bg-secondary rounded-full border-2 border-white hidden peer-checked:flex items-center justify-center">
                                        <svg class="h-3 w-3 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </label>
                            
                            
                            <label class="relative block cursor-pointer">
                                <input type="radio" name="porcentage" value="80" {{ isset($alert) && $alert->porcentage == '80' ? 'checked' : '' }}
                                       class="peer sr-only">
                                <div class="p-4 rounded-lg border-2 border-gray-200 peer-checked:border-secondary peer-checked:bg-secondary peer-checked:bg-opacity-10 transition-all duration-200 h-full">
                                    <div class="mb-3 bg-gray-200 rounded-full h-2.5">
                                        <div class="bg-red-500 h-2.5 rounded-full" style="width: 80%"></div>
                                    </div>
                                    <div class="text-center">
                                        <span class="font-semibold text-lg text-gray-800 block mb-1">80%</span>
                                        <span class="text-xs text-gray-500">Alerte tardive</span>
                                    </div>
                                    <div class="absolute -top-2 -right-2 h-5 w-5 bg-secondary rounded-full border-2 border-white hidden peer-checked:flex items-center justify-center">
                                        <svg class="h-3 w-3 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>
                    
                    <div>
                        <button type="submit" class="w-full py-3 px-4 bg-secondary hover:bg-secondary hover:bg-opacity-90 text-white font-medium rounded-lg shadow-md hover:shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-0.5">
                            Enregistrer la configuration
                        </button>
                    </div>
                </form>
                @if(isset($alert) && $alert->porcentage)
                    <div class="mt-6 border-t pt-6">
                        <form action="{{ route('alert.destroy', $alert) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir réinitialiser cette configuration?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-sm text-red-600 hover:text-red-800 flex items-center">
                                <svg class="h-4 w-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                Réinitialiser la configuration
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection