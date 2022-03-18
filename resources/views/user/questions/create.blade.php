<x-user-layout>
<x-slot name="header">
        <h1 class="title">
            Fer una pregunta
        </h1>
    </x-slot>
    <x-slot name="slot">
        <x-create-card-user>
            <form method="POST" action="{{ route('user.questions.store') }}">
            @csrf

            <div class="column-left mt-4">
                <x-label for="Tipus" :value="__('Departament')" />

                <x-select class="block mt-4 w-full">
                    <option value="1">Departament Informàtica</option>
                    <option value="2">Consergeria</option>
                    <option value="3">Secretaria</option>
                    <option value="4">Direcció</option>
                    <option value="5">Altres</option>
                </x-select>
            </div>

            <!-- Title  -->
                <div class="mt-4">
                    <x-label class="title" for="assumpte" :value="__('Assumpte')" />

                    <x-input id="title" class="block mt-4 w-full" type="text" name="title" placeholder="Sense Assumpte" required autofocus />
                </div>

                <!-- Text of the suggestion -->
                <div class="mt-4">
                    <x-label class="description" for="missatge" :value="__('Missatge')" />

                    <textarea class="textarea" type="text" name="description" placeholder="Escriu el teu missatge aquí" required autofocus></textarea>
                </div>


                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 rotate-180 rotate-90" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                    </svg>
                        {{ __('Enviar') }}
                    </x-button>
                </div>
            </form>
        </x-create-card-user>
    </x-slot>
</x-user-layout>
