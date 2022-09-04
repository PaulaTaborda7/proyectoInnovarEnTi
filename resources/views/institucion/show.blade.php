@extends('layouts.app')

@section('template_title')
    {{ $institucion->name ?? 'Show Institucion' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Institucion</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('institucions.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Codigonit:</strong>
                            {{ $institucion->codigoNit }}
                        </div>
                        <div class="form-group">
                            <strong>Insdireccion:</strong>
                            {{ $institucion->insDireccion }}
                        </div>
                        <div class="form-group">
                            <strong>Insdepartamento:</strong>
                            {{ $institucion->insDepartamento }}
                        </div>
                        <div class="form-group">
                            <strong>Inspais:</strong>
                            {{ $institucion->insPais }}
                        </div>
                        <div class="form-group">
                            <strong>Instelefono:</strong>
                            {{ $institucion->insTelefono }}
                        </div>
                        <div class="form-group">
                            <strong>Inscalendario:</strong>
                            {{ $institucion->insCalendario }}
                        </div>
                        <div class="form-group">
                            <strong>Inscantidaddocentes:</strong>
                            {{ $institucion->insCantidadDocentes }}
                        </div>
                        <div class="form-group">
                            <strong>Inscantidadestudiantes:</strong>
                            {{ $institucion->insCantidadEstudiantes }}
                        </div>
                        <div class="form-group">
                            <strong>Completo:</strong>
                            {{ $institucion->completo }}
                        </div>
                        <div class="form-group">
                            <strong>Dea:</strong>
                            {{ $institucion->dea }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
