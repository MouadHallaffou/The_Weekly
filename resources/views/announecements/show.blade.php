@extends('layouts.app')

@section('content')
<!-- component -->
<div class="max-w-screen-xl mx-auto">
    <!-- Main content -->
    <main class="mt-10">
        <div class="mb-4 md:mb-0 w-full max-w-screen-md mx-auto relative" style="height: 24em;">
            <div class="absolute left-0 bottom-0 w-full h-full z-10"
                style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.5));"></div>

            @if ($announcement->image)
                <img src="{{ asset('storage/' . $announcement->image) }}" alt="Image de l'annonce" class="absolute left-0 top-0 w-full h-full z-0 object-cover" />
            @else
                <div class="absolute left-0 top-0 w-full h-full z-0 bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-500">Pas d'image</span>
                </div>
            @endif

            <div class="p-4 absolute bottom-0 left-0 z-20">
                <a href="#" class="px-4 py-1 bg-orange-500 rounded-3xl text-gray-100 inline-flex items-center justify-center mb-2">
                    {{ $announcement->category->name ?? 'Aucune catégorie' }}
                </a>

                <h2 class="text-4xl font-semibold text-gray-100 leading-tight">
                    {{ $announcement->titre }}
                </h2>

                <div class="flex mt-3">
                    <img src="https://randomuser.me/api/portraits/men/97.jpg"
                        class="h-10 w-10 rounded-full mr-2 object-cover" />
                    <div>
                        <p class="font-semibold text-gray-200 text-sm">{{ $announcement->user->name }}</p>
                        <p class="font-semibold text-gray-300 text-xs">{{ $announcement->created_at->format('d M Y') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="px-4 lg:px-0 mt-12 text-gray-400 max-w-screen-md mx-auto text-lg leading-relaxed">
            <p class="pb-6">{{ $announcement->description }}</p>

            <p class="text-xl font-semibold text-green-900 mt-4">
                @if ($announcement->prix)
                    Prix : {{ number_format($announcement->prix, 2) }} €
                @else
                    Gratuit
                @endif
            </p>

            <p class="text-sm text-gray-100 mt-2">
                Statut : {{ ucfirst($announcement->status) }}
            </p>
        </div>

        <!-- Section des commentaires -->
        <div class="px-4 lg:px-0 mt-6 text-gray-100 max-w-screen-md mx-auto text-lg leading-relaxed">
            <h3 class="text-2xl font-semibold text-gray-200 mb-2">Commentaires</h3>

            <!-- Liste des commentaires existants -->
            <div class="space-y-4">
                @foreach ($announcement->comments as $comment)
                    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <!-- Photo de l'utilisateur -->
                                <img src="https://randomuser.me/api/portraits/men/{{ $comment->user->id }}.jpg"
                                    alt="{{ $comment->user->name }}" class="h-8 w-8 rounded-full object-cover">
                                <!-- Nom de l'utilisateur -->
                                <p class="font-semibold text-gray-800 dark:text-gray-200">{{ $comment->user->name }}</p>
                            </div>
                            <!-- Date de création du commentaire -->
                            <p class="text-sm text-gray-500">{{ $comment->created_at->format('d M Y, H:i') }}</p>
                        </div>
                        <!-- Contenu du commentaire (limité à 100 caractères) -->
                        <p class="text-gray-600 dark:text-gray-300 mt-2">
                            {{ Str::limit($comment->contenu, 100) }}
                        </p>

                        <!-- Boutons d'action pour l'utilisateur connecté -->
                        @auth
                            @if (Auth::id() === $comment->user_id)
                                <div class="flex space-x-2 mt-2">
                                    <!-- Bouton Éditer -->
                                    <a href="{{ route('comments.edit', [$announcement, $comment]) }}"
                                    class="text-yellow-600 text-xl dark:text-yellow-400 hover:text-yellow-500">
                                    <i class="fas fa-edit"></i>
                                    </a>
                                    <!-- Bouton Supprimer -->
                                    <form action="{{ route('comments.destroy', [$announcement, $comment]) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 text-xl dark:text-red-400 hover:text-red-500">
                                            <i class="fas fa-trash"></i> 
                                        </button>
                                    </form>
                                </div>
                            @endif
                        @endauth
                    </div>
                @endforeach
            </div>

            <!-- Formulaire pour poster un commentaire -->
            @auth
                <form action="{{ route('comments.store', $announcement) }}" method="POST" class="mt-6">
                    @csrf
                    <div class="mb-4">
                        <textarea name="contenu" id="contenu" rows="3"
                            class="w-full px-4 py-2 border bg-slate-800 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600"
                            placeholder="Écrivez votre commentaire ici..." required></textarea>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <!-- Bouton "Retour" à gauche -->
                        <a href="/announcements" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 transition duration-200">
                            Retour
                        </a>
                
                        <!-- Bouton "Poster le commentaire" à droite -->
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600 transition duration-200">
                            Poster le commentaire
                        </button>
                    </div>
                </form>
            @else
                <p class="text-gray-600 mt-4">
                    Vous devez <a href="{{ route('login') }}" class="text-blue-600 hover:underline">vous connecter</a> pour poster un commentaire.
                </p>
            @endauth
        </div>
    </main>
</div>

<!-- Footer -->
<footer class="bg-white dark:bg-gray-800 w-auto py-6 mt-12">
    <div class="container mx-auto px-6 text-center">
        <p class="text-gray-600 dark:text-gray-300">
            &copy; {{ date('Y') }} Weekly. Tous droits réservés.
        </p>
    </div>
</footer>
@endsection