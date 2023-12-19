<dialog id="edit_modal_anuncio" class="modal">
    <div class="modal-box space-y-3 px-8">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg text-center">Editar Anuncio</h3>
        <br>
        <form method="POST" action="{{ route('anuncios.editAdvertisement') }}" enctype="multipart/form-data"
            class="space-y-3">
            @method('POST')
            @csrf

            <input type="hidden" name="advertisement_id_edit" value="" id="advertisement_id_edit">

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
                <input type="file" name="file_advertisment_edit"
                    class="file-input file-input-primary file-input-bordered w-full @error('file_advertisment_edit') input-error @enderror" />
                @error('file_advertisment_edit')
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
                <button class="btn btn-primary w-full uppercase" type="submit">Guardar</button>
            </div>
        </form>
    </div>
</dialog>
<script>
    function editarAnunucio(id) {
        console.log(id);
        // Obtener el anuncio
        let anuncio = anuncios.find((anuncio) => anuncio.id == id);
        // abrir el modal
        edit_modal_anuncio.showModal();
        let vigencia = JSON.parse(anuncio.vigencia);
        // llenar los campos
        document.getElementById('advertisement_id_edit').value = anuncio.id;
        document.getElementById('title_edit').value = anuncio.title;
        document.getElementById('description_edit').value = anuncio.description;
        document.getElementById('start_date_edit').value = vigencia.start;
        document.getElementById('end_date_edit').value = vigencia.end;
        document.getElementById('img_edit').src = "/storage/" + anuncio.resource;
    }
</script>
