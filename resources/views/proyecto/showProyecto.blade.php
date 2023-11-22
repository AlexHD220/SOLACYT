<!DOCTYPE html>
<html lang="es">

<x-plantilla-head>
    <title>Proyecto | Detalles</title>
</x-plantilla-head>

<x-plantilla-body>

    <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
        <h2 style="display: inline;"> {{ $proyecto -> nombre }}</h2>
        @auth <!--Cuando el usuario este logueado muestrame lo sigiente-->
            <button class="btn btn-primary" onclick="window.location.href = '/participante/create';">Registrar nuevo participante</button>
        @endauth
    </div>

    <div style="display: flex; ">
        <h4 style="margin-right: 15px;">Asesor:</h4>
        <p style="font-size: 18px; margin-bottom: 15px;">{{ $proyecto -> asesor->nombre }}</p>
    </div>

    <div style="display: flex;">
        <h4 style="margin-right: 15px;"> Competencia: </h4>
        <p style="font-size: 18px; margin-right: 8px;"> {{ $proyecto -> competencia -> identificador }} </p>
        <p style="font-size: 18px; margin-bottom: 15px;"> ({{ date('d/m/Y', strtotime($proyecto -> competencia->fecha)) }}) </p>
    </div>

    <div>
        @if($proyecto -> categorias -> count() > 1)
            <h4 style="margin-right: 15px;"> Categorías: </h4>
        @else
            <h4 style="margin-right: 15px;"> Categoría: </h4>
        @endif
        <ul>
            @foreach($proyecto->categorias as $categoria)
                <li>
                    {{ $categoria -> nombre }}
                </li>
            @endforeach
        </ul>
    </div>

    <div style="margin-top: 25px;">
        <a href="/proyecto">Regresar</a> 
    </div>

</x-plantilla-body>

</html>