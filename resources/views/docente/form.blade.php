<div class="container">
    <div class="form-group">
        <span>Nombre completo</span>
        {{ Form::text('nombre', $docente->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
        {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
        <span>Documento de identidad</span>
        {{ Form::text('documentoIdentidad', $docente->documentoIdentidad, ['class' => 'form-control' . ($errors->has('documentoIdentidad') ? ' is-invalid' : ''), 'placeholder' => 'Documento de identidad']) }}
        {!! $errors->first('documentoIdentidad', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
        <span>Correo electrónico</span>
        {{ Form::text('email', $docente->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
        {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
        <span>Tipo de usuario</span>
        <input id="tipo" type="text" class="form-control" name="tipo" disabled placeholder="2">
    </div>
    <div class="form-group">
        <span>Contraseña</span>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required value="{{ old('password', $docente->password) }}" autocomplete="new-password">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <span>Confirmar contraseña</span>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    </div>
    <div class="form-group">
        {{ Form::label('Tipo de contrato') }}
        {{ Form::text('docTipoContrato', $docente->docTipoContrato, ['class' => 'form-control' . ($errors->has('docTipoContrato') ? ' is-invalid' : ''), 'placeholder' => 'Tipo de contrato']) }}
        {!! $errors->first('docTipoContrato', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
        {{ Form::label('Área curricular') }}
        {{ Form::text('docAreaCurricular', $docente->docAreaCurricular, ['class' => 'form-control' . ($errors->has('docAreaCurricular') ? ' is-invalid' : ''), 'placeholder' => 'Área curricular']) }}
        {!! $errors->first('docAreaCurricular', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
        <span>Código NIT de la institución educativa</span>
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
            <a class="ml-4 text-sm btn btn-primary" href="{{ route('docentes.index') }}">Regresar</a>
        </div>
    </div>
</div>