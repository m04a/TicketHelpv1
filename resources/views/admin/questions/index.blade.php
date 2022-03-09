<x-user-layout>
    <x-slot name="header">
        <h1 class="title">
            Preguntes
        </h1>
    </x-slot>
    <x-slot name="slot">


        <section class="section main-section">
            <div class="card has-table">
                <header class="card-header">
                    <p class="card-header-title">
                        Preguntes pendents
                    </p>
                    <button class="button-table-add">
                        <div class="button-table-add-separation">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            <span>Fer una pregunta</span>
                        </div>
                    </button>
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
                                <td data-label="Assumpte">Lorem ipsum</td>
                                <td data-label="Estat">Pendent</td>
                                <td data-label="Departament">Projectes</td>
                                <td class="actions-cell">
                                    <div class="buttons right nowrap">

                                        <button class="button-table-edit" data-target="sample-modal-2" type="button">
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
                        Preguntes resoltes
                    </p>
                </header>
                <div class="card-content">
                    <table>
                        <thead>
                            <tr>
                                <th>Assumpte</th>
                                <th>Estat</th>
                                <th>Departament</th>
                                <th>Gestor</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td data-label="Assumpte">Lorem ipsum</td>
                                <td data-label="Estat">Resolt</td>
                                <td data-label="Departament">Projectes</td>
                                <td data-label="Gestor">Oriol</td>
                                <td class="actions-cell">
                                    <div class="buttons right nowrap">

                                        <button class="button-table-edit" data-target="sample-modal-2" type="button">
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
