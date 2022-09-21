<div class="container">

    <div class="form-group">
        <span>Nombre del grupo</span>
        {{ Form::text('gruNombre', $grupo->gruNombre, ['class' => 'form-control' . ($errors->has('gruNombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
        @error('gruNombre')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <span>Código del grupo</span>
        {{ Form::text('gruIdGrupo', $grupo->gruIdGrupo, ['class' => 'form-control' . ($errors->has('gruIdGrupo') ? ' is-invalid' : ''), 'placeholder' => 'Identificador']) }}
        @error('gruIdGrupo')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <span>Jornada</span>
        <select name="gruJornada" id="gruJornada" class="form-control @error('gruJornada') is-invalid @enderror">
            <option disabled="" selected="" value="">Selecciona una opción</option>
            <option value="Mañana">Mañana</option>
            <option value="Tarde">Tarde</option>
        </select>
        @error('gruJornada')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <span>Cantidad de estudiantes</span>
        {{ Form::text('gruCantEstudiante', $grupo->gruCantEstudiante, ['class' => 'form-control' . ($errors->has('gruCantEstudiante') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad de estudiantes del grupo']) }}
        @error('gruCantEstudiante')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <span>Cantidad de materias</span>
        {{ Form::text('gruCantMateria', $grupo->gruCantMateria, ['class' => 'form-control' . ($errors->has('gruCantMateria') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad de Materias del grupo']) }}
        @error('gruCantMateria')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <span>Código NIT de la institución educativa</span>
        {{ Form::text('insCodigoNit', $grupo->insCodigoNit, ['class' => 'form-control' . ($errors->has('insCodigoNit') ? ' is-invalid' : ''), 'placeholder' => 'Código de la institución']) }}
        @error('insCodigoNit')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <span>Número de identidad del docente encargado</span>
        {{ Form::text('numIdentidadDocente', $grupo->numIdentidadDocente, ['class' => 'form-control' . ($errors->has('numIdentidadDocente') ? ' is-invalid' : ''), 'placeholder' => 'Número de documento de identidad']) }}
        {!! $errors->first('numIdentidadDocente', '<div class="invalid-feedback">:message</div>') !!}
    </div>

    <div class="row mb-0">
        <div class="col-md-8 offset-md-5">
            <button type="submit" class="btn btn-primary">
                {{ __('Editar') }}
            </button>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="justify-content-cente">
            <a class="ml-4 text-sm btn btn-primary" href="{{ route('grupos.index') }}">Regresar</a>
        </div>
    </div>
</div>
