<?php

namespace App\Http\Controllers;

use App\Models\Institucion;
use App\Models\Country;
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
            ->orWhere('insCiudad', 'LIKE', '%' . $busqueda . '%')
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
        $countries = Country::all();

        $institucion = new Institucion();
        return view('institucion.create', compact('institucion', 'countries'));
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
            'insCiudad' => 'required',
            'insTelefono' => 'required',
            'insCalendario' => 'required',
            'insCantidadDocentes' => 'required',
            'insCantidadEstudiantes' => 'required',
            'tipoPaquete' => 'required',
        ], [
            'insNombre.required' => 'El campo nombre de instituci??n educativa es obligatorio',
            'codigoNit.required' => 'El campo c??digo NIT de instituci??n educativa es obligatorio',
            'codigoNit.unique' => 'El c??digo NIT de instituci??n educativa ya existe',
            'insDireccion.required' => 'El campo de direcci??n de instituci??n educativa es obligatorio',
            'insDepartamento.required' => 'El campo departamento es obligatorio',
            'insPais.required' => 'El campo pa??s es obligatorio',
            'insCiudad.required' => 'El campo ciudad es obligatorio',
            'insTelefono.required' => 'El campo tel??fono es obligatorio',
            'insCalendario.required' => 'El campo tipo de calendario es obligatorio',
            'insCantidadDocentes.required' => 'El campo cantidad de docentes es obligatorio',
            'insCantidadEstudiantes.required' => 'El campo cantidad de estudiantes es obligatorio',
            'tipoPaquete.required' => 'El campo tipo de paquete es obligatorio',
        ]);

        request()->validate(Institucion::$rules);

        $institucion = Institucion::create($request->all());

        return redirect()->route('institucions.index')
            ->with('success', 'INSTITUCI??N EDUCATIVA CREADA CON ??XITO');
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
        $countries = Country::all();
        $institucion = Institucion::find($id);

        return view('institucion.edit', compact('institucion', 'countries'));
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
                'insCiudad' => 'required',
                'insTelefono' => 'required',
                'insCalendario' => 'required',
                'insCantidadDocentes' => 'required',
                'insCantidadEstudiantes' => 'required',
                'tipoPaquete' => 'required',
            ], [
                'insNombre.required' => 'El campo nombre de instituci??n educativa es obligatorio',
                'codigoNit.required' => 'El campo c??digo NIT de instituci??n educativa es obligatorio',
                'codigoNit.unique' => 'El c??digo NIT de instituci??n educativa ya existe',
                'insDireccion.required' => 'El campo de direcci??n de instituci??n educativa es obligatorio',
                'insDepartamento.required' => 'El campo departamento es obligatorio',
                'insPais.required' => 'El campo pa??s es obligatorio',
                'insCiudad.required' => 'El campo ciudad es obligatorio',
                'insTelefono.required' => 'El campo tel??fono es obligatorio',
                'insCalendario.required' => 'El campo tipo de calendario es obligatorio',
                'insCantidadDocentes.required' => 'El campo cantidad de docentes es obligatorio',
                'insCantidadEstudiantes.required' => 'El campo cantidad de estudiantes es obligatorio',
                'tipoPaquete.required' => 'El campo tipo de paquete es obligatorio',
            ]);
        }else{
            $request->validate([
                'insNombre' => 'required',
                'insDireccion' => 'required',
                'insDepartamento' => 'required',
                'insPais' => 'required',
                'insCiudad' => 'required',
                'insTelefono' => 'required',
                'insCalendario' => 'required',
                'insCantidadDocentes' => 'required',
                'insCantidadEstudiantes' => 'required',
                'tipoPaquete' => 'required',
            ], [
                'insNombre.required' => 'El campo nombre de instituci??n educativa es obligatorio',
                'insDireccion.required' => 'El campo de direcci??n de instituci??n educativa es obligatorio',
                'insDepartamento.required' => 'El campo departamento es obligatorio',
                'insPais.required' => 'El campo pa??s es obligatorio',
                'insCiudad.required' => 'El campo ciudad es obligatorio',
                'insTelefono.required' => 'El campo tel??fono es obligatorio',
                'insCalendario.required' => 'El campo tipo de calendario es obligatorio',
                'insCantidadDocentes.required' => 'El campo cantidad de docentes es obligatorio',
                'insCantidadEstudiantes.required' => 'El campo cantidad de estudiantes es obligatorio',
                'tipoPaquete.required' => 'El campo tipoPaquete es obligatorio',
            ]);
        }

        request()->validate(Institucion::$rules);

        $institucion->update($request->all());

        return redirect()->route('institucions.index')
            ->with('success', 'INFORMACI??N DE LA INSTITUCI??N EDUCATIVA ACTUALIZADA CON ??XITO');
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
            ->with('success', 'INSTITUCI??N EDUCATIVA ELIMINADA CON ??XITO');
    }
}
