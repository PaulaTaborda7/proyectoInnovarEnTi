<div class="container">
    <form action="/auth/register" method="post"></form>
    <div class="form-group">
        <span>Nombre_completo</span>
        {{ Form::text('name', $docente->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
        <span>Documento_de_identidad</span>
        {{ Form::text('documentoIdentidad', $docente->documentoIdentidad, ['class' => 'form-control' . ($errors->has('documentoIdentidad') ? ' is-invalid' : ''), 'placeholder' => 'Documentoidentidad']) }}
        {!! $errors->first('documentoIdentidad', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
        <span>Correo electrónico</span>
        {{ Form::text('email', $docente->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
        {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
        <span>Tipo</span>
        {{ Form::text('tipo', $docente->tipo, ['class' => 'form-control' . ($errors->has('tipo') ? ' is-invalid' : ''), 'placeholder' => 'Tipo']) }}
        {!! $errors->first('tipo', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
        <span>Contraseña</span>
        <br>
        {{ Form::password('password', $docente->password, ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'Password']) }}
        {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group ">
        <span>Confirmar contraseña</span>
        <br>
        {{ Form::password('password', $docente->password, ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'Confirmar Password']) }}
        {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
        <span>Tipo de contrato</span>
        {{ Form::text('docTipoContrato', $docente->docTipoContrato, ['class' => 'form-control' . ($errors->has('docTipoContrato') ? ' is-invalid' : ''), 'placeholder' => 'Doctipocontrato']) }}
        {!! $errors->first('docTipoContrato', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
        <span>Área curricular</span>
        {{ Form::text('docAreaCurricular', $docente->docAreaCurricular, ['class' => 'form-control' . ($errors->has('docAreaCurricular') ? ' is-invalid' : ''), 'placeholder' => 'Docareacurricular']) }}
        {!! $errors->first('docAreaCurricular', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
        <span>Código NIT de la institución</span>
        {{ Form::text('insCodigoNit', $docente->insCodigoNit, ['class' => 'form-control' . ($errors->has('insCodigoNit') ? ' is-invalid' : ''), 'placeholder' => 'Inscodigonit']) }}
        {!! $errors->first('insCodigoNit', '<div class="invalid-feedback">:message</div>') !!}
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
            <a class="ml-4 text-sm btn btn-primary" href="{{ route('materias.index') }}">Regresar</a>
        </div>
    </div>
</div>