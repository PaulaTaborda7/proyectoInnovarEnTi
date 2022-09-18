@extends('layouts.app')

@section('template_title')
Red
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Red') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('reds.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                {{ __('Crear nuevo RED') }}
                            </a>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No.</th>

                                    <th>Nombre del Recurso Educativo Digital</th>
                                    <th>ID del Recurso Educativo Digital</th>
                                    <th>Descripción del Recurso Educativo Digital</th>
                                    <th>Tipo de Recurso Educativo Digital</th>
                                    <th>Código de la temática asociada al RED</th>
                                    {{-- <th>URL del RED</th> --}}

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                {{ $i = 0}}
                                @foreach ($reds as $red)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $red->redNombre }}</td>
                                    <td>{{ $red->redIdRed }}</td>
                                    <td>{{ $red->redDescripcion }}</td>
                                    <td>{{ $red->redTipoRecurso }}</td>
                                    <td>{{ $red->idMateria }}</td>
                                    {{-- <td>{{ $red->redUrl }}</td> --}}

                                    <td>
                                        <form action="{{ route('reds.destroy',$red->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary " href="{{ route('reds.show',$red->id) }}"><i class="fa fa-fw fa-eye"></i> Ver más</a>
                                            <a class="btn btn-sm btn-success" href="{{ route('reds.edit',$red->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="container">
                            <div class="justify-content-cente">
                                <a class="ml-4 text-sm btn btn-primary" href="{{ route('home') }}">Regresar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- {!! $reds->links() !!} --}}
        </div>
    </div>
</div>
@endsection