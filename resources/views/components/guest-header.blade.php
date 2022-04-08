@props(['description'])
<div>
    <header class="bg-white shadow w-screen m-0">
        <div class="px-20 pt-10 pb-4 font-bold text-4xl">
            {{ $slot }}
        </div>

        @if(empty($description))
            <div class="pb-7"></div>
        @else
            <div class="px-20 pb-10 pt-4 font-semibold text-2xl">
                {{ $description }}
            </div>
        @endif

    </header>
</div>