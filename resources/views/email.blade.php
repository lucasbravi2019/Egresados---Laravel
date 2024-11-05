<x-app-layout>
    <x-notification />

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Panel de Usuario
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                @if (count($emails) > 0)
                    <x-email-grid :emails="$emails"/>
                @else
                    <div class="p-6 text-gray-900">
                        No hay emails
                    </div>
                @endif
            </div>
            <div class="px-auto sm:-my-px sm:ms-10 sm:flex py-6 w-max place-self-center">
                <x-nav-link class="w-full" :href="route('email.create')" :active="request()->routeIs('email.create')">
                    {{ __('Nuevo email') }}
                </x-nav-link>
            </div>
        </div>
    </div>
</x-app-layout>
