<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

// Añado Hash para poder encriptar y desencriptar contraseñas
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return redirect('/')->with('fail', 'Debes haber iniciado sesión como Administrador para poder acceder AQUI');
    }

    // esta funcion es la que se ejecuta cuando se hace el submit del formulario de login
    public function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:5',
            ],
            [
                'email.required' => 'El campo correo electrónico es obligatorio',
                'email.email' => 'El campo correo electrónico debe ser un correo electrónico válido',
                'password.required' => 'El campo contraseña es obligatorio',
                'password.min' => 'La contraseña debe tener como mínimo 5 caracteres',
            ]
        );

        //Consulto los datos del Administrador con el email que se ha ingresado al formulario
        $datosAdministrador = User::where('email', '=', $request->email)->first();

        // esto me toco hacerlo porque los comentarios de AutenticationAdminController no funcionan (revisar)
        if(!$datosAdministrador){
            return back()->with('fail', 'No se ha encontrado ningún administrador con dicho correo electrónico');
        }
        else{
            if(!Hash::check($request->password, $datosAdministrador->password)){
                return back()->with('fail', 'Contraseña incorrecta');
            }
        }

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (
            method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)
        ) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            if ($request->hasSession()) {
                //$request->session()->put('auth.password_confirmed_at', time());
                $request->session()->put('LoggedAdmin', $datosAdministrador->id); //Nos referiremos al id del Administrador loggeado por el nombre loggedAdmin
                $nombreAdmin = $datosAdministrador->nombre;
                $request->session()->put('nombreAdmin', $nombreAdmin);
            }

            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }
}
