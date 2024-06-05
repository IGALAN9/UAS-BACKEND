<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DOBUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('post', \App\Http\Controllers\Post\StorePostController::class)->name('post.store');
Route::post('/dob-login', [DOBUserController::class, 'store']) -> name('dob.login');

require __DIR__.'/auth.php';
