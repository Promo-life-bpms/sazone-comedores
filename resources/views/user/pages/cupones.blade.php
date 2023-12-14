@extends('layouts.app')

@section('content')
    <div>
        <img src="https://images.pexels.com/photos/1060468/pexels-photo-1060468.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
            alt="" class="object-cover w-full h-52">
    </div>
    <div class="pt-5">
        <h1 class="text-3xl font-semibold mb-5">Mis Cupones</h1>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
            <a href="#" onclick="my_modal_3.showModal()">
                <img src="{{ asset('assets/cupones/Promociones_1.jpg') }}"
                    class="w-full object-cover col-span-1 md:col-span-2" />
            </a>
            <a href="#" onclick="my_modal_4.showModal()">
                <img src="{{ asset('assets/cupones/Promociones_2.jpg') }}"
                    class="w-full object-cover col-span-1 md:col-span-2" />
            </a>
            <a href="#" onclick="my_modal_5.showModal()">
                <img src="{{ asset('assets/cupones/Promociones_3.jpg') }}"
                    class="w-full object-cover col-span-1 md:col-span-2" />
            </a>
            <a href="#" onclick="my_modal_6.showModal()">
                <img src="{{ asset('assets/cupones/Promociones_4.jpg') }}"
                    class="w-full object-cover col-span-1 md:col-span-2" />
            </a>
        </div>
    </div>
    <!-- You can open the modal using ID.showModal() method -->
    <dialog id="my_modal_3" class="modal">
        <div class="modal-box space-y-3">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="font-bold text-lg text-center">Cupon Starbuks 15%</h3>
            <div class="flex justify-center w-full">
                <img src="https://cdn.britannica.com/17/155017-050-9AC96FC8/Example-QR-code.jpg" alt=""
                    class="h-52">
            </div>
            <p class="">Te recomendamos utilizar el código QR al momento de realizar tu compra, una vez que este sea
                mostrado, no podrás utilizarlo nuevamente.</p>

            <button class="btn btn-primary w-full" method="dialog">Usar Cupon</button>
        </div>
    </dialog>


    <dialog id="my_modal_4" class="modal">
        <div class="modal-box space-y-3">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="font-bold text-lg text-center">Cupon Burger $49</h3>
            <div class="flex justify-center w-full">
                <div class="relative">
                    <img src="https://cdn.britannica.com/17/155017-050-9AC96FC8/Example-QR-code.jpg" alt=""
                        class="h-52">
                    <div class="absolute h-52 top-0 right-0 left-0 backdrop-blur-sm"></div>
                </div>
            </div>
            <p class="">Te recomendamos utilizar el código QR al momento de realizar tu compra, una vez que este sea
                mostrado, no podrás utilizarlo nuevamente.</p>
            <p class="text-sm">
                Cupon usado correctamente, podrás volverlo a utilizar en las próximas 24 horas.
            </p>
        </div>
    </dialog>
    <dialog id="my_modal_5" class="modal">
        <div class="modal-box space-y-3">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="font-bold text-lg text-center">Cupon Italiannis $200</h3>
            <div class="flex justify-center w-full">
                <div class="relative">
                    <img src="https://cdn.britannica.com/17/155017-050-9AC96FC8/Example-QR-code.jpg" alt=""
                        class="h-52">
                    <div class="absolute h-52 top-0 right-0 left-0 backdrop-blur-sm"></div>
                </div>
            </div>
            <p class="">Te recomendamos utilizar el código QR al momento de realizar tu compra, una vez que este sea
                mostrado, no podrás utilizarlo nuevamente.</p>
            <p class="text-sm">
                Cupon usado correctamente, podrás volverlo a utilizar en las próximas 24 horas.
            </p>
        </div>
    </dialog>
    <dialog id="my_modal_6" class="modal">
        <div class="modal-box space-y-3">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="font-bold text-lg text-center">Cupon Vips 15%</h3>
            <div class="flex justify-center w-full">
                <div class="relative">
                    <img src="https://cdn.britannica.com/17/155017-050-9AC96FC8/Example-QR-code.jpg" alt=""
                        class="h-52">
                    <div class="absolute h-52 top-0 right-0 left-0"></div>
                </div>
            </div>
            <p class="">Te recomendamos utilizar el código QR al momento de realizar tu compra, una vez que este sea
                mostrado, no podrás utilizarlo nuevamente.</p>
            <p class="text-sm">
                Cupon usado correctamente, podrás volverlo a utilizar en las próximas 24 horas.
            </p>
        </div>
    </dialog>
@endsection
