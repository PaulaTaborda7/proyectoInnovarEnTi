@extends('layouts.appAdmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <embed src="/archivos/{{ $redIdRed }}/index.html" width="1000" height="500">
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="justify-content-cente">
            <a class="ml-4 text-sm btn btn-primary" href="/reds">Regresar</a>
        </div>
    </div>
</div>


@endsection