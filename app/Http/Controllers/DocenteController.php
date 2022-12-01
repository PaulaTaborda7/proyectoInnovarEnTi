<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Models\Institucion;
use App\Models\Red;
use App\Models\Grupo;
use App\Models\Materia;

/**
 * Class DocenteController
 * @package App\Http\Controllers
 */
class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $docentes = Docente::where('nombre', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('documentoIdentidad', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('email', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('tipo', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('docTipoContrato', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('docAreaCurricular', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('insCodigoNit', 'LIKE', '%' . $busqueda . '%')
            ->orWhere('idGrupo', 'LIKE', '%' . $busqueda . '%')
            ->latest('id')
            ->paginate(10);

        return view('docente.index', compact('docentes', 'busqueda'))
            ->with('i', (request()->input('page', 1) - 1) * $docentes->perPage());
    }

    public function index2(Request $request)
    {
        return view('docente');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $docente = new Docente();

        $instituciones = DB::select('select codigoNit,insNombre from institucions');

        $grupos = DB::select('select gruIdGrupo,gruNombre from grupos');
        
        return view('docente.create', compact('docente', 'instituciones', 'grupos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function verCatalogoRecursos($id){
        $docente = Docente::where('documentoIdentidad', $id)->first();
        $codigoNit = $docente->insCodigoNit;
        $institucion = Institucion::where('codigoNit', '=', $codigoNit)->first();
        $tipoPaquete = $institucion->tipoPaquete;
        $recursos = Red::where('redTipoRecurso', '=', $tipoPaquete)->get();
        $todosRecursos = Red::all();

        $tematicas = Materia::all();

        $idGrupo = $docente->idGrupo;


        //El tipo de paquete es DEA
        if($tipoPaquete == '0'){
            return view('docente.catalogoRecursosDEA', compact('recursos','idGrupo','tematicas'));
        }else{
            return view('docente.catalogoRecursosCompleto', compact('todosRecursos','idGrupo','tematicas'));
        }
    }

    public function store(Request $request)
    {

        $request->validate([
            'nombre' => 'required',
            'documentoIdentidad' => ['required', 'unique:docentes'],
            'email' => ['required', 'unique:docentes'],
            'docTipoContrato' => 'required',
            'docAreaCurricular' => 'required',
            'insCodigoNit' => 'required',
            'idGrupo' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'same:password'],
        ], [
            'nombre.required' => 'El campo nombre es obligatorio',
            'documentoIdentidad.required' => 'El campo documento de identidad es obligatorio',
            'documentoIdentidad.unique' => 'El documento de identidad ya existe',
            'email.required' => 'El campo correo electrónico es obligatorio',
            'email.unique' => 'El correo electrónico ya existe',
            'docTipoContrato.required' => 'El campo tipo de contrato es obligatorio',
            'docAreaCurricular.required' => 'El campo área curricular es obligatorio',
            'insCodigoNit.required' => 'El campo código NIT es obligatorio',
            'idGrupo.required' => 'El campo grupo es obligatorio',
            'password.required' => 'El campo contraseña es obligatorio',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres',
            'password.confirmed' => 'Las contraseñas no coinciden',
            'password_confirmation.required' => 'El campo confirmar contraseña es obligatorio',
            'password_confirmation.same' => 'Las contraseñas no coinciden',
        ]);

        Docente::create([
            'nombre' => $request['nombre'],
            'documentoIdentidad' => $request['documentoIdentidad'],
            'email' => $request['email'],
            'tipo' => '2',
            'docTipoContrato' => $request['docTipoContrato'],
            'docAreaCurricular' => $request['docAreaCurricular'],
            'insCodigoNit' => $request['insCodigoNit'],
            'idGrupo' => $request['idGrupo'],
            'password' => Hash::make($request['password']),
            'password_confirmation' => Hash::make($request['password_confirmation']),
        ]);



        return redirect()->route('docentes.index')
            ->with('success', 'DOCENTE CREADO CON ÉXITO');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $docente = Docente::find($id);

        return view('docente.show', compact('docente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $docente = Docente::find($id);
        
        $instituciones = DB::select('select codigoNit,insNombre from institucions');

        $grupos = DB::select('select gruIdGrupo,gruNombre from grupos');

        return view('docente.edit', compact('docente', 'instituciones', 'grupos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Docente $docente
     * @return \Illuminate\Http\Response
     */
    //esta funcion es para actualizar los datos del docente
    public function update(Request $request, Docente $docente)
    {
        //estas validaciones son para actualizar los datos del docente 
        if (($request->documentoIdentidad == $docente->documentoIdentidad) && ($request->email == $docente->email)) {
            $request->validate([
                'nombre' => 'required',
                'docTipoContrato' => 'required',
                'docAreaCurricular' => 'required',
                'insCodigoNit' => 'required',
                'idGrupo' => 'required',
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'password_confirmation' => ['required', 'same:password'],
            ], [
                'nombre.required' => 'El campo nombre es obligatorio',
                'docTipoContrato.required' => 'El campo tipo de contrato es obligatorio',
                'docAreaCurricular.required' => 'El campo área curricular es obligatorio',
                'insCodigoNit.required' => 'El campo código NIT es obligatorio',
                'idGrupo.required' => 'El campo grupo es obligatorio',
                'password.required' => 'El campo contraseña es obligatorio',
                'password.min' => 'La contraseña debe tener al menos 8 caracteres',
                'password.confirmed' => 'Las contraseñas no coinciden',
                'password_confirmation.required' => 'El campo confirmar contraseña es obligatorio',
                'password_confirmation.same' => 'Las contraseñas no coinciden',
            ]);
        } else {
            if ($request->documentoIdentidad == $docente->documentoIdentidad) {
                $request->validate([
                    'nombre' => 'required',
                    'email' => ['required', 'unique:docentes'],
                    'docTipoContrato' => 'required',
                    'docAreaCurricular' => 'required',
                    'insCodigoNit' => 'required',
                    'idGrupo' => 'required',
                    'password' => ['required', 'string', 'min:8', 'confirmed'],
                    'password_confirmation' => ['required', 'same:password'],
                ], [
                    'nombre.required' => 'El campo nombre es obligatorio',
                    'email.required' => 'El campo correo electrónico es obligatorio',
                    'email.unique' => 'El correo electrónico ya existe',
                    'docTipoContrato.required' => 'El campo tipo de contrato es obligatorio',
                    'docAreaCurricular.required' => 'El campo área curricular es obligatorio',
                    'insCodigoNit.required' => 'El campo código NIT es obligatorio',
                    'idGrupo.required' => 'El campo grupo es obligatorio',
                    'password.required' => 'El campo contraseña es obligatorio',
                    'password.min' => 'La contraseña debe tener al menos 8 caracteres',
                    'password.confirmed' => 'Las contraseñas no coinciden',
                    'password_confirmation.required' => 'El campo confirmar contraseña es obligatorio',
                    'password_confirmation.same' => 'Las contraseñas no coinciden',
                ]);
            } else {
                if ($request->email == $docente->email) {
                    $request->validate([
                        'nombre' => 'required',
                        'documentoIdentidad' => ['required', 'unique:docentes'],
                        'docTipoContrato' => 'required',
                        'docAreaCurricular' => 'required',
                        'insCodigoNit' => 'required',
                        'idGrupo' => 'required',
                        'password' => ['required', 'string', 'min:8', 'confirmed'],
                        'password_confirmation' => ['required', 'same:password'],
                    ], [
                        'nombre.required' => 'El campo nombre es obligatorio',
                        'documentoIdentidad.required' => 'El campo documento de identidad es obligatorio',
                        'documentoIdentidad.unique' => 'El documento de identidad ya existe',
                        'docTipoContrato.required' => 'El campo tipo de contrato es obligatorio',
                        'docAreaCurricular.required' => 'El campo área curricular es obligatorio',
                        'insCodigoNit.required' => 'El campo código NIT es obligatorio',
                        'idGrupo.required' => 'El campo grupo es obligatorio',
                        'password.required' => 'El campo contraseña es obligatorio',
                        'password.min' => 'La contraseña debe tener al menos 8 caracteres',
                        'password.confirmed' => 'Las contraseñas no coinciden',
                        'password_confirmation.required' => 'El campo confirmar contraseña es obligatorio',
                        'password_confirmation.same' => 'Las contraseñas no coinciden',
                    ]);
                } else {
                    $request->validate([
                        'nombre' => 'required',
                        'documentoIdentidad' => ['required', 'unique:docentes'],
                        'email' => ['required', 'unique:docentes'],
                        'docTipoContrato' => 'required',
                        'docAreaCurricular' => 'required',
                        'insCodigoNit' => 'required',
                        'idGrupo' => 'required',
                        'password' => ['required', 'string', 'min:8', 'confirmed'],
                        'password_confirmation' => ['required', 'same:password'],
                    ], [
                        'nombre.required' => 'El campo nombre es obligatorio',
                        'documentoIdentidad.required' => 'El campo documento de identidad es obligatorio',
                        'documentoIdentidad.unique' => 'El documento de identidad ya existe',
                        'email.required' => 'El campo correo electrónico es obligatorio',
                        'email.unique' => 'El correo electrónico ya existe',
                        'docTipoContrato.required' => 'El campo tipo de contrato es obligatorio',
                        'docAreaCurricular.required' => 'El campo área curricular es obligatorio',
                        'insCodigoNit.required' => 'El campo código NIT es obligatorio',
                        'idGrupo.required' => 'El campo grupo es obligatorio',
                        'password.required' => 'El campo contraseña es obligatorio',
                        'password.min' => 'La contraseña debe tener al menos 8 caracteres',
                        'password.confirmed' => 'Las contraseñas no coinciden',
                        'password_confirmation.required' => 'El campo confirmar contraseña es obligatorio',
                        'password_confirmation.same' => 'Las contraseñas no coinciden',
                    ]);
                }
            }
        }

        $docente = Docente::find($docente->id);

        $docente->nombre = $request->nombre;
        $docente->documentoIdentidad = $request->documentoIdentidad;
        $docente->email = $request->email;
        $docente->docTipoContrato = $request->docTipoContrato;
        $docente->docAreaCurricular = $request->docAreaCurricular;
        $docente->insCodigoNit = $request->insCodigoNit;
        $docente->idGrupo = $request->idGrupo;
        $docente->password = Hash::make($request->password);
        $docente->password_confirmation = Hash::make($request->password_confirmation);
        $save = $docente->save();
        if ($save) {
            return redirect()->route('docentes.index')->with('success', 'EL DOCENTE ' . $docente->nombre . ' HA SIDO EDITADO CON ÉXITO.');
        } else {
            return redirect()->route('docentes.index')->with('fail', 'HA OCURRIDO UN ERROR EDITANDO EL DOCENTE' . $docente->nombre . '.');
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {

        $docente = Docente::find($id)->delete();

        return redirect()->route('docentes.index')
            ->with('success', 'DOCENTE ELIMINADO CON ÉXITO');
    }
}
