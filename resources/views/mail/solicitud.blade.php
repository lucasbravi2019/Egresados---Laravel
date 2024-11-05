<x-mail::message>
# Nueva Solicitud

Tiene pendiente de revisión una nueva solicitud.

<p>
    Usuario: {{$solicitud->user->email}}
</p>
<p>
    Carrera: {{$solicitud->career->description}}
</p>

<x-mail::button url="http://integrador.test/dashboard">
Ver Solicitud
</x-mail::button>

Gracias,<br>
{{ config('app.name') }}
</x-mail::message>
