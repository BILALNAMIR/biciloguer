<?php

use App\Http\Controllers\BicicletaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LloguerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//  Guests
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('bicicletes', BicicletaController::class)->only(['index', 'show']);
Route::resource('categories', CategoriaController::class)->only(['index', 'show']);

// Usuaris registrats
Route::middleware('auth')->group(function () {
    Route::resource('lloguers', LloguerController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Nomes admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('bicicletes', BicicletaController::class)->except(['index', 'show']);
    Route::resource('categories', CategoriaController::class)->except(['index', 'show']);
    Route::resource('users', UserController::class);
});

require __DIR__.'/auth.php';
