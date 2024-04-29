@extends('layouts.app')

@section('content')
    <div class="flex justify-center gap-x-28 gap-y-8">
        <img src="{{ asset('assets/SAZONE-LOGO-SALUDABLE.png') }}" alt="" class="object-left-top w-30 h-52 ">
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 rounded-lg ">
        <div class="border-2 border-dashed border-zinc-400 p-4 relative">
            <button class="absolute top-0 left-0 bg-green-500 text-white py-2 px-4 rounded-br-lg" style="background-color: rgb(48, 157, 63)">
              INFÓRMATE
            </button>
            <img src="{{ asset('assets/vv.png') }}" alt="Informative" class="w-full h-auto" /><div class="flex justify-end gap-3">
                {{-- <button class="btn text-white" style="background-color: rgb(48, 79, 157)" >Agregar Nuevo</button> --}}
            </div>

          </div>
    
          <div class="border-2 border-dashed border-zinc-400 p-4 relative">
            <button class="absolute top-0 left-0 bg-red-600 text-white py-2 px-4 rounded-br-lg" style="background-color: rgb(195, 48, 48)">
              TagsName
            </button>
            <img src="{{ asset('assets/tag.png') }}" alt="Menu of the Day" class="w-full h-auto" />
            {{-- <button class="btn text-white" style="background-color: rgb(48, 79, 157)" >Agregar Nuevo</button> --}}
          </div>
    
          <div class="border-2 border-dashed border-zinc-400 p-4 relative">
            <button class="absolute top-0 right-0 bg-yellow-400 text-white py-2 px-4 rounded-bl-lg" style="background-color: rgb(218, 215, 50)">
              OPCIÓN SALUDABLE
            </button>
            <img src="{{ asset('assets/bb.png') }}" alt="Healthy Option" class="w-full h-auto" />
            {{-- <button class="btn text-white" style="background-color: rgb(48, 79, 157)" >Agregar Nuevo</button> --}}
          </div>
        </div>
    
@endsection
