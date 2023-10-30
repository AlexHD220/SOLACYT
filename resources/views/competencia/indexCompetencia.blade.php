<!DOCTYPE html>
<html lang="es">

<x-plantilla-head>
    <title>Competencias</title>
</x-plantilla-head>

<x-plantilla-body>

<!--@php
$timestampNow = now()->toDateString();
@endphp
<p>Timestamp actual: {{ $timestampNow }}</p>-->

    <div>
        <div class="d-flex justify-content-between align-items-center" style="margin-bottom: 15px;">
            <h1 style="display: inline;">Listado de Competencias</h1>
            @auth <!--Cuando el usuario este logueado muestrame lo sigiente-->
                @if ($categorias->count() > 0)
                    <button class="btn btn-primary" onclick="window.location.href = '/competencia/create';">Registrar nueva competencia</button>
                @endif
            @endauth
        </div>

        <div class="table-responsive">
            <!--<table border="1" class="table text-start align-middle table-bordered table-hover mb-0" style="width: 90%; margin: 0 auto;">-->
                <!--<thead>
                    <tr class="text-white"  style="border-bottom: 2px solid white; text-align: center;">
                        <th>Identificador</th>
                        <th>Asesor</th>
                        <th>Fecha de inicio</th>
                        <th>Fecha de fin</th>
                        <th>Duración</th>
                    </tr>
                </thead>-->

            <table class="table text-start align-middle table-bordered table-hover mb-0" style="width: 40%;">
                <tbody>
                    @foreach ($competencias as $competencia) <!--Listar todos los competencias de la tabla competencias-->
                        @if (strtotime($competencia->fecha) >= strtotime(now()->toDateString()))
                            <tr>
                                <td><a onmouseover="this.style.color='white'" onmouseout="this.style.color='#6c7293'" href="{{route('competencia.show', $competencia)}}" style="text-decoration: none; color: inherit;">
                                    <b style="font-size: 22px;">{{ $competencia->identificador }}</b>
                                </a></td>
                                <!--<td>{{ $competencia -> asesor -> nombre }}</td>-->
                                <td>{{ date('d/m/Y', strtotime($competencia->fecha)) }}</td> <!--$competencia->fecha -->
                                <!--<td>{{ date('d/m/Y', strtotime($competencia->fecha . '+' . $competencia->duracion . 'days')) }}</td>
                                <td>{{ $competencia->duracion }} días</td>-->

                                @auth
                                    <td>
                                        <a href="{{route('competencia.edit', $competencia)}}">
                                            Editar
                                        </a>
                                    </td>
                                @endauth
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>

        <!--<br>
        <button onclick="window.location.href = '/competencia/create';">Registrar nueva competencia</button>-->
    </div>
</x-plantilla-body>

</html>