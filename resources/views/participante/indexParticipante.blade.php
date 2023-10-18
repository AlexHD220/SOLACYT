<!DOCTYPE html>
<html lang="es">

<!--<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>-->

<x-plantilla-head>
    <title>Participantes</title>
</x-plantilla-head>



<x-plantilla-body>
    <div>
        <h1 style="margin-bottom: 15px;">lista de participantes</h1>
        @foreach ($participantes as $participante) <!--Listar todos los datos de la tabla asesores-->

            <li>
                <a href="{{route('participante.show', $participante)}}" style="text-decoration: none; color: inherit; display: inline-block;">
                    <b>{{ $participante -> nombre }}</b>
                </a>
                |
                <a href="{{route('participante.edit', $participante)}}" style="display: inline-block;">
                    Editar
                </a>
                |
                <form action="{{route('participante.destroy', $participante)}}" method = "POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')

                    <button type = "submit">Eliminar </button>
                </form>
            </li>
            <br>
        @endforeach

        <br>
        <button onclick="window.location.href = '/participante/create';">Registrar nuevo participante</button>
    </div>
</x-plantilla-body>


</html>