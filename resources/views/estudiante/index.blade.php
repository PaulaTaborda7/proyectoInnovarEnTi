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
                            <b>ESTUDIANTES</b>
                        </span>

                        <div class="float-right">
                            <a href="{{ route('estudiantes.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                {{ __('Crear nuevo estudiante') }}
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
                        <table class="table text-center ">
                            <thead class="table-primary">
                                <tr>
                                    <th>Nombre completo</th>
                                    <th>Número del documento de identidad</th>
                                    <th>Correo electrónico</th>
                                    <th>Promedio</th>
                                    <th>Código NIT de la institución educativa</th>
                                    <th>Número del documento del acudiente</th>
                                    <th>Código del grupo</th>
                                    <th>Observación</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($estudiantes as $estudiante)
                                <tr>
                                    <td>{{ $estudiante->nombre }}</td>
                                    <td>{{ $estudiante->numIdentidad }}</td>
                                    <td>{{ $estudiante->email }}</td>
                                    <td>{{ $estudiante->estPromedio }}</td>
                                    <td>{{ $estudiante->insCodigoNit }}</td>
                                    <td>{{ $estudiante->numIdentidadPadre }}</td>
                                    <td>{{ $estudiante->gruIdCurso }}</td>
                                    <td>{{ $estudiante->observacion }}</td>
                                    <td>
                                        <form action="{{ route('estudiantes.destroy',$estudiante->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary " href="{{ route('estudiantes.show',$estudiante->id) }}"><i class="fa fa-fw fa-eye"></i> Ver más</a>&nbsp;
                                            <a class="btn btn-sm btn-success" href="{{ route('estudiantes.edit',$estudiante->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>&nbsp;
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>Eliminar</button>&nbsp;
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
                            <div class="justify-content-center">
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