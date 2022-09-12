<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('solodocente',['only'=> ['index']]);
    // }
    public function index(Request $request)
    {
        $busqueda = $request->busqueda;
        $docentes = Docente::where('documentoIdentidad','LIKE','%'.$busqueda.'%')
                    ->orWhere('documentoIdentidad','LIKE','%'.$busqueda.'%')
                    ->orWhere('email','LIKE','%'.$busqueda.'%')
                    ->orWhere('tipo','LIKE','%'.$busqueda.'%')
                    ->orWhere('docTipoContrato','LIKE','%'.$busqueda.'%')
                    ->orWhere('docAreaCurricular','LIKE','%'.$busqueda.'%')
                    ->orWhere('insCodigoNit','LIKE','%'.$busqueda.'%')
                    ->latest('id')
                    ->paginate(10);

        return view('docente.index', compact('docentes','busqueda'))
            ->with('i', (request()->input('page', 1) - 1) * $docentes->perPage());
    }

    public function index2(Request $request) {
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
        return view('docente.create', compact('docente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Docente::$rules);

        // $docente = Docente::create($request->all());
        Docente::create([
            'nombre' => $request['nombre'],
            'documentoIdentidad' => $request['documentoIdentidad'],
            'email' => $request['email'],
            'tipo' => '2',
            'password' => Hash::make($request['password']),
            'docTipoContrato' => $request['docTipoContrato'],
            'docAreaCurricular' => $request['docAreaCurricular'],
            'insCodigoNit' => $request['insCodigoNit'],
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

        return view('docente.edit', compact('docente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Docente $docente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Docente $docente)
    {
        // request()->validate(Docente::$rules);

        // $docente->update($request->all());

        // return redirect()->route('docentes.index')
        //     ->with('success', 'Información de docente actualizada con éxito');
        $validated = $request->validate([
            'nombre' => 'required',
            //'documentoIdentidad' => 'required',
            'email' => 'required',
            'password' => 'required',
            'docTipoContrato' => 'required',
            'docAreaCurricular' => 'required',
            'insCodigoNit' => 'required',
        ]);

        $docente = Docente::find($docente->id);

        $docente->nombre = $request->nombre;
        $docente->documentoIdentidad = $request->documentoIdentidad;
        $docente->email = $request->email;
        $docente->password = $request->password;
        $docente->docTipoContrato = $request->docTipoContrato;
        $docente->docAreaCurricular = $request->docAreaCurricular;
        $docente->insCodigoNit = $request->insCodigoNit;
        $save = $docente->save();
        if($save){
            return redirect()->route('docentes.index')->with('success', 'El docente '.$docente->nombre.' ha sido editado con éxito.');
        }else{
            return redirect()->route('docentes.index')->with('fail', 'Ha ocurrido un error editando el docente '.$docente->nombre.'.');
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
