<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Post_LikeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\FollowerController;
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

Route::get('/posts/{id}/edit',[PostController::class,'edit'])
    ->middleware(['auth', 'verified'])
    ->name('posts.edit');

Route::put('/posts/{id}',[PostController::class,'update'])
    ->middleware(['auth', 'verified'])
    ->name('posts.update');

Route::delete('/posts/{id}',[PostController::class,'destroy'])
    ->middleware(['auth', 'verified'])
    ->name('posts.destroy');

Route::resource('postings', PostController::class)
->except(['create'])
->middleware(['auth', 'verified']);

Route::post('postings/{posting}/comments', [CommentController::class, 'store'])
->middleware(['auth', 'verified'])
->name('comments.store');

Route::post('posting/{posting}/like',[Post_LikeController::class,'like'])
->middleware(['auth', 'verified'])
->name('posts.like');

Route::post('posting/{posting}/unlike',[Post_LikeController::class,'unlike'])
->middleware(['auth', 'verified'])
->name('posts.unlike');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/profile/{username}', [ProfileController::class, 'show'])->name('profile.show');

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

Route::get('/search', [SearchController::class, 'showSearchPage'])
    ->middleware(['auth', 'verified'])
    ->name('search.page');

Route::get('/search/results', [SearchController::class, 'search'])
    ->middleware(['auth', 'verified'])
    ->name('search.results');

Route::middleware(['auth'])->group(function() {
    Route::get('/messages', [MessageController::class, 'show'])->name('messages.show');
    Route::get('/messages/search', [MessageController::class, 'search'])->name('messages.search');
    Route::get('/messages/chat/{userId}', [MessageController::class, 'chat'])->name('messages.chat');
    Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
    Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
});

Route::post('users/{user}/follow', [FollowerController::class, 'follow'])
    ->middleware(['auth', 'verified'])
    ->name('users.follow');

Route::post('users/{user}/unfollow', [FollowerController::class, 'unfollow'])
    ->middleware(['auth', 'verified'])
    ->name('users.unfollow');

Route::get('/posting/{posting}', [PostController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('posting.show');

Route::get('/followsugest', [FollowerController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('follow.show');

Route::get('/users/{user}/following', [FollowerController::class, 'following'])
    ->middleware(['auth', 'verified'])
    ->name('users.following');

Route::get('/users/{user}/followers', [FollowerController::class, 'followers'])
    ->middleware(['auth', 'verified'])
    ->name('users.followers');

require __DIR__.'/auth.php';
