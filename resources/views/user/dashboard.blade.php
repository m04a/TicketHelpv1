<x-user-layout>
    @csrf
    <x-slot name="header">
        <h1 class="title">
            Dashboard
        </h1>
    </x-slot>
    <x-slot name="slot">
        <div class="card-container">
            <a href="{{route('dashboard')}}" class="card-dashboard">
            <div class="card-item">
                <div class="card-spacing">
                    <div class="card-spacing-text">
                    Incidències</div>
                </div>
            </div>
            </a>
            <a href="{{route('dashboard')}}" class="card-dashboard">
            <div class="card-item">
                <div class="card-spacing">
                    <div class="card-spacing-text">Suggerencies</div>
                </div>
            </div>
            </a>
            <a href="{{route('user.questions')}}" class="card-dashboard">
            <div class="card-item">
                <div class="card-spacing">
                    <div class="card-spacing-text">Preguntes</div>
                </div>
            </div>
            </a>
        </div>
        </div>
    </x-slot>
</x-user-layout>

