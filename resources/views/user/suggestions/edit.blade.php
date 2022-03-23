<x-user-layout>

    <x-slot name="header">
        <h1 class="title">
            Editar sugerencia
        </h1>
    </x-slot>
        @if(session('success'))
            <x-success-alert id="message" class="transition-success-messages-users">
                {{ session('success') }}
            </x-success-alert>
         @endif

        @if ($errors->any())
            <x-error-alert id="message" class="transition-error-messages-users">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </x-error-alert>
        @endif
    <x-create-card-user>
        <form action="{{ url('/user/suggestions/update/'.$suggestion->id) }}" method="POST">
        @method('PUT')
        @csrf
            <!-- Title  -->
            <div class="content-column">
            <!-- Name User -->
            <div class="column-left-w200">
                <x-label class="label" for="assumpte" :value="__('Assumpte')" />

                <x-input id="title" class="block mt-4 w-full" type="text" value="{{ $suggestion->title }}" name="title" autofocus />
            </div>

            <!-- Status Breakdown -->
            <div class="column-right">
                    <x-label for="rol" :value="__('Departament')" />
                    
                    <x-select name="department_id" class="block mt-4 w-full">
                        @foreach ($department as $item)
                        <option {{ $suggestion->department_id==$item->id ? 'selected' : '' }} value="{{ $item->id }} ">{{ $item->name }}</option>
                        @endforeach
                    </x-select>
                </div>
            </div>
<!-- Text of the suggestion -->    
                <div class="mt-4">
                    <x-label class="label" for="missatge" :value="__('Missatge')" />

                    <textarea class="textarea" type="text" name="description" autofocus>{{ $suggestion->description }}</textarea>
                </div>
                <div class="button-create">
                    <x-button type="submit" class="ml-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        {{ __('Guardar Canvis') }}
                    </x-button>
                </div>
            </div>
        </form>
    </x-create-card-user>
</x-user-layout>
