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

        {{-- Carrusel de Anuncios --}}
        <div class="carousel w-full max-h-96">
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

        {{-- Seccion Menu del dia y mis cupones --}}
        <div class="grid md:grid-cols-3 grid-cols-1 mt-5 gap-10">
            <div class="col-span-1">
                <p class="text-lg font-semibold mb-3">Menu del dia</p>
                <div class="carousel w-full max-h-72 h-72">
                    @if (count($day->menus($diningRoom->id)) > 0)
                        @foreach ($day->menus($diningRoom->id) as $menu)
                            <div id="menuSlide{{ $loop->iteration }}" class="carousel-item relative w-full">
                                <div class="relative w-full">
                                    <img src="{{ asset('storage/' . $menu->image) }}" class="w-full object-cover h-72" />
                                    {{-- <div
                                        class="absolute top-10 md:bottom-10 md:top-auto left-10 right-10 bg-[#7bdac22e] p-5 rounded-md">
                                        <h3 class="text-center pb-3 text-white text-2xl font-bold">{{ $menu->name }}</h3>
                                     <h3 class="text-sm text-center pb-3 text-white">{{ $menu->time }}</h3>
                                    </div> --}}
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
           


                
            
                <div id="resize">
                    <div id="video-container">
                        <video  src="{{ asset('assets/welcome.mp4')}}" alt="" controls>
                        </video>
                    </div>
                </div>


            
        </div>
    </div>
    
   <style>
    #container {
        width: 100%; 
        height: 100%;
        display: flex;
        justify-content: center;
    }

    #resize {
        width: 1000px;
        height: 100%;
    }

    #video-container {
        border-radius: 1rem;
        overflow: hidden;
        background-size: cover;
        background-position: center;
        max-width: 800px;
        height: 100%; 
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

@endsection
