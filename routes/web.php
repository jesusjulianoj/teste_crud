<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CidadeController;

Route::get('/', function () {
    return view('index');
});

Route::get('/', UsuarioController::class)->name('index');

Route::get('insere', [UsuarioController::class, 'create'])->name('insere');
Route::post('insert', [UsuarioController::class, 'insert'])->name('insert');

Route::get('lstCidade/{estado}', [CidadeController::class, 'lista'])->name('listaCidade');
//Route::get('usuario/{usuario}/lstCidade/{estado}', [CidadeController::class, 'lista'])->name('listaCidade');

Route::get('usuario/{usuario}/delete', [UsuarioController::class, 'modal'])->name('index.modal');
Route::get('delete/{usuario}', [UsuarioController::class, 'delete'])->name('usuario.delete');

Route::get('usuario/{usuario}/edit', [UsuarioController::class, 'edit'])->name('usuario.edit'); 
Route::put('usuario/{usuario}', [UsuarioController::class, 'editar'])->name('usuario.editar');