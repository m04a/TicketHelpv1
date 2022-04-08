<x-user-layout>
    <x-slot name="header">
        <h1 class="title">
            Suggeriments
        </h1>
    </x-slot>
    <x-slot name="slot">
        <div class="card-container-index">
            <a href="{{route('user.suggestions.list')}}" class="card-dashboard-index">
            <div class="card-item-index">
                <div class="card-spacing">
                    <div class="card-spacing-text">
                    Meus Suggeriments</div>
                </div>
            </div>
            </a>
            <a href="{{route('user.suggestions.create')}}" class="card-dashboard-index">
            <div class="card-item-index">
                <div class="card-spacing">
                    <div class="card-spacing-text">Nou Suggeriment</div>
                </div>
            </div>
            </a>
        </div>
        </div>
    </x-slot>
</x-user-layout>