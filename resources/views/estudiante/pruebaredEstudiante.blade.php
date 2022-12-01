@extends('layouts.app')

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
</div>
<div class="container" style="margin-top: 10px">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <hr>
            <div  class="col-auto p-5 text-center">
                <a class="ml-4 text-sm btn btn-primary" href="/reds_habilitados">Regresar</a>
            </div>
        </div>
    </div>
</div>
@endsection