@extends('layouts.app')

@section('content')
<h1 class="mb-4 text-2xl font-extrabold leading-none tracking-tight text-gray-100 md:text-xl lg:text-2xl dark:text-white ml-4 mt-4">Liste des Annonces</h1>
<a href="{{ route('announcements.create') }}" class="m-8 text-white w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mt-4 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Créer une annonce</a>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg p-6">
    <table class="min-w-full text-sm text-left rtl:text-right text-gray-100 dark:text-gray-100">
        <thead class="text-xs text-gray-100 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-100">
            <tr>
                <th scope="col" class="px-6 py-3">ID</th>
                <th scope="col" class="px-6 py-3 text-center">Titre</th>
                <th scope="col" class="px-6 py-3 text-center">Image</th>
                <th scope="col" class="px-6 py-3 text-center">Prix</th>
                <th scope="col" class="px-6 py-3 text-center">Catégorie</th>
                <th scope="col" class="px-6 py-3 text-center">Status</th>
                <th scope="col" class="px-6 py-3 text-center">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($announcements as $announcement)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                <th scope="row" class="px-6 py-1">
                    {{ $announcement->id }}
                </th>
                <td class="px-6 py-1 text-center">
                    {{ $announcement->titre }}
                </td>
                <td class="px-6 py-1 text-center">
                    {{ $announcement->image }}
                </td>
                <td class="px-6 py-1 text-center">
                    {{ $announcement->prix ?? 'Non défini' }}
                </td>
                <td class="px-6 py-1 text-center">
                    {{ $announcement->category ? $announcement->category->nom : 'Aucune catégorie' }}
                </td>
                <td class="px-6 py-1 text-center">
                    {{ ucfirst($announcement->status) }}
                </td>
                <td class="px-6 py-1 text-center whitespace-nowrap">
                    <a href="{{ route('announcements.show', $announcement) }}" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Voir</a>
                    <a href="{{ route('announcements.edit', $announcement) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Éditer</a>
                    <form action="{{ route('announcements.destroy', $announcement) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 font-medium rounded-lg text-sm px-2 py-2 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{ $announcements->links() }} 
@endsection
