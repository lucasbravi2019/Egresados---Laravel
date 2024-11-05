<x-app-layout>
    <x-notification />

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel de Usuario') }}
        </h2>
    </x-slot>

    <h1>Solicitudes</h1>

    <div class="py-12">
    @if ($isAdmin)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-solicitud-grid text="Solicitudes Pendientes" :solicitudes="$solicitudes->pendientes" editable="true"/>
            <x-solicitud-grid text="Solicitudes Aprobadas" :solicitudes="$solicitudes->aprobadas"/>
            <x-solicitud-grid text="Solicitudes Rechazadas" :solicitudes="$solicitudes->rechazadas"/>
        </div>
    @else
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <x-solicitud-grid text="Solicitudes Pendientes" :solicitudes="$solicitudes->pendientes"/>
                <x-solicitud-grid text="Solicitudes Aprobadas" :solicitudes="$solicitudes->aprobadas"/>
                <x-solicitud-grid text="Solicitudes Rechazadas" :solicitudes="$solicitudes->rechazadas"/>
            </div>
        </div>
    @endif
    </div>
</x-app-layout>
