<!DOCTYPE html>
<html lang="es">

<x-plantilla-head>
    <title>Asesor | Mostrar</title>
</x-plantilla-head>

<x-plantilla-body>

    <!--<h2> {{ $asesor -> usuario }}</h2>--> <!--Mostrar detalles-->
    <h1 style="margin-bottom: 15px;"> {{ $asesor -> nombre }}</h1>
    <h3> Correo electronico: </h3>
    <p style="margin-left: 15px; font-size: 18px;"> {{ $asesor -> correo }} </p>

    @if (!empty($asesor->telefono))
        <h3> Teléfono: </h3>
        <p style="margin-left: 15px; font-size: 18px;"> {{ $asesor -> telefono }} </p>
    @endif

    <!--@if (!empty($asesor->escuela))
        <h3> Escuela: {{ $asesor->escuela }}</h3>
    @endif-->

    @if ($asesor->equipos->count() > 0)
        <br>
        <h3>Equipos</h3>

        <ul>
            @foreach($asesor->equipos as $equipo)
                <li>
                    {{ $equipo -> nombre }}
                </li>
            @endforeach
        </ul>
    @endif

    @if ($asesor->proyectos->count() > 0)
        <br>
        <h3>Proyectos</h3>

        <ul>
            @foreach($asesor->proyectos as $proyecto)
                <li>
                    {{ $proyecto -> nombre }}
                </li>
            @endforeach
        </ul>
    @endif

    <!--{{--@if ($asesor->competencias->count() > 0)
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

    @if ($asesor->organizaciones->count() > 0)
        <br>
        <h3>Organizaciones</h3>
        @foreach($asesor->organizaciones as $org)
            <li>{{ $org -> nombre }}</li>
        @endforeach
    @endif--}}-->

    <!--Formulario para agregar las organizaciones desde aqui-->
    <!--{{--<br>
    <form action="{{ route('asesor.get-org, $asesor') }}" method = "POST">
        @csrf
        <input type="hiden" name="asesor_id" value="{{ $asesor_id }}">

        <select name="organizacion_id[]" multiple>
            @foreach($orgs as $org)
                <option value="{{ $org -> id }}">
                    {{ $org->nombre }}
                </option>
            @endforeach
        </select>
    </form>
    <br>--}}-->

    <div style="margin-top: 25px;">
        <a href="/asesor">Regresar</a> 
    </div>

</x-plantilla-body>

</html>