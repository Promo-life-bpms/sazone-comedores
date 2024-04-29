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
        <div class="carousel w-full max-h-96 rounded-lg">
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
        </div>

        <div class="grid md:grid-cols-3 grid-cols-1 mt-5 gap-10">
            <div class="col-span-1">
                <p class="text-lg font-semibold mb-3">Menu del dia</p>
                <div class="carousel w-full max-h-72 h-72 rounded-lg">
                    @if (count($day->menus($diningRoom->id)) > 0)
                        @foreach ($day->menus($diningRoom->id) as $menu)
                            <div id="menuSlide{{ $loop->iteration }}" class="carousel-item-2 relative w-full">
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
                <div class="col-span-1">
                    <p class="text-lg font-semibold mb-3">Delimania del Mes</p>
                    <div id="video-container" class="w-full h-80 rounded-lg overflow-hidden relative">
                        <video src="{{ asset('assets/welcome.mp4') }}" alt="" controls
                            class="w-full h-full object-cover"></video>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="pt-5 rounded-lg">
        <p class="text-lg font-semibold mb-3">Tablero saludable</p>
    <div class="grid grid-cols-3 md:grid-cols-3 gap-3 rounded-lg ">
        <div class=" border p-2 relative rounded-lg">
            <button class="absolute top-0 left-0 bg-green-500 text-white py-2 px-4 rounded-lg">
            </button>
            <a href="{{ route('nutricion-vida') }}">
            <img src="{{ asset('assets/cc.png') }}" alt="Informative" class="w-full h-auto" /><div class="flex justify-end gap-3">
            </div>
          </div>
        </div>
    </div>
</div>

<div class="pt-5 bg-base-grey" style="z-index: 100;">
    
    <div class="w-7xl mx-auto px-20">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Sugerencias o Comentarios</h2>
        </div>
        <label for="comment" class="text-black">Escribe tu Comentario o Sugerencia</label>

        <form method="POST" action="{{ route('storeCommentary') }}" enctype="multipart/form-data" class="space-y-3">
            <div
                class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200">
                <textarea id="comment" rows="6" name="comment"
                    class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none "
                    placeholder="¡Compartenos tus comentarios!" required></textarea>
            </div>
            <div type="submit" class="flex justify-end gap-3">
                <button class="btn text-white inline-flex items-center py-2.5 px-4 text-xs font-medium text-center"
                    style="background-color: rgb(48, 79, 157)">Enviar Comentarios</button>
            </div>
        </form>
    </div>
</div>

    {{-- <div class="pt-5">
        <div class="grid sm:grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="md:col-span-1">
                <div class="carousel w-full max-h-70 h-full rounded-lg">
                    @if (count($day->menus($diningRoom->id)) > 0)
                        @foreach ($day->menus($diningRoom->id) as $menu)
                            <div id="menuSlide{{ $loop->iteration }}" class="carousel-item-2 relative w-full">
                                <div class="relative w-full">
                                    <a href="{{ route('nutricion-vida') }}">
                                    <img src="{{ asset('storage/' . $menu->image) }}" class="w-full object-cover h-72" /></a>
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
            <div id="video-container" class="w-full h-96 rounded-lg overflow-hidden md:col-span-1">
                <image src="{{ asset('assets/SazoneLogoMenuAntiestresGranFormatoHztlNegro.png') }}" alt="" controls
                    class="w-full h-full object-cover"></video>
            </div>
        </div>
    </div>

    

    <div class="pt-5">
        <div class="grid sm:grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="md:col-span-1">
                <img src="{{ asset('assets/SazoneLogoDelimania-GranFormatoColor.png') }}" alt="Imagen" class="w-50px h-50">
            </div>
            <div id="video-container" class="w-full h-96 rounded-lg overflow-hidden md:col-span-1">
                <video src="{{ asset('assets/welcome.mp4') }}" alt="" controls
                    class="w-full h-full object-cover"></video>
            </div>
        </div>
    </div> --}}



    

    {{-- <style>
        #video-container {
            position: relative;
        }

        #video-container img {
            position: absolute;
            top: 0px;
            left: 0px;
            width: 100px;
            height: 100px;
        }
    </style> --}}

    <script>
        let slideIndex = 0;
        showSlides();

        function showSlides() {
            let i;
            let slides = document.getElementsByClassName("carousel-item");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            slides[slideIndex - 1].style.display = "block";
            setTimeout(showSlides, 2000); // Cambia la imagen cada 2 segundos
        }

        showSlides2();

        function showSlides2() {
            let i;
            let slides = document.getElementsByClassName("carousel-item-2");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            slides[slideIndex - 1].style.display = "block";
            setTimeout(showSlides2, 2700); // Cambia la imagen cada 2 segundos
        }
    </script>
@endsection
