<x-user-layout>
<x-slot name="header">
        <h1 class="title">
            Editar Pregunta
        </h1>
    </x-slot>
    <x-slot name="slot">
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
            <form action="{{ url('/user/questions/edit/'.$questions->id) }}" method="POST">
            @method('PUT')
            @csrf
                <div class="columns">

                    <!-- Name User -->
                    <div class="mt-4">
                        <x-label class="title" for="assumpte" :value="__('Assumpte')" />
                        <x-input id="title" class="block mt-4 w-full" type="text" name="title" value="{{ $questions->title }}" placeholder="Sense Assumpte"  autofocus required />       
                    </div>

                    <div class="mt-4">
                        <x-label for="Tipus" :value="__('Departament')" />

                        <x-select class="block mt-4 w-full" name="department_id">
                            @foreach ($departments as $item)
                                <option {{ $questions->department_id==$item->id ? 'selected' : '' }} value="{{$item->id}} ">{{ $item->name }}</option>
                            @endforeach
                        </x-select>
                    </div>
                    <!-- Text of the suggestion -->
                    <div class="mt-4">
                        <x-label class="description" for="missatge" :value="__('Missatge')" />

                        <textarea class="textarea" type="text" name="description" placeholder="Escriu el teu missatge aqu??"  autofocus required>{{ $questions->description }}</textarea>
                    </div>

                </div>


                <div class="flex items-center justify-end mt-4">
                    <a href="{{ url('user/questions/list') }}">
                        <x-button type="button" class="ml-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                            {{ __('Llistat') }}
                        </x-button>
                    </a>
                    <x-button type="submit" class="ml-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        {{ __('Guardar Canvis') }}
                    </x-button>
                </div>
            </form>
        </x-create-card-user>
    </x-slot>
</x-user-layout>
