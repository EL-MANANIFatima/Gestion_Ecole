<?php

use App\Http\Controllers\ExamCotroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\vendor\Chatify;



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


Route::group(['middleware' => 'auth:eleve'],function(){
    Route::get('/eleve/dashboard', function () {
        return view('Eleve.dashboard');
    })->name('elevedash');
    Route::resource('Exam',ExamCotroller::class);
    

Route::get('/chat', [ChatifyController::class, 'index'])->name('chatify');
Route::get('/chat/{id}', [ChatifyController::class, 'getMessage'])->name('chatify.messages');


});
