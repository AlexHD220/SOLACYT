<!DOCTYPE html>
<html lang="es">

<x-plantilla-head>
    <title>Asesores</title>
</x-plantilla-head>

<x-plantilla-body>
    <div>
        <h1 style="margin-bottom: 15px;">Listado de Competencias</h1>

        <div class="table-responsive">
            <table border="1" class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">
                        <th>Asesor</th>
                        <th>Identificador</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($competencias as $competencia) <!--Listar todos los competencias de la tabla competencias-->
                        <tr>
                            <td>{{ $competencia -> asesor -> nombre }}</td>
                            <td>{{ $competencia->identificador }}</td>
                            <td>{{ $competencia->fecha }}</td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>

        <br>
        <button onclick="window.location.href = '/competencia/create';">Registrar nueva competencia</button>
    </div>
</x-plantilla-body>

</html>