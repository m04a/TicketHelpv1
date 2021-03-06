<x-user-layout>
    <x-slot name="header">
        <h1 class="title">
            Editar Incidència
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
    <form method="POST" action="{{ url('/user/breakdowns/edit/'.$breakdownData->id) }}">
            @method('PUT')
            @csrf

            <div class="columns">
                <!-- Subject -->
                <div class="mt-4">
                    <x-label for="title" :value="__('Assumpte')" />

                    <x-input id="title" class="input-content" type="text" name="title" value="{{ $breakdownData->title }}"  autofocus required />
                </div>
            </div>

            <div class="content-column">
                <div class="mt-4 column-left">
                    <x-label for="rol" :value="__('Zona')" />

                    <x-input  type="text" class="input-content input-disabled" value="{{Auth::user()->zone->label}}" disabled />
                    <input name="zone_id" type="hidden" value="{{Auth::user()->zone_id}}">
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

            <!-- Status Breakdown -->
            <div class="mt-4">
                <x-label for="rol" :value="__('Dispositiu')" />

                <x-select name="device_id" class="block mt-4 w-full">
                    @foreach ($devices as $item)
                        <option {{ $breakdownData->device_id==$item->id ? 'selected' : '' }} value="{{$item->id}} ">{{ $item->label }}</option>
                    @endforeach
                </x-select>
            </div>

            <div class="mt-4">
                <x-label class="label" for="description" name="description" :value="__('Missatge')" />

                <textarea class="textarea" type="text" name="description"  autofocus required>{{ $breakdownData->description }}</textarea>
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
                <x-button class="ml-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    {{ __('Guardar Canvis') }}
                </x-button>
            </div>
        </form>
    </x-create-card-user>
</x-user-layout>
