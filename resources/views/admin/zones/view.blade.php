<x-app-layout>
    <x-slot name="header">
        <h1 class="title">
             Zona
        </h1>
    </x-slot>
    <x-slot name="slot">
        <x-create-card>
            <form method="POST" action="">
            @csrf

            <!-- Title  -->
                <div class="mb-4">
                    <div class=" text-black font-bold rounded-t py-2">
                        Nom
                    </div>
                    <input class="input suggestion-text" value="{{ $zones->label }}" disabled>
                </div>

                <!-- Text of the suggestion -->
                <div class="mb-6" >
                    <div class="text-black font-bold rounded-t py-2">
                        Missatge de la zona
                    </div>
                    <textarea class="textarea suggestion-text" disabled>{{ $zones->description }}</textarea>
                </div>


                <div class="button-create">
                    <a href="{{ url('admin/zones') }}">
                        <x-button type="button" class="ml-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                                {{ __('Llistat') }}
                        </x-button>
                    </a>
                </div>
            </form>
        </x-create-card>
    </x-slot>
</x-app-layout>
