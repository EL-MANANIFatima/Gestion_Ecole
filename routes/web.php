<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NiveauController;
use App\Http\Controllers\ProfController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\RespoController;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\Bxh7alController;
use App\Http\Controllers\ExamCotroller;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ContactController;



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
Route::post('contact-us', [ContactController::class, 'store'])->name('contact.us.store');
Route::get('/', function () {
    return view('layouts.landing');
});
Route::get('/welcome', [HomeController::class,'index'])->middleware('guest')->name('type');
Route::get('/Auth/{type}',[LoginController::class,'xhkon'])->middleware('guest')->name('Login');
Route::post('/login',[LoginController::class,'logIn'])->name('login');
Route::post('/logOut/{type}',[LoginController::class,'logOut'])->name('logOut');
Route::get('/chat', [MessagesController::class,'index'])->name(config('chatify.routes.prefix'));


Route::group(['middleware' => 'auth:web,prof,eleve,respo'], function() {
	Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::post('taskdelete', [TaskController::class, 'task'])->name('task');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('profile/password', [ProfileController::class, 'password'])->name('profile.password');
	Route::get('/notif', [HomeController::class,'notif'])->name('notif');
	Route::get('/MAR/{id}', [HomeController::class,'mar'])->name('mar');
	Route::get('Resultat/{id}',[ExamCotroller::class,'resultat'])->name('resultat');
	Route::resource('Task', TaskController::class);
	Route::get('datails/{id}',[EleveController::class,'det'])->name('Eleve.details');




});
    Route::group(['middleware' => 'auth:web'], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'App\Http\Controllers\PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'App\Http\Controllers\PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'App\Http\Controllers\PageController@rtl']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'App\Http\Controllers\PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'App\Http\Controllers\PageController@upgrade']);
		Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
		Route::get('AdminEleves/{id}', [ClasseController::class,'AdminEleves'])->name('AdminEleves');
		Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
		Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');

		Route::get('Det/{id}',[ProfController::class,'det'])->name('Prof.info');
		Route::get('Dets/{id}',[RespoController::class,'det'])->name('Respo.info');


		Route::get('/nbrEleve', [App\Http\Controllers\HomeController::class, 'nbrEleve'])->name('nbrEleve');
		Route::resource('Niveau', NiveauController::class);
		Route::resource('Prof', ProfController::class);
		Route::resource('Classe', ClasseController::class);
		Route::get('filter', [ClasseController::class,'filter'])->name('filter');
		Route::get('search', [EleveController::class,'search'])->name('search');
		Route::resource('Respo', RespoController::class);
		Route::resource('Eleve', EleveController::class);
		Route::resource('Bxh7al', Bxh7alController::class);
		Route::resource('Facture', FactureController::class);
		Route::get('/Classes/{id}', [EleveController::class,'Classes'])->name('Classes');

        

});


