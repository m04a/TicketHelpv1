<x-app-layout>

        <x-slot name="header">
            <h1 class="title">
                Crear Zona
            </h1>
        </x-slot>
        @if(session('success'))
            <x-success-alert id="message" class="m-6">
                {{ session('success') }}
            </x-success-alert>
        @endif
        @if ($errors->any())

            <x-error-alert id="message" class="m-6">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </x-error-alert>

        @endif
<x-create-card>
        <form method="POST" action="{{ route('admin.zones.store') }}">
            @csrf
            <!-- Name Zone -->
                <!-- Name User -->
                <div class="column-left">
                    <x-label name="label" :value="__('Nom')" />

                    <x-input id="name" class="input-content" type="text" name="name" autofocus />
                </div>

                <!-- Missatge -->
                <div class="mt-4">
                    <x-label class="label" for="missatge" :value="__('Missatge')" />

                    <textarea id="description" class="textarea" type="text" name="description" autofocus></textarea>
                </div>
            <div class="buttons right nowrap"> 
                <a href="{{ url('admin/zones') }}">
                    <x-button type="button" class="ml-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                            {{ __('Llistat') }}
                    </x-button>
                </a>
                <x-button class="ml-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        {{ __('Crear') }}
                </x-button>
            </div>  
        </form>
    </x-create-card>
</x-app-layout>
