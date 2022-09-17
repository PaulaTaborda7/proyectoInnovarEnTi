@extends('layouts.app')

@section('template_title')
    {{ $red->name ?? 'Show Red' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Información del Recurso Educativo Digital</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('reds.index') }}">Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre del RED:</strong>
                            {{ $red->redNombre }}
                        </div>
                        <div class="form-group">
                            <strong>ID del RED:</strong>
                            {{ $red->redIdRed }}
                        </div>
                        <div class="form-group">
                            <strong>Descripción del RED:</strong>
                            {{ $red->redDescripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo de Recurso Educativo Digital:</strong>
                            {{ $red->redTipoRecurso }}
                        </div>
                        <div class="form-group">
                            <strong>Código de la materia asociada al RED:</strong>
                            {{ $red->idMateria }}
                        </div>
                        <div class="form-group">
                            <strong>URL del RED:</strong>
                            {{ $red->redUrl }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
