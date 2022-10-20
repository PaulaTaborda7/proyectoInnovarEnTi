<body>
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
        <span>País</span>
        <select name="insPais" id="insPais" class="form-control @error('insPais') is-invalid @enderror" onchange='obtenerDepartamentos()'>
            <option disabled="" selected="" value="">Selecciona una opción</option>
          
            @foreach($countries as $country)
            <option value="{{ $country->id }}">{{ $country->name }}</option>
            @endforeach

        </select>
        @error('insPais')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>


    <div class="form-group">
        <span>Departamento</span>
        <select name="insDepartamento" id="insDepartamento" class="form-control @error('insDepartamento') is-invalid @enderror" onchange="obtenerCiudades()">
            <option disabled="" selected="" value="">Seleccione departamento</option>
        
        </select>
        @error('insDepartamento')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <span>Ciudad</span>
        <select name="insCiudad" id="insCiudad" class="form-control @error('insCiudad') is-invalid @enderror">
            <option disabled="" selected="" value="">Selecciones ciudad</option>
           
        </select>
        @error('insCiudad')
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
</body>

<script>
    // Obtiene de manera dinámica los departamentos por cada país
    let selectPais = document.getElementById('insPais');

    function obtenerDepartamentos(){
        let selectPais = document.getElementById('insPais');
        let idSelectPais = selectPais.value;

        $.ajax({
            url: `/listaDepartamentos/${idSelectPais}`,
            success: data => {
                console.log(data);
                let cadena = "";
                for (let i = 0; i < data.states.length; i++) {
                cadena += `<option value = "${data.states[i].id}">${data.states[i].name}</option>\n`;
                }
                let selectDepartamentos = document.getElementById('insDepartamento');
                selectDepartamentos.innerHTML = cadena;
            }
        });
        obtenerCiudades();

    }
    // document.onload = obtenerDepartamentos();
    selectPais.addEventListener('change', obtenerDepartamentos, false);

    let selectDepartamento = document.getElementById('insDepartamento');

    function obtenerCiudades(){
        let selectDepartamento = document.getElementById('insDepartamento');
        let idSelectDepartamento = selectDepartamento.value;

        $.ajax({
            url: `/listaCiudades/${idSelectDepartamento}`,
            success: data => {
                console.log(data);
                let cadena = "";
                for (let i = 0; i < data.cities.length; i++) {
                cadena += `<option value = "${data.cities[i].id}">${data.cities[i].name}</option>\n`;
                }
                let selectCiudades = document.getElementById('insCiudad');
                selectCiudades.innerHTML = cadena;
            }
        });

    }

    selectDepartamento.addEventListener('change', obtenerCiudades, false);

</script>
