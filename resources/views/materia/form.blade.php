<div class="container">
    <div class="form-group">
        <span>Código de la temática</span>
        {{ Form::text('matIdMateria', $materia->matIdMateria, ['class' => 'form-control' . ($errors->has('matIdMateria') ? ' is-invalid' : ''), 'placeholder' => 'Código']) }}
        @error('matIdMateria')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <span>Nombre de la temática</span>
        {{ Form::text('matNombreMateria', $materia->matNombreMateria, ['class' => 'form-control' . ($errors->has('matNombreMateria') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
        @error('matNombreMateria')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <span>Descripción de la temática</span>
        {{ Form::text('matDescripcion', $materia->matDescripcion, ['class' => 'form-control' . ($errors->has('matDescripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripción']) }}
        @error('matDescripcion')
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
    <hr>
    <div class="container">
        <div class="justify-content-cente">
            <a class="ml-4 text-sm btn btn-primary" href="{{ route('materias.index') }}">Regresar</a>
        </div>
    </div>
</div>