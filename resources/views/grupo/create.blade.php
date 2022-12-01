@extends('layouts.app')

@section('template_title')
    Create Grupo
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header text-center fw-bold fs-4">{{ __('Llena los siguientes datos para registrar un grupo') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('grupos.store') }}"  role="form" enctype="multipart/form-data">
                        @csrf

                        @include('grupo.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
