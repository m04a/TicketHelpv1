<x-user-layout>
    <x-slot name="header">
        <h1 class="title">
            Preguntes
        </h1>
    </x-slot>
    <x-slot name="slot">
        <div class="card-container-index">
            <a href="{{route('user.dashboard')}}" class="card-dashboard-index">
            <div class="card-item-index">
                <div class="card-spacing">
                    <div class="card-spacing-text">
                    Meves Preguntes</div>
                </div>
            </div>
            </a>
            <a href="{{route('user.questions.create')}}" class="card-dashboard-index">
            <div class="card-item-index">
                <div class="card-spacing">
                    <div class="card-spacing-text">Nova Pregunta</div>
                </div>
            </div>
            </a>
        </div>
        </div>
    </x-slot>
</x-user-layout>