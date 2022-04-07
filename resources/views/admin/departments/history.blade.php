<x-app-layout>
    <x-slot name="header">
        <h1 class="title">
            Departaments
        </h1>
    </x-slot>
    <x-slot name="slot">
    <section class="section main-section">
            <div class="card has-table">
                <header class="card-header">
                    <p class="card-header-title">
                        Històric - Incidències
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
                        @foreach ($history as $item)
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
                                        <a href="{{ url('/admin/departments/view/' . $item['id']) }}" class="button-table-view"  data-target="sample-modal-2" type="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <x-pagination>
                        @for($i = 0; $i < $history->lastPage(); $i++)
                            <div class="buttons">
                                <a class="pagination-next m-2" href="{{ url('/admin/departments/history?history=' . $i+1) }}" >
                                    @if($history->currentPage() == $i+1) 
                                    <button type="button" class="button active">{{ $i+1 }}</button>
                                    @else
                                    <button type="button" class="button">{{ $i+1 }}</button>
                                    @endif
                                </a>
                            </div>
                        @endfor
                        <small class="flex w-full justify-end mr-0.5">Pàgina {{ $history->currentPage() }} de {{ $history->lastPage() }} </small>
                    </x-pagination>
                </div>
            </div>
        </section>

        <section class="section main-section">
            <div class="card has-table">
                <header class="card-header">
                    <p class="card-header-title">
                        Històric  - Preguntes
                    </p>
                </header>
                <div class="card-content">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Assumpte</th>
                            <th>Estat</th>
                            <th>Departament</th>
                            <th>Usuari</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($historyquestion as $question)
                    <tr>
                        <td data-label="id"># {{ $question['id']}}</td>
                        <td data-label="Assumpte" class="overflow-visible">{{ $question['title']}}</td>
                        <td data-label="Nom">
                            @if($question['status'] ==1)
                                <span class="border text-center py-2 px-2 text-red-400 bg-red-100">No assignat</span>
                            @elseif($question['status'] ==2)
                                <span class="border text-center py-2 px-2 text-orange-600 bg-orange-100">Assignat</span>
                            @else
                            <span class="border text-center py-2 px-2 text-green-600 bg-green-100">Finalitzat</span>
                            @endif
                        </td> 
                        <td data-label="Departament">{{ $question['department_id']}}</td>
                        <td data-label="Usuari">{{ $question['user_id']}}</td>
                        <td class="actions-cell">
                            <div class="buttons right nowrap">

                                <a href="{{ url('/admin/departments/view-question/' . $question['id']) }}">
                                    <button class="button-table-view"  data-target="sample-modal-2" type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <x-pagination>
                    @for($i = 0; $i < $historyquestion->lastPage(); $i++)
                        <div class="buttons">
                            <a class="pagination-next m-2" href="{{ url('/admin/departments/history?historyquestion=' . $i+1) }}" >
                                @if($historyquestion->currentPage() == $i+1) 
                                <button type="button" class="button active">{{ $i+1 }}</button>
                                @else
                                <button type="button" class="button">{{ $i+1 }}</button>
                                @endif
                            </a>
                        </div>
                    @endfor
                    <small class="flex w-full justify-end mr-0.5">Pàgina {{ $historyquestion->currentPage() }} de {{ $historyquestion->lastPage() }} </small>
                </x-pagination>
                </div>
            </div>
        </section>
        <section class="section main-section">
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
                    <table>
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Assumpte</th>
                            <th>Missatge</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($historysuggestion as $suggestion)
                        <tr>
                            <td data-label="Id">#{{ $suggestion['id']}}</td>
                            <td data-label="Assumpte">{{ $suggestion['title'] }}</td>
                            <td data-label="Missatge">{{ $suggestion['description'] }}</td>
                            <td class="actions-cell">
                                <div class="buttons right nowrap">
                                    <a href="{{ url('/admin/departments/view-suggestion/' . $suggestion['id']) }}">
                                        <button class="button-table-view"  data-target="sample-modal-2" type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <x-pagination>
                        @for($i = 0; $i < $historysuggestion->lastPage(); $i++)
                            <div class="buttons">
                                <a class="pagination-next m-2" href="{{ url('/admin/departments/history?historysuggestion=' . $i+1) }}" >
                                    @if($historysuggestion->currentPage() == $i+1) 
                                    <button type="button" class="button active">{{ $i+1 }}</button>
                                    @else
                                    <button type="button" class="button">{{ $i+1 }}</button>
                                    @endif
                                </a>
                            </div>
                        @endfor
                        <small class="flex w-full justify-end mr-0.5">Pàgina {{ $historysuggestion->currentPage() }} de {{ $historysuggestion->lastPage() }} </small>
                    </x-pagination>
                </div>
            </div>
        </section>
    </x-slot>
</x-app-layout>
