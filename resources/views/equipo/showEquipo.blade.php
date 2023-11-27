<!DOCTYPE html>
<html lang="es">

<x-plantilla-head>
    <title>Equipo | Detalles</title>
</x-plantilla-head>

<x-plantilla-body>

    <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
        <h2 style="display: inline;"> {{ $equipo -> nombre }}</h2>
        @auth <!--Cuando el usuario este logueado muestrame lo sigiente-->
            <button class="btn btn-primary" onclick="window.location.href = '/participante/create';">Registrar nuevo participante</button>
        @endauth
    </div>

    <div style="display: flex; ">
        <h4 style="margin-right: 15px;">Asesor:</h4>
        <p style="font-size: 18px; margin-bottom: 15px;">{{ $equipo->asesor->nombre }}</p>
    </div>

    <div style="display: flex;">
        <h4 style="margin-right: 15px;"> Competencia: </h4>

        @if($equipo -> competencia)
            <p style="font-size: 18px; margin-right: 8px;"> {{ $equipo->competencia->identificador }} </p>
            <p style="font-size: 18px; margin-bottom: 15px;"> ({{ date('d/m/Y', strtotime($equipo->competencia->fecha)) }}) </p>
        @else
            <p style="font-size: 18px; margin-right: 8px;"> Esta competencia fue temporalmente deshabilitada </p>
        @endif
    </div>

    @if($equipo -> competencia)
        <div style="display: flex;">
            <h4 style="margin-right: 15px;"> Categoria: </h4>
            <p style="font-size: 18px; margin-bottom: 15px;"> {{ $equipo->categoria->nombre }} </p>
        </div>
    @else
        <div style="margin-top: 10px;">
            <form action="{{route('equipo.destroy', $equipo)}}" method = "POST" style="display: inline-block;">
                @csrf
                @method('DELETE')

                <button type="submit" onclick="return confirm('¿Está seguro que desea eliminar de forma permanente este equipo?')" onmouseover="this.style.backgroundColor='#ff6666';" onmouseout="this.style.backgroundColor='red';"  style="background-color: red; color: white;">
                    Eliminar equipo
                </button>
            </form>
        </div>
    @endif

    <div style="margin-top: 25px;">
        <a href="/equipo">Regresar</a> 
    </div>

</x-plantilla-body>

</html>