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
        <span>¿Es Tipo RED DEA?</span>
        <select name="redTipoRecurso" id="redTipoRecurso" class="form-control @error('redTipoRecurso') is-invalid @enderror">
            <option disabled="" selected="" value="">Selecciona una opción</option>
            <option value="0">Si</option>
            <option value="1">No</option>
        </select>
        @error('redTipoRecurso')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <span>Nombre de la temática asociada al RED</span>
        <select name="idMateria" id="idMateria" class="form-control @error('idMateria') is-invalid @enderror">
            <option disabled="" selected="" value="">Selecciona una opción</option>
            @foreach ($tematicas as $tematica)
                <option value="{{ $tematica->matIdMateria }}" {{ $tematica->matIdMateria == $red->idMateria ? 'selected' : '' }}>{{ $tematica->matNombreMateria }}</option>       
            @endforeach
        </select>
        @error('idMateria')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
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

    <div class="form-group mt-4">
        <label for="imagen">Imagen asociada al RED</label>
        <input type="file" name="imagen" id="imagen" class="form-control @error('imagen') is-invalid @enderror" enctype="multipart/form-data" multiple>
        @error('imagen')
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