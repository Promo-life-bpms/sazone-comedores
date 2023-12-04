@extends('layouts.admin-layout')

@section('content')
    <h1 class="text-3xl font-semibold my-5">Comedores</h1>
    <h1 class="text-lg font-semibold my-2">Crear nuevo comedor</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-x-28 gap-y-8">
        <div class="col-span-1 h-32 rounded-xl border-2 flex justify-center items-center cursor-pointer"
            onclick="my_modal_3.showModal()">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
        </div>
    </div>
    <h1 class="text-lg font-semibold my-2">Comedores Disponibles</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-x-28 gap-y-8">
        @foreach ($diningRooms as $dr)
            <div class="col-span-1">
                <a href="{{ route('dining.show', ['dining' => $dr->id]) }}" class="rounded-xl relative cursor-pointer">
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
        {{ $diningRooms->links() }}
    </div>


    <dialog id="my_modal_3" class="modal">
        <div class="modal-box space-y-3 px-8">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="font-bold text-lg text-center">Crear nuevo comedor</h3>
            <br>
            <form method="POST" action="{{ route('dining.store') }}" enctype="multipart/form-data">
                @method('POST')
                @csrf
                <div class="space-y-2">
                    <label for="" class="text-lg font-semibold">Nombre del Comedor</label>
                    <input type="text" name="name" placeholder="Ingrese el nombre del comedor"
                        class="input input-bordered w-full @error('email') input-error @enderror" />
                    @error('email')
                        <div class="text-red-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="space-y-2">
                    <label for="" class="text-lg font-semibold">Direccion o ubicacion</label>
                    <input type="text" name="address" placeholder="Ingrese la direccion del comedor"
                        class="input input-bordered w-full @error('email') input-error @enderror" />
                    @error('email')
                        <div class="text-red-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="space-y-2">
                    <label for="" class="text-lg font-semibold">Logo</label>
                    <input type="file" name="logo" class="file-input file-input-primary file-input-bordered w-full" />
                    @error('email')
                        <div class="text-red-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <br><br>

                <div class="space-y-2">
                    <button class="btn btn-primary w-full uppercase" type="submit">Crear comedor</button>
                </div>
            </form>
        </div>
    </dialog>
@endsection
