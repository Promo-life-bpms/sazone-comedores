<dialog id="my_modal_3" class="modal">
    <div class="modal-box space-y-3 px-8">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg text-center">Crear nuevo cupon</h3>
        <br>
        <form method="POST" action="{{ route('dining.store') }}" enctype="multipart/form-data">
            @method('POST')
            @csrf
            <div class="space-y-2">
                <label for="" class="text-lg font-semibold">Nombre</label>
                <input type="text" name="name" placeholder="Ingrese el nombre del comedor"
                    class="input input-bordered w-full @error('email') input-error @enderror"  required />
                @error('email')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <br>
            <div class="space-y-2">
                <label for="" class="text-lg font-semibold">Imagen</label>
                <input type="file" name="logo"
                    class="file-input file-input-primary file-input-bordered w-full" />
                @error('email')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <br>
            <div class="space-y-2">
                <label for="" class="text-lg font-semibold">Porcentaje de descuento</label>
                <input type="text" name="name" placeholder="Ingrese el porcentaje de descuento"
                    class="input input-bordered w-full @error('email') input-error @enderror" required/>
                @error('email')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <br>
            <div class="space-y-2">
                <label for="" class="text-lg font-semibold">Vigencia</label>
                <div class="grid grid-cols-2 gap-3">
                    <div class="col-span-1 space-y-2">
                        <label for="" class="text-sm font-semibold">Fecha de inicio</label>
                        <input type="date" name="name" placeholder="Ingrese el nombre del comedor"
                            class="input input-bordered w-full @error('email') input-error @enderror" required/>
                        @error('email')
                            <div class="text-red-500">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-span-1 space-y-2">
                        <label for="" class="text-sm font-semibold">Fecha de fin</label>
                        <input type="date" name="name" placeholder="Ingrese el nombre del comedor"
                            class="input input-bordered w-full @error('email') input-error @enderror" />
                        @error('email')
                            <div class="text-red-500">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <br>
            <div class="space-y-2">
                <label for="" class="text-lg font-semibold">Dias activos de cupon</label>
                <div class="grid grid-cols-2">
                    <div class="col-span-1">
                        <label class="label justify-start gap-1 cursor-pointer">
                            <input type="checkbox" checked="checked" class="checkbox h-4 w-4 rounded-md" />
                            <span class="label-text">Lunes</span>
                        </label>
                        <label class="label justify-start gap-1 cursor-pointer">
                            <input type="checkbox" checked="checked" class="checkbox h-4 w-4 rounded-md" />
                            <span class="label-text">Martes</span>
                        </label>
                        <label class="label justify-start gap-1 cursor-pointer">
                            <input type="checkbox" checked="checked" class="checkbox h-4 w-4 rounded-md" />
                            <span class="label-text">Miercoles</span>
                        </label>
                        <label class="label justify-start gap-1 cursor-pointer">
                            <input type="checkbox" checked="checked" class="checkbox h-4 w-4 rounded-md" />
                            <span class="label-text">Jueves</span>
                        </label>
                        <label class="label justify-start gap-1 cursor-pointer">
                            <input type="checkbox" checked="checked" class="checkbox h-4 w-4 rounded-md" />
                            <span class="label-text">Viernes</span>
                        </label>
                    </div>
                    <div class="col-span-1">
                        <label class="label justify-start gap-1 cursor-pointer">
                            <input type="checkbox" checked="checked" class="checkbox h-4 w-4 rounded-md" />
                            <span class="label-text">Sabado</span>
                        </label>
                        <label class="label justify-start gap-1 cursor-pointer">
                            <input type="checkbox" checked="checked" class="checkbox h-4 w-4 rounded-md" />
                            <span class="label-text">Domingo</span>
                        </label>
                    </div>
                </div>

            </div>
            <div class="space-y-2">
                <label for="" class="text-lg font-semibold">Tipo de uso (por usuario)</label>
                <div class="grid grid-cols-2">
                    <div class="col-span-1">
                        <label class="label justify-start gap-1 cursor-pointer">
                            <input type="checkbox" checked="checked" class="checkbox h-4 w-4 rounded-md" />
                            <span class="label-text">Ilimitado</span>
                        </label>
                        <label class="label justify-start gap-1 cursor-pointer">
                            <input type="checkbox" checked="checked" class="checkbox h-4 w-4 rounded-md" />
                            <span class="label-text">Solo 1 vez por dia</span>
                        </label>
                        <label class="label justify-start gap-1 cursor-pointer">
                            <input type="checkbox" checked="checked" class="checkbox h-4 w-4 rounded-md" />
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
