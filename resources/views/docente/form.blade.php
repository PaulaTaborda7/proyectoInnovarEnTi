<div class="container">
    <div class="form-group">
        <span>Nombre completo</span>
        {{ Form::text('nombre', $docente->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
        @error('nombre')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <span>Documento de identidad</span>
        {{ Form::text('documentoIdentidad', $docente->documentoIdentidad, ['class' => 'form-control' . ($errors->has('documentoIdentidad') ? ' is-invalid' : ''), 'placeholder' => 'Documento de identidad']) }}
        @error('documentoIdentidad')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <span>Correo electrónico</span>
        {{ Form::text('email', $docente->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <span>Tipo de usuario</span>
        <input id="tipo" type="text" class="form-control" name="tipo" disabled placeholder="2">
    </div>

    <div class="form-group">
        {{ Form::label('Tipo de contrato') }}
        {{ Form::text('docTipoContrato', $docente->docTipoContrato, ['class' => 'form-control' . ($errors->has('docTipoContrato') ? ' is-invalid' : ''), 'placeholder' => 'Tipo de contrato']) }}
        @error('docTipoContrato')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        {{ Form::label('Área curricular') }}
        {{ Form::text('docAreaCurricular', $docente->docAreaCurricular, ['class' => 'form-control' . ($errors->has('docAreaCurricular') ? ' is-invalid' : ''), 'placeholder' => 'Área curricular']) }}
        @error('docAreaCurricular')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    
    <div class="form-group">
        <span>Nombre de la institución a la que pertenece</span>
        <select name="insCodigoNit" id="insCodigoNit" class="form-control @error('insCodigoNit') is-invalid @enderror">
            <option disabled="" selected="" value="">Selecciona una opción</option>
            @foreach ($instituciones as $institucion)
                <option value="{{ $institucion->codigoNit }}" {{ $institucion->codigoNit == $docente->insCodigoNit ? 'selected' : '' }}>{{ $institucion->insNombre }}</option>       
            @endforeach
        </select>
        @error('insCodigoNit')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <span>ID del grupo encargado</span>
        {{ Form::text('idGrupo', $docente->idGrupo, ['class' => 'form-control' . ($errors->has('idGrupo') ? ' is-invalid' : ''), 'placeholder' => 'Código ID del grupo']) }}
        @error('idGrupo')
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
                {{ __('Agregar') }}
            </button>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="justify-content-cente">
            <a class="ml-4 text-sm btn btn-primary" href="{{ route('docentes.index') }}">Regresar</a>
        </div>
    </div>
</div>