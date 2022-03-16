<x-user-layout>

    <x-slot name="header">
        <h1 class="title">
            Editar sugerencia
        </h1>
    </x-slot>
    <x-create-card-user>
        <form method="POST" action="">
            @csrf
            <div class="content-column">
                <!-- Name User -->
                <div class="column-left">
                    <x-label for="usuari" :value="__('Assumpte')" />

                    <x-input id="nom" class="input-content" type="text" name="nom" value="{{ $suggestion->title }}" required autofocus />
                </div>
            </div>
            <div class="content-column">
                <div class="column-left">
                <div class="mb-6" >
                    <div class="text-black font-bold rounded-t py-2">
                        Text de sugerencia
                    </div>
                    <textarea class="textarea">{{ $suggestion->description }}</textarea>
                </div>
                </div>
            </div>
            <div class="button-create">
                <x-button type="submit" class="ml-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    {{ __('Guardar Canvis') }}
                </x-button>
            </div>
        </form>
    </x-create-card-user>
</x-user-layout>
