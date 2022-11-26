@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-auto p-5 text-center">
            <h1><strong>Catálogo de Recursos Educativos Digitales habilitados</strong> </h1>
        </div>
    </div>
    <div class="container" style="margin-top: 10px">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <hr>
                <div class="row">
                    @foreach ($reds_habilitados as $recurso)
                        @foreach ($tematicas as $tematica)
                            @if ($recurso->idMateria == $tematica->matIdMateria)
                                <div class="col-lg-3">
                                    <div class="card text-center" style="margin-bottom: 20px; height: 410px;">
                                        <br>
                                        <strong class="text-center">{{ $recurso->redNombre }}</strong>
                                        <br>
                                        <div style="height: 100%; width: 100%">
                                            <img id="imagen" src="{{ asset('storage') . '/' . $recurso->imagen }}"
                                                style="height: auto; width: 100px;display: block;" alt="Imágen del RED"
                                                class="card-img-top mx-auto" />
                                            <div class="card-body">
                                                <p class="card-text"><strong>Descripción:
                                                    </strong>{{ $recurso->redDescripcion }}</p>
                                                <p class="card-text"><strong>Temática a la que está asociado:
                                                    </strong>{{ $tematica->matNombreMateria }}
                                            </div>
                                            <hr>
                                            <div style="height: 40px; width: 100%" class="justify-content-center">
                                                <div>
                                                    <a class="btn btn-sm btn-info"
                                                        href="{{ route('recurso.educativo.digital.Estudiante', $recurso->id) }}"><i
                                                            class="fa fa-eye"></i> Resolver/Explorar RED</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
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
                    <a class="ml-4 text-sm btn btn-primary" href="/vistaestudiantes">Regresar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
