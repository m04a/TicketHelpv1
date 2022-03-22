<x-app-layout>

    <x-slot name="header">
        <h1 class="title">
            Crear nou tipus
        </h1>
    </x-slot>
    <x-create-card>
        <form method="POST" action="{{ route('admin.types.store') }}">
            @csrf
            <div class="content-column">
                <!-- Name User -->
                <div class="column-left">
                    <x-label for="etiqueta" :value="__('Etiqueta del tipus')" />

                    <x-input id="label" class="input-content" type="text" name="label" placeholder="Switch" required
                        autofocus />
                </div>

                <!-- Email User -->
                <div class="column-right">
                    <x-label for="Descipció" :value="__('Descripció')" />

                    <x-input id="Description" class="input-content" type="text" name="description"
                        placeholder="És un aparell de xarxes que permet connectar equips en una xarxa." required
                        autofocus />
                </div>
            </div>
            <div class="button-create">
                <x-button class="ml-3">
                    <svg class="w-6 h-6" data-darkreader-inline-fill="" fill="currentColor"
                        style="--darkreader-inline-fill: currentColor;" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                            clip-rule="evenodd"></path>
                    </svg>
                    {{ __('Crear Tipus') }}
                </x-button>
            </div>
        </form>
    </x-create-card>
</x-app-layout>
