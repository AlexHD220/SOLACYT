<x-layout>
    <h2> Usuario: {{ $asesor -> usuario }}</h2> <!--Mostrar detalles-->
    <h3> Nombre: {{ $asesor -> nombre }}</h3>
    <h3> Correo electronico: {{ $asesor -> correo }}</h3>

    @if (!empty($asesor->telefono))
        <h3> Teléfono: {{ $asesor->telefono }}</h3>
    @endif

    @if (!empty($asesor->escuela))
        <h3> Escuela: {{ $asesor->escuela }}</h3>
    @endif

    <a href="/asesor">Regresar</a> 
</x-layout>