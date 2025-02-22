<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AnnouncementController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('categories', CategoryController::class);
    Route::resource('announcements', AnnouncementController::class);

    // Route pour poster un commentaire
    Route::post('/announcements/{announcement}/comments', [CommentController::class, 'store'])
        ->name('comments.store')
        ->middleware('auth');

    // Route pour éditer un commentaire
    Route::get('/announcements/{announcement}/comments/{comment}/edit', [CommentController::class, 'edit'])
        ->name('comments.edit')
        ->middleware('auth');

    // Route pour mettre à jour un commentaire
    Route::put('/announcements/{announcement}/comments/{comment}', [CommentController::class, 'update'])
        ->name('comments.update')
        ->middleware('auth');

    // Route pour supprimer un commentaire
    Route::delete('/announcements/{announcement}/comments/{comment}', [CommentController::class, 'destroy'])
    ->name('comments.destroy')
    ->middleware('auth');
});

require __DIR__ . '/auth.php';
