<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2> Usuario: {{ $asesor -> usuario }}</h2> <!--Mostrar detalles-->
    <h3> Nombre: {{ $asesor -> nombre }}</h3>
    <h3> Correo electronico: {{ $asesor -> correo }}</h3>

    @if (!empty($asesor->telefono))
        <h3> Teléfono: {{ $asesor->telefono }}</h3>
    @endif

    @if (!empty($asesor->escuela))
        <h3> Escuela: {{ $asesor->escuela }}</h3>
    @endif

    <a href="/asesor">Regresar</a> 
</body>
</html>