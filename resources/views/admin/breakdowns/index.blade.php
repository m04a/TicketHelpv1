<x-app-layout>
    <x-slot name="header">
        <h1 class="title">
            Incidències
        </h1>
    </x-slot>
    <x-slot name="slot">

    <section class="section main-section">
        <div class="card has-table">
            <header class="card-header">
                <p class="card-header-title">
                    Sense Assignar
                </p>
                <button class="button-table-add">
                    <div class="button-table-add-separation">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        <span>Afegir Incidència</span>
                    </div>
                </button>
            </header>
            <div class="card-content">
                <table>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Assumpte</th>
                        <th>Estat</th>
                        <th>Usuari</th>
                        <th>Departament</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($breakdownOff as $item)
                    <tr>
                        <td data-label="Nom">#</td>
                        <td data-label="Nom">{{ $item['title']  }}</td>
                        <td data-label="Nom">
                            @if($item['status'] ==0)
                                <span class="border text-center py-2 px-2 text-orange-400 bg-orange-100">No assignat</span>
                            @else
                                <span class="border text-center py-2 px-2 text-green-600 bg-green-100">Assignat</span>
                            @endif
                        </td>
                        <td data-label="Nom">{{$item['username'] }}</td>
                        <td data-label="Nom">{{$item['department'] }}</td>
                        <td class="actions-cell">
                            <div class="buttons right nowrap">
                                <a href="{{ url('/admin/breakdowns/view/' . $item['id']) }}" class="button-table-view"  data-target="sample-modal-2" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                                <a href="{{ url('/admin/breakdowns/edit/' . $item['id']) }}" class="button-table-edit"  data-target="sample-modal-2" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                <a class="button-table-delete" data-target="sample-modal" type="button" onclick="return confirm('Estàs Segur que vols eliminar?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

        <section class="section main-section">
            <div class="card has-table">
                <header class="card-header">
                    <p class="card-header-title">
                        Assignades
                    </p>
                    <button class="button-table-add">
                        <div class="button-table-add-separation">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            <span>Afegir Incidència</span>
                        </div>
                    </button>
                </header>
                <div class="card-content">
                    <table>
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Assumpte</th>
                            <th>Estat</th>
                            <th>Usuari</th>
                            <th>Departament</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($breakdownOn as $item)
                            <tr>
                                <td data-label="Nom">#</td>
                                <td data-label="Nom">{{ $item['title']  }}</td>
                                <td data-label="Nom">
                                    @if($item['status'] ==0)
                                        <span class="border text-center py-2 px-2 text-orange-400 bg-orange-100">No assignat</span>
                                    @else
                                        <span class="border text-center py-2 px-2 text-green-600 bg-green-100">Assignat</span>
                                    @endif
                                </td>
                                <td data-label="Nom">{{$item['username'] }}</td>
                                <td data-label="Nom">{{$item['department'] }}</td>
                                <td class="actions-cell">
                                    <div class="buttons right nowrap">
                                        <a href="{{ url('/admin/breakdowns/view/' . $item['id']) }}" class="button-table-view"  data-target="sample-modal-2" type="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                        <a href="{{ url('/admin/breakdowns/edit/' . $item['id']) }}" class="button-table-edit"  data-target="sample-modal-2" type="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        <a class="button-table-delete" data-target="sample-modal" type="button" onclick="return confirm('Estàs Segur que vols eliminar?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </a>
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
