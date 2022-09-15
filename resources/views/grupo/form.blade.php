<div class="container">
        
        <div class="form-group">
            {{ Form::label('Identificador') }}
            {{ Form::text('gruIdGrupo', $grupo->gruIdGrupo, ['class' => 'form-control' . ($errors->has('gruIdGrupo') ? ' is-invalid' : ''), 'placeholder' => 'Identificador']) }}
            {!! $errors->first('gruIdGrupo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Nombre') }}
            {{ Form::text('gruNombre', $grupo->gruNombre, ['class' => 'form-control' . ($errors->has('gruNombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre del grupo']) }}
            {!! $errors->first('gruNombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Jornada') }}
            {{ Form::text('gruJornada', $grupo->gruJornada, ['class' => 'form-control' . ($errors->has('gruJornada') ? ' is-invalid' : ''), 'placeholder' => 'Jornada del grupo']) }}
            {!! $errors->first('gruJornada', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cantidad de estudiantes') }}
            {{ Form::text('gruCantEstudiante', $grupo->gruCantEstudiante, ['class' => 'form-control' . ($errors->has('gruCantEstudiante') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad de estudiantes del grupo']) }}
            {!! $errors->first('gruCantEstudiante', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cantidad de materias') }}
            {{ Form::text('gruCantMateria', $grupo->gruCantMateria, ['class' => 'form-control' . ($errors->has('gruCantMateria') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad de Materias del grupo']) }}
            {!! $errors->first('gruCantMateria', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Codigo nit de Institucion') }}
            {{ Form::text('insCodigoNit', $grupo->insCodigoNit, ['class' => 'form-control' . ($errors->has('insCodigoNit') ? ' is-invalid' : ''), 'placeholder' => 'Código de la institución']) }}
            {!! $errors->first('insCodigoNit', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Numero de identidad del docente') }}
            {{ Form::text('numIdentidadDocente', $grupo->numIdentidadDocente, ['class' => 'form-control' . ($errors->has('numIdentidadDocente') ? ' is-invalid' : ''), 'placeholder' => 'Número de identidad del docente encargado']) }}
            {!! $errors->first('numIdentidadDocente', '<div class="invalid-feedback">:message</div>') !!}
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
            <a class="ml-4 text-sm btn btn-primary" href="{{ route('grupos.index') }}">Regresar</a>
        </div>
    </div>
</div>