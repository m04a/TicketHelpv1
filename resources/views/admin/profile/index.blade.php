<x-app-layout>

    <x-slot name="header">
        <h1 class="title">
            Editar Usuari
        </h1>
    </x-slot>
<x-create-card>
    <form method="POST" action="{{ url("/admin/profile/".$users[0]['id']) }}">
        @csrf
        @method('PUT')
        @if(session('success'))
            <x-success-alert class="mb-2">
                {{ session('success') }}
            </x-success-alert>
        @endif
        @if(session('error'))
            <x-error-alert class="mb-2">
                {{ session('error') }}
            </x-error-alert>
        @endif
        @if ($errors->any())

                    <x-error-alert class="mb-2">
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </x-error-alert>

        @endif
        <div class="content-column">
        <!-- Name User -->
        <div class="column-left">
            <x-label for="usuari" :value="__('Nom Usuari')" />

            <x-input id="nom" class="input-content" type="text" name="username" value="{{ $users[0]['username'] }}" required  autofocus required />
        </div>

        <!-- Email User -->
        <div class="column-right">
            <x-label for="email" :value="__('Correu Electronic')" />

            <x-input id="email" class="input-content" type="email" name="email" value="{{ $users[0]['email'] }}" required  autofocus required />
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
<x-create-card>
    <form method="POST" action="{{ url('/admin/profile/reset') }}">
        @csrf
        <div class="content-column">
        <!-- Email User -->
        <div class="column-right">
            <x-label for="email" :value="__('Reset Password')" />

            <x-input id="email" class="input-content" type="hidden" name="email" value="{{ $users[0]['email'] }}" required  autofocus required />
        </div>
        </div>
        <div class="button-create">
            <x-button class="ml-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
                {{ __('Enviar enllaç de reset') }}
            </x-button>
        </div>
    </form>
</x-create-card>
    <x-create-card>
        <h1> Vincular usuari a un proveidor de correu</h1>
        <div class="content-column">
            <!-- Name User -->
            <!-- Email User -->
            <div class="column-left">
                <a href="{{ url('/auth/github/redirect') }}">
                    <div class="hover:fill-gray-50 mb-3 text-center bg-transparent hover:bg-gray-700 text-gray-900 font-semibold hover:text-white py-3  border border-gray-600 hover:border-transparent transition ease-in-out duration-150">
                        <svg class="icon mr-1 0" xmlns="http://www.w3.org/2000/svg" width="32px" height="32px" viewBox="0 0 32 32">
                            <path d="M16 0.396c-8.839 0-16 7.167-16 16 0 7.073 4.584 13.068 10.937 15.183 0.803 0.151 1.093-0.344 1.093-0.772 0-0.38-0.009-1.385-0.015-2.719-4.453 0.964-5.391-2.151-5.391-2.151-0.729-1.844-1.781-2.339-1.781-2.339-1.448-0.989 0.115-0.968 0.115-0.968 1.604 0.109 2.448 1.645 2.448 1.645 1.427 2.448 3.744 1.74 4.661 1.328 0.14-1.031 0.557-1.74 1.011-2.135-3.552-0.401-7.287-1.776-7.287-7.907 0-1.751 0.62-3.177 1.645-4.297-0.177-0.401-0.719-2.031 0.141-4.235 0 0 1.339-0.427 4.4 1.641 1.281-0.355 2.641-0.532 4-0.541 1.36 0.009 2.719 0.187 4 0.541 3.043-2.068 4.381-1.641 4.381-1.641 0.859 2.204 0.317 3.833 0.161 4.235 1.015 1.12 1.635 2.547 1.635 4.297 0 6.145-3.74 7.5-7.296 7.891 0.556 0.479 1.077 1.464 1.077 2.959 0 2.14-0.020 3.864-0.020 4.385 0 0.416 0.28 0.916 1.104 0.755 6.4-2.093 10.979-8.093 10.979-15.156 0-8.833-7.161-16-16-16z"/>
                        </svg>
                        <span class="align-middle">Github </span>
                    </div>
                </a>
                <a href="{{ url('/auth/google/redirect') }}">
                    <div class="hover:fill-red-100 mb-3 text-center bg-transparent hover:bg-red-700 text-red-900 font-semibold hover:text-white py-3  border border-red-600 hover:border-transparent transition ease-in-out duration-150">
                        <svg class="icon mr-1 0" xmlns="http://www.w3.org/2000/svg" viewBox="1 2 20 20">
                            <path d="M20.283 10.356h-8.327v3.451h4.792c-.446 2.193-2.313 3.453-4.792 3.453a5.27 5.27 0 0 1-5.279-5.28 5.27 5.27 0 0 1 5.279-5.279c1.259 0 2.397.447 3.29 1.178l2.6-2.599c-1.584-1.381-3.615-2.233-5.89-2.233a8.908 8.908 0 0 0-8.934 8.934 8.907 8.907 0 0 0 8.934 8.934c4.467 0 8.529-3.249 8.529-8.934 0-.528-.081-1.097-.202-1.625z"/>
                        </svg>
                        <span class="align-middle"> Google</span>
                    </div>
                </a>
            </div>
        </div>
    </x-create-card>
</x-app-layout>
