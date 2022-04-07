@component('mail::message')
<h1>Hola!</h1>

Heu rebut aquest correu electrònic perquè hem rebut una sol·licitud de restabliment de la contrasenya del vostre compte.

Aquest enllaç de restabliment de la contrasenya caducarà en 60 minuts.

Si no heu sol·licitat un restabliment de la contrasenya, no cal fer cap altra acció.

Salutacions,

TicketHelp.


{{-- Intro Lines --}}
{{--@foreach ($introLines as $line)
{{ $line }}

@endforeach
--}}

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}

@endcomponent
@endisset






@endcomponent
