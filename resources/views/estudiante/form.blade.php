<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $estudiante->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('numIdentidad') }}
            {{ Form::text('numIdentidad', $estudiante->numIdentidad, ['class' => 'form-control' . ($errors->has('numIdentidad') ? ' is-invalid' : ''), 'placeholder' => 'Numidentidad']) }}
            {!! $errors->first('numIdentidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('email') }}
            {{ Form::text('email', $estudiante->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tipo') }}
            {{ Form::text('tipo', $estudiante->tipo, ['class' => 'form-control' . ($errors->has('tipo') ? ' is-invalid' : ''), 'placeholder' => 'Tipo']) }}
            {!! $errors->first('tipo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estPromedio') }}
            {{ Form::text('estPromedio', $estudiante->estPromedio, ['class' => 'form-control' . ($errors->has('estPromedio') ? ' is-invalid' : ''), 'placeholder' => 'Estpromedio']) }}
            {!! $errors->first('estPromedio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('insCodigoNit') }}
            {{ Form::text('insCodigoNit', $estudiante->insCodigoNit, ['class' => 'form-control' . ($errors->has('insCodigoNit') ? ' is-invalid' : ''), 'placeholder' => 'Inscodigonit']) }}
            {!! $errors->first('insCodigoNit', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('numIdentidadPadre') }}
            {{ Form::text('numIdentidadPadre', $estudiante->numIdentidadPadre, ['class' => 'form-control' . ($errors->has('numIdentidadPadre') ? ' is-invalid' : ''), 'placeholder' => 'Numidentidadpadre']) }}
            {!! $errors->first('numIdentidadPadre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('gruIdCurso') }}
            {{ Form::text('gruIdCurso', $estudiante->gruIdCurso, ['class' => 'form-control' . ($errors->has('gruIdCurso') ? ' is-invalid' : ''), 'placeholder' => 'Gruidcurso']) }}
            {!! $errors->first('gruIdCurso', '<div class="invalid-feedback">:message</div>') !!}
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

        <div class="form-group">
            {{ Form::label('observacion') }}
            {{ Form::text('observacion', $estudiante->observacion, ['class' => 'form-control' . ($errors->has('observacion') ? ' is-invalid' : ''), 'placeholder' => 'Observacion']) }}
            {!! $errors->first('observacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>