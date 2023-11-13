<!--<h1> Se creo el asesor {{ $asesor -> nombre }}. </h1>-->

<x-mail::message>
# Asesor creado
 
Se creo el asesor {{ $asesor -> nombre }}.

<a href="{{route('asesor.show', $asesor->id) }}">Ver asesor</a>
 
Thanks,<br>
{{ config('app.name') }}
</x-mail::message>