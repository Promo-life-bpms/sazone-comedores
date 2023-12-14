<div class="flex justify-end gap-3">
    <button class="btn btn-primary" onclick="modal_import_food.showModal()">Importar Archivo</button>
    <button class="btn btn-primary" onclick="modal_add_food.showModal()">Agregar Platillo</button>
</div>
<br>
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
                            <div
                                class="absolute bottom-0 rounded-xl h-40 bg-[#00000075] w-full p-2 text-white flex items-end">
                                <p class="font-bold text-sm">{{ $food->name }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>
<br>
<dialog id="modal_add_food" class="modal">
    <div class="modal-box space-y-3 px-8">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg text-center">Agregar Platillo</h3>
        @if (session('success_user_create'))
            <div role="alert" class="alert alert-success">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('success_user_create') }}</span>
            </div>
        @endif
        <form method="POST" action="{{ route('menu.store') }}" enctype="multipart/form-data" class="space-y-3">
            @method('POST')
            @csrf
            <input type="hidden" name="dining_id" value="{{ $diningRoom->id }}" autocomplete="off">
            <div class="space-y-2">
                <label for="" class="text-lg font-semibold">Nombre</label>
                <input type="text" name="name_food" placeholder="Taquitos al pastor"
                    class="input input-bordered w-full @error('name') input-error @enderror" />
                @error('name')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="space-y-2">
                <label for="" class="text-lg font-semibold">Descripcion</label>
                <textarea name="description_food"
                    class="textarea textarea-bordered w-full @error('description_food') input-error @enderror"
                    placeholder="Carne de cerdo adobada, tortillas de maíz, cebolla, piña, cilantro, salsa de tomate y chiles"></textarea>
                @error('description_food')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="space-y-2">
                <label for="" class="text-lg font-semibold">Imagen</label>
                <input type="file" name="image_food"
                    class="file-input file-input-primary file-input-bordered w-full @error('image_food') input-error @enderror" />
                @error('image_food')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="space-y-2">
                <label for="" class="text-lg font-semibold">Tiempo</label>
                <select name="time_food" id="" class="select select-bordered w-full">
                    <option value="">Seleccionar...</option>
                    <option value="desayuno">Desayuno</option>
                    <option value="comida">Comida</option>
                </select>
                @error('time_food')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="space-y-2">
                <label for="" class="text-lg font-semibold">Disponibilidad del platillo</label>
                <div class="grid grid-cols-3">
                    <div class="col-span-1">
                        <label class="label justify-start gap-1 cursor-pointer">
                            <input type="checkbox" name="availability_food" value="1" ch
                                class="checkbox h-4 w-4 rounded-md" />
                            <span class="label-text">Lunes</span>
                        </label>
                    </div>
                    <div class="col-span-1">
                        <label class="label justify-start gap-1 cursor-pointer">
                            <input type="checkbox" name="availability_food" value="2" ch
                                class="checkbox h-4 w-4 rounded-md" />
                            <span class="label-text">Martes</span>
                        </label>
                    </div>
                    <div class="col-span-1">
                        <label class="label justify-start gap-1 cursor-pointer">
                            <input type="checkbox" name="availability_food" value="3" ch
                                class="checkbox h-4 w-4 rounded-md" />
                            <span class="label-text">Miercoles</span>
                        </label>
                    </div>
                    <div class="col-span-1">
                        <label class="label justify-start gap-1 cursor-pointer">
                            <input type="checkbox" name="availability_food" value="4" ch
                                class="checkbox h-4 w-4 rounded-md" />
                            <span class="label-text">Jueves</span>
                        </label>
                    </div>
                    <div class="col-span-1">
                        <label class="label justify-start gap-1 cursor-pointer">
                            <input type="checkbox" name="availability_food" value="5" ch
                                class="checkbox h-4 w-4 rounded-md" />
                            <span class="label-text">Viernes</span>
                        </label>
                    </div>
                    <div class="col-span-1">
                        <label class="label justify-start gap-1 cursor-pointer">
                            <input type="checkbox" name="availability_food" value="6" ch
                                class="checkbox h-4 w-4 rounded-md" />
                            <span class="label-text">Sabado</span>
                        </label>
                    </div>
                </div>
                @error('availability_food')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <br>
            <div class="space-y-2">
                <button class="btn btn-primary w-full uppercase" type="submit">Guardar</button>
            </div>
        </form>
    </div>
</dialog>
<dialog id="modal_import_food" class="modal">
    <div class="modal-box space-y-3 px-8">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg text-center">Subir archivo</h3>
        @if (session('success_user_create'))
            <div role="alert" class="alert alert-success">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('success_user_create') }}</span>
            </div>
        @endif
        <p class="font-semibold">
            Asegurate de subir un archivo con el formato correcto.
        </p>
        @if (session('success_import'))
            <div role="alert" class="alert alert-success">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('success_import') }}</span>
            </div>
        @endif
        <form method="POST" action="{{ route('menu.import') }}" enctype="multipart/form-data" class="space-y-3">
            @method('POST')
            @csrf
            <input type="hidden" name="dining_id" value="{{ $diningRoom->id }}" autocomplete="off">
            <div class="space-y-2">
                <label for="" class="text-lg font-semibold">Imagen</label>
                <input type="file" name="file_food"
                    class="file-input file-input-primary file-input-bordered w-full @error('file_food') input-error @enderror" />
                @error('file_food')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <br>
            <div class="space-y-2">
                <button class="btn btn-primary w-full uppercase" type="submit">Guardar</button>
            </div>
        </form>
    </div>
</dialog>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        /* modal_add_food.showModal() */
        let errorImport = {{ session('error_food') ? 1 : 0 }}
        let successImport = {{ session('success_import') ? 1 : 0 }}
        if (errorImport) {
            modal_import_food.showModal()
        }

        if (successImport) {
            modal_import_food.showModal()
        }
    });
</script>
