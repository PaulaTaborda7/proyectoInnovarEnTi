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
                            <span class="card-title">Show Red</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('reds.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Rednombre:</strong>
                            {{ $red->redNombre }}
                        </div>
                        <div class="form-group">
                            <strong>Redidred:</strong>
                            {{ $red->redIdRed }}
                        </div>
                        <div class="form-group">
                            <strong>Reddescripcion:</strong>
                            {{ $red->redDescripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Redtiporecurso:</strong>
                            {{ $red->redTipoRecurso }}
                        </div>
                        <div class="form-group">
                            <strong>Idmateria:</strong>
                            {{ $red->idMateria }}
                        </div>
                        <div class="form-group">
                            <strong>Redurl:</strong>
                            {{ $red->redUrl }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
