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
    <div class="hidden">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
