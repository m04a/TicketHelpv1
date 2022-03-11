<x-user-layout>
    <x-slot name="header">
        <h1 class="title">
            Incidències
        </h1>
    </x-slot>
    <x-slot name="slot">
    <x-create-card>
        <form method="POST" action="">
            @csrf
            <div class="">
            <!-- Name User -->
            <div class="mt-4 column-left">
                <x-label for="usuari" :value="__('Titol Incidència')" />

                <x-input id="nom" class="inpunt-content" type="text" name="nom" required autofocus />
            </div>
                <!-- Subject -->
                <div class="mt-4 column-left">
                    
                    <x-label for="assumpte" :value="__('Assumpte')" />
                    
                    <textarea class="mt-4 textarea"></textarea>

                </div>

                <!-- Rol User -->
                <div class="mt-4 column-right">
                    <x-label for="rol" :value="__('Departament')" />
                    
                    <x-select class="block mt-4 w-full">
                        <option value="1">Departament Informàtica</option>
                        <option value="2">Consergeria</option>
                        <option value="3">Secretaria</option>
                        <option value="4">Direcció</option>
                        <option value="5">Altres</option>
                    </x-select>

                </div>
            </div>
            <!-- Botó -->
            <div class="button-create">
                <x-button class="ml-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                    {{ __('Enviar Incidència') }}
                </x-button>
            </div>
        </form>
    </x-create-card>
    </x-slot>
</x-user-layout>