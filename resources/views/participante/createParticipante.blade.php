<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<body>
    <h1>Formulario de participante</h1>
    <form action="/participante" method="POST">  <!--es importante la / --> 
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @csrf

        <label for="nombre">nombre de participante</label>
        <input type="text" name="nombre" value="{{old('nombre')}}"><br>

        <label for="nombreEquipo">nombre de equipo</label>
        <input type="text" name="nombreEquipo" value="{{old('nombreEquipo')}}"><br>

        <label for="escuela">nombre de escuela</label>
        <input type="text" name="escuela" value="{{old('escuela')}}"><br>

        <label for="correo">correo</label>
        <input type="text" name="correo" value="{{old('correo')}}"><br>

        <label for="numeroEquipo">numero de equipo</label>
        <input type="text" name="numeroEquipo" value="{{old('numeroEquipo')}}"><br>

        <label for="pago">pago</label>
        <input type="text" name="pago" value="{{old('pago')}}"><br>

        <label for="competencia">nombre de competencia</label>
        <input type="text" name="competencia" value="{{old('competencia')}}"><br>

        <input type="submit" value="enviar">


    </form>
</body>
</html>