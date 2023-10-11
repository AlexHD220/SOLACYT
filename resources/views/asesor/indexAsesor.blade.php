<x-layout>
    <h1>Listado de Asesores</h1>
    @foreach ($asesores as $asesor) <!--Listar todos los datos de la tabla asesores-->

        <li>
            <a href="{{route('asesor.show', $asesor)}}" style="text-decoration: none; color: inherit; display: inline-block;">
                <b>{{ $asesor -> nombre }}</b>
            </a>
            |
            <a href="{{route('asesor.edit', $asesor)}}" style="display: inline-block;">
                Editar
            </a>
            |
            <form action="{{route('asesor.destroy', $asesor)}}" method = "POST" style="display: inline-block;">
                @csrf
                @method('DELETE')

                <button type = "submit">Eliminar </button>
            </form>
        </li>
        <br>
    @endforeach

    <br>
    <button onclick="window.location.href = '/asesor/create';">Registrar nuevo asesor</button>
</x-layout>