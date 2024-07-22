<?php

use App\Http\Controllers\DeudoreController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ExcelUploadController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UpdDbEmpresasController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\UpddbEmpresas;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    "register" => false,
    "reset" => false,
    "confirm" => false,
]);

Route::middleware(['auth'])->group(function () {

    Route::get('users/asignaRol/{user}', [UserController::class, 'asinaRol'])->name('users.asignaRol');
    Route::put('users/updateRol/{user}', [UserController::class, 'updateRol'])->name('users.updateRol');
    Route::get('users/cambiaestado/{user}', [UserController::class, 'cambiaestado'])->name('users.cambiaestado');
    Route::resource('/roles', RoleController::class)->names('roles');
    // Route::get('/home/marcacion/{id}', [HomeController::class, 'marcar'])->name('marcacion');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('empresas/update-db/{empresa_id}', [UpdDbEmpresasController::class, 'index'])->name('empresas.updatedb');
    Route::post('/upload-excel/{empresa_id}', [UpdDbEmpresasController::class, 'upload'])->name('upload.excelempresas');

    Route::resource('empresas', EmpresaController::class)->names('empresas');
    Route::resource('deudores', DeudoreController::class)->names('deudores');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
