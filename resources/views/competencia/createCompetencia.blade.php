<!DOCTYPE html>
<html lang="es">

<x-plantilla-head>
    <title>Competencia | Formulario</title>
</x-plantilla-head>

<x-plantilla-body>
    
    <h1 style="margin-bottom: 15px;">Registrar Competencia</h1>

    <!--<form action = "{{ route('competencia.store') }}">-->

    <form action="/competencia" method="post"> <!--la diagonal me envia al principio de la url "solacyt.test/"-->

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

        <label for="identificador"><b> Identificador: </b></label>
        <input type="text" id="identificador" name="identificador" placeholder="Identificador" required value = "{{ old('identificador') }}"><br><br> <!--value = "{{old('name')}}"-->

        <label for = "fecha"><b>Fecha: </b></label>
        <input type="date" name="fecha" value = "{{ old('fecha') }}" min="{{ now()->toDateString() }}" max="{{ now()->addYears(2)->toDateString() }}"><br><br>

        <label for = "duracion"><b>Duración: </b></label>
        <input type="number" name="duracion" id="duracion" value = "{{ old('duracion') }}" min="1" max="100" step="1" style="width: 50px;"> días <br><br>

        <label for = "asesor_id"><b>Asesor: </b></label>
        <select name="asesor_id">
            <option selected>Selecciona una opción</option>
            @foreach($asesores as $asesor)
                <option value="{{ $asesor -> id }}" @if(old('asesor_id') == $asesor->id) selected @endif>
                    {{ $asesor->nombre }}
                </option>
            @endforeach
        </select><br><br>

        <label for="tipo">Tipo: </label>
        <select name="tipo">
            <option selected> - </option>
            <option value="Equipo" @selected(old('tipo') == 'Equipo')>Equipo</option>
            <option value="Proyecto" @selected(old('tipo') == 'Proyecto')>Proyecto</option>
        </select><br><br>

        <label for = "Categorias:" style="margin-bottom: 5px;"><b>Categorías: </b></label><br>
        <select name="categoria_id[]" multiple style="width: 200px;"> <!--Seleccion multiple []-->
            @foreach($categorias as $categoria)
                <option value="{{ $categoria -> id }}" @selected(array_search($categoria->id, old('categoria_id') ?? []) !== false)>
                    {{ $categoria->nombre }}
                </option>
            @endforeach
        </select><br><br>


        <input type="submit" value="Registrar" style="margin-top: 10px;">
        <a href="{{ route('competencia.index') }}" style="margin-left:10px;">Cancelar</a>

    </form>

    <!--<br>
    <button onclick="window.location.href = '/competencia';">Cancelar</button>-->

</x-plantilla-body>