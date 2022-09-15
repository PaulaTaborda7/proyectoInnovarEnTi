@extends('layouts.app')

@section('template_title')
    {{ $grupo->name ?? 'Show Grupo' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Grupo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('grupos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Gruidgrupo:</strong>
                            {{ $grupo->gruIdGrupo }}
                        </div>
                        <div class="form-group">
                            <strong>Grunombre:</strong>
                            {{ $grupo->gruNombre }}
                        </div>
                        <div class="form-group">
                            <strong>Grujornada:</strong>
                            {{ $grupo->gruJornada }}
                        </div>
                        <div class="form-group">
                            <strong>Grucantestudiante:</strong>
                            {{ $grupo->gruCantEstudiante }}
                        </div>
                        <div class="form-group">
                            <strong>Grucantmateria:</strong>
                            {{ $grupo->gruCantMateria }}
                        </div>
                        <div class="form-group">
                            <strong>Inscodigonit:</strong>
                            {{ $grupo->insCodigoNit }}
                        </div>
                        <div class="form-group">
                            <strong>Numidentidaddocente:</strong>
                            {{ $grupo->numIdentidadDocente }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
