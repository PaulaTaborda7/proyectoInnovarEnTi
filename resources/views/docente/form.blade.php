<div class="container">
    <form action="/auth/register" method="post"></form>
    <div class="form-group">
        <span>Nombre completo</span>
        {{ Form::text('name', $docente->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
        <span>Documento de identidad</span>
        {{ Form::text('documentoIdentidad', $docente->documentoIdentidad, ['class' => 'form-control' . ($errors->has('documentoIdentidad') ? ' is-invalid' : ''), 'placeholder' => 'Documento']) }}
        {!! $errors->first('documentoIdentidad', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
        <span>Correo electrónico</span>
        {{ Form::text('email', $docente->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
        {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <!--
    <div class="form-group">
        <span>Tipo de usuario</span>
        {{ Form::text('tipo', $docente->tipo, ['class' => 'form-control' . ($errors->has('tipo') ? ' is-invalid' : ''), 'placeholder' => '2']),  }}
        {!! $errors->first('tipo', '<div class="invalid-feedback">:message</div>') !!}
    </div>-->

    <!--Ya tiene el valor por defecto (2)-->
    <div class="form-group">
        <span>Tipo de usuario</span>
        <input id="tipo" type="text" class="form-control" name="tipo" disabled placeholder="2">
    </div>


    <!--
    <div class="form-group">
        <span>Contraseña</span>
        <br>
        {{ Form::password('password', $docente->password, ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'Password']) }}
        {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
    </div>-->

    <div class="form-group">
        <span>Contraseña</span>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required value="{{ old('password', $docente->password) }}" autocomplete="new-password">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <!--
    <div class="form-group ">
        <span>Confirmar contraseña</span>
        <br>
        {{ Form::password('password', $docente->password, ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'Confirmar Password']) }}
        {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
    </div>-->
    <div class="form-group">
        <span>Confirmar contraseña</span>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
  
    </div>

    <div class="form-group">
        <span>Tipo de contrato</span>
        {{ Form::text('docTipoContrato', $docente->docTipoContrato, ['class' => 'form-control' . ($errors->has('docTipoContrato') ? ' is-invalid' : ''), 'placeholder' => 'Tipo de contrato']) }}
        {!! $errors->first('docTipoContrato', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
        <span>Área curricular</span>
        {{ Form::text('docAreaCurricular', $docente->docAreaCurricular, ['class' => 'form-control' . ($errors->has('docAreaCurricular') ? ' is-invalid' : ''), 'placeholder' => 'Area']) }}
        {!! $errors->first('docAreaCurricular', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
        <span>Código NIT de la institución</span>
        {{ Form::text('insCodigoNit', $docente->insCodigoNit, ['class' => 'form-control' . ($errors->has('insCodigoNit') ? ' is-invalid' : ''), 'placeholder' => 'Nit']) }}
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
            <a class="ml-4 text-sm btn btn-primary" href="{{ route('docentes.index') }}">Regresar</a>
        </div>
    </div>
</div>