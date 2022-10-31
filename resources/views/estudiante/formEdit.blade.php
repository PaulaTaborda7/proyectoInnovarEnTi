<div class="container">

    <div class="form-group">
        <span>Nombre completo</span>
        {{ Form::text('nombre', $estudiante->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
        @error('nombre')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <span>Número del documento de identidad</span>
        {{ Form::text('numIdentidad', $estudiante->numIdentidad, ['class' => 'form-control' . ($errors->has('numIdentidad') ? ' is-invalid' : ''), 'placeholder' => 'Documento de identidad']) }}
        @error('numIdentidad')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <span>Correo electrónico</span>
        {{ Form::text('email', $estudiante->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <span>Tipo de usuario</span>
        <input id="tipo" type="text" class="form-control" name="tipo" disabled placeholder="3">
    </div>

    <div class="form-group">
        <span>Promedio</span>
        {{ Form::text('estPromedio', $estudiante->estPromedio, ['class' => 'form-control' . ($errors->has('estPromedio') ? ' is-invalid' : ''), 'placeholder' => 'Promedio']) }}
        @error('estPromedio')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <span>Nombre de la institución educativa</span>
        <select name="insCodigoNit" id="insCodigoNit" class="form-control @error('insCodigoNit') is-invalid @enderror">
            <option disabled="" selected="" value="">Selecciona una opción</option>
            @foreach ($institucioness as $institucion)
                <option value="{{ $institucion->codigoNit }}" {{ $institucion->codigoNit == $estudiante->insCodigoNit ? 'selected' : '' }}>{{ $institucion->insNombre }}</option>       
            @endforeach
        </select>
        @error('insCodigoNit')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <span>Número del documento del acudiente</span>
        {{ Form::text('numIdentidadPadre', $estudiante->numIdentidadPadre, ['class' => 'form-control' . ($errors->has('numIdentidadPadre') ? ' is-invalid' : ''), 'placeholder' => 'Número de documento']) }}
        @error('numIdentidadPadre')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <span>Código del grupo</span>
        <select name="gruIdCurso" id="gruIdCurso" class="form-control @error('gruIdCurso') is-invalid @enderror">
            <option disabled="" selected="" value="">Selecciona una opción</option>
            @foreach ($gruposE as $grupo)
                <option value="{{ $grupo->gruIdGrupo }}" {{ $grupo->gruIdGrupo == $estudiante->gruIdCurso ? 'selected' : '' }}>{{ $grupo->gruNombre }}</option>       
            @endforeach
        </select>
        @error('gruIdCurso')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <span>Observación</span>
        <textarea name="observacion" id="observacion" cols="30" rows="10" class="form-control @error('observacion') is-invalid @enderror"></textarea>
        @error('observacion')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <span>Contraseña</span>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="********">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <span>Confirmar contraseña</span>
        <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="********">
        @error('password_confirmation')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="row mb-0">
        <div class="col-md-8 offset-md-5">
            <button type="submit" class="btn btn-primary">
                {{ __('Editar') }}
            </button>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="justify-content-cente">
            <a class="ml-4 text-sm btn btn-primary" href="{{ route('estudiantes.index') }}">Regresar</a>
        </div>
    </div>
</div>