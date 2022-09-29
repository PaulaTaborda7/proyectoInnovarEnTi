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
            <th>Observación</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($estudiante as $estudiantes)
        <tr>
            <td>{{ $estudiantes->nombre }}</td>
            <td>{{ $estudiantes->numIdentidad }}</td>
            <td>{{ $estudiantes->email }}</td>
            <td>{{ $estudiantes->tipo }}</td>
            <td>{{ $estudiantes->estPromedio }}</td>
            <td>{{ $estudiante->insCodigoNit }}</td>
            <td>{{ $estudiante->numIdentidadPadre }}</td>
            <td>{{ $estudiante->gruIdCurso }}</td>
            <td>{{ $estudiantes->observacion }}</td>
            

        </tr>
        @endforeach
    </tbody>
</table>