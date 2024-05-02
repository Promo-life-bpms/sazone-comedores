@extends('layouts.app')

@section('content')
    <div class="flex justify-center gap-x-28 gap-y-8">
        <img src="{{ asset('assets/SAZONE-LOGO-SALUDABLE.png') }}" alt="" class="object-left-top w-30 h-52 ">
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 rounded-lg ">
        <div class=" p-4 relative">
            <button class="absolute top-0 left-0 bg-green-500 text-white py-2 px-4 rounded-br-lg z-10"
                style="background-color: rgb(48, 157, 63)">
                INFÓRMATE
            </button>
            <div class="carousel w-full max-h-72 h-72 rounded-lg">
                @foreach ($nutritions as $nutrition)
                    <div id="infoSlide{{ $loop->iteration }}" class="carousel-item-info relative w-full">
                        <div class="relative w-full">
                            <img src="{{ asset('storage/' . $nutrition->resource) }}" class="w-full object-fit rounded-lg h-72" />
                            @if (!($nutrition->title == null && $nutrition->description == null))
                                <div
                                    class="absolute top-10 md:bottom-10 md:top-auto left-10 right-10 bg-[#6ef2d12e] p-5 rounded-md">
                                    <h3 class="text-xl text-center pb-3">{{ $nutrition->title }}</h3>
                                    <p class="opacity-100 text-justify">{{ $nutrition->description }}</p>
                                </div>
                            @endif
                        </div>
                        <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                            <a href="#infoSlide{{ $loop->first ? $loop->count : $loop->iteration - 1 }}"
                                class="btn btn-circle">❮</a>
                            <a href="#infoSlide{{ $loop->last ? 1 : $loop->iteration + 1 }}"
                                class="btn btn-circle">❯</a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

        <div class=" p-4 relative">
            <button class="absolute top-0 left-0 bg-red-600 text-white py-2 px-4 rounded-br-lg z-10"
                style="background-color: rgb(195, 48, 48)">
                Nutricion
            </button>
            <div class="carousel w-full max-h-72 h-72 rounded-lg">
                @foreach ($tagnames as $tagname)
                    <div id="nutriSlide{{ $loop->iteration }}" class="carousel-item-nutri relative w-full">
                        <div class="relative w-full">
                            <img src="{{ asset('storage/' . $tagname->resource) }}" class="w-full object-fit h-72" />
                            @if (!($tagname->title == null && $tagname->description == null))
                                <div
                                    class="absolute top-10 md:bottom-10 md:top-auto left-10 right-10 bg-[#6ef2d12e] p-5 rounded-md">
                                    <h3 class="text-xl text-center pb-3">{{ $tagname->title }}</h3>
                                    <p class="opacity-100 text-justify">{{ $tagname->description }}</p>
                                </div>
                            @endif
                        </div>
                        <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                            <a href="#nutriSlide{{ $loop->first ? $loop->count : $loop->iteration - 1 }}"
                                class="btn btn-circle">❮</a>
                            <a href="#nutriSlide{{ $loop->last ? 1 : $loop->iteration + 1 }}"
                                class="btn btn-circle">❯</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class=" p-4 relative">
            <button class="absolute top-0 right-0 bg-yellow-400 text-white py-2 px-4 rounded-bl-lg z-10"
                style="background-color: rgb(218, 215, 50)">
                OPCIÓN SALUDABLE
            </button>
            <div class="carousel w-full h-full max-h-100 h-100 rounded-lg">
                @foreach ($healths as $health)
                    <div id="healthSlide{{ $loop->iteration }}" class="carousel-item-saludable relative w-full h-full">
                        <div class="relative w-full h-full">
                            <img src="{{ asset('storage/' . $health->resource) }}"
                                class="w-full h-full object-fit h-80" />
                            @if (!($health->title == null && $health->description == null))
                                <div
                                    class="absolute top-10 md:bottom-10 md:top-auto left-10 right-10 bg-[#6ef2d12e] p-5 rounded-md">
                                    <h3 class="text-xl text-center pb-3">{{ $health->title }}</h3>
                                    <p class="opacity-100 text-justify">{{ $health->description }}</p>
                                </div>
                            @endif
                        </div>
                        <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                            <a href="#healthSlide{{ $loop->first ? $loop->count : $loop->iteration - 1 }}"
                                class="btn btn-circle">❮</a>
                            <a href="#healthSlide{{ $loop->last ? 1 : $loop->iteration + 1 }}" class="btn btn-circle">❯</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        let slideIndex1 = 0;
        let slideIndex2 = 0;
        let slideIndex3 = 0;

        showSlides1();

        function showSlides1() {
            let i;
            let slides = document.getElementsByClassName("carousel-item-info");
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
            let slides = document.getElementsByClassName("carousel-item-nutri");
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

        showSlides3();

        function showSlides3() {
            let i;
            let slides = document.getElementsByClassName("carousel-item-saludable ");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex3++;
            if (slideIndex3 > slides.length) {
                slideIndex3 = 1
            }
            slides[slideIndex3 - 1].style.display = "block";
            setTimeout(showSlides3, 2600); // Cambia la imagen cada 2 segundos
        }

    </script>
@endsection
