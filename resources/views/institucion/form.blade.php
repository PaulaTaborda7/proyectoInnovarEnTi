<div class="container">

    <div class="form-group">
        {{ Form::label('NIT') }}
        {{ Form::text('codigoNit', $institucion->codigoNit, ['class' => 'form-control' . ($errors->has('codigoNit') ? ' is-invalid' : ''), 'placeholder' => 'nit']) }}
        {!! $errors->first('codigoNit', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
        {{ Form::label('Dirección') }}
        {{ Form::text('insDireccion', $institucion->insDireccion, ['class' => 'form-control' . ($errors->has('insDireccion') ? ' is-invalid' : ''), 'placeholder' => 'dirección']) }}
        {!! $errors->first('insDireccion', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
        {{ Form::label('Departamento') }}
        {{ Form::text('insDepartamento', $institucion->insDepartamento, ['class' => 'form-control' . ($errors->has('insDepartamento') ? ' is-invalid' : ''), 'placeholder' => 'departamento']) }}
        {!! $errors->first('insDepartamento', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
        {{ Form::label('País') }}

        {{ Form::text('insPais', $institucion->insPais, ['class' => 'form-control' . ($errors->has('insPais') ? ' is-invalid' : ''), 'placeholder' => 'país']) }}

        {!! $errors->first('insPais', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
        {{ Form::label('Teléfono') }}
        {{ Form::text('insTelefono', $institucion->insTelefono, ['class' => 'form-control' . ($errors->has('insTelefono') ? ' is-invalid' : ''), 'placeholder' => 'teléfono']) }}
        {!! $errors->first('insTelefono', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
        {{ Form::label('Tipo de calendario') }}
        {{ Form::text('insCalendario', $institucion->insCalendario, ['class' => 'form-control' . ($errors->has('insCalendario') ? ' is-invalid' : ''), 'placeholder' => 'calendario']) }}
        {!! $errors->first('insCalendario', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
        {{ Form::label('Cantidad de docentes') }}
        {{ Form::text('insCantidadDocentes', $institucion->insCantidadDocentes, ['class' => 'form-control' . ($errors->has('insCantidadDocentes') ? ' is-invalid' : ''), 'placeholder' => 'cantidad de docentes']) }}
        {!! $errors->first('insCantidadDocentes', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
        {{ Form::label('Cantidad de estudiantes') }}
        {{ Form::text('insCantidadEstudiantes', $institucion->insCantidadEstudiantes, ['class' => 'form-control' . ($errors->has('insCantidadEstudiantes') ? ' is-invalid' : ''), 'placeholder' => 'cantidad de estudiantes']) }}
        {!! $errors->first('insCantidadEstudiantes', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
        {{ Form::label('Completo') }}
        {{ Form::text('completo', $institucion->completo, ['class' => 'form-control' . ($errors->has('completo') ? ' is-invalid' : ''), 'placeholder' => 'completo']) }}
        {!! $errors->first('completo', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
        {{ Form::label('Dea') }}
        {{ Form::text('dea', $institucion->dea, ['class' => 'form-control' . ($errors->has('dea') ? ' is-invalid' : ''), 'placeholder' => 'dea']) }}
        {!! $errors->first('dea', '<div class="invalid-feedback">:message</div>') !!}
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
            <a class="ml-4 text-sm btn btn-primary" href="{{ route('institucions.index') }}">Regresar</a>
        </div>
    </div>
</div>