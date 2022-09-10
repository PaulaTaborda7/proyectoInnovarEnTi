<div class="container">

    <div class="form-group">
        <span>Número del documento de identidad</span>
        {{ Form::text('numIdentidad', $estudiante->numIdentidad, ['class' => 'form-control' . ($errors->has('numIdentidad') ? ' is-invalid' : ''), 'placeholder' => 'Numidentidad']) }}
        {!! $errors->first('numIdentidad', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
        <span>Nombre completo</span>
        {{ Form::text('nombre', $estudiante->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
        {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
        <span>Correo electrónico</span>
        {{ Form::text('email', $estudiante->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
        {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
        <span>Tipo de usuario</span>
        <input id="tipo" type="text" class="form-control" name="tipo" disabled placeholder="3">
    </div>
    <div class="form-group">
        <span>Contraseña</span>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required value="{{ old('password', $estudiante->password) }}" autocomplete="new-password">
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
        {{ Form::label('Promedio') }}
        {{ Form::text('estPromedio', $estudiante->estPromedio, ['class' => 'form-control' . ($errors->has('estPromedio') ? ' is-invalid' : ''), 'placeholder' => 'Estpromedio']) }}
        {!! $errors->first('estPromedio', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
        <span>Código NIT de la institución educativa'</span>
        {{ Form::text('insCodigoNit', $estudiante->insCodigoNit, ['class' => 'form-control' . ($errors->has('insCodigoNit') ? ' is-invalid' : ''), 'placeholder' => 'Inscodigonit']) }}
        {!! $errors->first('insCodigoNit', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
        <span>Número del documento del acudiente</span>
        {{ Form::text('numIdentidadPadre', $estudiante->numIdentidadPadre, ['class' => 'form-control' . ($errors->has('numIdentidadPadre') ? ' is-invalid' : ''), 'placeholder' => 'Numidentidadpadre']) }}
        {!! $errors->first('numIdentidadPadre', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
        <span>Código del grupo</span>
        {{ Form::text('gruIdCurso', $estudiante->gruIdCurso, ['class' => 'form-control' . ($errors->has('gruIdCurso') ? ' is-invalid' : ''), 'placeholder' => 'Gruidcurso']) }}
        {!! $errors->first('gruIdCurso', '<div class="invalid-feedback">:message</div>') !!}
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
            <a class="ml-4 text-sm btn btn-primary" href="{{ route('estudiantes.index') }}">Regresar</a>
        </div>
    </div>
</div>