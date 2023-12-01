@extends('layouts.admin-layout')

@section('content')
    <div class="pt-14">
        <p class="text-2xl font-bold">{{ $dinningRoom->name }}</p>
        <p class="text-lg pb-5">{{ $dinningRoom->address }}</p>
        <div class="collapse collapse-plus bg-base-200">
            <input type="radio" name="my-accordion-3" checked="checked" />
            <div class="collapse-title text-xl font-medium">
                Detalles Generales
            </div>
            @if (isset($success))
                {{ $success }}
            @endif
            <div class="collapse-content">
                @php
                    $customization = (object) json_decode($dinningRoom->customization);
                @endphp
                <form action="{{ route('dinning.updateDetailsGeneral', ['dinning' => $dinningRoom]) }}" method="POST"
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
                                value="{{ $customization->primary_color }}" />
                        </div>
                        <div class="col-span-1">
                            <label for="">Color Secundario</label>
                            <input type="color" name="secondary" placeholder="Type here"
                                class="input input-bordered w-full" value="{{ $customization->secondary_color }}" />
                        </div>
                        <div class="col-span-1 flex justify-center items-end">
                            <button class="btn btn-primary w-full">Actualizar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="collapse collapse-plus bg-base-200">
            <input type="radio" name="my-accordion-3" />
            <div class="collapse-title text-xl font-medium">
                Cupones
            </div>
            <div class="collapse-content">
                <h1 class="text-lg font-semibold my-2">Agregar nuevo cupon</h1>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-x-28 gap-y-8">
                    <div class="col-span-1 h-32 rounded-xl border-2 flex justify-center items-center cursor-pointer"
                        onclick="my_modal_3.showModal()">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </div>
                </div>
                <h1 class="text-lg font-semibold my-2">Cupones Disponibles</h1>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-x-28 gap-y-8">
                    @php
                        $dinningRooms = [];
                    @endphp
                    @foreach ($dinningRooms as $dr)
                        <div class="col-span-1">
                            <a href="{{ route('dinning.show', ['dinning' => $dr->id]) }}"
                                class="rounded-xl relative cursor-pointer">
                                <img src="{{ asset('storage/' . $dr->logo) }}" class="object-cover w-full h-32 rounded-xl"
                                    alt="">
                                <div class="absolute bottom-2 right-0 bg-primary w-3/5 p-2 text-white">
                                    <p class="font-bold text-sm">{{ $dr->name }}</p>
                                    <p class="text-xs">{{ $dr->address }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="flex justify-center">

                </div>
            </div>
        </div>
        <div class="collapse collapse-plus bg-base-200">
            <input type="radio" name="my-accordion-3" />
            <div class="collapse-title text-xl font-medium">
                Menu
            </div>
            <div class="collapse-content">
                <div role="tablist" class="tabs tabs-bordered">
                    <a role="tab" class="tab">Lunes</a>
                    <a role="tab" class="tab tab-active">Martes</a>
                    <a role="tab" class="tab">Miercoles</a>
                    <a role="tab" class="tab">Jueves</a>
                    <a role="tab" class="tab">Viernes</a>
                </div>
            </div>
        </div>
        <div class="collapse collapse-plus bg-base-200">
            <input type="radio" name="my-accordion-3" />
            <div class="collapse-title text-xl font-medium">
                Usuarios
            </div>
            <div class="collapse-content">
                <div class="flex justify-end gap-3">
                    <div class="btn btn-primary">Asignar Cupones</div>
                    <div class="btn btn-primary">Agregar Usuario</div>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" />
                </div>
                <br>
                <div class="overflow-x-auto">
                    <table class="table">
                        <!-- head -->
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Job</th>
                                <th>Favorite Color</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- row 1 -->
                            <tr class="bg-base-200">
                                <th>1</th>
                                <td>Cy Ganderton</td>
                                <td>Quality Control Specialist</td>
                                <td>Blue</td>
                            </tr>
                            <!-- row 2 -->
                            <tr>
                                <th>2</th>
                                <td>Hart Hagerty</td>
                                <td>Desktop Support Technician</td>
                                <td>Purple</td>
                            </tr>
                            <!-- row 3 -->
                            <tr>
                                <th>3</th>
                                <td>Brice Swyre</td>
                                <td>Tax Accountant</td>
                                <td>Red</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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
    <dialog id="my_modal_3" class="modal">
        <div class="modal-box space-y-3 px-8">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="font-bold text-lg text-center">Crear nuevo cupon</h3>
            <br>
            <form method="POST" action="{{ route('dinning.store') }}" enctype="multipart/form-data">
                @method('POST')
                @csrf
                <div class="space-y-2">
                    <label for="" class="text-lg font-semibold">Nombre</label>
                    <input type="text" name="name" placeholder="Ingrese el nombre del comedor"
                        class="input input-bordered w-full @error('email') input-error @enderror" />
                    @error('email')
                        <div class="text-red-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="space-y-2">
                    <label for="" class="text-lg font-semibold">Imagen</label>
                    <input type="file" name="logo"
                        class="file-input file-input-primary file-input-bordered w-full" />
                    @error('email')
                        <div class="text-red-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="space-y-2">
                    <label for="" class="text-lg font-semibold">Porcentaje de descuento</label>
                    <input type="text" name="name" placeholder="Ingrese el nombre del comedor"
                        class="input input-bordered w-full @error('email') input-error @enderror" />
                    @error('email')
                        <div class="text-red-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="space-y-2">
                    <label for="" class="text-lg font-semibold">Vigencia</label>
                    <div class="grid grid-cols-2 gap-3">
                        <div class="col-span-1 space-y-2">
                            <label for="" class="text-sm font-semibold">Porcentaje de descuento</label>
                            <input type="date" name="name" placeholder="Ingrese el nombre del comedor"
                                class="input input-bordered w-full @error('email') input-error @enderror" />
                            @error('email')
                                <div class="text-red-500">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-span-1 space-y-2">
                            <label for="" class="text-sm font-semibold">Porcentaje de descuento</label>
                            <input type="date" name="name" placeholder="Ingrese el nombre del comedor"
                                class="input input-bordered w-full @error('email') input-error @enderror" />
                            @error('email')
                                <div class="text-red-500">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="space-y-2">
                    <label for="" class="text-lg font-semibold">Dias activos de cupon</label>
                    <div class="grid grid-cols-2">
                        <div class="col-span-1">
                            <label class="label justify-start gap-1 cursor-pointer">
                                <input type="checkbox" checked="checked" class="checkbox h-4 w-4 rounded-md" />
                                <span class="label-text">Lunes</span>
                            </label>
                            <label class="label justify-start gap-1 cursor-pointer">
                                <input type="checkbox" checked="checked" class="checkbox h-4 w-4 rounded-md" />
                                <span class="label-text">Martes</span>
                            </label>
                            <label class="label justify-start gap-1 cursor-pointer">
                                <input type="checkbox" checked="checked" class="checkbox h-4 w-4 rounded-md" />
                                <span class="label-text">Miercoles</span>
                            </label>
                            <label class="label justify-start gap-1 cursor-pointer">
                                <input type="checkbox" checked="checked" class="checkbox h-4 w-4 rounded-md" />
                                <span class="label-text">Jueves</span>
                            </label>
                            <label class="label justify-start gap-1 cursor-pointer">
                                <input type="checkbox" checked="checked" class="checkbox h-4 w-4 rounded-md" />
                                <span class="label-text">Viernes</span>
                            </label>
                        </div>
                        <div class="col-span-1">
                            <label class="label justify-start gap-1 cursor-pointer">
                                <input type="checkbox" checked="checked" class="checkbox h-4 w-4 rounded-md" />
                                <span class="label-text">Sabado</span>
                            </label>
                            <label class="label justify-start gap-1 cursor-pointer">
                                <input type="checkbox" checked="checked" class="checkbox h-4 w-4 rounded-md" />
                                <span class="label-text">Domingo</span>
                            </label>
                        </div>
                    </div>

                </div>
                <div class="space-y-2">
                    <label for="" class="text-lg font-semibold">Tipo de uso (por usuario)</label>
                    <div class="grid grid-cols-2">
                        <div class="col-span-1">
                            <label class="label justify-start gap-1 cursor-pointer">
                                <input type="checkbox" checked="checked" class="checkbox h-4 w-4 rounded-md" />
                                <span class="label-text">Ilimitado</span>
                            </label>
                            <label class="label justify-start gap-1 cursor-pointer">
                                <input type="checkbox" checked="checked" class="checkbox h-4 w-4 rounded-md" />
                                <span class="label-text">Solo 1 vez por dia</span>
                            </label>
                            <label class="label justify-start gap-1 cursor-pointer">
                                <input type="checkbox" checked="checked" class="checkbox h-4 w-4 rounded-md" />
                                <span class="label-text">Un solo uso</span>
                            </label>
                        </div>
                    </div>


                </div>
                <br><br>

                <div class="space-y-2">
                    <button class="btn btn-primary w-full uppercase" type="submit">Aceptar</button>
                </div>
            </form>
        </div>
    </dialog>
@endsection
