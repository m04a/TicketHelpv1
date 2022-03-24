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
                    <x-button class="ml-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.066 11.2a1 1 0 000 1.6l5.334 4A1 1 0 0019 16V8a1 1 0 00-1.6-.8l-5.333 4zM4.066 11.2a1 1 0 000 1.6l5.334 4A1 1 0 0011 16V8a1 1 0 00-1.6-.8l-5.334 4z">
                            </path>
                        </svg>
                        <a href="{{ route ('admin.zones.index') }}">Tornar</a>                    
                    </x-button>
                </div>
            </form>
        </x-create-card>
    </x-slot>
</x-app-layout>
