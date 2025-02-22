<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

class CommentController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request, Announcement $announcement)
    {
        // Création du commentaire
        $comment = new Comment();
        $comment->contenu = $request->contenu;
        $comment->user_id = Auth::id(); // L'utilisateur connecté
        $comment->announcement_id = $announcement->id; // L'annonce associée
        $comment->save();

        // Redirection vers la page de l'annonce avec un message de succès
        return redirect()->route('announcements.show', $announcement)
            ->with('success', 'Commentaire ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Announcement $announcement, Comment $comment)
    {
        // Vérifie que l'utilisateur est autorisé à éditer ce commentaire
        $this->authorize('update', $comment);

        return view('comments.edit', compact('announcement', 'comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Announcement $announcement, Comment $comment)
    {
        // Vérifie que l'utilisateur est autorisé à mettre à jour ce commentaire
        $this->authorize('update', $comment);

        // Met à jour le commentaire
        $comment->contenu = $request->contenu;
        $comment->save();

        // Redirection vers la page de l'annonce avec un message de succès
        return redirect()->route('announcements.show', $announcement)
            ->with('success', 'Commentaire mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcement, Comment $comment)
    {
        // Vérifie que l'utilisateur est autorisé à supprimer ce commentaire
        $this->authorize('delete', $comment);

        // Supprime le commentaire
        $comment->delete();

        // Redirection vers la page de l'annonce avec un message de succès
        return redirect()->route('announcements.show', $announcement)
            ->with('success', 'Commentaire supprimé avec succès.');
    }
}
