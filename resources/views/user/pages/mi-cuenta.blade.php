@extends('layouts.app')

@section('content')
    <div class="relative">
        <img src="https://images.pexels.com/photos/1060468/pexels-photo-1060468.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
            alt="" class="object-cover w-full h-52">
        <div class="absolute right-0 left-0 -bottom-20 flex justify-center">
            <img src="https://images.pexels.com/photos/1060468/pexels-photo-1060468.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                alt="" class="w-40 h-40 object-cover rounded-full">
        </div>
    </div>
    <div class="mt-32 space-y-5">
        <p><strong>Nombre: </strong> {{ auth()->user()->name }} </p>
        <p><strong>Apellidos: </strong> {{ auth()->user()->name }} </p>
        <p><strong>Puesto: </strong> {{ auth()->user()->name }} </p>
        <button class="btn btn-primary w-full btn-outline">CERRAR SESION</button>
    </div>
@endsection
