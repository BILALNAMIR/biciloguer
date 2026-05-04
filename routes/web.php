<?php

use App\Http\Controllers\BicicletaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LloguerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Pública
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/categories', [CategoriaController::class, 'index'])->name('categories.index');
Route::get('/bicicletes', [BicicletaController::class, 'index'])->name('bicicletes.index');

// Admin - create ABANS dels paràmetres {id}
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/bicicletes/create', [BicicletaController::class, 'create'])->name('bicicletes.create');
    Route::post('/bicicletes', [BicicletaController::class, 'store'])->name('bicicletes.store');
    Route::get('/bicicletes/{bicicleta}/edit', [BicicletaController::class, 'edit'])->name('bicicletes.edit');
    Route::put('/bicicletes/{bicicleta}', [BicicletaController::class, 'update'])->name('bicicletes.update');
    Route::delete('/bicicletes/{bicicleta}', [BicicletaController::class, 'destroy'])->name('bicicletes.destroy');

    Route::get('/categories/create', [CategoriaController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoriaController::class, 'store'])->name('categories.store');
    Route::get('/categories/{categoria}/edit', [CategoriaController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{categoria}', [CategoriaController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{categoria}', [CategoriaController::class, 'destroy'])->name('categories.destroy');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});

// Públiques amb paràmetre - DESPRÉS del bloc admin
Route::get('/bicicletes/{bicicleta}', [BicicletaController::class, 'show'])->name('bicicletes.show');
Route::get('/categories/{categoria}', [CategoriaController::class, 'show'])->name('categories.show');

// Auth
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/lloguers/create', [LloguerController::class, 'create'])->name('lloguers.create');
    Route::post('/lloguers', [LloguerController::class, 'store'])->name('lloguers.store');
    Route::get('/lloguers', [LloguerController::class, 'index'])->name('lloguers.index');
    Route::get('/lloguers/{lloguer}', [LloguerController::class, 'show'])->name('lloguers.show');
    Route::delete('/lloguers/{lloguer}', [LloguerController::class, 'destroy'])->name('lloguers.destroy');
});

require __DIR__.'/auth.php';
