@extends('layouts.app')

@section('template_title')
    {{ $docente->name ?? 'Show Docente' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Docente</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('docentes.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $docente->name }}
                        </div>
                        <div class="form-group">
                            <strong>Documentoidentidad:</strong>
                            {{ $docente->documentoIdentidad }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $docente->email }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo:</strong>
                            {{ $docente->tipo }}
                        </div>
                        <div class="form-group">
                            <strong>Doctipocontrato:</strong>
                            {{ $docente->docTipoContrato }}
                        </div>
                        <div class="form-group">
                            <strong>Docareacurricular:</strong>
                            {{ $docente->docAreaCurricular }}
                        </div>
                        <div class="form-group">
                            <strong>Inscodigonit:</strong>
                            {{ $docente->insCodigoNit }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
