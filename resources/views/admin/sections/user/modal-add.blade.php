<dialog id="modal_add_user" class="modal">
    <div class="modal-box space-y-3 px-8">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg text-center">Agregar Usuario</h3>
        <br>
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
        <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data" class="space-y-3">
            @method('POST')
            @csrf
            <input type="hidden" name="dining_id" value="{{ $diningRoom->id }}">
            <div class="space-y-2">
                <label for="" class="text-lg font-semibold">Nombre</label>
                <input type="text" name="name" placeholder="Ingrese el nombre del colaborador"
                    class="input input-bordered w-full @error('email') input-error @enderror" />
                @error('name')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="space-y-2">
                <label for="" class="text-lg font-semibold">Correo</label>
                <input type="email" name="email" placeholder="Ingrese el correo del colaborador" autocomplete="off"
                    class="input input-bordered w-full @error('email') input-error @enderror" />
                @error('email')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- <div class="space-y-2">
                <label for="" class="text-lg font-semibold">Establecer Contraseña</label>
                <input type="password" name="password" placeholder="Ingrese la contraseña del colaborador"
                    autocomplete="off" class="input input-bordered w-full @error('email') input-error @enderror" />
                @error('password')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div> --}}
            <div class="space-y-2">
                <label for="" class="text-lg font-semibold">Tipo de usuario</label>
                <div class="grid grid-cols-2">
                    <div class="col-span-1">
                        <label class="label justify-start gap-1 cursor-pointer">
                            <input type="checkbox" name="type" value="dining_manager" ch
                                class="checkbox h-4 w-4 rounded-md" />
                            <span class="label-text">Administrador</span>
                        </label>
                        <label class="label justify-start gap-1 cursor-pointer">
                            <input type="checkbox" name="type" value="collaborator" ch
                                class="checkbox h-4 w-4 rounded-md" />
                            <span class="label-text">Colaborador</span>
                        </label>
                    </div>
                </div>
                @error('type')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <br><br>

            <div class="space-y-2">
                <button class="btn text-white w-full uppercase" style="background-color: rgb(48, 79, 157)" type="submit">Guardar</button>
            </div>
        </form>
    </div>
</dialog>
