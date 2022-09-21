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
                                        <th>Documento de identidad</th>
                                        <th>Correo electrónico</th>
                                        <th>Tipo de usuario</th>
                                        <th>Tipo de contrato</th>
                                        <th>Área curricular</th>
                                        <th>Código NIT de la institución</th>
    
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($todos as $todo)
                                    <tr>
                                        <td>{{ $todo->nombre }}</td>
                                        <td>{{ $todo->documentoIdentidad }}</td>
                                        <td>{{ $todo->email }}</td>
                                        <td>{{ $todo->tipo }}</td>
                                        <td>{{ $todo->docTipoContrato }}</td>
                                        <td>{{ $todo->docAreaCurricular }}</td>
                                        <td>{{ $todo->insCodigoNit }}</td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="container">
                                <div class="justify-content-center">
                                    <a class="ml-4 text-sm btn btn-primary" href="{{ route('institucions.index') }}">Regresar</a>
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