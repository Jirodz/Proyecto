<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte red óptima</title>
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
        <h5>Red Óptima: Reporte de conexiones</h5>
        <h5>Establecimiento: {{ $enlaces->first()->establecimiento->nombre_establecimiento }}</h5>
    </div>
    <table class="table table-striped table-hover">
        <thead class="thead">
            <tr>
                <th>Actividad</th>
                <th>Negocio</th>
                <th>Nombre Contacto</th>
                <th>Teléfono</th>
                <th>Nivel</th>
                <th>Operador</th>
                <th>Tipo de local</th>
                <th>Tipo de red</th>
                <th>Cliente</th>
                <th>Local</th>
                <th>ODF</th>
                <th>Puerto</th>
                <th>Responsable Operador</th>
                <th>DPI Responsable</th>
                <th>Telefono Responsable</th>
                <th>Fecha de creación</th>
                <th>Fecha de actualización</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($enlaces as $index => $enlace)
                <tr>
                    <td>{{ $enlace->actividad }}</td>
                    <td>{{ $enlace->negocio }}</td>
                    <td>{{ $enlace->nombre_contacto }}</td>
                    <td>{{ $enlace->telefono }}</td>
                    <td>{{ $enlace->nivel }}</td>
                    <td>{{ $enlace->operadore->operador }}</td>
                    <td>{{ $enlace->tipolocale->tipo_de_local }}</td>
                    <td>{{ $enlace->tipo->tipo_de_red }}</td>
                    <td>{{ $enlace->cliente->nombre }}</td>
                    <td>{{ $enlace->locale->numero_local }}</td>
                    <td>{{ $enlace->odf->nombre_odf }}</td>
                    <td>{{ $enlace->port->numero_puerto }}</td>
                    <td>{{ $enlace->responsable_operador }}</td>
                    <td>{{ $enlace->dpi_responsable }}</td>
                    <td>{{ $enlace->telefono_responsable }}</td>
                    <td>{{ $enlace->created_at }}</td>
                    <td>{{ $enlace->updated_at }}</td>
                    </td>
                </tr>
                <!-- Agregar un salto de página después de cada 10 filas, ajusta según sea necesario -->
                @if (($index + 1) % 10 == 0)
                    <tr class="page-break"></tr>
                @endif
            @endforeach
        </tbody>
    </table>
</body>
</html>