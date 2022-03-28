<x-user-layout>
<x-slot name="header">
        <h1 class="title">
            Crear un sugerencia
        </h1>
    </x-slot>
    <x-slot name="slot">
        @if(session('success'))
                <x-success-alert id="message" class="transition-success-messages-users">
                    {{ session('success') }}
                </x-success-alert>
        @endif

       @if ($errors->any())
            <x-error-alert id="message" class="transition-error-messages-users">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </x-error-alert>
        @endif

        <x-create-card-user>
        <form action="{{ url('/user/suggestions/store') }}" method="POST">
            @csrf

            <!-- Title  -->
            <div class="content-column">
            <!-- Name User -->
            <div class="column-left-w200">
                <x-label class="label" for="assumpte" :value="__('Assumpte')" />

                <x-input id="title" class="block mt-4 w-full" type="text" name="title" autofocus />
            </div>

            <!-- Status Breakdown -->
            <div class="column-right">
                    <x-label for="rol" :value="__('Estat Incidència')" />

                    <x-select name="department_id" class="block mt-4 w-full">
                        @foreach ($department as $item)
                            <option value="{{ $item->id }} ">{{ $item->name }}</option>
                        @endforeach
                    </x-select>
                </div>
            </div>

                <!-- Text of the suggestion -->
                <div class="mt-4">
                    <x-label class="label" for="missatge" :value="__('Missatge')" />

                    <textarea class="textarea" type="text" name="description" autofocus></textarea>
                </div>


                <div class="flex items-center justify-end mt-4">
                    <!-- <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                        <input type="checkbox" name="toggle" id="toggle" class="toggle-checkbox focus:border-red-600 focus:ring-red-600 focus:ring-0 absolute block w-6 h-6 rounded-full bg-white appearance-none cursor-pointer"/>
                        <label for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 focus:ring-none cursor-pointer"></label>
                    </div>
                    <label for="toggle" class="text-xs text-gray-800">Estat</label> -->
                    <a href="{{ url('user/suggestions/list') }}">
                        <x-button type="button" class="ml-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                                {{ __('Llistat') }}
                        </x-button>
                    </a>
                    <x-button class="ml-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        {{ __('Crear') }}
                    </x-button>
                </div>
            </form>
        </x-create-card-user>
    </x-slot>
</x-user-layout>
