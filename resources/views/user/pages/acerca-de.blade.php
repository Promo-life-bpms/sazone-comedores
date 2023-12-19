@extends('layouts.app')

@section('content')
    <div>
        <img src="https://images.pexels.com/photos/1060468/pexels-photo-1060468.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
            alt="" class="object-cover w-full h-52">
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
