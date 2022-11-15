@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-auto p-5 text-center">
            <h1><strong>Catálogo de Recursos Educativos Digitales: COMPLETO</strong> </h1>
        </div>
    </div>
    <div class="container" style="margin-top: 10px">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <hr>
                <div class="row">
                    @foreach ($todosRecursos as $recurso)
                        <div class="col-lg-3">
                            <div class="card text-center" style="margin-bottom: 20px; height: auto;">
                                <br>
                                <strong class="text-center">{{ $recurso->redNombre }}</strong>
                                <br>
                                <div style="height: 300px; width: 100%">
                                    <img id="imagen" src="{{ asset('storage') . '/' . $recurso->imagen }}"
                                        style="height: auto; width: 100px;display: block;" alt="Imágen del RED"
                                        class="card-img-top mx-auto" />
                                    <div class="card-body">
                                        <p class="card-text"><strong>Descripción: </strong>{{ $recurso->redDescripcion }}</p>
                                        <p class="card-text"><strong>Temática a la que está asociado:
                                            </strong>{{ $recurso->idMateria }}</p>
                                    </div>
                                </div>
                                <div class="card-footer" class="justify-content-center">
                                    <div>
                                        <a class="btn btn-sm btn-info"
                                            href="{{ route('recurso.educativo.digital.Docente', $recurso->id) }}"><i
                                                class="fa fa-eye"></i> Probar RED</a>
                                    </div>
                                    <br>
                                    <div>
                                        <a class="btn btn-sm btn-success" href=" {{ route('habilitar.recurso.educativo.digital', ['idRed' => $recurso->redIdRed, 'idGrupo' => $idGrupo, Session::get('documentoIdentidadDocente')]) }}"><i class="fa fa-fw fa-edit"></i>Habilitar</a>
                                        <a class="btn btn-danger btn-sm" href="{{ route('deshabilitar.recurso.educativo.digital', ['idRed' => $recurso->redIdRed, 'idGrupo' => $idGrupo, Session::get('documentoIdentidadDocente')]) }}"><i class="fa fa-fw fa-trash"></i>Desahibilitar</a>
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
