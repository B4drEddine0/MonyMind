@extends('layouts.app')

@section('title', 'Dépenses Récurrentes')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Gérer les dépenses récurrentes</h2>
        <button onclick="openModal('addRecurringExpenseModal')" class="bg-secondary hover:bg-secondary/80 text-white px-4 py-2 rounded-lg flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
            </svg>
            Ajouter une dépense récurrente
        </button>
    </div>

    <!-- Recurring Expenses Table -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catégorie</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Montant</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fréquence</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prochain paiement</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- Sample Data -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">Abonnement Internet</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                Factures
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">299 DH</td>
                        <td class="px-6 py-4 whitespace-nowrap">Mensuel</td>
                        <td class="px-6 py-4 whitespace-nowrap">2024-04-01</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Actif</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <button class="text-indigo-600 hover:text-indigo-900 mr-3">Modifier</button>
                            <button class="text-red-600 hover:text-red-900">Supprimer</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">Loyer</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                Logement
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">3500 DH</td>
                        <td class="px-6 py-4 whitespace-nowrap">Mensuel</td>
                        <td class="px-6 py-4 whitespace-nowrap">2024-04-01</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Actif</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <button class="text-indigo-600 hover:text-indigo-900 mr-3">Modifier</button>
                            <button class="text-red-600 hover:text-red-900">Supprimer</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Recurring Expense Modal -->
<div id="addRecurringExpenseModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Ajouter une dépense récurrente</h3>
            <form>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Description</label>
                    <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary focus:ring focus:ring-secondary/20" placeholder="Ex: Loyer, Abonnement, etc.">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Catégorie</label>
                    <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary focus:ring focus:ring-secondary/20">
                        <option value="">Sélectionner une catégorie</option>
                        <option value="logement">🏠 Logement</option>
                        <option value="factures">📄 Factures</option>
                        <option value="transport">🚗 Transport</option>
                        <option value="assurance">🛡️ Assurance</option>
                        <option value="abonnements">📱 Abonnements</option>
                        <option value="autres">📦 Autres</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Montant (DH)</label>
                    <input type="number" step="0.01" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary focus:ring focus:ring-secondary/20" placeholder="0.00">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Fréquence</label>
                    <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary focus:ring focus:ring-secondary/20">
                        <option value="mensuel">Mensuel</option>
                        <option value="hebdomadaire">Hebdomadaire</option>
                        <option value="trimestriel">Trimestriel</option>
                        <option value="annuel">Annuel</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Date du premier paiement</label>
                    <input type="date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary focus:ring focus:ring-secondary/20">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Notes (optionnel)</label>
                    <textarea class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary focus:ring focus:ring-secondary/20" rows="2" placeholder="Ajouter des notes supplémentaires..."></textarea>
                </div>
                <div class="mt-5 flex justify-end">
                    <button type="button" onclick="closeModal('addRecurringExpenseModal')" class="mr-3 px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-md">Annuler</button>
                    <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-secondary hover:bg-secondary/80 rounded-md">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('page-scripts')
<script>
    function openModal(modalId) {
        document.getElementById(modalId).classList.remove('hidden');
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
    }
</script>
@endpush
@endsection 