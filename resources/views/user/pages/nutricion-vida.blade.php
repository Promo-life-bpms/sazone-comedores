@extends('layouts.app')

@section('content')
    <div class="flex justify-center gap-x-28 gap-y-8">
        <img src="{{ asset('assets/SAZONE-LOGO-SALUDABLE.png') }}" alt="" class="object-left-top w-30 h-52 ">
    </div>


    <div class=" p-4 relative">
        @foreach ($healths as $health)
        <div class="mt-10 mb-10">
            <img src="{{ asset('storage/' . $health->resource) }}"
                class="w-full object-cover h-auto" />
        </div>
        @endforeach       
    </div>


    {{-- <div class=" p-4 relative">
        @foreach ($nutritions as $nutrition)
            <div class="mt-10 mb-10">
                <img src="{{ asset('storage/' . $nutrition->resource) }}"
                    class="w-full object-cover h-72" />
            </div>
        @endforeach
    </div> --}}

       

    {{--  <div class=" p-4 relative">
        @foreach ($tagnames as $tagname)
            <img src="{{ asset('storage/' . $tagname->resource) }}"
                class="w-full object-cover h-72" />        
        @endforeach       
    </div> --}}

        

@endsection
