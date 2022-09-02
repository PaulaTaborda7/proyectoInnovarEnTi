<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\PadreController;
use App\Http\Controllers\MateriaController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::group(['middleware' => ['soloadmin']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/materias', MateriaController::class);
});


Route::group(['middleware' => ['solodocente']], function () {
    Route::resource('/docente', DocenteController::class);
});

Route::group(['middleware' => ['soloestudiante']], function () {
    Route::resource('/estudiante', EstudianteController::class);
});

Route::group(['middleware' => ['solopadre']], function () {
    Route::resource('/padre', PadreController::class);
});






