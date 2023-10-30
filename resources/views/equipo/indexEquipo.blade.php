<!DOCTYPE html>
<html lang="es">

<x-plantilla-head>
    <title>Equipos</title>
</x-plantilla-head>

<x-plantilla-body>

        <div class="d-flex justify-content-between align-items-center" style="margin-bottom: 15px;">
            <h1 style="display: inline;">Lista de Equipos</h1>
            @auth <!--Cuando el usuario este logueado muestrame lo sigiente-->
                @if ($asesores->count() > 0)
                    <button class="btn btn-primary" onclick="window.location.href = '/equipo/create';">Registrar nuevo Equipo</button>
                @endif
            @endauth
        </div>


        @foreach ($equipos as $equipo) <!--Listar todos los datos de la tabla equipos-->

            <li>
                <a onmouseover="this.style.color='white'" onmouseout="this.style.color='#6c7293'" href="{{route('equipo.show', $equipo)}}" style="text-decoration: none; color: inherit; display: inline-block;">
                    <b>{{ $equipo -> nombre }}</b>
                </a>
                |
                <a href="{{route('equipo.edit', $equipo)}}" style="display: inline-block;">
                    Editar
                </a>
                <!--|
                <form action="{{route('equipo.destroy', $equipo)}}" method = "POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')

                    <button type = "submit">Eliminar </button>
                </form>-->
            </li>
            <br>
        @endforeach
    </div>
</x-plantilla-body>

</html>