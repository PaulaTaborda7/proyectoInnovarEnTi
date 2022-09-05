<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\PadreController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\AutenticacionDocenteController;
use App\Http\Controllers\AutenticacionAdminController;

use Illuminate\Http\Request;
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

Route::post('/admin/check', [AutenticacionAdminController::class, 'checkAdmin'])->name('admin.check');
Route::get('/admin/loginAdmin', [AutenticacionAdminController::class, 'login']); //Loguea administrador

Route::post('/auth/check', [AutenticacionDocenteController::class, 'check'])->name('auth.check'); //Hace el login de docente 
Route::get('/auth/login', [AutenticacionDocenteController::class, 'login']);
Route::get('/auth/register', [AutenticacionDocenteController::class, 'register']);
Route::get('/auth/login', [AutenticacionDocenteController::class, 'index'])->name('auth.index');
Route::get('/vistadocentes', [DocenteController::class, 'index2']);
Route::post('/auth/logout', [AutenticacionDocenteController::class, 'logout'])->name('auth.logout'); //Hace el logout de usuario Route::resource('/materias', MateriaController::class);
Route::resource('/docentes', DocenteController::class);

Route::group(['middleware' => ['soloadmin']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/admin/save', [AutenticacionAdminController::class, 'saveAdmin'])->name('admin.save');
    Route::resource('/materias', MateriaController::class);
    Route::resource('/docentes', DocenteController::class);
    //Route::get('/auth/login', "App\Http\Controllers\AutenticacionDocente@login");
    //Route::get('/docente/registerDocente', [AutenticacionDocente::class, 'register'])->name('admin.docente.create');
});


// Route::group(['middleware' => ['solodocente']], function () {
//     //Route::resource('/docentes', DocenteController::class);
// });

Route::group(['middleware' => ['soloestudiante']], function () {
    Route::resource('/estudiante', EstudianteController::class);
});

Route::group(['middleware' => ['solopadre']], function () {
    Route::resource('/padre', PadreController::class);
});



