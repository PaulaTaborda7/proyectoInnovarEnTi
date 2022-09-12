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
        $estudiantes = Estudiante::where('numIdentidad','LIKE','%'.$busqueda.'%')
                    ->orWhere('nombre','LIKE','%'.$busqueda.'%')
                    ->orWhere('email','LIKE','%'.$busqueda.'%')
                    ->orWhere('tipo','LIKE','%'.$busqueda.'%')
                    ->orWhere('estPromedio','LIKE','%'.$busqueda.'%')
                    ->orWhere('insCodigoNit','LIKE','%'.$busqueda.'%')
                    ->orWhere('numIdentidadPadre','LIKE','%'.$busqueda.'%')
                    ->orWhere('gruIdCurso','LIKE','%'.$busqueda.'%')
                    ->latest('id')
                    ->paginate(10);

        return view('estudiante.index', compact('estudiantes','busqueda'))
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
        request()->validate(Estudiante::$rules);

        // $docente = Docente::create($request->all());
        Estudiante::create([
            'numIdentidad' => $request['numIdentidad'],
            'nombre' => $request['nombre'],
            'email' => $request['email'],
            'tipo' => '3',
            'password' => Hash::make($request['password']),
            'estPromedio' => $request['estPromedio'],
            'insCodigoNit' => $request['insCodigoNit'],
            'numIdentidadPadre' => $request['numIdentidadPadre'],
            'gruIdCurso' => $request['gruIdCurso'],
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
        //request()->validate(Estudiante::$rules);
        $validated = $request->validate([
            'nombre' => 'required',
            //'documentoIdentidad' => 'required',
            'email' => 'required',
            'password' => 'required',
            'estPromedio' => 'required',
            'insCodigoNit' => 'required',
            'numIdentidadPadre' => 'required',
            'gruIdCurso' => 'required',
        ]);

        $estudiante->update($request->all());

        return redirect()->route('estudiantes.index')
            ->with('success', 'INFORMACIÓN DEL ESTUDIANTE ACTUALIZADA CON ÉXITO');
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
