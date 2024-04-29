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
                    <div id="video-container" class="w-80 h-80 rounded-lg overflow-hidden relative">
                        <video src="{{ asset('assets/welcome.mp4') }}" alt="" controls
                            class="w-full h-full object-cover"></video>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="-mt-10 pt-5 rounded-lg">
        <p class="text-lg font-semibold mb-3">Capsaulas de Nutricion</p>
    <div class="grid grid-cols-3 md:grid-cols-1 gap-3 rounded-lg ">
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



    <div class="pt-5 bg-base-grey">
        <section class="bg-grey  lg:py-16 antialiased">
            <div class="w-full max-w-2xl mx-auto px-4">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Sugerencias o Comentarios</h2>
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
                        <button class="btn text-white inline-flex items-center py-2.5 px-4 text-xs font-medium text-center"
                            style="background-color: rgb(48, 79, 157)">Enviar Comentarios</button>
                    </div>
                </form>
                {{-- <article class="p-6 text-base bg-white rounded-lg dark:bg-gray-900">
              <footer class="flex justify-between items-center mb-2">
                  <div class="flex items-center">
                      <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold"><img
                              class="mr-2 w-6 h-6 rounded-full"
                              src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                              alt="Michael Gough">Michael Gough</p>
                      <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-08"
                              title="February 8th, 2022">Feb. 8, 2022</time></p>
                  </div>
                  <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1"
                      class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 dark:text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                      type="button">
                      <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                          <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                      </svg>
                      <span class="sr-only">Comment settings</span>
                  </button>
                  <!-- Dropdown menu -->
                  <div id="dropdownComment1"
                      class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                      <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                          aria-labelledby="dropdownMenuIconHorizontalButton">
                          <li>
                              <a href="#"
                                  class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                          </li>
                          <li>
                              <a href="#"
                                  class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                          </li>
                          <li>
                              <a href="#"
                                  class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                          </li>
                      </ul>
                  </div>
              </footer>
              <p class="text-gray-500 dark:text-gray-400">Very straight-to-point article. Really worth time reading. Thank you! But tools are just the
                  instruments for the UX designers. The knowledge of the design tools are as important as the
                  creation of the design strategy.</p>
              <div class="flex items-center mt-4 space-x-4">
                  <button type="button"
                      class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
                      <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z"/>
                      </svg>
                      Reply
                  </button>
              </div>
          </article> --}}

            </div>
        </section>
    </div>

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
