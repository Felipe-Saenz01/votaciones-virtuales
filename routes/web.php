<?php

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

Route::post('/sufragante/verify-token', [SufraganteController::class,'validatetoken'])
->name('sufragante.verify-token');

Route::post('/sufragante/send-token', [SufraganteController::class, 'generatetoken'])
->name('sufragante.send-token');

Route::get('/sufragante/dashboard', function(){
    return view('sufragantes.dashboard');
})->name('sufragante.dashboard')->middleware('auth:sufragante');


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
    

    Route::get('/sufragante',[SufraganteController::class, 'index'])
    ->name('sufragante.index');
});
