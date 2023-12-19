<dialog id="modal_edit_user" class="modal">
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
        <form method="POST" action="{{ route('users.update') }}" enctype="multipart/form-data" class="space-y-3">
            @method('PUT')
            @csrf
            <input type="hidden" name="user_id" value="">
            <div class="space-y-2">
                <label for="" class="text-lg font-semibold">Nombre</label>
                <input type="text" name="name_user_edit" placeholder="Ingrese el nombre del colaborador"
                    class="input input-bordered w-full @error('name_user_edit') input-error @enderror" />
                @error('name_user_edit')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="space-y-2">
                <label for="" class="text-lg font-semibold">Correo</label>
                <input type="email" name="email_user_edit" placeholder="Ingrese el correo del colaborador"
                    autocomplete="off"
                    class="input input-bordered w-full @error('email_user_edit') input-error @enderror" />
                @error('email_user_edit')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="space-y-2">
                <label for="" class="text-lg font-semibold">Tipo de usuario</label>
                <div class="grid grid-cols-2">
                    <div class="col-span-1">
                        <label class="label justify-start gap-1 cursor-pointer">
                            <input type="checkbox" name="type_user_edit" value="dining_manager" ch
                                class="checkbox h-4 w-4 rounded-md" />
                            <span class="label-text">Administrador</span>
                        </label>
                        <label class="label justify-start gap-1 cursor-pointer">
                            <input type="checkbox" name="type_user_edit" value="collaborator" ch
                                class="checkbox h-4 w-4 rounded-md" />
                            <span class="label-text">Colaborador</span>
                        </label>
                    </div>
                </div>
                @error('type_user_edit')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <br><br>

            <div class="space-y-2">
                <button class="btn btn-primary w-full uppercase" type="submit">Editar</button>
            </div>
        </form>
    </div>
</dialog>
<script>
    function editUser(id) {
        // Obtener el anuncio
        let user = users.find((user) => user.id == id);
        // abrir el modal
        modal_edit_user.showModal();

        // llenar los campos
        document.querySelector('input[name="user_id"]').value = user.id;
        document.querySelector('input[name="name_user_edit"]').value = user.name;
        document.querySelector('input[name="email_user_edit"]').value = user.email;
        document.querySelector('input[name="type_user_edit"]').value = user.profile.type;
    }
</script>
