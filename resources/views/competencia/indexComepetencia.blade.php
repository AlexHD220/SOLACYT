<!DOCTYPE html>
<html lang="es">

<x-plantilla-head>
    <title>Competencias</title>
</x-plantilla-head>

<x-plantilla-body>

    <div>
        <div class="d-flex justify-content-between align-items-center" style="margin-bottom: 15px;">
            <h1 style="display: inline;">Listado de Competencias</h1>
            @auth <!--Cuando el usuario este logueado muestrame lo sigiente-->
                <button class="btn btn-primary" onclick="window.location.href = '/competencia/create';">Registrar nueva competencia</button>
            @endauth
        </div>

        <div class="table-responsive">
            <table border="1" class="table text-start align-middle table-bordered table-hover mb-0" style="width: 90%; margin: 0 auto;">
                <thead>
                    <tr class="text-white"  style="border-bottom: 2px solid white; text-align: center;">
                        <th>Identificador</th>
                        <th>Asesor</th>
                        <th>Fecha de Inicio</th>
                        <th>Fecha de Fin</th>
                        <th>Duración</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($competencias as $competencia) <!--Listar todos los competencias de la tabla competencias-->
                        <tr style="text-align: center;">
                            <td>{{ $competencia->identificador }}</td>
                            <td>{{ $competencia -> asesor -> nombre }}</td>                            
                            <td>{{ date('d/m/Y', strtotime($competencia->fecha)) }}</td> <!--$competencia->fecha -->
                            <td>{{ date('d/m/Y', strtotime($competencia->fecha . '+' . $competencia->duracion . 'days')) }}</td>
                            <td>{{ $competencia->duracion }} días</td>   
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>

        <!--<br>
        <button onclick="window.location.href = '/competencia/create';">Registrar nueva competencia</button>-->
    </div>
</x-plantilla-body>

</html>