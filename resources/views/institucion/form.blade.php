<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Codigo de la institucion') }}
            {{ Form::text('codigoNit', $institucion->codigoNit, ['class' => 'form-control' . ($errors->has('codigoNit') ? ' is-invalid' : ''), 'placeholder' => 'Codigonit']) }}
            {!! $errors->first('codigoNit', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Direccion') }}
            {{ Form::text('insDireccion', $institucion->insDireccion, ['class' => 'form-control' . ($errors->has('insDireccion') ? ' is-invalid' : ''), 'placeholder' => 'Insdireccion']) }}
            {!! $errors->first('insDireccion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Departamento') }}
            {{ Form::text('insDepartamento', $institucion->insDepartamento, ['class' => 'form-control' . ($errors->has('insDepartamento') ? ' is-invalid' : ''), 'placeholder' => 'Insdepartamento']) }}
            {!! $errors->first('insDepartamento', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Pais') }}
            
            {{ Form::text('insPais', $institucion->insPais, ['class' => 'form-control' . ($errors->has('insPais') ? ' is-invalid' : ''), 'placeholder' => 'Inspais']) }}
            
            {!! $errors->first('insPais', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Telefono') }}
            {{ Form::text('insTelefono', $institucion->insTelefono, ['class' => 'form-control' . ($errors->has('insTelefono') ? ' is-invalid' : ''), 'placeholder' => 'Instelefono']) }}
            {!! $errors->first('insTelefono', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Calendario') }}
            {{ Form::text('insCalendario', $institucion->insCalendario, ['class' => 'form-control' . ($errors->has('insCalendario') ? ' is-invalid' : ''), 'placeholder' => 'Inscalendario']) }}
            {!! $errors->first('insCalendario', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cantidad de docentes') }}
            {{ Form::text('insCantidadDocentes', $institucion->insCantidadDocentes, ['class' => 'form-control' . ($errors->has('insCantidadDocentes') ? ' is-invalid' : ''), 'placeholder' => 'Inscantidaddocentes']) }}
            {!! $errors->first('insCantidadDocentes', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Cantidad de estudiantes') }}
            {{ Form::text('insCantidadEstudiantes', $institucion->insCantidadEstudiantes, ['class' => 'form-control' . ($errors->has('insCantidadEstudiantes') ? ' is-invalid' : ''), 'placeholder' => 'Inscantidadestudiantes']) }}
            {!! $errors->first('insCantidadEstudiantes', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('completo') }}
            {{ Form::text('completo', $institucion->completo, ['class' => 'form-control' . ($errors->has('completo') ? ' is-invalid' : ''), 'placeholder' => 'Completo']) }}
            {!! $errors->first('completo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('dea') }}
            {{ Form::text('dea', $institucion->dea, ['class' => 'form-control' . ($errors->has('dea') ? ' is-invalid' : ''), 'placeholder' => 'Dea']) }}
            {!! $errors->first('dea', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>