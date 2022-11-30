<x-app-layout>
    <div class="max-w-6xl mx-auto mt-10 px-2 sm:px-6 lg:px-8">
        <div class="bg-white border border-gray-200 rounded-md md:mr-3 p-6">
            <h1 class="text-xl font-semibold text-gray-800 mb-3">Actividad</h1>
            @foreach ($messages as $message)
                <div class="bg-gray-100 rounded-md p-4 my-3">
                    <div class="flex items-center justify-between">
                        <p class="text-sm text-gray-600 break-all font-semibold">{{ $message->body }}</p>
                        <x-jet-dropdown-link href="#" class="text-sm text-gray-400 flex justify-center">Ver mas 
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-right-short ml-1 mt-0.5" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                            </svg>
                        </x-jet-dropdown-link>
                    </div>
                    <a class="text-blue-600 text-sm" href="{{$message->subject}}" download>{{ $message->subject }}</a>
                    <p class="text-xs text-gray-400 ">{{ $message->created_at->formatLocalized("%d %B %Y") }}</p>
                </div>
            @endforeach
        </div>
    </div>
    
</x-app-layout>