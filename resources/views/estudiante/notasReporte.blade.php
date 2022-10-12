<table class="table table-striped table-hover">
    <thead class="thead">
        <tr>
            <th>Nombre completo</th>
            <th>Número del documento de identidad</th>
            <th>Correo electrónico</th>
            <th>Tipo de usuario</th>
            <th>Promedio</th>
            <th>Código NIT de la institución educativa</th>
            <th>Número del documento del acudiente</th>
            <th>Código del grupo</th>
            <th></th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <td>{{ $estudiante->nombre }}</td>
            <td>{{ $estudiante->numIdentidad }}</td>
            <td>{{ $estudiante->email }}</td>
            <td>{{ $estudiante->tipo }}</td>
            <td>{{ $estudiante->estPromedio }}</td>
            <td>{{ $estudiante->insCodigoNit }}</td>
            <td>{{ $estudiante->numIdentidadPadre }}</td>
            <td>{{ $estudiante->gruIdCurso }}</td>
        </tr>

    </tbody>
</table>
<div class="container text-center">
    <h2>OBSERVACIÓN</h2>
    {{ $estudiante->observacion }}
    <br>
    <h2>NOTAA</h2>
    {{ $mensaje }}
</div>