<x-app-layout>

        <x-slot name="header">
            <h1 class="title">
                Crear Incidència
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
    <form method="POST" action="{{ url('/admin/breakdowns/create') }}">
        @csrf

            <!-- Subject -->
            <div >
                <x-label for="title" :value="__('Assumpte')" />

                <x-input id="title" class="input-content" type="text" name="title"  autofocus required />

            </div>

            <div class="content-column mt-4">
                <!-- Name User -->
                <div class="column-left">
                    <x-label for="usuari" :value="__('Nom Usuari')" />

                    <x-input id="nom" class="input-content input-disabled" type="text" name="nom" value="{{ $userLoggedIn }}"  autofocus required  disabled/>
                </div>

                <div class="column-right">
                    <x-label for="rol" :value="__('Departament')" />

                    <x-select name="department_id" class="block mt-4 w-full">
                        @foreach ($department as $item)
                            <option value="{{$item->id}} ">{{ $item->name }}</option>
                        @endforeach
                    </x-select>
                </div>
            </div>
            

            <div class="content-column">
                <!-- Zone -->
                <div class="mt-4 column-left">
                    <x-label for="rol" :value="__('Zona')" />

                    <x-select name="zone_id" class="block mt-4 w-full">
                        @foreach ($zones as $item)
                            <option value="{{$item->id}} ">{{ $item->label }}</option>
                        @endforeach
                    </x-select>
                </div>

                <!-- Status Breakdown -->
                <div class="column-right">
                    <div class="mt-4">
                        <x-label for="rol" :value="__('Dispositius')" />

                        <x-select name="device_id" class="block mt-4 w-full">
                            @foreach ($devices as $item)
                                <option value="{{$item->id}} ">{{ $item->label }}</option>
                            @endforeach
                        </x-select>
                    </div>
                </div>
            </div>


        <div class="mt-4">
            <x-label class="label" for="description" name="description" :value="__('Missatge')" />

            <textarea class="textarea" type="text" name="description"  autofocus required></textarea>
        </div>

            <div class="button-create">
                <a href="{{ url('admin/breakdowns') }}">
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
