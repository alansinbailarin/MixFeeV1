<x-app-layout>
    <!-- Esta clase contiene el container -->
    <div class="max-w-7xl mx-auto mt-4 px-2 sm:px-6 lg:px-8">
        <section class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 rounded-lg" id="hero">
            <div class="container flex flex-col-reverse md:flex-row items-center px-6 mx-auto space-y-0 md:space-y-0">
                <div class="flex pt-10 flex-col mb-16 space-y-5 md:w-1/2">
                    <div class="flex justify-center items-center md:justify-start">
                        <div class="bg-gray-100 rounded-md py-2 px-6 text-sm font-medium text-violet-700 inline-flex">Impulsamos tu carrera <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-lightning-charge ml-2 mt-1" viewBox="0 0 14 16">
                            <path d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09zM4.157 8.5H7a.5.5 0 0 1 .478.647L6.11 13.59l5.732-6.09H9a.5.5 0 0 1-.478-.647L9.89 2.41 4.157 8.5z"/>
                          </svg></div>
                    </div>
                        <h1 class="max-w-lg text-4xl font-bold text-center md:text-5xl text-gray-900 md:text-left tracking-wide">
                            El lugar en donde puedes encontrar el trabajo de tus <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-pink-500 font-bold">sueños.</span>
                        </h1>
                        <p class="max-w-lg text-center text-gray-500 md:text-left">
                            Sabemos que encontrar empleo puede ser dificil, por eso te ofrecemos la alternativa de hacerlo, de la mano de MixFee.
                        </p>
                        <div class="flex justify-center md:justify-start">
                            <a href="{{route('jobs.publish')}}" class="p-3 px-8 text-white bg-gray-900 rounded-md baseline ease-out duration-500 font-medium hover:bg-gray-800 inline-flex">Estoy buscando talento<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-right mt-1 ml-2" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                              </svg></a>
                        </div>
                </div>
                <div class="md:w-1/2 hidden md:flex">
                    <img class="" src="{{asset('img/home/img_fondo.png')}}" alt="">
                </div>
            </div>
        </section>
        <section id="masBuscado" class="mb-4">
            <div class="px-5 mx-auto rounded-md max-w-6xl">
                <h1 class="text-3xl mb-8 font-bold text-center">Lo más buscado</h1>
                <div class="bg-gray-900 p-6 rounded-lg grid md:grid-cols-3 gap-3">
                    @foreach ($categorias as $categoria)
                        <div class="text-left card bg-gray-800 rounded-md p-4 text-gray-400 font-semibold text-base">
                        <div class="flex justify-between">
                            <h1>{{ $categoria->name }}</h1>
                            <div class="cursor-pointer hover:text-gray-600 transition-all ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                </svg>
                            </div>
                        </div>
                        <p class="font-light mt-2 text-left">{{ Str::limit($categoria->description, 75, '...') }}</p>
                        <div class="mt-4">
                            <a href="{{route('jobs.category', $categoria)}}" class="bg-gray-700 px-6 hover:bg-gray-600 transition py-1 rounded-md">Ver mas</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section id="buscarEmpleo">
            <div class="max-w-6xl px-5 mx-auto md:mt-4 text-center">
                <div class="relative container mx-auto">
                    <div class="mt-10 ">
                        <h2 class="text-center text-lg md:text-left font-bold">Lo mas nuevo ({{$counting}})</h2>
                    </div>

                    <div class="md:hidden mt-5 mb-5">
                        @livewire('search')
                    </div>

                    @foreach ($jobs as $job)
                    
                    <article class="mt-5 justify-center">
                        <div class="py-6 px-4 flex flex-wrap md:flex-nowrap bg-white border border-gray-200 rounded-md">
                            
                            {{-- <div class="hidden md:w-16 md:mb-0 mb-6-mr-4 flex-shrink-0 md:flex flex-col">
                                <img src="@if($job->image) {{Storage::url($job->image->url)}} @else img/logomixfee.png @endif" alt="" class="w-14 h-14 rounded-full object-cover">
                            </div> --}}
                            <div class="mr-8 flex flex-col items-start justify-center">
                                <p class="text-gray-400 font-light text-left text-sm">Publicado {{$job->created_at->diffForHumans()}} en {{ $job->location }}</p>
                                <a href="{{route('jobs.show', $job)}}" class="text-xl font-bold text-gray-700 mb-1 text-left ">{{ $job->title }}</a>
                                <p class="text-normal font-extralight text-gray-400">{{ $job->type }}</p>
                                <p class="leading-relaxed text-gray-500 text-left hidden md:flex">{{ Str::limit($job->description, 150, '...') }}</p> 
                                
                                <div class="text-left md:text-left">
                                    @foreach ($job->tags as $tag)
                                        <a href="{{route('jobs.tag', $tag)}}" class="mt-4 text-sm font-medium bg-violet-100 py-1 px-4 rounded-md text-violet-500 inline-block">{{ $tag->name }}</a>
                                    @endforeach
                                    
                                </div>
                                <p class="mt-4 font-bold text-green-400">$ {{ $job->salary }}</p>
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