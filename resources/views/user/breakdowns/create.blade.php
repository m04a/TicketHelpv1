<x-user-layout>
    <x-slot name="header">
        <h1 class="title">
            Crear Incidència
        </h1>
    </x-slot>
        @if(session('success'))
                <x-success-alert id="message" class="transition-messages-questions-user">
                    {{ session('success') }}
                </x-success-alert>
        @endif
        @if ($errors->any())
            <x-error-alert id="message" class="transition-messages-questions-user">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </x-error-alert>
        @endif
    <x-create-card-user>
        <form method="POST" action="{{ url('/user/breakdowns/create') }}">
            @csrf
            <!-- <div class="content-column">
                Name User
                <div class="column-left">
                    <x-label for="usuari" :value="__('Nom Usuari')" />

                    <x-input id="nom" class="input-content input-disabled" type="text" name="nom" value="{{ $userLoggedIn }}"  autofocus required  disabled/>
                </div>

                Status Breakdown
                <div class="column-right">
                    <x-label for="rol" :value="__('Estat Incidència')" />

                    <x-select name="status" class="block mt-4 w-full">
                        <option value="0">Sense Assignar</option>
                        <option value="1">En procés</option>
                    </x-select>
                </div>
            </div> -->
            <div class="columns">
                <!-- Subject -->
                <div class="mt-4">
                    <x-label for="title" :value="__('Assumpte')" />

                    <x-input id="title" class="input-content" type="text" name="title"  autofocus required />

                </div>
                <!-- Rol User -->
                <div class="mt-4">
                    <x-label for="rol" :value="__('Departament')" />

                    <x-select name="department_id" class="block mt-4 w-full">
                        @foreach ($department as $item)
                            <option value="{{$item->id}} ">{{ $item->name }}</option>
                        @endforeach
                    </x-select>
                </div>
            </div>
            <div class="content-column">
                <div class="mt-4 column-left">
                    <x-label for="rol" :value="__('Dispositus')" />

                    <x-select name="device_id" class="block mt-4 w-full">
                        @foreach ($devices as $item)
                            <option value="{{$item->id}} ">{{ $item->label }}</option>
                        @endforeach
                    </x-select>
                </div>
                <div class="mt-4 column-right">
                    <x-label for="zone_id" :value="__('Zona')" />

                    <x-input  type="text" class="input-content input-disabled" value="{{Auth::user()->zone->label}}" disabled />
                    <input name="zone_id" type="hidden" value="{{Auth::user()->zone_id}}">
                </div>
            </div>

            <div class="mt-4">
                <x-label class="label" for="description" name="description" :value="__('Missatge')" />

                <textarea class="textarea" type="text" name="description"  autofocus required></textarea>
            </div>

            <div class="button-create">
                <a href="{{ url('user/breakdowns/list') }}">
                    <x-button type="button" class="ml-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                            {{ __('Llistat') }}
                    </x-button>
                </a>
                <x-button type="submit" class="ml-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    {{ __('Crear Incidència') }}
                </x-button>
            </div>
        </form>
    </x-create-card-user>
</x-user-layout>
