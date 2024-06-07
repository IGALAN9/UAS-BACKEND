<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/dashboard', [PostController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('posts', PostController::class)
->except(['create'])
->middleware(['auth', 'verified']);

Route::post('posting/{posting}/comments', [CommentController::class, 'store'])
->middleware(['auth', 'verified'])
->name('comments.store');

Route::post('/posts',[PostController::class,'store'])
    ->middleware(['auth', 'verified'])
    ->name('posts.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('post', \App\Http\Controllers\Post\StorePostController::class)->name('post.store');

require __DIR__.'/auth.php';
