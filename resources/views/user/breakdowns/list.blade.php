<x-user-layout>
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
                        Incidències pendents
                    </p>
                </header>
                <div class="card-content">
                    <table>
                        <thead>
                            <tr>
                                <th>Assumpte</th>
                                <th>Estat</th>
                                <th>Departament</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td data-label="Assumpte">Assumpte Random 1</td>
                                <td data-label="Estat">Pendent</td>
                                <td data-label="Departament">Altres</td>
                                <td class="actions-cell">
                                    <div class="buttons right nowrap">

                                        <button class="button-table-view" data-target="sample-modal-2" type="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                <path fill-rule="evenodd"
                                                    d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <div class="card has-table">
                <header class="card-header">
                    <p class="card-header-title">
                        Incidències resoltes
                    </p>
                </header>
                <div class="card-content">
                    <table>
                        <thead>
                            <tr>
                                <th>Assumpte</th>
                                <th>Estat</th>
                                <th>Departament</th>
                                <th>Gerent</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td data-label="Assumpte">Assumpte Random 2</td>
                                <td data-label="Estat">Resolt</td>
                                <td data-label="Departament">Altres</td>
                                <td data-label="Gerent">Jorge</td>
                                <td class="actions-cell">
                                    <div class="buttons right nowrap">

                                        <button class="button-table-view" data-target="sample-modal-2" type="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                <path fill-rule="evenodd"
                                                    d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

    </x-slot>
</x-user-layout>
