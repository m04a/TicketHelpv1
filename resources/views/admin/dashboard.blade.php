<x-user-layout>
    <x-slot name="header">
        <h1 class="title">
            Dashboard
        </h1>
    </x-slot>
    <x-slot name="slot">
        <x-select>
            <option value="1">Hola</option>
        </x-select>
        <div class="card-container">
            <a href="{{route('users')}}" class="card-dashboard">
            <div class="card-item">
                <div class="card-spacing">
                    <div class="card-spacing-text">
                    Incidències</div>
                </div>
            </div>
            </a>
            <a href="{{route('users')}}" class="card-dashboard">
            <div class="card-item">
                <div class="card-spacing">
                    <div class="card-spacing-text">Suggerencies</div>
                </div>
            </div>
            </a>
            <a href="{{route('users')}}" class="card-dashboard">
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

