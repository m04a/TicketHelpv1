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
