<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use Illuminate\Http\Request;

/**
 * Class GrupoController
 * @package App\Http\Controllers
 */
class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $grupos = Grupo::where('gruIdGrupo','LIKE','%'.$busqueda.'%')
                    ->orWhere('gruNombre','LIKE','%'.$busqueda.'%')
                    ->orWhere('gruJornada','LIKE','%'.$busqueda.'%')
                    ->orWhere('gruCantEstudiante','LIKE','%'.$busqueda.'%')
                    ->orWhere('gruCantMateria','LIKE','%'.$busqueda.'%')
                    ->orWhere('insCodigoNit','LIKE','%'.$busqueda.'%')
                    ->orWhere('numIdentidadDocente','LIKE','%'.$busqueda.'%')
                    ->latest('id')
                    ->paginate(10);

        return view('grupo.index', compact('grupos', 'busqueda'))
            ->with('i', (request()->input('page', 1) - 1) * $grupos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grupo = new Grupo();
        return view('grupo.create', compact('grupo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Grupo::$rules);

        $grupo = Grupo::create($request->all());

        return redirect()->route('grupos.index')
            ->with('success', 'Grupo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grupo = Grupo::find($id);

        return view('grupo.show', compact('grupo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grupo = Grupo::find($id);

        return view('grupo.edit', compact('grupo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Grupo $grupo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grupo $grupo)
    {
        request()->validate(Grupo::$rules);

        $grupo->update($request->all());

        return redirect()->route('grupos.index')
            ->with('success', 'Grupo updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $grupo = Grupo::find($id)->delete();

        return redirect()->route('grupos.index')
            ->with('success', 'Grupo deleted successfully');
    }
}