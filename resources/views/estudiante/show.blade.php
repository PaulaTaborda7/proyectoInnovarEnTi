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
                            <span class="card-title">Show Estudiante</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('estudiantes.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Numidentidad:</strong>
                            {{ $estudiante->numIdentidad }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $estudiante->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $estudiante->email }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo:</strong>
                            {{ $estudiante->tipo }}
                        </div>
                        <div class="form-group">
                            <strong>Estpromedio:</strong>
                            {{ $estudiante->estPromedio }}
                        </div>
                        <div class="form-group">
                            <strong>Inscodigonit:</strong>
                            {{ $estudiante->insCodigoNit }}
                        </div>
                        <div class="form-group">
                            <strong>Numidentidadpadre:</strong>
                            {{ $estudiante->numIdentidadPadre }}
                        </div>
                        <div class="form-group">
                            <strong>Gruidcurso:</strong>
                            {{ $estudiante->gruIdCurso }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
