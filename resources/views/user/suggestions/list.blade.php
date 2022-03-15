<x-user-layout>
    <x-slot name="header">
        <h1 class="title">
            Suggerencies
        </h1>
    </x-slot>
    <x-slot name="slot">


        <section class="section main-section-user">
            <div class="card has-table">
                <header class="card-header">
                    <p class="card-header-title">
                        Les Meves Suggerencies
                    </p>
                    <button class="button-table-add">
                        <div class="button-table-add-separation">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            <span>Afegir Suggerencia</span>
                        </div>
                    </button>
                </header>
                <div class="card-content">
                    <table>
                        <thead>
                            <tr>
                                <th>Títol</th>
                                <th>Departament</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($suggestions as $suggestion)
                            <tr>
                                <td data-label="Títol">{{ $suggestion['title'] }}</td>
                                <td data-label="Departament">{{ $suggestion['description'] }}</td>
                                <td class="actions-cell">
                                    <div class="buttons right nowrap">

                                        <button class="button-table-edit" data-target="sample-modal-2" type="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                              </svg>
                                        </button>
                                        <button class="button-table-delete" data-target="sample-modal" type="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <x-pagination>
                        @for($i = 0; $i < $suggestions->lastPage(); $i++)
                            <div class="buttons">
                                <a class="pagination-next m-2" href="{{ url('/admin/suggestions?page=' . $i+1) }}" >
                                    <button type="button" class="button">{{ $i+1 }}</button>
                                </a>
                            </div>
                        @endfor
                        <small class="number-page">Pàgina {{ $suggestions->currentPage() }} de {{ $suggestions->lastPage() }} </small>
                    </x-pagination>
                </div>
            </div>
        </section>

    </x-slot>
</x-user-layout>
