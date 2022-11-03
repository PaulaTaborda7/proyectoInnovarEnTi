<?php

namespace App\Http\Controllers;

use App\Models\Red;
use App\Models\Red_grupo;
use App\Models\File;
use App\Models\Materia;
use App\Models\Docente;
use App\Models\Institucion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


use App\Http\Controllers\Session;

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
        return view('red.index', compact('reds'));
    }


    public function habilitarRecurso($idRed, $idGrupo, $bandera1, $bandera2)
    {
        //Esta función se da después de habilitar un recurso
        $bandera1 = '0';
        $bandera2 = '1';
        $verifica = DB::select('select * from red_grupos where redIdRed = ? and gruIdGrupo = ? and habilitado = 1', [$idRed, $idGrupo]);
        if ($verifica != null) {
            return view('docente.catalogoRecursosDEA', compact('idGrupo', 'bandera1', 'bandera2'));
        } else {
            $red = new Red_grupo();
            $red->habilitado = 1;
            $red->redIdRed = $idRed;
            $red->gruIdGrupo = $idGrupo;
            $red->save();
            return view('docente.catalogoRecursosDEA', compact('idGrupo', 'bandera1', 'bandera2'));
        }
    }

    public function deshabilitarRecurso($idRed, $idGrupo, $bandera1, $bandera2)
    {
        $bandera1 = '1';
        $bandera2 = '0';
        $verifica = Red_grupo::where('redIdRed', '=', $idRed)->where('gruIdGrupo', '=', $idGrupo)->where('habilitado', '=', '0')->get();
        if ($verifica != null) {
            return redirect()->back()->with(compact('bandera1', 'bandera2'));
        } else {
            $verifica->habilitado = 0;
            return redirect()->back()->with(compact('bandera1, bandera2'));
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

        $tematicas = DB::select('select * from materias');

        return view('red.create', compact('red', 'tematicas'));
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
            'redNombre.required' => 'El campo nombre de recurso es obligatorio',
            'redIdRed.required' => 'El campo código de recurso es obligatorio',
            'redIdRed.unique' => 'El código de recurso ya existe',
            'redDescripcion.required' => 'El campo descripción de recurso es obligatorio',
            'redTipoRecurso.required' => 'El campo tipo de recurso es obligatorio',
            'idMateria.required' => 'El campo código de temática es obligatorio',
        ]);

        $red = Red::create([
            'redNombre' => $request['redNombre'],
            'redIdRed' => $request['redIdRed'],
            'redDescripcion' => $request['redDescripcion'],
            'redTipoRecurso' => $request['redTipoRecurso'],
            'idMateria' => $request['idMateria'],
            'imagen' => $request['imagen'],
        ]);
        if ($request->has('files')) {
            $allowedfileExtension = ['pdf', 'jpg', 'png', 'docx', 'css', 'js', 'html', 'txt', 'mp3', 'mp4'];
            $files = $request->file('files');
            foreach ($files as $file) {
                $fileName = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
                if ($check) {
                    $file->move(public_path('archivos/' . $red->redIdRed,), $fileName);
                    File::create([
                        'red_id' => $red->id,
                        'file' => $fileName
                    ]);
                }
            }
        }
        if ($request->hasFile('imagen')) {
            $red->imagen = $request->file('imagen')->store('uploads', 'public');
            //$red->imagen->move(public_path('public/storage'.$red->imagen,));
        }
        $red->save();
        return redirect()->route('reds.index')->with('success', 'RED creado con éxito');
    }

    public function files($id)
    {
        $red = Red::find($id);
        $redIdRed = $red->redIdRed;
        return view('pruebared', compact('redIdRed'));
    }

    public function filesDocente($id)
    {
        $red = Red::find($id);
        $redIdRed = $red->redIdRed;
        return view('docente.pruebaredDocente', compact('redIdRed'));
    }

    public function filesEstudiante($id)
    {
        $red = Red::find($id);
        $redIdRed = $red->redIdRed;
        return view('estudiante.pruebaredEstudiante', compact('redIdRed'));
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

        $tematicas = DB::select('select * from materias');

        return view('red.edit', compact('red', 'tematicas'));
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

        if ($request->redIdRed == $red->redIdRed) {
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
        } else {
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
        // // if($request->has('files')){
        // //     $allowedfileExtension=['pdf','jpg','png','docx','css','js','html','txt','mp3','mp4'];
        // //     $files = $request->file('files');
        // //     foreach($files as $file){
        // //         $fileName = $file->getClientOriginalName();
        // //         $extension = $file->getClientOriginalExtension();
        // //         $check=in_array($extension,$allowedfileExtension);
        // //         if($check){
        // //             $file->move(public_path('archivos/'.$red->redIdRed,),$fileName);
        // //             File::find($red->redIdRed)->update([
        // //                 'file'=>$fileName
        // //             ]);
        // //         }
        // //     }
        // // }
        // request()->validate(Red::$rules);
        // // $red->update($request->all());

        //
        //$red = Red::where('id', $red->redIdRed);

        $id = $red->redIdRed;

        $red->update([
            'redNombre' => $request['redNombre'],
            'redIdRed' => $request['redIdRed'],
            'redDescripcion' => $request['redDescripcion'],
            'redTipoRecurso' => $request['redTipoRecurso'],
            'idMateria' => $request['idMateria'],
        ]);

        // Si en el formulario se adjuntó una NUEVA foto...
        if ($request->hasFile('imagen')) {
            //Borramos de la carpeta public aquella imagen que tenga la misma ruta que $empleado->foto
            Storage::delete('public/' . $red->imagen);
            //Suba la NUEVA foto a la carpeta uploads en public y en el JSON guarde la dirección de la foto
            $red->imagen = $request->file('imagen')->store('uploads', 'public');
        }
        $red->save();
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
