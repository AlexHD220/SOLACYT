<!DOCTYPE html>
<html lang="es">


<x-plantilla-head>
    <title>Participante | Formulario</title>
</x-plantilla-head>


<x-plantilla-body>
    <h1>Formulario de participante</h1>
    <form action="/participante" method="POST">  <!--   --> 
        @if ($errors->any())
            <div class="msgAlerta">
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
        <!-- <label for="usuario"><b> Usuario: </b></label>
        <input type="text" id="usuario" name="usuario" placeholder="Usuario" required value = "{{ old('usuario') }}"><br><br> -->

        <label for="nombreEquipo">nombre de equipo</label>
        <input type="text" name="nombreEquipo" value="{{old('nombreEquipo')}}"><br>

        <label for="escuela">nombre de escuela: </label>
        <input type="text" name="escuela" list="listaEscuelas" value="{{old('escuela')}}"><br>


       <!-- <label for="escuela"><b> Escuela: </b></label>
        <input type="text" name="escuela" list="listaEscuelas" value = "{{ old('escuela') }}"><br><br>
-->



        <label for="correo">correo</label>
        <input type="text" name="correo" value="{{old('correo')}}"><br>

        <label for="numeroEquipo">numero de equipo</label>
        <input type="text" name="numeroEquipo" value="{{old('numeroEquipo')}}"><br>

        <label for="pago">pago</label>
        <input type="text" name="pago" value="{{old('pago')}}"><br>

        <label for="competencia">nombre de competencia</label>
        <input type="text" name="competencia" value="{{old('competencia')}}"><br>

        <input type="submit" value="enviar" style="margin-top: 10px;">

        

        <datalist id="listaEscuelas">
            <option value="Centro Universitario de Ciencias Exactas e Ingenierias">
            <option value="Centro Universitario de Ciencias Economico Administrativas">
            <option value="Colegio Republica Mexicana">
            <option value="Colegio Rafael Guizar">
            <option value="Colegio Versalles">
            <option value="Universidad Autonoma del Valle de Mexico">
        </datalist>
    </form>


    <button onclick="window.location.href = '/participante';">Cancelar</button>
</x-plantilla-body>


</html>