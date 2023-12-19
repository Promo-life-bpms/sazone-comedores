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
        {{-- <p><strong>Puesto: </strong> {{ auth()->user()->name }} </p> --}}
        {{-- Cerrar sesion --}}
        <button class="btn btn-primary w-full btn-outline" onclick="cerrarSesion()">CERRAR SESION</button>
        <form action="{{ route('logout') }}" method="POST" id="logout-form">
            @csrf
            @method('POST')
        </form>

    </div>
    <script>
        function cerrarSesion() {
            if (confirm('¿Estas seguro de cerrar sesion?')) {
                document.getElementById('logout-form').submit();
            }
        }
    </script>
@endsection
