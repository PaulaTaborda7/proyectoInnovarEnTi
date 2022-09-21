@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" class="center">
            <div class="card-header text-center fw-bold fs-4">{{ __('Opciones del administrador') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if (Route::has('register'))
                    <div class="container">
                        <div class="justify-content-center">
                            <a class="btn btn-primary" class="ml-4 " href="{{ route('register') }}">Registrar administrador</a>
                        </div>
                    </div>
                    @endif
                    <br>
                    <div class="container">
                        <div class="justify-content-center">
                            <a class="btn btn-primary" class="ml-4 " href="/materias">Administrar temáticas</a>
                        </div>
                    </div>
                    <br>
                    <div class="container">
                        <div class="justify-content-center">
                            <a class="btn btn-primary" class="ml-4 " href="/docentes">Administrar docentes</a>
                        </div>
                    </div>
                    <br>
                    <div class="container">
                        <div class="justify-content-center">
                            <a class="btn btn-primary" class="ml-4 " href="/institucions">Administrar instituciones educativas</a>
                        </div>
                    </div>
                    <br>
                    <div class="container">
                        <div class="justify-content-center">
                            <a class="btn btn-primary" class="ml-4 " href="/reds">Administrar Recursos Educativos Digitales</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection