<dialog id="edit_modal_capnutri" class="modal">
    <div class="modal-box space-y-3 px-8">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg text-center">Editar Seccionde Capsulas</h3>
        <br>
        <form method="POST" action="{{ route('nutriCapsulas.editNutriCaps') }}" enctype="multipart/form-data"
            class="space-y-3">
            @method('POST')
            @csrf

            <input type="hidden" name="capsula_id_edit" value="" id="capsula_id_edit">

            <div class="space-y-2">

                <label for="" class="text-lg font-semibold">Titulo</label>
                <input type="text" name="title_edit" placeholder="Ingrese el titulo del anuncio" value=""
                    id="title_edit" class="input input-bordered w-full @error('title_edit') input-error @enderror" />

                @error('title_edit')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="space-y-2">
                <label for="" class="text-lg font-semibold">Descripcion</label>
                <input type="text" name="description_edit" placeholder="Ingrese el correo del colaborador"
                    autocomplete="off" value="" id="description_edit"
                    class="input input-bordered w-full @error('description_edit') input-error @enderror" />
                @error('description_edit')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="space-y-2">
                <label for="" class="text-lg font-semibold">Imagen</label>
                <input type="file" name="file_capsula_edit" accept="image/*"
                    class="file-input bg-custom-blue file-input-bordered w-full @error('file_capsula_edit') input-error @enderror" />
                @error('file_capsula_edit')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
                <div class="flex justify-center">
                    <img src="" alt="" id="img_edit" class="w-1/3 h-auto">
                </div>
            </div>
            <div class="space-y-2">
                <label for="" class="text-lg font-semibold">Vigencia
                </label>
                <div class="grid grid-cols-2 gap-3">
                    <div class="col-span-1">
                        <input type="date" name="start_date_edit" placeholder="Ingrese el correo del colaborador"
                            autocomplete="off" value="" id="start_date_edit"
                            class="input input-bordered w-full @error('start_date_edit') input-error @enderror" />
                        @error('start_date_edit')
                            <div class="text-red-500">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-span-1">
                        <input type="date" name="end_date_edit" placeholder="Ingrese el correo del colaborador"
                            autocomplete="off" value="" id="end_date_edit"
                            class="input input-bordered w-full @error('end_date_edit') input-error @enderror" />
                        @error('end_date_edit')
                            <div class="text-red-500">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <br><br>
            <div class="space-y-2">
                <button class="btn text-white w-full uppercase" style="background-color: rgb(48, 79, 157)" type="submit">Guardar</button>
            </div>
        </form>
    </div>
</dialog>
<script>
    function editNutriCaps(id) {
        console.log(id);
        // Obtener el anuncio
        let capsula = capsulas.find((capsula) => capsula.id == id);
        // abrir el modal
        edit_modal_capnutri.showModal();
        let vigencia = JSON.parse(capsula.vigencia);
        // llenar los campos
        document.getElementById('capsula_id_edit').value = capsula.id;
        document.getElementById('title_edit').value = capsula.title;
        document.getElementById('description_edit').value = capsula.description;
        document.getElementById('start_date_edit').value = capsula.start;
        document.getElementById('end_date_edit').value = capsula.end;
        document.getElementById('img_edit').src = "/storage/" + capsula.resource;
    }
</script>
