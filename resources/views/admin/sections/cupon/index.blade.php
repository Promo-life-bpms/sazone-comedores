@include('admin.sections.cupon.modal-coupon')
                <h1 class="text-lg font-semibold my-2">Agregar nuevo cupon</h1>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-x-28 gap-y-8">
                    <div class="col-span-1 h-32 rounded-xl border-2 flex justify-center items-center cursor-pointer"
                        onclick="my_modal_3.showModal()">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </div>
                </div>
                <h1 class="text-lg font-semibold my-2">Cupones Disponibles</h1>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-x-28 gap-y-8">
                    @php
                        $diningRooms = [];
                    @endphp
                    @foreach ($diningRooms as $dr)
                        <div class="col-span-1">
                            <a href="{{ route('dining.show', ['dining' => $dr->id]) }}"
                                class="rounded-xl relative cursor-pointer">
                                <img src="{{ asset( $dr->logo) }}" class="object-cover w-full h-32 rounded-xl"
                                    alt="">
                                <div class="absolute bottom-2 right-0 bg-primary w-3/5 p-2 text-white">
                                    <p class="font-bold text-sm">{{ $dr->name }}</p>
                                    <p class="text-xs">{{ $dr->address }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="flex justify-center">
                </div>
