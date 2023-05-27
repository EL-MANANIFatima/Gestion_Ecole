<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfController;
use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ControleController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ZoomController;
use App\Http\Controllers\NoteController;



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

Route::group(['middleware' => 'auth:prof'],function(){
    Route::get('/prof/dashboard', [ProfController::class, 'dashboard'])->name('dashboard');

    Route::resource('Absence', AbsenceController::class);
    Route::get('Select/{id}', [AbsenceController::class,'select'])->name('select');
    Route::get('Abs', [AbsenceController::class,'allah'])->name('Allah');

    Route::get('ResultatClasse/{id}', [ControleController::class,'Resultat'])->name('ResultatMat');
    Route::get('Mes_Classes', [ProfController::class,'Classe_List'])->name('MesClasse');
    Route::get('Mes_Eleves/{id}', [ProfController::class,'Eleve_List'])->name('MesEleves');
    Route::get('IOT/{id}', [ProfController::class,'showAbs'])->name('EleveAbs');
    Route::get('3yit/{id}', [ProfController::class,'Note'])->name('NoteEleve');
    Route::get('AbsenceDate', [ProfController::class,'show'])->name('AbsenceDate');
    Route::post('absPerClasse/{id}', [HomeController::class,'agharass'])->name('absPerClasse');
    Route::resource('Controle', ControleController::class);
    Route::post('Classes/{id}', [HomeController::class,'getClasse'])->name('GetClasse');
    Route::get('Datails/{id}', [ControleController::class,'Details'])->name('Details');
    Route::resource('Question', QuestionController::class);
    Route::get('Delete/{id}', [QuestionController::class,'delete'])->name('Question.delete');
    //Route::resource('Zoom', ZoomController::class);
    Route::post('Zoommeet', [  ZoomController::class,'zoom'])->name('zoommake');
    Route::get('test', [  ZoomController::class,'test'])->name('test');
    Route::get('Notes/{id}', [  ControleController::class,'Notes'])->name('Notes');
    Route::resource('Note', NoteController::class);
    Route::get('affichage/{classe_id}/{controle_id}', [  NoteController::class,'examNote'])->name('examNote');




});
