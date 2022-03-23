<x-app-layout>

        <x-slot name="header">
            <h1 class="title">
                Editar Zona
            </h1>
        </x-slot>
<x-create-card>
        <form method="POST" action="{{ url('/admin/zones/edit/' . $zone['id']) }}">
            @method('PUT') 
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
            <!-- Name Zona -->
            <div class="content-column">
                <!-- Name User -->
                <div class="column-left">
                    <x-label for="usuari" :value="__('Nom')" />

                    <x-input id="nom" class="input-content" type="text" name="nom" value="{{ $zone->label }}" required autofocus />
                </div>
            </div>
            <div class="content-column">
                <div class="column-left">
                <div class="mb-6" >
                    <div class="text-black font-bold rounded-t py-2">
                        Descripció de la zona
                    </div>
                    <textarea class="textarea">{{ $zone->description }}</textarea>
                </div>
                </div>
            </div>
            <div class="button-create">
                <x-button class="ml-3">
                <svg class="w-6 h-6 mr-2" data-darkreader-inline-stroke="" fill="none" stroke="currentColor" style="--darkreader-inline-stroke:currentColor;" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
                    {{ __('Guardar canvis') }}
                </x-button>
            </div>
        </form>
    </x-create-card>
</x-app-layout>
