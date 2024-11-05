<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel de Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    <form method="POST" action="{{ route('career.update', $career->id) }}">
                        @csrf
                        @method('PUT')

                        <div>
                            <x-input-label for="description" :value="__('Carrera')" />
                            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="$career->description" required autofocus autocomplete="description" />
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Editar') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</x-app-layout>
