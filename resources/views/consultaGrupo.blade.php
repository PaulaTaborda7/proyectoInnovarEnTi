@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Esta es la lista de docentes pertenecientes a esta institución') }}</div>

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
                                        <th>Tipo de usuario</th>
                                        <th>Promedio</th>
                                        <th>Código NIT de la institución educativa</th>
                                        <th>Número del documento del acudiente</th>
                                        <th>Código del grupo</th>
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
                                        <td>{{ $alumno->tipo }}</td>
                                        <td>{{ $alumno->estPromedio }}</td>
                                        <td>{{ $alumno->insCodigoNit }}</td>
                                        <td>{{ $alumno->numIdentidadPadre }}</td>
                                        <td>{{ $alumno->gruIdCurso }}</td>
                                        <td>{{ $alumno->observacion }}</td>
                                        <td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="container">
                                <div class="justify-content-center">
                                    <a class="ml-4 text-sm btn btn-primary" href="{{ route('home') }}">Regresar</a>
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