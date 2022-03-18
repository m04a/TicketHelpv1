<x-app-layout>
    <x-slot name="header">
        <h1 class="title">
            Crear una Pregunta
        </h1>
    </x-slot>
    <x-slot name="slot">
        <x-create-card>
            <form method="POST" action="">
            @csrf

            <!-- Id  -->
            <div class="content-column">
                <div class="column-left">
                    <x-label class="label" for="assumpte" :value="__('Codi Pregunta')" />

                    <x-input id="nom" class="block mt-4 w-full" type="text" name="id" required autofocus />
                </div>

            <!-- Tittle  -->

                <div class="column-right">
                    <x-label class="label" for="assumpte" :value="__('Títol')" />

                    <x-input id="nom" class="block mt-4 w-full" type="text" name="titol" required autofocus />
                </div>
            </div>
            <!-- Department -->
            <div class="content-column">
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

            <!-- Id User -->
                 <div class="column-right mt-4">
                    <x-label class="label" for="assumpte" :value="__('Codi Usuari')" />

                    <x-input id="nom" class="block mt-4 w-full" type="text" name="codiU" required autofocus />
                </div>
            </div>
            <!-- Text of the question -->
                <div class="mt-4">
                    <x-label class="label" for="missatge" :value="__('Pregunta')" />

                    <textarea class="textarea" type="text" name="pregunta" required autofocus></textarea>
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
                        {{ __('Crear Pregunta') }}
                    </x-button>
                </div>
            </form>
        </x-create-card>
    </x-slot>
</x-app-layout>
