@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center fw-bold fs-4">{{ __('Opciones del docente') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="d-flex justify-content-center text-center">

                        <div class="container">
                            <div class="justify-content-center">
                                <a class="btn btn-success" style="font-size:90%;                                color:white;
                                width:100px;
                                height:100px;
                                display: flex;
                                align-items: center;
                                justify-content: center;" href="/estudiantes">Administrar estudiantes de su grupo</a>
                            </div>
                        </div>
                        
                        <div class="container">
                            <div class="justify-content-center">
                                <a class="btn btn-success" style="font-size:90%;                                color:white;
                                width:100px;
                                height:100px;
                                display: flex;
                                align-items: center;
                                justify-content: center;" href="{{ route('catalogo.recursos', Session::get('documentoIdentidadDocente')) }}" class="ml-4 text-sm text-color: primary">Catálogo de recursos</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection