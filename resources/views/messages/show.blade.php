<x-app-layout>
    <div class="max-w-6xl mx-auto mt-4 px-2 sm:px-6 lg:px-8">
        <div class="gap-3 md:grid grid-rows-3 grid-flow-col gap-4">
            <div class="row-span-3 bg-white rounded-md border border-gray-200 p-6 mb-3">
                <h1 class="text-gray-800 font-bold text-xl mb-4">Perfil del aplicante</h1>
                <div class="flex items-center justify-between mb-2">
                    <a href="{{route('profile.user-profile', $sender->id)}}">
                        <img class="w-10 h-10 rounded-full" src="{{$sender->profile_photo_url}}" alt="{{$sender->name}}">
                    </a>
                    <div>
                        <a href="#" class="bg-violet-700 hover:bg-violet-600 rounded-md py-2 px-5 text-white font-semibold text-xs transition-all duration-300">Contactar</a>
                    </div>
                </div>
                <div class="text-base font-semibold leading-none text-gray-900 dark:text-white">
                    <a href="{{route('profile.user-profile', $sender->id)}}" class="font-semibold text-blue-700 text-sm">{{ $sender->name }}</a>
                </div>
                <div class="mb-3">
                    <a href="#" class="hover:underline text-xs text-gray-500">{{ $sender->ocupation }}</a>
                    <p class="text-sm mb-2 text-gray-700">{{ $sender->ubication }}</p>
                    <p class="text-sm text-gray-800">{{ Str::limit($sender->biography, 700, '...') }}</p>
                </div>
            </div>
            <div class="col-span-2 bg-white bg-white rounded-md border border-gray-200 p-6 mb-3">
                <h1 class="text-gray-800 font-bold text-xl mb-4">Asunto</h1>
                <a href="{{ $message->subject }}" download class="underline text-blue-500">Descargar curriculum</a>
                <p class="mt-3 text-gray-800 font-base">{{ $message->body }}</p>
                <p class="text-gray-500 mt-2">{{ $message->created_at->formatLocalized("%A %d %B %Y") }}</p>
            </div>
            <div class="row-span-2 col-span-2 bg-white rounded-md border border-gray-200 p-6">
                <h1 class="text-gray-800 font-bold text-xl mb-4">Trayectoria del aplicante</h1>
                <ol class="relative border-l border-gray-200 dark:border-gray-700">                  
                    <li class="mb-10 ml-4">
                        <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                        <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">{{ $message->created_at->formatLocalized("%d %B %Y") }}</time>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $sender->education }}</h3>
                        <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">{{ Str::limit($sender->interests, 105, '...') }}</p>
                    </li>
                    <li class="mb-10 ml-4">
                        <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                        <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">{{ $message->created_at->formatLocalized("%d %B %Y") }}</time>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $sender->ocupation }}</h3>
                        <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">{{ Str::limit($sender->experience, 105, '...') }}</p>
                    </li>
                </ol>
            </div>
          </div>
        {{-- <div class="bg-white rounded-md border border-gray-200 p-6">
            
            <h1>{{ $message->body }}</h1>
            <h1>{{ $sender->name }}</h1>
        </div> --}}
    </div>
</x-app-layout>