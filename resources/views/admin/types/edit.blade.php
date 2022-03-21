<x-app-layout>

    <x-slot name="header">
        <h1 class="title">
            Editar tipus
        </h1>
    </x-slot>
    <x-create-card>
        <form method="POST" action="">
            @csrf
            <div class="content-column">
                <!-- Name User -->
                <div class="column-left">
                    <x-label for="etiqueta" :value="__('Etiqueta del tipus')" />

                    <x-input id="label" class="input-content" type="text" name="label" placeholder="Switch" value="{{$types->label}}" required
                        autofocus />
                </div>

                <!-- Email User -->
                <div class="column-right">
                    <x-label for="Descipció" :value="__('Descripció')" />

                    <x-input id="Description" class="input-content" type="text" name="description" value="{{$types->description}}" required
                        autofocus />
                </div>
            </div>
            <div class="button-create">
                <x-button class="ml-3">
                <svg class="w-6 h-6 mr-2" data-darkreader-inline-stroke="" fill="none" stroke="currentColor" style="--darkreader-inline-stroke:currentColor;" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
                    {{ __('Guardar Canvis') }}
                </x-button>
            </div>
        </form>
    </x-create-card>
</x-app-layout>
