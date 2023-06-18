<?php

use App\Http\Controllers\PostulacionController;
use App\Http\Controllers\ProgramaAcademicoController;
use App\Http\Controllers\Facultadcontroller;
use App\Http\Controllers\CuerpoColegiadoController;
use App\Http\Controllers\ParametrosController;
use App\Http\Controllers\SufraganteController;
use App\Http\Controllers\CalendarioElectoralController;
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
})->name('welcome');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    //Rutas Parametrizacion
    Route::get('/parametros',[ParametrosController::class, 'index'])
    ->name('parametros.index');

    //Rutas Calendario Electoral
    //Route::resource('calendario', CalendarioElectoralController::class);
    Route::get('/calendario',[CalendarioElectoralController::class, 'index'])
    ->name('calendario.index');
    Route::get('/calendario/create',[CalendarioElectoralController::class, 'create'])
    ->name('calendario.create');
    Route::post('/calendario',[CalendarioElectoralController::class, 'store'])
    ->name('calendario.store');
    Route::get('/calendario/{calendarioElectoral}/edit',[CalendarioElectoralController::class, 'edit'])
    ->name('calendario.edit');
    Route::put('/calendario/{calendarioElectoral}',[CalendarioElectoralController::class, 'update'])
    ->name('calendario.update');
    

    Route::get('/sufragantes',[SufraganteController::class, 'index'])
    ->name('sufragante.index');

        
    /////rutas de cuerpo colegiado

    Route::get('/parametros/cuerpo-colegiado', [CuerpoColegiadoController::class, 'index'])->name('parametros.cuerpo_colegiado.index');
    Route::get('/parametros/cuerpo-colegiado/create', [CuerpoColegiadoController::class, 'create'])->name('parametros.cuerpo_colegiado.create');
    Route::post('/parametros/cuerpo-colegiado', [CuerpoColegiadoController::class, 'store'])->name('parametros.cuerpo_colegiado.store');
    Route::get('/parametros/cuerpo-colegiado/{cuerpoColegiado}', [CuerpoColegiadoController::class, 'show'])->name('parametros.cuerpo_colegiado.show');
    Route::get('/parametros/cuerpo-colegiado/{cuerpoColegiado}/edit', [CuerpoColegiadoController::class, 'edit'])->name('parametros.cuerpo_colegiado.edit');
    Route::put('/parametros/cuerpo-colegiado/{cuerpoColegiado}', [CuerpoColegiadoController::class, 'update'])->name('parametros.cuerpo_colegiado.update');
    Route::delete('/parametros/cuerpo-colegiado/{cuerpoColegiado}', [CuerpoColegiadoController::class, 'destroy'])->name('parametros.cuerpo_colegiado.destroy');

    //////rutas de programa

    Route::get('/parametros/programas', [ProgramaAcademicoController::class, 'index'])->name('parametros.programas.index');
    Route::get('/parametros/programas/create', [ProgramaAcademicoController::class, 'create'])->name('parametros.programas.create');
    Route::post('/parametros/programas', [ProgramaAcademicoController::class, 'store'])->name('parametros.programas.store');
    Route::get('/parametros/programas/{programa}', [ProgramaAcademicoController::class, 'show'])->name('parametros.programas.show');
    Route::get('/parametros/programas/{programa}/edit', [ProgramaAcademicoController::class, 'edit'])->name('parametros.programas.edit');
    Route::put('/parametros/programas/{programa}', [ProgramaAcademicoController::class, 'update'])->name('parametros.programas.update');
    Route::delete('/parametros/programas/{programa}', [ProgramaAcademicoController::class, 'destroy'])->name('parametros.programas.destroy');

    /////rutas de facultad

    Route::get('/parametros/facultades', [FacultadController::class, 'index'])->name('parametros.facultades.index');
    Route::get('/parametros/facultades/create', [FacultadController::class, 'create'])->name('parametros.facultades.create');
    Route::post('/parametros/facultades', [FacultadController::class, 'store'])->name('parametros.facultades.store');
    Route::get('/parametros/facultades/{facultad}', [FacultadController::class, 'show'])->name('parametros.facultades.show');
    Route::get('/parametros/facultades/{facultad}/edit', [FacultadController::class, 'edit'])->name('parametros.facultades.edit');
    Route::put('/parametros/facultades/{facultad}', [FacultadController::class, 'update'])->name('parametros.facultades.update');
    Route::delete('/parametros/facultades/{facultad}', [FacultadController::class, 'destroy'])->name('parametros.facultades.destroy');

    /////rutas de postulacion

    Route::get('/postulaciones', [PostulacionController::class, 'index'])->name('postulaciones.index');
    Route::get('/postulaciones/create', [PostulacionController::class, 'create'])->name('postulaciones.create');
    Route::post('/postulaciones', [PostulacionController::class, 'store'])->name('postulaciones.store');
    Route::get('/postulaciones/{postulacion}', [PostulacionController::class, 'show'])->name('postulaciones.show');
    Route::get('/postulaciones/{postulacion}/edit', [PostulacionController::class, 'edit'])->name('postulaciones.edit');
    Route::put('/postulaciones/{postulacion}', [PostulacionController::class, 'update'])->name('postulaciones.update');
    Route::delete('/postulaciones/{postulacion}', [PostulacionController::class, 'destroy'])->name('postulaciones.destroy');


});


require 'sufragante.php';
