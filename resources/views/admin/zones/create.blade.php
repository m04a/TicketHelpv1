<x-app-layout>

        <x-slot name="header">
            <h1 class="title">
                Crear Zona
            </h1>
        </x-slot>
<x-create-card>
        <form method="POST" action="{{ route('admin.zones.store') }}">
            @csrf
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
            <!-- Name Zone -->
                <!-- Name User -->
                <div class="column-left">
                    <x-label name="label" :value="__('Nom')" />

                    <x-input id="nom" class="input-content" type="text" name="label" required autofocus />
                </div>

                <!-- Missatge -->
                <div class="mt-4">
                    <x-label class="label" for="missatge" :value="__('Missatge')" />

                    <textarea class="textarea" type="text" name="description" autofocus></textarea>
                </div>
            <div class="buttons right nowrap"> 
                <div class="button-create">
                    <x-button class="ml-3">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.066 11.2a1 1 0 000 1.6l5.334 4A1 1 0 0019 16V8a1 1 0 00-1.6-.8l-5.333 4zM4.066 11.2a1 1 0 000 1.6l5.334 4A1 1 0 0011 16V8a1 1 0 00-1.6-.8l-5.334 4z">
                        </path>
                    </svg>
                    <a href="{{ route ('admin.zones.index') }}">Tornar</a>                    

                    </x-button>
                </div>
                <div class="button-create">
                    <x-button class="ml-3">
                    <svg class="w-6 h-6 mr-2" data-darkreader-inline-stroke="" fill="none" stroke="currentColor" style="--darkreader-inline-stroke:currentColor;" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 14l9-5-9-5-9 5 9 5z"></path>    
                        <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path>
                    </svg>
                        {{ __('Crear') }}
                    </x-button>
                </div>
            </div>  
        </form>
    </x-create-card>
</x-app-layout>
