<x-user-layout>
    <x-slot name="header">
        <h1 class="title">
            Incidència 2
        </h1>
    </x-slot>
    <x-slot name="slot">
        <x-create-card-user>
            <p class="font-bold mb-3 text-xl">Dades</p>
            <div class="content-column">
                <!-- Subject -->
                <div class="column w-full">
                    <x-label for="title" :value="__('Assumpte')" />

                    <x-input id="title" class="input-content input-disabled" type="text" name="nom" value="{{ $breakdownData->title }}" required autofocus disabled/>
                </div>

            </div>
            <div class="content-column">
                <!-- User -->
                <div class="mt-4 column-left">

                    <x-label for="user" :value="__('User')" />

                    <x-input id="user" class="input-content input-disabled" type="text" name="assumpte" value="{{ $breakdownData->username }}" required autofocus disabled/>

                </div>
                <!-- Department -->
                <div class="mt-4 column-right">
                    <x-label for="rol" :value="__('Departament')" />

                    <x-input id="   " class="input-content input-disabled" type="text" name="department" value="{{ $breakdownData->departament }}" required autofocus disabled/>

                </div>
            </div>
            <div class="content-column">
                <!-- User -->
                <div class="mt-4 column-left">

                    <x-label for="user" :value="__('Administrador')" />

                    <x-input id="user" class="input-content input-disabled" type="text" name="assumpte" value="{{ $breakdownData->manager_username }}" required autofocus disabled/>

                </div>
                <!-- Department -->
                <div class="mt-4 column-right">
                    <x-label for="rol" :value="__('Zona')" />

                    <x-input id="   " class="input-content input-disabled" type="text" name="department" value="{{ $breakdownData->zone_name }}a" required autofocus disabled/>

                </div>
            </div>
            <div class="content-column">
                <!-- User -->
                <div class="mt-4 column-left">

                    <x-label for="user" :value="__('Dispositiu')" />

                    <x-input id="user" class="input-content input-disabled" type="text" name="assumpte" value="{{ $breakdownData->device_name }}" required autofocus disabled/>

                </div>
                <!-- Status Breakdown -->
                <div class="mt-4 column-right">
                    <x-label for="state" :value="__('Estat Incidència')" />

                    <x-input id="state" class="input-content input-disabled" type="text" name="estat" value="{{ $breakdownData->status==1 ? 'Resolt' : 'Pendent'}}" required autofocus disabled/>
                </div>
            </div>
            <div>
                <!-- Description -->

                <x-label for="description" class="mt-4 mb-4" :value="__('Descripció')" />

                <textarea class="textarea input-disabled" disabled>{{ $breakdownData->description }}</textarea>
            </div>
        </x-create-card-user>
        <x-create-card-user>
            <p class="font-bold mb-3 text-xl">Respostes</p>

            <x-label for="manager" class="mt-4 mb-4" :value="__('Manager')" />
            <textarea class="textarea input-disabled" disabled>Possiblement sigui per la tarjeta grafica, hem passare a canviarla el dimecres, gràcies.</textarea>

            <x-label for="manager" class="mt-4 mb-4" :value="__('Jorge')" />
            <textarea class="textarea input-disabled" disabled>Gràcies el dimecres estaré aquí esperant !</textarea>
        </x-create-card-user>

        <x-create-card-user>
            <p class="font-bold mb-3 text-xl">Nova Resposta</p>

            <form method="POST" action="{{ url("/admin/messages/".$breakdownData->id) }}">
                @csrf
                <textarea id="content" name="content" class="textarea"></textarea>
                <div class="button-create">
                    <x-button class="ml-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 rotate-180 rotate-90" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                        </svg>
                        {{ __('Enviar Resposta') }}
                    </x-button>
                </div>
            </form>
        </x-create-card-user>
    </x-slot>
</x-user-layout>
