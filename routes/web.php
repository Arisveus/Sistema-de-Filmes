<?php

use App\Http\Controllers\FilmesController;
use App\Http\Controllers\ListaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect()->route('filmes.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/filmes', [FilmesController::class, 'index'])->name('filmes.index');
    Route::get('/filmes/{id}', [FilmesController::class, 'show'])->name('filmes.show');
    Route::get('/filme/create', [FilmesController::class, 'create'])->name('filmes.create');
    Route::post('/filmes', [FilmesController::class, 'store'])->name('filmes.store');
    Route::get('/filmes/{id}/edit', [FilmesController::class, 'edit'])->name('filmes.edit');
    Route::put('/filmes/{id}', [FilmesController::class, 'update'])->name('filmes.update');
    Route::delete('/filmes/{id}', [FilmesController::class, 'destroy'])->name('filmes.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/lista', [ListaController::class, 'index'])->name('lista.index');
    Route::post('/lista/{filme}', [ListaController::class, 'store'])->name('lista.store');
    Route::delete('/lista/{filme}', [ListaController::class, 'destroy'])->name('lista.destroy');
});