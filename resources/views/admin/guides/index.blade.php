<x-app-layout>
    <x-slot name="header">
        <h1 class="title">
            Guies | Articles
        </h1>
    </x-slot>
    <x-slot name="slot">


        <section class="section main-section">
            <div class="card has-table">
                <header class="card-header">
                    <p class="card-header-title">
                        Articles
                    </p>
                    <button class="button-table-add">
                        <div class="button-table-add-separation">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            <a href="/admin/guides/create">Afegir Article</a>
                        </div>
                    </button>
                </header>
                <div class="card-content">
                    <table>
                        <thead>
                            <tr>
                                <th>Titol</th>
                                <th>Descripció</th>
                                <th>Autor</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($guides as $item)
                                <tr>
                                    <td data-label="Nom">{{ $item['title'] }}</td>
                                    <td data-label="Aula">{{ $item['description'] }}</td>
                                    <td data-label="Tipus">{{ $item['user'] }}</td>
                                    <td class="actions-cell">
                                        <div class="buttons right nowrap">
                                            <form action="{{ url('/admin/guides/edit/' . $item['id']) }}" method="PUT">
                                                <button class="button-table-edit" data-target="sample-modal-2"
                                                    type="submit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                        stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                </button>
                                            </form>
                                            <form action="{{ url('/admin/guides/' . $item['id']) }}" method="POST">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button class="button-table-delete" data-target="sample-modal"
                                                    type="submit" onclick="return confirm('Estàs Segur?')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                        stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

    </x-slot>
</x-app-layout>