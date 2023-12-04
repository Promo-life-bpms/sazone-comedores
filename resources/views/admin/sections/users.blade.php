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
                <th></th>
                <th>Name</th>
                <th>Job</th>
                <th>Favorite Color</th>
            </tr>
        </thead>
        <tbody>
            <!-- row 1 -->
            <tr class="bg-base-200">
                <th>1</th>
                <td>Cy Ganderton</td>
                <td>Quality Control Specialist</td>
                <td>Blue</td>
            </tr>
            <!-- row 2 -->
            <tr>
                <th>2</th>
                <td>Hart Hagerty</td>
                <td>Desktop Support Technician</td>
                <td>Purple</td>
            </tr>
            <!-- row 3 -->
            <tr>
                <th>3</th>
                <td>Brice Swyre</td>
                <td>Tax Accountant</td>
                <td>Red</td>
            </tr>
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
        <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data" class="space-y-3" autocomplete="off">
            @method('POST')
            @csrf
            <div class="space-y-2">
                <label for="" class="text-lg font-semibold">Nombre</label>
                <input type="text" name="name" placeholder="Ingrese el nombre del colaborador"
                    class="input input-bordered w-full @error('email') input-error @enderror" />
                @error('email')
                    <div class="text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="space-y-2">
                <label for="" class="text-lg font-semibold">Correo</label>
                <input type="email" name="email" placeholder="Ingrese el correo del colaborador"
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
                    class="input input-bordered w-full @error('email') input-error @enderror" />
                @error('email')
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
                            <input type="checkbox" name="type" value="admin" ch class="checkbox h-4 w-4 rounded-md" />
                            <span class="label-text">Administrador</span>
                        </label>
                        <label class="label justify-start gap-1 cursor-pointer">
                            <input type="checkbox" name="type" value="employee" ch class="checkbox h-4 w-4 rounded-md" />
                            <span class="label-text">Colaborador</span>
                        </label>
                    </div>
                </div>
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
        my_modal_4.showModal()
    });
</script>
