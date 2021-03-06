<x-app-layout>
    <x-slot name="header">
        <h1 class="title">
            Suggerències
        </h1>
    </x-slot>
    <x-slot name="slot">
        <section class="section main-section">
            @if(session('success'))
                <x-success-alert id="message" class="mb-6">
                    {{ session('success') }}
                </x-success-alert>
            @endif
            <div class="card has-table">
                <header class="card-header">
                    <p class="card-header-title">
                        Suggeriments
                    </p>
                    <button class="button-table-add">
                        <div class="button-table-add-separation">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            <a href="/admin/suggestions/create">Afegir Suggeriment</a>
                        </div>
                    </button>
                </header>
                <div class="card-content">
                        <!-- @if ($suggestions->onFirstPage())
                                <a class="pagination-next m-2" disabled>Anterior</a>
                            @else
                                <a class="pagination-next m-2" href="{{ $suggestions->previousPageUrl() }}">Anterior</a>
                            @endif

                            {{-- Next Page Link --}}
                            @if ($suggestions->hasMorePages())
                                <a class="pagination-next m-2" href="{{ $suggestions->nextPageUrl() }}">Següent</a>
                            @else
                                <a class="pagination-next m-2" disabled>Següent</a>
                            @endif -->
                    <table>
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Assumpte</th>
                            <th>Missatge</th>
                            <th>Departament</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($suggestions as $suggestion)
                        <tr>
                            <td data-label="Id">#{{ $suggestion['id']}}</td>
                            <td data-label="Assumpte">{{ $suggestion['title'] }}</td>
                            <td data-label="Missatge">{{ $suggestion['description'] }}</td>
                            <td data-label="Departament">{{ $suggestion['department'] }}</td>
                            <td class="actions-cell">
                                <div class="buttons right nowrap">
                                    <a href="{{ url('/admin/suggestions/view/' . $suggestion['id']) }}">
                                        <button class="button-table-view"  data-target="sample-modal-2" type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </a>
                                    <a href="{{ url('/admin/suggestions/edit/' . $suggestion['id']) }}">
                                        <button class="button-table-edit"  data-target="sample-modal-2" type="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </button>
                                    </a>
                                    <form action="{{ url('/admin/suggestions/' . $suggestion['id']) }}" method="POST">
                                        @csrf
                                        {{ method_field('DELETE') }} 

                                        <button class="button-table-delete" data-target="sample-modal" type="submit" onclick="return confirm('Estàs Segur?')">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                        </button>
                                    </form>
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
                                    @if($suggestions->currentPage() == $i+1) 
                                    <button type="button" class="button active">{{ $i+1 }}</button>
                                    @else
                                    <button type="button" class="button">{{ $i+1 }}</button>
                                    @endif
                                </a>
                            </div>
                        @endfor
                        <small class="flex w-full justify-end mr-0.5">Pàgina {{ $suggestions->currentPage() }} de {{ $suggestions->lastPage() }} </small>
                    </x-pagination>
                </div>
            </div>
        </section>
    </x-slot>
</x-app-layout>
