<!DOCTYPE html>
<html lang="es">

<x-plantilla-head>
    <title>Equipo | Detalles</title>
</x-plantilla-head>

<x-plantilla-body>

    <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
        <h2 style="display: inline;"> {{ $equipo -> nombre }}</h2>
        @auth <!--Cuando el usuario este logueado muestrame lo sigiente-->
            <button class="btn btn-primary" onclick="window.location.href = '/participante/create';">Registrar nuevo participante</button>
        @endauth
    </div>

    <div style="display: flex; ">
        <h4 style="margin-right: 15px;">Asesor:</h4>
        <p style="font-size: 18px; margin-bottom: 15px;">{{ $asesor->nombre }}</p>
    </div>

    <div style="display: flex;">
        <h4 style="margin-right: 15px;"> Competencia: </h4>
        <p style="font-size: 18px; margin-right: 8px;"> {{ $competencia -> identificador }} </p>
        <p style="font-size: 18px; margin-bottom: 15px;"> ({{ date('d/m/Y', strtotime($competencia->fecha)) }}) </p>
    </div>

    <div style="display: flex;">
        <h4 style="margin-right: 15px;"> Categoria: </h4>
        <p style="font-size: 18px; margin-bottom: 15px;"></p>
    </div>

    <div style="margin-top: 25px;">
        <a href="/equipo">Regresar</a> 
    </div>

</x-plantilla-body>

</html>