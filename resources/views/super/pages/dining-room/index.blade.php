@extends('layouts.app')

@section('content')
{{-- <img src="{{ asset('assets/SazoneLogo.png') }}" alt="Logo"
         style="max-width: 350px; max-height: 500px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); opacity: 0.3;"> --}}
    <h1 class="text-3xl font-semibold my-5">Comedores</h1>
    <h1 class="text-lg font-semibold my-2">Crear nuevo comedor</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-x-28 gap-y-8 background-color: white;">
        <div class="col-span-1 h-32 rounded-xl border-2 flex justify-center items-center cursor-pointer"
            onclick="my_modal_3.showModal()">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
        </div>
    </div>
    <h1 class="text-lg font-semibold my-2">Comedores Disponibles</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-x-28 gap-y-55">
        @foreach ($diningRooms as $dr)
            @if ($dr->statusV == 1)
                <div class="col-span-1 rounded-xl border">
                    {{-- <div class="card card-compact w-96 bg-base-100 shadow-xl">
                        <a href="{{ route('dining.show', ['diningRoom' => $dr->id]) }}">
                        <figure><img src="{{ asset($dr->logo) }}" class="object-cover w-full h-32 rounded-xl " alt=""></figure>
                        <div class="card-body">
                          <h2 class="card-title">{{ $dr->name }}!</h2>
                          <p>{{ $dr->address }}</p>
                        </div>
                        <button
                            class="absolute top-2 right-2 text-black font-bold py-2 px-4 rounded"
                            onclick="deleteDining(event, {{ $dr->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                        </button>
                    </div> --}}
                    <div class="rounded-xl relative cursor-pointer rounded-xl">
                        <a href="{{ route('dining.show', ['diningRoom' => $dr->id]) }}">
                            <img src="{{ asset($dr->logo) }}" class="object-cover w-full h-32 rounded-xl " alt="">
                            {{-- <div class="absolute bottom-2 right-0 w-3/5 rounded-xl p-2 text-white" style="background-color: rgb(48, 79, 157)">
                                <p class="font-bold text-sm ">{{ $dr->name }}</p>
                                <p class="text-xs">{{ $dr->address }}</p>
                            </div> --}}
                        </a>
                        <button
                            class="absolute top-2 right-2 text-black font-bold py-2 px-4 rounded"
                            onclick="deleteDining(event, {{ $dr->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                        </button>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    <div class="flex justify-center">
        {{ $diningRooms->links() }}
    </div>


    <dialog id="my_modal_3" class="modal">
        <div class="modal-box space-y-3 px-8">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="font-bold text-lg text-center">Crear nuevo comedor</h3>
            <br>
            <form method="POST" action="{{ route('dining.store') }}" enctype="multipart/form-data">
                @method('POST')
                @csrf
                <div class="space-y-2">
                    <label for="" class="text-lg font-semibold">Nombre del Comedor</label>
                    <input type="text" name="name" placeholder="Ingrese el nombre del comedor"
                        class="input input-bordered w-full @error('email') input-error @enderror" required />
                    @error('email')
                        <div class="text-red-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="space-y-2">
                    <label for="" class="text-lg font-semibold">Direccion o ubicacion</label>
                    <input type="text" name="address" placeholder="Ingrese la direccion del comedor"
                        class="input input-bordered w-full @error('email') input-error @enderror" required />
                    @error('email')
                        <div class="text-red-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="space-y-2">
                    <label for="" class="text-lg font-semibold">Logo</label>
                    <input type="file" name="logo" class="file-input bg-custom-blue file-input-bordered w-full" />
                    @error('email')
                        <div class="text-red-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- Crear campos de mision y vision --}}
                <div class="space-y-2">
                    <label for="" class="text-lg font-semibold">Mision</label>
                    <textarea name="mision" class="w-full textarea textarea-bordered h-16 @error('mision') input-error @enderror"
                        placeholder="Ingrese la mision de la empresa" required></textarea>
                    @error('email')
                        <div class="text-red-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="space-y-2">
                    <label for="" class="text-lg font-semibold">Vision</label>
                    <textarea name="vision" class="w-full textarea textarea-bordered h-16 @error('vision') input-error @enderror"
                        placeholder="Ingrese la vision de la empresa" required></textarea>
                    @error('email')
                        <div class="text-red-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="space-y-2">
                    <label for="" class="text-lg font-semibold">Valores</label>
                    <textarea name="valores" class="w-full textarea textarea-bordered h-16 @error('valores') input-error @enderror"
                        placeholder="Ingrese los valores de la empresa separados por comas" required></textarea>
                    @error('email')
                        <div class="text-red-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <br><br>
                <div class="space-y-2">
                    <button class="btn btn-primary w-full uppercase" style="background-color: rgb(48, 79, 157)" type="submit">Crear comedor</button>
                </div>
            </form>
        </div>
    </dialog>

    <script>
        function deleteDining(event, id) {
            event.preventDefault(); // Evitar la acción predeterminada del enlace
            Swal.fire({
                title: "¿Estás seguro de que quieres dar de baja este Comedor?",
                text: "Esta acción no se puede deshacer",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Baja"
            }).then((result) => {
                if (result.isConfirmed) {
                    updateDiningStatus(id);
                }
            });
        }

        async function updateDiningStatus(id) {
            try {
                let url = "{{ route('dining.updateDiningStatus') }}";
                let response = await axios.put(url, {
                    dining_room_id: id
                });

                if (response.status === 200) {
                    Swal.fire({
                        title: "Actualizado!",
                        text: "Se ha actualizado correctamente el Comedor",
                        icon: "success"
                    });
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                } else {
                    throw new Error("Error al actualizar el comedor");
                }
            } catch (error) {
                console.error(error);
                Swal.fire({
                    title: "Error!",
                    text: "No se ha podido actualizar el Comedor",
                    icon: "error"
                });
            }
        }
    </script>
@endsection
