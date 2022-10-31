@extends('layouts.app')

@section('template_title')
    Institución Educativa
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Institución Educativa') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('institucions.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                {{ __('Registrar Institución Educativa') }}
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
                        <form action="{{ route('institucions.index') }}" method="GET">
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
                                    <th>Nombre</th>
                                    <th>NIT</th>
                                    <th>Dirección</th>
                                    <th>País</th>
                                    <th>Departamento</th>
                                    <th>Ciudad</th>
                                    <th>Teléfono</th>
                                    <th>Tipo de calendario</th>
                                    <th>Cantidad de docentes</th>
                                    <th>Cantidad de estudiantes</th>
                                    <th>Tipo paquete</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($institucions as $institucion)
                                <tr>
                                    <td>{{ $institucion->insNombre }}</td>
                                    <td>{{ $institucion->codigoNit }}</td>
                                    <td>{{ $institucion->insDireccion }}</td>
                                    <td>{{ $institucion->insPais }}</td>
                                    <td>{{ $institucion->insDepartamento }}</td>
                                    <td>{{ $institucion->insCiudad }}</td>
                                    <td>{{ $institucion->insTelefono }}</td>
                                    <td>{{ $institucion->insCalendario }}</td>
                                    <td>{{ $institucion->insCantidadDocentes }}</td>
                                    <td>{{ $institucion->insCantidadEstudiantes }}</td>
                                    <td>{{ $institucion->tipoPaquete }}</td>

                                    <td>
                                        <form action="{{ route('institucions.destroy',$institucion->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary " href="{{ route('institucions.show',$institucion->id) }}"><i class="fa fa-fw fa-eye"></i>Ver más</a>
                                            <a class="btn btn-sm btn-success" href="{{ route('institucions.edit',$institucion->id) }}"><i class="fa fa-fw fa-edit"></i>Editar</a>
                                            <a class="btn btn-sm btn-info" href="{{ route('lista.docentes',$institucion->codigoNit) }}"><i class="fa fa-eye"></i> Ver lista docentes</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <tfoot>
                            <tr>
                                <td colspan="4">{{$institucions->appends(['busqueda'=>$busqueda])}}</td>
                            </tr>
                        </tfoot>
                        <div class="container">
                            <div class="justify-content-cente">
                                <a class="ml-4 text-sm btn btn-primary" href="{{ route('home') }}">Regresar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {!! $institucions->links() !!}
        </div>
    </div>
</div>
@endsection