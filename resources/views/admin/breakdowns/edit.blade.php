<x-app-layout>

    <x-slot name="header">
        <h1 class="title">
            Editar Incidència
        </h1>
    </x-slot>
    <x-create-card>
        <form method="POST" action="">
            @csrf
            <div class="content-column">
                <!-- Name User -->
                <div class="column-left">
                    <x-label for="usuari" :value="__('Nom Usuari')" />

                    <x-input id="nom" class="input-content" type="text" name="nom" value="{{ $breakdownData->username }}" required autofocus />
                </div>

                <!-- Status Breakdown -->
                <div class="column-right">
                    <x-label for="rol" :value="__('Estat Incidència')" />

                    <x-select class="block mt-4 w-full">
                        <option {{ $breakdownData->status==0 ? 'selected' : ''}} value="0">Sense Assignar</option>
                        <option {{ $breakdownData->status==1 ? 'selected' : ''}} value="1">En procés</option>
                    </x-select>
                </div>
            </div>
            <div class="content-column">
                <!-- Subject -->
                <div class="mt-4 column-left">
                    <x-label for="assumpte" :value="__('Assumpte')" />

                    <x-input id="assumpte" class="input-content" type="text" name="assumpte" value="{{ $breakdownData->title }}" required autofocus />

                </div>
                <!-- Department -->
                <div class="mt-4 column-right">
                    <x-label for="rol" :value="__('Departament')" />

                    <x-select class="block mt-4 w-full">
                        @foreach ($department as $item)
                        <option {{$breakdownData->department_id==$item->id ? 'selected' : '' }} value="{{$item->id}} ">{{ $item->name }}</option>
                        @endforeach
                    </x-select>
                </div>
            </div>
            <div class="mt-4">
                <x-label class="label" for="missatge" :value="__('Missatge')" />

                <textarea class="textarea" type="text" name="sugerencia" required autofocus>{{ $breakdownData->description }}</textarea>
            </div>
            <div class="button-create">
                <x-button class="ml-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    {{ __('Guardar Canvis') }}
                </x-button>
            </div>
        </form>
    </x-create-card>
</x-app-layout>
