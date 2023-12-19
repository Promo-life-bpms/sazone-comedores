@extends('layouts.app')

@section('content')
    <div class="pt-14">
        <p class="text-2xl font-bold">{{ $diningRoom->name }}</p>
        <p class="text-lg pb-5">{{ $diningRoom->address }}</p>
        {{-- <div class="collapse collapse-plus bg-base-200">
            <input type="radio" name="my-accordion-3" />
            <div class="collapse-title text-xl font-medium">
                Detalles Generales
            </div>
            <div class="collapse-content">
                @php
                    $customization = (object) json_decode($diningRoom->customization);
                @endphp
                <form action="{{ route('dining.updateDetailsGeneral', ['dining' => $diningRoom]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-4 gap-x-3">
                        <div class="col-span-1">
                            <label for="">Logotipo</label>
                            <input type="file" name="logo" class="file-input file-input-bordered w-full">
                        </div>
                        <div class="col-span-1">
                            <label for="">Color Primario</label>
                            <input type="color" name="primary" placeholder="Type here" class="input input-bordered w-full"
                                value="{{ $customization->primary_color ?? '' }}" />
                        </div>
                        <div class="col-span-1">
                            <label for="">Color Secundario</label>
                            <input type="color" name="secondary" placeholder="Type here"
                                class="input input-bordered w-full" value="{{ $customization->secondary_color ?? '' }}" />
                        </div>
                        <div class="col-span-1 flex justify-center items-end">
                            <button class="btn btn-primary w-full">Actualizar</button>
                        </div>
                    </div>
                </form>
                @if (session('success'))
                    <div role="alert" class="alert alert-success">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif
            </div>
        </div> --}}
        <div class="collapse collapse-plus bg-base-200">
            <input type="radio" name="my-accordion-3"
                @if (session('section')) {{ session('section') == 'advertisements' ? 'checked' : '' }} @endif />
            <div class="collapse-title text-xl font-medium">
                Anuncios
            </div>
            <div class="collapse-content">
                {{-- Crea una lista con los anuncios de este comedor --}}
                @include('admin.sections.advertisment.index')
            </div>
        </div>
        <div class="collapse collapse-plus bg-base-200">
            <input type="radio" name="my-accordion-3" />
            <div class="collapse-title text-xl font-medium">
                Cupones
            </div>
            <div class="collapse-content">
                @include('admin.sections.cupon.index')
            </div>
        </div>
        <div class="collapse collapse-plus bg-base-200">
            <input type="radio" name="my-accordion-3" />
            <div class="collapse-title text-xl font-medium">
                Menu
            </div>
            <div class="collapse-content">
                @include('admin.sections.menu.index')
            </div>
        </div>
        <div class="collapse collapse-plus bg-base-200">
            <input type="radio" name="my-accordion-3" />
            <div class="collapse-title text-xl font-medium">
                Usuarios
            </div>
            <div class="collapse-content">
                @include('admin.sections.user.index')
            </div>
        </div>
        {{-- <div class="collapse collapse-plus bg-base-200">
            <input type="radio" name="my-accordion-3" />
            <div class="collapse-title text-xl font-medium">
                Opciones avanzadas
            </div>
            <div class="collapse-content">
                <p>1</p>
            </div>
        </div> --}}
    </div>
@endsection
