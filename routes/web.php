<?php

use App\Http\Controllers\PosterController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [PosterController::class, 'index'])->middleware(['auth', 'verified'])->name('home');
Route::get('posters/create', [PosterController::class, 'create'])->middleware('auth')->name('posters.create');
Route::post('posters/store', [PosterController::class, 'store'])->middleware('auth')->name('posters.store');
Route::get('posters/show/{id}', [PosterController::class, 'show'])->middleware('auth')->name('posters.show');
Route::delete('posters/delete/{id}', [PosterController::class, 'destroy'])->middleware('auth')->name('posters.destroy');
Route::get('posters/edit/{id}', [PosterController::class, 'edit'])->middleware('auth')->name('posters.edit');
Route::patch('posters/update/{id}', [PosterController::class, 'update'])->middleware('auth')->name('posters.update');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
