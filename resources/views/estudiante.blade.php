@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" id="card_opciones_estudiante">
                <div class="card-header text-center fw-bold fs-4">{{ __('Opciones del estudiante') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="d-flex justify-content-center text-center">
                        <div class="container">
                            <div class="justify-content-center">
                                <a class="btn btn-success" class="ml-4 " style="font-size:90%;                                color:white;
                                width:100px;
                                height:100px;
                                display: flex;
                                align-items: center;
                                justify-content: center;" href="{{ route('descargarpdf', Session::get('identidadEtudiante')) }}" class="ml-4 text-sm text-color: primary">Observaciones (PDF)</a>
                            </div>
                        </div>
                        <br>
                        <div class="container">
                            <div class="justify-content-center">
                                <a class="btn btn-success" class="ml-4 " style="font-size:90%;                                color:white;
                                width:100px;
                                height:100px;
                                display: flex;
                                align-items: center;
                                justify-content: center;" href="/reds_habilitados" class="ml-4 text-sm text-color: primary">Catálogo de Recursos Educativos Digitales</a>
                            </div>
                        </div>
                        <br>
                        <div class="container">
                            <div class="justify-content-center">
                                <a class="btn btn-success" class="ml-4 " style="font-size:90%;                                color:white;
                                width:100px;
                                height:100px;
                                display: flex;
                                align-items: center;
                                justify-content: center;"href="{{ route('reportepdf', Session::get('identidadEtudiante')) }}" class="ml-4 text-sm text-color: primary">Reporte de notas (PDF)</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection