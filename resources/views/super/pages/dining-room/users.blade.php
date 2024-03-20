@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-semibold my-5">Administradores</h1>
    <div class="flex justify-between items-center">
        <h1 class="text-lg font-semibold my-2">Gestionar administradores</h1>
        <button class="btn text-white bg-green-700 hover:bg-green-800" onclick="my_modal_2.showModal()">Crear nuevo</button>

    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Exito!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <dialog id="my_modal_2" class="modal">
        <div class="modal-box">
            <h4 class="font-bold text-lg">Crear nuevo administrador</h4>
            <form method="POST" action="{{ route('admin.store.admin') }}" enctype="multipart/form-data" class="space-y-3">
            @method('POST')
            @csrf
          
            <div class="space-y-2">
                <label for="" class="text-lg font-semibold">Nombre</label>
                <input type="text" name="name" placeholder="Ingrese el nombre del colaborador"
                    class="input input-bordered w-full @error('email') input-error @enderror" required/>
                @error('name')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="space-y-2">
                <label for="" class="text-lg font-semibold">Correo</label>
                <input type="email" name="email" placeholder="Ingrese el correo del colaborador" autocomplete="off"
                    class="input input-bordered w-full @error('email') input-error @enderror" required/>
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
                <label for="" class="text-lg font-semibold">Comedores que administrará</label>
                <div class="grid grid-cols-2">
                    <div class="col-span-1">
                        @foreach($diningRooms as $diningRoom)
                            <label>
                                <input type="checkbox" name="dining_rooms[{{ $diningRoom->id }}]" value="{{ $diningRoom->id }}">
                                {{ $diningRoom->name }}
                            </label><br>
                        @endforeach
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
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>


    <dialog id="my_modal_5" class="modal">
        <div class="modal-box">
            <h4 class="font-bold text-lg">Editar relación usuario-comedor</h4>
            <form method="POST" action="{{ route('admin.update.admin') }}" class="space-y-3">
            @method('PUT')
            @csrf
    
            <input type="hidden" name="id" value="id" id="user_id"> 
    
            <div class="space-y-2">
                <label for="" class="text-lg font-semibold">Comedores que administrará</label>
                <div class="grid grid-cols-2">
                    <div class="col-span-1">
                        @foreach($diningRooms as $diningRoom)
                            <label>
                                <input type="checkbox" name="dining_rooms[{{ $diningRoom->id }}]" value="{{ $diningRoom->id }}">
                                {{ $diningRoom->name }}
                            </label><br>
                        @endforeach
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
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
    

    <div class="overflow-x-auto">
    <table class="table">
        <!-- head -->
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Tipo</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->roles->first()->display_name }}</td>
                    <td>
                        <div class="flex justify-end gap-3">
                            {{-- <button class="btn btn-circle btn-ghost btn-xs">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </button> --}}
                            <button class="btn btn-circle btn-ghost btn-xs" onclick="openModal({{ $user->id }})">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                  
                            </button>
                            
                            <button class="btn btn-circle btn-ghost btn-xs" onclick="sendAccess({{ $user->id }})">
                                <svg fill="#000000" width="20px" height="20px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Lock Reset</title><path d="M13.16,3.17A8.83,8.83,0,1,1,5.76,16.8l1.4-1.11a7.05,7.05,0,1,0-1-4.57H8.6L5.3,14.41,2,11.12H4.38a8.83,8.83,0,0,1,8.78-7.95m2.57,7.21a.81.81,0,0,1,.81.81v3.9a.82.82,0,0,1-.82.82H11a.79.79,0,0,1-.75-.82V11a.79.79,0,0,1,.74-.81V9.46a2.39,2.39,0,0,1,2.71-2.37A2.47,2.47,0,0,1,15.8,9.57v.81m-1.11-.84A1.22,1.22,0,0,0,14,8.4a1.29,1.29,0,0,0-1.86,1.09v.89h2.57Z"/></svg>
                            </button>
                            {{-- <button class="btn btn-circle btn-ghost btn-xs" onclick="editUser({{ $user->id }})">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                            </button> --}}
                            <button class="btn btn-circle btn-ghost btn-xs" onclick="deleteUser({{ $user->id }})">
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

<script>
    let users = @json($users);
    document.addEventListener("DOMContentLoaded", function(event) {
        let showModalUser = {{ session('error_user') ? 'modal_add_user.showModal()' : 0 }}
        // {{ session('error_user_edit') ? 'editarMenu(' . session('menu_id') . ')' : 0 }}
        /* modal_add_food.showModal() */
        let errorImport = {{ session('error_user_import') ? 'modal_import_user.showModal()' : 0 }}
    });

    function deleteUser(id) {
        Swal.fire({
            title: "¿Estas seguro de que quieres eliminar este usuario?",
            text: "Esta accion no se puede deshacer",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Eliminar"
        }).then((result) => {
            if (result.isConfirmed) {
                elminarUser(id)
            }
        });
    }

    async function elminarUser(id) {
        let url = "{{ route('users.deleteUser') }}";
        await axios.delete(url, {
            data: {
                user_id: id
            }
        }).then((response) => {
            console.log(response);
            if (response.status == 200) {
                Swal.fire({
                    title: "Eliminado!",
                    text: "Se ha eliminiado correctamente el usuario",
                    icon: "success"
                });
                setTimeout(() => {
                    location.reload();
                }, 1000);
            }
        }).catch((error) => {
            console.error(error);
            Swal.fire({
                title: "Error!",
                text: "No se ha podido eliminar el usurio",
                icon: "error"
            });
        });
    }

    function sendAccess(id) {
        Swal.fire({
            title: "¿Estas seguro de que quieres enviar el acceso a este usuario?",
            text: "Esta accion no se puede deshacer",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Enviar"
        }).then((result) => {
            if (result.isConfirmed) {
                enviarAcceso(id)
            }
        });
    }

    async function enviarAcceso(id) {
        let url = "{{ route('users.sendAccess') }}";
        await axios.post(url, {
            user_id: id
        }).then((response) => {
            console.log(response);
            if (response.status == 200) {
                Swal.fire({
                    title: "Enviado!",
                    text: "Se ha enviado correctamente el acceso al usuario",
                    icon: "success"
                });
            }
        }).catch((error) => {
            console.error(error);
            Swal.fire({
                title: "Error!",
                text: "No se ha podido enviar el acceso al usuario",
                icon: "error"
            });
        });
    }

    function openModal(userId) {
    document.getElementById('user_id').value = userId;
    my_modal_5.showModal();
}

</script>
@endsection
