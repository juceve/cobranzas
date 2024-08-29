<?php

use App\Http\Controllers\CompromisopagoController;
use App\Http\Controllers\CtrlDeudasController;
use App\Http\Controllers\DeudaController;
use App\Http\Controllers\DeudoreController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EstadocontactoController;
use App\Http\Controllers\GestiontipoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoteController;
use App\Http\Controllers\MetodopagoController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\RecordatorioController;
use App\Http\Controllers\ResultadoController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UpdDbEmpresasController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ZonaController;
use App\Http\Livewire\CiteInformes;
use App\Http\Livewire\ListadoDeudores;
use App\Http\Livewire\ManejoDeudas;
use App\Http\Livewire\MisLotes;
use App\Http\Livewire\NuevoCiteInforme;
use App\Http\Livewire\NuevoLote;
use App\Http\Livewire\NuevoUsuario;
use App\Http\Livewire\ProcesarLote;
use App\Http\Livewire\ProcesoDeuda;
use App\Http\Livewire\RptAnticuacion;
use App\Http\Livewire\RptCompromisos;
use App\Http\Livewire\RptContactos;
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



Auth::routes([
    "register" => false,
    "reset" => false,
    "confirm" => false,
]);

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->middleware('auth');


    Route::get('users/asignaRol/{user}', [UserController::class, 'asinaRol'])->name('users.asignaRol');
    Route::put('users/updateRol/{user}', [UserController::class, 'updateRol'])->name('users.updateRol');
    Route::get('users/cambiaestado/{user}', [UserController::class, 'cambiaestado'])->name('users.cambiaestado');
    Route::resource('/roles', RoleController::class)->names('roles');
    // Route::get('/home/marcacion/{id}', [HomeController::class, 'marcar'])->name('marcacion');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('empresas/update-db/{empresa_id}', [UpdDbEmpresasController::class, 'index'])->name('empresas.updatedb');
    Route::post('/upload-excel/{empresa_id}', [UpdDbEmpresasController::class, 'upload'])->name('upload.excelempresas');

    Route::get('/listado-deudores', ListadoDeudores::class)->name('listadodeudores');
    Route::get('/manejo-deudas', ManejoDeudas::class)->can('manejodeudas')->name('manejodeudas');
    Route::get('/nuevo-lote/{empresa_id}', NuevoLote::class)->name('nuevolote');
    Route::get('/mis-lotes/{empresa_id?}', MisLotes::class)->name('mislotes');
    Route::get('/procesar-lote/{lote_id}', ProcesarLote::class)->name('procesarlote');
    Route::get('/proceso-deuda/{lotedeuda_id}', ProcesoDeuda::class)->name('procesodeuda');
    Route::get('/rpt-compromisos', RptCompromisos::class)->can('rpt.compromisos')->name('rpt.compromisos');
    Route::get('/rpt-contactos', RptContactos::class)->can('rpt.contactos')->name('rpt.contactos');
    Route::get('/rpt-anticuacion', RptAnticuacion::class)->can('rpt.anticuacion')->name('rpt.anticuacion');
    Route::get('/nuevo-usuario', NuevoUsuario::class)->name('nuevousuario');
    Route::get('/cite-informes/{empresa_id?}',CiteInformes::class)->name('citeinformes');
    Route::get('/nuevo-informe',NuevoCiteInforme::class)->name('nuevoinforme');

    Route::resource('empresas', EmpresaController::class)->names('empresas');
    Route::resource('deudores', DeudoreController::class)->except(['create', 'store'])->names('deudores');
    Route::resource('deudas', DeudaController::class)->only('show')->names('deudas');
    Route::resource('lotes', LoteController::class)->only('index')->names('lotes');
    Route::resource('zonas', ZonaController::class)->names('zonas');
    Route::resource('gestiontipos', GestiontipoController::class)->names('gestiontipos');
    Route::resource('estadocontactos', EstadocontactoController::class)->names('estadocontactos');
    Route::resource('recordatorios', RecordatorioController::class)->names('recordatorios');
    Route::resource('compromisos-pago', CompromisopagoController::class)->names('compromisopagos');
    Route::resource('metodopagos', MetodopagoController::class)->names('metodopagos');
    Route::resource('pagos', PagoController::class)->names('pagos');
    Route::resource('tiporesultados', ResultadoController::class)->names('resultados');


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('notifications/get', [App\Http\Controllers\NotificationsController::class, 'getNotificationsData'])->name('notifications.get');
    Route::get('notifications/show/{lotedeuda_id}', [App\Http\Controllers\NotificationsController::class, 'show'])->name('notifications.show');

    // GRAFICOS
    Route::get('registros-por-semana',[CtrlDeudasController::class,'data'])->name('ctrldeudas');
});
