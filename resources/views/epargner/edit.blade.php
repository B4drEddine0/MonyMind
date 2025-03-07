<x-app-layout>
@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mettre à jour l\'épargne') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form method="POST" action="{{ route('epargner.update', $epargner) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-900">
                            Objectif du mois de {{ $epargner->month_year->format('F Y') }}
                        </h3>
                    </div>

                    <div class="mb-4">
                        <label for="target_amount" class="block text-sm font-medium text-gray-700">Objectif d'épargne</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm">DH</span>
                            </div>
                            <input type="number" 
                                step="0.01" 
                                name="target_amount" 
                                id="target_amount" 
                                value="{{ old('target_amount', $epargner->target_amount) }}"
                                class="pl-9 py-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-secondary focus:ring focus:ring-secondary focus:ring-opacity-50" 
                                required>
                        </div>
                        @error('target_amount')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="inline-flex items-center">
                            <input type="checkbox" 
                                name="is_completed" 
                                value="1" 
                                {{ $epargner->is_completed ? 'checked' : '' }}
                                class="rounded border-gray-300 text-secondary shadow-sm focus:border-secondary focus:ring focus:ring-secondary focus:ring-opacity-50">
                            <span class="ml-2 text-sm text-gray-600">Marquer comme objectif atteint</span>
                        </label>
                    </div>

                    <div class="flex justify-end space-x-3">
                        <a href="{{ route('epargner.index') }}" 
                            class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300">
                            Annuler
                        </a>
                        <button type="submit" 
                            class="inline-flex items-center px-4 py-2 bg-secondary border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-secondary-dark">
                            Enregistrer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
</x-app-layout> 