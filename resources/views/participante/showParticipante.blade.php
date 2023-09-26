<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Nombre de Participante: {{$participante->nombre}}</h2>
    <h3>Nombre de Equipo: {{$participante->nombreEquipo}}</h3>
    <h3>Escuela del Participante: {{$participante->escuela}}</h3>
    <h3>Correo del Participante: {{$participante->correo}}</h3>
    <h3>Numero de equipo: {{$participante->numeroEquipo}}</h3>
    <h3>Pago: {{$participante->pago}}</h3>
    <h3>Nombre de competencia: {{$participante->competencia}}</h3>
</body>
</html>