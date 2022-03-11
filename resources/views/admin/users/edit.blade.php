<x-app-layout>

        <x-slot name="header">
            <h1 class="title">
                Editar Usuari
            </h1>
        </x-slot>
<x-create-card>
        <form method="POST" action="">
            @csrf
            <div class="content-column">
            <!-- Name User -->
            <div class="column-left">
                <x-label for="usuari" :value="__('Nom Usuari')" />

                <x-input id="nom" class="input-content" type="text" name="nom" value="Mohamed" required autofocus />
            </div>

            <!-- Email User -->
            <div class="column-right">
                <x-label for="email" :value="__('Correu Electronic')" />

                <x-input id="email" class="input-content" type="email" name="email" value="mohamed@cendrassos.net" required autofocus />
            </div>
            </div>
            <div class="content-column">
                <!-- Password -->
                <div class="mt-4 column-left">
                    <x-label for="password" :value="__('Contrasenya')" />

                    <x-input id="password" class="input-content"
                                    type="password"
                                    name="password"
                                    value="1234567890"
                                    required autocomplete="current-password" />
                </div>
                <!-- Rol User -->
                <div class="mt-4 column-right">
                    <x-label for="rol" :value="__('Tria el Rol del Usuari')" />
                    
                    <x-select class="block mt-4 w-full" >
                        <option value="1">Administrador</option>
                        <option value="2">Usuari</option>
                        <option value="3">Moderador</option>
                    </x-select>

                </div>
            </div>
            <div class="button-create">
                <x-button class="ml-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                    {{ __('Guardar Canvis') }}
                </x-button>
            </div>
        </form>
    </x-create-card>
</x-app-layout>
