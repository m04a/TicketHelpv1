<x-app-layout>
    <x-slot name="header">
        <h1 class="title">
            Qüestió {{$questions->id}}
        </h1>
    </x-slot>
    <x-slot name="slot">
        <x-create-card>
            <p class="font-bold mb-3 text-xl">Dades</p>
            <div class="content-column">
                <!-- Subject -->
                <div class="column-right">
                    <x-label for="title" :value="__('Assumpte')" />

                    <x-input id="title" class="input-contant-test input-disabled" type="text" name="nom" value="{{$questions->title}}" required autofocus disabled/>
                </div>
            </div>
            <div class="content-column">
                <!-- User -->
                <div class="mt-4 column-left">

                    <x-label for="user" :value="__('User')" />

                    <x-input id="user" class="input-content input-disabled" type="text" name="assumpte" value="{{$questions->username}}" required autofocus disabled/>

                </div>
                <!-- Department -->
                <div class="mt-4 column-right">
                    <x-label for="rol" :value="__('Departament')" />

                    <x-input id="department" class="input-content input-disabled" type="text" name="department" value="{{$questions->department}}" required autofocus disabled/>

                </div>
            </div>

            <div>
                <!-- Description -->

                <x-label for="description" class="mt-4 mb-4" :value="__('Descripció')" />

                <textarea class="textarea input-disabled" disabled>{{$questions->description}}</textarea>
            </div>
        </x-create-card>
        <x-create-card>
            <p class="font-bold mb-3 text-xl">Respostes</p>

            <x-label for="manager" class="mt-4 mb-4" value="Manager : {{$questions->manager}}" />
            <textarea class="textarea input-disabled" disabled>Pots demanar, però el has de tornar igual que tel han donat</textarea>

            <x-label for="manager" class="mt-4 mb-4" value="{{$questions->username}}" />
            <textarea class="textarea input-disabled" disabled>Vale me sirve</textarea>
        </x-create-card>

        <x-create-card>
            <p class="font-bold mb-3 text-xl">Nova Resposta</p>
            <form method="POST" action="{{ url("/admin/messages/".$questions->id) }}">
                @csrf
                <textarea name="content" class="textarea"></textarea>
                <input type="hidden" name="question_id" value="{{ $questions->id }}"/>
                <div class="button-create">
                    <x-button class="ml-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 rotate-180 rotate-90" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                        </svg>
                        {{ __('Enviar Resposta') }}
                    </x-button>
                </div>
            </form>
        </x-create-card>
    </x-slot>
</x-app-layout>
