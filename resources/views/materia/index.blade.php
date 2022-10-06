@extends('layouts.appAdmin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Temática') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('materias.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                {{ __('Agregar nueva temática') }}
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
                        <form action="{{ route('materias.index') }}" method="GET">
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
                                    <th>Código de la temática</th>
                                    <th>Nombre de la temática</th>
                                    <th>Descripción de la temática</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($materias as $materia)
                                <tr>
                                    <td>{{ $materia->matIdMateria }}</td>
                                    <td>{{ $materia->matNombreMateria }}</td>
                                    <td>{{ $materia->matDescripcion }}</td>
                                    <td>
                                        <form action="{{ route('materias.destroy',$materia->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary " href="{{ route('materias.show',$materia->id) }}" ><i class="fa fa-fw fa-eye"></i>Ver más</a>
                                            <a class="btn btn-sm btn-success" href="{{ route('materias.edit',$materia->id) }}"><i class="fa fa-fw fa-edit"></i>Editar</a>
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
                                <td colspan="4">{{$materias->appends(['busqueda'=>$busqueda])}}</td>
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
        </div>
    </div>
</div>

@endsection