<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SufraganteController;


Route::group(['prefix' => 'sufragante'], function () {

   // Route::post('/verify-token', [SufraganteController::class,'validatetoken'])
   // ->name('sufragante.verify-token');
   Route::get('/verify-token/{numeroDocumento}/{codigo}', [SufraganteController::class,'validatetoken'])
   ->name('sufragante.verify-token');
   
   Route::post('/send-token', [SufraganteController::class, 'generatetoken'])
   ->name('sufragante.send-token');

   Route::post('/logout', [SufraganteController::class, 'logout'])
   ->name('sufragante.logout');
   
   Route::group(['middleware' => 'auth:sufragante'], function () {
      Route::get('/dashboard', [SufraganteController::class, 'inicio'])->name('sufragante.dashboard');
      // Route::get('/dashboard', function () {
      //    return view('sufragantes.dashboard');
      // })->name('sufragante.dashboard');

   });


});