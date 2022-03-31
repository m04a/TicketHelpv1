<x-user-layout>
    <x-slot name="header">
        <h1 class="title">
            Pregunta
        </h1>
    </x-slot>
    <x-slot name="slot">
        <x-create-card-user>
        <div class="content-column">
            <div class="column-left">
                <p class="font-bold mb-3 text-xl">Dades</p>
            </div>
            <div class="column-right">
                <a href="{{ url('user/questions/list') }}">
                    <x-button type="button" class="ml-[80%]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                        {{ __('Llistat') }}
                    </x-button>
                </a>
            </div>
        </div>
            <div class="content-column">
                <!-- Subject -->
                <div class="column-right">
                    <x-label for="title" :value="__('Assumpte')" />

                    <x-input id="title" class="input-contant-test input-disabled" type="text" name="nom" value="{{$questions->title}}" required  autofocus required disabled/>
                </div>
            </div>
            <div class="content-column">
                <!-- User -->
                <div class="mt-4 column-left">

                    <x-label for="user" :value="__('User')" />

                    <x-input id="user" class="input-content input-disabled" type="text" name="assumpte" value="{{$questions->username}}" required  autofocus required disabled/>

                </div>
                <!-- Department -->
                <div class="mt-4 column-right">
                    <x-label for="rol" :value="__('Departament')" />
                    
                    <x-input id="department" class="input-content input-disabled" type="text" name="department" value="{{$questions->department}}" required  autofocus required disabled/>

                </div>
            </div>

            <div class="content-column">
                <!-- Department -->
                <div class="column-left mt-4">
                    <x-label for="rol" :value="__('Manager')" />

                    <x-input id="department" class="input-content input-disabled" type="text" name="manager" value="{{$questions->manager}}" required  autofocus disabled/>

                </div>

                <!-- Status -->
                <div class="column-right mt-4">
                    <x-label for="rol" :value="__('Estat')" />

                    <x-input id="status" class="input-content input-disabled" type="text" name="department" value="{{ ($questions->status == 1) ? 'Pendent' : (($questions->status == 2)  ? 'Assignada' : 'Resolta') }}" required  autofocus disabled/>
                </div>
            </div>

            <div>
                <!-- Description -->

                <x-label for="description" class="mt-4 mb-4" :value="__('Descripció')" />

                <textarea class="textarea input-disabled" disabled>{{$questions->description}}</textarea>
            </div>
        </x-create-card-user>
        <x-create-card-user>
        <p class="font-bold mb-3 text-xl">Respostes</p>
            @foreach ($messages as $item)
                @if($item['user'] == $questions->username)
                    <x-label for="manager" class="mt-4" :value="__($item['user'])" />
                    <textarea class="textarea input-disabled" disabled>{{ $item['content'] }}</textarea>
                @else
                    <x-label for="manager" class="flex mt-4 justify-end" :value="__($item['user'])" />
                    <textarea class="textarea input-disabled" disabled>{{ $item['content'] }}</textarea>
                @endif
            @endforeach
        </x-create-card-user>

        <x-create-card-user>
        <p class="font-bold mb-3 text-xl">Nova Resposta</p>
            <form method="POST" action="{{ url('/user/messages/' . $questions->id) }}">
                @csrf
                <textarea id="content" name="content" class="textarea"></textarea>
                <input type="hidden" name="question_id" value="{{ $questions->id }}" />
                <div class="button-create">
                    <x-button class="ml-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 rotate-180 rotate-90" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                        </svg>
                        {{ __('Enviar Resposta') }}
                    </x-button>
                </div>
            </form>
        </x-create-card-user>
    </x-slot>
</x-user-layout>
