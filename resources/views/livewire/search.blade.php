<form class="flex items-center" autocomplete="off">   
    <div class="relative w-full">
        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
        </div>
        <input wire:model="search" type="text" id="simple-search" class="bg-gray-100 border border-white text-gray-900 text-sm rounded-lg focus:ring-blue-300 focus:border-blue-100 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ej. Java, Nodejs, React..." required>
    </div>
    <button for="search-job" type="submit" class="p-2 ml-2 text-sm font-light text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>    
    </button>
        @if ($search)
            <ul class="absolute w-80 mt-60 bg-white rounded-md shadow-md border border-gray-100 text-gray-600 text-left">
                @forelse ($this->results as $result)
                <li class="leading-7 px-5 text-sm cursor-pointer hover:bg-gray-100 ease-out duration-500">
                    <a id="search-job" href="{{route('jobs.show', $result)}}">{{$result->title}}</a>
                </li>
                @empty
                <li class="leading-7 px-5 -mt-5 bg-white text-sm cursor-pointer hover:bg-gray-100 ease-out duration-500">
                    No hay resultados
                </li>
                @endforelse
            </ul>
        @endif
  </form>