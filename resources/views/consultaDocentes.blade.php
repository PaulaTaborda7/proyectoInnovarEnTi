@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-header text-center fw-bold fs-4">{{ __('Esta es la lista de docentes pertenecientes a la institución') }}</div>

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
                                            <th>Tipo de contrato</th>
                                            <th>Área curricular</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($todos as $todo)
                                        <tr>
                                            <td>{{ $todo->nombre }}</td>
                                            <td>{{ $todo->documentoIdentidad }}</td>
                                            <td>{{ $todo->email }}</td>
                                            <td>{{ $todo->docTipoContrato }}</td>
                                            <td>{{ $todo->docAreaCurricular }}</td>

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
</div>
@endsection