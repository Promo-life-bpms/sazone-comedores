@extends('layouts.guest')

@section('content')
    <h1 class="text-3xl font-semibold py-2 text-center">
        Resetear Contraseña
    </h1>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
        @csrf

        <div class="space-y-2">
            <label for="" class="text-lg font-semibold">Correo Electronico</label>
            <input type="email" name="email" placeholder="Ingrese su correo"
                class="input input-bordered w-full @error('email') input-error @enderror" value="{{ old('email') }}"
                autocomplete="email">
        </div>
        <div class="space-y-2">
            <button class="btn btn-primary w-full" type="submit">Enviar link para cambiar contraseña</button>
        </div>
    </form>
@endsection
