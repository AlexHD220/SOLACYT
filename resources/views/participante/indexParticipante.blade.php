<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>lista de participantes</h1>
    @foreach ($participantes as $participante)
        <li>
            <a href="{{route('participante.show', $participante)}}">
                {{$participante->nombre}}</a> 
            <a href="{{route('participante.edit', $participante)}}"> Editar</a>
            <form action="{{route('participante.destroy', $participante)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">ELIMINAR</button>
            </form>
        </li>


        <!--<li>{{$participante->nombre}}</li>
        <li>{{$participante->nombreEquipo}}</li>
        <li>{{$participante->escuela}}</li>
        <li>{{$participante->correo}}</li>
        <li>{{$participante->numeroEquipo}}</li>
        <li>{{$participante->pago}}</li>
        <li>{{$participante->competencia}}</li>-->
        <br>
    @endforeach
</body>
</html>