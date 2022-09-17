<div class="container">
    <div class="form-group">
        <span>Nombre del Recurso Educativo Digital</span>
        {{ Form::text('redNombre', $red->redNombre, ['class' => 'form-control' . ($errors->has('redNombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
        @error('redNombre')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <span>ID del Recurso Educativo Digital</span>
        {{ Form::text('redIdRed', $red->redIdRed, ['class' => 'form-control' . ($errors->has('redIdRed') ? ' is-invalid' : ''), 'placeholder' => 'Id']) }}
        @error('redIdRed')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <span>Descripción del Recurso Educativo Digital</span>
        {{ Form::text('redDescripcion', $red->redDescripcion, ['class' => 'form-control' . ($errors->has('redDescripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripción']) }}
        @error('redDescripcion')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <span>Tipo de Recurso Educativo Digital</span>
        {{ Form::text('redTipoRecurso', $red->redTipoRecurso, ['class' => 'form-control' . ($errors->has('redTipoRecurso') ? ' is-invalid' : ''), 'placeholder' => 'Tipo de recurso']) }}
        @error('redTipoRecurso')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <span>Código de la materia asociada al RED</span>
        {{ Form::text('idMateria', $red->idMateria, ['class' => 'form-control' . ($errors->has('idMateria') ? ' is-invalid' : ''), 'placeholder' => 'Id de materia']) }}
        @error('idMateria')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <span>Archivo</span>
        <input type="file" name="redUrl" id="redUrl" class="form-control @error('redUrl') is-invalid @enderror" enctype="multipart/form-data">
        @error('redUrl')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="row mb-0">
        <div class="col-md-8 offset-md-5">
            <button type="submit" class="btn btn-primary">
                {{ __('Editar') }}
            </button>
        </div>
    </div>
    <div class="container">
        <div class="justify-content-cente">
            <a class="ml-4 text-sm btn btn-primary" href="{{ route('reds.index') }}">Regresar</a>
        </div>
    </div>
</div>