<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PersonagemController;
use App\Http\Controllers\GrupoController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect('/');
    })->name('dashboard');
});

// Rota para a página inicial
Route::get('/', [HomeController::class, 'index'])->name('home');

//Rotas para personagem
Route::get('/personagens', [PersonagemController::class, 'index'])->name('personagens.index');
Route::get('/personagens/create', [PersonagemController::class, 'create'])->name('personagens.create');
Route::post('/personagens', [PersonagemController::class, 'store'])->name('personagens.store');
Route::get('/personagens/{id}', [PersonagemController::class, 'show'])->name('personagens.show');
Route::get('/personagens/{id}/edit', [PersonagemController::class, 'edit'])->name('personagens.edit');
Route::put('/personagens/{id}', [PersonagemController::class, 'update'])->name('personagens.update');
Route::delete('/personagens/{id}', [PersonagemController::class, 'destroy'])->name('personagens.destroy');
Route::post('/personagens/search', [PersonagemController::class, 'search'])->name('personagens.search');

//Rotas para grupo
Route::get('/grupos', [GrupoController::class, 'index'])->name('grupos.index');
Route::get('/grupos/create', [GrupoController::class, 'create'])->name('grupos.create');
Route::post('/grupos', [GrupoController::class, 'store'])->name('grupos.store');
Route::get('/grupos/{id}/edit', [GrupoController::class, 'edit'])->name('grupos.edit');
Route::put('/grupos/{id}', [GrupoController::class, 'update'])->name('grupos.update');
Route::delete('/grupos/{id}', [GrupoController::class, 'destroy'])->name('grupos.destroy');
Route::post('/grupos/search', [GrupoController::class, 'search'])->name('grupos.search');

//Gerenciar Grupo
Route::get('/grupos/gerenciar/{id}', [GrupoController::class, 'gerenciarPersonagens'])->name('grupos.gerenciar');
Route::get('/grupos/gerenciar/personagens/all/{id}', [GrupoController::class, 'allPersonagens'])->name('grupos.allPersonagens');
Route::get('/grupos/gerenciar/personagens/{id}', [GrupoController::class, 'personagens'])->name('grupos.personagens');
Route::post('/grupos/gerenciar/personagens', [GrupoController::class, 'addPersonagem'])->name('grupos.addPersonagem');
Route::delete('/grupos/gerenciar/personagens/{id}', [GrupoController::class, 'deletePersonagem'])->name('grupos.deletePersonagem');


// Magias
Route::get('/magias/{id}', [App\Http\Controllers\MagiaController::class, 'index'])->name('magias.index');
Route::get('/magias/gerenciar/{id}', [App\Http\Controllers\MagiaController::class, 'gerenciar'])->name('magias.gerenciar');