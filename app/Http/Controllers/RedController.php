<?php

namespace App\Http\Controllers;

use App\Models\Red;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Class RedController
 * @package App\Http\Controllers
 */
class RedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reds = Red::paginate();

        return view('red.index', compact('reds'))
            ->with('i', (request()->input('page', 1) - 1) * $reds->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $red = new Red();
        return view('red.create', compact('red'));
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
            'redNombre' => 'required',
            'redIdRed' => ['required', 'unique:reds'],
            'redDescripcion' => 'required',
            'redTipoRecurso' => 'required',
            'idMateria' => 'required',
        ], [
            // 'nombre.required' => 'El campo nombre es obligatorio',
            // 'documentoIdentidad.required' => 'El campo documento de identidad es obligatorio',
            // 'documentoIdentidad.unique' => 'El documento de identidad ya existe',
            // 'email.required' => 'El campo correo electrónico es obligatorio',
            // 'email.unique' => 'El correo electrónico ya existe',
            // 'docTipoContrato.required' => 'El campo tipo de contrato es obligatorio',
            // 'docAreaCurricular.required' => 'El campo área curricular es obligatorio',
            // 'insCodigoNit.required' => 'El campo código NIT es obligatorio',
            // 'password.required' => 'El campo contraseña es obligatorio',
            // 'password.min' => 'La contraseña debe tener al menos 8 caracteres',
            // 'password.confirmed' => 'Las contraseñas no coinciden',
            // 'password_confirmation.required' => 'El campo confirmar contraseña es obligatorio',
            // 'password_confirmation.same' => 'Las contraseñas no coinciden',
        ]);
        // $red = Red::create([
        //     'redNombre' => $request['redNombre'],
        //     'redIdRed' => $request['redIdRed'],
        //     'redDescripcion' => $request['redDescripcion'],
        //     'redTipoRecurso' => $request['redTipoRecurso'],
        //     'idMateria' => $request['idMateria'],
        // ]);
        $red = new Red();
        $red->id = $request->id;
        $red->redNombre = $request->redNombre;
        $red->redIdRed = $request->redIdRed;
        $red->redDescripcion = $request->redDescripcion;
        $red->redTipoRecurso = $request->redTipoRecurso;
        $red->idMateria = $request->idMateria;
        if($request->hasFile('redUrl')){
            $archivo = $request->file('redUrl')->getClientOriginalName();
            $red->redUrl = $request->file('redUrl')
                ->storeAs('archivosred/'.$red->redIdRed, $archivo);
        }
        $save = $red->save();
        if($save){
            return redirect()->route('reds.index')->with('success', 'RED creado con éxito');
        }else{
            return redirect()->route('reds.index')->with('fail', 'No se ha podido crear el RED');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $red = Red::find($id);

        return view('red.show', compact('red'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $red = Red::find($id);

        return view('red.edit', compact('red'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Red $red
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Red $red)
    {
        request()->validate(Red::$rules);

        $red->update($request->all());

        return redirect()->route('reds.index')
            ->with('success', 'Red updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $red = Red::find($id)->delete();

        return redirect()->route('reds.index')
            ->with('success', 'Red deleted successfully');
    }
}
