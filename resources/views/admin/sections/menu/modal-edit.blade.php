<dialog id="modal_edit_food" class="modal">
    <div class="modal-box space-y-3 px-8">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg text-center">Editar Platillo</h3>
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
        <form method="POST" action="{{ route('menu.update') }}" enctype="multipart/form-data" class="space-y-3">
            @method('PUT')
            @csrf
            <input type="hidden" name="food_id" value="" id="food_id" autocomplete="off">
            <input type="hidden" name="food_id" value="{{ $diningRoom->id }}" id="dining_id" autocomplete="off">
            <div class="space-y-2">
                <label for="" class="text-lg font-semibold">Nombre</label>
                <input type="text" name="name_food_edit" id="name_food_edit" placeholder="Taquitos al pastor"
                    class="input input-bordered w-full @error('name_food_edit') input-error @enderror" />
                @error('name_food_edit')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="space-y-2">
                <label for="" class="text-lg font-semibold">Descripcion</label>
                <textarea name="description_food_edit" id="description_food_edit"
                    class="textarea textarea-bordered w-full @error('description_food_edit') input-error @enderror"
                    placeholder="Carne de cerdo adobada, tortillas de maíz, cebolla, piña, cilantro, salsa de tomate y chiles"></textarea>
                @error('description_food_edit')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="space-y-2">
                <label for="" class="text-lg font-semibold">Imagen</label>
                <input type="file" name="image_food_edit" id="image_food_edit"
                    class="file-input file-input-primary file-input-bordered w-full @error('image_food_edit') input-error @enderror" />
                @error('image_food_edit')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="space-y-2">
                <label for="" class="text-lg font-semibold">Tiempo</label>
                <select name="time_food_edit" id="time_food_edit" class="select select-bordered w-full">
                    <option value="">Seleccionar...</option>
                    <option value="desayuno">Desayuno</option>
                    <option value="comida">Comida</option>
                </select>
                @error('time_food_edit')
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
                            <input type="checkbox" name="availability_food_edit[]" value="1"
                                class="checkbox h-4 w-4 rounded-md check-days" />
                            <span class="label-text">Lunes</span>
                        </label>
                    </div>
                    <div class="col-span-1">
                        <label class="label justify-start gap-1 cursor-pointer">
                            <input type="checkbox" name="availability_food_edit[]" value="2"
                                class="checkbox h-4 w-4 rounded-md check-days" />
                            <span class="label-text">Martes</span>
                        </label>
                    </div>
                    <div class="col-span-1">
                        <label class="label justify-start gap-1 cursor-pointer">
                            <input type="checkbox" name="availability_food_edit[]" value="3"
                                class="checkbox h-4 w-4 rounded-md check-days" />
                            <span class="label-text">Miercoles</span>
                        </label>
                    </div>
                    <div class="col-span-1">
                        <label class="label justify-start gap-1 cursor-pointer">
                            <input type="checkbox" name="availability_food_edit[]" value="4"
                                class="checkbox h-4 w-4 rounded-md check-days" />
                            <span class="label-text">Jueves</span>
                        </label>
                    </div>
                    <div class="col-span-1">
                        <label class="label justify-start gap-1 cursor-pointer">
                            <input type="checkbox" name="availability_food_edit[]" value="5"
                                class="checkbox h-4 w-4 rounded-md check-days" />
                            <span class="label-text">Viernes</span>
                        </label>
                    </div>
                    <div class="col-span-1">
                        <label class="label justify-start gap-1 cursor-pointer">
                            <input type="checkbox" name="availability_food_edit[]" value="6"
                                class="checkbox h-4 w-4 rounded-md check-days" />
                            <span class="label-text">Sabado</span>
                        </label>
                    </div>
                </div>
                @error('availability_food_edit')
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
    function editarMenu(id) {
        // Obtener el anuncio
        let menu = allMenu.find((menu) => menu.id == id);
        console.log(id, menu);
        // abrir el modal
        modal_edit_food.showModal();

        // llenar los campos
        document.getElementById('food_id').value = menu.id;
        document.getElementById('name_food_edit').value = menu.name;
        document.getElementById('description_food_edit').value = menu.description;
        document.getElementById('time_food_edit').value = menu.time;
        document.getElementById('image_food_edit').src = "/storage/" + menu.image;
        let checkDays = document.querySelectorAll('.check-days');
        checkDays.forEach((checkDay) => {
            menu.days_available.forEach((day) => {
                if (checkDay.value == day.id) {
                    checkDay.checked = true;
                }
            });
        });
    }
</script>
