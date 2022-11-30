<x-app-layout>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <div class="bg-gray-100">
        <div class="container mx-auto my-5 p-5">
            <div class="md:flex no-wrap md:-mx-2 ">
                <!-- Left Side -->
                <div class="w-full md:w-3/12 md:mx-2">
                    <!-- Profile Card -->
                    <div class="bg-white p-3 rounded-md border border-gray-200">
                        <div class="image overflow-hidden">
                            <img class="h-auto w-full mx-auto"
                            alt="{{$user->name}}" src="{{$user->profile_photo_url}}">
                        </div>
                        <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{$user->name}}</h1>
                        <h3 class="text-gray-600 font-lg text-semibold leading-6">{{$user->ocupation}}</h3>
                        <p class="text-sm text-gray-500 hover:text-gray-600 leading-6">{{Str::limit($user->biography,200,'...')}}</p>

                        <ul
                            class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                            <li class="flex items-center py-3">
                                <span>Miembro desde</span>
                                <span class="ml-auto">{{$user->created_at->format('d-m-Y')}}</span>
                            </li>
                        </ul>
                         <div class="my-4"></div>
                         {{-- validacion YO NO ME PUEDO ENVIAR MENSAGES --}}
                         @if ($user->id != auth()->id()) 
                        <div class="flex justify-center">
                            <div class="text-center object-fill w-full">
                                <a href={{route('chat.with', $user->id)}} class="items-center  object-cover hidden md:block py-2 px-20 rounded-md text-white font-medium text-base bg-violet-700 baseline hover:bg-violet-500 baseline ease-out duration-500">
                                    Contactar
                                </a>  
                            </div>
                        </div>
                        @endif
                       <!-- <div class="my-4"></div>
                        <div class="flex justify-center">
                            <div class="text-center object-fill w-full">  ⬅️ THIS DIV WILL BE CENTERED 
                                <a href="{{route('profile.cv', $user->id)}}" class="items-center  object-cover hidden md:block py-2 px-20 rounded-md text-white font-medium text-base bg-violet-700 baseline hover:bg-violet-500 baseline ease-out duration-500">
                                    Generer CV
                                </a>  
                            </div>
                          </div>-->
                    </div>
                    <!-- End of profile card -->
                    <div class="my-4"></div>
                </div>       
                <!-- Right Side -->
                <div class="w-full md:w-9/12 mx-2 h-64">
                    <!-- Profile tab -->
                    <!-- About Section -->
                    <div class="bg-white p-3 rounded-md border border-gray-200">
                        <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                            <span clas="text-green-500">
                                <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </span>
                            <span class="tracking-wide">Sobre mí</span>
                        </div>
                        <div class="text-gray-700">
                            <div class="grid md:grid-cols-2 text-sm">
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">LinkdIn</div>
                                    <a class="px-4 py-2 text-blue-400" href="{{$user->linkedin_url}}">{{$user->name}}</a>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Trabajo Actual</div>
                                    <div class="px-4 py-2">{{$user->current_job}}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Género</div>
                                    <div class="px-4 py-2">{{$user->gender}}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Contacto No.</div>
                                    <div class="px-4 py-2">{{$user->phone_number}}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Lenguajes</div>
                                    <div class="px-4 py-2">{{$user->languajes}}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Ubicación</div>
                                    <div class="px-4 py-2">{{$user->ubication}}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Email.</div>
                                    <div class="px-4 py-2">
                                        <a class="text-blue-800" href="mailto:jane@example.com">{{$user->email}}</a>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Fecha Nacimiento</div>
                                    <div class="px-4 py-2">{{$user->birthday}}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Conocimientos</div>
                                    <div class="px-4 py-2">{{$user->knownments}}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Habilidades</div>
                                    <div class="px-4 py-2">{{$user->skills}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of about section -->
    
                    <div class="my-2"></div>
    
                    <!-- Experience and education -->
                    <div class="bg-white p-3 rounded-md border border-gray-200">
                        <div class="grid grid-cols-2">
                            <div>
                                <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                    <span clas="text-green-500">
                                        <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        
                                    </span>
                                    <span class="tracking-wide">Intereses</span>
                                </div>
                                <ul class="list-inside space-y-2">
                                    <li>
                                        @foreach (explode(',', $user->interests) as $int)
                                        <li class="text-gray-700">• {{ trim($int)}}</li>
                                    @endforeach
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                    <span clas="text-green-500">
                                        <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z" />
                                            <path fill="#fff"
                                                d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                        </svg>
                                    </span>
                                    <span class="tracking-wide">Educación</span>
                                </div>
                                <ul class="list-inside space-y-2">
                                    <li>
                                        @foreach (explode(',', $user->education) as $edu)
                                            <li class="text-gray-700">• {{ trim($edu)}}</li>
                                        @endforeach
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- End of Experience and education grid -->
                    </div>
                    <!-- End of profile tab -->
                    <div class="my-2"></div>
                    <!-- Friends card -->
                    <div class="bg-white p-3 rounded-md border border-gray-200">
                        <div class="bg-white p-3">
                            <div class="flex items-center space-x-3 font-semibold text-gray-900 text-xl leading-8">
                                <span class="text-violet-500">
                                    <svg class="h-5 fill-current" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </span>
                                <span>Otros Perfiles</span>
                            </div>
                            <div class="grid grid-cols-6">
                                
                                    @foreach($simiPro as $p)
                                    <div class="text-center my-2">
                                        <img class="h-16 w-16 rounded-full mx-auto"
                                        alt="{{$p->name}}" src="{{$p->profile_photo_url}}"href="{{route('profile.user-profile', $p->id)}}">
                                        <a href="{{route('profile.user-profile', $p->id)}}" class="text-blue-700 font-semibold text-sm">{{$p->name}}</a>
                                    </div>
                                    @endforeach 
                            </div>
                        </div> 
                    </div>
                    <!-- End of friends card -->
                </div>
            </div>
        </div>
    </div>
    <div class="my-40"></div>
</x-app-layout>