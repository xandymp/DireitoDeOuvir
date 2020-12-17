<?php

use App\Http\Controllers\EmpresaController;
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

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
