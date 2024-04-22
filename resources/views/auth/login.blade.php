@extends('layouts.guest')

@section('content')

<div class="flex justify-center mb-6">
    <img src="{{ asset('assets/SazoneLogo.png') }}" alt="Logo" style="max-width: 200px; max-height: 100px;">
</div>

    <form method="POST" action="{{ route('login') }}" class="space-y-6" id="form-login">
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
            @error('password') {{-- Change 'email' to 'password' --}}
                <div class="text-red-500">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="space-y-2">
            <button 
            class="g-recaptcha" 
            data-sitekey="6LcKpF0pAAAAADgTbjiNFupTPO2E1uDIuS6wLmIx" 
            style="display: inline-block; font-weight: 600; text-align: center; white-space: nowrap; vertical-align: middle; user-select: none; border: 1px solid transparent; padding: 0.5rem 1rem; font-size: 1rem; line-height: 1.5; border-radius: 0.25rem; transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, color 0.15s ease-in-out, box-shadow 0.15s ease-in-out; color: #fff; background-color: rgb(48, 79, 157); width: 100%;" 
            data-callback='onSubmit' data-action='submit'>INICIAR SESION</button>
        </div>
    </form>
    
@endsection

@section('scripts')
    <script>
        function onSubmit(token) {
            document.getElementById("form-login").submit();
        }
    </script>
@endsection
