@extends('layouts.app')

@section('template_title')
    {{ $estudiante->name ?? 'Show Estudiante' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title"><b>Información detallada del estudiante</b></span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('estudiantes.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre completo:</strong>
                            {{ $estudiante->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Número del documento de identidad:</strong>
                            {{ $estudiante->numIdentidad }}
                        </div>
                        <div class="form-group">
                            <strong>Correo electrónico:</strong>
                            {{ $estudiante->email }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo de usuario:</strong>
                            {{ $estudiante->tipo }}
                        </div>
                        <div class="form-group">
                            <strong>Promedio:</strong>
                            {{ $estudiante->estPromedio }}
                        </div>
                        <div class="form-group">
                            <strong>Código NIT de la institución educativa:</strong>
                            {{ $estudiante->insCodigoNit }}
                        </div>
                        <div class="form-group">
                            <strong>Número del documento del acudiente:</strong>
                            {{ $estudiante->numIdentidadPadre }}
                        </div>
                        <div class="form-group">
                            <strong>Código del grupo:</strong>
                            {{ $estudiante->gruIdCurso }}
                        </div>
                        <div class="form-group">
                            <strong>Observación:</strong>
                            {{ $estudiante->observacion }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
