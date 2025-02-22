@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h1 class="text-2xl font-semibold text-center mb-6">Modifier la catégorie</h1>
        <form action="{{ route('categories.update', $category) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label for="nom" class="block text-sm font-medium text-gray-700">Nom de la catégorie</label>
                <input type="text" name="name" id="nom" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" value="{{ $category->name }}" required>
            </div>
            <div class="flex justify-between">
                <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">Mettre à jour</button>
                <a href="{{ route('categories.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Annuler</a>
            </div>
        </form>
    </div>
</div>
@endsection
