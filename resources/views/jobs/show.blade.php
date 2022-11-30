<x-app-layout>
    <div class="max-w-6xl mx-auto mt-10 px-2 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3">
            <div class="col-span-2">
                <section class="card bg-white border border-gray-200 rounded-md md:mr-3">
                    <article class="card-body m-8 ">
                        <div class="flex items-start">
                            <div class="flex items-start">
                                <h1 class="text-2xl font-bold text-blue-600">{{$job->title}}</h1>
                                
                            </div>
                            {{-- <p class="ml-auto text-sm text-gray-400">Publicado hace {{ $job->created_at->diffForHumans()}}</p> --}}
                        </div>
                        <a href="#" class="text-gray-400 font-semibold"><span class="text-gray-400 font-light md:hidden">Publicado el {{$job->created_at->formatLocalized("%A %d %B %Y")}} por</span> {{ $job->company }} <span class="text-gray-400 font-light md:hidden">en {{$job->location}}</span></a>
                        <div class="flex items-center mt-6 md:hidden">
                            <figure class="flex-shrink-0 mr-4">
                                <img alt="{{$job->user->name}}" src="{{$job->user->profile_photo_url}}" class="w-12 h-12 object-cover rounded-full">
                            </figure>
                            <div class="flex-1">
                                <a href="#" class="font-semibold text-blue-500 text-base">{{ $job->user->name}}</a>
                                <p class="text-gray-400">{{ $job->user->current_job}}</p>
                            </div>
                        </div>
                        <div class="md:hidden">
                            <div class="mt-5">
                                <p class="text-gray-500 font-semibold">Tipo de trabajo</p>
                                <p class="text-gray-400">{{$job->type}}</p>
                            </div>
                            <div class="mt-5">
                                <span class="font-semibold text-gray-500">Categoria</span>
                                <p class="text-base text-gray-500  mt-1">{{$job->category->name}}</p>
                            </div>
                            <div class="mt-5">
                                <p class="text-gray-500 font-semibold">Especialidades</p>
                                @foreach ($job->tags as $tag)
                                    <a href="{{route('jobs.tag', $tag)}}" class="mt-4 text-sm font-medium bg-violet-100 py-1 px-4 rounded-md text-violet-500 inline-block">{{ $tag->name }}</a>
                                @endforeach                        
                            </div>
                            <div class="mt-5">
                                <p class="text-gray-500 font-semibold">Presupuesto</p>
                                <p class="text-green-500 font-bold">$ {{$job->salary}}</p>
                            </div>
                            <div class="mt-5">
                                <p class="text-gray-500 font-semibold">Telefono de la empresa</p>
                                <p class="text-gray-400">{{$job->company_phone}}</p>
                            </div>
                            <div class="mt-5">
                                <p class="text-gray-500 font-semibold">Correo de la empresa</p>
                                <p class="text-gray-400">{{$job->company_email}}</p>
                            </div>
                            <div class="mt-5">
                                <p class="text-gray-500 font-semibold">Sitio web de la empresa</p>
                                <a href="{{$job->company_url}}" class="text-blue-400 break-all">{{$job->company_url}}</a>
                            </div>
                        </div>
                        <div class="mt-5">
                            <span class="font-semibold text-gray-600 text-lg">Sobre nuestra empresa</span>
                            <p class="text-base text-gray-500  mt-1">{{$job->about}}</p>
                        </div>
                        <div class="mt-5">
                            <span class="font-semibold text-gray-600 text-lg">¿Qué haras con nosotros?</span>
                            <p class="text-base text-gray-500  mt-1">{{$job->description}}</p>
                        </div>
                        <div class="mt-5">
                            <span class="font-semibold text-gray-600 text-lg">Beneficios que obtendras</span>
                            <p class="text-base text-gray-500  mt-1">{{$job->benefices}}</p>
                        </div>
                        <div class="mt-5">
                            <span class="font-semibold text-gray-600 text-lg">Responsabilidades</span>
                            <p class="text-base text-gray-500  mt-1">{{$job->responsabilities}}</p>
                        </div>
                        <div class="mt-5">
                            <span class="font-semibold text-gray-600 text-lg">Requisitos</span>
                            <p class="text-base text-gray-500  mt-1">{{$job->requirements}}</p>
                        </div>
                        <div class="mt-5">
                            <span class="font-semibold text-gray-600 text-lg">Categoria</span>
                            <p class="text-base text-gray-500  mt-1">{{$job->category->name}}</p>
                        <div class="mt-8">
                            <div class="mt-8">
                            <a href="{{route('jobs.apply', $job->id)}}" class="text-white bg-blue-600 rounded-md px-4 py-2 hover:bg-blue-500 baseline ease-out duration-500 ">Aplicar a este trabajo</a>
                        </div>
                    </article>
                </section>
                <aside>
                    <h1 class="m-5 font-bold text-xl text-gray-500 text-center md:text-left">Puestos similares</h1>
                    @foreach ($similares as $similar)
                        <article class="mt-2 card bg-white border border-gray-200 rounded-md md:ml-0">
                            <div class="card-body m-8 text-sm">
                                <h1>
                                    <a class="font-bold text-gray-500 text-sm" href="{{route('jobs.show', $similar)}}">{{$similar->title}}</a>
                                    <p class="font-xs text-gray-400 font-light">Publicado el {{$similar->created_at->formatLocalized("%A %d %B %Y")}}</p>
                                    <p class="font-xs text-gray-400 font-light">{{$similar->type}}</p>
                                </h1>
                                <div class="flex items-center">
                                    <figure class="flex-shrink-0 mr-4">
                                        <img alt="{{$similar->user->name}}" src="{{$similar->user->profile_photo_url}}" class="w-12 h-12 object-cover rounded-full">
                                    </figure>
                                    <div class="flex-1 mt-2">
                                        <a href="{{route('profile.user-profile', $similar->user->id)}}" class="font-semibold text-blue-500 text-base">{{ $similar->user->name}}</a>
                                        <p class="text-gray-400 text-sm font-thin" href="">{{ $similar->user->current_job}} en {{ $similar->company }}</p>
                                    </div>
                                    <div>
                                        <a class="hidden md:flex text-white bg-blue-600 rounded-md px-4 py-2 hover:bg-blue-500 baseline ease-out duration-500 " href="{{route('jobs.show', $similar)}}">Ver</a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </aside>
            </div>
            <div class="col-span-1">
                <section class="card bg-white border border-gray-200 rounded-md ml-3 hidden md:flex">
                    <div class="card-body m-8 text-sm">
                        <div class="flex items-center">
                            <figure class="flex-shrink-0 mr-4">
                                <img alt="{{$job->user->name}}" src="{{$job->user->profile_photo_url}}" class="w-12 h-12 object-cover rounded-full">
                            </figure>
                            <div class="flex-1">
                                <a href="{{route('profile.user-profile', $job->user_id)}}" class="font-semibold text-blue-500 text-base">{{ $job->user->name}}</a>
                                <p class="text-gray-400" href="">{{ $job->user->current_job}}</p>
                                
                            </div>
                            
                        </div>
                        <div class="mt-5">
                            <p class="text-gray-500 font-semibold">Ubicacion</p>
                            <p class="text-gray-400">{{$job->location}}</p>
                        </div>
                        <div class="mt-5">
                            <p class="text-gray-500 font-semibold">Tipo de trabajo</p>
                            <p class="text-gray-400">{{$job->type}}</p>
                        </div>
                        <div class="mt-5">
                            <p class="text-gray-500 font-semibold">Especialidades</p>
                            @foreach ($job->tags as $tag)
                                <a href="{{route('jobs.tag', $tag)}}" class="mt-4 text-sm font-medium bg-violet-100 py-1 px-4 rounded-md text-violet-500 inline-block">#{{ $tag->name }}</a>
                            @endforeach                        
                        </div>
                        <div class="mt-5">
                            <p class="text-gray-500 font-semibold">Presupuesto</p>
                            <p class="text-green-500 font-bold">$ {{$job->salary}}</p>
                        </div>
                        <div class="mt-5">
                            <p class="text-gray-500 font-semibold">Fecha de publicación</p>
                            <p class="text-gray-400">{{$job->created_at->formatLocalized("%A %d %B %Y")}}</p>
                        </div>
                        <div class="mt-5">
                            <p class="text-gray-500 font-semibold">Telefono de la empresa</p>
                            <a href="tel:{{$job->company_phone}}" class="text-blue-400">{{$job->company_phone}}</a>
                        </div>
                        <div class="mt-5">
                            <p class="text-gray-500 font-semibold">Correo de la empresa</p>
                            <a href="mailto:{{$job->company_email}}" class="text-blue-400">{{$job->company_email}}</a>
                        </div>
                        <div class="mt-5">
                            <p class="text-gray-500 font-semibold">Sitio web de la empresa</p>
                            <a href="{{$job->company_url}}" class="text-blue-400 break-all">{{$job->company_url}}</a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>