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
                <div id="bannerSlide{{ $loop->iteration }}" class="carousel-item-banner relative w-full">
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
                        <a href="#bannerSlide{{ $loop->first ? $loop->count : $loop->iteration - 1 }}"
                            class="btn btn-circle">❮</a>
                        <a href="#bannerSlide{{ $loop->last ? 1 : $loop->iteration + 1 }}" class="btn btn-circle">❯</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="grid md:grid-cols-3 grid-cols-1 mt-0 gap-5">
        <div class="col-span-1">
            <p class="text-lg font-semibold mb-3">Menu del dia</p>
            <div class="carousel w-full max-h-72 h-72 rounded-lg">
                @if (count($day->menus($diningRoom->id)) > 0)
                    @foreach ($day->menus($diningRoom->id) as $menu)
                        <div id="menuSlide{{ $loop->iteration }}" class="carousel-item-menu relative w-full">
                            <div class="relative w-full">
                                <img src="{{ asset('storage/' . $menu->image) }}" class="w-full object-cover h-72" />
                                <div
                                    class="absolute top-10 md:bottom-10 md:top-auto left-10 right-10 bg-[#7bdac22e] p-5 rounded-md">
                                    <h3 class="text-center pb-3 text-white text-2xl font-bold">{{ $menu->name }}</h3>
                                    <h3 class="text-sm text-center pb-3 text-white">{{ $menu->time }}</h3>
                                </div>
                            </div>
                            <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
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
                <p class="text-lg font-semibold mb-3"> Menu Anti-Estres</p>
                <div id="video-container" class="w-full h-72 rounded-lg overflow-hidden relative">
                    <video src="{{ asset('assets/welcome.mp4') }}" alt="" controls
                        class="w-full h-full object-cover"></video>
                </div>
            </div>
        </div>

        <div class="col-span-1">
            <div class="col-span-1">
                <p class="text-lg font-semibold mb-3">Delimania del Mes</p>
                <div class="carousel w-full max-h-72 h-72 rounded-lg">
                    @foreach ($estres as $estre)
                        <div id="menuAntiEstresSlide{{ $loop->iteration }}" class="carousel-item-menuEstres relative w-full">
                            <div class="relative w-full">
                                <img src="{{ asset('storage/' . $estre->resource) }}" class="w-full object-fit h-72" />
                                @if (!($estre->title == null && $estre->description == null))
                                    <div
                                        class="absolute top-10 md:bottom-10 md:top-auto left-10 right-10 bg-[#6ef2d12e] p-5 rounded-md">
                                        <h3 class="text-xl text-center pb-3">{{ $estre->title }}</h3>
                                        <p class="opacity-100 text-justify">{{ $estre->description }}</p>
                                    </div>
                                @endif
                            </div>
                            <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                                <a href="#menuAntiEstresSlide{{ $loop->first ? $loop->count : $loop->iteration - 1 }}"
                                    class="btn btn-circle">❮</a>
                                <a href="#menuAntiEstresSlide{{ $loop->last ? 1 : $loop->iteration + 1 }}"
                                    class="btn btn-circle">❯</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-span-2">
            <div class="col-span-1">
                <section class="bg-grey  lg:py-12 antialiased">
                    <div class="w-full max-w-2xl mx-auto px-4">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Sugerencias o
                                Comentarios</h2>
                        </div>
                        <form class="mb-6">
                            <div
                                class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                                <label for="comment" class="sr-only">Escribe tu Comentario o Sugerencia</label>
                                <textarea id="comment" rows="6"
                                    class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                                    placeholder="Write a comment..." required></textarea>
                            </div>
                            <div type="submit" class="flex justify-end gap-3">
                                <button
                                    class="btn text-white inline-flex items-center py-2.5 px-4 text-xs font-medium text-center"
                                    style="background-color: rgb(48, 79, 157)">Enviar Comentarios</button>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>

        <div class="col-span-1">
            <div class="col-span-1">
                <p class="text-lg font-semibold mb-3">Capsulas de Nutricion</p>
                <div class="carousel w-full max-h-72 h-72 rounded-lg">
                    @foreach ($capsulas as $capsulas)
                        <div id="capsulasSlide{{ $loop->iteration }}" class="carousel-item-capsulas relative w-full">
                            <div class="relative w-full">
                                <img src="{{ asset('storage/' . $capsulas->resource) }}" class="w-full object-fit h-72" />
                                @if (!($capsulas->title == null && $capsulas->description == null))
                                    <div
                                        class="absolute top-10 md:bottom-10 md:top-auto left-10 right-10 bg-[#6ef2d12e] p-5 rounded-md">
                                        <h3 class="text-xl text-center pb-3">{{ $capsulas->title }}</h3>
                                        <p class="opacity-100 text-justify">{{ $capsulas->description }}</p>
                                    </div>
                                @endif
                            </div>
                            <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                                <a href="#capsulasSlide{{ $loop->first ? $loop->count : $loop->iteration - 1 }}"
                                    class="btn btn-circle">❮</a>
                                <a href="#capsulasSlide{{ $loop->last ? 1 : $loop->iteration + 1 }}"
                                    class="btn btn-circle">❯</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        let slideIndex1 = 0;
        let slideIndex2 = 0;
        let slideIndex3 = 0;
        let slideIndex4 = 0;
        let slideIndex5 = 0;

        showSlides1();

        function showSlides1() {
            let i;
            let slides = document.getElementsByClassName("carousel-item-banner");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex1++;
            if (slideIndex1 > slides.length) {
                slideIndex1 = 1
            }
            slides[slideIndex1 - 1].style.display = "block";
            setTimeout(showSlides1, 2000); // Cambia la imagen cada 2 segundos
        }

        showSlides2();

        function showSlides2() {
            let i;
            let slides = document.getElementsByClassName("carousel-item-menu");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex2++;
            if (slideIndex2 > slides.length) {
                slideIndex2 = 1
            }
            slides[slideIndex2 - 1].style.display = "block";
            setTimeout(showSlides2, 2200); // Cambia la imagen cada 2 segundos
        }

        showSlides4();

        function showSlides4() {
            let i;
            let slides = document.getElementsByClassName("carousel-item-menuEstres");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex4++;
            if (slideIndex4 > slides.length) {
                slideIndex4 = 1
            }
            slides[slideIndex4 - 1].style.display = "block";
            setTimeout(showSlides4, 2600); // Cambia la imagen cada 2 segundos
        }

        showSlides5();

        function showSlides5() {
            let i;
            let slides = document.getElementsByClassName("carousel-item-capsulas");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex5++;
            if (slideIndex5 > slides.length) {
                slideIndex5 = 1
            }
            slides[slideIndex5 - 1].style.display = "block";
            setTimeout(showSlides5, 2800); // Cambia la imagen cada 2 segundos
        }
    </script>
@endsection
