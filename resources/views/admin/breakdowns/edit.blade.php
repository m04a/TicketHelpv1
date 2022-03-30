<x-app-layout>

    <x-slot name="header">
        <h1 class="title">
            Editar Incidència
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
        <form method="POST" action="{{ url ('/admin/breakdowns/edit/'.$breakdownData->id) }}">
            @method('PUT')
            @csrf
            <div class="content-column">
                <!-- Name User -->

                <div class="column-left">
                    <x-label for="usuari" :value="__('Nom Usuari')" />

                    <x-input id="nom" class="input-content input-disabled" type="text" value="{{ $breakdownData->username }}" disabled autofocus />
                </div>

                <!-- Status Breakdown -->
                <div class="column-right">
                    <x-label for="rol" :value="__('Estat Incidència')" />

                    <x-select name="status" class="block mt-4 w-full">
                        <option {{ $breakdownData->status==1 ? 'selected' : ''}} value="1">Sense Assignar</option>
                        <option {{ $breakdownData->status==2 ? 'selected' : ''}} value="2">En procés</option>
                        <option {{ $breakdownData->status==3 ? 'selected' : ''}} value="3">Finalitzat</option>
                    </x-select>
                </div>
            </div>
            <div class="content-column">
                <div class="mt-4 column-left">
                    <x-label for="rol" :value="__('Zona')" />

                    <x-select name="zone_id" class="block mt-4 w-full">
                        @foreach ($zones as $item)
                            <option {{ $breakdownData->zone_id==$item->id ? 'selected' : '' }} value="{{$item->id}} ">{{ $item->label }}</option>
                        @endforeach
                    </x-select>
                </div>
                <!-- Department -->
                <div class="mt-4 column-right">
                    <x-label for="rol" :value="__('Departament')" />

                    <x-select name="department_id" class="block mt-4 w-full">
                        @foreach ($department as $item)
                        <option {{ $breakdownData->department_id==$item->id ? 'selected' : '' }} value="{{$item->id}} ">{{ $item->name }}</option>
                        @endforeach
                    </x-select>
                </div>
            </div>
            <div class="content-column">
                <!-- Name User -->

                <div class="mt-4 column-left">
                    <x-label for="rol" :value="__('Administrador')" />

                    <x-select name="manager_id" class="block mt-4 w-full">
                        @foreach ($manager as $item)
                            <option {{ $breakdownData->manager_id==$item->id ? 'selected' : '' }} value="{{$item->id}} ">{{ $item->username }}</option>
                        @endforeach
                    </x-select>
                </div>

                <!-- Status Breakdown -->
                <div class="mt-4 column-right">
                    <x-label for="rol" :value="__('Dispositus')" />

                    <x-select name="device_id" class="block mt-4 w-full">
                        @foreach ($devices as $item)
                            <option {{ $breakdownData->device_id==$item->id ? 'selected' : '' }} value="{{$item->id}} ">{{ $item->label }}</option>
                        @endforeach
                    </x-select>
                </div>
            </div>

            <!-- Subject -->
            <div class="mt-4 column-left">
                <x-label for="title" :value="__('Assumpte')" />

                <x-input id="title" class="input-content" type="text" name="title" value="{{ $breakdownData->title }}" autofocus />

            </div>
            <div class="mt-4">
                <x-label class="label" for="description" name="description" :value="__('Missatge')" />

                <textarea class="textarea" type="text" name="description" autofocus>{{ $breakdownData->description }}</textarea>
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
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    {{ __('Guardar Canvis') }}
                </x-button>
            </div>
        </form>
    </x-create-card>
</x-app-layout>
