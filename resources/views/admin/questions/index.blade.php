<x-app-layout>
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
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        <span>Nova pregunta</span>                    
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
                            <th>Usuari</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td data-label="Assumpte">Problemes amb el projector</td>
                        <td data-label="Estat">Pendent</td>
                        <td data-label="Departament">Projectes</td>
                        <td data-label="Usuari">Alex</td>
                        <td class="actions-cell">
                            <div class="buttons right nowrap">

                                <button class="button-table-view"  data-target="sample-modal-2" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                        </button>
                                <button class="button-table-delete" data-target="sample-modal" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td data-label="Assumpte">Problemes amb el projector</td>
                        <td data-label="Estat">Pendent</td>
                        <td data-label="Departament">Projectes</td>
                        <td data-label="Usuari">Alex</td>
                        <td class="actions-cell">
                            <div class="buttons right nowrap">
                            <button class="button-table-view"  data-target="sample-modal-2" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <button class="button-table-delete" data-target="sample-modal" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td data-label="Assumpte">Problemes amb el projector</td>
                        <td data-label="Estat">Pendent</td>
                        <td data-label="Departament">Projectes</td>
                        <td data-label="Usuari">Alex</td>
                        <td class="actions-cell">
                            <div class="buttons right nowrap">
                                            <button class="button-table-view"  data-target="sample-modal-2" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                        </button>
                                <button class="button-table-delete" data-target="sample-modal" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td data-label="Assumpte">Problemes amb el projector</td>
                        <td data-label="Estat">Pendent</td>
                        <td data-label="Departament">Projectes</td>
                        <td data-label="Usuari">Alex</td>
                        <td class="actions-cell">
                            <div class="buttons right nowrap">
                            <button class="button-table-view"  data-target="sample-modal-2" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                        </button>
                                <button class="button-table-delete" data-target="sample-modal" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td data-label="Assumpte">Problemes amb el projector</td>
                        <td data-label="Estat">Pendent</td>
                        <td data-label="Departament">Projectes</td>
                        <td data-label="Usuari">Alex</td>
                        <td class="actions-cell">
                            <div class="buttons right nowrap">
                            <button class="button-table-view"  data-target="sample-modal-2" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <button class="button-table-delete" data-target="sample-modal" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
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

    <section class="section main-section">
        <div class="card has-table">
        <header class="card-header">
                <p class="card-header-title">
                    Preguntes assignades
                </p>
            </header>
            <div class="card-content">
                <table>
                    <thead>
                        <tr>
                            <th>Assumpte</th>
                            <th>Estat</th>
                            <th>Departament</th>
                            <th>Usuari</th>
                            <th>Manager</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    <tr>
                        <td data-label="Assumpte">Problemes amb el projector</td>
                        <td data-label="Estat">Resolta</td>
                        <td data-label="Departament">Projectes</td>
                        <td data-label="Usuari">Alex</td>
                        <td data-label="Manager">Iker</td>
                        <td class="actions-cell">
                            <div class="buttons right nowrap">
                            <button class="button-table-view"  data-target="sample-modal-2" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <button class="button-table-delete" data-target="sample-modal" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                
                    <tr>
                        
                        <td data-label="Assumpte">Desinfecció no realitzada a l'aula 306</td>
                        <td data-label="Estat">Resolta</td>
                        <td data-label="Departament">Projectes</td>
                        <td data-label="Usuari">Manel Martín</td>
                        <td data-label="Manager">Kirill Lupenkov</td>
                        <td class="actions-cell">
                            <div class="buttons right nowrap">
                            <button class="button-table-view"  data-target="sample-modal-2" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <button class="button-table-delete" data-target="sample-modal" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>

                        <td data-label="Assumpte">Porta trencada 2on Eso</td>
                        <td data-label="Estat">Resolta</td>
                        <td data-label="Departament">Projectes</td>
                        <td data-label="Usuari">Maria B.</td>
                        <td data-label="Manager">Maria B.</td>
                        <td class="actions-cell">
                            <div class="buttons right nowrap">
                            <button class="button-table-view"  data-target="sample-modal-2" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <button class="button-table-delete" data-target="sample-modal" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
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
</x-app-layout>
