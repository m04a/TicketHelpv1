<x-user-layout>
    <x-slot name="header">
        <h1 class="title">
            Preguntes
        </h1>
    </x-slot>
    <x-slot name="slot">
        <div class="card-container-question">
            <a href="{{route('user.questions')}}" class="card-dashboard-question">
            <div class="card-item-question">
                <div class="card-spacing">
                    <div class="card-spacing-text">
                    Meves Preguntes</div>
                </div>
            </div>
            </a>
            <a href="{{route('user.questions')}}" class="card-dashboard-question">
            <div class="card-item-question">
                <div class="card-spacing">
                    <div class="card-spacing-text">Nova Pregunta</div>
                </div>
            </div>
            </a>
        </div>
        </div>
    </x-slot>
</x-user-layout>