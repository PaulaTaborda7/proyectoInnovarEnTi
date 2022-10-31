@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card center mt-5">
                <div class="card-header text-center fw-bold fs-4">{{ __('Opciones del administrador') }}</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="d-flex justify-content-center text-center">
                        @if (Route::has('register'))
                        <div class="container">
                            <div class="justify-content-center">
                                <a class="btn btn-success" class="ml-4 " style="font-size:90%;                                color:white;
                                width:100px;
                                height:100px;
                                display: flex;
                                align-items: center;
                                justify-content: center;" href="{{ route('register') }}">Registrar administrador</a>
                            </div>
                        </div>
                        @endif
                        <br>
                        <div class="container">
                            <div class="justify-content-center">
                                <a class="btn btn-success" class="ml-4 " style="font-size:90%;                                color:white;
                                width:100px;
                                height:100px;
                                display: flex;
                                align-items: center;
                                justify-content: center;" href="/materias">Administrar temáticas</a>
                            </div>
                        </div>
                        <br>
                        <div class="container">
                            <div class="justify-content-center">
                                <a class="btn btn-success" class="ml-4 " style="font-size:90%;                                color:white;
                                width:100px;
                                height:100px;
                                display: flex;
                                align-items: center;
                                justify-content: center;" href="/docentes">Administrar docentes</a>
                            </div>
                        </div>
                        <br>
                        <div class="container">
                            <div class="justify-content-center">
                                <a class="btn btn-success" class="ml-4 " style="font-size:90%;                                color:white;
                                width:100px;
                                height:100px;
                                display: flex;
                                align-items: center;
                                justify-content: center;" href="/institucions">Administrar instituciones educativas</a>
                            </div>
                        </div>
                        <br>
                        <div class="container">
                            <div class="justify-content-center">
                                <a class="btn btn-success" class="ml-4 " style="font-size:90%;                                color:white;
                                width:100px;
                                height:100px;
                                display: flex;
                                align-items: center;
                                justify-content: center;" href="/reds">Administrar Recursos Educativos Digitales</a>
                            </div>
                        </div>
                        <div class="container">
                            <div class="justify-content-center">
                                <a class="btn btn-success" style="font-size:90%;                                color:white;
                                width:100px;
                                height:100px;
                                display: flex;
                                align-items: center;
                                justify-content: center;" class="ml-4 " href="/grupos" class="ml-4 text-sm text-color: primary">Administrar grupos</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection