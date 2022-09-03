<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Nombre_completo') }}
            {{ Form::text('name', $docente->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Documento_de_identidad') }}
            {{ Form::text('documentoIdentidad', $docente->documentoIdentidad, ['class' => 'form-control' . ($errors->has('documentoIdentidad') ? ' is-invalid' : ''), 'placeholder' => 'Documentoidentidad']) }}
            {!! $errors->first('documentoIdentidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Email') }}
            {{ Form::text('email', $docente->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Tipo') }}
            {{ Form::text('tipo', $docente->tipo, ['class' => 'form-control' . ($errors->has('tipo') ? ' is-invalid' : ''), 'placeholder' => 'Tipo']) }}
            {!! $errors->first('tipo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Password') }}
            {{ Form::password('password', $docente->password, ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'Password']) }}
            {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Confirmar_password') }}
            {{ Form::password('password', $docente->password, ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'Confirmar Password']) }}
            {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Tipo_de_contrato') }}
            {{ Form::text('docTipoContrato', $docente->docTipoContrato, ['class' => 'form-control' . ($errors->has('docTipoContrato') ? ' is-invalid' : ''), 'placeholder' => 'Doctipocontrato']) }}
            {!! $errors->first('docTipoContrato', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Área_curricular') }}
            {{ Form::text('docAreaCurricular', $docente->docAreaCurricular, ['class' => 'form-control' . ($errors->has('docAreaCurricular') ? ' is-invalid' : ''), 'placeholder' => 'Docareacurricular']) }}
            {!! $errors->first('docAreaCurricular', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Código_Nit_de_la_Institución') }}
            {{ Form::text('insCodigoNit', $docente->insCodigoNit, ['class' => 'form-control' . ($errors->has('insCodigoNit') ? ' is-invalid' : ''), 'placeholder' => 'Inscodigonit']) }}
            {!! $errors->first('insCodigoNit', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>