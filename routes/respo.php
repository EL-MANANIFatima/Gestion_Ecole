<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::group(['middleware' => 'auth:respo'],function(){
    Route::get('/respo/dashboard', function () {
        return view('Respo.dashboard');
    });
    Route::resource('Super',SuperController::class);
    Route::get('/Lkhlass/{id}',[SuperController::class,'Para'])->name('Super.pay');
    Route::post('/CheckOut', [SuperController::class,'checkOut'])->name('Super.checkOut');
    Route::get('/Form/{id}', [SuperController::class,'getForm'])->name('Super.getForm');



   

});
