<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * Class EstudianteController
 * @package App\Http\Controllers
 */
class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $estudiantes = Estudiante::where('nombre', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('numIdentidad', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('email', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('tipo', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('estPromedio', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('insCodigoNit', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('numIdentidadPadre', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('gruIdCurso', 'LIKE', '%' . $busqueda . '%')
            ->latest('id')
            ->paginate(10);

        return view('estudiante.index', compact('estudiantes', 'busqueda'))
            ->with('i', (request()->input('page', 1) - 1) * $estudiantes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estudiante = new Estudiante();
        return view('estudiante.create', compact('estudiante'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'numIdentidad' => ['required', 'unique:estudiantes'],
            'email' => ['required', 'unique:estudiantes'],
            'estPromedio' => 'required|numeric|between:0,5.0',
            'insCodigoNit' => 'required',
            'numIdentidadPadre' => 'required',
            'gruIdCurso' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio',
            'numIdentidad.required' => 'El campo número de identidad es obligatorio',
            'numIdentidad.unique' => 'El número de identidad ya existe',
            'email.required' => 'El campo correo electrónico es obligatorio',
            'email.unique' => 'El correo electrónico ya existe',
            'estPromedio.required' => 'El campo promedio es obligatorio',
            'estPromedio.numeric' => 'El campo promedio debe ser numérico',
            'estPromedio.between' => 'El campo promedio debe estar entre 0 y 5.0',
            'insCodigoNit.required' => 'El campo código de institución es obligatorio',
            'numIdentidadPadre.required' => 'El campo número de identidad del padre es obligatorio',
            'gruIdCurso.required' => 'El campo código de curso es obligatorio',
            'password.required' => 'El campo contraseña es obligatorio',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres',
            'password.confirmed' => 'Las contraseñas no coinciden',
            'password_confirmation.required' => 'El campo confirmar contraseña es obligatorio',
            'password_confirmation.same' => 'Las contraseñas no coinciden',
        ]);

        //request()->validate(Estudiante::$rules);

        // $estudiante = Docente::create($request->all());
        Estudiante::create([
            'nombre' => $request['nombre'],
            'numIdentidad' => $request['numIdentidad'],
            'email' => $request['email'],
            'tipo' => '3',
            'estPromedio' => $request['estPromedio'],
            'insCodigoNit' => $request['insCodigoNit'],
            'numIdentidadPadre' => $request['numIdentidadPadre'],
            'gruIdCurso' => $request['gruIdCurso'],
            'password' => Hash::make($request['password']),
            'password_confirmation' => Hash::make($request['password_confirmation']),
        ]);

        return redirect()->route('estudiantes.index')
            ->with('success', 'INFORMACIÓN DE ESTUDIANTE REGISTRADA CON ÉXITO');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estudiante = Estudiante::find($id);

        return view('estudiante.show', compact('estudiante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estudiante = Estudiante::find($id);

        return view('estudiante.edit', compact('estudiante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Estudiante $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estudiante $estudiante)
    {
        if (($request->numIdentidad == $estudiante->numIdentidad) && ($request->email == $estudiante->email)) {
            $request->validate([
                'nombre' => 'required',
                'estPromedio' => 'required|numeric|between:0,5.0',
                'insCodigoNit' => 'required',
                'numIdentidadPadre' => 'required',
                'gruIdCurso' => 'required',
                'password' => 'required',
                'password_confirmation' => 'required|same:password',
            ], [
                'nombre.required' => 'El campo nombre es obligatorio',
                'estPromedio.required' => 'El campo promedio es obligatorio',
                'estPromedio.numeric' => 'El campo promedio debe ser numérico',
                'estPromedio.between' => 'El campo promedio debe estar entre 0 y 5.0',
                'insCodigoNit.required' => 'El campo código de institución es obligatorio',
                'numIdentidadPadre.required' => 'El campo número de identidad del padre es obligatorio',
                'gruIdCurso.required' => 'El campo código de curso es obligatorio',
                'password.required' => 'El campo contraseña es obligatorio',
                'password.min' => 'La contraseña debe tener al menos 8 caracteres',
                'password.confirmed' => 'Las contraseñas no coinciden',
                'password_confirmation.required' => 'El campo confirmar contraseña es obligatorio',
                'password_confirmation.same' => 'Las contraseñas no coinciden',
            ]);
        } else {
            if ($request->numIdentidad == $estudiante->numIdentidad) {
                $request->validate([
                    'nombre' => 'required',
                    'email' => ['required', 'unique:estudiantes'],
                    'estPromedio' => 'required|numeric|between:0,5.0',
                    'insCodigoNit' => 'required',
                    'numIdentidadPadre' => 'required',
                    'gruIdCurso' => 'required',
                    'password' => 'required',
                    'password_confirmation' => 'required|same:password',
                ], [
                    'nombre.required' => 'El campo nombre es obligatorio',
                    'email.required' => 'El campo correo electrónico es obligatorio',
                    'email.unique' => 'El correo electrónico ya existe',
                    'estPromedio.required' => 'El campo promedio es obligatorio',
                    'estPromedio.numeric' => 'El campo promedio debe ser numérico',
                    'estPromedio.between' => 'El campo promedio debe estar entre 0 y 5.0',
                    'insCodigoNit.required' => 'El campo código de institución es obligatorio',
                    'numIdentidadPadre.required' => 'El campo número de identidad del padre es obligatorio',
                    'gruIdCurso.required' => 'El campo código de curso es obligatorio',
                    'password.required' => 'El campo contraseña es obligatorio',
                    'password.min' => 'La contraseña debe tener al menos 8 caracteres',
                    'password.confirmed' => 'Las contraseñas no coinciden',
                    'password_confirmation.required' => 'El campo confirmar contraseña es obligatorio',
                    'password_confirmation.same' => 'Las contraseñas no coinciden',
                ]);
            } else {
                if ($request->email == $estudiante->email) {
                    $request->validate([
                        'nombre' => 'required',
                        'numIdentidad' => ['required', 'unique:estudiantes'],
                        'estPromedio' => 'required|numeric|between:0,5.0',
                        'insCodigoNit' => 'required',
                        'numIdentidadPadre' => 'required',
                        'gruIdCurso' => 'required',
                        'password' => 'required',
                        'password_confirmation' => 'required|same:password',
                    ], [
                        'nombre.required' => 'El campo nombre es obligatorio',
                        'numIdentidad.required' => 'El campo número de identidad es obligatorio',
                        'numIdentidad.unique' => 'El número de identidad ya existe',
                        'estPromedio.required' => 'El campo promedio es obligatorio',
                        'estPromedio.numeric' => 'El campo promedio debe ser numérico',
                        'estPromedio.between' => 'El campo promedio debe estar entre 0 y 5.0',
                        'insCodigoNit.required' => 'El campo código de institución es obligatorio',
                        'numIdentidadPadre.required' => 'El campo número de identidad del padre es obligatorio',
                        'gruIdCurso.required' => 'El campo código de curso es obligatorio',
                        'password.required' => 'El campo contraseña es obligatorio',
                        'password.min' => 'La contraseña debe tener al menos 8 caracteres',
                        'password.confirmed' => 'Las contraseñas no coinciden',
                        'password_confirmation.required' => 'El campo confirmar contraseña es obligatorio',
                        'password_confirmation.same' => 'Las contraseñas no coinciden',
                    ]);
                } else {
                    $request->validate([
                        'nombre' => 'required',
                        'numIdentidad' => ['required', 'unique:estudiantes'],
                        'email' => ['required', 'unique:estudiantes'],
                        'estPromedio' => 'required|numeric|between:0,5.0',
                        'insCodigoNit' => 'required',
                        'numIdentidadPadre' => 'required',
                        'gruIdCurso' => 'required',
                        'password' => 'required',
                        'password_confirmation' => 'required|same:password',
                    ], [
                        'nombre.required' => 'El campo nombre es obligatorio',
                        'numIdentidad.required' => 'El campo número de identidad es obligatorio',
                        'numIdentidad.unique' => 'El número de identidad ya existe',
                        'email.required' => 'El campo correo electrónico es obligatorio',
                        'email.unique' => 'El correo electrónico ya existe',
                        'estPromedio.required' => 'El campo promedio es obligatorio',
                        'estPromedio.numeric' => 'El campo promedio debe ser numérico',
                        'estPromedio.between' => 'El campo promedio debe estar entre 0 y 5.0',
                        'insCodigoNit.required' => 'El campo código de institución es obligatorio',
                        'numIdentidadPadre.required' => 'El campo número de identidad del padre es obligatorio',
                        'gruIdCurso.required' => 'El campo código de curso es obligatorio',
                        'password.required' => 'El campo contraseña es obligatorio',
                        'password.min' => 'La contraseña debe tener al menos 8 caracteres',
                        'password.confirmed' => 'Las contraseñas no coinciden',
                        'password_confirmation.required' => 'El campo confirmar contraseña es obligatorio',
                        'password_confirmation.same' => 'Las contraseñas no coinciden',
                    ]);
                }
            }
        }

        $estudiante = Estudiante::find($estudiante->id);

        $estudiante->nombre = $request->nombre;
        $estudiante->numIdentidad = $request->numIdentidad;
        $estudiante->email = $request->email;
        $estudiante->estPromedio = $request->estPromedio;
        $estudiante->insCodigoNit = $request->insCodigoNit;
        $estudiante->numIdentidadPadre = $request->numIdentidadPadre;
        $estudiante->gruIdCurso = $request->gruIdCurso;
        $estudiante->password = Hash::make($request->password);
        $estudiante->password_confirmation = Hash::make($request->password_confirmation);
        $save = $estudiante->save();
        if ($save) {
            return redirect()->route('estudiantes.index')->with('success', 'EL ESTUDIANTE ' . $estudiante->nombre . ' HA SIDO EDITADO CON ÉXITO.');
        } else {
            return redirect()->route('estudiantes.index')->with('fail', 'HA OCURRIDO UN ERROR EDITANDO EL ESTUDIANTE' . $estudiante->nombre . '.');
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $estudiante = Estudiante::find($id)->delete();

        return redirect()->route('estudiantes.index')
            ->with('success', 'ESTUDIANTE ELIMINADO CON ÉXITO');
    }
}
