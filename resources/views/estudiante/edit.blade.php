@extends('layouts.app')

@section('template_title')
Update Estudiante
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header text-center fw-bold fs-4">{{ __('Actualizar información del estudiante') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('estudiantes.update', $estudiante->id) }}" role="form" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf

                        @include('estudiante.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection