@extends('layouts.app')

@section('template_title')
    {{ $institucion->name ?? 'Ver información de Institución Educativa' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver información de Institución Educativa</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('institucions.index') }}">Volver</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $institucion->insNombre }}
                        </div>
                        
                        <div class="form-group">
                            <strong>NIT:</strong>
                            {{ $institucion->codigoNit }}
                        </div>
                        <div class="form-group">
                            <strong>Dirección:</strong>
                            {{ $institucion->insDireccion }}
                        </div>
                        <div class="form-group">
                            <strong>Departamento:</strong>
                            {{ $institucion->insDepartamento }}
                        </div>
                        <div class="form-group">
                            <strong>País:</strong>
                            {{ $institucion->insPais }}
                        </div>
                        <div class="form-group">
                            <strong>Teléfono:</strong>
                            {{ $institucion->insTelefono }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo de calendario:</strong>
                            {{ $institucion->insCalendario }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad de docentes:</strong>
                            {{ $institucion->insCantidadDocentes }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad de estudiantes:</strong>
                            {{ $institucion->insCantidadEstudiantes }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo paquete:</strong>
                            {{ $institucion->tipoPaquete }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
