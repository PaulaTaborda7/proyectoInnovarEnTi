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
        $estudiantes = Estudiante::where('nombre', 'like', "%$busqueda%")
            ->orWhere('numIdentidad', 'like', "%$busqueda%")
            ->orWhere('email', 'like', "%$busqueda%")
            ->orWhere('tipo', 'like', "%$busqueda%")
            ->orWhere('estPromedio', 'like', "%$busqueda%")
            ->orWhere('insCodigoNit', 'like', "%$busqueda%")
            ->orWhere('numIdentidadPadre', 'like', "%$busqueda%")
            ->orWhere('gruIdCurso', 'like', "%$busqueda%")
            ->orWhere('observacion', 'like', "%$busqueda%")
            ->latest('id')
            ->paginate(5);

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
        $request->validate(
            [
                'nombre' => 'required',
                'numIdentidad' => ['required', 'unique:estudiantes'],
                'email' => ['required', 'unique:estudiantes'],
                'estPromedio' => ['required', 'numeric', 'min:0', 'max:5'],
                'insCodigoNit' => 'required',
                'numIdentidadPadre' => 'required',
                'gruIdCurso' => 'required',
                'observacion' => 'required',
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'password_confirmation' => ['required', 'same:password'],
            ],
            [
                'nombre.required' => 'El campo nombre es obligatorio',
                'numIdentidad.required' => 'El campo número de identidad es obligatorio',
                'numIdentidad.unique' => 'El número de identidad ya existe',
                'email.required' => 'El campo email es obligatorio',
                'email.unique' => 'El email ya existe',
                'estPromedio.required' => 'El campo promedio es obligatorio',
                'estPromedio.numeric' => 'El campo promedio debe ser numérico',
                'estPromedio.min' => 'El promedio debe ser mayor o igual a 0',
                'estPromedio.max' => 'El promedio debe ser menor o igual a 5',
                'insCodigoNit.required' => 'El campo código de la institución es obligatorio',
                'numIdentidadPadre.required' => 'El campo número de identidad del padre es obligatorio',
                'gruIdCurso.required' => 'El campo código del curso es obligatorio',
                'observacion.required' => 'El campo observación es obligatorio',
                'password.required' => 'El campo contraseña es obligatorio',
                'password.min' => 'La contraseña debe tener al menos 8 caracteres',
                'password.confirmed' => 'Las contraseñas no coinciden',
                'password_confirmation.required' => 'El campo confirmar contraseña es obligatorio',
                'password_confirmation.same' => 'Las contraseñas no coinciden',
            ]
        );

        Estudiante::create([
            'nombre' => $request->nombre,
            'numIdentidad' => $request->numIdentidad,
            'email' => $request->email,
            'tipo' => '3',
            'estPromedio' => $request->estPromedio,
            'insCodigoNit' => $request->insCodigoNit,
            'numIdentidadPadre' => $request->numIdentidadPadre,
            'gruIdCurso' => $request->gruIdCurso,
            'observacion' => $request->observacion,
            'password' => Hash::make($request->password),
            'password_confirmation' => Hash::make($request->password_confirmation),
        ]);

        return redirect()->route('estudiantes.index')
            ->with('success', 'Estudiante creado con éxito.');
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
                'estPromedio' => 'required',
                'insCodigoNit' => 'required',
                'numIdentidadPadre' => 'required',
                'gruIdCurso' => 'required',
                'observacion' => 'required',
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'password_confirmation' => ['required', 'same:password'],
            ], [
                'nombre.required' => 'El campo nombre es obligatorio',
                'estPromedio.required' => 'El campo promedio es obligatorio',
                'insCodigoNit.required' => 'El campo código de la institución es obligatorio',
                'numIdentidadPadre.required' => 'El campo número de identidad del padre es obligatorio',
                'gruIdCurso.required' => 'El campo código del curso es obligatorio',
                'observacion.required' => 'El campo observación es obligatorio',
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
                    'estPromedio' => 'required',
                    'insCodigoNit' => 'required',
                    'numIdentidadPadre' => 'required',
                    'gruIdCurso' => 'required',
                    'observacion' => 'required',
                    'password' => ['required', 'string', 'min:8', 'confirmed'],
                    'password_confirmation' => ['required', 'same:password'],
                ], [
                    'nombre.required' => 'El campo nombre es obligatorio',
                    'email.required' => 'El campo email es obligatorio',
                    'email.unique' => 'El email ya existe',
                    'estPromedio.required' => 'El campo promedio es obligatorio',
                    'insCodigoNit.required' => 'El campo código de la institución es obligatorio',
                    'numIdentidadPadre.required' => 'El campo número de identidad del padre es obligatorio',
                    'gruIdCurso.required' => 'El campo código del curso es obligatorio',
                    'observacion.required' => 'El campo observación es obligatorio',
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
                        'estPromedio' => 'required',
                        'insCodigoNit' => 'required',
                        'numIdentidadPadre' => 'required',
                        'gruIdCurso' => 'required',
                        'observacion' => 'required',
                        'password' => ['required', 'string', 'min:8', 'confirmed'],
                        'password_confirmation' => ['required', 'same:password'],
                    ], [
                        'nombre.required' => 'El campo nombre es obligatorio',
                        'numIdentidad.required' => 'El campo número de identidad es obligatorio',
                        'numIdentidad.unique' => 'El número de identidad ya existe',
                        'estPromedio.required' => 'El campo promedio es obligatorio',
                        'insCodigoNit.required' => 'El campo código de la institución es obligatorio',
                        'numIdentidadPadre.required' => 'El campo número de identidad del padre es obligatorio',
                        'gruIdCurso.required' => 'El campo código del curso es obligatorio',
                        'observacion.required' => 'El campo observación es obligatorio',
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
                        'estPromedio' => 'required',
                        'insCodigoNit' => 'required',
                        'numIdentidadPadre' => 'required',
                        'gruIdCurso' => 'required',
                        'observacion' => 'required',
                        'password' => ['required', 'string', 'min:8', 'confirmed'],
                        'password_confirmation' => ['required', 'same:password'],
                    ], [
                        'nombre.required' => 'El campo nombre es obligatorio',
                        'numIdentidad.required' => 'El campo número de identidad es obligatorio',
                        'numIdentidad.unique' => 'El número de identidad ya existe',
                        'email.required' => 'El campo email es obligatorio',
                        'email.unique' => 'El email ya existe',
                        'estPromedio.required' => 'El campo promedio es obligatorio',
                        'insCodigoNit.required' => 'El campo código de la institución es obligatorio',
                        'numIdentidadPadre.required' => 'El campo número de identidad del padre es obligatorio',
                        'gruIdCurso.required' => 'El campo código del curso es obligatorio',
                        'observacion.required' => 'El campo observación es obligatorio',
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
        $estudiante->observacion = $request->observacion;
        $estudiante->password = Hash::make($request->password);
        $estudiante->password_confirmation = Hash::make($request->password_confirmation);
        $save = $estudiante->save();
        if ($save) {
            return redirect()->route('estudiantes.index')->with('success', 'El estudiante ' . $estudiante->nombre . ' ha sido editado con éxito.');
        } else {
            return redirect()->route('estudiantes.index')->with('fail', 'Ha ocurrido un error editando al estudiante ' . $estudiante->nombre . '.');
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
            ->with('success', 'Estudiante eliminado con éxito.');
    }
}
