<!DOCTYPE html>
<html lang="es">


<x-plantilla-head>
    <title>Asesor | Mostrar</title>
</x-plantilla-head>


<x-plantilla-body>
    <h2>Nombre de Participante: {{$participante->nombre}}</h2>
    <h3>Nombre de Equipo: {{$participante->nombreEquipo}}</h3>
    <h3>Escuela del Participante: {{$participante->escuela}}</h3>
    <h3>Correo del Participante: {{$participante->correo}}</h3>
    <h3>Numero de equipo: {{$participante->numeroEquipo}}</h3>
    <h3>Pago: {{$participante->pago}}</h3>
    <h3>Nombre de competencia: {{$participante->competencia}}</h3>

    <a href="/participante">Regresar</a> 
</x-plantilla-body>
</html>