<x-user-layout>
<x-slot name="header">
        <h1 class="title">
            Crear un sugerencia
        </h1>
    </x-slot>
    <x-slot name="slot">
        <x-create-card-user>
            <form method="POST" action="">
            @csrf

            <!-- Title  -->
                <div>
                    <x-label class="label" for="assumpte" :value="__('Assumpte')" />

                    <x-input id="nom" class="block mt-4 w-full" type="text" name="nom" required autofocus />
                </div>

                <!-- Text of the suggestion -->
                <div class="mt-4">
                    <x-label class="label" for="missatge" :value="__('Missatge')" />

                    <textarea class="textarea" type="text" name="sugerencia" required autofocus></textarea>
                </div>


                <div class="flex items-center justify-end mt-4">
                    <x-button type="submit" class="ml-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 rotate-180 rotate-90" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                    </svg>
                        {{ __('Crear') }}
                    </x-button>
                </div>
            </form>
        </x-create-card-user>
    </x-slot>
</x-user-layout>