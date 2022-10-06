@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center fw-bold fs-4">{{ __('Opciones del estudiante') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="container">
                        <div class="justify-content-center">
                            <a class="btn btn-primary" class="ml-4 " href="{{ route('descargarpdf', Session::get('identidadEtudiante')) }}" class="ml-4 text-sm text-color: primary">Observaciones</a>
                        </div>
                    </div>
                    <br>
                    <div class="container">
                        <div class="justify-content-center">
                            <a class="btn btn-primary" class="ml-4 " href="/reds_habilitados" class="ml-4 text-sm text-color: primary">Catálogo de Recursos Educativos Digitales</a>
                        </div>
                    </div>
                    <br>
                    <div class="container">
                        <div class="justify-content-center">
                            <a class="btn btn-primary" class="ml-4 " href="{{ route('reportepdf', Session::get('identidadEtudiante')) }}" class="ml-4 text-sm text-color: primary">Reporte de notas</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection