<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Añado el modelo de Docente para poder conectar con la base de datos
use App\Models\Docente;
use App\Models\User;
// Añado Hash para poder encriptar y desencriptar contraseñas
use Illuminate\Support\Facades\Hash;

class AutenticacionDocenteController extends Controller
{

    public function index(){
        return view('docente.loginDocente');
    }

    public function login(){
        return view('docente.loginDocente');
    }

    public function register(){
        return view('docente.create');
    }

    // Con esta función o método realizo el login de un docente previamente registrado en la base de datos
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

        //Consulto los datos del docente con el email que se ha ingresado al formulario
        $datosDocente = Docente::where('email', '=', $request->email)->first();
        
        if(!$datosDocente){
            return back()->with('fail', 'No se ha encontrado ningún docente con dicho correo electrónico');
        }else{
        //Verificamos la contraseña
            if(Hash::check($request->password, $datosDocente->password)){
                $request->session()->put('LoggedUser', $datosDocente->documentoIdentidad); //Nos referiremos al id del usuario loggeado por el nombre loggedUser
                $nombreCompleto = $datosDocente->nombre;
                $request->session()->put('nombreCompletoDocente', $nombreCompleto);
                //Llevo al docente loggeado al index de docente. Esta línea va a web.php y ve que esta ruta llama a AutenticacionDocenteController en su metodo usuarioIndex
                return redirect('/vistadocentes');
            }else{
                return back()->with('fail', 'La contraseña ingresada es incorrecta');
            }
        }
    }


    public function logout(){
        // if(session()->has('LoggedUser')){
        //     session()->pull('LoggedUser');
        //     session()->pull('nombreCompletoUsuario');
        //     return redirect()->route('auth.index');
        // }
    }
}
