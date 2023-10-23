<!DOCTYPE html>
<html lang="es">

<x-plantilla-head>
    <title>Asesor | Mostrar</title>
</x-plantilla-head>

<x-plantilla-body>

    <h2> <!--Usuario:--> {{ $asesor -> usuario }}</h2> <!--Mostrar detalles-->
    <h3> Nombre: {{ $asesor -> nombre }}</h3>
    <h3> Correo electronico: {{ $asesor -> correo }}</h3>

    @if (!empty($asesor->telefono))
        <h3> Teléfono: {{ $asesor->telefono }}</h3>
    @endif

    <!--@if (!empty($asesor->escuela))
        <h3> Escuela: {{ $asesor->escuela }}</h3>
    @endif-->

    @if ($asesor->competencias->count() > 0)
        <br>
        <h4>Competencias</h4>

        <ul>
            @foreach($asesor->competencias as $competencia)
                <li>
                    {{ $competencia -> identificador }}
                </li>
            @endforeach
        </ul>
    @endif

    <div style="margin-top: 20px;">
        <a href="/asesor">Regresar</a> 
    </div>

</x-plantilla-body>

</html>