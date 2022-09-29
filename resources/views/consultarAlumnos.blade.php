@extends('layouts.app')

@section('content')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-header text-center fw-bold fs-4">{{ __('Esta es la lista de estudiantes pertenecientes al grupo') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="thead">
                                        <tr>
                                            <th>Nombre completo</th>
                                            <th>Número del documento de identidad</th>
                                            <th>Correo electrónico</th>
                                            <th>Promedio</th>
                                            <th>Código NIT de la institución educativa</th>
                                            <th>Número del documento del acudiente</th>
                                            <th>Observación</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($alumnos as $alumno)
                                        <tr>
                                            <td>{{ $alumno->nombre }}</td>
                                            <td>{{ $alumno->numIdentidad }}</td>
                                            <td>{{ $alumno->email }}</td>
                                            <td>{{ $alumno->estPromedio }}</td>
                                            <td>{{ $alumno->insCodigoNit }}</td>
                                            <td>{{ $alumno->numIdentidadPadre }}</td>
                                            <td>{{ $alumno->observacion }}</td>
                                            <td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <hr>
                                <div class="container">
                                    <div class="justify-content-center">
                                        <a class="ml-4 text-sm btn btn-primary" href="{{ route('grupos.index') }}">Regresar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection