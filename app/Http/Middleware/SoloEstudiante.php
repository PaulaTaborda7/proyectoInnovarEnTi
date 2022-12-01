<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SoloEstudiante
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Si no ha iniciado sesión como estudiante y quiere entrar a alguna vista que no sea el login, o el index normal (/)...
        //Se redirige a la vista welcome con un mensaje de error
        if(!session()->has('LoggedEstudiante') && ($request->path() != '/' && $request->path() != '/estudiante/login')){
            return redirect('/')->with('fail', 'Debes haber iniciado sesión para poder acceder');
        }
        // Si ya se ha iniciado sesión y quiere ir al login, o al index inicial...
        //Se deja al usuario en la misma página en que estaba
        if(session()->has('LoggedEstudiante') && ($request->path() == '/estudiante/login' || $request->path() == '/')){
            return back();
        }
        // Si el administrador está loggeado y desea ir a alguna de las rutas desprotegidas para los docentes o estudiantes, automáticamente se cerrará la sesión de administrador
        if(session()->has('LoggedAdmin') || ($request->path() == 'estudiante/login')){
            echo "<script> alert('Se cerrará su sesión como administrador') </script>";
            session()->pull('LoggedAdmin');
        }
        //Si el docente está loggeado y desea ir a alguna de las rutas desprotegidas para los admin o estudiantes, automáticamente se cerrará la sesión de docente
        if(session()->has('LoggedDocente') || ($request->path() == '/estudiante/login')){
            echo "<script> alert('Se cerrará su sesión como docente') </script>";
            session()->pull('LoggedDocente');
        }
        // Elimino el caché para prevenir vulneraciones
        return $next($request)  ->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
                                ->header('Pragma', 'no-cache')
                                ->header('Expires', 'Sat 01 Jan 1990 00:00:00 GMT');
    }
}
