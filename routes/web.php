<?php

use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\FuncionarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get(
    '/home', function () {
        return view('home');
    }
)->middleware(['auth'])
    ->name('home');

Route::get('/empresa', [EmpresaController::class, 'index'])
    ->middleware(['auth'])
    ->name('empresa.index');
Route::get('/empresa/create', [EmpresaController::class, 'create'])
    ->middleware(['auth'])
    ->name('empresa.create');
Route::post('/empresa', [EmpresaController::class, 'store'])
    ->middleware(['auth'])
    ->name('empresa.store');
Route::get('/empresa/{empresa}/edit', [EmpresaController::class, 'edit'])
    ->middleware(['auth'])
    ->name('empresa.edit');
Route::put('/empresa/{empresa}', [EmpresaController::class, 'update'])
    ->middleware(['auth'])
    ->name('empresa.update');
Route::delete('/empresa/{empresa}', [EmpresaController::class, 'destroy'])
    ->middleware(['auth'])
    ->name('empresa.destroy');
Route::get('/empresa/{empresa}', [EmpresaController::class, 'show'])
    ->middleware(['auth'])
    ->name('empresa.show');

Route::get('/funcionario', [FuncionarioController::class, 'index'])
    ->middleware(['auth'])
    ->name('funcionario.index');
Route::get('/funcionario/create', [FuncionarioController::class, 'create'])
    ->middleware(['auth'])
    ->name('funcionario.create');
Route::post('/funcionario', [FuncionarioController::class, 'store'])
    ->middleware(['auth'])
    ->name('funcionario.store');
Route::get('/funcionario/{funcionario}/edit', [FuncionarioController::class, 'edit'])
    ->middleware(['auth'])
    ->name('funcionario.edit');
Route::put('/funcionario/{funcionario}', [FuncionarioController::class, 'update'])
    ->middleware(['auth'])
    ->name('funcionario.update');
Route::delete('/funcionario/{funcionario}', [FuncionarioController::class, 'destroy'])
    ->middleware(['auth'])
    ->name('funcionario.destroy');
Route::get('/funcionario/{funcionario}', [FuncionarioController::class, 'show'])
    ->middleware(['auth'])
    ->name('funcionario.show');

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
