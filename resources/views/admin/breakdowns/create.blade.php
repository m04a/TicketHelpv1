<x-app-layout>

        <x-slot name="header">
            <h1 class="title">
                Crear Incidència
            </h1>
        </x-slot>
<x-create-card>
    <form method="POST" action="{{ url("/admin/breakdowns/create") }}">
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
            <div class="content-column">
            <!-- Name User -->
            <div class="column-left">
                <x-label for="usuari" :value="__('Nom Usuari')" />

                <x-input id="nom" class="input-content input-disabled" type="text" name="nom" value="{{ $userLoggedIn }}" autofocus  disabled/>
            </div>

            <!-- Status Breakdown -->
            <div class="column-right">
                    <x-label for="rol" :value="__('Estat Incidència')" />

                    <x-select name="status" class="block mt-4 w-full">
                        <option value="0">Sense Assignar</option>
                        <option value="1">En procés</option>
                    </x-select>
                </div>
            </div>
            <div class="content-column">
                <!-- Subject -->
                <div class="mt-4 column-left">
                    <x-label for="title" :value="__('Assumpte')" />

                    <x-input id="title" class="input-content" type="text" name="title" autofocus />

                </div>
                <!-- Rol User -->
                <div class="mt-4 column-right">
                    <x-label for="rol" :value="__('Departament')" />

                    <x-select name="department_id" class="block mt-4 w-full">
                        @foreach ($department as $item)
                            <option value="{{$item->id}} ">{{ $item->name }}</option>
                        @endforeach
                    </x-select>
                </div>
            </div>
        <div class="columns-3">
        <div class="mt-4">
            <x-label for="rol" :value="__('Administrador')" />

            <x-select name="manager_id" class="block mt-4 w-full">
                @foreach ($manager as $item)
                    <option value="{{$item->id}} ">{{ $item->username }}</option>
                @endforeach
            </x-select>
        </div>
        <div class="mt-4">
            <x-label for="rol" :value="__('Dispositus')" />

            <x-select name="device_id" class="block mt-4 w-full">
                @foreach ($devices as $item)
                    <option value="{{$item->id}} ">{{ $item->label }}</option>
                @endforeach
            </x-select>
        </div>
            <div class="mt-4">
                <x-label for="rol" :value="__('Administrador')" />

                <x-select name="zone_id" class="block mt-4 w-full">
                    @foreach ($zones as $item)
                        <option value="{{$item->id}} ">{{ $item->label }}</option>
                    @endforeach
                </x-select>
            </div>
        </div>

        <div class="mt-4">
            <x-label class="label" for="description" name="description" :value="__('Missatge')" />

            <textarea class="textarea" type="text" name="description" autofocus></textarea>
        </div>

            <div class="button-create">
                <x-button class="ml-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    {{ __('Crear Incidència') }}
                </x-button>
            </div>
        </form>
    </x-create-card>
</x-app-layout>
