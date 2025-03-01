@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Mes Dépenses</h1>
        <a href="{{ route('depences.create') }}" class="bg-secondary hover:bg-secondary/90 text-white px-4 py-2 rounded-lg">
            <i class="fas fa-plus mr-2"></i>Nouvelle Dépense
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Catégorie</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Montant</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fréquence</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($depences as $depence)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $depence->date->format('d/m/Y') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $depence->description }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $depence->category }}
                        </td>
                        <td class="px-6 py-4">
                            {{ number_format($depence->amount, 2) }} DH
                        </td>
                        <td class="px-6 py-4">
                            @if($depence->is_recurring)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    Récurrent
                                </span>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                    Unique
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if($depence->is_recurring)
                                <span class="text-sm text-gray-600">
                                    {{ $depence->recurrence_schedule }}
                                </span>
                            @else
                                <span class="text-sm text-gray-400">une fois</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right text-sm font-medium">
                            <a href="{{ route('depences.edit', $depence) }}" class="text-secondary hover:text-secondary/80 mr-3">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('depences.destroy', $depence) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-danger hover:text-danger/80" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette dépense ?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection