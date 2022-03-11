<x-app-layout>
    <x-slot name="header">
        <h1 class="title">
             Sugerencia numero #75
        </h1>
    </x-slot>
    <x-slot name="slot">
        <x-create-card>
            <form method="POST" action="">
            @csrf

            <!-- Title  -->
                <div class="mb-4">
                    <div class=" text-black font-bold rounded-t py-2">
                        Assumpte
                    </div>
                    <input class="input suggestion-text" value="Exemple" disabled>
                </div>

                <!-- Text of the suggestion -->
                <div class="mb-6" >
                    <div class="text-black font-bold rounded-t py-2">
                        Text de sugerencia
                    </div>
                    <textarea class="textarea suggestion-text" disabled></textarea>
                </div>


                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-3 ">
                        <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd"></path></svg>
                        {{ __('Tornar al dashboard') }}
                    </x-button>
                </div>
            </form>
        </x-create-card>
    </x-slot>
</x-app-layout>
