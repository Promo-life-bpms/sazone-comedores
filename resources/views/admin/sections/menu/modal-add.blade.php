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
                <label for="" class="text-lg font-semibold">Nombre <span style="color: red; margin-left: 2px;">*</span></label>
                <input type="text" name="name_food" placeholder="Taquitos al pastor"
                    class="input input-bordered w-full @error('name_food') input-error @enderror" required/>
                @error('name_food')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="space-y-2">
                <label for="" class="text-lg font-semibold">Descripcion <span style="color: red; margin-left: 2px;">*</span></label>
                <textarea name="description_food"
                    class="textarea textarea-bordered w-full @error('description_food') input-error @enderror"
                    placeholder="Carne de cerdo adobada, tortillas de maíz, cebolla, piña, cilantro, salsa de tomate y chiles" required></textarea>
                @error('description_food')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="space-y-2">
                <label for="" class="text-lg font-semibold">Imagen <span style="color: red; margin-left: 2px;">*</span></label>
                <input type="file" name="image_food" accept="image/*"
                    class="file-input file-input-primary file-input-bordered w-full @error('image_food') input-error @enderror" required/>
                @error('image_food')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="space-y-2">
                <label for="" class="text-lg font-semibold">Tiempo<span style="color: red; margin-left: 2px;">*</span></label>
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
                <label for="" class="text-lg font-semibold">Disponibilidad del platillo<span style="color: red; margin-left: 2px;">*</span></label>
                <div class="grid grid-cols-3">
                    <div class="col-span-1">
                        <label class="label justify-start gap-1 cursor-pointer">
                            <input type="checkbox" name="availability_food[]" value="1"
                                class="checkbox h-4 w-4 rounded-md" />
                            <span class="label-text">Lunes</span>
                        </label>
                    </div>
                    <div class="col-span-1">
                        <label class="label justify-start gap-1 cursor-pointer">
                            <input type="checkbox" name="availability_food[]" value="2"
                                class="checkbox h-4 w-4 rounded-md" />
                            <span class="label-text">Martes</span>
                        </label>
                    </div>
                    <div class="col-span-1">
                        <label class="label justify-start gap-1 cursor-pointer">
                            <input type="checkbox" name="availability_food[]" value="3"
                                class="checkbox h-4 w-4 rounded-md" />
                            <span class="label-text">Miercoles</span>
                        </label>
                    </div>
                    <div class="col-span-1">
                        <label class="label justify-start gap-1 cursor-pointer">
                            <input type="checkbox" name="availability_food[]" value="4"
                                class="checkbox h-4 w-4 rounded-md" />
                            <span class="label-text">Jueves</span>
                        </label>
                    </div>
                    <div class="col-span-1">
                        <label class="label justify-start gap-1 cursor-pointer">
                            <input type="checkbox" name="availability_food[]" value="5"
                                class="checkbox h-4 w-4 rounded-md" />
                            <span class="label-text">Viernes</span>
                        </label>
                    </div>
                    <div class="col-span-1">
                        <label class="label justify-start gap-1 cursor-pointer">
                            <input type="checkbox" name="availability_food[]" value="6"
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
