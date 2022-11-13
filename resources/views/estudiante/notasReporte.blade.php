<body>

    <style>
        body {
            font-family: Arial;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            text-align: left;
        }

        th,
        td {
            padding: 20px;
        }

        tr:nth-child(even) {
            background-color: rgb(228, 245, 245);
        }

        
    </style>



    <table class="table table-striped table-hover">
        <tbody>
            <tr>
                <td><strong>Nombre del estudiante </strong></td>
                <td>{{ $estudiante->nombre }}</td>
            </tr>
            <tr>
                <td><strong>Número del documento de identidad </strong></td>
                <td>{{ $estudiante->numIdentidad }}</td>
            </tr>
            <tr>
                <td><strong>Correo electrónico </strong></td>
                <td>{{ $estudiante->email }}</td>
            </tr>
            <tr>
                <td><strong>NIT de la institución educativa </strong></td>
                <td>{{ $estudiante->insCodigoNit }}</td>
            </tr>
            <tr>
                <td><strong>Código del grupo </strong></td>
                <td>{{ $estudiante->gruIdCurso }}</td>
            </tr>
            <tr>
                <td><strong>Promedio </strong></td>
                <td>{{ $estudiante->estPromedio }}</td>
            </tr>

        </tbody>
    </table>
    <br>
    <div class="container text-center">
        <h2>Recomendación</h2>
        <br>
         {{ $mensaje }}
    </div>

</body>