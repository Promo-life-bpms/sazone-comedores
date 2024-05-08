<div class="flex justify-between">
    <div></div>
    <div class="flex justify-end gap-3">
        <button class="btn text-white" style="background-color: rgb(48, 79, 157)" onclick="my_modal_2.showModal()"> Portadas platillos</button>
        <button class="btn text-white" style="background-color: rgb(48, 79, 157)" onclick="modal_import_food.showModal()">Importar Archivo</button>
        <button class="btn text-white" style="background-color: rgb(48, 79, 157)" onclick="modal_add_food.showModal()">Agregar Platillo</button>
    </div>
  </div>

<br>

<dialog id="my_modal_2" class="modal">
    <div class="modal-box">

        <h3 class="font-bold text-lg">Portadas</h3>
        <br>
        <div class="bg-stone-50 p-4">
            <form action="{{ route('storeMenuBanner') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id" value="{{ $diningRoom->id }}">
                <label for="src" class="block text-sm font-medium text-gray-700">Selecciona una imagen:</label>
                <div class="mt-1 flex items-center justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M24 14a1 1 0 0 0-1 1v10a1 1 0 0 0 2 0V15a1 1 0 0 0-1-1zM24 29c-.28 0-.53.11-.71.29l-4.58 4.57a1 1 0 0 0 1.42 1.42l4.58-4.57A1 1 0 0 0 24 29zm14-21H10c-1.1 0-2 .9-2 2v32c0 1.1.9 2 2 2h28c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zM38 40H10V10h4v11c0 .55.45 1 1 1h11v14h12v-4c0-.55-.45-1-1-1zm-18-7h-8v-2h8v2zm0-4h-8v-2h8v2zm0-4h-8v-2h8v2zm10 8h-8v-2h8v2zm0-4h-8v-2h8v2z" />
                        </svg>
                        <div class="flex text-sm text-gray-600">
                            <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                <span>Subir una imagen</span>
                                <input id="file-upload" name="src" type="file" class="sr-only" accept="image/*" required>
                            </label>
                            <p class="pl-1">o arrástrala y suéltala aquí</p>
                        </div>
                        <p class="text-xs text-gray-500">Solo se permiten archivos de hasta 5 MB.</p>
                    </div>
                </div>
                <br>
                <button class="btn text-white" style="background-color: rgb(48, 79, 157)" type="submit">Subir imagen</button>
            </form>
        </div>
    

        <br>
        @if($menu_banner->isNotEmpty())

            <h4>Imágenes disponibles</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
                @foreach($menu_banner as $imagen)
                    <div class="border border-gray-200 p-4 rounded-lg">
                        <img src="{{ asset('storage/' . $imagen->src) }}" alt="Imagen del menú" class="mb-4" style="height: 100px; object-fit:cover; width:100%;">
                        <form action="{{ route('deleteMenuBanner') }}" method="POST">
                            <input type="hidden" name="id" value="{{ $imagen->id }}">
                            @csrf
                            @method('POST')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">Borrar</button>
                        </form>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-xs">Sin imágenes disponibles</p>
        @endif
    
        
    </div>
    
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>


@if (session('success_menu'))
    <div role="alert" class="alert alert-success" id="alert_advertisment">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>{{ session('success_menu') }}</span>
    </div>
@endif
<div role="tablist" class="tabs tabs-bordered grid grid-cols-6">
    @foreach ($menuDays as $day)
        <input type="radio" name="tabs_days_menu" role="tab" class="tab" aria-label="{{ $day->day }}"
            {{ $loop->first ? 'checked' : '' }} />

        <div role="tabpanel" class="tab-content p-10">
            @if ($day->menus($diningRoom->id)->count() == 0)
                <div role="alert" class="alert alert-warning">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <span>No hay platillos disponibles</span>
                </div>
            @endif
            <div class="grid grid-cols-1 md:grid-cols-6 gap-5">
                @foreach ($day->menus($diningRoom->id) as $food)
                    <div class="col-span-1">
                        <div class="rounded-xl relative cursor-pointer ">
                            <img src="{{ asset('storage/' . $food->image) }}"
                                class="object-cover w-full h-40 rounded-xl" alt="">
                            <div class="absolute bottom-0 rounded-xl h-40 bg-[#00000075] w-full p-2 text-white">
                                <div class="flex w-full justify-between flex-col h-full">
                                    {{-- Boton de eliminar y editar --}}
                                    <div class="flex justify-end">
                                        {{-- <button class="btn btn-circle btn-ghost btn-xs"
                                            onclick="editarMenu({{ $food->id }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>
                                        </button> --}}
                                        <button class="btn btn-circle btn-ghost btn-xs"
                                            onclick="deleteFood({{ $food->id }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </button>
                                    </div>
                                    <p class="font-bold text-sm pb-3">{{ $food->name }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>
<br>

@include('admin.sections.menu.modal-add')
@include('admin.sections.menu.modal-import')
@include('admin.sections.menu.modal-edit')
<script>
    let allMenu = @json($allFood);
    document.addEventListener("DOMContentLoaded", function() {
        let showModalMenu = {{ session('error_menu') ? 'modal_add_food.showModal()' : 0 }}
        {{ session('error_menu_edit') ? 'editarMenu(' . session('menu_id') . ')' : 0 }}
        /* modal_add_food.showModal() */
        let errorImport = {{ session('error_food') ? modal_import_food . showModal() : 0 }}
    });

    function deleteFood(id) {
        Swal.fire({
            title: "¿Estas seguro de que quieres eliminar este platillo?",
            text: "Se eliminara de los dias que hayan seleccionado",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Eliminar"
        }).then((result) => {
            if (result.isConfirmed) {
                elminarFood(id)
            }
        });
    }

    async function elminarFood(id) {
        let url = "{{ route('menu.destroy') }}";
        await axios.delete(url, {
            data: {
                menu_id: id
            }
        }).then((response) => {
            console.log(response);
            if (response.status == 200) {
                Swal.fire({
                    title: "Eliminado!",
                    text: "Se ha eliminiado correctamente el platillo",
                    icon: "success"
                });
                setTimeout(() => {
                    location.reload();
                }, 1000);
            }
        }).catch((error) => {
            console.error(error);
            Swal.fire({
                title: "Error!",
                text: "No se ha podido eliminar el platillo",
                icon: "error"
            });
        });
    }
</script>