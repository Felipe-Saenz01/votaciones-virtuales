<?php

use App\Http\Controllers\SufraganteController;
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

    Route::get('/sufragante',[SufraganteController::class, 'index'])
    ->name('sufragante.index');
});
