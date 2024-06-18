<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/dashboard', [PostController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/posts',[PostController::class,'store'])
    ->middleware(['auth', 'verified'])
    ->name('posts.store');

Route::resource('postings', PostController::class)
->except(['create'])
->middleware(['auth', 'verified']);

Route::post('postings/{posting}/comments', [CommentController::class, 'store'])
->middleware(['auth', 'verified'])
->name('comments.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('post', \App\Http\Controllers\Post\StorePostController::class)->name('post.store');

Route::post('/bookmark',[BookmarkController::class,'store'])
    ->middleware(['auth', 'verified'])
    ->name('bookmarks.store');

Route::delete('bookmarks/{bookmark}', [BookmarkController::class, 'destroy'])
    ->middleware(['auth', 'verified'])
    ->name('bookmarks.destroy');

Route::get('bookmarks', [BookmarkController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('bookmarks.index');

Route::middleware(['auth'])->group(function() {
    Route::get('/messages', [MessageController::class, 'show'])->name('messages.show');
    Route::get('/messages/search', [MessageController::class, 'search'])->name('messages.search');
    Route::get('/messages/chat/{userId}', [MessageController::class, 'chat'])->name('messages.chat');
    Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
    Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
});

require __DIR__.'/auth.php';