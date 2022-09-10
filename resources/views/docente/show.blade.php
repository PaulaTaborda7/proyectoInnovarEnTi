@extends('layouts.app')

@section('template_title')
    {{ $docente->nombre ?? 'Show Docente' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Información de docente</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('docentes.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre completo:</strong>
                            {{ $docente->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Documento de identidad:</strong>
                            {{ $docente->documentoIdentidad }}
                        </div>
                        <div class="form-group">
                            <strong>Correo electrónico:</strong>
                            {{ $docente->email }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo de usuario:</strong>
                            {{ $docente->tipo }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo de contrato:</strong>
                            {{ $docente->docTipoContrato }}
                        </div>
                        <div class="form-group">
                            <strong>Área curricular:</strong>
                            {{ $docente->docAreaCurricular }}
                        </div>
                        <div class="form-group">
                            <strong>Código NIT de la institución:</strong>
                            {{ $docente->insCodigoNit }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
