<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PlatformController;
use App\Http\Controllers\AdminController; 


Route::get('/', function () {
    return redirect('/home');
});


Route::get('/home', function () {
    return view('home'); // Esta rota renderiza a view 'home.blade.php'
})->name('home');

Route::get('/jogos', [GameController::class, 'index'])->name('jogos.index');

Route::get('/plataformas', [PlatformController::class, 'index'])->name('plataformas.index');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/cadastro', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/cadastro', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Rotas de Administração (Protegidas)
// IMPORTANTE: O middleware 'admin' ainda precisa ser criado e registrado no Kernel.php
// Se você ainda não fez isso, comente a linha do middleware 'admin' temporariamente
// ou a rota não funcionará até que ele seja configurado.
// Ex: Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

/*
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Rotas de recurso para CRUD de Jogos
    // Isso cria automaticamente rotas como admin/jogos (GET, com nome admin.jogos.index)
    // admin/jogos/create (GET, com nome admin.jogos.create), etc.
    Route::resource('jogos', GameController::class)->except(['show']);

    // Rotas de recurso para CRUD de Plataformas
    Route::resource('plataformas', PlatformController::class)->except(['show']);
}); 
*/