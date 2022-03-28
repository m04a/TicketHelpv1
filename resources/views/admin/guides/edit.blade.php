<x-app-layout>

    <x-slot name="header">
        <h1 class="title">
            Editar Article
        </h1>
    </x-slot>

    @if ($errors->any())
            <x-error-alert id="message" class="transition-error-messages">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </x-error-alert>
        @endif
            @if (session('success'))
                <x-success-alert id="message" class="transition-success-messages">
                    {{ session('success') }}
                </x-success-alert>
            @endif
            @if (session('message'))
                <x-error-alert id="message" class="transition-error-messages">
                    {{ session('message') }}
                </x-error-alert>
            @endif
    <x-create-card>
        <form method="PUT" action="{{ route('admin.guides.update', $guide) }}" id="editPostForm">
            @csrf

            <div class="mt-4">
                <x-label class="label" for="title" :value="__('Titol')" />

                <x-input id="title" class="block mt-4 w-full" type="text" name="title" value="{{ $guide->title }}" autofocus />
            </div>

            <!-- Description -->
            <div class="mt-4">
                <x-label class="label" for="description" :value="__('Descripció')" />

                <textarea class="textarea" type="text" value="{{ $guide->description }}" name="description" autofocus></textarea>
            </div>

            <div class="flex flex-col space-y-2">
                <label for="editor" class="text-gray-600 font-semibold">Content</label>
                <div id="editor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>
            </div>

            <input type="hidden" id="oldContent" value="{{ $guide->content }}">
            <input type="hidden" name="content" id="content">

            <div class="button-create relative">
                <x-button class="ml-3" type="submit">
                    <svg class="w-6 h-6" data-darkreader-inline-fill="" fill="currentColor"
                        style="--darkreader-inline-fill: currentColor;" viewBox="0 -2 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                            clip-rule="evenodd"></path>
                    </svg>
                    {{ __('Editar Article') }}
                </x-button>
            </div>
        </form>
    </x-create-card>
</x-app-layout>