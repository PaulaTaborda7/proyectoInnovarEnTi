<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SoloAdmin
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
        //return $next($request);//si es administrador continua al HOME
        // switch(auth::user()->tipo){
        //     case ('1'):
                
        //     break;
		// 	case('2'):
        //         return redirect('docente');// si es un docente redirige a la ruta docente
		// 	break;	
        //     case ('3'):
        //         return redirect('estudiante');//si es estudiante redirige a la ruta estudiante
        //     break;
        //     case ('4'):
        //         return redirect('padre');//si es padre redirige a la ruta padre
        //     break;
        // }
        // Si no ha iniciado sesión y quiere entrar a alguna vista que no sea el login del administrador...
        //Se redirige al docente a la vista de login del administrador con un mensaje de error
        if(!session()->has('LoggedAdmin') && ($request->path() != 'admin')){
            return redirect('admin')->with('fail', 'Debes haber iniciado sesión como administrador para poder acceder');
        }
        // Si ya se ha iniciado sesión y quiere ir al login del administrador...
        //Se deja al docente en la misma página en que estaba
        if(session()->has('LoggedAdmin') && ($request->path() == 'admin')){
            return back();
        }
        // Si hay un docente con sesión iniciada y quiere ir al login de administrador, cierro la sesión de ese docente
        if(session()->has('LoggedDocente') && ($request->path() == 'admin')){
            echo "<script> alert('Se cerrará su sesión como docente') </script>";
            session()->pull('LoggedDocente');
        }
        // Elimino el caché para prevenir vulneraciones
        return $next($request)  ->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
                                ->header('Pragma', 'no-cache')
                                ->header('Expires', 'Sat 01 Jan 1990 00:00:00 GMT');
    }
}
