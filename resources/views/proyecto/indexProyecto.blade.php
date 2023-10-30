<!DOCTYPE html>
<html lang="es">

<x-plantilla-head>
    <title>Proyectos</title>
</x-plantilla-head>

<x-plantilla-body>

        <div class="d-flex justify-content-between align-items-center" style="margin-bottom: 15px;">
            <h1 style="display: inline;">Lista de Proyectos</h1>
            @auth <!--Cuando el usuario este logueado muestrame lo sigiente-->
                @if ($asesores->count() > 0)
                    <button class="btn btn-primary" onclick="window.location.href = '/proyecto/create';">Registrar nuevo Proyecto</button>
                @endif
            @endauth
        </div>


        @foreach ($proyectos as $proyecto) <!--Listar todos los datos de la tabla Proyectos-->

            <li>
                <a onmouseover="this.style.color='white'" onmouseout="this.style.color='#6c7293'" href="{{route('proyecto.show', $proyecto)}}" style="text-decoration: none; color: inherit; display: inline-block; margin-bottom: 5px;">
                    <b>{{ $proyecto -> nombre }}</b>
                </a>
                |
                <a href="{{route('proyecto.edit', $proyecto)}}" style="display: inline-block;">
                    Editar
                </a>
                <!--|
                <form action="{{route('proyecto.destroy', $proyecto)}}" method = "POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')

                    <button type = "submit">Eliminar </button>
                </form>-->
            </li>
            <p style="text-align: justify; max-width: 80%; margin-left: 22px;">{{ $proyecto -> descripcion}}</p>
            <br>
        @endforeach
    </div>
</x-plantilla-body>

</html>