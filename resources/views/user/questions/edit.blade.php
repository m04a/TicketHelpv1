<x-user-layout>
<x-slot name="header">
        <h1 class="title">
            Editar Pregunta
        </h1>
    </x-slot>
    <x-slot name="slot">
        <x-create-card-user>
            <form method="POST" action="">
            @csrf

            <!-- Department -->
                <div class="mt-4 column-right">
                    <x-label for="rol" :value="__('Departament')" />

                    <x-select name="department" class="block mt-4 w-full">
                        @foreach ($departments as $department)
                        <option {{$questions->department_id==$department->id ? 'selected' : '' }} value="{{$department->id}} ">{{ $department->name }}</option>
                        @endforeach
                    </x-select>
                </div>

            <!-- Title  -->
                <div class="mt-4">
                    <x-label class="title" for="assumpte" :value="__('Assumpte')" />

                    <x-input id="title" class="block mt-4 w-full" type="text" name="title" value="{{$questions->title}}"  required autofocus />
                </div>

                <!-- Text of the suggestion -->
                <div class="mt-4">
                    <x-label class="description" for="missatge" :value="__('Missatge')" />

                    <textarea class="textarea" type="text" name="description" required autofocus>{{$questions->description}}</textarea>
                </div>


                <div class="button-create">
                    <x-button class="ml-3">
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
