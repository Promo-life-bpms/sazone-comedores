@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <img src="{{ asset('assets/SazoneLogo.png') }}" alt="" class="object-cover w-30 h-52">
    </div>
    <div class="pt-5">
        <h1 class="text-3xl font-semibold mb-5">Menu Semanal</h1>

        <div class="tabs tabs-bordered hidden grid-cols-6 sm:grid flex-col">
            @foreach ($menuDays as $day)
                <input type="radio" name="tabs_days_menu" role="tab" class="tab" aria-label="{{ $day->day }}"
                    {{ $loop->first ? 'checked' : '' }} />
                <div role="tabpanel" class="tab-content p-10 justify-between">

                    @if ($day->menus($diningRoom->id)->count() == 0)
                        <div role="alert" class="alert alert-warning">
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                            <span>No hay platillos disponibles</span>
                        </div>
                    @endif

                    <div class="flex flex-row">
                        @foreach (['Desayuno', 'Comida'] as $index => $time)
                            <div
                                class="flex flex-col w-1/2 {{ $index > 0 ? 'ml-4' : '' }} border-gray-800 {{ $time == 'Desayuno' ? 'border-r-2 border-gray-800' : '' }}">
                                <h1 class="text-3xl font-semibold mb-5">{{ $time }}</h1>
                                <div class="flex flex-col">
                                    @foreach ($day->menus($diningRoom->id) as $menu)
                                        @if ($menu->time == $time)
                                            <div class="mb-6 h-20"> <!-- Establecer una altura fija para la tarjeta -->
                                                <div
                                                    class="md:flex md:items-stretch md:shadow-lg md:bg-white md:rounded-lg">
                                                    <div class="md:w-6/12 lg:w-5/12">
                                                        <img class="rounded-lg md:rounded-r-none w-full h-full object-cover"
                                                            src="{{ asset('storage/' . $menu->image) }}" />
                                                    </div>
                                                    <div
                                                        class="md:w-6/12 lg:w-7/12 bg-white p-4 md:rounded-lg md:rounded-l-none">
                                                        <h2 class="text-xl font-semibold text-secondary mb-2">
                                                            {{ $menu->name }}</h2>
                                                        <p class="text-gray-700 leading-snug overflow-hidden line-clamp-3">
                                                            {{ $menu->description }}</p>
                                                        <!-- Utilizar line-clamp-3 para limitar a 3 líneas de texto -->
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="flex flex-row">
                        @foreach (['desayuno', 'comida'] as $index => $time)
                            <div
                                class="flex flex-col w-1/2 {{ $index > 0 ? 'ml-4' : '' }} border-gray-800 {{ $time == 'desayuno' ? 'border-r-2 border-gray-800' : '' }}">
                                <h1 class="text-3xl font-semibold mb-5"></h1>
                                <div class="flex flex-col">
                                    @foreach ($day->menus($diningRoom->id) as $menu)
                                        @if ($menu->time == $time)
                                            <div class="mb-6 h-20"> <!-- Establecer una altura fija para la tarjeta -->
                                                <div
                                                    class="md:flex md:items-stretch md:shadow-lg md:bg-white md:rounded-lg">
                                                    <div class="md:w-6/12 lg:w-5/12">
                                                        <img class="rounded-lg md:rounded-r-none w-full h-full object-cover"
                                                            src="{{ asset('storage/' . $menu->image) }}" />
                                                    </div>
                                                    <div
                                                        class="md:w-6/12 lg:w-7/12 bg-white p-4 md:rounded-lg md:rounded-l-none">
                                                        <h2 class="text-xl font-semibold text-secondary mb-2">
                                                            {{ $menu->name }}</h2>
                                                        <p class="text-gray-700 leading-snug overflow-hidden line-clamp-3">
                                                            {{ $menu->description }}</p>
                                                        <!-- Utilizar line-clamp-3 para limitar a 3 líneas de texto -->
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="flex flex-row">
                        @foreach (['Cena', 'Eventos especiales'] as $index => $time)
                            <div
                                class="flex flex-col w-1/2 {{ $index > 0 ? 'ml-4' : '' }} border-gray-800 {{ $time == 'Cena' ? 'border-r-2 border-gray-800' : '' }}">
                                <h1 class="text-3xl font-semibold mb-5">{{ $time }}</h1>
                                <div class="flex flex-col">
                                    @foreach ($day->menus($diningRoom->id) as $menu)
                                        @if ($menu->time == $time)
                                            <div class="mb-6 h-40">
                                                <div
                                                    class="md:flex md:items-stretch md:shadow-lg md:bg-white md:rounded-lg">
                                                    <div class="md:w-6/12 lg:w-5/12">
                                                        <img class="rounded-lg md:rounded-r-none w-full h-full object-cover"
                                                            src="{{ asset('storage/' . $menu->image) }}" />
                                                    </div>
                                                    <div
                                                        class="md:w-6/12 lg:w-7/12 bg-white p-4 md:rounded-lg md:rounded-l-none">
                                                        <h2 class="text-xl font-semibold text-secondary mb-2">
                                                            {{ $menu->name }}</h2>
                                                        <p class="text-gray-700 leading-snug overflow-hidden line-clamp-3">
                                                            {{ $menu->description }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="flex flex-row">
                        @foreach (['cena', 'eventos especiales'] as $index => $time)
                            <div
                                class="flex flex-col w-1/2 {{ $index > 0 ? 'ml-4' : '' }} border-gray-800 {{ $time == 'Cena' ? 'border-r-2 border-gray-800' : '' }}">
                                <h1 class="text-3xl font-semibold mb-5"></h1>
                                <div class="flex flex-col">
                                    @foreach ($day->menus($diningRoom->id) as $menu)
                                        @if ($menu->time == $time)
                                            <div class="mb-6 h-40">
                                                <div
                                                    class="md:flex md:items-stretch md:shadow-lg md:bg-white md:rounded-lg">
                                                    <div class="md:w-6/12 lg:w-5/12">
                                                        <img class="rounded-lg md:rounded-r-none w-full h-full object-cover"
                                                            src="{{ asset('storage/' . $menu->image) }}" />
                                                    </div>
                                                    <div
                                                        class="md:w-6/12 lg:w-7/12 bg-white p-4 md:rounded-lg md:rounded-l-none">
                                                        <h2 class="text-xl font-semibold text-secondary mb-2">
                                                            {{ $menu->name }}</h2>
                                                        <p class="text-gray-700 leading-snug overflow-hidden line-clamp-3">
                                                            {{ $menu->description }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <div class="sm:hidden block">
            @if (count($day->menus($diningRoom->id)) > 0)
                @foreach ($menuDays as $day)
                    <input type="radio" name="tabs_days_menu" role="tab" class="tab"
                        aria-label="{{ $day->day }}" {{ $loop->first ? 'checked' : '' }} />
                    <div role="tabpanel" class="tab-content p-10">
                        @if ($day->menus($diningRoom->id)->count() == 0)
                            <div role="alert" class="alert alert-warning">
                                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                                <span>No hay platillos disponibles</span>
                            </div>
                        @endif
                        <div class="">
                            <h1 class="text-3xl mb-5">Desayunos</h1>
                            @foreach ($day->menus($diningRoom->id) as $menu)
                                @if ($menu->time == 'Desayuno')
                                    <div class="w-full max-w-4xl mx-auto h-52">
                                        <div class=" text-justify relative py-8">
                                            <div class="bg-white bg-opacity-50 p-5 shadow-md">
                                                <p class="text-lg font-semibold">{{ $menu->name }}</p>
                                                {{ $menu->description }}
                                            </div>
                                            <div class="absolute top-0 bottom-10  -z-50">
                                                <img src="{{ asset('storage/' . $menu->image) }}" alt=""
                                                    class="w-50px h-60 object-cover rounded-lg">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br><br>
                                @endif
                            @endforeach

                            @foreach ($day->menus($diningRoom->id) as $menu)
                                @if ($menu->time == 'desayuno')
                                    <div class="w-full max-w-4xl mx-auto h-52">
                                        <div class=" text-justify relative py-8">
                                            <div class="bg-white bg-opacity-50 p-5 shadow-md">
                                                <p class="text-lg font-semibold">{{ $menu->name }}</p>
                                                {{ $menu->description }}
                                            </div>
                                            <div class="absolute top-0 bottom-10  -z-50">
                                                <img src="{{ asset('storage/' . $menu->image) }}" alt=""
                                                    class="w-50px h-60 object-cover rounded-lg">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br><br>
                                @endif
                            @endforeach

                            <h1 class="text-3xl mb-5">Comidas</h1>
                            @foreach ($day->menus($diningRoom->id) as $menu)
                                @if ($menu->time == 'Comida')
                                    <div class="w-full max-w-4xl mx-auto h-52">
                                        <div class=" text-justify relative py-8">
                                            <div class="bg-white bg-opacity-50 p-5 shadow-md">
                                                <p class="text-lg font-semibold">{{ $menu->name }}</p>
                                                {{ $menu->description }}
                                            </div>
                                            <div class="absolute top-0 bottom-10  -z-50">
                                                <img src="{{ asset('storage/' . $menu->image) }}" alt=""
                                                    class="w-50px h-60 object-cover rounded-lg">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br><br>
                                @endif
                            @endforeach

                            @foreach ($day->menus($diningRoom->id) as $menu)
                                @if ($menu->time == 'comida')
                                    <div class="w-full max-w-4xl mx-auto h-52">
                                        <div class=" text-justify relative py-8">
                                            <div class="bg-white bg-opacity-50 p-5 shadow-md">
                                                <p class="text-lg font-semibold">{{ $menu->name }}</p>
                                                {{ $menu->description }}
                                            </div>
                                            <div class="absolute top-0 bottom-10  -z-50">
                                                <img src="{{ asset('storage/' . $menu->image) }}" alt=""
                                                    class="w-50px h-60 object-cover rounded-lg">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br><br>
                                @endif
                            @endforeach

                            <h1 class="text-3xl mb-5">Cena</h1>
                            @foreach ($day->menus($diningRoom->id) as $menu)
                                @if ($menu->time == 'Cena')
                                    <div class="w-full max-w-4xl mx-auto h-52">
                                        <div class=" text-justify relative py-8">
                                            <div class="bg-white bg-opacity-50 p-5 shadow-md">
                                                <p class="text-lg font-semibold">{{ $menu->name }}</p>
                                                {{ $menu->description }}
                                            </div>
                                            <div class="absolute top-0 bottom-10  -z-50">
                                                <img src="{{ asset('storage/' . $menu->image) }}" alt=""
                                                    class="w-50px h-60 object-cover rounded-lg">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br><br>
                                @endif
                            @endforeach

                            @foreach ($day->menus($diningRoom->id) as $menu)
                                @if ($menu->time == 'cena')
                                    <div class="w-full max-w-4xl mx-auto h-52">
                                        <div class=" text-justify relative py-8">
                                            <div class="bg-white bg-opacity-50 p-5 shadow-md">
                                                <p class="text-lg font-semibold">{{ $menu->name }}</p>
                                                {{ $menu->description }}
                                            </div>
                                            <div class="absolute top-0 bottom-10  -z-50">
                                                <img src="{{ asset('storage/' . $menu->image) }}" alt=""
                                                    class="w-50px h-60 object-cover rounded-lg">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br><br>
                                @endif
                            @endforeach

                            <h1 class="text-3xl mb-5">Eventos Especiales</h1>
                            @foreach ($day->menus($diningRoom->id) as $menu)
                                @if ($menu->time == 'Eventos especiales')
                                    <div class="w-full max-w-4xl mx-auto h-52">
                                        <div class=" text-justify relative py-8">
                                            <div class="bg-white bg-opacity-50 p-5 shadow-md top-100">
                                                <p class="text-lg font-semibold ">{{ $menu->name }}</p>
                                                {{ $menu->description }}
                                            </div>
                                            <div class="absolute top-0 bottom-500  -z-50">
                                                <img src="{{ asset('storage/' . $menu->image) }}" alt=""
                                                    class="w-50px h-60 object-cover rounded-lg">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br><br>
                                @endif
                            @endforeach

                            @foreach ($day->menus($diningRoom->id) as $menu)
                                @if ($menu->time == 'eventos especiales')
                                    <div class="w-full max-w-4xl mx-auto h-52">
                                        <div class=" text-justify relative py-8">
                                            <div class="bg-white bg-opacity-50 p-5 shadow-md top-100">
                                                <p class="text-lg font-semibold ">{{ $menu->name }}</p>
                                                {{ $menu->description }}
                                            </div>
                                            <div class="absolute top-0 bottom-500  -z-50">
                                                <img src="{{ asset('storage/' . $menu->image) }}" alt=""
                                                    class="w-50px h-60 object-cover rounded-lg">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br><br>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endforeach
            @else
                <p>No hay un menú disponible</p>
            @endif
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Encuentra el primer input de tipo radio y marca su correspondiente contenido como activo
            document.querySelector('input[type="radio"]').checked = true;
        });
    </script>
@endsection
