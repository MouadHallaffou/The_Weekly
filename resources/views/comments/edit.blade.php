@extends('layouts.app')

@section('content')
<div class="max-w-screen-md mx-auto px-4 py-8">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Modifier le commentaire</h1>

    <!-- Formulaire de mise à jour du commentaire -->
    <form action="{{ route('comments.update', [$announcement, $comment]) }}" method="POST" class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="contenu" class="block text-gray-700 dark:text-gray-300 mb-2">Commentaire</label>
            <textarea name="contenu" id="contenu" rows="5"
                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-300"
                placeholder="Écrivez votre commentaire ici..." required>{{ $comment->contenu }}</textarea>
        </div>

        <div class="flex items-center justify-end space-x-4">
            <a href="{{ route('announcements.show', $announcement) }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500">
                Annuler
            </a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600">
                Mettre à jour
            </button>
        </div>
    </form>
</div>
@endsection