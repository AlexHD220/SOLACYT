<x-layout>

    <h1>Registrar Asesor</h1>

    <form action="/asesor" method="post"> <!--la diagonal me envia al principio de la url "solacyt.test/"-->

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

        <label for="usuario"><b> Usuario: </b></label>
        <input type="text" id="usuario" name="usuario" placeholder="Usuario" required value = "{{ old('usuario') }}"><br><br> <!--value = "{{old('name')}}"-->

        <label for="nombre"><b> Nombre: </b></label>
        <input type="text" name="nombre" required value = "{{ old('nombre') }}"><br><br>

        <label for = "correo"><b>Correo: </b></label>
        <input type="email" name="correo" required value = "{{ old('correo') }}"><br><br>

        <label for = "telefono"><b>Telefono: </b></label>
        <input type="tel" name="telefono" value = "{{ old('telefono') }}"><br><br>

        <label for="escuela"><b> Escuela: </b></label>
        <input type="text" name="escuela" list="listaEscuelas" value = "{{ old('escuela') }}"><br><br>

        <label for="pass"><b> Contraseña: </b></label>
        <input type="password" id="pass" name="pass" required value = "{{ old('pass') }}"><br><br>

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