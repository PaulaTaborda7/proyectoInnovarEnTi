@extends('layouts.app')

@section('template_title')
Agregar nueva temática
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header text-center fw-bold fs-4">{{ __('Llena los siguientes datos para registrar la temática') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('materias.store') }}" role="form" enctype="multipart/form-data">
                        @csrf

                        @include('materia.form')

                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection