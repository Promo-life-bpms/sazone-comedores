@extends('layouts.app')

@section('content')
    <div class="pt-5">
        <h1 class="text-3xl font-semibold mb-5">¡Hola Usuario!</h1>
        {{-- Carrusel de Anuncios --}}
        <div class="carousel w-full h-96">
            <div id="slide1" class="carousel-item relative w-full">
                <div class="relative">
                    <img src="https://images.pexels.com/photos/1287142/pexels-photo-1287142.jpeg?cs=srgb&dl=pexels-eberhard-grossgasteiger-1287142.jpg&fm=jpg"
                        class="w-full object-cover" />
                    <div class="absolute top-10 md:bottom-10 md:top-auto left-10 right-10 bg-[#6ef2d16a] p-5 rounded-md">
                        <h3 class="text-xl text-center pb-3">{{ $anuncio->title }}</h3>
                        <p class="opacity-100 text-justify">{{ $anuncio->description }}</p>
                    </div>
                </div>
                <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                    <a href="#slide4" class="btn btn-circle">❮</a>
                    <a href="#slide2" class="btn btn-circle">❯</a>
                </div>
            </div>
            <div id="slide2" class="carousel-item relative w-full">
                <img src="https://www.tooltyp.com/wp-content/uploads/2014/10/1900x920-8-beneficios-de-usar-imagenes-en-nuestros-sitios-web.jpg"
                    class="w-full object-cover" />
                <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                    <a href="#slide1" class="btn btn-circle">❮</a>
                    <a href="#slide3" class="btn btn-circle">❯</a>
                </div>
            </div>
            <div id="slide3" class="carousel-item relative w-full">
                <img src="https://cdn.shopify.com/s/files/1/0229/0839/files/Busqueda_de_imagenes_3_large.jpg?v=1578328497"
                    class="w-full object-cover" />
                <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                    <a href="#slide2" class="btn btn-circle">❮</a>
                    <a href="#slide4" class="btn btn-circle">❯</a>
                </div>
            </div>
            <div id="slide4" class="carousel-item relative w-full">
                <img src="https://images.pexels.com/photos/1287142/pexels-photo-1287142.jpeg?cs=srgb&dl=pexels-eberhard-grossgasteiger-1287142.jpg&fm=jpg"
                    class="w-full object-cover" />
                <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                    <a href="#slide3" class="btn btn-circle">❮</a>
                    <a href="#slide1" class="btn btn-circle">❯</a>
                </div>
            </div>
        </div>

        {{-- Seccion Menu del dia y mis cupones --}}
        <div class="grid grid-cols-3 mt-5 gap-10">
            <div class="col-span-1">
                <p class="text-lg font-semibold mb-3">Menu del dia</p>
                <div class="carousel w-full h-96">
                    <div id="menuslide1" class="carousel-item relative w-full">
                        <img src="https://images.pexels.com/photos/1287142/pexels-photo-1287142.jpeg?cs=srgb&dl=pexels-eberhard-grossgasteiger-1287142.jpg&fm=jpg"
                            class="w-full object-cover" />
                        <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                            <a href="#menuslide4" class="btn btn-circle">❮</a>
                            <a href="#menuslide2" class="btn btn-circle">❯</a>
                        </div>
                    </div>
                    <div id="menuslide2" class="carousel-item relative w-full">
                        <img src="https://www.tooltyp.com/wp-content/uploads/2014/10/1900x920-8-beneficios-de-usar-imagenes-en-nuestros-sitios-web.jpg"
                            class="w-full object-cover" />
                        <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                            <a href="#menuslide1" class="btn btn-circle">❮</a>
                            <a href="#menuslide3" class="btn btn-circle">❯</a>
                        </div>
                    </div>
                    <div id="menuslide3" class="carousel-item relative w-full">
                        <img src="https://cdn.shopify.com/s/files/1/0229/0839/files/Busqueda_de_imagenes_3_large.jpg?v=1578328497"
                            class="w-full object-cover" />
                        <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                            <a href="#menuslide2" class="btn btn-circle">❮</a>
                            <a href="#menuslide4" class="btn btn-circle">❯</a>
                        </div>
                    </div>
                    <div id="menuslide4" class="carousel-item relative w-full">
                        <img src="https://images.pexels.com/photos/1287142/pexels-photo-1287142.jpeg?cs=srgb&dl=pexels-eberhard-grossgasteiger-1287142.jpg&fm=jpg"
                            class="w-full object-cover" />
                        <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                            <a href="#menuslide3" class="btn btn-circle">❮</a>
                            <a href="#menuslide1" class="btn btn-circle">❯</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-2">
                <p class="text-lg font-semibold mb-3">Mis Cupones</p>
                <div class="grid grid-cols-3 gap-7">
                    <img src="https://images.pexels.com/photos/1287142/pexels-photo-1287142.jpeg?cs=srgb&dl=pexels-eberhard-grossgasteiger-1287142.jpg&fm=jpg"
                        class="w-full object-cover col-span-1" />
                    <img src="https://images.pexels.com/photos/1287142/pexels-photo-1287142.jpeg?cs=srgb&dl=pexels-eberhard-grossgasteiger-1287142.jpg&fm=jpg"
                        class="w-full object-cover col-span-1" />
                    <img src="https://images.pexels.com/photos/1287142/pexels-photo-1287142.jpeg?cs=srgb&dl=pexels-eberhard-grossgasteiger-1287142.jpg&fm=jpg"
                        class="w-full object-cover col-span-1" />
                    <img src="https://images.pexels.com/photos/1287142/pexels-photo-1287142.jpeg?cs=srgb&dl=pexels-eberhard-grossgasteiger-1287142.jpg&fm=jpg"
                        class="w-full object-cover col-span-1" />
                    <img src="https://images.pexels.com/photos/1287142/pexels-photo-1287142.jpeg?cs=srgb&dl=pexels-eberhard-grossgasteiger-1287142.jpg&fm=jpg"
                        class="w-full object-cover col-span-1" />
                    <img src="https://images.pexels.com/photos/1287142/pexels-photo-1287142.jpeg?cs=srgb&dl=pexels-eberhard-grossgasteiger-1287142.jpg&fm=jpg"
                        class="w-full object-cover col-span-1" />
                    <img src="https://images.pexels.com/photos/1287142/pexels-photo-1287142.jpeg?cs=srgb&dl=pexels-eberhard-grossgasteiger-1287142.jpg&fm=jpg"
                        class="w-full object-cover col-span-1" />
                </div>
            </div>
        </div>
    </div>
@endsection
