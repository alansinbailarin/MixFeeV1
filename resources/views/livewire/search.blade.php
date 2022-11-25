<form class="flex items-center" autocomplete="off">   
    <div class="relative w-full">
        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
        </div>
        <input wire:model="search" type="search" class="bg-gray-100 border border-white text-gray-900 text-sm rounded-lg focus:ring-blue-300 focus:border-blue-100 block w-full pl-10 p-2.5" placeholder="Ej. React, Practicas, Servicio" required>
        @if ($search)
            <ul class="absolute w-full mt-1 bg-white rounded-md border border-gray-200 text-gray-600 text-left">
                @forelse ($results as $result)
                <li class="leading-7 px-5 text-sm cursor-pointer hover:bg-gray-100 ease-out duration-500">
                    <a id="search-job" href="{{route('jobs.show', $result)}}">{{$result->title}}</a>
                </li>
                @empty
                <li class="leading-7 px-5 bg-white text-sm ease-out duration-500">
                    No se han encontrado resultados.
                </li>
                @endforelse
            </ul>
        @endif
    </div>
  </form>