<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
});

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function (){
    Route::get('/filmes', [App\Http\Controllers\FilmesController::class, 'index'])->name('filmes.index');
    Route::get('/filmes/{id}', [App\Http\Controllers\FilmesController::class, 'show'])->name('filmes.show');
    Route::get('/filmes/create', [App\Http\Controllers\FilmesController::class, 'create'])->name('filmes.create');
    Route::post('/filmes', [App\Http\Controllers\FilmesController::class, 'store'])->name('filmes.store');
});