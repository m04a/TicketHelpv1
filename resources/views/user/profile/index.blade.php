<x-user-layout>

    <x-slot name="header">
        <h1 class="title">
            Perfil
        </h1>
    </x-slot>
<x-create-card>
    <form method="POST" action="{{ url("/user/profile/".$users[0]['id']) }}">
        @csrf
        @method('PUT')
        @if(session('success'))
            <x-success-alert class="mb-2">
                {{ session('success') }}
            </x-success-alert>
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
        <div class="content-column">
            <!-- Password -->
            <div class="mt-4 column-left">
                <x-button type="submit">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Has olvidat el password?') }}
                        </a>
                    @endif
                </x-button>
            </div>
        </div>
        <div class="button-create">
            <x-button class="ml-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
                                <x-button type="submit">
                    {{ __('Enviar enllaç de reset') }}
                </x-button>
            </x-button>
        </div>
    </form>
</x-create-card>
</x-user-layout>
