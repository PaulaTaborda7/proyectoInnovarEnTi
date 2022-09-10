<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Añado el modelo de Estudiante para poder conectar con la base de datos
use App\Models\Docente;
use App\Models\User;
use App\Models\Estudiante;
// Añado Hash para poder encriptar y desencriptar contraseñas
use Illuminate\Support\Facades\Hash;

class AutenticacionEstudianteController extends Controller
{

    public function index(){
        return view('auth.loginEstudiante');
    }

    public function index2(){
        return view('estudiante');
    }

    public function login(){
        return view('auth.loginEstudiante');
    }

    public function register(){
        return view('estudiante.create');
    }

    // Con esta función o método realizo el login de un estudiante previamente registrado en la base de datos
    public function check(Request $request){
        //Hago la validación de los campos del formulario
        $camposFormulario = [
            'email'=>'required|email',
            'password'=>'required|min:5',
        ];

        $message = [
            'email.required' => 'El correo electrónico es requerido',
            'password.required' => 'La contraseña es requerida',
            'password.min' => 'La contraseña debe tener mínimo 5 caracteres',
        ];

        $this->validate($request, $camposFormulario, $message);

        //Consulto los datos del estudiante con el email que se ha ingresado al formulario
        $datosEstudiante = Estudiante::where('email', '=', $request->email)->first();
        
        if(!$datosEstudiante){
            return back()->with('fail', 'No se ha encontrado ningún estudiante con dicho correo electrónico');
        }else{
        //Verificamos la contraseña
            if(Hash::check($request->password, $datosEstudiante->password)){
                $request->session()->put('LoggedEstudiante', $datosEstudiante->numIdentidad); //Nos referiremos al id del usuario loggeado por el nombre loggedEstudiante
                $nombreCompleto = $datosEstudiante->nombre;
                $request->session()->put('nombreCompletoEstudiante', $nombreCompleto);
                //Llevo al estudiante loggeado al index de estudiante. Esta línea va a web.php y ve que esta ruta llama a AutenticacionDocenteController en su método index2
                return redirect('/vistaestudiantes');
            }else{
                return back()->with('fail', 'La contraseña ingresada es incorrecta');
            }
        }
    }


    public function logout(){
        if(session()->has('LoggedEstudiante')){
            session()->pull('LoggedEstudiante');
            session()->pull('nombreCompletoEstudiante');
            return redirect('/');
        }
    }
}
