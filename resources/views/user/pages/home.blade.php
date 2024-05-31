{{-- @extends('layouts.app')

@section('content')
    <div class="pt-5">
        <h1 class="text-3xl font-semibold mb-5">¡Hola {{ auth()->user()->name }}!</h1> --}}

{{-- Carrusel de Anuncios --}}
{{-- <div class="carousel w-full max-h-96">
            @foreach ($advertisements as $anuncio)
                <div id="slide{{ $loop->iteration }}" class="carousel-item relative w-full">
                    <div class="relative w-full">
                        <img src="{{ asset('storage/' . $anuncio->resource) }}" class="w-full object-cover max-h-96" />
                        @if (!($anuncio->title == null && $anuncio->description == null))
                            <div
                                class="absolute top-10 md:bottom-10 md:top-auto left-10 right-10 bg-[#6ef2d12e] p-5 rounded-md">
                                <h3 class="text-xl text-center pb-3">{{ $anuncio->title }}</h3>
                                <p class="opacity-100 text-justify">{{ $anuncio->description }}</p>
                            </div>
                        @endif
                    </div>
                    <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                        <a href="#slide{{ $loop->first ? $loop->count : $loop->iteration - 1 }}"
                            class="btn btn-circle">❮</a>
                        <a href="#slide{{ $loop->last ? 1 : $loop->iteration + 1 }}" class="btn btn-circle">❯</a>
                    </div>
                </div>
            @endforeach
        </div> --}}

{{-- Seccion Menu del dia y mis cupones --}}
{{-- <div class="grid md:grid-cols-3 grid-cols-1 mt-5 gap-10">
            <div class="col-span-1">
                <p class="text-lg font-semibold mb-3">Menu del dia</p>
                <div class="carousel w-full max-h-72 h-72">
                    @if (count($day->menus($diningRoom->id)) > 0)
                        @foreach ($day->menus($diningRoom->id) as $menu)
                            <div id="menuSlide{{ $loop->iteration }}" class="carousel-item relative w-full">
                                <div class="relative w-full">
                                    <img src="{{ asset('storage/' . $menu->image) }}" class="w-full object-cover h-72" />
                                    <div
                                        class="absolute top-10 md:bottom-10 md:top-auto left-10 right-10 bg-[#7bdac22e] p-5 rounded-md">
                                        <h3 class="text-center pb-3 text-white text-2xl font-bold">{{ $menu->name }}</h3>
                                     <h3 class="text-sm text-center pb-3 text-white">{{ $menu->time }}</h3>
                                    </div>
                                </div>
                                <div
                                    class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                                    <a href="#menuSlide{{ $loop->first ? $loop->count : $loop->iteration - 1 }}"
                                        class="btn btn-circle">❮</a>
                                    <a href="#menuSlide{{ $loop->last ? 1 : $loop->iteration + 1 }}"
                                        class="btn btn-circle">❯</a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div id="menuSlideNot" class="carousel-item relative w-full border rounded-sm ">
                            <div class="relative w-full">
                                <img src="" class="w-full object-contain" />
                                <div
                                    class="absolute top-10 md:bottom-10 md:top-auto left-10 right-10 bg-[#6ef2d12e] p-5 rounded-md">
                                    <h3 class="text-xl text-center pb-3">Sin Menu Disponible</h3>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
           

            <div class="col-span-2">

                
                <div class="flex flex-col">
                   <div class="mb-4">
                        <video src="{{ asset('assets/welcome.mp4')}}" alt="" controls>

                   </div>
                <p class="text-lg font-semibold mb-3">Mis Cupones</p>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-7">
                    <a href="{{ route('cupones') }}">
                        <img src="{{ asset('assets/cupones/Promociones_1.jpg') }}"
                            class="w-full object-cover col-span-1" />
                    </a>
                    <a href="{{ route('cupones') }}">
                        <img src="{{ asset('assets/cupones/Promociones_2.jpg') }}"
                            class="w-full object-cover col-span-1" />
                    </a>
                    <a href="{{ route('cupones') }}">
                        <img src="{{ asset('assets/cupones/Promociones_3.jpg') }}"
                            class="w-full object-cover col-span-1" />
                    </a>
                    <a href="{{ route('cupones') }}">
                        <img src="{{ asset('assets/cupones/Promociones_4.jpg') }}"
                            class="w-full object-cover col-span-1" />
                    </a>

                    <a href="{{ route('cupones') }}">
                        <img src="{{ asset('assets/cupones/Promociones_4.jpg') }}"
                            class="w-full object-cover col-span-1" />
                    </a>

                    <a href="{{ route('cupones') }}">
                        <img src="{{ asset('assets/cupones/Promociones_4.jpg') }}"
                            class="w-full object-cover col-span-1" />
                    </a>

                    <a href="{{ route('cupones') }}">
                        <img src="{{ asset('assets/cupones/Promociones_4.jpg') }}"
                            class="w-full object-cover col-span-1" />
                    </a>
                </div>
            </div>
            
        </div>
    </div>
@endsection --}}


@extends('layouts.app')

@section('content')
    <div class="pt-5">
        <h1 class="text-3xl font-semibold mb-5">¡Hola {{ auth()->user()->name }}!</h1>
        
        <div data-hs-carousel='{
    "loadingClasses": "opacity-0",
    "isAutoPlay": true
  }' class="relative">
            <div class="hs-carousel overflow-hidden w-full min-h-96 bg-white rounded-lg">
                <div
                    class="hs-carousel-body  top-0 bottom-0 start-0 flex flex-nowrap transition-transform duration-700 opacity-0">

                    <div class="hs-carousel-slide">
                        <div class="flex justify-center h-full">
                            <img src="{{ asset('assets/banner1.png') }}"
                                class="w-full object-cover max-h-96" />
                        </div>
                    </div>

                    <div class="hs-carousel-slide">
                        <div class="flex justify-center h-full">
                            <img src="{{ asset('assets/banner2.png') }}"
                                class="w-full object-cover max-h-96" />
                        </div>
                    </div>

                    @foreach ($advertisements as $anuncio)
                        <div class="hs-carousel-slide">
                            <div class="flex justify-center h-full">
                                <img src="{{ asset('storage/' . $anuncio->resource) }}"
                                    class="w-full object-cover max-h-96" />
                                @if (!($anuncio->title == null && $anuncio->description == null))
                                    <div class="self-center text-center p-5 rounded-md"
                                        style="background-color: rgba(111, 111, 111, 0.18);">
                                        <h3 class="text-xl pb-3 text-white">{{ $anuncio->title }}</h3>
                                        <p class="opacity-100 text-justify text-white">{{ $anuncio->description }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <button type="button"
                class="hs-carousel-prev hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 start-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/10 rounded-s-lg dark:text-white dark:hover:bg-white/10">
                <span class="text-2xl" aria-hidden="true">
                    <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="m15 18-6-6 6-6"></path>
                    </svg>
                </span>
                <span class="sr-only">Previous</span>
            </button>
            <button type="button"
                class="hs-carousel-next hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 end-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/10 rounded-e-lg dark:text-white dark:hover:bg-white/10">
                <span class="sr-only">Next</span>
                <span class="text-2xl" aria-hidden="true">
                    <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6"></path>
                    </svg>
                </span>
            </button>

            <div class="hs-carousel-pagination flex justify-center absolute bottom-3 start-0 end-0 space-x-2">
                @foreach ($advertisements as $anuncio)
                    <span
                        class="hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer dark:border-neutral-600 dark:hs-carousel-active:bg-blue-500 dark:hs-carousel-active:border-blue-500"></span>
                @endforeach
            </div>
        </div>
    </div>

    <div class="grid md:grid-cols-3 grid-cols-1 mt-0 gap-5 mt-5">
        <div class="col-span-1">
            <p class="text-lg font-semibold mb-3">Menu del dia</p>
            <div data-hs-carousel='{
            "loadingClasses": "opacity-0",
            "isAutoPlay": true
          }'
                class="relative">

                @if( isset($isMenuVisible) && $isMenuVisible == 1)
                    <div class="hs-carousel overflow-hidden w-full min-h-96 bg-white rounded-lg" style="width:100%;">
                        <div class="hs-carousel-body  top-0 bottom-0 start-0 flex flex-nowrap transition-transform duration-700 opacity-0">
                            @if (count($menu_banner) > 0)
                                @foreach ($menu_banner as $menu)
                                    <div id="menuSlide{{ $loop->iteration }}" class="hs-carousel-slide">
                                        <div class="relative justify-center h-full">
                                            <img src="{{ asset('storage/' . $menu->src) }}"
                                                class="w-full object-cover h-72" />
                                        </div>
                                    </div>
                                @endforeach
                            @else
                               <p>Sin anuncios del menu disponibles</p>
                            @endif
                        </div>
                    </div>

                @else
                    <div class="w-full bg-stone-200 h-100 pt-30 pb-30 z-10 text-center">
                        Platillos no disponibles
                    </div>
                @endif
                

                <button type="button"
                    class="hs-carousel-prev hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 start-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/10 rounded-s-lg dark:text-white dark:hover:bg-white/10">
                    <span class="text-2xl" aria-hidden="true">
                        <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="m15 18-6-6 6-6"></path>
                        </svg>
                    </span>
                    <span class="sr-only">Previous</span>
                </button>
                <button type="button"
                    class="hs-carousel-next hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 end-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/10 rounded-e-lg dark:text-white dark:hover:bg-white/10">
                    <span class="sr-only">Next</span>
                    <span class="text-2xl" aria-hidden="true">
                        <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>
                    </span>
                </button>

                <div class="hs-carousel-pagination flex justify-center absolute bottom-3 start-0 end-0 space-x-2">
                    @foreach ($day->menus($diningRoom->id) as $menu)
                        <span
                            class="hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer dark:border-neutral-600 dark:hs-carousel-active:bg-blue-500 dark:hs-carousel-active:border-blue-500"></span>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-span-2">
            <div class="col-span-1">
                <p class="text-lg font-semibold mb-3 ml-4"> Menu Anti-Estres</p>
                <div id="video-container" class="w-full h-72 rounded-lg overflow-hidden relative">
                    <video src="{{ asset('assets/welcome.mp4') }}" alt="" controls
                        class="w-full h-full object-cover" style="padding-left: 15px; padding-right:15px;"></video>
                </div>
            </div>
        </div>

        <div class="col-span-1">

            <br>
            
            <div class="col-span-1">
                <p class="text-lg font-semibold mb-3">Delimania del Mes</p>
                <div data-hs-carousel='{"loadingClasses": "isAutoPlay": true}' class="relative">
                    <div class="hs-carousel overflow-hidden  min-h-96 rounded-lg">
                        
                        @foreach ($estres as $estre)
                            <div id="capsulasSlide{{ $loop->iteration }}" class="hs-carousel-slide">
                                <div class="flex justify-center h-full">
                                    <img src="{{ asset('storage/' . $estre->resource) }}"
                                        class="w-full object-cover h-72" />
                                </div>
                            </div>
                        @endforeach
                   
                    </div>

                    <button type="button"
                        class="hs-carousel-prev hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 start-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/10 rounded-s-lg dark:text-white dark:hover:bg-white/10">
                        <span class="text-2xl" aria-hidden="true">
                            <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m15 18-6-6 6-6"></path>
                            </svg>
                        </span>
                        <span class="sr-only">Previous</span>
                    </button>
                    <button type="button"
                        class="hs-carousel-next hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 end-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/10 rounded-e-lg dark:text-white dark:hover:bg-white/10">
                        <span class="sr-only">Next</span>
                        <span class="text-2xl" aria-hidden="true">
                            <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m9 18 6-6-6-6"></path>
                            </svg>
                        </span>
                    </button>

                    <div class="hs-carousel-pagination flex justify-center absolute bottom-3 start-0 end-0 space-x-2">
                        @for ($i = 0; $i < count($estres); $i++)
                            <span
                                class="hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer dark:border-neutral-600 dark:hs-carousel-active:bg-blue-500 dark:hs-carousel-active:border-blue-500"></span>
                        @endfor
                    </div>
                </div>
            </div>

            <div class="col-span-1 mt-5">
                <p class="text-lg font-semibold mb-3">Horarios de servicio</p>
                <img src="{{ asset('assets/horario.jpeg')}}" alt="" style="width:100%; height:250px;">
            </div>
        </div>

        <div class="col-span-2">

            <div class="col-span-1">
                <section class="bg-grey lg:py-12 antialiased">
                    <h2 class="text-lg lg:text-xl font-bold text-gray-900 ml-4">Encuesta de servicio</h2>
                        <br>
                    <a href="https://forms.gle/rf6RDkpofTJXGn9c7" target="__blank">                    
                        <img src="{{asset('assets/sugerencias.jpeg')}}" alt="" class="w-full" style="height: 400px; object-fit:fill; padding-left:15px;padding-right:15px;">
                    </a>

                    {{-- <div class="w-full mx-auto px-4 mt-6">
                        <div class="flex justify-between items-center mb-6">
                           
                        </div>
                        <form class="mb-6">
                            <div
                                class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200">
                                <label for="comment" class="sr-only">Escribe tu Comentario o Sugerencia</label>
                                <textarea id="comment" rows="6"
                                    class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none"
                                    placeholder="¡Compartenos tus comentarios!" required></textarea>
                            </div>
                            <div type="submit" class="flex justify-end gap-3">
                                <button
                                    class="btn text-white inline-flex items-center py-2.5 px-4 text-xs font-medium text-center"
                                    style="background-color: rgb(48, 79, 157)">Enviar Comentarios</button>
                            </div>
                        </form>
                    </div> --}}
                </section>
            </div>

        </div>

        <div class="col-span-1">
          
        </div>

    @endsection
