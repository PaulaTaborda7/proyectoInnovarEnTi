@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-auto p-5 text-center">
        <h1><strong>Catálogo de Recursos Educativos Digitales : DEA</strong> </h1>
    </div>
</div>
<div class="container" style="margin-top: 10px">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <hr>
            <div class="row">
                @foreach($recursos as $recurso)
                <div class="col-lg-3">
                    <div class="card text-center" style="margin-bottom: 20px; height: auto;">
                        <br>
                        <strong class="text-center">{{$recurso->redNombre}}</strong>
                        <br>
                        <img src="{!! asset('') !!}" class="card-img-top mx-auto" style="height: 150px; width: 150px;display: block;" alt="Imágen del RED">
                        <div class="card-body">
                            <p class="card-text"><strong>Descripción: </strong>{{$recurso->redDescripcion}}</p>
                            <p class="card-text"><strong>Temática a la que está asociado: </strong>{{$recurso->idMateria}}</p>
                        </div>
                        <div class="card-footer" class="justify-content-center">
                            <div>
                                <a class="btn btn-sm btn-info" href="{{ route('recurso.educativo.digital.Docente',$recurso->id) }}"><i class="fa fa-eye"></i> Probar RED</a>
                            </div>
                            <br>
                            <div>
                                <a class="btn btn-sm btn-success" href="#"><i class="fa fa-fw fa-edit"></i>Habilitar</a>
                                <a class="btn btn-danger btn-sm" href="#"><i class="fa fa-fw fa-trash"></i>Desahibilitar</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="container" style="margin-top: 10px">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <hr>
            <div class="col-auto p-5 text-center">
                <a class="ml-4 text-sm btn btn-primary" href="/vistadocentes">Regresar</a>
            </div>
        </div>
    </div>
</div>
@endsection