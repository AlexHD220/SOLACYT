<!DOCTYPE html>
<html lang="es">

<x-plantilla-head>
    <title>Categoría | Editar</title>
</x-plantilla-head>

<x-plantilla-body>

    <h1 style="margin-bottom: 15px;">Editar Categoría</h1>

    <!--editar formulario por medio de la direccion de route:list, esto porque como no tengo un archivo, necesito mandar llamar a la ruta de la lista asesor.update-->
    <form action="{{ route('competencia.update', $competencia)}}" method="post"> <!--la diagonal me envia al principio de la url "solacyt.test/"-->

        <!--Mostrar errores-->
        @if ($errors->any())
            <div class="msgAlerta">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <br>
        @endif

        @csrf <!--permite entrar al formulario muy importante agregar-->
        @method ('PATCH') <!--permite truquear nuestro formulario para editar la informacion-->


        <label for="identificador"><b> Identificador: </b></label>
        <input type="text" id="identificador" name="identificador" placeholder="Identificador" required value = "{{old('identificador') ?? $competencia -> identificador}}"><br><br> <!--value = "{{old('name')}}"-->

        <label for = "fecha"><b>Fecha: </b></label>
        <input type="date" name="fecha" value = "{{old('fecha') ?? $competencia -> fecha}}" min="{{ now()->toDateString() }}" max="{{ now()->addYears(2)->toDateString() }}"><br><br>

        <label for = "duracion"><b>Duración: </b></label>
        <input type="number" name="duracion" id="duracion" value = "{{old('duracion') ?? $competencia -> duracion}}" min="1" max="100" step="1" style="width: 50px;"> días <br><br>

        <label for="tipo"><b>Tipo: </b></label>
        <select name="tipo">
            <option value="Equipo" @selected( (old('tipo') ?? $competencia->tipo) == 'Equipo')>Equipo</option>
            <option value="Proyecto" @selected( (old('tipo') ?? $competencia->tipo) == 'Proyecto')>Proyecto</option>
        </select><br><br>

        <input type="submit" value="Actualizar" style="margin-top: 10px;">
        <a href="{{ route('competencia.index') }}" style="margin-left:10px;">Cancelar</a>
    </form>

    </x-plantilla-body>

</html>