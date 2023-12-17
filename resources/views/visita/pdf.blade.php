<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bitacora</title>
    <style>
        .table {
            width: 100%;
            border-collapse: collapse;
            font-size: 6px; /* Tamaño de fuente predeterminado */
        }

        .table th, .table td {
            border: 1px solid black;
            padding: 8px; /* Ajusta el espaciado interno según sea necesario */
        }

        .page-break {
            page-break-before: always;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="eye.PNG" alt="" width ="50px" height="50px" />
        <h5>Red Óptima: Bitácora</h5>
        <h5>Establecimiento: {{ $enlaces->first()->establecimiento->nombre_establecimiento }}</h5>
    </div>
    <table class="table table-striped table-hover">
        <thead class="thead">
            <tr>
                <th>No</th>
                <th>Tipo Visita</th>
                <th>Observacion</th>
                <th>Usuario</th>
                <th>Establecimiento</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($visitas as $visita)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $visita->tipo_visita }}</td>
                    <td>{{ $visita->observacion }}</td>
                    <td>{{ $visita->user->name }}</td>
                    <td>{{ $visita->establecimiento->nombre_establecimiento }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>