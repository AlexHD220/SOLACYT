<!DOCTYPE html>
<html lang="es">

<x-plantilla-head>
    <title>Categorías</title>
</x-plantilla-head>

<x-plantilla-body>

    <div>
        <div class="d-flex justify-content-between align-items-center" style="margin-bottom: 15px;">
            <h1 style="display: inline;">Listado de Categorías</h1>
            
            <button class="btn btn-primary" onclick="window.location.href = '/categoria/create';">Registrar nueva categoría</button>
        </div>

        @foreach ($categorias as $categoria) <!--Listar todos los datos de la tabla categorias -->

            <li style="display: inline-block; margin-bottom: 5px;">
                <b>{{ $categoria -> nombre }}</b>
                |
                <a href="{{route('categoria.edit', $categoria)}}">
                    Editar
                </a>
            </li>
            <p style="text-align: justify; max-width: 80%;">{{ $categoria -> descripcion}}</p>
            <br>
        @endforeach
    </div>
</x-plantilla-body>

</html>