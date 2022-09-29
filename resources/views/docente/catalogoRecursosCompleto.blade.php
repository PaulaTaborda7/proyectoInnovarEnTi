@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-auto p-5 text-center">
        <h1><strong>Catálogo de Recursos Educativos Digitales : COMPLETO</strong> </h1>
    </div>
</div>
<div class="container" style="margin-top: 10px">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <hr>
            <div class="row">
                @foreach($recursos as $recurso)
                <div class="col-lg-3">
                    <div class="card" style="margin-bottom: 20px; height: auto;">
                        <br>
                        <strong class="text-center">{{$recurso->redNombre}}</strong>
                        <br>
                        <img src="{!! asset('archivos/$recurso->redIdRed/animal-1.png') !!}" class="card-img-top mx-auto" style="height: 150px; width: 150px;display: block;" alt="Imágen del RED: Diamante">
                        <div class="card-body">
                            <p class="card-text">{{$recurso->redDescripcion}}</p>
                        </div>
                        <div class="card-footer" class="justify-content-center">
                            <a class="btn btn-sm btn-success" href="#"><i class="fa fa-fw fa-edit"></i>Habilitar</a>
                            <a class="btn btn-danger btn-sm" href="#"><i class="fa fa-fw fa-trash"></i>Desahibilitar</a>
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
            <div  class="col-auto p-5 text-center">
                <a class="ml-4 text-sm btn btn-primary" href="/vistadocentes">Regresar</a>
            </div>
        </div>
    </div>
</div>
@endsection