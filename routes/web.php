<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\PadreController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\AutenticacionDocenteController;
use App\Http\Controllers\AutenticacionEstudianteController;
use App\Http\Controllers\AutenticacionAdminController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\InstitucionController;
use App\Http\Controllers\RedController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CityController;

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

Auth::routes(); //Revisar estas rutas

Route::post('/admin/check', [AutenticacionAdminController::class, 'checkAdmin'])->name('admin.check'); //Revisa el login de un administrador
Route::get('/admin/loginAdmin', [AutenticacionAdminController::class, 'login']); //Loguea administrador
Route::post('/auth/check', [AutenticacionDocenteController::class, 'check'])->name('auth.check'); //Hace el chequeo del login de docente 
Route::post('/estudiante/check', [AutenticacionEstudianteController::class, 'check'])->name('estudiante.check'); //Hace el chequeo del login de docente 
Route::get('/estudiante/login', [AutenticacionEstudianteController::class, 'login']); //Hace el login de estudiante


Route::get('/auth/login', [AutenticacionDocenteController::class, 'login']); //Hace el login de docente 
Route::get('/auth/index', [AutenticacionDocenteController::class, 'index'])->name('auth.index'); //Va al login de docente
Route::get('/listaDepartamentos/{id}',[StateController::class,'getStates'])->name('getStates'); //Obtiene estados
Route::get('/listaCiudades/{id}',[CityController::class,'getCities'])->name('getCities'); //Obtiene estados



Route::group(['middleware' => ['soloadmin']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/admin/save', [AutenticacionAdminController::class, 'saveAdmin'])->name('admin.save');
    Route::post('/admin/logout', [AutenticacionAdminController::class, 'logoutAdmin'])->name('admin.logout'); //Hace el logout de administrador
    Route::resource('/materias', MateriaController::class);
    Route::resource('/docentes', DocenteController::class);//Rutas del CRUD de docente
    Route::resource('/institucions', InstitucionController::class);
    Route::get('/admin/auth/register', [AutenticacionDocenteController::class, 'register']); //Hace el registro de docente 
    //Route::get('/auth/login', "App\Http\Controllers\AutenticacionDocente@login");
    //Route::get('/docente/registerDocente', [AutenticacionDocente::class, 'register'])->name('admin.docente.create');
    Route::resource('/reds', RedController::class);
    Route::get('/recurso-educativo-digital/{id}',[RedController::class,'files'])->name('recurso.educativo.digital');
    Route::get('/listaDocentes/{id}',[InstitucionController::class,'verDocentes'])->name('lista.docentes');
    Route::resource('/grupos', GrupoController::class);
    Route::get('/listaAlumnos/{id}',[GrupoController::class,'verAlumnos'])->name('lista.alumnos');
});

Route::group(['middleware' => ['solodocente']], function () {
    Route::get('/vistadocentes', [DocenteController::class, 'index2']); //Va a la vista de docentes
    Route::post('/auth/logout', [AutenticacionDocenteController::class, 'logout'])->name('auth.logout'); //Hace el logout de docente     
    Route::resource('/estudiantes', EstudianteController::class);
    Route::get('/catalogoRecursos/{id}',[DocenteController::class,'verCatalogoRecursos'])->name('catalogo.recursos');
    Route::get('/recurso-educativo-digital-Docente/{id}',[RedController::class,'filesDocente'])->name('recurso.educativo.digital.Docente');
    Route::get('/habilitar-recurso-educativo-digital/{idRed}/{idGrupo}',[RedController::class,'habilitarRecurso'])->name('habilitar.recurso.educativo.digital');
    Route::get('/deshabilitar-recurso-educativo-digital/{idRed}/{idGrupo}',[RedController::class,'deshabilitarRecurso'])->name('deshabilitar.recurso.educativo.digital');

});

Route::group(['middleware' => ['soloestudiante']], function () {
    //Route::resource('/estudiante', EstudianteController::class);
    Route::get('/vistaestudiantes', [AutenticacionEstudianteController::class, 'index2']); //Va a la vista de estudiantes
    Route::post('/estudiante/logout', [AutenticacionEstudianteController::class, 'logout'])->name('estudiante.logout');
    Route::get('/descargar_pdf/{id}',[EstudianteController::class,'generar_pdf'])->name('descargarpdf');
    Route::get('/reds_habilitados',[EstudianteController::class,'habilitacion_red']);
    Route::get('/recurso-educativo-digital-Estudiante/{id}',[RedController::class,'filesEstudiante'])->name('recurso.educativo.digital.Estudiante');
    Route::get('/reporte_notas/{id}',[EstudianteController::class,'reporte_notas'])->name('reportepdf');
});

Route::group(['middleware' => ['solopadre']], function () {
    Route::resource('/padre', PadreController::class);
});

//Route::resource('/institucions', InstitucionController::class);


