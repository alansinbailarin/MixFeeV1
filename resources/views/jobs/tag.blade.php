<x-app-layout>
    <div class="max-w-6xl mx-auto mt-10 px-2 sm:px-6 lg:px-8">
        <h1 class="text-center mt-6 text-gray-700 font-bold text-2xl">#{{$tag->name}}</h1>
                @foreach ($jobs as $job)
                <section class="card mt-10 mb-10 bg-white border border-gray-100 shadow-md rounded-md md:mr-3">
                    <article class="card-body m-8 ">
                        <div class="flex items-start">
                            <div class="flex items-start">
                                <a href="{{route('jobs.show', $job)}}" class="text-2xl font-bold text-blue-600">{{$job->title}}</a>
                                
                            </div>
                            {{-- <p class="ml-auto text-sm text-gray-400">Publicado hace {{ $job->created_at->diffForHumans()}}</p> --}}
                        </div>
                        <a href="#" class="text-gray-400 font-semibold"><span class="text-gray-400 font-light ">Publicado el {{$job->created_at->formatLocalized("%A %d %B %Y")}} por</span> {{ $job->company }} <span class="text-gray-400 font-light">en {{$job->location}}</span></a>
                        <div class="flex items-center mt-6 ">
                            <figure class="flex-shrink-0 mr-4">
                                <img alt="{{$job->user->name}}" src="{{$job->user->profile_photo_url}}" class="w-12 h-12 object-cover rounded-full">
                            </figure>
                            <div class="flex-1">
                                <a href="#" class="font-semibold text-blue-500 text-base">{{ $job->user->name}}</a>
                                <p class="text-gray-400" href="">{{ $job->user->current_job}}</p>
                            </div>
                        </div>
                        <div class="">
                            <div class="mt-5">
                                <p class="text-gray-500 font-semibold">Tipo de trabajo</p>
                                <p class="text-gray-400">{{$job->type}}</p>
                            </div>
                            <div class="mt-5">
                                <p class="text-gray-500 font-semibold">Especialidades</p>
                                @foreach ($job->tags as $tag)
                                    <a href="{{route('jobs.tag', $tag)}}" class="text-sm bg-blue-50 py-1 px-4 rounded-full text-blue-300 mt-2 inline-block">#{{ $tag->name }}</a>
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
                            <p class="text-base text-gray-500 justify mt-1">{{$job->about}}</p>
                        </div>
                        <div class="mt-5">
                            <span class="font-semibold text-gray-600 text-lg">¿Qué haras con nosotros?</span>
                            <p class="text-base text-gray-500 justify mt-1">{{$job->description}}</p>
                        </div>
                        <div class="mt-5">
                            <span class="font-semibold text-gray-600 text-lg">Beneficios que obtendras</span>
                            <p class="text-base text-gray-500 justify mt-1">{{$job->benefices}}</p>
                        </div>
                        <div class="mt-5">
                            <span class="font-semibold text-gray-600 text-lg">Responsabilidades</span>
                            <p class="text-base text-gray-500 justify mt-1">{{$job->responsabilities}}</p>
                        </div>
                        <div class="mt-5">
                            <span class="font-semibold text-gray-600 text-lg">Requisitos</span>
                            <p class="text-base text-gray-500 justify mt-1">{{$job->requirements}}</p>
                        <div class="mt-8">
                            <a href="{{route('jobs.show', $job)}}" class="text-white bg-blue-600 rounded-md px-4 py-2 hover:bg-blue-500 baseline ease-out duration-500 ">Ver</a>
                        </div>
                    </article>
                </section>
                @endforeach
            <div>
                {{$jobs->links()}}
            </div>
    </div> 
</x-app-layout>