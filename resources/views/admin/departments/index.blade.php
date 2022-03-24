<x-app-layout>
    <x-slot name="header">
        <h1 class="title">
            Departaments
        </h1>
    </x-slot>
    <x-slot name="slot">


        <section class="section main-section">
            @if(session('success'))
                <x-success-alert id="message" class="mb-6">
                    {{ session('success') }}
                </x-success-alert>
            @elseif(session('error'))
                <x-error-alert id="message" class="mb-6">
                    {{ session('error') }}
                </x-error-alert>
            @endif
        <div class="card has-table">
            <header class="card-header">
                <p class="card-header-title">
                    Departments
                </p>
                <button class="button-table-add">
                    <div class="button-table-add-separation">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        <a href="{{ route ('admin.departments.create') }}">Afegir Department</a>                    
                    </div>
                </button>
            </header>
            <div class="card-content">
                <table>
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($departments as $department)
                        <tr>
                            <td data-label="id"> {{ $department['id'] }} </td>
                            <td data-label="Nom"> {{ $department['name'] }} </td>
                            <td class="actions-cell">
                                <div class="buttons right nowrap">
                                    <a href="{{ url('/admin/departments/edit/' . $department['id']) }}">
                                        <button class="button-table-edit"  data-target="sample-modal-2" type="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </button>
                                    </a>
                                    <form action="{{ url('/admin/departments/destroy/' . $department['id']) }}" method="POST">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button class="button-table-delete" data-target="sample-modal" type="submit" onclick="return confirm('Estas Segur?')">
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
                        @for($i = 0; $i < $departments->lastPage(); $i++)
                            <div class="buttons">
                                <a class="pagination-next m-2" href="{{ url('/admin/departments?page=' . $i+1) }}" >
                                    @if($departments->currentPage() == $i+1) 
                                    <button type="button" class="button active">{{ $i+1 }}</button>
                                    @else
                                    <button type="button" class="button">{{ $i+1 }}</button>
                                    @endif
                                </a>
                            </div>
                        @endfor
                        <small class="flex w-full justify-end mr-0.5">Pàgina {{ $departments->currentPage() }} de {{ $departments->lastPage() }} </small>
                    </x-pagination>
            </div>
        </div>
    </section>
    </x-slot>
</x-app-layout>
