<!DOCTYPE html>
<html lang="es">

<x-plantilla-head>
    <title>Categorías | Mostrar</title>
</x-plantilla-head>

<x-plantilla-body>
    <div class="justify-center" style="text-align: center;">
        <p style="margin-bottom: 0px;"> Categoria:</p> 
        <h1 style="margin-bottom: 10px;">{{ $categoria -> nombre }}</h1>
        <p style="margin-left: 100px; margin-right: 100px;">{{ $categoria -> descripcion}}</p>
    </div>

</x-plantilla-body>

</html>