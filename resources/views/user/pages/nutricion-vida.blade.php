@extends('layouts.app')

@section('content')
    <div class="flex justify-center gap-x-28 gap-y-8">
        <img src="{{ asset('assets/SAZONE-LOGO-SALUDABLE.png') }}" alt="" class="object-left-top w-30 h-52 ">
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 rounded-lg ">
        <div class=" p-4 relative">
            <button class="absolute top-0 left-0 bg-green-500 text-white py-2 px-4 rounded-br-lg z-10"
                style="background-color: rgb(48, 157, 63)">
                INFÓRMATE
            </button>
            <div data-hs-carousel='{"loadingClasses": "opacity-0", "isAutoPlay": true}' class="relative">
                <div class="hs-carousel overflow-hidden  min-h-96 bg-white rounded-lg">
                    <div
                        class="hs-carousel-body top-0 bottom-0 start-0 flex flex-nowrap transition-transform duration-700 opacity-0">
                        @foreach ($nutritions as $nutrition)
                            <div id="capsulasSlide{{ $loop->iteration }}" class="hs-carousel-slide">
                                <div class="flex justify-center h-full">
                                    <img src="{{ asset('storage/' . $nutrition->resource) }}"
                                        class="w-full object-cover h-72" />
                                    @if (!($nutrition->title == null && $nutrition->description == null))
                                        <div
                                            class="absolute top-10 md:bottom-10 md:top-auto left-10 right-10 bg-[#6ef2d12e] p-5 rounded-md">
                                            <h3 class="text-xl text-center pb-3">{{ $nutrition->title }}</h3>
                                            <p class="opacity-100 text-justify">{{ $nutrition->description }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <button type="button"
                    class="hs-carousel-prev hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 start-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/10 rounded-s-lg dark:text-white dark:hover:bg-white/10">
                    <span class="text-2xl" aria-hidden="true">
                        <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m15 18-6-6 6-6"></path>
                        </svg>
                    </span>
                    <span class="sr-only">Previous</span>
                </button>
                <button type="button"
                    class="hs-carousel-next hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 end-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/10 rounded-e-lg dark:text-white dark:hover:bg-white/10">
                    <span class="sr-only">Next</span>
                    <span class="text-2xl" aria-hidden="true">
                        <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>
                    </span>
                </button>

                <div class="hs-carousel-pagination flex justify-center absolute bottom-3 start-0 end-0 space-x-2">
                    @for ($i = 0; $i < count($nutritions); $i++)
                        <span
                            class="hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer dark:border-neutral-600 dark:hs-carousel-active:bg-blue-500 dark:hs-carousel-active:border-blue-500"></span>
                    @endfor
                </div>
            </div>

        </div>

        <div class=" p-4 relative">
            <button class="absolute top-0 left-0 bg-red-600 text-white py-2 px-4 rounded-br-lg z-10"
                style="background-color: rgb(195, 48, 48)">
                Nutricion
            </button>
            <div data-hs-carousel='{"loadingClasses": "opacity-0", "isAutoPlay": true}' class="relative">
                <div class="hs-carousel overflow-hidden  min-h-96 bg-white rounded-lg">
                    <div
                        class="hs-carousel-body top-0 bottom-0 start-0 flex flex-nowrap transition-transform duration-700 opacity-0">
                        @foreach ($tagnames as $tagname)
                            <div id="capsulasSlide{{ $loop->iteration }}" class="hs-carousel-slide">
                                <div class="flex justify-center h-full">
                                    <img src="{{ asset('storage/' . $tagname->resource) }}"
                                        class="w-full object-cover h-72" />
                                    @if (!($tagname->title == null && $tagname->description == null))
                                        <div
                                            class="absolute top-10 md:bottom-10 md:top-auto left-10 right-10 bg-[#6ef2d12e] p-5 rounded-md">
                                            <h3 class="text-xl text-center pb-3">{{ $tagname->title }}</h3>
                                            <p class="opacity-100 text-justify">{{ $tagname->description }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <button type="button"
                    class="hs-carousel-prev hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 start-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/10 rounded-s-lg dark:text-white dark:hover:bg-white/10">
                    <span class="text-2xl" aria-hidden="true">
                        <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m15 18-6-6 6-6"></path>
                        </svg>
                    </span>
                    <span class="sr-only">Previous</span>
                </button>
                <button type="button"
                    class="hs-carousel-next hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 end-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/10 rounded-e-lg dark:text-white dark:hover:bg-white/10">
                    <span class="sr-only">Next</span>
                    <span class="text-2xl" aria-hidden="true">
                        <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>
                    </span>
                </button>

                <div class="hs-carousel-pagination flex justify-center absolute bottom-3 start-0 end-0 space-x-2">
                    @for ($i = 0; $i < count($tagnames); $i++)
                        <span
                            class="hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer dark:border-neutral-600 dark:hs-carousel-active:bg-blue-500 dark:hs-carousel-active:border-blue-500"></span>
                    @endfor
                </div>
            </div>
        </div>

        <div class=" p-4 relative">
            <button class="absolute top-0 right-0 bg-yellow-400 text-white py-2 px-4 rounded-bl-lg z-10"
                style="background-color: rgb(218, 215, 50)">
                OPCIÓN SALUDABLE
            </button>
            <div data-hs-carousel='{"loadingClasses": "opacity-0", "isAutoPlay": true}' class="relative">
                <div class="hs-carousel overflow-hidden  min-h-96 bg-white rounded-lg">
                    <div
                        class="hs-carousel-body top-0 bottom-0 start-0 flex flex-nowrap transition-transform duration-700 opacity-0">
                        @foreach ($healths as $health)
                            <div id="capsulasSlide{{ $loop->iteration }}" class="hs-carousel-slide">
                                <div class="flex justify-center h-full">
                                    <img src="{{ asset('storage/' . $health->resource) }}"
                                        class="w-full object-cover h-72" />
                                    @if (!($health->title == null && $health->description == null))
                                        <div
                                            class="absolute top-10 md:bottom-10 md:top-auto left-10 right-10 bg-[#6ef2d12e] p-5 rounded-md">
                                            <h3 class="text-xl text-center pb-3">{{ $health->title }}</h3>
                                            <p class="opacity-100 text-justify">{{ $health->description }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <button type="button"
                    class="hs-carousel-prev hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 start-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/10 rounded-s-lg dark:text-white dark:hover:bg-white/10">
                    <span class="text-2xl" aria-hidden="true">
                        <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m15 18-6-6 6-6"></path>
                        </svg>
                    </span>
                    <span class="sr-only">Previous</span>
                </button>
                <button type="button"
                    class="hs-carousel-next hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 end-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/10 rounded-e-lg dark:text-white dark:hover:bg-white/10">
                    <span class="sr-only">Next</span>
                    <span class="text-2xl" aria-hidden="true">
                        <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>
                    </span>
                </button>

                <div class="hs-carousel-pagination flex justify-center absolute bottom-3 start-0 end-0 space-x-2">
                    @for ($i = 0; $i < count($healths); $i++)
                        <span
                            class="hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer dark:border-neutral-600 dark:hs-carousel-active:bg-blue-500 dark:hs-carousel-active:border-blue-500"></span>
                    @endfor
                </div>
            </div>
        </div>
    </div>

@endsection
