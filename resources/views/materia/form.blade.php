<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('matNombreMateria') }}
            {{ Form::text('matNombreMateria', $materia->matNombreMateria, ['class' => 'form-control' . ($errors->has('matNombreMateria') ? ' is-invalid' : ''), 'placeholder' => 'Matnombremateria']) }}
            {!! $errors->first('matNombreMateria', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('matDescripcion') }}
            {{ Form::text('matDescripcion', $materia->matDescripcion, ['class' => 'form-control' . ($errors->has('matDescripcion') ? ' is-invalid' : ''), 'placeholder' => 'Matdescripcion']) }}
            {!! $errors->first('matDescripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>