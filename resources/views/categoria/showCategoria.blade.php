<!DOCTYPE html>
<html lang="es">

<x-plantilla-head>
    <title>Categorías | Mostrar</title>
</x-plantilla-head>

<x-plantilla-body>

    <h2> {{ $competencia -> usuario }}</h2> <!--Mostrar detalles-->

    <!--@if (!empty($asesor->escuela))
        <h3> Escuela: {{ $asesor->escuela }}</h3>
    @endif-->

    <br>
    <h4>Cataegorías</h4>

    @if ($competencia->categorias->count() > 0)

        @foreach($competencia->categorias as $categoria)
            <ul>
                <li>
                    {{ $competencia -> nombre }}
                </li>
                <p>{{ $competencia -> descripcion }}</p>
            </ul>

        @endforeach
    @endif

    <div style="margin-top: 25px;">
        <a href="/categoria">Regresar</a> 
    </div>

</x-plantilla-body>

</html>