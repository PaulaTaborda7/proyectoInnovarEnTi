<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Añado el modelo de Administrador (User) para poder conectar con la base de datos
use App\Models\User;
// Añado Hash para poder encriptar y desencriptar contraseñas
use Illuminate\Support\Facades\Hash;

class AutenticacionAdminController extends Controller
{
    public function index(){
        return view('auth.loginAdmin');
    }

    public function login(){
        return view('auth.loginAdmin');
    }

    public function register(){
        return view('auth.registerAdmin');
    }

    #Con esta función se guarda un admin en la BD
    function saveAdmin(Request $request){
        $camposFormulario = [
            'email'=>'required|email|unique:administradors',
            'password'=>'required|min:5',
        ];

        $message = [
            'required' => 'El :attribute es requerido',
            'email.required' => 'El correo electrónico es requerido',
            'email.unique' => 'El correo electrónico ingresado ya está en uso',
            'password.required' => 'La contraseña es requerida',
            'password.min' => 'La contraseña debe tener mínimo 5 caracteres',
        ];

        $this->validate($request, $camposFormulario, $message);

        //Insertamos los datos en la base de datos
        $administrador = new User;
        $administrador->name = $request->name;
        $administrador->documentoIdentidad = $request->documentoIdentidad;
        $administrador->email = $request->email;
        $administrador->tipo = $request->tipo;
        $administrador->password = Hash::make($request->password); //Encripto la contraseña
        $administrador->password_confirmation = Hash::make($request->password_confirmation); //Encripto la contraseña

        $save = $administrador->save();

        if($save){
            return redirect()->route('home')->with('success', 'Se ha creado el nuevo administrador');
        }else{
            return back()->with('fail', 'Ha ocurrido un error creando el administrador');
        }
    }

    // Con esta función o método realizo el login de un administrador previamente registrado en la base de datos
    public function checkAdmin(Request $request){
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

        //Consulto los datos del Administrador con el email que se ha ingresado al formulario
        $datosAdministrador = User::where('email', '=', $request->email)->first();

        if(!$datosAdministrador){
            return back()->with('fail', 'No se ha encontrado ningún administrador con dicho correo electrónico');
        }else{
            // Verificamos la contraseña
            if(Hash::check($request->password, $datosAdministrador->password)){
                $request->session()->put('LoggedAdmin', $datosAdministrador->id); //Nos referiremos al id del Administrador loggeado por el nombre loggedAdmin
                $nombreAdmin = $datosAdministrador->nombre;
                $request->session()->put('nombreAdmin', $nombreAdmin);
                //Llevo al Administrador loggeado al index de Administrador. Esta línea va a web.php y ve que esta ruta llama a AutenticacionAdminController en su metodo AdministradorIndex
                return redirect()->route('home');
            }else{
                return back()->with('fail', 'La contraseña ingresada es incorrecta');
            }
        }
    }

    public function logoutAdmin(){
        if(session()->has('LoggedAdmin')){
            session()->pull('LoggedAdmin');
            session()->pull('nombreAdmin');
            return redirect('/');
        }
    }
}
