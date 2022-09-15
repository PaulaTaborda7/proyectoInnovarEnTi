@extends('layouts.app')

@section('template_title')
Estudiante
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Estudiante') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('estudiantes.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                {{ __('Agregar estudiante') }}
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
                        <form action="{{ route('estudiantes.index') }}" method="GET">
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
                                    <th>No.</th>

                                    <th>Nombre</th>
                                    <th>Número de identidad</th>
                                    <th>Córreo electrónico</th>
                                    <th>Tipo de usuario</th>
                                    <th>Promedio</th>
                                    <th>Código NIT de la institución educativa</th>
                                    <th>Número de documento del acudiente</th>
                                    <th>Código del grupo</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($estudiantes as $estudiante)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $estudiante->nombre }}</td>
                                    <td>{{ $estudiante->numIdentidad }}</td>
                                    <td>{{ $estudiante->email }}</td>
                                    <td>{{ $estudiante->tipo }}</td>
                                    <td>{{ $estudiante->estPromedio }}</td>
                                    <td>{{ $estudiante->insCodigoNit }}</td>
                                    <td>{{ $estudiante->numIdentidadPadre }}</td>
                                    <td>{{ $estudiante->gruIdCurso }}</td>

                                    <td>
                                        <form action="{{ route('estudiantes.destroy',$estudiante->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary " href="{{ route('estudiantes.show',$estudiante->id) }}"><i class="fa fa-fw fa-eye"></i> Ver más</a>
                                            <a class="btn btn-sm btn-success" href="{{ route('estudiantes.edit',$estudiante->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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
                                <td colspan="4">{{$estudiantes->appends(['busqueda'=>$busqueda])}}</td>
                            </tr>
                        </tfoot>
                        <div class="container">
                            <div class="justify-content-cente">
                                <a class="ml-4 text-sm btn btn-primary" href="/vistadocentes">Regresar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection