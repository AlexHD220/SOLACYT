<!DOCTYPE html>
<html lang="es">

<x-plantilla-head>
    <title>Proyecto | Editar</title>
</x-plantilla-head>

<x-plantilla-body>

    <h1 style="margin-bottom: 15px;">Editar proyecto</h1>

    <!--editar formulario por medio de la direccion de route:list, esto porque como no tengo un archivo, necesito mandar llamas a la ruta de la lista asesor.update-->
    <form action="{{ route('proyecto.update', $proyecto)}}" method="post"> <!--la diagonal me envia al principio de la url "solacyt.test/"-->

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

        <label for="nombre"><b> Nombre: </b></label>
        <input type="text" id="nombre" name="nombre" placeholder="Nombre del proyecto" required value = "{{old('nombre') ?? $proyecto -> nombre}}"><br><br>

        <label for="descripcion" style="margin-bottom: 5px;"><b> Descripción: </b></label><br>
        <textarea id="descripcion" name="descripcion" rows="4" style="resize: none; width: 400px;">{{old('descripcion') ?? $proyecto -> descripcion}}</textarea><br><br>


        <label for="asesor" style="margin-bottom: 5px;"><b> Asesor: </b></label><br>
        <select name="asesor_id">
            <option selected>Selecciona una opción</option>
            @foreach($asesores as $asesor)
                <option value="{{ $asesor -> id }}" @if(old('asesor_id') == $asesor->id || $proyecto->asesor_id == $asesor->id) selected @endif>
                    {{ $asesor->nombre }}
                </option>
            @endforeach
        </select><br><br>

        <label for="competencia" style="margin-bottom: 5px;"><b> Competencia: </b></label><br>
        <select name="competencia_id">
            <option selected>Selecciona una opción</option>
            @foreach($competencias as $competencia)
                <option value="{{ $competencia -> id }}" @if(old('competencia_id') == $competencia->id || $proyecto->competencia_id == $competencia->id) selected @endif>
                    {{ $competencia->identificador }}
                </option>
            @endforeach
        </select><br><br>


        <input type="submit" value="Actualizar" style="margin-top: 10px;">
        <a href="{{ route('proyecto.index') }}" style="margin-left:10px;">Cancelar</a>
    </form>

    </x-plantilla-body>

</html>