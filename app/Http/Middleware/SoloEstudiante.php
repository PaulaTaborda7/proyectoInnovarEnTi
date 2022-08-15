<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        switch(auth::user()->tipo){
            case ('1'):
                return redirect('home');//si es administrador continua al HOME
            break;
			case('2'):
                return redirect('docente');// si es un docente redirige a la ruta docente
			break;	
            case ('3'):
                return $next($request);//si es estudiante redirige a la ruta estudiante
            break;
            case ('4'):
                return redirect('padre');//si es padre redirige a la ruta padre
            break;
        }
    }
}
