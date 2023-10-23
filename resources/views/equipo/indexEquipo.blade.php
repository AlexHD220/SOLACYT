<!DOCTYPE html>
<html lang="es">

<x-plantilla-head>
    <title>Equipos</title>
</x-plantilla-head>

<x-plantilla-body>

        <div class="d-flex justify-content-between align-items-center" style="margin-bottom: 15px;">
            <h1 style="display: inline;">Listado de Equipos</h1>
            @auth <!--Cuando el usuario este logueado muestrame lo sigiente-->
                <button class="btn btn-primary" onclick="window.location.href = '/equipo';">Registrar nuevo equipo</button>
            @endauth
        </div>
        
    </div>
</x-plantilla-body>

</html>