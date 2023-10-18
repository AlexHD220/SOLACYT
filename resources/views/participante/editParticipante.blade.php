<!DOCTYPE html>
<html lang="es">

<x-plantilla-head>
    <title>Participante | Editar</title>
</x-plantilla-head>


<x-plantilla-body>

    <h1 style="margin-bottom: 15px;">Editar Asesor</h1>

    <h1>Formulario de participante</h1>
    <form action="{{route('participante.update', $participante)}}" method="POST">  <!--es importante la / --> 
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br>
        @endif

        @csrf
        @method('PATCH')

        <label for="nombre">nombre de participante</label>
        <input type="text" name="nombre" value="{{old('nombre') ?? $participante->nombre}}"><br>

        <label for="nombreEquipo">nombre de equipo</label>
        <input type="text" name="nombreEquipo" value="{{old('nombreEquipo') ?? $participante->nombreEquipo}}"><br>

        <label for="escuela">nombre de escuela</label>
        <input type="text" name="escuela" list="listaEscuelas" value="{{old('escuela') ?? $participante->escuela}}"><br>

        <label for="correo">correo</label>
        <input type="text" name="correo" value="{{old('correo') ?? $participante->correo}}"><br>

        <label for="numeroEquipo">numero de equipo</label>
        <input type="text" name="numeroEquipo" value="{{old('numeroEquipo') ?? $participante->numeroEquipo}}"><br>

        <label for="pago">pago</label>
        <input type="text" name="pago" value="{{old('pago') ?? $participante->pago}}"><br>

        <label for="competencia">nombre de competencia</label>
        <input type="text" name="competencia" value="{{old('competencia') ?? $participante->competencia}}"><br>

        <input type="submit" value="enviar">

        

        <datalist id="listaEscuelas">
            <option value="Centro Universitario de Ciencias Exactas e Ingenierias">
            <option value="Centro Universitario de Ciencias Economico Administrativas">
            <option value="Colegio Republica Mexicana">
            <option value="Colegio Rafael Guizar">
            <option value="Colegio Versalles">
            <option value="Universidad Autonoma del Valle de Mexico">
        </datalist>


    </form>

    <br>
    <button onclick="window.location.href = '/participante';">Cancelar</button>

</x-plantilla-body>
</html>