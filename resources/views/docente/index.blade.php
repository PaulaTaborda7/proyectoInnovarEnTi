@extends('layouts.app')

@section('template_title')
Docente
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Docente') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('docentes.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                {{ __('Registrar Docente') }}
                            </a>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <br>
                <div class="container">
                    <div class="d-md-flex justify-content-md-end">
                        <form action="{{ route('docentes.index') }}" method="GET">
                            <div class="btn-group">
                                <input type="text" name="busqueda" class="form-control">
                                <input type="submit" value="Buscar" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>

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
                                @foreach ($docentes as $docente)
                                <tr>
                                    <td>{{ $docente->nombre }}</td>
                                    <td>{{ $docente->documentoIdentidad }}</td>
                                    <td>{{ $docente->email }}</td>
                                    <td>{{ $docente->tipo }}</td>
                                    <td>{{ $docente->docTipoContrato }}</td>
                                    <td>{{ $docente->docAreaCurricular }}</td>
                                    <td>{{ $docente->insCodigoNit }}</td>

                                    <td>
                                        <form action="{{ route('docentes.destroy',$docente->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary " href="{{ route('docentes.show',$docente->id) }}"><i class="fa fa-fw fa-eye"></i> Ver más</a>
                                            <a class="btn btn-sm btn-success" href="{{ route('docentes.edit',$docente->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <tfoot>
                            <tr>
                                <td colspan="4">{{$docentes->appends(['busqueda'=>$busqueda])}}</td>
                            </tr>
                        </tfoot>
                        <div class="container">
                            <div class="justify-content-center">
                                <a class="ml-4 text-sm btn btn-primary" href="{{ route('home') }}">Regresar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- {!! $docentes->links() !!} --}}
        </div>
    </div>
</div>
@endsection