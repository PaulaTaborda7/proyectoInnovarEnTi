@extends('layouts.app')

@section('template_title')
{{ $materia->name ?? 'Show Materia' }}
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">Ver información de materia</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('materias.index') }}">Volver</a>
                    </div>
                </div>

                <div class="card-body">

                    <div class="form-group">
                        <strong>Código de la materia:</strong>
                        {{ $materia->matIdMateria }}
                    </div>
                    <div class="form-group">
                        <strong>Nombre de la materia:</strong>
                        {{ $materia->matNombreMateria }}
                    </div>
                    <div class="form-group">
                        <strong>Descripción de la materia:</strong>
                        {{ $materia->matDescripcion }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection