<x-app-layout>

        <x-slot name="header">
            <h1 class="title">
                Crear Usuari
            </h1>
        </x-slot>
        @if(session('success'))
            <x-success-alert id="message" class="transition-success-messages">
                {{ session('success') }}
            </x-success-alert>
         @endif

        @if ($errors->any())
            <x-error-alert id="message" class="transition-error-messages">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </x-error-alert>
        @endif
<x-create-card>
        <form method="POST" action="{{ url('admin/users/store') }}">
            @csrf
            <div class="content-column">
                <!-- Name User -->
                <div class="mt-4 column-left">
                    <x-label for="usuari" :value="__('Nom Usuari')" />

                    <x-input id="nom" class="input-content" type="text" name="username" max=50 min=4 autofocus required />
                </div>

                <!-- Rol User -->
                <div class="mt-4 column-right">

                    <x-label for="email" :value="__('Correu Electronic')" />

                    <x-input id="email" class="input-content" type="email" name="email"  autofocus required />

                </div>

            </div>

            <input type="hidden" name="role_id" value=1 id="content">

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
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                    {{ __('Crear Usuari') }}
                </x-button>
            </div>
        </form>
    </x-create-card>
</x-app-layout>
