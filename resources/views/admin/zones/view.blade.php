<x-app-layout>
    <x-slot name="header">
        <h1 class="title">
            Incidència 2
        </h1>
    </x-slot>
    <x-slot name="slot">
        <x-create-card>
            <div class="content-column">
                <div class="column-left">
                    <p class="font-bold mb-3 text-xl">Dades</p>
                </div>
                <div class="column-right">
                    <a href="{{ url('admin/zones/history/'. $breakdown['zone_id']) }}">
                        <x-button type="button" class="ml-[80%]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                            {{ __('Llistat') }}
                        </x-button>
                    </a>
                </div>
            </div>
            <div class="content-column">
                <!-- Subject -->
                <div class="column w-full">
                    <x-label for="title" :value="__('Assumpte')" />

                    <x-input id="title" class="input-content input-disabled" type="text" name="nom"
                        value="{{ $breakdown['title'] }}" required  autofocus disabled />
                </div>

            </div>
            <div class="content-column">
                <!-- User -->
                <div class="mt-4 column-left">

                    <x-label for="user" :value="__('User')" />

                    <x-input id="user" class="input-content input-disabled" type="text" name="assumpte"
                        value="{{ $breakdown['username'] }}" required  autofocus disabled />

                </div>
                <!-- Department -->
                <div class="mt-4 column-right">
                    <x-label for="rol" :value="__('Departament')" />

                    <x-input id="   " class="input-content input-disabled" type="text" name="department"
                        value="{{ $breakdown['departament'] }}" required  autofocus disabled />

                </div>
            </div>
            <div class="content-column">
                <!-- User -->
                <div class="mt-4 column-left">

                    <x-label for="user" :value="__('Administrador')" />

                    <x-input id="user" class="input-content input-disabled" type="text" name="assumpte"
                        value="{{ $breakdown['manager_username'] }}" required  autofocus disabled />

                </div>
                <!-- Department -->
                <div class="mt-4 column-right">
                    <x-label for="rol" :value="__('Zona')" />

                    <x-input id="   " class="input-content input-disabled" type="text" name="department"
                        value="{{ $breakdown['zone_name'] }}a" required  autofocus disabled />

                </div>
            </div>
            <div class="content-column">
                <!-- User -->
                <div class="mt-4 column-left">

                    <x-label for="user" :value="__('Dispositiu')" />

                    <x-input id="user" class="input-content input-disabled" type="text" name="assumpte"
                        value="{{ $breakdown['device_name'] }}" required  autofocus disabled />

                </div>
                <!-- Status Breakdown -->
                <div class="mt-4 column-right">
                    <x-label for="state" :value="__('Estat Incidència')" />

                    <x-input id="state" value="{{ ($breakdown['status'] == 1) ? 'Pendent' : (($breakdown['status'] == 2)  ? 'Assignada' : 'Resolta'); }}" class="input-content input-disabled" type="text" name="estat" />
                </div>
            </div>
            <div>
                <!-- Description -->

                <x-label for="description" class="mt-4 mb-4" :value="__('Descripció')" />

                <textarea class="textarea input-disabled" disabled>{{ $breakdown['description'] }}</textarea>
            </div>
        </x-create-card>

        <x-create-card>
            <p class="font-bold mb-3 text-xl">Respostes</p>
            @foreach ($messages as $item)
                @if($item['user'] == $breakdown['username'])
                    <x-label for="manager" class="messages-admin-view-label-user" :value="__($item['user'])" />
                    <textarea class="textarea input-disabled" disabled>{{ $item['content'] }}</textarea>
                @else
                    <x-label for="manager" class="mt-4" :value="__($item['user'])" />
                    <textarea class="textarea input-disabled" disabled>{{ $item['content'] }}</textarea>
                @endif
            @endforeach
        </x-create-card>
    </x-slot>
</x-app-layout>
