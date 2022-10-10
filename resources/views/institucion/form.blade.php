<div class="container">

    <div class="form-group">
        <span>Nombre de la institución educativa</span>
        {{ Form::text('insNombre', $institucion->insNombre, ['class' => 'form-control' . ($errors->has('insNombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
        @error('insNombre')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <span>NIT</span>
        {{ Form::text('codigoNit', $institucion->codigoNit, ['class' => 'form-control' . ($errors->has('codigoNit') ? ' is-invalid' : ''), 'placeholder' => 'NIT']) }}
        @error('codigoNit')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <span>Dirección</span>
        {{ Form::text('insDireccion', $institucion->insDireccion, ['class' => 'form-control' . ($errors->has('insDireccion') ? ' is-invalid' : ''), 'placeholder' => 'Dirección']) }}
        @error('insDireccion')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <span>Departamento</span>
        {{ Form::text('insDepartamento', $institucion->insDepartamento, ['class' => 'form-control' . ($errors->has('insDepartamento') ? ' is-invalid' : ''), 'placeholder' => 'Departamento']) }}
        @error('insDepartamento')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <span>País</span>
        <select name="insPais" id="insPais" class="form-control @error('insPais') is-invalid @enderror">
            <option disabled="" selected="" value="">Selecciona una opción</option>
            <option value="A">A</option>
            <option value="B">B</option>
        </select>
        @error('insPais')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <span>Teléfono</span>
        {{ Form::text('insTelefono', $institucion->insTelefono, ['class' => 'form-control' . ($errors->has('insTelefono') ? ' is-invalid' : ''), 'placeholder' => 'Teléfono']) }}
        @error('insTelefono')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <span>Tipo de calendario</span>
        <select name="insCalendario" id="insCalendario" class="form-control @error('insCalendario') is-invalid @enderror">
            <option disabled="" selected="" value="">Selecciona una opción</option>
            <option value="A">A</option>
            <option value="B">B</option>
        </select>
        @error('insCalendario')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <span>Cantidad de docentes</span>
        {{ Form::text('insCantidadDocentes', $institucion->insCantidadDocentes, ['class' => 'form-control' . ($errors->has('insCantidadDocentes') ? ' is-invalid' : ''), 'placeholder' => 'cantidad de docentes']) }}
        @error('insCantidadDocentes')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <span>Cantidad de estudiantes</span>
        {{ Form::text('insCantidadEstudiantes', $institucion->insCantidadEstudiantes, ['class' => 'form-control' . ($errors->has('insCantidadEstudiantes') ? ' is-invalid' : ''), 'placeholder' => 'cantidad de estudiantes']) }}
        @error('insCantidadEstudiantes')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <span>Tipo paquete</span>
        <select name="tipoPaquete" id="tipoPaquete" class="form-control @error('tipoPaquete') is-invalid @enderror">
            <option disabled="" selected="" value="">Selecciona una opción</option>
            <option value="1">Completo</option>
            <option value="0">DEA</option>
        </select>
        @error('tipoPaquete')
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
            <a class="ml-4 text-sm btn btn-primary" href="{{ route('institucions.index') }}">Regresar</a>
        </div>
    </div>
</div>