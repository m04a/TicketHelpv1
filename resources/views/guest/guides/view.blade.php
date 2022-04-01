<x-guest-layout>
    <x-guest-header description="{{$guide->description}}">{{$guide->title}}</x-guest-header>
    <div class="text-left mx-20 mt-16">
        <p>{!! \Illuminate\Support\Str::markdown($guide->content) !!}</p>
    </div>
</x-guest-layout>