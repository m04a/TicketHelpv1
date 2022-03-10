<x-app-layout>
    <x-slot name="header">
        <h1 class="title">
            Crear un sugerencia
        </h1>
    </x-slot>
    <x-slot name="slot">
        <x-create-card>
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
                    <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                        <input type="checkbox" name="toggle" id="toggle" class="toggle-checkbox focus:border-red-600 focus:ring-red-600 focus:ring-0 absolute block w-6 h-6 rounded-full bg-white appearance-none cursor-pointer"/>
                        <label for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 focus:ring-none cursor-pointer"></label>
                    </div>
                    <label for="toggle" class="text-xs text-gray-800">Estat</label>
                    <x-button class="ml-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                        </svg>
                        {{ __('Crear Sugerencia') }}
                    </x-button>
                </div>
            </form>
        </x-create-card>
    </x-slot>
</x-app-layout>