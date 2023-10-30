<!DOCTYPE html>
<html lang="es">

<x-plantilla-head>
    <title>Competencia | Mostrar</title>
</x-plantilla-head>

<x-plantilla-body>

    <h1> {{ $competencia -> identificador }}</h1> <!--Mostrar detalles-->
    <h4> Duración: {{ $competencia->duracion }} días</h4>
    <h3> Inauguración: {{ date('d/m/Y', strtotime($competencia->fecha)) }} </h3>
    <h3> Cierre: {{ date('d/m/Y', strtotime($competencia->fecha . '+' . $competencia->duracion . 'days')) }}</h3>

    @if ($competencia->categorias->count() > 0)
        <br>
        <h4>Categorias</h4>

        <ul>
            @foreach($competencia->categorias as $categoria)
                <li>
                    {{ $categoria -> nombre }}
                </li>
            @endforeach
        </ul>
    @endif



    <div style="margin-top: 25px;">
        <a href="/competencia">Regresar</a> 
    </div>

</x-plantilla-body>

</html>