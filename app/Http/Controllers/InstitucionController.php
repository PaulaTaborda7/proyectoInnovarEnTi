<?php

namespace App\Http\Controllers;

use App\Models\Institucion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class InstitucionController
 * @package App\Http\Controllers
 */
class InstitucionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $institucions = Institucion::where('insNombre', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('codigoNit', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('insDireccion', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('insDepartamento', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('insPais', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('insTelefono', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('insCalendario', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('insCantidadDocentes', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('insCantidadEstudiantes', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('tipoPaquete', 'LIKE', '%' . $busqueda . '%')
            ->latest('id')
            ->paginate(10);

        return view('institucion.index', compact('institucions', 'busqueda'))
            ->with('i', (request()->input('page', 1) - 1) * $institucions->perPage());
    }

    public function verDocentes($id){
        $todos = DB::select('select * from docentes where insCodigoNit = ?', [$id]);
        return view('consultaDocentes',compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $institucion = new Institucion();
        return view('institucion.create', compact('institucion'));
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
            'insNombre' => 'required',
            'codigoNit' => ['required', 'unique:institucions'],
            'insDireccion' => 'required',
            'insDepartamento' => 'required',
            'insPais' => 'required',
            'insTelefono' => 'required',
            'insCalendario' => 'required',
            'insCantidadDocentes' => 'required',
            'insCantidadEstudiantes' => 'required',
            'tipoPaquete' => 'required',
        ], [
            'insNombre.required' => 'El campo nombre de institución educativa es obligatorio',
            'codigoNit.required' => 'El campo código NIT de institución educativa es obligatorio',
            'codigoNit.unique' => 'El código NIT de institución educativa ya existe',
            'insDireccion.required' => 'El campo de dirección de institución educativa es obligatorio',
            'insDepartamento.required' => 'El campo departamento es obligatorio',
            'insPais.required' => 'El campo país es obligatorio',
            'insTelefono.required' => 'El campo teléfono es obligatorio',
            'insCalendario.required' => 'El campo tipo de calendario es obligatorio',
            'insCantidadDocentes.required' => 'El campo cantidad de docentes es obligatorio',
            'insCantidadEstudiantes.required' => 'El campo cantidad de estudiantes es obligatorio',
            'tipoPaquete.required' => 'El campo tipoPaquete es obligatorio',
        ]);

        request()->validate(Institucion::$rules);

        $institucion = Institucion::create($request->all());

        return redirect()->route('institucions.index')
            ->with('success', 'INSTITUCIÓN EDUCATIVA CREADA CON ÉXITO');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $institucion = Institucion::find($id);

        return view('institucion.show', compact('institucion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $institucion = Institucion::find($id);

        return view('institucion.edit', compact('institucion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Institucion $institucion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Institucion $institucion)
    {
        if ($request->codigoNit != $institucion->codigoNit) {
            $request->validate([
                'insNombre' => 'required',
                'codigoNit' => ['required', 'unique:institucions'],
                'insDireccion' => 'required',
                'insDepartamento' => 'required',
                'insPais' => 'required',
                'insTelefono' => 'required',
                'insCalendario' => 'required',
                'insCantidadDocentes' => 'required',
                'insCantidadEstudiantes' => 'required',
                'tipoPaquete' => 'required',
            ], [
                'insNombre.required' => 'El campo nombre de institución educativa es obligatorio',
                'codigoNit.required' => 'El campo código NIT de institución educativa es obligatorio',
                'codigoNit.unique' => 'El código NIT de institución educativa ya existe',
                'insDireccion.required' => 'El campo de dirección de institución educativa es obligatorio',
                'insDepartamento.required' => 'El campo departamento es obligatorio',
                'insPais.required' => 'El campo país es obligatorio',
                'insTelefono.required' => 'El campo teléfono es obligatorio',
                'insCalendario.required' => 'El campo tipo de calendario es obligatorio',
                'insCantidadDocentes.required' => 'El campo cantidad de docentes es obligatorio',
                'insCantidadEstudiantes.required' => 'El campo cantidad de estudiantes es obligatorio',
                'tipoPaquete.required' => 'El campo tipoPaquete es obligatorio',
            ]);
        }else{
            $request->validate([
                'insNombre' => 'required',
                'insDireccion' => 'required',
                'insDepartamento' => 'required',
                'insPais' => 'required',
                'insTelefono' => 'required',
                'insCalendario' => 'required',
                'insCantidadDocentes' => 'required',
                'insCantidadEstudiantes' => 'required',
                'tipoPaquete' => 'required',
            ], [
                'insNombre.required' => 'El campo nombre de institución educativa es obligatorio',
                'insDireccion.required' => 'El campo de dirección de institución educativa es obligatorio',
                'insDepartamento.required' => 'El campo departamento es obligatorio',
                'insPais.required' => 'El campo país es obligatorio',
                'insTelefono.required' => 'El campo teléfono es obligatorio',
                'insCalendario.required' => 'El campo tipo de calendario es obligatorio',
                'insCantidadDocentes.required' => 'El campo cantidad de docentes es obligatorio',
                'insCantidadEstudiantes.required' => 'El campo cantidad de estudiantes es obligatorio',
                'tipoPaquete.required' => 'El campo tipoPaquete es obligatorio',
            ]);
        }

        request()->validate(Institucion::$rules);

        $institucion->update($request->all());

        return redirect()->route('institucions.index')
            ->with('success', 'INFORMACIÓN DE LA INSTITUCIÓN EDUCATIVA ACTUALIZADA CON ÉXITO');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $institucion = Institucion::find($id)->delete();

        return redirect()->route('institucions.index')
            ->with('success', 'INSTITUCIÓN EDUCATIVA ELIMINADA CON ÉXITO');
    }
}
