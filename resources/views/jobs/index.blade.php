<x-app-layout>

    <!-- Esta clase contiene el container -->
    <div class="max-w-7xl mx-auto mt-20 px-2 sm:px-6 lg:px-8">
        <section class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 rounded-lg" id="hero">
            <div class="container flex flex-col-reverse md:flex-row items-center px-6 mx-auto  space-y-0 md:space-y-0">
                <div class="flex pt-10 flex-col mb-32 space-y-5 md:w-1/2">
                        <h1 class="max-w-md text-4xl font-bold text-center md:text-5xl md:text-left tracking-wide">
                            Encuentra tu <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-pink-500 font-bold">Trabajo ideal</span> fácil, rápido y seguro.
                        </h1>
                        <p class="max-w-sm text-center text-gray-500 md:text-left">
                            Sabemos que encontrar un trabajo es dificil, por eso te ofrecemos una plataforma donde podrás encontrar el trabajo que mas te guste en unos pocos clicks.
                        </p>
                        <div class="flex justify-center md:justify-start">
                            <a href="#buscarEmpleo" class="p-3 px-5 text-white bg-blue-600 rounded-md 
                            hover:bg-blue-500 baseline ease-out duration-500">Publicar empleo</a>
                        </div>
                </div>
                <div class="md:w-1/2">
                    <div class="bg-no-repeat" style="background-image: url({{asset('img/blob.svg')}});" >
                        
                        <img class="rounded-full" src="{{asset('img/home/hero.webp')}}" alt="">
                    </div>
                </div>
            </div>
        </section>

        <section id="buscarEmpleo">
            <div class="max-w-6xl px-5 mx-auto md:mt-20 text-center">
                <h2 class="text-3xl font-bold text-center text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-pink-500">
                    El empleo de tus sueños
                </h2>
                <div class="relative container mx-auto">
                      
                    <div class="mt-10 ">
                        <h2 class="text-center md:text-left font-bold  text-gray-600">Todos los empleos ({{$counting}})</h2>
                    </div>

                    <div class="md:hidden mt-5 mb-5">
                        @livewire('search')
                    </div>

                    @foreach ($jobs as $job)
                    
                    <article class="mt-5 justify-center">
                        <div class="py-6 px-4 flex flex-wrap md:flex-nowrap bg-white border border-gray-200 shadow-md rounded-md">
                            
                            <div class="hidden md:w-16 md:mb-0 mb-6-mr-4 flex-shrink-0 md:flex flex-col">
                                {{-- Ponerlo en el src de la imagen cuando tenga {{Storage::url($job->image->url)}} --}}
                                <img src="img/google.png" alt="" class="w-14 h-14 rounded-full object-cover">
                            </div>
                            <div class="mr-8 flex flex-col items-start justify-center">
                                <p class="text-gray-400 font-light text-left ">Publicado {{$job->created_at->diffForHumans()}} en {{ $job->location }}</p>
                                <h2 class="text-xl font-bold text-gray-500 mb-1 text-left ">{{ $job->title }}</h2>
                                <p class="text-normal font-extralight text-gray-400">{{ $job->type }}</p>
                                <p class="leading-relaxed text-gray-500 text-left hidden md:flex">{{ Str::limit($job->description, 150, '...') }}</p> 
                                
                                <div >
                                    @foreach ($job->tags as $tag)
                                        <a href="{{route('jobs.tag', $tag)}}" class="mt-4 text-sm font-bold bg-blue-50 py-1 px-4 rounded-full text-blue-300 inline-block">#{{ $tag->name }}</a>
                                    @endforeach
                                    
                                </div>
                                <p class="mt-4 font-bold text-green-400">$ {{ $job->salary }}</p>
                            </div>
                            <div class="mt-4 md:mt-0 flex items-stretch">
                                <a href="{{route('jobs.show', $job)}}" class="self-end text-white bg-blue-600 rounded-md px-4 py-2 hover:bg-blue-500 baseline ease-out duration-500 ">Aplicar</a>
                            </div>
                        </div>
                    </article>
                    
                    @endforeach

                    
                </div>
                <div class="mt-10">
                        {{$jobs->links()}}
                </div>
            </div>
        </section>
        
    </div>

</x-app-layout>