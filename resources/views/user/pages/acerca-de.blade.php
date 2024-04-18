@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <img src="{{ asset('assets/SazoneLN.png') }}" alt="" class="object-cover w-30 h-52">
</div>
    <div class="space-y-3 mt-5">
        <p>{{ $diningRoom->address }}</p>
        <p class="font-semibold">Mision</p>
        <p>{{ $diningRoom->mission }}.</p>
        <p class="font-semibold">Vision</p>
        <p>{{ $diningRoom->vision }}.</p>
        <p class="font-semibold">Valores</p>
        <ul>
            @foreach (explode(',', $diningRoom->values) as $value)
                <li>· {{ $value }}</li>
            @endforeach
        </ul>
    </div>
    @php
        // Explode en php
        // $values = explode($diningRoom->values, ',');
    @endphp
@endsection
