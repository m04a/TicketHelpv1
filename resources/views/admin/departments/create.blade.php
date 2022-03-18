<x-app-layout>

        <x-slot name="header">
            <h1 class="title">
                Crear Departament
            </h1>
        </x-slot>
<x-create-card>
        <form method="POST" action="{{ route('admin.departments.store') }}">
            @csrf
            <!-- Name Department -->
            <div class="column-left">
                <x-label for="departament1" :value="__('Nom Departament')" />

                <x-input id="departament" class="input-content" type="text" name="departament" for="depa" placeholder="Secretaria" required autofocus />
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
        </form>
    </x-create-card>
</x-app-layout>
