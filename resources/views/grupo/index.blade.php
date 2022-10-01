@extends('layouts.app')

@section('template_title')
Grupo
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Grupo') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('grupos.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                {{ __('Registrar grupo') }}
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
                        <form action="{{ route('grupos.index') }}" method="GET">
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
                                    <th>Nombre</th>
                                    <th>Código ID del grupo</th>
                                    <th>Jornada</th>
                                    <th>Cantidad de estudiantes</th>
                                    <th>Cantidad de materias</th>
                                    <th>Código NIT de Institución educativa</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($grupos as $grupo)
                                <tr>
                                    <td>{{ $grupo->gruNombre }}</td>
                                    <td>{{ $grupo->gruIdGrupo }}</td>
                                    <td>{{ $grupo->gruJornada }}</td>
                                    <td>{{ $grupo->gruCantEstudiante }}</td>
                                    <td>{{ $grupo->gruCantMateria }}</td>
                                    <td>{{ $grupo->insCodigoNit }}</td>

                                    <td>
                                        <form action="{{ route('grupos.destroy',$grupo->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary " href="{{ route('grupos.show',$grupo->id) }}"><i class="fa fa-fw fa-eye"></i> Ver más</a>
                                            <a class="btn btn-sm btn-success" href="{{ route('grupos.edit',$grupo->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                            <a class="btn btn-sm btn-info" href="{{ route('lista.alumnos',$grupo->gruIdGrupo) }}"><i class="fa fa-eye"></i> Ver lista estudiantes</a>
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
                                <td colspan="4">{{$grupos->appends(['busqueda'=>$busqueda])}}</td>
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
            {!! $grupos->links() !!}
        </div>
    </div>
</div>
@endsection