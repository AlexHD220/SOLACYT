<x-layout>

    <h1>Editar Asesor</h1>

    <!--editar formulario por medio de la direccion de route:list, esto porque como no tengo un archivo, necesito mandar llamas a la ruta de la lista asesor.update-->
    <form action="{{ route('asesor.update', $asesor)}}" method="post"> <!--la diagonal me envia al principio de la url "solacyt.test/"-->

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
        @method ('PATCH') <!--permite truquear nuestro formulario para editar la informacion-->

        <label for="usuario"><b> Usuario: </b></label>
        <input type="text" id="usuario" name="usuario" placeholder="Usuario" required value = "{{$asesor -> usuario}}"><br><br>

        <label for="nombre"><b> Nombre: </b></label>
        <input type="text" name="nombre" required value = "{{old('pass') ?? $asesor -> nombre}}"><br><br>

        <label for = "correo"><b>Correo: </b></label>
        <input type="email" name="correo" required value = "{{old('pass') ?? $asesor -> correo}}"><br><br>

        <label for = "telefono"><b>Telefono: </b></label>
        <input type="tel" name="telefono" value = "{{old('pass') ?? $asesor -> telefono}}"><br><br>

        <label for="escuela"><b> Escuela: </b></label>
        <input type="text" name="escuela" list="listaEscuelas" value = "{{old('pass') ?? $asesor -> escuela}}"><br><br>


        <input type="submit" value="Actualizar">
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