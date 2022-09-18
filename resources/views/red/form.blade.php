<div class="container">
    <div class="form-group">
        <span>Nombre del Recurso Educativo Digital</span>
        {{ Form::text('redNombre', $red->redNombre, ['class' => 'form-control' . ($errors->has('redNombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
        {!! $errors->first('redNombre', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
        <span>ID del Recurso Educativo Digital</span>
        {{ Form::text('redIdRed', $red->redIdRed, ['class' => 'form-control' . ($errors->has('redIdRed') ? ' is-invalid' : ''), 'placeholder' => 'Id']) }}
        {!! $errors->first('redIdRed', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
        <span>Descripción del Recurso Educativo Digital</span>
        {{ Form::text('redDescripcion', $red->redDescripcion, ['class' => 'form-control' . ($errors->has('redDescripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripción']) }}
        {!! $errors->first('redDescripcion', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
        <span>Tipo de Recurso Educativo Digital</span>
        {{ Form::text('redTipoRecurso', $red->redTipoRecurso, ['class' => 'form-control' . ($errors->has('redTipoRecurso') ? ' is-invalid' : ''), 'placeholder' => 'Tipo de recurso']) }}
        {!! $errors->first('redTipoRecurso', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
        <span>Código de la materia asociada al RED</span>
        {{ Form::text('idMateria', $red->idMateria, ['class' => 'form-control' . ($errors->has('idMateria') ? ' is-invalid' : ''), 'placeholder' => 'Id de materia']) }}
        {!! $errors->first('idMateria', '<div class="invalid-feedback">:message</div>') !!}
    </div>

    <div class="form-group mt-4">
        <label for="files">Archivo</label>
        <input type="file" name="files[]" id="files" class="form-control @error('files') is-invalid @enderror" enctype="multipart/form-data" multiple>
        @error('files')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="row mb-0">
        <div class="col-md-8 offset-md-5">
            <button type="submit" class="btn btn-primary">
                {{ __('Agregar') }}
            </button>
        </div>
    </div>
    <div class="container">
        <div class="justify-content-cente">
            <a class="ml-4 text-sm btn btn-primary" href="{{ route('reds.index') }}">Regresar</a>
        </div>
    </div>
</div>