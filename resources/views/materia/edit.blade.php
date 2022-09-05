@extends('layouts.app')

@section('template_title')
Actualizar información de la materia
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header text-center fw-bold fs-4">{{ __('Actualizar información de la materia') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('materias.update', $materia->id) }}" role="form" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf

                        @include('materia.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection