<x-app-layout>

        <x-slot name="header">
            <h1 class="title">
                Editar Usuari
            </h1>
        </x-slot>
        @if(session('success'))
                <x-success-alert class="m-6">
                    {{ session('success') }}
                </x-success-alert>
            @endif
            @if ($errors->any())

                <x-error-alert class="m-6">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </x-error-alert>

            @endif
    <x-create-card>
        <form method="POST" action="">
            @csrf
            @method('PUT')
            <div class="content-column">
            <!-- Name User -->
            <div class="column-left">
                <x-label for="usuari" :value="__('Nom Usuari')" />

                <x-input id="nom" class="input-content" type="text" name="username" value="{{ $users->username }}" autofocus />
            </div>

            <!-- Email User -->
            <div class="column-right">
                <x-label for="email" :value="__('Correu Electronic')" />

                <x-input id="email" class="input-content" type="email" name="email" value="{{ $users->email }}" autofocus />
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
                <a href="{{ url('admin/users') }}">
                    <x-button type="button" class="ml-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                            {{ __('Llistat') }}
                    </x-button>
                </a>
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
