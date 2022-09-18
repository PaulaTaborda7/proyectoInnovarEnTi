<?php

namespace App\Http\Controllers;

use App\Models\Red;
use App\Models\File;
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
        $reds = Red::all();
        // return view('red.index', compact('reds'))
        //     ->with('i', (request()->input('page', 1) - 1) * $reds->perPage());
        // $reds = Red::all();
        return view('red.index',compact('reds'));
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
        $data = $request->validate([
            'redNombre' => 'required',
            'redIdRed' => ['required', 'unique:reds'],
            'redDescripcion' => 'required',
            'redTipoRecurso' => 'required',
            'idMateria' => 'required',
            'redUrl' => 'required',
        ], [
            'redNombre.required' => 'El campo nombre de recurso es obligatorio',
            'redIdRed.required' => 'El campo código de recurso es obligatorio',
            'redIdRed.unique' => 'El código de recurso ya existe',
            'redDescripcion.required' => 'El campo descripción de recurso es obligatorio',
            'redTipoRecurso.required' => 'El campo tipo de recurso es obligatorio',
            'idMateria.required' => 'El campo código de temática es obligatorio',
            'redUrl.required' => 'El campo URL de recurso es obligatorio',
        ]);
        $red = Red::create([
            'redNombre' => $request['redNombre'],
            'redIdRed' => $request['redIdRed'],
            'redDescripcion' => $request['redDescripcion'],
            'redTipoRecurso' => $request['redTipoRecurso'],
            'idMateria' => $request['idMateria'],
        ]);
        if($request->has('files')){
            $allowedfileExtension=['pdf','jpg','png','docx','css','js','html'];
            $files = $request->file('files');
            foreach($files as $file){
                $fileName = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check=in_array($extension,$allowedfileExtension);
                if($check){
                    $file->move(public_path('archivos/'.$red->redIdRed,),$fileName);
                    File::create([
                    'red_id'=>$red->id,
                    'file'=>$fileName
                    ]);
                }
            }
            return redirect()->route('reds.index')->with('success', 'RED creado con éxito');
        }
        else{
            return redirect()->route('reds.index')->with('fail', 'No se ha podido crear el RED');
        }
            // foreach($request->file('files')as $file){
            //     $fileName = $data['redNombre'].'.'.$file->extension();
            //     $file->move(public_path('archivos/'.$red->redIdRed,),$fileName);
            //     File::create([
            //         'red_id'=>$red->id,
            //         'file'=>$fileName
            //     ]);
            // }
        
        // $red = new Red();
        // $red->id = $request->id;
        // $red->redNombre = $request->redNombre;
        // $red->redIdRed = $request->redIdRed;
        // $red->redDescripcion = $request->redDescripcion;
        // $red->redTipoRecurso = $request->redTipoRecurso;
        // $red->idMateria = $request->idMateria;
        //$red = Red::create($data);

        // if($request->hasFile('files')){
        //     foreach($request->file('files')as $file){
        //         $archivo = $request->file('files')->getClientOriginalName();
        //         $red->files = $request->file('files')->storeAs('archivosred/'.$red->redIdRed, $archivo);
        //         $file->move(public_path('archivosred/'.$red->redIdRed), $archivo);

        //     }
        // }

        // $save = $red->save();
        // if($save){
        //     return redirect()->route('reds.index')->with('success', 'RED creado con éxito');
        // }else{
        //     return redirect()->route('reds.index')->with('fail', 'No se ha podido crear el RED');
        // }
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
        if($request->redIdRed == $red->redIdRed){
            $request->validate([
                'redNombre' => 'required',
                'redDescripcion' => 'required',
                'redTipoRecurso' => 'required',
                'idMateria' => 'required',
                //'redUrl' => 'required',
            ], [
                'redNombre.required' => 'El campo nombre de recurso es obligatorio',
                'redDescripcion.required' => 'El campo descripción de recurso es obligatorio',
                'redTipoRecurso.required' => 'El campo tipo de recurso es obligatorio',
                'idMateria.required' => 'El campo código de temática es obligatorio',
                //'redUrl.required' => 'El campo URL de recurso es obligatorio',
            ]);
        }else{
            $request->validate([
                'redNombre' => 'required',
                'redIdRed' => ['required', 'unique:reds'],
                'redDescripcion' => 'required',
                'redTipoRecurso' => 'required',
                'idMateria' => 'required',
                //'redUrl' => 'required',
            ], [
                'redNombre.required' => 'El campo nombre de recurso es obligatorio',
                'redIdRed.required' => 'El campo código de recurso es obligatorio',
                'redIdRed.unique' => 'El código de recurso ya existe',
                'redDescripcion.required' => 'El campo descripción de recurso es obligatorio',
                'redTipoRecurso.required' => 'El campo tipo de recurso es obligatorio',
                'idMateria.required' => 'El campo código de temática es obligatorio',
                //'redUrl.required' => 'El campo URL de recurso es obligatorio',
            ]);
        }


        request()->validate(Red::$rules);

        $red->update($request->all());

        return redirect()->route('reds.index')
            ->with('success', 'Información de RED actualizada con éxito');
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
            ->with('success', 'RED eliminado con éxito');
    }
}
