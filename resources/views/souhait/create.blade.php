@extends('layouts.app')
@section('content')
    <header name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter un Souhait') }}
        </h2>
    </>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('souhait.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-6">
                            <label for="titre" class="block text-sm font-medium text-gray-700 mb-2">Titre</label>
                            <input type="text" name="titre" id="titre" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 py-2 px-4 text-base" 
                                required>
                        </div>

                        <div class="mb-6">
                            <label for="montant_estime" class="block text-sm font-medium text-gray-700 mb-2">Montant Estimé (DH)</label>
                            <input type="number" step="0.01" name="montant_estime" id="montant_estime" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 py-2 px-4 text-base" 
                                required>
                        </div>

                        <div class="mb-6">
                            <label for="categorie" class="block text-sm font-medium text-gray-700 mb-2">Catégorie</label>
                            <select name="categorie" id="categorie" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 py-3 px-4 text-base">
                                <option value="Électronique">💻 Électronique</option>
                                <option value="Véhicules">🚗 Véhicules</option>
                                <option value="Immobilier">🏠 Immobilier</option>
                                <option value="Voyage">✈️ Voyage</option>
                                <option value="Mode & Accessoires">👔 Mode & Accessoires</option>
                                <option value="Sport & Loisirs">⚽ Sport & Loisirs</option>
                                <option value="Machines & Outils">🛠️ Machines & Outils</option>
                                <option value="Éducation">📚 Éducation</option>
                                <option value="Divertissement">🎮 Divertissement</option>
                                <option value="Santé & Bien-être">🧘 Santé & Bien-être</option>
                                <option value="Autre">⚡ Autre</option>
                            </select>
                        </div>

                        <div class="flex justify-end mt-8">
                            <a href="{{ route('souhait.index') }}" 
                                class="bg-gray-200 text-gray-700 px-6 py-3 rounded-md mr-2 text-base">Annuler</a>
                            <button type="submit" 
                                class="bg-secondary text-white px-6 py-3 rounded-md text-base">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
