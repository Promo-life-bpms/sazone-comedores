@extends('layouts.app')

@section('content')
    <div>
        <img src="https://images.pexels.com/photos/1060468/pexels-photo-1060468.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
            alt="" class="object-cover w-full h-52">
    </div>
    <div class="pt-5">
        <h1 class="text-3xl font-semibold mb-5">Menu Semanal</h1>
        <br>
        <div role="tablist" class="tabs tabs-bordered hidden grid-cols-6 sm:grid">
            @foreach ($menuDays as $day)
                <input type="radio" name="tabs_days_menu" role="tab" class="tab" aria-label="{{ $day->day }}"
                    {{ $loop->first ? 'checked' : '' }} />
                <div role="tabpanel" class="tab-content p-10">
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
                    <div class="">
                        @foreach ($day->menus($diningRoom->id) as $menu)
                            @if ($loop->even)
                                <div class="w-full max-w-4xl mx-auto h-52">
                                    <div class="w-1/2 text-justify relative py-8">
                                        <div class="bg-white p-5 shadow-md">
                                            <p class="text-lg font-semibold">{{ $menu->time }}</p>
                                            {{ $menu->description }}
                                        </div>
                                        <div class="absolute top-0 bottom-0 -right-2/3 -z-50">
                                            <img src="{{ asset('storage/' . $menu->image) }}" alt=""
                                                class="h-60 object-cover">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br><br>
                            @endif
                            @if ($loop->odd)
                                <div class="w-full text-right max-w-4xl mx-auto flex justify-end h-52">
                                    <div class="w-1/2 relative py-8">
                                        <div class="absolute top-0 bottom-0 -left-2/3 -z-50">
                                            <img src="{{ asset('storage/' . $menu->image) }}" alt=""
                                                class="h-60 object-cover">
                                        </div>
                                        <div class="bg-white p-5 shadow-md">
                                            <p class="text-lg font-semibold">{{ $menu->time }}</p>
                                            {{ $menu->description }}
                                        </div>
                                    </div>
                                </div>
                            @endif
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
                            @foreach ($day->menus($diningRoom->id) as $menu)
                                @if ($loop->even)
                                    <div class="w-full max-w-4xl mx-auto h-52">
                                        <div class="w-1/2 text-justify relative py-8">
                                            <div class="bg-white p-5 shadow-md">
                                                <p class="text-lg font-semibold">{{ $menu->time }}</p>
                                                {{ $menu->description }}
                                            </div>
                                            <div class="absolute top-0 bottom-0 -right-2/3 -z-50">
                                                <img src="{{ asset('storage/' . $menu->image) }}" alt=""
                                                    class="h-60 object-cover">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br><br>
                                @endif
                                @if ($loop->odd)
                                    <div class="w-full text-right max-w-4xl mx-auto flex justify-end h-52">
                                        <div class="w-1/2 relative py-8">
                                            <div class="absolute top-0 bottom-0 -left-2/3 -z-50">
                                                <img src="{{ asset('storage/' . $menu->image) }}" alt=""
                                                    class="h-60 object-cover">
                                            </div>
                                            <div class="bg-white p-5 shadow-md">
                                                <p class="text-lg font-semibold">{{ $menu->time }}</p>
                                                {{ $menu->description }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endforeach
            @else
                <p>No hay un menu disponible</p>
            @endif
        </div>
    </div>
@endsection
