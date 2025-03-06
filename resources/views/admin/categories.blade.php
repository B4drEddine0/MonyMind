@extends('layouts.adminMenu')

@section('header')
    {{ __('Gestion des catégories') }}
@endsection

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-white rounded-lg shadow-lg">
        <div class="p-6 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <h3 class="text-2xl font-semibold text-gray-800">Categories</h3>
                <button onclick="openCreateModal()" class="hover:bg-gray-100 text-gray-800 font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out z-10">
                    Ajouter
                </button>
            </div>
        </div>
        <div class="p-6">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created At</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($categories as $category)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $category->nom }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $category->created_at->format('Y-m-d') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                            <button type="button" class="inline-flex items-center px-3 py-1.5 border border-transparent text-sm font-medium rounded-md text-gray-800 bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" onclick="openEditModal({{ $category->id }})">
                                Edit
                            </button>
                            <form action="{{route('categories.destroy', $category)}}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center px-3 py-1.5 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" onclick="return confirm('Are you sure you want to delete this category?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>

                    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 hidden items-center justify-center" id="editCategoryModal{{ $category->id }}">
                        <div class="fixed inset-0 flex items-center justify-center p-4">
                            <div class="bg-white rounded-lg p-8 max-w-md w-full mx-auto transform transition-all">
                                <div class="absolute top-0 right-0 pt-4 pr-4">
                                    <button type="button" class="text-gray-400 hover:text-gray-500 focus:outline-none" onclick="closeEditModal({{ $category->id }})">
                                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </button>
                                </div>
                                <div class="p-6">
                                    <h3 class="text-lg font-semibold text-gray-900 mb-5">Modifier la catégorie</h3>
                                    <form action="{{ route('categories.update', $category->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-6">
                                            <label for="nom{{ $category->id }}" class="block text-sm font-medium text-gray-700 mb-2">Nom de la catégorie</label>
                                            <input 
                                                type="text" 
                                                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out" 
                                                id="nom{{ $category->id }}" 
                                                name="nom" 
                                                value="{{ $category->nom }}" 
                                                required 
                                                autofocus
                                            >
                                        </div>
                                        <div class="flex justify-end space-x-3">
                                            <button type="button" onclick="closeEditModal({{ $category->id }})" class="px-4 py-2 bg-gray-100 text-gray-800 rounded-lg hover:bg-gray-200 transition duration-150 ease-in-out">
                                                Annuler
                                            </button>
                                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-150 ease-in-out">
                                                Enregistrer
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<div id="createModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 hidden items-center justify-center">
    <div class="bg-white rounded-lg p-6 w-96 transform transition-all">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold">Nouvelle catégorie</h3>
            <button onclick="closeCreateModal()" class="text-gray-400 hover:text-gray-500">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <form action="{{ route('categories.store')}}" method="POST">
            @csrf
            <input type="text" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                   placeholder="Nom de la catégorie"
                   name="nom" 
                   required>
            <div class="mt-4 flex justify-end space-x-3">
                <button type="button" 
                        onclick="closeCreateModal()" 
                        class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-lg">
                    Annuler
                </button>
                <button type="submit" 
                        class="px-4 py-2 text-sm text-gray-800 bg-blue-300 hover:bg-blue-500 rounded-lg">
                    Ajouter
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function openCreateModal() {
    document.getElementById('createModal').classList.remove('hidden');
    document.getElementById('createModal').classList.add('flex');
}

function closeCreateModal() {
    document.getElementById('createModal').classList.add('hidden');
    document.getElementById('createModal').classList.remove('flex');
}

function openEditModal(id) {
    document.getElementById('editCategoryModal' + id).classList.remove('hidden');
    document.getElementById('editCategoryModal' + id).classList.add('flex');
}

function closeEditModal(id) {
    document.getElementById('editCategoryModal' + id).classList.add('hidden');
    document.getElementById('editCategoryModal' + id).classList.remove('flex');
}



</script>
@endsection
