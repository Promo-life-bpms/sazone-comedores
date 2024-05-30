@extends('layouts.app')

@section('content')
    <div class="pt-16 ">
        @if ($diningRoom->statusV == 1)

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">¡Éxito!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="flex justify-end gap-3">
                @if (Auth::user()->hasRole(['master-admin', 'super-admin']))
                    <a href="{{ route('dining.preview', $diningRoom) }}" class="btn text-white"
                        style="background-color: rgb(48, 79, 157)">Ver vista preliminar</a>
                @endif
            </div>

            <p class="text-2xl font-bold">{{ $diningRoom->name }}</p>
            <p class="text-lg pb-5">{{ $diningRoom->address }}</p>
            
            <div class="collapse collapse-plus bg-stone-100 " >
                <input type="radio" name="my-accordion-3"
                    @if (session('section')) {{ session('section') == 'advertisements' ? 'checked' : '' }} @endif />
                <div class="collapse-title text-xl font-medium">
                    Anuncios
                </div>
                <div class="collapse-content overflow-x-auto">
                    {{-- Crea una lista con los anuncios de este comedor --}}
                    @include('admin.sections.advertisment.index')
                </div>
            </div>
           
            <div class="mt-6">
                <div class="collapse collapse-plus bg-stone-100">
                    <input type="radio" name="my-accordion-3"
                        @if (session('section')) {{ session('section') == 'menu' ? 'checked' : '' }} @endif />
                    <div class="collapse-title text-xl font-medium">
                        Menu 
                    </div>
                    <div class="collapse-content overflow-x-auto">
                        @include('admin.sections.menu.index')
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <div class="collapse collapse-plus bg-stone-100">
                    <input type="radio" name="my-accordion-3" 
                    @if (session('section'))
                        {{ session('section') == 'usuarios' ? 'checked' : '' }}
                    @endif/>
                    <div class="collapse-title text-xl font-medium">
                        Usuarios
                    </div>
                    <div class="collapse-content overflow-x-auto">
                        @include('admin.sections.user.index')
                    </div>
                </div>
            </div>
       
            <div class="mt-6">
                <div class="collapse collapse-plus bg-stone-100  ">
                    <input type="radio" name="my-accordion-3"
                    @if (session('section'))
                        {{ session('section') == 'estres' ? 'checked' : '' }}
                    @endif/>
                    <div class="collapse-title text-xl font-medium">
                        Delimania del Mes
                    </div>
                    <div class="collapse-content overflow-x-auto">
                        @include('admin.sections.estre.index')
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <div class="collapse collapse-plus bg-stone-100  ">
                    <input type="radio" name="my-accordion-3"
                    @if (session('section'))
                        {{ session('section') == 'tags' || session('section') == 'health' || session('section') == 'nutrition' ? 'checked' : '' }}
                    @endif/>
                    <div class="collapse-title text-xl font-medium">
                        Vida Saludable
                    </div>
                    <div class="collapse-content overflow-x-auto">
                        {{--  @include('admin.sections.tags.index') --}}
                        @include('admin.sections.health.index')
                        {{-- @include('admin.sections.nutrition.index') --}}
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <div class="collapse collapse-plus bg-base-200">
                    <input type="radio" name="my-accordion-3"
                    @if (session('section'))
                        {{ session('section') == 'opcionesAvanzadas' ? 'checked' : '' }}
                    @endif/>
                    <div class="collapse-title text-xl font-medium">
                        Opciones avanzadas
                    </div>
                    <div class="collapse-content overflow-x-auto">
                        @include('admin.sections.opcAvanzadas.index')
                    </div>
                </div>
            </div>

        @endif
    </div>
@endsection
