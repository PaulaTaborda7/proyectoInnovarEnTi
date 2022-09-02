@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Opciones del administrador') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if (Route::has('register'))
                    <div class="container">
                        <div class="justify-content-center">
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline"><button class="btn btn-outline-info">Registrar administrador</button></a>
                        </div>
                    </div>
                    @endif
                    <br>
                    <div class="container">
                        <div class="justify-content-center">
                            <a href="/materias" class="ml-4 text-sm text-color: primary"><button class="btn btn-outline-info">Administrar materia</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection