<nav class="bg-white sticky top-0 z-50 border border-gray-200" x-data="{ open: false }">
    <div class="max-w-6xl mx-auto px-2 sm:px-6 lg:px-8">
      <div class="relative flex items-center justify-between h-16">
        <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
          <button x-on:click="open = true" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
          <div class="flex-shrink-0 flex items-center -mt-2">
            <a href="/">
                <h1 class="text-4xl text-transparent bg-clip-text font-bold bg-gradient-to-r from-blue-600 to-pink-500">Mix<span class="font-light text-gray-600">Fee</span></h1>
            </a>
        </div>
        <div class="hidden sm:block sm:ml-6">
            <div class="flex space-x-4 ">
              <a href="/" class=" text-violet-600 bg-white hover:bg-gray-100 px-6 py-2 rounded-md text-base font-medium ease-out duration-500" aria-current="page">Inicio</a>
              <div class="relative" x-data="{ open: false }">
                <div>
                  <button class="bg-white font-medium flex text-base text-violet-600 hover:bg-gray-100 px-7 py-2 rounded-md ease-out duration-500" x-on:click=" open = true ">Categorias <svg class="ml-2 mt-1.5 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
                </div>
                <div x-show="open" x-on:click.away=" open = false " class="bg-white absolute mt-1 w-40 border border-gray-200 rounded-md">
                  @foreach ($categories as $category)
                  <a class="block px-4 py-2 w-full text-sm hover:bg-gray-100 text-gray-600 ease-out duration-500" href="{{route('jobs.category', $category)}}">{{ $category->name }}</a>
                  @endforeach
                </div>
                
              </div>
              @livewire('search')
            </div>
          </div>
        </div>
        @auth
        <a id="messageLink" href="">
          <span id="messageIcon" class="inline-flex rounded-md mr-4 hidden">
            <button type="button" class="bg-gray-100 text-sm text-gray-400 transition ease-in-out delay-150 rounded-full inline-flex items-center px-3 py-2 border border-transparent hover:bg-gray-200">
                <span class="relative inline-block">
                  <img class="opacity-70" src="https://img.icons8.com/material-rounded/24/null/filled-chat.png"/>
                  </span>                
            </button>
          </span>
        </a>
        @livewire('notification-component')
        <div class="absolute inset-y-0 right-0 hidden items-center pr-2  sm:flex sm:ml-6 sm:pr-0">
          <div class="ml-3 relative" x-data="{ open: false }">
            <div>
              <button x-on:click="open = true" type="button" class="flex text-sm rounded-full " id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                <img class="h-9 w-9 rounded-full" src="{{ auth()->user()->profile_photo_url }}" alt="">
              </button>
            </div>
            <div x-show="open" x-on:click.away="open = false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
              <div class="flex justify-center">
              <img class="h-16 w-16 rounded-full -mt-8 border-8 border-white" src="{{ auth()->user()->profile_photo_url }}" alt="">
              </div>
              <div class="text-center">
                <a href="{{route('profile.user-profile', auth()->user()->id)}}" class="block px-4 text-sm text-gray-700 font-semibold">{{auth()->user()->name}}</a>
                <p class="block px-4 py2 text-xs font-thin text-gray-300">{{auth()->user()->ocupation}}</p>   
              </div>
              <hr class="mt-2 ml-3 mr-3 text-gray-200">
              <div class="mt-4 text-gray-500">
                <a href="{{route('profile.user-profile', auth()->user()->id)}}" class="block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="user-menu-item-0">Mi perfil</a>
                <a href="{{route('profile.cv', auth()->user()->id)}}" class="block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="user-menu-item-1">Generar CV</a>
                <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="user-menu-item-1">Configuracion</a>
                <a href="{{ url('admin/dashboard') }}" class="block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="user-menu-item-1">Panel de administrador</a>
                <form method="POST" action="{{ route('logout') }}" x-data>
                  @csrf
                    <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="user-menu-item-2" @click.prevent="$root.submit();" >Cerrar sesión</a>
                </form>
              </div>
            </div>
          </div>
        </div>
        @else
          <!-- <a href="{{ route('login') }}" class="hidden md:block mr-2 py-2 px-8 text-violet-600 bg-gray-100 font-medium text-base ease-out duration-500 rounded-md">Soy empresa</a> -->
          <a href="{{ route('register') }}" class="md:block py-2 px-8 rounded-md text-white font-medium text-base bg-violet-700 baseline hover:bg-violet-500 baseline ease-out duration-500">¡Unete!</a>    
        @endauth
      </div>
    </div>
      <div class="sm:hidden" x-show="open" x-on:click.away="open = false">
      <div class="px-2 pt-2 pb-3 space-y-1">
        <a href="/" class="hover:bg-gray-100 text-violet-700 block px-3 md:text-violet-700 py-2 rounded-md text-base font-medium" aria-current="page">Inicio</a>
        <hr>
        <span href="/" class="hover:bg-gray-100 text-gray-700 block px-3 py-2 md:text-violet-700 rounded-md text-base font-medium" aria-current="page">Categorias</span>
        @foreach ($categories as $category)
          <a href="{{route('jobs.category', $category)}}" class="hover:bg-gray-100 text-gray-500 font-normal block px-3 py-2 rounded-md text-base" aria-current="page">{{ $category->name }}</a>
        @endforeach
        @auth
        <div class="pt-4 pb-1 border-t border-gray-200">
          <div class="flex items-center px-4">
              <div class="shrink-0 mr-3">
                <img class="h-10 w-10 rounded-full object-cover" src="{{ auth()->user()->profile_photo_url }}" alt="Alan Pacheco">
              </div>
              <div>
                  <div class="font-semibold text-sm text-gray-800">{{ auth()->user()->name }}</div>
                  <div class="font-thin text-xs text-gray-300">{{ auth()->user()->ocupation }}</div>
              </div>
          </div>
          <div class="mt-3 space-y-1">
              <a class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:bg-gray-100 transition rounded-md" href="{{route('profile.user-profile', auth()->user()->id)}}" data-turbo="false">Perfil</a>
              <a href="{{route('profile.cv', auth()->user()->id)}}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:bg-gray-100 transition rounded-md" role="menuitem" tabindex="-1" id="user-menu-item-1">Generar CV</a>
              <a class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:bg-gray-100 transition rounded-md" href="{{ route('profile.show')}}" data-turbo="false">Configuracion</a>
              <a href="{{ url('admin/dashboard') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:bg-gray-100 transition rounded-md" role="menuitem" tabindex="-1" id="user-menu-item-1">Panel de administrador</a>

              <hr>
              <form method="POST" action="{{ route('logout') }}" x-data="">
                @csrf
                <a class="block mt-2 pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:bg-gray-100 rounded-md transition" href="{{ route('logout') }}" @click.prevent="$root.submit();" data-turbo="false">Cerrar sesión</a>
              </form>
          </div>
        {{-- @else
        <hr>
          <a href="{{ route('login') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:bg-gray-100 rounded-md transition">Inicia sesión</a>
          <a href="{{ route('register') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-white bg-blue-600 hover:bg-blue-300 rounded-md  transition">Registrate</a> --}}
        @endauth
      </div>
    </div>
  </nav> 
  