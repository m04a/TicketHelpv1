<x-app-layout>

    <x-slot name="header">
        <h1 class="title">
            Editar dispositiu
        </h1>
    </x-slot>
    @if ($errors->any())
        <x-error-alert id="message" class="transition-error-messages">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-error-alert>
    @endif
    @if (session('success'))
        <x-success-alert id="message" class="transition-success-messages">
            {{ session('success') }}
        </x-success-alert>
    @endif
    @if (session('message'))
        <x-error-alert id="message" class="transition-error-messages">
            {{ session('message') }}
        </x-error-alert>
    @endif
    <x-create-card>
        <form method="PUT" action="">
            @csrf

            <div class="content-column">
                <!-- Name User -->
                <div class="column-left">
                    <x-label for="Nom" :value="__('Nom del dispositiu')" />
                    <x-input id="name" class="input-content" type="text" name="name" placeholder="s-02-01"
                        value='{{ $deviceData->label }}' required autofocus />
                </div>

                <!-- Email User -->
                <div class="column-left">
                    <x-label for="Tipus" :value="__('tipus')" />

                    <x-select name="type" class="block mt-4 w-full">
                        @foreach ($list['types'] as $item)
                            <option {{ $deviceData->type_id == $item->id ? 'selected' : '' }}
                                value='{{ $item->id }}'>{{ $item->label }}</option>
                        @endforeach
                    </x-select>
                </div>

                <div class="column-right">
                    <x-label for="Aula" :value="__('Aula')" />

                    <x-select name="zone" class="block mt-4 w-full">
                        @foreach ($list['zones'] as $item)
                            <option {{ $deviceData->zone_id == $item->id ? 'selected' : '' }}
                                value="{{ $item->id }} ">{{ $item->label }}</option>
                        @endforeach
                    </x-select>
                </div>
            </div>
            <div class="button-create">
                <x-button class="ml-3">
                    <svg class="w-6 h-6" data-darkreader-inline-fill="" fill="currentColor"
                        style="--darkreader-inline-fill: currentColor;" viewBox="0 -2 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                            clip-rule="evenodd"></path>
                    </svg>
                    {{ __('Guardar Canvis') }}
                </x-button>
            </div>
        </form>
    </x-create-card>
</x-app-layout>
