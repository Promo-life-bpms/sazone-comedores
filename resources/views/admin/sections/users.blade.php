<div class="flex justify-end gap-3">
    <div class="btn btn-primary">Asignar Cupones</div>
    <button class="btn btn-primary" onclick="my_modal_4.showModal()">Agregar Usuario</button>
    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" />
</div>
<br>
<div class="overflow-x-auto">
    <table class="table">
        <!-- head -->
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Tipo</th>
                <th>...</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ Str::ucfirst($user->profile->type) }}</td>
                    <td>
                        <div class="flex justify-end gap-3">
                            <button class="btn btn-circle btn-ghost btn-xs">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </button>
                            <button class="btn btn-circle btn-ghost btn-xs">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                            </button>
                            <button class="btn btn-circle btn-ghost btn-xs">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<dialog id="my_modal_4" class="modal">
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
            <div class="space-y-2">
                <label for="" class="text-lg font-semibold">Establecer Contraseña</label>
                <input type="password" name="password" placeholder="Ingrese la contraseña del colaborador"
                    autocomplete="off" class="input input-bordered w-full @error('email') input-error @enderror" />
                @error('password')
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
                <button class="btn btn-primary w-full uppercase" type="submit">Guardar</button>
            </div>
        </form>
    </div>
</dialog>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let showModalUser = {{ session('success_user_create') ? 'my_modal_4.showModal()' : false }}

    });
</script>
