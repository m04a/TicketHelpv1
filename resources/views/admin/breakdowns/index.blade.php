<x-app-layout>
    <x-slot name="header">
        <h1 class="title">
            Incidències
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
                        Sense Assignar
                    </p>
                    <a href="{{ url("/admin/breakdowns/create") }}" class="button-table-add">
                        <div class="button-table-add-separation">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            <span>Afegir Incidència</span>
                        </div>
                    </a>
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
                            <th>Aula</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($unassigned as $item)
                            <tr>
                                <td data-label="Nom"># {{ $item['id'] }}</td>
                                <td data-label="Nom">{{ $item['title']  }}</td>
                                <td data-label="Nom">
                                    @if($item['status'] ==1)
                                        <span class="border text-center py-2 px-2 text-red-400 bg-red-100">No assignat</span>
                                    @elseif($item['status'] ==2)
                                        <span class="border text-center py-2 px-2 text-orange-600 bg-orange-100">Assignat</span>
                                    @else
                                    <span class="border text-center py-2 px-2 text-green-600 bg-green-100">Finalitzat</span>
                                     @endif
                                </td>
                                <td data-label="Nom">{{ $item['username'] }}</td>
                                <td data-label="Nom">{{ $item['department'] }}</td>
                                <td data-label="Nom">{{ $item['aula'] }}</td>
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
                                        <form action="{{ url('/admin/breakdowns/' . $item['id']) }}" method="POST">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button class="button-table-delete" data-target="sample-modal" type="submit" onclick="return confirm('Estàs Segur que vols eliminar?')">
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
                        @for($i = 0; $i < $unassigned->lastPage(); $i++)
                            <div class="buttons">
                                <a class="pagination-next m-2" href="{{ url('/admin/breakdowns?page=' . $i+1) }}" >
                                    @if($unassigned->currentPage() == $i+1) 
                                    <button type="button" class="button active">{{ $i+1 }}</button>
                                    @else
                                    <button type="button" class="button">{{ $i+1 }}</button>
                                    @endif
                                </a>
                            </div>
                        @endfor
                        <small class="flex w-full justify-end mr-0.5">Pàgina {{ $unassigned->currentPage() }} de {{ $unassigned->lastPage() }} </small>
                    </x-pagination>
                </div>
            </div>
        </section>

        <section class="section main-section">
            <div class="card has-table">
                <header class="card-header">
                    <p class="card-header-title">
                        Assignades
                    </p>
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
                            <th>Aula</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($assigned as $item)
                            <tr>
                                <td data-label="Nom"># {{ $item['id'] }}</td>
                                <td data-label="Nom">{{ $item['title']  }}</td>
                                <td data-label="Nom">
                                    @if($item['status'] == 1)
                                        <span class="border text-center py-2 px-2 text-red-400 bg-red-100">No assignat</span>
                                    @elseif($item['status'] == 2)
                                        <span class="border text-center py-2 px-2 text-orange-600 bg-orange-100">Assignat</span>
                                    @else
                                    <span class="border text-center py-2 px-2 text-green-600 bg-green-100">Finalitzat</span>
                                    @endif
                                </td>
                                <td data-label="Nom">{{$item['username'] }}</td>
                                <td data-label="Nom">{{$item['department'] }}</td>
                                <td data-label="Nom">{{ $item['aula'] }}</td>
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
                                        <form action="{{ url('/admin/breakdowns/' . $item['id']) }}" method="POST">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button class="button-table-delete" data-target="sample-modal" type="submit" onclick="return confirm('Estàs Segur que vols eliminar?')">
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
                        @for($i = 0; $i < $assigned->lastPage(); $i++)
                            <div class="buttons">
                                <a class="pagination-next m-2" href="{{ url('/admin/breakdowns?page=' . $i+1) }}" >
                                    @if($assigned->currentPage() == $i+1) 
                                    <button type="button" class="button active">{{ $i+1 }}</button>
                                    @else
                                    <button type="button" class="button">{{ $i+1 }}</button>
                                    @endif
                                </a>
                            </div>
                        @endfor
                        <small class="flex w-full justify-end mr-0.5">Pàgina {{ $assigned->currentPage() }} de {{ $assigned->lastPage() }} </small>
                    </x-pagination>
                </div>
            </div>
        </section>

        <section class="section main-section">
            <div class="card has-table">
                <header class="card-header">
                    <p class="card-header-title">
                        Acabades
                    </p>
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
                            <th>Aula</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($done as $item)
                            <tr>
                                <td data-label="Nom"># {{ $item['id'] }}</td>
                                <td data-label="Nom">{{ $item['title']  }}</td>
                                <td data-label="Nom">
                                    @if($item['status'] ==1)
                                    <span class="border text-center py-2 px-2 text-red-400 bg-red-100">No assignat</span>
                                @elseif($item['status'] ==2)
                                    <span class="border text-center py-2 px-2 text-orange-600 bg-orange-100">Assignat</span>
                                @else
                                <span class="border text-center py-2 px-2 text-green-600 bg-green-100">Finalitzat</span>
                                 @endif
                                </td>
                                <td data-label="Nom">{{$item['username'] }}</td>
                                <td data-label="Nom">{{$item['department'] }}</td>
                                <td data-label="Nom">{{ $item['aula'] }}</td>
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
                                        <form action="{{ url('/admin/breakdowns/' . $item['id']) }}" method="POST">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button class="button-table-delete" data-target="sample-modal" type="submit" onclick="return confirm('Estàs Segur que vols eliminar?')">
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
                        @for($i = 0; $i < $done->lastPage(); $i++)
                            <div class="buttons">
                                <a class="pagination-next m-2" href="{{ url('/admin/breakdowns?page=' . $i+1) }}" >
                                    @if($done->currentPage() == $i+1) 
                                    <button type="button" class="button active">{{ $i+1 }}</button>
                                    @else
                                    <button type="button" class="button">{{ $i+1 }}</button>
                                    @endif
                                </a>
                            </div>
                        @endfor
                        <small class="flex w-full justify-end mr-0.5">Pàgina {{ $done->currentPage() }} de {{ $done->lastPage() }} </small>
                    </x-pagination>
                </div>
            </div>
        </section>
    </x-slot>
</x-app-layout>
