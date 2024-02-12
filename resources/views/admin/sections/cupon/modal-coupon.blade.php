<dialog id="my_modal_3" class="modal">
    <div class="modal-box space-y-3 px-8">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg text-center">Crear nuevo cupon</h3>
        <br>
        <form method="POST" action="{{ route('coupon.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="space-y-2">
                <label for="name" class="text-lg font-semibold">Nombre</label>
                <input type="text" id="name" name="name" placeholder="Ingrese el nombre del cupón"
                    class="input input-bordered w-full @error('name') input-error @enderror" required />
                @error('name')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <br>
            <div class="space-y-2">
                <label for="img" class="text-lg font-semibold">Imagen</label>
                <input type="file" id="img" name="img"
                    class="file-input file-input-primary file-input-bordered w-full" />
                @error('img')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <br>
            <div class="space-y-2">
                <label for="discount" class="text-lg font-semibold">Porcentaje de descuento</label>
                <input type="number" id="discount" name="discount" placeholder="Ingrese el porcentaje de descuento"
                    class="input input-bordered w-full @error('discount') input-error @enderror" required />
                @error('discount')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <br>
            <div class="space-y-2">
                <label class="text-lg font-semibold">Vigencia</label>
                <div class="grid grid-cols-2 gap-3">
                    <div class="col-span-1 space-y-2">
                        <label for="start_date" class="text-sm font-semibold">Fecha de inicio</label>
                        <input type="date" id="start_date" name="start_date" placeholder="Ingrese la fecha de inicio"
                            class="input input-bordered w-full @error('start_date') input-error @enderror" required />
                        @error('start_date')
                            <div class="text-red-500">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-span-1 space-y-2">
                        <label for="end_date" class="text-sm font-semibold">Fecha de fin</label>
                        <input type="date" id="end_date" name="end_date" placeholder="Ingrese la fecha de fin"
                            class="input input-bordered w-full @error('end_date') input-error @enderror" />
                        @error('end_date')
                            <div class="text-red-500">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <br>
            <div class="space-y-2">
                <label class="text-lg font-semibold">Días activos de cupón</label>
                <div class="grid grid-cols-2">
                    <div class="col-span-1">
                        <label class="label justify-start gap-1 cursor-pointer">
                            <input type="checkbox" name="monday" class="checkbox h-4 w-4 rounded-md" checked />
                            <span class="label-text">Lunes</span>
                        </label>
                        <label class="label justify-start gap-1 cursor-pointer">
                            <input type="checkbox" name="tuesday" class="checkbox h-4 w-4 rounded-md" checked />
                            <span class="label-text">Martes</span>
                        </label>
                        <label class="label justify-start gap-1 cursor-pointer">
                            <input type="checkbox" name="wednesday" class="checkbox h-4 w-4 rounded-md" checked />
                            <span class="label-text">Miércoles</span>
                        </label>
                        <label class="label justify-start gap-1 cursor-pointer">
                            <input type="checkbox" name="thursday" class="checkbox h-4 w-4 rounded-md" checked />
                            <span class="label-text">Jueves</span>
                        </label>
                        <label class="label justify-start gap-1 cursor-pointer">
                            <input type="checkbox" name="friday" class="checkbox h-4 w-4 rounded-md" checked />
                            <span class="label-text">Viernes</span>
                        </label>
                    </div>
                    <div class="col-span-1">
                        <label class="label justify-start gap-1 cursor-pointer">
                            <input type="checkbox" name="saturday" class="checkbox h-4 w-4 rounded-md" checked />
                            <span class="label-text">Sábado</span>
                        </label>
                        <label class="label justify-start gap-1 cursor-pointer">
                            <input type="checkbox" name="sunday" class="checkbox h-4 w-4 rounded-md" checked />
                            <span class="label-text">Domingo</span>
                        </label>
                    </div>
                </div>
            </div>
            <br>
            <div class="space-y-2">
                <label class="text-lg font-semibold">Tipo de uso (por usuario)</label>
                <div class="grid grid-cols-2">
                    <div class="col-span-1">
                        <label class="label justify-start gap-1 cursor-pointer">
                            <input type="checkbox" name="ilimited" class="checkbox h-4 w-4 rounded-md" checked />
                            <span class="label-text">Ilimitado</span>
                        </label>
                        <label class="label justify-start gap-1 cursor-pointer">
                            <input type="checkbox" name="only_one_use" class="checkbox h-4 w-4 rounded-md" />
                            <span class="label-text">Solo 1 vez por día</span>
                        </label>
                        <label class="label justify-start gap-1 cursor-pointer">
                            <input type="checkbox" name="one_use_peer_day" class="checkbox h-4 w-4 rounded-md" />
                            <span class="label-text">Un solo uso</span>
                        </label>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="space-y-2">
                <button class="btn btn-primary w-full uppercase" type="submit">Aceptar</button>
            </div>
        </form>
    </div>
</dialog>
