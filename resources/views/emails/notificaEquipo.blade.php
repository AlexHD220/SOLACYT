
<x-mail::message>

# Equipo Registrado
 
Felicidades!! 
El equipo {{ $equipo -> nombre }} se registró correctamente en la competencia:

<h1>{{ $competencia -> identificador }}</h1>

<a href="{{route('competencia.show', $competencia->id) }}">Ver detalles de la competencia</a>
 
Los esperamos el próximo {{ $competencia -> fecha }}.<br>
<h1><b><i>{{ config('app.name') }}</i></b></h1>

</x-mail::message>