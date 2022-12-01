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
                        <span class="card-title"><b>Información detallada del grupo</b></span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('grupos.index') }}">Volver</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <strong>Nombre del grupo:</strong>
                        {{ $grupo->gruNombre }}
                    </div>
                    <div class="form-group">
                        <strong>Código del grupo:</strong>
                        {{ $grupo->gruIdGrupo }}
                    </div>

                    <div class="form-group">
                        <strong>Jornada:</strong>
                        {{ $grupo->gruJornada }}
                    </div>
                    <div class="form-group">
                        <strong>Cantidad de estudiantes:</strong>
                        {{ $grupo->gruCantEstudiante }}
                    </div>
                    <div class="form-group">
                        <strong>Cantidad de materias:</strong>
                        {{ $grupo->gruCantMateria }}
                    </div>
                    <div class="form-group">
                        <strong>Código NIT de la institución educativa:</strong>
                        {{ $grupo->insCodigoNit }}
                    </div>
                    <div class="form-group">
                        <strong>Número de identidad del docente encargado:</strong>
                        {{ $grupo->numIdentidadDocente }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection