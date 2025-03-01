@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="max-w-2xl mx-auto">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Modifier la Dépense</h1>
            <a href="{{ route('depences.index') }}" class="text-gray-600 hover:text-gray-800">
                <i class="fas fa-arrow-left mr-2"></i>Retour
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-6">
            <form action="{{ route('depences.update', $depence) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="space-y-6">
                    <div>
                        <label for="amount" class="block text-sm font-medium text-gray-700">Montant (DH)</label>
                        <div class="mt-1">
                            <input type="number" name="amount" id="amount" step="0.01" 
                                class="shadow-sm focus:ring-secondary focus:border-secondary block w-full sm:text-sm border-gray-300 rounded-md"
                                value="{{ old('amount', $depence->amount) }}" required>
                        </div>
                        @error('amount')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700">Catégorie</label>
                        <div class="mt-1">
                            <select name="category" id="category" 
                                class="shadow-sm focus:ring-secondary focus:border-secondary block w-full sm:text-sm border-gray-300 rounded-md">
                                <option value="">Sélectionner une catégorie</option>
                                <option value="Nourriture" {{ $depence->category == 'Nourriture' ? 'selected' : '' }}>🍽️ Nourriture</option>
                                <option value="Restaurant" {{ $depence->category == 'Restaurant' ? 'selected' : '' }}>🍳 Restaurant</option>
                                <option value="Courses" {{ $depence->category == 'Courses' ? 'selected' : '' }}>🛒 Courses</option>
                                <option value="Transport" {{ $depence->category == 'Transport' ? 'selected' : '' }}>🚗 Transport</option>
                                <option value="Carburant" {{ $depence->category == 'Carburant' ? 'selected' : '' }}>⛽ Carburant</option>
                                <option value="Logement" {{ $depence->category == 'Logement' ? 'selected' : '' }}>🏠 Logement</option>
                                <option value="Factures" {{ $depence->category == 'Factures' ? 'selected' : '' }}>📄 Factures</option>
                                <option value="Internet" {{ $depence->category == 'Internet' ? 'selected' : '' }}>🌐 Internet</option>
                                <option value="Telephone" {{ $depence->category == 'Telephone' ? 'selected' : '' }}>📱 Téléphone</option>
                                <option value="Abonnements" {{ $depence->category == 'Abonnements' ? 'selected' : '' }}>📺 Abonnements</option>
                                <option value="Divertissement" {{ $depence->category == 'Divertissement' ? 'selected' : '' }}>🎮 Divertissement</option>
                                <option value="Shopping" {{ $depence->category == 'Shopping' ? 'selected' : '' }}>🛍️ Shopping</option>
                                <option value="Sante" {{ $depence->category == 'Sante' ? 'selected' : '' }}>⚕️ Santé</option>
                                <option value="Education" {{ $depence->category == 'Education' ? 'selected' : '' }}>📚 Education</option>
                                <option value="Assurance" {{ $depence->category == 'Assurance' ? 'selected' : '' }}>🛡️ Assurance</option>
                                <option value="Services" {{ $depence->category == 'Services' ? 'selected' : '' }}>🔧 Services</option>
                                <option value="Autre" {{ $depence->category == 'Autre' ? 'selected' : '' }}>📦 Autre</option>
                            </select>
                        </div>
                        @error('category')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <div class="mt-1">
                            <input type="text" name="description" id="description" 
                                class="shadow-sm focus:ring-secondary focus:border-secondary block w-full sm:text-sm border-gray-300 rounded-md"
                                value="{{ old('description', $depence->description) }}" required>
                        </div>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                        <div class="mt-1">
                            <input type="date" name="date" id="date" 
                                class="shadow-sm focus:ring-secondary focus:border-secondary block w-full sm:text-sm border-gray-300 rounded-md"
                                value="{{ old('date', $depence->date->format('Y-m-d')) }}" required>
                        </div>
                        @error('date')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input type="checkbox" name="is_recurring" id="is_recurring" 
                                value="1"
                                class="focus:ring-secondary h-4 w-4 text-secondary border-gray-300 rounded"
                                {{ old('is_recurring', $depence->is_recurring) ? 'checked' : '' }}>
                        </div>
                        <div class="ml-3">
                            <label for="is_recurring" class="text-sm font-medium text-gray-700">Dépense récurrente</label>
                        </div>
                    </div>

                    <div id="recurrence_frequency_container" class="{{ old('is_recurring', $depence->is_recurring) ? '' : 'hidden' }}">
                        <label for="recurrence_frequency" class="block text-sm font-medium text-gray-700">Fréquence</label>
                        <div class="mt-1">
                            <select name="recurrence_schedule" id="recurrence_schedule" 
                                class="shadow-sm focus:ring-secondary focus:border-secondary block w-full sm:text-sm border-gray-300 rounded-md">
                                <option value="weekly" {{ old('recurrence_schedule', $depence->recurrence_schedule) == 'weekly' ? 'selected' : '' }}>Hebdomadaire</option>
                                <option value="monthly" {{ old('recurrence_schedule', $depence->recurrence_schedule) == 'monthly' ? 'selected' : '' }}>Mensuelle</option>
                                <option value="yearly" {{ old('recurrence_schedule', $depence->recurrence_schedule) == 'yearly' ? 'selected' : '' }}>Annuelle</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label for="notes" class="block text-sm font-medium text-gray-700">Notes (optionnel)</label>
                        <div class="mt-1">
                            <textarea name="notes" id="notes" rows="3" 
                                class="shadow-sm focus:ring-secondary focus:border-secondary block w-full sm:text-sm border-gray-300 rounded-md">{{ old('notes', $depence->notes) }}</textarea>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-3">
                        <a href="{{ route('depences.index') }}" 
                            class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-secondary">
                            Annuler
                        </a>
                        <button type="submit" 
                            class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-secondary hover:bg-secondary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-secondary">
                            Mettre à jour
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    document.getElementById('is_recurring').addEventListener('change', function() {
        const container = document.getElementById('recurrence_frequency_container');
        container.classList.toggle('hidden', !this.checked);
    });
</script>

@endsection 