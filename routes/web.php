<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ServidorController;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\MensagemController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->get('/home', function () {
    return view('home');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile',      [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile',    [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile',   [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('usuarios')->name('usuarios.')->group(function(){
    Route::get('/',             [UsuarioController::class, 'index'])->name('index');
    Route::get('/criar',        [UsuarioController::class, 'create'])->name('create');
    Route::post('/',            [UsuarioController::class, 'store'])->name('store');
    Route::get('/{id}/editar',  [UsuarioController::class, 'edit'])->name('edit');
    Route::put('/{id}',         [UsuarioController::class, 'update'])->name('update');
    Route::delete('/{id}',      [UsuarioController::class, 'destroy'])->name('destroy');
});


Route::prefix('servidores')->name('servidores.')->group(function(){
    Route::get('/',             [ServidorController::class, 'index'])->name('index');
    Route::get('/criar',        [ServidorController::class, 'create'])->name('create');
    Route::post('/',            [ServidorController::class, 'store'])->name('store');
    Route::get('/{id}/editar',  [ServidorController::class, 'edit'])->name('edit');
    Route::put('/{id}',         [ServidorController::class, 'update'])->name('update');
    Route::delete('/{id}',      [ServidorController::class, 'destroy'])->name('destroy');
});


Route::prefix('niveis')->name('niveis.')->group(function(){
    Route::get('/',                 [NivelController::class, 'index'])->name('index');
    Route::get('/{id}/editar',      [NivelController::class, 'edit'])->name('edit');
    Route::put('/{id}',             [NivelController::class, 'update'])->name('update');
    Route::delete('/{discord_id}',  [NivelController::class, 'destroy'])->name('destroy');
});

Route::prefix('mensagens')->name('mensagens.')->group(function(){
    Route::get('/',                             [MensagemController::class, 'index'])->name('index');
    Route::get('/criar',                        [MensagemController::class, 'create'])->name('create');
    Route::post('/',                            [MensagemController::class, 'store'])->name('store');
    Route::delete('/{id}',                      [MensagemController::class, 'destroy'])->name('destroy');
    Route::get('/usuario/{discord_id}',         [MensagemController::class, 'byUser'])->name('byUser');
    Route::get('/servidor/{servidor_id}',       [MensagemController::class, 'byServer'])->name('byServer');
    Route::delete('/usuario/{discord_id}',      [MensagemController::class, 'destroyByUser'])->name('destroyByUser');
    Route::delete('/servidor/{servidor_id}',    [MensagemController::class, 'destroyByServer'])->name('destroyByServer');
});

require __DIR__.'/auth.php';
