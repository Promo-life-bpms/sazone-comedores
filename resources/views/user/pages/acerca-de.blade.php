@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <img src="{{ asset('assets/SazoneLN.png') }}" alt="" class="object-cover w-30 h-52">
</div>
    <div class="space-y-3 mt-5">
        
        <h1 style="font-size: 40px;">Mision</h1>
        <p>
            Buscamos ofrecer una experiencia culinaria única, una zona en el mundo laboral, donde todos disfrutemos el sazón con los mas altos estándares de higiene y calidad.
        </p>
        <h1 style="font-size: 40px;">Vision</h1>
        <p>
            <ul>
                <li>
                    <p class="font-semibold">Entrega</p> 
                    <p class="mb-4">Damos lo mejor de nosotros poniendo siempre el corazón. Valoramos cada interacción con nuestros clientes: en el restaurante o en la puerta de tu casa</p>
                </li>
                <li>
                    <p class="font-semibold">Felicidad</p>
                    <p class="mb-4">En un negocio como el nuestro, la felicidad se vive en cada detalle; desde el primer contacto, a través de una sonrisa, haciendo sentir bienvenido al invitado o llamandolo por su nombre.</p>
                
                </li>
                <li>
                    <p class="font-semibold">Experiencias</p>
                    <p class="mb-4">Conectamos de forma autentica con los clientes, les brindamos momentos únicos y los hacemos sentir especiales</p>
                </li>
                <li>
                    <p class="font-semibold">Sabor</p>
                    <p>Llevamos la sazón en nuestras venas; nos encanta aderezar la vida de las personas y llenarlas de recuerdos tan deliciosos, que siempre los dejan con un buen sabor de boca.</p>
                </li>
            </ul>
        </p>
        <h1 style="font-size: 40px;">Valores</h1>
        <ul>
            <ul>
                <li>Actitud ganadora: Nos esforzamos</li>
                <li>Liderazgo involucrado:</li>
                <li>Servicio sorprendente:</li>
                <li>Espíritu colaborativo:</li>
                <li>Atención al detalle:</li>
            </ul>
        </ul>
    </div>
    @php
        // Explode en php
        // $values = explode($diningRoom->values, ',');
    @endphp
@endsection
