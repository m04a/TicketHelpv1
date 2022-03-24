<x-app-layout>

        <x-slot name="header">
            <h1 class="title">
                Editar Departament
            </h1>
        </x-slot>
        @if(session('success'))
                <x-success-alert id="message" class="m-6">
                    {{ session('success') }}
                </x-success-alert>
            @endif
            @if ($errors->any())
                <x-error-alert id="message" class="m-6">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </x-error-alert>
            @endif
<x-create-card>
        <form method="POST" action="{{ url('/admin/departments/edit/' . $department['id']) }}">
            @method('PUT') 
            @csrf
            <!-- Name Department -->
            <div class="column-left">
                <x-label for="departament" :value="__('Nom Departament')" />

                <x-input id="departament" class="input-content" type="text" name="name" value="{{$department->name}}" autofocus />
            </div>
            <div class="button-create">
                <a href="{{ url('admin/departments') }}">
                    <x-button type="button" class="ml-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                        {{ __('Llistat') }}
                    </x-button>
                </a>
                <x-button class="ml-3">
                <svg class="w-6 h-6 mr-2" data-darkreader-inline-stroke="" fill="none" stroke="currentColor" style="--darkreader-inline-stroke:currentColor;" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
                    {{ __('Guardar canvis') }}
                </x-button>
            </div>
        </form>
    </x-create-card>
</x-app-layout>
