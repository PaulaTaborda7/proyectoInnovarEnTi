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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/docente', DocenteController::class);

Route::resource('/estudiante', EstudianteController::class);

Route::resource('/padre', PadreController::class);

Route::resource('/materias', MateriaController::class);

// Route::get('materias/index', [MateriaController::class,'index'])->name('admin.materias.index');
// Route::get('materias/create/{id}', [MateriaController::class,'create'])->name('admin.materias.create');
// Route::get('materias/edit/{id}', [MateriaController::class,'edit'])->name('admin.materias.edit');
// Route::delete('materias/destroy/{id}', [MateriaController::class,'destroy'])->name('admin.materias.destroy');
// Route::put('materias/edit/{id}', [MateriaController::class,'update'])->name('admin.materias.update');