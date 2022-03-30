<x-guest-layout>
    <x-guest-header>Articles</x-guest-header>
    <div class="grid grid-cols-3 m-8 gap-8">
        
        @foreach ($guides as $item)
        <a href="{{ url('/guides/' . $item['id']) }}">
            <div class="p-4 bg-white shadow h-52 relative">
                <h3 class="font-bold text-xl w-full" >{{$item['title']}}</h3>
                <p>{{$item['description']}}</p>
                <div class="flex flex-inline absolute bottom-4 left-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                    </svg>
                    LLEGIR
                </div>
            </div>
        </a>
        @endforeach
               
    </div>
</x-guest-layout>
