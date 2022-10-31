<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;

/**
 * Class MateriaController
 * @package App\Http\Controllers
 */
class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $materias = Materia::where('matIdMateria','LIKE','%'.$busqueda.'%')
                    ->orWhere('matNombreMateria','LIKE','%'.$busqueda.'%')
                    ->orWhere('matDescripcion','LIKE','%'.$busqueda.'%')
                    ->latest('id')
                    ->paginate(10);

        return view('materia.index', compact('materias','busqueda'))
            ->with('i', (request()->input('page', 1) - 1) * $materias->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Esta funcion crea una nueva materia
    public function create()
    {
        $materia = new Materia();
        return view('materia.create', compact('materia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    //Esta funcion guarda la materia creada y aqui van las validaciones para los mensajes de error del formulario
    public function store(Request $request)
    {
        $request->validate([
            'matIdMateria' => ['required','unique:materias'],
            'matNombreMateria' => 'required',
            'matDescripcion' => 'required',
        ],[
            'matIdMateria.required' => 'El campo código de temática es obligatorio',
            'matIdMateria.unique' => 'El código de temática ya existe',
            'matNombreMateria.required' => 'El campo nombre de temática es obligatorio',
            'matDescripcion.required' => 'El campo descripción es obligatorio',
        ]);

        //request()->validate(Materia::$rules);

        $materia = Materia::create($request->all());

        return redirect()->route('materias.index')
            ->with('success', 'TEMATICA CREADA CON ÉXITO');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $materia = Materia::find($id);

        return view('materia.show', compact('materia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $materia = Materia::find($id);

        return view('materia.edit', compact('materia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Materia $materia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materia $materia)
    {
        //Esto se hizo porque cuando no se modificaba el codigo de la materia, daba error de que el codigo ya existe
        if($request->matIdMateria == $materia->matIdMateria){
            $request->validate([
                'matNombreMateria' => 'required',
                'matDescripcion' => 'required',
            ],[
                'matNombreMateria.required' => 'El campo nombre de temática es obligatorio',
                'matDescripcion.required' => 'El campo descripción es obligatorio',
            ]);

        }else{
            $request->validate([
                'matIdMateria' => ['required','unique:materias'],
                'matNombreMateria' => 'required',
                'matDescripcion' => 'required',
            ],[
                'matIdMateria.required' => 'El campo código de materia es obligatorio',
                'matIdMateria.unique' => 'El código de temática ya existe',
                'matNombreMateria.required' => 'El campo nombre de temática es obligatorio',
                'matDescripcion.required' => 'El campo descripción es obligatorio',
            ]);
        }

        request()->validate(Materia::$rules);

        $materia->update($request->all());

        return redirect()->route('materias.index')
            ->with('success', 'INFORMACIÓN DE LA TEMÁTICA ACTUALIZADA CON ÉXITO');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $materia = Materia::find($id)->delete();

        return redirect()->route('materias.index')
            ->with('success', 'TEMÁTICA ELIMINADA CON ÉXITO');
    }
}
