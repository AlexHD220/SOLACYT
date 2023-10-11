<x-layout>

    <h1>Registrar Asesor</h1>

    <!--<form action = "{{ route('competencia.store') }}">-->

    <form action="/competencia" method="post"> <!--la diagonal me envia al principio de la url "solacyt.test/"-->

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @csrf <!--permite entrar al formulario muy importante agregar-->

        <label for="identificador"><b> Identificador: </b></label>
        <input type="text" id="identificador" name="identificador" placeholder="identificador" required value = "{{ old('identificador') }}"><br><br> <!--value = "{{old('name')}}"-->

        <label for = "fecha"><b>Fecha: </b></label>
        <input type="number" name="fecha" value = "{{ old('fecha') }}"><br><br>

        <label for = "asesor_id"><b>Asesor: </b></label>
        <select name="asesor_id">
            @foreach($asesores as $asesor)
                <option value="{{ $asesor -> id }}">
                    {{ $asesor->nombre }}
                </option>
            @endforeach
        </select>

        <input type="submit" value="Registrar">
    </form>

    <br>
    <button onclick="window.location.href = '/asesor';">Cancelar</button>

    <datalist id="listaEscuelas">
    <option value="Centro Universitario de Ciencias Exactas e Ingenierias">
    <option value="Centro Universitario de Ciencias Economico Administrativas">
    <option value="Colegio Republica Mexicana">
    <option value="Colegio Rafael Guizar">
    <option value="Colegio Versalles">
    <option value="Universidad Autonoma del Valle de Mexico">
    </datalist>

</x-layout>