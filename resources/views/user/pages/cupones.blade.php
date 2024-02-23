@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold mb-4">Página Web Incrustada</h1>
    <div class="aspect-w-16 aspect-h-9">
        <iframe class="w-full h-screen" src="https://cupones.alsea.com.mx/CuponeraAlsea/WalletSazone"></iframe>

    </div>
</div>
@endsection
