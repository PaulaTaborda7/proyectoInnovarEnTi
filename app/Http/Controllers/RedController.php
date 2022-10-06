<?php

namespace App\Http\Controllers;

use App\Models\Red;
use App\Models\Red_grupo;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        return view('red.index',compact('reds'));
    }


    public function habilitarRecurso($idRed, $idGrupo, $bandera)
    {
        $bandera = 1;
        $verifica = DB::select('select * from red_grupo where red_id = ? and grupo_id = ? and habilitado = 1', [$idRed, $idGrupo]);

        if($verifica != null){
            return back()->with('bandera',$bandera);
        }
        else{
            $bandera = 0;
            $red = new Red_grupo();
            $red->habilitado = 1;
            $red->redIdRed = $idRed;
            $red->gruIdGrupo = $idGrupo;
            $red->save();
            return back()->with('bandera',$bandera);
        }
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
        $red = Red::create([
            'redNombre' => $request['redNombre'],
            'redIdRed' => $request['redIdRed'],
            'redDescripcion' => $request['redDescripcion'],
            'redTipoRecurso' => $request['redTipoRecurso'],
            'idMateria' => $request['idMateria'],
        ]);
        if($request->has('files')){
            $allowedfileExtension=['pdf','jpg','png','docx','css','js','html','txt','mp3','mp4'];
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
        }else {
            return redirect()->route('reds.index')->with('fail', 'No se ha podido crear el RED');
        }
    }

    public function files($id){
        $red = Red::find($id);
        $redIdRed = $red->redIdRed;
        return view('pruebared',compact('redIdRed'));
    }

    public function filesDocente($id){
        $red = Red::find($id);
        $redIdRed = $red->redIdRed;
        return view('docente.pruebaredDocente',compact('redIdRed'));
    }

    public function filesEstudiante($id){
        $red = Red::find($id);
        $redIdRed = $red->redIdRed;
        return view('estudiante.pruebaredEstudiante',compact('redIdRed'));
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
            ], [
                'redNombre.required' => 'El campo nombre de recurso es obligatorio',
                'redDescripcion.required' => 'El campo descripción de recurso es obligatorio',
                'redTipoRecurso.required' => 'El campo tipo de recurso es obligatorio',
                'idMateria.required' => 'El campo código de temática es obligatorio',
            ]);
        }else{
            $request->validate([
                'redNombre' => 'required',
                'redIdRed' => ['required', 'unique:reds'],
                'redDescripcion' => 'required',
                'redTipoRecurso' => 'required',
                'idMateria' => 'required',
            ], [
                'redNombre.required' => 'El campo nombre de recurso es obligatorio',
                'redIdRed.required' => 'El campo código de recurso es obligatorio',
                'redIdRed.unique' => 'El código de recurso ya existe',
                'redDescripcion.required' => 'El campo descripción de recurso es obligatorio',
                'redTipoRecurso.required' => 'El campo tipo de recurso es obligatorio',
                'idMateria.required' => 'El campo código de temática es obligatorio',
            ]);
        }
        if($request->has('files')){
            $allowedfileExtension=['pdf','jpg','png','docx','css','js','html','txt','mp3','mp4'];
            $files = $request->file('files');
            foreach($files as $file){
                $fileName = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check=in_array($extension,$allowedfileExtension);
                if($check){
                    $file->move(public_path('archivos/'.$red->redIdRed,),$fileName);
                    File::find($red->redIdRed)->update([
                        'file'=>$fileName
                    ]);
                }
            }
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
