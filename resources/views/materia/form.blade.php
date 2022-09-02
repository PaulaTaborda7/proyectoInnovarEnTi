<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Código de la materia') }}
            {{ Form::text('matIdMateria', $materia->matIdMateria, ['class' => 'form-control' . ($errors->has('matIdMateria') ? ' is-invalid' : ''), 'placeholder' => 'Código de la materia']) }}
            {!! $errors->first('matIdMateria', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Nombre de la materia') }}
            {{ Form::text('matNombreMateria', $materia->matNombreMateria, ['class' => 'form-control' . ($errors->has('matNombreMateria') ? ' is-invalid' : ''), 'placeholder' => 'Nombre de la materia']) }}
            {!! $errors->first('matNombreMateria', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Descripción de la materia') }}
            {{ Form::text('matDescripcion', $materia->matDescripcion, ['class' => 'form-control' . ($errors->has('matDescripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripción de la materia']) }}
            {!! $errors->first('matDescripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Agregar</button>
    </div>
</div>