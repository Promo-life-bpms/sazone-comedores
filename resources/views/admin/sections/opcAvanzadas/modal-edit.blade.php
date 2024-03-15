<dialog id="modal_edit_diningRoom" class="modal">
    <div class="modal-box space-y-3 px-8">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg text-center">Editar Comedor</h3>
        @if (session('success_opcAvanzadas_edit'))
            <div role="alert" class="alert alert-success">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('success_opcAvanzadas_edit') }}</span>
            </div>
        @endif
        <form method="POST" action="{{ route('dining.editDiningRoom') }}" enctype="multipart/form-data" class="space-y-3">
            @method('POST')
            @csrf
            <input type="hidden" name="dining_rooms_id_edit" value="" id="dining_rooms_id_edit">
            <div class="space-y-2">
                
                <label for="" class="text-lg font-semibold">Nombre del Comedor</label>
                <input type="text" name="name_edit" id="name_edit" placeholder="Taquitos al pastor"
                    class="input input-bordered w-full @error('name_edit') input-error @enderror" required />
                @error('name')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="space-y-2">
                <label for="" class="text-lg font-semibold">Direccion o ubicacion</label>
                <textarea name="address_edit" id="address_edit"
                    class="textarea textarea-bordered w-full @error('address_edit') input-error @enderror"
                    placeholder="Coloca la Ubicacion del la Empresa"></textarea>
                @error('address_edit')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="space-y-2">
                <label for="" class="text-lg font-semibold">Mision</label>
                <textarea name="mision_edit" id="mision_edit"
                    class="textarea textarea-bordered w-full @error('mision_edit') input-error @enderror"
                    placeholder="Coloca la Mision de la Empresa"></textarea>
                @error('mision_edit')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="space-y-2">
                <label for="" class="text-lg font-semibold">Vision</label>
                <textarea name="vision_edit" id="vision_edit"
                    class="textarea textarea-bordered w-full @error('vision_edit') input-error @enderror"
                    placeholder="Coloca la Vision de la Empresa"></textarea>
                @error('vision_edit')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="space-y-2">
                <label for="" class="text-lg font-semibold">Valores</label>
                <textarea name="valores_edit" id="valores_edit"
                    class="textarea textarea-bordered w-full @error('valores_edit') input-error @enderror"
                    placeholder="Coloca los Valores de la Empresa"></textarea>
                @error('valores_edit')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
                <div class="space-y-2">
                    <label for="" class="text-lg font-semibold">Logo</label>
                    <input type="file" name="logo_edit" id="logo_edit"
                        class="file-input file-input-primary file-input-bordered w-full @error('logo_edit') input-error @enderror" />
                    @error('logo_edit')
                        <div class="text-red-500">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="flex justify-center">
                    <img src="" alt="" id="img_edit" class="w-1/3 h-auto">
                </div>
                <br>
            <div class="space-y-2">
                <button class="btn btn-primary w-full uppercase" type="submit">Guardar</button>
            </div>
        </form>
    </div>
</dialog>

<script>
    function editarComedor(id) {

        let comedor = comedors.find((comedor) => comedor.id == id);

        modal_edit_diningRoom.showModal();

        document.getElementById('dining_room_id').value = id;
      document.getElementById('name_edit').value = comedor.name;
      document.getElementById('address_edit').value = comedor.address;
      document.getElementById('mision_edit').value = comedor.mission;
      document.getElementById('vision_edit').value = comedor.vision;
      document.getElementById('valores_edit').value = comedor.values;
      document.getElementById('logo_edit').value = "storage/dining_room/" + comedor.logo;
    }
</script>

