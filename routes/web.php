<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
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

Route::prefix('usuarios')->name('usuarios.')->group(function(){
    Route::get('/', [UsuarioController::class, 'index'])->name('index');
    Route::get('/criar', [UsuarioController::class, 'create'])->name('create');
    Route::post('/', [UsuarioController::class, 'store'])->name('store');
    Route::get('/{id}/editar', [UsuarioController::class, 'edit'])->name('edit');
    Route::put('/{id}', [UsuarioController::class, 'update'])->name('update');
    Route::delete('/{id}', [UsuarioController::class, 'destroy'])->name('destroy');
});

require __DIR__.'/auth.php';
