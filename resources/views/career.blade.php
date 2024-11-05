<x-app-layout>
    <x-notification />

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel de Usuario') }}
        </h2>
    </x-slot>

    <h1>Carreras</h1>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                @if (count($careers) > 0)
                    <x-career-grid :careers="$careers"/>
                @else
                    <div class="p-6 text-gray-900 text-center bg-white">
                        No hay carreras
                    </div>
                @endif
            </div>
            <div class="px-auto sm:-my-px sm:ms-10 sm:flex py-6 w-max place-self-center">
                <x-nav-link class="w-full" :href="route('career.create')" :active="request()->routeIs('career.create')">
                    {{ __('Nueva Carrera') }}
                </x-nav-link>
            </div>
        </div>
    </div>
</x-app-layout>
