@extends('layouts.guest')

@section('content')
    <h1 class="text-3xl font-semibold py-2 text-center">
        Bienvenido
    </h1>
    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf
        <div class="space-y-2">
            <label for="" class="text-lg font-semibold">Correo</label>
            <input type="email" name="email" placeholder="Ingrese su correo"
                class="input input-bordered w-full @error('email') input-error @enderror" />
            @error('email')
                <div class="text-red-500">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="space-y-2">
            <label for="" class="text-lg font-semibold">Contraseña</label>
            <input type="password" name="password" placeholder="Ingrese su contraseña"
                class="input input-bordered w-full @error('password') input-error @enderror" />
            @error('email')
                <div class="text-red-500">
                    {{ $message }}
                </div>
            @enderror
            @if (Route::has('password.request'))
                <div class="text-right h-16">
                    <a class="" href="{{ route('password.request') }}">
                        ¿Olvidaste tu contraseña?
                    </a>
                </div>
            @endif
        </div>
        <div class="space-y-2">
            <button class="btn btn-primary w-full" type="submit">INICIAR SESION</button>
        </div>
    </form>
@endsection
