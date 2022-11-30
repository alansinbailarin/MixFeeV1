<div class="relative md:mr-14">
    <x-jet-dropdown align="right" width="60">
        <x-slot name="trigger">
            <span class="inline-flex rounded-md">
                <button type="button" wire:click="resetNotificationCount()" class="bg-gray-100 text-sm text-gray-400 transition ease-in-out delay-150 rounded-full inline-flex items-center px-3 py-2 border border-transparent hover:bg-gray-200">
                    <span class="relative inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-bell-fill text-gray-600" viewBox="0 0 16 16">
                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                        </svg>                        {{-- Si queremos que se regrese simplemente a 0, pero que no se borre, podemos quitar el if --}}
                        @if (auth()->user()->notification)
                            <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full">{{ auth()->user()->notification }}</span>
                        @endif
                      </span>                
                </button>
            </span>
        </x-slot>
        <x-slot name="content">
            <div class="w-60">
                <div class="flex justify-between px-4 py-2 text-sm text-gray-600 font-semibold">
                    <p>Notificaciones</p>
                    @if (auth()->user()->notifications->count() > 0)
                        <a href="{{route('messages.all')}}" class="text-blue-600 hover:text-blue-500">Ver más</a>                        
                    @endif
                </div>
                <ul>
                    @if (auth()->user()->notifications->count() > 0)
                        @foreach ($notifications as $notification)
                        <li wire:click="read('{{$notification->id}}')" class="{{ !$notification->read_at ? 'bg-gray-100' : '' }}">
                            <x-jet-dropdown-link href="{{$notification->data['url']}}" class="text-gray-400">
                                {{ $notification->data['message'] }}
                                <div>
                                    <span class="bg-blue-100 mt-1 text-blue-700 text-xs inline-flex items-center px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">
                                        <svg aria-hidden="true" class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>
                                        {{$notification->created_at->diffForHumans()}}
                                    </span>
                                </div>
                            </x-jet-dropdown-link>
                        </li>
                        @endforeach
                    @else
                        <p class="block px-4 py-2 text-sm text-gray-400">No hay notificaciones</p>
                    @endif
                </ul>
            </div>
        </x-slot>
    </x-jet-dropdown>
</div>