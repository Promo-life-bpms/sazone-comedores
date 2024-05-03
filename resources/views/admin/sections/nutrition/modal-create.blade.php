<dialog id="my_modal_nutricion" class="modal">
    <div class="modal-box space-y-3 px-8">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg text-center">Agregar Seccion Nutricion</h3>
        <br>
        <form method="POST" action="{{ route('nutricion.store') }}" enctype="multipart/form-data" class="space-y-3">
            @method('POST')
            @csrf
            <input type="hidden" name="dining_id" value="{{ $diningRoom->id }}">
            <div class="space-y-2">
                <label for="" class="text-lg font-semibold">Titulo</label>
                <input type="text" name="title" placeholder="Ingrese el titulo"
                    class="input input-bordered w-full @error('title') input-error @enderror" />
                @error('title')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="space-y-2">
                <label for="" class="text-lg font-semibold">Descripcion</label>
                <input type="text" name="description" placeholder="Descripcion"
                    autocomplete="off"
                    class="input input-bordered w-full @error('description') input-error @enderror" />
                @error('description')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="space-y-2">
                <label for="" class="text-lg font-semibold">Imagen</label>
                <input type="file" name="file_nutrition" accept="image/*"
                    class="file-input bg-custom-blue file-input-bordered w-full @error('file_nutrition') input-error @enderror" />
                @error('file_nutrition')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="space-y-2">
                <label for="" class="text-lg font-semibold">Vigencia
                </label>
                <div class="grid grid-cols-2 gap-3">
                    <div class="col-span-1">
                        <input type="date" name="start_date" placeholder="Ingrese el correo del colaborador"
                            autocomplete="off"
                            class="input input-bordered w-full @error('start_date') input-error @enderror" />
                        @error('start_date')
                            <div class="text-red-500">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-span-1">
                        <input type="date" name="end_date" placeholder="Ingrese el correo del colaborador"
                            autocomplete="off"
                            class="input input-bordered w-full @error('end_date') input-error @enderror" />
                        @error('end_date')
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
