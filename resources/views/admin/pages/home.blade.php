@extends('layouts.admin-layout')

@section('content')
    <div class="pt-14">
        <p class="text-2xl font-bold">FORD</p>
        <p class="text-lg pb-5">Av Test, CP 222 México</p>
        <div class="collapse collapse-plus bg-base-200">
            <input type="radio" name="my-accordion-3" checked="checked" />
            <div class="collapse-title text-xl font-medium">
                Detalles Generales
            </div>
            <div class="collapse-content">
                <div class="grid grid-cols-4 gap-x-3">
                    <div class="col-span-1">
                        <label for="">Logotipo</label>
                        <input type="file" class="file-input file-input-bordered w-full">
                    </div>
                    <div class="col-span-1">
                        <label for="">Color Primario</label>
                        <input type="text" placeholder="Type here" class="input input-bordered w-full" />
                    </div>
                    <div class="col-span-1">
                        <label for="">Color Secundario</label>
                        <input type="text" placeholder="Type here" class="input input-bordered w-full" />
                    </div>
                    <div class="col-span-1 flex justify-center items-end">
                        <button class="btn btn-primary w-full">Actualizar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="collapse collapse-plus bg-base-200">
            <input type="radio" name="my-accordion-3" />
            <div class="collapse-title text-xl font-medium">
                Cupones
            </div>
            <div class="collapse-content">
                <p>hello</p>
            </div>
        </div>
        <div class="collapse collapse-plus bg-base-200">
            <input type="radio" name="my-accordion-3" />
            <div class="collapse-title text-xl font-medium">
                Menu
            </div>
            <div class="collapse-content">
                <p>hello</p>
            </div>
        </div>
        <div class="collapse collapse-plus bg-base-200">
            <input type="radio" name="my-accordion-3" />
            <div class="collapse-title text-xl font-medium">
                Usuarios
            </div>
            <div class="collapse-content">
                <p>hello</p>
            </div>
        </div>
        <div class="collapse collapse-plus bg-base-200">
            <input type="radio" name="my-accordion-3" />
            <div class="collapse-title text-xl font-medium">
                Opciones avanzadas
            </div>
            <div class="collapse-content">
                <p>hello</p>
            </div>
        </div>
    </div>
@endsection
